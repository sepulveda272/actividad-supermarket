-- Active: 1685461181766@@127.0.0.1@3306@campusv2
CREATE DATABASE campusv2;







-- ////////////////////////CATEGORIAS////////////////////////

CREATE TABLE categorias(
    id INT primary key auto_increment,
    nombre VARCHAR (50) NOT NULL,
    descripcion VARCHAR (50) NOT NULL,
    imagen VARBINARY(50)
);







-- ////////////////////////CLIENTES////////////////////////

CREATE TABLE clientes(
    id INT primary key auto_increment,
    nombre VARCHAR (50) NOT NULL,
    celular INT (20) NOT NULL,
    compañia VARCHAR (50) NOT NULL
);



-- ////////////////////////EMPLEADO////////////////////////

CREATE TABLE empleado(
    id INT primary key auto_increment,
    nombre VARCHAR (50) NOT NULL,
    celular INT (20) NOT NULL,
    direccion VARCHAR (50) NOT NULL,
    imagen VARBINARY(50) NOT NULL
);



-- ////////////////////////FACTURA////////////////////////

CREATE TABLE facturas(
    facturaId INT NOT NULL AUTO_INCREMENT,
    empleadoId INT,
    clienteId INT,
    fecha DATE,
    PRIMARY KEY(facturaId),
    FOREIGN KEY (empleadoId) REFERENCES empleado(id),
    FOREIGN KEY (clienteId) REFERENCES clientes(id)
);



-- ////////////////////////DETALLE DE LA FACTURA////////////////////////

CREATE TABLE FacturaDetalle(
    id_factura INTEGER PRIMARY KEY,
    id_producto INT,
    cantidad INT (11) NOT NULL,
    precio FLOAT (10) NOT NULL
);


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


-- ////////////////////////PROVEEDORES////////////////////////

CREATE TABLE proveedores(
    id INT primary key auto_increment,
    nombre VARCHAR (50) NOT NULL,
    telefono INT (11) NOT NULL,
    ciudad VARCHAR (50) NOT NULL
);

