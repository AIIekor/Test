<?php

class Controller_Main extends Controller
{

	function action_index()
	{	
		$this->view->generate('header.php', 'main.php', 'footer.php');
	}
}