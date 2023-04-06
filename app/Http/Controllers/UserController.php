<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('view',auth()->user());
        $users = User::all();
        return view('/admin/users/index',compact('users'));
    }

    public function create()
    {
        $this->authorize('create',auth()->user());
        $role = new Role;
        $roles = $role->getRoleList();
        return view('/admin/users/create',compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::firstOrCreate(['email'=>$data['email']],$data);
        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        $this->authorize('view',auth()->user());
        return view('/admin/users/show',compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update',auth()->user());
        $role = new Role;
        $roles = $role->getRoleList();
        return view('/admin/users/edit',compact('user','roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.users.show',$user->id);

    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
