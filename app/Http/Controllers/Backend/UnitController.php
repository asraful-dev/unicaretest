<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Carbon;
use Image;
use Session;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::latest()->get();
        return view('backend.admin.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'unit_name' => 'required',
            'unit_image' => 'required',
        ]);

        if($request->hasfile('unit_image')){
            $image = $request->unit_image;
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1770,765)->save('upload/unit/'.$name_gen);
            $save_url = 'upload/unit/'.$name_gen;
        }else{
            $save_url = '';
        }

        $unit = new Unit();
        $unit->unit_name = $request->unit_name;
        if($request->status == Null){
            $request->status = 0;
        }
        $unit->status = $request->status;
        $unit->unit_image = $save_url;
        $unit->created_at = Carbon::now();

        $unit->save();


        $notification = array(
            'message' => 'Unit Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('unit.index')->with($notification);
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
        $unit = Unit::find($id);
        return view('backend.admin.unit.edit',compact('unit'));
    }
    public function view($id)
    {
        $unit = Unit::find($id);
        return view('backend.admin.unit.view',compact('unit'));
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
        $unit = Unit::find($id);

        if($request->hasfile('unit_image')){
            try {
                if(file_exists($unit->unit_image)){
                    unlink($unit->unit_image);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('unit_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1770,765)->save('upload/unit/'.$name_gen);
            $unit_image = 'upload/unit/'.$name_gen;
        }else{
            $unit_image = $unit->unit_image;
        }




        $unit->unit_name = $request->unit_name;
    
       if($request->status == Null){
            $request->status = 0;
        }

        $unit->status = $request->status;

        $unit->unit_image = $unit_image;

        $unit->updated_at = Carbon::now();

        $unit->save();

        $notification = array(
            'message' => 'unit Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('unit.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $unit = Unit::findOrFail($id);

        try {
            if(file_exists($unit->unit_image)){
                unlink($unit->unit_image);
            }
        } catch (Exception $e) {

        }

        $unit->delete();

        $notification = array(
            'message' => 'Unit Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    public function active($id){
        $unit = Unit::find($id);
        $unit->status = 1;
        $unit->save();

        $notification = array(
            'message' => 'unit Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $unit = Unit::find($id);
        $unit->status = 0;
        $unit->save();

        $notification = array(
            'message' => 'Unit Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
