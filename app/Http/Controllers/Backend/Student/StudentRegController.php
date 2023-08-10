<?php

namespace App\Http\Controllers\Backend\Student;
use App\Http\Controllers\Controller;
use App\Models\students;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Hash;

class StudentRegController extends Controller
{
    public function StudentRegView(){
    	$data['years'] = StudentYear::all();

 
    	$data['classes'] = StudentClass::all(); 
    	$data['allData'] = students::all();
 
    	$data['classes'] = StudentClass::all();
    	$data['students'] = students::all();

    	$data['classes'] = StudentClass::all(); 
    	$data['allData'] = students::all();
    	$data['classes'] = StudentClass::all();
    	$data['students'] = students::all();
    	$data['year_id'] = StudentYear::get()->first()->id;
    	$data['class_id'] = StudentClass::get()->first()->id;
    	// dd($data['class_id']);
    	// $data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
    	

		return view('backend.student.student_reg.student_view',$data);
		// dd($data['allData']);
    	
    	$data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
    	$data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
		$data['students'] = students::all();

		// $data['students'] = students::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();

    	// dd($data['class_id']);
    	// $data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();
    	return view('backend.student.student_reg.student_view',$data);

    }


    public function StudentClassYearWise(Request $request){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();

    	$data['year_id'] = $request->year_id;
    	$data['class_id'] = $request->class_id;

 
    	$data['allData'] = students::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
 
    	$data['allData'] = students::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();

    	
		$data['students'] = students::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();


    	// $data['allData'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();

    	return view('backend.student.student_reg.student_view',$data);

    } 


    public function StudentRegAdd(){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['groups'] = StudentGroup::all();
    	$data['shifts'] = StudentShift::all();
    	return view('backend.student.student_reg.student_add',$data);
    }


    public function StudentRegStore(Request $request){
    	DB::transaction(function() use($request){
    	$checkYear = StudentYear::find($request->year_id)->name;
    	$student = students::first();

    	if ($student == null) {
    		$firstReg = 0;
    		$studentId = $firstReg+1;
    		if ($studentId < 10) {
    			$id_no = '000'.$studentId;
    		}elseif ($studentId < 100) {
    			$id_no = '00'.$studentId;
    		}elseif ($studentId < 1000) {
    			$id_no = '0'.$studentId;
    		}
    	}else{
     $student = students::first()->id;
     	$studentId = $student+1;
     	if ($studentId < 10) {
    			$id_no = '000'.$studentId;
    		}elseif ($studentId < 100) {
    			$id_no = '00'.$studentId;
    		}elseif ($studentId < 1000) {
    			$id_no = '0'.$studentId;
    		}

    	} // end else 



    	$final_id_no = $checkYear.$id_no;
    	$user = new students();
    	$code = rand(0000,9999);
		$user->year_id = $request->year_id;

$year = StudentYear::find($request->year_id);
$latestRollNumber = students::max('rollNumber');
$numericPart = (int)+ substr($latestRollNumber, -3);
$rollNumber = $numericPart + 1;
$user->rollNumber = $rollNumber;// Generate a random number between 1 and 100
$user->rollNumber = $year->name . str_pad($rollNumber, 1, '0', STR_PAD_LEFT);

// Extract the numeric part from the roll number
$numericPart = (int) substr($latestRollNumber, -3);

// Increment the numeric part by 1
$rollNumber = $numericPart + 1;
// Generate the new roll number using the padded numeric part
$user->rollNumber = str_pad($rollNumber, 3, '0', STR_PAD_LEFT);

$user->class_id = $request->class_id;
// $user->year_id = $request->year_id;
 

    $user->rollNumber = $rollNumber;

    	// $user->rollNumber = rand(000, 100);  //
    	$user->password = Hash::make($code); //
    	$user->code = $code; 
    	$user->name = $request->name; //
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
    	$user->dob = date('Y-m-d',strtotime($request->dob));
    	$user->year_id = $request->year_id;
    	$user->class_id = $request->class_id;
    	$user->group_id = $request->group_id;
    	$user->shift_id = $request->shift_id;




    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['profile'] = $filename;
    	}
 	    $user->save();

          $assign_student = new AssignStudent();
          $assign_student->student_id = $user->rollNumber;
          $assign_student->year_id = $request->year_id;
          $assign_student->class_id = $request->class_id;
          $assign_student->group_id = $request->group_id;
          $assign_student->shift_id = $request->shift_id;

          $assign_student->save();

          $discount_student = new DiscountStudent();
          $discount_student->assign_student_id = $assign_student->id;
          $discount_student->fee_category_id = '1';// 1 is because registation filed id is 1
		  $discount_student->discount = $request->discount;

          $discount_student->save();

    	});


