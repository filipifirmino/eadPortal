-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14-Maio-2020 às 15:46
-- Versão do servidor: 10.3.22-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ead_anchieta`
--
CREATE DATABASE IF NOT EXISTS `ead_anchieta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ead_anchieta`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `matricula` int(6) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `matricula`, `senha`) VALUES
(13, 'JosÃ© primeiro silva', 1, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_turma`
--

CREATE TABLE `aluno_turma` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno_turma`
--

INSERT INTO `aluno_turma` (`id`, `id_turma`, `id_aluno`) VALUES
(8, 18, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` int(1) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `ordem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `nome`, `tipo`, `id_turma`, `id_disciplina`, `ordem`) VALUES
(21, 'Verbos', 1, 1, 24, 1),
(22, 'Poligonos', 0, 18, 25, 1),
(23, 'Poligonos', 0, 18, 25, 1),
(24, 'Poligonos', 1, 18, 25, 1),
(25, 'Verbos', 1, 18, 26, 1),
(26, 'Verbos', 0, 18, 26, 1),
(27, 'Verbos', 0, 18, 26, 1),
(28, 'Citologia', 1, 18, 27, 1),
(29, 'CÃ©lula', 0, 18, 27, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `id_turma` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`, `id_turma`) VALUES
(24, 'Português', '1'),
(25, 'Matemática', '18'),
(26, 'Português', '18'),
(27, 'Ciência', '18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `duvidas`
--

CREATE TABLE `duvidas` (
  `id` int(11) NOT NULL,
  `data_duvida` datetime NOT NULL,
  `respondida` tinyint(1) DEFAULT NULL,
  `duvida` text NOT NULL,
  `id_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `duvidas`
--

INSERT INTO `duvidas` (`id`, `data_duvida`, `respondida`, `duvida`, `id_aluno`) VALUES
(2, '2020-04-27 15:54:53', NULL, 'Minha duvida Ã© esta...', 1),
(3, '2020-05-05 10:10:44', NULL, 'Duvida teste', 7),
(4, '2020-05-11 20:25:32', NULL, 'Minha duvida Ã© essa?', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicios`
--

CREATE TABLE `exercicios` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `pergunta` varchar(400) DEFAULT NULL,
  `id_aula` int(11) NOT NULL,
  `op1` varchar(50) DEFAULT NULL,
  `op2` varchar(50) DEFAULT NULL,
  `op3` varchar(50) DEFAULT NULL,
  `op4` varchar(50) DEFAULT NULL,
  `op5` varchar(50) DEFAULT NULL,
  `resposta` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `exercicios`
--

INSERT INTO `exercicios` (`id`, `id_turma`, `pergunta`, `id_aula`, `op1`, `op2`, `op3`, `op4`, `op5`, `resposta`) VALUES
(7, NULL, 'Pergunta teste', 22, 'Resp', 'Resp', 'Resp', 'Resp', 'Resp', 'op2'),
(8, NULL, 'Pergunta teste 2', 23, 'X-> Y', 'Y<-X', 'AB->', 'BC<-', 'NDR', 'op5'),
(9, NULL, 'Pergunta teste 3', 26, 'RESP', 'RESP', 'RESP', 'RESP', 'RESP', 'op3'),
(10, NULL, 'Pergunta teste 4', 27, 'RESP', 'RESP', 'RESP', 'RESP', 'RESP', 'op2'),
(11, NULL, 'Pergunta teste 5', 29, 'RESP', 'RESP', 'RESP', 'RESP', 'RESP', 'op3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `data_viwed` datetime NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `data_viwed`, `id_aluno`, `id_aula`) VALUES
(6, '2020-05-11 20:25:08', 7, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `id_disciplina` int(11) DEFAULT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_disciplina`
--

CREATE TABLE `professor_disciplina` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_turma`
--

CREATE TABLE `professor_turma` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `imagem` varchar(37) DEFAULT NULL,
  `id_alunos` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `nome`, `imagem`, `id_alunos`) VALUES
(1, 'INF I A', 'sala.svg', NULL),
(2, 'INF I B', 'sala.svg', NULL),
(3, 'INF II A', 'sala.svg', NULL),
(4, 'INF II B', 'sala.svg', NULL),
(5, 'INF III A', 'sala.svg', NULL),
(6, 'INF III B', 'sala.svg', NULL),
(7, 'INF IV A', 'sala.svg', NULL),
(8, 'INF IV B', 'sala.svg', NULL),
(9, '1o ANO A', 'sala.svg', NULL),
(10, '1o ANO B', 'sala.svg', NULL),
(11, '2o ANO A', 'sala.svg', NULL),
(12, '2o ANO B', 'sala.svg', NULL),
(13, '3o ANO A', 'sala.svg', NULL),
(14, '3o ANO B', 'sala.svg', NULL),
(15, '4o ANO A', 'sala.svg', NULL),
(16, '4o ANO B', 'sala.svg', NULL),
(17, '5o ANO A', 'sala.svg', NULL),
(18, '5o ANO B', 'sala.svg', NULL),
(19, '6o ANO A', 'sala.svg', NULL),
(20, '6o ANO B', 'sala.svg', NULL),
(21, '7o ANO A', 'sala.svg', NULL),
(22, '7o ANO B', 'sala.svg', NULL),
(23, '8o ANO A', 'sala.svg', NULL),
(24, '8o ANO B', 'sala.svg', NULL),
(25, '9o ANO', 'sala.svg', NULL),
(26, '1o ANO EM', 'sala.svg', NULL),
(27, '2o ANO EM', 'sala.svg', NULL),
(28, '3o ANO EM', 'sala.svg', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_disciplina`
--

CREATE TABLE `turma_disciplina` (
  `id` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, 'contatoic3web@gmail.com', 'e50fd33268a201e8857ad1eb8d1bab32'),
(2, 'admin@admin.com', '31b542ffa30ba389332da7a6a8f7dc76');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `url_video` varchar(150) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `video`
--

INSERT INTO `video` (`id`, `id_aula`, `url_video`, `nome`) VALUES
(10, 21, '412330554    ', 'Verbos'),
(11, 24, '413031555', 'Poligonos'),
(12, 25, '141955667', 'Verbos'),
(13, 28, '58857460', 'Citologia');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `duvidas`
--
ALTER TABLE `duvidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `exercicios`
--
ALTER TABLE `exercicios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professor_turma`
--
ALTER TABLE `professor_turma`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `duvidas`
--
ALTER TABLE `duvidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `exercicios`
--
ALTER TABLE `exercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professor_turma`
--
ALTER TABLE `professor_turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Banco de dados: `ola`
--
CREATE DATABASE IF NOT EXISTS `ola` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ola`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
