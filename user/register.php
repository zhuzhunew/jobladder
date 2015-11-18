<?php
require_once('../setup.php');
require_once(ROOT_PATH.'/model/CommonUtil.class.php');
require_once(ROOT_PATH.'/model/User.class.php');
require_once(ROOT_PATH.'/model/UserActivity.class.php');
require_once(ROOT_PATH.'/model/type/UserType.class.php');
require_once(ROOT_PATH.'/model/type/UserStatusType.class.php');
require_once(ROOT_PATH.'/model/type/UserActivityType.class.php');
require_once(ROOT_PATH.'/lib/formvalidator.php');

$errorMessages = array();

if (isset($_POST['submitted']))
{
	if (registerUser())
	{
		CommonUtil::RedirectToURL(ROOT_PATH.'/user/thank-you.php');
	}
}

function registerUser()
{
	if (!validateRegistrationSubmission())
	{
		return false;
	}

	$user = createUser();

	if (persistUser($user))
	{
		return false;
	}
	
	if (addUserActivity($user))
	{
		return false;
	}

	if (sendUserConfirmationEmail($user))
	{
		return false;
	}
    
	return true;
}

function validateRegistrationSubmission()
{
	global $errorMessage;
	$validator = new FormValidator();
	$validator->addValidation("name","req","Please fill in Name");
	$validator->addValidation("email","email","The input for Email should be a valid email value");
	$validator->addValidation("email","req","Please fill in Email");
	$validator->addValidation("username","req","Please fill in UserName");
	$validator->addValidation("password","req","Please fill in Password");
	
	if (!$validator->ValidateForm())
	{
		$errorMessage = array_merge($errorMessage, $validator->GetErrors());
		return false;
	}
	return true;
}

function createUser()
{
	$user = new User();
	$user->setLoginName(CommonUtil::check_input($_POST['loginName']));
	$user->setEmail(CommonUtil::check_input($_POST['email']));
	$user->setFirstName(CommonUtil::check_input($_POST['firstName']));
	$user->setMiddleName(CommonUtil::check_input($_POST['middleName']));
	$user->setLastName(CommonUtil::check_input($_POST['lastName']));
	$user->setPassword(CommonUtil::check_input($_POST['password']));
	$user->setUserType(UserType::MEMBER);
	$user->setStatus(UserStatus::NEWADDED);
	$user->setCreateTime(time());
	return $user;
}

function persistUser(User $user)
{
	getDaoFactory()->getUserDao()->insert($user);
}

function addUserActivity(User $user)
{
	$userActivity = new UserActivity();
	$userActivity->setUserId(getDaoFactory()->getUserDao()->getUserIdByEmail($user->getEmail()));
	$userActivity->setType(UserActivityType::REGISTER);
	$userActivity->setCreateTime(time());
	getDaoFactory()->getUserActivityDao()->insert($userActivity);
}

function sendUserConfirmationEmail(User $user)
{
	
}

$smarty->assign('errorMessages', $errorMessages);
?>