<?php

Class Chat extends Controller {
	public function index()
	{
		$this->loadModel('Chat_model');

		$data = array (
			'discussions' => $this->Chat_model->get_user_discussions($_SESSION['user']['user_id'])
		);

		$this->loadView('base/header_view');
		$this->loadView('base/navbar_view');
		$this->loadView('chat/chat_view', $data);
		$this->loadView('base/footer_view');
	}

	public function get_discussion_messages()
	{
		if (isset($_GET['discussion_id']) && isset($_SESSION['user']['user_id']))
		{
			$this->loadModel('Chat_model');

			$discussion = $this->Chat_model->get_discussion($_GET['discussion_id']);
			if (!empty($discussion) && ($discussion['first_user_id'] == $_SESSION['user']['user_id'] || $discussion['second_user_id'] == $_SESSION['user']['user_id']))
			{
				$messages = $this->Chat_model->get_discussion_messages($discussion['discussion_id']);
				echo json_encode($messages);
			}
		}
	}

	public function post_message()
	{
		if (isset($_POST['discussion_id']) && is_numeric($_POST['discussion_id']) && isset($_POST['message_content']))
		{
			echo "ok";
			$this->loadModel('Chat_model');

			$this->Chat_model->new_message($_POST['discussion_id'], $_POST['message_content']);
		} else {
			echo "ko";
		}
	}
}