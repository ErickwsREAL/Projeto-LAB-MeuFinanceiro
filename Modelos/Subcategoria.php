<?php 
	class Subcategoria {
		private $idSubcategoria;
		private $idCategoria;		
		private $nomeSubcategoria;
		private $ativo;
        private $idUsuario;
    
        function getIdSubcategoria() {
            return $this->idSubcategoria;
        }

        function setIdSubcategoria($idSubcategoria) {
            $this->idSubcategoria = $idSubcategoria;
        }

        function getIdCategoria() {
            return $this->idCategoria;
        }

        function setIdCategoria($idCategoria) {
            $this->idCategoria = $idCategoria;
        }

        function getNomeSubcategoria() {
            return $this->nomeSubcategoria;
        }

        function setNomeSubcategoria($nomeSubcategoria) {
            $this->nomeSubcategoria = $nomeSubcategoria;
        }

        function getAtivo() {
            return $this->ativo;
        }

        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }

        function getIdUsuario() {
            return $this->idUsuario;
        }

        function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }       
    }
?>