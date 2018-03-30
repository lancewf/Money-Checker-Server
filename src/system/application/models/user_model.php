<?php
class User_model extends Model 
{
	public function __construct()
	{
		parent::__construct();
		
		require_once('persistence/User.php');
	}
	
	public function getUser()
	{ 
		$user_id = 653611718;
		
		$user = UserPeer::retrieveByPK($user_id);
		
		return $user;
	}
}
?>
