<?php
require_once('../setup.php');

$smarty->assign('userLogin', $userLogin);
$smarty->display('info/about_us.html');
?>