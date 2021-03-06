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
    password   varchar(256)       not null,
    name       varchar(30),
    email      varchar(40),
    role       varchar(20) default 'user',
    address    varchar(50),
    phone      varchar(20),
    created_at datetime    default current_timestamp,
    updated_at datetime on update current_timestamp
);
insert into users(username, password, name, email, role, address, phone)
values ('dangvh', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'Vu Hai Dang', 'dangvh@gmail.com',
        'user', 'Bac Ninh Bac Ninh', '0911989755'),
       ('hoangtl', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'Tran Le Hoang', 'hoangtl@gmail.com',
        'user', 'Ha Noi Ha Noi', '0911989756'),
       ('van', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'Van H', 'van@gmail.com', 'user',
        'Ha Noi Ha Noi', '0911989757'),
       ('xon', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'Xon T', 'xon@gmail.com', 'user',
        'Ha Noi Ha Noi', '0911989758'),
       ('user1', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'User U1', 'user1@gmail.com', 'user',
        'BHa Noi Ha Noi', '0911989759'),
       ('user2', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'User U2', 'user2@gmail.com', 'user',
        'BHa Noi Ha Noi', '0911989751'),
       ('admin', '$2y$10$2jWElpzfcMw9mi6p.uZr5e7IA1Mjo7yTNYJEYbzgexPssafiY9U0S', 'Admin admin', 'admin@gmail.com',
        'admin', 'admin home', '01686868686');

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
       ('Oppo'), 
       ('Realme'),
       ('BlackBerry');


