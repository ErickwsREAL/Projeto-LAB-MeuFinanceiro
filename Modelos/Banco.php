<?php 
	class Banco {
        private $idBanco;
        private $nomeBanco;
        private $agencia;
        private $ativo;
        private $idUsuario;

        function getIdBanco() {
            return $this->idBanco;
        }

        function setIdBanco($idBanco) {
            $this->idBanco = $idBanco;
        }

        function getNomeBanco() {
            return $this->nomeBanco;
        }

        function setNomeBanco($nomeBanco) {
            $this->nomeBanco = $nomeBanco;
        }

        function getAgencia() {
            return $this->agencia;
        }

        function setAgencia($agencia) {
            $this->agencia = $agencia;
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