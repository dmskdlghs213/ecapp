<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $disks = Storage::disk('s3')->files('ec_image');

        // foreach ($disks as $disk) {
        //     $image = $disk;
        //     print_r("--------");
        //     print_r($image);
        // }


        DB::table('items')->delete();
        $item_seeds = [
            [
                'name' => 'オムライス',
                'amount' => '900',
                'image_path' => 'ec_image/オムライス.jpg'
            ],
            [
                'name' => 'デミグラスオムライス',
                'amount' => '700',
                'image_path' => 'ec_image/デミグラス.jpg'
            ],
            [
                'name' => 'チーズオムライス',
                'amount' => '900',
                'image_path' => 'ec_image/チーズ.jpg'
            ],
            [
                'name' => 'ハンバーグオムライス',
                'amount' => '800',
                'image_path' => 'ec_image/ハンバーグ.jpg'
            ],
            [
                'name' => 'ミートソースオムライス',
                'amount' => '700',
                'image_path' => 'ec_image/ミートソース.jpeg'
            ],
            [
                'name' => 'トマトソースオムライス',
                'amount' => '900',
                'image_path' => 'ec_image/トマト.jpg'
            ],
            [
                'name' => '明太チーズオムライス',
                'amount' => '1000',
                'image_path' => 'ec_image/明太.jpg'
            ],
            [
                'name' => 'クリームソースオムライス',
                'amount' => '1100',
                'image_path' => 'ec_image/クリームソース.jpg'
            ],
            [
                'name' => 'ハヤシライスオムライス',
                'amount' => '1300',
                'image_path' => 'ec_image/ハヤシライス.jpg'
            ],
            [
                'name' => 'やさいオムライス',
                'amount' => '750',
                'image_path' => 'ec_image/野菜.jpg'
            ],
            [
                'name' => 'ビーフシチューオムライス',
                'amount' => '800',
                'image_path' => 'ec_image/s_ビーフシチュー.jpg'


            ],
            [
                'name' => 'デミグラス＆チーズオムライス',
                'amount' => '1300',
                'image_path' => 'ec_image/デミチーズ.jpg'
            ],
            [
                'name' => 'デミグラス＆トマトソースオムライス',
                'amount' => '1300',
                'image_path' => 'ec_image/s_デミトマト.jpg'

            ],
            [
                'name' => 'きのこソースオムライス',
                'amount' => '800',
                'image_path' => 'ec_image/きのこオムライス.jpeg'
            ],
            [
                'name' => 'エビのクリームソースオムライス',
                'amount' => '1400',
                'image_path' => 'ec_image/えびオムライス.jpeg'
            ],
            [
                'name' => 'かにのクリームソースオムライス',
                'amount' => '1300',
                'image_path' => 'ec_image/かにオムライス.jpg'
            ],
            [
                'name' => 'トマトクリームオムライス',
                'amount' => '1240',
                'image_path' => 'ec_image/オムライストマトクリーム.jpg'
            ],
        ];
        foreach ($item_seeds as $item) {
            DB::table('items')->insert($item);
        }
    }
}
