<?php

class Controller_Contacts extends Controller
{

	function action_index()
	{
		$this->view->generate('header.php', 'contacts.php', 'footer.php');
	}
}
