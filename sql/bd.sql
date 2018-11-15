CREATE DATABASE gestaoLivrosIFRS;
USE gestaoLivrosIFRS;

CREATE TABLE funcionarios(
	id int not null auto_increment,
    email varchar(90) not null unique,
    nome varchar(80) not null,
    senha varchar(256) not null,
    dataregistro  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    primary key(id)
);

CREATE TABLE funcionarioslog(
	id int not null auto_increment,
    idfuncionario int not null,
    dataregistro  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ip int unsigned,
    primary key(id),
    foreign key(idfuncionario) references funcionarios(id)
);

CREATE TABLE cursos(
	id int not null auto_increment,
    nome varchar(50),
    abreviacao varchar(10),
    primary key(id)
);

CREATE TABLE alunos(
	matricula BIGINT NOT NULL,
    nome VARCHAR(80) NOT NULL,
    turma VARCHAR(40),
    email VARCHAR(80),
    idcurso int not null,
    
    dataregistro  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    idfuncionario int not null,
    PRIMARY KEY(matricula),
   	foreign key(idfuncionario) references funcionarios(id),
    foreign key(idcurso) references cursos(id)

);

CREATE TABLE categorias(
	id INT NOT NULL AUTO_INCREMENT,
	nome varchar(60),
    dataregistro  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    idfuncionario int not null,
	primary key(id),
    foreign key(idfuncionario) references funcionarios(id)

);

CREATE TABLE livros(
    isbn varchar(14) not null,
    nome varchar(60) not null,
    volume varchar(30),
    autor varchar(80),
    categoria int,
    urlfoto varchar(256),
    dataregistro timestamp not null default current_timestamp,
    primary key(isbn),
    foreign key(categoria) references categorias(id)
);

CREATE TABLE exemplares(
	id int not null auto_increment,
    livro varchar(14) not null,
    dataregistro  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    idfuncionario int not null,
    `status` varchar(25) not null default 'Utilizavel', 
    
    primary key(id),
    foreign key(livro) references livros(isbn),
	foreign key(idfuncionario) references funcionarios(id)
);

CREATE TABLE emprestimos(
	id int not null auto_increment,
    id_exemplar int not null,
    matricula_aluno BIGINT not null,
    `status` boolean,
    periodo_entrega tinyint,
    dataregistro  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    idfuncionario int not null,

	primary key(id),
    foreign key(id_exemplar) references exemplares(id),
    foreign key(matricula_aluno) references alunos(matricula),
	foreign key(idfuncionario) references funcionarios(id)
);

insert into funcionarios(email, nome, senha) value("admin@admin.com", "Admin", '$2y$12$bzsgJDMISFB.dzHSuYz9Mu0OpX.tvxKWIxQZPC2QY4ndOkvApjiRa');
-- SELECT id FROM funcionarios;



insert into cursos(nome, abreviacao) values ("Técnico em informática para internet", "INFO");
insert into cursos(nome, abreviacao) values ("Agropecuária", "AGRO");
insert into cursos(nome, abreviacao) values ("Viticultura e Enologia", "ENO");


-- select * from cursos;
insert into alunos(matricula, nome, turma, email, idcurso, idfuncionario) values('201710066666', 'Gustavo Beche Lopes', '2 info', 'gubeche0@gmail.com', '1', '1'); 


-- SELECT * FROM alunos INNER JOIN cursos ON cursos.id = alunos.idcurso WHERE alunos.nome LIKE "%%" ORDER BY alunos.nome ASC



insert into categorias(nome, idfuncionario) values("Biologia", 1); 
insert into categorias(nome, idfuncionario) values("Física", 1); 