<?PHP 
session_start();
?>
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
<?PHP
if(!$_SESSION["user"]["name"]){
?>
<div class="login-content">
        
        <form action="/check-login.php" method="POST" class="login-form" >
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
            <button class="my-button" type="submit">Вход</button>
        </form>
        <a href="registration.php" class="link-glav">Регистрация</a>
        </div>
<?PHP
};
require 'blocks/footer.php';
?>
</body>
</html>