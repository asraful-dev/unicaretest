<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Carbon;
use Image;
use Session;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::orderBy('id','desc')->get();
        return view('backend.admin.instructor.index',compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.instructor.create');
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
            'course_name' => 'required',
            'instructor_name' => 'required',
            'department' => 'required',
            'experience' => 'required',
            'study' => 'required',
            'facebook_link' => 'required',
            'whatsapp_link' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        
        if($request->hasfile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500,700)->save('upload/instructor/'.$name_gen);
            $image = 'upload/instructor/'.$name_gen;
        }else{
            $image = $request->image;
        }

        $instructor = new Instructor();
        $instructor->course_name = $request->course_name;
        $instructor->instructor_name = $request->instructor_name;
        $instructor->department = $request->department;
        $instructor->experience = $request->experience;
        $instructor->study = $request->study; // Add this line
        $instructor->facebook_link = $request->facebook_link;
        $instructor->whatsapp_link = $request->whatsapp_link;
        $instructor->status = $request->status;
        $instructor->image = $image;
        $instructor->created_at = Carbon::now();
        $instructor->save();

        $notification = array(
            'message' => 'Instructor created successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('instructor.index')->with($notification);

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
        $instructor = Instructor::find($id);
        return view('backend.admin.instructor.edit',compact('instructor'));
    }

    public function view($id)
    {
        $instructor = instructor::find($id);
        return view('backend.admin.instructor.view',compact('instructor'));
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
            'course_name' => 'required',
            'instructor_name' => 'required',
            'department' => 'required',
            'experience' => 'required',
            'study' => 'required',
            'facebook_link' => 'required',
            'whatsapp_link' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
    
        $instructor = Instructor::find($id);
    
        if($request->hasFile('image')){
            // Deleting previous image if exists
            if(file_exists($instructor->image)){
                unlink($instructor->image);
            }
        
            // Processing and saving the new image
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/instructor/'), $name_gen);
            $instructor_img = 'upload/instructor/' . $name_gen;
        }else{
            // If no new image uploaded, keep the old one
            $instructor_img = $instructor->image;
        }
        
     
        $instructor->course_name = $request->course_name;
        $instructor->instructor_name = $request->instructor_name;
        $instructor->department = $request->department;
        $instructor->experience = $request->experience;
        $instructor->study = $request->study; // Add this line
        $instructor->facebook_link = $request->facebook_link;
        $instructor->whatsapp_link = $request->whatsapp_link;
        $instructor->status = $request->status;
        $instructor->image = $instructor_img;
        $instructor->updated_at = Carbon::now();
        $instructor->save();
        
        $notification = [
            'message' => 'Instructor updated successfully.', 
            'alert-type' => 'success'
        ];
        
        return redirect()->route('instructor.index')->with($notification);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);

        try {
            if(file_exists($instructor->image)){
                unlink($instructor->image);
            }
        } catch (Exception $e) {

        }

        $instructor->delete();

        $notification = array(
            'message' => 'Instructor Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id){
        $instructor = Instructor::find($id);
        $instructor->status = 1;
        $instructor->save();

        $notification = array(
            'message' => 'Instructor Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $instructor = Instructor::find($id);
        $instructor->status = 0;
        $instructor->save();

        $notification = array(
            'message' => 'Instructor Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
