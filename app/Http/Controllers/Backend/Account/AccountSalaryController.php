<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use DB;
use PDF;

use App\Models\Designation;
use App\Models\EmployeeSallaryLog;
use App\Models\EmployeeAttendance;

use App\Models\AccountEmployeeSalary;
use Symfony\Component\Console\Input\Input;

class AccountSalaryController extends Controller
{
    public function AccountSalaryView(){

    	$data['allData'] = AccountEmployeeSalary::all();
    	return view('backend.account.employee_salary.employee_salary_view',$data);

    }


    public function AccountSalaryAdd(){

      return view('backend.account.employee_salary.employee_salary_add');
    }
 

	public function AccountSalaryGetEmployee(Request $request)
	{
		$selectedMonth = $request->month;
		// $selectedMonth = $request->input('month');

		// $selectedMonth = 'March';



		// print_r($month);
		$employeeID = $request->employeeID;
		// $date=$request->date;

		$where = [];
	
		if ($employeeID != '') {
			// Add a condition to the $where array to filter by employeeID
			$where[] = ['employee_id', 'like', $employeeID.'%'];
		}
	
		$data = EmployeeAttendance::select('employee_id')
			->groupBy('employee_id')
			->with(['user'])
			->where($where)
			->get();
	
		$html['thsource'] = '<th>SL</th>';
		$html['thsource'] .= '<th>ID NO</th>';
		$html['thsource'] .= '<th>Employee Name</th>';
		$html['thsource'] .= '<th>Basic Salary</th>';
		$html['thsource'] .= '<th>Salary This Month</th>';
		$html['thsource'] .= '<th>Select</th>';

		$html['thsource'] .= '<th>Select Month</th>';
	
		foreach ($data as $key => $attend) {
			$account_salary = AccountEmployeeSalary::where('employee_id', $attend->employee_id)
			->where('employee_id', $employeeID) 
			->where('month',$selectedMonth)
			->first();
		
			if ($account_salary != null) {
				$checked = 'checked';
			} else {
				$checked = '';
			}
	
			$totalattend = EmployeeAttendance::with(['user'])
				->where($where)
				->where('employee_id', $attend->employee_id)
				->get();
			$absentcount = count($totalattend->where('attend_status', 'Absent'));
	
			$html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
			$html[$key]['tdsource'] .= '<td>'.$attend['user']['id_no'].'<input type="hidden" name="employeeID" value="'.$employeeID.'" >'.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
			$html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';
	
			$salary = (float)$attend['user']['salary'];
			$salaryperday = (float)$salary / 30;
			$totalsalaryminus = (float)$absentcount * (float)$salaryperday;
			$totalsalary = (float)$salary - (float)$totalsalaryminus;
	
			$html[$key]['tdsource'] .= '<td>'.$totalsalary.'<input type="hidden" name="amount[]" value="'.$totalsalary.'" >'.'</td>';
	
			$html[$key]['tdsource'] .= '<td>'.'<input type="hidden" name="employee_id[]" value="'.$attend->employee_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>';
			$html[$key]['tdsource'] .= '<td>
    <input type="hidden" name="employee_id[]" value="'.$attend->employee_id.'">
    <label for="'.$key.'"> </label> 
    <select name="month" id="month" required="" class="form-control">
        <option value="" selected disabled>Select Month</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>
</td>';

		}
	
		return response()->json($html);
	}
	//  end Method



    public function AccountSalaryStore(Request $request){

		$date = date('Y-m-d', strtotime($request->date.'-01'));

		$month = $request->month;

    	AccountEmployeeSalary::where('Month',$month)->delete();

    	$checkdata = $request->checkmanage;

    	if ($checkdata !=null) {
    		for ($i=0; $i <count($checkdata) ; $i++) { 
    			$data = new AccountEmployeeSalary(); 
    			$data->date = $date; 
				$data->Month=$month;
    			$data->employee_id = $request->employee_id[$checkdata[$i]];
    			$data->amount = $request->amount[$checkdata[$i]];
    			$data->save();
    		} 
    	} // end if 

    	if (!empty(@$data) || empty($checkdata)) {

    	$notification = array(
    		'message' => 'Well Done Data Successfully Updated',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('account.salary.view')->with($notification);
    	}else{

    		$notification = array(
    		'message' => 'Sorry Data not Saved',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    	} 

    } // end method 






}