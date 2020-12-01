create table compras( 
    compra_id                 int             AUTO_INCREMENT NOT NULL,
    compra_fecha              date            not null,
    compra_total              int             not null,
    compra_subtotal           int             not null,
    compra_ubicacion          varchar(250)    character set utf8 COLLATE utf8_spanish_ci NOT NULL,
    compra_estado             int             not null, /* si 1= llego compra, 0= no llego*/
    compra_punto              int             not null, 
    compra_direccion          varchar(250)    not null,
    cliente_id                int             not null,
    producto_id               int             not null, 

    primary key(compra_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;