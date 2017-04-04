Timetable

create database timetable;
use timetable;
create table information (
    day_period int,
    subject varchar(255),
    name varchar(255)
);
alter table information add unique (day_period);
