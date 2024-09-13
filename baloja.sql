-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Set-2024 às 22:00
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `baloja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_clientes`
--

CREATE TABLE `login_clientes` (
  `ID` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expiration` datetime DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login_clientes`
--

INSERT INTO `login_clientes` (`ID`, `nome`, `email`, `senha`, `is_admin`, `reset_token`, `token_expiration`, `verification_code`) VALUES
(4, NULL, 'admin@example.com', '$2y$10$cnKkzIo6qC5n3SFSXminZePAgLUS8k7sSpjDqgueb5r3IBEPk8vYa', 2, 'd544c7d0e3922337ba2005ebdbb243bb', '2024-09-13 07:45:00', '9c99a541d453'),
(5, 'João Pedro Diniz Nacur', 'luisoujpof@gmail.com', '$2y$10$bGmcNOM3g69YEgohYoMpDOsKXskAFv77jYyUxDNHnX8ELLMQf0te6', 0, NULL, NULL, '34d99da9aee7'),
(6, 'Gabriel ', '7stevensdiamante@gmail.com', '$2y$10$YOGlGSHrtO8zHgGMjhjFEu0qoqfWTBnTg.IZpGDahuclw9FN6Oi1S', 0, NULL, NULL, 'e7f00bf653ab');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `altura` decimal(10,2) DEFAULT NULL,
  `largura` decimal(10,2) DEFAULT NULL,
  `comprimento` decimal(10,2) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `foto3` varchar(255) DEFAULT NULL,
  `foto4` varchar(255) DEFAULT NULL,
  `foto5` varchar(255) DEFAULT NULL,
  `foto6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `altura`, `largura`, `comprimento`, `foto`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`) VALUES
(4, 'das', 'asd', '1.00', '1.00', '1.00', '1.00', 'Lancheira_ponei.jpg', NULL, NULL, NULL, NULL, NULL),
(6, 'teste2', 'sadas', '1.00', '1.00', '1.00', '1.00', 'Lancheira_ponei.jpg', 'Lancheira_barbie.jpg', 'foto1.jpg', 'foto4.jpg', 'foto5.jpg', 'foto6.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `login_clientes`
--
ALTER TABLE `login_clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `login_clientes`
--
ALTER TABLE `login_clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
