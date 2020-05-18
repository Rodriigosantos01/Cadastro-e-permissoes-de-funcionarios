-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.11-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela sistema.empresas
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL DEFAULT '0',
  `email` varchar(250) NOT NULL DEFAULT '0' COMMENT 'email para contato',
  `cpf_cnpj` int(11) NOT NULL DEFAULT 0,
  `cep` int(11) NOT NULL DEFAULT 0,
  `endereco` varchar(250) NOT NULL DEFAULT '0',
  `numero` varchar(50) NOT NULL DEFAULT '0',
  `complemento` varchar(150) NOT NULL DEFAULT '0',
  `bairro` varchar(150) NOT NULL DEFAULT '0',
  `cidade` varchar(50) NOT NULL DEFAULT '0',
  `estado` varchar(2) NOT NULL DEFAULT '0',
  `date_create` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data que foi cadastrado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela sistema.permissoes
DROP TABLE IF EXISTS `permissoes`;
CREATE TABLE IF NOT EXISTS `permissoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL DEFAULT 0,
  `descricao` varchar(50) NOT NULL DEFAULT '0',
  `new_funcionario` int(11) NOT NULL DEFAULT 0 COMMENT '0=não pode cadastrar funcionários, 1=pode cadastrar funcionarios',
  `view_funcionario` int(11) NOT NULL DEFAULT 0 COMMENT '0=não pode ver lista de funcionários, 1=pode ver a lista de funcionários',
  `edit_funcionario` int(11) NOT NULL DEFAULT 0 COMMENT '0=não pode editar funcionários, 1=pode editar funcionarios',
  `del_funcionario` int(11) NOT NULL DEFAULT 0 COMMENT '0=não pode deletar funcionários, 1=pode deletar funcionarios',
  `new_config` int(11) NOT NULL DEFAULT 0 COMMENT '0=não pode cadastrar permissao, 1=pode cadastrar confguração',
  `view_config` int(11) NOT NULL DEFAULT 0 COMMENT '0=não pode ver lista permissao, 1=pode ver listaconfguração',
  `edit_config` int(11) NOT NULL DEFAULT 0 COMMENT '0=não pode editarpermissao, 1=pode editar confguração',
  `del_config` int(11) NOT NULL DEFAULT 0 COMMENT '0=não pode deletarpermissao, 1=pode deletar confguração',
  `id_status` int(11) NOT NULL DEFAULT 1 COMMENT '1=ativo, 2=inativo, 3=deletado',
  `date_create` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data que foi cadastrado',
  `date_delete` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data que foi deletado',
  `id_user_del` int(11) NOT NULL DEFAULT 0 COMMENT 'id de quem deletou',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela sistema.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL DEFAULT 0 COMMENT 'id da empresa vinculada',
  `id_nivel` int(11) NOT NULL DEFAULT 0 COMMENT '1=master, 2=funcionario, 3=cliente',
  `id_permissao` int(11) NOT NULL DEFAULT 0 COMMENT 'id da permissão do funcionario',
  `nome` varchar(150) NOT NULL DEFAULT '0',
  `email` varchar(250) NOT NULL DEFAULT '0' COMMENT 'email para login',
  `senha` varchar(250) NOT NULL DEFAULT '0',
  `cpf_cnpj` varchar(50) NOT NULL DEFAULT '0',
  `cep` varchar(50) NOT NULL DEFAULT '0',
  `endereco` varchar(250) NOT NULL DEFAULT '0',
  `numero` varchar(50) NOT NULL DEFAULT '0',
  `complemento` varchar(150) NOT NULL DEFAULT '',
  `bairro` varchar(150) NOT NULL DEFAULT '0',
  `cidade` varchar(50) NOT NULL DEFAULT '0',
  `estado` varchar(2) NOT NULL DEFAULT '0',
  `date_create` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data que foi cadastrado',
  `date_delete` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'data que foi deletado',
  `id_status` int(11) NOT NULL DEFAULT 1 COMMENT '1=ativo, 2=inativo, 3=deletado',
  `id_user_del` int(11) NOT NULL DEFAULT 0 COMMENT 'id de quem deletou',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
