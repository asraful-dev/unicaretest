<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Carbon;
use Image;
use Session;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::orderBy('id','desc')->get();
        return view('backend.admin.material.index',compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.material.create');
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
            'book_title' => 'required',
            'author' => 'required',
            'related_topics' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        
        if($request->hasfile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(192,254)->save('upload/material/'.$name_gen);
            $image = 'upload/material/'.$name_gen;
        }else{
            $image = $request->image;
        }

        $material = new Material();
        $material->book_title = $request->book_title;
        $material->author = $request->author;
        $material->related_topics = $request->related_topics;
        $material->status = $request->status;
        $material->image = $image;
        $material->created_at = Carbon::now();
        $material->save();

        $notification = array(
            'message' => 'Material created successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('material.index')->with($notification);

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
        $material = Material::find($id);
        return view('backend.admin.material.edit',compact('material'));
    }

    public function view($id)
    {
        $material = Material::find($id);
        return view('backend.admin.material.view',compact('material'));
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
            'book_title' => 'required',
            'author' => 'required',
            'related_topics' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
    
        $material = Material::find($id);
    
        if($request->hasFile('image')){
            // Deleting previous image if exists
            if(file_exists($material->image)){
                unlink($material->image);
            }
        
            // Processing and saving the new image
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/material/'), $name_gen);
            $material_img = 'upload/material/' . $name_gen;
        }else{
            // If no new image uploaded, keep the old one
            $material_img = $material->image;
        }
        
        $material->book_title = $request->book_title;
        $material->author = $request->author;
        $material->related_topics = $request->related_topics;
        $material->status = $request->status;
        $material->image = $material_img;
        $material->updated_at = Carbon::now();
        $material->save();
        
        $notification = [
            'message' => 'Material updated successfully.', 
            'alert-type' => 'success'
        ];
        
        return redirect()->route('material.index')->with($notification);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::findOrFail($id);

        try {
            if(file_exists($material->image)){
                unlink($material->image);
            }
        } catch (Exception $e) {

        }

        $material->delete();

        $notification = array(
            'message' => 'Material Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id){
        $material = Material::find($id);
        $material->status = 1;
        $material->save();

        $notification = array(
            'message' => 'Material Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $material = Material::find($id);
        $material->status = 0;
        $material->save();

        $notification = array(
            'message' => 'Material Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
