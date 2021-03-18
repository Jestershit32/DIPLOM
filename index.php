<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Главная</title>
</head>
<body>
    <div class="wrapper">
    <?php require 'blocks/header.php' ?>
    <div class="login-content">
        
    <form action="" class="login-form" >
        <label for="" class="login-h1">Вход</label>
        <div class="input-login">
            <img src="img/svg/Search.svg" class="input-icon " alt="иконочка">
            <label for="" class="input-label login">Логин</label>
            <input type="text" name="login" id="form-login"  class="input-text ">
        </div>
        <div class="input-login">
            <img src="img/svg/eye.svg" class="input-icon " alt="иконочка">
            <label for="" class="input-label password">Пароль</label>
            <input type="password" name="password" id="form-password" class="input-text">
        </div>
        <input type="button" class="my-button" value="Вход">
    </form>
    <a href="#" class="link-glav">Гостевой вход</a>
    </div>

    <!-- Предупреждение -->
    <!-- <div class="block-window-warning">
        <div class="window-warning">
            <h1 class="form-label-h1">Предупреждение</h1>
            <p class="warning-inscription">
                Вы действительно хотите удалить методичку
            </p>
            <div class="button-warning-menu">
                <button class="post-button-menu-items button-warning-menu-item delete-button-post"><img class="icon-post-menu-button" src="img/svg/trash.svg" alt="">Да, удалить</button>
                <button class="post-button-menu-items button-warning-menu-item"><img class="icon-post-menu-button" src="img/svg/update.svg" alt="">Отмена</button>
            </div>
        </div>

    </div> -->

    
</div>
    <?php require 'blocks/footer.php'?>
    
</body>
</html> 