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
            $table->string('address')->nullable();
            $table->string('address_number', 5)->nullable();
            $table->string('address_complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('zipcode', 12)->nullable();
            $table->string('uf', 20)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('cellphone_number', 20)->nullable();
            $table->string('contact_name')->nullable();
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
