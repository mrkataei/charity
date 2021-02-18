<?php
require_once('../load.php');
get_header();
$conn = db_conn();

is_admin();
$admin = get_admin();

$sql = 'SELECT zone, ROUND(AVG(daily_food_count)) as avg
        FROM charity 
        INNER JOIN address ON charity.address=address.id 
        GROUP BY zone
        HAVING zone != ""
    ';
$res = mysqli_query($conn, $sql);
if($res){
    $charities_by_zone = mysqli_fetch_all($res, MYSQLI_ASSOC);
}

$sql = 'SELECT name, people_covered FROM charity ORDER BY people_covered DESC LIMIT 1';
$res = mysqli_query($conn, $sql);
$needful_charity = mysqli_fetch_array($res);

$sql = 'SELECT SUM(number) as sum, charity.name 
        FROM send_request 
        INNER JOIN charity ON send_request.charity=charity.username 
        GROUP BY charity
        ORDER BY SUM(number) ASC
        LIMIT 1
    ';
$res = mysqli_query($conn, $sql);
$needful_charity2 = mysqli_fetch_array($res);

$sql = 'SELECT COUNT(resturant) as count, charity.name
        FROM `resturant_charity` 
        INNER JOIN charity ON resturant_charity.charity=charity.username
        GROUP BY charity 
        LIMIT 1';
$res = mysqli_query($conn, $sql);
$needful_charity3 = mysqli_fetch_array($res);
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
                        Charities
                    </h1>
                    <hr/>
                    
                    <p class="my-2">
                        <b>Needful Charity by covered people:</b>
                        <span><?=$needful_charity['name'];?> - <?=$needful_charity['people_covered'];?> persons.</span>
                    </p>

                    <p class="my-2">
                        <b>Needful Charity by recieved foods:</b>
                        <span><?=$needful_charity2['name'];?> - <?=$needful_charity2['sum'];?> foods.</span>
                    </p>

                    <p class="my-2">
                        <b>Needful Charity by contracted resturants:</b>
                        <span><?=$needful_charity3['name'];?> - <?=$needful_charity3['count'];?> resturant.</span>
                    </p>

                    <h5 class="mt-4">Average daily food number by zone:</h5>
                    <?php if($charities_by_zone):?>
                        <table class="table mt-3">
                            <tr>
                                <th>Zone</th>
                                <th>Needed Food Number</th>
                            </tr>
                            <?php foreach($charities_by_zone as $item){?>
                                <tr>
                                    <td><?=$item['zone'];?></td>
                                    <td><?=$item['avg'];?></td>
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
#test
