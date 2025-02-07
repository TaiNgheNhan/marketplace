<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Hiển thị danh sách người dùng
    public function index()
    {
        $users = User::all();  // Lấy tất cả người dùng
        return view('users.index', compact('users'));
    }

    // Hiển thị form thêm người dùng mới
    public function create()
    {
        return view('users.create');
    }

    // Lưu người dùng mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'role' => 'required|integer|in:0,1', // Chỉ cho phép 0 (buyer) hoặc 1 (seller)
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), //  Mã hóa mật khẩu
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => (int) $request->role, // Đảm bảo là kiểu số
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    // Hiển thị form chỉnh sửa người dùng
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Cập nhật thông tin người dùng
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'role' => 'required|integer|in:0,1', // Chỉ cho phép 0 (buyer) hoặc 1 (seller)
        ]);

        // Cập nhật dữ liệu
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;

        // Chỉ cập nhật mật khẩu nếu có nhập mới
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    // Xóa người dùng
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