    	$notification = array(
    		'message' => 'Student Registration Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method 


 
    public function StudentRegEdit($student_id){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['groups'] = StudentGroup::all();
    	$data['shifts'] = StudentShift::all();

    	// $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
    	$data['editData'] = students::where('rollNumber',$student_id)->first();
		// dd($data['editData']);
    	return view('backend.student.student_reg.student_edit',$data);

    }




 public function StudentRegUpdate(Request $request,$student_id){
    	DB::transaction(function() use($request,$student_id){
    	 

    	 
    	$user = students::where('rollNumber',$student_id)->first();    	 
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
    	$user->dob = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/student_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['profile'] = $filename;
    	}
 	    $user->save();

         $assign_student = AssignStudent::where('id', $request->id)->where('student_id', $student_id)->first();

if ($assign_student) {
    $assign_student->year_id = $request->year_id;
    $assign_student->class_id = $request->class_id;
    $assign_student->group_id = $request->group_id;
    $assign_student->shift_id = $request->shift_id;
    $assign_student->save();
} else {
    // handle the case where the record doesn't exist
}


		// $assign_student = students::where('id',$request->id)->where('student_id',$student_id)->first();
           
        //   $assign_student->year_id = $request->year_id;
        //   $assign_student->class_id = $request->class_id;
        //   $assign_student->group_id = $request->group_id;
        //   $assign_student->shift_id = $request->shift_id;
        //   $assign_student->save();

		$discount_student = DiscountStudent::where('assign_student_id', $request->id)->first();
		if ($discount_student) {
		   $discount_student->discount = $request->discount;
		   $discount_student->save();
		} else {
		   // handle the case when no DiscountStudent record is found
		}
		

    	});


    	$notification = array(
    		'message' => 'Student Registration Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method 


    public function StudentRegPromotion($student_id){
    	$data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['groups'] = StudentGroup::all();
    	$data['shifts'] = StudentShift::all();
		$data['students']=students::all();

    	$data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
    	 
    	return view('backend.student.student_reg.student_promotion',$data);
		//    dd($data['editData']);

    }




 public function StudentUpdatePromotion(Request $request,$student_id){
    	DB::transaction(function() use($request,$student_id){
    	 

    	 
    	$user = students::where('rollNumber',$student_id)->first();    	 
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->mobile = $request->mobile;
    	$user->year_id = $request->year_id;
    	$user->class_id = $request->class_id;
		$user->group_id = $request->group_id;
		$user->shift_id = $request->shift_id;

    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
    	$user->dob = date('Y-m-d',strtotime($request->dob));

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('upload/student_images/'.$user->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/student_images'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();

          $assign_student = new AssignStudent();
          
          $assign_student->student_id = $student_id;
          $assign_student->year_id = $request->year_id;
          $assign_student->class_id = $request->class_id;
          $assign_student->group_id = $request->group_id;
          $assign_student->shift_id = $request->shift_id;
          $assign_student->save();

          $discount_student = new DiscountStudent();

          $discount_student->assign_student_id = $assign_student->id;
          $discount_student->fee_category_id = '1';
          $discount_student->discount = $request->discount;
          $discount_student->save();

    	});


    	$notification = array(
    		'message' => 'Student Promotion Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.registration.view')->with($notification);

    } // End Method 



	public function StudentRegDetails($student_id) {
	$data['details'] = students::with('student_year','student_class','student_group','student_shift','discount')->where('rollNumber',$student_id)->first();
	$data['discount'] = DiscountStudent::get()->first();//just temporarily
    


		//  dd($data['details']);
		 

	$pdf = new Dompdf();
	$pdf->loadHtml(view('backend.student.student_reg.student_details_pdf', $data));
	$pdf->setPaper('A4', 'portrait');
	$pdf->render();
	$pdf->getCanvas()->get_cpdf()->setEncryption('', '', ['copy', 'print'], 0, 0);

	return $pdf->stream('document.pdf');
		

		
	}
  




} 
