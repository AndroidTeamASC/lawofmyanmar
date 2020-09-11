<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laws', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('main');
            $table->string('published_date',100);
            $table->string('release_date',100);
            $table->string('law_no');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('law_type_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
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
        Schema::dropIfExists('laws');
    }
}
