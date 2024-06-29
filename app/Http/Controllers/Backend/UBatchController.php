<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\UClass;
use Illuminate\Support\Carbon;
use Auth;

class UBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::latest()->get();
        $classes = UClass::latest()->get();
        $pageTitle = "Batch List";
        return view('backend.admin.batch.index',compact('batches','classes','pageTitle'));
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
        $request->validate([
            'class_id' => 'required|integer', 
            'batch_no' => 'required|string|max:255', 
            'batch_time' => 'required|string|max:255', 
        ]);
        

        $batch = Batch::where('batch_no',$request->batch_no)->first();
        
        if($batch){
            $notification = array(
                'message' => 'This is Batch is Already Added.', 
                'alert-type' => 'error'
            );
            return redirect()->route('batch.index')->with($notification);
        }else{
            $batch = new Batch;

            $batchTime = date('h:i A', strtotime($request->input('batch_time')));
            $batch->class_id            = $request->class_id;
            $batch->batch_no            = $request->batch_no;
            $batch->batch_time          = $batchTime;
            $batch->created_by          = Auth::user()->id;
            $batch->created_at = Carbon::now();
            $batch->save();
    
            $notification = array(
                'message' => 'Batch Created Successfully.', 
                'alert-type' => 'success'
            );
    
            return redirect()->route('batch.index')->with($notification);
        }
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
