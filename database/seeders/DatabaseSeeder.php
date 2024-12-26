<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users
        User::factory(10)->create();

        // Create categories
        Category::factory(5)->create();

        // Create products with categories
        Product::factory(20)->create();

        // Create payment methods
        PaymentMethod::factory(3)->create();
        // Create order items for orders
        OrderItem::factory(50)->create();
        // Create orders for users
        Order::factory(15)->create();
        // Create payments for orders
        Payment::factory(15)->create();
    }
}
