<?php
use App\Models\User;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Transaction;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();   
        Category::truncate();
        Product::truncate(); 
        Transaction::truncate();
        DB::table('category_product')->truncate();
        $usersQuantity = 200;
        $categoriesQuantity = 30;
        $productsQuantity = 500;
        $transactionQuantity = 500;
      
        \App\Models\User::factory()->count($usersQuantity)->create(); 
        \App\Models\Category::factory()->count($categoriesQuantity)->create(); 
        \App\Models\Product::factory()->count($productsQuantity)->create()->each(
            function($product){
                $categories= Category::all()->random(mt_rand(1,5))->pluck(id);
                $product= categories()->attach($categories);
            });
            \App\Models\Transaction::factory()->count($transactionQuantity)->create();
        // User::factory(10)->create();
    }
}
