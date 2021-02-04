<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class PermissionsSeeder extends Seeder
{
  
    public function run()
    {
  
        $permissions_array=[];
        
        $ver_admin=Permission::create(['name' => 'vistas_admin2']);
        $ver_alicuota=Permission::create(['name' => 'vista_alicuota2']);
        $ver_todo=Permission::create(['name' => 'vista_cliente2']);
        array_push($permissions_array,$ver_alicuota,$ver_todo);
        $admin= Role::create(['name' => 'admin2']);
        $cliente_master=Role::create(['name'=>'cliente_master2']);
        $cliente=Role::create(['name'=>'cliente2']);
        $cliente_master->syncPermissions($permissions_array);
        $cliente->givePermissionTo($ver_todo);
        $admin->givePermissionTo($ver_admin);

    }
}
