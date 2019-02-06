DROP DATABASE IF exists gestaoLivrosIFRS;
CREATE DATABASE gestaoLivrosIFRS;
USE gestaoLivrosIFRS;

CREATE TABLE funcionarios(
	id int not null auto_increment,
    email varchar(90) not null unique,
    nome varchar(80) not null,
    senha varchar(256) not null,
    dataregistro  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    ativo bool not null default 1,
    primary key(id)
);


CREATE TABLE cursos(
	id int not null auto_increment,
    nome varchar(50),
    abreviacao varchar(10),
    ativo bool not null default 1,
    primary key(id)
);

CREATE TABLE alunos(
	matricula BIGINT NOT NULL,
    nome VARCHAR(80) NOT NULL,
    turma VARCHAR(40),
    email VARCHAR(80),
    idcurso int not null,
    
    ativo bool not null default 1,
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
    ativo bool not null default 1,
	primary key(id),
    foreign key(idfuncionario) references funcionarios(id)

);

CREATE TABLE livros(
    isbn varchar(20) not null,
    nome varchar(60) not null,
    volume varchar(30),
    autor varchar(80),
    categoria int,
    urlfoto varchar(256),
    
    ativo bool not null default 1,
    dataregistro timestamp not null default current_timestamp,
    idfuncionario int not null,
    primary key(isbn),
    foreign key(categoria) references categorias(id),
    foreign key(idfuncionario) references funcionarios(id)
);



CREATE TABLE exemplares(
	id int unsigned not null auto_increment,
    livro varchar(20) not null,
    dataregistro  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    idfuncionario int not null,
    `status` varchar(25) not null default 'Utilizavel', 
    
    ativo bool not null default 1,
    primary key(id),
    foreign key(livro) references livros(isbn),
	foreign key(idfuncionario) references funcionarios(id)
);

ALTER TABLE exemplares AUTO_INCREMENT=1000;


CREATE TABLE emprestimos(
	id int not null auto_increment,
    id_exemplar int unsigned not null,
    matricula_aluno BIGINT not null,
    periodo_entrega tinyint,
    dataregistro  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    dataentrega timestamp,
    idfuncionario int not null,

	ativo bool not null default 1,
	primary key(id),
    foreign key(id_exemplar) references exemplares(id),
    foreign key(matricula_aluno) references alunos(matricula),
	foreign key(idfuncionario) references funcionarios(id)
);

insert into cursos(nome, abreviacao) values ("Técnico em informática para internet", "INFO");
insert into cursos(nome, abreviacao) values ("Agropecuária", "AGRO");
insert into cursos(nome, abreviacao) values ("Viticultura e Enologia", "ENO");

  
  
    