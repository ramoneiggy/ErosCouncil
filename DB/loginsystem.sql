-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 09:49 PM
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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `personID`, `PageID`, `content`, `isVisible`, `datePublished`) VALUES
(1, 12, 1, 'Elegant! I admire the use of layout and navigation! ', 1, '2018-05-01 00:01:00'),
(2, 13, 1, 'This style blew my mind.', 1, '2018-05-01 00:02:00'),
(3, 14, 1, 'These are sleek and strong mate', 1, '2018-05-01 00:03:00'),
(4, 12, 2, 'Truly simple type mate', 1, '2018-05-02 00:04:00'),
(5, 13, 2, 'Wow love it!', 1, '2018-05-01 00:05:00'),
(6, 14, 2, 'Amazing icons :-)', 1, '2018-05-02 00:06:00'),
(7, 12, 3, 'Let me take a nap... great shot, anyway.', 1, '2018-05-01 00:07:00'),
(8, 13, 3, 'Flat design is going to die.', 1, '2018-05-01 00:08:00'),
(9, 14, 3, 'Fresh. So alluring.', 1, '2018-05-02 00:09:00'),
(22, 12, 5, 'Guess I\'ll add a comment here <DR>', 1, '2018-05-04 14:35:19'),
(23, 13, 4, 'Let\'s add  something here', 1, '2018-05-04 14:40:03'),
(24, 13, 4, 'This really works', 1, '2018-05-04 14:40:19'),
(25, 13, 4, '; <DROP THE DATABASE>', 1, '2018-05-04 14:40:43'),
(26, 13, 4, 'still works', 1, '2018-05-04 14:41:00'),
(27, 13, 4, 'mama ti je partizan', 1, '2018-05-04 14:41:12'),
(28, 13, 1, 'kaeeee', 1, '2018-05-04 14:47:13'),
(29, 13, 1, 'vidi\r\n', 1, '2018-05-04 15:25:19'),
(30, 12, 10, 'Jebenica pajdo', 1, '2018-05-04 21:44:27'),
(31, 12, 10, 'moÅ¡ pisat kolko oÅ¡', 1, '2018-05-04 21:44:50');

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
(1, 'Pornhub', 'https://www.Pornhub.com', 'Pornhub is a pornographic video sharing website and the largest pornography site on the Internet.[5][6] Pornhub was launched in Montreal, providing professional and amateur photography since 2007.[7] Pornhub also has offices and servers in San Francisco, Houston, New Orleans and London. In March 2010, Pornhub was bought by Manwin (now known as MindGeek), which owns numerous other pornographic websites.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Pornhub-logo.svg/150px-Pornhub-logo.svg.png', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Pornhub-logo.svg/150px-Pornhub-logo.svg.png', '2018-04-22', '2007-03-25'),
(2, 'TubeGalore', 'https://www.tubegalore.com', 'If you search a large database of many millions of the best porn tubes. Then I have to tell you about Tube Galore. This website has almost all videos available out there floating around on the internet. Awesome right? I think so. The website has existed since 2007 and has done a lot of work to be among the top. And that is Tube Galore definitely succeeded. As the webmaster says himself, Tube Galore is a vortex! And I agree. I think if you are a porn lover, you definitely need to know this site. Because this is truly one of the best porn site whichcan be found on the Internet.', 'https://www.tubegalore.com/templates/tubegalore/images/logo.png?v1523258459', 'https://www.tubegalore.com/templates/tubegalore/images/logo.png?v1523258459', '2018-04-22', '2007-01-15'),
(3, 'YouJizz', 'https://www.youjizz.com', 'Youjizz Porn Tube! Free porn movies and sex videos on your desktop or mobile phone.', 'https://cdne-static.yjcontentdelivery.com/app/1/images/youjizz-logo.png', 'https://cdne-static.yjcontentdelivery.com/app/1/images/youjizz-logo.png', '2018-04-22', '2010-05-15'),
(4, 'YouPorn', 'https://www.youporn.com/', 'YouPorn is a free pornographic video sharing website and one of the 100 most accessed websites in the world. Since launching in August 2006, it grew to become the most popular pornographic website on the internet, and, in November 2007, it was reported to be the largest free pornographic website as well. As of February 2013, it was the 83rd most popular website overall and the fifth most popular pornographic website. In the category of pornographic websites, it was surpassed in the rankings by competitor sites xHamster, XVideos, and Pornhub, as well as the adult webcam site LiveJasmin.\r\n\r\nThis Web 2.0 (or Porn 2.0) site differs from many other pornographic websites in that it is completely free and ad-supported. One journalist reported that in May 2007 it generated a monthly ad revenue of $120,000 and that it was owned by Stephen Paul Jones.', 'https://fs.ypncdn.com/cb/bundles/youpornwebfront/images/l_youporn_black.png?v=95cad8c89d10f1b53a4b098ccd2effa2c45bd4db', 'https://fs.ypncdn.com/cb/bundles/youpornwebfront/images/l_youporn_black.png?v=95cad8c89d10f1b53a4b098ccd2effa2c45bd4db', '2018-05-04', '2006-08-26'),
(5, 'xHamster', 'https://xhamster.com/', 'xHamster is a pornographic media and social networking site headquartered in Limassol, Cyprus.[1] xHamster serves user-submitted pornographic videos, webcam models, pornographic photographs, and erotic literature, and incorporates social networking features. xHamster was founded in 2007. With more than 10 million members, it is the third most popular pornography website on the Internet after XVideos and Pornhub.\r\n\r\nThe site produces The Sex Factor, a reality series in which men and women compete to become porn stars. The site has been targeted as part of malvertising campaigns, and various governments have blocked xHamster as part of larger initiatives against Internet pornography.', 'https://upload.wikimedia.org/wikipedia/en/thumb/1/1f/XHamster_logo_2016.svg/512px-XHamster_logo_2016.svg.png', 'https://en.wikipedia.org/wiki/XHamster#/media/File:XHamster_logo_2016.svg', '2018-04-22', '2007-04-02'),
(6, 'xVideos', 'https://www.xvideos.com/', 'XVideos serves as a pornographic media aggregator, a type of website which gives access to adult content in a similar manner as YouTube does for general content.[6][7] Video clips from professional videos (sometimes pirated) are mixed with amateur and other types of content.[6][7] By 2012, XVideos was the largest adult website in the world, with over 4.4 billion page views per month.[8] Fabian Thylmann, the owner of MindGeek, attempted to purchase XVideos in 2012 in order to create a monopoly of pornographic tube sites. The French owner of XVideos turned down a reported offer of more than $120 million by saying, \"Sorry, I have to go and play Diablo II.\"[7] In 2014, XVideos controversially attempted to force content providers to either pledge to renounce the right to delete videos from their accounts or to shut down their accounts immediately.[9]', 'https://upload.wikimedia.org/wikipedia/commons/0/05/Xvideos.gif', 'https://upload.wikimedia.org/wikipedia/commons/0/05/Xvideos.gif', '2018-05-04', '2007-03-01'),
(7, 'XNXX', 'https://www.xnxx.com/', '100% Free Porn Movies and Sex Content', 'https://static-hw.xvideos.com/v3/img/skins/xnxx/logo-xnxx.png', 'https://static-hw.xvideos.com/v3/img/skins/xnxx/logo-xnxx.png', '2018-05-04', '2018-05-04'),
(8, 'HClips', 'https://www.hclips.com/', 'Magnificent porn tube website showing a wide array of HUD movies.', 'https://www.hclips.com/images/logo.png', 'https://www.hclips.com/images/logo.png', '2018-05-04', '2018-05-04'),
(9, 'Porn', 'https://www.porn.com/', 'Top porn tube site sharing an incredible amount of top notch hardcore videos ranging among all the most popular porn niches.', 'https://upload.wikimedia.org/wikipedia/commons/c/c6/Porn.com_logo.svg', 'https://upload.wikimedia.org/wikipedia/commons/c/c6/Porn.com_logo.svg', '2018-05-04', '2018-05-04'),
(10, 'TNAFlix', 'https://www.tnaflix.com', 'Amazing porn tube website showing thousand of hot porn videos.', 'https://www.tnaflix.com/images/mx.png', 'https://www.tnaflix.com/images/mx.png', '2018-05-04', '2018-05-04');

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
(12, 'Igor', 'ramoneiggy@gmail.com', '$2y$10$gEciGMJ22HbqGHrUPdjJNu36G8Fa8S7uGI7rFyTochOgroVgrEfr.'),
(13, 'Marko', 'marko@gmail.com', '$2y$10$295.b5cF/q3NXnAJVLonf.as5R9KRf9x6p8pm6sNCbNtXX.JIJWTi'),
(14, 'Pero', 'pero@gmail.com', '$2y$10$yx4CqNQiu25ZxfdYuATmi.e8EC7I90xYKsWTvwrWMGhQ5RjFdc02C'),
(15, 'adminFaca', 'solaja.igor@gmail.com', '$2y$10$U4W8booC2Qy/geFx01wCmewpY8agTMecwZY7BcJNGr739.DyCPD5W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pornpages`
--
ALTER TABLE `pornpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratingscore`
--
ALTER TABLE `ratingscore`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pornpages`
--
ALTER TABLE `pornpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ratingscore`
--
ALTER TABLE `ratingscore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
