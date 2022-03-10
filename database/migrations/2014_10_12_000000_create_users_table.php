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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            //$table->integer('role_id')->unsigned()->nullable()->index();//Method Chaining - Verschillende codes in één keer meegeven
            $table->integer('is_active')->default(0);//Bestaat de gebruiker nog?

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('photo_id')->default('');

            $table->string('password')->nullable()->default('NULL');

            $table->rememberToken();
            $table->timestamps();

            $table->softDeletes();

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
};
