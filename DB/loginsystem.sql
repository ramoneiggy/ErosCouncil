-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 06:12 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `personID` int(11) NOT NULL,
  `PageID` int(11) NOT NULL,
  `content` varchar(1024) NOT NULL,
  `isVisible` tinyint(1) NOT NULL,
  `datePublished` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pornpages`
--

CREATE TABLE `pornpages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(512) NOT NULL COMMENT 'Address',
  `images` varchar(512) NOT NULL COMMENT 'Address',
  `dateAdded` date NOT NULL COMMENT 'When we added it to our base',
  `dateCreated` date NOT NULL COMMENT 'When it was created'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pornpages`
--

INSERT INTO `pornpages` (`id`, `name`, `url`, `description`, `logo`, `images`, `dateAdded`, `dateCreated`) VALUES
(1, 'Pornhub', 'www.Pornhub.com', 'Pornhub is a pornographic video sharing website and the largest pornography site on the Internet.[5][6] Pornhub was launched in Montreal, providing professional and amateur photography since 2007.[7] Pornhub also has offices and servers in San Francisco, Houston, New Orleans and London. In March 2010, Pornhub was bought by Manwin (now known as MindGeek), which owns numerous other pornographic websites.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Pornhub-logo.svg/150px-Pornhub-logo.svg.png', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Pornhub-logo.svg/150px-Pornhub-logo.svg.png', '2018-04-22', '2007-03-25'),
(2, 'TubeGalore', 'www.tubegalore.com', 'If you search a large database of many millions of the best porn tubes. Then I have to tell you about Tube Galore. This website has almost all videos available out there floating around on the internet. Awesome right? I think so. The website has existed since 2007 and has done a lot of work to be among the top. And that is Tube Galore definitely succeeded. As the webmaster says himself, Tube Galore is a vortex! And I agree. I think if you are a porn lover, you definitely need to know this site. Because this is truly one of the best porn site whichcan be found on the Internet.', 'https://www.tubegalore.com/templates/tubegalore/images/logo.png?v1523258459', 'https://www.tubegalore.com/templates/tubegalore/images/logo.png?v1523258459', '2018-04-22', '2007-01-15'),
(3, 'YouJizz', 'www.youjizz.com', 'Not much is known.', 'https://cdne-static.yjcontentdelivery.com/app/1/images/youjizz-logo.png', 'https://cdne-static.yjcontentdelivery.com/app/1/images/youjizz-logo.png', '2018-04-22', '2010-05-15'),
(4, 'YouPorn', 'www.YouPorn.com', 'YouPorn is a free pornographic video sharing website and one of the 100 most accessed websites in the world. Since launching in August 2006, it grew to become the most popular pornographic website on the internet, and, in November 2007, it was reported to be the largest free pornographic website as well As of February 2013, it was the 83rd most popular website overall and the fifth most popular pornographic website. In the category of pornographic websites, it was surpassed in the rankings by competitor sites xHamster, XVideos, and Pornhub, as well as the adult webcam site LiveJasmin.\r\n\r\nThis Web 2.0 (or Porn 2.0) site differs from many other pornographic websites in that it is completely free and ad-supported. One journalist reported that in May 2007 it generated a monthly ad revenue of $120,000 and that it was owned by Stephen Paul Jones.', 'https://upload.wikimedia.org/wikipedia/commons/c/cb/Logo_of_YouPorn.png', 'https://en.wikipedia.org/wiki/YouPorn#/media/File:Logo_of_YouPorn.png', '2018-04-22', '2006-08-26'),
(5, 'xHamster', 'http://xhamster.com/', 'xHamster is a pornographic media and social networking site headquartered in Limassol, Cyprus.[1] xHamster serves user-submitted pornographic videos, webcam models, pornographic photographs, and erotic literature, and incorporates social networking features. xHamster was founded in 2007. With more than 10 million members, it is the third most popular pornography website on the Internet after XVideos and Pornhub.\r\n\r\nThe site produces The Sex Factor, a reality series in which men and women compete to become porn stars. The site has been targeted as part of malvertising campaigns, and various governments have blocked xHamster as part of larger initiatives against Internet pornography.', 'https://upload.wikimedia.org/wikipedia/en/thumb/1/1f/XHamster_logo_2016.svg/512px-XHamster_logo_2016.svg.png', 'https://en.wikipedia.org/wiki/XHamster#/media/File:XHamster_logo_2016.svg', '2018-04-22', '2007-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `ratingscore`
--

CREATE TABLE `ratingscore` (
  `id` int(11) NOT NULL,
  `personID` int(11) NOT NULL,
  `PageID` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_uid` varchar(256) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(256) COLLATE utf8_bin NOT NULL,
  `user_pwd` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_uid`, `user_email`, `user_pwd`) VALUES
(5, 'Igor', 'ramoneiggy@gmail.com', '$2y$10$5YgaHrEBCmf87eJRUhj91eAe4DHUEciv.tJ370LWN5TnLQ3axtGBq'),
(6, 'marko', 'marko@gmail.com', '$2y$10$ZOfhK4l1gfn4WOtz2EoL9OJh42a.Jx.AE5hXkiUIUd6E7JQwflUmq'),
(7, 'Vjeverica', 'ramoneiggy@gmail.com', '$2y$10$AxkARLL/qGzpcMHAcCZ34.dWiAjGhDf9JtsOZVsxclgKcY/H6oIs.'),
(8, 'Ivo', 'ramoneiggy@gmail.com', '$2y$10$DxI80EO7DEdvWeS2KAu4leDh2MkwPi6muOOT8BKK91kfEMdpbpthy'),
(9, 'Ivan', 'vangoda@frula.hr', '$2y$10$h1oJueAv9gIG2.UwTVg.lujiWBhvb5kbTa5Y2lyY16FcsZd26ua/m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PageID` (`PageID`),
  ADD KEY `personID` (`personID`);

--
-- Indexes for table `pornpages`
--
ALTER TABLE `pornpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratingscore`
--
ALTER TABLE `ratingscore`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PageID` (`PageID`),
  ADD KEY `personID` (`personID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pornpages`
--
ALTER TABLE `pornpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ratingscore`
--
ALTER TABLE `ratingscore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`PageID`) REFERENCES `pornpages` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`personID`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `ratingscore`
--
ALTER TABLE `ratingscore`
  ADD CONSTRAINT `ratingscore_ibfk_1` FOREIGN KEY (`PageID`) REFERENCES `pornpages` (`id`),
  ADD CONSTRAINT `ratingscore_ibfk_2` FOREIGN KEY (`personID`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
