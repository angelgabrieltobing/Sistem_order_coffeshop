<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Pencarian
        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');

            });

        }

        // Filter Role
        if ($request->filled('role')) {

            $query->where('role', $request->role);

        }

        $users = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Form tambah user
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Simpan user
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|min:6|confirmed',

            'role' => 'required|in:admin,customer',

        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => $request->role,

        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Detail User
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Form Edit
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update User
     */
    public function update(Request $request, User $user)
    {

        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:users,email,' . $user->id,

            'role' => 'required|in:admin,customer',

        ]);

        $data = [

            'name' => $request->name,

            'email' => $request->email,

            'role' => $request->role,

        ];

        if ($request->filled('password')) {

            $request->validate([

                'password' => 'min:6|confirmed'

            ]);

            $data['password'] = Hash::make($request->password);

        }

        $user->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Hapus User
     */
    public function destroy(User $user)
    {

        if (Auth::id() == $user->id) {

            return back()->with('error', 'Anda tidak dapat menghapus akun sendiri.');

        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil dihapus.');
    }
}