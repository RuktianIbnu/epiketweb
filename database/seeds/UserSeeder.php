<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $data = [
            'id' => '1',
            'nip' => 'superadmin',
            'nama' => 'Super Admin',
            'password' => '$2y$10$JRpVSYEqVN7X9SsiPmFTEe9axbzijp5E1pdp1C4nGZZ6M/9fV0iI2',
            'kode_subdirektorat' => 'RENBANG',
            'aktif' => '1',
            'level_pengguna' => '1',
        ];
        $user->fill($data);
        $user->save();
        $user->assignRole('SUPERADMIN');
    }
}
