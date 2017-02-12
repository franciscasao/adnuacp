CREATE TABLE course (
  id varchar(13) NOT NULL,
  college_name varchar(128) NOT NULL,
  department_name varchar(128) NOT NULL,
  course_name varchar(128) NOT NULL,
  major_name varchar(128) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE person (
  id int(9) NOT NULL,
  last_name varchar(128) NOT NULL,
  first_name varchar(128) NOT NULL,
  password varchar(128) NOT NULL,
  code varchar(128) DEFAULT NULL,
  pass_code varchar(128) DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE student (
  id int(9) NOT NULL,
  email varchar(128) NOT NULL,
  contact_number int(11) DEFAULT NULL,
  year int(1) NOT NULL,
  course_id varchar(13) NOT NULL,
  updated bool NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (course_id) REFERENCES course(id)
);

CREATE TABLE event (
  id varchar(13) NOT NULL,
  name text,
  icon varchar(128) NOT NULL,
  description text NOT NULL,
  event_limit int(5) DEFAULT NULL,
  officer_id int(9) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (officer_id) REFERENCES person(id)
);

CREATE TABLE schedule (
  id varchar(13) NOT NULL,
  start_time int(11) NOT NULL,
  end_time int(11) NOT NULL,
  venue varchar(128) NOT NULL,
  event_id varchar(13) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (event_id) REFERENCES event(id)
);

CREATE TABLE restriction (
  id varchar(13) NOT NULL,
  event_id varchar(13) NOT NULL,
  course_id varchar(13) NOT NULL,
  year int(1) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (event_id) REFERENCES event(id),
  FOREIGN KEY (course_id) REFERENCES course(id)
);

CREATE TABLE person_type (
  id varchar(13) NOT NULL,
  person_id int(9) NOT NULL,
  type varchar(13) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE record (
  id varchar(13) NOT NULL,
  student_id int(9) NOT NULL,
  schedule_id varchar(13) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (student_id) REFERENCES person(id),
  FOREIGN KEY (schedule_id) REFERENCES schedule(id)
);