<?php

namespace mswco\Role\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mswco\Role\Http\Request\RoleRequest;
use mswco\Role\Repositories\PermissionRepositories;
use mswco\Role\Repositories\RoleRepositories;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $roleRepositories;
    private $permissionRepositories;
public function __construct(RoleRepositories $roleRepositories , PermissionRepositories $permissionRepositories)
{
$this->roleRepositories = $roleRepositories;
$this->permissionRepositories = $permissionRepositories;
}


    public function index()
    {
        $roles = $this->roleRepositories->all();
        $permission = $this->permissionRepositories->all();
        return view('Role::role',compact('roles','permission'));
    }

    public function create()
    {
    }

    public function store(RoleRequest $request)
    {
      return  $this->roleRepositories->create($request);
      return redirect()->to(back());
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
