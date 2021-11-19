<?php 
	class Caixa {
        private $idCaixa;
        private $saldo;		
        private $idUsuario;
        private $tipoConta;
        private $numeroConta;
        private $ativo;
        private $idBanco;
        private $tipoCaixa;

        function getIdCaixa() {
            return $this->idCaixa;
        }

        function setIdCaixa($idCaixa) {
            $this->idCaixa = $idCaixa;
        }

        function getSaldo() {
            return $this->saldo;
        }

        function setSaldo($saldo) {
            $this->saldo = $saldo;
        }

        function getIdUsuario() {
            return $this->idUsuario;
        }

        function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        function getTipoConta() {
            return $this->tipoConta;
        }

        function setTipoConta($tipoConta) {
            $this->tipoConta = $tipoConta;
        }

        function getNumeroConta() {
            return $this->numeroConta;
        }

        function setNumeroConta($numeroConta) {
            $this->numeroConta = $numeroConta;
        }

        function getAtivo() {
            return $this->ativo;
        }

        function setAtivo($ativo) {
            $this->ativo = $ativo;
        }

        function getIdBanco() {
            return $this->idBanco;
        }

        function setIdBanco($idBanco) {
            $this->idBanco = $idBanco;
        } 

        function getTipoCaixa() {
            return $this->tipoCaixa;
        }

        function setTipoCaixa($tipoCaixa) {
            $this->tipoCaixa = $tipoCaixa;
        }           
    }
?>