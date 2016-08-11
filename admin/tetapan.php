<?php

$pagetitle = 'admin/profile-pengguna';
require_once 'header.php';

?>

<body>

<?php require_once 'sidebar.php' ?>

<div class="">
    <div class="ui grid container">
        <div class="ui main grid">
            <h4 class="ui dividing header row">
                welcome : <?php echo $admin_info['admin_name']; ?>
            </h4>
            <div class="ui huge breadcrumb row dividing header row">
                <a class="section">
                    <i class="home icon"></i>
                    Home
                </a>
                <i class="right chevron icon divider"></i>
                <a class="section">
                    <i class="setting icon"></i>
                    Tetapan
                </a>
            </div>

            <?php if (isset($_SESSION['msg'])) { ?>

                <div class="ui compact success message row" style="display: inline-block;margin: 5% auto -2% auto;text-align: center;>
                  <i class="close icon"></i>
                  <div class="header">
                    <?php echo $_SESSION['msg']; ?>
                  </div>
                  <p>Anda boleh log masuk dengan tetapan log-masuk yang baru.</p>
                </div>

            <?php unset($_SESSION['msg']); } ?>

            <div class="ui very padded piled segment" style="display: inline-block;margin: 5% auto;">
                <h4 class="ui icon header">
                    <i class="grey settings icon"></i>
                    <div class="content">
                        <div >
                            <h4 class="ui dividing header row">
                                    Ubah tetapan log-masuk pengguna di sini.
                            </h4>
                            <form class="ui form" method="post">
                                <div class="field">
                                    <div class="field">
                                        <input name="aname" placeholder="Nama Pengguna Baru" type="text" required="">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="field">
                                        <input name="apass" placeholder="Kata laluan Baru" type="password" required="">
                                    </div>
                                </div>
                                <input type="submit" name="submit" class="ui blue button" value="hantar">
                            </form>
                        </div>
                    </div>
                </h4>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="js/admin.js"></script>

<?php

if (isset($_POST['submit'])) {
    $aname = strip_tags($_POST['aname']);
    $apass = strip_tags($_POST['apass']);

    $admin->changeSetting($aname, $apass);

}

?>