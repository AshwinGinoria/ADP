CREATE DATABASE /*!32312 IF NOT EXISTS*/`assignment4` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `assignment4`;


CREATE TABLE IF NOT EXISTS `student6` (
  `id` int(2) NOT NULL DEFAULT '0',
  `name` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `class` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `sex` varchar(6) CHARACTER SET utf8 NOT NULL DEFAULT 'male',
  `house_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student6`
--

INSERT INTO `student6` (`id`, `name`, `class`, `sex`, `house_id`) VALUES
(1, 'John Deo', 'Four', 'female', 2),
(2, 'Max Ruin', 'Three', 'male', 1),
(3, 'Arnold', 'Three', 'male', 1),
(4, 'Krish Star', 'Four', 'female', 3),
(5, 'John Mike', 'Four', 'female', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_house`
--

CREATE TABLE IF NOT EXISTS `student_house` (
  `house_id` int(2) NOT NULL AUTO_INCREMENT,
  `h_name` varchar(10) NOT NULL,
  PRIMARY KEY (`house_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student_house`
--

INSERT INTO `student_house` (`house_id`, `h_name`) VALUES
(1, 'King'),
(2, 'Queen'),
(3, 'Jack');

-- --------------------------------------------------------

--
-- Table structure for table `student_mark`
--

CREATE TABLE IF NOT EXISTS `student_mark` (
  `mark_id` int(3) NOT NULL AUTO_INCREMENT,
  `student_id` int(3) NOT NULL,
  `exam_dt` date NOT NULL,
  `exam` varchar(10) NOT NULL,
  `mark` int(3) NOT NULL,
  PRIMARY KEY (`mark_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `student_mark`
--

INSERT INTO `student_mark` (`mark_id`, `student_id`, `exam_dt`, `exam`, `mark`) VALUES
(1, 2, '2017-04-05', 'Seme1', 80),
(2, 2, '2017-04-19', 'Seme2', 75),
(3, 1, '2017-04-05', 'Seme1', 84),
(4, 1, '2017-04-19', 'Seme2', 76),
(5, 3, '2017-04-05', 'Seme1', 71),
(6, 3, '2017-04-19', 'Sem2', 72),
(7, 1, '2017-05-10', 'Seme1', 93),
(8, 1, '2017-05-24', 'Seme2', 90),
(9, 2, '2017-05-10', 'Seme1', 85),
(10, 2, '2017-05-24', 'Seme2', 86),
(11, 3, '2017-05-10', 'Seme1', 63),
(12, 3, '2017-05-24', 'Seme2', 80),
(13, 1, '2017-06-07', 'Seme1', 80),
(14, 1, '2017-06-21', 'Seme2', 75),
(15, 2, '2017-06-07', 'Seme1', 50),
(16, 2, '2017-06-21', 'Seme2', 87),
(17, 3, '2017-06-07', 'Seme1', 59),
(18, 3, '2017-06-21', 'Seme2', 61),
(19, 4, '2017-04-05', 'Seme1', 84),
(20, 4, '2017-04-19', 'Seme2', 82),
(21, 5, '2017-04-05', 'Seme1', 63),
(22, 5, '2017-04-19', 'Seme2', 95),
(23, 4, '2017-05-10', 'Seme1', 59),
(24, 4, '2017-05-24', 'Seme2', 85),
(25, 5, '2017-05-10', 'Seme1', 89),
(26, 5, '2017-05-24', 'Seme2', 84),
(27, 4, '2017-06-07', 'Seme1', 84),
(28, 4, '2017-06-21', 'Seme2', 87),
(29, 5, '2017-06-07', 'Seme1', 95),
(30, 5, '2017-06-21', 'Seme2', 87);

--
-- Table structure for table `student_fee`
--
CREATE TABLE IF NOT EXISTS `student_fee` (
  `fee_id` int(2) NOT NULL AUTO_INCREMENT,
  `id` int(2) NOT NULL,
  `dt` date NOT NULL,
  `amount` int(5) NOT NULL,
  PRIMARY KEY (`fee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`fee_id`, `id`, `dt`, `amount`) VALUES
(1, 1, '2013-01-08', 200),
(2, 1, '2013-01-10', 100),
(3, 2, '2013-01-24', 120),
(4, 3, '2013-02-02', 211),
(5, 2, '2013-02-07', 150),
(6, 3, '2013-02-06', 135),
(7, 4, '2013-02-14', 100);

