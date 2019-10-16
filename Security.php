<?php

class Security
{

	public function filterString($in_string)
	{

         $replace_this  =  array("'","1=1","<script>","</script>","<a","\"" ); 

	 $by_this =  array('"',"","","","","");

	 return str_ireplace($replace_this,$by_this,$in_string);
		
	}

}
