create table members (
    id char(15) not null,
    pass char(15) not null,
    name char(10) not null,
    phone char(20) not null,
    type char(10),
    regist_day char(20),
    primary key(id)
);

insert into members(id, pass, name, phone, type, regist_day)
    values("test", "123", "test", "010-1111-2222", "member", "2023-04-16 (12:34)");
insert into members(id, pass, name, phone, type, regist_day)
    values("test2", "123", "test", "010-3333-4444", "member", "2023-04-16 (12:34)");
insert into members(id, pass, name, phone, type, regist_day)
    values("test3", "123", "test3", "010-5555-6666", "owner", "2023-05-16 (12:34)");
insert into members(id, pass, name, phone, type, regist_day)
    values("test4", "123", "test4", "010-7777-8888", "owner", "2023-05-16 (12:34)");
