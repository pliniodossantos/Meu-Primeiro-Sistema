My first system standalone.

Instructions:

Using: Xampp+Js

DBname: sistema_hotel

CREATE TABLE tb_registros(
	id int NOT null AUTO_INCREMENT PRIMARY KEY,
    nome varchar(50),
    cpf varchar(11),
    data date,
    apartamento varchar(7),
    valor_diaria float (6,2),
    qtd_diarias int,
    valor_total float (8,2)
);