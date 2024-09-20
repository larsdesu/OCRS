-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 04:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcrimereport`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcands`
--

CREATE TABLE `tblcands` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `commentDate` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `displayComment` varchar(3) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcands`
--

INSERT INTO `tblcands` (`id`, `email`, `comments`, `commentDate`, `displayComment`) VALUES
(2, 'facebook@gmail.com', 'Yaharooo!', '', 'YES'),
(31, 'larsenatienza@gmail.com', 'hello worlddddd!!!!!!!!!!!!!!!!', '', 'YES'),
(35, 'larsdesu@gmail.com', 'The Online Crime Reporting System has been a crucial ally in ensuring our community\'s safety. Its user-friendly interface empowers us to report incidents swiftly and efficiently from the comfort of our homes. The secure and confidential nature of the', '2023-11-18 21:03:59', 'NO'),
(36, 'twitter@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae officiis amet velit ab nobis dignissimos voluptatem, doloribus nostrum deleniti, nesciunt ullam mollitia dicta.', '2023-11-18 21:04:18', 'NO'),
(37, 'x@gmail.com', 'Hiiii! this is one of the asd jwq asd  xmn osjow qe ', '2023-11-18 21:56:28', 'YES'),
(40, 'qwe@gmail.com', 'dasdw', '2023-11-22 23:56:41', 'NO'),
(41, 'larsdesu@gmail.com', 'dsadas', '2023-11-26 13:43:18', 'NO'),
(42, 'larsdesu34@gmail.com', 'dwqersa', '2023-11-28 22:09:36', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `tblcases`
--

CREATE TABLE `tblcases` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNum` bigint(11) NOT NULL,
  `crimeType` varchar(100) NOT NULL,
  `crimeImg` varchar(250) NOT NULL,
  `crimeDescrip` varchar(300) NOT NULL,
  `crimeLoc` varchar(250) NOT NULL,
  `crimeDate` varchar(50) NOT NULL,
  `crimeTime` varchar(50) NOT NULL,
  `reportProgress` varchar(50) NOT NULL DEFAULT 'SUBMITTED',
  `crimeUpdate` varchar(50) NOT NULL,
  `dateofReport` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcases`
--

INSERT INTO `tblcases` (`id`, `email`, `phoneNum`, `crimeType`, `crimeImg`, `crimeDescrip`, `crimeLoc`, `crimeDate`, `crimeTime`, `reportProgress`, `crimeUpdate`, `dateofReport`) VALUES
(1000000326, 'larsenatienza917@gmail.com', 9053181535, 'Cyberbullying', '20231127062343_Screenshot (164).png', '', 'Batangas City', '2023-11-27', '', 'RESOLVED', '2023-11-27 12:43:00', '2023-11-27 13:23:43'),
(1000000327, 'larsenatienza917@gmail.com', 9053181535, 'Murder', '20231127123851_864021aaeedc7124ff9088204f4ac222.jpg', '', 'Pampanga City', '2023-11-01', '23:38', 'RESOLVED', '2023-11-28', '2023-11-27 19:38:51'),
(1000000338, 'jostien@gmail.com', 11111111111, 'Hacking', '20231128190921_704c1edd490a6d9742076775378d8ece.jpg', '', 'Baguio City', '2023-06-03', '', 'RESOLVED', '2023-11-28', '2023-11-29 02:09:21'),
(1000000341, 'larsenatienza917@gmail.com', 11111111111, 'Reckless driving', '20231128201408_Maryland Reckless Driving Lawyer _ Aggressive Driving Defense.jpg', '', 'Lipa City', '2023-11-24', '', 'RESOLVED', '2023-11-29', '2023-11-29 03:14:08'),
(1000000343, 'mernels@gmail.com', 64444444444, 'Arson', '20231129080901_4e316f6ee4d055b60b2f15d3cae288c9.jpg', '', 'Luneta Park', '2023-03-14', '', 'RESOLVED', '2023-11-29', '2023-11-29 15:09:01'),
(1000000344, 'stermase@gmail.com', 88888888888, 'Vandalism', '20231129092450_Final Stand.jpg', '', 'Malvar', '2023-11-24', '22:24', 'RESOLVED', '2023-11-29', '2023-11-29 16:24:50'),
(1000000345, 'jemansqoi@gmail.com', 78434234343, 'Drug Manufacturing', '20231129092854_MethLa1.jpg', '', 'Nasugbu', '2023-11-11', '', 'RESOLVED', '2023-11-29', '2023-11-29 16:28:54'),
(1000000346, 'opewq@gmail.com', 67434653454, 'Computer-based fraud', '20231129093025_Should Homeowners Insurance Cover Cyber Fraud_.jpg', '', 'Talisay', '2023-11-25', '', 'RESOLVED', '2023-11-29', '2023-11-29 16:30:25'),
(1000000347, 'jerico253@gmail.com', 85546253243, 'Animal Cruelty', '20231129093555_Emaciated_Street_Dog_Animal_Abuse_Rawmate_Blog_grande.jpg', '', 'Cavite', '2023-11-23', '', 'RESOLVED', '2023-11-29', '2023-11-29 16:35:55'),
(1000000377, 'atienzalarsen@gmail.com', 9053181535, 'Stalking', '20231202144313_images.jpg', '', 'Tanauan City', '2023-12-02', '', 'RESOLVED', '2023-12-02', '2023-12-02 21:43:13'),
(1000000378, 'larsenatienza917@gmail.com', 9053464342, 'Burglary', '20231209141143_4e316f6ee4d055b60b2f15d3cae288c9.jpg', 'ASDDSA', 'Tanauan City', '2023-12-09', '', 'REVIEWING', '2023-12-09', '2023-12-09 21:11:43'),
(1000000379, 'dontdie000@gmail.com', 9053464342, 'Cyberbullying', '20231209143252_864021aaeedc7124ff9088204f4ac222.jpg', 'Bullying is bad!!', 'Lipa City', '2023-12-09', '', 'RESOLVED', '2023-12-09', '2023-12-09 21:32:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcands`
--
ALTER TABLE `tblcands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcases`
--
ALTER TABLE `tblcases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcands`
--
ALTER TABLE `tblcands`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tblcases`
--
ALTER TABLE `tblcases`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000380;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
