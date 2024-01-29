<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        $title = 'Регистрация';
        return view('user.create', compact('title'));
    }

    public function store(Request $request)
    {
        // Добавьте сохранение даты рождения в куки
     
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image',
        ]);

        if ($request->hasFile('avatar')) {
            $folder = date('Y-m-d');
            $avatar = $request->file('avatar')->store("images/{$folder}");
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar ?? null,
        ]);

        Auth::login($user);

        session()->flash('success', 'Регистрация пройдена');

        return redirect()->route('home');
    }

    public function loginCreate()
    {
        $title = 'Авторизация';
        return view('user.login.create', compact('title'));
    }

    public function loginStore(Request $request)
    {
        if ($request->has('dob')) {
            $dob = $request->input('dob');
            setcookie('dob', $dob, time() + (86400 * 30), "/");
        }
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            return redirect()->route('home')->with('success', 'Авторизация пройдена');
        }

        return redirect()->back()->with('error', 'Некорректный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.create');
    }
}
