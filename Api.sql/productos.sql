create table productos(

    producto_id              int             AUTO_INCREMENT not null, /*es el codigo*/
    producto_descripcion     varchar(300)    CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    producto_precio          int             not null,
    producto_nombre          varchar(300)    CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    producto_punto           int             not null, 
    producto_categoria       varchar(200)    CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    producto_marca           varchar(200)    CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    producto_estado          int             not null,
    producto_imagen          varchar(200)    not null,
    
    primary key(producto_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;