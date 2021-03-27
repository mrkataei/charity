<?php
require_once('../load.php');
get_header();
is_driver();

$conn = db_conn();

$sql = 'SELECT username FROM driver WHERE username="'.$_SESSION['USER_USERNAME'].'" LIMIT 1';
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
    redirect(ROOT_URL . '/driver');
}
?>

<?php
$errors = [];
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $national_id = $_POST['id'];
    $zone = $_POST['zone'];
    $birthday = $_POST['birthday'];
    $plate = $_POST['plate'];
    $color = $_POST['color'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $sql = 'INSERT INTO driver (username, first_name, last_name, car_color, car_tag, national_id, birthday, covered_zone, lng, lat) VALUES(
        "'.$_SESSION['USER_USERNAME'].'",
        "'.$fname.'",
        "'.$lname.'",
        "'.$color.'",
        "'.$plate.'",
        "'.$national_id.'",
        "'.$birthday.'",
        "'.$zone.'",
        "'.$long.'",
        "'.$lat.'"
    )';
    $res = mysqli_query($conn, $sql);
    if(!$res){
        $errors[] = "Error: ". mysqli_error($conn);
    }
    else redirect(ROOT_URL . '/driver');
}

?>
    <div class="container">
        <div class="w-50 mx-auto card card-body">

            <h1 class="card-title"><?php echo c_registrationComplete ?></h1>
            <?php
            foreach($errors as $err){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?=$err?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php }
            ?>
            <form method="POST" action="registration_complete.php">
                <div class="form-group">
                    <label for="fname"><?php echo c_firstName ?></label>
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="<?php echo c_enterFirstName ?>">
                </div>
                <div class="form-group">
                    <label for="lname"><?php echo c_lastName ?></label>
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="<?php echo c_enterLastName ?>">
                </div>
                <div class="form-group">
                    <label for="id"><?php echo c_nationalID ?></label>
                    <input type="number" class="form-control" name="id" id="id" placeholder="<?php echo c_enterNationalID ?>" required>
                </div>
                <div class="form-group">
                    <label for="zone"><?php echo c_zone ?></label>
                    <input type="text" class="form-control" name="zone" id="zone" placeholder="<?php echo c_enterZone ?>" required>
                </div>
                <div class="form-group">
                    <label for="birthday"><?php echo c_birthday ?></label>
                    <input type="text" class="form-control" name="birthday" id="birthday" placeholder="<?php echo c_enterYourFullBirthday ?>" required>
                </div>
                <div class="form-group">
                    <label for="plate"><?php echo c_carPlate ?></label>
                    <input type="text" class="form-control" name="plate" id="plate" placeholder="<?php echo c_enterFullCarsPlate ?>" required>
                </div>
                <div class="form-group">
                    <label for="color"><?php echo c_carColor ?></label>
                    <input type="text" class="form-control" name="color" id="color" placeholder="<?php echo c_enterFullCarsColor ?>" required>
                </div>
                <div class="form-group">
                    <label for="lat">Lat:</label>
                    <input type="number" class="form-control" name="lat" id="lat" placeholder="<?php echo c_enterLat ?>">
                </div>
                <div class="form-group">
                    <label for="long">Long:</label>
                    <input type="number" class="form-control" name="long" id="long" placeholder="<?php echo c_enterLong ?>">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block"><?php echo c_registrationComplete ?></button>
            </form>
        </div>
    </div>

<?php get_footer(); ?>