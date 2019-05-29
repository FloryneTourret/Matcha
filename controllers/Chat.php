<?php

Class Chat extends Controller {
	public function index()
	{
		$this->loadModel('Chat_model');

		$data = array (
			'discutions' => $this->Chat_model->get_user_discutions($_SESSION['user']['user_id'])
		);

		$this->loadView('base/header_view');
		$this->loadView('base/navbar_view');
		$this->loadView('chat/chat_view', $data);
		$this->loadView('base/footer_view');
	}

	public function get_discution_messages()
	{
		if (isset($_GET['discution_id']) && isset($_SESSION['user']['user_id']))
		{
			$this->loadModel('Chat_model');

			$discution = $this->Chat_model->get_discution($_GET['discution_id']);
			if (!empty($discution) && ($discution['first_user_id'] == $_SESSION['user']['user_id'] || $discution['second_user_id'] == $_SESSION['user']['user_id']))
			{
				$messages = $this->Chat_model->get_discution_messages($discution['discution_id']);
				echo json_encode($messages);
			}
		}
	}
}