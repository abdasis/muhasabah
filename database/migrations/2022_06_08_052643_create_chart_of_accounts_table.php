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
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chart_of_account_category_id')->constrained();
            $table->bigInteger('code');
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->enum('report_type', ['neraca', 'laba rugi']);
            $table->enum('default_balance', ['debit', 'kredit']);
            $table->enum('lock_status', ['unlocked', 'locked']);
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('chart_of_accounts');
    }
};
