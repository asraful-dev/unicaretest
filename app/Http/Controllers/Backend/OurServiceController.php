<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurService;
use App\Models\Unit;
use App\Models\Wallet;
use App\Models\ExtraFacility;
use App\Models\ServiceDetail;
use Illuminate\Support\Carbon;
use Image;
use Session;

class OurServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        dd($request->all());
       
        // $request->validate([
        //     'unit' => 'required|integer',
        //     'subject.*' => 'required|string',
        //     'total_class.*' => 'required|integer',
        //     'exam_test.*' => 'required|string',
        //     'count.*' => 'required|integer',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'one_facility' => 'nullable|string',
        //     'two_facility' => 'nullable|string',
        //     'three_facility' => 'nullable|string',
        //     'status' => 'required|boolean',
        // ]);
        
        // Validation পাস হলে মাত্র ডাটা সেভ হবে
        if($request->hasfile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1170,482)->save('upload/OurService/'.$name_gen);
            $image = 'upload/OurService/'.$name_gen;
        }else{
            $image = $request->image;
        }
        
        $ourService = new OurService();
        $ourService->unit = $request->unit;
        $ourService->one_facility = $request->one_facility;
        $ourService->two_facility = $request->two_facility;
        $ourService->three_facility = $request->three_facility;
        $ourService->price = $request->price;
        $ourService->discount_price = $request->discount_price;
        $ourService->course_type = $request->course_type;
        $ourService->status = $request->status;
        $ourService->image = $image;
        $ourService->created_at = Carbon::now();
        $ourService->save();

        foreach ($request->subject as $key => $subject) {
            // যদি কোনও প্রয়োজনীয় ফিল্ডগুলি খালি থাকে, তবে এই ইটারেশন স্কিপ করুন
            if (empty($subject) || empty($request->total_class[$key]) || empty($request->exam_test[$key]) || empty($request->count[$key])) {
                continue;
            }
        
            // মান থাকলে ServiceDetail রেকর্ড তৈরি করুন
            ServiceDetail::create([
                'our_service_id' => $ourService->id,
                'subject' => $subject,
                'total_class' => $request->total_class[$key],
                'exam_test' => $request->exam_test[$key],
                'count' => $request->count[$key],
            ]);
        }
        
        $notification = array(
            'message' => 'Service Inserted Successfully.', 
            'alert-type' => 'success'
        );
        
        return back()->with($notification);
        
    }


    public function index()
    {
        $OurService = OurService::orderBy('id', 'desc')->where('unit', '1')->get();

        return view('backend.admin.OurService.index',compact('OurService'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $units = Unit::all();
        return view('backend.admin.OurService.create',compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

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
        $OurService = OurService::find($id);
        return view('backend.admin.OurService.edit',compact('OurService'));
    }

    public function view($id)
    {
        $OurService = OurService::find($id);
        return view('backend.admin.OurService.view',compact('OurService'));
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
        $OurService = OurService::find($id);

        if($request->hasFile('image')){
            // Deleting previous image if exists
            if(file_exists($OurService->image)){
                unlink($OurService->image);
            }
        
            // Processing and saving the new image
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/OurService/'), $name_gen);
            $OurService_img = 'upload/OurService/' . $name_gen;
        }else{
            // If no new image uploaded, keep the old one
            $OurService_img = $OurService->image;
        }
        
        // Update OurService instance properties
        $OurService->total_student = $request->total_student;
        $OurService->chance_student = $request->chance_student;
        $OurService->course_type = $request->course_type;
        $OurService->status = $request->status;
        $OurService->image = $OurService_img;
        $OurService->updated_at = now();
        $OurService->save();
        
        $notification = array(
            'message' => 'OurService updated OurServicefully.', 
            'alert-type' => 'OurService'
        );
        
        return redirect()->route('OurService.index')->with($notification);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $OurService = OurService::findOrFail($id);

        try {
            if(file_exists($OurService->image)){
                unlink($OurService->image);
            }
        } catch (Exception $e) {

        }

        $OurService->delete();

        $notification = array(
            'message' => 'OurService Deleted OurServicefully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id){
        $OurService = OurService::find($id);
        $OurService->status = 1;
        $OurService->save();

        $notification = array(
            'message' => 'OurService Active OurServicefully.',
            'alert-type' => 'OurService'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $OurService = OurService::find($id);
        $OurService->status = 0;
        $OurService->save();

        $notification = array(
            'message' => 'OurService Disabled OurServicefully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function createWallet(){
        return view('backend.admin.wallet.create');
    }
    public function updateWallet(Request $request, $id){

       
        $request->validate([
            'bkash' => 'required|digits:11',
            'nagad' => 'required|digits:11',
            'rocket' => 'required|digits:11',
        ]);
        $wallet  = Wallet::find($id);
        $wallet->bkash = $request->bkash;
        $wallet->nagad = $request->nagad;
        $wallet->rocket = $request->rocket;
        $wallet->updated_at = now();
        $wallet->save();

        $notification = array(
            'message' => 'Wallet Updated Successfully.', 
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }
}
