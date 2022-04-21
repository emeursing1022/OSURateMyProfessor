CREATE DATABASE  IF NOT EXISTS osu_ratemyprofessor;
USE osu_ratemyprofessor;

drop table comments;
drop table courseProf;
drop table course;
drop table department;
drop table student;
drop table professor;


CREATE TABLE professor (
  ProfName varchar(50) NOT NULL,
  rating decimal(3,2) DEFAULT NULL,
  difficulty decimal(3,2),
  total int);

alter table professor add constraint professorpk primary key (ProfName);


CREATE TABLE student (
  stuEmail varchar(50) NOT NULL,
  stuName varchar(50) DEFAULT NULL,
  stuYear varchar(50) DEFAULT NULL,
  major varchar(50) DEFAULT NULL,
  userName varchar(50) DEFAULT NULL,
  stuPassword varchar(50) DEFAULT NULL);
  
alter table student add constraint studentpk primary key (stuEmail);

CREATE TABLE department (
  college varchar(100) NOT NULL,
  phoneNum varchar(20) DEFAULT NULL,
  location varchar(200) DEFAULT NULL,
  depEmail varchar(50) DEFAULT NULL);
  
alter table department add constraint departmentpk primary key (college);

CREATE TABLE course (
  courseNum varchar(50) NOT NULL,
  college varchar(100),
  CreditHours int DEFAULT NULL,
  CourseName varchar(100) DEFAULT NULL);
  
alter table course add constraint coursepk PRIMARY KEY (courseNum);
alter table course add constraint coursefk foreign key (college) references department (college);

create table courseProf (
profName varchar(50),
courseNum varchar(50));

alter table courseProf add constraint courseProfpk primary key (profName, courseNum);
alter table courseProf add constraint courseProffk foreign key(profName) references professor (profName);
alter table courseProf add constraint courseProfcoursefk foreign key(courseNum) references course(courseNum);


CREATE TABLE comments (
  commentID int NOT NULL,
  stuEmail varchar(50) DEFAULT NULL,
  profName varchar(50) DEFAULT NULL,
  commentDate date DEFAULT NULL,
  message varchar(300) DEFAULT NULL);
  
alter table comments add constraint commentspk primary key (commentID);
alter table comments add constraint commentStudentfk foreign key (stuEmail) references student(stuEmail);
alter table comments add constraint commentProffk foreign key (ProfName) references professor(profName);

insert into department values ('Department of Mathematics', '405-744-5688', '401 Mathematical Sciences Oklahoma State University Stillwater, OK 74078', 'mstaff@math.okstate.edu');
insert into department values ('Department of Statistics and Computer Science', '405-744-5688', '401 Department of Mathematics, Statistics and Department of Statistics and Computer Science Oklahoma State University Stillwater, OK 74078', 'kmg@cs.okstate.edu');

