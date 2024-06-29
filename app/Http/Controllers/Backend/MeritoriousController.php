<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meritorious;
use Illuminate\Support\Carbon;
use Image;
use Session;

class MeritoriousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meritorious = Meritorious::orderBy('id','desc')->get();
        return view('backend.admin.meritorious.index',compact('meritorious'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.meritorious.create');
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
            'name' => 'required',
            'admission_exam' => 'required',
            'achieve_place' => 'required',
            'comment_of_meritorious' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        
        if($request->hasfile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1170,482)->save('upload/meritorious/'.$name_gen);
            $image = 'upload/meritorious/'.$name_gen;
        }else{
            $image = $request->image;
        }

        $meritorious = new Meritorious();
        $meritorious->name = $request->name;
        $meritorious->admission_exam = $request->admission_exam;
        $meritorious->achieve_place = $request->achieve_place;
        $meritorious->comment_of_meritorious = $request->comment_of_meritorious;
        $meritorious->status = $request->status;
        $meritorious->image = $image;
        $meritorious->created_at = Carbon::now();
        $meritorious->save();

        $notification = array(
            'message' => 'meritorious created successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('meritorious.index')->with($notification);

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
        $meritorious = Meritorious::find($id);
        return view('backend.admin.meritorious.edit',compact('meritorious'));
    }

    public function view($id)
    {
        $meritorious = Meritorious::find($id);
        return view('backend.admin.meritorious.view',compact('meritorious'));
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
        $meritorious = Meritorious::find($id);

        if($request->hasFile('image')){
            // Deleting previous image if exists
            if(file_exists($meritorious->image)){
                unlink($meritorious->image);
            }
        
            // Processing and saving the new image
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/meritorious/'), $name_gen);
            $meritorious_img = 'upload/meritorious/' . $name_gen;
        }else{
            // If no new image uploaded, keep the old one
            $meritorious_img = $meritorious->image;
        }
        
        // Update Meritorious instance properties
        $meritorious->name = $request->name;
        $meritorious->admission_exam = $request->admission_exam;
        $meritorious->achieve_place = $request->achieve_place;
        $meritorious->comment_of_meritorious = $request->comment_of_meritorious;
        $meritorious->status = $request->status;
        $meritorious->image = $meritorious_img;
        $meritorious->updated_at = now();
        $meritorious->save();
        
        $notification = array(
            'message' => 'Meritorious updated successfully.', 
            'alert-type' => 'success'
        );
        
        return redirect()->route('meritorious.index')->with($notification);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meritorious = Meritorious::findOrFail($id);

        try {
            if(file_exists($meritorious->image)){
                unlink($meritorious->image);
            }
        } catch (Exception $e) {

        }

        $meritorious->delete();

        $notification = array(
            'message' => 'Meritorious Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id){
        $meritorious = Meritorious::find($id);
        $meritorious->status = 1;
        $meritorious->save();

        $notification = array(
            'message' => 'Meritorious Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $meritorious = Meritorious::find($id);
        $meritorious->status = 0;
        $meritorious->save();

        $notification = array(
            'message' => 'Meritorious Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
