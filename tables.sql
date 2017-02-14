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
  start_time varchar(10) NOT NULL,
  end_time varchar(10) NOT NULL,
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

CREATE TABLE icon (
  id varchar(13) NOT NULL,
  name varchar(128) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO icon VALUES 
()

INSERT INTO event VALUES
('58a120169c4ca', 'Creative x Recycling', 'recycle', 'This topic will explain the proper utilization of scrap materials and how it can widen the platform of recycling in the country.', 45, 201310661),
('58a120169c4d4', 'Imaginative x Arts', 'brush-pencil', 'This topic will explain how arts go along with the current dynamics of the Philippine culture.', 150, 201310661),
('58a120169c4d9', 'Creative x Media Literature', 'tablet', 'This topic will talk about how literatures in social media appeal to the audience and how it shapes the dynamics of the society.', 150, 201510230),
('58a120169c4dd', 'Creative x Cinema', 'filmreel', 'This topic will discuss how regional films appeal in the national movie platforms. It also discuss how films shape our society and therefore, how it can contribute in making a better society.', 200, 201310661),
('58a120169c4e1', 'Imaginative x Theater Arts', 'clapboard', 'This topic will discuss the basic competencies of conducting a theater play. This will also teach the students of the basic skill of a theater play actor.', 100, 201510230),
('58a120169c4e5', 'Imaginative x Photography', 'polaroidcamera', "This topic will discuss the different tricks and techniques in phone photography that can aid in promoting one's social advocacy.", 100, 201310661),
('58a120169c4ea', 'Creative x Calligraphy', 'pencil', 'The ACP topic will provide a seminar workshop on basic calligraphy skills and techniques.', 50, 201510230),
('58a120169c4ee', 'Creative x Music', 'music', 'This topic will discuss the music technology and demonstrate the uses of several music technology devices.', 600, 201310661),
('58a120169c4f2', 'Creative x Freelancing', 'paintbrush', "This topic will discuss how one's skills and talents can be utilized in financing one's personal needs.", 60, 201510230),
('58a120169c4f6', 'Mocha x Sass', 'news', 'This topic will discuss the right identification of facts and trolls in the world of social media.', 800, 201310661),
('58a120169c4fa', 'Creative x Techno-preneurship', 'computer', 'This topic will discuss recent technological innovations in the Philippines and how those contributed in the society. ', 100, 201510230),
('58a120169c4fe', 'Imaginative x Government Pursuit', 'megaphone', 'This will be a roundtable discussion on why one decided to commit himself in working to a government institution.', 150, 201310661),
('58a120169c503', 'Creative x Tourism', 'plane', "This topic will tackle the various joys in travelling, thus insipiring the students to visit places as well. This will also discuss the various ways on how one's travelling can contribute in the country's ecotourism industry.", 150, 201510230),
('58a120169c507', 'Creative x Gender', 'rainbow', 'This topic will discuss the present gender concerns and issues in the country.', 200, 201310661),
('58a120169c50b', 'Creative x Forensic Psychology', 'magnifyingglass', 'The ACP topic will discuss the current role of psychology in addressing concerns of the community.', 100, 201510230),
('58a120169c50f', 'Creative x First Aid', 'heart', 'This topic will discuss basic first aid techniques. It will demonstrate how this techniques are done.', 60, 201310661),
('58a120169c513', 'Creative x Pet Ownership', 'home', 'This topic will discuss the responsibilities of being a pet owner. This will tackle on how one can take care of his or her pet.', 100, 201510230),
('58a120169c517', 'Creative x Finance', 'money', "This topic will discuss the tips and advices in managing one's financial resources.", 200, 201310661),
('58a120169c51f', 'Creative x Self Defense', 'security', 'This topic will tackle and demonstrate the basic self-defense techniques.', 60, 201310661),
('58a2a6ea1b216', 'Creative x Zines', 'security', 'Guide to self publishing literary works through vines and the independent press.', 30, 201310661);
-- ('58a120169c51b', 'Creative x Hosting', 'microphone', "This topic will discuss how one's passion and skills and can aid in the different societal advocacies.", , 201510230),

INSERT INTO schedule VALUES 
('58a122be76f61', '8 AM', '12 NN', 'AR211', '58a120169c4ca'),
('58a122be76f6a', '1 PM', '4 PM', 'AR211', '58a120169c4ca'),
('58a122be76f71', '8 AM', '12 NN', "3rd Floor, O'Brien Library", '58a120169c4d4'),
('58a122be76f75', '1 PM', '4 PM', 'Richie Fernando Hall', '58a120169c4d9'),
('58a122be76f7a', '8 AM', '12 NN', 'Instructional Media Center', '58a120169c4dd'),
('58a122be76f7e', '8 AM', '12 NN', 'Xavier Hall', '58a120169c4e1'),
('58a122be76f83', '8 AM', '12 NN', 'Retreat Center', '58a120169c4e5'),
('58a122be76f87', '8 AM', '12 NN', 'A215', '58a120169c4ea'),
('58a122be76f8c', '1 PM', '4 PM', 'Gymnasium', '58a120169c4ee'),
('58a122be76f90', '1 PM', '4 PM', 'A215', '58a120169c4f2'),
('58a122be76f95', '1 PM', '4 PM', 'Gymnasium', '58a120169c4f6'),
('58a122be76f99', '8 AM', '12 NN', 'MPR', '58a120169c4fa'),
('58a122be76f9d', '1 PM', '4 PM', "3rd Floor, O'Brien Library", '58a120169c4fe'),
('58a122be76fa1', '8 AM', '12 NN', 'MPR (tour within Naga City)', '58a120169c503'),
('58a122be76fa6', '8 AM', '12 NN', 'Richie Fernando Hall', '58a120169c507'),
('58a122be76faa', '1 PM', '4 PM', 'Multipurpose Room', '58a120169c50b'),
('58a122be76fae', '8 AM', '12 NN', 'Nursing Ampitheatre', '58a120169c50f'),
('58a122be76fb3', '1 PM', '4 PM', 'Xavier Hall', '58a120169c513'),
('58a122be76fb7', '8 AM', '12 NN', 'Instructional Media Center', '58a120169c517'),
('58a13a8b08b5d', '1 PM', '4 PM', 'Nursing Ampitheatre', '58a120169c51f'),
('58a2a6ea1b21e', '8 AM', '12 NN', 'OB115', '58a2a6ea1b216');
-- ('58a2697df015c', '8 AM', '12 NN', 'University Gym', '58a120169c51b');