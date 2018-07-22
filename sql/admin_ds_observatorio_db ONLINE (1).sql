-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: robb0254.publiccloud.com.br:3306
-- Generation Time: 08-Jul-2018 às 09:35
-- Versão do servidor: 5.6.35-81.0-log
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institutoibtf1_ds_observatorio_db`
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

--
-- Extraindo dados da tabela `dados_obs`
--

INSERT INTO `dados_obs` (`dbo_id`, `dbo_tit`, `dbo_autor`, `dbo_user_id_insert`, `dbo_liberado`, `dbo_estado`, `dbo_cidade`, `dbo_link`, `dbo_descricao`, `dbo_aluno_inn`, `dbo_time_in`, `dbo_nome_post`, `dbo_deletado`) VALUES
(1, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'www.mundodomarketing.com.br', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/oAiE2J ', 'Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 13:18:07', '0', 0),
(2, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Portal Comunique-se', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/tXxexX', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:10:12', '0', 0),
(3, 'Constelações Familiares E Direito Sistêmico São Temas De Congresso Em SP', 'Dino - Divulgador de Notícias', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/Ln8hHR', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:12:16', '0', 0),
(4, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Portal Pacote de Férias', 1, 1, 'SP', 'NÃO DECLARADA', 'https://goo.gl/vq87hy', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:14:24', '0', 0),
(5, 'Constelações familiares e direito sistêmico são temas de congresso em SP  Leia mais em: https://www.folhageral.com/#ixzz5It9UUy5K', 'Folha Geral', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/oYTWZp', 'Matéria sobre o Congresso Internacional de Direito Sistêmico ', 1, '2018-06-19 16:16:39', '0', 0),
(6, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Portal Dicas BH', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/Zvj6jX', 'Matéria Sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:21:02', '0', 0),
(7, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Eldo Gomes', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/S9vYHG', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico ', 1, '2018-06-19 16:22:39', '0', 0),
(8, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Notícias Populares', 1, 1, 'SP', 'SÃO PAULO', 'http://amsoldera.blogspot.com/p/noticias-dino.html?title=constelacoes-familiares-e-direito-sistemico-sao-temas-de-congresso-em-sp&partnerid=15&releaseId=165758', 'Divulgação do Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:26:19', '0', 0),
(9, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Blog Gente Atual', 1, 1, 'SP', 'NÃO DECLARADA', 'https://goo.gl/iBXKuM', 'Divulgação sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:27:37', '0', 0),
(10, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'MT em destaque', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/cuuZv2', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico\n', 1, '2018-06-19 16:29:32', '0', 0),
(11, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Diário de Canindé', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/d5xUN8', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:30:54', '0', 0),
(12, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Blog Dino', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/Z6oA4s', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:33:46', '0', 0),
(13, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Blog Llaranja\'s', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/yDHZGw', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:35:41', '0', 0),
(14, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'sobreisso.com', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/T7wqqj', 'Divulgação sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:38:46', '0', 0),
(15, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Portal Pacote Turismo', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/xbZseh', 'Divulgação Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:40:51', '0', 0),
(16, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Portal Fazer Como', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/RpvyR6', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:43:01', '0', 0),
(17, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Hotel e Praia', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/YrJK14', 'Matéria Sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:44:50', '0', 0),
(18, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Sobre promoção', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/RBQbvT', 'Matéria Sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:47:16', '0', 0),
(19, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Por Dentro de Minas', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/D5mmYB', 'Divulgação sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:52:35', '0', 0),
(20, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Cha Matchá', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/jSpQDq', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:54:12', '0', 0),
(21, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Doutor TV', 1, 1, 'SP', 'SÃO PAULO', '- https://goo.gl/Mp7dNe', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:56:31', '0', 0),
(22, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Três Pátrias', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/p1y7Xx', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 16:58:05', '0', 0),
(23, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Fashioon for Girl', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/Emqkgh', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 17:01:54', '0', 0),
(24, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Go Work', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/Yr3KfU', 'Matéria sobre o Congresso internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 17:03:20', '0', 0),
(25, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Cobizz', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/pnwP2o', 'Divulgação sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 17:04:59', '0', 0),
(26, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'MG Turismo', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/wruzUs', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 17:06:48', '0', 0),
(27, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Jornal Metrópole', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/HoQ2An', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 17:09:46', '0', 0),
(28, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'A Voz de Santa Quitéria ', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/6Ubrur', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 17:11:20', '0', 0),
(29, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Falando de Gestão ', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/eiwwpE', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 17:12:25', '0', 0),
(30, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Falando da Notícia ', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/ggh7sg', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 17:13:17', '0', 0),
(31, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Models Brasil ', 1, 1, 'SP', 'SÃO PAULO', '- https://goo.gl/vSGXwz', '\nMatéria sobre o Congresso Internacional Hellinger de Direito Sistêmico\n', 1, '2018-06-19 17:14:37', '0', 0),
(32, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Notícias Alagoas ', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/equtrH', '\nMatéria sobre o Congresso Internacional Hellinger de Direito Sistêmico\n', 1, '2018-06-19 17:15:25', '0', 0),
(33, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'V de Vininha - ', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/fNTKcf', '\nMatéria sobre o Congresso Internacional Hellinger de Direito Sistêmico\n', 1, '2018-06-19 17:16:20', '0', 0),
(34, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Jornal de Humaita ', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/dqAz7G', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 17:17:20', '0', 0),
(35, 'Constelações familiares e direito sistêmico são temas de congresso em SP', 'Gazeta Brasília ', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/mPaE9k', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 17:18:01', '0', 0),
(36, 'Congresso Internacional recebe especialistas em Direito Sistêmico', 'Portal Terra', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/nUjxoH', '\nMatéria sobre o Congresso Internacional Hellinger de Direito Sistêmico\n', 1, '2018-06-19 17:19:33', '0', 0),
(37, 'Congresso Internacional recebe especialistas em Direito Sistêmico', 'InfoMoney', 1, 1, 'SP', 'SÃO PAULO', 'https://goo.gl/JsEJs1', 'Matéria sobre o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 17:20:32', '0', 0),
(38, 'Constelação Familiar\" ajuda a humanizar práticas de conciliação no Judiciário', 'www.cnj.jus.br', 1, 1, 'DF', 'NÃO DECLARADA', 'http://www.cnj.jus.br/noticias/cnj/83766-constelacao-familiar-ajuda-humanizar-praticas-de-conciliacao-no-judiciario-2', 'Matéria sobre a pratica das constelações no judiciário ', 1, '2018-06-19 17:23:27', '0', 0),
(39, 'Constelação Familiar: no firmamento da Justiça em 16 Estados e no DF', 'http://www.cnj.jus.br/', 1, 1, 'BA', 'NÃO DECLARADA', 'http://www.cnj.jus.br/noticias/cnj/86434-constelacao-familiar-no-firmamento-da-justica-em-16-estados-e-no-df', 'Tribunal da Bahia adota vivência de constelação familiar. ', 1, '2018-06-19 17:25:43', '0', 0),
(40, 'Aplicação da constelação familiar no Judiciário', 'JT da TV', 1, 1, 'SC', 'NÃO DECLARADA', 'https://www.youtube.com/watch?v=DdxawzswkJA', 'Video sobre a aplicação da constelação familiar no Judiciário', 1, '2018-06-19 17:27:22', '0', 0),
(41, 'Direito sistêmico: impactos psicossociais da constelação familiar no Judiciário', 'http://www.conteudojuridico.com.br/', 1, 1, 'DF', 'NÃO DECLARADA', 'http://www.conteudojuridico.com.br/artigo,direito-sistemico-impactos-psicossociais-da-constelacao-familiar-no-judiciario,590845.html', 'Artigo sobre impacto das constelações no judiciário', 1, '2018-06-19 17:30:46', '0', 0),
(42, 'Constelação Familiar: terapia em grupo facilita acordos, reduz processos e humaniza o judiciário', 'http://justificando.cartacapital.com.br/', 1, 1, 'DF', 'NÃO DECLARADA', 'http://justificando.cartacapital.com.br/2018/06/04/constelacao-familiar-terapia-em-grupo-facilita-acordos-reduz-processos-e-humaniza-o-judiciario/', 'Reportagem sobre como terapia em grupo facilita acordos, reduz processos e humaniza o judiciário', 1, '2018-06-19 17:32:54', '0', 0),
(43, 'CNJ Estimula a Prática de Constelação Familiar para Resolver Conflitos', 'Jornal da Justiça', 1, 1, 'DF', 'NÃO DECLARADA', 'https://www.youtube.com/watch?v=0NJ843z-7_Y', 'Conselho Nacional de Justiça estimula práticas no Poder Judiciário para resolver conflitos. Uma delas é a Constelação Familiar, que já está sendo utilizada na maioria dos estados brasileiros.', 1, '2018-06-19 17:34:38', '0', 0),
(44, 'Constelação pacifica conflitos de família no Judiciário', 'CNJ - http://www.cnj.jus.br/', 1, 1, 'DF', 'NÃO DECLARADA', 'http://www.cnj.jus.br/noticias/cnj/86659-constelacao-pacifica-conflitos-de-familia-no-judiciario', 'Artigo sobre resolução pacifica devconflitos de família no Judiciário', 1, '2018-06-19 17:39:17', '0', 0),
(45, 'TJGO é premiado por mediação baseada na técnica de constelação familiar', 'http://www.cnj.jus.br/', 1, 1, 'GO', 'NÃO DECLARADA', 'http://www.cnj.jus.br/noticias/cnj/79702-tjgo-e-premiado-por-mediacao-baseada-na-tecnica-de-constelacao-familiar', 'O Projeto de Mediação Familiar, rendeu ao Tribunal de Justiça do Estado de Goiás (TJGO) o primeiro lugar na categoria Tribunal Estadual do V Prêmio Conciliar é Legal, do Conselho Nacional de Justiça (CNJ)', 1, '2018-06-19 17:41:24', '0', 0),
(46, 'Juízes empregam \"constelação familiar\" para tratar vícios e recuperar presos', 'http://www.cnj.jus.br/', 1, 1, 'SC', 'NÃO DECLARADA', 'http://www.cnj.jus.br/noticias/cnj/86637-juizes-empregam-constelacao-familiar-para-tratar-vicios-e-recuperar-presos', 'Em Santa Catarina a constelação familiar vem sendo usada entre presos com problemas com drogas e que tenham conflitos familiares.', 1, '2018-06-19 17:43:03', '0', 0),
(47, 'Direito Sistêmico mostra força e múltiplas possibilidades no Conselho da Justiça Federal', 'Sami Storch - www.direitosistemico.wordpress.com', 1, 1, 'DF', 'NÃO DECLARADA', 'https://direitosistemico.wordpress.com/2018/04/18/direito-sistemico-mostra-forca-e-multiplas-possibilidades-no-conselho-da-justica-federal/', 'Matéria sobre o Workshop Inovações na Justiça: O Direito Sistêmico como meio de Solução Pacífica de Conflitos”, realizado em 12/4/2018 no Conselho da Justiça Federal', 1, '2018-06-19 17:45:26', '0', 0),
(48, 'Constelação Familiar\" no cárcere: semente para uma Justiça melhor', 'http://cnj.jus.br/', 1, 1, 'RO', 'NÃO DECLARADA', 'http://cnj.jus.br/noticias/cnj/86571-constelacao-familiar-no-carcere-semente-para-uma-justica-melhor-constelacao-familiar-no-carcere-semente-para-uma-justica-melhor', 'Terapia é oferecida pela ONG Acuda desde 2001 aos detentos de Rondônia.', 1, '2018-06-19 17:47:05', '0', 0),
(49, 'Constelações Familiares no Cárcere - NUPEMEC', ' Conselho Nacional de Justiça (CNJ)', 1, 1, 'AP', 'NÃO DECLARADA', 'https://www.youtube.com/watch?time_continue=22&v=g2fM4fdqTCI', 'Video sobre Constelações Familiares no Cárcere - NUPEMEC Amapá', 1, '2018-06-19 17:49:48', '0', 0),
(50, 'Constelação familiar é usada por pesquisadores em SC para tratar vícios e recuperar presos', 'g1.globo.com', 1, 1, 'SC', 'NÃO DECLARADA', ' https://g1.globo.com/sc/santa-catarina/noticia/constelacao-familiar-e-usada-por-pesquisadores-em-sc-para-tratar-vicios-e-recuperar-presos.ghtml', 'Reportagem sobre como pesquisadores aplicaram o método terapêutico envolvendo pelo menos 30 detentos do regime aberto em SC.', 1, '2018-06-19 17:51:35', '0', 0),
(51, 'Reportagem Globo sobre o uso de terapias alternativas na mediação de conflitos no judiciário', 'Rede Globo', 1, 1, 'BA', 'ITABUNA', 'https://www.youtube.com/watch?v=5vOlJiaEd2s&feature=youtu.be', 'Reportagem que foi ao ar no fantástico sobre o uso de terapias alternativas na mediação de conflitos no judiciário', 1, '2018-06-19 17:56:22', '0', 0),
(52, 'Além do Direito: o impacto das leis sistêmicas em outras áreas', 'blog.hellingerinnovare.com.br / Comunica Mag', 1, 1, 'SP', 'SÃO PAULO', 'https://blog.hellingerinnovare.com.br/?p=44', 'Artigo sobre os efeitos positivos da terapia das constelações na psicologia, na educação e nos negócios', 1, '2018-06-19 18:09:26', '0', 0),
(53, 'Constelações familiares e a resolução de conflitos por Marcos de Castro', 'blog.hellingerinnovare.com.br / Marcos de Castro', 1, 1, 'SP', 'NÃO DECLARADA', 'blog.hellingerinnovare.com.br/?p=54', 'Artigo escrito por  Marcos de Castro, p traz uma visão incrível sobre as Constelações e a aplicação na resolução de conflitos na Justiça', 1, '2018-06-19 18:13:40', '0', 0),
(54, 'Inovações na justiça e as oportunidades de conhecimento de métodos alternativos para solução de conflitos', 'blog.hellingerinnovare.com.br / Aline Mota', 1, 1, 'DF', 'NÃO DECLARADA', 'https://blog.hellingerinnovare.com.br/?p=65', 'Entrevista de Aline Mendes, concedida ao CJF sobre o workshop Inovações na Justiça: o Direito Sistêmico como Meio de Solução Pacífica de Conflitos, que aconteceu em abril desse ano em Brasília,', 1, '2018-06-19 18:16:35', '0', 0),
(55, 'As ordens do amor – Pertencimento', 'blog.hellingerinnovare.com.br / Stimulo Bureau', 1, 1, 'SP', 'SÃO PAULO', 'https://blog.hellingerinnovare.com.br/?p=80', 'Artigo sobre uma das leis sistêmicas de Bert Hellinger - Pertencimento', 1, '2018-06-19 18:19:45', '0', 0),
(56, 'Constelação Familiar: no firmamento da Justiça em 16 Estados e no DF', 'Comissão da jovem advocacia OAB SP', 1, 1, 'SP', 'SÃO PAULO', 'https://www.facebook.com/comissaodojovemadvogadosp/videos/1867348733324058/', 'Video - palavras do Presidente da Comissão da Jovem Advocacia na abertura do Simpósio: Direito Sistêmico - Um novo olhar para a prática da advocacia.', 1, '2018-06-19 18:26:24', '0', 0),
(57, 'Pará poderá ser o primeiro Estado da Federação a Institucionalizar por lei a Constelação Familiar como ferramenta de resolução de conflitos.', 'Justiça News', 1, 1, 'PA', 'NÃO DECLARADA', 'http://www.justicanews.com.br/para-podera-ser-o-primeiro-estado-da-federacao-a-institucionalizar-por-lei-a-constelacao-familiar-como-ferramenta-de-resolucao-de-conflitos/', 'Artigo sobre o Pará poder Institucionalizar por lei a Constelação Familiar como ferramenta de resolução de conflitos', 1, '2018-06-19 18:45:39', '0', 0),
(58, 'Terapia em grupo ajuda a resolver conflitos na justiça', 'Rede Globo', 1, 1, 'SP', 'NÃO DECLARADA', 'https://globoplay.globo.com/v/6814602/?utm_source=whatsapp&utm_medium=share-bar', 'Matéria veiculada no SPTV 2 - Globo sobre Constelação na Justiça em SP ', 1, '2018-06-19 18:53:01', '0', 0),
(59, 'OAB Tatuapé será homenageada no 1o Congresso Internacional Hellinger de Direito Sistêmico', 'blog.hellingerinnovare.com.br', 1, 1, 'SP', 'SÃO PAULO', 'blog.hellingerinnovare.com.br/?p=85', 'Artigo - OAB Tatuapé será homenageada no 1o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-19 18:59:10', '0', 0),
(60, 'Sueli Pini e os projetos de solução pacífica de conflitos no Macapá', 'blog.hellingerinnovare.com.br / Sueli Pereira Pini ', 1, 1, 'AP', 'NÃO DECLARADA', 'blog.hellingerinnovare.com.br/?p=88', 'Artigo sobre os projetos de solução pacífica de conflitos promovidos pelo IAPEN – Instituto de Administração Penitenciária no Amapá', 1, '2018-06-19 19:21:40', '0', 0),
(61, 'Entrevista sobre direito sistêmico ', 'De Bem com a Vida do canal D+TV', 1, 1, 'SP', 'NÃO DECLARADA', 'https://lnkd.in/dAmT9QZ', 'Entrevista concedida pelo professor Lúcio de Oliveira, diretor de pós graduação da faculdade Innovare, ao programa De Bem com a Vida do canal D+TV, falando sobre direito sistêmico e sua aplicação no sistema judiciário brasileiro. ', 1, '2018-06-19 19:40:07', '0', 0),
(62, 'Entrevista  Simone Arrojo e Sophie Hellinger naR Rádio Mundial', 'Radio Mundial', 1, 1, 'SP', 'NÃO DECLARADA', 'https://youtu.be/JYQx_e9euf8', 'Video - Entrevista no programa Virando a Página -  Simone Arrojo e Sophie Hellinger veiculada em 20/06/2018 \n', 1, '2018-06-21 13:04:45', '0', 0),
(63, 'Brasil recebe 1º Congresso Internacional sobre constelações familiares', 'Portal Metropole', 1, 1, 'SP', 'NÃO DECLARADA', 'https://www.metropoles.com/brasil/brasil-recebe-1o-congresso-internacional-sobre-constelacoes-familiares', 'Material divulgando o 1o Congresso Internacional Hellinger de Direito Sistêmico', 1, '2018-06-21 13:06:34', '0', 0),
(64, 'A outra ousadia do RH da GE – Constelações Organizacionais', 'Por José Luiz Weiss - EXAME', 110, 0, 'SP', 'NÃO DECLARADA', 'https://exame.abril.com.br/blog/gestao-fora-da-caixa/a-outra-ousadia-do-rh-da-ge-constelacoes-organizacionais/?utm_source=whatsapp', 'A GE é uma empresa centenária de sucesso que ao longo de sua história inventou coisas fundamentais para humanidade, assim como Thomas Edson fez com a lâmpada. Ana Lúcia Caltabiano, VP de RH da GE para América Latina, disse que: “Buscar novas possibilidades e explorar o desconhecido está no DNA da GE e na área temos trabalhado em várias frentes, quebrando alguns paradigmas para humanizar mais a empresa.', 1, '2018-07-08 03:36:17', '0', 0),
(65, 'Constelação Familiares e Judiciário: reflexões positivas', 'Sami Storch - Jornal Carta Forense', 110, 0, 'SP', 'NÃO DECLARADA', 'http://www.cartaforense.com.br/m/conteudo/artigos/constelacao-familiares-e-judiciario-reflexoes-positivas/18232', 'A conciliação no âmbito judicial se encontra instituída na legislação brasileira há bastante tempo, é  aplicada nas causas cíveis em geral e, com maior ênfase, naquelas relativas à vara de família e nas de menor complexidade, sujeitas ao rito previsto na Lei nº 9.099/95; também para o tratamento relativo aos crimes de menor potencial ofensivo, a mesma lei prevê a composição civil dos danos como forma de resolver conflitos evitando-se a instauração de uma ação penal...', 1, '2018-07-08 03:46:20', '0', 0);

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
  `emailvalidado` tinyint(4) NOT NULL DEFAULT '0',
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissao_id` int(11) NOT NULL DEFAULT '10',
  `responsavel` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `first` tinyint(4) NOT NULL DEFAULT '0',
  `ativado` tinyint(4) NOT NULL DEFAULT '0',
  `date_in` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `deletado` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `nome`, `sobrenome`, `email`, `emailvalidado`, `senha`, `permissao_id`, `responsavel`, `avatar`, `first`, `ativado`, `date_in`, `code`, `deletado`) VALUES
