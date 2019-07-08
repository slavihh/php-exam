<?php /** @var \App\Data\MyOffersDTO[] $data */ ?>

<h1>MY OFFERS</h1>

<a href="add_offer.php">Add new offer</a> |
<a href="profile.php">My Profile</a> |
<a href="logout.php">logout</a>

<br /><br />

<table border="1">
    <thead>
    <tr>
        <th>Town</th>
        <th>Type</th>
        <th>Days</th>
        <th>Price</th>
        <th>Is Available</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $offer): ?>
        <tr>
            <td><?= $offer->getTown(); ?></td>
            <td><?= $offer->getType(); ?></td>
            <td><?= $offer->getDays(); ?></td>
            <td>$ <?= (int)$offer->getPrice(); ?></td>
            <td><?php
                $isOccupied = intval($offer->getIsOccupied());
            if ($isOccupied == 1 || $offer->getIsOccupied() == true)
                echo "No";
            else if ($isOccupied === 0)
                echo "Yes";
                 ?></td>
            <td><a href="edit_offer.php?id=<?= $offer->getId(); ?>">edit</a></td>
            <td><a href="delete_offer.php?id=<?= $offer->getId(); ?>">delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>