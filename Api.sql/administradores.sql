create table administradores(

    administrador_id           int             AUTO_INCREMENT not null,
    administrador_nombres      varchar(200)    CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    administrador_apellidos    varchar(200)    CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    administrador_email        varchar(200)    CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    administrador_celular      varchar(200)    CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    administrador_clave        varchar(60)     CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    administrador_rut          varchar(200)    CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    administrador_estado       int             not null,

    primary key (administrador_id)
)  ENGINE=InnoDB DEFAULT CHARSET=latin1;