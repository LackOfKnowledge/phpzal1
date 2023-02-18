<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <style>
        .error { color: #c00; }
        .success { color: #090 }
    </style>
</head>
<body>
<header>
    <h1>Resetowanie hasła</h1>
</header>
<section>
   <?php if (!$success): ?>
    <form method ="post">
        <ul>
            <li>
                <label for="user-email">E-mail</label>
            <input type="text" placeholder="your@email.com" name="user[email]" id="user-email">
            <?php if (!empty($data['email'])): ?>"
                value="<?php echo $data['email'] ?>"
            <?php endif?>

            <?php if(!empty($errors['email'])):?>
                <p class="error"><?php echo $errors['email']?></p>
            <?php endif?>
            </li>
            <li>
                <button type="submit">Wyślij</button>
            </li>
        </ul>
    </form>
    <?php else :?>
    <p class="success">Sprawdź e-mail</p>
    <?php endif?>
</section>
</body>
</html>
