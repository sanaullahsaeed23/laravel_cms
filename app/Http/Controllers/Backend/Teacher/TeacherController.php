<?php

namespace App\Http\Controllers\Backend\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\EmployeeSallaryLog;
use App\Models\teacher;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\FlareClient\View;

class TeacherController extends Controller
{
    public function TeacherView(){
		$data['allData'] = teacher::get()->all();
    	return view('backend.employee.employee_reg.employee_view', $data);
    }


    public function EmployeeAdd(){
    	$data['designation'] = Designation::all();
    	return view('backend.employee.employee_reg.employee_add',$data);
    }




    public function EmployeeStore(Request $request){
    	DB::transaction(function() use($request){
    	$checkYear = date('Ym',strtotime($request->join_date));
    	//dd($checkYear);
    	$employee = teacher::first();

    	if ($employee == null) {
    		$firstReg = 0;
    		$employeeId = $firstReg+1;
    		if ($employeeId < 10) {
    			$id_no = '000'.$employeeId;
    		}elseif ($employeeId < 100) {
    			$id_no = '00'.$employeeId;
    		}elseif ($employeeId < 1000) {
    			$id_no = '0'.$employeeId;
    		}
    	}else{
     $employee = teacher::first()->id;
     	$employeeId = $employee+1;
     	if ($employeeId < 10) {
    			$id_no = '000'.$employeeId;
    		}elseif ($employeeId < 100) {
    			$id_no = '00'.$employeeId;
    		}elseif ($employeeId < 1000) {
    			$id_no = '0'.$employeeId;
    		}

    	} // end else 

    	$final_id_no = $checkYear.$id_no;
    	$user = new teacher();
    	$code = rand(0000,9999);
    	$user->id_no = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->code = $code;
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->email = $request->email;
    	$user->salary = $request->salary;
    	$user->designation_id = $request->designation_id;
    	$user->dob = date('Y-m-d',strtotime($request->dob));
    	$user->join_date = date('Y-m-d',strtotime($request->join_date));

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/employee_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();

          $employee_salary = new EmployeeSallaryLog();
          $employee_salary->employee_id = $user->id;
          $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
          $employee_salary->previous_salary = $request->salary;
          $employee_salary->present_salary = $request->salary;
          $employee_salary->increment_salary = '0';
          $employee_salary->save();

           
    	});


    	$notification = array(
    		'message' => 'Employee Registration Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('teacher.registration.view')->with($notification);

    } // END Method




    public function EmployeeEdit($id){
    	$data['editData'] = teacher::find($id);
    	$data['designation'] = Designation::all();
    	return view('backend.employee.employee_reg.employee_edit',$data);

    }


    public function EmployeeUpdate(Request $request, $id){
    
    	$user = teacher::find($id);
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
    	 
    	$user->designation_id = $request->designation_id;
    	$user->dob = date('Y-m-d',strtotime($request->dob));
    	 

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/employee_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/employee_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();

         

    	$notification = array(
    		'message' => 'Employee Registration Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('teacher.registration.view')->with($notification);


    }// END METHOD



    public function EmployeeDetails($id){
    	$data['details'] = teacher::find($id);

 // Load the HTML view using the data variables
// $data =View::make('backend.employee.employee_reg.employee_details_pdf', $data)->render();
$data = view('backend.employee.employee_reg.employee_details_pdf', $data)->render();

// Initialize the Dompdf object

$pdf = new Dompdf();
$pdf->loadHtml(view('backend.student.student_reg.student_details_pdf', $data));
$pdf->setPaper('A4', 'portrait');
$pdf->render();
$pdf->getCanvas()->get_cpdf()->setEncryption('', '', ['copy', 'print'], 0, 0);

return $pdf->stream('document.pdf');
	
}







}

