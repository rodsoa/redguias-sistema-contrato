<?php

namespace App\Domain\Models\Tables;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Customer.
 *
 * @package namespace App\Domain\Models\Tables;
 */
class Customer extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'cnpj',
        'address',
        'address_number',
        'address_complement',
        'neighborhood',
        'zipcode',
        'uf',
        'phone_number',
        'cellphone_number',
        'contact_name',
        'email',
    ];

}
