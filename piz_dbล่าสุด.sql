-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 05:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_food`
--

CREATE TABLE `add_food` (
  `Order_ID` int(20) NOT NULL,
  `Food_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `add_piz`
--

CREATE TABLE `add_piz` (
  `Order_ID` int(20) NOT NULL,
  `Piz_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `add_topping`
--

CREATE TABLE `add_topping` (
  `Piz_ID` int(20) NOT NULL,
  `Topping_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cate_ID` int(20) NOT NULL,
  `Cate_name` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cate_ID`, `Cate_name`) VALUES
(1, 'ชุดสุดคุ้ม'),
(2, 'เมนูทานเล่น'),
(3, 'พิซซ่า'),
(4, 'เมนูสลัด'),
(5, 'เมนูไก่'),
(6, 'เมนูพาสต้า'),
(7, 'เมนูสเต็ก และ เมนูข้าว'),
(8, 'เมนูเครื่องดื่มและของหวาน');

-- --------------------------------------------------------

--
-- Table structure for table `crust`
--

CREATE TABLE `crust` (
  `Crust_ID` int(20) NOT NULL,
  `Crust_type` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cus_ID` int(20) NOT NULL,
  `Cus_name` varchar(100) NOT NULL,
  `Cus_email` varchar(30) NOT NULL,
  `Cus_phone` char(15) NOT NULL,
  `Cus_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cus_ID`, `Cus_name`, `Cus_email`, `Cus_phone`, `Cus_address`) VALUES
(2, 'user1', 'user2@gmail.com', '0932165478', ''),
(3, 'user3', 'user3@gmail.com', '0912345678', ''),
(4, 'user4', 's626304@gmail.com', '0898765432', ''),
(8, 'adminadmin', 'admin@email.com', '0988888888', 'adminadmin 111/11 udon 30000');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `Del_ID` int(20) NOT NULL,
  `Del_address` varchar(255) NOT NULL,
  `Order_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dep_ID` int(20) NOT NULL,
  `Dep_name` varchar(255) NOT NULL,
  `Dep_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dep_ID`, `Dep_name`, `Dep_address`) VALUES
(1, 'บ้านลาด', '44 ม.4 ต.บ้านลาด'),
(2, 'บ้านกุ่ม', '111/11 ม.2 ต.บ้านกุ่ม'),
(3, 'บ้านโป่ง', '222 ม.2 ต.บ้านโป่ง');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_ID` int(20) NOT NULL,
  `Emp_email` varchar(30) NOT NULL,
  `Emp_password` varchar(20) NOT NULL,
  `Emp_phone` char(15) NOT NULL,
  `Emp_name` varchar(100) NOT NULL,
  `Emp_sex` char(5) NOT NULL,
  `Emp_birthday` date NOT NULL,
  `Salary` double NOT NULL,
  `Dep_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_ID`, `Emp_email`, `Emp_password`, `Emp_phone`, `Emp_name`, `Emp_sex`, `Emp_birthday`, `Salary`, `Dep_ID`) VALUES
