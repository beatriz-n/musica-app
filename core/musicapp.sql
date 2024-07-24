-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/07/2024 às 03:45
-- Versão do servidor: 10.4.32-MariaDB
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
-- Estrutura para tabela `atividade`
--

CREATE TABLE `atividade` (
  `idAtividade` int(11) NOT NULL,
  `perguntaAtividade` text DEFAULT NULL,
  `alternativaAtividade` text DEFAULT NULL,
  `statusAtividade` int(11) DEFAULT NULL,
  `idModulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atividade`
--

INSERT INTO `atividade` (`idAtividade`, `perguntaAtividade`, `alternativaAtividade`, `statusAtividade`, `idModulo`) VALUES
(1, 'Qual o terceiro grau da escala maior de dó?', '[[\'D\',\'0\'],[\'F#\',\'0\'],[\'E\',\'1\']]', 1, 4),
(2, 'Qual o quinto grau da escala maior de dó?', '[[\'B\',\'0\'],[\'G\',\'1\'],[\'A#\',\'0\']]', 1, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulo`
--

CREATE TABLE `modulo` (
  `idModulo` int(11) NOT NULL,
  `tituloModulo` varchar(100) DEFAULT NULL,
  `descricaoModulo` text DEFAULT NULL,
  `statusModulo` int(11) DEFAULT NULL,
  `nivelModulo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modulo`
--

INSERT INTO `modulo` (`idModulo`, `tituloModulo`, `descricaoModulo`, `statusModulo`, `nivelModulo`) VALUES
(1, 'Notas Músicais', 'Aprenda notas musicais', 1, 1),
(2, 'Ritmos', 'Os ritmos são...', 0, 2),
(3, 'Acordes', 'Acordes são junção de...', 1, 4),
(4, 'Escalas', 'Aprenda escalas de forma divertida', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL,
  `nomePessoa` varchar(100) DEFAULT NULL,
  `emailPessoa` varchar(100) DEFAULT NULL,
  `nascimentoPessoa` date DEFAULT NULL,
  `telefonePessoa` varchar(30) DEFAULT NULL,
  `instagramPessoa` varchar(100) DEFAULT NULL,
  `imagemPessoa` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `nomePessoa`, `emailPessoa`, `nascimentoPessoa`, `telefonePessoa`, `instagramPessoa`, `imagemPessoa`) VALUES
(1, 'Bruno', 'bruno@gmail.com', '2004-03-22', '(17)99999-8888', 'brunohsz', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoaatividade`
--

CREATE TABLE `pessoaatividade` (
  `idPessoaAtividade` int(11) NOT NULL,
  `respostaPessoaAtividade` int(11) DEFAULT NULL,
  `resultadoPessoaAtividade` int(11) DEFAULT NULL COMMENT '1:Correto; 0:Incorreto',
  `idAtividade` int(11) DEFAULT NULL,
  `idPessoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoamodulo`
--

CREATE TABLE `pessoamodulo` (
  `idPessoaModulo` int(11) NOT NULL,
  `completoPessoaModulo` int(11) DEFAULT NULL COMMENT '1:Completo; 0:Incompleto',
  `idPessoa` int(11) DEFAULT NULL,
  `idModulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`idAtividade`),
  ADD KEY `fk_Atividade_Modulo` (`idModulo`);

--
-- Índices de tabela `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idModulo`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idPessoa`);

--
-- Índices de tabela `pessoaatividade`
--
ALTER TABLE `pessoaatividade`
  ADD PRIMARY KEY (`idPessoaAtividade`),
  ADD KEY `fk_PessoaAtividade_Atividade` (`idAtividade`),
  ADD KEY `fk_PessoaAtividade_Pessoa` (`idPessoa`);

--
-- Índices de tabela `pessoamodulo`
--
ALTER TABLE `pessoamodulo`
  ADD PRIMARY KEY (`idPessoaModulo`),
  ADD KEY `fk_PessoaModulo_Pessoa` (`idPessoa`),
  ADD KEY `fk_PessoaModulo_Modulo` (`idModulo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `idAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pessoaatividade`
--
ALTER TABLE `pessoaatividade`
  MODIFY `idPessoaAtividade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoamodulo`
--
ALTER TABLE `pessoamodulo`
  MODIFY `idPessoaModulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_Atividade_Modulo` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pessoamodulo`
--
ALTER TABLE `pessoamodulo`
  ADD CONSTRAINT `fk_PessoaModulo_Modulo` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PessoaModulo_Pessoa` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
