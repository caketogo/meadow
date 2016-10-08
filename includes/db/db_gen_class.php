<?php
class extendsClassDB extends classDB {
	function extendsClassDB() {
			/**
		 * @global array
		 */
		global $global_config;
		
		$this->classDB();
		$this->dbServer 	= $global_config["dbhost"];
		$this->dbDatabase 	= $global_config["dbname"];
		$this->dbUser 		= $global_config["dbuname"];
		$this->dbPass 		= $global_config["dbpass"];
		
		//$this->cass_keyspaces	=	"listedo";
	}
}
?>