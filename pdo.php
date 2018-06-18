<?php
	//Classe para conectar ao banco de dados
	class Conexao extends PDO {
		
		private $dsn	= "mysql:host=localhost;dbname=realce";
		private $login	= "root";
		private $senha	= "";
		
		function __construct(){
			try{
				//Construtor do PDO
				$conect = parent::__construct($this->dsn, $this->login, $this->senha);
				//retornar erro
				$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				return $conect;
			}
			catch(PDOException $er){
				//se houver problema exibe mensagem
				echo 'Erro ao conectar! :( <br>'. $er->getMessage();
				return false;
			}
		}
	}
	
	
	class database
	{
		private static $instance;
		
		//private $connection;
		private $results;
		private $numRows;
		
		
		
		
		private function __construct()
		{
			
		}
		
		static function getInstance()
		{
			if(!self::$instance)
			{
				self::$instance = new self();
			}
			return self::$instance;
		}
		
		
		
		//connect ????
		
		
		
		
		public function doQuery($sql)
		{
			$db = new Conexao();
			$this->results = $db->query($sql);
			return $this->numRows = $this->results->rowCount();
			
		}
		
		public function loadObjectList()
		{
			$obj = "No Results";
			if($this->results)
			{
				$obj = $this->results->fetch(PDO::FETCH_OBJ);
			}
			return $obj;
		}
		
	}
	
	
	
	
	
?>