<?php

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('image_url');
            $table->float('value');
            $table->boolean('available');


            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('store_id');
            $table->foreign('category_id')->references('id')->on('categories'); // category_id
            $table->foreign('store_id')->references('id')->on('stores'); // store_id

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
