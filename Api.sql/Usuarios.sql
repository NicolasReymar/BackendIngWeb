create table Usuarios(

    usuario_id           int              AUTO_INCREMENT not null,
    usuario_nombres      varchar(200)     CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    usuario_apellidos    varchar(200)     CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    usuario_rut          varchar(60)      CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    usuario_clave        varchar (60)     CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    usuario_email        varchar(250)     CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    usuario_celular      varchar(30)      CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    usuario_direccion    varchar(200)     CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    usuario_estado       int              not null,
    usuario_punto        int              not null,

    primary key(usuario_id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;