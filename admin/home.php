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
			</div>
			<section class="column sixteen wide" style="margin-top:5%;">
				<div class="ui grid">
					<div class="three column row">
						<div class="left floated column">
							<table class="ui very basic collapsing celled padded table eight wide">
							  	<thead>
							    	<tr>
							    		<th>Employee</th>
							    		<th>Last Logout</th>
							    	</tr>
								</thead>
								<tbody>
							    	<tr>
							    		<td>
							        		<h4 class="ui image header">
							          		<img src="images/male.PNG" class="ui mini rounded image">
							        		<div class="content">
							            		<?php echo $admin_info['admin_name']; ?>
							            		<div class="sub header">Web Admin</div>
							        		</div>
							    			</h4>
							    		</td>
							    		<td>
							    			<?php
							            		$date=date_create($admin_info['last_logout']);
							            		echo date_format($date, "d/m/Y"); 
							            	?>
							    			<div class="sub header">
							    				<?php
							    					echo date_format($date, "H:i:s");
							    				?>
							    			</div>
							    		</td>
							    	</tr>
							    </tbody>
						    </table>
						</div>
		    			<div class="right floated column">
		    				<div class="ui divided selection list">
								<a href="home" class="item">
						    		<div class="ui orange horizontal label">Home</div>
						    			Papar semua admin
						  		</a>
						  		<a href="senarai" class="item">
						    		<div class="ui yellow horizontal label">Senarai</div>
						    			Papar semua pengguna
						  		</a>
						  		<a href="profilahli" class="item">
						    		<div class="ui olive horizontal label">Profil Pengguna</div>
						    			Lihat/edit data pengguna
						  		</a>
						  		<a href="profilahli" class="item">
						    		<div class="ui grey horizontal label">Log Keluar</div>
						    			Log keluar dari aplikasi
						  		</a>
							</div>
		    			</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
</body>
</html>

<script type="text/javascript" src="js/admin.js"></script>