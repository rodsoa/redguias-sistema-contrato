<?php

use Illuminate\Database\Seeder;
use App\Domain\Models\Tables\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, 50)
            ->create()
            ->each(
                function (Customer $customer) : void {
                    $customer
                        ->agreements()
                        ->create([
                            'employee_id' => rand(1,10),
                            'customer_id' => $customer->id,
                            'owner' => $customer->company_name,
                            'service_contractor' => $customer->company_name,
                            'deadline' => \Illuminate\Support\Carbon::now()->toDateString(),
                            'advertisement' => implode(",", [$this->ads()[rand(0,5)]]),
                            'region' => "BHTE",
                            'categories' => 'Categoria 1, Categoria 2, Categoria 3',
                            'phones' => '(00) 00000-0000, (00) 10000-2200',
                            'modifications' => null,
                            'observations' => null,
                            'payment' => 'bank_check',
                            'input_value' => 300,
                            'installments' => 2,
                            'installment_value' => 300,
                        ]);
                }
            );
    }

    private function ads(): array
    {
        return ['faixa', 'cartão', 'logo', '1/4 pág', '1/2 pág', '1 pág'];
    }
}
