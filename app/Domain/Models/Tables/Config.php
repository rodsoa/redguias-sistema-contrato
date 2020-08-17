<?php

namespace App\Domain\Models\Tables;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'primary_email',
        'secondary_email',
    ];
}
