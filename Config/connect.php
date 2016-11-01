<?php

   class Conexao{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $db="exame_assistencia";
        public $con=null;
        
         function Conexao() 
         {
        
             $this->con = new mysqli($this->servername, $this->username, $this->password, $this->db);
             
             echo "Conexao Criada...";
         }
         
         function query($sql){
         
            return $this->con->query($sql);
            
         }
          
         
   }
    

    
?>