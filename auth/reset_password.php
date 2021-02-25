<?php
require_once('../load.php');
get_header();
$conn = db_conn();
?>

<?php
$step = 1;
$errors = [];
if(isset($_POST['submit_step1'])){
    $username = $_POST['username'];

    $sql = 'SELECT username, question_id from users WHERE username="'.$username.'" LIMIT 1';
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
        $user = mysqli_fetch_array($res);
        $sql = 'SELECT * FROM secrity_question WHERE id="'.$user['question_id'].'"';
        $res = mysqli_query($conn, $sql);
        if($res){
            $question = mysqli_fetch_array($res);
            $step = 2;
        }else
            $errors[] = mysqli_error($conn);
    }
    else
        $errors[] = c_usernameDoesntExist;
}

if(isset($_POST['submit_step2'])){
    $username = $_POST['username'];
    $answer = $_POST['answer'];

    $sql = 'SELECT * FROM users WHERE username="'.$username.'" AND question_answer="'.$answer.'" LIMIT 1';
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
        $step = 3;
    }
    else{
        $errors[] = c_wrongAnswer;
    }

}

if(isset($_POST['submit_step3'])){
    $username = $_POST['username'];
    $answer = $_POST['answer'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $sql = 'SELECT * FROM users WHERE username="'.$username.'" AND question_answer="'.$answer.'" LIMIT 1';
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0){
        $step = 3;
        if($password != $password2)
            $errors[] = c_Passwords_not_match;
        if (strlen($password) < 8) {
            $errors[] = c_PasswordTooShort;
        }
        if (!preg_match("#[0-9]+#", $password)) {
            $errors[] = c_PasswordMustIncludeNum;
        }
        if (!preg_match("#[a-zA-Z]+#", $password)) {
            $errors[] = c_PasswordMustIncludeLetter;
        }
        if(!$errors){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = 'UPDATE users SET password="'.$hash.'" WHERE username="'.$username.'"';
            $res = mysqli_query($conn, $sql);
            if($res){
                redirect(LOGIN_URL . '?password_reset=ok');
            }
        }
    }else{
        $errors[] = "";
    }
}
?>

    <div class="container">
        <div class="w-50 mx-auto card card-body my-5">
            <h1 class="card-title"><?php echo c_resetPassword ?></h1>
            <?php
            foreach($errors as $err){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?=$err?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>
            <form method="POST" action="reset_password.php">
                <?php if ($step==1):?>
                    <div class="form-group">
                        <label for="username"><?php echo c_username ?></label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo c_enterUsername ?>" required>
                    </div>
                    <button type="submit" name="submit_step1" class="btn btn-primary btn-block"><?php echo c_checkUsername ?></button>
                <?php elseif($step==2 AND isset($question)): ?>
                    <div class="form-group">
                        <label for="answer"><?=$question['question']?>:</label>
                        <input type="text" class="form-control" id="answer" name="answer" placeholder="<?php echo c_enterAswer ?>" required>
                    </div>
                    <input type="hidden" name="username" value="<?=$username; ?>">
                    <button type="submit" name="submit_step2" class="btn btn-primary btn-block"><?php echo c_checkAnswer ?></button>
                <?php elseif($step==3): ?>
                    <div class="form-group">
                        <label for="password"><?php echo c_newPassword ?></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo c_enterPassword ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password2"><?php echo c_passwordConfiguration ?></label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="<?php echo c_enterPasswordConfiguration ?>" required>
                    </div>
                    <input type="hidden" name="username" value="<?=$username?>">
                    <input type="hidden" name="answer" value="<?=$answer?>">
                    <button type="submit" name="submit_step3" class="btn btn-primary btn-block"><?php echo c_setResetPassword ?></button>
                <?php endif; ?>
                <div class="mt-2">
                    <?php echo c_alreadyHaveAcount ?> <a href="login.php"><?php echo c_login ?></a>
                </div>
            </form>
        </div>
    </div>

<?php get_footer(); ?>