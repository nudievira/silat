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
        Schema::create('user', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->char('province_id', 2)->nullable();
            $table->char('regency_id', 4)->nullable();
            $table->char('district_id', 7)->nullable();
            $table->char('village_id', 10)->nullable();
            $table->integer('role_id')->nullable();
            $table->string('name');
            $table->string('phone', 15)->nullable();
            $table->string('email',191)->unique();
            $table->string('username', 45)->unique();
            $table->string('password_hash')->nullable();
            $table->string('password_reset_token')->nullable();
            $table->string('verification_token')->nullable();
            $table->string('auth_key')->nullable();
            $table->enum('status', [0, 10])->comment('0: in-activ; 10: activ');
            $table->dateTime('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
