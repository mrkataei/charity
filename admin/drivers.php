<?php
require_once('../load.php');
get_header();
$conn = db_conn();

is_admin();
$admin = get_admin();
$sql = 'SELECT CONCAT(driver.first_name, " ", driver.last_name) as driver_name , national_id, round(avg(rate), 1) as rate_avg
        FROM send_request 
        INNER JOIN driver ON send_request.driver=driver.national_id 
        GROUP BY driver
        having avg(rate) >= 4
    ';
$res = mysqli_query($conn, $sql);
if($res){
    $best_drivers = mysqli_fetch_all($res, MYSQLI_ASSOC);
}

$sql = 'SELECT 
            CONCAT(driver.first_name, " ", driver.last_name) as driver_name, 
            driver.national_id,
            MAX(rate) as max_rate, 
            MIN(rate) as min_rate 
        FROM `send_request` 
        INNER JOIN driver ON send_request.driver=driver.national_id 
        GROUP BY driver
    ';
$res = mysqli_query($conn, $sql);
if($res)
    $min_max_drivers = mysqli_fetch_all($res, MYSQLI_ASSOC);

$sql = 'SELECT driver.national_id, COUNT(*) as counts,
                CONCAT(driver.first_name, " ", driver.last_name) as driver_name 
        FROM driver_trace 
        INNER JOIN driver ON driver_trace.driver=driver.national_id 
        WHERE timestamp > '.strtotime("-1 days").'
        GROUP BY driver 
        LIMIT 1
    ';
$res = mysqli_query($conn, $sql);
if($res)
    $activest_driver = mysqli_fetch_array($res);
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
                        Drivers
                    </h1>
                    <hr/>
                    <?php
                    if(isset($activest_driver)){
                        echo 'Today activest driver: <b>'.$activest_driver['driver_name'].'</b> - '.$activest_driver['national_id'].': '.$activest_driver['counts'].' times.';
                    }
                    ?>
                    <?php if(isset($best_drivers)):?>
                        <h5 class="mt-4">Drivers rate > 5:</h5>
                        <table class="table">
                            <tr>
                                <th>Driver</th>
                                <th>National ID</th>
                                <th>Rate Average</th>
                            </tr>
                            <?php foreach($best_drivers as $item){?>
                                <tr>
                                    <td><?=$item['driver_name'];?></td>
                                    <td><?=$item['national_id'];?></td>
                                    <td><?=$item['rate_avg'];?></td>
                                </tr>
                            <?php } ?>
                        </table>

                    <?php endif; ?>

                    <?php if(isset($min_max_drivers)):?>
                        <h5 class="mt-4">Min-Max Rating:</h5>
                        <table class="table">
                            <tr>
                                <th>Driver</th>
                                <th>National ID</th>
                                <th>Min Rate</th>
                                <th>Max Rate</th>
                            </tr>
                            <?php foreach($min_max_drivers as $item){?>
                                <tr>
                                    <td><?=$item['driver_name'];?></td>
                                    <td><?=$item['national_id'];?></td>
                                    <td><?=$item['min_rate'];?></td>
                                    <td><?=$item['max_rate'];?></td>
                                </tr>
                            <?php } ?>
                        </table>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>