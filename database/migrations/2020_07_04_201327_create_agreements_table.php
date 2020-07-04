<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAgreementsTable.
 */
class CreateAgreementsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agreements', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedInteger('customer_id');
            $table->string('service_contractor');
            $table->date('deadline');
            $table->set('advertisement', ['faixa', 'cartão', 'logo', '1/4 pág', '1/2 pág', '1 pág']);
            $table->string('region');
            $table->mediumText('modifications');
            $table->string('observations');
            $table->enum('payment', ['bank_check', 'credit_card'])->default('credit_card');
            $table->float('input_value')->default(0.0);
            $table->unsignedInteger('installments')->default(1);
            $table->float('installment_value')->default(0.0);
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('users');
            $table->foreign('customer_id')->references('id')->on('customers');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('agreements',
            function (Blueprint $table) {
                $table->dropForeign(['employee_id']);
                $table->dropForeign(['customer_id']);
            }
        );

		Schema::drop('agreements');
	}
}
