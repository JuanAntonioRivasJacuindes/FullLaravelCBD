<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InstallController extends Controller
{
    function createRoles() {
        Role::create(['name'=>'Administrator']);
    }
    function createPermissions() {

        //dashboard
        Permission::create(['name' => 'access_dashboard','guard_name'=>'sanctum']);
        //produ,'guard_name'=>'sanctum'cts
        Permission::create(['name' => 'create_products','guard_name'=>'sanctum']);
        Permission::create(['name' => 'update_products','guard_name'=>'sanctum']);
        Permission::create(['name' => 'read_products','guard_name'=>'sanctum']);
        Permission::create(['name' => 'delete_products','guard_name'=>'sanctum']);
        //us,'guard_name'=>'sanctum'ers
        Permission::create(['name' => 'create_users','guard_name'=>'sanctum']);
        Permission::create(['name' => 'update_users','guard_name'=>'sanctum']);
        Permission::create(['name' => 'read_users','guard_name'=>'sanctum']);
        Permission::create(['name' => 'delete_users','guard_name'=>'sanctum']);
        //ro,'guard_name'=>'sanctum'les
        Permission::create(['name' => 'create_roles','guard_name'=>'sanctum']);
        Permission::create(['name' => 'update_roles','guard_name'=>'sanctum']);
        Permission::create(['name' => 'read_roles','guard_name'=>'sanctum']);
        Permission::create(['name' => 'delete_roles','guard_name'=>'sanctum']);
        //categ,'guard_name'=>'sanctum'ory
        Permission::create(['name' => 'create_categories','guard_name'=>'sanctum']);
        Permission::create(['name' => 'update_categories','guard_name'=>'sanctum']);
        Permission::create(['name' => 'read_categories','guard_name'=>'sanctum']);
        Permission::create(['name' => 'delete_categories','guard_name'=>'sanctum']);
        //or,'guard_name'=>'sanctum'der
        Permission::create(['name' => 'create_orders','guard_name'=>'sanctum']);
        Permission::create(['name' => 'update_orders','guard_name'=>'sanctum']);
        Permission::create(['name' => 'read_orders','guard_name'=>'sanctum']);
        Permission::create(['name' => 'delete_orders','guard_name'=>'sanctum']);
    }
}
