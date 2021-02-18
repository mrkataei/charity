Welcome, <b><?=$driver['first_name'].' '.$driver['last_name']; ?></b>.
<hr>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="index.php">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="requests.php">Requests List</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="drivers.php">Drivers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="resturants.php">Resturants</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?=ROOT_URL?>/auth/logout.php">Logout</a>
    </li>
</ul>