<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        //
    }

    public function show(Admin $admin)
    {
        return view('admin.show')
            ->with('admin', $admin);
    }

    public function edit(Admin $admin)
    {
        return view('admin.edit')
            ->with('admin', $admin);
    }

    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function destroy(Admin $admin)
    {
        //
    }
}
