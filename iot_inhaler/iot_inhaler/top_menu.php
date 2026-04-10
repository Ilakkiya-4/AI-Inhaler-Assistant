<?php
$current = basename($_SERVER['PHP_SELF']);
?>

<style>
.topnav{
    background:#1e3c72;
    padding:15px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    color:white;
    font-size:20px;
    font-weight:600;
}

.menu a{
    color:white;
    text-decoration:none;
    margin-left:25px;
    padding:6px 12px;
    border-radius:5px;
    transition:0.3s;
}

.menu a:hover{
    background:#00c6ff;
}

.active{
    background:#00c6ff;
}
</style>

<div class="topnav">
    <div class="logo">Inhaler IoT</div>

    <div class="menu">
        <a href="home.php"
           class="<?php if($current=='home.php') echo 'active'; ?>">
           Dashboard
        </a>
		 <a href="contact.php"
           class="<?php if($current=='contact.php') echo 'active'; ?>">
           Contact
        </a>

        <a href="logout.php">Logout</a>
    </div>
</div>
