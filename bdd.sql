create database blog;
use blog;

create table utilisateur(
	id_util int auto_increment primary key not null,
    name_util varchar(50) null,
    first_name_util varchar(50) null,
    mail_util varchar(100) not null,
    pwd_util varchar(100) not null,
    id_role int
)engine=InnoDB;

create table roles(
	id_role int auto_increment primary key not null,
    name_role varchar(50) not null
)engine=InnoDB;

create table commentaire(
	id_com int auto_increment primary key not null,
    content_com varchar(255) not null,
    date_com date null,
    id_util int,
    id_art int
)engine=InnoDB;

create table article(
	id_art int auto_increment primary key not null,
    name_art varchar(50) not null,
    content_art text not null,
    date_art date null,
    id_cat int
)engine=InnoDB;

create table categorie(
	id_cat int auto_increment primary key not null,
    name_cat varchar(50) not null
)engine=InnoDB;

alter table utilisateur
add constraint posseder_fk
foreign key (id_role)
references roles(id_role);

alter table commentaire
add constraint ajouter_fk
foreign key (id_util)
references utilisateur(id_util);

alter table commentaire
add constraint commenter_fk
foreign key (id_art)
references article(id_art);

alter table article
add constraint filtrer_fk
foreign key (id_cat)
references categorie(id_cat);