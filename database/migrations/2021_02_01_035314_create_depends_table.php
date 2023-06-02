<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depends', function (Blueprint $table) {
            $table->id();
            $table->string('depend_name', 150);
            $table->integer('country_id')->unsigned();
            $table->string('passport', 150);
            $table->integer('emplyoee_id')->unsigned();
            $table->integer('relationship_id')->unsigned();
            $table->tinyInteger('depend_delete')->default(0);
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
        Schema::dropIfExists('depends');
    }
}
