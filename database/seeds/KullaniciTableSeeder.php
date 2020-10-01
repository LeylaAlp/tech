<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\KullaniciDetay;
use App\Models\Kullanici;

class KullaniciTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        Schema::disableForeignKeyConstraints();

        Kullanici::truncate();
        KullaniciDetay::truncate();

        $kullanici_yonetici = Kullanici::create([
            'adsoyad' => 'Leyla Alp',
            'email' => 'leyla@gmail.com',
            'sifre' => bcrypt('123456789'),
            'aktif_mi' => 1,
            'yonetici_mi' => 1
        ]);

        $kullanici_yonetici->detay()->create([
            'adres' => 'İstanbul',
            'telefon' => '5896547785',
            'ceptelefonu' => '548548555555'
        ]);


        for ($i = 0; $i < 50; $i++){
            $kullanici_musteri = Kullanici::create([
                'adsoyad' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'sifre' => bcrypt('123456789'),
                'aktif_mi' => 1,
                'yonetici_mi' => 0
            ]);

            $kullanici_musteri->detay()->create([
                'adres' => $faker->address,
                'telefon' => $faker->e164PhoneNumber,
                'ceptelefonu' => $faker->e164PhoneNumber
            ]);

        }
        Schema::enableForeignKeyConstraints();

    }
}