INSERT INTO course VALUES ("CS 1003","Department of Statistics and Computer Science", "3","Computer Proficiency");
INSERT INTO course VALUES ("CS 1013","Department of Statistics and Computer Science", "3","Computer Science Principles");
INSERT INTO course VALUES ("CS 1103","Department of Statistics and Computer Science", "3","Computer Programming (A)");
INSERT INTO course VALUES ("CS 1113","Department of Statistics and Computer Science", "3","Computer Science I");
INSERT INTO course VALUES ("CS 2133","Department of Statistics and Computer Science", "3","Computer Science II");
INSERT INTO course VALUES ("CS 2351","Department of Statistics and Computer Science", "3","Unix Programming");
INSERT INTO course VALUES ("CS 2433","Department of Statistics and Computer Science", "3","C/C++ Programming");
INSERT INTO course VALUES ("CS 2570","Department of Statistics and Computer Science", "3","Special Problems in Computer Science");
INSERT INTO course VALUES ("CS 3030","Department of Statistics and Computer Science", "3","Indistrial Pratice in Computer Science");
INSERT INTO course VALUES ("CS 3353","Department of Statistics and Computer Science", "3","Data Structures and Algorithm Analysis I");
INSERT INTO course VALUES ("CS 3363","Department of Statistics and Computer Science", "3","Organization of Programming Languages");
INSERT INTO course VALUES ("CS 3443","Department of Statistics and Computer Science", "3","Computer Systems");
INSERT INTO course VALUES ("CS 3513","Department of Statistics and Computer Science", "3","Numerical Methods for Digital Computers");
INSERT INTO course VALUES ("CS 3570","Department of Statistics and Computer Science", "3","Special Problems in Computer Science");
INSERT INTO course VALUES ("CS 3613","Department of Statistics and Computer Science", "3","Theoretical foundations of Computing");
INSERT INTO course VALUES ("CS 3653","Department of Statistics and Computer Science", "3","Discrete Mathematics for Computer Science");
INSERT INTO course VALUES ("CS 4143","Department of Statistics and Computer Science", "3","Computer Graphics");
INSERT INTO course VALUES ("CS 4153","Department of Statistics and Computer Science", "3","Mobile Applications Development");
INSERT INTO course VALUES ("CS 4173","Department of Statistics and Computer Science", "3","Video Game Development");
INSERT INTO course VALUES ("CS 4183","Department of Statistics and Computer Science", "3","Video Game Design");
INSERT INTO course VALUES ("CS 4243","Department of Statistics and Computer Science", "3","Introduction to Computer Security");
INSERT INTO course VALUES ("CS 4273","Department of Statistics and Computer Science", "3","Software Engineering");
INSERT INTO course VALUES ("CS 4283","Department of Statistics and Computer Science", "3","Computer Networks");
INSERT INTO course VALUES ("CS 4323","Department of Statistics and Computer Science", "3","Design and Implmentation of Operating Systems I");
INSERT INTO course VALUES ("CS 4373","Department of Statistics and Computer Science", "3","Agile Software Development");
INSERT INTO course VALUES ("CS 4433","Department of Statistics and Computer Science", "3","Introcudtion to Database System");
INSERT INTO course VALUES ("CS 4513","Department of Statistics and Computer Science", "3","Numerical Mathmatics: Analysis");
INSERT INTO course VALUES ("CS 4523","Department of Statistics and Computer Science", "3","Cloud Computingand Distributed Systems");
INSERT INTO course VALUES ("CS 4570","Department of Statistics and Computer Science", "3","Special Topics in Computing");
INSERT INTO course VALUES ("CS 4623","Department of Statistics and Computer Science", "3","Introcduction to Cyber Physical Systems");
INSERT INTO course VALUES ("CS 4743","Department of Statistics and Computer Science", "3","Extended Reality");
INSERT INTO course VALUES ("CS 4783","Department of Statistics and Computer Science", "3","Machine Learning");
INSERT INTO course VALUES ("CS 4793","Department of Statistics and Computer Science", "3","Artificial Intelligence I");
INSERT INTO course VALUES ("CS 4883","Department of Statistics and Computer Science", "3","Social Issues in Computing");
INSERT INTO course VALUES ("CS 4983","Department of Statistics and Computer Science", "3","Senior Capstone Project");
INSERT INTO course VALUES ("CS 4993","Department of Statistics and Computer Science", "3","Senior Honors Project");
INSERT INTO course VALUES ("Math 1483","Department of Mathematics", "3","Mathematical Functions and Their Uses");
INSERT INTO course VALUES ("Math 1493","Department of Mathematics", "3","Applications of Modern Mathematics");
INSERT INTO course VALUES ("Math 1513","Department of Mathematics", "3","College Algebra");
INSERT INTO course VALUES ("Math 1583","Department of Mathematics", "3","Applied Geometry and Trigonometry");
INSERT INTO course VALUES ("Math 1613","Department of Mathematics", "3","Trigonometry");
INSERT INTO course VALUES ("Math 1715","Department of Mathematics", "3","Precalculus");
INSERT INTO course VALUES ("Math 1813","Department of Mathematics", "3","Preparation for Calculus");
INSERT INTO course VALUES ("Math 1910","Department of Mathematics", "3","Special Studies");
INSERT INTO course VALUES ("Math 2103","Department of Mathematics", "3","Business Calculus");
INSERT INTO course VALUES ("Math 2123","Department of Mathematics", "3","Calculus for Technology Programs I");
INSERT INTO course VALUES ("Math 2133","Department of Mathematics", "3","Calculus for Technology Prorgam II");
INSERT INTO course VALUES ("Math 2144","Department of Mathematics", "3","Calculus I");
INSERT INTO course VALUES ("Math 2153","Department of Mathematics", "3","Calculus II");
INSERT INTO course VALUES ("Math 2163","Department of Mathematics", "3","Calculus III");
INSERT INTO course VALUES ("Math 2233","Department of Mathematics", "3","Differential Equations");
INSERT INTO course VALUES ("Math 2890","Department of Mathematics", "3","Honors Experience in Math");
INSERT INTO course VALUES ("Math 2910","Department of Mathematics", "3","Special Studies");
INSERT INTO course VALUES ("Math 3013","Department of Mathematics", "3","Linear Algebra");
INSERT INTO course VALUES ("Math 3263","Department of Mathematics", "3","Linear Algebra and Differential Equations");
INSERT INTO course VALUES ("Math 3303","Department of Mathematics", "3","Advance Perspectives on Functions and Modeling for Secondary Teachers");
INSERT INTO course VALUES ("Math 3403","Department of Mathematics", "3","Geometric Structures for Early Childhood and Elementary Teachers");
INSERT INTO course VALUES ("Math 3583","Department of Mathematics", "3","Introduction to Mathematical Modeling");
INSERT INTO course VALUES ("Math 3603","Department of Mathematics", "3","Mathematical Structure for Early Childhood and Elementary Teachers");
INSERT INTO course VALUES ("Math 3613","Department of Mathematics", "3","Introduction to Abstract Algebra");
INSERT INTO course VALUES ("Math 3890","Department of Mathematics", "3","Advance Honors Experience in Department of Mathematics");
INSERT INTO course VALUES ("Math 3910","Department of Mathematics", "3","Special Studies");
INSERT INTO course VALUES ("Math 3933","Department of Mathematics", "3","Research Methods");
INSERT INTO course VALUES ("Math 4003","Department of Mathematics", "3","Mathematical Logic and Computability");
INSERT INTO course VALUES ("Math 4013","Department of Mathematics", "3","Calculus of Several variables");
INSERT INTO course VALUES ("Math 4023","Department of Mathematics", "3","Introduction to Analysis");
INSERT INTO course VALUES ("Math 4033","Department of Mathematics", "3","History of Mathematics");
INSERT INTO course VALUES ("Math 4063","Department of Mathematics", "3","Advance Linear Algebra");
INSERT INTO course VALUES ("Math 4083","Department of Mathematics", "3","Intermediate Analysis");
INSERT INTO course VALUES ("Math 4143","Department of Mathematics", "3","Advance Calculus I");
INSERT INTO course VALUES ("Math 4153","Department of Mathematics", "3","Advance Calculus II");
INSERT INTO course VALUES ("Math 4233","Department of Mathematics", "3","Intermediate Differential Equations");
INSERT INTO course VALUES ("Math 4263","Department of Mathematics", "3","Introduction to Partial Differential Equations");
INSERT INTO course VALUES ("Math 4283","Department of Mathematics", "3","Complex Variables");
INSERT INTO course VALUES ("Math 4343","Department of Mathematics", "3","Introduction to Topology");
INSERT INTO course VALUES ("Math 4403","Department of Mathematics", "3","Geometry");
INSERT INTO course VALUES ("Math 4423","Department of Mathematics", "3","Geometry and Algorithms in Three-Dimensional Modeling");
INSERT INTO course VALUES ("Math 4453","Department of Mathematics", "3","Mathematical Interest Theory");
INSERT INTO course VALUES ("Math 4513","Department of Mathematics", "3","Numerical Analysis");
INSERT INTO course VALUES ("Math 4553","Department of Mathematics", "3","Introduction to Optimization");
INSERT INTO course VALUES ("Math 4590","Department of Mathematics", "3","Professional Practice in Mathematics");
INSERT INTO course VALUES ("Math 4603","Department of Mathematics", "3","Intermediate Abstract Algebra");
INSERT INTO course VALUES ("Marth 4613","Department of Mathematics", "3","Abstract Algebra I");
INSERT INTO course VALUES ("Math 4623","Department of Mathematics", "3","Abstract Algebra II");
INSERT INTO course VALUES ("Math 4663","Department of Mathematics", "3","Combinatorics");
INSERT INTO course VALUES ("Math 4713","Department of Mathematics", "3","Number Theory");
INSERT INTO course VALUES ("Math 4753","Department of Mathematics", "3","Introduction to Crytography");
INSERT INTO course VALUES ("Math 4813","Department of Mathematics", "3","Groups and Representations");
INSERT INTO course VALUES ("Math 4900","Department of Mathematics", "3","Undergraduate Research");
INSERT INTO course VALUES ("Math 4910","Department of Mathematics", "3","Special Studies");
INSERT INTO course VALUES ("Math 4950","Department of Mathematics", "3","Problem Solving Seminar");
INSERT INTO course VALUES ("Math 4973","Department of Mathematics", "3","Senior Project");
INSERT INTO course VALUES ("Math 4993","Department of Mathematics", "3","Senior Honors Thesis");


