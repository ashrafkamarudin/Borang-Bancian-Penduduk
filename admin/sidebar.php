<div id="nav" class="ui right visible sidebar inverted vertical menu">
    <a class="item">
    	<label class="center">
    		<i class="circular inverted teal user icon"></i>
    		&nbsp;Hi' <?php echo $admin_info['admin_name']; ?>&nbsp;
    	</label>
    </a>
    <a class="item" href="Home">
    <i class="home icon"></i>
        Home
    </a>
    <a class="item" href="senarai">
    <i class="unordered list icon"></i>
        Senarai
    </a>
    <a class="item" href="profilahli">
    <i class="user icon"></i>
        Profil Pengguna
    </a>
    <a class="item" href="tetapan">
    <i class="setting icon"></i>
        Tetapan
    </a>
    <a class="item grey" href="logout?logout=true&name=<?php echo $admin_info['admin_name']; ?>">
    <i class="sign out icon"></i>
    	Logout
    </a>
</div>