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
id_contact int(10) not null,
primary key(id),
constraint fk_contact foreign key (id_contact) references contato (id)
on delete restrict on update cascade
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

select * from contato;
select * from phone;

INSERT INTO contato (name, secondname, cpf, email)
VALUES ("augusto", "angelo", "06630408547", "augusto.angelo@gmail.com"); 


describe phone;

SELECT a.name, b.number_phone FROM contato as a INNER JOIN phone as b on a.id = b.id_contact WHERE a.id = 1;

SELECT c.name, p.number_phone FROM contato as c INNER JOIN phone as p on c.id = p.id_contact WHERE p.id = :id_contact;

SELECT contact.name, phone.number FROM contato AS c INNER JOIN phone AS p ON c.id = p.id_contact WHERE p.id = 1;