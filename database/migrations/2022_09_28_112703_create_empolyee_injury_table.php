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
        Schema::create('empolyee_injury', function (Blueprint $table) {
            $table->id();
            $table->string('incidentDate');
            $table->string('incidentTime');
            $table->string('injury');
            $table->string('tempEmployee');
            $table->string('employeeName');
            $table->string('employeeId');
            $table->string('department');
            $table->string('jobTitle');
            $table->string('involvedContact');
            $table->string('supervisorName');
            $table->string('otherEmployee_involved');
            $table->mediumText('incidentOccur');
            $table->mediumText('employeeBefore');
            $table->mediumText('happenedBelow');
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
        Schema::dropIfExists('empolyee_injury');
    }
};
