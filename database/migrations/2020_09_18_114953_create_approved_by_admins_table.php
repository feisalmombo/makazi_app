<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovedByAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_by_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->string('approved_status'); // Status must be Accepted or Rejected
            $table->integer('user_id')->unsigned();  
            $table->integer('userdetails_id')->unsigned()->nullable(); 
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('userdetails_id')
            ->references('id')->on('user_details')
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
        Schema::dropIfExists('approved_by_admins');
    }
}
