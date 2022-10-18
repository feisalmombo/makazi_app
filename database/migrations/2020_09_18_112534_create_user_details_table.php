<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('profile_photo_path')->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('district_id')->unsigned()->nullable();
            $table->integer('ward_id')->unsigned()->nullable();
            $table->string('street')->nullable(); 
            $table->integer('industry_id')->unsigned();  
            $table->string('enrollment_date');
            $table->text('description')->nullable();
            $table->string('date_of_birth');
            $table->integer('sex_id')->unsigned(); 
            $table->string('national_identity_number')->nullable(); 
            $table->string('tin_number');
            $table->integer('maritalstatus_id')->unsigned();  
            $table->integer('dependant_id')->unsigned();  
            $table->integer('ownershipstatus_id')->unsigned();  
            $table->integer('membership_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();  
            $table->timestamps();

            // FOREIGN KEYS

            $table->foreign('region_id')
            ->references('id')->on('regions')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('district_id')
            ->references('id')->on('districts')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('ward_id')
            ->references('id')->on('wards')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('industry_id')
            ->references('id')->on('industries')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('sex_id')
            ->references('id')->on('sexes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('maritalstatus_id')
            ->references('id')->on('marital_statuses')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('dependant_id')
            ->references('id')->on('dependants')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('ownershipstatus_id')
            ->references('id')->on('ownershipstatuses')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('membership_id')
            ->references('id')->on('memberships')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
