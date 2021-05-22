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
    phone      varchar(11),
    created_at datetime default current_timestamp,
    updated_at datetime on update current_timestamp
);

insert into users(id, username, password, name, email, role, address, phone) values (1, 'dangvh', '6711', 'Vu Hai Dang', 'dangvh@gmail.com', 'admin', 'Dau Ma Bac Ninh', '00911989755');
insert into users(id, username, password, name, email, role, address, phone) values (2, 'hoangtl', '6764', 'Tran Le Hoang', 'hoangtl@gmail.com', 'user', 'To Huu Ha Noi', '00911989756');

create table if not exists categories
(
    id         int primary key auto_increment,
    brand      varchar(50),
    created_at datetime default current_timestamp,
    updated_at datetime on update current_timestamp
);

insert into categories(id, brand) values (1, 'Oppo');
insert into categories(id, brand) values (2, 'Samsung Galaxy');

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

insert into products(id, name, category_id, price, image, description, quantity) values(1, 'Oppo hehe', 1, 1100, 'abc', 'An oppo phone', 10);

create table if not exists reviews
(
    id         int primary key auto_increment,
    user_id    int not null,
    product_id int not null,
    content    text,
    rating     int,
    created_at datetime default current_timestamp
);
insert into reviews(id, user_id, product_id, content, rating) values(1, 1, 1, 'this is good', 4 );

create table if not exists order_product
(
    id          int primary key auto_increment,
    order_id    int not null,
    product_id  int not null,
    product_qty int not null
);

insert into order_product values (1, 1, 1, 1);

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
insert into orders(id, user_id, phone, address, shipment_id, payment_id, total_bill) values (1, 1, '0911989755', 'Dau Ma Bac Ninh', 1, 1, 1100);

create table if not exists shipments
(
    id          int primary key auto_increment,
    method      text   not null,
    fee         double not null,
    description text,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp
);
insert into shipments(id, method, fee, description) values (1, 'Xe may', 2, 'Ship bang xe may');

create table if not exists payments
(
    id          int primary key auto_increment,
    method      text not null,
    description text,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp
);
insert into payments(id, method, description) values (1, 'VNPay', 'Tra bang the');