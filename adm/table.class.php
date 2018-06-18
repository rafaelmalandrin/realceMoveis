<?php include 'seguranca.php';

    class table
    {
        
        protected $id = null;
        protected $table = null;
        
        function __construct()
        {
            
        }
        
        function bind($data)
        {
            foreach($data as $key=>$value)
            {
                $this->$key = $value;
            }
            //print_r($this);
            //echo "<hr>";
        }
        
        function load($id)
        {
            $this->id = $id;
            $dbo = database::getInstance();
            $sql = $this->buildQuery('load');
            
            $dbo->doQuery($sql);
            $row = $dbo->loadObjectList();
            foreach($row as $key=>$value)
            {
                if($key == "id")
                {
                    continue;
                }
                $this->$key = $value;
            }
        }
        
        function store()
        {
            $dbo = database::getInstance();
            $sql = $this->buildQuery('store');
            if($dbo->doQuery($sql)){
                //header("location: index.php?p=dadossalvos");
            }
            else
            {
                //header("location: index.php?p=dadosnaosalvos");
            }
        }
        
        protected function buildQuery($task)
        {
            $sql = "";
            if($task == 'store')
            {
                if($this->id == "")
                {
                    $keys = "";
                    $values = "";
                    
                    //It doesn't work out for some unknown reason
                    //$classVars = get_class_vars(get_class($this));
                    //I've replace for this one:
                    $classVars = $this;
                    $sql .= "insert into {$this->table}";
                    foreach($classVars as $key=>$value)
                    {
                        if($key == "id" || $key == "table")
                        {
                            continue;
                        }
                        
                        $keys .= "{$key},";
                        $values .= "'{$value}',";
                    }
                    //insert into table (id, name, lname) values(1, 'ivan', 'torres);
                    $sql .= "(" . substr($keys, 0, -1) . ") values(" . substr($values, 0, -1) . ")";
                }
                else
                {
                    $classVars = get_class_vars(get_class($this));
                    $sql .= "update {$this->table} set ";
                    foreach($classVars as $key=>$value)
                    {
                        if($key == "id" || $key == "table")
                        {
                            continue;
                        }
                        
                        $sql .= "{$key} = '{$this->$key}', ";
                    }
                    $sql = substr($sql, 0, -2) . " where id = {$this->id}";
                }
                
            }
            elseif($task == 'load')
            {
                $sql = "select * from {$this->table} where id = '{$this->id}'";
                
            }
               
            return $sql;
            
        }
        #code
		
		function excluir($id)
        {
            $this->id = $id;
            $dbo = database::getInstance();
            
            $sql = "delete from {$this->table} where id = {$id}";
            
            $dbo->doQuery($sql);

        }//delete
	
	}
    
?>