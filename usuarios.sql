CREATE TABLE `usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(20) NOT NULL,
  `apellido` VARCHAR(20) NOT NULL,
  `fecha_nacimiento` INT(3) NOT NULL,
  `correo` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `contrasenya` VARCHAR(255) NOT NULL,
  `comentario` TEXT NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `usuarios` (`nombre`, `apellido`, `fecha_nacimiento`, `correo`, `telefono`, `contrasenya`, `comentario`) VALUES ('ValorNombre', 'ValorApellido', 'ValorFechaNacimiento', 'ValorCorreo', 'ValorTelefono', 'ValorContrasenya', 'ValorComentario');
