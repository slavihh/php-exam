<?php /** @var \App\Data\EditOfferDTO $data */ ?>
<?php /** @var array $errors |null */ ?>

<h1>EDIT OFFER</h1>

<a href="profile.php">My Profile</a><br/><br/>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

    <form method="post">
        Town: <select name="town"><br />
            <?php foreach ($data->getTowns() as $town): ?>
                <?php if ($data->getOffer()->getTown() === $town->getId()): ?>
                    <option selected="selected" value="<?= $town->getId(); ?>"><?= $town->getName(); ?></option>
                <?php else: ?>
                    <option value="<?= $town->getId(); ?>"><?= $town->getName(); ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br />
        Room Type: <select name="room_type"><br />
            <?php foreach ($data->getRooms() as $town): ?>
                <?php if ($data->getOffer()->getRoomType() === $town->getId()): ?>
                    <option selected="selected" value="<?= $town->getId(); ?>"><?= $town->getType(); ?></option>
                <?php else: ?>
                    <option value="<?= $town->getId(); ?>"><?= $town->getType(); ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br />
        Image URL: <input type="text" name="picture_url" value="<?= $data->getOffer()->getPictureUrl() ?>"/><br />
        Description: <textarea name="description"><?= $data->getOffer()->getDescription() ?></textarea><br />
        Days: <input type="number" name="days" value="<?= $data->getOffer()->getDays() ?>"/><br />
        Price: <input type="number"  step="0.1" name="price" value="<?= $data->getOffer()->getPrice() ?>"/><br />
        Is Occupied: <input type="checkbox" name="is_occupied" value="occupied" <?php echo (intval($data->getOffer()->getIsOccupied()) === 1 ? 'checked' : '');?>><br/>
        <input type="submit" value="Edit offer" name="edit" /><br />
    </form>
