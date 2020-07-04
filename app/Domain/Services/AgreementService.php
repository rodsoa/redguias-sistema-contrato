<?php

namespace App\Domain\Services;

use App\Domain\Interfaces\AgreementRepository;
use App\Domain\Models\Tables\Agreement;

class AgreementService
{
    /**
     * @var AgreementRepository
     */
    private $repository;

    private $phoneRepository;

    private $categoryRepository;

    private $businessAddressRepository;

    public function __construct(
        AgreementRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function create(array $data) : Agreement
    {
        $agreement = $this->repository->create($data);

        if ($agreement) {
            $this->createRelatedCategories(data_get($data, 'categories'));
            $this->createRelatedPhones(data_get($data, 'phones'));
            $this->createRelatedBusinessAddresses(data_get($data, 'business_addresses'));
        }

        return $agreement->load('phones', 'categories', 'business_addresses');
    }

    private function createRelatedCategories(array $categories): void
    {
    }

    private function createRelatedPhones(array $phones): void
    {
    }

    private function createRelatedBusinessAddresses($addresses): void
    {
    }
}
