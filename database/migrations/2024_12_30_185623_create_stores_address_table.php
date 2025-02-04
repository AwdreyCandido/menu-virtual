<?php

use App\Models\Store;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('stores_address', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');

            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id')->references('id')->on('stores');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stores_address');
    }
};
