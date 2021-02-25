<?php
require_once('../load.php');
get_header();
$conn = db_conn();

is_resturant();
$resturant = get_resturant();

$errors = [];

if(isset($_POST['add_request_submit'])){
    $charity = $_POST['charity'];
    $food = $_POST['food'];
    $number = $_POST['number'];

    // get charity data
    $sql = 'SELECT * from charity WHERE username="'.$charity.'"';
    $res = mysqli_query($conn, $sql);
    $charity_obj = mysqli_fetch_array($res);

    // check available driver
    $sql = 'SELECT * from driver WHERE status="available" AND covered_zone="'.$resturant['zone'].'" LIMIT 1';
    $res = mysqli_query($conn, $sql);
    if($res){
        $driver_obj = mysqli_fetch_array($res);
    }

    if($number > $charity_obj['daily_food_count']) // check number
        $errors[] = 'Number is more than requested foods. Maximum number for this charity is: '.$charity_obj['daily_food_count'];
    else{
        $sql = 'INSERT INTO send_request (resturant, charity, food, number, timestamp, driver) VALUES(
            "'.$resturant['username'].'",
            "'.$charity.'",
            "'.$food.'",
            "'.$number.'",
            "'.time().'"
        ';
        if($driver_obj){
            $sql .= ', "'.$driver_obj['national_id'].'" )';
        }
        else{
            $sql .= ', null)';
        }

        $res = mysqli_query($conn, $sql);

        $sql2 = 'UPDATE charity SET daily_food_count = "'.($charity_obj['daily_food_count']-$number).'" WHERE username = "'.$charity.'"';
        $res2 = mysqli_query($conn, $sql2);
        if($res AND $res2){
            // make driver unavailable
            $sql = 'UPDATE driver SET status="unavailable" WHERE national_id="'.$driver_obj['national_id'].'"';
            $res = mysqli_query($conn, $sql);
            if($res){
                $submit_request_msg = "Request Created.";
            }else $errors[] = 'Couldnt assign driver.';
        }
        else{
            $errors[] = mysqli_error($res);
            $errors[] = mysqli_error($res2);
        }
    }


}

$sql = 'SELECT * from resturant_charity, charity 
        WHERE resturant="'.$resturant['username'].'" 
        AND charity=charity.username
        AND charity.daily_food_count > 0
    ';
$res = mysqli_query($conn, $sql);
$charities = mysqli_fetch_all($res, MYSQLI_ASSOC);

$sql = 'SELECT * from food';
$res = mysqli_query($conn, $sql);
$foods = mysqli_fetch_all($res, MYSQLI_ASSOC);

$sql = 'SELECT send_request.id, CONCAT(driver.first_name, " ", driver.last_name) as driver_name, food.name as food_name, number, charity.name as charity_name, timestamp, rate FROM send_request
        LEFT JOIN driver ON send_request.driver=driver.national_id
        INNER JOIN charity ON send_request.charity=charity.username
        INNER JOIN food ON send_request.food=food.id
        WHERE send_request.resturant="'.$resturant['username'].'"
        ORDER BY timestamp DESC
    ';
$res = mysqli_query($conn, $sql);
$requests = mysqli_fetch_all($res, MYSQLI_ASSOC);
?>

    <div class="container">
        <div class="dashboard">
            <div class="row">
                <div class="col-3">
                    <div class="sidebar">
                        <?php include_once('sidebar.php'); ?>
                    </div>
                </div>
                <div class="col-9">
                    <div class="mainbar">
                        <h1>
                            <?php echo c_NewRequest ?>
                        </h1>
                        <hr/>
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
                        if(isset($$submit_request_msg)){?>
                            <div class="alert alert-success" role="alert">
                                <?=$$submit_request_msg?>
                            </div>
                        <?php } ?>
                        <h3><?php echo c_AddNewRequest ?></h3>
                        <form class="form-inline mt-3" method="POST" action="new_request.php">
                            <div class="form-group mb-2">
                                <select name="charity" class="form-control" required>
                                    <option value="" selected hidden><?php echo c_charity ?></option>
                                    <?php
                                    foreach($charities as $ch){
                                        echo '<option value="'.$ch['username'].'">'.$ch['name'].' - '.$ch['daily_food_count'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-2 ml-3">
                                <select name="food" class="form-control" required>
                                    <option value="" selected hidden><?php echo c_Food ?></option>
                                    <?php
                                    foreach($foods as $food){
                                        echo '<option value="'.$food['id'].'">'.$food['name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input name="number" type="number" value="10" class="form-control" id="number" placeholder="<?php echo c_Number ?>">
                            </div>
                            <button name="add_request_submit" type="submit" class="btn btn-primary ml-3 mb-2"><?php echo c_Submit ?></button>
                        </form>

                        <h3><?php echo c_AllRequests ?></h3>
                        <?php
                        if(isset($delete_charity_msg)){?>
                            <div class="alert alert-danger" role="alert">
                                <?=$delete_charity_msg?>
                            </div>
                        <?php } ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo c_charity ?></th>
                                <th><?php echo c_Food ?></th>
                                <th><?php echo c_Number ?></th>
                                <th><?php echo c_Time ?></th>
                                <th><?php echo c_driver ?></th>
                                <th><?php echo c_Rate ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach($requests as $item){
                                $i++;
                                echo '
                                    <tr>
                                        <td>'.$i.'</td>
                                        <td>'.$item['charity_name'].'</td>
                                        <td>'.$item['food_name'].'</td>
                                        <td>'.$item['number'].'</td>
                                        <td>'.get_date($item).'</td>
                                        <td>'.($item['driver_name'] ? $item['driver_name'] : '<i class="small text-muted">Not available</i>').'</td>
                                        <td>'.($item['rate'] ? $item['rate'].'/5' : '').'</td>
                                    </tr>
                                ';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
?>