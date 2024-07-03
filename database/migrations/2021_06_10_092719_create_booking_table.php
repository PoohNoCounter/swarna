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
        Schema::create('booking', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('token')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->text('location')->nullable();
            $table->string('status')->nullable()->default('Menunggu Konfirmasi');
            $table->dateTime('rental_date')->nullable();
            $table->dateTime('return_date')->nullable();
            $table->integer('quantity')->nullable()->default(0);
            $table->integer('total')->nullable()->default(0);
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
        Schema::dropIfExists('booking');
    }
};
