CREATE TABLE auto(
	id CHAR(10) PRIMARY KEY,
	name CHAR(20) NOT NULL,
	type CHAR(10) NOT NULL,
	afrom CHAR(20) NOT NULL,
	ato CHAR(20) NOT NULL,
	contact CHAR(10) ,
	email CHAR(20)
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
	time CHAR(20) NOT NULL,
	FOREIGN KEY(name,contact) REFERENCES traveller(name,contact)
);

