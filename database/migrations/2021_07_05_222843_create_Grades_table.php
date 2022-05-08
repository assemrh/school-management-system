<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration {

	public function up()
	{
		Schema::create('Grades', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('Name', 30)->default('Untiled Grade');
			$table->longText('Notes');
		});
	}

	public function down()
	{
		Schema::drop('Grades');
	}
}