<?php

require_once('QuickenMSMoneyStatementParser.php');

class Bankstatement_model extends Model
{
   public function __construct()
   {
      parent::__construct();
   }

	public function parseBankStatement($filePath)
	{
		$parser = new QuickenMSMoneyStatementParser();
		
		return $parser->parse($filePath);
	}
}
?>