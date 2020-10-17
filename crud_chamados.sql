-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2020 às 17:00
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_chamados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `versao` int(11) NOT NULL,
  `corrigido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`id`, `numero`, `descricao`, `versao`, `corrigido`) VALUES
(1, 125, 'Campo não esta inserindo', 2, 0),
(2, 741, 'Botão de Editar não funciona', 2, 0),
(4, 125, 'Campo não esta inserindo', 2, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
