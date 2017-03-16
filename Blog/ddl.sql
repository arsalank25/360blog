CREATE DATABASE IF NOT EXISTS 360Blog;



drop table post;
CREATE TABLE post(
ID int NOT NULL AUTO_INCREMENT primary key,
topic varchar(255),

category varchar(255),
theText varchar(500),
postStamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
userName varchar(255),
 FOREIGN KEY (userName) REFERENCES blogUser(userName) ON DELETE CASCADE
);

CREATE TABLE postComment(
ID int NOT NULL AUTO_INCREMENT primary key,
postID int NOT NULL,   
userName varchar(255) NOT NULL,
topic varchar(255),
postStamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (userName) REFERENCES blogUser(userName) ON DELETE CASCADE,
FOREIGN KEY (postID) REFERENCES post(ID) ON DELETE CASCADE
);

drop table blogUser;
CREATE TABLE blogUser( 
userName varchar(255) primary Key,
pass varchar(255),
LastName varchar(255),
FirstName varchar(255),
email varchar(255),
bio varchar(255),
userStatus tinyInt DEFAULT 1,
userType tinyInt,
dp LONGBLOB 

);
