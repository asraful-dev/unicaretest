<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Category;
use App\Models\Payment;
use App\Models\OurService;
use Auth;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminDashboard()
    {
        return view('backend.body.dashboard');
    } // End Method


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
    public function profileView()
    {  
        return view('backend.admin.profile_view',['user' => Auth::user()]);
    }
    public function profileUpdate(Request $request)
    {  
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
    
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/profile_images');
            $image->move($destinationPath, $name);
            $user->photo = 'profile_images/'.$name;
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function passwordUpdate(Request $request)
    {  
        // Validate the request data
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $notification = array(
            'message' => 'The provided old password does not match your current password', 
            'alert-type' => 'error'
        );
    
        // Check if the old password matches the user's current password
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect()->back()->with($notification);
        }
    
        // Update the user's password
        Auth::user()->password = Hash::make($request->password);
        Auth::user()->save();
    
        $notification = array(
            'message' => 'Your password has been successfully updated.', 
            'alert-type' => 'success'
        );
    
        // Invalidate the user's current session
        Auth::logout();
    
        // Redirect to the login page with success message
        return redirect()->route('login')->with($notification);
    }

    public function UserProfileStore(Request $request){
       
        // Validate the request data
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required', // Ensure password and confirm_password fields match
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for photo upload
        ]);

   
    
        // Process photo upload
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move('upload/user_images/', $name_gen);
            $save_url = 'upload/user_images/'.$name_gen;
        } else {
            $save_url = '';
        }
    
        // Create a new user instance
        $data = new User();
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->institute = $request->institute;
        $data->address = $request->address;
        $data->password = bcrypt($request->password); // Hash the password
        $data->photo = $save_url;
    
        // Save the user data
        $data->save();
    
        // Redirect back with success message
        $notification = array(
            'message' => 'New User added Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    
    } 

    public function UserDashboard()
    {  $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
       $id = Auth::user()->id;
       $userData = User::find($id);
       return view('frontend.user.index',compact('userData','categories'));
    }

    // student course view
    public function CourseView()
    {  $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
       $id = Auth::user()->id;
       $userData = User::find($id);
       return view('frontend.user.courseview',compact('userData','categories'));
    }
    public function courseDetails($id)
    {
        $course = Payment::find($id);
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.user.coursedetails',compact('userData','categories','course'));
     
    }

    // student profile view
    public function MyProfileView()
    { 
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.user.profileview',compact('userData','categories'));
    }

    public function myCourseView()
    { 
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(7)->get();
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.user.my_course_view',compact('userData','categories'));
    }
    
    
}
