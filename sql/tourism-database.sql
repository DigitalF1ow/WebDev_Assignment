-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 07:02 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(10) UNSIGNED NOT NULL,
  `activity_name` varchar(100) NOT NULL,
  `activity_desc` text NOT NULL,
  `activity_image` varchar(255) NOT NULL,
  `activity_alt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'Admin Name', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(10) UNSIGNED NOT NULL,
  `destination_name` varchar(255) NOT NULL,
  `destination_desc` text NOT NULL,
  `destination_image` varchar(100) NOT NULL,
  `destination_alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `destination_name`, `destination_desc`, `destination_image`, `destination_alt`) VALUES
(1, 'Sunway Lagoon', 'Sunway Lagoon is the one-stop place for fun over 90 attractions spread across 88 acres, Sunway Lagoon provides the ultimate theme park experience in 6 adventure zones.', 'sunway21.png', 'sunwaylagoon picture'),
(2, 'If you want to view the city from a bird\'s eye view, check out the Petronas Twin Towers.', 'Petronas Twin Towers is a multipurpose development area in Kuala Lumpur, Malaysia. The area is located around Jalan Ampang, Jalan P. Ramlee, Jalan Binjai, Jalan Kia Peng and Jalan Pinang. There are also hotels within walking distance such as G Tower, Mandarin Oriental, Grand Hyatt Kuala Lumpur and InterContinental Kuala Lumpur.', 'klcc.jpeg', 'klcc towers'),
(3, 'Food lovers who want to thrive in the feast and richness of calories, come to Chinatown, Petaling Jaya', 'Ask anyone who’s been to Malaysia about Petaling Street and they will cite it as a shopper’s haven, albeit in a different league when compared to its more glamourous counterparts, Bukit Bintang and KLCC. A well-known shopping district, the whole area transforms into a lively and vibrant night market after dark, with hundreds of stalls selling all kinds of stuff at dirt-cheap prices, making it the most happening night market in the city.', 'pjstreet.jpg', 'China Town Petaling Jaya Street'),
(4, 'Perdana Botanical Garden Kuala Lumpur', 'The Perdana Botanical Garden is located in the heart of Kuala Lumpur, it has been the green part of the city for over a decade. It was originally a recreational park where the public are able to jog around the area but with the abundances of tropical plants planted in the park. It is now revitalised and rehabilitated as a Botanical Garden for everyone to come and smell the flowers.', 'garden.jpg', 'Perdana Botanic Garden Picture'),
(5, 'Those who wanted a get-away from the hustling and bustling of the concrete urbania are welcomed to the KL Eco Forest Park.', 'Located in the heart of the city\'s centre and the only city in the world to preserve a rainforest in the country, the KL Eco Forest Park is one of the places that is recommended for nature lovers out there. The park itself is actually a Bukit Nanas Forest Reserve and serves as a heritage in this city. There are various types of trees, herbs to be found and a well-maintained walking trails for hiking lovers. There is also a camp site for those that are eager to have a campfire experience. Tons of activities can be done here too!', 'ecopark.jpg', 'KL Eco Forest Park Picture'),
(6, 'Batu Caves, Gombak', 'Batu Caves, one of Kuala Lumpur’s most frequented tourist attractions, is a limestone hill comprising three major caves and a number of smaller ones. Located approximately 11 kilometres to the north of Kuala Lumpur, this 100-year-old temple features idols and statues erected inside the main caves and around it. Incorporated with interior limestone formations said to be around 400 million years old, the temple is considered an important religious landmark by Hindus.', 'batucaves.jpg', 'Batu Caves Picture');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `ic` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `area_code` int(4) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `tour` varchar(50) NOT NULL,
  `numAdult` int(11) NOT NULL,
  `numChild` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `first_name`, `last_name`, `ic`, `email`, `area_code`, `phone_number`, `tour`, `numAdult`, `numChild`) VALUES
(0, 'Darren', 'Abbot', '123456-13-1111', '123@gmail.com', 123, 123, 'Tour 2', 4, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
