<?php
// database/migrations/2025_08_10_122800_create_products_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('food_name');
            $table->float('food_rating');
            $table->string('food_image');
            $table->string('restaurant_name');
            $table->string('restaurant_logo');
            $table->enum('restaurant_status', ['open', 'closed'])->default('open');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};