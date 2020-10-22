create table if not exists users (
u_id int NOT NULL AUTO_INCREMENT,
firstname varchar(255),
lastname varchar(255),
email varchar (255),
password varchar(255),
role int,
primary key(u_id)
);

create table if not exists dienstplan2020 (
line_id int NOT NULL AUTO_INCREMENT,
date date,
fi_1 int,
fi_2 int,
winch int,
flightcontroller int,
catering int,
primary key(line_id),
foreign key (fi_1) references users (u_id),
foreign key (fi_2) references users (u_id),
foreign key (winch) references users (u_id),
foreign key (flightcontroller) references users (u_id),
foreign key (catering) references users (u_id)
);

create table if not exists arbeitsstunden (
au_id int NOT NULL AUTO_INCREMENT,
worker int,
title varchar(255),
date date,
units int,
primary key(au_id),
foreign key (worker) references users (u_id)
);

INSERT INTO users (u_id, firstname, lastname, email, password, role) VALUES (1, 'Miro', 'Bögershausen', 'miro@miro.de', 'pw', 2);
INSERT INTO users (u_id, firstname, lastname, email, password, role) VALUES (2, 'Jona', 'Beckmann', 'jona@jona.de', 'pw', 2);
INSERT INTO users (u_id, firstname, lastname, email, password, role) VALUES (3, 'Merlin', 'Bögershausen', 'merlin@merlin.de', 'pw', 1);
INSERT INTO users (u_id, firstname, lastname, email, password, role) VALUES (4, 'Stefan', 'Hauke', 'hauke@hauke.de', 'pw', 1);
INSERT INTO users (u_id, firstname, lastname, email, password, role) VALUES (5, 'Michael', 'Bögershausen', 'michael@michael.de', 'pw', 3);
INSERT INTO users (u_id, firstname, lastname, email, password, role) VALUES (6, 'Horst', 'Blomberg', 'miro@miro.de', 'pw', 3);
INSERT INTO users (u_id, firstname, lastname, email, password, role) VALUES (7, 'Nick', 'Holtmann', 'miro@miro.de', 'pw', 4);
INSERT INTO users (u_id, firstname, lastname, email, password, role) VALUES (8, 'Mert', 'Ayküz', 'miro@miro.de', 'pw', 4);

INSERT INTO dienstplan2020 (date, fi_1, fi_2, winch, flightcontroller, catering) VALUES (2020-10-22, 3, 4, 1, 5, 7);
INSERT INTO dienstplan2020 (date, fi_1, fi_2, winch, flightcontroller, catering) VALUES (2020-11-15, 4, 3, 2, 6, 8);