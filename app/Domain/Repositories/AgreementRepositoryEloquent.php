<?php

namespace App\Domain\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domain\Interfaces\AgreementRepository;
use App\Domain\Models\Tables\Agreement;
use App\Domain\Validators\AgreementValidator;

/**
 * Class AgreementRepositoryEloquent.
 *
 * @package namespace App\Domain\Repositories;
 */
class AgreementRepositoryEloquent extends BaseRepository implements AgreementRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Agreement::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
