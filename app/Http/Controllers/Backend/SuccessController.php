<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Success;
use Illuminate\Support\Carbon;
use Image;
use Session;

class SuccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $success = Success::orderBy('id','desc')->get();
        return view('backend.admin.success.index',compact('success'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.success.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $request->validate([
            'total_student' => 'required',
            'chance_student' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        
        if($request->hasfile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1170,482)->save('upload/success/'.$name_gen);
            $image = 'upload/success/'.$name_gen;
        }else{
            $image = $request->image;
        }

        $success = new Success();
        $success->total_student = $request->total_student;
        $success->chance_student = $request->chance_student;
        $success->status = $request->status;
        $success->image = $image;
        $success->created_at = Carbon::now();
        $success->save();

        $notification = array(
            'message' => 'success created successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('success.index')->with($notification);

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
        $success = Success::find($id);
        return view('backend.admin.success.edit',compact('success'));
    }

    public function view($id)
    {
        $success = Success::find($id);
        return view('backend.admin.success.view',compact('success'));
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
        $success = Success::find($id);

        if($request->hasFile('image')){
            // Deleting previous image if exists
            if(file_exists($success->image)){
                unlink($success->image);
            }
        
            // Processing and saving the new image
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/success/'), $name_gen);
            $success_img = 'upload/success/' . $name_gen;
        }else{
            // If no new image uploaded, keep the old one
            $success_img = $success->image;
        }
        
        // Update success instance properties
        $success->total_student = $request->total_student;
        $success->chance_student = $request->chance_student;
        $success->status = $request->status;
        $success->image = $success_img;
        $success->updated_at = now();
        $success->save();
        
        $notification = array(
            'message' => 'success updated successfully.', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('success.index')->with($notification);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = Success::findOrFail($id);

        try {
            if(file_exists($success->image)){
                unlink($success->image);
            }
        } catch (Exception $e) {

        }

        $success->delete();

        $notification = array(
            'message' => 'success Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id){
        $success = Success::find($id);
        $success->status = 1;
        $success->save();

        $notification = array(
            'message' => 'success Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $success = Success::find($id);
        $success->status = 0;
        $success->save();

        $notification = array(
            'message' => 'success Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
