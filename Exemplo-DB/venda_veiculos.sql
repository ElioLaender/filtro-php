-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 02-Mar-2017 às 22:20
-- Versão do servidor: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venda_veiculos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_carros`
--

CREATE TABLE `venda_carros` (
  `carros_id` int(11) NOT NULL,
  `carros_marca` varchar(10) NOT NULL,
  `carros_modelo` varchar(10) NOT NULL,
  `carros_ano` int(11) NOT NULL,
  `carros_valor` decimal(10,2) NOT NULL,
  `carros_cor` varchar(15) NOT NULL,
  `carros_final_placa` int(11) NOT NULL,
  `carros_qtd_portas` int(11) NOT NULL,
  `carros_qtd_valvulas` int(11) NOT NULL,
  `carros_qtd_cilindradas` int(11) NOT NULL,
  `carros_direcao` tinyint(1) NOT NULL,
  `carros_ar` tinyint(1) NOT NULL,
  `carros_vidro` tinyint(1) NOT NULL,
  `carros_teto_solar` tinyint(1) NOT NULL,
  `carros_trava` tinyint(1) NOT NULL,
  `carros_alarme` tinyint(1) NOT NULL,
  `carros_doc_pg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda_carros`
--

INSERT INTO `venda_carros` (`carros_id`, `carros_marca`, `carros_modelo`, `carros_ano`, `carros_valor`, `carros_cor`, `carros_final_placa`, `carros_qtd_portas`, `carros_qtd_valvulas`, `carros_qtd_cilindradas`, `carros_direcao`, `carros_ar`, `carros_vidro`, `carros_teto_solar`, `carros_trava`, `carros_alarme`, `carros_doc_pg`) VALUES
(2, 'Chevrolet', 'Celta', 2012, '11000.00', 'vermelho', 12, 2, 16, 1000, 1, 0, 2, 0, 1, 0, 1),
(3, 'Fiat', 'Palio', 2009, '14500.00', 'Branca', 5, 4, 16, 1800, 1, 1, 1, 1, 1, 1, 1),
(4, 'Chevrolet', 'S10', 2017, '115000.00', 'Branca', 7, 4, 16, 4100, 1, 1, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `venda_carros`
--
ALTER TABLE `venda_carros`
  ADD PRIMARY KEY (`carros_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `venda_carros`
--
ALTER TABLE `venda_carros`
  MODIFY `carros_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
