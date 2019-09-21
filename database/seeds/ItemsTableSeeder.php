<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();
        $item_seeds = [
            [
                'name' => 'オムライス',
                'amount' => '900',
            ],
            [
                'name' => 'デミグラスオムライス',
                'amount' => '700',
            ],
            [
                'name' => 'チーズオムライス',
                'amount' => '900',
            ],
            [
                'name' => 'ハンバーグオムライス',
                'amount' => '800',
            ],
            [
                'name' => 'ミートソースオムライス',
                'amount' => '700',
            ],
            [
                'name' => 'トマトソースオムライス',
                'amount' => '900',
            ],
            [
                'name' => '明太チーズオムライス',
                'amount' => '1000',
            ],
            [
                'name' => 'クリームソースオムライス',
                'amount' => '1100',
            ],
            [
                'name' => 'ハヤシライスオムライス',
                'amount' => '1300',
            ],
            [
                'name' => '野菜オムライス',
                'amount' => '750',
            ],
            [
                'name' => 'ミートソースオムライス',
                'amount' => '800',
            ],
            [
                'name' => 'デミグラス＆チーズオムライス',
                'amount' => '1300',
            ],
            [
                'name' => 'デミグラス＆トマトソースオムライス',
                'amount' => '1300',
            ],
            [
                'name' => 'きのこソースオムライス',
                'amount' => '800',
            ],
            [
                'name' => 'エビのクリームソースオムライス',
                'amount' => '1400',
            ],
            [
                'name' => 'かにのクリームソースオムライス',
                'amount' => '1300',
            ], 
            [
                'name' => 'クリーム＆トマトソースオムライス',
                'amount' => '1240',
            ],
        ];
        foreach ($item_seeds as $item) {
            DB::table('items')->insert($item);
        }
    }
}
