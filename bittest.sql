create database bit2023;
use bit2023;

create table asesores (
	id int not null primary key auto_increment,
    nombre varchar(255) not null,
	apellido_paterno varchar(255) not null,
    apellido_materno varchar(255) not null,
    email varchar(255) not null unique,
    telefono varchar(20),
    rol varchar(20) not null,
    contrasenia varchar(255) not null
);

create table clientes (
	id int not null primary key auto_increment,
	nombre varchar(255) not null,
	apellido_paterno varchar(255) not null,
    apellido_materno varchar(255) not null,
    email varchar(255) not null unique,
    telefono varchar(20),
    clabe varchar(255) not null,
    numero_cuenta varchar(255) not null,
    numero_tarjeta varchar(255) not null,
    tipo_cuenta varchar(100) not null
);
