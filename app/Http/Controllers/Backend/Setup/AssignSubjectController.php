<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\teacher;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use App\Models\AssignSubject;
use Carbon\Carbon;

class AssignSubjectController extends Controller
{
	public function ViewAssignSubject()
	{
		// $data['allData'] = AssignSubject::all();
		$data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
		return view('backend.setup.assign_subject.view_assign_subject', $data);
	}


	public function AddAssignSubject()
	{
		$data['subjects'] = SchoolSubject::all();
		$data['classes'] = StudentClass::all();
		$data['teachers'] = teacher::all();

		return view('backend.setup.assign_subject.add_assign_subject', $data);
	}


	public function StoreAssignSubject(Request $request)
	{

		$subjectCount = count($request->subject_id);
		if ($subjectCount != NULL) {
			for ($i = 0; $i < $subjectCount; $i++) {
				$assign_subject = new AssignSubject();
				$assign_subject->class_id = $request->class_id;
				$assign_subject->teacher_id = $request->teacher_id;
				$assign_subject->day = $request->day;
				$year = Carbon::createFromDate($request->year, 1, 1);
				$assign_subject->year = $year->toDateString();
				// create a Carbon instance from the input value

				// $start_Time = $request->start_time;
				// $time = Carbon::createFromFormat('H:i', $start_Time);
$time = Carbon::createFromFormat('H:i', $request->start_time);
$assign_subject->start_time = $time->format('H:i:s');


 
// create a Carbon instance from the input value
$time = Carbon::createFromFormat('H:i', $request->end_time);

// format the time as needed and store it in the model
$assign_subject->end_time = $time->format('H:i:s');






				$assign_subject->subject_id = $request->subject_id[$i];
				$assign_subject->full_mark = $request->full_mark[$i];
				$assign_subject->pass_mark = $request->pass_mark[$i];
				$assign_subject->subjective_mark = $request->subjective_mark[$i];
				$assign_subject->save();

			} // End For Loop
		} // End If Condition

		$notification = array(
			'message' => 'Subject Assign Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('assign.subject.view')->with($notification);

	} // End Method 


	public function EditAssignSubject($class_id)
	{
		$data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
		$data['subjects'] = SchoolSubject::all();
		$data['classes'] = StudentClass::all();
		$data['teachers'] = teacher::all();
		return view('backend.setup.assign_subject.edit_assign_subject', $data);
		//  dd($data['teachers']);

	}


	public function UpdateAssignSubject(Request $request, $class_id)
{
    if ($request->subject_id == NULL) {
        $notification = array(
            'message' => 'Sorry You do not select any Subject',
            'alert-type' => 'error'
        );

        return redirect()->route('assign.subject.edit', $class_id)->with($notification);
    } else {
        $countClass = count($request->subject_id);
        AssignSubject::where('class_id', $class_id)->delete();
        for ($i = 0; $i < $countClass; $i++) {
            $assign_subject = new AssignSubject();
            $assign_subject->class_id = $request->class_id;
            $assign_subject->subject_id = $request->subject_id[$i];
            $assign_subject->full_mark = $request->full_mark[$i];
            $assign_subject->pass_mark = $request->pass_mark[$i];
            $assign_subject->subjective_mark = $request->subjective_mark[$i];
            $assign_subject->day = $request->day[$i];
            $year = Carbon::createFromDate($request->year[$i], 1, 1);
            $assign_subject->year = $year->toDateString();
            $time = Carbon::createFromFormat('H:i', $request->start_Time[$i]);
            $assign_subject->start_Time = $time->format('H:i:s');
            $time = Carbon::createFromFormat('H:i', $request->end_time[$i]);
            $assign_subject->end_time = $time->format('H:i:s');
            $assign_subject->save();
        } 
    }

    $notification = array(
        'message' => 'Data Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('assign.subject.view')->with($notification);
}



	public function DetailsAssignSubject($class_id)
	{
		$data['detailsData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();

		return view('backend.setup.assign_subject.details_assign_subject', $data);


	}




}