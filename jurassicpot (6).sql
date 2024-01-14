-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 07:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jurassicpot`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `aboutus_ID` int(11) NOT NULL,
  `header` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`aboutus_ID`, `header`, `description`) VALUES
(1, 'About Us', 'Jurassic Pot Ph is a 7 year old company that started this idea when they realized that could use their skills as a graphic designer to their new  obsession: collecting plants and succelents and now they also wants to give you joy by bringing these vibrant, dinosaur-themed plant pots!'),
(2, 'An edgier take on gardening', 'Our Mission is to offer quirky pots and lush succulents that will give cheerful energy in your environment because Jurassic Pot PH wants to you to give importance on your workplace.'),
(3, 'Good for kids and newbies', 'Jurassic Pots are low maintenance enough so they are a good start up for kids and newbies to take. If you dont know about maintaning succulents or dinoplant we made a manual about it!');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_add` varchar(200) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email_add`, `message`) VALUES
(1, 'o', 'o@email.com', 'oioioio'),
(2, 'Trueness', 'omg@gmai.com', 'Thissss isss a  testt'),
(13, 'Rechel Ann De Guzman', 'rechel@gmail.com', 'Hi, good evening. Ahm, ask ko lang po kung ilang days po bago ko ma-receive yung items kapag nasa Province area po? Thanks. '),
(14, 'Julina Kay gacura', 'jkay@gmail.com', 'Good day, I ordered your might-apato product in pink-blue gradient variant but the one I received is in the galaxy variant. Is there a way to return the one I received and replace it with a pink-blue gradient variant? Thank you.'),
(15, 'Debbie Tolibas', 'deb@gmail.com', 'Good day! I just want to inquire if you can deliver in Visayas? Thank you'),
(16, 'Edgar Palen', 'ej@gmail.com', 'Good afternoon, is the Iguanodon x Zebra Cactus available now? Because last time I checked, it was already sold out. Just wanted to know lang if meron na, so that I can order na. Thank you!'),
(17, 'Emma garcia', 'EGarcia2@gmail.com', 'Hi, follow up ko lang po yung order ko na Might-Apato in Galaxy variant, last week ko pa po na-place order yon pero, di ko pa rin po nare-receive hanggang ngayon.'),
(18, 'Jay Ramon', 'JayR@gmail.com', 'Hello po good afternoon, Kailan po kayo magre-restock ng Dino Skull na Galaxy variant? '),
(19, 'Alexa Lee', 'AlexaLee@gmail.com', 'Hello, I ordered a customized Dino eggpot 4 days ago and I received it today, but it has a crack at the bottom. Is there a solution for this that you can recommend? or is it possible to refund my payment?'),
(20, 'Ethan Sy', 'ethan@gmail.com', 'Hi, I just wanted to know po kung gaano po kalaki yung Dino skull? Thanks.');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`) VALUES
(1, '            What shipping carrier do you use?                                                       ', '            We use GoGo XPress for most of our courier needs as we find them\r\nprompt with their pick-up and delivery time-frames. GoGo XPress\r\ncovers Metro and Mega Manila addresses. They also deliver to select\r\nprovincial addresses.                                                                   '),
(2, '            How long does delivery take?                                                            ', '            When an order is completed (meaning, fully paid), we book your order\r\nfor pick-up the next business day (including Saturdays). From the\r\npick-up date, your order will be delivered within:\r\n<br /><br />\r\n• 1-3 business days for Metro AND Mega Manila add                                    '),
(3, '            Do you offer same-day delivery?                                                         ', '            Choose to book the delivery yourself (if you want to take\r\nadvantage of vouchers given by Grab or Lalamove).                                                                     '),
(4, '            Do you have a Shopee account?                                                           ', '            Go directly to our Shopee online shop.                                                           '),
(5, '            Do you offer Cash on Delivery (COD) option?                                    ', '            No. If you wish to place an order and pay COD,   we can arrange it for you.                                    ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderID` varchar(250) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `orderDate` date NOT NULL,
  `products` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `orderTotal` int(250) NOT NULL,
  `reviewStatus` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderID`, `userID`, `orderDate`, `products`, `quantity`, `orderTotal`, `reviewStatus`) VALUES
(51, 'JP-4928868364', '1', '2023-06-03', '4', '2', 4720, 'true'),
(52, 'JP-4928868364', '1', '2023-06-03', '52', '2', 4720, 'true'),
(53, 'JP-3734763260', '1', '2023-06-03', '65', '7', 14770, 'false'),
(54, 'JP-3734763260', '1', '2023-06-03', '50', '6', 14770, 'false'),
(55, 'JP-9570837771', '1', '2023-06-03', '50', '4', 4520, 'false'),
(56, 'JP-4250479523', '1', '2023-06-03', '58', '9', 9120, 'false'),
(57, 'JP-3757493821', '7', '2023-06-04', '50', '1', 9720, 'true'),
(58, 'JP-3757493821', '7', '2023-06-04', '72', '1', 9720, 'true'),
(59, 'JP-3757493821', '7', '2023-06-04', '65', '1', 9720, 'true'),
(60, 'JP-3757493821', '7', '2023-06-04', '4', '1', 9720, 'true'),
(61, 'JP-3757493821', '7', '2023-06-04', '19', '1', 9720, 'true'),
(62, 'JP-3757493821', '7', '2023-06-04', '34', '1', 9720, 'true'),
(63, 'JP-3757493821', '7', '2023-06-04', '70', '1', 9720, 'true'),
(64, 'JP-3757493821', '7', '2023-06-04', '68', '1', 9720, 'true'),
(65, 'JP-3757493821', '7', '2023-06-04', '60', '1', 9720, 'true'),
(66, 'JP-1867794157', '4', '2023-06-04', '50', '1', 9720, 'true'),
(67, 'JP-1867794157', '4', '2023-06-04', '72', '1', 9720, 'true'),
(68, 'JP-1867794157', '4', '2023-06-04', '65', '1', 9720, 'true'),
(69, 'JP-1867794157', '4', '2023-06-04', '4', '1', 9720, 'true'),
(70, 'JP-1867794157', '4', '2023-06-04', '19', '1', 9720, 'true'),
(71, 'JP-1867794157', '4', '2023-06-04', '34', '1', 9720, 'true'),
(72, 'JP-1867794157', '4', '2023-06-04', '70', '1', 9720, 'true'),
(73, 'JP-1867794157', '4', '2023-06-04', '68', '1', 9720, 'true'),
(74, 'JP-1867794157', '4', '2023-06-04', '60', '1', 9720, 'true'),
(75, 'JP-4511506128', '5', '2023-06-04', '50', '1', 9720, 'true'),
(76, 'JP-4511506128', '5', '2023-06-04', '72', '1', 9720, 'true'),
(77, 'JP-4511506128', '5', '2023-06-04', '65', '1', 9720, 'true'),
(78, 'JP-4511506128', '5', '2023-06-04', '4', '1', 9720, 'true'),
(79, 'JP-4511506128', '5', '2023-06-04', '19', '1', 9720, 'true'),
(80, 'JP-4511506128', '5', '2023-06-04', '34', '1', 9720, 'true'),
(81, 'JP-4511506128', '5', '2023-06-04', '70', '1', 9720, 'true'),
(82, 'JP-4511506128', '5', '2023-06-04', '68', '1', 9720, 'true'),
(83, 'JP-4511506128', '5', '2023-06-04', '60', '1', 9720, 'true'),
(84, 'JP-5631593902', '6', '2023-06-04', '50', '1', 9720, 'true'),
(85, 'JP-5631593902', '6', '2023-06-04', '72', '1', 9720, 'true'),
(86, 'JP-5631593902', '6', '2023-06-04', '65', '1', 9720, 'true'),
(87, 'JP-5631593902', '6', '2023-06-04', '4', '1', 9720, 'true'),
(88, 'JP-5631593902', '6', '2023-06-04', '19', '1', 9720, 'true'),
(89, 'JP-5631593902', '6', '2023-06-04', '34', '1', 9720, 'true'),
(90, 'JP-5631593902', '6', '2023-06-04', '70', '1', 9720, 'true'),
(91, 'JP-5631593902', '6', '2023-06-04', '68', '1', 9720, 'true'),
(92, 'JP-5631593902', '6', '2023-06-04', '60', '1', 9720, 'true'),
(93, 'JP-3851886685', '8', '2023-06-04', '51', '1', 10720, 'true'),
(94, 'JP-3851886685', '8', '2023-06-04', '73', '1', 10720, 'true'),
(95, 'JP-3851886685', '8', '2023-06-04', '66', '1', 10720, 'true'),
(96, 'JP-3851886685', '8', '2023-06-04', '6', '1', 10720, 'true'),
(97, 'JP-3851886685', '8', '2023-06-04', '20', '1', 10720, 'true'),
(98, 'JP-3851886685', '8', '2023-06-04', '35', '1', 10720, 'true'),
(99, 'JP-3851886685', '8', '2023-06-04', '71', '1', 10720, 'true'),
(100, 'JP-3851886685', '8', '2023-06-04', '69', '1', 10720, 'true'),
(101, 'JP-3851886685', '8', '2023-06-04', '61', '1', 10720, 'true'),
(102, 'JP-2079778044', '9', '2023-06-04', '52', '1', 12220, 'true'),
(103, 'JP-2079778044', '9', '2023-06-04', '73', '1', 12220, 'true'),
(104, 'JP-2079778044', '9', '2023-06-04', '67', '1', 12220, 'true'),
(105, 'JP-2079778044', '9', '2023-06-04', '7', '1', 12220, 'true'),
(106, 'JP-2079778044', '9', '2023-06-04', '21', '1', 12220, 'true'),
(107, 'JP-2079778044', '9', '2023-06-04', '36', '1', 12220, 'true'),
(108, 'JP-2079778044', '9', '2023-06-04', '71', '1', 12220, 'true'),
(109, 'JP-2079778044', '9', '2023-06-04', '69', '1', 12220, 'true'),
(110, 'JP-2079778044', '9', '2023-06-04', '62', '1', 12220, 'true'),
(111, 'JP-2079778044', '9', '2023-06-04', '53', '1', 12220, 'true'),
(112, 'JP-2079778044', '9', '2023-06-04', '8', '1', 12220, 'true'),
(113, 'JP-1829796847', '4', '2023-06-06', '61', '1', 1420, 'false'),
(114, 'JP-1231067845', '9', '2023-06-06', '72', '5', 2620, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `orderID` varchar(250) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `orderTotal` int(250) NOT NULL,
  `status` varchar(100) NOT NULL,
  `customerName` varchar(250) NOT NULL,
  `shippingAddress` varchar(250) NOT NULL,
  `shippingMethod` varchar(250) NOT NULL,
  `paymentMethod` varchar(250) NOT NULL,
  `phoneNum` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`orderID`, `userID`, `orderTotal`, `status`, `customerName`, `shippingAddress`, `shippingMethod`, `paymentMethod`, `phoneNum`, `email`) VALUES
('JP-1231067845', '9', 2620, 'Pending', 'Solssoifsoifo', 'Ususan, Taguig', 'Standard', 'Cash', '11111111111', 'divinesolace@gmail.com'),
('JP-1829796847', '4', 1420, 'Completed', 'Edgarfdfdf', 'Pembo, Makati', 'Standard', 'GCash', '', ''),
('JP-1867794157', '1', 9720, 'Completed', '', 'J.P. Rizal Ext, Makati, 1215 Metro Manila', 'Standard', 'GCash', '', ''),
('JP-2079778044', '1', 12220, 'Completed', '', 'J.P. Rizal Ext, Makati, 1215 Metro Manila', 'Standard', 'GCash', '', ''),
('JP-3734763260', '1', 14770, 'Completed', 'John 5fttf', 'dhjsakdhkdshskj', 'Standard', 'GCash', '', ''),
('JP-3757493821', '1', 9720, 'Completed', '', 'J.P. Rizal Ext, Makati, 1215 Metro Manila', 'Standard', 'GCash', '', ''),
('JP-3851886685', '1', 10720, 'Completed', '', 'J.P. Rizal Ext, Makati, 1215 Metro Manila', 'Standard', 'GCash', '', ''),
('JP-4250479523', '1', 9120, 'Completed', 'John 5fttf', 'dhjsakdhkdshskj', 'Standard', 'GCash', '', ''),
('JP-4511506128', '1', 9720, 'Completed', '', 'J.P. Rizal Ext, Makati, 1215 Metro Manila', 'Standard', 'Cash', '', ''),
('JP-4928868364', '1', 4720, 'Completed', 'John 5fttf', 'dhjsakdhkdshskj', 'Standard', 'GCash', '', ''),
('JP-5631593902', '1', 9720, 'Completed', '', 'J.P. Rizal Ext, Makati, 1215 Metro Manila', 'Standard', 'GCash', '', ''),
('JP-9570837771', '1', 4520, 'Completed', 'John 5fttf', 'dhjsakdhkdshskj', 'Standard', 'GCash', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(250) NOT NULL,
  `productVar` varchar(255) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productDesc` varchar(530) NOT NULL,
  `stocks` int(20) NOT NULL,
  `productActiveStatus` varchar(10) NOT NULL,
  `productLOC` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `productVar`, `productPrice`, `productDesc`, `stocks`, `productActiveStatus`, `productLOC`) VALUES
