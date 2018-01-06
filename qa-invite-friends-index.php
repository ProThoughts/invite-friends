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
			'title' => 'Invite your friends',
			'tags' => 'ENCTYPE="multipart/form-data" method="POST" ACTION="'.qa_self_html().'" CLASS="pp-invite-friends"',
			'style' => 'wide',
			'fields' => array(
				'emails' => array(
					'label' => 'Friend\'s Emails:',
					'tags' => 'name="emails"',
					'type' => 'text',
					'note' => 'Enter comma seperated emails. E.g.: name1@examplex.com,name2@exampley.com',
				),

			),
			'buttons' => array(
				'invite' => array(
					'tags' => 'name="invite"',
					'label' => 'Invite my Friends',
				),
			),

			'hidden' => array(
				'invitefriends' => '1',
			),

		);
		if (qa_clicked('invitefriends')){
			
			unset($qa_content['form_profile']);
			$qa_content['form_profile']=array(
				'title' => 'Invite your friends',
				'fields' => array(
					'thankyou' => array(
						'label' => 'All your friends are invited.',
						'type' => 'static',
						'note' => 'Thank you. Emails: ' . qa_post_text('emails'),
					),
	
				),
	
			);
		}

        $qa_content['navigation']['sub'] = qa_user_sub_navigation($useraccount['handle'], '', true);
		return $qa_content;

    }
    

	
}

/*
	Omit PHP closing tag to help avoid accidental output
*/
