-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 06:09 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_username`, `admin_password`) VALUES
(1, 'islam', '123');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `chefID` int(11) NOT NULL,
  `chefName` varchar(20) NOT NULL,
  `job` varchar(15) NOT NULL,
  `img` varchar(20) DEFAULT NULL,
  `sm_fb` varchar(100) DEFAULT NULL,
  `sm_twitter` varchar(100) DEFAULT NULL,
  `sm_in` varchar(100) DEFAULT NULL,
  `sm_google` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`chefID`, `chefName`, `job`, `img`, `sm_fb`, `sm_twitter`, `sm_in`, `sm_google`) VALUES
(1, 'Stephen Robert', 'Main Chef', NULL, 'https://www.fb.com', 'https://www.twitter.com', 'https://www.linkedin.com/', NULL),
(2, 'Inna Steward', 'Head Chef', NULL, 'https://www.fb.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `expertID` int(11) NOT NULL,
  `expName` varchar(30) NOT NULL,
  `expJob` varchar(15) NOT NULL,
  `expImg` varchar(20) DEFAULT NULL,
  `sm_facebook` varchar(100) DEFAULT NULL,
  `sm_twitter` varchar(100) DEFAULT NULL,
  `sm_linkedIn` varchar(100) DEFAULT NULL,
  `sm_google` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expert`
--

INSERT INTO `expert` (`expertID`, `expName`, `expJob`, `expImg`, `sm_facebook`, `sm_twitter`, `sm_linkedIn`, `sm_google`) VALUES
(1, 'Stephen Robert', 'Main Chef', 'Stephen Robert.png', 'www.fb.com', 'https://twitter.com', 'https://www.linkedin.com/', 'https://www.google.com.eg/'),
(2, 'Inna Steward', 'Head Chef', 'Inna Steward.png', 'www.fb.com', NULL, NULL, 'https://www.google.com.eg/'),
(3, 'Andrean Treas', 'Sous Chef', 'Andrean Treas.png', NULL, 'https://twitter.com', 'https://www.linkedin.com/', NULL),
(6, 'Stephane bechob', 'Chef Assistant', 'Stephane bechob.png', 'www.fb.com', NULL, NULL, NULL),
(7, 'Stephane bechobs', 'Chef Assistants', 'Stephane bechob.png', 'www.fb.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `description` text,
  `type` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `itemName`, `description`, `type`, `price`, `img`) VALUES
(106, 'Classic Nachos', 'Nachos, melted cheese, jalapeno, beans, queso and seasoned beef, served with Pico de Gallo and sour cream', 'Appetizers', 98, 'Classic Nachos.jpg'),
(107, 'Texas Cheese Fries', 'French fries, topped with smoked bacon, jalapeno, green onion, chili and cheese, served with ranch dressing', 'Appetizers', 64, 'Texas Cheese Fries.jpg'),
(108, 'Chips & Salsa', 'Crispy tostada chips and sauce', 'Appetizers', 45, 'Chips & Salasa.jpg'),
(109, 'Triple Dipper', '3 Appetizers, boneless buffalo wings, wings over buffalo, Southwestern egg rolls, chicken crispers, big mouth bites or fried cheese, served with sauce', 'Appetizers', 138, 'Triple Dipper.jpg'),
(110, 'Onion Rings', 'Crispy onion rings and Southwestern spices. Served with house-made ranch sauce', 'Appetizers', 32, ''),
(111, 'Skillet Queso', 'Served with cheese dip with seasoned beef', 'Appetizers', 89, ''),
(112, 'Signature Wings - Boneless', 'Pieces of boneless chicken, beef bacon, mix cheese, spicy sauce, green onions an ranch sauce.', 'Appetizers', 93, ''),
(113, 'Oldtimer Cheese Burger', 'Grilled beef burger patty, served with red onion and mustard', 'Bigger Mouth Burger', 99, 'Oldtimer with Cheese Burger.jpg'),
(114, 'Mushroom Swiss Burger Classic', 'Grilled beef burger patty, Swiss cheese, sautÃ©ed mushroom and mayonnaise, served on a potato bun', 'Bigger Mouth Burger', 109, 'Mushroom Swiss Burger.jpg'),
(115, 'Big Mouth Burger Bites', '2 Mini bites, grilled beef burger patty, smoked beef bacon, American cheese and sauteed onion, serve', 'Bigger Mouth Burger', 98, 'Big Mouth Burger Bites.jpg'),
(116, 'Southern Smokehouse Burger Classic', 'Grilled beef burger patty, smoked beef bacon, melted cheddar cheese, crispy onion rings, lettuce, tomatoes, garlic dill pickled cucumber and Chili\'s signature sauce, served with Chili\'s classic barbeque sauce, served on a potato bun', 'Bigger Mouth Burger', 113, 'Southwestern Egg Rolls.jpg'),
(117, 'Grilled Chicken Sandwich', 'Grilled chicken slices, smoked beef bacon, Swiss cheese, lettuce, tomatoes and honey mustard dressing, served with French fries, served in potato bread with pickled cucumber', 'Sandwiches', 98, 'Grilled Chicken Sandwich.jpg'),
(118, 'Buffalo Chicken Ranch Sandwich', 'Crispy chicken, tomatoes, lettuce, buffalo wing sauce and ranch dressing, served with French fries, served in potato bread with pickled cucumber', 'Sandwiches', 87, 'Buffalo Chicken Ranch Sandwich.jpg'),
(119, '	 Philly Cheese Steak Sandwich', 'Shaves steak, pepper, onion and cheese sauce, served in Philly roll with French fries', 'Sandwiches', 111, 'Philly Cheese Steak Sandwich.jpg'),
(120, 'Top Shelf Fillet', '225 Gm pepper beef tenderloin, seasoned with herbs, garlic and whole grain mustard, topped with sautÃ©ed mushroom over garlic toast', 'Saucier Steaks', 290, 'Top Shelf Fillet.jpg'),
(121, 'Classic Rib-Eye', '335 Gm steak, topped with butter, served with steamed broccoli, loaded mashed potato and garlic toast', 'Saucier Steaks', 190, 'Classic Rib-Eye.jpg'),
(123, 'Chili\'s Classic Sirloin', '225 Gm sirloin, topped with butter, served with steamed broccoli, loaded mashed potato and garlic toast', 'Saucier Steaks', 299, ''),
(124, 'New Sizzling Honey Chiptole Shrimp And Sirloin', 'New Sizzling Honey Chiptole Shrimp And Sirloin', 'Saucier Steaks', 250, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuID`, `name`) VALUES
(39, 'Appetizers'),
(40, 'Bigger Mouth Burger'),
(41, 'Sandwiches'),
(42, 'Saucier Steaks');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `sname` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `city` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fname`, `sname`, `email`, `phone`, `city`) VALUES
(30, 'ahmed', '123', 'ahmed', 'sayed', 'ahmed@g.com', 10000, 'assiut');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`,`admin_username`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`chefID`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`expertID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`),
  ADD UNIQUE KEY `itemName` (`itemName`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `chefID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `expertID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
