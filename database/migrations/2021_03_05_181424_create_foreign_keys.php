<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('classrooms', function(Blueprint $table) {
			$table->foreign('grade_id')->references('id')->on('grades')
						->onDelete('cascade');
		});

        Schema::table('sections', function(Blueprint $table) {
            $table->foreign('grade_id')->references('id')->on('grades')
                ->onDelete('cascade');
        });

        Schema::table('my__parents', function(Blueprint $table) {
            $table->foreign('nationality_father_id')->references('id')->on('nationalities');
            $table->foreign('blood_type_father_id')->references('id')->on('type__bloods');
            $table->foreign('religion_father_id')->references('id')->on('religions');
            $table->foreign('nationality_mother_id')->references('id')->on('nationalities');
            $table->foreign('blood_type_mother_id')->references('id')->on('type__bloods');
            $table->foreign('religion_mother_id')->references('id')->on('religions');
        });

        Schema::table('parent_attachments', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('my__parents');
        });

	}

	public function down()
	{
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->dropForeign('classrooms_grade_id_foreign');
		});
        Schema::table('sections', function(Blueprint $table) {
            $table->dropForeign('sections_grade_id_foreign');
        });
        Schema::table('sections', function(Blueprint $table) {
            $table->dropForeign('sections_class_id_foreign');
        });
	}
}
