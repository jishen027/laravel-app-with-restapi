<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    // add role
    public function addRole(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        return response()->json(['message' => 'Role added successfully']);
    }

    // get all roles
    public function getRoles()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    // get role by id
    public function getRole($id)
    {
        $role = Role::find($id);
        return response()->json($role);
    }

    // update role
    public function updateRole(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        return response()->json(['message' => 'Role updated successfully']);
    }

    // delete role
    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        return response()->json(['message' => 'Role deleted successfully']);
    }

}
