-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jul-2020 às 01:43
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_ci2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissaotecnica`
--

CREATE TABLE `comissaotecnica` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `funcao` varchar(100) NOT NULL,
  `diasContrato` int(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `anosExperiencia` int(100) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `alterado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comissaotecnica`
--

INSERT INTO `comissaotecnica` (`id`, `nome`, `apelido`, `funcao`, `diasContrato`, `genero`, `email`, `anosExperiencia`, `criado`, `alterado`) VALUES
(1, 'Thiago Maia', 'Djoko', 'Técnico', 125, 'Masculino', 'djokocontato@gmail.com', 7, '2020-05-21 00:02:58', '2020-05-21 00:02:58'),
(4, 'Gabriel Claumann', 'tockers', 'Analista', 12, 'Masculino', 'tockerslol@email.com', 8, '2020-06-05 04:41:59', '2020-06-05 04:41:59'),
(5, 'Paula', 'Pxa', 'Manager', 123, 'Feminino', 'pxa@fla.com', 4, '2020-06-24 23:16:39', '2020-06-24 23:16:39'),
(6, 'Bernardo Machado', 'Kake', 'Técnico', 123, 'Masculino', 'kake@contato.com', 2, '2020-07-08 17:56:21', '2020-07-08 17:56:21'),
(7, 'Pedro Henrique', 'Predito', 'Técnico', 19, 'Masculino', 'oedro@email.com', 2, '2020-07-08 18:59:32', '2020-07-08 18:59:32'),
(8, 'Janaína Albuquerque', 'Jna', 'Psicóloga', 532, 'Feminino', 'jna@email.com', 4, '2020-07-08 19:04:46', '2020-07-08 19:04:46'),
(9, 'Martha Silva', 'Mrts', 'Head Coach', 0, 'Feminino', 'martha@email.com', 2, '2020-07-08 19:06:11', '2020-07-08 19:06:11'),
(10, 'Jorge Sombrio', 'Jorgito', 'Analista', 34, 'Masculino', 'jorgito@email.com', 1, '2020-07-08 19:06:42', '2020-07-08 19:06:42'),
(11, 'Amanda Barreto', 'AmanB', 'Estrategista', 48, 'Feminino', 'amanda@email.com', 5, '2020-07-08 19:07:15', '2020-07-08 19:07:15'),
(12, 'Carlos Geraldo', 'geraldão', 'Diretor', 93, 'Masculino', 'carlos@email.com', 9, '2020-07-08 19:07:39', '2020-07-08 19:07:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `diasContrato` int(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `anosExperiencia` int(100) NOT NULL,
  `titulos` int(100) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `alterado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `players`
--

