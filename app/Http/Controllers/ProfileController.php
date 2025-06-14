<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController
{
    public function index()
    {
        $admin = auth()->user();
        return view("admin.profile.index", compact("admin"));
    }

    public function clientProfile()
    {
        $client = auth()->user();
        return view("web.profile.index", compact("client"));
    }

    public function updateProfile(Request $request, $id)
    {
        $client = User::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $client->id,
            'phone'     => 'nullable|string|max:255',
            'password'  => 'nullable|confirmed|min:6',
            'avatar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // إذا تم رفع صورة جديدة، احذف القديمة واحفظ الجديدة
        if ($request->hasFile('avatar')) {
            if ($client->avatar && Storage::disk('public')->exists($client->avatar)) {
                Storage::disk('public')->delete($client->avatar);
            }

            $client->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        // تحديث باقي البيانات
        $client->name      = $request->name;
        $client->last_name = $request->last_name;
        $client->email     = $request->email;
        $client->phone     = $request->phone;

        if ($request->filled('password')) {
            $client->password = Hash::make($request->password);
        }

        $client->save();

        return redirect()->route('profile')->with('success', 'Your data has been updated successfully.');
    }
}
