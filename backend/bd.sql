create schema brasilturista;

use brasilturista;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `cpf` char(11) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `sexo` char(1) NOT NULL,
  `senha` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cidades` (
  `id_cidade` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_estado` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descritivo` text NOT NULL,
  `foto` varchar(37) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cidade_tipo_turismo` (
  `id_cidade_tipo_turismo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_cidade` int(11) NOT NULL,
  `id_tipo_turismo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `nome` varchar(19) DEFAULT NULL,
  `sigla` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `estados` (`id_estado`, `nome`, `sigla`) VALUES
(1, 'Acre', 'AC'),
(2, 'Alagoas', 'AL'),
(3, 'Amazonas', 'AM'),
(4, 'Amapá', 'AP'),
(5, 'Bahia', 'BA'),
(6, 'Ceará', 'CE'),
(7, 'Distrito Federal', 'DF'),
(8, 'Espírito Santo', 'ES'),
(9, 'Goiás', 'GO'),
(10, 'Maranhão', 'MA'),
(11, 'Minas Gerais', 'MG'),
(12, 'Mato Grosso do Sul', 'MS'),
(13, 'Mato Grosso', 'MT'),
(14, 'Pará', 'PA'),
(15, 'Paraíba', 'PB'),
(16, 'Pernambuco', 'PE'),
(17, 'Piauí', 'PI'),
(18, 'Paraná', 'PR'),
(19, 'Rio de Janeiro', 'RJ'),
(20, 'Rio Grande do Norte', 'RN'),
(21, 'Rondônia', 'RO'),
(22, 'Roraima', 'RR'),
(23, 'Rio Grande do Sul', 'RS'),
(24, 'Santa Catarina', 'SC'),
(25, 'Sergipe', 'SE'),
(26, 'São Paulo', 'SP'),
(27, 'Tocantins', 'TO');

CREATE TABLE `experiencias` (
  `id_experiencia` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_ponto_turistico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pontos_turisticos` (
  `id_pontos_turisticos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `preço` decimal(10,0) NOT NULL,
  `foto` varchar(37) NOT NULL,
  `descritivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tipo_turismo` (
  `id_tipo_turismo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `descritivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tipo_turismo` (`id_tipo_turismo`, `nome`, `descritivo`) VALUES
(1, 'Turismo de Negócios', 'O turismo de negócios tem as grandes metrópoles como sede, em função da sua infraestrutura diferenciada para acomodar um maior número de pessoas durante um período concentrado de tempo.'),
(2, 'Turismo Gastronômico', 'Voltado para os amantes da culinária, o turismo gastronômico é ótimo para pessoas dispostas a experimentar diferentes temperos e pratos típicos dos mais variados países.'),
(3, 'Turismo de Saúde', 'Destinos turísticos que oferecem benefícios à saúde e ao bem-estar. Esses lugares são verdadeiros refúgios.'),
(4, 'Turismo Religioso', 'Turismo voltado a trabalhar a parte espiritual.'),
(5, 'Turismo Cultural', 'Turismo voltado para aquela experiência que a pessoa se propõe a conhecer verdadeiramente a cultura, os hábitos e os costumes de uma região.'),
(6, 'Turismo de Eventos', 'Turismo voltado a grandes eventos'),
(7, 'Turismo Rural', 'Turismo ideal para Ideal para quem aprecia aquele contato mais próximo com a natureza e sentir o cheiro de terra molhada.'),
(8, 'Turismo Náutico', 'Turismo para os amantes de esportes náuticos'),
(9, 'Turismo de Aventura', 'Turismo para prática esportiva em meio a natureza ou em perímetro urbano'),
(10, 'Ecoturismo', 'Turismo para prática esportiva em meio a natureza ou simplesmente para observação'),
(11, 'Sol e Praia', 'Turismo de cidades litoraneas');


