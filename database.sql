create database vaicrud1;

use vaicrud1;

CREATE TABLE `usuarios` (
  `cod` int(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod`);
  
  ALTER TABLE `usuarios`
  MODIFY `cod` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32448;
  
  INSERT INTO `usuarios` (`cod`, `nom`, `correo`, `tel`) VALUES
(32412, 'VaidrollTeam', 'correo@gmail.com', 123456789),
(32413, 'VaidrollTeam2', 'correo2@gmail.com', 342568124),
(32414, 'VaidrollTeam3', 'corre3@hotmail.com', 134653246),
(32425, 'VaidrollTeam4', 'corre4@gmail.com', 2147483647),
(32447, 'UsuarioTest', 'vai@gmail.com', 111111111);