-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 12:06 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--
CREATE DATABASE IF NOT EXISTS `agenda` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `agenda`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cidades`
--

CREATE TABLE `tbl_cidades` (
  `id` int(11) NOT NULL,
  `nome_cidade` varchar(60) NOT NULL,
  `estado` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contatos`
--

CREATE TABLE `tbl_contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `nro_endereco` int(11) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade_id` int(11) NOT NULL,
  `cep` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_telefones`
--

CREATE TABLE `tbl_telefones` (
  `id` int(11) NOT NULL,
  `contato_id` int(11) NOT NULL,
  `tipo_telefone` varchar(11) NOT NULL,
  `nro_telefone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cidades`
--
ALTER TABLE `tbl_cidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contatos`
--
ALTER TABLE `tbl_contatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_contatos_tbl_cidades_idx` (`cidade_id`);

--
-- Indexes for table `tbl_telefones`
--
ALTER TABLE `tbl_telefones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_telefones_tbl_contatos1_idx` (`contato_id`);

--
-- Indexes for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cidades`
--
ALTER TABLE `tbl_cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contatos`
--
ALTER TABLE `tbl_contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_telefones`
--
ALTER TABLE `tbl_telefones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_contatos`
--
ALTER TABLE `tbl_contatos`
  ADD CONSTRAINT `fk_tbl_contatos_tbl_cidades` FOREIGN KEY (`cidade_id`) REFERENCES `tbl_cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_telefones`
--
ALTER TABLE `tbl_telefones`
  ADD CONSTRAINT `fk_tbl_telefones_tbl_contatos1` FOREIGN KEY (`contato_id`) REFERENCES `tbl_contatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
