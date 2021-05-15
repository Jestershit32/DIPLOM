<?PHP
    session_start();
    $login=filter_var(trim($_POST['login']));
    $password=filter_var(trim($_POST['password']));
    require "connect.php";
    $result= $mysql -> query(" SELECT * FROM `admins`
    WHERE `login` = '$login' 
    AND `pass` = '$password' 
    ");
    $user=$result->fetch_assoc();
    if(count($user)==0){
        $_SESSION['message'] = 'Данного пользователя не найдено';
        header("Location: login-window.php");
        exit;
    }
    session_start();
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name'=>$user['name'],
        'login'=>$user['login'],
        'rule' => $user['rule'],
        'avatar' => $user['avatar']
    ];
    header("Location: index.php");

?>