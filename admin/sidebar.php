<?php echo c_welcome ?>, <b><?php $admin['username']?></b>.
<hr>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="index.php"> <?php echo c_dashboard ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charities.php"> <?php echo c_charities ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="drivers.php"> <?php echo c_drivers ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT_URL?>/auth/logout.php"> <?php echo c_logout ?></a>
    </li>
</ul>