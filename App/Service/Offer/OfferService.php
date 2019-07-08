<?php


namespace App\Service\Offer;


use App\Data\AllOffersDTO;
use App\Data\EditOfferDTO;
use App\Data\MyOffersDTO;
use App\Data\OfferDTO;
use App\Data\ViewOfferDTO;
use App\Repository\Offer\OfferRepositoryInterface;

class OfferService implements OfferServiceInterface
{
    private $offerRepository;

    /**
     * OfferService constructor.
     * @param $offerRepository OfferRepositoryInterface
     */
    public function __construct(OfferRepositoryInterface $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    /**
     * @param OfferDTO $offerDTO
     * @return bool
     */
    public function add(OfferDTO $offerDTO): bool
    {
       return $this->offerRepository->insert($offerDTO);
    }

    public function edit(int $id, OfferDTO $offerDTO): bool
    {
        $userOffers = $this->offerRepository->findAllByAuthor(intval($_SESSION['id']));
        $hasOffer = false;
        foreach ($userOffers as $offer) {
            if ($offer->getId() == $id) {
                if ($offer->getAuthorId() == intval($_SESSION['id']))
                {
                    $hasOffer = true;
                    break;
                }

            }
        }

        if ($hasOffer === false) {
            throw new \Exception("You can't delete this offer!");
        }
        return $this->offerRepository->update($id, $offerDTO);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->offerRepository->delete($id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function rent(int $id, $totalPrice) : bool {
        return $this->offerRepository->rent($id, $totalPrice);
    }
    /**
     * @return \Generator|AllOffersDTO[]
     */
    public function getAll(): \Generator
    {
        return $this->offerRepository->findAll();
    }

    /**
     * @param int $id
     * @return ViewOfferDTO|null
     */
    public function getById(int $id): ?ViewOfferDTO
    {
        return $this->offerRepository->findOne($id);
    }

    /**
     * @param int $authorId
     * @return \Generator|MyOffersDTO[]
     */
    public function getAllByAuthor(int $authorId): \Generator
    {
        return $this->offerRepository->findAllByAuthor($authorId);
    }

    /**
     * @param int $userId
     * @return \Generator|ViewOfferDTO[]
     */
    public function getAllUserRents(int $userId): \Generator
    {
        return $this->offerRepository->findAllUserRents($userId);
    }
}