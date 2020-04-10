-- ER model for this database can be found on this projects github repo
CREATE TABLE account(
    uname VARCHAR(255),
    email VARCHAR(255),
    full_name VARCHAR(255),
    birth_date DATE,
    pword VARCHAR(255),
    is_admin BOOLEAN,
    pic BLOB,
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
    post_time DATETIME,
    FOREIGN KEY (uname) REFERENCES account(uname),
    FOREIGN KEY (board_title) REFERENCES board(board_title),
    PRIMARY KEY(post_id)
); 
CREATE TABLE comment(
    uname VARCHAR(255),
    comment_id INT NOT NULL AUTO_INCREMENT,
    comment_body VARCHAR(1000),
    post_id INT,
    comment_time DATETIME,
    FOREIGN KEY (uname) REFERENCES account(uname),
    FOREIGN KEY (post_id) REFERENCES post(post_id),
    PRIMARY KEY(comment_id)
);

INSERT INTO board VALUES ('Skiing');
INSERT INTO board VALUES ('Hiking');
INSERT INTO board VALUES ('Climbing');
INSERT INTO board VALUES ('Kayaking');

INSERT INTO `account` (`uname`, `email`, `full_name`, `birth_date`, `pword`, `is_admin`, `pic`) VALUES ('admin', NULL, NULL, NULL, '$2y$10$25HsVptdQGlYyEA9S/qtsedLDdymWVJwEhIQsD9MhG31PteNqZEAG', NULL, NULL);