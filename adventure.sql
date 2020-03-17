-- ER model for this database can be found on this projects github repo

create table user(
    uname varchar(255),
    email varchar(255),
    full_name varchar(255),
    birth_date date,
    pword varchar(255),
    is_admin boolean,
    primary key uname
);

create table post(
    post_id int,
    post_title varchar(255),
    primary key post_id
);

create table board(
    board_title varchar(255),
    primary key board_title
);

create table interest(
    interest_name varchar(255),
    primary key interest_name
);

create table comment(
    uname varchar(255),
    comment_id int,
    comment_body varchar(1000),
    post_id int,
    primary key uname, comment_id
);

create table has_interest(
    uname varchar(255),
    interest_name varchar(255),
    primary key uname, interest_name
);

create table post_interest(
    post_id int,
    interest_name varchar(255),
    primary key post_id, interest_name
);

create table joined_board(
    uname varchar(255), 
    board_title varchar(255),
    primary key uname, board_title
);

create table contains_post(
    post_id int,
    board_title varchar(255),
    primary key post_id, board_title
);

-- child element of post 
create table text_post(
    post_id int,
    post_body varchar(1000),
    primary key post_id
);

-- child element of post
create table link_post(
    post_id int,
    destination varchar(255),
    primary key link_post
);