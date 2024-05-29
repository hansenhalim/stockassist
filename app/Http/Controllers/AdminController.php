<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->user()->authable->shop;

        return view('admin.index')
            ->with('admins', $shop->admins);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(StoreAdminRequest $request)
    {
        $shop = $request->user()->authable->shop;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $admin = new Admin;

        $admin->shop()->associate($shop);

        $admin->save();

        $admin->user()->save($user);

        return redirect()->route('admins.index');
    }

    public function show(Admin $admin)
    {
        return view('admin.show')
            ->with('admin', $admin);
    }

    public function destroy(Admin $admin)
    {
        $admin->user->delete();

        $admin->delete();

        return redirect()->route('admins.index');
    }
}
