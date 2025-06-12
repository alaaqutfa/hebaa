<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeamController
{
    public function index()
    {
        $admins = User::where('is_admin', 1)->paginate(10);
        return view('admin.teams.index', compact('admins'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'nullable|string|max:255',
            'password'  => 'required|confirmed|min:6',
            'avatar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $avatarPath = null;

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        User::create([
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'avatar'    => $avatarPath,
            'password'  => Hash::make($request->password),
            'is_admin'  => 1,
        ]);

        return redirect()->route('admin.team')->with('success', 'The admin has been added successfully!');
    }

    public function update(Request $request, $id)
    {
        $admin = User::where('is_admin', 1)->findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $admin->id,
            'phone'     => 'nullable|string|max:255',
            'password'  => 'nullable|confirmed|min:6',
            'avatar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // إذا تم رفع صورة جديدة، احذف القديمة واحفظ الجديدة
        if ($request->hasFile('avatar')) {
            if ($admin->avatar && Storage::disk('public')->exists($admin->avatar)) {
                Storage::disk('public')->delete($admin->avatar);
            }

            $admin->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        // تحديث باقي البيانات
        $admin->name      = $request->name;
        $admin->last_name = $request->last_name;
        $admin->email     = $request->email;
        $admin->phone     = $request->phone;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.team')->with('success', 'The admin data has been updated successfully.');
    }

    public function destroy($id)
    {
        $admin = User::where('is_admin', 1)->findOrFail($id);

        if (auth()->id() === $admin->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        // حذف الصورة من التخزين إن وجدت
        if ($admin->avatar && Storage::disk('public')->exists($admin->avatar)) {
            Storage::disk('public')->delete($admin->avatar);
        }

        $admin->delete();

        return back()->with('success', 'The administrator has been successfully deleted.');
    }
}
