CREATE DATABASE `elvalecito`;

CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
-- elvalecito.menu definition

CREATE TABLE `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `producto` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `categoriaId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoriaId` (`categoriaId`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`categoriaId`) REFERENCES `categorias` (`id`)
) ;
-- elvalecito.usuarios definition

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO usuarios (user, password) VALUES ('geovanni.vera23@gmail.com', '$2y$10$FK3F.YSC2Yg.PAibj2xq3OEauRsVgT55b3AjYNkDrq0FIyY7tmYR.');


INSERT INTO categorias (categoria)
VALUES
('hamburguesas'),
('hotdogs'),
('alitas'),
('boneless'),
('costillas'),
('banderillas'),
('acompañamientos'),
('bebidas'),
('malteadas'),
('soda italiana');




INSERT INTO menu (producto, precio, descripcion, categoriaId)
VALUES
('clasica', 65.00, 'Hamburguesa con papas a la francesa', 1),
('hawaiana', 80.00, 'Hamburguesa con papas a la francesa', 1),
('chiken burguer', 65.00, 'Hamburguesa con papas a la francesa', 1),
('doble carne', 80.00, 'Hamburguesa con papas a la francesa', 1),
('carnes frias', 80.00, 'Hamburguesa con papas a la francesa', 1),
('sencillo', 25.00, 'hot dog sencillo', 2),
('tocino', 30.00, 'hotdog con tocino', 2),
('especial', 35.00, 'hotdog especial', 2),
('bbq', 65.00, 'alitas bañadas en salsa bbq', 3),
('buffalo', 65.00, 'alitas bañadas en salsa buffalo', 3),
('mango habanero', 65.00, 'alitas bañadas en salsa de mango habanero', 3),
('bbq', 70.00, 'boneless bañadas en salsa bbq', 4),
('bbq', 80.00, 'costillas bañadas en salsa bbq', 5),
('refresco', 29.00, 'Lata de Cocacola de 355 ml', 8),
('malteada de fresa', 50.00, 'Malteada sabor a fresa de 355ml', 9),
('soda de mora azul', 50.00, 'soda de mora azul', 10),
('papas a la francesa', 35.00, 'papas a la francesa', 7),
('mango habanero', 70.00, 'boneless bañados en salsa habanero', 4),
('bufalo', 70.00, 'boneless con toping de salsa buffalo', 4),
('costillas de elote', 60.00, 'Costillas de elote', 5),
('flaming hot', 25.00, 'banderilla coreana sabor flaming hot', 6),
('ramen', 25.00, 'banderilla coreana sabor ramen', 6),
('papas', 25.00, 'banderilla coreana sabor a papas', 6),
('te helado', 30.00, 'te helado', 8),
('agua natural', 20.00, 'botella de agua', 8),
('mango', 50.00, 'soda italiana sabor a mango', 10),
('manzana verde', 50.00, 'soda italiana sabor manzana verde', 10),
('frutos rojos', 50.00, 'soda italiana sabor a frutos rojos', 10),
('fresa', 50.00, 'soda italiana sabor a fresa', 10),
('vainilla', 50.00, 'malteada de vainilla', 9),
('chocolate', 50.00, 'malteada de chocolate', 9),
('gansito', 65.00, 'malteada especial sabor a gansito', 9),
('chocoroll', 65.00, 'malteada sabor gansito', 9),
('tiramisu', 65.00, 'malteada sabor tiramisu', 9),
('piñacolada', 65.00, 'malteada sabor piñacolada', 9),
('salchitacos', 25.00, 'tacos fritos de salchicha', 7),
('topping de salsa', 10.00, 'salsa bbq, bufalo o habanero', 7);
