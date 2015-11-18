<?php
class UserDao
{
	private $pdo;
	
	function  __construct(PDO $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function insert(User $user)
	{
		$statement = $this->pdo->prepare(
				'INSERT INTO jt_user (email, login_name, first_name, middle_name, last_name, password, creat_time, user_type, status) ' 
                .'VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
		$statement->execute(array(
				1 => $user->getEmail(), 
				2 => $user->getLoginName(),
				3 => $user->getFirstName(),
				4 => $user->getMiddleName(),
				5 => $user->getLastName(),
				6 => $user->getPassword(),
				7 => $user->getCreateTime(),
				8 => $user->getUserType(),
				9 => $user->getStatus()
		));
	}
	
	public function update($user)
	{
		
	}
	
	public function getUserById($userId)
	{
	
	}
	
	public function getUserIdByEmail($email)
	{
		$statement = $this->pdo->prepare(
				'SELECT * FROM jt_user WHERE email = ?');
		$statement->execute(array(
				1 => $email				
		));
		return $statement->fetch();
	}
}
?>