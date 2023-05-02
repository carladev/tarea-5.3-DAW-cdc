drop database if exists examen1;

create database if not exists examen1;

use examen1;

create table
    usuarios (
        id integer not null auto_increment,
        usuario varchar(15),
        pass varchar(10),
        primary key (id)
    );

create table
    equipos (
        id integer not null auto_increment,
        equipo varchar (30),
        primary key (id)
    );

create table
    categorias (
        id integer not null auto_increment,
        categoria varchar(30) not null,
        edad int,
        anoNacimiento int,
        primary key (id, categoria)
    );

create table
    jugadores (
        id integer not null auto_increment,
        dni varchar (9),
        nombre varchar (20),
        apellidos varchar (40),
        equipoId integer,
        categoriaId integer,
        primary key (id, dni),
        foreign key (equipoId) references equipos (id) on delete cascade on update cascade,
        foreign key (categoriaId) references categorias (id) on delete cascade on update cascade
    );