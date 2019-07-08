<?php /** @var \App\Data\ViewOfferDTO $data */ ?>

<h1>Offer №<?= $_GET['id'] ?></h1>

<a href="profile.php">My Profile</a><br />

<img src="<?= $data->getPictureUrl(); ?>" alt="None" width="400" height="250" />
<p>Town: <?= $data->getTown()?></p>
<p>Room: <?= $data->getRoomType(); ?></p>
<p>Description: <?= $data->getDescription(); ?></p>
<p>Days: <?= $data->getDays() ?></p>
<p>Price: $ <?= (int)$data->getPrice() ?></p>
<p>Total Price: $ <?= (int)$data->getTotalPrice() ?></p>
<p>Is Available: <?php
    if ($data->getIsOccupied())
        echo "No";
    else
        echo "Yes";
    ?></p>

<hr>
<small>Offer Author:  <?= $data->getOfferAuthor() ?></small><br/>
<small>Offer Phone:  <?= $data->getOfferPhone() ?></small>