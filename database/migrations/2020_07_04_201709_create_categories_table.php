<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCategoriesTable.
 */
class CreateCategoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('agreement_id');
            $table->string('name', 150);
            $table->timestamps();

            $table->foreign('agreement_id')->references('id')->on('agreements');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('categories',
            function (Blueprint $table): void {
                $table->dropForeign(['agreement_id']);
            }
        );

		Schema::drop('categories');
	}
}
