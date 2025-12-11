<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_id');
            $table->string('item_name');
            $table->integer('item_price');
            $table->string('item_image');
            $table->integer('item_stock');
            $table->string('item_brand');
            $table->string('item_color');
            $table->string('item_weight');
            $table->string('item_dimension');
            $table->text('item_description');
            $table->integer('item_discount')->default(0);
            $table->integer('rating')->default(0);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignId('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('order_number');
            $table->enum('order_status', ['dikirim', 'diterima', 'selesai', 'dibatal', 'cart', 'error']);
            $table->timestamps();
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->id('order_detail_id');
            $table->foreignId('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreignId('item_id')->references('item_id')->on('items')->onDelete('cascade');
            $table->integer('jumlah');
            $table->timestamps();
        });

        Schema::create('carts', function (Blueprint $table) {
            $table->id('cart_id');
            $table->foreignId('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('item_id')->references('item_id')->on('items')->onDelete('cascade');
            $table->integer('jumlah');
            $table->timestamps();
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->id('rating_id');
            $table->foreignId('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('item_id')->references('item_id')->on('items')->onDelete('cascade');
            $table->integer('rating')->default(0);
            $table->string('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('ratings');
    }
};
