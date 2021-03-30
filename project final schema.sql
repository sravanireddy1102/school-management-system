create database dbs_project;
use dbs_project;
CREATE TABLE IF NOT EXISTS `students` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `addmissiondate` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `parentid` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL,
  primary key(id)
);
INSERT INTO students VALUES ('191CS101','Ishitha','0989383','a@gmail.com','female','2002-11-11','2019-07-19','Oman','200','S1');
INSERT INTO students VALUES ('191CS102','Aakash','698938300','aa@gmail.com','male','2002-11-11','2019-07-19','Quatar','202','S1');
INSERT INTO students VALUES ('191CS103','Arnav','788938300','ar@gmail.com','male','2001-11-11','2019-07-19','Italy','203','S2');



CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  primary key(`userid`)
);
INSERT INTO users VALUES ('191CS224','Kruthika','Kruthika','admin');
INSERT INTO users VALUES ('191CS223','Sravani','Sravani','teacher');
INSERT INTO users VALUES ('191CS205','Janmansh','Janmansh','admin');
INSERT INTO users VALUES ('191CS101','Ishitha','Ishitha','student');
INSERT INTO users VALUES ('191CS102','Aakash','Aakash','student');
INSERT INTO users VALUES ('191CS103','Arnav','Arnav','student');
CREATE TABLE IF NOT EXISTS `teachers` (
  `teacherid` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `hiredate` date NOT NULL,
  `salary` double NOT NULL,
  primary key(`teacherid`)
);
insert into teachers values ('191CS223', 'Sravani', '1234567891', 'ksk@gmail.com', 'chitradurga', 'female', '2010-3-12', '2021-2-1', 100000);
insert into teachers values ('191CS225', 'Anirudh', '67567891', 'ani@gmail.com', 'chithoor', 'male', '2010-3-12', '2021-2-1', 100000);
insert into teachers values ('191CS226', 'Akshitha', '976867891', '@akshithagmail.com', 'bengaluru', 'female', '2011-3-12', '2021-2-1', 80000);
insert into teachers values ('191CS234', 'Arushi', '9234567891', 'arushi@gmail.com', 'mangalore', 'female', '2001-3-12', '2021-3-1', 150000);
insert into teachers values ('191CS232', 'Sharath', '09456789001', 'sharath@gmail.com', 'hyderabad', 'male', '2002-3-12', '2021-1-1', 200000);

CREATE TABLE IF NOT EXISTS `subjects` (
  `subjectid` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `teacherid` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL,
  primary key(`subjectid`)
);
insert into subjects values ('CS251', 'DBS', '191CS223', 'S1');
insert into subjects values ('CS250', 'COA', '191CS225', 'S2');
insert into subjects values ('CS252', 'OS', '191CS234', 'S1');
insert into subjects values ('CS253', 'DAA', '191CS226', 'S1');
insert into subjects values ('CS254', 'DBS_LAB', '191CS232', 'S2');


CREATE TABLE IF NOT EXISTS `attendance`(
`id` varchar(20) NOT NULL ,
`subjectid` varchar(20) NOT NULL,
`percentage` int,
foreign key(`subjectid`) references `subjects`(`subjectid`),
foreign key(`id`) references `student`(`id`),
primary key(id, subjectid)    
);
