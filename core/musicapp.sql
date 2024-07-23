-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/07/2024 às 16:19
-- Versão do servidor: 8.0.37
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `musicapp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo`
--

CREATE TABLE `modulo` (
  `idModulo` int NOT NULL,
  `tituloModulo` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descricaoModulo` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statusModulo` int DEFAULT NULL,
  `nivelModulo` tinyint NOT NULL,
  `completoModulo` tinyint NOT NULL COMMENT '1 - Completo; 0- Incompleto;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modulo`
--

INSERT INTO `modulo` (`idModulo`, `tituloModulo`, `descricaoModulo`, `statusModulo`, `nivelModulo`, `completoModulo`) VALUES
(1, 'Notas Músicais', 'Aprenda notas musicais', 1, 1, 1),
(2, 'Ritmos', NULL, NULL, 2, 1),
(3, 'Acordes', NULL, NULL, 4, 0),
(4, 'Escalas', 'Aprenda escalas de forma divertida', NULL, 3, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idModulo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
