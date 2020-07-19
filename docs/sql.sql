use mydb1138;
drop table trackmuse_userimages;
CREATE TABLE TrackMuse_UserImages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
TMUserid int not null,
filename VARCHAR(250) not null,
project varchar(250) not null,
year varchar(4) not null,
make varchar(50) not null,
model varchar(100) not null,
trim varchar(100) not null,
built_by varchar(100) null,
active varchar(1) default '1',
ts varchar(50) not null
);
insert into trackmuse_userimages (tmuserid, filename,project,year,make,model,trim,built_by,active,ts) values (1, '70_MG-2.jpg','','','','','','','1','');
insert into trackmuse_userimages (tmuserid, filename,project,year,make,model,trim,built_by,active,ts) values (1, '2012-lamborghini-aventador.jpg','','','','','','','1','');
insert into trackmuse_userimages (tmuserid, filename,project,year,make,model,trim,built_by,active,ts) values (2, 'bmw.jpg','','','','','','','1','');
select * from trackmuse_userimages;
update trackmuse_userimages set project = 'Aventador' where id=2;
drop table TrackMuse_TitleImages;
create table TrackMuse_TitleImages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
filename varchar(250),
title varchar(250),
location varchar(50),
active varchar(1));
insert into TrackMuse_TitleImages (filename, title, location, active) values ('2018JaguarF.jpg', '2018 Jaquar F-Type', 'Home', '1');
insert into TrackMuse_TitleImages (filename, title, location, active) values ('KitCar.jpg', 'Kit Car', 'Home', '1');
select * from TrackMuse_TitleImages;
delete from TrackMuse_TitleImages where id > 2;
grant update on mydb1138.TrackMuse_TitleImages to MyDB1138;

update trackmuse_users set password = md5(password) where id>0;

drop table trackmuse_users;
CREATE TABLE TrackMuse_Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
zipcode VARCHAR(50) not null,
password varchar(50) not null,
level varchar(50) default 'standard',
imagePath varchar(250),
active varchar(1) default '1',
ts varchar(50) not null,
coverphoto varchar(250)
);
grant update on mydb1138.TrackMuse_Users to MyDB1138;
insert into TrackMuse_Users (email, imagePath, username, zipcode, password, ts, level, active) values
('jess@jesseasley.com', 'jess.jpg', 'Jess','12345',md5('pass'), '', 'admin', '1');
insert into TrackMuse_Users (email, imagePath, username, zipcode, password, ts, level, active) values
('jecri1234@aol.com', 'cris.jpg', 'Cris','12345',md5('pass'), '', 'standard', '1');
select * from trackmuse_users;
update trackmuse_users set imagepath = '' where id = 1;

update TrackMuse_Users set level = 'admin' where id = 1;
update TrackMuse_Users set imagepath = 'jess.jpg' where id = 1;
update TrackMuse_Users set coverphoto = 'aac.jpg' where id  =1;

drop table TrackMuse_StockImages;
CREATE TABLE TrackMuse_StockImages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
filename VARCHAR(250) not null,
title varchar(250),
active varchar(1) default '1',
ts varchar(50) not null
);

insert into TrackMuse_StockImages (filename, title, active,ts) values ('1948-Ford-pickup-main.jpg', '', '1','');
insert into TrackMuse_StockImages (filename, title, active,ts) values ('2012-lamborghini-aventador.jpg', 'Lambo', '1','');
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

select * from TrackMuse_UserImages;
delete from TrackMuse_UserImages where id > 3;
select * from trackmuse_news;
delete from trackmuse_news where id > 8;


insert into TrackMuse_News (caption, link, source, imagepath, active)
values ('Volkswagon Considers Selling Ducati', 'javascript:void(0);', 'Road & Track', 'images/ducati.jpg', 1);
insert into TrackMuse_News (caption, link, source, imagepath, active)
values ('BMW M8 is coming but it probably wont have a V12', 'javascript:void(0);', 'autoblog.com', 'images/m8.jpg', 1);
insert into TrackMuse_News (caption, link, source, imagepath, active)
values ('Takumo Sato is the first Japanese driver to win the Indy 500', 'javascript:void(0);', 'autoblog.com', 'images/sato.jpg', 1);
insert into TrackMuse_News (caption, link, source, imagepath, active)
values ('This is the craziest Indy 500 crash weve ever seen', 'javascript:void(0);', 'Road & Track', 'images/crash.jpg', 1);


