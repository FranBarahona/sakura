drop database if exists restaurante;
create database restaurante;
	use restaurante;


	create table cliente(
ID_Cliente int AUTO_INCREMENT primary key, 

nombre varchar(50)
		);

create table mesa(
Id_mesa int ,
primary key(Id_mesa),
nombreMesa varchar(50),
estado varchar(50)
);

    create table factura(
		t_de_pago varchar(50),
		fecha_factura datetime,
		N_factura int AUTO_INCREMENT primary key ,
		total float

		);
	create table empleado(
		nombre varchar (25),
		ID_carnet int primary key,
		tipo varchar (50)
		);

	create table pedido(
		id_pedido int AUTO_INCREMENT primary key,
		id_cliente int,
		Foreign key (id_Cliente) References cliente(id_Cliente),
		N_factura int ,
        Foreign key (N_factura) References factura(N_factura),
		fecha datetime,
		precio float,
		estado varchar(10),
		N_mesa int
		);

		

	CREATE TABLE categorias (
  id int(11) NOT NULL,
  nombre varchar(100) NOT NULL
);

    create table comida(
		id int(11) NOT NULL,
		nombre varchar(100),
		descripcion varchar(255),
		precio_comida float,
		imagen longblob, 
		categorias int(11) 

		
		);

    
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorias` (`categorias`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `comida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `comida`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`categorias`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

create table pedido_comida(
	id_pedido_comida int AUTO_INCREMENT primary key,
id int,
FOREIGN KEY (id) REFERENCES comida (id),
ID_pedido int,
FOREIGN KEY (ID_pedido) REFERENCES pedido (ID_pedido),
cantidad int


);

   
/* BUSCAR USUARIO  */
use restaurante;
DROP PROCEDURE IF EXISTS busUsuario; 
CREATE PROCEDURE busUsuario
(in nombre2 varchar(25))
NOT DETERMINISTIC CONTAINS SQL SQL SECURITY 
DEFINER SELECT * FROM empleado WHERE nombre = nombre2;

/*INSERTAR USUARIO*/
use restaurante;
DROP PROCEDURE IF EXISTS insertUs;
CREATE PROCEDURE insertUs
(in nombre varchar(25), in  ID_carnet int, tipo varchar(50) )
NOT DETERMINISTIC CONTAINS SQL SQL SECURITY 
DEFINER 
INSERT INTO empleado
VALUES (nombre , ID_carnet, tipo);

/*INICIO DE SESION   */
use restaurante;
DROP PROCEDURE IF EXISTS iniUsuario;
CREATE PROCEDURE iniUsuario
(in nombre2 varchar(25), in ID_carnet2 int)
NOT DETERMINISTIC CONTAINS SQL SQL SECURITY 
DEFINER SELECT * FROM empleado WHERE nombre = nombre2 and ID_carnet = ID_carnet2;	

/*INSERTAR CLIENTE*/
use restaurante;
DROP PROCEDURE IF EXISTS insertCliente;
CREATE PROCEDURE insertCliente
(in nombre varchar(50))
NOT DETERMINISTIC CONTAINS SQL SQL SECURITY 
DEFINER 
INSERT INTO cliente
VALUES ('NULL',nombre);




INSERT INTO `mesa`(`Id_mesa`, `nombreMesa`, `estado`) VALUES ('1','MESA 1','0');
INSERT INTO `mesa`(`Id_mesa`, `nombreMesa`, `estado`) VALUES ('2','MESA 2','0');
INSERT INTO `mesa`(`Id_mesa`, `nombreMesa`, `estado`) VALUES ('3','MESA 3','0');
INSERT INTO `mesa`(`Id_mesa`, `nombreMesa`, `estado`) VALUES ('4','MESA 4','0');
INSERT INTO `mesa`(`Id_mesa`, `nombreMesa`, `estado`) VALUES ('5','MESA 5','0');
INSERT INTO `mesa`(`Id_mesa`, `nombreMesa`, `estado`) VALUES ('6','MESA 6','0');
INSERT INTO `mesa`(`Id_mesa`, `nombreMesa`, `estado`) VALUES ('7','MESA 7','0');
INSERT INTO `mesa`(`Id_mesa`, `nombreMesa`, `estado`) VALUES ('8','MESA 8','0');
INSERT INTO `mesa`(`Id_mesa`, `nombreMesa`, `estado`) VALUES ('9','MESA 9','0');
INSERT INTO `mesa`(`Id_mesa`, `nombreMesa`, `estado`) VALUES ('10','MESA 10','0');



INSERT INTO `categorias`(`id`, `nombre`) VALUES ('1','Menus');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('2','Hamburguesas');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('3','Entradas');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('4','Ensaladas');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('5','Bebidas');
INSERT INTO `categorias`(`id`, `nombre`) VALUES ('6','Postres');

/*SELECT pc.id_pedido,nombre,cantidad FROM `pedido_comida` as pc, pedido as p, comida as c WHERE p.id_pedido = pc.id_pedido AND c.id = pc.id*/
