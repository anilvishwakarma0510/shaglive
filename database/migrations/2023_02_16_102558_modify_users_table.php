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
        Schema::table('users', function (Blueprint $table) {
            //$table->dropColumn('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_code')->nullable();
            $table->integer('country')->nullable();
            $table->integer('state')->nullable();
            $table->integer('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('sexual_preference')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('hair_colour')->nullable();
            $table->integer('eyes_color')->nullable();
            $table->integer('ethnicity')->nullable();
            $table->integer('public_hair')->nullable();
            $table->integer('bust')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('insta')->nullable();
            $table->longText('about_me')->nullable();
            $table->string('user_id_doc')->nullable();
            $table->string('user_address_doc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
