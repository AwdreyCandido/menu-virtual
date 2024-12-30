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
            $table->foreignIdFor(Client::class); // client_id
            $table->foreignIdFor(Store::class); // store_id
            $table->foreignIdFor(Order::class); // order_id
            $table->tinyInteger('status');
            $table->float('total');
            $table->json('items');
            $table->string('delivery_address');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
