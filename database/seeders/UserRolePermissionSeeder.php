<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $admin = User::create(array_merge([
                'email' => 'admin@mail.com',
                'name' => 'admin',
    
            ], $default_user_value));
    
            $kabag = User::create(array_merge([
                'email' => 'kabag@mail.com',
                'name' => 'kabag',
    
            ], $default_user_value));
    
            $operator = User::create(array_merge([
                'email' => 'operator@mail.com',
                'name' => 'operator',
    
            ], $default_user_value));

            $superadmin = User::create(array_merge([
                'email' => 'superadmin@mail.com',
                'name' => 'superadmin',
    
            ], $default_user_value));
    
            $role_admin = Role::create(['name' => 'admin']);
            $role_kabag = Role::create(['name' => 'kabag']);
            $role_operator = Role::create(['name' => 'operator']);
            $role_superadmin = Role::create(['name' => 'superadmin']);
    
            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);

            $permission = Permission::create(['name' => 'read konfigurasi']);
            $permission = Permission::create(['name' => 'create konfigurasi']);
            $permission = Permission::create(['name' => 'update konfigurasi']);
            $permission = Permission::create(['name' => 'delete konfigurasi']);

            $permission = Permission::create(['name' => 'read prokum']);
            $permission = Permission::create(['name' => 'create prokum']);
            $permission = Permission::create(['name' => 'update prokum']);
            $permission = Permission::create(['name' => 'delete prokum']);

            $permission = Permission::create(['name' => 'read kategori']);
            $permission = Permission::create(['name' => 'create kategori']);
            $permission = Permission::create(['name' => 'update kategori']);
            $permission = Permission::create(['name' => 'delete kategori']);

            $permission = Permission::create(['name' => 'read user']);
            $permission = Permission::create(['name' => 'create user']);
            $permission = Permission::create(['name' => 'update user']);
            $permission = Permission::create(['name' => 'delete user']);

            $role_superadmin->givePermissionTo(['read role', 'create role', 'update role', 'delete role', 'read konfigurasi', 'create konfigurasi', 'update konfigurasi', 'delete konfigurasi', 'read prokum', 'create prokum', 'update prokum', 'delete prokum', 'read kategori', 'create kategori', 'update kategori', 'delete kategori', 'read user', 'create user', 'update user', 'delete user']);
            $role_admin->givePermissionTo(['read prokum', 'create prokum', 'update prokum', 'delete prokum', 'read kategori', 'create kategori', 'update kategori', 'delete kategori', 'read user', 'create user', 'update user', 'delete user']);
            $role_operator->givePermissionTo(['read prokum', 'create prokum', 'update prokum', 'delete prokum', 'read kategori', 'create kategori', 'update kategori', 'delete kategori', 'read user', 'create user', 'update user', 'delete user']);
            $role_kabag->givePermissionTo(['read prokum', 'create prokum', 'update prokum', 'delete prokum', 'read kategori', 'create kategori', 'update kategori', 'delete kategori', 'read user', 'create user', 'update user', 'delete user']);
    
            $admin->assignRole('admin');
            $superadmin->assignRole('superadmin');
            $operator->assignRole('operator');
            $kabag->assignRole('kabag');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        

    }
}
