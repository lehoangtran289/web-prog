drop table if exists users;
drop table if exists products;
drop table if exists orders_products;
drop table if exists categories;
drop table if exists orders;
drop table if exists shipments;
drop table if exists payments;
drop table if exists reviews;
drop table if exists tokens;

create table if not exists users
(
    id         int primary key auto_increment,
    username   varchar(20) unique not null,
    password   varchar(256)        not null,
    name       varchar(30),
    email      varchar(40),
    role       varchar(20) default 'user',
    address    varchar(50),
    phone      varchar(20),
    created_at datetime    default current_timestamp,
    updated_at datetime on update current_timestamp
);
insert into users(username, password, name, email, role, address, phone)
values ('dangvh', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'Vu Hai Dang', 'dangvh@gmail.com', 'user', 'Bac Ninh Bac Ninh', '0911989755'),
       ('hoangtl', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'Tran Le Hoang', 'hoangtl@gmail.com', 'user', 'Ha Noi Ha Noi', '0911989756'),
       ('van', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'Van H', 'van@gmail.com', 'user', 'Ha Noi Ha Noi', '0911989757'),
       ('xon', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'Xon T', 'xon@gmail.com', 'user', 'Ha Noi Ha Noi', '0911989758'),
       ('user1', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'User U1', 'user1@gmail.com', 'user', 'BHa Noi Ha Noi', '0911989759'),
       ('user2', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'User U2', 'user2@gmail.com', 'user', 'BHa Noi Ha Noi', '0911989751'),
       ('admin', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'Admin admin', 'admin@gmail.com', 'admin', 'admin home', '01686868686');

create table if not exists categories
(
    id         int primary key auto_increment,
    brand      varchar(50),
    created_at datetime default current_timestamp,
    updated_at datetime on update current_timestamp
);

insert into categories(brand)
values ('IPhone'),
       ('Samsung'),
       ('Xiaomi'),
       ('Oppo');


create table if not exists products
(
    id          int primary key auto_increment,
    name        varchar(50) unique not null,
    quantity    int         not null,
    category_id int,
    OS          varchar(30),
    chipset     varchar(256),
    ram         varchar(20),
    display     varchar(30),
    resolution  varchar(30),
    camera      varchar(30),
    memory      varchar(30),
    pin         varchar(20),
    image       text,
    description text,
    price       double      not null,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp,
    foreign key (category_id) references categories(id) ON DELETE CASCADE ON UPDATE CASCADE
);

insert into products(name, category_id, description, price, image, quantity)
values ('Oppo 5x', '4', 'abcoppo', 1000, 'abc.png', 10),
       ('Samsung Galaxy X', '2', 'abcoppo', 1500, 'def.png', 3),
       ('IPhone XS', '1', 'abcoppo', 2100, 'ghk.png', 5),
       ('IPhone XS Max', '1', 'abcoppo', 2500, 'abc.png', 12),
       ('Xiaomi ABC', '3', 'abcoppo', 1000, 'abc.png', 15);

create table if not exists reviews
(
    id         int primary key auto_increment,
    user_id    int not null,
    product_id int not null,
    content    text,
    rating     int,
    created_at datetime default current_timestamp
);

create table if not exists orders_products
(
    id          int primary key auto_increment,
    order_id    int not null,
    product_id  int not null,
    unique (order_id, product_id),
    product_qty int not null
);
insert into orders_products(id, order_id, product_id, product_qty)
values (1, 1, 1, 1);

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
insert into orders(id, user_id, phone, address, shipment_id, payment_id, total_bill)
values (1, 1, '09', 'abc', 1, 1, 1100);

create table if not exists shipments
(
    id          int primary key auto_increment,
    method      text   not null,
    fee         double not null,
    description text,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp
);
insert into shipments(method, fee, description)
values ('By bike', '5', 'Delivery by bike');

create table if not exists payments
(
    id          int primary key auto_increment,
    method      text not null,
    description text,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp
);
insert into payments(method, description)
values ('COD', 'Cash on delivery');

create table tokens
(
 id int not null primary key auto_increment,
 username varchar(20) not null ,
 token text not null ,
 is_expired int not null default 0,
 expire_date datetime not null default current_timestamp on update current_timestamp
)