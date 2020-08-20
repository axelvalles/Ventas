drop DATABASE if EXISTS ventasDimeca;
create database if not EXISTS ventasDimeca;

use ventasDimeca;

drop table if EXISTS users ;
create table if not EXISTS users
(
    id int AUTO_INCREMENT primary key not null,
    name varchar(50) not null,
    user varchar(25) not null,
    pass varchar(255) not null,
    role enum('ADMIN','VENDEDOR') DEFAULT 'VENDEDOR',
    create_at datetime DEFAULT CURRENT_TIMESTAMP,
    edited_at datetime DEFAULT CURRENT_TIMESTAMP
);

alter table users
add constraint UQ_user unique(user);



drop table if EXISTS clients;
create table if not EXISTS clients
(
    id int AUTO_INCREMENT primary key not null,
    name varchar(50) not null,
    phone varchar(20) default null,
    dni varchar(20) not null,
    id_user int  NOT NULL,
    create_at datetime DEFAULT CURRENT_TIMESTAMP,
    edited_at datetime DEFAULT CURRENT_TIMESTAMP

);


alter table clients
add constraint UQ_dni unique(dni),
ADD CONSTRAINT `Fk_clients_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

drop table if EXISTS providers;
create table if not EXISTS providers
(
    id int AUTO_INCREMENT primary key not null,
    name varchar(50) not null,
    phone varchar(20) default null,
    dni varchar(20) not null,
    id_user int  NOT NULL,
    create_at datetime DEFAULT CURRENT_TIMESTAMP,
    edited_at datetime DEFAULT CURRENT_TIMESTAMP
);

alter table providers
add constraint UQ_name unique(name),
ADD CONSTRAINT `Fk_providers_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

drop table  if EXISTS products;
create table  if not EXISTS products
(
    id int AUTO_INCREMENT primary key not null,
    code varchar(25) not null,
    description varchar(50) default null,
    price float not null,
    cost float not null,
    stock int not null,
    id_user int NOT NULL,
    id_provider int  NOT NULL,
    create_at datetime DEFAULT CURRENT_TIMESTAMP,
    edited_at datetime DEFAULT CURRENT_TIMESTAMP
);

alter table products
add constraint UQ_code unique(code),
ADD CONSTRAINT `Fk_products_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
ADD CONSTRAINT `Fk_products_provider` FOREIGN KEY (`id_provider`) REFERENCES `providers` (`id`);

drop table  if EXISTS sales;
create table  if not EXISTS sales
(
    id int AUTO_INCREMENT primary key not null,
    id_client int not null,
    id_product int not null,
    id_user int not null,
    price_by_unit float not null,
    cand float not null,
    total float not null,
    sale_number int NOT NULL,
    create_at datetime DEFAULT CURRENT_TIMESTAMP,
    edited_at datetime DEFAULT CURRENT_TIMESTAMP
    
);

alter table sales
ADD CONSTRAINT `Fk_sale_client` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`),
ADD CONSTRAINT `Fk_sale_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
ADD CONSTRAINT `Fk_sale_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);






