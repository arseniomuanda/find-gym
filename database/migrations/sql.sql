/* ModeloLogico: */

CREATE TABLE utilizadores (
    id int PRIMARY KEY,
    nome varchar(140),
    email varchar(140),
    password varchar(225),
    is_admin boolean,
    telefone varchar(9)
);

CREATE TABLE horarios_ginasios (
    id int PRIMARY KEY,
    segunda varchar(19),
    terca varchar(19),
    quarta varchar(19),
    quinta varchar(19),
    sexta varchar(19),
    sabado varchar(19),
    domingo varchar(19),
    nome varchar(100),
    empresa varchar(100),
    latitude double,
    longitude double,
    endereco varchar(200),
    telefone varchar(9),
    email varchar(150),
    fk_categorias_id int
);

CREATE TABLE categorias (
    id int PRIMARY KEY,
    nome varchar(100),
    descricao text
);

CREATE TABLE visita (
    fk_ginasios_id int,
    fk_utilizadores_id int,
    id int,
    momento datetime
);
 
ALTER TABLE horarios_ginasios ADD CONSTRAINT FK_horarios_ginasios_2
    FOREIGN KEY (fk_categorias_id)
    REFERENCES categorias (id);
 
ALTER TABLE visita ADD CONSTRAINT FK_visita_1
    FOREIGN KEY (fk_ginasios_id)
    REFERENCES ??? (???);
 
ALTER TABLE visita ADD CONSTRAINT FK_visita_2
    FOREIGN KEY (fk_utilizadores_id)
    REFERENCES utilizadores (id)
    ON DELETE SET NULL;