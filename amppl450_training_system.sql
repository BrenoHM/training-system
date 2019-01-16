/*
Navicat MySQL Data Transfer

Source Server         : AMPPLIE
Source Server Version : 50641
Source Host           : 108.179.253.175:3306
Source Database       : amppl450_training_system

Target Server Type    : MYSQL
Target Server Version : 50641
File Encoding         : 65001

Date: 2019-01-15 08:49:09
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of alternativas
-- ----------------------------
INSERT INTO `alternativas` VALUES ('1', 'body', '1', '1', '2019-01-09 12:06:43', '2019-01-09 12:06:43');
INSERT INTO `alternativas` VALUES ('2', 'document', '1', '0', '2019-01-09 12:06:44', '2019-01-09 12:06:44');
INSERT INTO `alternativas` VALUES ('3', 'head', '1', '0', '2019-01-09 12:06:44', '2019-01-09 12:06:44');
INSERT INTO `alternativas` VALUES ('4', 'page', '1', '0', '2019-01-09 12:06:44', '2019-01-09 12:06:44');
INSERT INTO `alternativas` VALUES ('5', '<script> e o </script>', '2', '1', '2019-01-09 12:18:02', '2019-01-09 12:18:02');
INSERT INTO `alternativas` VALUES ('6', '<javascript> e o </javascript>', '2', '0', '2019-01-09 12:18:02', '2019-01-09 12:18:02');
INSERT INTO `alternativas` VALUES ('7', '<java> e o </java>', '2', '0', '2019-01-09 12:18:03', '2019-01-09 12:18:03');
INSERT INTO `alternativas` VALUES ('8', '<css></css>', '2', '0', '2019-01-09 12:18:03', '2019-01-09 12:18:03');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of anotacoes
-- ----------------------------
INSERT INTO `anotacoes` VALUES ('2', '1', '2', 'anotou', '2018-12-27 16:08:19', '2018-12-27 16:16:57');
INSERT INTO `anotacoes` VALUES ('3', '2', '2', 'Variáveis do tipo inteiro, booleano, float.', '2018-12-28 18:24:18', '2018-12-28 18:24:18');

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
INSERT INTO `atividades` VALUES ('1', 'Exercícios sobre conceitos iniciais', '1', '1', '2019-01-03 16:13:24', '2019-01-03 16:13:24');
INSERT INTO `atividades` VALUES ('2', 'Exercício de revisão', '1', '1', '2019-01-03 16:51:51', '2019-01-03 16:51:51');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of avaliacoes
-- ----------------------------
INSERT INTO `avaliacoes` VALUES ('5', '1', '2', '5', 'Ótimo curso o conteúdo foi bem passado pelo instrutor', '2018-12-27 12:01:52', '2018-12-27 12:01:52');
INSERT INTO `avaliacoes` VALUES ('6', '2', '1', '3', 'Até agora assisti a primeira aula e achei bacana!', '2018-12-28 18:44:50', '2018-12-28 18:44:50');

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
INSERT INTO `categorias` VALUES ('3', 'DESENVOLVIMENTO', '1', '2018-12-11 17:13:23', '2018-12-11 17:13:23');
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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
INSERT INTO `conteudos` VALUES ('26', 'CURSO DE INGLÊS ONLINE - AULA 15', 'video', '5', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ywWk9hxw8Vw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '15', '1', '2018-12-27 22:52:46', '2018-12-27 22:52:46');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of modulos
-- ----------------------------
INSERT INTO `modulos` VALUES ('1', 'Conceitos Iniciais', '1', '0', '1', '2018-12-22 15:52:55', '2018-12-22 15:52:55');
INSERT INTO `modulos` VALUES ('2', 'Objetos e arrays', '1', '1', '1', '2018-12-23 12:22:58', '2018-12-23 12:22:58');
INSERT INTO `modulos` VALUES ('3', 'Estruturas de controle e repetição', '1', '2', '1', '2018-12-23 12:31:16', '2018-12-23 12:31:16');
INSERT INTO `modulos` VALUES ('4', 'DOM', '1', '3', '1', '2018-12-23 12:35:31', '2018-12-23 12:35:31');
INSERT INTO `modulos` VALUES ('5', 'Aulas', '2', '0', '1', '2018-12-27 22:40:39', '2018-12-27 22:40:39');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of perguntas
-- ----------------------------
INSERT INTO `perguntas` VALUES ('1', 'A linguagem HTML 4.0 adicionou a capacidade de determinados eventos dispararem ações em um navegador web. Por exemplo, o atributo onload permite que um script seja executado no momento em que um documento HTML é \"carregado\" pelo navegador web. Na HTML 4.0, o atributo onload deve ser utilizado, portanto, com o elemento', '1', '1', '2019-01-09 12:06:43', '2019-01-09 12:06:43');
INSERT INTO `perguntas` VALUES ('2', 'As tags XML que delimitam um código Javascript são:', '1', '1', '2019-01-09 12:18:01', '2019-01-09 12:18:01');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of respostas
-- ----------------------------

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
  PRIMARY KEY (`idTentativa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tentativas
-- ----------------------------

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
INSERT INTO `users` VALUES ('1', 'Breno Mol', 'emaildobrenomol@gmail.com', '$2y$10$7kIesuGtrPVkePS1qEDxj.HMU5a.rY9dIbG24UDNvd3S2eMbtzT6e', 'admin', 'NkJNxWmc28S0ZNbnySDsSnVB5RLmRQI2y1UguNYlK02Uuauet5U9CY6NBlaF', '2018-12-08 14:47:01', '2018-12-18 21:24:38');
INSERT INTO `users` VALUES ('2', 'JOAO SILVA', 'breno.mol@pbh.gov.br', '$2y$10$fHbzr/36YvNmKEsCr86hQu9IRCJSs6uJnclbUTd4CzrWnlgxrMLwy', 'user', 'mNtzRGP9OsNxwjuFpOLrWl2XVOMw3qudIWYSJVurkW1ak2qcIiM02N8eY4Ux', '2018-12-12 16:05:58', '2018-12-13 11:58:06');
INSERT INTO `users` VALUES ('3', 'Sebastião da Silva', 'sebastiao@gmail.com', '$2y$10$vcBpW7vaeTv0oiExpK9qFuH07Dugbt0sFqILmq.vGzZ37l5gTJ8Ze', 'user', 'jn1Fpi1CD2FlI07OIqRDf4r2OrIrkqGiWmwH0cooGvaAhRVkwrbY1ruMUpPT', '2018-12-26 22:53:37', '2018-12-26 22:53:37');
INSERT INTO `users` VALUES ('4', 'Lucas', 'lucas@gmail.com', '$2y$10$mznU3Ro93eoJxkSbT7xpo.q2ToQYf31/rUphEZGVh/OlJznzwgcoa', 'user', null, '2018-12-26 23:21:37', '2018-12-26 23:21:37');
INSERT INTO `users` VALUES ('5', 'JOAO DE DEUS', 'joao@email.com', '$2y$10$MkmKdiHGgu8BXC/PUbfFvOyP3YnnNPq7d5PLDumFWBufnLutwuWgW', 'user', null, '2018-12-27 16:52:29', '2018-12-27 16:52:29');
