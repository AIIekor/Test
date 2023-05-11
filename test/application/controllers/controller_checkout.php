<?php

class Controller_Checkout extends Controller
{
	
	function action_index()
	{
		$this->view->generate('header.php', 'checkout.php', 'footer.php');
	}
}
