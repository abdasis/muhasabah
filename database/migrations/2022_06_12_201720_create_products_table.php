<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('name');
            $table->string('unit')->default('pcs');
            $table->string('description')->nullable();

            //pengaturan harga penjualan
            $table->boolean('is_saleable')->default(true);
            $table->unsignedBigInteger('sale_account')->nullable();
            $table->decimal('sales_price', 20, 2)->nullable();
            $table->integer('sales_tax')->nullable();


            //pengaturan harga pembelian
            $table->boolean('is_purchaseable')->default(true);
            $table->unsignedBigInteger('purchase_account')->nullable();
            $table->decimal('purchase_price', 20, 2)->nullable();
            $table->integer('purchase_tax')->nullable();


            $table->text('images')->nullable();

            //monitor persedia barang
            $table->boolean('is_monitor')->default(false)->nullable();
            $table->integer('stock')->default(0)->nullable();
            $table->unsignedBigInteger('monitoring_account')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();
    }
};
