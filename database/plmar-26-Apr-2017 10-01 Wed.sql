DROP TABLE IF EXISTS pl_account_tbl;

CREATE TABLE `pl_account_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO pl_account_tbl VALUES("22","uploads/administrator.png","Administrator","Administrator","admin@noreply.com","Male","Administrator","$2y$10$QbfpMyQ18GHPCXyEQWoko.oCTqaJ4y2w.MNduu2YQzZNSW6HvmDuW","0","2017-04-26 15:41:33");
INSERT INTO pl_account_tbl VALUES("30","uploads/male.jpg","A111G0001","John David Lozano","lozanojohndavid@gmail.com","Male","A111G0001","$2y$10$ExGU6y5ZCmU2cnyMuyQI9em/awYN6qDL9GRBRL./uHdIOCqJar7hi","1","2017-04-26 15:55:13");
INSERT INTO pl_account_tbl VALUES("31","uploads/female.jpg","PLMAR-00001","Librarian","lozanojohndavid@gmail.com","Female","PLMAR-00001","$2y$10$K2JOSLqx2B9PLHhyYfeHQu3v2Uxw.0uogqbgof82bgRCWRZdNGD4m","0","2017-04-26 15:58:16");



DROP TABLE IF EXISTS pl_books_category_tbl;

CREATE TABLE `pl_books_category_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO pl_books_category_tbl VALUES("4","Emblem books‎ ");
INSERT INTO pl_books_category_tbl VALUES("5","Poetry Books");
INSERT INTO pl_books_category_tbl VALUES("6","Fictional books");
INSERT INTO pl_books_category_tbl VALUES("8","sample category");



DROP TABLE IF EXISTS pl_books_tbl;

CREATE TABLE `pl_books_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `requesting` int(11) NOT NULL,
  `published_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO pl_books_tbl VALUES("6","978-3-16-148410-0","Blaze Comics","Fictional books","Dan Jurgens","Dan Jurgens","Blaze Comics is a fictional American comic-book publisher in the DC Comics universe. The issues regularly featured Booster Gold as its main hero.","Available","0","05/08/1986");
INSERT INTO pl_books_tbl VALUES("7","978-1-86197-876-9","Refugee Boy","Fictional books","Benjamin Zephaniah","Bloomsbury Publishing","Refugee Boy is a teen novel written by Benjamin Zephaniah. It is a book about Alem Kelo, a 14-year-old refugee from Ethiopia and Eritrea. It was first published by Bloomsbury on 28 August 2001 . The novel was the recipient of the 2002 Portsmouth Book Award in the Longer Novel category.\n\n","Unavailable","1","08/21/2001");
INSERT INTO pl_books_tbl VALUES("13","sample","sample","sample category","sample","sample","samplesamplesample","Unavailable","1","04/02/2017");



DROP TABLE IF EXISTS pl_request_tbl;

CREATE TABLE `pl_request_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `book_return` varchar(255) NOT NULL,
  `request_date` varchar(255) NOT NULL,
  `approved_date` varchar(255) NOT NULL,
  `returned_date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO pl_request_tbl VALUES("7","A111G0001","John David Lozano","Refugee Boy","Approved","Returned","April 26,  2017","April 26,  2017","April 26,  2017");
INSERT INTO pl_request_tbl VALUES("8","A111G0002","Jeddahlyn Cabuga","Blaze Comics","Approved","Returned","April 26,  2017","April 26,  2017","April 26,  2017");
INSERT INTO pl_request_tbl VALUES("9","A111G0001","John David Lozano","Blaze Comics","Approved","Returned","April 26,  2017","April 26,  2017","April 26,  2017");
INSERT INTO pl_request_tbl VALUES("10","A111G0001","John David Lozano","Blaze Comics","Approved","Returned","April 26,  2017","April 26,  2017","April 26,  2017");
INSERT INTO pl_request_tbl VALUES("11","A111G0001","John David Lozano","sample","Approved","No","April 26,  2017","April 26,  2017","");
INSERT INTO pl_request_tbl VALUES("12","A111G0001","John David Lozano","Refugee Boy","Approved","No","April 26,  2017","April 26,  2017","");



DROP TABLE IF EXISTS pl_return_books_tbl;

CREATE TABLE `pl_return_books_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `returned_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO pl_return_books_tbl VALUES("9","A111G0002","Blaze Comics","April 26,  2017","Returned");
INSERT INTO pl_return_books_tbl VALUES("10","A111G0001","Blaze Comics","April 26,  2017","Returned");
INSERT INTO pl_return_books_tbl VALUES("11","A111G0001","Refugee Boy","April 26,  2017","Returned");
INSERT INTO pl_return_books_tbl VALUES("12","A111G0001","Blaze Comics","April 26,  2017","Returned");



