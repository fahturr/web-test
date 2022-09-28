<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebController extends Controller
{
    public function showUsers()
    {
        $users = User::all();

        return view('users')
            ->with('title', 'Menu Users')
            ->with(compact('users'));
    }

    public function showAddUsers()
    {
        return view('add_users')->with('title', 'Add User');
    }

    public function createUsers(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6']
        ]);

        $user = User::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => password_hash($request->post('password'), PASSWORD_DEFAULT)
        ]);

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

        return redirect()->route('menu.users')
            ->with('class', $class)
            ->with('type', $type)
            ->with('message', $message);
    }

    public function showEditUsers($id)
    {
        $user = User::find($id);

        return view('edit_users')
            ->with('title', 'Edit User')
            ->with('user', $user);
    }

    public function updateUsers(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'min:4'],
            'old_password' => ['required', 'min:6', 'current_password'],
            'new_password' => ['required', 'min:6', 'different:old_password']
        ]);

        $user = User::find($id)->update([
            'name' => $request->post('name'),
            'password' => $request->post('new_password')
        ]);

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

        return redirect()->route('menu.users')
            ->with('class', $class)
            ->with('type', $type)
            ->with('message', $message);
    }

    public function deleteUsers($id)
    {
        $user = User::find($id);

        $class = '';
        $type = '';
        $message = '';

        if ($user->delete()) {
            $class = 'success';
            $type = 'Success';
            $message = 'User has been deleted!';
        } else {
            $class = 'danger';
            $type = 'Failed';
            $message = 'User Failed to delete!';
        }

        return redirect()->route('menu.users')
            ->with('class', $class)
            ->with('type', $type)
            ->with('message', $message);
    }

    public function showProducts(Request $request)
    {
        $response = Http::post('http://103.23.235.214/kanaldata/Webservice/bank_method');
        $products = $response->json('data');


        return view('products')
            ->with('title', 'Menu Products')
            ->with(compact('products'));
    }
}
