<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('about_me')->nullable();
            $table->string('experience_1')->nullable();
            $table->string('experience_2')->nullable();
            $table->string('experience_3')->nullable();
            $table->string('experience_4')->nullable();
            $table->string('training_1')->nullable();
            $table->string('training_2')->nullable();
            $table->string('training_3')->nullable();
            $table->string('training_4')->nullable();
            $table->double('price')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('picture')->nullable();
            $table->timestamp('dob')->nullable();
            $table->double('balance')->nullable();
            $table->enum('type',['user','examiner','admin'])->default('user')->nullable();
            $table->enum('status',['approved','rejected','request_approval'])->nullable();
            $table->enum('verify_status',['verified','unverified'])->nullable();
            $table->boolean('is_fake')->default(0)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
