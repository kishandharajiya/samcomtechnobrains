<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['role' => 'Supplier','slug' => 'supplier']);
        if($role){
            $permissions = [
                [
                    'role_id' => $role->id,
                    'permission' => 'create'
                ],
                [
                    'role_id' => $role->id,
                    'permission' => 'list'
                ],
                [
                    'role_id' => $role->id,
                    'permission' => 'edit'
                ],
                [
                    'role_id' => $role->id,
                    'permission' => 'delete'
                ]
            ];
            Permission::insert($permissions);
        }
    } 
}
