<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTotalPriceColumnAtOrderItemsTable extends Migration
{

    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->renameColumn('total_price', 'net_price');
        });
    }


}