(4, 'MIGHTY-APATO', 'Gold', 1150, 'Shine bright like a di-nosaur?! 🦕🌟🤪', 41, 'ACTIVE', 'image1.png'),
(6, 'MIGHTY-APATO', 'Pink-blue Gradient', 1350, 'Why not give something unexpected and unique this Valentine’s Day? Our Ombre Mighty-Apato makes for a truly memorable gift for your special! 🦖🦕❤️✨', 50, 'ACTIVE', 'image2.png'),
(7, 'MIGHTY-APATO', 'Magenta', 1100, 'Barney isn’t the only purple dinosaur in town! 🦕✨😆', 44, 'ACTIVE', 'image3.png'),
(8, 'MIGHTY-APATO', 'Orange', 1100, 'We just love a RAWRange dino 🍊🦕✨', 45, 'ACTIVE', 'image4.png'),
(9, 'MIGHTY-APATO', 'Blue', 1100, 'Feast your eyes on this prehistoric planter. The perfect gift for kids and kids at heart! 🦕✨🌵', 50, 'ACTIVE', 'image5.png'),
(10, 'MIGHTY-APATO', 'Galaxy', 1350, 'Dinosaurs are cool, but galactic dinoplants are cooler ✨🦖🌵👾', 50, 'ACTIVE', 'image6.png'),
(11, 'MIGHTY-APATO', 'White', 1100, 'One of the world’s largest dinosaur, now in miniature succulent form! 🦕➕🌵', 50, 'ACTIVE', 'image7.png'),
(12, 'MIGHTY-APATO', 'Yellow-green', 1100, 'Check out our Mighty-Apato in yellowgreen! 🦕✨', 50, 'ACTIVE', 'image8.png'),
(13, 'MIGHTY-APATO', 'Beige', 1200, 'Elegant and fierce at the same time! The MIGHTY-APATO is the perfect dino pot for bigger tables and shelves ✨🦕 Stone textured Apato!', 50, 'ACTIVE', 'image9.png'),
(14, 'MIGHTY-APATO', 'Sky Blue', 1100, 'Give yourself a treat and adopt your very own Jurassic Pot today! 🦖🦕🌵✨', 50, 'ACTIVE', 'image10.png'),
(15, 'MIGHTY-APATO', 'Red', 1100, 'Add a rawring pop of color to your plant collection! 🦕✨', 50, 'ACTIVE', 'image11.png'),
(16, 'MIGHTY-APATO', 'Yellow', 1100, 'You had me at yellow… 🤣🦕✨', 50, 'ACTIVE', 'image12.png'),
(17, 'MIGHTY-APATO', 'Black', 1100, 'The MIGHTY-APATO is sure to make a giant statement on your desks!', 50, 'ACTIVE', 'mt-black.png'),
(18, 'MIGHTY-APATO', 'Violet', 1100, 'The MIGHTY-APATO dinoplant is quickly becoming a best seller!\r\n', 50, 'ACTIVE', 'image14.png'),
(19, 'MIGHTY-REX', 'Beige', 1100, 'Our Dinopots are the perfect gift for Dino-Lover’s this Valentine’s Day! ❤️Guaranteed to make hearts “saur” 😉', 50, 'ACTIVE', 'image_1.png'),
(20, 'MIGHTY-REX', 'Yellow-green', 1000, 'RAWR I want for Christmas is youuu 🎶🎵🎄✨', 50, 'ACTIVE', 'image_2.png'),
(21, 'MIGHTY-REX', 'Blue', 1000, 'Make the dinolover in your life Rawr in happiness this Christmas with this adorable Mighty-Rex pot! 🦖🌵✨', 50, 'ACTIVE', 'image_3.png'),
(22, 'MIGHTY-REX', 'Black', 1000, 'No dinosaurs were harmed in the making of this planter. 🦖👍🏻', 50, 'ACTIVE', 'mt-black.png'),
(23, 'MIGHTY-REX', 'Red', 1000, 'Because ordinary pots just won’t do. Give your space a prehistoric update with our MIGHTY-REX dinosaur pot! 🦖', 50, 'ACTIVE', 'image_5.png'),
(24, 'MIGHTY-REX', 'Gold', 1050, 'Have a golden day! Rawr!🦖✨', 50, 'ACTIVE', 'image_6.png'),
(25, 'MIGHTY-REX', 'Orange', 1000, 'RAWRange dino 🦖🍊✨', 50, 'ACTIVE', 'image_7.png'),
(26, 'MIGHTY-REX', 'Pink-blue Ombre', 1250, 'Mighty-Rex looking extra cute in pink and blue ombre! ✨🦖', 50, 'ACTIVE', 'image_8.png'),
(27, 'MIGHTY-REX', 'White', 1000, 'racist na t-rex', 50, 'ACTIVE', 'image_9.png'),
(28, 'MIGHTY-REX', 'Galaxy', 1250, 'Don\'t you just want to wish (upon a star 😉) that you have this Galactic T-Rex in your plant collection right now? ✨', 50, 'ACTIVE', 'image_10.png'),
(29, 'MIGHTY-REX', 'Sky Blue', 900, 'Who do you think would love this one as a gift?', 50, 'ACTIVE', 'image_11.png'),
(30, 'MIGHTY-REX', 'Pantone Pink', 900, 'Pantone 2019 color of the year, Living CO-RAWR-L!', 50, 'ACTIVE', 'image_12.png'),
(31, 'MIGHTY-REX', 'Yellow', 1100, 'This Mighty-Rex is slaying Gen Z Yellow!', 50, 'ACTIVE', 'image_13.png'),
(34, 'MIGHTY-STYRA', 'Yellow-green', 1000, 'Is your lover a dino-lover? Then look no further! Jurrasic Pots are the perfect gift idea for the dino-obsessed this Valentines day! 🦖🦕❤️✨', 50, 'ACTIVE', 'image_a.png'),
(35, 'MIGHTY-STYRA', 'Galaxy', 1250, 'Dino + Space + Plants? Who would have thought that this combination could be so Rawring SPACE-cial?', 50, 'ACTIVE', 'image_b.png'),
(36, 'MIGHTY-STYRA', 'Sky Blue', 1000, 'Get our MIGHTY-STYRA in sky blue!', 50, 'ACTIVE', 'image_c.png'),
(37, 'MIGHTY-STYRA', 'White', 1000, 'Let our prehistoric planters help you bring the wild into your world! ✨', 50, 'ACTIVE', 'image_d.png'),
(38, 'MIGHTY-STYRA', 'Orange', 1000, 'Pumpkin orange Mighty-Styra! 🎃✨', 50, 'ACTIVE', 'image_e.png'),
(39, 'MIGHTY-STYRA', 'Beige', 1100, 'The Mighty-Styra is our cutest dino! Best for smaller spaces and tighter spots ✨🌵', 50, 'ACTIVE', 'image_f.png'),
(40, 'MIGHTY-STYRA', 'Magenta', 1000, 'Barney isn’t the only purple dino in town 😉✨', 50, 'ACTIVE', 'image_g.png'),
(41, 'MIGHTY-STYRA', 'Blue', 1000, 'The Styracosaurus is often confused with the iconic Triceratops. But if you look closely, you’ll notice that it has only one horn on its nose and the frills on its neck are longer and more elaborate.', 50, 'ACTIVE', 'image_h.png'),
(42, 'MIGHTY-STYRA', 'Pink', 1000, 'Mighty-Styra looking charming in pink!', 50, 'ACTIVE', 'image_i.png'),
(43, 'MIGHTY-STYRA', 'Gold', 1050, 'Feel like a champ with our golden Mighty-Styra! ✨', 50, 'ACTIVE', 'image_j.png'),
(44, 'MIGHTY-STYRA', 'Black', 1000, 'Our Mighty-Styra in all black is a sleek and unique gift for dad (or for yourself) this coming Father’s Day✨', 50, 'ACTIVE', 'image_k.png'),
(45, 'MIGHTY-STYRA', 'Yellow', 900, 'This yellow fellow wants to get adopted!', 50, 'ACTIVE', 'image_l.png'),
(46, 'MIGHTY-STYRA', 'Leaf Green', 900, 'Relax the eyes and excite imagination with our Mighty-styra in leaf green!', 50, 'ACTIVE', 'image_m.png'),
(47, 'MIGHTY-STYRA', 'Violet', 1000, 'Jurassic Pots are unique desktop pets that is sure to make a RAWRsome statement!', 50, 'ACTIVE', 'image_n.png'),
(48, 'MIGHTY-STYRA', 'Neon Green', 900, 'Our Neon colored Jurassic Pots are slowly becoming one of our best sellers!', 50, 'ACTIVE', 'image_o.png'),
(49, 'MIGHTY-STYRA', 'Red', 1000, 'The red MIGHTY-STYRA is the perfect accent to your desks! It brings both character and zen to your space the way only Jurassic Pot can!', 50, 'ACTIVE', 'image_p.png'),
(50, 'DINO SKULL', 'Beige', 1100, 'Our Tricera-Skull is a must-have for any dino-lovers out there! Aside from being a airplant holder, its horns can also hold jewelry and other hangable thingamabobs! ✨', 40, 'ACTIVE', 'image(a).png'),
(51, 'DINO SKULL', 'Galaxy', 1250, 'Yes, the Tricera skull also comes in galactic finish! We can’t believe we havent posted about this beauty in a while ✨', 50, 'ACTIVE', 'image(d).png'),
(52, 'DINO SKULL', 'Gold', 1150, 'Something golden for the holiday season! 🎄✨🎉', 50, 'ACTIVE', 'image(e).png'),
(53, 'DINO SKULL', 'Red', 1000, 'DINO SKULLS : RED TRICERATOPS with AIRPLANT', 50, 'ACTIVE', 'image(f).png'),
(54, 'DINO SKULL', 'Yellow-green', 1000, 'DINO SKULLS : YELLOW-GREEN TRICERATOPS with AIRPLANT', 50, 'ACTIVE', 'image(g).png'),
(55, 'DINO SKULL', 'Black', 1000, 'DINO SKULLS : BLACK TRICERATOPS with AIRPLANT', 50, 'ACTIVE', 'image(h).png'),
(56, 'DINO SKULL', 'Magenta', 1000, 'DINO SKULLS : MAGENTA TRICERATOPS with AIRPLANT', 50, 'ACTIVE', 'image(i).png'),
(57, 'DINO SKULL', 'Ivory', 1000, 'DINO SKULLS : IVORY TRICERATOPS with AIRPLANT', 49, 'ACTIVE', 'image(j).png'),
(58, 'DINO SKULL', 'Yellow', 1000, 'DINO SKULLS : YELLOW TRICERATOPS with AIRPLANT', 33, 'ACTIVE', 'image(k).png'),
(59, 'DINO SKULL', 'Blue', 1000, 'DINO SKULLS : BLUE TRICERATOPS with AIRPLANT', 50, 'ACTIVE', 'image(l).png'),
(60, 'T-REX SKULL', 'Off-white', 1300, 'RAWR! (includes 1 airplant)', 50, 'ACTIVE', 'im1.png'),
(61, 'T-REX SKULL', 'Gold', 1300, 'Here’s a Rex-citing Christmas gift idea! Our T-Rex Skull airplant holders are guaranteed to make any dino lover RAWR in joy! 🦖✨', 49, 'ACTIVE', 'im2.png'),
(62, 'T-REX SKULL', 'Beige', 1300, 'Textured option is now available for the T-Rex skull!', 50, 'ACTIVE', 'im3.png'),
(63, 'T-REX SKULL', 'Rose Gold', 1250, 'Here\'s something extra special for Valentine\'s Day. Our T-Rex Skull in Rose Gold!', 50, 'ACTIVE', 'im4.png'),
(64, 'T-REX SKULL', 'Galaxy', 1250, 'Our T-Rex skull looks out of this world in galactic finish! Send us a message to order!', 50, 'ACTIVE', 'im5.png'),
(65, 'IGUANODON', 'Pastel Blue', 1150, 'IGUANODON X JELLYBEAN', 41, 'ACTIVE', 'im_1.png'),
(66, 'IGUANODON', 'Red', 1150, 'IGUANODON X JELLYBEAN', 50, 'ACTIVE', 'im_2.png'),
(67, 'IGUANODON', 'Pastel Blue', 1150, 'IGUANODON X ZEBRA CACTUS', 50, 'ACTIVE', 'im_3.png'),
(68, 'STEGOSAURUS', 'Red', 1150, 'STEGOSAURUS X OX TONGUE', 50, 'ACTIVE', 'im_a.png'),
(69, 'STEGOSAURUS', 'Yellow-green', 1150, 'STEGOSAURUS X HAWORTHIA LIMIFOLIA', 50, 'ACTIVE', 'im_b.png'),
(70, 'PARASAUROLOPHUS', 'Blue', 1150, 'PARASAUROLOPHUS X ECHINOPSIS', 50, 'ACTIVE', 'ima1.png'),
(71, 'PARASAUROLOPHUS', 'Yellow', 1150, 'PARASAUROLOPHUS X HAWORTHIA LIMIFOLIA', 50, 'ACTIVE', 'ima2.png'),
(72, 'DINOEGGPOT', 'Eggpot-Plain', 500, ' Valentine\'s Day gift idea for the plant or dino lover in your life! 💘💘💘', 44, 'ACTIVE', 'im(a).png'),
(73, 'DINOEGGPOT', 'Eggpot-Customized', 1000, 'A custom dino egg with the sweetest message! 💝 Price depends on customization.', 50, 'ACTIVE', 'im(b).png');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_add` varchar(100) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `name`, `email_add`, `message`) VALUES
(13, 'Rechel Ann De Guzman', 'rechel@gmail.com', 'Hi, good evening. Ahm, ask ko lang po kung ilang days po bago ko ma-receive yung items kapag nasa Province area po? Thanks. '),
(14, 'Julina Kay gacura', 'jkay@gmail.com', 'Good day, I ordered your might-apato product in pink-blue gradient variant but the one I received is in the galaxy variant. Is there a way to return the one I received and replace it with a pink-blue gradient variant? Thank you.'),
(15, 'Debbie Tolibas', 'deb@gmail.com', 'Good day! I just want to inquire if you can deliver in Visayas? Thank you'),
(16, 'Edgar Palen', 'ej@gmail.com', 'Good afternoon, is the Iguanodon x Zebra Cactus available now? Because last time I checked, it was already sold out. Just wanted to know lang if meron na, so that I can order na. Thank you!'),
(17, 'Emma garcia', 'EGarcia2@gmail.com', 'Hi, follow up ko lang po yung order ko na Might-Apato in Galaxy variant, last week ko pa po na-place order yon pero, di ko pa rin po nare-receive hanggang ngayon.'),
(18, 'Jay Ramon', 'JayR@gmail.com', 'Hello po good afternoon, Kailan po kayo magre-restock ng Dino Skull na Galaxy variant? '),
(19, 'Alexa Lee', 'AlexaLee@gmail.com', 'Hello, I ordered a customized Dino eggpot 4 days ago and I received it today, but it has a crack at the bottom. Is there a solution for this that you can recommend? or is it possible to refund my payment?'),
(20, 'Ethan Sy', 'ethan@gmail.com', 'Hi, I just wanted to know po kung gaano po kalaki yung Dino skull? Thanks.');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `orderID` varchar(200) NOT NULL,
  `productID` varchar(200) NOT NULL,
  `rating` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` varchar(300) NOT NULL,
  `reviewstatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userID`, `orderID`, `productID`, `rating`, `subject`, `message`, `reviewstatus`) VALUES
