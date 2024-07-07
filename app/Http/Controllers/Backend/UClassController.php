<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UClass;
use App\Models\OurService;
use App\Models\Unit;
use App\Models\ServiceDetail;
use Illuminate\Support\Carbon;
use Auth;
use Illuminate\Support\Facades\Storage;

class UClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $classes = UClass::latest()->get();
        $units = Unit::all();
        $pageTitle = "Class List";

        return view('backend.admin.class.index', compact('classes','units', 'pageTitle'));
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
        $pageTitle = "Create Class";
        return view('backend.admin.class.create');
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
            'class_topic' => 'required|string|max:255',

        ]);

        $class = UClass::where('class_topic',$request->class_topic)->first();
        // dd($class);

        $class = new UClass;
        
        $class->video_link            = $request->video_link;
        $class->class_topic           = $request->class_topic;
        $class->unit_id               = $request->unit_id;
        $class->subject_id            = $request->subject_id;
        $class->description           = $request->description;
        $class->created_by            = Auth::user()->id;
        $class->created_at            = Carbon::now();

        // Handle the file upload
        if ($request->hasFile('lecture_shit')) {
            $file = $request->file('lecture_shit');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('lectures', $fileName, 'public');

            $class->lecture_shit = '/storage/' . $filePath;
        }
        
        $class->save();

        $notification = array(
            'message' => 'Class Created Successfully.', 
            'alert-type' => 'success'
        );
    
       return redirect()->route('class.index')->with($notification);
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
            'class_name' => 'required|string|max:255',
        ]);
        
        $class = UClass::find($id);
        $class->class_name = $request->class_name;
        $class->updated_at = Carbon::now();
        $class->updated_by = Auth::user()->id;
        $class->save();

        $notification = array(
            'message' => 'Class Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('class.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = UClass::find($id);
        $class->delete();

        $notification = array(
            'message' => 'Class Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
