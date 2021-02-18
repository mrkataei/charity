<?php echo c_welcome ?>, <b><?=$resturant['name']; ?></b>.
<hr>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="index.php"><?php echo c_dashboard ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="new_request.php"><?php echo c_NewRequest ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contract_charities.php"><?php echo c_ContractCharities ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="resturants.php"><?php echo c_restaurants  ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT_URL?>/auth/logout.php"><?php echo c_logout ?></a>
    </li>
</ul>