(22, '4', 'JP-1867794157', '50', 5, 'GOOD', 'super pretty, worth the money', 'true'),
(23, '4', 'JP-1867794157', '72', 5, 'LOVE IT', 'thank you for packing it well, the pots arrived safely', 'true'),
(24, '4', 'JP-1867794157', '65', 5, 'COOL DESIGNS', 'thank u po for the secured packaging and kind accommodation.Till next transaction', 'true'),
(25, '4', 'JP-1867794157', '4', 5, 'RAWRR INDEED', 'i love it hehehe', 'true'),
(26, '4', 'JP-1867794157', '19', 5, 'thank u po seller', 'thx u for the super smooth transaction', 'true'),
(27, '4', 'JP-1867794157', '34', 5, 'ty po ', 'will order again soon haha my gf loved it dino-saur much hahaha', 'true'),
(28, '4', 'JP-1867794157', '70', 5, 'High Quality', 'love the designs and the materials used. its very authentic ', 'true'),
(29, '4', 'JP-1867794157', '68', 5, 'worth it', 'they arrived safely tysm. Also ty for the freebies ', 'true'),
(30, '4', 'JP-1867794157', '60', 5, 'cool design', 'super angas and ang cute at the same time ng pots. magandang idisplay hehe', 'true'),
(31, '5', 'JP-4511506128', '50', 5, 'WOW', ' tysm for packing them safely', 'true'),
(32, '5', 'JP-4511506128', '72', 5, 'cute eggpot', '', 'true'),
(33, '5', 'JP-4511506128', '65', 5, 'will order again next sahod', 'very satisfied ang plantita side ko ', 'true'),
(34, '5', 'JP-4511506128', '4', 5, 'thank you seller', 'sa uulitin poo', 'true'),
(35, '5', 'JP-4511506128', '19', 5, 'LOVE IT', 'really love the design of this one', 'true'),
(36, '5', 'JP-4511506128', '34', 5, 'highly recommended design ', 'thank you for the smooth transaction and for being v accommodating ', 'true'),
(37, '5', 'JP-4511506128', '70', 5, 'aesthetically pleasing', '', 'true'),
(38, '5', 'JP-4511506128', '68', 5, 'beautiful design', 'will buy again next month', 'true'),
(39, '5', 'JP-4511506128', '60', 5, 'favorite design', 'this is the best yall', 'true'),
(40, '6', 'JP-5631593902', '50', 5, '5 STAR', 'the sparks are immaculate with this one', 'true'),
(41, '6', 'JP-5631593902', '72', 5, '', 'they arrived na po nung isang araw, thank you po ', 'true'),
(42, '6', 'JP-5631593902', '65', 5, 'happy', 'happy wt this purchase, very worth it', 'true'),
(43, '6', 'JP-5631593902', '4', 5, 'ang expensive tignan', 'speechless with the quality', 'true'),
(44, '6', 'JP-5631593902', '19', 5, 'ang cute ni trex', 'gayang gaya yung design, ang ganda ng quality', 'true'),
(45, '6', 'JP-5631593902', '34', 5, 'worth the money', 'if only i have more extra money for this, ill make sure to buy another. ', 'true'),
(46, '6', 'JP-5631593902', '70', 5, 'fast delivery', 'recommended these pots sa mga friends and workers ko, they loved it ', 'true'),
(47, '6', 'JP-5631593902', '68', 5, 'thank you', '3rd time ordering, still the best in terms of service and all', 'true'),
(48, '6', 'JP-5631593902', '60', 5, 'best purchase this year', 'im gonna have to collect more lol', 'true'),
(49, '7', 'JP-3757493821', '50', 5, 'EXCELLENT', 'satisfied customer here', 'true'),
(50, '7', 'JP-3757493821', '72', 5, 'EXCELLENT', 'the size is perfect ', 'true'),
(51, '7', 'JP-3757493821', '65', 5, 'GOOD ', 'very high quality, luv it', 'true'),
(52, '7', 'JP-3757493821', '4', 5, 'EXCELLENT', 'will try other colors next time, ipon lang uli mwehehez', 'true'),
(53, '7', 'JP-3757493821', '19', 5, 'EXCELLENT', '', 'true'),
(54, '7', 'JP-3757493821', '34', 5, 'EXCELLENT', '', 'true'),
(55, '7', 'JP-3757493821', '70', 5, 'EXCELLENT', 'pretty color ', 'true'),
(56, '7', 'JP-3757493821', '68', 5, 'EXCELLENT', 'sa uulitin, will prolly buy again for my gift sa bday ni mommy', 'true'),
(57, '7', 'JP-3757493821', '60', 5, 'EXCELLENT', '', 'true'),
(58, '8', 'JP-3851886685', '51', 5, 'EXCELLENT', 'ang pretty ng colors omg', 'true'),
(59, '8', 'JP-3851886685', '73', 5, 'EXCELLENT', 'cute bagay idisplay sa kwarto or sala', 'true'),
(60, '8', 'JP-3851886685', '66', 5, 'LOVE IT', '', 'true'),
(61, '8', 'JP-3851886685', '6', 5, 'BEAUTIFUL', 'the design is so unreal, really love it', 'true'),
(62, '8', 'JP-3851886685', '20', 5, 'CUTE', 'everything is in good condition', 'true'),
(63, '8', 'JP-3851886685', '35', 5, 'GOOD', 'the pot arrived safely, thank you seller', 'true'),
(64, '8', 'JP-3851886685', '71', 5, 'PERFECTT', 'this shade of yellow is so pretty', 'true'),
(65, '8', 'JP-3851886685', '69', 5, 'WAAA ', 'FINALLY BOUGHT THIS POT IN THIS COLOR, SO PRETTY IRL', 'true'),
(66, '8', 'JP-3851886685', '61', 5, 'PERFECT ', '10 out of 10, the quality, the design, the color, everything is perfect', 'true'),
(67, '9', 'JP-2079778044', '52', 5, '5 STAR', '', 'true'),
(68, '9', 'JP-2079778044', '73', 5, 'maganda', 'pwedeng gift', 'true'),
(69, '9', 'JP-2079778044', '67', 5, 'LOVE THE COLOR', 'ang ganda waaaaaaahhh', 'true'),
(70, '9', 'JP-2079778044', '7', 5, 'WILL ORDER AGAIN', 'hindi ko lang nagustuhan yung shade ng violet, but its fine naman, still useful', 'true'),
(71, '9', 'JP-2079778044', '21', 5, 'pretty', '', 'true'),
(72, '9', 'JP-2079778044', '36', 5, 'prettyyyyyy', '', 'true'),
(73, '9', 'JP-2079778044', '71', 5, 'like it so much', 'luv d minimalistic design', 'true'),
(74, '9', 'JP-2079778044', '69', 5, 'good packaging', 'ty ', 'true'),
(75, '9', 'JP-2079778044', '62', 5, 'thx u po ', 'thx u for the fast and smooth transaction', 'true'),
(76, '9', 'JP-2079778044', '53', 5, 'good', 'idk, maybe red is not my type lang. bought the same pot last month but wt diff color', 'true'),
(77, '9', 'JP-2079778044', '8', 5, 'secured packaging', '', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phoneNum` varchar(11) NOT NULL,
  `address` varchar(400) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `userStatus` varchar(10) NOT NULL,
  `createdDate` datetime NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `password`, `phoneNum`, `address`, `usertype`, `userStatus`, `createdDate`, `code`) VALUES
(1, 'John 5fttf', 'johndoe@gmail.com', 'jd123', 'yesss', 'dhjsakdhkdshskj', 'CUSTOMER', 'DELETED', '2023-05-23 10:12:04', ''),
(2, 'GUEST', 'guest@gmail.com', 'guest123', '', '', 'GUEST', 'ACTIVE', '2023-05-23 10:12:04', ''),
(3, 'ADMIN1', 'admin@gmail.com', 'admin123', '', '', 'ADMIN', 'ACTIVE', '2023-05-23 10:44:29', ''),
(4, 'Edgar', 'johnejpalen13@gmail.com', 'edgar23', '09123456789', 'Pembo, Makati', 'CUSTOMER', 'ACTIVE', '2023-05-23 10:12:04', '417716'),
(5, 'Julina Kay', 'julinakgacura@gmail.com', 'jkgacura1', '09123456789', 'Pasig', 'CUSTOMER', 'ACTIVE', '2023-05-23 10:12:04', ''),
(6, 'Debbie', 'debbiestxx@gmail.com', 'debbie7', '09123456789', 'Pateros', 'CUSTOMER', 'ACTIVE', '2023-05-23 10:12:04', ''),
(7, 'Rechel Ann', 'rdeguzman@gmail.com', 'rechel3', '09123456789', 'Pembo, Makati', 'CUSTOMER', 'ACTIVE', '2023-05-23 10:12:04', ''),
(8, 'Luna', 'luna@gmail.com', 'lunamingming', '09123456789', 'Pateros', 'CUSTOMER', 'ACTIVE', '2023-05-23 10:24:03', ''),
(9, 'Sol', 'divinesolace@gmail.com', 'iloveudan', '09292976704', 'Ususan, Taguig', 'CUSTOMER', 'ACTIVE', '2023-06-04 03:21:25', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`aboutus_ID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `aboutus_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
