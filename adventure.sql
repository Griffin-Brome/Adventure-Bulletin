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
    post_id INT NOT NULL AUTO_INCREMENT,
    post_title VARCHAR(255),
    post_body VARCHAR(1000),
    PRIMARY KEY(post_id)
); CREATE TABLE board(
    board_title VARCHAR(255),
    PRIMARY KEY(board_title)
); CREATE TABLE comment(
    uname VARCHAR(255),
    comment_id INT NOT NULL AUTO_INCREMENT,
    comment_body VARCHAR(1000),
    post_id INT,
    PRIMARY KEY(uname, comment_id)
); CREATE TABLE joined_board(
    uname VARCHAR(255),
    board_title VARCHAR(255),
    PRIMARY KEY(uname, board_title)
); CREATE TABLE contains_post(
    post_id INT,
    board_title VARCHAR(255),
    PRIMARY KEY(post_id, board_title)
);