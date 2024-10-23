<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\User;
use App\Models\Role;


use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    public function create()
    {
        $users = User::all();
        $areas = Area::all();
        $roles = Role::all();
        return view('auth.register',compact('areas','users','roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' =>  'required|digits:10',
            'address' => 'required|string|max:255',
            'area_id' => 'required|exists:areas,id',
            // 'role_id' => 'required|exists:roles,id',


        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'area_id'=> $request->area_id,
            'role_id'=> 2,

        
        ]);

    
        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false))->with('success','User Created Successfully!');
    }
}
