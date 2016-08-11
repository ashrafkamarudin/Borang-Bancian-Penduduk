<?php

require_once('user.class.php');

/**
* form submitted here
* call user class to save data
*/
class form{
	public $family_leader;
	public $family_member;

	public function saveFamily() {
    $family_leader = new User();
    $family_leader->name = $_POST['family_leader']['name'];
    $family_leader->ic = $_POST['family_leader']['ic'];
    $family_leader->age = $_POST['family_leader']['age'];
    $family_leader->gender = $_POST['family_leader']['gender'];
    $family_leader->phone = $_POST['family_leader']['phone'];
    $family_leader->marital_status = $_POST['family_leader']['marital_status'];
    $family_leader->child_count = $_POST['family_leader']['child_count'];
    $family_leader->job = $_POST['family_leader']['job'];
    $family_leader->edu_stage = $_POST['family_leader']['edu_stage'];
    $family_leader->street_address = $_POST['family_leader']['street_address'];
    $family_leader->poscode = $_POST['family_leader']['poscode'];
    $family_leader->region = $_POST['family_leader']['region'];
    $family_leader->state = $_POST['family_leader']['state'];
    $family_leader->rank = 1;
    $family_leader->save();

    foreach ($_POST['name'] as $i => $name) {
        $family_member = new User();
        $family_member->name = $name;
        $family_member->ic = $_POST['ic'][$i];
        $family_member->age = $_POST['age'][$i];
        $family_member->gender = $_POST['gender'][$i];
        $family_member->phone = $_POST['phone'][$i];
        $family_member->marital_status = $_POST['marital_status'][$i];
        $family_member->child_count = $_POST['child_count'][$i];
        $family_member->job = $_POST['job'][$i];
        $family_member->edu_stage = $_POST['edu_stage'][$i];
        $family_member->street_address = $_POST['street_address'][$i];
        $family_member->poscode = $_POST['poscode'][$i];
        $family_member->region = $_POST['region'][$i];
        $family_member->state = $_POST['state'][$i];
        $family_member->rank = 0;
        $family_member->save();

        try {
            $family_leader->addRelative($_POST['relationship'][$i], $family_member);
        } catch (Exception $e) {
            die ('an error occured');
        }
    }

    header("location:thankyou", true, 303);

	}
}