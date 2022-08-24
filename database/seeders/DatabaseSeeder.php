<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $dataloai = [
            'id' => 0,
            'name_lbds' => 'Dat nghia trang',
        ];
        DB::table('lbds')->insert($dataloai);
        $databds = [
            'lbds_id' => 0,
            'name_bds' => 'Dat nghia trang tai Long Bien',
            'location' => 'Long Bien',
            'price' => 100000000,
            'number_bedroom'=>4,
            'number_bathroom'=>3,
            'area'=>'200m',
            'images'=>'1',
            'description' => 'Mo ta test',
            'contact' => '012345678'
        ];
        DB::table('details_bds')->insert($databds);
        $datauser = [
            'name' => 'Nguyen Van A',
            'email' => 'anv0002@gmail.com',
            'phone' => '0123456798',
            'role' => '1',
            'images'=>'',
            'password' => Hash::make('123456')
        ];
        DB::table('users')->insert($datauser);
        $datacaterogy = [
            'name_category_news' => 'Gia Dat',
        ];
        DB::table('category_news')->insert($datacaterogy);
        $banner_mkt = [
            'id_news' => 0,
            'name_banner' => 'Gia Dat',
            'image' => '123456.png'
        ];
        DB::table('banner_mkt')->insert($banner_mkt);
        $news = [
            'id_category_news' => 0,
            'title_news' => 'bai viet so 1',
            'content_news' => 'noi dung bai viet 1 , tesst',
        ];
        DB::table('news')->insert($news);
    }
}
