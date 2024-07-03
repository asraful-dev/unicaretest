<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassRoutine;
use App\Models\OurService;
use App\Models\UClass;
use App\Models\ServiceDetail;
class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class_routine = ClassRoutine::latest()->get();
        $pageTitle = "Class Routine";
        $units = OurService::orderBy('id', 'asc')->where('course_type', 1)->get();
        $subjects = collect();
        
        foreach ($units as $unit) {
            $unitSubjects = ServiceDetail::where('our_service_id', $unit->id)->get();
            $subjects = $subjects->merge($unitSubjects);
        }
        
        // Fetch all UClasses and group by subject_id
        $uclasses = UClass::all()->groupBy('subject_id');
    
        return view('backend.admin.routine.index', compact('class_routine', 'pageTitle', 'units', 'subjects', 'uclasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Create Batch";
        return view('backend.admin.batch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        // dd($request->all());
        $request->validate([
            'unit' => 'required',
            'subject_id' => 'required',
            'class_topic' => 'required',
            'start_time' => 'required', // Assuming time format 
            'end_time' => 'required',
            'status' => 'required|boolean',
        ]);
    
        // Create a new instance of the ClassRoutine model
        $routine = new ClassRoutine();
    
        // Assign values from the validated request to the model instance
        $routine->unit = $request->unit;
        $routine->subject_id = $request->subject_id;
        $routine->class_topic = $request->class_topic;
        $routine->start_time = $request->start_time;
        $routine->end_time = $request->end_time;
        $routine->status = $request->status;
    
        // Save the routine to the database
        $routine->save();
    
        // Optionally, set a notification message for success
        $notification = [
            'message' => 'Class Routine added successfully.',
            'alert-type' => 'success',
        ];
    
        // Redirect back with the notification message
        return redirect()->back()->with($notification);
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required|integer', // assuming class_id should be an existing class id
            'batch_no' => 'required|string|max:255', // ensuring batch_no is unique within the batches table
            'batch_time' => 'required|string|max:255', // ensuring batch_time is a string
        ]);
        
        $batch = Batch::find($id);
        $batchTime = date('h:i A', strtotime($request->input('batch_time')));
        $batch->class_id              = $request->class_id;
        $batch->batch_time            = $batchTime;
        $batch->batch_no              = $request->batch_no;
        $batch->status                = $request->status;
        $batch->updated_at = Carbon::now();
        $batch->updated_by = Auth::user()->id;
        $batch->save();

        $notification = array(
            'message' => 'Batch Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('batch.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = Batch::find($id);
        $batch->delete();

        $notification = array(
            'message' => 'Batch Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
