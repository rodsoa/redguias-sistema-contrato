<?php

namespace App\Domain\Services;

use App\Domain\Interfaces\AgreementRepository;
use App\Domain\Models\Tables\Agreement;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class AgreementService
{
    /**
     * @var AgreementRepository
     */
    private $repository;

    public function __construct(AgreementRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Collection
     */
    public function listAll($customerFilter = null): Collection
    {
        return ($customerFilter)
            ? $this->repository->findByField('customer_id', $customerFilter)
            : $this->repository->all();
    }

    /**
     * @return mixed
     */
    public function findById( $id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data) : Agreement
    {
        $this->formatValues($data);
        data_set($data, 'employee_id', Auth::user()->id);
        return $this->repository->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id)
    {
        $this->formatValues($data);
        return $this->repository->update($data, $id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $agreement = $this->findById($id);

        if ($agreement->delete()) {
            return false;
        }

        return true;
    }

    private function strToFloat(string $money): float
    {
        return (float)str_replace(",", ".",str_replace(".","",$money));
    }

    private function formatValues(array &$data):void {
        data_set($data, 'advertisement', implode(',', data_get($data, 'advertisement')));
        data_set($data, 'deadline', Carbon::createFromFormat('d/m/Y', data_get($data,'deadline'))->toDateString());
        data_set($data, 'input_value', $this->strToFloat(data_get($data, 'input_value')));
        data_set($data, 'installment_value', $this->strToFloat(data_get($data, 'installment_value')));
    }
}
