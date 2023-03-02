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
            $table->enum('status',[0,1])->default(1)->comment("0 = blocked,1= active");
            $table->enum('user_type',[1,2])->default(1)->comment("1 = modal,2= customer");
            $table->enum('is_approved',[0,1])->default(0)->comment("approved  by admin for modal");
            $table->text('reject_reason')->nullable()->comment("reason for reject");
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
