-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2020 at 11:30 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crazepgm`
--

-- --------------------------------------------------------

--
-- Table structure for table `code_table`
--

CREATE TABLE `code_table` (
  `u_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `code` varchar(10000) NOT NULL,
  `pscore` int(11) NOT NULL,
  `submission` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `e_id` int(11) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `defaults` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_id`, `ename`, `start_date`, `end_date`, `defaults`) VALUES
(86, 'Beginner3', '2020-01-01 00:00:00', '2020-03-01 00:00:00', 0),
(87, 'Beginner123', '2020-01-01 00:00:00', '2020-03-01 00:00:00', 0),
(88, '2eqr34t', '2020-01-01 00:00:00', '2020-03-01 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `feedbacks` varchar(10000) NOT NULL,
  `defaults` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fpass`
--

CREATE TABLE `fpass` (
  `email_id` varchar(30) NOT NULL,
  `uniqstr` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `p_id` int(11) NOT NULL,
  `pname` text NOT NULL,
  `description` varchar(5000) NOT NULL,
  `constraints` varchar(150) NOT NULL,
  `sample_input` varchar(500) NOT NULL,
  `sample_output` varchar(500) NOT NULL,
  `sample_pgm` varchar(10000) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`p_id`, `pname`, `description`, `constraints`, `sample_input`, `sample_output`, `sample_pgm`, `e_id`) VALUES
