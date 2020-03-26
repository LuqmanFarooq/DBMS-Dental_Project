Drop database if exists project;
Show databases;
create database project CHARACTER SET utf8 COLLATE UTF8_GENERAL_CI ;
Use project;

Drop table if exists appointment;

-- creating appointment table
create table appointment (
  apointno tinyint unsigned NOT NULL auto_increment ,
  patno Int(6) unsigned zerofill,  
  patname varchar(45) NOT NULL, -- maximum column length is 45 characters
  apt_madeby ENUM ('on-line', 'post', 'phoning','dropping in') Not Null,  -- default value is first element in list
  appointmentdate date not null,
  PRIMARY KEY (apointno)
  )Engine=InnoDB;
  
-- inserting data into appointment table
select * from appointment;
Insert into appointment values (01,7369, 'Alen', 'on-line', '2020-05-17'), (02,7499, 'Mark', 'post','2020-05-18'),(03,7521, 'Peter', 'phoning','2020-05-19'),(04, 7566,'Alice', 'dropping in','2020-05-20');
ALTER TABLE appointment
ADD FOREIGN KEY (patno) REFERENCES patient(patno);


Drop table if exists patient;

create table patient (
  patno Int(6) unsigned zerofill auto_increment, -- see Numbers.sql next week
  title ENUM ('Mr.', 'Mrs.', 'Miss.', 'Ms.','Dr.','Fr.','Rev.'), --  constraint on values entered into the column, default value is first element in list, if wrong data entered MySQL truncates the illegal value to  ' ' (an empty string).
  patientname varchar(45) not null,
  doctor varchar(45) not null default 'Dr Mary Mulcahy',
  picture LONGBLOB DEFAULT NULL,           # Picture in DATABASE as BLOB (up to 4.2GB)
  picture_path varchar(20) DEFAULT NULL,   # Path to where picture is stored in file system,
  primary key (patno)
)  Engine=InnoDB;

INSERT INTO patient (patno, title, patientname, doctor,picture,picture_path) VALUES
(7369, 'Ms.','Alen', 'Dr Mary Mulcahy', load_file('c:/patients/avatar3.jpg'),'/avatar3.jpg'),
(7499, 'Mr.','Mark', 'Specialist', load_file('c:/patients/avatar1.jpg'),'/avatar1.jpg'),
(7521, 'Mr.','Peter', 'Dr Mary Mulcahy', load_file('c:/patients/avatar2.jpg'),'/avatar2.jpg'),
(7566, 'Ms.','Alice', 'Dr Mary Mulcahy', load_file('c:/patients/avatar4.jpg'),'/avatar4.jpg');

	
Drop table if exists payment;

-- creating payment table
create table payment (
  payment_id tinyint unsigned NOT NULL auto_increment ,
  patno Int(6) unsigned zerofill,  
  paidby ENUM ('online', 'cheque', 'credit card', 'cash', 'post','dropping in') Not Null,  -- default value is first element in list
  dateofpayment date not null,
  amount Int(6) unsigned zerofill,
  PRIMARY KEY (payment_id)
  )Engine=InnoDB;
ALTER TABLE payment
ADD FOREIGN KEY (patno) REFERENCES patient(patno); 
-- inserting data into payment table
select * from payment;
Insert into payment values (0111,7369, 'online', '2020-05-17','500'), (0112,7499, 'post','2020-05-18','300'),(0113,7521, 'cash','2020-05-19','700'),(0114, 7566, 'dropping in','2020-05-20','1200');

Drop table if exists bill;

-- creating bill table
create table bill (
  invoice_no int unsigned NOT NULL auto_increment ,
  patno Int(6) unsigned zerofill,  
  unpaid_treatments Int(2) unsigned zerofill,
  late_cancellations Int(2) unsigned zerofill,
  total DECIMAL(6,2) unsigned,# 6 is the total number of digits and 2 is the number of digits after the decimal point, values that can be stored in the salary column range from -9999.99 to 9999.99,
  PRIMARY KEY (invoice_no)
  )Engine=InnoDB;
ALTER TABLE bill
ADD FOREIGN KEY (patno) REFERENCES patient(patno); 
-- inserting data into bill table
select * from bill;
Insert into bill values (999,7369, 2, 1,2000), (998,7499, 0,0,1100),(997,7521, 1,2,2700),(996, 7566, 4,2,4000);

Drop table if exists treatment;;
-- creating treatment table
create table treatment (
  treat_id int unsigned NOT NULL auto_increment ,
  patno Int(6) unsigned zerofill,
  treatment_name varchar(45),  
  fees DECIMAL(6,2) unsigned,# 6 is the total number of digits and 2 is the number of digits after the decimal point, values that can be stored in the salary column range from -9999.99 to 9999.99,
  followup_Treat varchar(45),
  xray LONGBLOB DEFAULT NULL,           # Picture in DATABASE as BLOB (up to 4.2GB)
  xray_path varchar(20) DEFAULT NULL,   # Path to where picture is stored in file system,
  PRIMARY KEY (treat_id)
  )Engine=InnoDB;
ALTER TABLE treatment
ADD FOREIGN KEY (patno) REFERENCES patient(patno); 
-- inserting data into bill table
select * from treatment;
Insert into treatment values (1234,7369,'General CheckUp', 800, 'required',load_file('c:/patients/xray1.jpg'),'/xray1.jpg'),
(1235,7499,'Root canal',1000,'not required',load_file('c:/patients/xray2.jpg'),'/xray2.jpg'),
(1236,7521,'Surgery', 1300,'required',load_file('c:/patients/xray3.jpg'),'/xray3.jpg'),
(1237, 7566,'Braces Alignment', 2200,'required',load_file('c:/patients/xray4.jpg'),'/xray4.jpg');

Drop table if exists specialist;
-- creating specialist table
create table specialist (
  specialist_id int unsigned NOT NULL auto_increment ,
  patno Int(6) unsigned zerofill,  
  specialistname varchar(45) not null,
  PRIMARY KEY (specialist_id)
  )Engine=InnoDB;
ALTER TABLE specialist
ADD FOREIGN KEY (patno) REFERENCES patient(patno); 

Insert into specialist values (0101,7369, 'Dr Murphy'),
(0102,7499,'Dr Murphy'),
(0103,7521,'Dr Noor'),
(0104, 7566,'Dr Murphy');


-- Queries
select patno,title,patientname,doctor from patient;

update patient set fees = 3000 where patno = 1;

delete from patient where patientname = 'Peter';