(10, NULL, 'Andreia', 'Freitas', 'andrea@stimulobureau.com.br', 1, 'e10adc3949ba59abbe56e057f20f883e', 50, 0, '0', 1, 0, '2018-06-19 14:25:20', '0', 0),
(108, NULL, 'Hamilton', 'Silva', 'hsfradinho@gmail.com', 1, 'd0e07f400cc3fb08805ef9a465108aed', 80, 0, '0', 1, 0, '2018-07-06 19:24:05', '0', 0),
(109, NULL, 'Caroline', 'Lins', 'carolinealbuquerquelins@gmail.com22', 0, 'e10adc3949ba59abbe56e057f20f883e', 10, 0, '0', 0, 0, '2018-07-08 00:07:51', '0', 0),
(110, NULL, 'Caroline', 'Lins', 'carolinealbuquerquelins@gmail.com', 1, '3b66cf842951fb482f9ba5a2298b5158', 10, 0, '0', 1, 0, '2018-07-08 00:16:15', '0', 0);

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
(1, 1, '0', '0', 0, 0, '2018-07-06 22:16:55', '2018-06-07 13:12:10', 0, 'Endereço', 0, 'Compl', 'Brasil', 'Estado', 'Municipio', '0', '0', '', 0),
(2, 100, '0', '0', 0, 0, '2018-06-09 14:49:36', '2018-06-07 13:12:10', 0, 'Endereço', 0, 'Compl', 'Brasil', 'Estado', 'Municipio', '0', '0', '', 0),
(104, 104, '0', '0', 0, 0, '2018-06-19 17:26:34', '2018-06-19 14:26:34', 0, 'Endereço', 0, 'Compl', 'Brasil', 'Estado', 'Municipio', '0', '0', '', 0),
(108, 108, '0', '0', 0, 0, '2018-07-07 21:17:36', '2018-07-06 19:24:49', 0, 'Endereço', 0, 'Compl', 'Brasil', 'Estado', 'Municipio', '0', '0', '', 0),
(110, 110, '0', '0', 0, 0, '2018-07-08 03:28:37', '2018-07-08 00:26:14', 0, 'Endereço', 0, 'Compl', 'Brasil', 'Estado', 'Municipio', '0', '0', '', 0);

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
  MODIFY `dbo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `usuarios_dados_pessoais`
--
ALTER TABLE `usuarios_dados_pessoais`
  MODIFY `udp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
