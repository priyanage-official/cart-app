<?php

namespace App\Helpers;

use App\Models\Role;

class Helper
{
    public static function getUserRoleType(){
        return Role::where('role_type', 'user')->get();
    } 
}
