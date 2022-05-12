create database contatos_teste;
show databases;
use contatos_teste;
show tables;

drop table contato;
drop table phone;

create table if not exists contato(
id int(10) auto_increment not null,
name varchar(30) not null,
secondname varchar(30) not null,
cpf varchar(14),
email varchar(150),
primary key(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table if not exists phone(
id int(10) auto_increment not null,
number_phone varchar(14) not null,
type_phone tinyint(1),
id_contact int(10) not null,
primary key(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

select * from contato;
select * from phone;

INSERT INTO contato (name, secondname, cpf, email)
VALUES ("augusto", "angelo", "06630408547", "augusto.angelo@gmail.com"); 
