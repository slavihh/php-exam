<?php


namespace App\Repository\Room;


use App\Data\RoomDTO;
use App\Repository\DatabaseAbstract;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class RoomRepository extends DatabaseAbstract implements RoomRepositoryInterface
{
    public function __construct(DatabaseInterface $database, DataBinderInterface $dataBinder)
    {
        parent::__construct($database, $dataBinder);
    }

    /**
     * @return \Generator|RoomDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("SELECT id, type FROM rooms")->execute()->fetch(RoomDTO::class);
    }
}