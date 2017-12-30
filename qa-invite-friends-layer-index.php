<?php


class qa_html_theme_layer extends qa_html_theme_base
{
	function doctype() {
		parent::doctype();

		// check if logged in
		$handle = qa_get_logged_in_handle();
		if (isset($handle)) {
		
			if(qa_request() == '' && count($_GET) > 0) {
				// Check if we need to associate another provider
				$this->process_login();
			}
			
			// see if the account pages are accessed
			$tmpl = array( 'account', 'favorites' );
			$user_pages = array('user', 'user-wall', 'user-activity', 
				'user-questions', 'user-answers' );
			$invite_index_page = qa_request() == 'invite' && !qa_get('confirm');
			$urlhandle = qa_request_part(1);
			
			if ( in_array($this->template, $tmpl) || $invite_index_page || 
				(in_array($this->template, $user_pages) && $handle == $urlhandle) ) {
				// add a navigation item
				$this->content['navigation']['sub']['invite'] = array(
					'label' => "Invite Friends",
					'url' => qa_path_html('invite'),
					'selected' => $invite_index_page
				);
				return;
			}	
		} 
	}
	
}
