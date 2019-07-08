<?php /** @var \App\Data\AllOffersDTO[] $data */ ?>

<h1>ALL OFFERS</h1>

<a href="add_offer.php">Add new offer</a> |
<a href="profile.php">My Profile</a> |
<a href="logout.php">logout</a>

<br /><br />

<table border="1">
    <thead>
    <tr>
        <th>Picture</th>
        <th>Town</th>
        <th>Type</th>
        <th>Days</th>
        <th>Total Price</th>
        <th>Is Available</th>
        <th>Details</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $offer): ?>
        <tr>
            <td><img src="<?= $offer->getPictureUrl(); ?>" width="200" height="50" alt="image"> </td>
            <td><?= $offer->getTown(); ?></td>
            <td><?= $offer->getType(); ?></td>
            <td><?= $offer->getDays(); ?></td>
            <td>$<?= (int) $offer->getTotalPrice(); ?></td>
            <td><?php
                if (!$offer->getIsOccupied())
                    echo "<a href='rent_offer.php?id=" . $offer->getId() . "'>rent</a>";
                else
                    echo "No";
                ?></td>
            <td><a href="view_offer.php?id=<?= $offer->getId(); ?>">details</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>