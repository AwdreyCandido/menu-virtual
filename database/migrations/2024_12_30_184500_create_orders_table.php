<?php

use App\Models\Client;
use App\Models\Store;
use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('method');
            $table->string('delivery_address');
            $table->tinyInteger('status');
            $table->double('amount');
            $table->json('items');

            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('client_id')->references('id')->on('clients'); // client_id
            $table->foreign('store_id')->references('id')->on('stores'); // store_id
            $table->foreign('order_id')->references('id')->on('orders'); // order_id
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
