<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $input = $request->all();

        $request->authenticate();
        
        $request->session()->regenerate();
        
        if (Auth()->attempt(['password' => $input['password'], 'email' => $input['email']])) {
            $user = $request->user();
            $notification = [];
        
            if ($user->role === 'admin') {
                $notification = [
                    'message' => 'Admin Login Successfully',
                    'alert-type' => 'success'
                ];
                return redirect()->route('admin.dashboard')->with($notification);
            } elseif ($user->role === 'user') {
                $notification = [
                    'message' => 'User Login Successfully',
                    'alert-type' => 'success'
                ];
                return redirect()->route('user.dashboard')->with($notification);
            } else {
                // Handle other roles or default case
                $notification = [
                    'message' => 'Unauthorized access',
                    'alert-type' => 'error'
                ];
                Auth::logout();
                return redirect()->route('login')->with($notification);
            }
        } else {
            $notification = [
                'message' => 'Incorrect email or password.',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
        

        // $request->authenticate();

        // $request->session()->regenerate();
        
        // $url = '';
        // if ($request->user()->role === 'admin') {
        //     $notification = array(
        //         'message' => 'Admin Login Successfully',
        //         'alert-type' => 'success'
        //     );
        //     $url = 'admin/dashboard';
        // }elseif($request->user()->role === 'vendor'){
        //     $url = 'vendor/dashboard';
        // } else {
        //     $notification = array(
        //         'message' => 'User Login Successfully',
        //         'alert-type' => 'success'
        //     );
        //     $url = '/dashboard';
        // }


        // return redirect()->intended($url)->with($notification);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}