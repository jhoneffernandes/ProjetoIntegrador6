-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Nov-2021 às 15:46
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pi6`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `message`, `name`) VALUES
(13, 'testando@gmail.com', 'Mais um teste', 'Testando 2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rooms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bathroom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_propertie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srcfile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `properties`
--

INSERT INTO `properties` (`id`, `title`, `description`, `price`, `address`, `city`, `rooms`, `bathroom`, `type_propertie`, `phone`, `srcfile`) VALUES
(107, 'Casa | Centro - Taquaritinga', 'Uma bela casa com muito espaço e bem localizada.', '180.000', 'Centro', 'Taquaritinga', '3', '2', 'Casa', '992630026', '../img/properties/78774621.jpg'),
(108, 'Casa | Laranjeiras - Taquaritinga', 'Uma casa moderna com muros altos e alta segurança.', '150.000', 'Laranjeiras', 'Taquaritinga', '5', '2', 'Casa', '92873332', '../img/properties/50626042.jpg'),
(109, 'Casa | Jardim Contendas - Taquaritinga', 'Casa com piscina e área de lazer, bem localizada e espaçosa.', '280.000', 'Jardim Contendas ', 'Taquaritinga', '6', '2', 'Casa', '92843336', '../img/properties/25520363.jpg'),
(110, 'Casa | Vila Romana - Taquaritinga', 'Casa de dois andares, com piscina e vegetação.', '200.000', 'Vila Romana', 'Taquaritinga', '4', '1', 'Casa', '92868332', '../img/properties/60793494.jpg'),
(111, 'Casa | Centro - Taquaritinga', 'Casa com garagem interna e externa, muros altos e bem localizada.', '230.000', 'Centro', 'Taquaritinga', '3', '1', 'Casa', '92868332', '../img/properties/89111005.jpg'),
(112, 'Casa | Centro - Taquaritinga', 'Casa de dois andares, vaga para 4 carros na garagem e com sacada.', '410.000', 'Centro', 'Taquaritinga', '4', '2', 'Casa', '92873332', '../img/properties/32120206.jpeg'),
(113, 'Casa | Laranjeiras 4 - Taquaritinga', 'Casa de dois andares, com vegetação e bem localizada..', '500.000', 'Laranjeiras 4', 'Taquaritinga', '8', '4', 'Casa', '92873332', '../img/properties/28428687.jpg'),
(115, 'Casa | Talavasso - Taquaritinga', 'Casa com piscina, hidromassagem e grande área externa.', '150.000', 'Talavasso', 'Taquaritinga', '5', '1', 'Casa', '92868332', '../img/properties/40260549.jpg'),
(116, 'Casa | Centro - Taquaritinga', 'Casa com piscina e área de lazer, bem localizada e espaçosa.', '150.000', 'Centro', 'Taquaritinga', '6', '2', 'Casa', '98228833', '../img/properties/52492878.jpg'),
(117, 'Casa | Maria Luisa 2 - Taquaritinga', 'Casa de dois andares, com vegetação, sacada e vaga para dois carros..', '180.000', 'Maria Luisa 2', 'Taquaritinga', '5', '2', 'Casa', '92843336', '../img/properties/535567010.jpg'),
(118, 'Casa | Centro - Taquaritinga', 'Casa com muros altos, cerca elétrica e bem segura.', '150.000', 'Centro ', 'Taquaritinga', '3', '1', 'Casa', '92873332', '../img/properties/301161111.jpg'),
(119, 'Casa | Laranjeiras - Taquaritinga', 'Casa segura com cerca elétrica e garagem com espaço para dois carros.', '280.000', 'Laranjeiras', 'Taquaritinga', '3', '1', 'Casa', '92868332', '../img/properties/679714312.png'),
(120, 'Apartamento | Centro - Taquaritinga', 'Apartamento mobiliado com sacada.', '180.000', 'Centro ', 'Taquaritinga', '4', '1', 'Apartamento', '92868332', '../img/properties/553075913.jpg'),
(121, 'Apartamento | Centro - Taquaritinga', 'Apartamento mobiliado com sacada, sala e cozinha acopladas.', '150.000', 'Centro', 'Taquaritinga', '5', '2', 'Apartamento', '98228833', '../img/properties/188517914.jpg'),
(122, 'Apartamento | Centro - Ribeirão Preto', 'Apartamento mobiliado com sacada.', '800', 'Centro', 'Ribeirão Preto', '4', '1', 'Apartamento', '92868332', '../img/properties/57615415.jpg'),
(123, 'Apartamento | Centro - Ribeirão Preto', 'Apartamento mobiliado com sacada, e portaria 24h.', '1.200', 'Centro ', 'Ribeirão Preto', '3', '1', 'Apartamento', '92868332', '../img/properties/712247116.png'),
(124, 'Apartamento | Campos Elísios - Ribeirão Preto', 'Apartamento sem mobília inclusa e portaria 24h.', '950', 'Campos Elísios', 'Ribeirão Preto', '3', '1', 'Apartamento', '92873332', '../img/properties/71657017.jpeg'),
(125, 'Apartamento | Alto da Boa Vista - Ribeirão Preto', 'Apartamento sem mobília inclusa e portaria 24h.', '1.700', 'Alto da Boa Vista', 'Ribeirão Preto', '5', '2', 'Apartamento', '92873332', '../img/properties/773896618.jpeg'),
(126, 'Apartamento | Nova Aliança - Ribeirão Preto', 'Apartamento com mobília inclusa e portaria 24h. ', '1.500', 'Nova Aliança', 'Ribeirão Preto', '2', '1', 'Apartamento', '92873332', '../img/properties/943526819.jpg'),
(127, 'Apartamento | Centro - Taquaritinga', 'Apartamento mobiliado com sacada.', '1.350', 'Centro', 'Taquaritinga', '4', '2', 'Apartamento', '92873332', '../img/properties/7125720.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
