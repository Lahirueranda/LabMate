<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        if(auth()->check() ) {
            return redirect()->intended('/dashboard');
        }
        
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validation logic here

     
      


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        $labs = Lab::all();
        return view('auth.register', compact('labs'));
    }


    public function register_admin()
    {
        $labs = Lab::all();
        return view('auth.register_admin', compact('labs'));
    }

    




    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'lab_id' => 'required|exists:labs,id',
            'nic' => 'required|string|max:20',
            'course_name' => 'required|string|max:255',
            'university_program' => 'required|string|max:255',
            'degree_name' => 'required|string|max:255',
            'faculty_name' => 'required|string|max:255',
           
        ];
        $messages = [
            'lab_id.exists' => 'Invalid lab selected.',
            
        ];
            $validator = Validator::make($request->all(), $rules, $messages);

    // If validation fails, return with errors
    if ($validator->fails()) {
        return redirect('register')
            ->withErrors($validator)
            ->withInput();
    }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'lab_id' => $request->input('lab_id'),
            'nic' => $request->input('nic'),
            'course_name' => $request->input('course_name'),
            'university_program' => $request->input('university_program'),
            'degree_name' => $request->input('degree_name'),
            'faculty_name' => $request->input('faculty_name'),
        ]);
    
        // Auth::login($user);
    
        return redirect('/dashboard')->with('success', 'Registration successful! Welcome to the community.');
    
    }

    public function add_admin_register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'lab_id' => 'required|exists:labs,id',
            'nic' => 'required|string|max:20',
        ];
        $messages = [
            'lab_id.exists' => 'Invalid lab selected.',
            
        ];
            $validator = Validator::make($request->all(), $rules, $messages);

    // If validation fails, return with errors
    if ($validator->fails()) {
        return redirect('register_admin')
            ->withErrors($validator)
            ->withInput();
    }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'lab_id' => $request->input('lab_id'),
            'nic' => $request->input('nic'),
            'course_name' => $request->input('course_name'),
            'role' => $request->input('admin'),
            
        ]);
        return redirect('/dashboard')->with('success', 'Registration successful! Welcome to the community.');
    }

    
    

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
