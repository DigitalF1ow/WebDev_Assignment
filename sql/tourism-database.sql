-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 02:38 AM
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
CREATE DATABASE IF NOT EXISTS `tourism-database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tourism-database`;

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

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `activity_name`, `activity_desc`, `activity_image`, `activity_alt`) VALUES
(1, 'Skytropolis Indoor Theme Park', 'Spanning over 400,000 sq ft, Skytropolis Indoor Theme Park promises endless fun for everyone in the family! Experience a world of adventures in a convenient location at First World Plaza and adjacent to SkyAvenue. It is located at Genting Highlands, Pahang.', 'genting-highland-themepark.jpg', 'skytropolis genting picture'),
(2, 'Breakout', 'BREAKOUT offers the first escape games with role playing and story lines which will allow you to enjoy an unforgettable and captivating experience. BREAKOUT goes beyond the usual concept of players being merely locked in a dark room and needing to find their way out with some clues. Here you will be immersed in a surreal ambiance similar to being part of an on-going scene from a movie! ', 'breakout.jpg', 'breakout picture'),
(3, 'Hauntu', 'Hauntu is a blend of live theatre performance, role play and storytelling that comes together to provide an engaging experience that’s never been offered before in Kuala Lumpur. Much more than a haunted house, Hauntu features real actors, audience interaction, intricate mazes and interconnected storylines that centre around a colonial hotel filled with mystery and the paranormal. Participants not only get to take on roles within the storylines but also experience Malaysia in different eras from its pre-independence days right up to the present.', 'hantu.jpg', 'hauntu picture'),
(4, 'Aquaria KLCC', 'Aquaria KLCC is a state-of-the-art oceanarium showcasing over 5,000 different exhibits of aquatic and land-bound creatures over a sprawling 60,000 square-foot space in the Concourse Level of the Kuala Lumpur Convention Centre. You can experience the cage rage where it is a custom-made underwater cage placed at the only \"Living Ocean\". We dare you get up-close and personal with our friendly sharks and other fascinating marine creatures!.', 'aquaria.png', 'aquaria KLCC picture'),
(5, 'Petrosains Science Discovery Centre', 'Petrosains, The Discovery Centre - a museum about the science of petroleum? Hmm... sounds rather boring doesn\'t it? But actually it is not at all boring. This is one of Malaysia\'s best science museums with plenty to do and see whatever your age. It is located in Kuala Lumpur\'s most famous landmark, the Petronas Towers.', 'petrosains.jpg', 'Petrosains Science picture'),
(6, 'Superpark Malaysia', 'SuperPark is the friendliest all-in-one indoor activity park on earth, delivering a unique experience of joyful play that excites and unites people all over the world, no matter their age or fitness level. Located in Avenue K Shopping Mall, the activity park boost over 25 fun, healthy and energizing activities in 3 themed areas including Flying Fox, Trampoline, Ice Skate, Baseball among others.', 'superpark.jpg', 'Superpark Malaysia picture');

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
  `meeting_date` date NOT NULL,
  `numAdult` int(11) NOT NULL,
  `numChild` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `first_name`, `last_name`, `ic`, `email`, `area_code`, `phone_number`, `tour`, `meeting_date`, `numAdult`, `numChild`) VALUES
(1, 'David', 'Toriel', '1112-212-22345', 'davidhasehoff@gmail.com', 14, 2014213, 'tour1', '2021-02-24', 4, 5);

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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
