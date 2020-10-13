<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesandPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions    
        // Master Data
        // Transaksi

        Permission::create(['name' => 'Melihat daftar pendataan']);
        Permission::create(['name' => 'Menambah data pendataan']);
        Permission::create(['name' => 'Mengubah data pendataan']);
        Permission::create(['name' => 'Semua proses pendataan']);
        Permission::create(['name' => 'Aksi master']);
        // Laporan

		Permission::create(['name' => 'Mencetak seluruh Laporan']);

        // create roles and assign existing permissions
        
        $role = Role::create(['name' => 'SUPERADMIN']);
        $role->givePermissionTo([	'Melihat daftar pendataan', 
        							'Menambah data pendataan', 
        							'Mengubah data pendataan',
                                    'Semua proses pendataan',
                                    'Aksi master',

        							'Mencetak seluruh Laporan'
        						]);

       	$role = Role::create(['name' => 'DIREKTUR']);
        $role->givePermissionTo([	
        							'Mencetak seluruh Laporan'
        						]);

        $role = Role::create(['name' => 'KASUBDIT']);
        $role->givePermissionTo([	
        							'Mencetak seluruh Laporan'
        						]);

        $role = Role::create(['name' => 'KASI']);
        $role->givePermissionTo([   'Melihat daftar pendataan', 
                                    'Mengubah data pendataan',
                                    'Menambah data pendataan',
                                    'Semua proses pendataan',
                                    'Mencetak seluruh Laporan'
                                ]);

        $role = Role::create(['name' => 'PETUGAS']);
        $role->givePermissionTo([	'Melihat daftar pendataan', 
        							'Mengubah data pendataan',
                                    'Semua proses pendataan',
                                    'Menambah data pendataan'
        						]);
    }
}
