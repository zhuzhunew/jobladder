<?php
require_once('../setup.php');

$smarty->assign('name','Admin');
$smarty->assign('islogin', false);

$smarty->display('admin/index.html');
?>