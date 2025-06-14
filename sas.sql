-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 05:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `uniqueid`, `lastname`, `firstname`, `email`, `password`) VALUES
(1, '1306605553', 'Martin', 'Admin', 'admin@gmail.com', 'c93ccd78b2076528346216b3b2f701e6'),
(9, '178273088', 'Mwangi', 'Martin', 'gabywart@gmail.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `company_supervisors`
--

CREATE TABLE `company_supervisors` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_supervisors`
--

INSERT INTO `company_supervisors` (`id`, `uniqueid`, `firstname`, `lastname`, `company`, `email`, `password`) VALUES
(2, '505077056', 'Patricia', 'Wangui', 'Tech World', 'patriciawangui@gmail.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `school_supervisors`
--

CREATE TABLE `school_supervisors` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_supervisors`
--

INSERT INTO `school_supervisors` (`id`, `uniqueid`, `firstname`, `lastname`, `department`, `email`, `password`) VALUES
(1, '801666280', 'Alan', 'Jackson', 'cs', 'alanjackson@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(3, '381586187', 'Kelvin', 'Kanyua', 'bbit', 'kelvinkanyua@gmail.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `supervisor` varchar(200) NOT NULL DEFAULT '',
  `csupervisor` varchar(200) NOT NULL DEFAULT '',
  `course` varchar(200) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `uniqueid`, `fname`, `lname`, `regno`, `password`, `supervisor`, `csupervisor`, `course`, `year`) VALUES
(6, '953319685', 'Allaxander', 'Kamau', 'C055-03-3434/2019', '25d55ad283aa400af464c76d713c07ad', '', '', 'IT', 2),
(7, '1617611936', 'Ann', 'Njeri', 'C025-01-0023/2019', '25d55ad283aa400af464c76d713c07ad', 'kelvinkanyua@gmail.com', 'patriciawangui@gmail.com', 'BBIT', 3),
(9, '155759375', 'Allaxander', 'Kane', 'C025-01-1000/2018', '25d55ad283aa400af464c76d713c07ad', '', '', 'IT', 4),
(10, '1003032209', 'All', 'Mee', 'C025-01-1088/2018', '25d55ad283aa400af464c76d713c07ad', '', '', 'BBIT', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_view`
-- (See below for the actual view)
--
CREATE TABLE `student_view` (
`fname` varchar(255)
,`lname` varchar(255)
,`regno` varchar(255)
,`supervisor` varchar(200)
,`csupervisor` varchar(200)
,`course` varchar(200)
,`year` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answers`
--

CREATE TABLE `tbl_answers` (
  `id` int(11) NOT NULL,
  `quizno` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `test` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_answers`
--

INSERT INTO `tbl_answers` (`id`, `quizno`, `correct`, `answer`, `test`) VALUES
(1, 1, 0, 'Node', 'networking'),
(2, 1, 1, 'Network', 'networking'),
(3, 1, 0, 'Computers', 'networking'),
(4, 1, 0, 'Electronis', 'networking'),
(5, 2, 1, 'Is a device connected to a network', 'networking'),
(6, 2, 0, 'Is a computer point', 'networking'),
(7, 2, 0, 'Is a computer network', 'networking'),
(8, 2, 0, 'Is a system of computers', 'networking'),
(9, 3, 0, 'Cable', 'networking'),
(10, 3, 0, 'Node', 'networking'),
(11, 3, 0, 'Organization', 'networking'),
(12, 3, 1, 'Link', 'networking'),
(13, 4, 0, 'Application layer', 'networking'),
(14, 4, 1, 'Interface layer', 'networking'),
(15, 4, 0, 'Data link layer', 'networking'),
(16, 4, 0, 'Physical layer', 'networking'),
(17, 5, 0, 'Inheritance', 'networking'),
(18, 5, 0, 'Polymorphism', 'networking'),
(19, 5, 1, 'Encapsulation', 'networking'),
(20, 5, 0, 'Compression', 'networking'),
(21, 6, 0, 'HTTP', 'networking'),
(22, 6, 0, 'VPN', 'networking'),
(23, 6, 0, 'Tunnel', 'networking'),
(24, 6, 1, 'HTTPs', 'networking'),
(25, 7, 0, '1', 'networking'),
(26, 7, 0, '7', 'networking'),
(27, 7, 0, '9', 'networking'),
(28, 7, 1, '4', 'networking'),
(29, 8, 1, 'Communication', 'networking'),
(30, 8, 0, 'Transmission', 'networking'),
(31, 8, 0, 'Connection', 'networking'),
(32, 8, 0, 'Inter process', 'networking'),
(33, 9, 0, 'Netstat', 'networking'),
(34, 9, 1, 'Ping', 'networking'),
(35, 9, 0, 'Tracert', 'networking'),
(36, 9, 0, 'IpConfig', 'networking'),
(37, 10, 0, 'Ip address', 'networking'),
(38, 10, 1, 'MAC address', 'networking'),
(39, 10, 0, 'Port address', 'networking'),
(40, 10, 0, 'Unicast address', 'networking'),
(41, 1, 0, 'Coding language', 'software'),
(42, 1, 0, 'Computer language', 'software'),
(43, 1, 1, 'Programming language', 'software'),
(44, 1, 0, 'Binary language', 'software'),
(45, 2, 0, 'Object', 'software'),
(46, 2, 0, 'Variable', 'software'),
(47, 2, 0, 'Method', 'software'),
(48, 2, 1, 'Class', 'software'),
(49, 3, 1, 'Constructor', 'software'),
(50, 3, 0, 'Interface', 'software'),
(51, 3, 0, 'Abstract', 'software'),
(52, 3, 0, 'Function', 'software'),
(53, 4, 0, 'Function', 'software'),
(54, 4, 1, 'Array', 'software'),
(55, 4, 0, 'Variable', 'software'),
(56, 4, 0, 'Data store', 'software'),
(57, 5, 0, 'Machine learning', 'software'),
(58, 5, 0, 'Deep learning', 'software'),
(59, 5, 0, 'OOP', 'software'),
(60, 5, 1, 'Artificial intelligence', 'software'),
(61, 6, 1, 'True', 'software'),
(62, 6, 0, 'False', 'software'),
(63, 7, 0, 'Data flow', 'software'),
(64, 7, 0, 'Flow chart', 'software'),
(65, 7, 1, 'Algorithm', 'software'),
(66, 7, 0, 'Guntt chart', 'software'),
(67, 8, 0, 'Logical', 'software'),
(68, 8, 1, 'Random', 'software'),
(69, 8, 0, 'Runtime', 'software'),
(70, 8, 0, 'Syntax', 'software'),
(71, 9, 0, 'Variable', 'software'),
(72, 9, 0, 'Proposed', 'software'),
(73, 9, 0, 'Basic', 'software'),
(74, 9, 1, 'Reserved', 'software'),
(75, 10, 0, 'For loop', 'software'),
(76, 10, 1, 'If else loop', 'software'),
(77, 10, 0, 'Do-while loop', 'software'),
(78, 10, 0, 'While', 'software'),
(79, 1, 1, 'Hybrid computer', 'hardware'),
(80, 1, 0, 'Digital computer', 'hardware'),
(81, 1, 0, 'Analog computer', 'hardware'),
(82, 1, 0, 'Super computer', 'hardware'),
(83, 2, 0, 'Wanted Once Read Memory', 'hardware'),
(84, 2, 0, 'Wanted Original Read Memory', 'hardware'),
(85, 2, 0, 'Write Original Read Memory', 'hardware'),
(86, 2, 1, 'Write Once Read Many', 'hardware'),
(87, 3, 0, 'Input device', 'hardware'),
(88, 3, 0, 'Control unit', 'hardware'),
(89, 3, 1, 'Central processing unit', 'hardware'),
(90, 3, 0, 'Output device', 'hardware'),
(91, 4, 1, 'Virtual storage', 'hardware'),
(92, 4, 0, 'Multiprocessing', 'hardware'),
(93, 4, 0, 'Multiprogramming', 'hardware'),
(94, 4, 0, 'Switching', 'hardware'),
(95, 5, 0, 'Address bus', 'hardware'),
(96, 5, 1, 'Data bus', 'hardware'),
(97, 5, 0, 'Address bus and data bus', 'hardware'),
(98, 5, 0, 'None of the above', 'hardware'),
(99, 6, 0, 'Keyboard', 'hardware'),
(100, 6, 0, 'Optical drive', 'hardware'),
(101, 6, 0, 'Printer', 'hardware'),
(102, 6, 1, 'HDD', 'hardware'),
(103, 7, 0, 'Power supply box', 'hardware'),
(104, 7, 0, 'Video card', 'hardware'),
(105, 7, 1, 'Video display unit', 'hardware'),
(106, 7, 0, 'Graphics processor', 'hardware'),
(107, 8, 0, 'Standard keys', 'hardware'),
(108, 8, 0, 'Function keys', 'hardware'),
(109, 8, 0, 'Navigation keys', 'hardware'),
(110, 8, 1, 'Special purpose keys', 'hardware'),
(111, 9, 0, 'Output/input devices', 'hardware'),
(112, 9, 1, 'Output devices', 'hardware'),
(113, 9, 0, 'Signaled devices', 'hardware'),
(114, 9, 0, 'Digital devices', 'hardware'),
(115, 10, 1, 'BIOS', 'hardware'),
(116, 10, 0, 'CPU', 'hardware'),
(117, 10, 0, 'ROM', 'hardware'),
(118, 10, 0, 'RAM', 'hardware');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attachments`
--

CREATE TABLE `tbl_attachments` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `startdate` date NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attachments`
--

INSERT INTO `tbl_attachments` (`id`, `title`, `cname`, `category`, `location`, `startdate`, `description`) VALUES
(1, 'Web Developer Role', 'Company 1', 'software', 'mweiga', '2021-07-01', 'We need a web developer for 2 months'),
(2, 'Network Engineer Intern', 'Company 2', 'networking', 'Nyeri Town', '2021-07-07', 'Network engineer needed for july to september'),
(3, 'Networking Admin', 'Company 3', 'networking', 'Nyeri', '2021-07-01', 'It will start in July '),
(4, 'Hardware Assembly', 'Company 4', 'hardware', 'Nairobi', '2021-07-05', 'We need several interns for a paid hardware tasks'),
(5, 'Hardware Internship', 'Company 5', 'hardware', 'Muranga', '2021-07-10', 'We need interns on our company for 3 months'),
(6, 'Network Administrator', 'The NetWard Association', 'hardware', 'Kangemi', '2021-07-01', 'networking intern needed urgently');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_csupervisor_assess`
--

CREATE TABLE `tbl_csupervisor_assess` (
  `id` int(11) NOT NULL,
  `onemarks` int(11) NOT NULL,
  `oneremarks` varchar(255) NOT NULL,
  `twomarks` int(11) NOT NULL,
  `tworemarks` varchar(200) NOT NULL,
  `threeamarks` int(11) NOT NULL,
  `threearemarks` varchar(200) NOT NULL,
  `threebmarks` int(11) NOT NULL,
  `threebremarks` varchar(200) NOT NULL,
  `threecmarks` int(11) NOT NULL,
  `threecremarks` varchar(200) NOT NULL,
  `threedmarks` int(11) NOT NULL,
  `threedremarks` varchar(200) NOT NULL,
  `fivemarks` int(11) NOT NULL,
  `fiveremarks` varchar(200) NOT NULL,
  `sixmarks` int(11) NOT NULL,
  `sixremarks` varchar(200) NOT NULL,
  `sevenmarks` int(11) NOT NULL,
  `sevenremarks` varchar(200) NOT NULL,
  `eightmarks` int(11) NOT NULL,
  `eightremarks` varchar(200) NOT NULL,
  `ninemarks` int(11) NOT NULL,
  `nineremarks` varchar(200) NOT NULL,
  `tenmarks` int(11) NOT NULL,
  `tenremarks` varchar(200) NOT NULL,
  `elevenmarks` int(11) NOT NULL,
  `elevenremarks` varchar(200) NOT NULL,
  `twelvemarks` int(11) NOT NULL,
  `twelveremarks` varchar(200) NOT NULL,
  `thirteenmarks` int(11) NOT NULL,
  `thirteerenmarks` varchar(200) NOT NULL,
  `fourteenmarks` int(11) NOT NULL,
  `fourteenremarks` varchar(200) NOT NULL,
  `fifteenmarks` int(11) NOT NULL,
  `fifteenremarks` varchar(200) NOT NULL,
  `studentid` varchar(200) NOT NULL,
  `csupid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_csupervisor_assess`
--

INSERT INTO `tbl_csupervisor_assess` (`id`, `onemarks`, `oneremarks`, `twomarks`, `tworemarks`, `threeamarks`, `threearemarks`, `threebmarks`, `threebremarks`, `threecmarks`, `threecremarks`, `threedmarks`, `threedremarks`, `fivemarks`, `fiveremarks`, `sixmarks`, `sixremarks`, `sevenmarks`, `sevenremarks`, `eightmarks`, `eightremarks`, `ninemarks`, `nineremarks`, `tenmarks`, `tenremarks`, `elevenmarks`, `elevenremarks`, `twelvemarks`, `twelveremarks`, `thirteenmarks`, `thirteerenmarks`, `fourteenmarks`, `fourteenremarks`, `fifteenmarks`, `fifteenremarks`, `studentid`, `csupid`) VALUES
(3, 1, 'rttr', 2, '333', 2, '444', 3, 'fv', 4, 'g', 4, 'v', 2, 'fgj', 2, 'tr', 2, 'trtr', 2, 'gfrt', 2, 'fgfg', 2, 'fgfg', 2, 'vf', 2, 'yy', 2, 'uu', 1, 'gg', 2, 'fgf', '1617611936', '505077056');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logbook`
--

CREATE TABLE `tbl_logbook` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(200) NOT NULL,
  `week` varchar(500) NOT NULL,
  `mondayjob` varchar(500) NOT NULL,
  `mondayskill` varchar(500) NOT NULL,
  `tuesdayjob` varchar(500) NOT NULL,
  `tuesdayskill` varchar(500) NOT NULL,
  `wednesdayjob` varchar(500) NOT NULL,
  `wednesdayskill` varchar(500) NOT NULL,
  `thursdayjob` varchar(500) NOT NULL,
  `thursdayskill` varchar(500) NOT NULL,
  `fridayjob` varchar(500) NOT NULL,
  `fridayskill` varchar(500) NOT NULL,
  `studentid` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_logbook`
--

INSERT INTO `tbl_logbook` (`id`, `uniqueid`, `week`, `mondayjob`, `mondayskill`, `tuesdayjob`, `tuesdayskill`, `wednesdayjob`, `wednesdayskill`, `thursdayjob`, `thursdayskill`, `fridayjob`, `fridayskill`, `studentid`) VALUES
(6, '587933850', '1', 'Assigned dev work', 'HTML', 'Wdfvbbfgd ', 'rty5ryh', 'drrt', 'rty5rh6', 'wet4ed4tg', 'trfurt', 'wrgey5dgyh', 'rtu546778', '1617611936');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE `tbl_questions` (
  `id` int(11) NOT NULL,
  `test` varchar(200) NOT NULL,
  `quizno` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`id`, `test`, `quizno`, `question`) VALUES
(3, 'networking', 1, 'A set of devices connected to each other using a physical transmission medium'),
(4, 'networking', 2, 'What is a node'),
(5, 'networking', 3, 'What is connectivity between two devices'),
(6, 'networking', 4, 'Which is not a layer of the OSI reference model'),
(7, 'networking', 5, 'What is the process of breaking down information into smaller, manageable chunks before it is transmitted across the network'),
(8, 'networking', 6, 'What is used for secure communication over a computer network'),
(9, 'networking', 7, 'How many layers are there under TCP/IP'),
(10, 'networking', 8, 'What is the process of sending and receiving data between two media'),
(11, 'networking', 9, 'Which command allows you to check connectivity between network devices on the network'),
(12, 'networking', 10, 'Which address is a unique identifier that is assigned to a Network Interface Card'),
(13, 'software', 1, 'What is a collection of grammar rules for giving instructions to computer or computing devices in order to perform a given task'),
(14, 'software', 2, '__________is a blueprint for creating objects'),
(15, 'software', 3, '_________is a method that is used to create a class object.'),
(16, 'software', 4, '__________ is a container that keeps a specific number of similar data types'),
(17, 'software', 5, 'What is used to build smart machines capable of performing tasks'),
(18, 'software', 6, 'True or False compiled code run faster than interpreted code.'),
(19, 'software', 7, '________ is a rule or step-by-step process that must be followed in order to solve a particular problem'),
(20, 'software', 8, 'Which one is NOT a type of error that can occur during the execution of a computer program?'),
(21, 'software', 9, '________words have predefined meanings in a particular programming language'),
(22, 'software', 10, 'Which one is NOT a type of loops?'),
(23, 'hardware', 1, 'A computer that combines the characteristic of analog and digital computers_________'),
(24, 'hardware', 2, 'WORM stands for?'),
(25, 'hardware', 3, 'Memory unit is a part of ______'),
(26, 'hardware', 4, 'The technique that extends storage capacities of main memory beyond the actual size of the main memory is called _______'),
(27, 'hardware', 5, 'Which bus is a bidirectional bus?'),
(28, 'hardware', 6, 'Which among the following is not a peripheral hardware device in a computer system?'),
(29, 'hardware', 7, 'Which among the following hardware you usually can’t find inside a CPU Casing?'),
(30, 'hardware', 8, 'In a computer keyboard the Alt, Ctrl, Shift, Del & Insert keys are known as ?'),
(31, 'hardware', 9, 'Devices which are used to receive data from central processing unit are classified as ?'),
(32, 'hardware', 10, 'All Operating Systems get their total memory initialized from?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registered_attachments`
--

CREATE TABLE `tbl_registered_attachments` (
  `id` int(11) NOT NULL,
  `studentid` varchar(200) NOT NULL,
  `companyname` varchar(200) NOT NULL,
  `companylocation` varchar(200) NOT NULL,
  `companyaddress` varchar(200) NOT NULL,
  `companycontact` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `startdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_registered_attachments`
--

INSERT INTO `tbl_registered_attachments` (`id`, `studentid`, `companyname`, `companylocation`, `companyaddress`, `companycontact`, `role`, `duration`, `startdate`) VALUES
(5, '1617611936', 'The Newer Company', 'Kiganari Location', '3444-16664 Murutanga', '+94735244233', 'Developer', '12', '2021-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_responses`
--

CREATE TABLE `tbl_responses` (
  `id` int(11) NOT NULL,
  `test` varchar(200) NOT NULL,
  `quizno` int(11) NOT NULL,
  `response` varchar(200) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_responses`
--

INSERT INTO `tbl_responses` (`id`, `test`, `quizno`, `response`, `student_id`) VALUES
(11, 'hardware', 1, 'Super computer', 780697576),
(12, 'hardware', 2, 'Write Once Read Many', 780697576),
(13, 'hardware', 3, 'Central processing unit', 780697576),
(14, 'hardware', 4, 'Multiprogramming', 780697576),
(15, 'hardware', 5, 'None of the above', 780697576),
(16, 'hardware', 6, 'Optical drive', 780697576),
(17, 'hardware', 7, 'Video display unit', 780697576),
(18, 'hardware', 8, 'Special purpose keys', 780697576),
(19, 'hardware', 9, 'Signaled devices', 780697576),
(20, 'hardware', 10, 'ROM', 780697576),
(21, 'software', 1, 'Programming language', 780697576),
(22, 'software', 2, 'Class', 780697576),
(23, 'software', 3, 'Abstract', 780697576),
(24, 'software', 4, 'Variable', 780697576),
(25, 'software', 5, 'Artificial intelligence', 780697576),
(26, 'software', 6, 'False', 780697576),
(27, 'software', 7, 'Flow chart', 780697576),
(28, 'software', 8, 'Runtime', 780697576),
(29, 'software', 9, 'Basic', 780697576),
(30, 'software', 10, 'While', 780697576),
(31, 'networking', 1, 'Network', 780697576),
(32, 'networking', 2, 'Is a system of computers', 780697576),
(33, 'networking', 3, 'Organization', 780697576),
(34, 'networking', 4, 'Data link layer', 780697576),
(35, 'networking', 5, 'Encapsulation', 780697576),
(36, 'networking', 6, 'HTTPs', 780697576),
(37, 'networking', 7, '9', 780697576),
(38, 'networking', 8, 'Transmission', 780697576),
(39, 'networking', 9, 'Tracert', 780697576),
(40, 'networking', 10, 'Unicast address', 780697576),
(161, 'hardware', 1, 'Hybrid computer', 1617611936),
(162, 'hardware', 2, 'Write Original Read Memory', 1617611936),
(163, 'hardware', 3, 'Control unit', 1617611936),
(164, 'hardware', 4, 'Multiprocessing', 1617611936),
(165, 'hardware', 5, 'Address bus and data bus', 1617611936),
(166, 'hardware', 6, 'Keyboard', 1617611936),
(167, 'hardware', 7, 'Video card', 1617611936),
(168, 'hardware', 8, 'Navigation keys', 1617611936),
(169, 'hardware', 9, 'Output/input devices', 1617611936),
(170, 'hardware', 10, 'ROM', 1617611936),
(171, 'software', 1, 'Programming language', 1617611936),
(172, 'software', 2, 'Method', 1617611936),
(173, 'software', 3, 'Abstract', 1617611936),
(174, 'software', 4, 'Variable', 1617611936),
(175, 'software', 5, 'Artificial intelligence', 1617611936),
(176, 'software', 6, 'True', 1617611936),
(177, 'software', 7, 'Algorithm', 1617611936),
(178, 'software', 8, 'Runtime', 1617611936),
(179, 'software', 9, 'Basic', 1617611936),
(180, 'software', 10, 'While', 1617611936),
(181, 'networking', 1, 'Node', 1617611936),
(182, 'networking', 2, 'Is a computer network', 1617611936),
(183, 'networking', 3, 'Cable', 1617611936),
(184, 'networking', 4, 'Interface layer', 1617611936),
(185, 'networking', 5, 'Inheritance', 1617611936),
(186, 'networking', 6, 'HTTPs', 1617611936),
(187, 'networking', 7, '9', 1617611936),
(188, 'networking', 8, 'Connection', 1617611936),
(189, 'networking', 9, 'Ping', 1617611936),
(190, 'networking', 10, 'Ip address', 1617611936);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supervisor_assess`
--

CREATE TABLE `tbl_supervisor_assess` (
  `id` int(11) NOT NULL,
  `studentid` varchar(200) NOT NULL,
  `supid` varchar(200) NOT NULL,
  `intelmarks` int(11) NOT NULL,
  `intelremarks` varchar(200) NOT NULL,
  `indmarks` int(11) NOT NULL,
  `indremarks` varchar(200) NOT NULL,
  `commarks` int(11) NOT NULL,
  `comremarks` varchar(200) NOT NULL,
  `innomarks` int(11) NOT NULL,
  `innoremarks` varchar(200) NOT NULL,
  `appmarks` int(11) NOT NULL,
  `appremarks` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `totalremarks` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supervisor_assess`
--

INSERT INTO `tbl_supervisor_assess` (`id`, `studentid`, `supid`, `intelmarks`, `intelremarks`, `indmarks`, `indremarks`, `commarks`, `comremarks`, `innomarks`, `innoremarks`, `appmarks`, `appremarks`, `total`, `totalremarks`, `date`) VALUES
(8, '1617611936', '381586187', 5, 'Rsr', 5, 'hjhjhjhjh', 5, 'ghgdhd', 5, ' fgdfgf', 5, '45455', 55, 'edfwre', '2021-07-27 20:53:33');

-- --------------------------------------------------------

--
-- Structure for view `student_view`
--
DROP TABLE IF EXISTS `student_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_view`  AS SELECT `students`.`fname` AS `fname`, `students`.`lname` AS `lname`, `students`.`regno` AS `regno`, `students`.`supervisor` AS `supervisor`, `students`.`csupervisor` AS `csupervisor`, `students`.`course` AS `course`, `students`.`year` AS `year` FROM `students` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_supervisors`
--
ALTER TABLE `company_supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_supervisors`
--
ALTER TABLE `school_supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_answers`
--
ALTER TABLE `tbl_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attachments`
--
ALTER TABLE `tbl_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_csupervisor_assess`
--
ALTER TABLE `tbl_csupervisor_assess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_registered_attachments`
--
ALTER TABLE `tbl_registered_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_responses`
--
ALTER TABLE `tbl_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supervisor_assess`
--
ALTER TABLE `tbl_supervisor_assess`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `company_supervisors`
--
ALTER TABLE `company_supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_supervisors`
--
ALTER TABLE `school_supervisors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_answers`
--
ALTER TABLE `tbl_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tbl_attachments`
--
ALTER TABLE `tbl_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_csupervisor_assess`
--
ALTER TABLE `tbl_csupervisor_assess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_logbook`
--
ALTER TABLE `tbl_logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_registered_attachments`
--
ALTER TABLE `tbl_registered_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_responses`
--
ALTER TABLE `tbl_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `tbl_supervisor_assess`
--
ALTER TABLE `tbl_supervisor_assess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
