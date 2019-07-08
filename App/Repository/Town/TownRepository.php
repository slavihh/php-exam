<?php


namespace App\Repository\Town;


use App\Data\TownDTO;
use App\Repository\DatabaseAbstract;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class TownRepository extends DatabaseAbstract implements TownRepositoryInterface
{
    public function __construct(DatabaseInterface $database, DataBinderInterface $dataBinder)
    {
        parent::__construct($database, $dataBinder);
    }

    /**
     * @return \Generator|TownDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("SELECT id, name FROM towns")->execute()->fetch(TownDTO::class);
    }
}