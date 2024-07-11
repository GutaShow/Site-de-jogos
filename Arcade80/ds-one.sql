-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 23-Nov-2022 às 12:32
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ds-one`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `foto`
--

INSERT INTO `foto` (`id_foto`, `foto`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nvusuario`
--

CREATE TABLE `nvusuario` (
  `id_nvusuario` int(11) NOT NULL,
  `email_nvusuario` varchar(25) NOT NULL,
  `senha_nvusuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nvusuario`
--

INSERT INTO `nvusuario` (`id_nvusuario`, `email_nvusuario`, `senha_nvusuario`) VALUES
(1, 'adm@gmail.com', 'senha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pag` int(11) NOT NULL,
  `email_pag` varchar(40) NOT NULL,
  `nv_pag` varchar(1) NOT NULL,
  `email_user` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id_pag`, `email_pag`, `nv_pag`, `email_user`) VALUES
(59, 'dana@gmail.com', '2', 'dan@gmail.com'),
(60, 'dana@gmail.com', '3', 'dan@gmail.com'),
(61, 'dana@gmail.com', '1', 'dan@gmail.com'),
(62, '', '3', 'dan@gmail.com'),
(63, '', '2', 'dan@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `score`
--

CREATE TABLE `score` (
  `id_score` int(11) NOT NULL,
  `pontos` int(4) NOT NULL,
  `jogo` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(30) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `senha_user` varchar(20) NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fichas` int(15) NOT NULL,
  `pontos_user` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome_user`, `email_user`, `senha_user`, `foto`, `fichas`, `pontos_user`) VALUES
(30, 'dan', 'dan@gmail.com', '123', 'reigen-arataka.gif', 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Índices para tabela `nvusuario`
--
ALTER TABLE `nvusuario`
  ADD PRIMARY KEY (`id_nvusuario`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pag`);

--
-- Índices para tabela `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id_score`),
  ADD KEY `usuario_score` (`id_user`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `nvusuario`
--
ALTER TABLE `nvusuario`
  MODIFY `id_nvusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `score`
--
ALTER TABLE `score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `usuario_score` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
