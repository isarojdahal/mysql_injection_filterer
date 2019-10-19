<?php

class Security
{

	$original_string;

	public function filter_string($in_string)
	{
	
	 $original_string = $in_string;

	 $in_string 	= strtolower($in_string);

         $replace_this  =  array("'","1=1","<script>","</script>","<a","\"",
				 "<svg","<img","document.","window."); 

	 $by_this 	=  array('"',"","","","","",
			   "","","","",);

	 return str_ireplace($replace_this,$by_this,$in_string);
		
	}

	public function get_original_string()
	{
	
		return $original_string;
		
	}

}
