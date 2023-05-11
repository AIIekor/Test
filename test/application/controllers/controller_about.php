<?php

class Controller_About extends Controller
{
	
	function action_index()
	{
		$this->view->generate('header.php', 'about.php', 'footer.php');
	}
}
