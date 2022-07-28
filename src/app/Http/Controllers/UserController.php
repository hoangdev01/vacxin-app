<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function getUser() {
		$users = User::paginate(10);
		return view('admin.user.user', ['users' => $users]);
	}

	public function changeRole($id) {
		$user = User::find($id);
		if ($user ==null) {
			return abort(404);
		}else {
			return response()->json([
				'message' => false,
				'data' => $user
			]);
		}
	}

	public function updateRole(Request $request, $id) {
		$state = User::find($id);
		$state->active = $request->change;
		$state->save();
		return response()->json([
			'message' =>false
		]);
	}

	public function edit($id) {
		$user = User::find($id);
		if ($user ==null) {
			return abort(404);
		}
		else {
			return view('admin.user.edit', ['user' => $user]);
		}
	}

	public function update(UpdateUserRequest $request, $id) {
		$user = User::find($id);
		$user->fullname = $request->fullname;
		$user->address = $request->address;
		$user->phone = $request->phone;
		$user->save();
		return response()->json([
			'message' => false
		]);
	}

	public function create() {
		return view('admin.user.add');
	}

	public function store(StoreUserRequest $request) {
		$data = array();
		$data['fullname'] = $request->fullname;
		$data['address'] = $request->address;
		$data['email'] = $request->email;
		$data['password'] = Hash::make($request->password);
		$data['phone'] = $request->phone;
		$data['role'] = 0;
		return User::create($data);
	}

	public function delete($id){
		$post = User::find($id)->delete();
		return response()->json([
			'message' => 'Xoa thanh cong'
		]);
	}
}
