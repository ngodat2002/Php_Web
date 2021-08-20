CREATE TABLE books (
 bookid int(11) PRIMARY KEY AUTO_INCREMENT,
 authorid int(11) DEFAULT NULL,
 title varchar(55) DEFAULT NULL,
 ISBN varchar(25) DEFAULT NULL,
 pub_year smallint(6) DEFAULT NULL,
 available tinyint(4) DEFAULT NULL
)

INSERT INTO books (bookid, authorid, title, ISBN, pub_year, available) VALUES
(1, 1, 'Code Alone', 'aLONE', 1999, 2),
(2, 1, 'Mua thu bang gia', 'Av156', 1995, 2),
(3, 2, 'Code Home', 'at411', 1994, 1),
(4, 2, 'Chuyen tinh mua ha', 'atd84', 1998, 1),
(5, 1, 'Ban Nga Cuoc Doi', 'Av1a5s', 2000, 2),
(6, 2, 'Yeu Em Nhieu', 'aaf5748', 2002, 1);