(1, 'emp1@email.com', 'e10adc3949ba59abbe56', '0812345698', 'emp1', 'Male', '2021-09-09', 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Price` double NOT NULL,
  `Cate_ID` int(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `Price`, `Cate_ID`, `image`) VALUES
(1, 'ชุดอร่อยสุขคุ้มพิซซ่าถาดเล็ก หมวดคลาสสิก, น่องไก่บาร์บีคิว 4 ชิ้นและโค้ก 500 มล.', 199, 1, '101.png'),
(2, 'ชุดคุ้มเดี่ยวพิซซ่าถาดเล็ก หมวดคลาสสิก และโค้ก 500 มล.', 119, 1, '102.png'),
(3, 'ชุดอิ่มคุ้มพิซซ่าถาดกลาง แป้งบางกรอบหมวดคลาสสิก, น่องไก่บาร์บีคิว 4 ชิ้น และสปาเก็ตตี้ 99.-', 299, 1, '103.jpg'),
(4, 'ชุดคุ้มจุใจพิซซ่าถาดกลาง หมวดคลาสสิก, น่องไก่บาร์บีคิว 4 ชิ้น, สปาเก็ตตี้ 99.- และ ชิกเก้นสติ๊กส์', 399, 1, '104.png'),
(5, 'ชุดแฟมิลี่พิซซ่าเอ็กซ์ตรีม ถาดกลาง หมวดคลาสสิก, พิซซ่าถาดกลาง หมวดคลาสสิก, สปาเก็ตตี้ 99.-, น่องไก', 699, 1, '105.jpg'),
(6, 'กุ้งแคมป์ไฟ', 179, 2, 'กุ้งแคมป์ไฟ.png'),
(7, 'พิซซ่า แซนด์วิช อบกรอบ - แฮมชีส', 69, 2, 'พิซซ่า แซนด์วิช อบกรอบ - แฮมชีส.png'),
(8, 'พิซซ่า แซนด์วิช อบกรอบ - ไก่อะโลฮ่า', 69, 2, 'พิซซ่า แซนด์วิช อบกรอบ - ไก่อะโลฮ่า.png'),
(9, 'พิซซ่า แซนด์วิช อบกรอบ - ปูอัดชีส', 69, 2, 'พิซซ่า แซนด์วิช อบกรอบ - ปูอัดชีส.png'),
(10, 'วาฟเฟิล ฟรายส์', 79, 2, 'วาฟเฟิล ฟรายส์.png'),
(11, 'ขนมปังกระเทียม', 79, 2, 'ขนมปังกระเทียม.png'),
(12, 'ขนมปังกระเทียมชีส', 89, 2, 'ขนมปังกระเทียมชีส.png'),
(13, 'เบรดสติ๊กส์', 79, 2, 'เบรดสติ๊กส์.jpg'),
(14, 'ซอสบาร์บีคิว', 10, 2, 'ซอสบาร์บีคิว.png'),
(15, 'ซอสค็อกเทล', 10, 2, 'ซอสค็อกเทล.png'),
(16, 'น้ำจิ้มแจ่ว', 10, 2, 'น้ำจิ้มแจ่ว.png'),
(17, 'ซีซาร์สลัด', 139, 4, 'ซีซาร์สลัด.png'),
(18, 'สลัดกุ้ง', 159, 4, 'สลัดกุ้ง.png'),
(19, 'การ์เดนสลัด และน้ำสลัดเทาซันไอส์แลนด์', 99, 4, 'การ์เดนสลัด และน้ำสลัดเทาซันไอส์แลนด์.png'),
(20, 'การ์เดนสลัด และน้ำครีมสลัด', 99, 4, 'การ์เดนสลัด และน้ำครีมสลัด.png'),
(21, 'น้ำสลัดครีมสูตรต้นตำรับ', 10, 4, 'น้ำสลัดครีมสูตรต้นตำรับ.png'),
(22, 'น้ำสลัดเทาซันไอส์แลนด์', 10, 4, 'น้ำสลัดเทาซันไอส์แลนด์.png'),
(23, 'น้ำสลัดซีซาร์', 10, 4, 'น้ำสลัดซีซาร์.png'),
(24, 'น้ำสลัดงาขาว', 10, 4, 'น้ำสลัดงาขาว.png'),
(25, 'ชุดไก่อิ่มคุ้ม 99 บาทไก่เพียบ ทั้งปีกไก่และไก่ป๊อป ', 99, 5, 'ชุดไก่อิ่มคุ้ม 99 บาท.png'),
(26, 'ชุดไก่สุดคุ้ม 129 บาทมีทั้งปีกไก่ ไก่ป๊อป และชิกเก้นสติ๊กส์', 129, 5, 'ชุดไก่สุดคุ้ม 129 บาท.png'),
(27, 'ชุดไก่เกินคุ้ม 199 บาทมีทั้ง ปีกไก่ ไก่ป๊อป ชิกเก้นสติ๊กส์และนักเก็ต', 199, 5, 'ชุดไก่เกินคุ้ม 199 บาท.png'),
(28, 'ปีกไก่ บัฟฟาโล 6 ชิ้น', 129, 5, 'ปีกไก่ บัฟฟาโล 6 ชิ้น.png'),
(29, 'ปีกไก่ บัฟฟาโล 10 ชิ้น', 199, 5, 'ปีกไก่ บัฟฟาโล 10 ชิ้น.png'),
(30, 'ปีกไก่ บาร์บีคิว 6 ชิ้น', 129, 5, 'ปีกไก่ บาร์บีคิว 6 ชิ้น.png'),
(31, 'ปีกไก่บาร์บีคิว 10 ชิ้น', 199, 5, 'ปีกไก่บาร์บีคิว 10 ชิ้น.png'),
(32, 'ปีกไก่ทอด สไตล์เกาหลี 6 ชิ้น', 129, 5, 'ปีกไก่ทอด สไตล์เกาหลี 6 ชิ้น.png'),
(33, 'ปีกไก่ทอด สไตล์เกาหลี 10 ชิ้น', 199, 5, 'ปีกไก่ทอด สไตล์เกาหลี 10 ชิ้น.png'),
(34, 'ปีกไก่สไปซี่เกาหลี 6 ชิ้น', 129, 5, 'ปีกไก่สไปซี่เกาหลี 6 ชิ้น.png'),
(35, 'ปีกไก่สไปซี่เกาหลี 10 ชิ้น', 199, 5, 'ปีกไก่สไปซี่เกาหลี 10 ชิ้น .png'),
(36, 'ชิกเก้น นักเก็ตส์ 6 ชิ้น พร้อมซอสมะเขือเทศ', 79, 5, 'ชิกเก้น นักเก็ตส์ 6 ชิ้น พร้อมซอสมะเขือเทศ.png'),
(37, 'ชิกเก้น นักเก็ตส์ 6 ชิ้น พร้อมน้ำจิ้มไก่', 79, 5, 'ชิกเก้น นักเก็ตส์ 6 ชิ้น พร้อมน้ำจิ้มไก่.png'),
(38, 'ชิกเก้นสติ๊กส์', 79, 5, 'ชิกเก้นสติ๊กส์.png'),
(39, 'สปาเก็ตตี้ขี้เมาไก่', 99, 6, 'สปาเก็ตตี้ขี้เมาไก่.png'),
(40, 'สปาเก็ตตี้ขี้เมาไส้กรอก', 99, 6, 'สปาเก็ตตี้ขี้เมาไส้กรอก.png'),
(41, 'สปาเก็ตตี้ ซอสไก่สับ', 99, 6, 'สปาเก็ตตี้ ซอสไก่สับ.png'),
(42, 'สปาเก็ตตี้เบคอนผัดพริกแห้ง', 109, 6, 'สปาเก็ตตี้เบคอนผัดพริกแห้ง.png'),
(43, 'สปาเก็ตตี้ใส้กรอกผัดพริกแห้ง', 99, 6, 'สปาเก็ตตี้ใส้กรอกผัดพริกแห้ง.png'),
(44, 'สปาเก็ตตี้ ขี้เมาทะเล', 139, 6, 'สปาเก็ตตี้ ขี้เมาทะเล.png'),
(45, 'มักกะโรนีแฮมและเห็ดอบชีส', 99, 6, 'มักกะโรนีแฮมและเห็ดอบชีส.png'),
(46, 'มักกะโรนีไก่บาร์บีคิวอบชีส', 99, 6, 'มักกะโรนีไก่บาร์บีคิวอบชีส.png'),
(47, 'มักกะโรนีเบคอนอบชีส', 109, 6, 'มักกะโรนีเบคอนอบชีส.png'),
(48, 'ผักโขมอบชีส', 179, 6, 'ผักโขมอบชีส.png'),
(49, 'ซี่โครงหมูบาร์บีคิว สไตล์นิวยอร์ก', 279, 7, 'ซี่โครงหมูบาร์บีคิว สไตล์นิวยอร์ก.png'),
(50, 'ข้าวกะเพราหมูย่าง', 79, 7, 'ข้าวกะเพราหมูย่าง.png'),
(51, 'ข้าวน้ำตกหมูย่าง', 79, 7, 'ข้าวน้ำตกหมูย่าง.png'),
(52, 'ข้าวยำหมูย่าง', 79, 7, 'ข้าวยำหมูย่าง.png'),
(53, 'ข้าวไก่ป๊อปกะเพรากรอบ', 69, 7, 'ข้าวไก่ป๊อปกะเพรากรอบ.png'),
(54, 'ข้าวสไปซี่เกาหลีไก่ป๊อป', 69, 7, 'ข้าวสไปซี่เกาหลีไก่ป๊อป.png'),
(55, 'ข้าวเกาหลีไก่ป๊อป', 69, 7, 'ข้าวเกาหลีไก่ป๊อป.png'),
(56, 'ข้าวยำไก่ป๊อป', 69, 7, 'ข้าวยำไก่ป๊อป.png'),
(57, 'ข้าวน้ำตกไก่ป๊อป', 69, 7, 'ข้าวน้ำตกไก่ป๊อป.png'),
(58, 'ข้าวสวย', 15, 7, 'ข้าวสวย.png'),
(59, 'ข้าวเหนียว', 15, 7, 'ข้าวเหนียว.png'),
(60, 'ต่าน ทาร์ต (ทาร์ตไข่ ต้นตำรับสไตล์ฮ่องกง) 2 ชิ้น', 39, 8, 'ต่าน ทาร์ต (ทาร์ตไข่ ต้นตำรับสไตล์ฮ่องกง) 2 ชิ้น.png'),
(61, 'ไอศกรีมบาร์รสวานิลลา มัลติแพ็ค 4 แท่ง ราคา 219 บ.', 219, 8, 'ไอศกรีมบาร์รสวานิลลา มัลติแพ็ค 4 แท่ง ราคา 219 บ..png'),
(62, 'ไอศกรีมบาร์รสมอคค่า มัลติแพ็ค 4 แท่ง ราคา 249 บ.', 249, 8, 'ไอศกรีมบาร์รสมอคค่า มัลติแพ็ค 4 แท่ง ราคา 249 บ..png'),
(63, 'ไอศกรีมบาร์รสคุกกี้แอนด์ครีม มัลติแพ็ค 4 แท่ง ราคา 249 บ.', 249, 8, 'ไอศกรีมบาร์รสคุกกี้แอนด์ครีม มัลติแพ็ค 4 แท่ง ราคา 249 บ..png'),
(64, 'ไอศกรีม ช็อคโกแลต', 199, 8, 'ไอศกรีม ช็อคโกแลต.png'),
(65, 'ไอศกรีม ช็อคโกแลตชิพ', 199, 8, 'ไอศกรีม ช็อคโกแลตชิพ.png'),
(66, 'ไอศกรีม คุกกี้ แอนด์ ครีม', 199, 8, 'ไอศกรีม คุกกี้ แอนด์ ครีม.png'),
(67, 'ไอศกรีม รัมเรซิน', 199, 8, 'ไอศกรีม รัมเรซิน.png'),
(68, 'ไอศกรีม เวรี่ สตอเบอร์รี่', 199, 8, 'ไอศกรีม เวรี่ สตอเบอร์รี่.png'),
(69, 'ไอศกรีม มัทฉะ กรีนที', 199, 8, 'ไอศกรีม มัทฉะ กรีนที.png'),
(70, 'ไอศกรีม สติ๊กกี้ชูวี่ช็อคโกแลต', 199, 8, 'ไอศกรีม สติ๊กกี้ชูวี่ช็อคโกแลต.png'),
(71, 'ไอศกรีม ม็อคค่า อัลมอนด์ฟัดจ์', 199, 8, 'ไอศกรีม ม็อคค่า อัลมอนด์ฟัดจ์.png'),
(72, 'โค้ก 500 มล.', 24, 8, 'โค้ก 500 มล..png'),
(73, 'โค้ก (ไม่มีน้ำตาล) 500 มล.', 24, 8, 'โค้ก (ไม่มีน้ำตาล) 500 มล..png'),
(74, 'สไปรท์ 500 มล.', 24, 8, 'สไปรท์ 500 มล..png'),
(75, 'โค้ก 1.25 ลิตร', 32, 8, 'โค้ก 1.25 ลิตร.png'),
(76, 'โค้ก (ไม่มีน้ำตาล) 1.25 ลิตร', 32, 8, 'โค้ก (ไม่มีน้ำตาล) 1.25 ลิตร.png');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Locate_ID` int(20) NOT NULL,
  `Latitude` decimal(10,0) NOT NULL,
  `Longitude` decimal(10,0) NOT NULL,
  `Cus_ID` int(20) NOT NULL,
  `Del_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ตารางจัดเก็บที่อยู่';

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(20) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Total_price` double NOT NULL,
  `Order_date` datetime NOT NULL,
  `Cus_ID` int(20) NOT NULL,
  `Pay_ID` int(20) DEFAULT NULL,
  `Emp_ID` int(20) DEFAULT NULL,
  `Sta_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Amount`, `Total_price`, `Order_date`, `Cus_ID`, `Pay_ID`, `Emp_ID`, `Sta_ID`) VALUES
