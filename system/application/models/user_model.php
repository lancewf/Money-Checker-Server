<?php
class User_model extends Model 
{
	public function User_model()
	{
		parent::Model();
		
		require_once('persistence/User.php');
	}
	
	public function getUser()
	{ //real 653611718
		
		//$user_id = $this->facebook_connect->user_id;
		
		$user = UserPeer::retrieveByPK("2388923");
		
		return $user;
	}
}
?>