<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login')->with('title', 'Login');
    }

    public function showRegister()
    {
        return view('register')->with('title', 'Register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        $data = [
            'email' => $request->post('email'),
            'password' => $request->post('password'),
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('menu.users');
        } else {
            return redirect()->back()
                ->with('class', 'danger')
                ->with('type', 'Failed')
                ->with('message', 'Wrong Email or Password!');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password_1' => ['required', 'min:6'],
            'password_2' => ['required', 'min:6', 'same:password_1'],
        ]);

        $data = [
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => password_hash($request->post('password_1'), PASSWORD_DEFAULT)
        ];

        $user = User::create($data);

        $class = '';
        $type = '';
        $message = '';

        if ($user) {
            $class = 'success';
            $type = 'Success';
            $message = 'User has been registered!';
        } else {
            $class = 'danger';
            $type = 'Failed';
            $message = 'User Failed to create!';
        }

        return redirect()->route('login')
            ->with('class', $class)
            ->with('type', $type)
            ->with('message', $message);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')
            ->with('class', 'success')
            ->with('type', 'Success')
            ->with('message', 'User logged out!');
    }
}
