drop table if exists users;
drop table if exists products;
drop table if exists order_product;
drop table if exists orders;
drop table if exists shipments;
drop table if exists payments;
drop table if exists reviews;

create table if not exists users
(
    id         int primary key auto_increment,
    username   varchar(20) not null,
    password   varchar(30) not null,
    name       varchar(30),
    email      varchar(40),
    role       varchar(20) not null,
    address    varchar(50),
    phone      varchar(10),
    created_at datetime default current_timestamp,
    updated_at datetime on update current_timestamp
);

create table if not exists categories
(
    id         int primary key auto_increment,
    brand      varchar(50),
    created_at datetime default current_timestamp,
    updated_at datetime on update current_timestamp
);

create table if not exists products
(
    id          int primary key auto_increment,
    name        varchar(50) not null,
    category_id int,
    price       double      not null,
    image       text,
    description text,
    quantity    int         not null,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp
);

create table if not exists reviews
(
    id         int primary key auto_increment,
    user_id    int not null,
    product_id int not null,
    content    text,
    rating     int,
    created_at datetime default current_timestamp
);

create table if not exists order_product
(
    id          int primary key auto_increment,
    order_id    int not null,
    product_id  int not null,
    product_qty int not null
);

create table if not exists orders
(
    id          int primary key auto_increment,
    user_id     int         not null,
    phone       varchar(20) not null,
    address     text        not null,
    shipment_id int         not null,
    payment_id  int         not null,
    date        datetime default current_timestamp,
    total_bill  double
);

create table if not exists shipments
(
    id          int primary key auto_increment,
    method      text   not null,
    fee         double not null,
    description text,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp
);

create table if not exists payments
(
    id          int primary key auto_increment,
    method      text not null,
    description text,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp
);