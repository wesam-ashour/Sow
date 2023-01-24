<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'dashboard',
            'dashboard_view',
            'admins',
            'admins_view',
            'admins_create',
            'admins_edit',
            'roles',
            'roles_view',
            'roles_create',
            'roles_edit',
            'roles_delete',
            'drivers',
            'drivers_view',
            'drivers_create',
            'drivers_edit',
            'drivers_delete',
            'orders',
            'orders_view',
            'ScanQR',
            'ScanQR_view',
            'locations',
            'locations_view',
            'locations_create',
            'locations_edit',
            'locations_delete',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


    }
}
