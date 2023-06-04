<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Produkhukum;
use Nette\Utils\Random;

class ProdukHukumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 100; $i++) {
            ProdukHukum::create([
                // 'id' => $i,
                'nama' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'deskripsi' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'id_kategori' => $faker->randomElement([1, 2, 3, 4, 5]),
                'tahun' => $faker->randomElement(['2019', '2020', '2021', '2022', '2023']),
                'nama_file' => $faker->sentence(5),
                'path_file' => 'file_prokum/produk-hukum-contoh-perbup-scrol.pdf'
            ]);
        }
        
    }
}
