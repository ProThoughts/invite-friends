<?php
/*
Setting up the admin page options.
*/
class qa_invite_friends_admin
{
  function option_default($option) {

    switch($option) {
      case 'inf_subject':
        return '|*Name*| invites you to ' . qa_opt('site_title');
      case 'inf_message_body':
        return 'Hi,<br />|*Name*| invites you to';
      default:
        return null;
    }
    
  }

  function admin_form(&$qa_content)
  {
    $saved=false;
    $reset=false;

    if (qa_clicked('inf_save_button')) {
      qa_opt('inf_subject', qa_post_text('inf_subject_field'));
      qa_opt('inf_message_body', qa_post_text('inf_message_body_field'));
      $saved=true;
    }else if (qa_clicked('inf_reset_button')) {
      qa_opt('inf_subject', $this -> option_default('inf_subject'));
      qa_opt('inf_message_body', $this -> option_default('inf_message_body'));
      $reset = true;
    }

    return array(
      'ok' => $saved ? 'Invite Friends plugin settings saved.' : null,

      'fields' => array(
        array(
          'label' => 'Enter your subject.',
          'value' => qa_html(qa_opt('inf_subject')),
          'tags' => 'name="inf_subject_field"',
          'note' => '<b>Insert |*Name*| in your sentence to insert the name of the user inviting.</b>',
        ),
        array(
          'label' => 'Enter your message. HTML Allowed: ',
          'value' => qa_html(qa_opt('inf_message_body')),
          'tags' => 'name="inf_message_body_field"',
          'note' => '<b>Insert |*Name*| in your sentence to insert the name of the user inviting.</b>',
        ),
        array(
          'label' => 'Preview:<br />',
          'type'  => 'static',
          'value' => '<b>Subject: </b>'. qa_html(qa_opt('inf_subject')) . '<br /><b>Message:</b><br />'.qa_opt('inf_message_body').'<hr />' ,
        ),
      ),

      'buttons' => array(
        array(
          'label' => 'Save Changes',
          'tags' => 'name="inf_save_button"',
        ),
        array(
					'label' => 'Reset',
					'tags' => 'NAME="inf_reset_button"',
					),
      ),
    );
  }
}