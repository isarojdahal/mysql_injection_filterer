/*
 AUTHOR : Saroj Dahal / @originalsaroj
 VERSION: 1.0.0
*/

<?php

class Security
{

	// Call this method before inserting to database.
	public function filter_string($input)
	{
		return htmlspecialchars(mysqli_real_escape_string(trim($input)));
	}

}