<h2>REGISTER NEW USER</h2>

<?php /** @var array $errors |null */ ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<form method="post">
    <label>
        Email: <input type="text" name="email"/> <br />
    </label>
    <label>
        Password: <input type="password" name="password"/> <br />
    </label>
    <label>
        Confirm Password: <input type="password" name="confirm_password"/> <br />
    </label>
    <label>
        Name: <input type="text" name="name"/><br />
    </label>
    <label>
        Phone: <input type="text" name="phone"/><br />
    </label>
    <input type="submit" name="register" value="Register"/> <br />

</form>