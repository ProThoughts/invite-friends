<?php
	
class qa_invite_friends_index_page {

	function match_request($request) {
		$parts=explode('/', $request);
		return (count($parts) == 1 && $parts[0]=='invite'); 
	}
	
	function process_request($request) {
		require_once QA_INCLUDE_DIR.'qa-db-users.php';
		//require_once QA_INCLUDE_DIR.'qa-app-format.php';
		require_once QA_INCLUDE_DIR.'qa-app-users.php';
		//require_once QA_INCLUDE_DIR.'qa-db-selects.php';
		//require_once $this->directory . 'qa-pplogin-utils.php';
		
		//	Check we're not using single-sign on integration, that we're logged in
		$userid = qa_get_logged_in_userid();
		if (!isset($userid)) {
			qa_redirect('login');
		}
		$qa_content = qa_content_prepare();
		return $qa_content;

	}
	
}

/*
	Omit PHP closing tag to help avoid accidental output
*/
