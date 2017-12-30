<?php
	
class qa_invite_friends_index_page {
    var $directory;
	var $urltoroot;

	function load_module($directory, $urltoroot) {
		$this->directory=$directory;
		$this->urltoroot=$urltoroot;
	}

	function match_request($request) {
		$parts=explode('/', $request);
		return (count($parts) == 1 && $parts[0]=='invite'); 
	}
	
	function process_request($request) {
        require_once $this->directory . 'qa-invite-friends-util.php';

		//	Check we're not using single-sign on integration, that we're logged in
		$userid = qa_get_logged_in_userid();
		if (!isset($userid)) {
			qa_redirect('login');
        }
        
        $useraccount = qa_db_user_find_by_id__open($userid);

        $qa_content = qa_content_prepare();

        $qa_content['form_profile']=array(
			'title' => '',
			'tags' => 'ENCTYPE="multipart/form-data" METHOD="POST" ACTION="'.qa_self_html().'" CLASS="publicityport-login-profile"',
			'style' => 'wide',
			'fields' => array(
				'handle' => array(
					'label' => qa_lang_html('users/handle_label'),
					'value' => qa_html($useraccount['handle']),
					'type' => 'static',
				),
				
				'email' => array(
					'label' => qa_lang_html('users/email_label'),
					'value' => qa_html($useraccount['email']),
					'type' => 'static',
				),
			),
			
			'hidden' => array(
				'dosaveprofile' => '0'
			),

		);

        //file_put_contents('out.log', var_export($useraccount['handle'], true),FILE_APPEND);
        $qa_content['navigation']['sub'] = qa_user_sub_navigation($useraccount['handle'], '', true);
		return $qa_content;

    }
    

	
}

/*
	Omit PHP closing tag to help avoid accidental output
*/
