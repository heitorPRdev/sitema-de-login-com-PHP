create database clientes;
use clientes;
create table cadastros(
	id int primary key not null auto_increment,
    nome varchar(500) not null,
    senha varchar(500) not null
	
)
select * from cadastros;