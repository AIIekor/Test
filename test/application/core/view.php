<?php

class View
{
	
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/
	function generate($header, $content_view, $footer, $data = null)
	{
		
		include 'application/views/'.$header;
		include 'application/views/'.$content_view;
		include 'application/views/'.$footer;
	}
}
