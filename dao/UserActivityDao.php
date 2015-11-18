<?php
class UserActivityDao
{
	private $pdo;
	
	function  __construct(PDO $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function insert(UserActivity $userActivity)
	{
		$statement = $this->pdo->prepare(
				'INSERT INTO jt_user_activity (user_id, activity_type, create_time, creator, description) '
				.'VALUES(?, ?, ?, ?, ?)');
		$statement->bindValue(1, $userActivity->getUserId());
		$statement->bindValue(2, $userActivity->getType());
		$statement->bindValue(3, $userActivity->getCreateTime());
		$statement->bindValue(4, $userActivity->getCreator());
		$statement->bindValue(5, $userActivity->getDescription());
		$statement->execute();
	}
}
?>