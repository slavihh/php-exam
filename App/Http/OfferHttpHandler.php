<?php


namespace App\Http;


use App\Data\EditOfferDTO;
use App\Data\OfferDTO;
use App\Data\ViewOfferDTO;
use App\Service\Offer\OfferServiceInterface;
use App\Service\Room\RoomServiceInterface;
use App\Service\Town\TownServiceInterface;
use App\Service\UserServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class OfferHttpHandler extends HttpHandlerAbstract
{
    private $offerService;
    private $roomService;
    private $townService;
    private $userService;
    public function __construct(
                                TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                OfferServiceInterface $offerService,
                                RoomServiceInterface $roomService,
                                TownServiceInterface $townService,
                                UserServiceInterface $userService)
    {
        parent::__construct($template, $dataBinder);
        $this->offerService = $offerService;
        $this->roomService = $roomService;
        $this->townService = $townService;
        $this->userService = $userService;
    }

    public function add(array $formData = []) {
        if (isset($formData['add']))
            $this->handleAddProcess($formData);
        else {
            $this->render('offers/add_offer', ['rooms' => $this->roomService->getAll(), 'towns' => $this->townService->getAll()]);
        }
    }
    public function myOffers() {
        $this->render('offers/my_offers', $this->offerService->getAllByAuthor(intval($_SESSION['id'])));
    }

    public function edit(array $formData = []){
        if (isset($formData['edit']))
            $this->handleEditProcess($formData);
        else
        {
            $offer = $this->offerService->getById(intval($_GET['id']));
            $towns = $this->townService->getAll();
            $rooms = $this->roomService->getAll();
            $editOffer = new EditOfferDTO();
            $editOffer->setOffer($offer);
            $editOffer->setTowns($towns);
            $editOffer->setRooms($rooms);

            $this->render('offers/edit_offer', $editOffer);
        }
    }

    public function delete(int $id) {
        $currentUser = $this->userService->currentUser();
        $currentOffer = $this->offerService->getById(intval($id));
        if ($currentUser->getId() === $currentOffer->getAuthorId()) {
            $this->offerService->delete(intval($id));
            $this->redirect("my_offers.php");
        } else {
            $this->redirect("my_offers.php");
        }
    }

    public function allOffers() {
        $this->render('offers/all_offers', $this->offerService->getAll());
    }

    public function viewOffer(int $id) {
        $this->render('offers/view_offer', $this->offerService->getById($id));
    }

    public function rentOffer(int $id) {
        $offer = $this->offerService->getById($id);
        $this->offerService->rent($id, $offer->getTotalPrice());
        $this->redirect('all_offers.php');
    }

    public function myRents() {
        $this->render('offers/my_rents', $this->offerService->getAllUserRents(intval($_SESSION['id'])));
    }
    private function handleAddProcess(array $formData)
    {
        try {
            $offer = $this->dataBinder->bind($formData, OfferDTO::class);
            $this->offerService->add($offer);
            $this->redirect('my_offers.php');

        }
        catch (\Exception $e) {
            $this->render('offers/add_offer',
                ['rooms' => $this->roomService->getAll(), 'towns' => $this->townService->getAll()],
                [$e->getMessage()]);
        }
    }



    private function handleEditProcess(array $formData)
    {
        try {
            /** @var OfferDTO $offer */
            $offer = $this->dataBinder->bind($formData, OfferDTO::class);
            if(isset($formData['is_occupied'])) {
                $offer->setIsOccupied(1);
            }
            else
                $offer->setIsOccupied(0);

            $this->offerService->edit(intval($_GET['id']), $offer);
            $this->redirect('my_offers.php');
        }
        catch (\Exception $e) {
            $offer = $this->offerService->getById(intval($_GET['id']));
            $towns = $this->townService->getAll();
            $rooms = $this->roomService->getAll();
            $editOffer = new EditOfferDTO();
            $editOffer->setOffer($offer);
            $editOffer->setTowns($towns);
            $editOffer->setRooms($rooms);
            $this->render('offers/edit_offer', $editOffer, [$e->getMessage()]);
        }
    }
}