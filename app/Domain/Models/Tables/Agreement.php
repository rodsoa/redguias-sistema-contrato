<?php

namespace App\Domain\Models\Tables;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Agreement.
 *
 * @package namespace App\Domain\Models\Tables;
 */
class Agreement extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'customer_id',
        'service_contractor',
        'deadline',
        'categories',
        'phones',
        'comercial_address',
        'advertisement',
        'region',
        'modifications',
        'observations',
        'payment',
        'input_value',
        'installments',
        'installment_value',
        'owner',
        'version',
        'signature'
    ];

    protected $dates = [
        'deadline'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function totalValue(): float
    {
        $value = ( $this->installments  * $this->installment_value ) + $this->input_value;

        return $value;
    }
}
