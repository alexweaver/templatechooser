USE templatechooser_db;

CREATE TABLE tc_forms_form_controls
(
	form_id int NOT NULL,
	form_control_id int NOT NULL,
	position int NOT NULL,
	PRIMARY KEY (form_id, form_control_id),
	FOREIGN KEY (form_id) REFERENCES tc_forms(id),
	FOREIGN KEY (form_control_id) REFERENCES tc_form_controls(id)
);