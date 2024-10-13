-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 03:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `ip_address` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `ip_address`, `product_id`) VALUES
(74, '46.16.182.57', 61),
(83, '::1', 61);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `users_email` text NOT NULL,
  `comment_text` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `comment_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `users_email`, `comment_text`, `product_id`, `is_approved`, `comment_answer`) VALUES
(2, 'رضا', 'reza@gmail.com', 'متن تست 2', 62, 1, ''),
(5, 'majid', 'majid@yahoo.com', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد', 59, 1, ''),
(6, 'مبینا ', 'mobina@gmail.com', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد', 60, 1, 'qwert'),
(7, 'رضا', 'reza@gmail.com', ' و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو ', 60, 1, '\r\nصفحه اصلی محصولات آموزشی وبلاگ درباره ما'),
(8, 'سامان', 'saman@gmail.com', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد', 64, 1, ''),
(9, 'majidmorshedlou', 'mehranlagzian@gmail.com', 'صفحه اصلی محصولات آموزشی وبلاگ درباره ما ', 58, 1, ''),
(10, 'Sylvanas', 'majid_morshedlou@yahoo.com', ' در ستون و سطرآنچنان که لازم است و برای شرایط انه ای علی الخصوص ط', 60, 1, 'ن امید داشت که تمام و دشواری موجود در ارائه راهکارها و شر'),
(11, 'admin', 'yaghma@gmail.com', 'asdasdasdsadasd', 62, 1, 'ضصثقفغعهخحجشسیبلاتنمکگ'),
(12, 'admin', 'majidmorshedlou@yhaoo.com', 'شسیشسیشسیشسیشسی', 62, 1, ''),
(14, 'محمد', 'mohammad@gmail.com', 'سلام و درود', 55, 1, 'سلام محمد'),
(15, 'محمد', 'yaghma@gmail.com', 'سلام و درود', 55, 1, ''),
(20, 'majidmorshedlou', 'mobina@gmail.com', 'dfzgdfgdfgdffgdfgf', 57, 1, ''),
(21, 'asdad', 'majidmorshedlou@yahoo.com', 'asdasdasdad', 62, 1, 'yes '),
(22, 'asdad', 'majidmorshedlou@yahoo.com', 'asdasdasdad', 62, 1, ''),
(23, 'ali', 'ali@gmail.com', 'asdasda', 62, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` text NOT NULL,
  `product_id` text NOT NULL,
  `use_email` text NOT NULL,
  `is_paid` int(11) NOT NULL DEFAULT 0,
  `authority` text NOT NULL,
  `order_total` text NOT NULL,
  `ref_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `product_id`, `use_email`, `is_paid`, `authority`, `order_total`, `ref_id`) VALUES
(22, 'SYW-1608914125', '62,61,60,', 'jeff@gmail.com', 0, 'A00000000000000000000000000232861543', '2200', ''),
(23, 'SYW-1608914949', '62,61,60,', 'jeff@gmail.com', 1, 'A00000000000000000000000000232864059', '2200', '23286405901'),
(24, 'SYW-1608918383', '59,', 'jeff@gmail.com', 0, 'A00000000000000000000000000232874783', '600', ''),
(26, 'SYW-1608920633', '58,', 'jeff@gmail.com', 0, 'A00000000000000000000000000232881925', '100', ''),
(27, 'SYW-1608920689', '58,', 'jeff@gmail.com', 1, 'A00000000000000000000000000232882101', '500', '23288210101'),
(28, 'SYW-1608921503', '62,', 'jeff@gmail.com', 1, 'A00000000000000000000000000232884862', '500', '23288486201'),
(29, 'SYW-1608922053', '62,', 'jeff@gmail.com', 1, 'A00000000000000000000000000232886695', '500', '23288669501');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_price` text NOT NULL,
  `product_cat` text NOT NULL,
  `product_count` text NOT NULL,
  `product_seller` text NOT NULL,
  `product_color` text NOT NULL,
  `product_guarantee` text NOT NULL,
  `product_image` text DEFAULT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_cat`, `product_count`, `product_seller`, `product_color`, `product_guarantee`, `product_image`, `product_desc`) VALUES
(57, 'توپ فوتبال', '900', 'ورزشی', 'موجود', 'ام-شاپ', 'سفید, زرد, آبی', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات 3'),
(58, 'سیب تزئینی', '500', 'لوازم آرایشی', 'موجود', 'ام-شاپ', 'قرمز, سبز', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات جدید'),
(59, 'برچسب برند اپل', '600', 'تکنولوژی', 'موجود', 'ام-شاپ', 'سفید-مشکی', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات 5\r\n'),
(60, 'ماگ قهوه', '500', 'لوازم شخصی', 'موجود', 'ام-شاپ', 'سفید', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات 6'),
(61, 'موس لاجی تک', '1200', 'تکنولوژی', 'موجود', 'ام-شاپ', 'مشکی', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات 7'),
(62, 'گل رز', '500', 'لوازم خانگی', 'ناموجود', 'ام-شاپ', 'قرمز / زرد / آبی', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات ادیت شده'),
(65, 'گل رز', '500', 'لوازم خانگی', 'ناموجود', 'ام-شاپ', 'قرمز / زرد / آبی', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات ادیت شده'),
(66, 'گل رز', '500', 'لوازم خانگی', 'ناموجود', 'ام-شاپ', 'قرمز / زرد / آبی', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات ادیت شده'),
(67, 'موس لاجی تک', '1200', 'تکنولوژی', 'موجود', 'ام-شاپ', 'مشکی', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات 7'),
(68, 'موس لاجی تک', '1200', 'تکنولوژی', 'موجود', 'ام-شاپ', 'مشکی', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات 7'),
(69, 'توپ فوتبال', '900', 'ورزشی', 'موجود', 'ام-شاپ', 'سفید, زرد, آبی', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات 3'),
(70, 'توپ فوتبال', '900', 'ورزشی', 'موجود', 'ام-شاپ', 'سفید, زرد, آبی', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات 3'),
(71, 'سیب تزئینی', '500', 'لوازم آرایشی', 'موجود', 'ام-شاپ', 'قرمز, سبز', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات جدید'),
(72, 'سیب تزئینی', '500', 'لوازم آرایشی', 'موجود', 'ام-شاپ', 'قرمز, سبز', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات جدید'),
(73, 'برچسب برند اپل', '600', 'تکنولوژی', 'موجود', 'ام-شاپ', 'سفید-مشکی', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات 5\r\n'),
(74, 'ماگ قهوه', '500', 'لوازم شخصی', 'موجود', 'ام-شاپ', 'سفید', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات 6'),
(75, 'ماگ قهوه', '500', 'لوازم شخصی', 'موجود', 'ام-شاپ', 'سفید', 'دارد', 'abstract-nature-2560x1440-8k-21456.jpg', 'توضیحات 6');

-- --------------------------------------------------------

--
-- Table structure for table `products_cat`
--

CREATE TABLE `products_cat` (
  `id` int(11) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_cat`
