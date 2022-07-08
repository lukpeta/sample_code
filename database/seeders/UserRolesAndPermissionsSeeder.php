<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $permissionSuperAdmin = Permission::create(['name' => 'superadmin']);
        $roleSuperAdmin->givePermissionTo($permissionSuperAdmin);
        $permissionSuperAdmin->assignRole($roleSuperAdmin);

        $admin = new \App\Models\User();
        $admin->is_enable = true;
        $admin->name = 'Łukasz';
        $admin->email = 'lukasz.peta@gmail.com';
        $admin->email_verified_at = \Carbon\Carbon::now();
        $admin->password = Hash::make('passw');
        $admin->is_company = false;
        $admin->slug = Str::slug('lukasz.peta', '-');
        $admin->save();
        $id = $admin->id;

        $admin = \App\Models\User::where('id', $id)->first();

        $admin->assignRole('superadmin');

        $roleAdmin = Role::create(['name' => 'admin']);
        $permissionAdmin = Permission::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo($permissionAdmin);
        $permissionAdmin->assignRole($roleAdmin);



    }
}
