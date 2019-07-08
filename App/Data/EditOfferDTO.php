<?php


namespace App\Data;


class EditOfferDTO
{
    /**
     * @var OfferDTO;
     */
    private $offer;

    /**
     * @var TownDTO[]
     */
    private $towns;

    /**
     * @var RoomDTO[]
     */
    private $rooms;

    /**
     * @return OfferDTO
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * @param  $offer
     */
    public function setOffer($offer): void
    {
        $this->offer = $offer;
    }

    /**
     * @return TownDTO[]
     */
    public function getTowns()
    {
        return $this->towns;
    }

    /**
     * @param TownDTO[] $towns
     */
    public function setTowns($towns): void
    {
        $this->towns = $towns;
    }

    /**
     * @return RoomDTO[]
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @param RoomDTO[] $rooms
     */
    public function setRooms($rooms): void
    {
        $this->rooms = $rooms;
    }


}