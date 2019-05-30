<?php

Class Chat_model extends Model
{
	public function get_user_discussions($user_id)
	{
		$stmt = $this->db->prepare("SELECT d.*, (SELECT message_content FROM discussion_messages WHERE discussion_id = d.discussion_id ORDER BY message_date DESC LIMIT 1) AS last_message, 
		(SELECT lu FROM discussion_messages WHERE discussion_id = d.discussion_id ORDER BY message_date DESC LIMIT 1) AS lu,
		(SELECT `user_id` FROM discussion_messages WHERE discussion_id = d.discussion_id ORDER BY message_date DESC LIMIT 1) AS last_message_user,
		u1.login AS u1_login, u1.path_profile_picture AS u1_picture, u2.login AS u2_login, u2.path_profile_picture AS u2_picture 
		FROM user_discussion d 
		INNER JOIN users u1 ON u1.user_id = d.first_user_id 
		INNER JOIN users u2 ON u2.user_id = d.second_user_id 
		WHERE u2.user_id = ? OR u1.user_id = ?
		");
		$stmt->execute([$user_id, $user_id]);
		return $stmt->fetchAll();
	}

	public function get_discussion($discussion_id)
	{
		$stmt = $this->db->prepare("SELECT * FROM user_discussion WHERE discussion_id = ?");
		$stmt->execute([$discussion_id]);
		return $stmt->fetch();
	}

	public function get_discussion_messages($discussion_id)
	{
		$stmt = $this->db->prepare("SELECT m.*, u.login, u.path_profile_picture FROM discussion_messages m INNER JOIN users u ON u.user_id = m.user_id WHERE m.discussion_id = ?");
		$stmt->execute([$discussion_id]);
		return $stmt->fetchAll();
	}

	public function create_discussion($user1_id, $user2_id)
	{
		$stmt = $this->db->prepare("INSERT INTO user_discussion (`first_user_id`, `second_user_id`) VALUES (?, ?)");
		$stmt->execute([$user1_id, $user2_id]);
	}

	public function new_message($discussion_id, $message_content)
	{
		$stmt = $this->db->prepare("INSERT INTO `discussion_messages` (`user_id`, `discussion_id`, `message_content`) VALUES (?, ?, ?)");
		return $stmt->execute([$_SESSION['user']['user_id'], $discussion_id, $message_content]);
	}

	public function read_messages($discussion_id)
	{
		$stmt = $this->db->prepare("UPDATE `discussion_messages` SET `lu` = 1 WHERE `discussion_id` = ?");
		$stmt->execute([$discussion_id]);
	}
}