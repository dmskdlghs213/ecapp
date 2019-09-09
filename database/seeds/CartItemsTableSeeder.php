<?php

use Illuminate\Database\Seeder;

class CartItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart_seeds = [
            [
                'user_id' => '1',
                'item_id' => '1',
                'quantity' => 1,
            ],
        ];
        foreach ($cart_seeds as $cart) {
            DB::table('cart_items')->insert($cart);
        }
    }
}
