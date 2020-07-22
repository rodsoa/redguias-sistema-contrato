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
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedInteger('customer_id');
            $table->string('owner')->nullable();
            $table->string('service_contractor');
            $table->date('deadline');
            $table->text('advertisement');
            $table->string('region');
            $table->text('categories');
            $table->string('phones')->nullable();
            $table->text('modifications')->nullable();
            $table->string('observations')->nullable();
            $table->enum('payment', ['bank_check', 'credit_card'])->default('credit_card');
            $table->float('input_value')->default(0.0);
            $table->unsignedInteger('installments')->default(1);
            $table->float('installment_value')->default(0.0);
            $table->string('version')->default(date('Y'));
            $table->mediumText('signature')->nullable();
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
