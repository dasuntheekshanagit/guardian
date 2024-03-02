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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->string('contactno');
            $table->string('note');
            $table->string('user');
            $table->string('status')->default('pending');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();    
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
        // Schema::table('prescriptions', function (Blueprint $table) {
        //     $table->dropColumn(['image1', 'image2', 'image3', 'image4', 'image5']);
        // });
    
        Schema::dropIfExists('prescriptions');
    }
};
