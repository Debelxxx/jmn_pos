<?php
	//Start session
	session_start();
	  if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Start the session
    }
	//Check whether the session variable SESS_MEMBER_ID is present or not
	//
?>