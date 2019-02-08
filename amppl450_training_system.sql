/*
Navicat MySQL Data Transfer

Source Server         : AMPPLIE
Source Server Version : 50641
Source Host           : 108.179.253.175:3306
Source Database       : amppl450_training_system

Target Server Type    : MYSQL
Target Server Version : 50641
File Encoding         : 65001

Date: 2019-02-08 10:42:12
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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of alternativas
-- ----------------------------
INSERT INTO `alternativas` VALUES ('6', '<javascript></javascript>', '2', '0', '2019-01-16 16:51:10', '2019-02-06 22:41:20');
INSERT INTO `alternativas` VALUES ('5', '<script></script>', '2', '1', '2019-01-16 16:51:09', '2019-02-06 22:41:20');
INSERT INTO `alternativas` VALUES ('7', '<body></body>', '2', '0', '2019-01-16 16:51:10', '2019-02-06 22:41:21');
INSERT INTO `alternativas` VALUES ('8', '<css></css>', '2', '0', '2019-01-16 16:51:11', '2019-02-06 22:41:21');
INSERT INTO `alternativas` VALUES ('9', 'body', '3', '1', '2019-01-19 19:19:39', '2019-02-06 22:41:22');
INSERT INTO `alternativas` VALUES ('10', 'head', '3', '0', '2019-01-19 19:19:40', '2019-02-06 22:41:22');
INSERT INTO `alternativas` VALUES ('11', 'document', '3', '0', '2019-01-19 19:19:40', '2019-02-06 22:41:23');
INSERT INTO `alternativas` VALUES ('12', 'page', '3', '0', '2019-01-19 19:19:40', '2019-02-06 22:41:23');
INSERT INTO `alternativas` VALUES ('13', 'composição', '4', '1', '2019-02-05 18:59:40', '2019-02-06 22:41:24');
INSERT INTO `alternativas` VALUES ('14', 'generalização', '4', '0', '2019-02-05 18:59:40', '2019-02-06 22:41:24');
INSERT INTO `alternativas` VALUES ('15', 'herança', '4', '0', '2019-02-05 18:59:41', '2019-02-06 22:41:24');
INSERT INTO `alternativas` VALUES ('16', 'polimorfismo', '4', '0', '2019-02-05 18:59:41', '2019-02-06 22:41:25');
INSERT INTO `alternativas` VALUES ('17', 'a', '5', '1', '2019-02-06 13:15:28', '2019-02-06 22:41:26');
INSERT INTO `alternativas` VALUES ('18', 'b', '5', '0', '2019-02-06 13:15:28', '2019-02-06 22:41:26');
INSERT INTO `alternativas` VALUES ('19', 'c', '5', '0', '2019-02-06 13:15:29', '2019-02-06 22:41:26');
INSERT INTO `alternativas` VALUES ('20', 'd', '5', '0', '2019-02-06 13:15:29', '2019-02-06 22:41:27');
INSERT INTO `alternativas` VALUES ('21', 'carregador (loader)', '6', '0', '2019-02-06 13:22:15', '2019-02-06 22:41:27');
INSERT INTO `alternativas` VALUES ('22', 'compilador (compiler)', '6', '1', '2019-02-06 13:22:15', '2019-02-06 22:41:28');
INSERT INTO `alternativas` VALUES ('23', 'interpretador (interpreter)', '6', '0', '2019-02-06 13:22:16', '2019-02-06 22:41:28');
INSERT INTO `alternativas` VALUES ('24', 'ligador (linker)', '6', '0', '2019-02-06 13:22:16', '2019-02-06 22:41:29');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of anotacoes
-- ----------------------------
INSERT INTO `anotacoes` VALUES ('2', '1', '2', 'anotou', '2018-12-27 16:08:19', '2018-12-27 16:16:57');
INSERT INTO `anotacoes` VALUES ('3', '2', '2', 'Variáveis do tipo inteiro, booleano, float.', '2018-12-28 18:24:18', '2018-12-28 18:24:18');
INSERT INTO `anotacoes` VALUES ('4', '30', '1', 'Teste Angular', '2019-02-06 22:26:20', '2019-02-06 22:26:20');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of atividades
-- ----------------------------
INSERT INTO `atividades` VALUES ('2', 'Exercícios sobre conceitos iniciais', '1', '1', '2019-01-16 16:45:57', '2019-02-06 22:41:19');

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of avaliacoes
-- ----------------------------
INSERT INTO `avaliacoes` VALUES ('5', '1', '2', '5', 'Ótimo curso o conteúdo foi bem passado pelo instrutor', '2018-12-27 12:01:52', '2018-12-27 12:01:52');
INSERT INTO `avaliacoes` VALUES ('7', '1', '1', '1', 'Teste de comentário1', '2019-02-08 09:18:04', '2019-02-08 09:18:07');
INSERT INTO `avaliacoes` VALUES ('8', '1', '1', '2', 'Teste de comentário2', '2019-02-08 09:18:04', '2019-02-08 09:18:07');
INSERT INTO `avaliacoes` VALUES ('9', '1', '1', '3', 'Teste de comentário3', '2019-02-08 09:18:04', '2019-02-08 09:18:07');
INSERT INTO `avaliacoes` VALUES ('10', '1', '1', '4', 'Teste de comentário4', '2019-02-08 09:18:04', '2019-02-08 09:18:07');
INSERT INTO `avaliacoes` VALUES ('11', '1', '1', '5', 'Teste de comentário5', '2019-02-08 09:18:04', '2019-02-08 09:18:07');
INSERT INTO `avaliacoes` VALUES ('12', '1', '1', '1', 'Teste de comentário6', '2019-02-08 09:18:04', '2019-02-08 09:18:07');
INSERT INTO `avaliacoes` VALUES ('13', '1', '1', '2', 'Teste de comentário7', '2019-02-08 09:18:04', '2019-02-08 09:18:07');
INSERT INTO `avaliacoes` VALUES ('14', '1', '1', '3', 'Teste de comentário8', '2019-02-08 09:18:04', '2019-02-08 09:18:07');
INSERT INTO `avaliacoes` VALUES ('15', '1', '1', '4', 'Teste de comentário9', '2019-02-08 09:18:04', '2019-02-08 09:18:07');
INSERT INTO `avaliacoes` VALUES ('16', '1', '1', '5', 'Teste de comentário10', '2019-02-08 09:18:04', '2019-02-08 09:18:07');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'JAVASCRIPT', '1', '2018-12-11 08:53:55', '2018-12-11 08:54:00');
INSERT INTO `categorias` VALUES ('4', 'NEGÓCIOS', '1', '2018-12-13 16:24:27', '2018-12-13 16:24:27');
INSERT INTO `categorias` VALUES ('5', 'INGLÊS', '1', '2018-12-27 22:38:23', '2018-12-27 22:38:23');

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
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of conteudos
-- ----------------------------
INSERT INTO `conteudos` VALUES ('1', 'Javascript Essencial - Conceitos iniciais', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ipHuSfOYhwA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0', '1', '2018-12-22 15:54:59', '2018-12-22 15:54:59');
INSERT INTO `conteudos` VALUES ('2', 'Javascript Essencial - Variáveis e tipos de dados', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZW02MWzZXPE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '1', '2018-12-22 16:03:30', '2018-12-22 16:03:30');
INSERT INTO `conteudos` VALUES ('3', 'Javascript Essencial - Funções', 'video', '1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TWmlIbvTjRo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2', '1', '2018-12-22 16:14:07', '2018-12-22 16:14:07');
INSERT INTO `conteudos` VALUES ('4', 'JavaScript Essencial - Objetos e Arrays', 'video', '2', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2sZerMlCzBM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0', '1', '2018-12-23 12:25:02', '2018-12-23 12:25:02');
INSERT INTO `conteudos` VALUES ('5', 'JavaScript Essencial - Strings e números', 'video', '2', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rDfpq25OP_Q\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '1', '2018-12-23 12:26:18', '2018-12-23 12:26:18');
INSERT INTO `conteudos` VALUES ('6', 'Javascript Essencial - Data e hora', 'video', '2', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/MPgVZzUBTlw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2', '1', '2018-12-23 12:30:06', '2018-12-23 12:33:02');
INSERT INTO `conteudos` VALUES ('7', 'Javascript Essencial - Estruturas de controle e repetição', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dJ88VdZMYKY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0', '1', '2018-12-23 12:32:28', '2018-12-23 12:32:28');
INSERT INTO `conteudos` VALUES ('8', 'Javascript Essencial - Tratamento de exceções', 'video', '3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/KpA6Idl9-a0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '1', '2018-12-23 12:34:25', '2018-12-23 12:34:25');
INSERT INTO `conteudos` VALUES ('9', 'Javascript Essencial - DOM parte 1', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mchmZKNBjLA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0', '1', '2018-12-23 12:36:14', '2018-12-23 12:36:14');
INSERT INTO `conteudos` VALUES ('10', 'Javascript Essencial - DOM parte 2', 'video', '4', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/zAPDX_IkNds\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '1', '2018-12-23 12:37:20', '2018-12-23 12:37:20');
INSERT INTO `conteudos` VALUES ('11', 'CURSO DE INGLÊS ONLINE - AULA 1', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/MN7Vm_g_ySs\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0', '1', '2018-12-27 22:41:48', '2018-12-27 22:41:48');
INSERT INTO `conteudos` VALUES ('12', 'CURSO DE INGLÊS ONLINE - AULA 2', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/AoZbRIdeGSU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '1', '2018-12-27 22:43:13', '2018-12-27 22:43:13');
INSERT INTO `conteudos` VALUES ('13', 'CURSO DE INGLÊS ONLINE - AULA 3', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wrlNJqvr1dU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2', '1', '2018-12-27 22:44:04', '2018-12-27 22:44:04');
INSERT INTO `conteudos` VALUES ('14', 'CURSO DE INGLÊS ONLINE - AULA 4', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-Toz2RtUEok\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '3', '1', '2018-12-27 22:44:46', '2018-12-27 22:44:46');
INSERT INTO `conteudos` VALUES ('15', 'CURSO DE INGLÊS ONLINE - AULA 5', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Ps0G62PR4Ks\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '4', '1', '2018-12-27 22:45:57', '2018-12-27 22:45:57');
INSERT INTO `conteudos` VALUES ('16', 'CURSO DE INGLÊS ONLINE - AULA 6', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/yfdcKf1KAhQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '5', '1', '2018-12-27 22:46:30', '2018-12-27 22:46:30');
INSERT INTO `conteudos` VALUES ('17', 'CURSO DE INGLÊS ONLINE - AULA 7', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/LPlBIzDp8hg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '6', '1', '2018-12-27 22:47:11', '2018-12-27 22:47:11');
INSERT INTO `conteudos` VALUES ('18', 'CURSO DE INGLÊS ONLINE - AULA 8', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/5ugkJAp6aK4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '7', '1', '2018-12-27 22:47:51', '2018-12-27 22:47:51');
INSERT INTO `conteudos` VALUES ('19', 'CURSO DE INGLÊS ONLINE - AULA 9 (Parte 1)', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HvNizuvZeN4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '8', '1', '2018-12-27 22:48:31', '2018-12-27 22:48:31');
INSERT INTO `conteudos` VALUES ('20', 'CURSO DE INGLÊS ONLINE - AULA 9 (Parte 2)', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4nhp03Ik_Vc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '9', '1', '2018-12-27 22:49:02', '2018-12-27 22:49:02');
INSERT INTO `conteudos` VALUES ('21', 'CURSO DE INGLÊS ONLINE - AULA 10', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-og9CiQTrqk\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '10', '1', '2018-12-27 22:49:53', '2018-12-27 22:49:53');
INSERT INTO `conteudos` VALUES ('22', 'CURSO DE INGLÊS ONLINE - AULA 11', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/13zh2LmENWg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '11', '1', '2018-12-27 22:50:32', '2018-12-27 22:50:32');
INSERT INTO `conteudos` VALUES ('23', 'CURSO DE INGLÊS ONLINE - AULA 12', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/A_7i4HmPU8s\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '12', '1', '2018-12-27 22:51:05', '2018-12-27 22:51:05');
INSERT INTO `conteudos` VALUES ('24', 'CURSO DE INGLÊS ONLINE - AULA 13', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/jimidh3O1XA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '13', '1', '2018-12-27 22:51:36', '2018-12-27 22:51:36');
INSERT INTO `conteudos` VALUES ('25', 'CURSO DE INGLÊS ONLINE - AULA 14 (+LIVE)', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/3gDuGEsqBHE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '14', '1', '2018-12-27 22:52:11', '2018-12-27 22:52:11');
INSERT INTO `conteudos` VALUES ('27', 'Prova IHC', 'anexo', '6', 'cf038edbacb023c9fd726ba0a9983f36.pdf', '0', '1', '2019-01-29 21:32:36', '2019-01-29 21:32:36');
INSERT INTO `conteudos` VALUES ('28', 'Teste Excel', 'anexo', '6', '8f4403f77299d16434dd7b8468f5c8c6.xlsx', '1', '1', '2019-02-01 21:40:02', '2019-02-01 21:40:02');
INSERT INTO `conteudos` VALUES ('29', 'Otimização de Acessos', 'anexo', '6', 'd4396c8d42c051c2b056216f06beb7f5.pdf', '3', '1', '2019-02-01 21:50:34', '2019-02-01 21:50:34');
INSERT INTO `conteudos` VALUES ('30', 'Falando sobre o Angular 2', 'anexo', '1', 'd7f14800f9de25c282d774fe4898f586.mp4', '3', '1', '2019-02-06 18:35:17', '2019-02-07 11:13:02');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of conteudos_realizados
-- ----------------------------
INSERT INTO `conteudos_realizados` VALUES ('1', '2', '1', '2018-12-24 12:18:25', '2018-12-24 12:18:25');
INSERT INTO `conteudos_realizados` VALUES ('2', '2', '2', '2018-12-24 12:35:15', '2018-12-24 12:35:15');
INSERT INTO `conteudos_realizados` VALUES ('3', '2', '3', '2018-12-24 12:35:24', '2018-12-24 12:35:24');
INSERT INTO `conteudos_realizados` VALUES ('4', '2', '4', '2018-12-24 12:35:33', '2018-12-24 12:35:33');
INSERT INTO `conteudos_realizados` VALUES ('5', '2', '5', '2018-12-24 12:35:41', '2018-12-24 12:35:41');
INSERT INTO `conteudos_realizados` VALUES ('6', '2', '6', '2018-12-24 12:36:11', '2018-12-24 12:36:11');
INSERT INTO `conteudos_realizados` VALUES ('7', '2', '7', '2018-12-24 12:37:14', '2018-12-24 12:37:14');
INSERT INTO `conteudos_realizados` VALUES ('8', '1', '11', '2018-12-27 22:55:37', '2018-12-27 22:55:37');
INSERT INTO `conteudos_realizados` VALUES ('9', '1', '1', '2019-01-16 21:29:32', '2019-01-16 21:29:32');
INSERT INTO `conteudos_realizados` VALUES ('10', '1', '27', '2019-01-29 21:33:56', '2019-01-29 21:33:56');
INSERT INTO `conteudos_realizados` VALUES ('11', '1', '29', '2019-02-01 21:52:04', '2019-02-01 21:52:04');
INSERT INTO `conteudos_realizados` VALUES ('12', '1', '28', '2019-02-01 21:52:16', '2019-02-01 21:52:16');
INSERT INTO `conteudos_realizados` VALUES ('13', '1', '12', '2019-02-01 21:56:56', '2019-02-01 21:56:56');
INSERT INTO `conteudos_realizados` VALUES ('14', '1', '3', '2019-02-06 21:43:22', '2019-02-06 21:43:22');
INSERT INTO `conteudos_realizados` VALUES ('15', '1', '4', '2019-02-06 21:44:01', '2019-02-06 21:44:01');
INSERT INTO `conteudos_realizados` VALUES ('16', '1', '30', '2019-02-06 21:45:28', '2019-02-06 21:45:28');
INSERT INTO `conteudos_realizados` VALUES ('17', '1', '8', '2019-02-06 22:21:01', '2019-02-06 22:21:01');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cursos
-- ----------------------------
INSERT INTO `cursos` VALUES ('1', 'Javacript Essencial', 'RBTech', '1', 'javascipt, essencial', '1', '2018-12-22 15:46:55', '2018-12-22 15:46:55');
INSERT INTO `cursos` VALUES ('2', 'CURSO DE INGLÊS ONLINE', 'Mais Língua Concept', '5', 'ingles', '1', '2018-12-27 22:39:24', '2018-12-27 22:39:24');

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
INSERT INTO `inscricoes` VALUES ('1', '2', '1', '2018-12-23 12:54:40', '2018-12-23 12:54:40');
INSERT INTO `inscricoes` VALUES ('2', '1', '2', '2018-12-27 22:54:51', '2018-12-27 22:54:51');
INSERT INTO `inscricoes` VALUES ('3', '1', '1', '2019-01-09 12:33:40', '2019-01-09 12:33:40');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');

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
INSERT INTO `modulos` VALUES ('1', 'Conceitos Iniciais', '1', '0', '1', '2018-12-22 15:52:55', '2018-12-22 15:52:55');
INSERT INTO `modulos` VALUES ('2', 'Objetos e arrays', '1', '1', '1', '2018-12-23 12:22:58', '2018-12-23 12:22:58');
INSERT INTO `modulos` VALUES ('3', 'Estruturas de controle e repetição', '1', '2', '1', '2018-12-23 12:31:16', '2018-12-23 12:31:16');
INSERT INTO `modulos` VALUES ('4', 'DOM', '1', '3', '1', '2018-12-23 12:35:31', '2018-12-23 12:35:31');
INSERT INTO `modulos` VALUES ('5', 'Aulas', '2', '0', '1', '2018-12-27 22:40:39', '2018-12-27 22:40:39');
INSERT INTO `modulos` VALUES ('6', 'Apostilas', '1', '3', '1', '2019-01-29 21:28:44', '2019-01-29 21:30:01');

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
INSERT INTO `password_resets` VALUES ('emaildobrenomol@gmail.com', '$2y$10$ym758aQV/n2dYAcDVwIfMe2TxM24kUcChdZDpkclXNJfSffEqjAzG', '2018-12-19 18:46:26');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of perguntas
-- ----------------------------
INSERT INTO `perguntas` VALUES ('2', '<p>As tags XML que delimitam um c&oacute;digo Javascript s&atilde;o:</p>', '2', '1', '2019-01-16 16:51:07', '2019-02-06 22:41:20');
INSERT INTO `perguntas` VALUES ('3', '<p>A linguagem HTML 4.0 adicionou a capacidade de determinados eventos dispararem a&ccedil;&otilde;es em um navegador web. Por exemplo, o atributo onload permite que um script seja executado no momento em que um documento HTML &eacute; &quot;carregado&quot; pelo navegador web. Na HTML 4.0, o atributo onload deve ser utilizado, portanto, com o elemento:</p>', '2', '1', '2019-01-19 19:19:39', '2019-02-06 22:41:22');
INSERT INTO `perguntas` VALUES ('4', '<p>No comando apresentado, s&atilde;o encontrados fragmentos de um programa escrito em JavaScript, ou seja, n&atilde;o est&aacute; completo nem funcional. Com base nessas informa&ccedil;&otilde;es, assinale a op&ccedil;&atilde;o correta, relativa ao conceito de orienta&ccedil;&atilde;o a objetos que &eacute; diretamente invocado pelo comando&nbsp;<strong>AlunoMestrado.prototype = Object.create(Aluno.prototype);</strong></p>\r\n\r\n<p><img alt=\"Imagem da Questão\" src=\"https://www.gabaritou.com.br/Content/UploadedFiles/Questao/questao-92279-tre-rs-2015-cespe-cargo-40308-especialidade-30621-img_01.png\" /></p>', '2', '1', '2019-02-05 18:59:40', '2019-02-06 22:41:23');
INSERT INTO `perguntas` VALUES ('5', '<p>No comando apresentado, s&atilde;o encontrados fragmentos de um programa escrito em JavaScript, ou seja, n&atilde;o est&aacute; completo nem funcional. Com base nessas informa&ccedil;&otilde;es, assinale a op&ccedil;&atilde;o correta, relativa ao conceito de orienta&ccedil;&atilde;o a objetos que &eacute; diretamente invocado pelo comando&nbsp;<strong>AlunoMestrado.prototype = Object.create(Aluno.prototype);</strong>.</p>\r\n\r\n<p><img alt=\"Imagem da Questão\" src=\"https://www.gabaritou.com.br/Content/UploadedFiles/Questao/questao-92279-tre-rs-2015-cespe-cargo-40308-especialidade-30621-img_01.png\" /></p>', '2', '1', '2019-02-06 13:15:28', '2019-02-06 22:41:25');
INSERT INTO `perguntas` VALUES ('6', '<p>Um navegador web, para executar um c&oacute;digo Javascript, utiliza um</p>', '2', '1', '2019-02-06 13:22:15', '2019-02-06 22:41:27');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of respostas
-- ----------------------------
INSERT INTO `respostas` VALUES ('1', '1', '2', '2', '6', '1', '2019-01-22 21:36:27', '2019-01-22 21:50:21');
INSERT INTO `respostas` VALUES ('2', '1', '2', '3', '9', '1', '2019-01-22 21:38:19', '2019-01-22 21:47:43');
INSERT INTO `respostas` VALUES ('3', '2', '2', '2', '5', '1', '2019-01-24 18:24:25', '2019-01-24 18:24:25');
INSERT INTO `respostas` VALUES ('4', '2', '2', '3', '9', '1', '2019-01-24 18:24:39', '2019-01-24 18:24:39');
INSERT INTO `respostas` VALUES ('5', '3', '2', '2', '5', '1', '2019-01-24 18:34:48', '2019-01-24 18:34:48');
INSERT INTO `respostas` VALUES ('6', '4', '2', '3', '10', '1', '2019-01-24 18:41:50', '2019-01-24 18:42:05');
INSERT INTO `respostas` VALUES ('7', '7', '2', '2', '5', '2', '2019-01-26 17:21:14', '2019-01-26 17:21:14');
INSERT INTO `respostas` VALUES ('8', '7', '2', '3', '9', '2', '2019-01-26 17:21:33', '2019-01-26 17:21:33');
INSERT INTO `respostas` VALUES ('9', '8', '2', '2', '6', '2', '2019-01-26 17:33:33', '2019-01-26 17:33:33');
INSERT INTO `respostas` VALUES ('10', '8', '2', '3', '11', '2', '2019-01-26 17:33:36', '2019-01-26 17:33:36');
INSERT INTO `respostas` VALUES ('11', '6', '2', '4', '13', '1', '2019-02-06 12:55:57', '2019-02-06 12:55:57');
INSERT INTO `respostas` VALUES ('12', '6', '2', '3', '9', '1', '2019-02-06 12:56:01', '2019-02-06 12:56:01');
INSERT INTO `respostas` VALUES ('13', '6', '2', '2', '6', '1', '2019-02-06 12:56:05', '2019-02-06 12:56:05');
INSERT INTO `respostas` VALUES ('14', '9', '2', '2', '6', '1', '2019-02-06 22:48:37', '2019-02-06 22:48:37');
INSERT INTO `respostas` VALUES ('15', '9', '2', '3', '9', '1', '2019-02-06 22:48:40', '2019-02-06 22:48:40');
INSERT INTO `respostas` VALUES ('16', '9', '2', '4', '13', '1', '2019-02-06 22:48:43', '2019-02-06 22:48:43');
INSERT INTO `respostas` VALUES ('17', '9', '2', '5', '17', '1', '2019-02-06 22:48:52', '2019-02-06 22:48:52');
INSERT INTO `respostas` VALUES ('18', '9', '2', '6', '21', '1', '2019-02-06 22:49:24', '2019-02-06 22:49:24');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tentativas
-- ----------------------------
INSERT INTO `tentativas` VALUES ('1', '2', '1', '5.00', '2019-01-19 18:26:33', '2019-01-24 18:04:57', '2019-01-24 18:04:57');
INSERT INTO `tentativas` VALUES ('2', '2', '1', '10.00', '2019-01-24 18:06:18', '2019-01-24 18:24:54', '2019-01-24 18:24:54');
INSERT INTO `tentativas` VALUES ('3', '2', '1', '5.00', '2019-01-24 18:27:23', '2019-01-24 18:34:57', '2019-01-24 18:34:57');
INSERT INTO `tentativas` VALUES ('4', '2', '1', '0.00', '2019-01-24 18:36:14', '2019-01-24 18:42:20', '2019-01-24 18:42:20');
INSERT INTO `tentativas` VALUES ('5', '2', '1', '0.00', '2019-01-24 18:43:16', '2019-01-24 18:43:55', '2019-01-24 18:43:55');
INSERT INTO `tentativas` VALUES ('6', '2', '1', '10.00', '2019-01-24 18:48:18', '2019-02-06 12:56:09', '2019-02-06 12:56:09');
INSERT INTO `tentativas` VALUES ('7', '2', '2', '10.00', '2019-01-26 17:15:57', '2019-01-26 17:21:54', '2019-01-26 17:21:54');
INSERT INTO `tentativas` VALUES ('8', '2', '2', '0.00', '2019-01-26 17:27:52', '2019-01-26 17:33:44', '2019-01-26 17:33:44');
INSERT INTO `tentativas` VALUES ('9', '2', '1', '15.00', '2019-02-06 13:19:54', '2019-02-06 22:49:45', '2019-02-06 22:49:45');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Breno Mol', 'emaildobrenomol@gmail.com', '$2y$10$7kIesuGtrPVkePS1qEDxj.HMU5a.rY9dIbG24UDNvd3S2eMbtzT6e', 'admin', 'p0PpACdyKGsEcIxqf2w4KXoXFIz4sreCEZmjpjTTuzWo2860gaKwZSUvyBYv', '2018-12-08 14:47:01', '2018-12-18 21:24:38');
INSERT INTO `users` VALUES ('2', 'JOAO SILVA', 'breno.mol@pbh.gov.br', '$2y$10$fHbzr/36YvNmKEsCr86hQu9IRCJSs6uJnclbUTd4CzrWnlgxrMLwy', 'user', 'A8vy5CoivzxIe6i7yJbSAVv9oE2IFLVGxTivp6LbQXSqUibEdS4X3HoA5Tmd', '2018-12-12 16:05:58', '2018-12-13 11:58:06');
INSERT INTO `users` VALUES ('3', 'Sebastião da Silva', 'sebastiao@gmail.com', '$2y$10$fHbzr/36YvNmKEsCr86hQu9IRCJSs6uJnclbUTd4CzrWnlgxrMLwy', 'user', 'jn1Fpi1CD2FlI07OIqRDf4r2OrIrkqGiWmwH0cooGvaAhRVkwrbY1ruMUpPT', '2018-12-26 22:53:37', '2018-12-26 22:53:37');
INSERT INTO `users` VALUES ('4', 'Lucas', 'lucas@gmail.com', '$2y$10$mznU3Ro93eoJxkSbT7xpo.q2ToQYf31/rUphEZGVh/OlJznzwgcoa', 'user', null, '2018-12-26 23:21:37', '2018-12-26 23:21:37');
INSERT INTO `users` VALUES ('5', 'JOAO DE DEUS', 'joao@email.com', '$2y$10$MkmKdiHGgu8BXC/PUbfFvOyP3YnnNPq7d5PLDumFWBufnLutwuWgW', 'user', null, '2018-12-27 16:52:29', '2018-12-27 16:52:29');
