-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jun-2020 às 17:53
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
-- Banco de dados: `videogame tracker`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(1, 0, 'lol', 'Miguel', '2020-06-01 19:06:50'),
(2, 0, 'bom trabalho máno miguel', 'Miguel', '2020-06-01 19:08:28'),
(3, 0, 'a', 'Miguel', '2020-06-01 20:57:24'),
(4, 3, 'loxD', 'Miguel', '2020-06-01 20:58:50'),
(5, 3, 'asdasdasda', 'Miguel', '2020-06-01 20:58:59'),
(6, 0, 'a', 'a', '2020-06-02 00:04:46'),
(7, 0, 'Bryugds', 'Bruh', '2020-06-02 11:25:59'),
(8, 0, 'Epic', 'Nice', '2020-06-02 11:37:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `jogos_jogados` int(5) NOT NULL,
  `jogo_preferido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`jogos_jogados`, `jogo_preferido`) VALUES
(1, 'a'),
(2, 'a'),
(3, 'doom eternal'),
(4, 'a'),
(5, 'a'),
(6, 'a'),
(7, 'a'),
(8, 'a'),
(9, 'a'),
(10, 'a'),
(11, 'a'),
(12, 'a'),
(13, 'a'),
(14, ''),
(15, 'a'),
(16, 'a'),
(17, 'a'),
(18, 'a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistemas`
--

CREATE TABLE `sistemas` (
  `sistemas_usados` int(5) NOT NULL,
  `sistema_preferido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sistemas`
--

INSERT INTO `sistemas` (`sistemas_usados`, `sistema_preferido`) VALUES
(1, 'ps4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Miguel Adão', '$2y$10$37Cavuxpap0P7qwJAYHUIudtPUxNCyXU2Rvi/fcEH/rje3X4X1MD2', '2020-06-01 16:36:57'),
(2, 'Miguel Teixeira', '$2y$10$VVArapcUoHQZbJbprMnyR.8eAvoiceWolwWAeweTdzEdqQZ891Tjy', '2020-06-01 22:35:57');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Índices para tabela `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`jogos_jogados`);

--
-- Índices para tabela `sistemas`
--
ALTER TABLE `sistemas`
  ADD PRIMARY KEY (`sistemas_usados`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `jogos_jogados` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `sistemas`
--
ALTER TABLE `sistemas`
  MODIFY `sistemas_usados` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
