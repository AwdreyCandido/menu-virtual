<?php

use App\Models\Client;
use App\Models\Store;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('store_reviews', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->tinyInteger('rating');

            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('store_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('store_id')->references('id')->on('stores');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('store_reviews');
    }
};
