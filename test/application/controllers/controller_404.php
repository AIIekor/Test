<?php

class Controller_404 extends Controller
{
	
	function action_index()
	{
		$this->view->generate('header.php', '404.php', 'footer.php');
	}

}
