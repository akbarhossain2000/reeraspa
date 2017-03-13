<?php
$action		= isset($_POST['action'])? $_POST['action']:"";

$data = pass_post_id_init();
if($action == 'getSet'){
	echo json_encode($data);
}elseif($action == 'getLoad'){
	echo json_encode($data);
}
function pass_post_id_init() {
	$id = $_POST['spid'];
	$title = $_POST['sptitle'];
	$subtitle = $_POST['subt'];
	$scontent = $_POST['svcon'];
	$s_img = $_POST['simgurl'];
	$args = array(
		'psid'=>$id,
		'title'=>$title,
		'subtitle'=>$subtitle,
		'spcontent'=>$scontent,
		'spimg'=>$s_img,
	);
	
	return $args;
}
