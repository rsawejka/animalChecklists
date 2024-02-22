<?php

$db = @mysqli_connect('localhost', 'hyxtzmmy_ryans', 'Mikayla98@', 'hyxtzmmy_HAWSCheckLists')
	//	or die('Error connecting to database');
		or die('Error connecting to database: ' . mysqli_connect_error()); // for debugging

     