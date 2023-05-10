/* ********** CREACION DEL SCHEMA ********** */
DROP database eventos_casa_de_cristal;
create database eventos_casa_de_cristal;
        use eventos_casa_de_cristal;

create table Tipo_documento(
Id_documento 						int 		 auto_increment not null,
Siglas 								varchar (10) not null,
Nombre_tipo_documento 				varchar (50) not null,
primary key (ID_documento)
);
create table Cargo(
Id_cargo	 						int 		 auto_increment not null,
Nombre_de_cargo		 				varchar (30) not null,
primary key (Id_cargo)
);

create table Usuario(
Id_usuario 							int 		 auto_increment not null,
Primer_nombre 						varchar (40) not null,
Segundo_nombre 						varchar (40) 	 null,
Primer_apellido 					varchar (40) not null,
Segundo_apellido 					varchar (40) 	 null,
Tipo_documentoId_documento			int 		 not null,
Numero_documento					varchar (20) not null,
Edad								int 		 not null,
Telefono							bigint 		 not null,
Direccion							varchar (50) not null,
Email 								varchar (50) not null unique,
RolId_rol 							int 		 not null,
primary key (Id_usuario)
);

create table Empleado(
Id_empleado							int 		 auto_increment not null,
Primer_nombre 						varchar (40) not null,
Segundo_nombre 						varchar (40) 	 null,
Primer_apellido 					varchar (40) not null,
Segundo_apellido 					varchar (40) 	 null,
Tipo_documentoId_documento			int 		 not null,
Numero_documento					varchar (20) not null,
CargoId_cargo						int 		 not null,
Edad								int 		 not null,
Telefono							bigint 		 not null,
Direccion							varchar (50) not null,
Email 								varchar (50) not null unique,
RolId_rol 							int 		 not null,
primary key (Id_empleado)
);

create table Rol(
Id_rol 								int 		 auto_increment not null,
Nombre_rol 							varchar (25) not null,
primary key (Id_rol)
);

create table Usuario_sistema(
Id_Usuariosistema					int 		 auto_increment not null,
Nombre_usuario 						varchar (15) not null,
Clave 								varchar (20) not null,
Avatar                              blob        	 null,
Estado								varchar (20) not null,
UsuarioId_usuario 					int 		 	 null,
EmpleadoId_empleado					int 		 	 null,
primary key (Id_Usuariosistema)
);

create table Turno(
Id_turno 							Int 		 auto_increment not null,
Fecha_inicio_turno					DATETIME	 not null,
Fecha_fin_turno						DATETIME	 not null,
PedidoId_pedido							int			 not null,
primary key (Id_turno)
);

create table Empleado_turno(
EmpleadoId_empleado					Int 		 not null,
TurnoId_turno		 				int 		 not null
);

create table Estado_pedido(
Id_estadopedido						Int 		 auto_increment not null,
estado				 				varchar	(30) not null,
primary key (Id_estadopedido)
);

create table Pedido(
Id_pedido 							int 		 auto_increment not null,
Fecha_pedido						DATETIME	 not null,
Fecha_inicio_evento					DATETIME	 not null,
Fecha_fin_evento					DATETIME	 not null,
Ciudad_evento						varchar	(60) not null,
Barrio_evento						varchar	(60) not null,
Direccion_evento					varchar	(100)not null,
Paquete_Idpaquete					int 		 not null,
UsuarioId_usuario 					int 		 not null,
EstadopedidoId_estadopedido			int 		 not null,
FacturaId_factura					int 		 not null,
primary key (Id_pedido)
);

create table Paquete(
Id_paquete 							int 		 auto_increment not null,
valor_paquete	 					int 		 not null,
valor_iva							int 		 not null,
valor_total							int 		 not null,
Tipo_de_paquete						varchar (50) not null,
Cantidad_Personas					int 		 not null,
Estado								varchar (30) not null,	
EventoId_evento 					int 		 not null,
primary key (Id_paquete)
);

create table Inventario_paquete(
InventarioId_inventario				Int 		 not null,
PaqueteId_paquete	 				int 		 not null,
cantidad							int 		 not null,
Valor_sin_iva 						int 		 not null,
Iva									int 		 not null,
Valor_Total							int 		 not null
);

create table Inventario(
Id_inventario 						int 		 auto_increment not null,
Inventario		 					varchar	(50) not null,
Cantidad							int 		 not null,
Valor_sin_iva 						int 		 not null,
Iva									int 		 not null,
Valor_Total							int 		 not null,
Categoria							varchar	(30) not null,
Estado								varchar (30) not null,
primary key (Id_inventario)
);

create table Factura(
Id_factura	 						int 		 auto_increment not null,
Valor_sin_iva 						int 		 not null,
Iva									int 		 not null,
Valor_Total							int 		 not null,
Tipo_de_factura	 					varchar	(15) not null,
Descripcion_factura					varchar	(50) not null,
primary key (Id_factura)
);

create table Evento(
Id_evento	 						int 		 auto_increment not null,
Tipo_de_evento	 					varchar	(50) not null,
tipo_imagen							varchar	(20) not null,
imagen								LONGBLOB,
Estado								varchar	(20) not null,
primary key (Id_evento)
);

create table pagos(
Id_pago								Int 		 	auto_increment not null,
Usuarioid_usuario					Int 		 	not null,
PedidoID_pedido		 				Int 	 	 	not null,
Tipos_de_pagoId_tipo_pago			Int 		 	not null,
Total_pago							int			 	not null,
Clave_transaccional					varchar	(250)	not null,
PaypalDatos							text			not null,
estado								varchar	(200)	not null,
primary key (Id_pago)
);

create table Tipos_de_pago(
id_tipo_pago						Int 		  auto_increment not null,
nombre_pago			 				varchar (50) not null,
primary key (id_tipo_pago)
);


create table Log_de_errores(
Id_error							INT 		 auto_increment not null,
Fecha_de_error						date	 	 not null,
Request								varchar (200)not null,
Response							varchar	(200)not null,
Descripcion_de_error				varchar	(200) not null,
primary key (Id_error)
);

create table Servidor_de_correo(
Id									INT 		 auto_increment not null,
Fecha_de_registro					date	 	 not null,
Fecha_de_envio						date	 	 not null,
Enviado_de							varchar (50) not null,
Enviado_A							varchar	(50) not null,
Estado								varchar	(10) not null,
primary key (Id)
);








ALTER TABLE Empleado
ADD FOREIGN KEY (Rolid_Rol)
REFERENCES Rol(Id_rol);

ALTER TABLE Empleado
ADD FOREIGN KEY (Tipo_documentoId_documento)
REFERENCES Tipo_documento(Id_documento);

ALTER TABLE Empleado
ADD FOREIGN KEY (CargoId_cargo)
REFERENCES Cargo(Id_cargo);

ALTER TABLE Empleado 
DROP PRIMARY KEY,
ADD PRIMARY KEY (`Id_empleado`,`Tipo_documentoId_documento`);




ALTER TABLE usuario
ADD FOREIGN KEY (Rolid_Rol)
REFERENCES Rol(Id_rol);

ALTER TABLE usuario
ADD FOREIGN KEY (Tipo_documentoId_documento)
REFERENCES Tipo_documento(Id_documento);

ALTER TABLE usuario 
DROP PRIMARY KEY,
ADD PRIMARY KEY (`Id_usuario`,`Tipo_documentoId_documento`);
;



ALTER TABLE Usuario_sistema
ADD FOREIGN KEY (UsuarioId_usuario)
REFERENCES Usuario(Id_usuario);

ALTER TABLE Usuario_sistema
ADD FOREIGN KEY (EmpleadoId_empleado)
REFERENCES Empleado(Id_empleado);





ALTER TABLE Empleado_turno
ADD FOREIGN KEY (EmpleadoId_empleado)
REFERENCES Empleado(Id_empleado);

ALTER TABLE Empleado_turno
ADD FOREIGN KEY (TurnoId_turno)
REFERENCES Turno(Id_turno);

ALTER TABLE Empleado_turno
ADD PRIMARY KEY (`EmpleadoId_empleado`, `TurnoId_turno`)
;



ALTER TABLE pedido
ADD FOREIGN KEY (facturaId_factura)
REFERENCES factura(Id_factura);




ALTER TABLE Pedido
ADD FOREIGN KEY (Paquete_Idpaquete)
REFERENCES Paquete(Id_paquete);

ALTER TABLE Pedido
ADD FOREIGN KEY (UsuarioId_usuario)
REFERENCES Usuario(Id_usuario);

ALTER TABLE Pedido
ADD FOREIGN KEY (EstadopedidoId_estadopedido)
REFERENCES estado_pedido(Id_estadopedido);

ALTER TABLE turno
ADD FOREIGN KEY (PedidoId_pedido)
REFERENCES Pedido(Id_pedido);



ALTER TABLE paquete
ADD FOREIGN KEY (EventoId_evento)
REFERENCES Evento(Id_evento);





ALTER TABLE Inventario_paquete
ADD FOREIGN KEY (InventarioId_inventario)
REFERENCES Inventario(Id_inventario);

ALTER TABLE Inventario_paquete
ADD FOREIGN KEY (PaqueteId_paquete)
REFERENCES Paquete(Id_paquete);

ALTER TABLE Inventario_paquete
ADD PRIMARY KEY (`InventarioId_inventario`, `PaqueteId_paquete`)
;



ALTER TABLE pagos
ADD FOREIGN KEY (Usuarioid_usuario)
REFERENCES Usuario(id_usuario);

ALTER TABLE pagos
ADD FOREIGN KEY (Tipos_de_pagoId_tipo_pago)
REFERENCES Tipos_de_pago(Id_tipo_pago);

ALTER TABLE pagos
DROP primary KEY,
ADD PRIMARY KEY (`Id_pago`,`Usuarioid_usuario`, `Tipos_de_pagoId_tipo_pago`)
;

/*------------------   CREACION DE TRIGGERS PARA LOG DE TABLAS -------------------------------------------------*/

/*    
new. = nuevo valor
old. = valor anterior

 Eliminar trigger = drop trigger USUARIO_AFTER_DELETE;

*/

create table USUARIO_LOG(
Id_usuario_log 						int 		 auto_increment not null,
fecha_registro						datetime	 not null,
usuario_modifico					varchar (15) not null, 
tipo_registro						varchar (20) not null,
Id_usuario	 						int 		 not null,
Primer_nombre 						varchar (40) not null,
Segundo_nombre 						varchar (40) 	 null,
Primer_apellido 					varchar (40) not null,
Segundo_apellido 					varchar (40) 	 null,
Tipo_documentoId_documento			int 		 not null,
Numero_documento					varchar (20) not null,
Edad								int 		 not null,
Telefono							bigint 		 not null,
Direccion							varchar (50) not null,
Email 								varchar (50) not null ,
RolId_rol 							int 		 not null,
primary key (Id_usuario_log)
);

-- crea registro despues de realizar insert en la tabla
drop trigger if exists USUARIO_AFTER_INSERT; create trigger USUARIO_AFTER_INSERT AFTER INSERT ON USUARIO FOR EACH ROW
INSERT INTO USUARIO_LOG (Id_usuario_log, fecha_registro, usuario_modifico, tipo_registro, Id_usuario, Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_apellido,
Tipo_documentoId_documento, Numero_documento, Edad, Telefono, Direccion, Email, RolId_rol)
values(null, now(), current_user(), 'INSERTADO', new.Id_usuario, new.Primer_nombre, new.Segundo_nombre, new.Primer_apellido, new.Segundo_apellido,
new.Tipo_documentoId_documento, new.Numero_documento, new.Edad, new.Telefono, new.Direccion, new.Email, new.RolId_rol)
;

-- crea registro despues de realizar actualizaciones en la tabla
drop trigger if exists USUARIO_BEFORE_UPDATE; create trigger USUARIO_BEFORE_UPDATE BEFORE UPDATE ON USUARIO FOR EACH ROW
INSERT INTO USUARIO_LOG (Id_usuario_log, fecha_registro, usuario_modifico, tipo_registro, Id_usuario, Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_apellido,
Tipo_documentoId_documento, Numero_documento, Edad, Telefono, Direccion, Email, RolId_rol)
values(null, now(), current_user(), 'ACTUALIZADO', new.Id_usuario, new.Primer_nombre, new.Segundo_nombre, new.Primer_apellido, new.Segundo_apellido,
new.Tipo_documentoId_documento, new.Numero_documento, new.Edad, new.Telefono, new.Direccion, new.Email, new.RolId_rol)
;

-- crea registro despues de eliminar datos en la tabla
drop trigger if exists USUARIO_AFTER_DELETE;create trigger USUARIO_AFTER_DELETE AFTER DELETE ON USUARIO FOR EACH ROW
INSERT INTO USUARIO_LOG (Id_usuario_log, fecha_registro, usuario_modifico, tipo_registro, Id_usuario, Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_apellido,
Tipo_documentoId_documento, Numero_documento, Edad, Telefono, Direccion, Email, RolId_rol)
values(null, now(), current_user(), 'ELIMINADO', old.Id_usuario, old.Primer_nombre, old.Segundo_nombre, old.Primer_apellido, old.Segundo_apellido,
old.Tipo_documentoId_documento, old.Numero_documento, old.Edad, old.Telefono, old.Direccion, old.Email, old.RolId_rol)
;
/* **************************************** */

/* ********** CREACION DE DATOS EN EL SISTEMA ********** */

insert into Tipo_documento
(Id_documento, Siglas, Nombre_tipo_documento)
values
(1, 'CC',  'Cedula_de_ciudadania'),
(2, 'CE',  'Cedula_de_extranjeria'),
(3, 'NIT', 'Numero_de_Identificación_Tributaria');


-- ---------------------------------------
insert into Cargo
(Id_cargo, Nombre_de_cargo)
values
(1, 'Mesero'),
(2, 'Cocinero'),
(3, 'Organizador'),
(4, 'Dj'),
(5, 'Animador'),
(6, 'Fotografos'),
(7, 'Director_de_Marketing'),
(8, 'Presidente');

-- ---------------------------------------
insert into Rol
(Id_rol, Nombre_rol)
values 
(1, 'Cliente'),
(2, 'Empleado'),
(3, 'Administrador');


-- ---------------------------------------

insert into Usuario
(Id_usuario, Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_apellido, Tipo_documentoId_documento, Numero_documento, Edad, Telefono, Direccion, Email, RolId_rol)
values
(1,  'Leonel',	'Alexander',	'Vargas',	'Rodriguez',	1,	'1256896558',	22,	3157845689, 'Carrera 15 #12-78',		'leonelvargas@hotmail.com', 	1),
(2,  'Ana', 	'Milena', 		'Forero', 	'Rodriguez', 	1, 	'1235698685', 	35, 1023856989, 'Calle 56 #56-8', 			'mileforero26@gmail.com', 		1),
(3,  'Bryan', 	'Steven', 		'Ladino', 	'Hernandez', 	1, 	'156897556', 	40, 3198745289, 'Carrera 15 #56-7', 		'bryanstevenladino@gmai.com', 	1),
(4,  'Doris', 	'Johanna', 		'Ramirez', 	'Ramirez', 		1, 	'1126589331', 	25, 3125698745, 'Avenida 39 #22-8', 		'dorisjforero@hotmail.com', 	1),
(5,  'Angie', 	'Tatiana', 		'Gomez', 	'Agudelo', 		1, 	'102356899', 	38, 3125689748, 'Carrera 24 #25-3', 		'gomezangie12@hotmail.com', 	1),
(6,  'Brenda', 	'Dayana', 		'Lombana', 	'Murcia', 		1, 	'102356889', 	32, 3102589663, 'Calle 45 #56-9', 			'brenlombana25@gmail.com', 		1),
(7,  'Claudia', 'Liliana', 		'Lopez', 	'Perez', 		1, 	'1256369556', 	22, 3215896259, 'Carrera 25 #25-9', 		'claudial@gmail.com', 			1),
(8,  'Angie', 	'Lorena', 		'Perdomo', 	'Zapata', 		1, 	'1256899665', 	46, 3458965487, 'Calle 25 # 25-6', 			'angie265@hotmail.com', 		1),
(9,  'Cristian','Andres', 		'Rubiano', 	'Ruiz', 		1, 	'1236589778', 	40, 3215896258, 'Calle 40 #25-5', 			'cristianandre25@hotmail.com', 	1),
(10, 'Johan', 	'Camilo', 		'Sanchez', 	'Avila', 		1, 	'1023565889', 	26, 3256985689, 'Avenida 39 # 25-8', 		'cristian367@hotmail.com', 		1),
(11, 'Felipe', 	'Armando', 		'Ruiz', 	'Fiquitiva', 	1, 	'1025689556', 	36, 3102568994, 'Carrera 25 #25-6', 		'feliperuiz1234567@gmail.com', 	1),
(12, 'Sandra', 	'Patricia', 	'Rosa', 	'Botero', 		1, 	'1013684005', 	30, 3105895214, 'Avenida 56 # 23-6', 		'sandraprosa@hotmail.com', 		1),
(13, 'Jhon', 	'Anderson', 	'Molina', 	'Gomez', 		1, 	'1232457872', 	45, 3125689586, 'Carrera 23 #23-6', 		'jhon@gmail.com', 				1),
(14, 'Lizeth', 	'Natalia', 		'Ramos', 	'Avila', 		1, 	'1023665899', 	40, 3112589632, 'Calle 72 #25-6', 			'Lizeth@gmail.com', 			1),
(15, 'Pablo', 	'Andres', 		'Rodriguez','Gomez', 		1, 	'1023669888', 	20, 3108965269, 'Calle 56 #25-6', 			'Pablo@gmail.com', 				1),
(16, 'Pedro', 	'Ignacio', 		'Calvo', 	'Churque', 		1, 	'1036598226', 	36, 3125698569, 'Carrera 25 #12-5', 		'Pedro@gmail.com', 				1),
(17, 'Mauricio','Brandon', 		'Churque', 	'Rodruigez', 	1, 	'1032569885', 	25, 3145286258, 'Carrera 23 #26-8', 		'Mauricio1@gmail.com', 			1),
(18, 'Oscar', 	'Armando', 		'Gomez', 	'Ramirez', 		1, 	'1023668995', 	19, 3125896259, 'Calle 57 #56-89', 			'Oscar@gmail.com', 				1),
(19, 'Liz', 	'Amanda', 		'Hernandez','Ramos', 		1, 	'1023698885', 	33, 3124576891, 'Carrera 26 #26-2', 		'Liz@gmail.com', 				1),
(20, 'Sandra', 	'Janeth', 		'Calderon', 'Ruiz', 		1, 	'1234568709', 	45, 3152368956, 'Avenida 39 #25-9', 		'Sandra@gmail.com',				1),
(21, 'Edison', 	'Alexander', 	'Hernandez','Cordoba', 		1, 	'1324567831', 	28, 3105896552, 'Carrera 26 #25-22', 		'Edison@gmail.com',				1),
(22, 'Giovany', 'Andres', 		'Garcia', 	'Florez', 		1, 	'1023698559', 	28, 3125689256, 'Carrera 18f #47a58', 		'giovany31@hotmail.com', 		1),
(23, 'Stefany',  '', 			'Lopez', 	'Castro', 		1, 	'1235697784', 	52, 3154785263, 'Avenida 39 #12h-9', 		'stefalopez23@gmail.com', 		1),
(24, 'Aylin', 	'Camila', 		'Novoa', 	'Calvo', 		1, 	'1056236995', 	46, 3165896242, 'Carrera 17g bis #74a28', 	'aylin2324@hotmail.com', 		1);

