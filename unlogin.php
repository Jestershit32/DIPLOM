<?PHP
// session_start();
if(ini_get("session.use_cookies")){
    $params =session_get_cookie_params();
    setcookie(session_name(),'',time() - 420000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
);
}
$_SESSION["user"]=[];
header("Location: index.php");
?>