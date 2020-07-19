<?php

namespace App\Domain\Services;

use App\Domain\Interfaces\CustomerRepository;
use Illuminate\Database\Eloquent\Collection;

class CustomerService
{
    /**
     * @var CustomerRepository
     */
    private $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listAll(): Collection
    {
        return $this->repository->all();
    }

    public function findById(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
