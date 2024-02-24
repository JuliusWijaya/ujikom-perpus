<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $title = "Pengguna";

        return view('users.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Pengguna";

        return view('users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validate = $request->validated();

        User::create($validate);
        Session::flash('message', 'Pengguna baru berhasil ditambahkan!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $title = "Edit user " . $user->name;
        return view('users.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $validate = $request->validated();
        // dd($validate);
        User::where('id', $user->id)
            ->update($validate);
        Session::flash('message', $user['name'] . ' berhasil di edit!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('message', $user['name'] . ' berhasil di delete!');
        Session::flash('alert-class', 'alert-success');
        return back();
    }
}
