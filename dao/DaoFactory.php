<?php
// This is a singleton factory.
class DaoFactory
{
	static private $instance = null;
	
	private $pdo = null;
	private $userDao = null;
	private $userActivityDao = null;
	
	private function  __construct($host, $userName, $password)
	{
		try
		{
			$this->pdo = new PDO($host, $userName, $password);
		}
		catch (PDOException $e)
		{
			//TODO
		}
	}
	
	static public function getInstance($host, $userName, $password)
	{
		if (is_null(self::$instance))
		{
			self::$instance = new DaoFactory($host, $userName, $password);
		}
		return self::$instance;
	}
	
	public function getUserDao()
	{
		if ($this->userDao == null)
		{
			$this->userDao = new UserDao($this->pdo);
		}
		return $this->userDao;
	}
	
	public function getUserActivityDao()
	{
		if ($this->userActivityDao == null)
		{
			$this->userActivityDao = new UserActivityDao($this->pdo);
		}
		return $this->userActivityDao;
	}
}
?>