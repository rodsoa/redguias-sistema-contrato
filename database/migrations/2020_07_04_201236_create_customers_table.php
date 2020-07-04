<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateCustomersTable.
 */
class CreateCustomersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('cnpj', 20);
            $table->string('address');
            $table->string('address_number', 5);
            $table->string('address_complement');
            $table->string('neighborhood');
            $table->string('zipcode', 12);
            $table->string('uf', 2);
            $table->string('phone_number', 20);
            $table->string('cellphone_number', 20);
            $table->string('contact_name');
            $table->string('email', 150)->nullable();
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
		Schema::drop('customers');
	}
}
