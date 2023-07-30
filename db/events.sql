create table events (
    num int(5) not null AUTO_INCREMENT,
    own_id char(15) not null,
    title char(15) not null,
    start char(20) not null,
    end char(20) not null,
    banner_img char(200),
    event_img char(200),
    regist_day char(20),
    primary key(num)
);

insert into events(num, own_id, title, start, end, banner_img, event_img, regist_day)
    values(1, "test", "제목", "2023-04-16", "2023-04-26", "member", "", "", "2023-04-16 (12:34)");
