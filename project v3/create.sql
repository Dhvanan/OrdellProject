create table user (user_id varchar(25),password varchar(25) , primary key(user_id));

create table reviews ( user_id varchar(50),video_src varchar(100), time TIME , review varchar(25) , primary key(user_id,video_src,time), foreign key(user_id) references user(user_id)); 