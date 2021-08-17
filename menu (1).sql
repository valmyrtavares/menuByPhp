-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Ago-2021 às 22:46
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `menu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `inprogress` tinyint(4) NOT NULL,
  `total` int(11) NOT NULL,
  `table` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `customer`
--

CREATE TABLE `customer` (
  `idcustumer` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `request` int(11) DEFAULT NULL,
  `amountarrivals` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `customer`
--

INSERT INTO `customer` (`idcustumer`, `name`, `phone`, `email`, `birthdate`, `type`, `request`, `amountarrivals`, `date`) VALUES
(1, 'Valmyr Tavares', '(11)99642-4111', 'valmyr@valmyr.com', '1971-01-22', NULL, NULL, NULL, '0000-00-00'),
(2, 'Juliana Mozart', '(11)99167-4642', 'juliana@mozart.com', '1976-12-30', NULL, NULL, NULL, '0000-00-00'),
(3, 'Alice Mozart', '(11)33443-3223', 'alice@allice.com', '2004-04-30', NULL, NULL, NULL, '0000-00-00'),
(4, 'Edson Ferreira', '(11)93434-4342', 'edson@fereira.com', '2004-04-30', NULL, NULL, NULL, '0000-00-00'),
(5, 'Desconhecido', '', '', '0000-00-00', NULL, NULL, NULL, '0000-00-00'),
(6, 'Desconhecido', '', '', '0000-00-00', NULL, NULL, NULL, '0000-00-00'),
(7, 'Desconhecido', '', '', '0000-00-00', NULL, NULL, NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(150) NOT NULL,
  `img` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `showcase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `title`, `subtitle`, `img`, `type`, `price`, `showcase`) VALUES
(42, 'Risoto ao molho Presto', 'Esse é gostoso pra valer', '94c1fd772318f66a441be444b186cbc7.jpg', 'pratos', 34, 1),
(43, 'X Salada Italiana do bem', 'Serve muito bem um cliente faminto', '8feb24021f548ae2bd7d1247ff19143b.jpg', 'lanches', 23, 1),
(45, 'Prato do dia', 'serve bem duas pessoas', '0db542d05f8908264fccc54c5177a7f5.jpg', 'pratos', 23, 1),
(46, 'Marguerita', 'Beba com sal nas bordas', '0e738504cb012229eecb605ae0941a4e.jpg', 'bebidas', 34, 1),
(47, 'Risoto de Tomate Fresco', 'Que blz', '55098e3162ee6b53b77f033fbec7e6b1.jpg', 'pratos', 44, 1),
(48, 'X egg', 'Serve bem alguém faminto', 'fa18512b5d75f97cf6c5421186811289.jpg', 'lanches', 33, 1),
(49, 'Manhattan', 'Beba gelado 23% de alcool', '1596402d8a66e91482ac519a1895dfaf.jpg', 'bebidas', 33, 1),
(50, 'Cação Empanado', 'Serve bem duas pessoas', 'b903c18dbd36bb4631904c65c578c1d0.jpg', 'porcoes', 23, 1),
(51, 'Batata Frinta', 'Serve uma pessoa', '7322ce04c3c750dc17a71f6cfb759719.jpg', 'porcoes', 13, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `table` int(11) NOT NULL,
  `id_customer` int(100) NOT NULL,
  `id_product` int(100) NOT NULL,
  `attendance_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `store` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `store`, `email`, `type`, `password`, `cover`, `token`) VALUES
(1, 'Valmyr', 'Sampa', 'juliana@juliana.com', 'admin', '$2y$10$i6oVKv6zEI2qpfVBYGeDTOgXOwxSU00P/kz9rA6jH83lBxhuPaLdO', '', 'a7e0e2b2c2cf7c958563d9fe818f63486398'),
(3, 'Valmyr', 'Sampa', 'juliana@xutz.com', 'admin', '$2y$10$vgaNHicOm/KPqZzficlXUuS0upSZQ9kCtGRurPdb0jbFE3ZNOg7Pa', '', '83dbce4c84f950351d8cd1672227ef694780'),
(4, 'Valmyr', 'Florença', 'antonio@vivaldi.com', 'admin', '$2y$10$BWU1NbWICuar6tT7O9HJxeXJqmdn6KPAtKnqHpTJyRZC1ghfj2iO6', '67ca003003e5131045bdd5381a509885.jpg', '3cb3b1e14268ce95a807c63fc648cff29641'),
(5, 'Valmyr', 'sampa', 'juliana@vagner.com', 'funcionario', '$2y$10$A7zuiInIfefuJCLQgPt28OCR8148jSNG7j/TxuCe9jxzdjSWeoreS', 'semimagem', 'fecdb050a0f6d137699d2968575258a87475');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustumer`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
