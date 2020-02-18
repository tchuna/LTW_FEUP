pragma foreign_keys = off;	--force referential integrity

drop table if exists USER;
drop table if exists LIST;
drop table if exists ITEM;
drop table if exists PROJECT;
drop table if exists PROJECT_USER;

--schema
create table USER (
	userID integer primary key autoincrement,
	username varchar unique not null,
	email varchar unique not null,
	name varchar not null,
	birthdate date not null,		--YYYY-MM-DD
	location varchar not null,
	password varchar not null
);

create table LIST (
	listID integer primary key autoincrement,
	name varchar not null,
	public integer not null,
	category varchar not null,
	date_due date not null,
	userID integer,
	projID integer,
	constraint user_fkey foreign key (userID) references USER,
	constraint proj_fkey foreign key (projID) references PROJ
);

create table ITEM (
	itemID integer primary key autoincrement,
	content varchar,
	image varchar,
	checked integer not null,
	listID integer not null,
	constraint list_fkey foreign key (listID) references LIST
);

create table PROJECT (
	projID integer primary key autoincrement,
	description varchar not null,
	date_due date
);

create table PROJECT_USER (
	idUser integer,
	idProj integer,
	primary key (idUser, idProj),
	constraint user_fkey foreign key (idUser) references USER,
	constraint proj_fkey foreign key (idProj) references PROJ
);

--triggers
create trigger if not exists DELETE_ITEMS
after delete on LIST for each row begin
delete from ITEM where ITEM.listID = Old.listID;


--initial data
insert into USER values (NULL,
						"username1",
						"aaa@fe.up.pt",
						"Aaa Aaa",
						"1997-1-1",
						"Porto",
					 	"011c945f30ce2cbafc452f39840f025693339c42");	--pass = 1111
insert into USER values (NULL,
						"username2",
						"bbb@fe.up.pt",
						"Bbb Bbb",
						"1997-2-2",
						"Lisboa",
					 	"fea7f657f56a2a448da7d4b535ee5e279caf3d9a");	--pass = 2222
insert into USER values (NULL,
						"username3",
						"ccc@fe.up.pt",
						"Ccc Ccc",
						"1997-3-3",
						"Madrid",
					 	"f56d6351aa71cff0debea014d13525e42036187a");	--pass = 3333
insert into USER values (NULL,
						"username4",
						"ddd@fe.up.pt",
						"Ddd Ddd",
						"1997-4-4",
						"Porto",
					 	"92f2fd99879b0c2466ab8648afb63c49032379c1");	--pass = 4444

insert into LIST values (NULL, "list1", 0, "catA", "2017-12-30", 1, NULL);
insert into LIST values (NULL, "list2", 0, "catA", "2017-12-30", 1, NULL);
insert into LIST values (NULL, "list3", 0, "catB", "2017-12-30", 2, NULL);
insert into LIST values (NULL, "list4", 0, "catB", "2017-12-30", 2, NULL);
insert into LIST values (NULL, "list5", 0, "catB", "2017-12-30", 3, NULL);
insert into LIST values (NULL, "list6", 0, "catC", "2017-12-30", 3, NULL);
insert into LIST values (NULL, "list7", 0, "catC", "2017-12-30", 4, NULL);
insert into LIST values (NULL, "list8", 0, "catC", "2017-12-30", 4, NULL);
insert into LIST values (NULL, "list9", 1, "catA", "2017-12-30", 1, 1);
insert into LIST values (NULL, "list10", 1, "catA", "2017-12-30", 1, 1);
insert into LIST values (NULL, "list11", 1, "catC", "2017-12-30", 2, 1);
insert into LIST values (NULL, "list12", 1, "catB", "2017-12-30", 2, 2);
insert into LIST values (NULL, "list13", 1, "catB", "2017-12-30", 3, 2);
insert into LIST values (NULL, "list14", 1, "catC", "2017-12-30", 3, 2);
insert into LIST values (NULL, "list15", 1, "catA", "2017-12-30", 4, 2);


