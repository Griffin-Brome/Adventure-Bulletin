-- ER model for this database can be found on this projects github repo
DROP TABLE account; 
DROP TABLE board;
DROP TABLE post;
DROP TABLE comment;
DROP TABLE joined_board;
DROP TABLE contains_post;

CREATE TABLE account(
    uname VARCHAR(255),
    email VARCHAR(255),
    full_name VARCHAR(255),
    birth_date DATE,
    pword VARCHAR(255),
    is_admin BOOLEAN,
    PRIMARY KEY(uname)
); 
CREATE TABLE board(
    board_title VARCHAR(255),
    PRIMARY KEY(board_title)
); 
CREATE TABLE post(
    post_id INT NOT NULL AUTO_INCREMENT,
    post_title VARCHAR(255),
    post_body VARCHAR(1000),
    uname VARCHAR(255),
    board_title VARCHAR(255),
    FOREIGN KEY (uname) REFERENCES account(uname),
    FOREIGN KEY (board_title) REFERENCES board(board_title),
    PRIMARY KEY(post_id)
); 
CREATE TABLE comment(
    uname VARCHAR(255),
    comment_id INT NOT NULL AUTO_INCREMENT,
    comment_body VARCHAR(1000),
    post_id INT,
    FOREIGN KEY (uname) REFERENCES account(uname),
    FOREIGN KEY (post_id) REFERENCES post(post_id),
    PRIMARY KEY(uname, comment_id)
); 
CREATE TABLE joined_board(
    uname VARCHAR(255),
    board_title VARCHAR(255),
    FOREIGN KEY (uname) REFERENCES account(uname),
    PRIMARY KEY(uname, board_title)
); 
CREATE TABLE contains_post(
    post_id INT,
    board_title VARCHAR(255),
    FOREIGN KEY (post_id) REFERENCES post(post_id),
    FOREIGN KEY (board_title) REFERENCES board(post_id),
    PRIMARY KEY(post_id, board_title)
);