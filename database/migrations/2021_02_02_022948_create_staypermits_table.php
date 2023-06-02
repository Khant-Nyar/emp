<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaypermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staypermits', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->integer('holder_id');
            $table->integer('position_id')->default(0);
            $table->integer('stay')->default(3);
            $table->date('fromdate')->nullable();
            $table->date('todate')->nullable();
            $table->date('approveddate')->nullable();
            $table->date('canceleddate')->nullable();
            $table->tinyInteger('stay_delete')->default(0);
            $table->integer('type')->nullable();
            $table->integer('status')->default(0);
            $table->date('mic_appointed')->nullable();
            $table->integer('mic_letter_number')->nullable();
            $table->date('submitted_time')->nullable();
            $table->date('resubmitted_time')->nullable();

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
        Schema::dropIfExists('staypermits');
    }
}
