<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;
    /**
     * show login form for admin guard
     *
     * @return void
     */

    public function showLoginForm()
    {
        if (Auth::guard('admin')->user()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin::auth.sign-in');
    }

    /**
     * login admin
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {

        // Validate Login Data
        $request->validate([
            'username' => 'required|max:50',
            'password' => 'required',
        ]);

        // Attempt to login
        $user = Admin::withTrashed()->where((filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username'), $request->username)->first();

        if ($user) {
            // Check if the user is soft deleted
            if ($user->trashed()) {
                // Logout the user and display an error message
                Auth::guard('admin')->logout();
                session()->flash('error', 'This account has been disabled, please contact the administrator.');
                return redirect()->back();
            } else {
                // Attempt to authenticate the user
                if (Auth::guard('admin')->attempt([(filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username') => $request->username, 'password' => $request->password])) {
                    // Redirect to dashboard
                    session()->flash('success', 'Successfully Logged in!');
                    return request()->returnUrl ? redirect()->to(request()->returnUrl) : redirect()->route('admin.dashboard');
                } else {
                    // Authentication failed, display an error message
                    session()->flash('error', 'Invalid credentials.');
                    return redirect()->back();
                }
            }
        } else {
            // User does not exist, display an error message
            session()->flash('error', 'Invalid credentials.');
            return redirect()->back();
        }
    }

    /**
     * logout admin guard
     *
     * @return void
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
