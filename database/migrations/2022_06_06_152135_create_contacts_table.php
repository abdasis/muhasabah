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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('nickname');
            $table->string('other_details')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('handphone')->nullable();
            $table->string('email')->unique();
            $table->enum('id_type', ['KTP', 'SIM', 'PASSPORT', 'LAINNYA'])->nullable();
            $table->string('identity_number')->nullable();
            $table->string('company_name')->nullable();
            $table->string('npwp')->nullable();
            $table->string('telepon')->nullable();
            $table->string('fax')->nullable();
            $table->text('address')->nullable();

            //table bank
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('branch_office')->nullable();
            $table->string('account_owner')->nullable();

            //table account
            $table->unsignedBigInteger('debit_account')->nullable();
            $table->unsignedBigInteger('credit_account')->nullable();

            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();
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
        Schema::dropIfExists('contacts');
    }
};
