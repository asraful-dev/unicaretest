<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassRoutine;
use App\Models\OurService;
use App\Models\UClass;
use App\Models\Unit;
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
        $units = Unit::all();
        
        
        // Fetch all UClasses and group by subject_id
        $uclasses = UClass::all()->groupBy('subject_id');
    
        return view('backend.admin.routine.index', compact('class_routine', 'pageTitle', 'units','uclasses'));
    }

    public function getSubjectsByUnit(Request $request)
    {
        $unitId = $request->input('unit_id');
        
        // Fetch the service related to the selected unit
        $service = OurService::where('unit', $unitId)->first();
    
        // Fetch subjects related to the service
        $subjects = ServiceDetail::where('our_service_id', $service->id)->get();
    
        return response()->json($subjects);
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
        // Retrieve the class routine by ID
        $class_routine = ClassRoutine::findOrFail($id);

        // Fetch units
        $units = OurService::orderBy('id', 'asc')->where('course_type', 1)->get();

        // Initialize subjects collection
        $subjects = collect();

        // Fetch subjects related to units
        foreach ($units as $unit) {
            $unitSubjects = ServiceDetail::where('our_service_id', $unit->id)->get();
            $subjects = $subjects->merge($unitSubjects);
        }

        // Fetch all UClasses and group by subject_id
        $uclasses = UClass::all()->groupBy('subject_id');

        // Return the edit view with data
        $pageTitle = "Edit Class Routine"; // Added pageTitle for breadcrumb consistency
        return view('backend.admin.routine.edit', compact('class_routine', 'units', 'subjects', 'uclasses', 'pageTitle'));
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
        // Validate incoming request data
        $request->validate([
            'unit' => 'required',
            'subject_id' => 'required',
            'class_topic' => 'required',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'status' => 'required|boolean',
        ]);

        // Find the class routine by ID
        $routine = ClassRoutine::findOrFail($id);

        // Update routine with validated data
        $routine->unit = $request->unit;
        $routine->subject_id = $request->subject_id;
        $routine->class_topic = $request->class_topic;
        $routine->start_time = $request->start_time;
        $routine->end_time = $request->end_time;
        $routine->status = $request->status;

        // Save the routine
        $routine->save();

        // Redirect back to index with success message
        return redirect()->route('routine.index')->with([
            'message' => 'Class Routine updated successfully.',
            'alert-type' => 'success',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routine = ClassRoutine::find($id);
        $routine->delete();

        $notification = array(
            'message' => 'Class Routine Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
