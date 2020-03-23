-- ER model for this database can be found on this projects github repo
CREATE TABLE account(
    uname VARCHAR(255),
    email VARCHAR(255),
    full_name VARCHAR(255),
    birth_date DATE,
    pword VARCHAR(255),
    is_admin BOOLEAN,
    PRIMARY KEY(uname)
); CREATE TABLE post(
    post_id INT,
    post_title VARCHAR(255),
    PRIMARY KEY(post_id)
); CREATE TABLE board(
    board_title VARCHAR(255),
    PRIMARY KEY(board_title)
); CREATE TABLE interest(
    interest_name VARCHAR(255),
    PRIMARY KEY(interest_name)
); CREATE TABLE COMMENT(
    uname VARCHAR(255),
    comment_id INT,
    comment_body VARCHAR(1000),
    post_id INT,
    PRIMARY KEY(uname, comment_id)
); CREATE TABLE has_interest(
    uname VARCHAR(255),
    interest_name VARCHAR(255),
    PRIMARY KEY(uname, interest_name)
); CREATE TABLE post_interest(
    post_id INT,
    interest_name VARCHAR(255),
    PRIMARY KEY(post_id, interest_name)
); CREATE TABLE joined_board(
    uname VARCHAR(255),
    board_title VARCHAR(255),
    PRIMARY KEY(uname, board_title)
); CREATE TABLE contains_post(
    post_id INT,
    board_title VARCHAR(255),
    PRIMARY KEY(post_id, board_title)
);
-- child element of post 
CREATE TABLE text_post(
    post_id INT,
    post_body VARCHAR(1000),
    PRIMARY KEY(post_id)
);
-- child element of post
CREATE TABLE link_post(
    post_id INT,
    destination VARCHAR(255),
    PRIMARY KEY(post_id)
);