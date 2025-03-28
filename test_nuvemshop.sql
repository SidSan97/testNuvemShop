-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Mar-2025 às 05:24
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test_nuvemshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `estoque`, `created_at`) VALUES
(1, 'Tablet', 'Tablet Multilaser de ultima geração', 500.00, 155, '2025-03-28 00:26:11'),
(2, 'Galaxy A01', 'O Samsung Galaxy A01 é um smartphone Android completo, que não tem muito a invejar aos mais avançados dispositivos. Tem uma enorme tela Touchscreen de 5.7 polegadas com uma resolução de 1520x720 pixel. Quanto às funções, no Samsung Galaxy A01 realmente não falta nada. Começando pelo conectividade Wi-fi e GPS. A transferência de dados e navegação web sao fornecidas pela rede UMTS, mas não suporta tecnologias mais recentes, tais como HSDPA. Enfatizamos a boa memória interna de 32 GB com a possibilidade de expansão', 699.00, 100, '2025-03-28 00:46:29'),
(3, 'Mouse Logitech', 'Mouse de primeiro mundo', 100.00, 500, '2025-03-28 08:12:44'),
(4, 'WebCam', 'Full HD', 25.00, 80, '2025-03-28 08:15:40');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
