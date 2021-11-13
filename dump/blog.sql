
CREATE DATABASE IF NOT EXISTS blog;
USE blog;

CREATE TABLE IF NOT EXISTS users (
    email varchar(50) NOT NULL,
    username varchar(20) NOT NULL,
    password varchar(16) NOT NULL,
    PRIMARY KEY (email)
);

CREATE TABLE IF NOT EXISTS posts (
    id int(4) NOT NULL AUTO_INCREMENT,
    subject VARCHAR(50) NOT NULL,
    message VARCHAR(256) NOT NULL,
    userEmail VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FOREIGN KEY fk_posts_users (userEmail) REFERENCES users (email)
);

INSERT INTO users(email, username, password) VALUES ('admin@admin.com','admin','adminadmin')


