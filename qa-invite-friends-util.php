<?php

function qa_db_user_find_by_id__open($userid) {
	// Return the user with the specified userid (should return one user or null)
	$users = qa_db_read_all_assoc(qa_db_query_sub(
		'SELECT us.*, up.points FROM ^users us 
		LEFT JOIN ^userpoints up ON us.userid = up.userid 
		WHERE us.userid=$',
		$userid
	));
	if(empty($users)) {
		return null;
	} else {
		return $users[0];
	}
}
