<?php


namespace App\Service\Offer;


use App\Data\AllOffersDTO;
use App\Data\EditOfferDTO;
use App\Data\MyOffersDTO;
use App\Data\OfferDTO;
use App\Data\ViewOfferDTO;

interface OfferServiceInterface
{
    public function add(OfferDTO $offerDTO) : bool;

    public function edit(int $id, OfferDTO $offerDTO) : bool;

    public function delete(int $id) : bool;

    public function rent(int $id, $totalPrice) : bool;
    /**
     * @return \Generator|AllOffersDTO[]
     */
    public function getAll() : \Generator;

    public function getById(int $id) : ?ViewOfferDTO;

    /**
     * @param int $authorId
     * @return \Generator|MyOffersDTO[]
     */
    public function getAllByAuthor(int $authorId) : \Generator;

    /**
     * @param int $userId
     * @return \Generator|ViewOfferDTO[]
     */
    public function getAllUserRents(int $userId): \Generator;
}