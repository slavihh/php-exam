<?php


namespace App\Data;


class ViewOfferDTO
{
    private $id;

    private $pictureUrl;

    private $town;

    private $roomType;

    private $description;

    private $days;

    private $price;

    private $totalPrice;

    private $isOccupied;

    private $offerAuthor;

    private $offerPhone;

    private $authorId;

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param mixed $authorId
     */
    public function setAuthorId($authorId): void
    {
        $this->authorId = $authorId;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * @param mixed $pictureUrl
     */
    public function setPictureUrl($pictureUrl): void
    {
        $this->pictureUrl = $pictureUrl;
    }

    /**
     * @return mixed
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param mixed $town
     */
    public function setTown($town): void
    {
        $this->town = $town;
    }

    /**
     * @return mixed
     */
    public function getRoomType()
    {
        return $this->roomType;
    }

    /**
     * @param mixed $roomType
     */
    public function setRoomType($roomType): void
    {
        $this->roomType = $roomType;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param mixed $days
     */
    public function setDays($days): void
    {
        $this->days = $days;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @param mixed $totalPrice
     */
    public function setTotalPrice($totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return mixed
     */
    public function getIsOccupied()
    {
        return $this->isOccupied;
    }

    /**
     * @param mixed $isOccupied
     */
    public function setIsOccupied($isOccupied): void
    {
        $this->isOccupied = $isOccupied;
    }

    /**
     * @return mixed
     */
    public function getOfferAuthor()
    {
        return $this->offerAuthor;
    }

    /**
     * @param mixed $offerAuthor
     */
    public function setOfferAuthor($offerAuthor): void
    {
        $this->offerAuthor = $offerAuthor;
    }

    /**
     * @return mixed
     */
    public function getOfferPhone()
    {
        return $this->offerPhone;
    }

    /**
     * @param mixed $offerPhone
     */
    public function setOfferPhone($offerPhone): void
    {
        $this->offerPhone = $offerPhone;
    }


}