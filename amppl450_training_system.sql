/*
Navicat MySQL Data Transfer

Source Server         : TRAINING
Source Server Version : 50641
Source Host           : 108.179.253.175:3306
Source Database       : amppl450_training_system

Target Server Type    : MYSQL
Target Server Version : 50641
File Encoding         : 65001

Date: 2019-03-25 10:02:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `alternativas`
-- ----------------------------
DROP TABLE IF EXISTS `alternativas`;
CREATE TABLE `alternativas` (
  `idAlternativa` int(11) NOT NULL AUTO_INCREMENT,
  `alternativa` text COLLATE utf8mb4_unicode_ci,
  `idPergunta` int(11) DEFAULT NULL,
  `certa` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'se a alternativa da questao é certa ou errada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idAlternativa`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of alternativas
-- ----------------------------
INSERT INTO `alternativas` VALUES ('1', 'Word', '1', '0', '2019-03-13 11:05:26', '2019-03-13 11:05:26');
INSERT INTO `alternativas` VALUES ('2', 'Excel', '1', '1', '2019-03-13 11:05:26', '2019-03-13 11:05:26');
INSERT INTO `alternativas` VALUES ('3', 'Power Point', '1', '0', '2019-03-13 11:05:26', '2019-03-13 11:05:26');
INSERT INTO `alternativas` VALUES ('4', 'Correio Eletrônico', '1', '0', '2019-03-13 11:05:26', '2019-03-13 11:05:26');
INSERT INTO `alternativas` VALUES ('5', '.txt', '2', '0', '2019-03-13 11:11:41', '2019-03-13 11:11:41');
INSERT INTO `alternativas` VALUES ('6', '.xlsx', '2', '1', '2019-03-13 11:11:41', '2019-03-13 11:11:41');
INSERT INTO `alternativas` VALUES ('7', '.docx', '2', '0', '2019-03-13 11:11:41', '2019-03-13 11:11:41');
INSERT INTO `alternativas` VALUES ('8', '.jpg', '2', '0', '2019-03-13 11:11:41', '2019-03-13 11:11:41');
INSERT INTO `alternativas` VALUES ('9', '.pdf', '3', '0', '2019-03-22 13:51:00', '2019-03-22 13:51:00');
INSERT INTO `alternativas` VALUES ('10', '.xls', '3', '0', '2019-03-22 13:51:00', '2019-03-22 13:51:00');
INSERT INTO `alternativas` VALUES ('11', '.doc', '3', '1', '2019-03-22 13:51:00', '2019-03-22 13:51:00');
INSERT INTO `alternativas` VALUES ('12', '.jpg', '3', '0', '2019-03-22 13:51:00', '2019-03-22 13:51:00');
INSERT INTO `alternativas` VALUES ('13', 'ctrl + B', '4', '1', '2019-03-22 13:52:27', '2019-03-22 13:52:27');
INSERT INTO `alternativas` VALUES ('14', 'ctrl + Z', '4', '0', '2019-03-22 13:52:27', '2019-03-22 13:52:27');
INSERT INTO `alternativas` VALUES ('15', 'ctrl + X', '4', '0', '2019-03-22 13:52:27', '2019-03-22 13:52:27');
INSERT INTO `alternativas` VALUES ('16', 'ctrl + V', '4', '0', '2019-03-22 13:52:27', '2019-03-22 13:52:27');
INSERT INTO `alternativas` VALUES ('17', 'Apagar texto do documento', '5', '0', '2019-03-22 13:55:32', '2019-03-22 13:55:32');
INSERT INTO `alternativas` VALUES ('18', 'Selecionar todo o texto do documento', '5', '1', '2019-03-22 13:55:32', '2019-03-22 13:55:32');
INSERT INTO `alternativas` VALUES ('19', 'Recortar um texto do documento', '5', '0', '2019-03-22 13:55:32', '2019-03-22 13:55:32');
INSERT INTO `alternativas` VALUES ('20', 'Colar um texto no documento', '5', '0', '2019-03-22 13:55:32', '2019-03-22 13:55:32');

-- ----------------------------
-- Table structure for `anotacoes`
-- ----------------------------
DROP TABLE IF EXISTS `anotacoes`;
CREATE TABLE `anotacoes` (
  `idAnotacao` int(11) NOT NULL AUTO_INCREMENT,
  `idConteudo` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `anotacao` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idAnotacao`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of anotacoes
-- ----------------------------
INSERT INTO `anotacoes` VALUES ('1', '35', '2', '<?php\ncomandos\n?>', '2019-03-18 19:57:53', '2019-03-18 19:57:53');

-- ----------------------------
-- Table structure for `atividades`
-- ----------------------------
DROP TABLE IF EXISTS `atividades`;
CREATE TABLE `atividades` (
  `idAtividade` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idModulo` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idAtividade`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of atividades
-- ----------------------------
INSERT INTO `atividades` VALUES ('1', 'Questões básicas', '2', '1', '2019-03-13 11:04:07', '2019-03-13 11:04:07');
INSERT INTO `atividades` VALUES ('2', 'Exercícios de Fixação', '3', '1', '2019-03-22 13:49:47', '2019-03-22 13:49:47');

-- ----------------------------
-- Table structure for `avaliacoes`
-- ----------------------------
DROP TABLE IF EXISTS `avaliacoes`;
CREATE TABLE `avaliacoes` (
  `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `idCurso` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `nota` tinyint(4) DEFAULT NULL,
  `comentario` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idAvaliacao`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of avaliacoes
-- ----------------------------
INSERT INTO `avaliacoes` VALUES ('1', '1', '1', '4', 'Curso excelente, conteúdo muito bem explicado.', '2019-03-13 10:52:08', '2019-03-13 10:52:08');
INSERT INTO `avaliacoes` VALUES ('2', '3', '2', '5', 'Ótimo curso para quem esta querendo começar com php.', '2019-03-18 19:58:51', '2019-03-18 19:58:51');
INSERT INTO `avaliacoes` VALUES ('3', '5', '1', '5', 'Curso show de bola!', '2019-03-22 14:13:12', '2019-03-22 14:13:12');

-- ----------------------------
-- Table structure for `categorias`
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'JAVASCRIPT', '1', '2018-12-11 08:53:55', '2018-12-11 08:54:00');
INSERT INTO `categorias` VALUES ('6', 'PHP', '1', '2019-02-26 20:33:32', '2019-02-26 20:33:32');
INSERT INTO `categorias` VALUES ('4', 'NEGÓCIOS', '1', '2018-12-13 16:24:27', '2018-12-13 16:24:27');
INSERT INTO `categorias` VALUES ('5', 'INGLÊS', '1', '2018-12-27 22:38:23', '2018-12-27 22:38:23');
INSERT INTO `categorias` VALUES ('7', 'OFFICE', '1', '2019-03-12 16:30:14', '2019-03-12 16:30:14');

-- ----------------------------
-- Table structure for `conteudos`
-- ----------------------------
DROP TABLE IF EXISTS `conteudos`;
CREATE TABLE `conteudos` (
  `idConteudo` int(11) NOT NULL AUTO_INCREMENT,
  `conteudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoConteudo` enum('anexo','video') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idModulo` int(11) DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ordem` int(11) NOT NULL DEFAULT '0',
  `idUsuario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idConteudo`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of conteudos
-- ----------------------------
INSERT INTO `conteudos` VALUES ('1', 'Curso Excel #01 - Como surgiu o Excel?', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZVURQLXZtIc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0', '1', '2019-03-13 10:27:59', '2019-03-13 10:27:59');
INSERT INTO `conteudos` VALUES ('2', 'Curso Excel #02 - 10 Dicas e Truques para Excel', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/yCRUWtDcrJQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '1', '2019-03-13 10:37:21', '2019-03-13 10:37:21');
INSERT INTO `conteudos` VALUES ('3', 'Curso Excel #03 - Primeiros Passos no Excel', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/X4RLqvl0Ch8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2', '1', '2019-03-13 10:38:02', '2019-03-13 10:38:02');
INSERT INTO `conteudos` VALUES ('4', 'Curso Excel #04 - Manipulando Arquivos', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4dBE45hiDz8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '3', '1', '2019-03-13 10:38:25', '2019-03-13 10:38:25');
INSERT INTO `conteudos` VALUES ('5', 'Curso Excel #05 - Selecionando Dados', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZPQIm6_0Z5A\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '4', '1', '2019-03-13 10:38:51', '2019-03-13 10:38:51');
INSERT INTO `conteudos` VALUES ('6', 'Curso Excel #06 - Formatando Planilhas', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nM3GqVDfREI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5', '1', '2019-03-13 10:39:17', '2019-03-13 10:39:17');
INSERT INTO `conteudos` VALUES ('7', 'Curso Excel #07 - Dicas para Formatação de Dados', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JF8lit7wrrM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '6', '1', '2019-03-13 10:39:43', '2019-03-13 10:39:43');
INSERT INTO `conteudos` VALUES ('8', 'Curso Excel #08 - Classificação de Dados', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/8mV30b60YYQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '7', '1', '2019-03-13 10:40:08', '2019-03-13 10:40:08');
INSERT INTO `conteudos` VALUES ('9', 'Curso Excel #09 - Fórmulas Básicas', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_-2deLFAJeM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '8', '1', '2019-03-13 10:40:31', '2019-03-13 10:40:31');
INSERT INTO `conteudos` VALUES ('10', 'Curso Excel #10 - Funções do Excel (Parte 1)', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/boUzkJJNOPI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '9', '1', '2019-03-13 10:40:57', '2019-03-13 10:40:57');
INSERT INTO `conteudos` VALUES ('11', 'Curso Excel #11 - Funções do Excel (Parte 2)', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/jpuYGqeL7Ig\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '10', '1', '2019-03-13 10:41:31', '2019-03-13 10:41:31');
INSERT INTO `conteudos` VALUES ('12', 'Curso Excel #12 - Formatação Condicional', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/LArhLXDKqNg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '11', '1', '2019-03-13 10:42:03', '2019-03-13 10:42:03');
INSERT INTO `conteudos` VALUES ('13', 'Curso Word #01 - Apresentação do Curso de Word 2016', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/59lDXVkqlqQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0', '1', '2019-03-14 18:45:34', '2019-03-14 18:45:34');
INSERT INTO `conteudos` VALUES ('14', 'Curso Word #02 - 10 Dicas para Word 2016', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/qVoiU4MMCZ8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '1', '2019-03-14 18:45:57', '2019-03-14 18:45:57');
INSERT INTO `conteudos` VALUES ('15', 'Curso Word #03 - Primeiros Passos no Word 2016', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iOlONI3F300\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2', '1', '2019-03-14 18:46:17', '2019-03-14 18:46:17');
INSERT INTO `conteudos` VALUES ('16', 'Curso Word #04 - Salvando Documentos Locais e na Nuvem', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Vp0UZie4rq0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '3', '1', '2019-03-14 18:46:42', '2019-03-14 18:46:42');
INSERT INTO `conteudos` VALUES ('17', 'Curso Word #05 - Abrindo e Editando PDF no Word 2016', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/--aFom9XFxQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '4', '1', '2019-03-14 18:47:05', '2019-03-14 18:47:05');
INSERT INTO `conteudos` VALUES ('18', 'Curso Word #06 - Digitação e Formatação Básica', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/eNJUq2-q2Ps\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5', '1', '2019-03-14 18:47:27', '2019-03-14 18:47:27');
INSERT INTO `conteudos` VALUES ('19', 'Curso Word #07 - Formatações Baseadas em Estilos', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ELtk2wmrmQc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '6', '1', '2019-03-14 18:47:49', '2019-03-14 18:47:49');
INSERT INTO `conteudos` VALUES ('20', 'Curso Word #08 - Trabalhando com Imagens', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/goajzoo8oMc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '7', '1', '2019-03-14 18:48:07', '2019-03-14 18:48:07');
INSERT INTO `conteudos` VALUES ('21', 'Curso Word #09 - Marcas de Tabulação', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/F8YHug52D10\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '8', '1', '2019-03-14 18:48:30', '2019-03-14 18:48:30');
INSERT INTO `conteudos` VALUES ('22', 'Curso Word #10 - Configurações na Página', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JvSVkrDbzf0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '9', '1', '2019-03-14 18:48:54', '2019-03-14 18:48:54');
INSERT INTO `conteudos` VALUES ('23', 'Curso Word #11 - Texto em Colunas', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/CIGujgOfpl8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '10', '1', '2019-03-14 18:49:19', '2019-03-14 18:49:19');
INSERT INTO `conteudos` VALUES ('24', 'Curso Word #12 - Quebras de Texto', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/XaMgzE9no1E\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '11', '1', '2019-03-14 18:49:44', '2019-03-14 18:49:44');
INSERT INTO `conteudos` VALUES ('25', 'Curso Word #13 - Cabeçalho e Rodapé', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ck-Bx_KAmPg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '12', '1', '2019-03-14 18:50:20', '2019-03-14 18:50:20');
INSERT INTO `conteudos` VALUES ('26', 'Curso Word #14 - Estrutura Avançada de um Documento Word', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/uE1AAAkr_OQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '13', '1', '2019-03-14 18:50:41', '2019-03-14 18:50:41');
INSERT INTO `conteudos` VALUES ('27', 'Curso Word #15 - Folha de Rosto (Capas no Word)', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sLNR2cVG4dQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '14', '1', '2019-03-14 18:51:00', '2019-03-14 18:51:00');
INSERT INTO `conteudos` VALUES ('28', 'Curso Word #16 - Componentes de Design', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/AZt14AuqwnY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '15', '1', '2019-03-14 18:51:35', '2019-03-14 18:51:35');
INSERT INTO `conteudos` VALUES ('29', 'Curso Word #17 - Sumário Automático', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iq4kIodKBv8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '16', '1', '2019-03-14 18:51:57', '2019-03-14 18:51:57');
INSERT INTO `conteudos` VALUES ('30', 'Curso Word #18 - Criando Bibliografia ABNT Automática no Word', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/SJkXd7kIIKA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '17', '1', '2019-03-14 18:52:17', '2019-03-14 18:52:17');
INSERT INTO `conteudos` VALUES ('31', 'Curso Word #19 - Notas de Rodapé e Comentários', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/V0iN-op4_Y0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '18', '1', '2019-03-14 18:52:40', '2019-03-14 18:52:40');
INSERT INTO `conteudos` VALUES ('32', 'Curso Word #20 - Listas no Word', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sJBmPFS3Zl0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '19', '1', '2019-03-14 18:53:05', '2019-03-14 18:53:05');
INSERT INTO `conteudos` VALUES ('33', 'Curso Word #21 - Tabelas no Word', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/8kZekn96fvU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '20', '1', '2019-03-14 18:53:26', '2019-03-14 18:53:26');
INSERT INTO `conteudos` VALUES ('34', 'Curso Word #22 - Fórmulas e Equações', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iVrd8Bl1pSA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '21', '1', '2019-03-14 18:53:51', '2019-03-14 18:53:51');
INSERT INTO `conteudos` VALUES ('35', 'História do PHP - Curso PHP Iniciante #01', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/F7KzJ7e6EAc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0', '1', '2019-03-18 19:45:03', '2019-03-18 19:45:03');
INSERT INTO `conteudos` VALUES ('36', 'Como funciona o PHP - Curso PHP Iniciante #02', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Eup6utTPe2U\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '1', '2019-03-18 19:45:27', '2019-03-18 19:45:27');
INSERT INTO `conteudos` VALUES ('37', 'Como Instalar o PHP - Curso de PHP Iniciante #03', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/3ltZBbKACh4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2', '1', '2019-03-18 19:45:49', '2019-03-18 19:45:49');
INSERT INTO `conteudos` VALUES ('38', 'Variáveis em PHP - Curso PHP Iniciante #04', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/DGZS9KrlrjI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '3', '1', '2019-03-18 19:46:12', '2019-03-18 19:46:12');
INSERT INTO `conteudos` VALUES ('39', 'Operadores Aritméticos - Curso PHP Iniciante #05', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/fCZdbl9-qkw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '4', '1', '2019-03-18 19:46:39', '2019-03-18 19:46:39');
INSERT INTO `conteudos` VALUES ('40', 'Operadores de Atribuição - Curso PHP Iniciante #06', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NuBt0B_GeEo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5', '1', '2019-03-18 19:47:06', '2019-03-18 19:47:06');
INSERT INTO `conteudos` VALUES ('41', 'Operadores Relacionais - Curso PHP Iniciante #07', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/YrmPk8zL9Qw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '6', '1', '2019-03-18 19:47:38', '2019-03-18 19:47:38');
INSERT INTO `conteudos` VALUES ('42', 'Integração HTML5 + PHP - Curso PHP Iniciante #08', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/gvZfP2iBkw4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '7', '1', '2019-03-18 19:48:02', '2019-03-18 19:48:02');
INSERT INTO `conteudos` VALUES ('43', 'Estrutura Condicional if - Curso de PHP Iniciante #09', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/qAisUeI5oKE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '8', '1', '2019-03-18 19:48:25', '2019-03-18 19:48:25');
INSERT INTO `conteudos` VALUES ('44', 'Estrutura Condicional Switch - Curso de PHP Iniciante #10', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/thElQ5IhM1Q\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '9', '1', '2019-03-18 19:48:46', '2019-03-18 19:48:46');
INSERT INTO `conteudos` VALUES ('45', 'Estrutura de Repetição While - Curso de PHP Iniciante #11', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/3jk8fSWpQIg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '10', '1', '2019-03-18 19:49:10', '2019-03-18 19:49:10');
INSERT INTO `conteudos` VALUES ('46', 'Estrutura de Repetição Do While - Curso de PHP Iniciante #12', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/6QymvmX3YJU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '11', '1', '2019-03-18 19:49:34', '2019-03-18 19:49:34');
INSERT INTO `conteudos` VALUES ('47', 'Estrutura de Repetição For - Curso de PHP Iniciante #13', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ancrPpEq9Rw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '12', '1', '2019-03-18 19:49:57', '2019-03-18 19:49:57');
INSERT INTO `conteudos` VALUES ('48', 'Rotinas em PHP - Parte 1 - Curso de PHP Iniciante #14', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/7V6MdZQFArc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '13', '1', '2019-03-18 19:50:25', '2019-03-18 19:50:25');
INSERT INTO `conteudos` VALUES ('49', 'Rotinas em PHP - Parte 2 - Curso PHP Iniciante #15', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/o3y8af8rSKM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '14', '1', '2019-03-18 19:50:53', '2019-03-18 19:50:53');
INSERT INTO `conteudos` VALUES ('50', 'Funções String em PHP (Parte 1) - Curso PHP Iniciante #16', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/hQLyylI2LwI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '15', '1', '2019-03-18 19:51:17', '2019-03-18 19:51:17');
INSERT INTO `conteudos` VALUES ('51', 'Funções String em PHP (Parte 2) - Curso PHP Iniciante #17', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/1KdhIz0Gh5A\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '16', '1', '2019-03-18 19:51:46', '2019-03-18 19:51:46');
INSERT INTO `conteudos` VALUES ('52', 'Vetores e Matrizes - Parte 1 - Curso PHP Iniciante #18', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/g8Gr2NIMxQQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '17', '1', '2019-03-18 19:52:17', '2019-03-18 19:52:17');
INSERT INTO `conteudos` VALUES ('53', 'Vetores e Matrizes - Parte 2 - Curso PHP Iniciantes #19', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/1f5H4mqCGHo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '18', '1', '2019-03-18 19:52:49', '2019-03-18 19:52:49');
INSERT INTO `conteudos` VALUES ('54', 'Entrevista com Rasmus Lerdorf - Curso PHP Iniciantes #20', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/5ENwW7f2fbg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '19', '1', '2019-03-18 19:53:24', '2019-03-18 19:53:24');
INSERT INTO `conteudos` VALUES ('55', 'Apostila de PHP', 'anexo', '4', '8dc03dae5242e1ec302e2359aa9b7c98.pdf', '20', '1', '2019-03-18 19:54:43', '2019-03-18 19:54:43');
INSERT INTO `conteudos` VALUES ('56', 'Javascript Essencial - Conceitos iniciais', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ipHuSfOYhwA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0', '1', '2019-03-19 19:35:57', '2019-03-19 19:35:57');
INSERT INTO `conteudos` VALUES ('57', 'Javascript Essencial - Variáveis e tipos de dados', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZW02MWzZXPE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '1', '2019-03-19 19:36:18', '2019-03-19 19:36:18');
INSERT INTO `conteudos` VALUES ('58', 'Javascript Essencial - Funções', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TWmlIbvTjRo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2', '1', '2019-03-19 19:36:38', '2019-03-19 19:36:38');
INSERT INTO `conteudos` VALUES ('59', 'JavaScript Essencial - Objetos e Arrays', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2sZerMlCzBM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '3', '1', '2019-03-19 19:36:57', '2019-03-19 19:36:57');
INSERT INTO `conteudos` VALUES ('60', 'JavaScript Essencial - Strings e números', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rDfpq25OP_Q\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '4', '1', '2019-03-19 19:37:16', '2019-03-19 19:37:16');
INSERT INTO `conteudos` VALUES ('61', 'Javascript Essencial - Data e hora', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/MPgVZzUBTlw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5', '1', '2019-03-19 19:37:33', '2019-03-19 19:37:33');
INSERT INTO `conteudos` VALUES ('62', 'Javascript Essencial - Estruturas de controle e repetição', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dJ88VdZMYKY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '6', '1', '2019-03-19 19:37:56', '2019-03-19 19:37:56');
INSERT INTO `conteudos` VALUES ('63', 'Javascript Essencial - Tratamento de exceções', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/KpA6Idl9-a0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '7', '1', '2019-03-19 19:38:14', '2019-03-19 19:38:14');
INSERT INTO `conteudos` VALUES ('64', 'Javascript Essencial - DOM parte 1', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mchmZKNBjLA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '8', '1', '2019-03-19 19:38:36', '2019-03-19 19:38:36');
INSERT INTO `conteudos` VALUES ('65', 'Javascript Essencial - DOM parte 2 - BOM', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/zAPDX_IkNds\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '9', '1', '2019-03-19 19:39:03', '2019-03-19 19:39:03');
INSERT INTO `conteudos` VALUES ('66', 'CURSO DE INGLÊS ONLINE - AULA 1', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/MN7Vm_g_ySs\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0', '1', '2019-03-21 13:53:54', '2019-03-21 13:53:54');
INSERT INTO `conteudos` VALUES ('67', 'CURSO DE INGLÊS ONLINE - AULA 2', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/AoZbRIdeGSU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '1', '2019-03-21 13:54:14', '2019-03-21 13:54:14');
INSERT INTO `conteudos` VALUES ('68', 'CURSO DE INGLÊS ONLINE - AULA 3', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wrlNJqvr1dU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2', '1', '2019-03-21 13:54:38', '2019-03-21 13:54:38');
INSERT INTO `conteudos` VALUES ('69', 'CURSO DE INGLÊS ONLINE - AULA 4', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-Toz2RtUEok\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '3', '1', '2019-03-21 13:54:58', '2019-03-21 13:54:58');
INSERT INTO `conteudos` VALUES ('70', 'CURSO DE INGLÊS ONLINE - AULA 5', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Ps0G62PR4Ks\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '4', '1', '2019-03-21 13:55:19', '2019-03-21 13:55:19');
INSERT INTO `conteudos` VALUES ('71', 'CURSO DE INGLÊS ONLINE - AULA 6', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/yfdcKf1KAhQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5', '1', '2019-03-21 13:55:38', '2019-03-21 13:55:38');
INSERT INTO `conteudos` VALUES ('72', 'CURSO DE INGLÊS ONLINE - AULA 7', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/LPlBIzDp8hg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '6', '1', '2019-03-21 13:55:55', '2019-03-21 13:55:55');
INSERT INTO `conteudos` VALUES ('73', 'CURSO DE INGLÊS ONLINE - AULA 8', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/5ugkJAp6aK4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '7', '1', '2019-03-21 13:56:21', '2019-03-21 13:56:21');
INSERT INTO `conteudos` VALUES ('74', 'CURSO DE INGLÊS ONLINE - AULA 9 (Parte 1)', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HvNizuvZeN4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '8', '1', '2019-03-21 13:56:49', '2019-03-21 13:56:49');
INSERT INTO `conteudos` VALUES ('75', 'CURSO DE INGLÊS ONLINE - AULA 9 (Parte 2)', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4nhp03Ik_Vc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '9', '1', '2019-03-21 13:57:09', '2019-03-21 13:57:09');
INSERT INTO `conteudos` VALUES ('76', 'CURSO DE INGLÊS ONLINE - AULA 10', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-og9CiQTrqk\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '10', '1', '2019-03-21 13:57:28', '2019-03-21 13:57:28');
INSERT INTO `conteudos` VALUES ('77', 'CURSO DE INGLÊS ONLINE - AULA 11', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/13zh2LmENWg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '11', '1', '2019-03-21 13:57:55', '2019-03-21 13:57:55');
INSERT INTO `conteudos` VALUES ('78', 'CURSO DE INGLÊS ONLINE - AULA 12', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/A_7i4HmPU8s\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '12', '1', '2019-03-21 13:58:14', '2019-03-21 13:58:14');
INSERT INTO `conteudos` VALUES ('79', 'CURSO DE INGLÊS ONLINE - AULA 13', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/jimidh3O1XA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '13', '1', '2019-03-21 13:58:32', '2019-03-21 13:58:32');
INSERT INTO `conteudos` VALUES ('80', 'CURSO DE INGLÊS ONLINE - AULA 14 (+LIVE)', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/3gDuGEsqBHE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '14', '1', '2019-03-21 13:58:51', '2019-03-21 13:58:51');
INSERT INTO `conteudos` VALUES ('81', 'CURSO DE INGLÊS ONLINE - AULA 15', 'video', '6', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ywWk9hxw8Vw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '15', '1', '2019-03-21 13:59:15', '2019-03-21 13:59:15');

-- ----------------------------
-- Table structure for `conteudos_realizados`
-- ----------------------------
DROP TABLE IF EXISTS `conteudos_realizados`;
CREATE TABLE `conteudos_realizados` (
  `idConteudoRealizado` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `idConteudo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idConteudoRealizado`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of conteudos_realizados
-- ----------------------------
INSERT INTO `conteudos_realizados` VALUES ('1', '1', '1', '2019-03-13 10:50:33', '2019-03-13 10:50:33');
INSERT INTO `conteudos_realizados` VALUES ('2', '2', '35', '2019-03-18 19:56:39', '2019-03-18 19:56:39');
INSERT INTO `conteudos_realizados` VALUES ('3', '2', '55', '2019-03-18 19:57:20', '2019-03-18 19:57:20');

-- ----------------------------
-- Table structure for `cursos`
-- ----------------------------
DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instrutor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `palavrasChave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cursos
-- ----------------------------
INSERT INTO `cursos` VALUES ('1', 'Curso de Excel 2016 Essencial', 'Gustavo Guanabara', '7', 'excel, office, planilha', '1', '2019-03-13 10:24:46', '2019-03-13 10:24:46');
INSERT INTO `cursos` VALUES ('2', 'Curso de Word 2016 Essencial', 'Gustavo Guanabara', '7', 'documento, office, word', '1', '2019-03-14 18:44:23', '2019-03-14 18:44:23');
INSERT INTO `cursos` VALUES ('3', 'Curso de PHP para Iniciantes', 'Gustavo Guanabara', '6', 'programação, php, web', '1', '2019-03-18 19:43:03', '2019-03-18 19:43:03');
INSERT INTO `cursos` VALUES ('4', 'Curso de Javascript para iniciantes', 'RBtech', '1', 'javascript, programação', '1', '2019-03-19 19:34:01', '2019-03-19 19:34:01');
INSERT INTO `cursos` VALUES ('5', 'Curso de Inglês - Elementary', 'Mais Língua Concept', '5', 'inglês, idioma', '1', '2019-03-20 20:32:15', '2019-03-20 20:32:15');

-- ----------------------------
-- Table structure for `inscricoes`
-- ----------------------------
DROP TABLE IF EXISTS `inscricoes`;
CREATE TABLE `inscricoes` (
  `idInscricao` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `idCurso` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idInscricao`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of inscricoes
-- ----------------------------
INSERT INTO `inscricoes` VALUES ('1', '1', '1', '2019-03-13 10:50:20', '2019-03-13 10:50:20');
INSERT INTO `inscricoes` VALUES ('2', '2', '3', '2019-03-18 19:56:28', '2019-03-18 19:56:28');
INSERT INTO `inscricoes` VALUES ('3', '1', '5', '2019-03-22 08:48:49', '2019-03-22 08:48:49');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for `modulos`
-- ----------------------------
DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos` (
  `idModulo` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idCurso` int(11) DEFAULT NULL,
  `ordem` int(11) NOT NULL DEFAULT '0',
  `idUsuario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idModulo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of modulos
-- ----------------------------
INSERT INTO `modulos` VALUES ('1', 'Aulas', '1', '0', '1', '2019-03-13 10:26:02', '2019-03-13 10:26:02');
INSERT INTO `modulos` VALUES ('2', 'Exercícios', '1', '1', '1', '2019-03-13 11:03:10', '2019-03-13 11:03:10');
INSERT INTO `modulos` VALUES ('3', 'Aulas', '2', '0', '1', '2019-03-14 18:44:47', '2019-03-14 18:44:47');
INSERT INTO `modulos` VALUES ('4', 'Todas as Aulas', '3', '0', '1', '2019-03-18 19:44:01', '2019-03-18 19:44:01');
INSERT INTO `modulos` VALUES ('5', 'Aulas', '4', '0', '1', '2019-03-19 19:34:21', '2019-03-19 19:34:21');
INSERT INTO `modulos` VALUES ('6', 'Aulas', '5', '0', '1', '2019-03-21 13:53:33', '2019-03-21 13:53:33');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `perguntas`
-- ----------------------------
DROP TABLE IF EXISTS `perguntas`;
CREATE TABLE `perguntas` (
  `idPergunta` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` text COLLATE utf8mb4_unicode_ci,
  `idAtividade` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idPergunta`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of perguntas
-- ----------------------------
INSERT INTO `perguntas` VALUES ('1', '<p>Para execu&ccedil;&atilde;o de uma atividade administrativa, o funcion&aacute;rio de um departamento necessita utilizar um programa de computador do pacote Microsoft Office capaz de manter planilhas categorizadas de acordo com as fun&ccedil;&otilde;es. Este funcion&aacute;rio dever&aacute; recorrer ao:</p>', '1', '1', '2019-03-13 11:05:26', '2019-03-13 11:05:26');
INSERT INTO `perguntas` VALUES ('2', '<p>Qual a extens&atilde;o de arquivo padr&atilde;o do Excel?</p>', '1', '1', '2019-03-13 11:11:41', '2019-03-13 11:11:41');
INSERT INTO `perguntas` VALUES ('3', '<p>Qual a <strong>extens&atilde;o</strong> para arquivos criados com o&nbsp;Word?</p>', '2', '1', '2019-03-22 13:51:00', '2019-03-22 13:51:00');
INSERT INTO `perguntas` VALUES ('4', '<p>Qual o atalho para colocar um texto em negrito?</p>', '2', '1', '2019-03-22 13:52:27', '2019-03-22 13:52:27');
INSERT INTO `perguntas` VALUES ('5', '<p>Para que serve o atalho ctrl + T?</p>', '2', '1', '2019-03-22 13:55:32', '2019-03-22 13:55:32');

-- ----------------------------
-- Table structure for `respostas`
-- ----------------------------
DROP TABLE IF EXISTS `respostas`;
CREATE TABLE `respostas` (
  `idResposta` int(11) NOT NULL AUTO_INCREMENT,
  `idTentativa` int(11) DEFAULT NULL,
  `idAtividade` int(11) DEFAULT NULL,
  `idPergunta` int(11) DEFAULT NULL,
  `idAlternativa` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idResposta`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of respostas
-- ----------------------------
INSERT INTO `respostas` VALUES ('1', '1', '1', '1', '2', '1', '2019-03-13 11:07:27', '2019-03-13 11:07:27');

-- ----------------------------
-- Table structure for `tentativas`
-- ----------------------------
DROP TABLE IF EXISTS `tentativas`;
CREATE TABLE `tentativas` (
  `idTentativa` int(11) NOT NULL AUTO_INCREMENT,
  `idAtividade` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `nota` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `finished_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idTentativa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tentativas
-- ----------------------------
INSERT INTO `tentativas` VALUES ('1', '1', '1', '5.00', '2019-03-13 11:07:18', '2019-03-13 11:07:35', '2019-03-13 11:07:35');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Administrador', 'emaildobrenomol@gmail.com', '$2y$10$UVq2WUoER.qGEyQ8Xl.dGOWsgRo5HGJoxwQoQIuFW.QIfymCJFS9O', 'admin', '63b4E4jQH4NIUpSlRTZG09Z93wAQN7mw1vxPGrPKf2UU4OIDFrAx1LolCaIt', '2018-12-08 14:47:01', '2019-03-13 10:21:43');
INSERT INTO `users` VALUES ('2', 'Usuário', 'breno.mol@pbh.gov.br', '$2y$10$eUCOQ91G40.7lAqaOUP6NeqiHbnvrOatdyaysqbcQT1wVT3ZRSxWa', 'user', 'MyJoKVe0rmarSjnfBEMfGQ5tAQHlXQHCzY4EQliGK8ehhosUi6iKNpf0ItOa', '2018-12-12 16:05:58', '2019-03-13 10:46:46');
