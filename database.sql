CREATE DATABASE campusv2

CREATE TABLE campers(
    id INT primary key auto_increment,
    imagen VARBINARY(50),
    nombre VARCHAR(50) not null,
    direccion VARCHAR(50),
    logros VARCHAR(60),
    ser SMALLINT(2),
    ingles SMALLINT(2),
    review SMALLINT(2),
    skllis SMALLINT(2),
    especialidad VARCHAR(50)
);



-- ////////////////////////CATEGORIAS////////////////////////

CREATE TABLE Categorias(
    id INT primary key auto_increment,
    nombre VARCHAR (50) NOT NULL,
    descripcion VARCHAR (50) NOT NULL,
    imagen VARBINARY(50)
);

INSERT INTO Categorias (id_categoria , nombre_categoria , descripcion_categoria , imagen_categoria)
VALUES
(1 , 'electrodomesticos' , 'Los mejores productos tecnologicos para tu hogar' , '/images/electrodomesticos.webp' ),
(2 , 'frutas' , 'Las frutas mas frescas del mercado' , '/images/frutas.webp' ),
(3 , 'ropa' , 'La ropa con mas estilo' , '/images/ropa.jpg' );

SELECT * FROM Categorias;

DROP TABLE Categorias;

-- ////////////////////////CLIENTES////////////////////////

CREATE TABLE clientes(
    id INT primary key auto_increment,
    celular INT (20) NOT NULL,
    compañia VARCHAR (50) NOT NULL
);


INSERT INTO Clientes (id_cliente , celular_cliente , company_cliente)
VALUES
(1 , 6355050 , 'Campus'),
(2 , 315487623 , 'CampusLands'),
(3 , 30578922 , 'Hunters');

SELECT * FROM Clientes;

DROP TABLE Clientes;

-- ////////////////////////EMPLEADO////////////////////////

CREATE TABLE empleado(
    id INT primary key auto_increment,
    nombre VARCHAR (50) NOT NULL,
    celular INT (20) NOT NULL,
    direccion VARCHAR (50) NOT NULL,
    imagen VARBINARY(50) NOT NULL
);

INSERT INTO Empleado (id_empleado , nombre_empleado , celular_empleado , direccion_empleado , imagen_empleado)
VALUES
(1 , 'Maria' , 680653 , "Cll 9 Avenida 30" , '/images/empleada1.jpg'),
(2 , 'Carlos' , 300261237 , "Avenida 5 Aranjuez" , '/images/empleada2.jpeg'),
(3 , 'Daniela' , 317597246 , "Puente de la novena" , '/images/empleada3.webp');

SELECT * FROM Empleado;

DROP TABLE Empleado;

-- ////////////////////////FACTURA////////////////////////

CREATE TABLE Factura(
    id_factura INTEGER PRIMARY KEY,
    id_empleado INT,
    id_cliente INT,
    fecha_factura VARCHAR (50) NOT NULL
);

INSERT INTO Factura (id_factura , id_empleado , id_cliente , fecha_factura)
VALUES
(1 , 2 , 1 , '05/07/2023'),
(2 , 3 , 3 , '03/12/2022'),
(3 , 1 , 2 , '24/10/2022');

SELECT * FROM Factura;

DROP TABLE Factura;

-- ////////////////////////DETALLE DE LA FACTURA////////////////////////

CREATE TABLE FacturaDetalle(
    id_factura INTEGER PRIMARY KEY,
    id_producto INT,
    cantidad INT (11) NOT NULL,
    precio FLOAT (10) NOT NULL
);

INSERT INTO FacturaDetalle(id_factura , id_producto , cantidad , precio)
VALUES
(1 , 3 , 20 , 2.500),
(2 , 2 , 5 , 3.200),
(3 , 1 , 17 , 4.500);

SELECT * FROM Factura;

DROP TABLE Factura;

-- ////////////////////////PRODUCTOS////////////////////////

CREATE TABLE Productos(
    id_producto INTEGER PRIMARY KEY,
    id_categoria int,
    precio_unitario FLOAT (11) NOT NULL,
    stock INT (11) NOT NULL,
    unidades_pedidas INT (11) NOT NULL,
    proveedor VARCHAR (50) NOT NULL,
    nombre_producto VARCHAR (50) NOT NULL,
    descontinuado BOOLEAN
);

INSERT TABLE Productos(id_producto , id_categoria , precio_unitario , stock , unidades_pedidas , proveedor , nombre_producto , descontinuado)
VALUES
(1 , 3 , 2.500 , 23 , 'carlos' , 'computador' , TRUE),
(2, 2 , 5.000 , 12 , 'camilo' , 'manzana' , FALSE ),
(3 , 1 6.000 , 19 , 'federico' , 'camisa' , TRUE );

SELECT * FROM Productos;

DROP TABLE Productos;

-- ////////////////////////PROVEEDORES////////////////////////

CREATE TABLE Proveedores(
    id_proveedor INTEGER PRIMARY KEY,
    nombre_proveedor VARCHAR (50) NOT NULL,
    telefono_proveedor INT (11) NOT NULL,
    ciudad_proveedor VARCHAR (50) NOT NULL
);

INSERT INTO Proveedores( id_proveedor , nombre_proveedor , telefono_proveedor , ciudad_proveedor)
VALUES
(1 , 'Amed' , 305306745 , 'Piedecuesta' ),
(2 , 'Josué' , 387232782 , 'Bogota' ),
(3 , 'Paul' , 64558822 , 'Santa Marta' );

SELECT * FROM Proveedores;

DROP TABLE Proveedores;