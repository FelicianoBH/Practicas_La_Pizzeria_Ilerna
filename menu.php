<?php 

	class Menu {

		private $_db;

		public function __construct() {

			$this->_db = new Database();

		}

		public function getMenu() {

			$menu = $this->_db->query("SELECT * FROM menu");
			return $menu->fetchAll();

		}
		public function getSubMenu($id) {

			$menu = $this->_db->query("SELECT * FROM submenu WHERE idopcion = $id");
			return $menu->fetchAll();
			
		}
	}

 ?>