<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as ModelsRole;
use Spatie\Permission\Models\Permission as ModelsPermission;

class AssignController extends Controller
{
    public function create()
    {
       
        return view('permission.assign.create',[
            'roles' => ModelsRole::get(),
            'permissions' => ModelsPermission::get()
        ]);
    }

    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role = ModelsRole::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        return back()->with('success', "Permission has been assigned to the role {$role->name}");
    }

    public function edit(ModelsRole $role)
    {
        return view('permission.assign.edit', [
            'role' => $role,
            'roles' => ModelsRole::get(),
            'permissions' => ModelsPermission::get()
        ]);
    }

    public function update(ModelsRole $role)
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);
        $role->syncPermissions(request('permissions'));

        return redirect()->route('assign.create')->with('success', 'The permissions had been synced');
    }
}
