<?php


namespace App\Service\Town;


use App\Data\TownDTO;
use App\Repository\Town\TownRepositoryInterface;

class TownService implements TownServiceInterface
{
    private $townRepository;

    /**
     * TownService constructor.
     * @param $townRepository
     */
    public function __construct(TownRepositoryInterface $townRepository)
    {
        $this->townRepository = $townRepository;
    }


    /**
     * @return \Generator|TownDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->townRepository->findAll();
    }
}