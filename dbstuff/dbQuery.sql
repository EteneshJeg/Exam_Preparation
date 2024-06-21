
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- USERS 
CREATE TABLE `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joined_date` date NOT NULL,
  `uHash` varchar(255) NOT NULL,
    PRIMARY KEY(uid),
    UNIQUE KEY(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Topics
CREATE TABLE `topics` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `topicName` varchar(255) NOT NULL,
  PRIMARY KEY(tid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--StudyMaterial

CREATE TABLE `studymaterial` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `image` MEDIUMBLOB NOT NULL,
  `material` VARCHAR(255),
  PRIMARY KEY(`sid`),
  FOREIGN KEY (`tid`) REFERENCES `topics`(`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--PracticeQuestions
CREATE TABLE `practicequestions` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `question` TEXT,
  `answer` TEXT,
  PRIMARY KEY(qid),
  FOREIGN KEY (tid) REFERENCES topics(tid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



