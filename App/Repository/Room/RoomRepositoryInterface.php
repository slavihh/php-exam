<?php


namespace App\Repository\Room;


use App\Data\RoomDTO;

interface RoomRepositoryInterface
{
    /**
     * @return \Generator|RoomDTO[]
     */
    public function findAll() : \Generator;
}