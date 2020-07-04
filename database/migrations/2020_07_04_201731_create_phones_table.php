<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;


class CreatePhonesTable extends Migration
{
	public function up() : void
	{
		Schema::create('phones', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('agreement_id');
            $table->string('number', 20);
            $table->timestamps();

            $table->foreign('agreement_id')->references('id')->on('agreements');
		});
	}

	public function down() : void
	{
        Schema::table('phones',
            function (Blueprint $table): void {
                $table->dropForeign(['agreement_id']);
            }
        );

		Schema::drop('phones');
	}
}
