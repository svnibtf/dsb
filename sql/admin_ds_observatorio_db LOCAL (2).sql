-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 10-Jun-2018 às 20:24
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_ds_observatorio_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_obs`
--

CREATE TABLE `dados_obs` (
  `dbo_id` int(11) NOT NULL,
  `dbo_tit` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_autor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_user_id_insert` int(11) NOT NULL DEFAULT '0',
  `dbo_liberado` tinyint(4) NOT NULL DEFAULT '0',
  `dbo_estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_descricao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `dbo_aluno_inn` tinyint(4) NOT NULL DEFAULT '0',
  `dbo_time_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dbo_nome_post` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `dbo_deletado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `cod_estados` int(11) DEFAULT NULL,
  `sigla` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(72) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`cod_estados`, `sigla`, `estado`) VALUES
(1, 'AC', 'ACRE'),
(2, 'AL', 'ALAGOAS'),
(3, 'AP', 'AMAPÁ'),
(4, 'AM', 'AMAZONAS'),
(5, 'BA', 'BAHIA'),
(6, 'CE', 'CEARÁ'),
(7, 'DF', 'DISTRITO FEDERAL'),
(8, 'ES', 'ESPÍRITO SANTO'),
(9, 'RR', 'RORAIMA'),
(10, 'GO', 'GOIÁS'),
(11, 'MA', 'MARANHÃO'),
(12, 'MT', 'MATO GROSSO'),
(13, 'MS', 'MATO GROSSO DO SUL'),
(14, 'MG', 'MINAS GERAIS'),
(15, 'PA', 'PARÁ'),
(16, 'PB', 'PARAÍBA'),
(17, 'PR', 'PARANÁ'),
(18, 'PE', 'PERNAMBUCO'),
(19, 'PI', 'PIAUÍ'),
(20, 'RJ', 'RIO DE JANEIRO'),
(21, 'RN', 'RIO GRANDE DO NORTE'),
(22, 'RS', 'RIO GRANDE DO SUL'),
(23, 'RO', 'RONDÔNIA'),
(24, 'TO', 'TOCANTINS'),
(25, 'SC', 'SANTA CATARINA'),
(26, 'SP', 'SÃO PAULO'),
(27, 'SE', 'SERGIPE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nick` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Aluno',
  `sobrenome` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Sobrenome',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissao_id` int(11) NOT NULL DEFAULT '10',
  `responsavel` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `first` tinyint(4) NOT NULL DEFAULT '0',
  `deletado` int(2) NOT NULL DEFAULT '0',
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ativado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `nome`, `sobrenome`, `email`, `senha`, `permissao_id`, `responsavel`, `avatar`, `first`, `deletado`, `code`, `ativado`) VALUES
(1, NULL, 'Hamilton', 'Silva', 'hsfradinho@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 10, 0, '0', 0, 0, '0', 0),
(100, NULL, 'Teste Ramos Coimbra', '0', 'teste@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 10, 0, '0', 1, 0, '0', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_dados_pessoais`
--

CREATE TABLE `usuarios_dados_pessoais` (
  `udp_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `end_inicial` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `cid_inicial` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `genero` int(11) NOT NULL,
  `gaming` tinyint(4) NOT NULL DEFAULT '0',
  `data_acesso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_acesso_inicial` datetime NOT NULL,
  `info_inicial` int(11) NOT NULL DEFAULT '0',
  `end_rua` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Endereço',
  `end_num` int(11) NOT NULL DEFAULT '0',
  `end_compl` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Compl',
  `pais` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Brasil',
  `estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Estado',
  `municipio` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Municipio',
  `tel_cel` varchar(13) COLLATE utf8_unicode_ci DEFAULT '0',
  `tel_com` varchar(13) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `data_nasc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `end_cep` int(8) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Dados pessoais';

--
-- Extraindo dados da tabela `usuarios_dados_pessoais`
--

INSERT INTO `usuarios_dados_pessoais` (`udp_id`, `usuario_id`, `end_inicial`, `cid_inicial`, `genero`, `gaming`, `data_acesso`, `data_acesso_inicial`, `info_inicial`, `end_rua`, `end_num`, `end_compl`, `pais`, `estado`, `municipio`, `tel_cel`, `tel_com`, `data_nasc`, `end_cep`) VALUES
(1, 1, '0', '0', 0, 0, '2018-06-09 14:49:36', '2018-06-07 13:12:10', 0, 'Endereço', 0, 'Compl', 'Brasil', 'Estado', 'Municipio', '0', '0', '', 0),
(2, 100, '0', '0', 0, 0, '2018-06-09 14:49:36', '2018-06-07 13:12:10', 0, 'Endereço', 0, 'Compl', 'Brasil', 'Estado', 'Municipio', '0', '0', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dados_obs`
--
ALTER TABLE `dados_obs`
  ADD PRIMARY KEY (`dbo_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_dados_pessoais`
--
ALTER TABLE `usuarios_dados_pessoais`
  ADD PRIMARY KEY (`udp_id`),
  ADD UNIQUE KEY `usu_id` (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dados_obs`
--
ALTER TABLE `dados_obs`
  MODIFY `dbo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `usuarios_dados_pessoais`
--
ALTER TABLE `usuarios_dados_pessoais`
  MODIFY `udp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
