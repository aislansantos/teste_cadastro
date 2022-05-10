create database contatos_teste;
show databases;
use contatos_teste;
show tables;

drop table contato;

create table if not exists contato(
id int(10) auto_increment not null,
name varchar(30) not null,
secondname varchar(30) not null,
cpf varchar(11),
email varchar(150),
primary key(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

select * from contato;