(4, 1, 199, '2021-10-03 16:37:45', 8, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Pay_ID` int(20) NOT NULL,
  `Pay_Choice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Pay_ID`, `Pay_Choice`) VALUES
(1, 'เงินสด'),
(2, 'โอนผ่านธนาคาร');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `Piz_ID` int(20) NOT NULL,
  `Piz_size` char(10) NOT NULL,
  `Piz_price` double NOT NULL,
  `Crust_ID` int(20) NOT NULL,
  `Cate_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Sta_ID` int(10) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Emp_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `Price` int(100) NOT NULL,
  `Cate_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`id`, `name`, `image`, `Price`, `Cate_ID`) VALUES
(17, 'ชุดอร่อยสุขคุ้ม', '101.jpg', 199, 1),
(18, 'ชุดคุ้มเดี่ยว', '102.jpg', 199, 1),
(19, 'ชุดแฟมิลี่', '105.jpg', 699, 1),
(20, 'น้ำจิ้มแจ่ว', 'น้ำจิ้มแจ่ว.jpg', 10, 2),
(21, 'ขนมปังกระเทียมชีส', 'ขนมปังกระเทียมชีส.jpg', 89, 2),
(22, 'ขนมปังกระเทียม', 'ขนมปังกระเทียม.jpg', 79, 2),
(23, 'วาฟเฟิล ฟรายส์', 'วาฟเฟิล ฟรายส์.jpg', 79, 2),
(24, 'พิซซ่า แซนด์วิช อบกรอบ - ปูอัดชีส', 'พิซซ่า แซนด์วิช อบกรอบ - ปูอัดชีส.jpg', 69, 2),
(25, 'พิซซ่า แซนด์วิช อบกรอบ - ไก่อะโลฮ่า', 'พิซซ่า แซนด์วิช อบกรอบ - ไก่อะโลฮ่า.jpg', 69, 2),
(26, 'พิซซ่า แซนด์วิช อบกรอบ - แฮมชีส', 'พิซซ่า แซนด์วิช อบกรอบ - แฮมชีส.jpg', 69, 2),
(27, 'กุ้งแคมป์ไฟ', 'กุ้งแคมป์ไฟ.jpg', 179, 2),
(28, 'น้ำสลัดงาขาว', 'น้ำสลัดงาขาว.webp', 10, 4),
(29, 'น้ำสลัดซีซาร์', 'น้ำสลัดซีซาร์.webp', 10, 4),
(30, 'น้ำสลัดเทาซันไอส์แลนด์', 'น้ำสลัดเทาซันไอส์แลนด์.webp', 10, 4),
(31, 'น้ำสลัดครีมสูตรต้นตำรับ', 'น้ำสลัดครีมสูตรต้นตำรับ.webp', 10, 4),
(32, 'การ์เดนสลัด และน้ำครีมสลัด', 'การ์เดนสลัด และน้ำครีมสลัด.webp', 99, 4),
(33, 'การ์เดนสลัด และน้ำสลัดเทาซันไอส์แลนด์', 'การ์เดนสลัด และน้ำสลัดเทาซันไอส์แลนด์.webp', 99, 4),
(34, 'สลัดกุ้ง', 'สลัดกุ้ง.webp', 159, 4),
(35, 'ซีซาร์สลัด', 'ซีซาร์สลัด.webp', 139, 4),
(36, 'ปีกไก่ทอด สไตล์เกาหลี 10 ชิ้น', 'ปีกไก่ทอด สไตล์เกาหลี 10 ชิ้น.jpg', 199, 5),
(37, 'ปีกไก่สไปซี่เกาหลี 6 ชิ้น', 'ปีกไก่สไปซี่เกาหลี 6 ชิ้น.jpg', 129, 5),
(38, 'ปีกไก่สไปซี่เกาหลี 10 ชิ้น', 'ปีกไก่สไปซี่เกาหลี 10 ชิ้น.jpg', 199, 5),
(39, 'ชิกเก้น นักเก็ตส์ 6 ชิ้น พร้อมซอสมะเขือเทศ', 'ชิกเก้น นักเก็ตส์ 6 ชิ้น พร้อมซอสมะเขือเทศ.jpg', 79, 5),
(40, 'ชิกเก้น นักเก็ตส์ 6 ชิ้น พร้อมน้ำจิ้มไก่', 'ชิกเก้น นักเก็ตส์ 6 ชิ้น พร้อมน้ำจิ้มไก่.jpg', 79, 5),
(41, 'ชิกเก้นสติ๊กส์', 'ชิกเก้นสติ๊กส์.jpg', 79, 5),
(42, 'ปีกไก่ทอด สไตล์เกาหลี 6 ชิ้น', 'ปีกไก่ทอด สไตล์เกาหลี 6 ชิ้น.jpg', 129, 5),
(43, 'ปีกไก่บาร์บีคิว 10 ชิ้น', 'ปีกไก่บาร์บีคิว 10 ชิ้น.jpg', 199, 5),
(44, 'ชุดไก่อิ่มคุ้ม 99 บาท', 'ชุดไก่อิ่มคุ้ม 99 บาท.jpg', 99, 5),
(45, 'ชุดไก่สุดคุ้ม 129 บาท', 'ชุดไก่สุดคุ้ม 129 บาท.jpg', 129, 5),
(46, 'ชุดไก่เกินคุ้ม 199 บาท', 'ชุดไก่เกินคุ้ม 199 บาท.jpg', 199, 5),
(47, 'ปีกไก่ บัฟฟาโล 6 ชิ้น', 'ปีกไก่ บัฟฟาโล 6 ชิ้น.jpg', 129, 5),
(48, 'ปีกไก่ บัฟฟาโล 10 ชิ้น', 'ปีกไก่ บัฟฟาโล 10 ชิ้น.jpg', 199, 5),
(49, 'ปีกไก่ บาร์บีคิว 6 ชิ้น', 'ปีกไก่ บาร์บีคิว 6 ชิ้น.jpg', 129, 5),
(50, 'ผักโขมอบชีส', 'ผักโขมอบชีส.jpg', 179, 6),
(51, 'มักกะโรนีเบคอนอบชีส', 'มักกะโรนีเบคอนอบชีส.jpg', 109, 6),
(52, 'มักกะโรนีไก่บาร์บีคิวอบชีส', 'มักกะโรนีไก่บาร์บีคิวอบชีส.jpg', 99, 6),
(53, 'มักกะโรนีแฮมและเห็ดอบชีส', 'มักกะโรนีแฮมและเห็ดอบชีส.jpg', 99, 6),
(54, 'สปาเก็ตตี้ ขี้เมาทะเล', 'สปาเก็ตตี้ ขี้เมาทะเล.jpg', 139, 6),
(55, 'สปาเก็ตตี้ใส้กรอกผัดพริกแห้ง', 'สปาเก็ตตี้ใส้กรอกผัดพริกแห้ง.jpg', 99, 6),
(56, 'สปาเก็ตตี้เบคอนผัดพริกแห้ง', 'สปาเก็ตตี้เบคอนผัดพริกแห้ง.jpg', 109, 6),
(57, 'สปาเก็ตตี้ ซอสไก่สับ', 'สปาเก็ตตี้ ซอสไก่สับ.jpg', 99, 6),
(58, 'สปาเก็ตตี้ขี้เมาไส้กรอก', 'สปาเก็ตตี้ขี้เมาไส้กรอก.jpg', 99, 6),
(59, 'สปาเก็ตตี้ขี้เมาไก่', 'สปาเก็ตตี้ขี้เมาไก่.jpg', 99, 6),
(60, 'ข้าวยำไก่ป๊อป', 'ข้าวยำไก่ป๊อป.jpg', 69, 7),
(61, 'ข้าวน้ำตกไก่ป๊อป', 'ข้าวน้ำตกไก่ป๊อป.jpg', 69, 7),
(62, 'ข้าวสวย', 'ข้าวสวย.jpg', 15, 7),
(63, 'ข้าวเหนียว', 'ข้าวเหนียว.jpg', 15, 7),
(64, 'ข้าวเกาหลีไก่ป๊อป', 'ข้าวเกาหลีไก่ป๊อป.jpg', 69, 7),
(65, 'ข้าวสไปซี่เกาหลีไก่ป๊อป', 'ข้าวสไปซี่เกาหลีไก่ป๊อป.jpg', 69, 7),
(66, 'ข้าวไก่ป๊อปกะเพรากรอบ', 'ข้าวไก่ป๊อปกะเพรากรอบ.jpg', 69, 7),
(67, 'ข้าวยำหมูย่าง', 'ข้าวยำหมูย่าง.jpg', 79, 7),
(68, 'ข้าวน้ำตกหมูย่าง', 'ข้าวน้ำตกหมูย่าง.jpg', 79, 7),
(69, 'ข้าวกะเพราหมูย่าง', 'ข้าวกะเพราหมูย่าง.jpg', 79, 7),
(70, 'ซี่โครงหมูบาร์บีคิว สไตล์นิวยอร์ก', 'ซี่โครงหมูบาร์บีคิว สไตล์นิวยอร์ก.jpg', 279, 7),
(71, 'ไอศกรีม สติ๊กกี้ชูวี่ช็อคโกแลต', 'ไอศกรีม สติ๊กกี้ชูวี่ช็อคโกแลต.jpg', 199, 8),
(72, 'ไอศกรีม ม็อคค่า อัลมอนด์ฟัดจ์', 'ไอศกรีม ม็อคค่า อัลมอนด์ฟัดจ์.jpg', 199, 8),
(73, 'โค้ก 500 มล', 'โค้ก 500 มล..jpg', 24, 8),
(74, 'โค้ก (ไม่มีน้ำตาล) 500 มล', 'โค้ก (ไม่มีน้ำตาล) 500 มล..jpg', 24, 8),
(75, 'สไปรท์ 500 มล.', 'สไปรท์ 500 มล..jpg', 24, 8),
(76, 'โค้ก 1.25 ลิตร', 'โค้ก 1.25 ลิตร.jpg', 32, 8),
(77, 'โค้ก (ไม่มีน้ำตาล) 1.25 ลิตร', 'โค้ก (ไม่มีน้ำตาล) 1.25 ลิตร.jpg', 32, 8),
(78, 'ไอศกรีม มัทฉะ กรีนที', 'ไอศกรีม มัทฉะ กรีนที.jpg', 199, 8),
(81, 'ไอศกรีม คุกกี้ แอนด์ ครีม', 'ไอศกรีม คุกกี้ แอนด์ ครีม.jpg', 199, 8),
(82, 'ไอศกรีม ช็อคโกแลตชิพ', 'ไอศกรีม ช็อคโกแลตชิพ.jpg', 199, 8),
(83, 'ไอศกรีม ช็อคโกแลต', 'ไอศกรีม ช็อคโกแลต.jpg', 199, 8),
(84, 'ไอศกรีมบาร์รสคุกกี้แอนด์ครีม มัลติแพ็ค 4 แท่ง', 'ไอศกรีมบาร์รสคุกกี้แอนด์ครีม มัลติแพ็ค 4 แท่ง ราคา 249 บ..jpg', 249, 8),
(85, 'ไอศกรีมบาร์รสมอคค่า มัลติแพ็ค 4 แท่ง ราคา 249 บ.', 'ไอศกรีมบาร์รสมอคค่า มัลติแพ็ค 4 แท่ง ราคา 249 บ..jpg', 249, 8),
(86, 'ไอศกรีมบาร์รสวานิลลา มัลติแพ็ค 4 แท่ง ราคา 219 บ', 'ไอศกรีมบาร์รสวานิลลา มัลติแพ็ค 4 แท่ง ราคา 219 บ..jpg', 219, 8),
(87, 'ต่าน ทาร์ต (ทาร์ตไข่ ต้นตำรับสไตล์ฮ่องกง) 2 ชิ้น', 'ต่าน ทาร์ต (ทาร์ตไข่ ต้นตำรับสไตล์ฮ่องกง) 2 ชิ้น.jpg', 39, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploads`
--

CREATE TABLE `tbl_uploads` (
  `no` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_uploads`
--

INSERT INTO `tbl_uploads` (`no`, `img_name`, `img_file`) VALUES
(1, 'admin', '184261991720211002_232843.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `Topping_ID` int(20) NOT NULL,
  `Topping_name` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_food`
--
ALTER TABLE `add_food`
  ADD PRIMARY KEY (`Order_ID`,`Food_ID`),
  ADD KEY `Food_ID` (`Food_ID`);

--
-- Indexes for table `add_piz`
--
ALTER TABLE `add_piz`
  ADD PRIMARY KEY (`Order_ID`,`Piz_ID`);

--
-- Indexes for table `add_topping`
--
ALTER TABLE `add_topping`
  ADD PRIMARY KEY (`Piz_ID`,`Topping_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cate_ID`);

--
-- Indexes for table `crust`
--
ALTER TABLE `crust`
  ADD PRIMARY KEY (`Crust_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cus_ID`),
  ADD UNIQUE KEY `Cus_email` (`Cus_email`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`Del_ID`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dep_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_ID`),
  ADD UNIQUE KEY `Emp_email` (`Emp_email`),
  ADD KEY `Dep_ID` (`Dep_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cate_ID` (`Cate_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Locate_ID`),
  ADD KEY `Cus_ID` (`Cus_ID`),
  ADD KEY `Del_ID` (`Del_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Emp_ID` (`Emp_ID`),
  ADD KEY `Pay_ID` (`Pay_ID`),
  ADD KEY `Sta_ID` (`Sta_ID`),
  ADD KEY `Cus_ID` (`Cus_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Pay_ID`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`Piz_ID`),
  ADD KEY `Crust_ID` (`Crust_ID`),
  ADD KEY `Cate_ID` (`Cate_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Sta_ID`),
  ADD KEY `Emp_ID` (`Emp_ID`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cate_ID` (`Cate_ID`) USING BTREE;

--
-- Indexes for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`Topping_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cate_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `crust`
--
ALTER TABLE `crust`
  MODIFY `Crust_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cus_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `Del_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Dep_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Emp_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Locate_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Pay_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `Piz_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Sta_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topping`
--
ALTER TABLE `topping`
  MODIFY `Topping_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `Order_ID` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `Dep_ID` FOREIGN KEY (`Dep_ID`) REFERENCES `department` (`Dep_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `Cate_ID` FOREIGN KEY (`Cate_ID`) REFERENCES `category` (`Cate_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `Cus_ID` FOREIGN KEY (`Cus_ID`) REFERENCES `customer` (`Cus_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Del_ID` FOREIGN KEY (`Del_ID`) REFERENCES `delivery` (`Del_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Emp_ID` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`Emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Pay_ID` FOREIGN KEY (`Pay_ID`) REFERENCES `payment` (`Pay_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Sta_ID` FOREIGN KEY (`Sta_ID`) REFERENCES `status` (`Sta_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Cus_ID`) REFERENCES `customer` (`Cus_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pizza`
--
ALTER TABLE `pizza`
  ADD CONSTRAINT `Crust_ID` FOREIGN KEY (`Crust_ID`) REFERENCES `crust` (`Crust_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pizza_ibfk_1` FOREIGN KEY (`Cate_ID`) REFERENCES `category` (`Cate_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`Emp_ID`) REFERENCES `employee` (`Emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD CONSTRAINT `tbl_file_ibfk_1` FOREIGN KEY (`Cate_ID`) REFERENCES `category` (`Cate_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
