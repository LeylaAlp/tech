<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('kategori')->truncate();
        $id=DB::table('kategori')->insertGetId(['kategori_adi' => 'Kadın', 'slug' => 'kadin']);
        DB::table('kategori')->insert(['kategori_adi' => 'Elbise','slug' => 'elbise','ust_id' => $id]);
        DB::table('kategori')->insert(['kategori_adi' => 'Jean','slug' => 'jean','ust_id' => $id]);
        DB::table('kategori')->insert(['kategori_adi' => 'T-shirt','slug' => 'tshirt','ust_id' => $id]);
        DB::table('kategori')->insert(['kategori_adi' => 'Ayakkabı','slug' => 'ayakkabi','ust_id' => $id]);
        DB::table('kategori')->insert(['kategori_adi' => 'Ceket','slug' => 'ceket','ust_id' => $id]);




        $id=DB::table('kategori')->insertGetId(['kategori_adi' => 'Erkek', 'slug' => 'erkek']);
        DB::table('kategori')->insert(['kategori_adi' => 'Sweat','slug' => 'sweat', 'ust_id' => $id]);
        DB::table('kategori')->insert(['kategori_adi' => 'Pantolon','slug' => 'pantolon', 'ust_id' => $id]);
        DB::table('kategori')->insert(['kategori_adi' => 'Kravat','slug' => 'kravat', 'ust_id' => $id]);
        DB::table('kategori')->insert(['kategori_adi' => 'Bomber Ceket','slug' => 'bomber-ceket', 'ust_id' => $id]);
        DB::table('kategori')->insert(['kategori_adi' => 'Ayyakabı','slug' => 'ayakkabı', 'ust_id' => $id]);




        $id=DB::table('kategori')->insertGetId(['kategori_adi' => 'Aksesuar', 'slug' => 'aksesuar']);
        DB::table('kategori')->insert(['kategori_adi' =>'Kolye','slug'=>'kolye','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi' =>'Halhal','slug'=>'halhal','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi' =>'Bilezik','slug'=>'bilezik','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi' =>'Fular','slug'=>'fular','ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi' =>'Çanta','slug'=>'canta','ust_id'=>$id]);



        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }



}
