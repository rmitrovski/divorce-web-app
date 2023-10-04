<?php
# Requires the server.php file
require_once('server.php');
# Checks form data
if(isset($chkmsg)){
	echo json_encode(['code' =>1,'msg'=>$chkmsg]);
}else{
	echo json_encode(['code' =>0]);
}
?>