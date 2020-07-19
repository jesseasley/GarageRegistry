<?php
$servername = "45.40.164.103";
$username = "MyDB1138";
$password = "HeTaretEC2u!";
$dbname = "MyDB1138";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//get version of MySql
select version();

//get current user
select current_user();

//get rights of current user
show grants for current_user();

//GRANT USAGE ON *.* TO 'MyDB1138'@'%' IDENTIFIED BY PASSWORD <secret>

//GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK
//TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE ON `MyDB1138`.* TO
//'MyDB1138'@'%'

// sql to create table
$sql = "CREATE TABLE TrackMuse_Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
zipcode VARCHAR(50) not null,
password varchar(50) not null,
level varchar(50) default 'standard',
active varchar(1) default '1',
ts varchar(50) not null
)";

if ($conn->query($sql) === TRUE) {
    echo "Table TrackMuse_Users created successfully<br>";
} else {
    echo "Error creating TrackMuse_Users table: " . $conn->error . "<br>";
}

$sql = "CREATE TABLE TrackMuse_UserImages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
TMUserid int not null,
filename VARCHAR(250) not null,
project varchar(250) not null,
year varchar(4) not null,
make varchar(50) not null,
model varchar(100) not null,
trim varchar(100) not null,
built_by varchar(100) not null,
active varchar(1) default '1',
ts varchar(50) not null
)";

if ($conn->query($sql) === TRUE) {
    echo "Table TrackMuse_UserImages created successfully<br>";
} else {
    echo "Error creating TrackMuse_UserImages table: " . $conn->error . "<br>";
}

$sql = "create table TrackMuse_News(
id INT not null auto_increment primary key,
caption varchar(250),
link varchar(250),
source varchar(250),
imagePath varchar(250),
active int default '1',
ts varchar(50)
);
";

insert into TrackMuse_News (caption, link, source, imagepath, active)
values ('Volkswagon Considers Selling Ducati', 'javascript:void(0);', 'Road & Track', 'images/ducati.jpg', 1);
insert into TrackMuse_News (caption, link, source, imagepath, active)
values ('BMW M8 is coming but it probably wont have a V12', 'javascript:void(0);', 'autoblog.com', 'images/m8.jpg', 1);
insert into TrackMuse_News (caption, link, source, imagepath, active)
values ('Takumo Sato is the first Japanese driver to win the Indy 500', 'javascript:void(0);', 'autoblog.com', 'images/sato.jpg', 1);
insert into TrackMuse_News (caption, link, source, imagepath, active)
values ('This is the craziest Indy 500 crash weve ever seen', 'javascript:void(0);', 'Road & Track', 'images/crash.jpg', 1);

drop table TrackMuse_StockImages;
CREATE TABLE TrackMuse_StockImages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
filename VARCHAR(250) not null,
title varchar(250),
active varchar(1) default '1',
ts varchar(50) not null
);

insert into TrackMuse_StockImages (filename, title, active,ts) values ('1948-Ford-pickup-main.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('2012-lamborghini-aventador.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('3726491-auto-wallpapers-hd.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('4mk3chassis.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('69976d77eb7fb01530f673f490d4ab94.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('70_MG-2.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('aak.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('Autocross 5 Lotus.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('bmw.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('ev-west-m3-and-818-side-1.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('ferrari.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('ff coupe.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('GTMinfront-water.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('HomepageBackground.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('images.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('Jaguar-F-Type-2018-1280-04.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('jeff-cooper-106565.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('kace-rodriguez-75513.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('landroaver.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('Porsche-930_Turbo-1980-1280.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('thumb-350-639360.png', '', '1','');

drop table TrackMuse_TitleImages;
create table TrackMuse_TitleImages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
filename varchar(250),
title varchar(250),
location varchar(50),
active varchar(1));

insert into TrackMuse_TitleImages (filename, title, location, active) values ('2018JaguarF.jpg', '2018 Jaquar F-Type', 'Home', '1');
insert into TrackMuse_TitleImages (filename, title, location, active) values ('KitCar.jpg', 'Kit Car', 'Home', '1');

drop table TrackMuse_HomePageImages;
create table TrackMuse_HomePageImages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
filename varchar(250),
active varchar(1));
insert into TrackMuse_HomePageImages (filename, active) values ('HomepageBackground1.jpg', '1');
insert into TrackMuse_HomePageImages (filename, active) values ('4mk3chassis.jpg', '1');
select * from TrackMuse_HomePageImages;

grant update on mydb1138.TrackMuse_News to MyDB1138;
grant update on mydb1138.TrackMuse_Users to MyDB1138;
grant update on mydb1138.TrackMuse_UserImages to MyDB1138;
grant update on mydb1138.TrackMuse_StockImages to MyDB1138;
grant update on mydb1138.TrackMuse_TitleImages to MyDB1138;

drop table TrackMuse_Forum;
create table TrackMuse_Forum (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
TMUserID int,
parentObject varchar(50),
parentID int,
title VARCHAR(250) not null,
message longtext,
projectID int,
active varchar(1) default '1',
ts varchar(50) not null
);
grant update on mydb1138.TrackMuse_Forum to MyDB1138;

insert into TrackMuse_Forum (TMUserID, parentObject, parentID, title, message, projectID, active, ts)
values (1, 'Forum', null, 'General', 'test message 1' , -1, '1', '');
insert into TrackMuse_Forum (TMUserID, parentObject, parentID, title, message, projectID, active, ts)
values (1, 'Forum', null, 'Off Topic', 'test message 2' , -1, '1', '');
insert into TrackMuse_Forum (TMUserID, parentObject, parentID, title, message, projectID, active, ts)
values (2, 'Forum', 1, 'general response', 'test message 3' , -1, '1', '');
insert into TrackMuse_Forum (TMUserID, parentObject, parentID, title, message, projectID, active, ts)
values (1, 'Project', null, 'project post', 'test message 4' , 1, '1', '');
select * from TrackMuse_Forum;
delete from TrackMuse_Forum where id = 2;

drop table TrackMuse_UserProjects;
create table TrackMuse_UserProjects (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
TMUserID int,
name varchar(250),
description text,
year varchar(50),
make varchar(50),
model varchar(50),
trim varchar(50),
builtby varchar(50),
active varchar(1),
ts varchar(50));
grant update on mydb1138.TrackMuse_UserProjects to MyDB1138;

insert into TrackMuse_UserProjects
(TMuserid,name,description,year,make,model,trim,builtby,active,ts)
values ('1','17 Mustang','This is a 2017 Mustang','2017','Ford','Mustang','Coupe','Jess built this','1','');
insert into TrackMuse_UserProjects
(TMuserid,name,description,year,make,model,trim,builtby,active,ts)
values ('1','65 Mustang','','1965','Ford','Mustang','','','1','');
insert into TrackMuse_UserProjects
(TMuserid,name,description,year,make,model,trim,builtby,active,ts)
values ('1','66 Camaro','','1966','Chevy','Camaro','','','1','');
select * from TrackMuse_UserProjects;

$conn->close();
?>