<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Helpers\FormatResponseJson;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;

class UsersManagementsController extends Controller
{
    public function index() {
        return view("pages.users-management.index");
    }
    
    public function fetchUser() {
        try {
            $users = User::with('roles')->limit(100)->get();
            // print_r($users[0]['roles']);
            return FormatResponseJson::success($users, 'User successfully fetched');
        } catch (\Throwable $th) {
            return FormatResponseJson::error($th->getMessage());
        }
    }

    public function createUser() {
        try {
            $roles = Role::all();
            return FormatResponseJson::success($roles,'roles successfully fetched');
        } catch (\Throwable $th) {
            return FormatResponseJson::error($th->getMessage(), 'Failed to get data');
        }
    }

    public function storeUser(UserCreateRequest $request) {
        try {
            // $request->all()
            $user = User::create([
                'username'=> $request->username,
                'firstname'=> $request->firstname,
                'lastname'=> $request->lastname,
                'email'=> $request->email,
                'password'=> Hash::make('pass12345'),
            ]);
            $user->assignRole($request->roles);
            return FormatResponseJson::success($user,'User successfully created');
        } catch (\Throwable $th) {
            return FormatResponseJson::error($th->getMessage(), 'Failed to create data');
        }
    }

    public function detailUser(Request $request) {
        try {
            $id = $request->get('id');
            // $detail_user = DB::table('users')->where('id', $id)->first();
            $roles = Role::all();
            // dd($roles);
            $detail_user = User::with('roles')->where('users.id', $id)->first();
            return FormatResponseJson::success([$detail_user, $roles], 'Detail user successfully fetched');
        } catch (\Throwable $th) {
            return FormatResponseJson::error($th->getMessage(), 'Failed to fetch data');
        }
    }

    public function updateUser(UserUpdateRequest $request) {
        try {
            $users = User::where('id', $request->id)->first();
            $users->update([
                'username'=> $request->username,
                'firstname'=> $request->firstname,
                'lastname'=> $request->lastname,
            ]);
            // $users->firstname = $request->firstname;
            // $users->lastname = $request->lastname;
            // $users->username = $request->username;
            // $users->save();

            $users->removeRole($request->current_role);
            $users->assignRole($request->roles);

            return FormatResponseJson::success($users,'User successfully updated');
        } catch (\Throwable $th) {
            return FormatResponseJson::error($th->getMessage(), 'Failed to update data');
        }
    }
}
