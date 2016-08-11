<?php

$pagetitle = 'admin/profile-pengguna';
require_once 'header.php';

?>

<body>

<?php 

require_once 'sidebar.php';


if (isset($_POST['update'])) {
	# code...
	$admin->updateUser();
}

if (isset($_GET['id']) OR isset($_SESSION['user_id'])): 

	if (isset($_GET['id'])) {
		# code...
		$_SESSION['user_id'] = $_GET['id'];
	}
	$id = $_SESSION['user_id'];

	$get_profile = $admin->getProfile($id);

?>

<div class="">
	<div class="ui grid container">
		<div class="ui main grid">
			<div class="ui tabular menu" style="width:100%">
				<div class="right menu">
					<div class="active item" data-tab="bio">Bio - Pengguna</div>
			  		<div class="item" data-tab="edit">Edit</div>
				</div>
			</div>

			<?php if (isset($_SESSION['msg'])) { 
				$errormsg = $_SESSION['msg']; 
				unset($_SESSION['msg']); ?>
				
				<section class="ui negative message" style="margin:2% auto 5% auto">
					<i class="close icon"></i>
					<div class="header">
				    	<?php echo $errormsg; ?>
					</div>
					<p>Nama Pengguna/Kata laluan anda salah !</p>

				</section>
			<?php } ?>

			<div class="active ui tab" data-tab="bio" style="width:100%">
				<div class="ui grid">
					<section class="two column row">
						<div class="two wide column"></div>
						<div class="four wide column">
							<h3 class="ui dividing header">
								Rumah
							</h3>
							<?php if (isset($get_profile['house_no'])) { ?>
								<form class="ui form">
									<div class="two fields">
										<div class="field">
											<label> No Rumah : </label>
										</div>
										<div class="field">
											<label class="info"> <?php echo $get_profile['house_no']; ?> </label>
										</div>
									</div>
									<div class="two fields">
										<div class="field">
											<label> Status Rumah : </label>
										</div>
										<div class="field">
											<label class="info"> <?php echo $get_profile['house_status']; ?> </label>
										</div>
									</div>
								</form>
							<?php } else { ?>
								<div class="ui info message">
									<i class="close icon"></i>
									<div class="header">
								    	Tiada nombor atau status rumah?
									</div>
									<ul style="margin-left: 10%">
								    	<li>Sila buka profil ketua keluarga untuk melihat nombor/status rumah</li>
								    	<li>Ketua Keluarga berada di baris pertama di senarai ahli keluarga</li>
									</ul>
								</div>

							<?php } ?>

							<div class="ui pointing vertical menu" style="margin-top: 10%">
								<a class="item">
							    	Tindakan
								</a>
								<div class="item">
							    	<a class="action item">
							    		<i class="trash icon"></i>
							    		Padam Data
							    	</a>
								</div>
							</div>

						</div>
						<div class="ten wide column">
							<h3 class="ui dividing header">
								Umum
							</h3>
							<form class="ui form">
								<div class="two fields">
									<div class="six wide field">
										<label> Nama Penuh : </label>
									</div>
									<div class="ten wide field">
										<label class="info"> <?php echo $get_profile['name']; ?> </label>
									</div>
								</div>
								<div class="two fields">
									<div class="six wide field">
										<label> Umur : </label>
									</div>
									<div class="ten wide field">
										<label class="info"> <?php echo $get_profile['age']; ?> </label>
									</div>
								</div>
								<div class="two fields">
									<div class="six wide field">
										<label> No Kad Pengenalan : </label>
									</div>
									<div class="ten wide field">
										<label class="info"> <?php echo $get_profile['ic']; ?> </label>
									</div>
								</div>
								<div class="two fields">
									<div class="six wide field">
										<label> Jantina : </label>
									</div>
									<div class="ten wide field">
										<label class="info"> <?php echo $get_profile['gender']; ?> </label>
									</div>
								</div>
								<div class="two fields">
									<div class="six wide field">
										<label> No Telefon : </label>
									</div>
									<div class="ten wide field">
										<label class="info"> <?php echo $get_profile['phone']; ?> </label>
									</div>
								</div>
								<div class="two fields">
									<div class="six wide field">
										<label> Status Kahwin : </label>
									</div>
									<div class="ten wide field">
										<label class="info"> <?php echo $get_profile['marital_status']; ?> </label>
									</div>
								</div>
								<div class="two fields">
									<div class="six wide field">
										<label> Bilangan Anak : </label>
									</div>
									<div class="ten wide field">
										<label class="info"> <?php echo $get_profile['child_count']; ?> </label>
									</div>
								</div>
								<div class="two fields">
									<div class="six wide field">
										<label> Kerja : </label>
									</div>
									<div class="ten wide field">
										<label class="info"> <?php echo $get_profile['job']; ?> </label>
									</div>
								</div>
								<div class="two fields">
									<div class="six wide field">
										<label> Tahap Pendidikan : </label>
									</div>
									<div class="ten wide field">
										<label class="info"> <?php echo $get_profile['edu_stage']; ?> </label>
									</div>
								</div>
								<div class="two fields">
									<div class="six wide field">
										<label> Alamat Rumah : </label>
									</div>
									<div class="ten wide field">
										<label class="info"> <?php echo $get_profile['street_address']; ?> </label>
										<label class="info"> <?php echo $get_profile['poscode'] . ' ' . $get_profile['region']; ?> </label>
										<label class="info"> <?php echo $get_profile['state']; ?> </label>
									</div>
								</div>
							</form>
						</div>
					</section>
					<section class="two column row">
						<div class="two wide column"></div>
						<div class="twelve wide column">
							<h3 class="ui dividing header">
								Ahli Keluarga
							</h3>
							<table class="ui very basic large padded collapsing single line selectable table display" style="width:100%">
								<thead>
							    	<tr>
							    		<th> # </th>
							    		<th>Kad Pengenalan</th>
							    		<th>Nama</th>
							    		<th>Umur</th>
							    		<th>Status</th>
							    		<th>Jantina</th>
							    		<th>Hubungan</th>
							    	</tr>
								</thead>
								<tbody>
									<?php $get_family = $admin->getFamily($id); ?>
									<?php foreach ($get_family as $i => $row) {
											# code...?>
											<tr class="table row">
												<td><?php echo $i + 1; ?></td>
												<td><?php echo $row['ic']; ?></td>
												<td><a href="profilahli?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
												<td><?php echo $row['age']; ?></td>
												<td><?php echo $row['marital_status']; ?></td>
												<td><?php if($row['gender'] == 'lelaki'){ echo "<i class='blue male icon'></i>"; } else { echo "<i class='pink female icon'></i>";} ?></td>
												<td><?php echo $row['relation']; ?></td>
											</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<div class="ui tab" data-tab="edit" style="width:100%">
				<div class="ui teal attached message">
					<div class="header">
				    	Kemaskini Maklumat Pengguna
					</div>
					<p>Isi Borang di bawah untuk mengemaskini data pengguna</p>
				</div>
				<form action="" class="ui form attached fluid segment" id="edit" method="post" name="signup" style="margin-bottom:5%;">
	                <div class="edit_user">
	                    <div class="field">
	                        <label>Nama</label>
	                        <div class="field">
	                            <input name="name" placeholder="Nama Penuh" value="<?php echo $get_profile['name']; ?>" type="text" required="">
	                        </div>
	                    </div>
	                    <div class="two fields">
	                        <div class="field">
	                            <label>IC</label>
	                            <div class="field">
	                                <input name="ic" placeholder="No Kad Pengenalan" value="<?php echo $get_profile['ic']; ?>" type="text" required="">
	                            </div>
	                        </div>
	                        <div class="field">
	                            <label>Umur</label>
	                            <div class="field">
	                                <input min="0" name="age" placeholder="Umur" value="<?php echo $get_profile['age']; ?>" type="number" required="">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="two fields">
	                        <div class="field">
	                            <label>Jantina</label>
	                            <div class="ui radio checkbox">
	                                <input class="hidden" name="gender" tabindex="0" type="radio" value="lelaki" <?php if ($get_profile['gender'] == 'lelaki') { echo 'checked="checked"'; } ?> required=""> <label style="cursor:pointer">lelaki</label>
	                            </div>
	                            <div class="ui radio checkbox">
	                                <input class="hidden" name="gender" tabindex="0" type="radio" value="perempuan" <?php if ($get_profile['gender'] == 'perempuan') { echo 'checked="checked"'; } ?> required=""> <label style="cursor:pointer">Perempuan</label>
	                            </div>
	                        </div>
	                        <div class="field">
	                            <label>No. Telefon</label>
	                            <div class="field">
	                                <input name="phone" placeholder="Nombor Telefon" value="<?php echo $get_profile['phone']; ?>" type="text">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="two fields">
	                        <div class="field">
	                            <label>Status perkahwinan</label>
	                            <div class="ui radio checkbox">
	                                <input class="hidden" name="marital_status" tabindex="0" type="radio" value="berkahwin" <?php if ($get_profile['marital_status'] == 'berkahwin') { echo 'checked="checked"'; } ?> required=""> <label style="cursor:pointer">Berkahwin</label>
	                            </div>
	                            <div class="ui radio checkbox">
	                                <input class="hidden" name="marital_status" tabindex="0" type="radio" value="bujang" <?php if ($get_profile['marital_status'] == 'bujang') { echo 'checked="checked"'; } ?> required="">
	                                <label style="cursor:pointer">Bujang</label>
	                            </div>
	                        </div>
	                        <div class="field">
	                            <label>Bil. Anak</label>
	                            <div class="field">
	                                <input min="0" name="child_count" placeholder="Bilangan anak" value="<?php echo $get_profile['child_count']; ?>" type="number">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="field">
	                        <label>Pekerjaan / Sekolah / Universiti</label>
	                        <div class="field">
	                            <input name="job" placeholder="Pekerjaan / Sekolah / Universiti" value="<?php echo $get_profile['job']; ?>" type="text" required="">
	                        </div>
	                    </div>
	                    <div class="field">
	                        <label>Tahap Pendidikan</label>
	                        <div class="field">
	                            <input name="edu_stage" placeholder="Tahap Pendidikan" value="<?php echo $get_profile['edu_stage']; ?>" type="text" required="">
	                        </div>
	                    </div>
	                    <div class="field">
	                        <label>Alamat Rumah</label>
	                        <div class="fields">
	                            <div class="twelve wide field">
	                                <input name="street_address" placeholder="Alamat Jalan" value="<?php echo $get_profile['street_address']; ?>" type="text" required="">
	                            </div>
	                            <div class="four wide field">
	                                <input name="poscode" placeholder="Poskod #" value="<?php echo $get_profile['poscode']; ?>" type="text" required="">
	                            </div>
	                        </div>
	                        <div class="two fields">
	                            <div class="field">
	                                <label>Daerah</label>
	                                <div class="field">
	                                    <input name="region"
	                                        placeholder="Daerah" value="<?php echo $get_profile['region']; ?>" type="text" required="">
	                                </div>
	                            </div>
	                            <div class="field">
	                                <label>Negeri</label> 
	                                <select class="ui fluid dropdown" name="state" value="<?php echo $get_profile['state']; ?>" required="">
	                                    <option value="">
	                                        Negeri
	                                    </option>
	                                    <option value="Terengganu">
	                                        Terengganu
	                                    </option>
	                                </select>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <button type="submit" name="update" class="ui teal submit button">Kemaskini</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- modal -->
<div class="ui basic modal" style="margin-top: -108.5px; display: block !important;width: 600px;">
    <div class="ui icon header">
    	<i class="erase icon"></i>
    		Padam Maklumat
    </div>
    <div class="content">
    	<p>Maklumat yang telah dipadam tidak boleh dikembalikan. Anda pasti untuk padam ?</p>
    </div>
    <div class="actions">
    	<div class="ui red basic cancel inverted button">
        	<i class="remove icon"></i>
        	Batal
    	</div>
    	<a class="ui green ok inverted button" href="delete?id=<?php echo $_SESSION['user_id']; ?>">
        	<i class="checkmark icon"></i>
        	Teruskan
    	</a>
    </div>
</div>

<?php else : ?>

	<div style="
	    display: inline-block;
	    position: fixed;
	    top: -15%;
	    bottom: 0;
	    left: -20%;
	    right: 0;
	    width: 200px;
	    height: 100px;
	    margin: auto;">
	    <h2 class="ui icon header">
			<i class="bug icon"></i>
			<div class="content">
				Harap Maaf
		    	<div class="sub header">Sila pilih pengguna di page <a href="senarai" class="ui yellow horizontal label">Senarai</a> untuk melihat data pengguna</div>
			</div>
		</h2>
	</div>

<?php endif ?>
</body>
</html>

<script type="text/javascript" src="js/admin.js"></script>
<script type="text/javascript">
	$('.ui.radio.checkbox')
	  .checkbox()
    ;
    $('.ui.basic.modal')
	  .modal('hide')
	;
	$('.action.item').click(function(){	
	    $('.ui.basic.modal')
		  .modal('show')
		;
	});
</script>

<?php



?>