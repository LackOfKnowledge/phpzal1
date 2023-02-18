<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0">
    <title><?php echo($title) ?>></title>
</head>
<body>
<header>
    <h1>Odzyskiwanie hasła</h1>
</header>
<section>
    <?php if(!$success): ?>
        <form method="post">
            <ul>
                <li>
                    <label for="password">Nowe hasło</label>
                    <input type="password" name="newPassword[password]" id="password">
                    <p class="error">
                        <?php if (!empty($errors['password'])): ?>
                            <?php echo $errors['password'] ?>
                        <?php endif ?>
                    </p>
                </li>
                <li>
                    <label for="password_again">Powtórz hasło</label>
                    <input type="password" name="newPassword[passwordAgain]" id="password_again">
                    <p class="error">
                        <?php if(!empty($data['password']) && !empty($data['passwordAgain']) && $data['password']!==$data['passwordAgain']): ?>
                            <?php echo $errors['passwordsArentTheSame'] ?>
                        <?php endif ?>
                    </p>
                </li>
                <li>
                    <button type="submit">Wyślij</button>
                </li>
            </ul>
        </form>
    <?php endif ?>
    <?php if($success): ?>
        <p class="succes">Hasło zostało zmienione</p>
        <a href="/">Powrót na stronę główną</a>
    <?php endif ?>
</section>
</body>
</html>