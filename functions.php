<?php
function get_header(){
    require_once("header.php");
}
function get_footer(){
    require_once("footer.php");
}

function redirect($url){
    header("Location:". $url);
}
function login($username, $password){
    $conn = db_conn();
    $sql = 'SELECT * from users WHERE username="'.$username.'" LIMIT 1';
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
        $user = mysqli_fetch_array($res);
        if(password_verify($password, $user['password'])){
            // success
            $_SESSION["USER_USERNAME"] = $user['username'];
            $_SESSION["USER_ROLE"] = $user['role'];
            redirect_user();
            return 1;
        }
        else return -1; // password incorrent
    }
    else return -2; // username not exist
}
function logout(){
    unset($_SESSION['USER_USERNAME']);
    unset($_SESSION['USER_ROLE']);
    redirect(LOGIN_URL);
}

function is_user(){
    return isset($_SESSION['USER_USERNAME']);
}
function is_admin(){
    if(is_user())
        if($_SESSION['USER_ROLE']=='admin') return;
    redirect(LOGIN_URL);
}
function is_charity(){
    if(is_user())
        if($_SESSION['USER_ROLE']=='charity') return;
    redirect(LOGIN_URL);
}
function is_driver(){
    if(is_user())
        if(($_SESSION['USER_ROLE']=='driver')) return;
    redirect(LOGIN_URL);
}
function is_resturant(){
    if(is_user())
        if($_SESSION['USER_ROLE']=='resturant') return;
    redirect(LOGIN_URL);
}

function redirect_user(){
    if(!is_user()) return;
    redirect(ROOT_URL . '/' . $_SESSION['USER_ROLE']);
}

function get_admin(){
    $conn = db_conn();
    $sql = 'SELECT * FROM admin INNER JOIN users ON admin.user=users.username LIMIT 1';
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_array($res);
}
function get_resturant(){
    $conn = db_conn();
    $sql = 'SELECT * FROM resturant, address WHERE address.id=resturant.address AND username="'.$_SESSION['USER_USERNAME'].'" LIMIT 1';
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) == 0)
        redirect(ROOT_URL . '/resturant/registration_complete.php');
    else{
        return mysqli_fetch_array($res);
    }
}
function get_charity(){
    $conn = db_conn();
    $sql = 'SELECT * FROM charity, address WHERE address.id=charity.address AND username="'.$_SESSION['USER_USERNAME'].'" LIMIT 1';
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) == 0)
        redirect(ROOT_URL . '/charity/registration_complete.php');
    else{
        return mysqli_fetch_array($res);
    }
}
function get_driver(){
    $conn = db_conn();
    $sql = 'SELECT * FROM driver WHERE username="'.$_SESSION['USER_USERNAME'].'" LIMIT 1';
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) == 0)
        redirect(ROOT_URL . '/driver/registration_complete.php');
    else{
        return mysqli_fetch_array($res);
    }
}
function get_date($item){
    if ($_SESSION['lang']=="EN"){
        return date('Y/n/d D g:i a', $item['timestamp']);
    }
    else
        return mds_date("l j F Y a, i : h", $item['timestamp'], 1);
}
function get_now(){
    if ($_SESSION['lang']=="EN"){
        return date('Y/n/d D');
    }
    else
        return mds_date("l j F Y    ", "now", 1);
}
function send_mail(){
    if(!empty($_POST["userName"])) {
        $name = $_POST["userName"];
        $email = $_POST["userEmail"];
        $toEmail = "kouroshinfo96@gmail.com";
        $mailHeaders = "From: " . $name . "<". $email .">\r\n";
        $content = $_POST["message"].$mailHeaders;
        if(mail($toEmail, $name, $content, $mailHeaders)) {
            return $type = "success";
        }
        else{
            return $type = "defeat";
        }
    }
}

?>