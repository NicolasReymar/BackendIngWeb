create table cupones(

    cupon_id         int             AUTO_INCREMENT not null, 
    cupon_nombre     varchar(200)    CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    cupon_plata      int             not null, 
    cupon_estado     int             not null, 
    cliente_id       int             not null, 

    primary key(cupon_id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;