<?php

class Controller_Orders extends Controller
{

	function action_index()
	{	
		$this->view->generate('header.php', 'orders.php', 'footer.php');
	}
}