show databases;
use contatos_teste;
SELECT * FROM contato WHERE cpf = "066.304.076-01";

drop table contato;
drop table phone;
drop table email;

create table if not exists contato(
id int(10) auto_increment not null,
name varchar(30) not null,
secondname varchar(30) not null,
cpf varchar(14),
primary key(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table if not exists phone(
id int(10) auto_increment not null,
number_phone varchar(14) not null,
id_contact_phone int(10) not null,
primary key(id),
constraint fk_contact_phone foreign key (id_contact_phone) references contato (id)
on delete cascade on update cascade
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

create table if not exists email(
id int(10) auto_increment not null,
end_email varchar(150) not null,
id_contact_email int(10) not null,
primary key(id),
constraint fk_contact_email foreign key (id_contact_email) references contato (id)
on delete cascade on update cascade
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;


select * from contato;
select * from phone;
select * from email;

create table if not exists phone(
id int(10) auto_increment not null,
number_phone varchar(14) not null,
id_contact int(10) not null,
primary key(id),
constraint fk_contact foreign key (id_contact) references contato (id)
on delete restrict on update cascade
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

SELECT c.name, e.end_email, e.id, e.id_contact_email FROM contato as c INNER JOIN email as e on c.id = e.id_contact_email WHERE e.id = 12;

select * from contato;
select * from phone;
select * from email;

INSERT INTO contato (name, secondname, cpf, email)
VALUES ("augusto", "angelo", "06630408547", "augusto.angelo@gmail.com"); 


describe phone;
describe email;

SELECT c.name, p.number_phone, p.id, p.id_contact FROM contato as c INNER JOIN phone as p on c.id = p.id_contact WHERE p.id = :id_cad