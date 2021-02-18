<?php
require_once('../load.php');
get_header();
$conn = db_conn();

is_driver();
$driver = get_driver();

$sql = 'SELECT 
            resturant.name as resturant_name,
            charity.name as charity_name,
            timestamp
        FROM send_request
        INNER JOIN resturant ON send_request.resturant=resturant.username
        INNER JOIN charity ON send_request.charity=charity.username
        WHERE driver="'.$driver['national_id'].'"
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
                        Requests
                    </h1>
                    <hr/>
                    <?php if($requests): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Date</th>
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
                                    <td><?=date('Y/n/d g:i:s a', $item['timestamp'])?></td>
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