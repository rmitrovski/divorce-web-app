<?php
require_once('server.php');
if(isset($chkmsg)){
	echo json_encode(['code' =>1,'msg'=>$chkmsg]);
}else{
	echo json_encode(['code' =>0]);
}


?>