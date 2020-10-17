<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleController extends Controller
{
    public function index()
    {
        $roles = ModelsRole::get();
        $role = new ModelsRole;
        return view('permission.roles.index', compact('roles', 'role'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);
        ModelsRole::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);
        return back();
    }

    public function edit(ModelsRole $role)
    {
        return view('permission.roles.edit', [
            'role' => $role,
            'submit' => 'Update'
        ]);
    }

    public function update(ModelsRole $role)
    {
        request()->validate([
            'name' => 'required',
        ]);
        $role->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);
        return redirect()->route('roles.index');
    }

    public function destroy(ModelsRole $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
    }
}
