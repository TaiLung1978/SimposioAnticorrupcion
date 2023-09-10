CREATE TABLE  participantes(
	id int(11) NOT NULL auto_increment,
	ci varchar(10) NOT NULL,
	nombre varchar(40) NOT NULL,
	apellido varchar(40) NOT NULL,
	email varchar(40) NOT NULL,
	celular varchar(10) NOT NULL,
	entidad varchar(100) NOT NULL,
	modalidad varchar(10) NOT NULL,
	PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

