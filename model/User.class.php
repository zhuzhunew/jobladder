<?php
class User
{
	private $userId;
	private $email;
	private $loginName;
	private $firstName;
	private $middleName;
	private $lastName;
	private $password;
	private $createTime;
	private $userType;
	private $status;
	
	public function getUserId() {
		return $this->userId;
	}
	public function setUserId($userId) {
		$this->userId = $userId;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	public function getLoginName() {
		return $this->loginName;
	}
	public function setLoginName($loginName) {
		$this->loginName = $loginName;
		return $this;
	}
	public function getFirstName() {
		return $this->firstName;
	}
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
		return $this;
	}
	public function getMiddleName() {
		return $this->middleName;
	}
	public function setMiddleName($middleName) {
		$this->middleName = $middleName;
		return $this;
	}
	public function getLastName() {
		return $this->lastName;
	}
	public function setLastName($lastName) {
		$this->lastName = $lastName;
		return $this;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}
	public function getCreateTime() {
		return $this->createTime;
	}
	public function setCreateTime($createTime) {
		$this->createTime = $createTime;
		return $this;
	}
	public function getUserType() {
		return $this->userType;
	}
	public function setUserType($userType) {
		$this->userType = $userType;
		return $this;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
		return $this;
	}
}
?>