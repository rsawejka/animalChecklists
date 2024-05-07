<?php

$db = @mysqli_connect('localhost', 'ewrfdumy_wp553', 'Mikayla98@', 'ewrfdumy_HAWSCheckLists')
	//	or die('Error connecting to database');
		or die('Error connecting to database: ' . mysqli_connect_error()); // for debugging

     