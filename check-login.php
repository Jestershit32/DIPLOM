<?PHP 
    $login=filter_var(trim($_POST['login']));
    $password=filter_var(trim($_POST['password']));
    require "connect.php";
    $result= $mysql -> query(" SELECT * FROM `admins`
    WHERE `login` = '$login' 
    AND `pass` = '$password' 
    ");
    $user=$result->fetch_assoc();
    if(count($user)==0){
        echo "Данного пользователя не найдено";
        header("Location: index.php");
        exit;
    }
    session_start();
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name'=>$user['name'],
        'rule' => $user['rule'],
        'avatar' => $user['avatar']
    ];
    // $_SESSION["rule"]=$user['rule'];
    // $_SESSION["user_name"]=$user['name'];
    header("Location: index.php");

?>