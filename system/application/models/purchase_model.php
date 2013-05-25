<?php
class Purchase_model extends Model
{
	const TIME_7_DAY  = 604800;
		
	public function Purchase_model()
	{
		parent::Model();

		require_once('persistence/Purchase.php');
	}
	
	public function deletePurchase($purchaseKey, $user)
	{
		$purchase = PurchasePeer::retrieveByPK($purchaseKey);
		
		if($purchase && $purchase->getUser()->getId() == $user->getId())
		{
			$purchase->delete();
		}
	}
	
	public function modifyPurchase($purchaseKey, $store, $cost, $billTypeKey, 
		$note, $month, $dayOfMonth, $year, $user)
	{
		$purchase = PurchasePeer::retrieveByPK($purchaseKey);
		
		if($purchase && $purchase->getUser()->getId() == $user->getId())
		{
			$date = mktime(0, 0, 0, $month, $dayOfMonth, $year);
			
			$purchase->setBilltypeKey($billTypeKey);
				
			$purchase->setStore($store);
	
			$purchase->setCost($cost);
				
			$purchase->setDate($date);
				
			$purchase->setNotes($note);
				
			$purchase->save();
		}
	}
	
	public function getStores($user)
	{
 	    return PurchasePeer::getStores($user);
	}
	
	public function getMatchingPuchases($store, $cost, $billTypeKey, $note,
		$month, $dayOfMonth, $year, $user)
	{
		$timestamp = mktime(0, 0, 0, $month, $dayOfMonth, $year);
		
		$sevenDaysBefore = $timestamp - Purchase_model::TIME_7_DAY;
		
		$sevenDaysAfter = $timestamp + Purchase_model::TIME_7_DAY;
		
		$c = new Criteria();
		$c->add(PurchasePeer::DATE, $sevenDaysBefore,
			Criteria::GREATER_EQUAL);
		$c->addAnd(PurchasePeer::DATE, $sevenDaysAfter,
			Criteria::LESS_EQUAL);
		$c->addAnd(PurchasePeer::COST, $cost,
			Criteria::EQUAL);
		$c->addAnd(PurchasePeer::USER_ID, $user->getId(), Criteria::EQUAL);
			
		$c->addAscendingOrderByColumn(PurchasePeer::DATE);

		$purchases = PurchasePeer::doSelect($c);

		return $purchases;
	}

	public function getPurchases($startMonth, $startDayOfMonth, $startYear,
		$endMonth, $endDayOfMonth, $endYear, $user, $billType = NULL)
	{
		$startTime = mktime(0, 0, 0, $startMonth, $startDayOfMonth, $startYear);
		$endOfTime = mktime(0, 0, 0, $endMonth, $endDayOfMonth, $endYear);

		$c = new Criteria();
		$c->add(PurchasePeer::DATE, $startTime,
			Criteria::GREATER_EQUAL);
		$c->addAnd(PurchasePeer::DATE, $endOfTime,
			Criteria::LESS_THAN);
		$c->addAnd(PurchasePeer::USER_ID, $user->getId(), Criteria::EQUAL);
		
		if(!is_null($billType))
		{
			$c->addAnd(PurchasePeer::BILLTYPE_KEY, $billType->getKey(), 
				Criteria::EQUAL);
		}
		
		$c->addAscendingOrderByColumn(PurchasePeer::DATE);

		$purchases = PurchasePeer::doSelect($c);

		return $purchases;
	}

	public function searchPurchases($startMonth, $startDayOfMonth, $startYear,
		$endMonth, $endDayOfMonth, $endYear, $user, $billTypeKey, $storeName, 
                 $cost, $costComparison, $costRange)
	{
		$c = new Criteria();
		$c->add(PurchasePeer::USER_ID, $user->getId(), Criteria::EQUAL);

                if(!is_null($startYear))
                {
		        $startTime = mktime(0, 0, 0, $startMonth, $startDayOfMonth, $startYear);
		        $c->addAnd(PurchasePeer::DATE, $startTime,
			        Criteria::GREATER_EQUAL);
                }
                if(!is_null($endYear))
                {
		        $endOfTime = mktime(0, 0, 0, $endMonth, $endDayOfMonth, $endYear);
		        $c->addAnd(PurchasePeer::DATE, $endOfTime,
			        Criteria::LESS_THAN);
                }

		if(!is_null($billTypeKey))
		{
			$c->addAnd(PurchasePeer::BILLTYPE_KEY, $billTypeKey, 
				Criteria::EQUAL);
		}

		if(!is_null($storeName ))
		{
			$c->addAnd(PurchasePeer::STORE, $storeName, 
				Criteria::EQUAL);
		}

		if(!is_null($costComparison))
		{
                        if(strcasecmp($costComparison, "Equal") == 0 )
                        {
                                $c->addAnd(PurchasePeer::COST, $cost, 
				       Criteria::EQUAL);
                        }
                        if(strcasecmp($costComparison, "Greater") == 0 )
                        {
                                $c->addAnd(PurchasePeer::COST, $cost, 
				       Criteria::GREATER_EQUAL);
                        }
                        if(strcasecmp($costComparison, "Less") == 0 )
                        {
                                $c->addAnd(PurchasePeer::COST, $cost, 
				       Criteria::LESS_THAN);
                        }
                        if(strcasecmp($costComparison, "Range") == 0 )
                        {
                                $c->addAnd(PurchasePeer::COST, $cost, 
				       Criteria::GREATER_EQUAL);
                                $c->addAnd(PurchasePeer::COST, $costRange, 
				       Criteria::LESS_THAN);
                        }
		}

		$c->addAscendingOrderByColumn(PurchasePeer::DATE);

		$purchases = PurchasePeer::doSelect($c);

		return $purchases;
	}

	public function addPurchase($store, $cost, $billTypeKey, $note,
		$month, $dayOfMonth, $year, $user)
	{
		$date = mktime(0, 0, 0, $month, $dayOfMonth, $year);
					
		$purchase = new Purchase();
			
		$purchase->setBilltypeKey($billTypeKey);
			
		$purchase->setStore($store);

		$purchase->setCost($cost);
			
		$purchase->setDate($date);
			
		$purchase->setNotes($note);
		
		$purchase->setUser($user);
			
		$purchase->save();
	}
}
?>