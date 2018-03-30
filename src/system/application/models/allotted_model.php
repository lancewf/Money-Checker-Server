<?php
class Allotted_model extends Model
{
   public function __construct()
   {
      parent::__construct();

      require_once('persistence/AllottedPeer.php');
   }

	public function getAllottedAmounts($user)
	{
		$c = new Criteria();
		$c->add(AllottedPeer::USER_ID, $user->getId(), Criteria::EQUAL);
		
		$allottedAmounts = AllottedPeer::doSelect($c);
				
		return $allottedAmounts;
	}
}
?>