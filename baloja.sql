-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Set-2024 às 20:46
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
(4, NULL, 'admin@example.com', '$2y$10$cnKkzIo6qC5n3SFSXminZePAgLUS8k7sSpjDqgueb5r3IBEPk8vYa', 2, '1f0496b87a12f890790c0fa80a8ddbf4', '2024-09-15 20:11:02', '575221'),
(5, 'João Pedro Diniz Nacur', 'luisoujpof@gmail.com', '$2y$10$CMAN.fVK25o7OguNt7Wr9OfJ2BXEePxd7zNkDpY3dds8l0tLCBrX2', 0, NULL, NULL, '449467'),
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
  `foto6` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `altura`, `largura`, `comprimento`, `foto`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`, `categoria`) VALUES
(11, 'Lancheira retangular', 'Mantenha seus lanches frescos e organizados com nossa lancheira retangular personalizada. Feita com materiais de alta qualidade, ela possui um design compacto e espaÃ§oso, ideal para o dia a dia. Com forro tÃ©rmico, alÃ§a ajustÃ¡vel e opÃ§Ãµes de personalizaÃ§Ã£o com nome ou estampas, Ã© perfeita para levar estilo e praticidade em qualquer lugar.', '85.00', '20.00', '15.00', '25.00', '0dab1a4e-c941-465c-bc5b-630a81507f8d.jpg', '3a98f714-edf1-4056-9517-e01ccbe5ad9c.jpg', '5f732748-289f-43d8-af55-be93345b9b65.jpg', '991f3884-295b-49ea-9c07-43ee451bf0d4.jpg', NULL, NULL, 'Lancheira');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
