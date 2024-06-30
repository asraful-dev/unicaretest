<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Pages;
use App\Models\Blog;
use App\Models\Payment;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\OurService;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Wallet;
use App\Models\About;
use App\Models\Service;
use App\Models\Product;
use App\Models\Property;
use App\Models\Tour;
use Carbon\Carbon;
use Image;


class PaymentController extends Controller
{
    
   
    public function process(Request $request)
    {  
        // dd($request->all());
        
        // $request->validate([
        //     'user_id' => 'required|integer',
        //     'payment_method' => 'required|string',
        //     'email' => 'required|email',
        //     'sender_number' => 'required|numeric',
        //     'total_amount' => 'required|numeric',
        //     'transaction_id' => 'required|string',
        //     'screenshot' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // Handle file upload
        if($request->hasfile('screenshot')){
            $screenshot = $request->file('screenshot');
            $name_gen = hexdec(uniqid()).'.'.$screenshot->getClientOriginalExtension();
            Image::make($screenshot)->resize(500,700)->save('upload/payment/'.$name_gen);
            $screenshot = 'upload/payment/'.$name_gen;
        }else{
            $screenshot = $request->screenshot;
        }
      
        // Create new payment record
        $payment = new Payment();
        $payment->user_id = $request->user_id;
        $payment->payment_method = $request->payment_method;
        $payment->email = $request->email;
        $payment->sender_number = $request->sender_number;
        $payment->total_amount = str_replace(',', '', $request->total_amount); // removing commas
        $payment->transaction_id = $request->transaction_id;
        $payment->unit = $request->unit;
        $payment->course_status = $request->course_status;
        $payment->screenshot = $screenshot;
        $payment->save();

        $notification = array(
            'message' => 'Payment Insert Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('payment.success')->with($notification);
    }



    public function index()
    {
        //
    }
    public function paymentDetails()
    {   $payment = Payment::all();
        // dd($payment);
        
        return view('frontend.payment.details',compact('payment'));
    }

    public function paymentSuccess()
    {
     return view('frontend.payment.success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::findOrfail($id);
        return view('frontend.payment.show',compact('payment'));
    }

    public function changeStatus($id)
    {
        // Find the payment record by ID
        $payment = Payment::find($id);

        if ($payment) {
            // Toggle the payment status
            $payment->payment_status = !$payment->payment_status;
            $payment->save();

            // Redirect back with success message
            $notification = array(
                'message' => 'Payment status updated successfully.', 
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

        // Redirect back with error message if payment not found
        $notification = array(
            'message' => 'Payment record not found.', 
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function active($id){

        $payment = Payment::find($id);
        $payment->payment_status = 1;
        $payment->save();

        $notification = array(
            'message' => 'payment Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $payment = Payment::find($id);
        $payment->payment_status = 0;
        $payment->save();

        $notification = array(
            'message' => 'payment Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
