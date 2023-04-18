<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Comercial']);


        Permission::create(['name' => 'admin.home'])            ->syncRoles([$role1]);
        
        //Permisos de Usuario
        Permission::create(['name' => 'admin.users.index'])     ->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])    ->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])      ->syncRoles([$role1]);
        //Permisos de Pedidos
        Permission::create(['name' => 'admin.pedidos.index'])   ->syncRoles([$role1]);
        Permission::create(['name' => 'admin.pedidos.create'])  ->syncRoles([$role1]);
        Permission::create(['name' => 'admin.pedidos.edit'])    ->syncRoles([$role1]);
        Permission::create(['name' => 'admin.pedidos.destroy']) ->syncRoles([$role1]);


    }
}