create table if not exists products
(
    id          int primary key auto_increment,
    name        varchar(100) unique not null,
    quantity    int                not null,
    category_id int,
    OS          varchar(30),
    chipset     varchar(256),
    ram         varchar(20),
    display     varchar(30),
    resolution  varchar(50),
    camera      varchar(100),
    memory      varchar(30),
    pin         varchar(20),
    image       text,
    description text,
    price       double             not null,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp,
    foreign key (category_id) references categories (id) ON DELETE CASCADE ON UPDATE CASCADE
);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 Pro Max - 512GB  ',6,1,'iOS 14','Apple A14 Bionic 6 nh??n','6 GB','OLED 6.7','1284 x 2778 Pixels','3 camera 12 MP, 12 MP','512 GB','3687 mAh','product-1','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',1595);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 Pro Max - 128GB  ',14,1,'iOS 14','Apple A14 Bionic 6 nh??n','6 GB','OLED 6.7','1284 x 2778 Pixels','3 camera 12 MP, 12 MP','128 GB','3687 mAh','product-2','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',1243);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 Pro Max - 256GB  ',9,1,'iOS 14','Apple A14 Bionic 6 nh??n','6 GB','OLED 6.7','1284 x 2778 Pixels','3 camera 12 MP, 12 MP','256 GB','3687 mAh','product-3','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',1364);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 Pro - 128GB  ',9,1,'iOS 14','Apple A14 Bionic 6 nh??n','6 GB','OLED 6.1','1284 x 2778 Pixels','3 camera 12 MP, 12 MP','128 GB','2815 mAh','product-4','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',1129);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 Pro - 512GB  ',16,1,'iOS 14','Apple A14 Bionic 6 nh??n','6 GB','OLED 6.1','1284 x 2778 Pixels','3 camera 12 MP, 12 MP','512 GB','2815 mAh','product-5','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',1473);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 Pro - 256GB  ',17,1,'iOS 14','Apple A14 Bionic 6 nh??n','6 GB','OLED 6.1','1284 x 2778 Pixels','3 camera 12 MP, 12 MP','256 GB','2815 mAh','product-6','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',1232);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 - 64GB  ',19,1,'iOS 14','Apple A14 Bionic 6 nh??n','4 GB','OLED 6.1','1170 x 2532 Pixels','2 camera 12 MP, 12 MP','64 GB','2815 mAh','product-7','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',825);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 - 256GB  ',10,1,'iOS 14','Apple A14 Bionic 6 nh??n','4 GB','OLED 6.1','1170 x 2532 Pixels','2 camera 12 MP, 12 MP','256 GB','2815 mAh','product-8','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',1043);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 - 128GB  ',24,1,'iOS 14','Apple A14 Bionic 6 nh??n','4 GB','OLED 6.1','1170 x 2532 Pixels','2 camera 12 MP, 12 MP','128 GB','2815 mAh','product-9','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',912);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 Mini - 256GB  ',25,1,'iOS 14','Apple A14 Bionic 6 nh??n','4 GB','OLED 5.4','Full HD+ (1080 x 2340 Pixels)','2 camera 12 MP, 12 MP','256 GB','2227 mAh','product-10','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',956);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 Mini - 128GB  ',5,1,'iOS 14','Apple A14 Bionic 6 nh??n','4 GB','OLED 5.4','Full HD+ (1080 x 2340 Pixels)','2 camera 12 MP, 12 MP','128 GB','2227 mAh','product-11','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',782);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Apple iPhone 12 Mini - 64GB  ',14,1,'iOS 14','Apple A14 Bionic 6 nh??n','4 GB','OLED 5.4','Full HD+ (1080 x 2340 Pixels)','2 camera 12 MP, 12 MP','64 GB','2227 mAh','product-12','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y.',693);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('iPhone 11 - 128GB  ',22,1,'iOS 14','Apple A13 Bionic 6 nh??n','4 GB','IPS LCD 6.1','828 x 1792 Pixels','2 camera 12 MP, 12 MP','128 GB','3110 mAh','product-13','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u.',751);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('iPhone 11 - 64GB ',25,1,'iOS 14','Apple A13 Bionic 6 nh??n','4 GB','IPS LCD 6.1','828 x 1792 Pixels','2 camera 12 MP, 12 MP','64 GB','3110 mAh','product-14','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u.: Phi??n b???n m???i: kh??ng c?? c??? s???c, tai nghe',673);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('iPhone XR - 128GB  ',18,1,'iOS 12','Apple A12 Bionic 6 nh??n','3 GB','IPS LCD 6.1','828 x 1792 Pixels','12 MP, 7 MP','128 GB','2942 mAh','product-15','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? 15 ng??y ?????u.',582);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('iPhone XR - 64GB  ',10,1,'iOS 12','Apple A12 Bionic 6 nh??n','3 GB','IPS LCD 6.1','828 x 1792 Pixels','12 MP, 7 MP','64 GB','2942 mAh','product-16','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? 15 ng??y ?????u.',494);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Samsung Galaxy A32 ',18,2,'Android 11','MediaTek Helio G80 8 nh??n','6 GB','Super AMOLED 6.4','Full HD+ (1080 x 2400 Pixels)','Ch??nh 64 MP & Ph??? 8 MP, 5MP, 5MP, 20 MP','128 GB','5000 mAh','product-17','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? trong 15 ng??y.',246);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Samsung Galaxy S21 Ultra 256GB 5G ',12,2,'Android 11','Exynos 2100 8 nh??n','12 GB','Dynamic AMOLED 2X 6.8','2K+ (1440 x 3200 Pixels)','Ch??nh 108 MP & Ph??? 12 MP, 10 MP, 10 MP, 40 MP','256 GB','5000 mAh','product-18','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u.',1067);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Samsung Galaxy S21 Ultra 128GB 5G ',18,2,'Android 11','Exynos 2100 8 nh??n','12 GB','Dynamic AMOLED 2X 6.8','2K+ (1440 x 3200 Pixels)','Ch??nh 108 MP & Ph??? 12 MP, 10 MP, 10 MP, 40 MP','128 GB','5000 mAh','product-19','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u.',950);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Samsung Galaxy S21 Plus 128GB 5G ',23,2,'Android 11','Exynos 2100 8 nh??n','8 GB','Dynamic AMOLED 2X 6.7','Full HD+ (1080 x 2400 Pixels)','Ch??nh 12 MP & Ph??? 64 MP, 12 MP, 10 MP','128 GB','4800 mAh','product-20','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u.',745);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Samsung Galaxy S21 Plus 256GB 5G ',13,2,'Android 11','Exynos 2100 8 nh??n','8 GB','Dynamic AMOLED 2X 6.7','Full HD+ (1080 x 2400 Pixels)','Ch??nh 12 MP & Ph??? 64 MP, 12 MP, 10 MP','256 GB','4800 mAh','product-21','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u.',825);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Samsung Galaxy A12 ',20,2,'Android 10','MediaTek Helio G35 8 nh??n','4 GB','PLS TFT LCD','HD+ (720 x 1600 Pixels)','Ch??nh 48 MP & Ph??? 5 MP, 2 MP, 2 MP, 8 MP','128 GB','5000 mAh','product-22','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? 15 ng??y ?????u.',151);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Samsung Galaxy Note 20 Ultra ',6,2,'Android 10','Exynos 990 8 nh??n','8 GB','Dynamic AMOLED 2X','2K+ (1440 x 3088 Pixels)','Ch??nh 108 MP & Ph??? 12 MP, 12 MP, c???m bi???n Laser AF, 10 MP','256 GB','4500 mAh','product-23','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u.',803);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Samsung Galaxy A52 ',12,2,'Android 11','Snapdragon 720G 8 nh??n','8 GB','Super AMOLED','Full HD+ (1080 x 2400 Pixels)','Ch??nh 64 MP & Ph??? 12 MP, 5 MP, 5 MP, 32 MP','128 GB','4500 mAh','product-24','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? trong 15 ng??y.',336);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Samsung Galaxy A72 ',10,2,'Android 11','Snapdragon 720G 8 nh??n','8 GB','Super AMOLED 6.7','Full HD+ (1080 x 2400 Pixels)','Ch??nh 64 MP & Ph??? 12 MP, 8 MP, 5 MP, 32 MP','256 GB','5000 mAh','product-25','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u.',425);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Samsung Galaxy A02s 4GB/64GB ',13,2,'Android 10','Snapdragon 450 8 nh??n','4 GB','PLS TFT LCD 6.5','HD+ (720 x 1600 Pixels)','Ch??nh 13 MP & Ph??? 2 MP, 2 MP, 5 MP','64 GB','5000 mAh','product-26','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? trong 15 ng??y ?????u.',129);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Samsung Galaxy S20 FE 256GB ',17,2,'Android 11','Snapdragon 865 8 nh??n','8 GB','Super AMOLED','Full HD+ (1080 x 2400 Pixels)','Ch??nh 12 MP & Ph??? 12 MP, 8 MP, 32 MP','256 GB','4500 mAh','product-27','B???o h??nh 12 th??ng ch??nh h??ng. bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u.',608);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Xiaomi Redmi Note 10 6GB/128GB ',15,3,'Android 11','Snapdragon 678 8 nh??n','6 GB','AMOLED 6.43','Full HD+ (1080 x 2400 Pixels)','Ch??nh 48 MP & Ph??? 8 MP, 2 MP, 2 MP, 13 MP','128 GB','5000 mAh','product-28','B???o h??nh ch??nh h??ng 18 th??ng. Bao x??i ?????i tr??? trong 15 ng??y.',195);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Xiaomi Mi 10T Pro 5G - 8GB/128GB',18,3,'Android 10','Snapdragon 865 8 nh??n','8 GB','IPS LCD 6.67','Full HD+ (1080 x 2440 Pixels), T???n s??? qu??t 144Hz','Ch??nh 108 MP & Ph??? 13 MP, 5 MP, 20 MP','128 GB','5000 mAh','product-29','B???o h??nh 24 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y ?????u.',433);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Xiaomi Mi 10T Pro 5G - 8GB/256GB',7,3,'Android 10','Snapdragon 865 8 nh??n','8 GB','IPS LCD 6.67','Full HD+ (1080 x 2440 Pixels), T???n s??? qu??t 144Hz','Ch??nh 108 MP & Ph??? 13 MP, 5 MP, 20 MP','256 GB','5000 mAh','product-30','B???o h??nh 24 th??ng ch??nh h??ng, bao x??i ?????i tr??? trong 15 ng??y ?????u.',476);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Xiaomi Redmi 9T 4GB/64GB  DGW',7,3,'Android 10','Snapdragon 662 8 nh??n','4 GB','IPS LCD','Full HD+ (1080 x 2340 Pixels)','Ch??nh 48 MP & Ph??? 8 MP, 2 MP, 2 MP, 8 MP','64 GB','6000 mAh','product-31','B???o h??nh ch??nh h??ng 18 th??ng. Bao x??i ?????i tr??? trong 15 ng??y ?????u.',156);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Xiaomi Redmi Note 10S ',14,3,'Android 11','MediaTek Helio G95 8 nh??n','8 GB','AMOLED','Full HD+ (1080 x 2400 Pixels)','Ch??nh 64 MP & Ph??? 8 MP, 2 MP, 2 MP, 13 MP','128 GB','5000 mAh','product-32','B???o h??nh ch??nh h??ng 18 th??ng. Bao x??i ?????i tr??? trong 15 ng??y ?????u.',282);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Xiaomi Redmi Note 10 5G ',21,3,'Android 11','MediaTek Dimensity 700 8 nh??n','4 GB','IPS LCD','Full HD+ (1080 x 2400 Pixels)','Ch??nh 48 MP & Ph??? 2 MP, 2 MP, 8 MP','128 GB','5000 mAh','product-33','B???o h??nh ch??nh h??ng 18 th??ng. Bao x??i ?????i tr??? trong 15 ng??y ?????u.',216);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Xiaomi Redmi Note 10 Pro 8GB/128GB  Phi??n b???n MiFan Edition ',17,3,'Android 11','Snapdragon 732G','8 GB','AMOLED','Full HD+ (1080 x 2400 Pixels)','Ch??nh 108 MP & Ph??? 8 MP, 5 MP, 2 MP, 16 MP','128 GB','5020 mAh','product-34','B???o h??nh ch??nh h??ng 18 th??ng. Bao x??i ?????i tr??? trong 15 ng??y ?????u.',295);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Xiaomi Redmi Note 10 Pro 6GB/128GB ',23,3,'Android 11','Snapdragon 732G 8 nh??n','6 GB','AMOLED 6.67','Full HD+ (1080 x 2400 Pixels)','Ch??nh 108 MP & Ph??? 8 MP, 5 MP, 2 MP, 16 MP','128 GB','5020 mAh','product-35','B???o h??nh ch??nh h??ng 18 th??ng. Bao x??i ?????i tr??? trong 15 ng??y.',273);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Xiaomi Redmi Note 10 Pro 8GB/128GB ',18,3,'Android 11','Snapdragon 732G 8 nh??n','8 GB','AMOLED 6.67','Full HD+ (1080 x 2400 Pixels)','Ch??nh 108 MP & Ph??? 8 MP, 5 MP, 2 MP, 16 MP','128 GB','5020 mAh','product-36','B???o h??nh ch??nh h??ng 18 th??ng. Bao x??i ?????i tr??? trong 15 ng??y.',295);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Xiaomi Redmi Note 10 4GB/64GB ',21,3,'Android 11','Snapdragon 678 8 nh??n','4 GB','AMOLED 6.43','Full HD+ (1080 x 2400 Pixels)','Ch??nh 48 MP & Ph??? 8 MP, 2 MP, 2 MP, 13 MP','64 GB','5000 mAh','product-37','B???o h??nh ch??nh h??ng 18 th??ng. Bao x??i ?????i tr??? trong 15 ng??y.',169);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('OPPO Reno5 ',5,4,'Android 11','Snapdragon 720G 8 nh??n','8 GB','AMOLED 6.43','Full HD+ (1080 x 2400 Pixels)','Ch??nh 64 MP & Ph??? 8 MP, 2 MP, 2 MP, 44 MP','128 GB','4310 mAh','product-38','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? 15 ng??y ?????u.',377);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Oppo A74 8G/128G',10,4,'Android 11','Snapdragon 662 8 nh??n','8 GB','AMOLED','Full HD+ (1080 x 2400 Pixels)','Ch??nh 48 MP & Ph??? 2 MP, 2 MP, 16 MP','128 GB','5000 mAh','product-39','B???o h??nh 12 th??ng ch??nh h??ng',290);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('OPPO Find X3 Pro 5G ',11,4,'Android 11','Snapdragon 888 8 nh??n','12 GB','AMOLED','??ang c????p nh????t','??ang c????p nh????t, 32 MP','256 GB','4500 mAh','product-40','B???o h??nh 12 th??ng ch??nh h??ng',1173);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('OPPO A54 ',19,4,'Android 10','MediaTek Helio P35 8 nh??n','4 GB','IPS LCD','HD+ (720 x 1600 Pixels)','Ch??nh 13 MP & Ph??? 2 MP, 2 MP, 16 MP','128 GB','5000 mAh','product-41','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? trong 15 ng??y ?????u.',182);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('OPPO A94 ',9,4,'Android 11','MediaTek Helio P95 8 nh??n','8 GB','OLED 6.4','Full HD+ (1080 x 2400 Pixels)','Ch??nh 48 MP & Ph??? 8 MP, 2 MP, 2 MP, 16 MP','128 GB','4310 mAh','product-42','TH??NG TIN B???O H??NH',334);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('OPPO Reno5 5G ',15,4,'Android 11','Snapdragon 765G 8 nh??n','8 GB','AMOLED 6.43','Full HD+ (1080 x 2400 Pixels)','Ch??nh 64 MP & Ph??? 8 MP, 2 MP, 2 MP, 32 MP','128 GB','4300 mAh','product-43','TH??NG TIN B???O H??NH',441);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('OPPO A15s ',20,4,'Android 10','MediaTek Helio P35 8 nh??n','4 GB','LCD 6.52','HD+ (720 x 1600 Pixels)','Ch??nh 13 MP & Ph??? 2 MP, 2 MP, 8 MP','64 GB','4230 mAh','product-44','B???o h??nh 12 th??ng ch??nh h??ng',173);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Oppo A93 - 8GB/128GB ',21,4,'Android 10','MediaTek Helio P95 8 nh??n','8 GB','AMOLED','Full HD+ (1080 x 2400 Pixels)','Ch??nh 48 MP & Ph??? 8 MP, 2 MP, 2 MP, Ch??nh 16 MP & Ph??? 2 MP','128 GB','4000 mAh','product-45','B???o h??nh 12 th??ng ch??nh h??ng, bao x??i ?????i tr??? 15 ng??y ?????u.',241);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('OPPO A15 ',23,4,'Android 10','MediaTek Helio P35 8 nh??n','3 GB','IPS LCD 6.52','HD+ (720 x 1600 Pixels)','Ch??nh 13 MP & Ph??? 2 MP, 2 MP, 8 MP','32 GB','4230 mAh','product-46','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? 15 ng??y ?????u.',151);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Oppo A12 - 3GB/32GB ',11,4,'Android 11','??ang c???p nh???t','3 GB','IPS LCD 6.22','HD+ (720 x 1520 Pixels)','Ch??nh 13 MP & Ph??? 2 MP, 5 MP','32 GB','4230 mAh','product-47','Ch??nh h??ng 12 th??ng, bao x??i - ?????i tr??? trong 15 ng??y ?????u. G??i b???o h??nh m??? r???ng H-care, Vip-Care v?? H-Care Platinum ????? An t??m b???o h??nh - S??? d???ng l??u d??i',110);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Oppo A53 - 4GB/128GB ',23,4,'Android 11','??ang c???p nh???t','4 GB','IPS LCD 6.5','HD+ (720 x 1600 Pixels)','Ch??nh 13 MP & Ph??? 2 MP, 2 MP, 16 MP','128 GB','5000 mAh','product-48','Ch??nh h??ng 12 th??ng, bao x??i - ?????i tr??? trong 15 ng??y ?????u, G??i b???o h??nh m??? r???ng H-care, Vip-Care v?? H-Care Platinum ????? An t??m b???o h??nh - S??? d???ng l??u d??i',171);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Oppo Reno4',7,4,'Android 11','??ang c???p nh???t','8 GB','AMOLED 6.4','Full HD+ (1080 x 2400 Pixels)','Ch??nh 48 MP & Ph??? 8 MP, 2 MP, 2 MP, Ch??nh 32 MP & Ph??? c???m bi???n th??ng minh A.I','128 GB','4015 mAh','product-49','Ch??nh h??ng 12 th??ng, bao x??i - ?????i tr??? trong 15 ng??y ?????u. G??i b???o h??nh m??? r???ng H-care, Vip-Care v?? H-Care Platinum ????? An t??m b???o h??nh - S??? d???ng l??u d??i',280);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Oppo Reno4 Pro',9,4,'Android 11','??ang c???p nh???t','8 GB','AMOLED 6.5','Full HD+ (1080 x 2400 Pixels)','Ch??nh 48 MP & Ph??? 8 MP, 2 MP, 2 MP, 32 MP','256 GB','4000 mAh','product-50','- Ch??nh h??ng 12 th??ng, bao x??i - ?????i tr??? trong 15 ng??y ?????u. G??i b???o h??nh m??? r???ng H-care, Vip-Care v?? H-Care Platinum ????? An t??m b???o h??nh - S??? d???ng l??u d??i',425);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme 8 Pro ',22,5,'Android 11','Snapdragon 720G 8 nh??n','8 GB','Super AMOLED','Full HD+ (1080 x 2400 Pixels)','Ch??nh 108 MP & Ph??? 8 MP, 2 MP, 2 MP, 16 MP','128 GB','4500 mAh','product-51','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? trong 15 ng??y ?????u.',377);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme 8 ',10,5,'Android 11','MediaTek Helio G95','8 GB','Super AMOLED','Full HD+ (1080 x 2400 Pixels)','Ch??nh 64 MP & Ph??? 8 MP, 2 MP, 2 MP, 16 MP','128 GB','5000 mAh','product-52','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? trong 15 ng??y ?????u.',316);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme C25 ',19,5,'Android 11','MediaTek Helio G70','4 GB','IPS LCD','HD+ (720 x 1600 Pixels)','Ch??nh 48 MP & Ph??? 2 MP, 2 MP, 8 MP','128 GB','6000 mAh','product-53','B???o h??nh 12 th??ng ch??nh h??ng',193);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme C20 ',11,5,'Android 10','MediaTek Helio G35 8 nh??n','2 GB','LCD 6.5','HD+ (720 x 1600 Pixels)','8 MP, 5 MP','32 GB','5000 mAh','product-54','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? trong 15 ng??y ?????u.',106);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme C15 ',24,5,'Android 10','Snapdragon 460 8 nh??n','4 GB','IPS LCD','HD+ (720 x 1600 Pixels)','Ch??nh 13 & Ph??? 8 MP, 2 MP, 2 MP, 8 MP','64 GB','6000 mAh','product-55','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? 15 ng??y ?????u.',164);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme C17 - 6GB/128GB ',10,5,'Android 10','Snapdragon 460 8 nh??n','6 GB','IPS LCD 6.5','HD+ (720 x 1600 Pixels)','Ch??nh 13 MP & Ph??? 8 MP, 2 MP, 2 MP, 8 MP','128 GB','5000 mAh','product-56','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? 15 ng??y ?????u.',202);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme C12 - 3GB/32GB - Pin 6000 mAh',17,5,'Android 11','??ang c???p nh???t','3 GB','IPS LCD 6.52','HD+ (720 x 1600 Pixels)','Ch??nh 13 MP & Ph??? 2 MP, 2 MP, 5 MP','32 GB','6000 mAh','product-57','B???o h??nh 12 th??ng ch??nh h??ng. Bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u ti??n',141);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme 7 ',20,5,'Android 10','MediaTek Helio G95 8 nh??n','8 GB','IPS LCD','Full HD+ (1080 x 2400 Pixels)','Ch??nh 64 MP & Ph??? 8 MP, 2 MP, 2 MP, 16 MP','128 GB','5000 mAh','product-58','B???o h??nh 12 th??ng ch??nh h??ng. Bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u ti??n',216);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme 7 pro ',22,5,'Android 10','Snapdragon 720G 8 nh??n','8 GB','Super AMOLED 6.4','Full HD+ (1080 x 2400 Pixels)','Ch??nh 64 MP & Ph??? 8 MP, 2 MP, 2 MP, 32 MP','128 GB','4500 mAh','product-59','B???o h??nh 12 th??ng ch??nh h??ng. Bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u ti??n',323);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme C11 - 2GB/32GB ',15,5,'Android 10','MediaTek Helio G35 8 nh??n','2 GB','IPS LCD 6.5','HD+ (720 x 1560 Pixels)','Ch??nh 13 MP & Ph??? 2 MP, 5 MP','32 GB','5000 mAh','product-60','B???o h??nh 12 th??ng ch??nh h??ng. Bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u ti??n',106);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme C11 - 2021',5,5,'Android 10','Mali-G52 MC2','2 GB','IPS LCD 6.5','HD+ (720 x 1560 Pixels)','Ch??nh 13 MP & Ph??? 2 MP, 5 MP','32 GB','5000 mAh','product-61','B???o h??nh 12 th??ng ch??nh h??ng. Bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u ti??n',106);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Realme 7i ',23,5,'Android 10','Snapdragon 662 8 nh??n','8 GB','IPS LCD 6.5','HD+ (720 x 1600 Pixels)','Ch??nh 64 MP & Ph??? 8 MP, 2 MP, 2 MP, 16 MP','128 GB','5000 mAh','product-62','B???o h??nh 12 th??ng ch??nh h??ng. bao x??i ?????i tr??? trong v??ng 15 ng??y ?????u.',233);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Blackberry Key One - Black ',15,6,'Android 11','??ang c???p nh???t','4 GB','IPS LCD 4.5','1080 x 1620 Pixels','12 MP, 8 MP','64 GB','3505 mAh','product-63','B???o h??nh ch??nh h??ng 12 th??ng. Bao x??i ?????i tr??? trong 15 ng??y ?????u.',186);
insert into products(name, quantity, category_id, os, chipset, ram, display, resolution,             camera, memory, pin, image, description, price) values ('Blackberry Key One - Silver ',25,6,'Android 11','??ang c???p nh???t','3 GB','IPS LCD 4.5','1080 x 1620 Pixels','12 MP, 8 MP','32 GB','3505 mAh','product-64','Ch??nh h??ng 12 th??ng',173);

create table if not exists reviews
(
    id         int primary key auto_increment,
    user_id    int not null,
    product_id int not null,
    content    text,
    rating     int,
    created_at datetime default current_timestamp,
    unique (user_id, product_id)
);

create table if not exists orders_products
(
    id          int primary key auto_increment,
    order_id    int not null,
    product_id  int not null,
    unique (order_id, product_id),
    product_qty int not null check ( product_qty >= 0 )
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
values ('By bike', '5', 'Delivery by bike'),
        ('Pick up in store', '0', 'Pick up in store');

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
    id          int         not null primary key auto_increment,
    username    varchar(20) not null,
    token       text        not null,
    is_expired  int         not null default 0,
    expire_date datetime    not null default current_timestamp on update current_timestamp
)