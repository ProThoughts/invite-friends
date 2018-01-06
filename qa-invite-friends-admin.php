<?php
/*
Setting up the admin page options.
*/
class qa_invite_friends_admin
{
  function admin_form(&$qa_content)
  {
    $saved=false;

    if (qa_clicked('inf_save_button')) {
      qa_opt('inf_subject', qa_post_text('inf_subject_field'));
      qa_opt('inf_message_body', qa_post_text('inf_message_body_field'));
      $saved=true;
    }

    return array(
      'ok' => $saved ? 'Invite Friends plugin settings saved.' : null,

      'fields' => array(
        array(
          'label' => 'Enter your subject.',
          'value' => qa_html(qa_opt('inf_subject')),
          'tags' => 'name="inf_subject_field"',
        ),
        array(
          'label' => 'Enter your message. HTML Allowed: ',
          'value' => qa_html(qa_opt('inf_message_body')),
          'tags' => 'name="inf_message_body_field"',
        ),
        array(
          'label' => 'Preview:<br />',
          'type'  => 'static',
          'value' => 'Subject: '. qa_html(qa_opt('inf_subject')) . '<br />Message:<br />'.qa_opt('inf_message_body') ,
        ),
      ),

      'buttons' => array(
        array(
          'label' => 'Save Changes',
          'tags' => 'name="inf_save_button"',
        ),
      ),
    );
  }
}