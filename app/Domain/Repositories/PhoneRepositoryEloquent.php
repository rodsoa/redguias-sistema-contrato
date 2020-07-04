<?php

namespace App\Domain\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domain\Interfaces\PhoneRepository;
use App\Domain\Models\Tables\Phone;
use App\Domain\Validators\PhoneValidator;

/**
 * Class PhoneRepositoryEloquent.
 *
 * @package namespace App\Domain\Repositories;
 */
class PhoneRepositoryEloquent extends BaseRepository implements PhoneRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Phone::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
