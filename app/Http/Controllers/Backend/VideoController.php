<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Carbon;
use Image;
use Session;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('id','desc')->get();
        return view('backend.admin.video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.admin.video.create');
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
            'video_url' => 'required',
            'teacher_qualification' => 'required',
            'about_class' => 'required',
            'publish_date' => 'required',
            'status' => 'required',
        ]);

        $video = new Video();
        $video->video_url = $request->video_url;
        $video->teacher_qualification = $request->teacher_qualification;
        $video->about_class = $request->about_class;
        $video->publish_date = $request->publish_date;
        $video->status = $request->status;
        $video->save();
        
        $notification = array(
            'message' => 'Video created successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('video.index')->with($notification);


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
        $video = Video::find($id);
        return view('backend.admin.video.edit',compact('video'));   
    }

    public function view($id)
    {
        $video = Video::find($id);
        return view('backend.admin.video.view',compact('video'));
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
        $video = Video::find($id);
        
        $video->video_url = $request->video_url;
        $video->teacher_qualification = $request->teacher_qualification;
        $video->about_class = $request->about_class;
        $video->publish_date = $request->publish_date;
        $video->status = $request->status;
        $video->save();
        
        
        $notification = array(
            'message' => 'Video Updated successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('video.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        $notification = array(
            'message' => 'Video Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id){
        $video = Video::find($id);
        $video->status = 1;
        $video->save();

        $notification = array(
            'message' => 'Video Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $video = Video::find($id);
        $video->status = 0;
        $video->save();

        $notification = array(
            'message' => 'Video Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
