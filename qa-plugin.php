<?php

/*
	Plugin Name: Invite Friends by Publicity Port
	Plugin URI: https://github.com/PublicityPort/invite-friends
	Plugin Description: This plugin enables **Question2Answer** users to invite their friends connected through social media account and through email.
	Plugin Version: 1.0.0
	Plugin Date: 2014-09-09
	Plugin Author: Publicity Port
	Plugin Author URI: https://publicityport.com
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.6.3
	Plugin Minimum PHP Version: 5
	Plugin Update Check URI: https://raw.githubusercontent.com/PublicityPort/invite-friends/master/qa-plugin.php
*/

/*
	Based on PublicityPort Login plugin
*/

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}



/*
	Omit PHP closing tag to help avoid accidental output
*/
