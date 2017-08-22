<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('hours');
            $table->string('salary');
            $table->string('availablefrom');
            $table->string('location');
            $table->string('startdate');

            /* Skills */
            $table->string('java');
            $table->string('python');
            $table->string('c');
            $table->string('csharp');
            $table->string('cplus');
            $table->string('php');
            $table->string('html');
            $table->string('css');
            $table->string('javascript');
            $table->string('sql');
            $table->string('unix');
            $table->string('winserver');
            $table->string('windesktop');
            $table->string('linuxdesktop');
            $table->string('macosdesktop');
            $table->string('pearl');
            $table->string('bash');
            $table->string('batch');
            $table->string('cisco');
            $table->string('office');
            $table->string('r');
            $table->string('go');
            $table->string('ruby');
            $table->string('asp');
            $table->string('scala');

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
        Schema::dropIfExists('jobs');
    }
}