INSERT INTO `players` (`id`, `nome`, `apelido`, `diasContrato`, `genero`, `email`, `anosExperiencia`, `titulos`, `criado`, `alterado`) VALUES
(1, 'Filipe Brombilla', 'Ranger', 789, 'Masculino', 'rangercontato@gmail.com', 5, 2, '2020-05-20 23:56:36', '2020-05-20 23:56:36'),
(2, 'Bruno Miyaguchi', 'Goku', 123, 'Masculino', 'gokuflamengo@gmail.com', 5, 3, '2020-05-29 04:10:03', '2020-05-29 04:10:03'),
(5, 'Júlia Nakamura', 'Mayumi', 45, 'Feminino', 'flamayumi@flamengo.com', 0, 0, '2020-06-05 04:12:24', '2020-06-05 04:12:24'),
(16, 'Leonardo Souza', 'Robo', 123, 'Masculino', 'roboxin@gmail.com', 6, 2, '2020-06-19 19:35:29', '2020-06-19 19:35:29'),
(19, 'Felipe Gonçalves', 'brTT', 178, 'Masculino', 'brtt@contato.com', 9, 7, '2020-06-20 00:58:32', '2020-06-20 00:58:32'),
(20, 'Gabriel Bohm', 'Kami', 31, 'Masculino', 'kamizeon@email.com', 8, 5, '2020-07-08 03:17:46', '2020-07-08 03:17:46'),
(21, 'Lee Sang-Hyeok', 'Faker', 720, 'Masculino', 'faker@email.com', 9, 14, '2020-07-08 18:58:22', '2020-07-08 18:58:22'),
(22, 'Thiago Sartori', 'tinowns', 321, 'Masculino', 'tin@email.com', 7, 4, '2020-07-08 19:00:15', '2020-07-08 19:00:15'),
(23, 'Matheus Borges', 'Mylon', 0, 'Masculino', 'mylon@email.com', 8, 6, '2020-07-08 19:01:45', '2020-07-08 19:01:45'),
(24, 'Marcos Ferreira', 'Krastyel', 124, 'Masculino', 'krastyel@email.com', 7, 1, '2020-07-08 19:02:23', '2020-07-08 19:02:23'),
(25, 'Caio Almeida', 'Loop', 0, 'Masculino', 'loop@email.com', 7, 3, '2020-07-08 19:03:05', '2020-07-08 19:03:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(300) DEFAULT NULL,
  `aniversario` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `alterado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `aniversario`, `cpf`, `genero`, `estado`, `cidade`, `criado`, `alterado`, `tipo`) VALUES
(1, 'Thiago Fritz', 'thiagofritz1@ordem.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '12/12/1987', '12345678911', 'Masculino', 'SP', 'São Paulo', '2020-05-20 22:43:16', '2020-07-01 22:50:25', NULL),
(4, 'Steve Rogers', 'shieldsr@shield.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '11/12/1918', '111111112', 'Masculino', 'NY', 'Nova York', '2020-05-28 01:03:12', '2020-06-25 00:16:35', NULL),
(9, 'Steve Harrington', 'stevinho@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '12/12/1967', '11111111119', 'Masculino', 'NY', 'Hawkins', '2020-06-24 23:03:29', '2020-07-08 17:19:14', 'usr'),
(10, 'Nancy Wheeler', 'email@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '12/12/1969', '12312312312', 'Feminino', 'NY', 'Hawkins', '2020-06-24 23:11:40', '2020-07-08 17:18:57', 'adm'),
(14, 'Anastasia Chernov', 'anastasia@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '26/04/1992', '12312312313', 'Feminino', 'RU', 'Moscow', '2020-06-24 23:19:44', '2020-07-02 01:21:59', NULL),
(18, 'Salsicha Rogers', 'salsicharogers@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '11/11/1111', '12312332132', 'Masculino', 'SP', 'São Paulo', '2020-07-08 17:23:45', '2020-07-08 17:25:24', 'usr'),
(19, 'Fred Jones', 'fred@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '13/02/1983', '31234532123', 'Masculino', 'SP', 'São Paulo', '2020-07-08 18:25:26', '2020-07-08 18:25:26', 'adm'),
(20, 'Velma Dinkley', 'velma@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '15/04/1984', '34323432343', 'Feminino', 'SP', 'São Paulo', '2020-07-08 18:26:07', '2020-07-08 18:26:07', 'adm'),
(21, 'Daphne Blake', 'daphne@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '03/12/1984', '12395384380', 'Feminino', 'SP', 'São Paulo', '2020-07-08 18:26:45', '2020-07-08 20:06:41', 'usr'),
(22, 'Pedro Alvares Cabral', 'pedrinho@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '11/12/1428', '12346783821', 'Masculino', 'PT', 'Lisboa', '2020-07-08 18:27:36', '2020-07-08 18:27:36', 'usr'),
(23, 'Darth Vader', 'darthvader@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '11/08/1849', '85385029421', 'Masculino', 'RJ', 'Rio de Janeiro', '2020-07-08 18:28:15', '2020-07-08 18:28:15', 'adm'),
(24, 'Freddy Krueger', 'krueger@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '18/05/1932', '84305392421', 'Masculino', 'BA', 'Salvador', '2020-07-08 18:29:07', '2020-07-08 18:29:07', 'usr'),
(25, 'Charlotte Doppler', 'charlotte@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '11/09/1982', '48294573752', 'Feminino', 'MG', 'Winden', '2020-07-08 18:30:09', '2020-07-08 18:30:09', 'adm'),
(26, 'Francis Francisco', 'francis@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '24/12/1999', '12385485943', 'Masculino', 'RS', 'Novo Hamburgo', '2020-07-08 18:31:07', '2020-07-08 18:31:07', 'usr'),
(27, 'Nicholas J. Fury', 'nickfury@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '11/03/1959', '83184284284', 'Masculino', 'RS', 'Porto Alegre', '2020-07-08 18:31:49', '2020-07-08 18:31:49', 'adm');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comissaotecnica`
--
ALTER TABLE `comissaotecnica`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comissaotecnica`
--
ALTER TABLE `comissaotecnica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
