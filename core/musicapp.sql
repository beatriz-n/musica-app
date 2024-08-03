-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/08/2024 às 04:24
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
(7, 'Qual é a nota que está meio tom acima do Fá (F)?', '[[\"Sol (G)\",0],[\"F\\u00e1 sustenido (F#)\",1],[\"Mi (E)\",0],[\"L\\u00e1 (A)\",0]]', 1, 1),
(8, 'Qual a nota representada pela tecla indicada no teclado abaixo (suposição: a tecla é a terceira tecla branca da esquerda para a direita)?', '[[\"R\\u00e9 (D)\",1],[\"D\\u00f3 (C)\",0],[\"Mi (E)\",0],[\"F\\u00e1 (F)\",0]]', 1, 1),
(9, 'Qual é a sequência correta de intervalos para construir uma escala maior?', '[[\"Tom-Tom-SemiTom-Tom-Tom-Tom-SemiTom\",1],[\"Tom-SemiTom-Tom-Tom-Tom-SemiTom-Tom\",0],[\"SemiTom-Tom-Tom-SemiTom-Tom-Tom-Tom\",0],[\"Tom-Tom-Tom-SemiTom-Tom-SemiTom-Tom\",0]]', 1, 2),
(10, 'Qual destas sequências de notas representa uma escala menor natural de Lá (A)?', '[[\"L\\u00e1-Si-D\\u00f3-R\\u00e9-Mi-F\\u00e1-Sol#\",0],[\"L\\u00e1-Si-D\\u00f3-R\\u00e9-Mi-F\\u00e1-Sol\",1],[\"L\\u00e1-Si-D\\u00f3#-R\\u00e9-Mi-F\\u00e1#-Sol\",0],[\"L\\u00e1-Si-D\\u00f3-R\\u00e9-Mi-F\\u00e1-Sol#\",0]]', 1, 2),
(11, 'Qual é o intervalo entre as notas Dó (C) e Mi (E)?', '[[\"Segunda maior\",0],[\"Ter\\u00e7a menor\",0],[\"Ter\\u00e7a maior\",1],[\"Quarta justa\",0]]', 1, 3),
(12, 'Qual é o intervalo entre as notas Ré (D) e Lá (A)?', '[[\"Quinta justa\",1],[\"Quarta justa\",0],[\"Quinta diminuta\",0],[\"Ter\\u00e7a maior\",0]]', 1, 3),
(13, 'Qual das seguintes opções é uma tríade maior?', '[[\"D\\u00f3-Mi-Sol\",1],[\"D\\u00f3-Mi bemol-Sol\",0],[\"D\\u00f3-Mi-Sol bemol\",0],[\"D\\u00f3-Mi bemol-Sol bemol\",0]]', 1, 4),
(14, 'Qual das seguintes opções é um acorde de Lá menor?', '[[\"L\\u00e1-D\\u00f3-Mi\",1],[\"L\\u00e1-D\\u00f3#-Mi\",0],[\"L\\u00e1-Si-Mi\",0],[\"L\\u00e1-Sol-Mi\",0]]', 1, 4);

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
(1, 'Notas Músicais', '<b>Notas</b>: As sete notas básicas são Dó (C), Ré (D), Mi (E), Fá (F), Sol (G), Lá (A) e Si (B). Essas notas podem ser alteradas por sustenidos (#) ou bemóis (b).\r\n</br><b>Acidentes</b>: Sustenido (#) eleva uma nota em meio tom, e bemol (b) abaixa uma nota em meio tom. Dó sustenido (C#) é meio tom acima de Dó, e Dó bemol (Cb) é meio tom abaixo de Dó.', 1, 2),
(2, 'Escalas', '<b>Escalas Maiores</b>: Compostas por uma sequência de tons e semitons na seguinte ordem: Tom-Tom-SemiTom-Tom-Tom-Tom-SemiTom.\r\n<br><b>Escalas Menores</b>: Têm três formas principais - natural, harmônica e melódica. A escala menor natural segue: Tom-SemiTom-Tom-Tom-SemiTom-Tom-Tom.', 1, 3),
(3, 'Intervalos', '<b>Intervalos</b>: A distância entre duas notas. Pode ser descrito como um intervalo de segunda (um tom ou semitom), terceira (dois tons ou um tom e meio), etc.\r\n<br><b>Consonância e Dissonância</b>: Intervalos consonantes (como a terça maior, quinta perfeita) soam estáveis, enquanto intervalos dissonantes (como a segunda menor, sétima maior) soam tensos.', 1, 4),
(4, 'Acordes', '<b>Tríades</b>: Acordes básicos formados por três notas, geralmente a tônica, a terça e a quinta (por exemplo, Dó-Mi-Sol para um acorde de C maior).\r\n<br><b>Sétimas</b>: Acordes que adicionam a sétima nota à tríade básica (por exemplo, Dó-Mi-Sol-Si para um acorde de Cmaj7).', 1, 5),
(12, 'Teoria Musical', 'A teoria musical é o estudo dos princípios e elementos que constituem a música. Ela abrange a análise e compreensão das estruturas musicais, como notas, escalas, acordes, ritmos, e formas. A teoria musical ajuda a entender como as diferentes partes de uma composição se relacionam e como criar e interpretar música de forma estruturada e harmônica. É essencial para a criação, execução e apreciação da música, fornecendo as ferramentas para compreender e comunicar ideias musicais de maneira eficaz.', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL,
  `nomePessoa` varchar(100) DEFAULT NULL,
  `emailPessoa` varchar(100) DEFAULT NULL,
  `senhaPessoa` varchar(100) DEFAULT NULL,
  `statusPessoa` int(11) DEFAULT NULL,
  `adminPessoa` int(11) DEFAULT NULL,
  `nascimentoPessoa` date DEFAULT NULL,
  `telefonePessoa` varchar(30) DEFAULT NULL,
  `instagramPessoa` varchar(100) DEFAULT NULL,
  `imagemPessoa` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `nomePessoa`, `emailPessoa`, `senhaPessoa`, `statusPessoa`, `adminPessoa`, `nascimentoPessoa`, `telefonePessoa`, `instagramPessoa`, `imagemPessoa`) VALUES
(1, 'Administrador', 'admin@admin', '123456', 1, 1, '2004-03-22', '(17)99999-8888', NULL, NULL);

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
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `idAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pessoaatividade`
--
ALTER TABLE `pessoaatividade`
  MODIFY `idPessoaAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `atividade`
--
ALTER TABLE `atividade`
  ADD CONSTRAINT `fk_Atividade_Modulo` FOREIGN KEY (`idModulo`) REFERENCES `modulo` (`idModulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pessoaatividade`
--
ALTER TABLE `pessoaatividade`
  ADD CONSTRAINT `fk_PessoaAtividade_Atividade` FOREIGN KEY (`idAtividade`) REFERENCES `atividade` (`idAtividade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PessoaAtividade_Pessoa` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