--

INSERT INTO `products_cat` (`id`, `cat_name`) VALUES
(2, 'تکنولوژی'),
(3, 'ماشین آلات'),
(6, 'لوازم خانگی'),
(7, 'اسباب بازی'),
(8, 'ورزشی'),
(9, 'لوازم شخصی'),
(10, 'لوازم آرایشی'),
(13, 'کتاب');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `kfname` text NOT NULL,
  `klname` text NOT NULL,
  `storekeeper_email` text NOT NULL,
  `storekeeper_code` text NOT NULL,
  `storekeeper_password` text NOT NULL,
  `storekeeper_phone` text NOT NULL,
  `storekeeper_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `kfname`, `klname`, `storekeeper_email`, `storekeeper_code`, `storekeeper_password`, `storekeeper_phone`, `storekeeper_image`) VALUES
(1, 'مازیار', 'خرمی', 'maziark@gmail.com', '1059875365', '12541', '66164100', 'maziyar.jpg'),
(2, 'سینا', 'دلخانی', 'sinad@yahoo.com', '0936575487', '12541', '66164100', 'sina.jpg'),
(3, 'سعید', 'بلوچی', 'saiedd@gmail.com', '1069876521', '12541', '66164100', 'saeid.jpg'),
(4, 'سامان', 'بوژانی', 'samanb@yahoo.com', '5749863215', '12541', '66164100', 'saman (1).jpg'),
(5, 'معین', 'گلاب', 'moeing@gmail.com', '5748920023', '12541', '66164100', 'moein.jpg'),
(6, 'داریوش', 'سلیمانی', 'darioushs@yahoo.com', '1056200364', '12541', '66164100', 'dariush.jpg'),
(7, 'آزیتا', 'خرمی', 'azita@gmail.com', '1065498720', '12541', '66164100', 'azita.jpg'),
(8, 'مجید', 'مهرآبادی', 'majidm@outlook.com', '1050753189', '12541', '66164100', 'download.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` int(11) NOT NULL,
  `sfname` text NOT NULL,
  `slname` text NOT NULL,
  `support_password` text NOT NULL,
  `support_email` text NOT NULL,
  `support_phone` text NOT NULL,
  `support_code` text NOT NULL,
  `support_gender` text NOT NULL,
  `support_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `sfname`, `slname`, `support_password`, `support_email`, `support_phone`, `support_code`, `support_gender`, `support_image`) VALUES
(3, 'زهرا', 'انتظاری', '12541', 'zahraentezari@gmail.com', '66367000', '4567891325', 'زن', '260315.jpg'),
(4, 'زانیار', 'میرهادی', '12541', 'xaniar@yahoo.com', '66987700', '1059876542', 'مرد', 'download.jfif'),
(5, 'ارشیا', 'حسینی', '12541', 'arshia@gmail.com', '66549800', '1050759074', 'مرد', 'download.jpg'),
(6, 'رها', 'سیانی', '12541', 'raha@yahoo.com', '6644780000', '7898523215', 'زن', 'raha.jpg'),
(8, 'مینا', 'احمدی', '12541', 'minaahmaadi@gmail.com', '66266256', '1234567898', 'زن', 'saman (2).jpg'),
(9, 'زهرا', 'حسینی', '12541', 'zahraentezarii@gmail.com', '66980654', '1059807542', 'زن', 'love-image-2560x1440-8k-21482.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `ufname` text NOT NULL,
  `ulname` text NOT NULL,
  `username` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `hash` text NOT NULL,
  `user_bg` text NOT NULL,
  `user_image` text NOT NULL,
  `address` text NOT NULL,
  `post_code` bigint(20) DEFAULT NULL,
  `user_number` text NOT NULL,
  `ragister_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `bio` text NOT NULL DEFAULT 'هنوز اطلاعاتی درج نشده است.',
  `social` varchar(256) NOT NULL DEFAULT 'هنوز اطلاعاتی درج نشده است.',
  `interest` varchar(256) NOT NULL DEFAULT 'هنوز اطلاعاتی درج نشده است.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `ufname`, `ulname`, `username`, `user_email`, `user_password`, `hash`, `user_bg`, `user_image`, `address`, `post_code`, `user_number`, `ragister_date`, `bio`, `social`, `interest`) VALUES
