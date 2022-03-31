<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RegistrationController extends Controller
{
    public function registrationPage()
    {
        return view('registration');
    }

    public function registrationUser(Request $request){

        $request->validate([
            'name' => ['required','string','max:20'],
            'email' => ['required','email','max:50','unique:users'],
            'password' => ['required','min:5'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole('user');

        return redirect()->route('login');
    }
}
