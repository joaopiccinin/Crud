<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('name', 'email', 'profession', 'date_birth', 'id')->get();
        
        foreach($users as $user) {
            $user->date_birth = Carbon::parse($user->date_birth)->format('d/m/Y');
        }

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {   
        $validated = $request->validate( [
            'name' => ['required', 'min:10'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'profession' => ['required'],
            'date_birth' => ['required', 'date'],
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->profession = $request->profession;
        $user->date_birth = $request->date_birth;
        $user->save();

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::select('name', 'date_birth', 'profession', 'id')->where('id', $id)->first();
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update(['name'=>$request->name, 'profession'=>$request->profession, 'date_birth'=>$request->date_birth]);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
