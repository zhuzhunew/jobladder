<?php
require_once('global.php');
require_once(ROOT_PATH.'/lib/smarty-3.1.27/libs/Smarty.class.php');
require_once(ROOT_PATH.'/model/CommonUtil.class.php');
require_once(ROOT_PATH.'/model/SessionManager.class.php');

$smarty = new Smarty();
$sessionManager = new SessionManager(RANDOM_SESSION_KEY);

$smarty->setTemplateDir(ROOT_PATH.'/template/');
$smarty->setCompileDir(ROOT_PATH.'/template_c/');
$smarty->setConfigDir(ROOT_PATH.'/config/');
$smarty->setCacheDir(ROOT_PATH.'/cache/');

$smarty->caching = 0;

$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";

$smarty->assign('root', ROOT_URL);
$userLogin = $sessionManager->CheckLogin();

function getDaoFactory()
{
	return DaoFactory::getInstance(DB_HOST, DB_USER_NAME, DB_PASSWORD);
}
?>