<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = ModelsPermission::get();
        $permission = new ModelsPermission;
        return view('permission.permissions.index', compact('permissions', 'permission'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);
        ModelsPermission::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);
        return back();
    }

    public function edit(ModelsPermission $permission)
    {
        return view('permission.permissions.edit', [
            'permission' => $permission,
            'submit' => 'Update'
        ]);
    }

    public function update(ModelsPermission $permission)
    {
        request()->validate([
            'name' => 'required',
        ]);
        $permission->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);
        return redirect()->route('permissions.index');
    }
}
