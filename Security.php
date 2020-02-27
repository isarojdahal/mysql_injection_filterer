/*
 AUTHOR : Saroj Dahal / @originalsaroj
 VERSION: 2.1.0
*/

<?php




class Security
{

	
	 private $injection_counter = 0;
	
	public function filter_string($wordlist)
	{

		$injection_list  =  array("'","1=1","<script>","</script>","<a","\"","<svg","<img","document.","window.","union","select"); 

		$dejection_list  =   array('#_sq#_',"#_oeo#_","#_script#_","#_scriptcl#_","#_<a#_","#_slash#_","#_svg#_","#_img#_","#_doc#_","#_win#_","#_un#_","#_sel#_");
   
	
			$filteredstring="";
			$wordlist  = explode(' ',$wordlist);
			foreach($wordlist as $singleword)
			{
				foreach($injection_list as $index=>$minute)
				{
					if (strcasecmp($singleword, $minute) == 0) {

						$singleword = $dejection_list[$index]." ";
						// $injection_counter++;
						break;
					}
				}

				$filteredstring.=$singleword." ";
			}

			return $filteredstring; //save to db or somewhere else...
	}

	
	//pass data extracted from db to this function.
	public function reverse_data($db_data)
	{

		$injection_list  =  array("'","1=1","<script>","</script>","<a","\"","<svg","<img","document.","window.","union","select"); 

		$dejection_list  =   array('#_sq#_',"#_oeo#_","#_script#_","#_scriptcl#_","#_<a#_","#_slash#_","#_svg#_","#_img#_","#_doc#_","#_win#_","#_un#_","#_sel#_");
   

		$originalstring="";
		$db_data  = explode(' ',$db_data);
		foreach($db_data as $singleword)
		{
			foreach($dejection_list as $index=>$minute)
			{
				if (strcasecmp($singleword, $minute) == 0) {

					$singleword = $injection_list[$index];
					break;
				}
			}

			$originalstring.=$singleword." ";
		}

		return $originalstring; //send to the view or controller for usuage...
		
	}

	public function get_no_of_injections()
	{
		return $injection_counter;
	}


}

// TESTING  THE METHODS...

// $sec = new Security();
// $originalstring = "This is excellent <script> \ <svg select union";
// echo $originalstring;
// $data1 =  $sec->filter_string($originalstring);
// echo "\nFiltered String : ".$data1;
// $data2 =  $sec->reverse_data($data1);
// echo "\nReversed String : ".$data2;

