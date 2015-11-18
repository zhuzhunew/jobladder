<?php 
require_once('setup.php');

if(!empty($_GET['search']))
{
	if($_GET['category'] == "job")
	{
		CommonUtil::RedirectToURL('jobs/index.php?search='.$_GET['search']);
	}
	if($_GET['category'] == "mentor")
	{
		CommonUtil::RedirectToURL('mentors/index.php?search='.$_GET['search']);
	}
}

$smarty->assign('userLogin', $userLogin);
$smarty->display('index.html');
?>