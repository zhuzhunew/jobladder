<?php
class CommonUtil
{
	private function  __construct()
	{
		
	}
	
	static public function redirectToUrl($url)
	{
		header("Location: $url");
		exit;
	}
	
	/*
	check_input() function removes any potential threat from the
	data submitted. Prevents email injections or any other hacker attempts.
	if $remove_nl is true, newline chracters are removed from the input.
	*/
	static public function check_input($str,$remove_nl=true)
    {
    	if(get_magic_quotes_gpc())
    	{
    		$str = stripslashes($str);
    	}

        if($remove_nl)
        {
            $injections = array('/(\n+)/i',
                '/(\r+)/i',
                '/(\t+)/i',
                '/(%0A+)/i',
                '/(%0D+)/i',
                '/(%08+)/i',
                '/(%09+)/i'
                );
            $str = preg_replace($injections,'',$str);
        }

        return $str;
    }  
}
?>