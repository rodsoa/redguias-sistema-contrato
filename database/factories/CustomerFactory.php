<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domain\Models\Tables\Customer;

$faker = \Faker\Factory::create('pt_BR');

$factory->define(Customer::class, function () use ($faker) {
    return [
        'company_name' => $faker->company,
        'cnpj' => $faker->cnpj,
        'address' => $faker->address,
        'address_number' => null,
        'address_complement' => null,
        'neighborhood' => null,
        'zipcode' => $faker->postcode,
        'uf' => $faker->state,
        'phone_number' => $faker->phoneNumber,
        'cellphone_number' => $faker->cellphoneNumber,
        'contact_name' => $faker->name,
        'email' => $faker->safeEmail,
    ];
});