-- ---------------------------------------
insert into Empleado
(Id_empleado, Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_apellido, Tipo_documentoId_documento, Numero_documento, CargoId_cargo, Edad, Telefono, Direccion, Email, RolId_rol)
values
(1,   'Maria', 	  'Mireya', 'Acevedo', 'Manríquez', 1, '1354689712', 1, 22, 3157845689, 'Carrera 15 #12-78',	'AcevedoMM@hotmail.com', 		2),
(2,   'Enrique',   '',    'Acevedo', 'Mejia',     1, '1512365874', 1, 35, 1023856989, 'Calle 56 #56-8', 		'Mejia14@gmail.com', 			2),
(3,   'Carolina',  '',    'Acevedo', 'Ruiz',      1, '1265328496', 2, 40, 3198745289, 'Carrera 15 #56-7', 	'CarolinaRui@gmai.com', 		2),
(4,   'Tomas',    'Jose',   'Acosta',  'Canto',     1, '745368791' , 8, 25, 3125698745, 'Avenida 39 #22-8', 	'tomas59jose@hotmail.com', 		2),
(5,   'Celina',    '',    'Acosta',  'Gomez',     1, '102356833' , 3, 38, 312568974, 	'Carrera 24 #25-3', 	'celina1111@hotmail.com', 		2),
(6,   'Irma',      '',    'Aguilar', 'Dorantes',  1, '1027520041', 3, 32, 3102589663, 'Calle 45 #56-9', 		'irma788@gmail.com', 			2),
(7,   'Maria',    'celia',  'Aguilar', 'Lemus',     1, '1253458963', 4, 22, 3215896259, 'Carrera 25 #25-9', 	'maria12@gmail.com', 			2),
(8,   'Marcela',   '',    'Aguilar', 'Loranca',   1, '1065320855', 4, 46, 34589654878,'Calle 25 # 25-6', 		'marcelaaguil89@hotmail.com',	2),
(9,   'Pascual',  'Gerardo','Alonso',  'Ibarra',    1, '847982549' , 2, 40, 3215896258, 'Calle 40 #25-5', 		'pascualger@hotmail.com', 		2),
(10,  'Oscar',     '',    'Alvarado','Mendoza',   1, '1352087496', 3, 26, 3256985689, 'Avenida 39 # 25-8', 	'mendoza56@hotmail.com', 		2),
(11,  'Felipe',    '',    'Alvarez', 'Medellin',  1, '1166335508', 5, 36, 3102568994, 'Carrera 25 #25-6', 	'felipe7@gmail.com', 			2),
(12,  'Oscar',     '',    'Alvarado','Mendoza',   1, '1299852490', 7, 30, 3105895214, 'Avenida 56 # 23-6', 	'osalvarado65@hotmail.com', 	2),
(13,  'Gustavo',   '',    'Aquiles', 'Caigo',     1, '1015879623', 6, 45, 3125689586, 'Carrera 23 #23-6', 	'gustavo26@gmail.com', 			3),
(14,  'Socorro',   '',    'Arias',   'Rodríguez', 1, '1004876948', 1, 40, 3112589632, 'Calle 72 #25-6', 		'socorroar12@gmail.com', 		3);


-- ---------------------------------------
insert into Usuario_sistema
(Id_Usuariosistema, Nombre_usuario, Clave, Avatar, Estado, UsuarioId_usuario, EmpleadoId_empleado)
values
(01,  'Leonel2019', 		'Leonel2019', 		null, 'ACTIVO', 1, 	null),
(02,  'Mile1256', 			'Mile1256', 		null, 'ACTIVO', 2, 	null),
(03,  'Ladino1548', 		'Ladino1548', 		null, 'ACTIVO', 3, 	null),
(04,  'dorijforerorz', 		'dorijforerorz', 	null, 'ACTIVO', 4, 	null),
(05,  'g15269', 			'g15269', 			null, 'ACTIVO', 5, 	null),
(06,  '6325lombana', 		'6325lombana', 		null, 'ACTIVO', 6, 	null),
(07,  'lopezclaudia789', 	'lopezclaudia789',	null, 'ACTIVO', 7, 	null),
(08,  'angie265', 			'angie265', 		null, 'ACTIVO', 8, 	null),                                   
(09,  'cristianandre25',	'cristianandre25', 	null, 'ACTIVO', 9, 	null),
(010, 'camilo14', 			'camilo14', 		null, 'ACTIVO', 10, 	null),
(011, 'felipe12', 			'felipe12', 		null, 'ACTIVO', 11, 	null),
(012, 'sandrap23', 			'sandrap23', 		null, 'ACTIVO', 12, 	null),
(013, 'jhon12345', 			'jhon12345', 		null, 'ACTIVO', 13, 	null),
(014, 'Lizeth12345', 		'Lizeth12345', 		null, 'ACTIVO', 14, 	null),
(015, 'Pablo12345', 		'Pablo12345', 		null, 'ACTIVO', 15, 	NULL),
(016, 'Pedro12345', 		'Pedro12345', 		null, 'ACTIVO', 16, 	NULL),
(017, 'Mauricio12345', 		'Mauricio12345', 	null, 'ACTIVO', 17, 	NULL),
(018, 'Oscar15', 			'Oscar15', 			null, 'ACTIVO', 18, 	NULL),
(019, 'Liz12345', 			'Liz12345', 		null, 'ACTIVO', 19, 	NULL),
(020, 'Sandra12345', 		'Sandra12345', 		null, 'ACTIVO', 20, 	NULL),
(021, 'Edison25', 			'Edison25', 		null, 'ACTIVO', 21, 	NULL),
(022, 'gagarcia31', 		'gagarcia31', 		null, 'ACTIVO', 22, 	NULL),
(023, 'slopez2', 			'slopez2', 			null, 'ACTIVO', 23, 	NULL),
(024, 'aylin2324', 			'aylin2324', 		null, 'ACTIVO', 24,	NULL),
(025, 'AcevedoMM', 			'AcevedoMM', 		null, 'ACTIVO', null, 1),
(026, 'Mejia14', 			'Mejia14', 			null, 'ACTIVO', null, 2),
(027, 'CarolinaRui', 		'CarolinaRui', 		null, 'ACTIVO', null, 3),
(028, 'tomas59jose', 		'tomas59jose', 		null, 'ACTIVO', null, 4),
(029, 'celina1111', 		'celina1111', 		null, 'ACTIVO', null, 5),
(030, 'irma788', 			'irma788', 			null, 'ACTIVO', null, 6),
(031, 'maria12', 			'maria12', 			null, 'ACTIVO', null, 7),
(032, 'marcelaaguil89', 	'marcelaaguil89', 	null, 'ACTIVO', null, 8),
(033, 'mendoza56', 			'mendoza56', 		null, 'ACTIVO', null, 9),
(034, 'felipe7', 			'felipe7', 			null, 'ACTIVO', null, 10),
(035, 'pascualger', 		'pascualger', 		null, 'ACTIVO', null, 11),
(036, 'osalvarado65', 		'osalvarado65', 	null, 'ACTIVO', null, 12),
(037, 'gustavo26', 			'gustavo26', 		null, 'ACTIVO', null, 13),
(038, 'socorroar12', 		'socorroar12', 		null, 'ACTIVO', null, 14);

-- -------------------------------------------------------------------------
insert into Evento(Id_evento, Tipo_de_evento, tipo_imagen, imagen, Estado)
values
(1,	'Matrimonio', 'image/jpg' , 'Boda.jpg', 'ACTIVO'),
(2,	'Bautizo'	, 'image/jpg' , 'Bautizo.jpg', 'ACTIVO'),
(3,	'15 Años'	, 'image/jpg' , '15.jpg', 'ACTIVO'),
(4,	'Despedida de soltero', 'image/jpg' , 'eventos2.jpg', 'ACTIVO'),
(5,	'Primeras comuniones', 'image/jpg' , 'Primera Comunion.jpg', 'ACTIVO'),
(6,	'Grados'	, 'image/jpg' , 'Grados.jpg', 'ACTIVO');
-- -------------------------------------------------------------------------

insert into Paquete(Id_paquete, valor_paquete, valor_iva, valor_total, Tipo_de_paquete, Cantidad_Personas, Estado, EventoId_evento)
values
(1,	6000000,	1140000,	7140000,	'matrimonio 1',				20,	'ACTIVO',	1),
(2,	3000000,	 570000,	3570000,	'despedida_de_soltero 1',	20,	'ACTIVO',	4),
(3,	1000000,	 190000,	1190000,	'Bautizo 1',				20,	'ACTIVO',	2),
(4,	2000000,	 380000,	2380000,	'primera_comunion 1',		20,	'ACTIVO',	5),
(5,	4000000,	 760000,	4760000,	'15 Años 1',				20,	'ACTIVO',	3),
(6,	3000000,	 570000,	3570000,	'Grados 1',					20,	'ACTIVO',	6),
(7,	8000000,	3140000,	9140000,	'matrimonio 2',				30,	'ACTIVO',	1);
	   
-- -------------------------------------------------------------------------	   
insert into Inventario(Id_inventario, Inventario, Cantidad, Valor_sin_iva, Iva, Valor_Total, Categoria, Estado)
values 
(6,	'centros_de_mesa',	50,		10000,	 1900,	11900,	'utileria',	'ACTIVO'),
(5,	'platos',			200,	25000,	 4750,	29750,	'utileria',	'ACTIVO'),
(4,	'cubiertas',		600,	 8000,	 1520,	 9520,	'utileria',	'ACTIVO'),
(3,	'mesas',			50,		30000,	 5700,	35700,	'utileria',	'ACTIVO'),
(2,	'manteles',			100,	12000,	 2280,	14280,	'utileria',	'ACTIVO'),
(1,	'ollas',			20,		35000,	 6650,	41650,	'utileria',	'ACTIVO'),
(7,	'Equipos_sonido',	4,		70000,	13300,	83300,	'utileria',	'ACTIVO');

-- -------------------------------------------------------------------------
insert into Inventario_paquete(InventarioId_inventario, PaqueteId_paquete, cantidad, Valor_sin_iva, Iva, Valor_Total)
values  
(1,	1, 20,	10000,	 1900,	11900),
(1,	2, 25,	10000,	 1900,	11900),
(1,	3, 24,	10000,	 1900,	11900),
(1,	4, 23,	10000,	 1900,	11900),
(1,	5, 24,	10000,	 1900,	11900),
(2,	1, 23,	10000,	 1900,	11900),
(2,	2, 21,	10000,	 1900,	11900),
(2,	3, 22,	10000,	 1900,	11900),
(2,	4, 27,	10000,	 1900,	11900),
(2,	5, 28,	10000,	 1900,	11900),
(3,	1, 29,	10000,	 1900,	11900),
(3,	2, 28,	10000,	 1900,	11900),
(3,	3, 24,	10000,	 1900,	11900),
(3,	4, 25,	10000,	 1900,	11900),
(3,	5, 23,	10000,	 1900,	11900),
(4,	1, 25,	10000,	 1900,	11900),
(4,	2, 23,	10000,	 1900,	11900),
(4,	3, 22,	10000,	 1900,	11900),
(4,	4, 27,	10000,	 1900,	11900),
(4,	5, 22,	10000,	 1900,	11900),
(5,	1, 21,	10000,	 1900,	11900),
(5,	2, 24,	10000,	 1900,	11900),
(5,	3, 26,	10000,	 1900,	11900),
(5,	4, 28,	10000,	 1900,	11900),
(5,	5, 27,	10000,	 1900,	11900),
(6,	1, 20,	10000,	 1900,	11900),
(6,	2, 20,	10000,	 1900,	11900),
(6,	3, 20,	10000,	 1900,	11900),
(6,	4, 23,	10000,	 1900,	11900),
(6,	5, 24,	10000,	 1900,	11900),
(7,	1, 25,	10000,	 1900,	11900),
(7,	2, 22,	10000,	 1900,	11900),
(7,	3, 22,	10000,	 1900,	11900),
(7,	4, 20,	10000,	 1900,	11900),
(7,	5, 20,	10000,	 1900,	11900),
(1,	6, 21,	10000,	 1900,	11900),
(2,	6, 23,	10000,	 1900,	11900),
(3,	6, 28,	10000,	 1900,	11900),
(4,	6, 29,	10000,	 1900,	11900),
(5,	6, 28,	10000,	 1900,	11900),
(6,	6, 25,	10000,	 1900,	11900),
(7,	6, 21,	10000,	 1900,	11900),
(1,	7, 31,	10000,	 1900,	11900),
(2,	7, 33,	10000,	 1900,	11900),
(3,	7, 38,	10000,	 1900,	11900),
(4,	7, 39,	10000,	 1900,	11900),
(5,	7, 38,	10000,	 1900,	11900),
(6,	7, 35,	10000,	 1900,	11900),
(7,	7, 31,	10000,	 1900,	11900);
-- -------------------------------------------------------------------------
insert into Estado_pedido( Id_estadopedido, estado)
values
(1, 'Por realizar'),
(2, 'En curso'),
(3, 'Realizado'),
(4, 'Cancelado')
;

-- -------------------------------------------------------------------------
insert into Factura(Id_factura, Valor_sin_iva, Iva, Valor_Total, Tipo_de_factura, Descripcion_factura)
values 
(1,		3000000,	3000000/0.19,	315789,	'fisica',		'evento_Grado'),
(2,		4000000,	4000000/0.19,	421052,	'electronica',	'evento_15_años'),
(3,		2000000,	2000000/0.19,	210526,	'fisica',		'evento_primera_comunion'),
(4,		1000000,	1000000/0.19,	15263,	'electronica',	'evento_Bautizo'),
(5,		3000000,	3000000/0.19,	315789,	'fisica',		'evento_despedida_de_soltero'),
(6,		6000000,	6000000/0.19,	631578,	'electronica',	'evento_matrimonio'),
(7,		3000000,	3000000/0.19,	315789,	'fisica',		'evento_Grado'),
(8,		4000000,	4000000/0.19,	421052,	'electronica',	'evento_15_años'),
(9,		6000000,	6000000/0.19,	631578,	'electronica',	'evento_matrimonio'),
(10,	1000000,	1000000/0.19,	15263,	'electronica',	'evento_Bautizo'),
(11,	1000000,	1000000/0.19,	15263,	'electronica',	'evento_Bautizo'),
(12,	1000000,	1000000/0.19,	15263,	'electronica',	'evento_Bautizo'),
(13,	4000000,	4000000/0.19,	421052,	'electronica',	'evento_15_años'),
(14,	3000000,	3000000/0.19,	315789,	'fisica',		'evento_Grado'),
(15,	6000000,	6000000/0.19,	631578,	'electronica',	'evento_matrimonio'),
(16,	6000000,	6000000/0.19,	631578,	'electronica',	'evento_matrimonio');

