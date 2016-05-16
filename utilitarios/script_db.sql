
CREATE SCHEMA flab_hml DEFAULT CHARACTER SET latin1;
USE flab_hml;



CREATE TABLE Grupo (
  Id INT NOT NULL AUTO_INCREMENT,
  Nome VARCHAR(1000) NOT NULL,
  Descricao VARCHAR(1000) NULL,
  St INT NULL DEFAULT 0,

  PRIMARY KEY (Id)
);
INSERT INTO Grupo (Nome, Descricao, St) VALUES ('Default', 'Default', '1');


CREATE TABLE Usuario (

  Id INT NOT NULL AUTO_INCREMENT,
  GrupoId INT NOT NULL,
  Nome VARCHAR(30) NOT NULL,
  Sobrenome VARCHAR(50) NULL,
  Email VARCHAR(1000) NULL,
  Login VARCHAR(1000) NOT NULL,
  Senha VARCHAR(1000) NOT NULL,
  DtCriacao DATETIME NULL,
  DtAlteracao DATETIME NULL,
  St INT NOT NULL DEFAULT 0,

  PRIMARY KEY (Id)
);
INSERT INTO Usuario (GrupoId, Nome, Sobrenome, Email, Login, Senha, DtCriacao, St) VALUES ('1', 'Rui', 'Gomes', 'rmgcoder@gmail.com', 'rmgcoder', '42502bc3d6cd11ee2722a99a04fc7ed5', '2016-05-06', '1');


CREATE TABLE Socio (

  Id INT NOT NULL AUTO_INCREMENT,
  EmpresaId INT NOT NULL,
  Nome VARCHAR(1000) NOT NULL,
  Sobrenome VARCHAR(1000) NULL, 
  Descricao VARCHAR(1000) NULL,
  Telefone VARCHAR(1000) NULL,
  Celular VARCHAR(1000) NULL,
  Email VARCHAR(1000) NULL,  
  Cargo VARCHAR(1000) NULL,
  Curriculo VARCHAR(1000) NULL,
  Autorizacao VARCHAR(1000) NULL,  
  Tipo INT NOT NULL DEFAULT 0,
  St INT NOT NULL DEFAULT 0,

  PRIMARY KEY (Id)
);


CREATE TABLE Estado (

  Id INT NOT NULL AUTO_INCREMENT,  
  Nome VARCHAR(30) NULL,
  UF VARCHAR(1000) NULL,  
  St INT NOT NULL DEFAULT 0,

  PRIMARY KEY (Id)
);

INSERT INTO Estado(Nome, UF, St) VALUES('Acre', 'AC', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Alagoas', 'AL', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Amapá', 'AP', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Amazonas', 'AM', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Bahia', 'BA', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Ceará', 'CE', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Distrito Federal', 'DF', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Espírito Santo', 'ES', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Goiás' ,'GO', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Maranhão', 'MA', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Mato Grosso', 'MT', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Mato Grosso do Sul', 'MS', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Minas Gerais', 'MG', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Pará', 'PA', 1) ;
INSERT INTO Estado(Nome, UF, St) VALUES('Paraíba', 'PB', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Paraná' , 'PR', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Pernambuco', 'PE', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Piauí', 'PI', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Rio de Janeiro', 'RJ', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Rio Grande do Norte', 'RN', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Rio Grande do Sul', 'RS', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Rondônia', 'RO', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Roraima', 'RR', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Santa Catarina', 'SC', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('São Paulo', 'SP', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Sergipe', 'SE', 1);
INSERT INTO Estado(Nome, UF, St) VALUES('Tocantins', 'TO', 1);

CREATE TABLE Empresa (

  Id INT NOT NULL AUTO_INCREMENT,  
  Nome VARCHAR(1000) NOT NULL,
  Descricao VARCHAR(1000) NULL,
  CNPJ VARCHAR(1000) NULL,
  Email VARCHAR(1000) NULL,
  Telefone VARCHAR(1000) NULL,
  Site VARCHAR(1000) NULL,
  Faturamento VARCHAR(1000) NULL,
  Apresentacao VARCHAR(1000) NULL,
  DtFundacao DATETIME NULL,
  DtCriacao DATETIME NULL,
  DtAlteracao DATETIME NULL,
  St INT NOT NULL DEFAULT 0,

  PRIMARY KEY (Id)
);



CREATE TABLE Endereco (

  Id INT NOT NULL AUTO_INCREMENT,
  EmpresaId INT NOT NULL, 
  EstadoId INT NOT NULL,
  CEP VARCHAR(30) NULL,
  Logradouro VARCHAR(1000) NULL,
  Numero VARCHAR(30) NULL,
  Complemento VARCHAR(1000) NULL,
  Bairro VARCHAR(1000) NULL,
  Cidade VARCHAR(1000) NULL,  
  DtCriacao DATETIME NULL,
  DtAlteracao DATETIME NULL,
  St INT NOT NULL DEFAULT 0,

  PRIMARY KEY (Id)
);


CREATE TABLE Projeto (

  Id INT NOT NULL AUTO_INCREMENT,
  EmpresaId INT NOT NULL,
  Nome VARCHAR(1000) NULL,
  Descricao VARCHAR(1000) NULL,    

  PRIMARY KEY (Id)
);

CREATE TABLE Pergunta (

  Id INT NOT NULL AUTO_INCREMENT,  
  Pergunta VARCHAR(1000) NULL,
  St INT NOT NULL DEFAULT 0,    

  PRIMARY KEY (Id)
);

INSERT INTO Pergunta(Pergunta, St) VALUES('Breve descrição do projeto e da empresa', 1);


CREATE TABLE Resposta (

  Id INT NOT NULL AUTO_INCREMENT,
  EmpresaId INT NOT NULL,
  PerguntaId INT NOT NULL,
  Resposta VARCHAR(1000) NULL,  

  PRIMARY KEY (Id)
);


CREATE TABLE Newsletter (

  Id INT NOT NULL AUTO_INCREMENT,
  NomeUsuario VARCHAR(1000) NULL,
  NomeEmpresa VARCHAR(1000) NULL,
  Email VARCHAR(1000) NULL,
  DtCriacao DATETIME NULL,
  DtAlteracao DATETIME NULL,
  St INT NOT NULL DEFAULT 0,  

  PRIMARY KEY (Id)
);


CREATE TABLE Clipping (

  Id INT NOT NULL AUTO_INCREMENT,
  Titulo VARCHAR(1000) NULL,
  Subtitulo VARCHAR(1000) NULL,
  Texto Text NULL,
  Fonte VARCHAR(1000) NULL,
  Url VARCHAR(1000) NULL,
  Thumb VARCHAR(1000) NULL,
  Destaque INT NOT NULL DEFAULT 0,
  Posicao INT NOT NULL DEFAULT 1,
  DtNoticia DATETIME NULL,
  DtCriacao DATETIME NULL,
  DtAlteracao DATETIME NULL,
  St INT NOT NULL DEFAULT 0,  

  PRIMARY KEY (Id)
);