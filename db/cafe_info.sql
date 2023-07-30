create table cafe_info (
    # num int(5) not null AUTO_INCREMENT,
    own_id char(15) not null,
    name char(15) not null,
    phone char(20) not null,
    address char(100) not null,
    regist_day char(20),
    stamp char(100),
    stampbook char(100),
    coupon char(100),
    coupon_detail char(100),
    primary key(own_id)
);

insert into cafe_info (own_id, name, phone, address, regist_day, stamp, stampbook, coupon, coupon_detail)
    values("owner1", "카페365", "054-555-5555", "경북 안동시 송천1길 138-8", "2023-04-16 (12:34)", "img_stamp2.png", "img_stamp.png", "coupon1.png", NULL);
insert into cafe_info (own_id, name, phone, address, regist_day, stamp, stampbook, coupon, coupon_detail)
    values("owner2", "별다방", "054-555-5555", "경북 안동시 송천1길 140", "2023-04-16 (12:34)", "img_stamp2.png", "img_stamp.png", "coupon1.png", NULL);
insert into cafe_info (own_id, name, phone, address, regist_day, stamp, stampbook, coupon, coupon_detail)
    values("owner3", "더소아즈커피", "054-555-5555", "경북 안동시 송천1길 146-7", "2023-04-16 (12:34)", "img_stamp2.png", "img_stamp.png", "coupon1.png", NULL);
