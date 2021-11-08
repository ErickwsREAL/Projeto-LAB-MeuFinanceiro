<?php 
	class Categoria {
        private $idCategoria;
        private $nomeCategoria;		
        private $ativo;
        private $tipoDeCategoria;
        private $idUsuario;
        
        function getIdCategoria() {
            return $this->idCategoria;
        }

        function setIdCategoria($idCategoria) {
            $this->idCategoria = $idCategoria;
        }

        function getNomeCategoria() {
            return $this->nomeCategoria;
        }

        function setNomeCategoria($nomeCategoria) {
            $this->nomeCategoria = $nomeCategoria;
        }

        function getAtivo() {
            return $this->ativo;
        }

        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }

        function getTipoDeCategoria() {
            return $this->tipoDeCategoria;
        }

        function setTipoDeCategoria($tipoDeCategoria) {
            $this->tipoDeCategoria = $tipoDeCategoria;
        }

        function getIdUsuario() {
            return $this->idUsuario;
        }

        function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }
    }

?>