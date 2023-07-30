create table stamp_history (
    num int(5) not null AUTO_INCREMENT,
    id char(15) not null,
    cafe_name char(20) not null,
    title char(15) not null,
    regist_day char(20) not null,
    count char(10) not null,
    primary key(num)
);

insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test", "스탬프 적립", "카페365", "2023-05-21", "+1");
insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test", "스탬프 쿠폰전환", "카페365", "2023-05-22", "-10");
insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test", "쿠폰 교환", "카페365", "2023-05-23", "+1");
insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test", "쿠폰 사용", "카페365", "2023-05-24", "-1");
insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test2", "스탬프 적립", "별다방", "2023-05-25", "+1");
insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test2", "스탬프 쿠폰전환", "별다방", "2023-05-26", "-10");
insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test2", "쿠폰 교환", "별다방", "2023-05-27", "+1");
insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test2", "쿠폰 사용", "별다방", "2023-05-28", "-1");
insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test3", "스탬프 적립", "더소아즈커피", "2023-05-29", "+1");
insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test3", "스탬프 쿠폰전환", "더소아즈커피", "2023-05-30", "-10");
insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test3", "쿠폰 교환", "더소아즈커피", "2023-05-31", "+1");
insert into stamp_history (id, title, cafe_name, regist_day, count)
    values ("test3", "쿠폰 사용", "더소아즈커피", "2023-06-01", "-1");
