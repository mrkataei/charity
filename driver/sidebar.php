<?php echo c_welcome ?>, <b><?=$driver['first_name'].' '.$driver['last_name']; ?></b>.
<hr>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="index.php"><?php echo c_dashboard ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="requests.php"><?php echo c_requests ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="drivers.php"><?php echo c_drivers ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="resturants.php"><?php echo c_restaurants ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT_URL?>/auth/logout.php"><?php echo c_logout ?></a>
    </li>
</ul>