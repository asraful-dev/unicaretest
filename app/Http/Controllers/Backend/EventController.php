<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Carbon;
use Image;
use Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('backend.admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('backend.admin.event.create');
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
            'event_title' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(418,386)->save('upload/event/' . $name_gen);
            $image = 'upload/event/' . $name_gen;
        } else {
            $image = $request->image;
        }

        $event = new Event();
        $event->event_title = $request->event_title;
        $event->date = $request->date;
        $event->duration = $request->duration;
        $event->status = $request->status;
        $event->image = $image;
        $event->created_at = Carbon::now();
        $event->save();

        $notification = array(
            'message' => 'Event created successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('event.index')->with($notification);
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
        $event = Event::find($id);
        return view('backend.admin.event.edit', compact('event'));
    }

    public function view($id)
    {
        $event = Event::find($id);
        return view('backend.admin.event.view', compact('event'));
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
        $event = Event::find($id);

        if ($request->hasFile('image')) {
            // Deleting previous image if exists
            if (file_exists($event->image)) {
                unlink($event->image);
            }

            // Processing and saving the new image
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/event/'), $name_gen);
            $event_img = 'upload/event/' . $name_gen;
        } else {
            // If no new image uploaded, keep the old one
            $event_img = $event->image;
        }

        // Update event instance properties
        $event->event_title = $request->event_title;
        $event->date = $request->date;
        $event->duration = $request->duration;
        $event->status = $request->status;
        $event->image = $event_img;
        $event->updated_at = now();
        $event->save();

        $notification = array(
            'message' => 'Event updated successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('event.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        try {
            if (file_exists($event->image)) {
                unlink($event->image);
            }
        } catch (Exception $e) {
            // Handle exception if needed
        }

        $event->delete();

        $notification = array(
            'message' => 'Event Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        $event = Event::find($id);
        $event->status = 1;
        $event->save();

        $notification = array(
            'message' => 'Event Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        $event = Event::find($id);
        $event->status = 0;
        $event->save();

        $notification = array(
            'message' => 'Event Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
