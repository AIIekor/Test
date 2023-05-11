<?php

class Model
{
	public function get_data()
	{
		protected $db;
		public function __construct(){
			$this->db = ned PDO("mysql:host=localhost;dbname=shop_db","root","");
		}
		public function __destruct(){
			$this->db = null;
		}
	}
}