<?php


namespace App\Repository\Offer;


use App\Data\AllOffersDTO;
use App\Data\EditOfferDTO;
use App\Data\MyOffersDTO;
use App\Data\OfferDTO;
use App\Data\ViewOfferDTO;

interface OfferRepositoryInterface
{
    public function insert(OfferDTO $offerDTO) : bool;

    public function update(int $id, OfferDTO $offerDTO) : bool;

    public function delete(int $id) : bool;

    public function rent(int $id, $totalPrice) : bool;
    /**
     * @return \Generator|AllOffersDTO[]
     */
    public function findAll() : \Generator;

    public function findOne(int $id) : ?ViewOfferDTO;

    /**
     * @param int $authorId
     * @return \Generator|MyOffersDTO[]
     */
    public function findAllByAuthor(int $authorId) : \Generator;

    /**
     * @param int $userId
     * @return \Generator|ViewOfferDTO[]
     */
    public function findAllUserRents(int $userId) : \Generator;
}