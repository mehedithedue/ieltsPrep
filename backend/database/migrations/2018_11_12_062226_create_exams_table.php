<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');

            $table->string('practise_book', 50);
            $table->string('book_details', 50);
            $table->integer('test_no');
            $table->integer('part_no');
            $table->integer('score');
            $table->integer('full_marks');
            $table->unsignedDecimal('band', 2, 1);
            $table->text('comments');
            $table->date('completed_at');

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
        Schema::dropIfExists('exams');
    }
}
