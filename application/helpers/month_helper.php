<?php

function getMonth($mnth)
{
	if($mnth == '1')
	{
		$mnth = 'Jan';
	}
	else if($mnth == '2')
	{
		$mnth = 'Feb';
	}
	else if($mnth == '3')
	{
		$mnth = 'Mar';
	}
	else if($mnth == '4')
	{
		$mnth = 'Apr';
	}
	else if($mnth == '5')
	{
		$mnth = 'May';
	}
	else if($mnth == '6')
	{
		$mnth = 'Jun';
	}
	else if($mnth == '7')
	{
		$mnth = 'Jul';
	}
	else if($mnth == '8')
	{
		$mnth = 'Aug';
	}
	else if($mnth == '9')
	{
		$mnth = 'Sep';
	}
	else if($mnth == '10')
	{
		$mnth = 'Oct';
	}
	else if($mnth == '11')
	{
		$mnth = 'Nov';
	}
	else if($mnth == '12')
	{
		$mnth = 'Dec';
	}


	return $mnth;
}

?>