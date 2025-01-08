<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = RouteServiceProvider::HOME;

        /**
     * Redirect users after login based on their roles.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    // protected function authenticated(Request $request, $user)
    // {
    //     if ($user->hasRole('admin')) {
    //         // Redirect admins to the admin dashboard
    //         return redirect('/admin');
    //     } elseif ($user->hasRole('seller')) {
    //         // Redirect sellers to their item listing page
    //         return redirect('/seller/items');
    //     } else {
    //         // Default redirection for other users
    //         return redirect('/seller/items');
    //     }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::make([
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        // Assign the user role by default
        // Assign the seller role if the user registers as a seller
        if (isset($data['is_seller'])) {
            $user->assignRole('seller'); // Ensure 'seller' role exists
        }

        try{
            Mail::to($user->email)->send(new WelcomeMail($user));

            // Check if there were any failures
            if (count(Mail::failures()) > 0) {
                throw new Exception("Email sending failed.");
                return null;
            }

            // Save the user only if email is successfully sent
            $user->save();
            $user->sendEmailVerificationNotification();

            return $user;
        }catch (Exception $e) {
            // Handle the error, log, or return a response
            \Log::error('User registration failed due to email error: ' . $e->getMessage());
            return null; // Or handle the failure response accordingly
        }

        if ($user) {
            Auth::login($user);
        } else {
            return redirect()->back()->withErrors(['error' => 'User registration failed.']);
        }

        \Log::info('User object:', ['user' => $user]);
    }
}
