<div id="nav" class="ui right visible sidebar inverted vertical menu">
    <a class="item">
    	<label class="center">
    		<i class="circular inverted teal user icon"></i>
    		&nbsp;Hi' <?php echo $admin_info['admin_name']; ?>&nbsp;
    	</label>
    </a>
    <a class="item" href="Home.php">
    <i class="home icon"></i>
        Home
    </a>
    <a class="item" href="senarai.php">
    <i class="unordered list icon"></i>
        Senarai
    </a>
    <a class="item" href="profilahli.php">
    <i class="user icon"></i>
        Profil Pengguna
    </a>
    <a class="item" href="tetapan.php">
    <i class="setting icon"></i>
        Tetapan
    </a>
    <a class="item grey" href="logout.php?logout=true&name=<?php echo $admin_info['admin_name']; ?>">
    <i class="sign out icon"></i>
    	Logout
    </a>
</div>