INSERT INTO professor VALUES('Esra Akbas', '3.3', '4','3');
INSERT INTO professor VALUES('Sadiq Al Buhamood', '0', '0','0');
INSERT INTO professor VALUES('Arunkumar Bagavathi', NULL, NULL,NULL);
INSERT INTO professor VALUES('Rekha Bhowmik', NULL, NULL,NULL);
INSERT INTO professor VALUES('J. Cecil', NULL, NULL,NULL);
INSERT INTO professor VALUES('John P. Chandler', NULL, NULL,NULL);
INSERT INTO professor VALUES('Christopher Crick', '4.5', '3.8','12');
INSERT INTO professor VALUES('H.K. Dai', '2.6', '4.5','40');
INSERT INTO professor VALUES('Douglas Heisterkamp', NULL, NULL,NULL);
INSERT INTO professor VALUES('Sachin Jain', '2.6', '3.6','7');
INSERT INTO professor VALUES('Shital Joshi', NULL, NULL,NULL);
INSERT INTO professor VALUES('Huizhu Lu', NULL, NULL,NULL);
INSERT INTO professor VALUES('Blayne Mayfield', '3.8', '3.6','27');
INSERT INTO professor VALUES('Nohpill Park', '2.4', '3.6','17');
INSERT INTO professor VALUES('Vishalini Ramnath', '0', '0','0');
INSERT INTO professor VALUES('M. H. Samadzadeh', NULL, NULL,NULL);
INSERT INTO professor VALUES('Rittika Shamsuddin', '1', '3','1');
INSERT INTO professor VALUES('Johnson Thomas', NULL, NULL,NULL);
INSERT INTO professor VALUES('Mahdi Asgari', '3.4', '3.5','31');
INSERT INTO professor VALUES('Leticia Barchini', '3.1', '3.9','20');
INSERT INTO professor VALUES('Birne Binegar', '3.6', '1.9','21');
INSERT INTO professor VALUES('Lee Ann Brown', NULL, NULL,NULL);
INSERT INTO professor VALUES('John Paul Cook', '4.3', '3.5','8');
INSERT INTO professor VALUES('Bruce Crauder', '4', '2.4','37');
INSERT INTO professor VALUES('Sean Curry', NULL, NULL,NULL);
INSERT INTO professor VALUES('Allison Dorko', '4.4', '2.5','8');
INSERT INTO professor VALUES('Detelin Dosev', '4', '3','60');
INSERT INTO professor VALUES('John Doyle', NULL, NULL,NULL);
INSERT INTO professor VALUES('Paul Fili', '4.8', '2.9','17');
INSERT INTO professor VALUES('Christopher Francisco', '5', '2.7','18');
INSERT INTO professor VALUES('Cythia Francisco', NULL, NULL,NULL);
INSERT INTO professor VALUES('Amit Ghosh', NULL, NULL,NULL);
INSERT INTO professor VALUES('Neil Hoffman', '3.5', '3.3','14');
INSERT INTO professor VALUES('Ning Ju', '1.5', '3.4','25');
INSERT INTO professor VALUES('Anthony Kable', '4.5', '2.5','29');
INSERT INTO professor VALUES('JaEun Ku', '2.2', '3.2','21');
INSERT INTO professor VALUES('Jiri Lebl', '2.1', '3.7','11');
INSERT INTO professor VALUES('Lisa Mantini', '4.1', '3','23');
INSERT INTO professor VALUES('Jeff Mermin', '3.3', '3.5','35');
INSERT INTO professor VALUES('Melisa Mills', NULL, NULL,NULL);
INSERT INTO professor VALUES('John Robert Myers', NULL, NULL,NULL);
INSERT INTO professor VALUES('Alan Noell', NULL, NULL,NULL);
INSERT INTO professor VALUES('Michael Oehrtman', NULL, NULL,NULL);
INSERT INTO professor VALUES('Anand Patel', '5', '3.4','10');
INSERT INTO professor VALUES('Igor Prtsker', NULL, NULL,NULL);
INSERT INTO professor VALUES('Edward Richmond', NULL, NULL,NULL);
INSERT INTO professor VALUES('Jay Schweig', '4.8', '2.8','23');
INSERT INTO professor VALUES('Henry Segerman', '3.5', '3.5','10');
INSERT INTO professor VALUES('Lucas M. Stolerman', NULL, NULL,NULL);
INSERT INTO professor VALUES('Michale Tallman', NULL, NULL,NULL);
INSERT INTO professor VALUES('Donna Rae Tree', NULL, NULL,NULL);
INSERT INTO professor VALUES('David Wright', NULL, NULL,NULL);
INSERT INTO professor VALUES('Jiahong Wu', '4.3', '2.7','17');
INSERT INTO professor VALUES('Xukai yan', NULL, NULL,NULL);
INSERT INTO professor VALUES('Xu Zhang', NULL, NULL,NULL);


