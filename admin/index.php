<?php
require_once('../load.php');
get_header();
$conn = db_conn();

is_admin();
$admin = get_admin();

$sql = 'SELECT charity.name as charity_name, resturant.name as resturant_name, CONCAT(driver.first_name, " ", driver.last_name) as driver_name, rate 
        FROM send_request 
        INNER JOIN charity ON send_request.charity=charity.username
        INNER JOIN resturant ON send_request.resturant=resturant.username
        INNER JOIN driver ON send_request.driver=driver.national_id
        WHERE rate > (
            SELECT AVG(rate) FROM send_request
        )
            AND timestamp > '.strtotime(date('Y-m-d', time()). '00:00:00').'
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
                        <?php echo c_AdminDashboard ?>
                    </h1>
                    <hr/>
                    <h3 class="mt-3"> <?php echo c_TodayTopRequests ?></h3>
                    <?php if($requests): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo c_restaurant ?></th>
                                <th><?php echo c_charity ?></th>
                                <th><?php echo c_driver ?></th>
                                <th><?php echo c_Rate ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach($requests as $item){
                            $i++;    
                            ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$item['resturant_name'];?></td>
                                    <td><?=$item['charity_name'];?></td>
                                    <td><?=$item['driver_name']?></td>
                                    <td><?=$item['rate'];?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
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