<?php


namespace App\Data;


class OfferDTO
{
    private const IMAGE_MIN_LENGTH = 10;
    private const IMAGE_MAX_LENGTH = 10000;

    private const DESCRIPTION_MIN_LENGTH = 10;
    private const DESCRIPTION_MAX_LENGTH = 10000;

    private const DAYS_MIN_LENGTH = 1;
    private const DAYS_MAX_LENGTH = 50;

    private const PRICE_MIN_LENGTH = 1;
    private const PRICE_MAX_LENGTH = 50;

    private $id;
    private $town;
    private $roomType;
    private $pictureUrl;
    private $description;
    private $days;
    private $price;
    private $isOccupied;
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
    public function getPictureUrl()
    {
        return $this->pictureUrl;
    }

    /**
     * @param $pictureUrl
     * @return OfferDTO
     * @throws \Exception
     */
    public function setPictureUrl($pictureUrl): OfferDTO
    {

        DTOValidator::validate(self::IMAGE_MIN_LENGTH, self::IMAGE_MAX_LENGTH, $pictureUrl, "url", "Image URL");
        $this->pictureUrl = $pictureUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     * @return OfferDTO
     * @throws \Exception
     */
    public function setDescription($description): OfferDTO
    {
        DTOValidator::validate(self::DESCRIPTION_MIN_LENGTH, self::DESCRIPTION_MAX_LENGTH, $description, "text", "Description");
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param $days
     * @return OfferDTO
     * @throws \Exception
     */
    public function setDays($days): OfferDTO
    {
        DTOValidator::validate(self::DAYS_MIN_LENGTH, self::DAYS_MAX_LENGTH, $days, 'number', 'Days');
        $this->days = $days;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param $price
     * @return OfferDTO
     * @throws \Exception
     */
    public function setPrice($price): OfferDTO
    {
        DTOValidator::validate(self::PRICE_MIN_LENGTH, self::PRICE_MAX_LENGTH, $price, 'number', 'Price');
        $this->price = $price;
        return $this;
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



}