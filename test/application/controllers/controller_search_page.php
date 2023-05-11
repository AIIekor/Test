<?php

class Controller_Search_Page extends Controller
{
	function action_index()
	{	
		$this->view->generate('header.php', 'search_page.php', 'footer.php');
	}
}
