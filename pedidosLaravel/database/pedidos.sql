INSERT INTO usuarios (nombre, apellidos, nick, email,  passwrd,  fecha_nacimiento, avatar, fecha_alta, activo, intentos, `control`)
VALUES
  ('Juan', 'Pérez', 'juanp', 'juanperez@example.com',  '123456',  '1990-01-01', 'avatar1.jpg', '2022-03-01', 1, 0, 0.0),
  ('Ana', 'García', 'anag', 'anagarcia@example.com',  'abcdef',  '1995-05-15', 'avatar2.jpg', '2022-03-05', 1, 0, 0.0),
  ('Pedro', 'Martínez', 'pedrom', 'pedromartinez@example.com',  'qwerty',  '1985-12-25', 'avatar3.jpg', '2022-03-10', 0, 2, 1.5),
  ('María', 'Sánchez', 'marias', 'mariasanchez@example.com',  'zxcvbn',  '2000-06-30', 'avatar4.jpg', '2022-03-15', 1, 0, 3.14),
  ('Carlos', 'González', 'carlosg', 'carlosgonzalez@example.com',  '123abc',  '1998-09-12', 'avatar5.jpg', '2022-03-20', 0, 5, 2.0);

INSERT INTO administradores (usuario, nombre, contrasea, superadmin, productos, pedidos, almacen, reparto, activo)
VALUES
  ('admin@gmail.com', 'Administrador', '123456', 1, 1, 1, 1, 1, 1),
  ('johndoe@gmail.com', 'John Doe', 'abcdef', 0, 1, 1, 0, 0, 1),
  ('janedoe@gmail.com', 'Jane Doe', 'qwerty', 0, 1, 0, 1, 0, 0),
  ('jimmy@gmail.com', 'Jimmy Carter', 'password', 0, 0, 1, 0, 1, 1),
  ('sarah@gmail.com', 'Sarah Johnson', 'letmein', 0, 1, 0, 0, 1, 1);


INSERT INTO administradores_entradas (id_usuario, fecha, hora)
VALUES
  (1, '2023-03-27', '10:30:00'),
  (2, '2023-03-26', '15:45:00'),
  (3, '2023-03-28', '08:00:00'),
  (4, '2023-03-25', '12:00:00'),
  (5, '2023-03-27', '17:30:00');

  INSERT INTO usuarios_direcciones (id_usuario, nombre_direccion, nombre, direccion, cp, provincia, poblacion, telefono, detalle, principal )
VALUES
  (2,'Casa', 'Juan Pérez', 'Calle del Sol, 1', '28001', 'Madrid', 'Madrid', '910111213', 'Portal 2, 2ºD', 1 ),
  (3,'Trabajo', 'María López', 'Avenida de la Libertad, 34', '46005', 'Valencia', 'Valencia', '960222334', 'Edificio Sigma, planta 4', 0 ),
  (1,'Apartamento', 'Pedro García', 'Calle Mayor, 8', '50001', 'Zaragoza', 'Zaragoza', '976333444', 'Puerta 3', 0 ),
  (5,'Vacaciones', 'Lucía Martínez', 'Calle de la Playa, 15', '29640', 'Málaga', 'Benalmádena', '952444555', 'Urbanización Solymar, bloque 2, 3ºA', 0 ),
  (4,'Casa de campo', 'Manuel Sánchez', 'Camino de la Sierra, s/n', '18010', 'Granada', 'La Zubia', '958555666', 'Casa roja junto al olivo', 0 );


INSERT INTO pedidos (id_usuario, fecha_inicio, fecha_fin, estado, fecha_entregado, id_hora_entrega, fecha_entrega, id_direccion, id_pago, id_repartidor)
VALUES
(2,'2023-03-25', '2023-03-26', 1, '2023-03-26', 1, '2023-03-27', 1, 1, 1),
(3,'2023-03-24', '2023-03-25', 0, NULL, 2, '2023-03-28', 2, 2, 2),
(1,'2023-03-23', '2023-03-24', 1, '2023-03-24', 1, '2023-03-27', 3, 3, 1),
(4,'2023-03-22', '2023-03-23', 0, NULL, 2, '2023-03-29', 1, 1, 2),
(5,'2023-03-21', '2023-03-22', 1, '2023-03-22', 3, '2023-03-26', 2, 2, 1),
(6, '2023-04-18', '2023-04-20', 1, NULL, 1, '2023-04-20', 4, 1, 1),
(7, '2023-04-19', '2023-04-22', 0, NULL, 2, '2023-04-22', 5, 2, 2),
(8, '2023-04-20', '2023-04-25', 1, '2023-04-23', 3, '2023-04-25', 3, 3, 3),
(9, '2023-04-21', '2023-04-23', 0, NULL, 1, '2023-04-23', 5, 3, 4),
(10, '2023-04-22', '2023-04-24', 1, NULL, 2, '2023-04-24', 1, 4, 5),
(11, '2023-04-23', '2023-04-26', 0, NULL, 3, '2023-04-26', 4,5, 4),
(12, '2023-04-24', '2023-04-27', 1, '2023-04-26', 1, '2023-04-27', 5, 2, 5),
(13, '2023-04-25', '2023-04-29', 0, NULL, 2, '2023-04-29', 5, 4, 3),
(14, '2023-04-26', '2023-04-30', 1, '2023-04-29', 3, '2023-04-30', 1, 3, 2),
(15, '2023-04-27', '2023-05-01', 0, NULL, 1, '2023-05-01', 5, 2, 1);


INSERT INTO `pedidos_estados` (`id_pedido`, `estado`, `observacion`, `fecha`, `hora`) VALUES
(2, 1, 'Pedido recibido', '2023-03-25', '10:00:00'),
(3, 0, 'Pago recibido', '2023-03-26', '11:30:00'),
(4, 0, 'Pedido en proceso de preparación', '2023-03-26', '15:00:00'),
(5, 1, 'Pedido recibido', '2023-03-27', '09:00:00'),
(6, 1, 'Pago pendiente', '2023-03-27', '12:00:00'),
(7, 1, 'Pedido creado', '2023-04-18', '08:00:00'),
(8, 0, 'Pedido cancelado', '2023-04-18', '08:15:00'),
(14, 1, 'Pedido creado', '2023-04-18', '08:30:00'),
(2, 1, 'Pedido en proceso', '2023-04-18', '09:00:00'),
(3, 0, 'Pedido cancelado', '2023-04-18', '09:30:00'),
(1, 1, 'Pedido creado', '2023-04-18', '10:00:00'),
(11, 1, 'Pedido creado', '2023-04-18', '10:30:00'),
(12, 0, 'Pedido cancelado', '2023-04-18', '11:00:00'),
(15, 1, 'Pedido creado', '2023-04-18', '11:30:00');


