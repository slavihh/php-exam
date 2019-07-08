<?php


namespace App\Service\Room;


use App\Data\RoomDTO;
use App\Repository\Room\RoomRepositoryInterface;

class RoomService implements RoomServiceInterface
{
    private $roomRepository;

    /**
     * RoomService constructor.
     * @param $roomRepository
     */
    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    /**
     * @return \Generator|RoomDTO[]
     */
    public function getAll(): \Generator
    {
       return $this->roomRepository->findAll();
    }
}