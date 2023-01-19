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
            'drivers',
            'drivers_view',
            'drivers_create',
            'drivers_edit',
            'roles',
            'roles_view',
            'roles_create',
            'roles_edit',
            'roles_delete',
            'transportations',
            'transportations_view',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


    }
}
