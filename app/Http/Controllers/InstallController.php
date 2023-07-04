<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class InstallController extends Controller
{
    
    function createPermissions() {
        //products
        Permission::create(['name' => 'create_products']);
        Permission::create(['name' => 'update_products']);
        Permission::create(['name' => 'read_products']);
        Permission::create(['name' => 'delete_products']);
        
    }
}
