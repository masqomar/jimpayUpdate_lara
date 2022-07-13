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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(bcrypt('anggotajim'));
            $table->string('gender');
            $table->string('no_anggota')->unique();
            $table->date('registration_date');
            $table->string('phone')->unique();
            $table->string('pin')->default(bcrypt('123456'));
            $table->bigInteger('balance')->default('0');
            $table->string('profile_image')->nullable();
            $table->string('status')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('members');
    }
};
