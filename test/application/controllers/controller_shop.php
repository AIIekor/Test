<?php

class Controller_Shop extends Controller
{

	function action_index()
	{	
		$this->view->generate('header.php', 'shop.php', 'footer.php');
	}
}