<?php

Class Chat_model extends Model
{
	public function get_user_discutions($user_id)
	{
		$stmt = $this->db->prepare("SELECT d.*, u1.login AS u1_login, u1.path_profile_picture AS u1_picture, u2.login AS u2_login, u2.path_profile_picture AS u2_picture
									FROM user_discution d
									INNER JOIN users u1 ON u1.user_id = d.first_user_id
									INNER JOIN users u2 ON u2.user_id = d.second_user_id
									WHERE u2.user_id = ? OR u1.user_id = ?");
		$stmt->execute([$user_id, $user_id]);
		return $stmt->fetchAll();
	}

	public function get_discution($discution_id)
	{
		$stmt = $this->db->prepare("SELECT * FROM user_discution WHERE discution_id = ?");
		$stmt->execute([$discution_id]);
		return $stmt->fetch();
	}

	public function get_discution_messages($discution_id)
	{
		$stmt = $this->db->prepare("SELECT m.*, u.login, u.path_profile_picture FROM discution_messages m INNER JOIN users u ON u.user_id = m.user_id WHERE m.discution_id = ?");
		$stmt->execute([$discution_id]);
		return $stmt->fetchAll();
	}

	public function create_discution($user1_id, $user2_id)
	{
		$stmt = $this->db->prepare("INSERT INTO user_discution (`first_user_id`, `second_user_id`) VALUES (?, ?)");
		$stmt->execute([$user1_id, $user2_id]);
	}
}