-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jun-2017 às 20:12
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `valemobi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercadoria`
--

CREATE TABLE `mercadoria` (
  `codigo` varchar(5) COLLATE utf8_bin NOT NULL,
  `tipo_mercadoria` varchar(50) COLLATE utf8_bin NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float NOT NULL,
  `tipo_negocio` varchar(6) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `mercadoria`
--

INSERT INTO `mercadoria` (`codigo`, `tipo_mercadoria`, `nome`, `quantidade`, `preco`, `tipo_negocio`) VALUES
('COD01', 'Brinquedo', 'Brinquedo do Homem de Ferro', 100, 15.9, 'Venda'),
('COD02', 'Telefonia', 'Moto X Style', 1, 2000, 'Compra'),
('COD03', 'Notebook', 'Notebook Samsung Intel Core i3 4gb RAM', 1, 1600, 'Compra'),
('COD04', 'Telefonia', 'Moto G4 Plus', 200, 1400, 'Venda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `operacao`
--

CREATE TABLE `operacao` (
  `id` int(11) NOT NULL,
  `codigo_mercadoria` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `operacao`
--

INSERT INTO `operacao` (`id`, `codigo_mercadoria`) VALUES
(1, 'COD01'),
(2, 'COD01'),
(5, 'COD01'),
(6, 'COD01'),
(7, 'COD01'),
(9, 'COD01'),
(10, 'COD01'),
(11, 'COD01'),
(8, 'COD02'),
(3, 'COD03'),
(12, 'COD03'),
(13, 'COD03'),
(4, 'COD04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mercadoria`
--
ALTER TABLE `mercadoria`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `operacao`
--
ALTER TABLE `operacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo_mercadoria` (`codigo_mercadoria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `operacao`
--
ALTER TABLE `operacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `operacao`
--
ALTER TABLE `operacao`
  ADD CONSTRAINT `operacao_ibfk_1` FOREIGN KEY (`codigo_mercadoria`) REFERENCES `mercadoria` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
