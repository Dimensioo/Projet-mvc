create database `Projet`;

use `Projet`;

create table `role` (
	id_role int not null primary key auto_increment,
    type_role varchar(50) not null
);

create table `user` (
	id_user int not null primary key auto_increment,
    pseudo_user varchar(50) not null,
    email_user varchar(100) not null,
    mdp_user varchar(100) not null,
    img_user varchar(100) not null,
    id_role int
);

create table `editeur` (
    id_editeur int not null primary key auto_increment,
    nom_editeur varchar(50) not null
);

create table `game` (
	id_game int not null primary key auto_increment,
    nom_game varchar(50) not null,
    date_game date not null,
    description_game text not null,
    img_game varchar(100) not null,
    id_editeur int
);

create table `news` (
	id_news int not null primary key auto_increment,
    titre_news varchar(50) not null,
    contenu_news text not null,
    id_user int
);

create table `completer` (
	id_game int,
    id_user int,
    temps_completer int,
    note_completer int,
    achievement_completer int,
    primary key (id_game, id_user)
);

alter table `user`
	add constraint foreign key (id_role) references `role` (id_role);

alter table `news`
	add constraint foreign key (id_user) references `user` (id_user);

alter table `game`
    add constraint foreign key (id_editeur) references `editeur` (id_editeur);

alter table `completer`
	add constraint foreign key (id_game) references `game` (id_game),
    add constraint foreign key (id_user) references `user` (id_user);
