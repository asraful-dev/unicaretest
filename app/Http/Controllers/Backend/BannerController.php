<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Banner;
use Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $banners = Banner::all(); 
        return view('backend.admin.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('backend.admin.banner.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        if($image){
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1770,765)->save('upload/banner/' . $name_gen);
            $save_url = 'upload/banner/' . $name_gen;
        } else {
            $save_url = '';
        }
        
        $banner = Banner::create([
            'category_id' => $request->category_id,
            'image' => $save_url,
            'status' => $request->status,
            'created_at' => now(),
        ]);
        
        if($banner){
            $notification = [
                'message' => 'Banner Inserted Successfully',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'Failed to insert banner',
                'alert-type' => 'error'
            ];
        }
        
        return redirect()->route('banner.index')->with($notification);
        
    
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $categories = Category::latest()->get();
        return view('backend.admin.banner.edit', compact('banner', 'categories'));
    }

    public function update(Request $request, $id)
{
   
    $banner = Banner::findOrFail($id);



    if($request->hasfile('image')){
        try {
            if(file_exists($banner->image)){
                unlink($banner->image);
            }
        } catch (Exception $e) {

        }
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1770,765)->save('upload/banner/'.$name_gen);
        $image = 'upload/banner/'.$name_gen;
    }else{
        $image = $banner->image;
    }

  

    $banner->image = $image;
    $banner->category_id = $request->category_id;
    $banner->status = $request->status;
    $banner->updated_at = Carbon::now();

    $banner->save();
    $notification = array(
        'message' => 'Banner Updated Successfully.', 
        'alert-type' => 'error'
    );

    return redirect()->route('banner.index')->with('success', 'Banner updated successfully.');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
       
        $banner->delete();

        $notification = array(
            'message' => 'Banner Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $banner = Banner::find($id);
        $banner->status = 1;
        $banner->save();

        $notification = array(
            'message' => 'Banner Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $banner = banner::find($id);
        $banner->status = 0;
        $banner->save();

        $notification = array(
            'message' => 'banner Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $banner = banner::find($id);
        return view('backend.admin.banner.view', compact('banner'));
    }
}
