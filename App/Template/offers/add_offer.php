<?php /** @var array $data */ ?>
<?php /** @var array $errors |null */ ?>

<h1>ADD NEW OFFER</h1>


<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<form method="post">
            Town: <select name="town"><br />
                <?php foreach ($data['towns'] as $town): ?>
                    <option value="<?= $town->getId(); ?>">
                        <?= $town->getName(); ?>
                    </option>
                <?php endforeach; ?>
           </select><br />
           Room Type: <select name="room_type"><br />
                <?php foreach ($data['rooms'] as $room): ?>
                    <option value="<?= $room->getId(); ?>">
                        <?= $room->getType(); ?>
                    </option>
                <?php endforeach; ?>
           </select><br />
    Image URL: <input type="text" name="picture_url"/><br />
    Description: <textarea name="description"></textarea><br />
    Days: <input type="number" name="days"/><br />
    Price: <input type="number"  step="0.1" name="price"/><br />

    <input type="submit" value="Add offer" name="add" /><br />
</form>