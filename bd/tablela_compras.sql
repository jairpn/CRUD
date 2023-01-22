CREATE TABLE `compras` (
  `idcompras` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_mercado` int(11) NOT NULL,
  `valor_unitario` decimal(6,2) NOT NULL,
  `data_compra` date NOT NULL,
  PRIMARY KEY (`idcompras`,`nome`,`id_mercado`,`valor_unitario`,`data_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
