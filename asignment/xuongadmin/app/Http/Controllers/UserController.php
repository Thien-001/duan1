<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view("user.login");
    }

    public function showUsers()
{
    $listuser = User::all();
        $data = [
            'listuser' => $listuser,
        ];
        return view('admin.user', $data);
    // return view('admin.user');
}
public function addformu()
    {
        return view('form.adduser');
    }
    public function addUser(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'role' => 'required|in:admin,khách hàng',
    ]);

    User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'role' => $request->input('role'),
    ]);

    return redirect('/admin/user')->with('success', 'Thêm người dùng thành công!');
}
public function edit($id)
{
    $user = User::findOrFail($id);
    return view('form.updateuser', compact('user'));
}

public function upuser(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:6',
        'role' => 'required|string'
    ]);

    $user = User::findOrFail($id);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect('/admin/user')->with('success', 'Cập nhật người dùng thành công!');
}

public function delete($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect('/admin/user')->with('success', 'Xóa người dùng thành công!');
}
    public function postLogin(Request $request){
        $isLogin = Auth::attempt(['email' => $request->email,
                        'password' => $request->password]);
        if ($isLogin){
            if (Auth::user()->role == 'admin'){
                return redirect('/admin');
            } else {
                return redirect('/');
            };
        }
    }
    public function register(){
        return view("user.register");
    }
    /**
     * Display a listing of the resource.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function index()
    {
        $userList = User::all();
        return response()->json([
            'success' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $userList
        ],200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->get();

        if (!$user){
            $user = New User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role = $request->role;
            if ($user->save()){
                return response()->json([
                    'success' => true,
                    'message' => 'Đã thêm tài khoản thành công',
                ],201);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Có lỗi khi thêm tài khoản',
                ],422);
            }
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Email đã tồi tại',
            ],422);
        }
    }

    /**
     * Display the specified resource.
     */
    // api/user/{id}
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if ($request->name){
            $user->name = $request->name;
        }

        if ($request->email){
        $user->email = $request->email;
        }

        if ($request->password){
        $user->password = Hash::make($request->password);
        }

        if ($request->name){
        $user->role = $request->role;
        }

        if ($user->save()){
            return response()->json([
                'success' => true,
                'message' => 'Cập nhật tài khoản thành công',
                'user' => $user
            ],200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Cập nhật tài khoản thất bại',
            ],422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Xóa tài khoản thành công',
        ],200);
    }
}
