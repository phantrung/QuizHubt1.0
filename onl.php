<?php 
	$sid=session_id(); // lấy session id
	$time=time();
	$time_check=$time-3600; //SET THỜI GIAN 1 ngày
	$tbl_name = "user_online";
	// kết nối CSD
	$result = "SELECT * FROM user_online WHERE session='$sid'";
	 
	$count=$db->num_rows($result);
	if($count=="0"){
	 
	$sql1="INSERT INTO $tbl_name(session, time)VALUES('$sid', '$time')";
	$result1=$db->query($sql1);
	}
	 
	else {
	$sql2="UPDATE $tbl_name SET time='$time' WHERE session = '$sid'";
	$result2=$db->query($sql2);
	}
	 
	$sql3="SELECT * FROM $tbl_name";
	$result3=$db->query($sql3);
	$count_user_online=$db->num_rows($sql3);
	// nếu trên 10 phút, xóa phiên
	$sql4="DELETE FROM $tbl_name WHERE time<$time_check";
	$result4=$db->query($sql4);
	 
	// đóng kết nối
	$db->close();
 ?>
 
