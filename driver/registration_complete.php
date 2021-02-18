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
    echo $sql;
    $res = mysqli_query($conn, $sql);
    if(!$res){
        $errors[] = "Error: ". mysqli_error($conn);
    }
    else redirect(ROOT_URL . '/driver');
}

?>
<div class="container">
    <div class="w-50 mx-auto card card-body">
        <h1 class="card-title">Registration Complete</h1>
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
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter first name">
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter last name">
            </div>
            <div class="form-group">
                <label for="id">National ID*:</label>
                <input type="number" class="form-control" name="id" id="id" placeholder="Enter national ID" required>
            </div>
            <div class="form-group">
                <label for="zone">Covered Area*:</label>
                <input type="text" class="form-control" name="zone" id="zone" placeholder="Enter covered area" required>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday*:</label>
                <input type="text" class="form-control" name="birthday" id="birthday" placeholder="Enter your full birthday" required>
            </div>
            <div class="form-group">
                <label for="plate">Car Plate*:</label>
                <input type="text" class="form-control" name="plate" id="plate" placeholder="Enter full car's plate" required>
            </div>
            <div class="form-group">
                <label for="color">Car Color*:</label>
                <input type="text" class="form-control" name="color" id="color" placeholder="Enter full car's color" required>
            </div>
            <div class="form-group">
                <label for="lat">Lat:</label>
                <input type="number" class="form-control" name="lat" id="lat" placeholder="Enter Lat">
            </div>
            <div class="form-group">
                <label for="long">Long:</label>
                <input type="number" class="form-control" name="long" id="long" placeholder="Enter Long">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Complete Registration</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>