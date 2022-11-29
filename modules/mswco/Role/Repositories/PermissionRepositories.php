<?php

namespace mswco\Role\Repositories;

use Spatie\Permission\Models\Permission;

class PermissionRepositories
{
public function all(){
    $per = Permission::all();
    return $per;
}
}
