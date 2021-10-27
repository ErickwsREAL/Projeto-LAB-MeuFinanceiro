-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Out-2021 às 03:24
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banco`
--

CREATE TABLE `banco` (
  `id_banco` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `agencia` int(4) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `id_caixa` int(11) NOT NULL,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `id_usuario` int(11) NOT NULL,
  `tipoconta` varchar(1) NOT NULL,
  `numeroconta` int(10) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `id_banco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nomecategoria` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_orcamento`
--

CREATE TABLE `categoria_orcamento` (
  `id_categoria_orcamento` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_subcategoria` int(11) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL,
  `id_movimentacao` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `id_orcamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_caixa`
--

CREATE TABLE `historico_caixa` (
  `id_histc` int(11) NOT NULL,
  `id_caixa` int(11) NOT NULL,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `data_saldo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `id_movimentacao` int(11) NOT NULL,
  `id_caixa` int(11) NOT NULL,
  `tipo_movimentacao` varchar(1) NOT NULL,
  `valor` decimal(10,2) NOT NULL DEFAULT 0.00,
  `id_categoria` int(11) DEFAULT NULL,
  `id_sub_categoria` int(11) DEFAULT NULL,
  `data_movimentacao` date NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `data_efetivacao` date NOT NULL,
  `tipo_funcao` varchar(1) NOT NULL,
  `parcelado` int(3) NOT NULL,
  `indeterminado` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `id_orcamento` int(11) NOT NULL,
  `tipo_anual_mensal` varchar(1) NOT NULL,
  `mes` date DEFAULT NULL,
  `ano` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_categoria`
--

CREATE TABLE `sub_categoria` (
  `id_sub_categoria` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome_sub_categoria` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transferencia`
--

CREATE TABLE `transferencia` (
  `id_transferencia` int(11) NOT NULL,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `data_transferencia` date NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `id_conta_saida` int(11) NOT NULL,
  `id_conta_entrada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(50) NOT NULL,
  `datanascimento` date NOT NULL,
  `senha` varchar(128) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id_banco`),
  ADD UNIQUE KEY `agencia` (`agencia`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Índices para tabela `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`id_caixa`),
  ADD UNIQUE KEY `numeroconta` (`numeroconta`),
  ADD KEY `fk_id_usuario` (`id_usuario`),
  ADD KEY `fk_id_banco` (`id_banco`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `categoria_orcamento`
--
ALTER TABLE `categoria_orcamento`
  ADD PRIMARY KEY (`id_categoria_orcamento`),
  ADD UNIQUE KEY `fk_id_movimentacao` (`id_movimentacao`),
  ADD UNIQUE KEY `fk_id_orcamento` (`id_orcamento`),
  ADD KEY `fk_id_categoria` (`id_categoria`),
  ADD KEY `fk_id_subcategoria` (`id_subcategoria`);

--
-- Índices para tabela `historico_caixa`
--
ALTER TABLE `historico_caixa`
  ADD PRIMARY KEY (`id_histc`) USING BTREE,
  ADD KEY `secondary_key` (`id_caixa`,`data_saldo`),
  ADD KEY `fk_id_caixa` (`id_caixa`) USING BTREE;

--
-- Índices para tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id_movimentacao`),
  ADD KEY `fk_id_caixa` (`id_caixa`),
  ADD KEY `fk_id_categoria` (`id_categoria`),
  ADD KEY `fk_id_sub_categoria` (`id_sub_categoria`);

--
-- Índices para tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id_orcamento`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Índices para tabela `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD PRIMARY KEY (`id_sub_categoria`),
  ADD KEY `fk_id_categoria` (`id_categoria`);

--
-- Índices para tabela `transferencia`
--
ALTER TABLE `transferencia`
  ADD PRIMARY KEY (`id_transferencia`),
  ADD UNIQUE KEY `fk_id_conta_saida` (`id_conta_saida`),
  ADD KEY `fk_id_conta_entrada` (`id_conta_entrada`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banco`
--
ALTER TABLE `banco`
  MODIFY `id_banco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `caixa`
--
ALTER TABLE `caixa`
  MODIFY `id_caixa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria_orcamento`
--
ALTER TABLE `categoria_orcamento`
  MODIFY `id_categoria_orcamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `historico_caixa`
--
ALTER TABLE `historico_caixa`
  MODIFY `id_histc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id_movimentacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id_orcamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sub_categoria`
--
ALTER TABLE `sub_categoria`
  MODIFY `id_sub_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transferencia`
--
ALTER TABLE `transferencia`
  MODIFY `id_transferencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `banco`
--
ALTER TABLE `banco`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `caixa`
--
ALTER TABLE `caixa`
  ADD CONSTRAINT `fk_id_banco` FOREIGN KEY (`id_banco`) REFERENCES `banco` (`id_banco`),
  ADD CONSTRAINT `fk_id_usuario2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `categoria_orcamento`
--
ALTER TABLE `categoria_orcamento`
  ADD CONSTRAINT `fk_id_categoria3` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_id_movimentacao` FOREIGN KEY (`id_movimentacao`) REFERENCES `movimentacao` (`id_movimentacao`),
  ADD CONSTRAINT `fk_id_orcamento` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamento` (`id_orcamento`),
  ADD CONSTRAINT `fk_id_subcategoria2` FOREIGN KEY (`id_subcategoria`) REFERENCES `sub_categoria` (`id_sub_categoria`);

--
-- Limitadores para a tabela `historico_caixa`
--
ALTER TABLE `historico_caixa`
  ADD CONSTRAINT `fk_id_caixa` FOREIGN KEY (`id_caixa`) REFERENCES `caixa` (`id_caixa`);

--
-- Limitadores para a tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `fk_id_caixa2` FOREIGN KEY (`id_caixa`) REFERENCES `caixa` (`id_caixa`),
  ADD CONSTRAINT `fk_id_categoria2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_id_sub_categoria` FOREIGN KEY (`id_sub_categoria`) REFERENCES `sub_categoria` (`id_sub_categoria`);

--
-- Limitadores para a tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD CONSTRAINT `fk_id_usuario3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `sub_categoria`
--
ALTER TABLE `sub_categoria`
  ADD CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `sub_categoria` (`id_sub_categoria`);

--
-- Limitadores para a tabela `transferencia`
--
ALTER TABLE `transferencia`
  ADD CONSTRAINT `fk_id_conta_entrada	` FOREIGN KEY (`id_conta_entrada`) REFERENCES `caixa` (`id_caixa`),
  ADD CONSTRAINT `fk_id_conta_saida` FOREIGN KEY (`id_conta_saida`) REFERENCES `caixa` (`id_caixa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
