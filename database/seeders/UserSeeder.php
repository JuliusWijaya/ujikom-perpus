<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $datas = [];

        for ($i = 0; $i < 30; $i++) {
            $datas[] = [
                'name'      => $faker->name(),
                'email'     => $faker->email(),
                'password'  => bcrypt('rahasia'),
                'hak_akses' => 'anggota',
                'status'    => Arr::random(['active', 'inactive'])
            ];
        }

        foreach (array_chunk($datas, 2) as $data) {
            User::insert($data);
        }
    }
}
