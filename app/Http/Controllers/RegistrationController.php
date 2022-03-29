<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function registrationPage()
    {
        return view('registration');
    }

    public function registrationUser(Request $request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $request->validate([
            'name' => 'required',
            'email' => 'email:rfc,dns',
            'password' => 'required|min:5',
        ]);

        User::query()->create($data);
        return redirect()->route('login');
    }
}