(47, '              Sample Question  \r\n\r\n              Write a code to add two numbers\r\n            \r\n            ', 'Input:\r\n                The first line contains an integer T, total number of test cases.\r\n                Then follow T lines, each line contains two Integers A and B.\r\n                Output:\r\n                Add A and B and display it.', 'Constraints\r\n                *1 ≤ T ≤ 1000\r\n                *1 ≤ A,B ≤ 10000', 'Sample Input:\r\n                3 \r\n                1 2\r\n                100 200\r\n                10 40', 'Sample Output:\r\n                3\r\n                300\r\n                50', 'int main() {\r\n   int a, b, sum;\r\n \r\n   scanf(\"%d %d\", &a, &b);\r\n \r\n   sum = a + b;\r\n \r\n   printf(\"%d\", sum);\r\n \r\n   return(0);\r\n}', 86),
(48, '              Sample Question  \r\n\r\n              Write a code to add two numbers\r\n            \r\n            ', 'Input:\r\n                The first line contains an integer T, total number of test cases.\r\n                Then follow T lines, each line contains two Integers A and B.\r\n                Output:\r\n                Add A and B and display it.', 'Constraints\r\n                *1 ≤ T ≤ 1000\r\n                *1 ≤ A,B ≤ 10000', 'Sample Input:\r\n                3 \r\n                1 2\r\n                100 200\r\n                10 40', 'Sample Output:\r\n                3\r\n                300\r\n                50', 'int main() {\r\n   int a, b, sum;\r\n \r\n   scanf(\"%d %d\", &a, &b);\r\n \r\n   sum = a + b;\r\n \r\n   printf(\"%d\", sum);\r\n \r\n   return(0);\r\n}', 87),
(49, '              Sample Question  \r\n\r\n              Write a code to add two numbers\r\n            \r\n            ', 'Input:\r\n                The first line contains an integer T, total number of test cases.\r\n                Then follow T lines, each line contains two Integers A and B.\r\n                Output:\r\n                Add A and B and display it.', 'Constraints\r\n                *1 ≤ T ≤ 1000\r\n                *1 ≤ A,B ≤ 10000', 'Sample Input:\r\n                3 \r\n                1 2\r\n                100 200\r\n                10 40', 'Sample Output:\r\n                3\r\n                300\r\n                50', 'int main() {\r\n   int a, b, sum;\r\n \r\n   scanf(\"%d %d\", &a, &b);\r\n \r\n   sum = a + b;\r\n \r\n   printf(\" %d\", sum);\r\n \r\n   return(0);\r\n}', 88);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `u_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `escores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testcase`
--

CREATE TABLE `testcase` (
  `e_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `input` varchar(500) NOT NULL,
  `output` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testcase`
--

INSERT INTO `testcase` (`e_id`, `p_id`, `input`, `output`) VALUES
(86, 47, '10 20', '30'),
(86, 47, '20 30', '50'),
(86, 47, '30 40', '70'),
(87, 48, '1 2', '3'),
(87, 48, '40 50', '90'),
(88, 49, '15 25', ' 40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `verified` varchar(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `email_id`, `password`, `admin`, `verified`) VALUES
(9, 'vishwa', 'nkvi17is@cmrit.ac.in', '123456', 0, '1'),
(10, 'Aayush', 'roya2yush@gmail.com', 'Hello1234', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `weight`
--

CREATE TABLE `weight` (
  `e_id` int(11) NOT NULL,
  `alphabets` int(11) NOT NULL,
  `arithmetic_operator` int(11) NOT NULL,
  `assignment_operator` int(11) NOT NULL,
  `bitwise_operator` int(11) NOT NULL,
  `digits` int(11) NOT NULL,
  `dollar` int(11) NOT NULL,
  `underscore` int(11) NOT NULL,
  `relational_operator` int(11) NOT NULL,
  `auto` int(11) NOT NULL,
  `break` int(11) NOT NULL,
  `cases` int(11) NOT NULL,
  `char_val` int(11) NOT NULL,
  `const` int(11) NOT NULL,
  `continue_loop` int(11) NOT NULL,
  `default_val` int(11) NOT NULL,
  `do` int(11) NOT NULL,
  `double_val` int(11) NOT NULL,
  `else_stm` int(11) NOT NULL,
  `enum` int(11) NOT NULL,
  `extern` int(11) NOT NULL,
  `float_val` int(11) NOT NULL,
  `for_loop` int(11) NOT NULL,
  `goto` int(11) NOT NULL,
  `if_stm` int(11) NOT NULL,
  `intval` int(11) NOT NULL,
  `long_val` int(11) NOT NULL,
  `register` int(11) NOT NULL,
  `return_val` int(11) NOT NULL,
  `short` int(11) NOT NULL,
  `signed` int(11) NOT NULL,
  `sizeof` int(11) NOT NULL,
  `static` int(11) NOT NULL,
  `struct` int(11) NOT NULL,
  `switch` int(11) NOT NULL,
  `typedef` int(11) NOT NULL,
  `union_op` int(11) NOT NULL,
  `unsigned_val` int(11) NOT NULL,
  `void` int(11) NOT NULL,
  `volatile` int(11) NOT NULL,
  `while_loop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weight`
--

INSERT INTO `weight` (`e_id`, `alphabets`, `arithmetic_operator`, `assignment_operator`, `bitwise_operator`, `digits`, `dollar`, `underscore`, `relational_operator`, `auto`, `break`, `cases`, `char_val`, `const`, `continue_loop`, `default_val`, `do`, `double_val`, `else_stm`, `enum`, `extern`, `float_val`, `for_loop`, `goto`, `if_stm`, `intval`, `long_val`, `register`, `return_val`, `short`, `signed`, `sizeof`, `static`, `struct`, `switch`, `typedef`, `union_op`, `unsigned_val`, `void`, `volatile`, `while_loop`) VALUES
(86, 10, 1000, 5, 10, 100, 10, 10, 50, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5000, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 0, 0, 0, 0, 0, 3000),
(87, 10, 1000, 5, 10, 100, 10, 10, 50, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5000, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 0, 0, 0, 0, 0, 3000),
(88, 10, 1000, 5, 10, 100, 10, 10, 50, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5000, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 0, 0, 0, 0, 0, 3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code_table`
--
ALTER TABLE `code_table`
  ADD PRIMARY KEY (`u_id`,`e_id`,`p_id`),
  ADD KEY `e_id` (`e_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `ename` (`ename`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `fpass`
--
ALTER TABLE `fpass`
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`u_id`,`e_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `testcase`
--
ALTER TABLE `testcase`
  ADD PRIMARY KEY (`e_id`,`p_id`,`input`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `weight`
--
ALTER TABLE `weight`
  ADD PRIMARY KEY (`e_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `code_table`
--
ALTER TABLE `code_table`
  ADD CONSTRAINT `code_table_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `code_table_ibfk_2` FOREIGN KEY (`e_id`) REFERENCES `event` (`e_id`),
  ADD CONSTRAINT `code_table_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `problem` (`p_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `fpass`
--
ALTER TABLE `fpass`
  ADD CONSTRAINT `fpass_ibfk_1` FOREIGN KEY (`email_id`) REFERENCES `user` (`email_id`);

--
-- Constraints for table `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `problem_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `event` (`e_id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`e_id`) REFERENCES `event` (`e_id`);

--
-- Constraints for table `testcase`
--
ALTER TABLE `testcase`
  ADD CONSTRAINT `testcase_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `event` (`e_id`),
  ADD CONSTRAINT `testcase_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `problem` (`p_id`),
  ADD CONSTRAINT `testcase_ibfk_3` FOREIGN KEY (`e_id`) REFERENCES `event` (`e_id`);

--
-- Constraints for table `weight`
--
ALTER TABLE `weight`
  ADD CONSTRAINT `weight_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `event` (`e_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
