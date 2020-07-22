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

    /**
     * @return Collection
     */
    public function listAll(): Collection
    {
        return $this->repository->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        $customer = $this->findById($id);

        foreach ($customer->agreements as $agreement) {
            $agreement->delete();
        }

        if ($customer->delete()) {
            return false;
        }

        return true;
    }
}
