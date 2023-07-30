create table coupon (
    num int(5) not null AUTO_INCREMENT,
    mem_id char(15) not null,
    own_id char(15) not null,
    regist_day char(20),
    end_day char(20),
    primary key(num)
);

insert into coupon (mem_id, own_id, regist_day, end_day) values ("test", "owner1", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test", "owner1", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test", "owner1", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test", "owner2", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test", "owner2", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test", "owner3", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test2", "owner1", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test2", "owner1", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test2", "owner2", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test2", "owner1", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test3", "owner1", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test3", "owner1", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test3", "owner2", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test3", "owner2", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test3", "owner2", "2023-04-16 (12:34)", "2023-05-16 (20:00)");
insert into coupon (mem_id, own_id, regist_day, end_day) values ("test2", "owner3", "2023-04-16 (12:34)", "2023-05-16 (20:00)");    