Welcome, <b><?=$resturant['name']; ?></b>.
<hr>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="index.php">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="new_request.php">New Request</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contract_charities.php">Contract charities</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="resturants.php">Resturants</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT_URL?>/auth/logout.php">Logout</a>
    </li>
</ul>