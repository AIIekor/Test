<?php

class Controller_Product extends Controller
{
	
	function action_index()
	{
		$this->view->generate('header.php', 'products.php', 'footer.php');
	}
}
