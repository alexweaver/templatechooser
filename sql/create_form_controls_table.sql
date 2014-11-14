USE templatechooser_db;

CREATE TABLE tc_form_controls
(
	id int NOT NULL AUTO_INCREMENT,
	type varchar(50) NOT NULL,
	html TEXT NOT NULL,
	PRIMARY KEY (id)
);