drop table TrackMuse_Forum;
create table TrackMuse_Forum (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
TMUserID int,
parentObject varchar(50),
parentID varchar(20),
title VARCHAR(250) not null,
message longtext,
projectID varchar(5),
active varchar(1) default '1',
ts varchar(50) not null
);
grant update on mydb1138.TrackMuse_Forum to MyDB1138;
insert into TrackMuse_Forum (TMUserID, parentObject, parentID, title, message, active, ts, projectID)
values (1, 'Forum', '', 'General', 'test message 1' , '1', '', '-1');
insert into TrackMuse_Forum (TMUserID, parentObject, parentID, title, message, active, ts, projectID)
values (1, 'Forum', '', 'Off Topic', 'test message 2' , '1', '', '-1');
insert into TrackMuse_Forum (TMUserID, parentObject, parentID, title, message, active, ts, projectID)
values (2, 'Forum', '1', 'child test 1', 'test message 3' , '1', '', '-1');
insert into TrackMuse_Forum (TMUserID, parentObject, parentID, title, message, active, ts, projectID)
values (1, 'Project', '0', 'project test 1', 'test message 1' , '1', '', '1');
select * from TrackMuse_Forum;
delete from TrackMuse_Forum where id > 3;
update TrackMuse_Forum set parentid='0' where id=4;


select f.id, u.username, f.parentID, f.title, f.message 
from TrackMuse_Users u
join TrackMuse_Forum f on u.id = f.TMUserID
where f.parentObject = 'Forum' and f.active = '1' and f.parentID is null;

select * from trackmuse_titleimages;
insert into trackmuse_titleimages
(filename, title, location, active)
values ('aac.jpg', 'Corvette', 'Home', '1');

select f.id, u.username, u.imagePath, f.parentObject, f.parentID, f.title, f.message, f.TMUserID, f.active,
(select count(*) from TrackMuse_Forum where parentID = f.id and active='1') children
from TrackMuse_Users u 
join TrackMuse_Forum f on u.id = f.TMUserID 
where f.parentObject = 'Forum' and f.active = '1';

drop table TrackMuse_UserProjects;
create table TrackMuse_UserProjects (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
TMUserID int,
name varchar(250),
description text,
year varchar(4),
make varchar(50),
model varchar(100),
trim varchar(100),
builtBy varchar(250),
active varchar(1) default '1',
ts varchar(50) not null
);
grant update on mydb1138.TrackMuse_UserProjects to MyDB1138;
insert into TrackMuse_UserProjects 
(TMUserID, name, description, year, make, model, trim, builtBy, active, ts)
values
(1, 'Mustang','This is a 2017 Mustang','2017','Ford','Mustang','Coupe','Built by Jess','1','');
insert into TrackMuse_UserProjects 
(TMUserID, name, description, year, make, model, trim, builtBy, active, ts)
values
(1, '65 Mustang','','1965','Ford','Mustang','','','1','');
insert into TrackMuse_UserProjects 
(TMUserID, name, description, year, make, model, trim, builtBy, active, ts)
values
(1, '66 Camaro','','1966','Chevy','Camaro','','','1','');

select * from TrackMuse_UserProjects;

drop table TrackMuse_UserProjectImages;
create table TrackMuse_UserProjectImages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
projectid int not null,
filename varchar(250),
title varchar(250),
description text,
coverphoto varchar(1),
active varchar(1) default '1',
ts varchar(50) not null
);
grant update on mydb1138.TrackMuse_UserProjectImages to MyDB1138;
insert into TrackMuse_UserProjectImages 
(projectid, filename, title, description, coverphoto, active, ts)
values
('1','frontview.jpg','Front View','This is the front view of the 2017 Mustang','1','1','');
insert into TrackMuse_UserProjectImages 
(projectid, filename, title, description, coverphoto, active, ts)
values
('1','console.jpg','Console','','0','1','');
insert into TrackMuse_UserProjectImages 
(projectid, filename, title, description, coverphoto, active, ts)
values
('1','engine.jpg','Engine Compartment','','0','1','');
insert into TrackMuse_UserProjectImages 
(projectid, filename, title, description, coverphoto, active, ts)
values
('2','65mustang.jpg','65 Mustang','','1','1','');
select * from TrackMuse_UserProjectImages;

