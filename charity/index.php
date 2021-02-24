<?php
require_once('../load.php');
get_header();
$conn = db_conn();

is_charity();
$charity = get_charity();
if(isset($_POST['submit_number'])){
    $number = $_POST['number'];
    $sql = 'UPDATE charity SET daily_food_count="'.$number.'" WHERE username="'.$charity['username'].'"';
    $res = mysqli_query($conn, $sql);
    if($res){
        $submit_number_msg = c_DriverRateSubmitted;
        $charity = get_charity();
    }
}

if(isset($_POST['submit_request_id'])){
    $id = $_POST['submit_request_id'];
    $rate = $_POST['rate'];
    $sql = 'UPDATE send_request SET rate="'.$rate.'" WHERE id="'.$id.'"';
    $res = mysqli_query($conn, $sql);
    if($res)
        $submit_rate_msg = c_DriverRateSubmitted.$rate.'/5';
}

$sql = 'SELECT resturant.name as resturant_name, food.name as food_name, number, CONCAT(driver.first_name, " ", driver.last_name) as driver_name, done, rate, send_request.id
        FROM send_request 
        INNER JOIN resturant ON send_request.resturant=resturant.username
        LEFT JOIN driver ON send_request.driver = driver.national_id
        INNER JOIN food ON send_request.food=food.id
        WHERE send_request.charity="'.$charity['username'].'"
        ORDER BY timestamp DESC
        LIMIT 10
    ';
$res = mysqli_query($conn, $sql);
$request = mysqli_fetch_all($res, MYSQLI_ASSOC)
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
                        <?php echo c_charityDashboard ?>
                    </h1>
                    <hr/>
                    <?php
                    if(isset($submit_number_msg)){?>
                        <div class="alert alert-success">
                            <?=$submit_number_msg?>
                        </div>
                    <?php 
                    }
                    ?>
                    <h4><?php echo c_TheNumberOfFoodsNeededToday ?></h4>
                    <form class="mt-4" method="POST" action="index.php">
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="number"><?php echo c_Number ?></label>
                            <div class="col-8">
                                <input class="form-control" type="number" name="number" id="number" value="<?=$charity['daily_food_count']?>">
                            </div>
                            <div class="col-2">
                                <input name="submit_number" class="btn btn-primary" type="submit" value="<?php echo c_Update ?>">
                            </div>
                        </div>
                    </form>

                    <h4 class="mt-5"><?php echo c_LatestDonatedFoods ?></h4>
                    <?php if(isset($submit_rate_msg)){?>
                        <div class="alert alert-success">
                            <?=$submit_rate_msg?>
                        </div>
                    <?php } ?>
                    <table class="table mt-3">
                        <thead>
                            <th>#</th>
                            <th><?php echo c_restaurant ?></th>
                            <th><?php echo c_Food ?></th>
                            <th><?php echo c_Number ?></th>
                            <th><?php echo c_driver ?></th>
                            <th><?php echo c_Rate ?></th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach($request as $item){ $i++;?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$item['resturant_name'];?></td>
                                    <td><?=$item['food_name'];?></td>
                                    <td><?=$item['number'];?></td>
                                    <td><?=$item['driver_name'];?></td>
                                    <td>
                                        <?php
                                            if($item['rate']) echo $item['rate'].'/5';
                                            elseif($item['done']==0) echo c_pending;
                                            else{?>
                                                <form action="index.php" method="POST">
                                                    <input type="number" name="rate" max="5" min="1" value="5"/>
                                                    <input type="hidden" name="submit_request_id" value="<?=$item['id']?>">
                                                </form>
                                            <?php }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
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