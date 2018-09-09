DROP TABLE timer;
DROP TABLE members;
DROP TABLE projects;
DROP TABLE stories;
DROP TABLE sprints;

CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `hackathon` varchar(255) NOT NULL,
  `hackathon_duration` time,
  `max_members` int(2),
  `description` varchar(255),
  `git_link` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `project_id` int(8),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`project_id`) REFERENCES projects(`id`) 
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


CREATE TABLE `sprints` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `duration` time NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`project_id`) REFERENCES projects(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

CREATE TABLE `timer` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `duration` varchar(255) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

CREATE TABLE `stories` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `priority` tinyint(1) NOT NULL,
  `complete` tinyint(1),
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `claimed_by`  varchar(255),
  `sprint_id`  int(8),
  `project_id` int(11),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`project_id`) REFERENCES projects(`id`)

) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

