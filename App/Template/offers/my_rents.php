<?php /** @var \App\Data\ViewOfferDTO[] $data */ ?>


<a href="profile.php">My Profile</a><br />

<?php foreach ($data as $offer): ?>
<img src="<?= $offer->getPictureUrl(); ?>" alt="None" width="400" height="250" />
    <p>Town: <?= $offer->getTown() ?></p>
<p>Room: <?= $offer->getRoomType(); ?></p>
<p>Description: <?= $offer->getDescription(); ?></p>
<p>Days: <?= $offer->getDays() ?></p>
<p>Price: <?= $offer->getPrice() ?></p>
<p>Total Price: <?= $offer->getTotalPrice() ?></p>
<p>Is Available: <?php
    if ($offer->getIsOccupied())
        echo "Yes";
    else
        echo "No";
    ?></p>

<hr>
<small>Offer Author:  <?= $offer->getOfferAuthor() ?></small><br/>
<small>Offer Phone:  <?= $offer->getOfferPhone() ?></small>
<br/>
<br/>
<?php endforeach;?>
