<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title')->nullable();
            $table->string('video')->nullable();
            $table->string('trailer')->nullable();
            $table->string('thumb')->nullable();
            $table->tinyInteger('status')->defualt(1)->comment('0=Inactive,1=Active,2=Draft');
            $table->tinyInteger('is_free')->defualt(1)->comment('1=Free,2=Paid');
            $table->bigInteger('credits')->defualt(0);
            $table->longText('description',13,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
