-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 05:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shippingdirectorydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`username`, `password`) VALUES
('admin12345@gmail.com', 'admin12345');

-- --------------------------------------------------------

--
-- Table structure for table `categorynamelist`
--

CREATE TABLE `categorynamelist` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorynamelist`
--

INSERT INTO `categorynamelist` (`id`, `categoryName`) VALUES
(1, 'Cargo Clearing & Forwarding Agents'),
(4, 'Container Inspector'),
(5, 'Marine Consultants'),
(6, 'Shipping Agencies-Container Operations'),
(7, 'Shipping Agencies- Break Bulk Operations & Others'),
(8, 'Ship Brokers'),
(9, 'Stevedoring Contractors'),
(10, 'Cargo Handling Service'),
(11, 'Cargo Surveyors'),
(12, 'Certified Container Inspectors'),
(13, 'Freight Brokers'),
(14, 'Inland Container Terminals/Container Freight Stations'),
(15, 'Freight Forwarding Companies in Sri Lanka'),
(16, 'Legal Advice(Shipping)Companies in Sri Lanka'),
(17, 'Logistic Support Companies in Sri Lanka'),
(18, 'Marine Insurence Companies in Sri Lanka'),
(19, 'Marine Engineers'),
(20, 'Marine Equipment,Supplies & Services'),
(21, 'Marine Services'),
(22, 'Port Operators'),
(23, 'Professional Shipping Education & Shipbroking'),
(24, 'Ship Associations in Sri Lanka'),
(25, 'Ship Classification Socities in Sri Lanka'),
(26, 'Ship Chandlers in Sri Lanka'),
(27, 'Ship Repair Services Companies in Sri Lanka'),
(28, 'Shippers Service Suppliers'),
(29, 'Ship Owners');

-- --------------------------------------------------------

--
-- Table structure for table `form_responses`
--

CREATE TABLE `form_responses` (
  `id` int(255) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `certified` varchar(50) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tell` varchar(20) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `website` varchar(255) NOT NULL,
  `homeaddress` varchar(100) NOT NULL,
  `linkname` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_responses`
--

INSERT INTO `form_responses` (`id`, `companyname`, `name`, `address`, `certified`, `categoryName`, `email`, `tell`, `fax`, `website`, `homeaddress`, `linkname`, `link`) VALUES
(1, ' Logistics International Limited.', 'Arachchi, Kolitha C.', ' 309/15, Negombo Road, Welisara, Colombo, Sri Lanka.', '2003', 'Container Inspector', ' info@lil-lk.com', '+94 11 2228 224', ' +94 11 2239 645', 'www.logisticsinternational.lk', '14, 4th Lane, Polhena, Kelaniya, Sri Lanka.', '', ''),
(8, 'Comaco Survey Bureau Colombo.', 'Anura Perera, Weliwita Angoda Liyanage', 'Comaco Survey Bureau Colombo No.12A, Mission Road, Pita Kotte Sri Lanka.', ' 2004, 1998.', 'Container Inspector', 'comaco@sltnet.lk', '+94-11-4872727', '+91-11-2863461', 'www.comaco.lk', '', '', ''),
(9, 'A A Gem Combine', '', '77A-79A, Main Street, Colombo 11', '', 'Cargo Clearing & Forwarding Agents', ' info@interfishmarket.com ', ' +94 11 2422081', '', 'https://interfishmarket.com', '', '', ''),
(10, ' Master Divers (Pvt) Ltd.', '', '234 / 2, Galle Rd, Colombo 03. Sri Lanka.', '', 'Marine Consultants', 'HQ@masterdivers.lk', '+94 11 2346134', '', 'https://masterdivers.lk', 'No : 03, Baghdad Area, Port of Colombo, Sri Lanka.', '', ''),
(11, 'Dev Engineering (PVT) Ltd', '', 'McCallum Rd, Colombo 07 Sri Lanka', '', 'Marine Consultants', 'info@devmarinesl.com', '+94 11 2676230', '+94 11 2 676 230', 'diving@devmarinesl.com', '', '', ''),
(12, 'ABC SHIPPING (PVT) LIMITED', '', '117, HUNUPITIYA ROAD, COLOMBO 2', '', 'Shipping Agencies-Container Operations', 'info@abcgroup.lk', '+94 11 438951', '+94 11 438956', 'https://abcgroup.lk/', '', '', ''),
(13, 'ACRUS SHIPPING(PVT)LTD', '', 'Justice Akbar Mawatha, 2/3 Building number – 88 Colombo - 02.', '', 'Shipping Agencies- Break Bulk Operations & Others', 'operations@acrusshipping.com', '+94 11 2448988', '+94 772 392 912', 'https://acrusshipping.com/', '', '', ''),
(14, 'The Federation of National Association of Ship Brokers.', ' General Manager:Eleonora Modde', '7th Floor, Walsingham House, Seething Lane, LONDON EC3N 4AH United Kingdom', ' 1969', 'Ship Brokers', ' generalmanager@fonasba.com', '', '', 'https://www.fonasba.com/', '', '', ''),
(15, 'The Federation of National Association of Ship Brokers.', 'General Manager:Eleonora Modde', '10th Lane 39a  Colombo P.O. BOX:824  Western Province 00300 	Sri Lanka', '	1996', 'Stevedoring Contractors', 'premier@premierlk.com', '+942591492', '+94112596545', 'www.premierlk.com', '', '', ''),
(16, 'Broadways International (Pvt) Ltd', '', '88, Level 4,Justice Akbar Mawatha, Colombo 02', '', 'Cargo Handling Service', 'dalugoda@broadwaysipl.biz', '+94 11 2344864', '', 'www.broadwaysipl.biz', '', '', ''),
(17, 'Baltic Control Int\'l (Pvt) Ltd', '', '05th Floor, Abdul Cafoor Building, Colombo 01', '', 'Cargo Surveyors', '', ' +94 11 2345304', '+94 11 2328996', 'https://lankainformation.lk/', '', '', ''),
(19, 'Dartrans ( Pvt ) Ltd', '', '#260, Dart Freight Centre, Sri Ramanathan Mawatha, Colombo 15', '', 'Freight Brokers', 'dartcmb@dartwestasia.com', '+94 114609658', '+94 112448499', '', '', '', ''),
(20, ' Ace Containers (Pvt) Ltd', '', '', '', 'Inland Container Terminals/Container Freight Stations', 'acecont@slt.lk', '+94 11 330580, +94 1', '', '', '', '', ''),
(21, ' Ace Cargo (Pvt) Ltd ', '', '', '', 'Freight Forwarding Companies in Sri Lanka', 'ace.info@acecargo.lk ', '+94 11 330580', '', '', '', '', ''),
(25, '', '', '', '', 'Certified Container Inspectors', '', '', '', '', '', ' Argentina', 'https://www.slpa.lk/port-colombo/country-argentina'),
(26, '', '', '', '', 'Certified Container Inspectors', '', '', '', '', '', ' Australia', 'https://www.slpa.lk/port-colombo/australia'),
(27, '', '', '', '', 'Certified Container Inspectors', '', '', '', '', '', ' Algeria', 'https://www.slpa.lk/port-colombo/country-algeria');

-- --------------------------------------------------------

--
-- Table structure for table `userregister`
--

CREATE TABLE `userregister` (
  `id` int(255) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userregister`
--

INSERT INTO `userregister` (`id`, `emp_id`, `name`, `password`) VALUES
(1, 'Dip/2024/237', 'kavishka ', 'e61135859ce6'),
(4, 'Dip/2024/238', 'nafla', '746091fc5fee'),
(6, 'Dip/2024/250', 'nadeeshani', '25f9e794323b'),
(7, 'Dip/2024/251', 'sithara sathsarani', 'e10adc3949ba'),
(8, 'Dip/2024/252', 'anbu', '71b3b26aaa31'),
(9, 'Dip/2024/249', 'tharushi', '$2y$10$9H3AA'),
(10, 'Dip/2024/257', 'naflaa', '$2y$10$gHDnG'),
(11, 'Certi/2024/119', 'kavishka sathsarani', '8649d3f4a6e5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `categorynamelist`
--
ALTER TABLE `categorynamelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_responses`
--
ALTER TABLE `form_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregister`
--
ALTER TABLE `userregister`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorynamelist`
--
ALTER TABLE `categorynamelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `form_responses`
--
ALTER TABLE `form_responses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `userregister`
--
ALTER TABLE `userregister`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
