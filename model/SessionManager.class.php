<?php
class SessionManager
{
	private $rand_key;
	
	function  __construct($rand_key)
	{
		$this->rand_key = $rand_key;
	}
	
    public function CheckLogin()
    {
         if(!isset($_SESSION)){ session_start(); }

         $sessionvar = $this->GetLoginSessionVar();
         
         if(empty($_SESSION[$sessionvar]))
         {
            return false;
         }
         return true;
    }
    
    public function GetLoginSessionVar()
    {
    	$retvar = md5($this->rand_key);
    	$retvar = 'usr_'.substr($retvar,0,10);
    	return $retvar;
    }
}
?>