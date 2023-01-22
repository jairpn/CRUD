CREATE TABLE `mercados` (
  `idmercados` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `local` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nome_fantasia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idmercados`,`nome`,`local`,`nome_fantasia`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
