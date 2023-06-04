-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 09:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartorder`
--

CREATE TABLE `cartorder` (
  `order_id` int(10) NOT NULL,
  `order_name` varchar(50) NOT NULL,
  `order_address` varchar(100) NOT NULL,
  `order_country` varchar(100) NOT NULL,
  `order_city` varchar(100) NOT NULL,
  `order_province` varchar(100) NOT NULL,
  `order_phone` int(10) NOT NULL,
  `order_email` varchar(100) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartorder`
--

INSERT INTO `cartorder` (`order_id`, `order_name`, `order_address`, `order_country`, `order_city`, `order_province`, `order_phone`, `order_email`, `order_status`, `order_customer_id`) VALUES
(1, 'Ngo Hau', 'ấp 6 kinh hội', 'VietNam', 'cao lãnh', 'Đồng Tháp', 842606360, 'ngoquanghau01052001@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_detail` varchar(100) NOT NULL,
  `category_images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_detail`, `category_images`) VALUES
(2, 'Car', 'Toy car models are miniature replicas of actual vehicles, created for play and display.', 'category_car.jpg'),
(3, 'Robot', 'Toy model robots are miniature replicas of actual robots, created for the purpose of play and entert', 'wp5618425.jpg'),
(4, 'Town', 'A home model is a scaled-down replica of an actual house or a home design created for display, educa', 'world-famous-monuments-skyline-travel-and-tourism-background-vector-illustration-400-218790739.jpg'),
(5, 'Mavel', 'Marvel toys are products inspired by the Marvel superhero universe. Marvel is a popular comic book p', 'channels4_profile_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_username` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_cart` longtext NOT NULL,
  `customer_firstname` varchar(100) NOT NULL,
  `customer_lastname` varchar(100) NOT NULL,
  `customer_country` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_town_city` varchar(100) NOT NULL,
  `customer_province` varchar(100) NOT NULL,
  `customer_phone` int(10) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_username`, `customer_password`, `customer_cart`, `customer_firstname`, `customer_lastname`, `customer_country`, `customer_address`, `customer_town_city`, `customer_province`, `customer_phone`, `customer_email`, `customer_images`) VALUES
