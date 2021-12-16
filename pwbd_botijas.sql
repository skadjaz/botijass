-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2021 às 13:44
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
-- Banco de dados: `pwbd_botijas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomenda`
--

CREATE TABLE `encomenda` (
  `id_encomenda` int(11) NOT NULL,
  `data_encomenda` date NOT NULL,
  `hora_encomenda` time NOT NULL,
  `produto` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `morada_entrega` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL DEFAULT 'pendente',
  `distribuidor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `encomenda`
--

INSERT INTO `encomenda` (`id_encomenda`, `data_encomenda`, `hora_encomenda`, `produto`, `id_utilizador`, `quantidade`, `morada_entrega`, `estado`, `distribuidor`) VALUES
(28, '2021-11-13', '22:30:00', 1, 7, 9, 'Rua da telma', 'pendente', ''),
(29, '2021-11-13', '22:27:00', 1, 7, 5, 'asdasd', 'pendente', ''),
(30, '2021-11-30', '23:09:00', 1, 6, 73, 'Rua do abess', 'pendente', ''),
(31, '2021-11-10', '23:08:00', 1, 7, 1, 'Rua da telma', 'pendente', ''),
(32, '2021-12-07', '05:07:00', 2, 6, 2, 'Rua do abel', 'pendente', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(30) NOT NULL,
  `peso` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `preco_entrega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `peso`, `preco`, `preco_entrega`) VALUES
(1, 'butano', 6, 12, 1),
(2, 'butano', 13, 26, 2),
(3, 'propano', 5, 11, 1),
(4, 'propano', 11, 24, 2),
(5, 'propano', 45, 95, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `stock`
--

INSERT INTO `stock` (`id_produto`, `quantidade`) VALUES
(1, 20),
(2, 20),
(3, 20),
(4, 20),
(5, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoutilizador`
--

CREATE TABLE `tipoutilizador` (
  `tipo_utilizador` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipoutilizador`
--

INSERT INTO `tipoutilizador` (`tipo_utilizador`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Cliente(Validação pendente)'),
(4, 'Distribuidor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `morada` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nr_telefone` int(9) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `tipo_utilizador` int(11) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`username`, `nome`, `morada`, `email`, `nr_telefone`, `datanascimento`, `tipo_utilizador`, `password`, `id_utilizador`) VALUES
('admin', 'Manuel Silva', 'Rua Manuel Silva', 'lc@gmail.com', 987452136, '2021-11-10', 1, '21232f297a57a5a743894a0e4a801fc3', 1),
('cliente', 'Tiago Costa', 'Rua do Tiago', 'tiago@tiago.com', 965231478, '2021-11-09', 2, '4983a0ab83ed86e0e7213c8783940193', 2),
('distribuidor', 'Osvaldo Fernandes', 'Rua do Osvaldo', 'rt@gmail.com', 987451236, '0000-00-00', 4, '4f6c070943bdd8ba71ae508fb34bfc4c', 3),
('afonso', 'afonso silva', 'Rua afonso', 'afonso@afonso', 965874123, '2021-11-17', 2, 'b0a8828bed9aaac367ae4bcafe5d7804', 4),
('luis', 'Luis Caio', 'Rua do luis', 'luis@caio.pt', 965874123, '2021-11-04', 2, '502ff82f7f1f8218dd41201fe4353687', 5),
('abel', 'Abel Caio', 'Rua do abel', 'Abel@abel.pt', 985471236, '2021-11-03', 2, 'a6cd39ee5b1d8276f6bc716b3f7881b7', 6),
('telma', 'Telma Gomes', 'Rua da telma', 'telma@telma.com', 965847123, '2021-11-13', 2, 'c58deab8ff74f5a40321e8e6b2b1e5e5', 7),
('afonso', 'awdasdasd', 'Rua do abel', 'asdasd@asdsa.pt', 123123123, '2021-11-03', 2, 'b0a8828bed9aaac367ae4bcafe5d7804', 8);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `encomenda`
--
ALTER TABLE `encomenda`
  ADD PRIMARY KEY (`id_encomenda`),
  ADD KEY `encomenda_utilizador_fk` (`id_utilizador`),
  ADD KEY `encomenda_produto_fk` (`produto`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  ADD PRIMARY KEY (`tipo_utilizador`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id_utilizador`),
  ADD KEY `tipo_utilizador` (`tipo_utilizador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `encomenda`
--
ALTER TABLE `encomenda`
  MODIFY `id_encomenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `encomenda`
--
ALTER TABLE `encomenda`
  ADD CONSTRAINT `encomenda_produto_fk` FOREIGN KEY (`produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `encomenda_utilizador_fk` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`);

--
-- Limitadores para a tabela `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_produto_fk` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `tipo_utilizador_utilizador_fk` FOREIGN KEY (`tipo_utilizador`) REFERENCES `tipoutilizador` (`tipo_utilizador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