insert into PROJECT values (NULL,
							"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat eros eu elementum egestas. Curabitur.",
							"2017-12-30");
insert into PROJECT values (NULL,
							"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras feugiat ante nulla, ut suscipit est.",
							"2017-12-30");
insert into PROJECT values (NULL,
							"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eros quam, imperdiet gravida dolor nec.",
							"2017-12-30");

insert into PROJECT_USER values (1, 1);
insert into PROJECT_USER values (1, 2);
insert into PROJECT_USER values (2, 1);
insert into PROJECT_USER values (2, 2);
insert into PROJECT_USER values (3, 3);

insert into ITEM values (NULL, "Some content", "image1", 0, 1);
insert into ITEM values (NULL, "Some content", "image2", 0, 1);
insert into ITEM values (NULL, "Some content", "image3", 0, 1);
insert into ITEM values (NULL, "Some content", "image4", 0, 2);
insert into ITEM values (NULL, "Some content", "image5", 0, 2);
insert into ITEM values (NULL, "Some content", "image6", 0, 2);
insert into ITEM values (NULL, "Some content", "image7", 0, 3);
insert into ITEM values (NULL, "Some content", "image8", 0, 3);
insert into ITEM values (NULL, "Some content", "image9", 0, 3);
insert into ITEM values (NULL, "Some content", "image10", 0, 4);
insert into ITEM values (NULL, "Some content", NULL, 0, 4);
insert into ITEM values (NULL, "Some content", NULL, 0, 4);
insert into ITEM values (NULL, "Some content", NULL, 0, 5);
insert into ITEM values (NULL, "Some content", NULL, 0, 5);
insert into ITEM values (NULL, "Some content", NULL, 0, 5);
insert into ITEM values (NULL, "Some content", NULL, 0, 6);
insert into ITEM values (NULL, "Some content", NULL, 0, 6);
insert into ITEM values (NULL, "Some content", NULL, 0, 6);
insert into ITEM values (NULL, "Some content", NULL, 0, 7);
insert into ITEM values (NULL, "Some content", NULL, 0, 7);
insert into ITEM values (NULL, "Some content", NULL, 0, 7);
insert into ITEM values (NULL, "Some content", NULL, 0, 8);
insert into ITEM values (NULL, "Some content", NULL, 0, 8);
insert into ITEM values (NULL, "Some content", NULL, 0, 8);
insert into ITEM values (NULL, "Some content", NULL, 0, 9);
insert into ITEM values (NULL, "Some content", NULL, 0, 9);
insert into ITEM values (NULL, "Some content", NULL, 0, 9);
insert into ITEM values (NULL, "Some content", NULL, 0, 10);
insert into ITEM values (NULL, "Some content", NULL, 0, 10);
insert into ITEM values (NULL, "Some content", NULL, 0, 10);
insert into ITEM values (NULL, "Some content", NULL, 0, 11);
insert into ITEM values (NULL, "Some content", NULL, 0, 11);
insert into ITEM values (NULL, "Some content", NULL, 0, 11);
insert into ITEM values (NULL, "Some content", NULL, 0, 12);
insert into ITEM values (NULL, "Some content", NULL, 0, 12);
insert into ITEM values (NULL, "Some content", NULL, 0, 12);
insert into ITEM values (NULL, "Some content", NULL, 0, 13);
insert into ITEM values (NULL, "Some content", NULL, 0, 13);
insert into ITEM values (NULL, "Some content", NULL, 0, 13);
insert into ITEM values (NULL, "Some content", NULL, 0, 14);
insert into ITEM values (NULL, "Some content", NULL, 0, 14);
insert into ITEM values (NULL, "Some content", NULL, 0, 14);
insert into ITEM values (NULL, "Some content", NULL, 0, 15);
insert into ITEM values (NULL, "Some content", NULL, 0, 15);
insert into ITEM values (NULL, "Some content", NULL, 0, 15);
