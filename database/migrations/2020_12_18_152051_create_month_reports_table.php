<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('month_reports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('total_meal');
            $table->double('total_cost');
            $table->double('deposit_amount')->nullable();
            $table->double('balance')->nullable();
            $table->double('monthDetails_id')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('month_reports');
    }
}
