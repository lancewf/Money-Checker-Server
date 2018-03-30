<?php

/*
 * The main controller page. 
 * 
 */
class Main extends Controller
{
	// -------------------------------------------------------------------------
	// Constructor
	// -------------------------------------------------------------------------
	
	function __construct()
	{
		parent::__construct();
	}

	// -------------------------------------------------------------------------
	// Public Members
	// -------------------------------------------------------------------------
	
	/**
	 * 
	 */
	public function index()
	{
		$this->loadPage();
	}
	
	// -------------------------------------------------------------------------
	// Private Members
	// -------------------------------------------------------------------------

	/**
	 * Load the client javascript page
	 * 
	 * @param $startPage The page that is loaded to start
	 */
	private function loadPage()
	{
	   $data = $this->getData();
  	   
	   $this->load->view('index', $data);
	}
	
	/**
	 * Get the data for the javascript client
	 */
	private function getData()
	{
		$data['homeUrl'] = "http://lancewf.no-ip.info";
		
		return $data;	
	}
}
?>
