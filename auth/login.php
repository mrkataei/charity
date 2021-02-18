<?php
require_once('../load.php');
get_header();
$conn = db_conn();

$errors = [];

redirect_user();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $log = login($username, $password);
    switch($log){
        case -1:
            $errors[] = "Password Incorrect";
        break;
        case -2:
            $errors[] = "Username not exist;";
        break;
        case 1:
            //success
        break;
    }
    
}

?>

<div class="container">
    <div class="w-50 mx-auto card card-body my-5">
        <h1 class="card-title">Login</h1>
        <?php
        if(isset($_GET['password_reset'])){?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Password updated.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        foreach($errors as $err){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?=$err?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }
        ?>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" id="pass" name="password" placeholder="Enter Password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            <div class="mt-2 row">
                <div class="col-6">
                    <a href="register.php">Sign Up Now.</a>
                </div>
                <div class="col-6 text-right">
                    <a href="reset_password.php">Reset Password</a>
                </div>
                
            </div>
            
        </form>
    </div>
</div>

<?php get_footer(); ?>