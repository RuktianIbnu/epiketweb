<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data faker indonesia
        $faker = Faker::create('id_ID');
 
        // membuat data dummy sebanyak 30 record
        for($x = 1; $x <= 100; $x++){
            $level = $faker->randomElement($array = array ('2', '3', '4', '5'));
            $user = new User();
            $data = [
                'nip' => $faker->unique()->numerify('##################'),
                'nama' => $faker->name,
                'password' => '$2y$10$JRpVSYEqVN7X9SsiPmFTEe9axbzijp5E1pdp1C4nGZZ6M/9fV0iI2',
                'kode_subdirektorat' => $faker->randomElement($array = array ('RENBANG','HARMAN', 'PDP', 'JASMATIK')),
                'aktif' => $faker->randomElement($array = array ('1', '0')),
                'level_pengguna' => $level,
            ];
            $user->fill($data);
            $user->save();
                switch ($level) {
                    case 1:
                        $role = 'SUPERADMIN';
                    break;

                    case 2:
                        $role = 'DIREKTUR';
                    break;

                    case 3:
                        $role = 'KASUBDIT';
                    break;
                    case 4:
                        $role = 'KASI';
                    break;
                    case 5:
                        $role = 'PETUGAS';
                    break;
                }
            $user->assignRole($role);

 
        }
    }
}
 