<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    // Login View Controller
    public function getLogin()
    {
        if(Auth::check()){
            return redirect()->intended('/')
            ->withSuccess('Signed in');
        }
        return view('auth.login');
    }

    // Login Validator Controller
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                        ->withSuccess('Signed in');
        }

        return redirect(route('login'))->with('error', 'Login failed Access Denied');
    }

    public function getRegister()
    {
        if(Auth::check()){
            return redirect()->intended('/')
            ->withSuccess('Signed in');
        }
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        if(!$check){
            return redirect(route('register'))->with('error', 'Something went wrong Please try again');
        }
        return view('auth.login');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect(route('index'));
    }
}