(26, 'جفی', 'بیزاس', 'jeffy', 'jeff@gmail.com', 'fc23d6c274e4cd6db18919da6190f88a', 'direhash1608989245', '', 'jeffy.jpg', 'تهران دست چپ', 9876543210, '091212312333', '2020-11-18 09:01:18', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد.', 'https://www.google.com', 'qwerty'),
(28, 'محمد', 'یغمایی', '', 'yaghma@gmail.com', 'fc23d6c274e4cd6db18919da6190f88a', 'direhash1608989246', '', 'download.jfif', 'تهران دست راست', 7777777777, '09133213213', '2020-12-12 20:36:34', 'هنوز اطلاعاتی درج نشده است.', 'هنوز اطلاعاتی درج نشده است.', 'هنوز اطلاعاتی درج نشده است.'),
(34, 'مهران', 'لگزیان', '', 'mehranlagzian@gmail.com', 'fc23d6c274e4cd6db18919da6190f88a', 'direhash1608989247', '', '', '', NULL, '', '2020-12-26 13:27:27', 'هنوز اطلاعاتی درج نشده است.', 'هنوز اطلاعاتی درج نشده است.', 'هنوز اطلاعاتی درج نشده است.'),
(35, 'ali', 'ali', '', 'ali@gmail.com', '202cb962ac59075b964b07152d234b70', 'direhash1703944771', '', '30912 morshedlou(2).jpg', 'امیرکبیر- بلوار ملاصدرا-تقاطع آزادی - نبش آزادی9-پلاک33', 9314817684, '09123', '2023-12-30 13:59:31', 'هنوز اطلاعاتی درج نشده است.', 'هنوز اطلاعاتی درج نشده است.', 'هنوز اطلاعاتی درج نشده است.'),
(36, 'asd', 'asd', '', 'ali@yahoo.com', 'fc23d6c274e4cd6db18919da6190f88a', 'direhash1707042569', '', '', '', NULL, '', '2024-02-04 10:29:29', 'هنوز اطلاعاتی درج نشده است.', 'هنوز اطلاعاتی درج نشده است.', 'هنوز اطلاعاتی درج نشده است.'),
(37, '123', '123', '', 'majidmorshedlou@yahoo.com', '202cb962ac59075b964b07152d234b70', 'direhash1707170394', '', '', '', NULL, '', '2024-02-05 21:59:54', 'هنوز اطلاعاتی درج نشده است.', 'هنوز اطلاعاتی درج نشده است.', 'هنوز اطلاعاتی درج نشده است.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_cat`
--
ALTER TABLE `products_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `products_cat`
--
ALTER TABLE `products_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
