-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 08:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_contact` varchar(13) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_contact`, `admin_address`, `admin_password`) VALUES
('admin', 'admin@gmail.com', '019-8765432', '13, Jalan Sungai Ara 4', 'P455w0rd123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_date` date NOT NULL,
  `book_isbn13` varchar(13) NOT NULL,
  `book_description` varchar(500) NOT NULL,
  `book_category` varchar(200) NOT NULL,
  `book_trade_price` int(11) NOT NULL,
  `book_retail_price` int(11) NOT NULL,
  `book_quantity` int(11) NOT NULL,
  `book_cover` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_author`, `book_date`, `book_isbn13`, `book_description`, `book_category`, `book_trade_price`, `book_retail_price`, `book_quantity`, `book_cover`) VALUES
(0, 'Ultimate Factivity Collection: Space: Create Your Own Fun-Packed Book!', 'DK Children', '2016-06-09', ' 978146544430', 'A book about space', 'Learning', 12, 25, 8, 'space.jpg'),
(0, 'The Legend of the Howling Werewolf (148) (The Boxcar Children Mysteries)', 'Albert Whitman', '2018-06-14', '9780807507414', 'A book about The Legend of the Howling Werewolf', 'Thriller', 8, 12, 12, 'howling.jpg'),
(1, 'The Midnight Children', 'Dan Gemeinhart', '2022-10-04', '9781250196729', 'A book about Midnight Children', 'Fantasy', 7, 15, 11, 'midnight.jpg'),
(2, 'Children of Stardust', 'Edudzi Adodo', '2022-10-04', '9781324030775', 'A book about Children of Stardust', 'Fiction', 6, 15, 14, 'children.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_cover` varchar(255) NOT NULL,
  `book_isbn13` varchar(13) NOT NULL,
  `book_retail_price` varchar(255) NOT NULL,
  `book_quantity` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `username`, `book_id`, `book_name`, `book_cover`, `book_isbn13`, `book_retail_price`, `book_quantity`, `quantity`) VALUES
(38, 'customer1', 0, 'The Midnight Children', 'midnight.jpg', '9781250196729', '15', 11, 2),
(39, 'customer1', 0, 'The Legend of the Howling Werewolf (148) (The Boxcar Children Mysteries)', 'howling.jpg', '9780807507414', '12', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_ID` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `suggestion` varchar(255) NOT NULL,
  `admin_reply` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_ID`, `username`, `name`, `email`, `service`, `suggestion`, `admin_reply`) VALUES
(1, 'customer1', 'Customer', 'customer@gmail.com ', 'Good', 'None', 'Thank you for your feedback!'),
(2, 'customer2', 'Jane', 'janedoe@gmail.com ', 'Okay', 'Very good!', 'Thank you'),
(3, 'customer2', 'Leo Tan', 'leo234@gmail.com ', 'Bad', 'Update more book to choose', 'Ok, sorry for the inconvenience. I will update this issue to the management. Thanks for your feedback!'),
(4, 'customer1', 'Customer', 'customer@gmail.com ', 'Okay', 'none', 'Thanks!'),
(5, 'customer1', 'Customer', 'customer@gmail.com ', 'Good', 'Very good service', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` int(5) NOT NULL,
  `cardname` varchar(100) NOT NULL,
  `cardnumber` varchar(100) NOT NULL,
  `expmonth` varchar(50) NOT NULL,
  `expyear` year(4) NOT NULL,
  `cvv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_ID`, `fullname`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expmonth`, `expyear`, `cvv`) VALUES
