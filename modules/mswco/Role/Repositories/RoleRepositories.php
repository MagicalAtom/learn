<?php

namespace mswco\Role\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepositories
{
public function all(){
    $roles = Role::all();
return $roles;
}
public function create($request){
    return Role::create(['name' => $request->name])->syncPermissions($request->permissions);
    return redirect()->to(back());

}
}
