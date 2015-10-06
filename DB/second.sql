-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 06, 2015 at 08:13 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `coinclick`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `username` varchar(99) NOT NULL,
  `email` varchar(999) NOT NULL,
  `password` varchar(999) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `status`) VALUES
(1, 'neger', 'neger', 'neger@neger.neger', 'neger', 0),
(2, 'fe', 'fe', 'hugo', 'fotboll1', 0),
(3, 'Hugo Krishan', 'hugokrishan', 'hugo@krishan.se', 'fotboll1', 0),
(4, 'g', 'g', 'g', 'g', 0),
(5, 'f', 'f', 'f', 'f', 0),
(6, '', '', 'hugo', 'fotboll1', 0),
(7, 'e', 'e', 'hugo', 'fotboll1', 0),
(8, 'we', 'we', 'hugo', 'fotboll1', 0),
(9, 'fre', 'erf', 'hugo', 'fotboll1', 0),
(10, 'wed', 'wed', 'hugo', 'fotboll1', 0),
(11, 'ui', 'jk', 'hugo', 'fotboll1', 0),
(12, '23', '123', 'hugo', 'fotboll1', 0),
(13, 'we', 'r', 'hugo', 'fotboll1', 0),
(14, 'wer', 'wer', 'hugo', 'fotboll1', 0),
(15, 'werq', 'qwer', 'hugo', 'fotboll1', 0),
(16, 'fqw', 'feq', 'hugo', 'fotboll1', 0),
(17, 'Oliver Weitman', 'Tjaabba', 'oliverweitman123@hotmail.com', 'dedu123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;