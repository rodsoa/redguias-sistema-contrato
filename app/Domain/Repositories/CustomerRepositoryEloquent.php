<?php

namespace App\Domain\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domain\Interfaces\CustomerRepository;
use App\Domain\Models\Tables\Customer;
use App\Domain\Validators\CustomerValidator;

/**
 * Class CustomerRepositoryEloquent.
 *
 * @package namespace App\Domain\Repositories;
 */
class CustomerRepositoryEloquent extends BaseRepository implements CustomerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
