<?php
	
	class Usuario {
		protected $id;
		protected $Nome;		
		protected $Email;
		protected $DataNascimento;
		protected $Senha;
		
				
		function getNome() {
	        return $this->Nome;
	    }

	    function getEmail() {
	        return $this->Email;
	    }

	    function getDataNascimento() {
	        return $this->DataNascimento;
	    }

	    function getSenha() {
	        return $this->Senha;
	    }

	    function getID() {
	        return $this->id;
	    }
	    
	    //-------------------------------------------------------------------------------------------------------------------------------------

	    function setNome($nome) {
	        $this->Nome = $nome;
	    }

	    function setEmail($email) {
	        $this->Email = $email;
	    }

	    function setSenha($senha) {
	        $this->Senha = $senha;
	    }

	    function setDataNascimento($datanascimento) {
	        $this->DataNascimento = $datanascimento;
	    }

	    function setID($ID) {
	        $this->id = $ID;
	    }
	}
?>