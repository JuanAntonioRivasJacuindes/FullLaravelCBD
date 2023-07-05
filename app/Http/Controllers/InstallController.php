<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class InstallController extends Controller
{
    
    function createPermissions() {
        //dashboard
        Permission::create(['name' => 'access_dashboard']);
        //products
        Permission::create(['name' => 'create_products']);
        Permission::create(['name' => 'update_products']);
        Permission::create(['name' => 'read_products']);
        Permission::create(['name' => 'delete_products']);
        //users
        Permission::create(['name' => 'create_users']);
        Permission::create(['name' => 'update_users']);
        Permission::create(['name' => 'read_users']);
        Permission::create(['name' => 'delete_users']);
        //roles
        Permission::create(['name' => 'create_roles']);
        Permission::create(['name' => 'update_roles']);
        Permission::create(['name' => 'read_roles']);
        Permission::create(['name' => 'delete_roles']);
    }
}
