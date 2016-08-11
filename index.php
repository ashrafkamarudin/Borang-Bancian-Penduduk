<?php

require_once('classes/form.class.php');

if (isset($_POST['submit'])) {
    # code...

    array_push($_POST['ic'], $_POST['family_leader']['ic']);

    if (has_dupes($_POST['ic']) == true) {
        # code...
        var_dump($_POST['ic']);
        echo "fail";
        $msg = "Nombor IC sudah ada.";

    } else {
        # code...
        try {

            $newForm = new form();
            $newForm->saveFamily();

        } catch (Exception $e) {

            $err = $e->getMessage();

            echo "$err";

            if (strpos($err, 'Duplicate entry') !== false) {
                echo "fail 2";
                $msg = "Nombor IC sudah ada.";

            }  
            
        }
    }

}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="vendor/semantic-ui/semantic.min.css">

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="vendor/semantic-ui/semantic.min.js" ></script>

	<title>Borang Online</title>
</head>
<body style="padding-top : 50px; background-color:#eee">
    <div class="ui two column stackable grid container">

        <div align="center" style="margin:auto">
            <div class="one column row">
                <?php if (isset($msg)) { ?>
                    <div class="ui warning message">
                        <i class="close icon"></i>
                        <div class="header">
                            Harap Maaf ! permohonan anda tergendala.
                        </div>
                        <?php echo $msg; ?>
                    </div><br>
                <?php } ?>
            </div>
            <div class="one column row">
                <h1>
                    Borang Bancian Profil Penduduk<br>
                    Rumah Murah Jalan Pusara<br>
                    Tahun 2016
                </h1>
            </div>
        </div>
        
        <div class="one column row" style=" max-width : 800px; margin : auto; background-color: #fff; padding : 3%">
            <form action="" class="one column ui form" id="signup" method="post" name="signup">
                <section id="house">
                    <div class="two fields">
                        <div class="field">
                            <label>No. Rumah</label>
                            <div class="field">
                                <input name="no_rumah" placeholder="Nombor Rumah" required="" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label>Status Rumah</label>
                            <div class="ui radio checkbox">
                                <input class="hidden" name="status_rumah" tabindex="0" type="radio" value="sendiri" required="">> 
                                <label style="cursor:pointer">
                                    Sendiri
                                </label>
                            </div>
                            <div class="ui radio checkbox">
                                <input class="hidden" name="status_rumah" tabindex="0" type="radio" value="sewa" required="">> 
                                <label style="cursor:pointer">Sewa</label>
                            </div>
                        </div>
                    </div> 
                </section>
                <h4 class="ui dividing header">Maklumat Ketua Keluarga</h4>
                <div class="family_leader">
                    <div class="field">
                        <label>Nama</label>
                        <div class="field">
                            <input name="family_leader[name]" placeholder="Nama Penuh" type="text" required="">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>IC</label>
                            <div class="field">
                                <input name="family_leader[ic]" placeholder="No Kad Pengenalan" type="text" required="">
                            </div>
                            <label style="color:red">*Sila pastikan nombor IC yang diisi betul.</label>
                        </div>
                        <div class="field">
                            <label>Umur</label>
                            <div class="field">
                                <input min="0" name="family_leader[age]" placeholder="Umur" type="number" required="">
                            </div>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>Jantina</label>
                            <div class="ui radio checkbox">
                                <input class="hidden" name="family_leader[gender]" tabindex="0" type="radio" value="lelaki" required=""> <label style="cursor:pointer">lelaki</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input class="hidden" name="family_leader[gender]" tabindex="0" type="radio" value="perempuan" required=""> <label style="cursor:pointer">Perempuan</label>
                            </div>
                        </div>
                        <div class="field">
                            <label>No. Telefon</label>
                            <div class="field">
                                <input name="family_leader[phone]" placeholder="Nombor Telefon" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>Status perkahwinan</label>
                            <div class="ui radio checkbox">
                                <input class="hidden" name="family_leader[marital_status]" tabindex="0" type="radio" value="berkahwin" required=""> <label style="cursor:pointer">Berkahwin</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input class="hidden" name="family_leader[marital_status]" tabindex="0" type="radio" value="bujang" required="">
                                <label style="cursor:pointer">Bujang</label>
                            </div>
                        </div>
                        <div class="field">
                            <label>Bil. Anak</label>
                            <div class="field">
                                <input min="0" name="family_leader[child_count]" placeholder="Bilangan anak" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Pekerjaan / Sekolah / Universiti</label>
                        <div class="field">
                            <input name="family_leader[job]" placeholder="Pekerjaan / Sekolah / Universiti" type="text" required="">
                        </div>
                    </div>
                    <div class="field">
                        <label>Tahap Pendidikan</label>
                        <div class="field">
                            <input name="family_leader[edu_stage]" placeholder="Tahap Pendidikan" type="text" required="">
                        </div>
                    </div>
                    <div class="field">
                        <label>Alamat Rumah</label>
                        <div class="fields">
                            <div class="twelve wide field">
                                <input name="family_leader[street_address]" placeholder="Alamat Jalan" type="text" required="">
                            </div>
                            <div class="four wide field">
                                <input name="family_leader[poscode]" placeholder="Poskod #" type="text" required="">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label>Daerah</label>
                                <div class="field">
                                    <input name="family_leader[region]"
                                        placeholder="Daerah" type="text" required="">
                                </div>
                            </div>
                            <div class="field">
                                <label>Negeri</label> 
                                <select class="ui fluid dropdown" name="family_leader[state]" required="">
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
                <h4 class="ui dividing header">Maklumat Ahli Keluarga</h4>
                <div class="input_fields_wrap">
                    <button class="ui blue basic button add_field_button" style="float:right">Tambah</button>
                    <div class="family_member">
                        <div class="field">
                            <label>Nama</label>
                            <div class="field">
                                <input name="name[]" placeholder="Nama Penuh" type="text" required="">
                            </div>
                        </div>
                        <div class="field">
                            <label>IC</label>
                            <div class="field">
                                <input name="ic[]" placeholder="No Kad Pengenalan" type="text" required="">
                            </div>
                            <label style="color:red">*Sila pastikan nombor IC yang diisi betul.</label>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label>Umur</label>
                                <div class="field">
                                    <input min="0" name="age[]" placeholder="Umur" type="number" required="">
                                </div>
                            </div>
                            <div class="field">
                                <label>Hubungan</label> 
                                <select class="" name="relationship[]" required="">
                                    <option value="">
                                        Hubungan dengan Ketua Keluarga
                                    </option>
                                    <option value="husband">
                                        Suami
                                    </option>
                                    <option value="wife">
                                        Isteri
                                    </option>
                                    <option value="child">
                                        Anak
                                    </option>
                                    <option value="father">
                                        Ayah
                                    </option>
                                    <option value="mother">
                                        Emak
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label>Jantina</label>
                                <div class="ui radio checkbox">
                                    <input class="hidden" name="gender[0]" tabindex="0" type="radio" value="lelaki" required=""> <label style="cursor:pointer">lelaki</label>
                                </div>
                                <div class="ui radio checkbox">
                                    <input class="hidden" name="gender[0]" tabindex="0" type="radio" value="perempuan" required=""> <label style="cursor:pointer">Perempuan</label>
                                </div>
                            </div>
                            <div class="field">
                                <label>No. Telefon</label>
                                <div class="field">
                                    <input name="phone[]" placeholder="Nombor Telefon" type="number">
                                </div>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label>Status perkahwinan</label>
                                <div class="ui radio checkbox">
                                    <input class="hidden" name="marital_status[0]" tabindex="0" type="radio" value="berkahwin" required=""> <label style="cursor:pointer">Berkahwin</label>
                                </div>
                                <div class="ui radio checkbox">
                                    <input class="hidden" name="marital_status[0]" tabindex="0" type="radio" value="bujang" required="">
                                    <label style="cursor:pointer">Bujang</label>
                                </div>
                            </div>
                            <div class="field">
                                <label>Bil. Anak</label>
                                <div class="field">
                                    <input min="0" name="child_count[]" placeholder="Bilangan anak" type="number">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>Pekerjaan / Sekolah / Universiti</label>
                            <div class="field">
                                <input name="job[]" placeholder="Pekerjaan / Sekolah / Universiti" type="text" required="">
                            </div>
                        </div>
                        <div class="field">
                            <label>Tahap Pendidikan</label>
                            <div class="field">
                                <input name="edu_stage[]" placeholder="Tahap Pendidikan" type="text" required="">
                            </div>
                        </div>
                        <div class="field">
                            <label>Alamat Rumah</label>
                            <div class="fields">
                                <div class="twelve wide field">
                                    <input name="street_address[]" placeholder="Alamat Jalan" type="text" required="">
                                </div>
                                <div class="four wide field">
                                    <input name="poscode[]" placeholder="Poskod #" type="text" required="">
                                </div>
                            </div>
                            <div class="two fields">
                                <div class="field">
                                    <label>Daerah</label>
                                    <div class="field">
                                        <input name="region[]" placeholder="Daerah" type="text" required="">
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Negeri</label> 
                                    <select class="" name="state[]" required="">
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
                </div><button name="submit" value="submit" class="ui primary button" form="signup" style=" margin: 10px 0 0 0; float:right" >Hantar</button>
            </form>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
	    var max_fields      = 10; //maximum div(ahli_keluarga) allowed
	    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	    var add_button      = $(".add_field_button"); //Add button ID
	    
	    var x = 1; //initlal div(ahli_keluarga) count
	    var j = 1; //initial array for radio button
	    add_button.click(function(e){ //on add input button click
	        e.preventDefault();
	        if(x < max_fields){ //max div(ahli_keluarga) allowed
	            x++; //div(ahli_keluarga) increment

	            var clone = $( ".family_member:first")
	            		.clone()
	            		.prepend('<hr><h4 style="float:left;margin-top:13px"> Ahli Keluarga ' 
	            				+ x 
	            				+ '</h4><a href="#" class="ui red basic button remove_field" style="float:right;margin-top:5px">Padam</a>');

	        	clone.find("input[name='gender[0]']").prop("name", "gender[" + j + "]");
    			clone.find("input[name='marital_status[0]']").prop("name", "marital_status[" + j + "]");

	            wrapper.append(clone);
	            j++; //
	            $('.ui.radio.checkbox')
			      .checkbox()
			    ;
	        }
	    });
	    
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove div(ahli _keluarga)
	        e.preventDefault(); $(this).parent('div').remove(); x--;j--; //div(ahli_keluarga) remove; minus count; minus array
	    })

	    $('.ui.radio.checkbox')
	      .checkbox()
	    ;
	});
</script>

</body>
</html>

<?php 

function has_dupes($array){
    $tmp = $array;
    $tmp = array_unique($tmp);
    return count($tmp) != count($array);
}