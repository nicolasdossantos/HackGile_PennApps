DROP TABLE IF EXISTS `hackathons`;
CREATE TABLE `hackathons` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `duration` time NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
  
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS 'projects';
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `max_members` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `description` varchar(255) NOT NULL,
  `git_link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS 'members';
CREATE TABLE `members` (
  `email` varchar(255) NOT NULL ,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ;

DROP TABLE IF EXISTS 'stories';
CREATE TABLE `stories` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `priority` tinyint(1) NOT NULL,
  `complete` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS 'sprints';
CREATE TABLE `sprints` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `duration` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


