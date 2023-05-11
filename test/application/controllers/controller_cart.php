<?php

class Controller_Cart extends Controller
{
	
	function action_index()
	{
		$this->view->generate('header.php', 'cart.php', 'footer.php');
	}
}
