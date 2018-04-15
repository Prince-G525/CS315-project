CREATE TABLE auto(
	id CHAR(10) PRIMARY KEY,
	name CHAR(20) NOT NULL,
	type CHAR(10) NOT NULL,
	afrom CHAR(20) NOT NULL,
	ato CHAR(20) NOT NULL,
	contact CHAR(10) ,
	email CHAR(20) ,
	cap INT NOT NULL
);

CREATE TABLE traveller(
	name CHAR(20) NOT NULL,
	gender CHAR(6) ,
	contact CHAR(10) NOT NULL,
	dob CHAR(20) ,
	address CHAR(30) ,
	email CHAR(20),
	PRIMARY KEY(name, contact)
);

CREATE TABLE request(
	name CHAR(20) NOT NULL,
	contact CHAR(10) NOT NULL,
	pickfrom CHAR(20) NOT NULL,
	type CHAR(10) NOT NULL,
	route CHAR(40) NOT NULL,
	dat CHAR(20) NOT NULL,
	time CHAR(20) NOT NULL,
	nop INT NOT NULL,
	FOREIGN KEY(name,contact) REFERENCES traveller(name,contact)
);

CREATE TABLE book_status(
	name CHAR(20) NOT NULL,
	contact CHAR(10) NOT NULL,
	id CHAR(10) NOT NULL,
	nop INT NOT NULL,
	tim CHAR(20) NOT NULL,
	dat CHAR(20) NOT NULL,
	FOREIGN KEY(name,contact) REFERENCES traveller(name,contact),
	FOREIGN KEY(id) REFERENCES auto(id)
);

CREATE TABLE auto_full(
	id CHAR(10) NOT NULL,
	nop INT NOT NULL,
	dat CHAR(20) NOT NULL,
	tim CHAR(20) NOT NULL,
	PRIMARY KEY(id,tim)
);

CREATE INDEX ano ON book_status(id);
