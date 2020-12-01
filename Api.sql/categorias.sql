create table categorias(

    categoria_id       int              AUTO_INCREMENT not null,
    categoria_nombre   varchar(200)     character set utf8 COLLATE utf8_spanish_ci NOT NULL, 

   primary key(categoria_id);
)ENGINE=InnoDB DEFAULT CHARSET=latin1;