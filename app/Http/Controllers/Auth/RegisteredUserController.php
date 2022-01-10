<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\Student;
use App\Models\UserAdmin;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => 'required',
            'nif' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);



        $student = new Student;
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->username = str_replace(' ', '', strtolower($student->name.$student->surname).substr(time(), -4));
        $student->telephone = $request->input('telephone');
        $student->nif = $request->input('nif');

        $student->save();
        $student = $student->fresh();

        $user = new User;
        $user->name = $student->name;
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->userable_id = $student->id;
        $user->userable_type = 'student';

        $user->save();
        $user = $user->fresh();

        $student->user_id = $user->id;
        $student->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
