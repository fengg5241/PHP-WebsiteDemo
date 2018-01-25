-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 24, 2018 at 08:44 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ria_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ria_photo`
--

DROP TABLE IF EXISTS `ria_photo`;
CREATE TABLE IF NOT EXISTS `ria_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `b_photo` varchar(255) NOT NULL,
  `s_photo` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ria_photo`
--

INSERT INTO `ria_photo` (`id`, `b_photo`, `s_photo`, `description`) VALUES
(1, 'image1.jpg', 'image1.png', 'This is when I went to Japan , day was really cold and I was freezing.The people there were really friendly, everything is well maintained.Not mention everything was really cute and small. I even seemed tall there. Hahahaha that was about it. I had such a wonderful time there.'),
(2, 'image2.jpg', 'image2.png', 'The trip to Canada was super fun , I met with alot of nice people. Also I got too see my aunt which I have not in years. We ate tones of food. But it was also very cold.~~~!'),
(3, 'image3.jpg', 'image3.png', 'This was a wole new experience and I had a huge culture shock. But the landscape was breath taking, maybe I shoudl go again next time.'),
(4, 'image4.jpg', 'image4.png', 'Korea seemed like a alternate version of Japan, the food was good. But the Japanese were nicer, Korea was really noisy tho.');

-- --------------------------------------------------------

--
-- Table structure for table `ria_user`
--

DROP TABLE IF EXISTS `ria_user`;
CREATE TABLE IF NOT EXISTS `ria_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL COMMENT '1:male;2:female',
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL COMMENT '1:Website;2:Media;3:Friend',
  `role_type` varchar(255) DEFAULT '2' COMMENT '1:admin;2:user',
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ria_user`
--

INSERT INTO `ria_user` (`id`, `name`, `age`, `gender`, `email`, `contact`, `address`, `industry`, `event`, `role_type`, `pass`) VALUES
(10, 'AlexW', '51', '1', 'alexWong@gmail.com', '58648625', '33 st,  12-14 av 1', 'A', '3', '2', '21232f297a57a5a743894a0e4a801fc3'),
(9, 'Kitty', '19', '2', 'Meow@gmail.com', '98954821', '12-67 sg av 6', 'B', '2', '2', '21232f297a57a5a743894a0e4a801fc3'),
(8, 'AAronLee', '34', '1', 'LeeKY@hotmail.com', '48695468', 'gwc 122 21-01', 'C', '3', '2', '21232f297a57a5a743894a0e4a801fc3'),
(13, '163389b -student', '11', '1', '163389b@mymail.nyp.edu.sg', '854752174', '11 vivo str 09-01', 'A', '1', '2', '21232f297a57a5a743894a0e4a801fc3'),
(14, 'admin', '18', '1', 'admin@admin.com', '88888888 ', '21 telok balnagh dr ', 'A', '1', '1', '21232f297a57a5a743894a0e4a801fc3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