(1, 'quanghau', '123', '[{\"id\":\"2\",\"name\":\"Lego The Eiffel Tower 10307\",\"price\":\"2000\",\"image\":\"town_1.png\",\"detail\":\"Lego The Eiffel Tower (10307) is a set of Lego construction products designed based on the famous and iconic structure of Paris, the Eiffel Tower. This Lego set belongs to the Architecture series, where Lego creates world famous architectural models.\",\"category\":\"4\",\"quantity\":\"1\"},{\"id\":\"3\",\"name\":\"Arkham Asylum Asylum\",\"price\":\"370\",\"image\":\"40579.png\",\"detail\":\"Fans of Disney\\u2019s The Haunted Mansion ride will love all the scary-good details in this miniature build-and-display model. Part of the interior is viewable from the back, including the dining room, a chandelier and a gallery. The set includes an exclusive Butler minifigure to add to the display. Fans will recognize paintings of the Hitchhiking Ghosts, Madame Leota and the Gravekeeper. This buildable set makes a perfect gift for miniature collectors and Disney fans of all ages.\",\"category\":\"4\",\"quantity\":\"1\"}]', 'Hau', 'Ngo', 'VietNam', 'ấp 6 kinh hội', 'cao lãnh', 'Đồng Tháp', 842606360, 'ngoquanghau01052001@gmail.com', 'IMG_3401.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_images` varchar(50) NOT NULL,
  `product_detail` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_images`, `product_detail`, `category_id`, `product_quantity`) VALUES
(1, 'Town Hall', 124, '21330_prod.png', 'Build the authentic 3-storey Town Hall! This highly detailed model features large entranceway columns, a coat of arms, a tall bell tower with clock and a large skylight that lets you see inside! On the ground floor, the large hall, tax office and auditorium have everything you need to run the town. ', 4, 72),
(2, 'Lego The Eiffel Tower 10307', 2000, 'town_1.png', 'Lego The Eiffel Tower (10307) is a set of Lego construction products designed based on the famous and iconic structure of Paris, the Eiffel Tower. This Lego set belongs to the Architecture series, where Lego creates world famous architectural models.', 4, 198),
(3, 'Arkham Asylum Asylum', 370, '40579.png', 'Fans of Disney’s The Haunted Mansion ride will love all the scary-good details in this miniature build-and-display model. Part of the interior is viewable from the back, including the dining room, a chandelier and a gallery. The set includes an exclusive Butler minifigure to add to the display. Fans will recognize paintings of the Hitchhiking Ghosts, Madame Leota and the Gravekeeper. This buildable set makes a perfect gift for miniature collectors and Disney fans of all ages.', 4, 302),
(4, 'Nano Gauntlet', 70, '76223_1.png', 'The triumph of good over evil With its 6 Infinity Stones, the Nano Gauntlet has the power to undo all the destruction that Thanos unleashed on the universe.', 5, 123),
(5, 'I am Groot', 55, '76217_1.png', 'Marvel fans can build their own Groot and arrange the cute character to recreate his favorite dance moves.', 5, 321),
(6, 'Black Panther', 210, '76215_1.png', 'Guard the kingdom This elegant bust of King T’Challa features hands posed in tribute to the iconic Wakanda Forever salute.', 5, 511),
(7, 'Thor\'s Hammer', 100, '76209_1.png', 'The iconic Mjölnir: for adult fans of Marvel Thor’s legendary hammer, designed with epic scale, impressive detail and iconic elements from Marvel Studios’ Infinity Saga.', 5, 411),
(8, 'The Mighty Bowser™', 270, '71411.png', 'Treat yourself or another Super Mario™ fan This 2,807-piece set features a fully posable character with lots of authentic details to delight fans, plus a display stand.', 3, 441),
(9, 'Optimus Prime', 180, 'optimus_1.webp', 'Autobots, transform and roll out! Just like the real Transformers robots, LEGO® Optimus Prime converts from robot to truck with a few simple steps', 3, 612),
(10, 'Ninja Ultra Combo Mech', 90, '71738_1.webp', 'Endless ninja play possibilities! Playset includes a mech built from 4 detachable models: a tank, jet, car and a smaller mech, as well as 7 minifigures.', 3, 72),
(11, 'Sora\'s Transforming Mech Bike Racer', 50, '71785_1.webp', 'Stunning NINJAGO® mech and bike building set Kids transform a posable ninja mech into a bike to recreate superfast race action from the NINJAGO® Dragons Rising TV series.', 3, 521),
(12, 'Ferrari 812 Competizione', 25, '76914_boxprod_v39.webp', 'Race to the finish line! Ferrari fans can put the driver minifigure behind the wheel and enjoy racing action with this Ferrari 812 Competizione.', 2, 419),
(13, '2022 Ford GT', 120, '42154_boxprod_v39.webp', 'Innovation meets performance Marvel at the aerodynamic shape that makes the 2022 Ford GT such a remarkable car both on and off the track', 2, 511),
(14, 'Chevrolet Camaro Z28', 170, '10304.webp', 'An American car icon Travel back to the heyday of American “pony” cars as you assemble your own LEGO® Chevrolet Camaro Z28 model.', 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `pd_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `order_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`pd_id`, `order_id`, `product_id`, `order_quantity`) VALUES
(1, 1, 2, 2),
(2, 1, 6, 1),
(3, 1, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_fullname`, `user_email`, `user_password`, `user_image`) VALUES
(1, 'admin', 'Quang Hau', '20662002@gmail.com', '123', 'admin_2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartorder`
--
ALTER TABLE `cartorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartorder`
--
ALTER TABLE `cartorder`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `pd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