drop table TrackMuse_UserProjectParts;
create table TrackMuse_UserProjectParts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
projectid int not null,
filename varchar(250),
title varchar(250),
description text,
pricepaid varchar(50),
vendorlink varchar(250),
active varchar(1) default '1',
ts varchar(50) not null
);
grant update on mydb1138.TrackMuse_UserProjectParts to MyDB1138;
insert into TrackMuse_UserProjectParts 
(projectid, filename, title, description, pricepaid, vendorlink, active, ts)
values
('1','rims.jpg','Rims','','328.00','https://performanceparts.ford.com/part/M-1007-M1995B','1','');
insert into TrackMuse_UserProjectParts 
(projectid, filename, title, description, pricepaid, vendorlink, active, ts)
values
('1','enginecover.jpg','Engine Cover','','399.00','http://www.stage3motorsports.com/TC10026-LG220-2015-Mustang-GT-5-0L-TruFiber-Carbon-Fiber-Engine-Cover.html','1','');
insert into TrackMuse_UserProjectParts 
(projectid, filename, title, description, pricepaid, vendorlink, active, ts)
values
('1','airintake.jpg','Air Intake','','379.95','https://www.steeda.com/steeda-proflow-mustang-cold-air-intake-tune-required-2015-gt-555-3194.html','1','');
insert into TrackMuse_UserProjectParts 
(projectid, filename, title, description, pricepaid, vendorlink, active, ts)
values
('1','brakes.png','Brakes','','4595.00','https://www.americanmuscle.com/brembo-gt-front-brake-kit-drilled-red-2015.html','1','');
insert into TrackMuse_UserProjectParts 
(projectid, filename, title, description, pricepaid, vendorlink, active, ts)
values
('1','chicks.jpg','Chicks','','Priceless','http://www.stage3motorsports.com/assets/images/Blog%20Images/Alejandros%2050L%20with%20Model/AlejandrosMustangEdited15.jpg','1','');

select * from TrackMuse_UserProjectParts;

/*sql to get a whole project's worth of data*/
select up.id, up.name, up.description, up.year, up.make, up.model, up.trim, up.builtby, up.active, 
ifnull(u.imagePath, '') imagePath, u.coverphoto, u.id userID 
from TrackMuse_UserProjects up
join TrackMuse_Users u on u.id = up.TMUserID 
where up.id = 4 and up.TMUserID = 12;

/*sql to get the list of projects for a user*/
select id, name, description, year, make, model, trim, builtby, active, 
(select filename from TrackMuse_UserProjectImages where projectid = pr.id and coverphoto='1') 
leadimage, 
(select count(*) from TrackMuse_UserProjectImages where projectid = pr.id) imagecount, 
(select count(*) from TrackMuse_UserProjectParts where projectid = pr.id) partcount 
from TrackMuse_UserProjects pr 
where TMUserID = 1;

/*get the list of pictures for the main photos page*/
select id, filename, concat('images/autos/', filename) fullpath, title, '' description, '' projectID from TrackMuse_StockImages where active = '1'
union all 
select id, filename, concat('images/projects/', filename) fullpath, title, description, projectid from TrackMuse_UserprojectImages where active = '1' and coverphoto = '1';


select id, filename, project, active from TrackMuse_UserImages where active = '1'
;

select * from TrackMuse_UserprojectsImages;
select * from TrackMuse_StockImages;

select upi.id, upi.filename, concat('images/projects/', upi.filename) fullpath, 
up.name title, upi.description, upi.projectID 
from TrackMuse_UserProjectImages upi 
join TrackMuse_UserProjects up on up.id = upi.projectid
where upi.active = '1' and upi.coverphoto = '1';

select 'pic' tbl, upi.id, filename, concat('Project: ', up.name, '\nPicture: ', upi.title) title from TrackMuse_UserProjectImages upi 
join TrackMuse_UserProjects up on up.id = upi.projectid
where up.TMUserID = 1
union all
select 'part' tbl, upp.id, filename, concat('Project: ', up.name, '\nPicture: ', upp.title) title from TrackMuse_UserProjectParts upp 
join TrackMuse_UserProjects up on up.id = upp.projectid
where up.TMUserID = 1;

select * from TrackMuse_UserProjectParts;

select 
	u.id user_id,
    u.username user, 
    up.id proj_id,
    up.name project,
    upi.id img_id,
    upi.filename img_file,
    upi.title img_title,
    upi.coverphoto cover,
    upi.active img_active,
    upp.id prt_id,
    upp.filename prt_file,
    upp.title prt_title,
    upp.active prt_active
from TrackMuse_Users u
left join TrackMuse_UserProjects up on up.TMUserID = u.id
left join TrackMuse_UserProjectImages upi on upi.projectid = up.id
left join TrackMuse_UserProjectParts upp on upp.projectid = up.id;

drop table TrackMuse_Log;
create table TrackMuse_Log(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
log_date varchar(50),
log_entry text);
grant update on mydb1138.TrackMuse_Log to MyDB1138;
select * from TrackMuse_Log;

select * from TrackMuse_UserProjectParts;
delete from TrackMuse_UserProjectParts where id > 5;

select * from TrackMuse_UserProjects;
update TrackMuse_UserProjects set description = '' where id=2


