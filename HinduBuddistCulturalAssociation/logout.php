<?php
	//Start the Session
	session_start();
	//if the session is unset destroy the session 
	//redirect to index page
	if(session_destroy()) // Destroying All Sessions
	{
		header("Location: index.php"); // Redirecting To Home Page
	}
?>