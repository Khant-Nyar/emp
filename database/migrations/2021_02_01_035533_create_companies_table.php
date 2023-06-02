<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->integer('bod')->unsigned();
            $table->string('mic', 255)->nullable();
            $table->date('expireddate');
            $table->text('address');
            $table->integer('proposel')->unsigned()->nullable();
            $table->integer('proposel_local')->unsigned()->nullable();
            $table->integer('additional')->unsigned()->nullable();
            $table->integer('approved')->unsigned()->nullable();
            $table->integer('approved_local')->unsigned()->nullable();
            $table->string('crn', 255)->nullable();
            $table->string('company_type', 30);
            $table->tinyInteger('company_delete')->unsigned()->default(0);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
