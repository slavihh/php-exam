<?php


namespace App\Repository\Offer;


use App\Data\AllOffersDTO;
use App\Data\EditOfferDTO;
use App\Data\MyOffersDTO;
use App\Data\OfferDTO;
use App\Data\ViewOfferDTO;
use App\Repository\DatabaseAbstract;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class OfferRepository extends DatabaseAbstract implements OfferRepositoryInterface
{

    public function __construct(DatabaseInterface $database,
                                DataBinderInterface $dataBinder)
    {
        parent::__construct($database, $dataBinder);
    }

    public function insert(OfferDTO $offerDTO): bool
    {
        $this->db->query("INSERT INTO offers (price, days, description, picture_url, room_id, town_id, user_id)
                                VALUES(?,?,?,?,?,?,?)
        ")->execute([$offerDTO->getPrice(),
            $offerDTO->getDays(),
            $offerDTO->getDescription(),
            $offerDTO->getPictureUrl(),
            $offerDTO->getRoomType(),
            $offerDTO->getTown(),
            $_SESSION['id']]);

        return true;
    }

    public function update(int $id, OfferDTO $offerDTO): bool
    {
        $this->db->query("
                            UPDATE offers
                            SET
                                is_occupied = ?,
                                price = ?,
                                days = ?,
                                description = ?,
                                picture_url = ?,
                                room_id = ?,
                                town_id = ?,
                                rented_by = NULL
                            WHERE id = ?
                            ")->execute([
                                $offerDTO->getIsOccupied(),
                                $offerDTO->getPrice(),
                                $offerDTO->getDays(),
                                $offerDTO->getDescription(),
                                $offerDTO->getPictureUrl(),
                                $offerDTO->getRoomType(),
                                $offerDTO->getTown(),
                                $id
                                        ]);
        return true;
    }


    public function delete(int $id): bool
    {
        $this->db->query("DELETE FROM offers WHERE id = ?")
            ->execute([$id]);
        return true;
    }

    /**
     * @return \Generator|AllOffersDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query("SELECT o.id,
                                o.picture_url AS pictureUrl,
                                t.name AS town,
                                r.type,
                                o.days,
                                (o.days * o.price) AS totalPrice,
                                o.is_occupied as isOccupied
                            FROM offers o
                            JOIN rooms r on o.room_id = r.id
                            JOIN towns t on o.town_id = t.id
                            ORDER BY o.added_on,
                                     totalPrice DESC;
                            ")->execute()->fetch(AllOffersDTO::class);
    }

    public function findOne(int $id): ?ViewOfferDTO
    {
        return $this->db->query("SELECT o.id,
                                o.picture_url AS pictureUrl,
                                t.name AS town,
                                r.type,
                                o.days,
                                o.price,
                                o.description,
                                r.type AS roomType,
                                (o.days * o.price) AS totalPrice,
                                o.is_occupied AS isOccupied,
                                u.name AS offerAuthor,
                                u.phone AS offerPhone,
                                u.id AS authorId
                            FROM offers o
                            JOIN rooms r on o.room_id = r.id
                            JOIN towns t on o.town_id = t.id
                            JOIN users u on o.user_id = u.id
                            WHERE o.id = ?
                
                            ")->execute([$id])->fetch(ViewOfferDTO::class)->current();
    }

    public function findAllByAuthor(int $authorId): \Generator
    {
        return $this->db->query("SELECT o.id,
                                t.name AS town,
                                r.type,
                                o.days,
                                o.price,
                                o.is_occupied as isOccupied,
                                u.id AS authorId
                            FROM offers o
                            JOIN rooms r on o.room_id = r.id
                            JOIN towns t on o.town_id = t.id
                            JOIN users u on o.user_id = u.id
                            WHERE o.user_id = ?
                            ")->execute([$authorId])->fetch(MyOffersDTO::class);
    }

    public function rent(int $id, $totalPrice): bool
    {
        $this->db->query("UPDATE offers SET is_occupied = 1, rented_by = ? WHERE id = ?")->execute([intval($_SESSION['id']), $id]);
        $this->db->query("UPDATE users SET money_spent = money_spent + ? WHERE id = ?")->execute([floatval($totalPrice), intval($_SESSION['id'])]);
        return true;
    }

    /**
     * @param int $userId
     * @return \Generator|ViewOfferDTO[]
     */
    public function findAllUserRents(int $userId) : \Generator {
        return $this->db->query("SELECT o.id,
                                o.picture_url AS pictureUrl,
                                t.name AS town,
                                r.type AS roomType,
                                o.days,
                                o.price,
                                o.description,
                                r.type AS rentType,
                                (o.days * o.price) AS totalPrice,
                                o.is_occupied AS isOccupied,
                                u.name AS offerAuthor,
                                u.phone AS offerPhone,
                                u.id AS authorId
                            FROM offers o
                            JOIN rooms r on o.room_id = r.id
                            JOIN towns t on o.town_id = t.id
                            JOIN users u on o.user_id = u.id
                            WHERE o.rented_by = ?
                            ")->execute([$userId])->fetch(ViewOfferDTO::class);
    }
}