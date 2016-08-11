<?php

$pagetitle = 'admin/senarai';
require_once 'header.php';

?>

<body>

<?php require_once 'sidebar.php' ?>

<div class="">
	<div class="ui grid container">
		<div class="ui main grid">
			<h4 class="ui dividing header row">
				welcome : <?php print($admin_info['admin_name']); ?>
			</h4>
			<div class="ui huge breadcrumb row dividing header row">
				<a class="section">
					<i class="home icon"></i>
					Home
				</a>
				<i class="right chevron icon divider"></i>
				<a class="section">
					<i class="user icon"></i>
					Senarai Semua Ahli Keluarga
				</a>
			</div>
			<section style="margin-top:5%;">
      			<div>
					<div class="ui accordion field">
					    <div class="title">
					    	<i class="icon dropdown"></i>
					        	Tapis mengikut umur
					    </div>
					    <div class="content field">
					        <table class="ui form" border="0" cellspacing="5" cellpadding="5">
				        		<tbody>
				        			<tr>
				            			<td>Umur minimum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>
				            			<td><input type="text" class="" id="min" name="min"></td>
				            		</tr>
				            		<tr>
				            			<td>Umur maksimum&nbsp; : </td>
				            			<td><input type="text" class="" id="max" name="max"></td>
				        			</tr>
				    			</tbody>
				    		</table>
					      </div>
					    </div>
      				<br>
        			<table id="table" class="ui very basic large padded collapsing single line selectable table display" style="width:100%">
						<thead>
					    	<tr>
					    		<th> # </th>
					    		<th>Kad Pengenalan</th>
					    		<th>Nama</th>
					    		<th>Umur</th>
					    		<th>Status</th>
					    		<th>Jantina</th>
					    		<th>No Telefon</th>
					    	</tr>
						</thead>
						<tbody>
							<?php $get_alluser = $admin->getAlluser(); ?>
							<?php foreach ($get_alluser as $i => $row) { 
								# code... ?>
								<tr class="table row">
									<td><?php echo $i + 1; ?></td>
									<td><?php echo $row['ic']; ?></td>
									<td><a href="profilahli?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
									<td><?php echo $row['age']; ?></td>
									<td><?php echo $row['marital_status']; ?></td>
									<td><?php if($row['gender'] == 'lelaki'){ echo "<i class='blue male icon'></i>"; } else { echo "<i class='pink female icon'></i>";} ?></td>
									<td><?php echo $row['phone']; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
			    </div>
			</section>
		</div>
	</div>
</div>
</body>
</html>

<script type="text/javascript" src="js/admin.js"></script>