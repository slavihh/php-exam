<?php


namespace App\Service\Room;


use App\Data\RoomDTO;

interface RoomServiceInterface
{
    /**
     * @return \Generator|RoomDTO[]
     */
    public function getAll() : \Generator;
}