-- -------------------------------------------------------------------------
insert into Pedido(Id_pedido, Fecha_pedido, Fecha_inicio_evento, Fecha_fin_evento, Ciudad_evento, Barrio_evento, Direccion_evento, Paquete_Idpaquete, UsuarioId_usuario, EstadopedidoId_estadopedido, FacturaId_factura)
values 
(1,		sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Chico Norte',	' carrera 11 #93-92',		6,	6,	1,	1),
(2,		sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'San Isidro',	' carrera 12 #93-92',		5,	5,	1,	2),
(3,		sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Estrada',		' carrera 13 #93-92',		4,	4,	1,	3),
(4,		sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Acapulco',		' carrera 14 #93-92',		3,	3,	1,	4),
(5,		sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'El Salitre',	' carrera 15 #93-92',		2,	2,	1,	5),
(6,		sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Bosque Popular',' carrera 16 #93-92',		1,	1,	1,	6),
(7,		sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Bonanza',		' carrera 17 #93-92',		2,	6,	1,	7),
(8,		sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Metrópolis',	' carrera 18 #93-92',		3,	7,	1,	8),
(9,		sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Las Ferias',	' carrera 19 #93-92',		4,	8,	1,	9),
(10,	sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Aures',		' carrera 20 #93-92',		5,	9,	1,	10),
(11,	sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Las Flores',	' carrera 21 #93-92',		6,	10,	1,	11),
(12,	sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'San Jorge',	' carrera 22 #93-92',		5,	11,	1,	12),
(13,	sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Tibabuyes',	' carrera 23 #93-92',		4,	12,	1,	13),
(14,	sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'El Rubí',		' carrera 24 #93-92',		3,	13,	1,	14),
(15,	sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Niza',			' carrera 25 #93-92',		2,	14,	1,	15),
(16,	sysdate(), DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	'Bogota',	'Villa Cindy',	' carrera 26 #93-92',		1,	15,	1,	16);

-- ---------------------------------------
insert into Turno(Id_turno, Fecha_inicio_turno, Fecha_fin_turno, PedidoId_pedido)
values 
(1,		DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	1),
(2,		DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	2),
(3,		DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	3),
(4,		DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	4),
(5,		DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	5),
(6,		DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	6),
(7,		DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	7),
(8,		DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	8),
(9,		DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	9),
(10,	DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	10),
(11,	DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	11),
(12,	DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	12),
(13,	DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	13),
(14,	DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	14),
(15,	DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	15),
(16,	DATE_ADD(sysdate(),INTERVAL 90 DAY), DATE_ADD(DATE_ADD(sysdate(),INTERVAL 90 DAY),INTERVAL 12 HOUR),	16);

-- ---------------------------------------
insert into Empleado_turno( EmpleadoId_empleado, TurnoId_turno)
values 
(1,		01),
(2,		02),
(3,		03),
(4,		01),
(5,		02),
(6,		03),
(7,		01),
(8,		02),
(9,		03),
(10,	01),
(11,	02),
(12,	03),
(13,	01),
(14,	02)
;

-- -------------------------------------------------------------------------

insert into Log_de_errores(Id_error, Fecha_de_error, Request, Response, Descripcion_de_error)
values
(1,  '2020-06-06', 'telefono:3198745289, nombre:Leonel Alexander Vargas Rodriguez, pedido:1', 	'Error al realizar la transacción', 'error al realizar el pago'),
(2,  '2020-06-07', 'telefono:3198745290, nombre:Leonel Pablo Andres Rodriguez Gomez, pedido:2', 'time out', 'error al realizar el pago'),
(3,  '2020-06-08', 'telefono:3198745291, nombre:Ana Milena Forero Rodriguez, pedido:3', 		'Error al realizar la transacción', 'error al realizar el pago'),
(4,  '2020-06-09', 'telefono:3198745292, nombre:Steven Ladino Hernandez, pedido:4', 			'Error al realizar la transacción', 'error al realizar el pago'),
(5,  '2020-06-10', 'telefono:3198745293, nombre:Doris Johanna Ramirez Ramirez, pedido:5', 		'Error al realizar la transacción', 'error al realizar el pago'),
(6,  '2020-06-03', 'telefono:3198745294, nombre:Angie Tatiana Gomez Agudelo, pedido:6', 		'time out', 'error al realizar el pago'),
(7,  '2020-06-02', 'telefono:3198745295, nombre:Brenda Dayana Lombana Murcia, pedido:7', 		'time out', 'error al realizar el pago'),
(8,  '2020-06-01', 'telefono:3198745296, nombre:Claudia Liliana Lopez Perez, pedido:8', 		'Error al realizar la transacción', 'error al realizar el pago'),
(9,  '2020-06-15', 'telefono:3198745297, nombre:Angie Lorena Perdomo Zapata, pedido:9',   		'time out', 'error al realizar el pago'),
(10, '2020-06-16', 'telefono:3198745298, nombre:Cristian Andres Rubiano Ruiz, pedido:10', 		'Error al realizar la transacción', 'error al realizar el pago') ;

-- -------------------------------------------------------------------------
insert into Servidor_de_correo(Id, Fecha_de_registro, Fecha_de_envio, Enviado_de, Enviado_A, Estado)
values
(01,	'2020-06-02',	'2020-06-02',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'leonelvargas@hotmail.com',		'ENVIADO'),
(02,	'2020-06-01',	'2020-06-01',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'Pablo@gmail.com',				'ENVIADO'),
(03,	'2020-06-03',	'2020-06-03',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'mileforero26@gmail.com',		'ENVIADO'),
(04,	'2020-06-02',	'2020-06-02',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'bryanstevenladino@gmai.com',	'ENVIADO'),
(05,	'2020-06-06',	'2020-06-06',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'dorisjforero@hotmail.com',		'ENVIADO'),
(06,	'2020-06-05',	'2020-06-05',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'gomezangie12@hotmail.com',		'ENVIADO'),
(07,	'2020-06-19',	'2020-06-19',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'brenlombana25@gmail.com',		'ENVIADO'),
(08,	'2020-06-20',	'2020-06-20',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'claudial@gmail.com',			'ENVIADO'),
(09,	'2020-06-11',	'2020-06-11',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'angie265@hotmail.com',			'ENVIADO'),
(10,	'2020-06-13',	'2020-06-13',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'cristianandre25@hotmail.com',	'ENVIADO'),
(13,	'2020-06-14',	'2020-06-14',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'sandraprosa@hotmail.com',		'ENVIADO'),
(11,	'2020-06-12',	'2020-06-12',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'cristian367@hotmail.com',		'ENVIADO'),
(12,	'2020-06-15',	'2020-06-15',	'EVENTOS_CASA_DE_CRISTAL@GMAIL.COM',	'feliperuiz1234567@gmail.com',	'ENVIADO');  

-- -------------------------------------------------------------------------
insert into Tipos_de_pago( id_tipo_pago, nombre_pago)
values
(1, 'Efectivo'),
(2, 'Tarjeta_de_regalo'),
(3, 'Tarjeta_Debito'),
(4, 'Tarjeta_Credito'),
(5, 'Paypal');
-- -------------------------------------------------------------------------
insert into pagos( Id_pago, UsuarioId_usuario, PedidoId_pedido, Tipos_de_pagoId_tipo_pago, Total_pago, Clave_transaccional, PaypalDatos, estado)
values
(1,		1,	01,	4, 0, '', '', ''),
(2,		2,	02,	4, 0, '', '', ''),
(3,		3,	03,	4, 0, '', '', ''),
(4,		4,	04,	4, 0, '', '', ''),
(5,		5,	05,	1, 0, '', '', ''),
(6,		6,	06,	3, 0, '', '', ''),
(7,		7,	07,	3, 0, '', '', ''),
(8,		8,	08,	3, 0, '', '', ''),
(9,		9,	09,	2, 0, '', '', ''),
(10,	10,	10,	1, 0, '', '', ''),
(11,	11,	11,	2, 0, '', '', ''),
(12,	12,	12,	1, 0, '', '', ''),
(13,	13,	13,	2, 0, '', '', ''),
(14,	14,	14,	3, 0, '', '', ''),
(15,	15,	15,	4, 0, '', '', ''),
(16,	16,	16,	2, 0, '', '', '')
;
/* **************************************** */

/* ********** CREACION DE LOS PAQUETES ********** */


DELIMITER &
CREATE PROCEDURE PR_ACTUALIZAR_PEDIDO
( 
	  P_ID_PEDIDO 			INT
    , P_CIUDAD 				VARCHAR (60)
    , P_BARRIO 				VARCHAR (60)
    , P_DIRECCION			VARCHAR (100)
    , P_ESTADO 				VARCHAR (40)
    , P_FECHA_INICIO_EVENTO DATETIME
    , P_FECHA_FIN_EVENTO	DATETIME
)

BEGIN
    -- Declarar variables
    DECLARE V_ID_ESTADO_PEDIDO  					INT	 ;
	
    -- Obtener Id del estado pedido
    SELECT ID_ESTADOPEDIDO INTO V_ID_ESTADO_PEDIDO FROM(SELECT ID_ESTADOPEDIDO FROM ESTADO_PEDIDO WHERE ESTADO =P_ESTADO) AS ID_ESTADOPEDIDO;
    
    -- Editar registro de la tabla usuario sistema
    UPDATE PEDIDO 							
		SET  CIUDAD_EVENTO					=	P_CIUDAD
			,BARRIO_EVENTO					=	P_BARRIO
            ,DIRECCION_EVENTO				=	P_DIRECCION
            ,FECHA_INICIO_EVENTO			=	P_FECHA_INICIO_EVENTO
			,FECHA_FIN_EVENTO				=	P_FECHA_FIN_EVENTO
			,ESTADOPEDIDOID_ESTADOPEDIDO 	=	V_ID_ESTADO_PEDIDO
	WHERE ID_PEDIDO = P_ID_PEDIDO;
    
    -- Editar registro de la tabla TURNOS
    UPDATE TURNO 							
		SET  FECHA_INICIO_TURNO			=	P_FECHA_INICIO_EVENTO
			,FECHA_FIN_TURNO			=	P_FECHA_FIN_EVENTO
	WHERE PEDIDOID_PEDIDO = P_ID_PEDIDO;
    
END &

DELIMITER &
CREATE PROCEDURE PR_ACTUALIZAR_USUARIO( P_ID_USUARIO INT, P_PRIMER_NOMBRE VARCHAR (40), P_SEGUNDO_NOMBRE VARCHAR (40), P_PRIMER_APELLIDO VARCHAR (40), P_SEGUNDO_APELLIDO VARCHAR (40),
P_TIPO_DOCUMENTOID_DOCUMENTO VARCHAR(10), P_NUMERO_DOCUMENTO VARCHAR (20), P_EDAD INT (5), P_TELEFONO BIGINT (20), P_DIRECCION VARCHAR (50), P_EMAIL  VARCHAR (50))

BEGIN
    -- Declarar variables
    DECLARE V_PRIMER_NOMBRE 				VARCHAR (50) DEFAULT UPPER(P_PRIMER_NOMBRE);
    DECLARE V_SEGUNDO_NOMBRE 				VARCHAR (40) DEFAULT UPPER(P_SEGUNDO_NOMBRE); 
    DECLARE V_PRIMER_APELLIDO 				VARCHAR (40) DEFAULT UPPER(P_PRIMER_APELLIDO);
    DECLARE V_SEGUNDO_APELLIDO 				VARCHAR (40) DEFAULT UPPER(P_SEGUNDO_APELLIDO);
	DECLARE V_TIPO_DOCUMENTOID_DOCUMENTO 	VARCHAR	(10) ;
    DECLARE V_NUMERO_DOCUMENTO 				VARCHAR (20) DEFAULT UPPER(P_NUMERO_DOCUMENTO);
    DECLARE V_EDAD 							INT 	(5)  DEFAULT UPPER(P_EDAD); 
    DECLARE V_TELEFONO 						BIGINT	(20) DEFAULT UPPER(P_TELEFONO);
    DECLARE V_DIRECCION 					VARCHAR (50) DEFAULT UPPER(P_DIRECCION); 
    DECLARE V_EMAIL  						VARCHAR (50) DEFAULT UPPER(P_EMAIL);
    DECLARE V_ROLID_ROL  					INT		(15) DEFAULT 1;
	
    
    SELECT ID_DOCUMENTO INTO V_TIPO_DOCUMENTOID_DOCUMENTO FROM(SELECT ID_DOCUMENTO FROM TIPO_DOCUMENTO WHERE SIGLAS =P_TIPO_DOCUMENTOID_DOCUMENTO) AS ID_DOCUMENTO;
    
    /*select case P_TIPO_DOCUMENTOID_DOCUMENTO
		WHEN 'CC' 	THEN 1
        WHEN 'CE' 	THEN 2
        WHEN 'NIT'  THEN 3
        ELSE '-1'
	END INTO V_TIPO_DOCUMENTOID_DOCUMENTO;*/
     
    -- Actualizar registro de la tabla usuario sistema
    UPDATE USUARIO 							
		SET   PRIMER_NOMBRE 				=	V_PRIMER_NOMBRE
			, SEGUNDO_NOMBRE 				=	V_SEGUNDO_NOMBRE
			, PRIMER_APELLIDO 				=	V_PRIMER_APELLIDO
			, SEGUNDO_APELLIDO 				=	V_SEGUNDO_APELLIDO
			, TIPO_DOCUMENTOID_DOCUMENTO	=	V_TIPO_DOCUMENTOID_DOCUMENTO
			, NUMERO_DOCUMENTO 				=	V_NUMERO_DOCUMENTO
			, EDAD 							=	V_EDAD
			, TELEFONO 						=	V_TELEFONO
			, DIRECCION 					=	V_DIRECCION
			, EMAIL  						= 	V_EMAIL
	WHERE ID_USUARIO = P_ID_USUARIO;
    
END &

DELIMITER &
CREATE PROCEDURE PR_CREAR_EMPLEADO( P_PRIMER_NOMBRE VARCHAR (40), P_SEGUNDO_NOMBRE VARCHAR (40), P_PRIMER_APELLIDO VARCHAR (40), P_SEGUNDO_APELLIDO VARCHAR (40),
P_TIPO_DOCUMENTOID_DOCUMENTO INT(10), P_NUMERO_DOCUMENTO VARCHAR (20), P_CARGOID_CARGO INT, P_EDAD INT (5), P_TELEFONO BIGINT (20), P_DIRECCION VARCHAR (50), P_EMAIL  VARCHAR (50), P_ROLID_ROL INT)

BEGIN
    -- Declarar variables
    DECLARE V_PRIMER_NOMBRE 				VARCHAR (50) DEFAULT UPPER(P_PRIMER_NOMBRE);
    DECLARE V_SEGUNDO_NOMBRE 				VARCHAR (40) DEFAULT UPPER(P_SEGUNDO_NOMBRE); 
    DECLARE V_PRIMER_APELLIDO 				VARCHAR (40) DEFAULT UPPER(P_PRIMER_APELLIDO);
    DECLARE V_SEGUNDO_APELLIDO 				VARCHAR (40) DEFAULT UPPER(P_SEGUNDO_APELLIDO);
	DECLARE V_TIPO_DOCUMENTOID_DOCUMENTO 	INT		(10) DEFAULT UPPER(P_TIPO_DOCUMENTOID_DOCUMENTO);
    DECLARE V_NUMERO_DOCUMENTO 				VARCHAR (20) DEFAULT UPPER(P_NUMERO_DOCUMENTO);
    DECLARE V_CARGOID_CARGO 				INT 	(10) DEFAULT UPPER(P_CARGOID_CARGO);
    DECLARE V_EDAD 							INT 	(5)  DEFAULT UPPER(P_EDAD); 
    DECLARE V_TELEFONO 						BIGINT	(20) DEFAULT UPPER(P_TELEFONO);
    DECLARE V_DIRECCION 					VARCHAR (50) DEFAULT UPPER(P_DIRECCION); 
    DECLARE V_EMAIL  						VARCHAR (50) DEFAULT UPPER(P_EMAIL);
    DECLARE V_ROLID_ROL  					INT		(15) DEFAULT P_ROLID_ROL;
    DECLARE V_ESTADO  						VARCHAR (30) DEFAULT 'ACTIVO';
    DECLARE V_NUMERO_ALEATORIO_USUARIO     	BIGINT	(20);
    DECLARE V_NUMERO_ALEATORIO_CLAVE     	BIGINT	(20);
    DECLARE V_USUARIO_SISTEMA             	VARCHAR (50);
    DECLARE V_ULTIMO_REGISTRO				INT		(10);
    
    -- Generar número aleatorio
    SELECT VALOR_ALEATORIO INTO V_NUMERO_ALEATORIO_USUARIO FROM( SELECT FLOOR(RAND()*(10000-1+1))+1 AS VALOR_ALEATORIO)  AS NUMERO_ALEATORIO_USUARIO;
    SELECT VALOR_ALEATORIO INTO V_NUMERO_ALEATORIO_CLAVE   FROM( SELECT LPAD(FLOOR(RAND()*(100000-1+1))+1,6,0)  AS VALOR_ALEATORIO) AS NUMERO_ALEATORIO_CLAVE;
    
    -- Generar usuario para login
    SELECT USUARIO_SISTEMA INTO V_USUARIO_SISTEMA FROM (SELECT CONCAT(SUBSTRING(V_PRIMER_NOMBRE,1,1),V_PRIMER_APELLIDO,V_NUMERO_ALEATORIO_USUARIO) AS USUARIO_SISTEMA) AS CREAR_USUARIO_SISTEMA;
    
    -- Crea el registro en la tabla usuario
    INSERT INTO EMPLEADO
    (Id_empleado, Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_apellido, Tipo_documentoId_documento, Numero_documento, cargoId_cargo, Edad, Telefono, Direccion, Email, RolId_rol) 
    VALUES
    (NULL, V_PRIMER_NOMBRE, V_SEGUNDO_NOMBRE, V_PRIMER_APELLIDO, V_SEGUNDO_APELLIDO, V_TIPO_DOCUMENTOID_DOCUMENTO, V_NUMERO_DOCUMENTO, V_CARGOID_CARGO, V_EDAD, V_TELEFONO, V_DIRECCION, V_EMAIL, V_ROLID_ROL);
	
    -- Validar ultimo registro en la tabla usuario
    SELECT ULTIMO_ID_EMPLEADO INTO V_ULTIMO_REGISTRO FROM (select MAX(ID_EMPLEADO) AS ULTIMO_ID_EMPLEADO from EMPLEADO) AS ULTIMO_ID_EMPLEADO;
    
    -- crear usuario para login
    INSERT INTO USUARIO_SISTEMA
	(Id_Usuariosistema, Nombre_usuario, Clave, Avatar, Estado, UsuarioId_usuario, EmpleadoId_empleado)
	VALUES
	(NULL, V_USUARIO_SISTEMA, V_NUMERO_ALEATORIO_CLAVE, NULL, V_ESTADO, NULL, V_ULTIMO_REGISTRO);
    
END &

DELIMITER &
CREATE PROCEDURE PR_CREAR_EVENTOS( 
	  P_NOMBRE_EVENTO 	VARCHAR (50)
    , P_TIPO_IMAGEN		VARCHAR (30)
    , IMAGEN 			VARCHAR (60)
)

BEGIN
	
    -- Declarar variables
    DECLARE V_ESTADO	VARCHAR(20) DEFAULT 'ACTIVO';
    DECLARE V_CANTIDAD_EVENTO	INT;
    DECLARE V_NOMBRE_EVENTO VARCHAR (50);
    
    -- VALIDAR SI YA EXISTE EL EVENTO
    SELECT COUNT(*) INTO V_CANTIDAD_EVENTO FROM EVENTO WHERE TIPO_DE_EVENTO = P_NOMBRE_EVENTO;
    
    -- FORMATEAR NOMBRE
    SELECT FN_FORMATEAR_NOMBRES(P_NOMBRE_EVENTO,'NOR') INTO V_NOMBRE_EVENTO;
    
    IF V_CANTIDAD_EVENTO = 0 THEN
    
		-- INSERTAR 
		INSERT INTO Evento( Tipo_de_evento, tipo_imagen, imagen, Estado)
		VALUES
		(V_NOMBRE_EVENTO, P_TIPO_IMAGEN, IMAGEN, V_ESTADO)
        ;
    
    END IF;
    
END &

DELIMITER &
CREATE PROCEDURE PR_CREAR_INVENTARIO_PAQUETES( 
	  P_ID_PAQUETE 		INT
	, P_ID_INVENTARIO 	INT
    , P_CANTIDAD		INT
)

BEGIN
	
    -- Declarar variables
    DECLARE V_ID_PAQUETE	 	INT;
    DECLARE V_VALOR_SIN_IVA	 	BIGINT;
    DECLARE V_VALOR_TOTAL	 	BIGINT;
    DECLARE V_IVA	 			BIGINT;
    
    -- Sacar el valor del producto en inventario y se multiplica por la cantidad
    SELECT VALOR_SIN_IVA * P_CANTIDAD, IVA * P_CANTIDAD, VALOR_TOTAL * P_CANTIDAD INTO V_VALOR_SIN_IVA, V_IVA, V_VALOR_TOTAL FROM INVENTARIO WHERE ID_INVENTARIO = P_ID_INVENTARIO;
    
    -- Insertar en la tabla inventario paquete
    insert into Inventario_paquete(InventarioId_inventario, PaqueteId_paquete, cantidad, Valor_sin_iva, Iva, Valor_Total)
	values
    (P_ID_INVENTARIO, P_ID_PAQUETE, P_CANTIDAD, V_VALOR_SIN_IVA, V_IVA, V_VALOR_TOTAL);
    
    -- Verificar los valores del inventario para el paquete y sumar
	SELECT SUM(VALOR_SIN_IVA), SUM(IVA), SUM(VALOR_TOTAL) INTO V_VALOR_SIN_IVA, V_IVA, V_VALOR_TOTAL FROM INVENTARIO_PAQUETE WHERE PAQUETEID_PAQUETE = P_ID_PAQUETE;
    
    -- Actualizar el valor del paquete
    UPDATE Paquete SET valor_paquete = V_VALOR_SIN_IVA, valor_iva = V_IVA, valor_total = V_VALOR_TOTAL WHERE ID_PAQUETE = P_ID_PAQUETE;
    
END &

DELIMITER &
CREATE PROCEDURE PR_CREAR_INVENTARIO( 
	 P_INVENTARIO		VARCHAR (50)
	,P_CANTIDAD			INT
    ,P_VALOR_SIN_IVA	INT
    ,P_CATEGORIA		VARCHAR (50)
)

BEGIN
	
    -- Declarar variables
    DECLARE V_INVENTARIO		VARCHAR (50) DEFAULT UPPER(P_INVENTARIO);
    DECLARE V_VALOR_SIN_IVA 	INT DEFAULT	ROUND(P_VALOR_SIN_IVA);
    DECLARE V_VALOR_TOTAL 		INT DEFAULT ROUND(V_VALOR_SIN_IVA * 1.19);
	DECLARE V_IVA				INT DEFAULT V_VALOR_TOTAL - V_VALOR_SIN_IVA;
	DECLARE V_CATEGORIA 		VARCHAR (50) DEFAULT UPPER(P_CATEGORIA);
    DECLARE V_ESTADO			VARCHAR (30) DEFAULT 'ACTIVO';
    DECLARE V_INVENTARIO_NUEVO  VARCHAR (50); 
    
    SELECT INVENTARIO_NUEVO INTO V_INVENTARIO_NUEVO FROM(SELECT CONCAT(SUBSTRING(V_INVENTARIO,1,1),LOWER(SUBSTRING(V_INVENTARIO,2))) AS INVENTARIO_NUEVO) AS INVENTARIO;
    
   -- Insertar Inventario
   INSERT INTO Inventario( Inventario, Cantidad, Valor_sin_iva, Iva, Valor_Total, Categoria, Estado)
   VALUES
   (V_INVENTARIO_NUEVO, P_CANTIDAD, V_VALOR_SIN_IVA, V_IVA, V_VALOR_TOTAL, V_CATEGORIA, V_ESTADO)
   ;
    
END &

DELIMITER &
CREATE PROCEDURE PR_CREAR_PAGO_CARRITO( 
	  P_PAQUETE_IDPAQUETE 	INT
    , P_USUARIOID_USUARIO 	INT
    , P_CIUDAD 				VARCHAR (60)
    , P_BARRIO 				VARCHAR (60)
    , P_DIRECCION			VARCHAR (100)
    , P_FECHA_INICIO_EVENTO DATETIME
    , P_FECHA_FIN_EVENTO	DATETIME
    , P_VALOR_PAGO			INT
)

BEGIN
    -- Declarar variables
	
    DECLARE V_CLAVE_TRANSACCION				VARCHAR (80) DEFAULT 'Llave por defaul';
    DECLARE V_PAYPAL_DATOS					VARCHAR (80) DEFAULT 'Datos de pago defaul';
    DECLARE V_ESTADO  						VARCHAR (30) DEFAULT 'PAGADO';
    DECLARE V_ID_PAQUETE	 				INT;
	DECLARE V_ID_USUARIO 					INT;
    DECLARE V_ID_FACTURA 					INT;
    DECLARE V_VALOR_SIN_IVA					INT;
    DECLARE V_IVA		 					INT;
    DECLARE V_VALOR_TOTAL 					INT;
    DECLARE V_CIUDAD						VARCHAR (80) DEFAULT UPPER(P_CIUDAD);
    DECLARE V_BARRIO						VARCHAR (80) DEFAULT UPPER(P_BARRIO);
    DECLARE V_DIRECCION						VARCHAR (80) DEFAULT UPPER(P_DIRECCION);
    DECLARE V_TIPO_DE_FACTURA				VARCHAR (50) DEFAULT 'ELECTRONICA';
	DECLARE V_DESCRIPCION_FACTURA			VARCHAR (80);
    DECLARE V_ID_TIPO_PAGO					INT DEFAULT 5;
    DECLARE V_ESTADO_PEDIDO					INT DEFAULT 1;
    DECLARE V_ID_PEDIDO						INT;
    DECLARE V_CANTIDAD_PAQUETE				INT;
    DECLARE V_CANTIDAD_USUARIO				INT;
    
    
    -- Validar si existe el paquete
    SELECT COUNT(ID_PAQUETE), ID_PAQUETE, VALOR_PAQUETE, VALOR_IVA, VALOR_TOTAL, TIPO_DE_PAQUETE
    INTO V_CANTIDAD_PAQUETE,V_ID_PAQUETE, V_VALOR_SIN_IVA,  V_IVA, V_VALOR_TOTAL, V_DESCRIPCION_FACTURA
    FROM (SELECT ID_PAQUETE, VALOR_PAQUETE, VALOR_IVA, VALOR_TOTAL, TIPO_DE_PAQUETE FROM PAQUETE WHERE ID_PAQUETE = P_PAQUETE_IDPAQUETE) AS ID_PAQUETE;
    
    IF V_CANTIDAD_PAQUETE = 1 THEN
 
		-- Validar si existe el usuario
		SELECT COUNT(ID_USUARIO), ID_USUARIO INTO V_CANTIDAD_USUARIO, V_ID_USUARIO FROM USUARIO WHERE ID_USUARIO = P_USUARIOID_USUARIO;
		
        IF V_CANTIDAD_USUARIO = 1 THEN
       
			
            -- Crear factura del pedido

			INSERT INTO FACTURA( VALOR_SIN_IVA, IVA, VALOR_TOTAL, TIPO_DE_FACTURA, DESCRIPCION_FACTURA)
			VALUES
			(V_VALOR_SIN_IVA,  V_IVA, V_VALOR_TOTAL, V_TIPO_DE_FACTURA, V_DESCRIPCION_FACTURA)
			;
			
			-- Validar la factura generada
			SELECT ID_FACTURA INTO V_ID_FACTURA FROM (SELECT MAX(ID_FACTURA) AS ID_FACTURA FROM FACTURA) AS ID_FACTURA;
			
			INSERT INTO Pedido( Fecha_pedido, Fecha_inicio_evento, Fecha_fin_evento, Ciudad_evento, Barrio_evento, Direccion_evento, Paquete_Idpaquete, UsuarioId_usuario, EstadopedidoId_estadopedido, FacturaId_factura)
			VALUES
			(sysdate(), P_FECHA_INICIO_EVENTO, P_FECHA_FIN_EVENTO, V_CIUDAD, V_BARRIO, V_DIRECCION, V_ID_PAQUETE, V_ID_USUARIO, V_ESTADO_PEDIDO, V_ID_FACTURA)
			;
			
			-- Traer ultimo registro de pedidos
			SELECT MAX(ID_PEDIDO) INTO V_ID_PEDIDO FROM PEDIDO WHERE ID_PEDIDO >0;
			
			insert into Turno( Fecha_inicio_turno, Fecha_fin_turno, PedidoId_pedido)
			values 
			( P_FECHA_INICIO_EVENTO, P_FECHA_FIN_EVENTO, V_ID_PEDIDO);
            
            -- INSERTAR EN LA TABLA DE PAGO
            insert into pagos( Id_pago, UsuarioId_usuario, PedidoId_pedido, Tipos_de_pagoId_tipo_pago, Total_pago, Clave_transaccional, PaypalDatos, estado)
			values
			( null, P_USUARIOID_USUARIO,	V_ID_PEDIDO, V_ID_TIPO_PAGO, P_VALOR_PAGO, V_CLAVE_TRANSACCION, V_PAYPAL_DATOS, V_ESTADO );
        
        END IF;
		    
    END IF;
 
    
END &

DELIMITER &
CREATE PROCEDURE PR_CREAR_PAQUETES( 
	  P_NOMBRE_EVENTO 		VARCHAR (70)
    , P_NOBREPAQUETE 		VARCHAR (70)
	, P_VALOR				BIGINT
    , P_CANTIDAD			BIGINT
)

BEGIN
	
    -- Declarar variables
    DECLARE V_ID_EVENTO	 INT;
    DECLARE V_ESTADO  	 VARCHAR (30) DEFAULT 'ACTIVO'; 
    
	SELECT ID_EVENTO INTO V_ID_EVENTO FROM EVENTO WHERE TIPO_DE_EVENTO = P_NOMBRE_EVENTO;
    
    -- INSERTAR 
    insert into Paquete( valor_paquete, valor_iva, valor_total, Tipo_de_paquete, Cantidad_Personas, Estado, EventoId_evento)
	values
    ( 0, 0, 0, P_NOBREPAQUETE, P_CANTIDAD, V_ESTADO, V_ID_EVENTO);
    
END &

DELIMITER &
CREATE PROCEDURE PR_CREAR_PEDIDOS( 
	  P_PAQUETE_IDPAQUETE 	INT
    , P_USUARIOID_USUARIO 	INT
    , P_CIUDAD 				VARCHAR (60)
    , P_BARRIO 				VARCHAR (60)
    , P_DIRECCION			VARCHAR (100)
    , P_FECHA_INICIO_EVENTO DATETIME
    , P_FECHA_FIN_EVENTO	DATETIME
)

BEGIN
	
    -- Declarar variables
    DECLARE V_ID_PAQUETE	 				INT;
	DECLARE V_ID_USUARIO 					INT;
    DECLARE V_ID_FACTURA 					INT;
    DECLARE V_VALOR_SIN_IVA					INT;
    DECLARE V_IVA		 					INT;
    DECLARE V_VALOR_TOTAL 					INT;
    DECLARE V_CIUDAD						VARCHAR (80) DEFAULT UPPER(P_CIUDAD);
    DECLARE V_BARRIO						VARCHAR (80) DEFAULT UPPER(P_BARRIO);
    DECLARE V_DIRECCION						VARCHAR (80) DEFAULT UPPER(P_DIRECCION);
    DECLARE V_TIPO_DE_FACTURA				VARCHAR (50) DEFAULT 'ELECTRONICA';
	DECLARE V_DESCRIPCION_FACTURA			VARCHAR (80);
    DECLARE V_ESTADO_PEDIDO					INT DEFAULT 1;
    DECLARE V_ID_PEDIDO						INT;
    
    -- Validar si existe el paquete
    SELECT ID_PAQUETE, VALOR_PAQUETE, VALOR_IVA, VALOR_TOTAL, TIPO_DE_PAQUETE
    INTO V_ID_PAQUETE, V_VALOR_SIN_IVA,  V_IVA, V_VALOR_TOTAL, V_DESCRIPCION_FACTURA
    FROM (SELECT ID_PAQUETE, VALOR_PAQUETE, VALOR_IVA, VALOR_TOTAL, TIPO_DE_PAQUETE FROM PAQUETE WHERE ID_PAQUETE = P_PAQUETE_IDPAQUETE) AS ID_PAQUETE;
    
    -- Validar si existe el usuario
    SELECT ID_USUARIO INTO V_ID_USUARIO FROM (SELECT ID_USUARIO FROM USUARIO WHERE ID_USUARIO = P_USUARIOID_USUARIO) AS ID_USUARIO;
    
    -- Crear factura del pedido

    INSERT INTO FACTURA( VALOR_SIN_IVA, IVA, VALOR_TOTAL, TIPO_DE_FACTURA, DESCRIPCION_FACTURA)
    VALUES
    (V_VALOR_SIN_IVA,  V_IVA, V_VALOR_TOTAL, V_TIPO_DE_FACTURA, V_DESCRIPCION_FACTURA)
    ;
    
    -- Validar la factura generada
    SELECT ID_FACTURA INTO V_ID_FACTURA FROM (SELECT MAX(ID_FACTURA) AS ID_FACTURA FROM FACTURA) AS ID_FACTURA;
    
	INSERT INTO Pedido( Fecha_pedido, Fecha_inicio_evento, Fecha_fin_evento, Ciudad_evento, Barrio_evento, Direccion_evento, Paquete_Idpaquete, UsuarioId_usuario, EstadopedidoId_estadopedido, FacturaId_factura)
    VALUES
    (sysdate(), P_FECHA_INICIO_EVENTO, P_FECHA_FIN_EVENTO, V_CIUDAD, V_BARRIO, V_DIRECCION, V_ID_PAQUETE, V_ID_USUARIO, V_ESTADO_PEDIDO, V_ID_FACTURA)
    ;
    
    -- Traer ultimo registro de pedidos
    SELECT MAX(ID_PEDIDO) INTO V_ID_PEDIDO FROM PEDIDO WHERE ID_PEDIDO >0;
    
    insert into Turno( Fecha_inicio_turno, Fecha_fin_turno, PedidoId_pedido)
	values 
	( P_FECHA_INICIO_EVENTO, P_FECHA_FIN_EVENTO, V_ID_PEDIDO);
    
END &

DELIMITER &
CREATE PROCEDURE PR_CREAR_TURNO( P_ID_PEDIDO INT, P_TIPO_DOCUMENTO VARCHAR (20), P_NUMERO_DOCUMENTO INT )

BEGIN
    -- Declarar variables
    DECLARE V_ID_PEDIDO				INT	;
    DECLARE V_ID_TURNO				INT	;
	DECLARE V_ID_EMPLEADO			INT	;
    
    -- VALIDAR SI EXISTE EL PEDIDO
    SELECT ID_PEDIDO INTO V_ID_PEDIDO FROM PEDIDO WHERE ID_PEDIDO = P_ID_PEDIDO;
    
    -- VALIDAR SI EXISTE EL TURNO
    SELECT ID_TURNO INTO V_ID_TURNO FROM TURNO WHERE PEDIDOID_PEDIDO = V_ID_PEDIDO;
    
    -- VALIDAR SI EXISTE EL EMPLEADOPR_CREAR_TURNO
    SELECT A.ID_EMPLEADO INTO V_ID_EMPLEADO FROM EMPLEADO AS A, TIPO_DOCUMENTO AS B WHERE B.SIGLAS = P_TIPO_DOCUMENTO AND A.NUMERO_DOCUMENTO = P_NUMERO_DOCUMENTO;
    
    -- Crea el registro en la tabla usuario
    IF V_ID_TURNO > 0 AND V_ID_EMPLEADO > 0 THEN
    
		insert into Empleado_turno( EmpleadoId_empleado, TurnoId_turno)
		values 
		(V_ID_EMPLEADO,	V_ID_TURNO);
    
    END IF;
    
END &

DELIMITER &
CREATE PROCEDURE PR_CREAR_USUARIO( P_PRIMER_NOMBRE VARCHAR (40), P_SEGUNDO_NOMBRE VARCHAR (40), P_PRIMER_APELLIDO VARCHAR (40), P_SEGUNDO_APELLIDO VARCHAR (40),
P_TIPO_DOCUMENTOID_DOCUMENTO INT(10), P_NUMERO_DOCUMENTO VARCHAR (20), P_EDAD INT (5), P_TELEFONO BIGINT (20), P_DIRECCION VARCHAR (50), P_EMAIL  VARCHAR (50))

BEGIN
    -- Declarar variables
    DECLARE V_PRIMER_NOMBRE 				VARCHAR (50) DEFAULT UPPER(P_PRIMER_NOMBRE);
    DECLARE V_SEGUNDO_NOMBRE 				VARCHAR (40) DEFAULT UPPER(P_SEGUNDO_NOMBRE); 
    DECLARE V_PRIMER_APELLIDO 				VARCHAR (40) DEFAULT UPPER(P_PRIMER_APELLIDO);
    DECLARE V_SEGUNDO_APELLIDO 				VARCHAR (40) DEFAULT UPPER(P_SEGUNDO_APELLIDO);
	DECLARE V_TIPO_DOCUMENTOID_DOCUMENTO 	INT		(10) DEFAULT UPPER(P_TIPO_DOCUMENTOID_DOCUMENTO);
    DECLARE V_NUMERO_DOCUMENTO 				VARCHAR (20) DEFAULT UPPER(P_NUMERO_DOCUMENTO);
    DECLARE V_EDAD 							INT 	(5)  DEFAULT UPPER(P_EDAD); 
    DECLARE V_TELEFONO 						BIGINT	(20) DEFAULT UPPER(P_TELEFONO);
    DECLARE V_DIRECCION 					VARCHAR (50) DEFAULT UPPER(P_DIRECCION); 
    DECLARE V_EMAIL  						VARCHAR (50) DEFAULT UPPER(P_EMAIL);
    DECLARE V_ROLID_ROL  					INT		(15) DEFAULT 1;
    DECLARE V_ESTADO  						VARCHAR (30) DEFAULT 'ACTIVO';
    DECLARE V_NUMERO_ALEATORIO_USUARIO     	BIGINT	(20);
    DECLARE V_NUMERO_ALEATORIO_CLAVE     	BIGINT	(20);
    DECLARE V_USUARIO_SISTEMA             	VARCHAR (50);
    DECLARE V_ULTIMO_REGISTRO				INT		(10);
    
    -- Generar número aleatorio
    SELECT VALOR_ALEATORIO INTO V_NUMERO_ALEATORIO_USUARIO FROM( SELECT FLOOR(RAND()*(10000-1+1))+1 AS VALOR_ALEATORIO)  AS NUMERO_ALEATORIO_USUARIO;
    SELECT VALOR_ALEATORIO INTO V_NUMERO_ALEATORIO_CLAVE   FROM( SELECT LPAD(FLOOR(RAND()*(100000-1+1))+1,6,0)  AS VALOR_ALEATORIO) AS NUMERO_ALEATORIO_CLAVE;
    
    -- Generar usuario para login
    SELECT USUARIO_SISTEMA INTO V_USUARIO_SISTEMA FROM (SELECT CONCAT(SUBSTRING(V_PRIMER_NOMBRE,1,1),V_PRIMER_APELLIDO,V_NUMERO_ALEATORIO_USUARIO) AS USUARIO_SISTEMA) AS CREAR_USUARIO_SISTEMA;
    
    -- Crea el registro en la tabla usuario
    INSERT INTO USUARIO
    (Id_usuario, Primer_nombre, Segundo_nombre, Primer_apellido, Segundo_apellido, Tipo_documentoId_documento, Numero_documento, Edad, Telefono, Direccion, Email, RolId_rol) 
    VALUES
    (NULL, V_PRIMER_NOMBRE, V_SEGUNDO_NOMBRE, V_PRIMER_APELLIDO, V_SEGUNDO_APELLIDO, V_TIPO_DOCUMENTOID_DOCUMENTO, V_NUMERO_DOCUMENTO, V_EDAD, V_TELEFONO, V_DIRECCION, V_EMAIL, V_ROLID_ROL);
	
    -- Validar ultimo registro en la tabla usuario
    SELECT ULTIMO_ID_USUARIO INTO V_ULTIMO_REGISTRO FROM (select MAX(ID_USUARIO) AS ULTIMO_ID_USUARIO from USUARIO) AS ULTIMO_ID_USUARIO;
    
    -- crear usuario para login
    INSERT INTO USUARIO_SISTEMA
	(Id_Usuariosistema, Nombre_usuario, Clave, Avatar, Estado, UsuarioId_usuario, EmpleadoId_empleado)
	VALUES
	(NULL, V_USUARIO_SISTEMA, V_NUMERO_ALEATORIO_CLAVE, NULL, V_ESTADO, V_ULTIMO_REGISTRO, NULL);
    
END &

DELIMITER &
CREATE PROCEDURE PR_ELIMINAR_EMPLEADO( ID_EMPLEADO INT)

BEGIN
	-- Declarar variables
    DECLARE V_ESTADO VARCHAR (30) DEFAULT 'INACTIVO';
	
    -- Elimina registro de la tabla usuario sistema
    UPDATE USUARIO_SISTEMA SET ESTADO = V_ESTADO WHERE EMPLEADOID_EMPLEADO = ID_EMPLEADO;
    
END &

DELIMITER &
CREATE PROCEDURE PR_ELIMINAR_EVENTO( P_NOMBRE_EVENTO VARCHAR (60))

BEGIN
	-- Declarar variables
    DECLARE V_ESTADO 		VARCHAR (30) DEFAULT 'INACTIVO';
    DECLARE V_ID_EVENTO 	INT;
	
    -- Sacar id del evento
    SELECT ID_EVENTO INTO V_ID_EVENTO FROM EVENTO WHERE TIPO_DE_EVENTO = P_NOMBRE_EVENTO;
    
    -- Elimina registro de la tabla usuario sistema
    UPDATE EVENTO SET ESTADO = V_ESTADO WHERE TIPO_DE_EVENTO = P_NOMBRE_EVENTO;
    
    -- Se Inactiva el registro de los paquetes(todos)
    UPDATE PAQUETE SET ESTADO = V_ESTADO WHERE EVENTOID_EVENTO = V_ID_EVENTO;
    
    
END &

DELIMITER &
CREATE PROCEDURE PR_ELIMINAR_INVENTARIO_PAQUETE(  P_ID_PAQUETE 	INT, P_ID_INVENTARIO 	INT)

BEGIN
	-- Declarar variables
        DECLARE V_VALOR_SIN_IVA	 	BIGINT;
		DECLARE V_VALOR_TOTAL	 	BIGINT;
		DECLARE V_IVA	 			BIGINT;
        DECLARE V_CANTIDADES		BIGINT;
	
    -- Se elimina el registro
    DELETE FROM INVENTARIO_PAQUETE where PAQUETEID_PAQUETE = P_ID_PAQUETE AND INVENTARIOID_INVENTARIO = P_ID_INVENTARIO;
    
    -- contar cantidades
    SELECT COUNT(*) INTO V_CANTIDADES FROM INVENTARIO_PAQUETE WHERE PAQUETEID_PAQUETE = P_ID_PAQUETE;
    
    -- Verificar los valores del inventario para el paquete y sumar
	SELECT SUM(VALOR_SIN_IVA), SUM(IVA), SUM(VALOR_TOTAL) INTO V_VALOR_SIN_IVA, V_IVA, V_VALOR_TOTAL FROM INVENTARIO_PAQUETE WHERE PAQUETEID_PAQUETE = P_ID_PAQUETE;
    
    IF V_CANTIDADES > 0 THEN
    
		-- Actualizar el valor del paquete
		UPDATE Paquete SET valor_paquete = V_VALOR_SIN_IVA, valor_iva = V_IVA, valor_total = V_VALOR_TOTAL WHERE ID_PAQUETE = P_ID_PAQUETE;
    
    ELSE
    
		-- Actualizar el valor del paquete
		UPDATE Paquete SET valor_paquete = 0, valor_iva = 0, valor_total = 0 WHERE ID_PAQUETE = P_ID_PAQUETE;
    
    END IF;

END &

DELIMITER &
CREATE PROCEDURE PR_ELIMINAR_INVENTARIO( P_ID_INVENTARIO INT)

BEGIN
	-- Declarar variables
    DECLARE V_ESTADO VARCHAR (30) DEFAULT 'INACTIVO';
	
    -- Inactiva el registro de la tabla inventario
    UPDATE INVENTARIO SET ESTADO = V_ESTADO WHERE ID_INVENTARIO = P_ID_INVENTARIO;
    
END &

DELIMITER &
CREATE PROCEDURE PR_ELIMINAR_PAQUETE(  P_ID_PAQUETE 	INT)

BEGIN
	-- Declarar variables
        DECLARE V_ESTADO  	 VARCHAR (30) DEFAULT 'INACTIVO'; 
	
    -- Se Inactiva el registro
    UPDATE PAQUETE SET ESTADO = V_ESTADO WHERE ID_PAQUETE = P_ID_PAQUETE;


END &

DELIMITER &
CREATE PROCEDURE PR_ELIMINAR_TURNO( P_ID_EMPLEADO INT, P_ID_TURNO INT)

BEGIN
	-- Declarar variables
    DECLARE V_CANTIDAD INT;
	
    -- Revisar si existe el registro
    SELECT COUNT(*) INTO V_CANTIDAD FROM EMPLEADO_TURNO WHERE EMPLEADOID_EMPLEADO = P_ID_EMPLEADO AND TURNOID_TURNO = P_ID_TURNO;     
    
    IF V_CANTIDAD = 1 THEN
    
		DELETE FROM EMPLEADO_TURNO WHERE EMPLEADOID_EMPLEADO = P_ID_EMPLEADO AND TURNOID_TURNO = P_ID_TURNO; 
    
    END IF;
    
END &

DELIMITER &
CREATE PROCEDURE PR_ELIMINAR_USUARIO( ID_USUARIO INT)

BEGIN
	-- Declarar variables
    DECLARE V_ESTADO VARCHAR (30) DEFAULT 'INACTIVO';
	
    -- Elimina registro de la tabla usuario sistema
    UPDATE USUARIO_SISTEMA SET ESTADO = V_ESTADO WHERE USUARIOID_USUARIO = ID_USUARIO;
    
END &

DELIMITER &
CREATE PROCEDURE PR_GENERAR_REPORTE( P_TIPO_REPORTE VARCHAR (60), P_FECHA_INICIO DATE, P_FECHA_FIN DATE)

BEGIN
	-- Declarar variables
    DECLARE V_TIPO_REPORTE 	VARCHAR (60) DEFAULT UPPER(P_TIPO_REPORTE);
    
	IF P_TIPO_REPORTE ='EMPLEADOS' THEN
   
		SELECT 	A.ID_EMPLEADO
				,CONCAT(A.PRIMER_NOMBRE, ' ',A.SEGUNDO_NOMBRE) 		AS NOMBRES
				,CONCAT(A.PRIMER_APELLIDO, ' ',A.SEGUNDO_APELLIDO) 	AS APELLIDOS
				,CONCAT(B.SIGLAS,'-',A.NUMERO_DOCUMENTO) 			AS DOCUMENTO
				,A.EDAD
				,A.TELEFONO
				,A.EMAIL
				,D.NOMBRE_ROL 										AS ROL
				,E.NOMBRE_DE_CARGO									AS CARGO
				,C.NOMBRE_USUARIO 									AS USUARIO_SISTEMA
				,C.CLAVE
                ,P_FECHA_INICIO
                ,P_FECHA_FIN
		FROM 		EMPLEADO 		AS A
		INNER JOIN 	TIPO_DOCUMENTO 	AS B		ON A.Tipo_documentoId_documento = B.id_documento
		INNER JOIN 	USUARIO_SISTEMA AS C		ON C.EMPLEADOID_EMPLEADO		= A.ID_EMPLEADO
		INNER JOIN 	ROL 			AS D		ON D.id_rol 					= A.rolId_rol
		INNER JOIN	CARGO			AS E		ON A.CARGOID_CARGO				= E.ID_CARGO
		WHERE C.ESTADO = 'ACTIVO'
		;
	
    ELSEIF P_TIPO_REPORTE ='USUARIOS' THEN
    
		SELECT 	A.ID_USUARIO
				,CONCAT(A.PRIMER_NOMBRE, ' ',A.SEGUNDO_NOMBRE) 		AS NOMBRES
				,CONCAT(A.PRIMER_APELLIDO, ' ',A.SEGUNDO_APELLIDO) 	AS APELLIDOS
				,CONCAT(B.SIGLAS,'-',A.NUMERO_DOCUMENTO) 			AS DOCUMENTO
				,A.EDAD
				,A.TELEFONO
				,A.EMAIL
				,D.NOMBRE_ROL 										AS ROL
				,C.NOMBRE_USUARIO 									AS USUARIO_SISTEMA
				,C.CLAVE
                ,P_FECHA_INICIO
                ,P_FECHA_FIN
		FROM 		USUARIO 		AS A
		INNER JOIN 	TIPO_DOCUMENTO 	AS B		ON A.Tipo_documentoId_documento = B.id_documento
		INNER JOIN 	USUARIO_SISTEMA AS C		ON C.USUARIOID_USUARIO 			= A.id_usuario
		INNER JOIN 	ROL 			AS D		ON D.id_rol 					= A.rolId_rol
		WHERE C.ESTADO = 'ACTIVO'
		;
        
	ELSEIF P_TIPO_REPORTE ='PEDIDOS' THEN
    
		SELECT 	 A.ID_PEDIDO
				,A.FECHA_PEDIDO
				,CONCAT(B.PRIMER_NOMBRE,' ',B.SEGUNDO_NOMBRE)			AS NOMBRES
				,CONCAT(B.PRIMER_APELLIDO,' ',B.SEGUNDO_APELLIDO)		AS APELLIDOS
				,CONCAT(E.SIGLAS,' - ',B.NUMERO_DOCUMENTO)			    AS DOCUMENTO
				,C.ID_PAQUETE
				,D.TIPO_DE_EVENTO										AS EVENTO
				,C.TIPO_DE_PAQUETE										AS PAQUETE
				,C.VALOR_PAQUETE
				,C.VALOR_IVA											AS IVA
				,C.VALOR_TOTAL
				,F.ESTADO
				,A.FECHA_INICIO_EVENTO
				,A.FECHA_FIN_EVENTO
				,CIUDAD_EVENTO
				,BARRIO_EVENTO
				,DIRECCION_EVENTO
				,P_FECHA_INICIO
                ,P_FECHA_FIN
			FROM PEDIDO					AS A
			INNER JOIN USUARIO			AS B	ON A.USUARIOID_USUARIO 			= B.ID_USUARIO
			INNER JOIN PAQUETE			AS C	ON A.PAQUETE_IDPAQUETE 			= C.ID_PAQUETE
			INNER JOIN EVENTO			AS D	ON C.EVENTOID_EVENTO 			= D.ID_EVENTO
			INNER JOIN TIPO_DOCUMENTO	AS E	ON B.TIPO_DOCUMENTOID_DOCUMENTO	= E.ID_DOCUMENTO
			INNER JOIN ESTADO_PEDIDO	AS F	ON A.ESTADOPEDIDOID_ESTADOPEDIDO= F.ID_ESTADOPEDIDO
			ORDER BY ID_PEDIDO
			;
    
	ELSE
	
		SELECT 'REPORTE NO CONFIGURADO';
    
	END IF;
    
END &

DELIMITER &
CREATE PROCEDURE PR_OBTENER_ULTIMO_PAQUETE( 
    P_EVENTO 			VARCHAR (60)
)

BEGIN

SELECT 	MAX(TIPO_DE_PAQUETE) ULTIMO_PAQUETE
		,COUNT(*) CANTIDAD
FROM PAQUETE		AS A
INNER JOIN EVENTO 	AS B ON A.EVENTOID_EVENTO	=	B.ID_EVENTO
WHERE B.TIPO_DE_EVENTO = P_EVENTO
;

END &

DELIMITER &
CREATE PROCEDURE PR_OBTENER_USUARIO_SISTEMA( 
	  P_TIPO_USUARIO	VARCHAR (30)
    , P_USUARIO 		VARCHAR (70)
    , P_CLAVE 			VARCHAR (40)

)

BEGIN
    -- Declarar variables
    DECLARE V_TIPO_USUARIO 					VARCHAR (50) DEFAULT UPPER(P_TIPO_USUARIO);
    DECLARE V_ISCORREO		 				INT;
	
    select locate('@',P_USUARIO) INTO V_ISCORREO;
    IF V_ISCORREO >0 THEN
    
		IF V_TIPO_USUARIO = 'USUARIO' THEN
        
			SELECT 	A.ID_USUARIO
					,CONCAT(A.PRIMER_NOMBRE, ' ',A.SEGUNDO_NOMBRE,' ',A.PRIMER_APELLIDO,' ',A.SEGUNDO_APELLIDO) AS NOMBRE		
					,A.EDAD
					,A.EMAIL
					,D.NOMBRE_ROL 																				AS ROL
                    ,C.AVATAR
					,C.NOMBRE_USUARIO 																			AS USUARIO_SISTEMA
					,C.CLAVE
			FROM 		USUARIO 		AS A
			INNER JOIN 	TIPO_DOCUMENTO 	AS B		ON A.Tipo_documentoId_documento = B.id_documento
			INNER JOIN 	USUARIO_SISTEMA AS C		ON C.USUARIOID_USUARIO = A.id_usuario
			INNER JOIN 	ROL 			AS D		ON D.id_rol = A.rolId_rol
			WHERE C.ESTADO ='ACTIVO'
			AND A.EMAIL = P_USUARIO
            AND C.CLAVE = P_CLAVE
			;
        
        ELSEIF V_TIPO_USUARIO = 'EMPLEADO' THEN
        
			SELECT 	 A.ID_EMPLEADO
					,CONCAT(A.PRIMER_NOMBRE, ' ',A.SEGUNDO_NOMBRE,' ',A.PRIMER_APELLIDO,' ',A.SEGUNDO_APELLIDO) AS NOMBRE
					,A.EDAD
					,A.EMAIL
					,D.NOMBRE_ROL 																				AS ROL
                    ,C.AVATAR
					,C.NOMBRE_USUARIO 																			AS USUARIO_SISTEMA
					,C.CLAVE
			FROM 		EMPLEADO 		AS A
			INNER JOIN 	TIPO_DOCUMENTO 	AS B		ON A.Tipo_documentoId_documento = B.id_documento
			INNER JOIN 	USUARIO_SISTEMA AS C		ON C.EMPLEADOID_EMPLEADO 		= A.ID_EMPLEADO
			INNER JOIN 	ROL 			AS D		ON D.id_rol 					= A.rolId_rol
			INNER JOIN	CARGO			AS E		ON A.CARGOID_CARGO 				= E.ID_CARGO
			WHERE C.ESTADO ='ACTIVO'
            AND A.EMAIL = P_USUARIO
            AND C.CLAVE = P_CLAVE
			;
        
        END IF;
	
    ELSEIF V_ISCORREO =0 THEN
    
		IF V_TIPO_USUARIO = 'USUARIO' THEN
        
			SELECT 	A.ID_USUARIO
			,CONCAT(A.PRIMER_NOMBRE, ' ',A.SEGUNDO_NOMBRE,' ',A.PRIMER_APELLIDO,' ',A.SEGUNDO_APELLIDO) AS NOMBRE		
			,A.EDAD
			,A.EMAIL
			,D.NOMBRE_ROL 																				AS ROL
            ,C.AVATAR
			,C.NOMBRE_USUARIO 																			AS USUARIO_SISTEMA
			,C.CLAVE
			FROM 		USUARIO 		AS A
			INNER JOIN 	TIPO_DOCUMENTO 	AS B		ON A.Tipo_documentoId_documento = B.id_documento
			INNER JOIN 	USUARIO_SISTEMA AS C		ON C.USUARIOID_USUARIO = A.id_usuario
			INNER JOIN 	ROL 			AS D		ON D.id_rol = A.rolId_rol
			WHERE C.ESTADO ='ACTIVO'
			AND C.NOMBRE_USUARIO = P_USUARIO
            AND C.CLAVE = P_CLAVE
			;
        
        ELSEIF V_TIPO_USUARIO = 'EMPLEADO' THEN
        
			SELECT 	 A.ID_EMPLEADO
					,CONCAT(A.PRIMER_NOMBRE, ' ',A.SEGUNDO_NOMBRE,' ',A.PRIMER_APELLIDO,' ',A.SEGUNDO_APELLIDO) AS NOMBRE
					,A.EDAD
					,A.EMAIL
					,D.NOMBRE_ROL 																				AS ROL
                    ,C.AVATAR
					,C.NOMBRE_USUARIO 																			AS USUARIO_SISTEMA
					,C.CLAVE
			FROM 		EMPLEADO 		AS A
			INNER JOIN 	TIPO_DOCUMENTO 	AS B		ON A.Tipo_documentoId_documento = B.id_documento
			INNER JOIN 	USUARIO_SISTEMA AS C		ON C.EMPLEADOID_EMPLEADO 		= A.ID_EMPLEADO
			INNER JOIN 	ROL 			AS D		ON D.id_rol 					= A.rolId_rol
			INNER JOIN	CARGO			AS E		ON A.CARGOID_CARGO 				= E.ID_CARGO
			WHERE C.ESTADO ='ACTIVO'
            AND C.NOMBRE_USUARIO = P_USUARIO
            AND C.CLAVE = P_CLAVE
			;
        
        END IF;
    
    END IF;
    
END &

DELIMITER &
CREATE PROCEDURE PR_CARGOS()
SELECT * FROM CARGO
;&

DELIMITER &
CREATE PROCEDURE PR_VER_EMPLEADOS()
SELECT 	A.ID_EMPLEADO
		,CONCAT(A.PRIMER_NOMBRE, ' ',A.SEGUNDO_NOMBRE) 		AS NOMBRES
		,CONCAT(A.PRIMER_APELLIDO, ' ',A.SEGUNDO_APELLIDO) 	AS APELLIDOS
		,CONCAT(B.SIGLAS,'-',A.NUMERO_DOCUMENTO) 			AS DOCUMENTO
		,A.EDAD
        ,A.TELEFONO
		,A.EMAIL
		,D.NOMBRE_ROL 										AS ROL
        ,E.NOMBRE_DE_CARGO									AS CARGO
		,C.NOMBRE_USUARIO 									AS USUARIO_SISTEMA
		,C.CLAVE
FROM 		EMPLEADO 		AS A
INNER JOIN 	TIPO_DOCUMENTO 	AS B		ON A.Tipo_documentoId_documento = B.id_documento
INNER JOIN 	USUARIO_SISTEMA AS C		ON C.EMPLEADOID_EMPLEADO		= A.ID_EMPLEADO
INNER JOIN 	ROL 			AS D		ON D.id_rol 					= A.rolId_rol
INNER JOIN	CARGO			AS E		ON A.CARGOID_CARGO				= E.ID_CARGO
WHERE C.ESTADO = 'ACTIVO'
;&

DELIMITER &
CREATE PROCEDURE PR_ESTADO_PEDIDO()
SELECT * FROM ESTADO_PEDIDO;&

DELIMITER &
CREATE PROCEDURE PR_VER_INVENTARIO()
SELECT * FROM INVENTARIO
WHERE ESTADO='ACTIVO'; &

DELIMITER &
CREATE PROCEDURE PR_VER_PEDIDOS()
SELECT 	 A.ID_PEDIDO
		,A.FECHA_PEDIDO
		,CONCAT(B.PRIMER_NOMBRE,' ',B.SEGUNDO_NOMBRE)			AS NOMBRES
        ,CONCAT(B.PRIMER_APELLIDO,' ',B.SEGUNDO_APELLIDO)		AS APELLIDOS
        ,CONCAT(E.SIGLAS,' - ',B.NUMERO_DOCUMENTO)			    AS DOCUMENTO
		,C.ID_PAQUETE
        ,D.TIPO_DE_EVENTO										AS EVENTO
        ,C.TIPO_DE_PAQUETE										AS PAQUETE
        ,C.VALOR_PAQUETE
        ,C.VALOR_IVA											AS IVA
        ,C.VALOR_TOTAL
        ,F.ESTADO
        ,A.FECHA_INICIO_EVENTO
        ,A.FECHA_FIN_EVENTO
        ,CIUDAD_EVENTO
        ,BARRIO_EVENTO
        ,DIRECCION_EVENTO
FROM PEDIDO					AS A
INNER JOIN USUARIO			AS B	ON A.USUARIOID_USUARIO 			= B.ID_USUARIO
INNER JOIN PAQUETE			AS C	ON A.PAQUETE_IDPAQUETE 			= C.ID_PAQUETE
INNER JOIN EVENTO			AS D	ON C.EVENTOID_EVENTO 			= D.ID_EVENTO
INNER JOIN TIPO_DOCUMENTO	AS E	ON B.TIPO_DOCUMENTOID_DOCUMENTO	= E.ID_DOCUMENTO
INNER JOIN ESTADO_PEDIDO	AS F	ON A.ESTADOPEDIDOID_ESTADOPEDIDO= F.ID_ESTADOPEDIDO
ORDER BY ID_PEDIDO
;&

DELIMITER &
CREATE PROCEDURE PR_ROLES()
SELECT * FROM ROL
WHERE NOMBRE_ROL NOT IN ('Cliente')
;&

DELIMITER &
CREATE PROCEDURE PR_TIPO_DOCUMENTO()
select * from TIPO_DOCUMENTO;&

DELIMITER &
CREATE PROCEDURE PR_VER_TURNO_EMPLEADO( P_ID int)
SELECT 	C.ID_TURNO
        ,FECHA_INICIO_EVENTO
        ,FECHA_FIN_EVENTO
        ,A.ID_EMPLEADO
		,CONCAT(A.PRIMER_NOMBRE, ' ',A.SEGUNDO_NOMBRE, ' ',A.PRIMER_APELLIDO, ' ',A.SEGUNDO_APELLIDO) 	AS NOMBRE
        ,NOMBRE_DE_CARGO
        ,ID_PEDIDO
        ,CIUDAD_EVENTO
        ,BARRIO_EVENTO
        ,DIRECCION_EVENTO
FROM 		EMPLEADO 		AS A
INNER JOIN 	EMPLEADO_TURNO	AS B ON A.ID_EMPLEADO		=	B.EMPLEADOID_EMPLEADO
INNER JOIN	TURNO			AS C ON B.TURNOID_TURNO		=	C.ID_TURNO
INNER JOIN	PEDIDO			AS D ON C.PEDIDOID_PEDIDO	=	D.ID_PEDIDO
INNER JOIN	CARGO			AS E ON A.CARGOID_CARGO		=	E.ID_CARGO
WHERE A.ID_EMPLEADO = P_ID
ORDER BY 1
;&

DELIMITER &
CREATE PROCEDURE PR_VER_TURNOS()
SELECT 	C.ID_TURNO
        ,FECHA_INICIO_EVENTO
        ,FECHA_FIN_EVENTO
        ,A.ID_EMPLEADO
		,CONCAT(A.PRIMER_NOMBRE, ' ',A.SEGUNDO_NOMBRE, ' ',A.PRIMER_APELLIDO, ' ',A.SEGUNDO_APELLIDO) 	AS NOMBRE
        ,NOMBRE_DE_CARGO
        ,ID_PEDIDO
        ,CIUDAD_EVENTO
        ,BARRIO_EVENTO
        ,DIRECCION_EVENTO
FROM 		EMPLEADO 		AS A
INNER JOIN 	EMPLEADO_TURNO	AS B ON A.ID_EMPLEADO		=	B.EMPLEADOID_EMPLEADO
INNER JOIN	TURNO			AS C ON B.TURNOID_TURNO		=	C.ID_TURNO
INNER JOIN	PEDIDO			AS D ON C.PEDIDOID_PEDIDO	=	D.ID_PEDIDO
INNER JOIN	CARGO			AS E ON A.CARGOID_CARGO		=	E.ID_CARGO
-- WHERE A.ID_EMPLEADO = 1
ORDER BY 1
;&


DELIMITER &
CREATE PROCEDURE PR_ACTUALIZAR_CARGO( P_CODIGO INT, P_NOMBRE VARCHAR(30) )

BEGIN

	UPDATE CARGO SET NOMBRE_DE_CARGO = P_NOMBRE WHERE ID_CARGO= P_CODIGO;
    
END &


DELIMITER &
CREATE PROCEDURE PR_ACTUALIZAR_EMPLEADO( P_ID_EMPLEADO INT, P_PRIMER_NOMBRE VARCHAR (40), P_SEGUNDO_NOMBRE VARCHAR (40), P_PRIMER_APELLIDO VARCHAR (40), P_SEGUNDO_APELLIDO VARCHAR (40),
P_TIPO_DOCUMENTOID_DOCUMENTO VARCHAR(10), P_NUMERO_DOCUMENTO VARCHAR (20), P_CARGOID_CARGO VARCHAR (50), P_EDAD INT (5), P_TELEFONO BIGINT (20), P_DIRECCION VARCHAR (50), P_EMAIL  VARCHAR (50), P_ROLID_ROL VARCHAR(50))

BEGIN
    -- Declarar variables
    DECLARE V_PRIMER_NOMBRE 				VARCHAR (50) DEFAULT UPPER(P_PRIMER_NOMBRE);
    DECLARE V_SEGUNDO_NOMBRE 				VARCHAR (40) DEFAULT UPPER(P_SEGUNDO_NOMBRE); 
    DECLARE V_PRIMER_APELLIDO 				VARCHAR (40) DEFAULT UPPER(P_PRIMER_APELLIDO);
    DECLARE V_SEGUNDO_APELLIDO 				VARCHAR (40) DEFAULT UPPER(P_SEGUNDO_APELLIDO);
	DECLARE V_TIPO_DOCUMENTOID_DOCUMENTO 	VARCHAR	(10) ;
    DECLARE V_NUMERO_DOCUMENTO 				VARCHAR (20) DEFAULT UPPER(P_NUMERO_DOCUMENTO);
    DECLARE V_CARGOID_CARGO 				INT 	(5)  ; 
    DECLARE V_EDAD 							INT 	(5)  DEFAULT UPPER(P_EDAD);
    DECLARE V_TELEFONO 						BIGINT	(20) DEFAULT UPPER(P_TELEFONO);
    DECLARE V_DIRECCION 					VARCHAR (50) DEFAULT UPPER(P_DIRECCION); 
    DECLARE V_EMAIL  						VARCHAR (50) DEFAULT UPPER(P_EMAIL);
    DECLARE V_ROLID_ROL  					INT		(15) ;
	
    -- Obtener Id del documento enviado
    SELECT ID_DOCUMENTO INTO V_TIPO_DOCUMENTOID_DOCUMENTO FROM(SELECT ID_DOCUMENTO FROM TIPO_DOCUMENTO WHERE SIGLAS = P_TIPO_DOCUMENTOID_DOCUMENTO) AS ID_DOCUMENTO;
    
    -- Obtener Id del cargo enviado
    SELECT ID_CARGO INTO V_CARGOID_CARGO FROM(SELECT ID_CARGO FROM CARGO WHERE NOMBRE_DE_CARGO =P_CARGOID_CARGO) AS ID_CARGO;
    
    -- Obtener Id del rol enviado
    SELECT ID_ROL INTO V_ROLID_ROL FROM(SELECT ID_ROL FROM ROL WHERE NOMBRE_ROL =P_ROLID_ROL) AS ID_ROL;
    
    -- Editar registro de la tabla usuario sistema
    UPDATE EMPLEADO 							
		SET   PRIMER_NOMBRE 				=	V_PRIMER_NOMBRE
			, SEGUNDO_NOMBRE 				=	V_SEGUNDO_NOMBRE
			, PRIMER_APELLIDO 				=	V_PRIMER_APELLIDO
			, SEGUNDO_APELLIDO 				=	V_SEGUNDO_APELLIDO
			, TIPO_DOCUMENTOID_DOCUMENTO	=	V_TIPO_DOCUMENTOID_DOCUMENTO
			, NUMERO_DOCUMENTO 				=	V_NUMERO_DOCUMENTO
            , CARGOID_CARGO					=	V_CARGOID_CARGO
			, EDAD 							=	V_EDAD
			, TELEFONO 						=	V_TELEFONO
			, DIRECCION 					=	V_DIRECCION
			, EMAIL  						= 	V_EMAIL
            , ROLID_ROL						=	V_ROLID_ROL
	WHERE ID_EMPLEADO = P_ID_EMPLEADO;
    
END &

DELIMITER &
CREATE PROCEDURE PR_ACTUALIZAR_EVENTO( 
	P_ID_EVENTO 		INT
	,P_NOMBRE_EVENTO 	VARCHAR (50)
    , P_TIPO_IMAGEN		VARCHAR (30)
    , P_IMAGEN 			VARCHAR (60)
)

BEGIN
	 -- Declarar variables
    DECLARE V_ID_EVENTO	INT;
    DECLARE V_CANTIDAD_EVENTO	INT;
    DECLARE V_NOMBRE_EVENTO VARCHAR (50);
    
    -- VALIDAR SI YA EXISTE EL EVENTO
    SELECT COUNT(*) INTO V_CANTIDAD_EVENTO FROM EVENTO WHERE TIPO_DE_EVENTO = P_NOMBRE_EVENTO;
    
    -- VALIDAR ID EVENTO
    SELECT ID_EVENTO INTO V_ID_EVENTO FROM EVENTO WHERE TIPO_DE_EVENTO = P_NOMBRE_EVENTO;
    
    -- FORMATEAR NOMBRE
    SELECT FN_FORMATEAR_NOMBRES(P_NOMBRE_EVENTO,'NOR') INTO V_NOMBRE_EVENTO;
    
    IF V_CANTIDAD_EVENTO = 0 OR V_ID_EVENTO = P_ID_EVENTO THEN
    
		-- Actualizar registro de la tabla evento
		UPDATE EVENTO 
        SET TIPO_DE_EVENTO = P_NOMBRE_EVENTO 
			,TIPO_IMAGEN = P_TIPO_IMAGEN
            ,IMAGEN = P_IMAGEN
		WHERE ID_EVENTO = P_ID_EVENTO;
    
    END IF;
    
END &

DELIMITER &
CREATE PROCEDURE PR_ACTUALIZAR_INVENTARIO( 
	P_ID_INVENTARIO		INT
	,P_INVENTARIO		VARCHAR (50)
	,P_CANTIDAD			INT
    ,P_VALOR_SIN_IVA	INT
    ,P_CATEGORIA		VARCHAR (50)
)

BEGIN
	
    -- Declarar variables
    DECLARE V_INVENTARIO		VARCHAR (50) DEFAULT UPPER(P_INVENTARIO);
    DECLARE V_VALOR_SIN_IVA 	INT DEFAULT	ROUND(P_VALOR_SIN_IVA);
    DECLARE V_VALOR_TOTAL 		INT DEFAULT ROUND(V_VALOR_SIN_IVA * 1.19);
	DECLARE V_IVA				INT DEFAULT V_VALOR_TOTAL - V_VALOR_SIN_IVA;
	DECLARE V_CATEGORIA 		VARCHAR (50) DEFAULT UPPER(P_CATEGORIA);
    DECLARE V_ESTADO			VARCHAR (30) DEFAULT 'ACTIVO';
    DECLARE V_INVENTARIO_NUEVO  VARCHAR (50); 
    
    SELECT INVENTARIO_NUEVO INTO V_INVENTARIO_NUEVO FROM(SELECT CONCAT(SUBSTRING(V_INVENTARIO,1,1),LOWER(SUBSTRING(V_INVENTARIO,2))) AS INVENTARIO_NUEVO) AS INVENTARIO;
    
   -- Actualizar Inventario
   UPDATE Inventario 
   SET 	Inventario		= V_INVENTARIO_NUEVO
		,Cantidad		= P_CANTIDAD
        ,Valor_sin_iva	= V_VALOR_SIN_IVA
        ,Iva			= V_IVA
        ,Valor_Total	= V_VALOR_TOTAL
        ,Categoria		= V_CATEGORIA
        ,Estado			= V_ESTADO
   WHERE ID_INVENTARIO = P_ID_INVENTARIO
   ;
    
END &
DELIMITER &
CREATE PROCEDURE PR_VER_USUARIOS()
SELECT 	A.ID_USUARIO
		,CONCAT(A.PRIMER_NOMBRE, ' ',A.SEGUNDO_NOMBRE) 		AS NOMBRES
		,CONCAT(A.PRIMER_APELLIDO, ' ',A.SEGUNDO_APELLIDO) 	AS APELLIDOS
		,CONCAT(B.SIGLAS,'-',A.NUMERO_DOCUMENTO) 			AS DOCUMENTO
		,A.EDAD
        ,A.TELEFONO
		,A.EMAIL
		,D.NOMBRE_ROL 										AS ROL
		,C.NOMBRE_USUARIO 									AS USUARIO_SISTEMA
		,C.CLAVE
FROM 		USUARIO 		AS A
INNER JOIN 	TIPO_DOCUMENTO 	AS B		ON A.Tipo_documentoId_documento = B.id_documento
INNER JOIN 	USUARIO_SISTEMA AS C		ON C.USUARIOID_USUARIO 			= A.id_usuario
INNER JOIN 	ROL 			AS D		ON D.id_rol 					= A.rolId_rol
WHERE C.ESTADO = 'ACTIVO'
; &
/* **************************************** */

/* ********** CREACION DE VISTAS EN EL SISTEMA ********** */
DELIMITER &
CREATE OR REPLACE VIEW VW_VER_INVENTARIO
(
	ID_INVENTARIO
	,INVENTARIO
	,CANTIDAD
	,VALOR_SIN_IVA
	,IVA
	,VALOR_TOTAL
	,CATEGORIA
)
AS

SELECT	ID_INVENTARIO
		,INVENTARIO
        ,CANTIDAD
        ,VALOR_SIN_IVA
        ,IVA
        ,VALOR_TOTAL
        ,CATEGORIA
FROM INVENTARIO
WHERE ESTADO='ACTIVO';&

DELIMITER &
CREATE OR REPLACE VIEW VW_VER_PAQUETE
(    ID_EVENTO
	,TIPO_DE_EVENTO
	,ID_PAQUETE
	,TIPO_DE_PAQUETE
    ,ID_INVENTARIO
    ,INVENTARIO
    ,CANTIDAD
    ,VALOR_SIN_IVA
	,IVA
	,VALOR_TOTAL
)

AS

SELECT 	 D.ID_EVENTO
		,D.TIPO_DE_EVENTO
		,A.ID_PAQUETE
		,A.TIPO_DE_PAQUETE
        ,C.ID_INVENTARIO
        ,C.INVENTARIO
        ,B.CANTIDAD
        ,B.VALOR_SIN_IVA
        ,B.IVA
        ,B.VALOR_TOTAL
FROM PAQUETE A
INNER JOIN INVENTARIO_PAQUETE	AS B	ON A.ID_PAQUETE						= B.PAQUETEID_PAQUETE
INNER JOIN INVENTARIO			AS C	ON B.INVENTARIOID_INVENTARIO		= C.ID_INVENTARIO
INNER JOIN EVENTO				AS D	ON A.EVENTOID_EVENTO 				= D.ID_EVENTO
WHERE A.ESTADO ='ACTIVO'
ORDER BY ID_EVENTO ASC
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_VER_PAQUETES_EVENTOS
(    ID_EVENTO
	,TIPO_DE_EVENTO
	,ID_PAQUETE
	,TIPO_DE_PAQUETE
	,CANTIDAD_PERSONAS
    ,VALOR_TOTAL
)

AS

SELECT 	 ID_EVENTO
		,TIPO_DE_EVENTO
		,ID_PAQUETE
		,TIPO_DE_PAQUETE
        ,CANTIDAD_PERSONAS
        ,VALOR_TOTAL
FROM PAQUETE A
INNER JOIN EVENTO				AS D	ON A.EVENTOID_EVENTO 				= D.ID_EVENTO
WHERE A.ESTADO ='ACTIVO'
ORDER BY ID_EVENTO ASC
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_VER_PEDIDOS_USUARIO
(    ID_PEDIDO
	,FECHA_PEDIDO
    ,ID_USUARIO
    ,NOMBRES
    ,APELLIDOS
    ,DOCUMENTO
    ,ID_PAQUETE    
    ,EVENTO
    ,PAQUETE
    ,VALOR_PAQUETE
    ,IVA
    ,VALOR_TOTAL
    ,ESTADO
    ,ID_FACTURA
    ,TIPO_DE_FACTURA
    ,FECHA_INICIO_EVENTO
	,FECHA_FIN_EVENTO
    ,CIUDAD_EVENTO
	,BARRIO_EVENTO
	,DIRECCION_EVENTO

)

AS

SELECT 	 A.ID_PEDIDO
		,A.FECHA_PEDIDO
        ,A.USUARIOID_USUARIO
		,CONCAT(B.PRIMER_NOMBRE, ' ', B.SEGUNDO_NOMBRE)			AS NOMBRES
        ,CONCAT(B.PRIMER_APELLIDO, '', B.SEGUNDO_APELLIDO)		AS APELLIDOS
        ,CONCAT(E.SIGLAS, ' - ', B.NUMERO_DOCUMENTO)			AS DOCUMENTO
		,C.ID_PAQUETE
        ,D.TIPO_DE_EVENTO										AS EVENTO
        ,C.TIPO_DE_PAQUETE										AS PAQUETE
        ,C.VALOR_PAQUETE
        ,C.VALOR_IVA											AS IVA
        ,C.VALOR_TOTAL
        ,F.ESTADO
        ,G.ID_FACTURA
        ,G.TIPO_DE_FACTURA
        ,A.FECHA_INICIO_EVENTO
        ,A.FECHA_FIN_EVENTO
        ,CIUDAD_EVENTO
        ,BARRIO_EVENTO
        ,DIRECCION_EVENTO
FROM PEDIDO						AS A
INNER JOIN USUARIO				AS B	ON A.USUARIOID_USUARIO 				= B.ID_USUARIO
INNER JOIN PAQUETE				AS C	ON A.PAQUETE_IDPAQUETE 				= C.ID_PAQUETE
INNER JOIN EVENTO				AS D	ON C.EVENTOID_EVENTO 				= D.ID_EVENTO
INNER JOIN TIPO_DOCUMENTO		AS E	ON B.TIPO_DOCUMENTOID_DOCUMENTO		= E.ID_DOCUMENTO
INNER JOIN ESTADO_PEDIDO		AS F	ON A.ESTADOPEDIDOID_ESTADOPEDIDO	= F.ID_ESTADOPEDIDO
INNER JOIN FACTURA				AS G	ON A.FACTURAID_FACTURA				= G.ID_FACTURA
ORDER BY ID_PEDIDO
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_VER_PEDIDOS
(    ID_PEDIDO
	,FECHA_PEDIDO
    ,NOMBRES
    ,APELLIDOS
    ,DOCUMENTO
    ,ID_PAQUETE    
    ,EVENTO
    ,PAQUETE
    ,VALOR_PAQUETE
    ,IVA
    ,VALOR_TOTAL
    ,ESTADO
    ,ID_FACTURA
    ,TIPO_DE_FACTURA
    ,FECHA_INICIO_EVENTO
	,FECHA_FIN_EVENTO
    ,CIUDAD_EVENTO
	,BARRIO_EVENTO
	,DIRECCION_EVENTO
    ,RESPUESTA_MODAL
    ,DESCRIPCION_MODAL
)

AS

SELECT 	 A.ID_PEDIDO
		,A.FECHA_PEDIDO
		,CONCAT(B.PRIMER_NOMBRE, ' ', B.SEGUNDO_NOMBRE)			AS NOMBRES
        ,CONCAT(B.PRIMER_APELLIDO, '', B.SEGUNDO_APELLIDO)		AS APELLIDOS
        ,CONCAT(E.SIGLAS, ' - ', B.NUMERO_DOCUMENTO)			AS DOCUMENTO
		,C.ID_PAQUETE
        ,D.TIPO_DE_EVENTO										AS EVENTO
        ,C.TIPO_DE_PAQUETE										AS PAQUETE
        ,C.VALOR_PAQUETE
        ,C.VALOR_IVA											AS IVA
        ,C.VALOR_TOTAL
        ,F.ESTADO
        ,G.ID_FACTURA
        ,G.TIPO_DE_FACTURA
        ,A.FECHA_INICIO_EVENTO
        ,A.FECHA_FIN_EVENTO
        ,CIUDAD_EVENTO
        ,BARRIO_EVENTO
        ,DIRECCION_EVENTO
        ,CONCAT('Pedido  -',A.ID_PEDIDO)															AS RESPUESTA_MODAL
        ,CONCAT(B.PRIMER_NOMBRE,' ',B.SEGUNDO_NOMBRE,' ',B.PRIMER_APELLIDO,' ',B.SEGUNDO_APELLIDO)	AS DESCRIPCION_MODAL
FROM PEDIDO						AS A
INNER JOIN USUARIO				AS B	ON A.USUARIOID_USUARIO 				= B.ID_USUARIO
INNER JOIN PAQUETE				AS C	ON A.PAQUETE_IDPAQUETE 				= C.ID_PAQUETE
INNER JOIN EVENTO				AS D	ON C.EVENTOID_EVENTO 				= D.ID_EVENTO
INNER JOIN TIPO_DOCUMENTO		AS E	ON B.TIPO_DOCUMENTOID_DOCUMENTO		= E.ID_DOCUMENTO
INNER JOIN ESTADO_PEDIDO		AS F	ON A.ESTADOPEDIDOID_ESTADOPEDIDO	= F.ID_ESTADOPEDIDO
INNER JOIN FACTURA				AS G	ON A.FACTURAID_FACTURA				= G.ID_FACTURA
ORDER BY ID_PEDIDO
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_VER_TIPO_DOCUMENTO 
(
	 ID_DOCUMENTO
    ,SIGLAS
    ,NOMBRE_TIPO_DOCUMENTO
)
AS

SELECT   ID_DOCUMENTO
		,SIGLAS
		,NOMBRE_TIPO_DOCUMENTO 
FROM TIPO_DOCUMENTO;&

DELIMITER &
CREATE OR REPLACE VIEW VW_VER_TURNO
(	
	ID_TURNO
	,FECHA_INICIO_EVENTO
	,FECHA_FIN_EVENTO
	,ID_EMPLEADO
	,NOMBRE
	,NOMBRE_DE_CARGO
	,ID_PEDIDO
	,CIUDAD_EVENTO
	,BARRIO_EVENTO
	,DIRECCION_EVENTO
)

AS

SELECT 	C.ID_TURNO
        ,FECHA_INICIO_EVENTO
        ,FECHA_FIN_EVENTO
        ,A.ID_EMPLEADO
		,CONCAT(A.PRIMER_NOMBRE, ' ',A.SEGUNDO_NOMBRE, ' ',A.PRIMER_APELLIDO, ' ',A.SEGUNDO_APELLIDO) 	AS NOMBRE
        ,NOMBRE_DE_CARGO
        ,ID_PEDIDO
        ,CIUDAD_EVENTO
        ,BARRIO_EVENTO
        ,DIRECCION_EVENTO
FROM 		EMPLEADO 		AS A
INNER JOIN 	EMPLEADO_TURNO	AS B ON A.ID_EMPLEADO		=	B.EMPLEADOID_EMPLEADO
INNER JOIN	TURNO			AS C ON B.TURNOID_TURNO		=	C.ID_TURNO
INNER JOIN	PEDIDO			AS D ON C.PEDIDOID_PEDIDO	=	D.ID_PEDIDO
INNER JOIN	CARGO			AS E ON A.CARGOID_CARGO		=	E.ID_CARGO
-- WHERE A.ID_EMPLEADO = 1
ORDER BY 1
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_VER_USUARIOS
(    ID_USUARIO
    ,PRIMER_NOMBRE
    ,SEGUNDO_NOMBRE
    ,PRIMER_APELLIDO
    ,SEGUNDO_APELLIDO
    ,DOCUMENTO
    ,NUMERO_DOCUMENTO
    ,EDAD
    ,TELEFONO
    ,DIRECCION
    ,EMAIL
    ,ROL
    ,USUARIO_SISTEMA
    ,CLAVE
    ,RESPUESTA_MODAL
    ,DESCRIPCION_MODAL
)

AS

SELECT 	A.ID_USUARIO
		,A.PRIMER_NOMBRE
        ,A.SEGUNDO_NOMBRE 		
		,A.PRIMER_APELLIDO
        ,A.SEGUNDO_APELLIDO
		,B.SIGLAS																					AS DOCUMENTO
        ,A.NUMERO_DOCUMENTO 			
		,A.EDAD
        ,A.TELEFONO
        ,A.DIRECCION
		,A.EMAIL
		,D.NOMBRE_ROL 																				AS ROL
		,C.NOMBRE_USUARIO 																			AS USUARIO_SISTEMA
		,C.CLAVE
        ,CONCAT('Cliente -',A.ID_USUARIO)															AS RESPUESTA_MODAL
        ,CONCAT(A.PRIMER_NOMBRE,' ',A.SEGUNDO_NOMBRE,' ',A.PRIMER_APELLIDO,' ',A.SEGUNDO_APELLIDO)	AS DESCRIPCION_MODAL
FROM 		USUARIO 		AS A
INNER JOIN 	TIPO_DOCUMENTO 	AS B		ON A.Tipo_documentoId_documento = B.id_documento
INNER JOIN 	USUARIO_SISTEMA AS C		ON C.USUARIOID_USUARIO = A.id_usuario
INNER JOIN 	ROL 			AS D		ON D.id_rol = A.rolId_rol
WHERE C.ESTADO ='ACTIVO'
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_CANTIDAD_REGISTROS_INICIO_ADMIN
(    CANTIDAD_USUARIOS
	,CANTIDAD_EMPLEADOS
    ,CANTIDAD_PEDIDOS
)

AS

SELECT   CANTIDAD_USUARIOS
		,CANTIDAD_EMPLEADOS
        ,CANTIDAD_PEDIDOS
FROM
	(SELECT COUNT(A.ID_USUARIO) AS CANTIDAD_USUARIOS
	FROM USUARIO 				AS A
	INNER JOIN USUARIO_SISTEMA 	AS B 	ON A.ID_USUARIO = B.USUARIOID_USUARIO
	WHERE B.ESTADO='ACTIVO') 	AS T1,
	(
	SELECT count(C.ID_EMPLEADO) AS CANTIDAD_EMPLEADOS
	FROM EMPLEADO AS C
	INNER JOIN USUARIO_SISTEMA 	AS D on C.ID_EMPLEADO = D.EMPLEADOID_EMPLEADO
	WHERE D.ESTADO='ACTIVO') 	AS T2,
    (
	SELECT count(E.ID_PEDIDO) AS CANTIDAD_PEDIDOS
	FROM PEDIDO AS E ) 			AS T3
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_EVENTO_MAS_VENDIDO 
(	EVENTO_MAS_VENDIDO 
)

AS

SELECT MAX(TIPO_EVENTO) EVENTO_MAS_VENDIDO
FROM(
    SELECT COUNT(ID_PEDIDO) CANTIDAD
           ,TIPO_DE_PAQUETE TIPO_EVENTO
    FROM(
    SELECT PE.ID_PEDIDO
         , PA.TIPO_DE_PAQUETE
         , CONCAT(US.PRIMER_NOMBRE,' ',US.SEGUNDO_NOMBRE) NOMBRES_PAGADOR
         , CONCAT(US.PRIMER_APELLIDO,' ',US.SEGUNDO_APELLIDO) APELLIDOS_PAGADOR
         , FA.ID_FACTURA
         , FA.VALOR_TOTAL
         , FA.TIPO_DE_FACTURA
         , PG.ID_PAGO
         , TP.NOMBRE_PAGO
    FROM PEDIDO PE
    INNER JOIN PAQUETE PA         	ON PA.ID_PAQUETE         	= PE.PAQUETE_IDPAQUETE
    INNER JOIN USUARIO US         	ON US.ID_USUARIO         	= PE.USUARIOID_USUARIO
    INNER JOIN FACTURA FA         	ON FA.ID_FACTURA     		= PE.FACTURAID_FACTURA
    INNER JOIN PAGOS   PG         	ON PG.USUARIOID_USUARIO 	= US.ID_USUARIO
    INNER JOIN TIPOS_DE_PAGO TP 	ON TP.ID_TIPO_PAGO        	= PG.TIPOS_DE_PAGOID_TIPO_PAGO
    ORDER BY 1
    ) A
    GROUP BY TIPO_DE_PAQUETE
    ORDER BY 1 DESC
    ) B
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_EVENTO_MENOS_VENDIDO 
(	EVENTO_MENOS_VENDIDO 
)

AS

SELECT MIN(TIPO_EVENTO) EVENTO_MENOS_VENDIDO
FROM(
    SELECT COUNT(ID_PEDIDO) CANTIDAD
           ,TIPO_DE_PAQUETE TIPO_EVENTO
    FROM(
    SELECT PE.ID_PEDIDO
         , PA.TIPO_DE_PAQUETE
         , CONCAT(US.PRIMER_NOMBRE,' ',US.SEGUNDO_NOMBRE) NOMBRES_PAGADOR
         , CONCAT(US.PRIMER_APELLIDO,' ',US.SEGUNDO_APELLIDO) APELLIDOS_PAGADOR
         , FA.ID_FACTURA
         , FA.VALOR_TOTAL
         , FA.TIPO_DE_FACTURA
         , PG.ID_PAGO
         , TP.NOMBRE_PAGO
    FROM PEDIDO PE
    INNER JOIN PAQUETE PA         	ON PA.ID_PAQUETE         	= PE.PAQUETE_IDPAQUETE
    INNER JOIN USUARIO US         	ON US.ID_USUARIO         	= PE.USUARIOID_USUARIO
    INNER JOIN FACTURA FA        	ON FA.ID_FACTURA     		= PE.FACTURAID_FACTURA
    INNER JOIN PAGOS   PG         	ON PG.USUARIOID_USUARIO 	= US.ID_USUARIO
    INNER JOIN TIPOS_DE_PAGO TP 	ON TP.ID_TIPO_PAGO        	= PG.TIPOS_DE_PAGOID_TIPO_PAGO
    ORDER BY 1
    ) A
    GROUP BY TIPO_DE_PAQUETE
    ORDER BY 1 DESC
    ) B
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_PAGO_PREFERIDO 
(	PAGO_PREFERIDO 
)

AS

SELECT MAX(PAGO) PAGO_PREFERIDO
FROM(
    SELECT COUNT(ID_PAGO) CANTIDAD
           ,NOMBRE_PAGO PAGO
    FROM(
        SELECT PE.ID_PEDIDO
             , PA.TIPO_DE_PAQUETE
             , CONCAT(US.PRIMER_NOMBRE,' ',US.SEGUNDO_NOMBRE) NOMBRES_PAGADOR
             , CONCAT(US.PRIMER_APELLIDO,' ',US.SEGUNDO_APELLIDO) APELLIDOS_PAGADOR
             , FA.ID_FACTURA
             , FA.VALOR_TOTAL
             , FA.TIPO_DE_FACTURA
             , PG.ID_PAGO
             , TP.NOMBRE_PAGO
        FROM PEDIDO PE
        INNER JOIN PAQUETE PA         ON PA.ID_PAQUETE         	= PE.PAQUETE_IDPAQUETE
        INNER JOIN USUARIO US         ON US.ID_USUARIO         	= PE.USUARIOID_USUARIO
        INNER JOIN FACTURA FA         ON FA.ID_FACTURA			= PE.FACTURAID_FACTURA
        INNER JOIN PAGOS   PG         ON PG.USUARIOID_USUARIO 	= US.ID_USUARIO
        INNER JOIN TIPOS_DE_PAGO TP ON TP.ID_TIPO_PAGO        	= PG.TIPOS_DE_PAGOID_TIPO_PAGO
        ORDER BY 1
    ) A
    GROUP BY NOMBRE_PAGO
    ORDER BY 1 DESC
    ) B
;&
 
 DELIMITER &
    CREATE OR REPLACE VIEW VW_PRODUCTOS_VENDIDOS 
( 	CANTIDAD
	,TIPO_EVENTO
)

AS

SELECT COUNT(ID_PEDIDO) CANTIDAD
       ,TIPO_DE_PAQUETE TIPO_EVENTO
FROM(
SELECT PE.ID_PEDIDO
     , PA.TIPO_DE_PAQUETE
     , CONCAT(US.PRIMER_NOMBRE,' ',US.SEGUNDO_NOMBRE) NOMBRES_PAGADOR
     , CONCAT(US.PRIMER_APELLIDO,' ',US.SEGUNDO_APELLIDO) APELLIDOS_PAGADOR
     , FA.ID_FACTURA
     , FA.VALOR_TOTAL
     , FA.TIPO_DE_FACTURA
     , PG.ID_PAGO
     , TP.NOMBRE_PAGO
FROM PEDIDO PE
INNER JOIN PAQUETE PA         ON PA.ID_PAQUETE        = PE.PAQUETE_IDPAQUETE
INNER JOIN USUARIO US         ON US.ID_USUARIO        = PE.USUARIOID_USUARIO
INNER JOIN FACTURA FA         ON FA.ID_FACTURA		  = PE.FACTURAID_FACTURA
INNER JOIN PAGOS   PG         ON PG.USUARIOID_USUARIO = US.ID_USUARIO
INNER JOIN TIPOS_DE_PAGO TP ON TP.ID_TIPO_PAGO        = PG.TIPOS_DE_PAGOID_TIPO_PAGO
ORDER BY 1
) A
GROUP BY TIPO_DE_PAQUETE
ORDER BY 1 DESC
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_REPORTE_VENTAS
(     ID_PEDIDO
    ,TIPO_DE_PAQUETE
    ,NOMBRES_PAGADOR
    ,APELLIDOS_PAGADOR
    ,ID_FACTURA
    ,VALOR_TOTAL
    ,TIPO_DE_FACTURA
    ,ID_PAGO
    ,NOMBRE_PAGO
)

AS

SELECT PE.ID_PEDIDO
     , PA.TIPO_DE_PAQUETE
     , CONCAT(US.PRIMER_NOMBRE,' ',US.SEGUNDO_NOMBRE) NOMBRES_PAGADOR
     , CONCAT(US.PRIMER_APELLIDO,' ',US.SEGUNDO_APELLIDO) APELLIDOS_PAGADOR
     , FA.ID_FACTURA
     , FA.VALOR_TOTAL
     , FA.TIPO_DE_FACTURA
     , PG.ID_PAGO
     , TP.NOMBRE_PAGO
FROM PEDIDO PE
INNER JOIN PAQUETE PA         ON PA.ID_PAQUETE         	= PE.PAQUETE_IDPAQUETE
INNER JOIN USUARIO US         ON US.ID_USUARIO         	= PE.USUARIOID_USUARIO
INNER JOIN FACTURA FA         ON FA.ID_FACTURA     		= PE.FACTURAID_FACTURA
INNER JOIN PAGOS   PG         ON PG.USUARIOID_USUARIO 	= US.ID_USUARIO
INNER JOIN TIPOS_DE_PAGO TP ON TP.ID_TIPO_PAGO        	= PG.TIPOS_DE_PAGOID_TIPO_PAGO
ORDER BY 1
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_VER_EMPLEADOS
(    ID_EMPLEADO
    ,PRIMER_NOMBRE
    ,SEGUNDO_NOMBRE
    ,PRIMER_APELLIDO
    ,SEGUNDO_APELLIDO
    ,DOCUMENTO
    ,NUMERO_DOCUMENTO
    ,CARGO
    ,EDAD
    ,TELEFONO
    ,DIRECCION
    ,EMAIL
    ,ROL
    ,USUARIO_SISTEMA
    ,CLAVE
    ,RESPUESTA_MODAL
    ,DESCRIPCION_MODAL
)

AS

SELECT 	A.ID_EMPLEADO
		,A.PRIMER_NOMBRE
        ,A.SEGUNDO_NOMBRE 		
		,A.PRIMER_APELLIDO
        ,A.SEGUNDO_APELLIDO
		,B.SIGLAS																					AS DOCUMENTO
        ,A.NUMERO_DOCUMENTO
        ,E.NOMBRE_DE_CARGO																			AS CARGO
		,A.EDAD
        ,A.TELEFONO
        ,A.DIRECCION
		,A.EMAIL
		,D.NOMBRE_ROL 																				AS ROL
		,C.NOMBRE_USUARIO 																			AS USUARIO_SISTEMA
		,C.CLAVE
        ,CONCAT('Empleado-',A.ID_EMPLEADO)															AS RESPUESTA_MODAL
        ,CONCAT(A.PRIMER_NOMBRE,' ',A.SEGUNDO_NOMBRE,' ',A.PRIMER_APELLIDO,' ',A.SEGUNDO_APELLIDO)	AS DESCRIPCION_MODAL
FROM 		EMPLEADO 		AS A
INNER JOIN 	TIPO_DOCUMENTO 	AS B		ON A.Tipo_documentoId_documento = B.id_documento
INNER JOIN 	USUARIO_SISTEMA AS C		ON C.EMPLEADOID_EMPLEADO 		= A.ID_EMPLEADO
INNER JOIN 	ROL 			AS D		ON D.id_rol 					= A.rolId_rol
INNER JOIN	CARGO			AS E		ON A.CARGOID_CARGO 				= E.ID_CARGO
WHERE C.ESTADO ='ACTIVO'
;&

DELIMITER &
CREATE OR REPLACE VIEW VW_VER_EVENTOS(
	ID_EVENTO
	,TIPO_DE_EVENTO
    ,TIPO_IMAGEN
	,IMAGEN
	,ESTADO
)

AS

SELECT 	 ID_EVENTO
		,TIPO_DE_EVENTO
        ,TIPO_IMAGEN
        ,IMAGEN
        ,ESTADO
FROM EVENTO
WHERE ESTADO ='ACTIVO'
;&

DELIMITER &
CREATE FUNCTION FN_FORMATEAR_NOMBRES (P_NOMBRE VARCHAR(200), P_TIPO_FORMATO VARCHAR(10))
RETURNS VARCHAR (200)
-- Se debe colocar esto para que permita la creacion de funciones
DETERMINISTIC
READS SQL DATA

BEGIN
	DECLARE V_NOMBRE		VARCHAR (200) ;
    
    IF P_TIPO_FORMATO ='MAY' THEN
    
		SET V_NOMBRE = UPPER(P_NOMBRE);
    
    ELSEIF P_TIPO_FORMATO ='MIN' THEN
    
		SET V_NOMBRE = LOWER(P_NOMBRE);
        
	ELSEIF P_TIPO_FORMATO ='NOR' THEN
    
		SET V_NOMBRE = CONCAT(UPPER(SUBSTRING(P_NOMBRE,1,1)),LOWER(SUBSTRING(P_NOMBRE,2)));
    
    END IF;
    
    
RETURN V_NOMBRE;
END &

DELIMITER &
CREATE FUNCTION FN_CALCULAR_EDAD (P_AZO_NACIMIENTO INT)
RETURNS INT
-- Se debe colocar esto para que permita la creacion de funciones
DETERMINISTIC
READS SQL DATA

BEGIN
	DECLARE V_AZO_ACTUAL 	INT ;
	DECLARE V_EDAD 			INT ;
    
    SELECT AZO_ACTUAL INTO V_AZO_ACTUAL FROM (SELECT CAST(SUBSTRING(SYSDATE(),1,4) AS SIGNED) AS AZO_ACTUAL) AS ACTUAL_AZO;
    
    SET V_EDAD = V_AZO_ACTUAL - P_AZO_NACIMIENTO;
    
RETURN V_EDAD;
END &