(1, 'ABC', 'abc@hotmail.com', '123, Jalan ABC, Taman ABC', 'Paya Terubong', 'Penang', 11600, 'ABC', '1111-2222-3333-4444', 'MARCH', 2023, '123'),
(2, 'Winson', 'winson@hotmail.com', '3, Jalan Merah', 'Georgetown', 'Penang', 11200, 'Winson', '1234-2314-3467-5634', 'APRIL', 2024, '437'),
(3, 'Customer', 'customer@gmail.com', '12, Jalan Sungai Ara 5', 'Georgetown', 'Penang', 11700, 'Customer', '1111-2222-3333-4567', 'APRIL', 2023, '345'),
(4, 'Jane Doe', 'jane@gmail.com', '12, Jalan Sungai Ara 3', 'Georgetown', 'Penang', 11700, 'Jane Doe', '1234-2345-3456-4567', 'MAY', 2025, '234'),
(5, 'Customer', 'customer@gmail.com', '12, Jalan Sungai Ara 6', 'Georgetown', 'Penang', 11700, 'Customer', '1111-2345-5678-1234', 'JANUARY', 2023, '345'),
(6, 'Customer', 'customer@gmail.com', '12, Jalan Sungai Ara 7', 'Georgetown', 'Penang', 11700, 'Customer', '1111-2222-3333-4444', 'JANUARY', 2022, '123'),
(7, 'Customer', 'customer@gmail.com', '12, Jalan Sungai Ara 7', 'Georgetown', 'Penang', 11700, 'Customer', '1111-2222-3333-4444', 'JANUARY', 2022, '123'),
(8, 'Customer', 'customer@gmail.com', '12, Jalan Sungai Ara 6', 'Georgetown', 'Penang', 11700, 'Customer', '1111-2222-3333-4444', 'JANUARY', 2023, '123'),
(9, 'Customer', 'customer@gmail.com', '12, Jalan Sungai Ara 7', 'Georgetown', 'Penang', 11700, 'Customer', '1111-2222-3333-4444', 'JANUARY', 2023, '123'),
(10, 'Customer Test', 'customer@gmail.com', '12, Jalan Sungai Ara 7', 'Georgetown', 'Penang', 11700, 'Customer', '1111-2222-3456-6789', 'MARCH', 2023, '123'),
(11, 'Customer', 'customer@gmail.com', '12, Jalan Sungai Ara 7', 'Georgetown', 'Penang', 11700, 'Customer', '1234-1234-1234-1234', 'MARCH', 2027, '123'),
(12, 'Customer', 'customer@gmail.com', '12, Jalan Sungai Ara 5', 'Georgetown', 'Penang', 11700, 'Customer', '1111-2345-4567-7890', 'MARCH', 2023, '123'),
(13, 'John Tan', 'john@gmail.com', '12 Jalan Hijau', 'Georgetown', 'Penang', 11700, 'John Tan', '1111-2222-3333-4444', 'MARCH', 2023, '123'),
(14, 'John Tan', 'john@gmail.com', '12 Jalan Hijau', 'Georgetown', 'Penang', 11700, 'John Tan', '1111-2222-3333-4444', 'JANUARY', 2024, '123');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `username_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`username_id`, `fname`, `lname`, `contact_number`, `address`, `city`, `country`, `state`, `zip_code`) VALUES
(1, 'Lee', 'Ying', '16', 'Bandar Baru Air Itam', 'Georgetown', 'Malaysia', 'Penang', 11500),
(2, 'Lee', 'Yi Ying', '016-4786343', '8c-04-02,Lebuhraya Thean Teik', 'Ayer Itam', 'Malaysia', 'Penang', 11500),
(3, 'Lee', 'Yi Ying', '016-4786343', '8c-04-02,Lebuhraya Thean Teik', 'Ayer Itam', 'Malaysia', 'Penang', 11500),
(4, 'Customer', 'Test', '012-3456789', '12, Jalan Sungai Ara 5', 'Georgetown', 'Malaysia', 'Penang', 11700),
(5, 'Jane', 'Test', '012-3456789', '12, Jalan Sungai Ara 7', 'Georgetown', 'Malaysia', 'Penang', 11700),
(6, 'Customer', 'Doe', '012-3456789', '12, Jalan Sungai Ara 6', 'Georgetown', 'Malaysia', 'Penang', 11700),
(7, 'John', 'Tan', '016-3456789', '12 Jalan Hijau', 'Georgetown', 'Malaysia', 'Penang', 11700),
(8, 'John', 'Tan', '016-3456789', '12 Jalan Hijau', 'Georgetown', 'Malaysia', 'Penang', 11700);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `contact`, `dob`, `address`, `password`) VALUES
('customer1', 'customer@gmail.com', 12, '2000-03-08', '12, Jalan Sungai Ara 7', 'Password1'),
('customer2', 'customer2@gmail.com', 12, '2007-06-08', '12, Jalan Sungai Ara 6', 'p455w0rd');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_date` date NOT NULL,
  `book_isbn13` varchar(13) NOT NULL,
  `book_description` varchar(255) NOT NULL,
  `book_category` varchar(200) NOT NULL,
  `book_retail_price` int(11) NOT NULL,
  `book_quantity` int(11) NOT NULL,
  `book_cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `username`, `book_name`, `book_author`, `book_date`, `book_isbn13`, `book_description`, `book_category`, `book_retail_price`, `book_quantity`, `book_cover`) VALUES
(2, 'customer2', 'Cognition: Exploring the Science of the Mind', 'Daniel Reisberg', '2021-12-10', ' 978039387760', 'This book explains about cognition', 'Science', 8, 14, 'book9.jpg'),
(8, 'customer1', 'The Midnight Children', 'Dan Gemeinhart', '2022-10-04', '9781250196729', 'A book about Midnight Children', 'Fantasy', 15, 11, 'midnight.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_isbn13`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD UNIQUE KEY `feedback_ID` (`feedback_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`username_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `username_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
