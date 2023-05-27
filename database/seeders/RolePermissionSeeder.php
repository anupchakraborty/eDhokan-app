<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create Roles
        $rolesuperadmin = Role::create(['name'=>'superadmin']);
        $dhokanowner = Role::create(['name' => 'dhokanowner']);
        $roledhokan_manager = Role::create(['name' => 'dhokan_manager']);
        $rolesalesman = Role::create(['name' => 'salesman']);
        $roleuser = Role::create(['name' => 'user']);

        //Permission list as a array
        //Permission list as a array
        $permissions = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    //Dashboard
                    'dashboard.view',
                    'dashboard.edit',
                ],
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    //admin permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                ],
            ],
            [
                'group_name' => 'dhokanowner',
                'permissions' => [
                    //dhokanowner permissions
                    'dhokanowner.create',
                    'dhokanowner.view',
                    'dhokanowner.edit',
                    'dhokanowner.delete',
                    'dhokanowner.approved',
                ],
            ],
            [
                'group_name' => 'dhokan_manager',
                'permissions' => [
                    //dhokan_manager permissions
                    'dhokan_manager.create',
                    'dhokan_manager.view',
                    'dhokan_manager.edit',
                    'dhokan_manager.delete',
                    'dhokan_manager.approved',
                ],
            ],
            [
                'group_name' => 'salesman',
                'permissions' => [
                    //salesman permissions
                    'salesman.create',
                    'salesman.view',
                    'salesman.edit',
                    'salesman.delete',
                    'salesman.approved',
                ],
            ],
            [
                'group_name' => 'product',
                'permissions' => [
                    //product permissions
                    'product.create',
                    'product.view',
                    'product.edit',
                    'product.delete',
                    'product.approved',
                ],
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    //Role permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approved',
                ],
            ],
            [
                'group_name' => 'customer',
                'permissions' => [
                    //customer permissions
                    'customer.create',
                    'customer.view',
                    'customer.edit',
                    'customer.delete',
                    'customer.approved',
                ],
            ],
            [
                'group_name' => 'supplier',
                'permissions' => [
                    //supplier permissions
                    'supplier.create',
                    'supplier.view',
                    'supplier.edit',
                    'supplier.delete',
                    'supplier.approved',
                ],
            ],
            [
                'group_name' => 'invoice',
                'permissions' => [
                    //invoice permissions
                    'invoice.create',
                    'invoice.view',
                    'invoice.edit',
                    'invoice.delete',
                    'invoice.approved',
                ],
            ],
            [
                'group_name' => 'User',
                'permissions' => [
                    //User permissions
                    'User.create',
                    'User.view',
                    'User.edit',
                    'User.delete',
                    'User.approved',
                ],
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    //Profile permissions
                    'profile.view',
                    'profile.edit',
                ],
            ]

        ];
        //create assign permission

        for ($i=0; $i < count($permissions); $i++) {
            // data fatch group wise
        $permissionGroup = $permissions[$i]['group_name'];
        for ($j=0; $j < count($permissions[$i]['permissions']); $j++) {
            // create permission
            $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
            $rolesuperadmin->givePermissionTo($permission);
            $permission->assignRole($rolesuperadmin);
        }
        }
    }
}
