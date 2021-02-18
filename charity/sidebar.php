<?php echo c_welcome ?>, <b><?=$charity['name']?></b>.
<hr>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="index.php"><?php echo c_dashboard ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT_URL?>/auth/logout.php"><?php echo c_logout ?></a>
    </li>
</ul>