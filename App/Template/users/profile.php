<?php /** @var \App\Data\UserDTO $data */ ?>

<h1>Hello, <?= $data->getName(); ?></h1>

<a href="add_offer.php">Add new offer</a> |
        <a href="logout.php">Logout</a>

<br /><br />

<a href="my_offers.php">My Offers</a> <br />
<a href="all_offers.php">All Offers</a><br/>
<a href="my_rents.php">My rents</a>
<br/>
<br/>
<hr/>
Total Money Spent: $<?= $data->getMoneySpent() ?>