<?php
 
// Include database, session, general info
require_once 'core/init.php';
// Xoá session
$session->destroy();
// Trở về trang chủ
header('Location: admin.php');
 
?>