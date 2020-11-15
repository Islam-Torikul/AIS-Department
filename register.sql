CREATE TABLE users(
id int auto_increment primary key,
username varchar(30),
email varchar(25),
password varchar(20),
join_date timestamp current_timestamp
);