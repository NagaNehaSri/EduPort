-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 01, 2025 at 12:32 PM
-- Server version: 8.0.35
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aura-home-interior`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `tag` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aboutpage_heading` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_general_ci,
  `aboutpage_description` text COLLATE utf8mb4_general_ci,
  `homepage_image` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aboutpage_image` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aboutpage_tags` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `tag`, `heading`, `aboutpage_heading`, `short_description`, `aboutpage_description`, `homepage_image`, `aboutpage_image`, `aboutpage_tags`, `description`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'Our Mission:', '<p>WELCOME TO EAGLE TAX</p>', '<p>Sprint Bioscience is committed to advancing sustainable aquaculture practices through research, development, and manufacturing of pioneering products. We invest our expertise, resources, and experience in developing solutions that ensure healthy and safe aquaculture production.</p>', '<h2>What We Do</h2><h5>We specialize in creating a range of aquaculture products, including:</h5><div><ul><li>Biotechnology Formulations</li><li>Feed Supplements</li><li>Premixes</li><li>Toxin binders and Toxin control products</li><li>Biosecurity Formulations</li></ul></div>', 'homepage_image_1734427648.png', 'aboutpage_image_1733999671.jpg', 'Excellence,Seamless,Precision, Professionalism,Experienced,Global Expertise', '<p>&quot;Welcome to Marvel Crop, your trusted partner in agriculture. With a rich legacy of expertise and dedication, we specialize in offering a comprehensive range of top-quality fertilizers tailored to meet the diverse needs of farmers worldwide. Our mission is to revolutionize the farming industry by providing sustainable solutions that enhance crop productivity and promote environmental stewardship. At Marvel Crop, we prioritize research and development, continuously striving to innovate and improve our products to ensure maximum efficacy and efficiency. Our team of agronomists and experts works tirelessly to develop cutting-edge formulations that deliver outstanding results, enabling farmers to achieve higher yields and profitability. We take pride in our unwavering commitment to customer satisfaction, offering personalized support and guidance to help farmers optimize their fertilizer usage and maximize their harvests. With Marvel Crop, you can trust that you&#39;re receiving not just products, but solutions tailored to your specific needs and goals. Driven by a passion for agriculture and a vision for a sustainable future, we are dedicated to empowering farmers to thrive and succeed in today&#39;s ever-evolving agricultural landscape. Join us on our mission to cultivate growth, nurture the land, and create a brighter tomorrow for generations to come. Discover the Marvel Crop difference today and experience the difference that quality fertilizers can make in your farming operation. Together, let&#39;s sow the seeds of success and reap the rewards of a bountiful harvest.&quot;</p>', '2024-04-06 16:59:06', '2024-12-18 09:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bannersupportimage` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `heading`, `description`, `image`, `bannersupportimage`, `created_at`, `updated_at`) VALUES
(6, 'Lorem Ipsum is printing-1', '<p><span style=\"color: rgb(0, 0, 0)\">It is a long established fact that a reader will be distracted by the readable content established fact that a reader will be distracted by testablished fact that a reader will be distracted by t</span></p>', 'banner1243659796.png', 'bannersupportimage1406065091.jpg', '2024-04-29 15:55:12', '2024-12-18 06:01:30'),
(7, 'Lorem Ipsum is printing-2', '<p><span style=\"color: rgb(0, 0, 0)\">It is a long established fact that a reader will be distracted by the readable content established fact that a reader will be distracted by testablished fact that a reader will be distracted by t</span></p>', NULL, NULL, '2024-12-16 12:20:38', '2024-12-18 06:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` int NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_general_ci,
  `view_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `heading`, `image`, `description`, `long_description`, `view_image`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Service Name', 'benefit320164359.svg', 'Beatae modi optio deleniti aliquam quae. Dolor nostrum id nulla fugit facilis amet animi reiciendis totam. Laboriosam quos laudantium minus excepturi.', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit at ante netus, phasellus augue purus suscipit rutrum tempus tortor facilisis. Phasellus sagittis habitasse nam fames molestie dictumst pellentesque, primis faucibus pretium dapibus porttitor nullam montes justo, malesuada fringilla dui enim per commodo. Malesuada proin parturient turpis venenatis viverra augue non nunc, pellentesque primis habitasse vivamus ut ornare odio nisi, sollicitudin elementum fringilla accumsan montes mus laoreet. Eu porta nisi at quis felis pretium sociosqu vulputate, eleifend id rhoncus lacus iaculis integer sapien. Sociosqu primis condimentum risus magna laoreet tempor, aenean mattis vitae iaculis tempus, pulvinar placerat scelerisque a sollicitudin. Nisi mus tincidunt sociis curae torquent donec venenatis taciti, fames natoque platea facilisis nisl interdum eu posuere, eget tempus laoreet lacus accumsan luctus nullam. Ridiculus ut duis auctor dapibus commodo tempor faucibus lacinia cras massa, dui fames conubia donec imperdiet quis cum justo tellus orci turpis, augue interdum proin ligula ante aenean sagittis cubilia dignissim.</p>\r\n\r\n<p>Hendrerit suscipit taciti integer purus proin dui potenti volutpat risus, arcu erat litora neque eleifend malesuada dignissim aptent pulvinar quam, lectus bibendum egestas sollicitudin senectus felis libero vestibulum. Dignissim porttitor aliquam netus mus euismod elementum aenean placerat, massa montes vivamus vitae nisl etiam convallis lobortis justo, erat ligula mi primis tempor aptent lacinia. Aliquet inceptos sollicitudin parturient nascetur platea eros tellus turpis, donec nisl quisque mi cum tempor orci, et natoque proin semper leo duis fames. Imperdiet nam ac hendrerit mauris platea suspendisse nisi montes cursus, egestas varius fringilla sagittis eget rhoncus nunc. Condimentum penatibus cum nec per cras, sociis ante velit urna, ultrices fames nullam luctus. Metus lectus etiam penatibus nam faucibus fames torquent mollis curabitur, dis phasellus potenti cras risus facilisi sapien mi, dapibus quis porta aliquam purus magna nostra nulla. Risus varius eros cubilia cras integer dictum nec mollis, dignissim proin accumsan nullam etiam vestibulum vitae mi, porttitor leo sed malesuada pulvinar libero taciti.</p>', '1714474901ve.png', '2024-04-29 16:15:51', '2024-04-30 16:31:41', 'service-name'),
(2, 'Facilis porro quo ullam.', 'benefit656617613.svg', 'Cum veritatis nesciunt maiores numquam odit. Rerum necessitatibus vero. Neque dolor beatae accusantium eos maiores dolorem voluptatum reiciendis.', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit vitae tellus ligula ultrices aliquet nisi fames, curabitur velit eros luctus tincidunt lacus mauris viverra montes imperdiet cum nascetur. Lectus arcu sollicitudin molestie ornare fermentum imperdiet, parturient consequat convallis risus curae sociis conubia, orci ultrices vulputate phasellus placerat. Justo quis neque varius ligula hac rutrum bibendum libero, nulla dignissim class eu semper mus nisi donec, magna interdum consequat morbi viverra auctor tortor. Nullam proin iaculis etiam nam tincidunt scelerisque felis, mattis accumsan condimentum dictumst facilisi tortor luctus senectus, urna ut vitae est libero dis. Volutpat inceptos senectus commodo nunc mus vel mattis, neque vehicula aptent faucibus tempus nascetur nostra urna, sociis aenean diam et sociosqu nullam. Facilisis metus nascetur phasellus dui gravida mauris, libero quis viverra lobortis tincidunt class, ornare tristique arcu tellus himenaeos. Vel pretium faucibus felis eros commodo neque feugiat venenatis, nisi justo odio varius vivamus molestie metus auctor libero, maecenas ridiculus nostra euismod parturient ad placerat.</p>\r\n\r\n<p>Montes cras nullam et feugiat donec a quis faucibus vel purus, consequat ridiculus potenti libero auctor arcu lacinia dapibus ut leo enim, porta erat netus senectus rutrum habitant elementum molestie dictum. Gravida nibh tempus conubia suscipit blandit etiam fusce est cursus platea, nisl magna habitasse faucibus habitant massa libero dictumst nulla ultricies, vulputate pharetra himenaeos enim ac lobortis felis risus congue. Erat porta ut habitasse sollicitudin ultricies sodales accumsan lectus, pulvinar lacinia tellus morbi parturient justo cras, dui ante orci potenti posuere metus duis. Nibh id porta phasellus sociosqu ornare urna pharetra in nisl, rutrum est et ad imperdiet aptent vivamus velit feugiat, ullamcorper tincidunt ante convallis montes rhoncus dui ridiculus. Curabitur morbi massa sociosqu ante diam porttitor, vehicula curae posuere mollis fames libero non, hendrerit luctus egestas ridiculus tristique. Himenaeos parturient sollicitudin et blandit ut facilisi egestas, fringilla dictumst proin quis orci suscipit nec augue, dignissim cursus elementum lacinia erat class. Natoque facilisi lectus nullam magnis ante sollicitudin taciti porta sociis posuere, tincidunt mauris cras nam habitant venenatis litora senectus nibh, egestas sagittis id fusce iaculis tortor auctor primis vehicula. Est lacinia ornare convallis semper ante cum enim at imperdiet, varius rutrum ut facilisi litora magna libero nisi euismod a, laoreet himenaeos cursus ac eros primis eleifend quis.</p>', '1714474933ve.png', '2024-04-29 16:42:00', '2024-04-30 16:32:13', 'facilis-porro-quo-ullam');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `thumbnail_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `view_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thumbnail_title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thumbnail_description` text COLLATE utf8mb4_general_ci,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `blog_title` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `blog_description` text COLLATE utf8mb4_general_ci,
  `blog_points` text COLLATE utf8mb4_general_ci,
  `status` int DEFAULT NULL,
  `created_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `thumbnail_image`, `header_image`, `view_image`, `thumbnail_title`, `date`, `thumbnail_description`, `slug`, `blog_title`, `blog_description`, `blog_points`, `status`, `created_at`, `updated_at`) VALUES
(2, '1733811191th.jpg', NULL, '1733811191ve.jpg', 'How to calculate tax-2 ?', '2024-12-12', '<p>Perspiciatis unde omnis iste natus error sit tatem                      accusantium doloremque laudanti, totam rem aperiam,                      eaque ipsa quae so some ulation<br></p>', 'irs-tax-payer-protectin-system-2', 'IRS TAX PAYER PROTECTIN SYSTEM-2', '<p><br></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of thword in classical literature, discored the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rac.Ipsum comes from sections 1.10.32 and 1.10.33 of \"dFinibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero</p>', '<p><br></p><div><ol><li>Maecenas in neque et velit rutrum molestie</li><li>Sed et sem vel est suscipit vehicula quis convallis</li><li>Maecenas eu mi dapibus, ullamcorper augue sit</li><li>Morbi quis sapien sed odio mollis sodales</li><li>Donec aliquet leo nec orci facilisis varius el est</li></ol></div>', NULL, '2024-12-10 11:43:11', '2024-12-12 12:10:21'),
(3, '1733811338th.jpg', NULL, '1733811338ve.jpg', 'How to calculate tax-3 ?', '2024-12-12', '<p>Perspiciatis unde omnis iste natus error sit tatem                      accusantium doloremque laudanti, totam rem aperiam,                      eaque ipsa quae so some ulation<br></p>', 'irs-tax-payer-protectin-system-3', 'IRS TAX PAYER PROTECTIN SYSTEM-3', '<p><br></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of thword in classical literature, discored the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rac.Ipsum comes from sections 1.10.32 and 1.10.33 of \"dFinibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero</p>', '<p><br></p><div><ol><li>Maecenas in neque et velit rutrum molestie</li><li>Sed et sem vel est suscipit vehicula quis convallis</li><li>Maecenas eu mi dapibus, ullamcorper augue sit</li><li>Morbi quis sapien sed odio mollis sodales</li><li>Donec aliquet leo nec orci facilisis varius el est</li></ol></div>', NULL, '2024-12-10 11:45:38', '2024-12-12 12:10:09'),
(4, '1733811662th.jpg', NULL, '1733811662ve.jpg', 'How to calculate tax ?', '2024-12-12', '<p>Perspiciatis unde omnis iste natus error sit tatem                      accusantium doloremque laudanti, totam rem aperiam,                      eaque ipsa quae so some ulation<br></p>', 'irs-tax-payer-protectin-system', 'IRS TAX PAYER PROTECTIN SYSTEM', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of thword in classical literature, discored the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rac.Ipsum comes from sections 1.10.32 and 1.10.33 of \"dFinibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero</p>', '<p><br></p><div><ol><li>Maecenas in neque et velit rutrum molestie</li><li>Sed et sem vel est suscipit vehicula quis convallis</li><li>Maecenas eu mi dapibus, ullamcorper augue sit</li><li>Morbi quis sapien sed odio mollis sodales</li><li>Donec aliquet leo nec orci facilisis varius el est</li></ol></div>', NULL, '2024-12-10 11:51:02', '2024-12-12 12:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `blogslider`
--

CREATE TABLE `blogslider` (
  `id` int NOT NULL,
  `blog_id` int DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogslider`
--

INSERT INTO `blogslider` (`id`, `blog_id`, `images`, `created_at`, `updated_at`) VALUES
(2, 1, 'image1695747896.jpg', '2024-12-10 11:22:09', '2024-12-10 11:35:51'),
(3, 1, 'image526172618.jpg', '2024-12-10 11:36:11', '2024-12-10 11:36:11'),
(4, 1, 'image2104598013.jpg', '2024-12-10 11:36:22', '2024-12-10 11:36:22'),
(5, 2, 'image398282004.jpg', '2024-12-10 11:43:37', '2024-12-10 11:43:37'),
(6, 2, 'image1666906490.jpg', '2024-12-10 11:43:47', '2024-12-10 11:43:47'),
(7, 2, 'image61249804.jpg', '2024-12-10 11:43:57', '2024-12-10 11:43:57'),
(8, 3, 'image1286067892.jpg', '2024-12-10 11:45:52', '2024-12-10 11:45:52'),
(9, 3, 'image1737416145.jpg', '2024-12-10 11:46:09', '2024-12-10 11:46:09'),
(10, 3, 'image219291461.jpg', '2024-12-10 11:46:26', '2024-12-10 11:46:26'),
(11, 4, 'image23944259.jpg', '2024-12-12 15:19:02', '2024-12-12 15:19:02'),
(12, 4, 'image1444406527.jpg', '2024-12-12 15:19:15', '2024-12-12 15:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `board_of_directors`
--

CREATE TABLE `board_of_directors` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `title`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Lab System Support/ Site MFG & QC Lab Support', 'Dwarakanagar, Visakhapatnam', '<p><strong>Project Scope:</strong>Kites IT Tech Ops team needs onsite Lab Support Specialists for the MVP01 (Oceanside) and RDMC (Santa Monica) QC Labs. The scope includes efficient and reliable</p>', '2024-06-28 12:48:01', '2024-06-28 12:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(5, 'Insecticides', 'insecticides', '2024-04-17 16:07:02', '2024-04-17 16:14:31'),
(13, 'Fungicides', 'fungicides', '2024-04-17 16:22:48', '2024-04-17 16:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Testimonials', '<p><span style=\"color: rgb(0, 0, 0)\"><strong>What Our Client Says?</strong></span></p>', '<p><br></p>', '2024-12-09 16:53:15', '2024-12-18 06:57:34'),
(2, 'Who We Are', '<h2>Interesting Articles Updated <br>Every Daily</h2>', '<p><br></p>', '2024-12-09 16:55:41', '2024-12-18 06:06:26'),
(3, 'Home Products', '<h2><span style=\"color: rgb(255, 0, 0)\">There are many variations of passages</span></h2>', '<p><br></p>', '2024-12-09 17:00:03', '2024-12-23 13:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` int NOT NULL,
  `main_heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sub_heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `main_heading`, `sub_heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Your Trusted Partner in Tax Compliance and Planning', 'Company Profile', '<p><span style=\"color: rgb(0, 0, 0)\">EagleTaxFiling.com is a distinguished US income tax consulting firm renowned for its expertise in tax compliance, sophisticated tax planning, and meticulous tax return preparation for individuals and small to medium-sized enterprises. With a specialization in serving expatriates, high-net-worth individuals, and Indian residents in the US on H1B or similar visas, we offer seamless cross-border tax solutions, including filing returns in India. Our commitment lies in delivering bespoke strategies tailored to the intricate financial landscapes of our clients, ensuring precision, compliance, and unparalleled value.</span></p>', 'image_1733815415.jpg', '2024-12-10 12:39:48', '2024-12-12 16:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(170) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(24, 'ravindranadh', 'dev@gmail.com', '8990103830', 'testing purpose', 'testing purpose', '2024-12-18 11:41:03', '2024-12-18 11:41:03'),
(25, 'Ravindranadh', 'ravindra@gmaill.com', '8790193830', 'testing', 'testing', '2024-12-23 13:06:00', '2024-12-23 13:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counts`
--

CREATE TABLE `counts` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `value` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counts`
--

INSERT INTO `counts` (`id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum', '320', '2024-04-06 14:16:32', '2024-12-17 07:11:02'),
(2, 'Lorem Ipsum', '10', '2024-04-06 14:16:45', '2024-12-17 07:12:04'),
(3, 'Lorem Ipsum', '320', '2024-04-06 14:16:59', '2024-12-17 07:12:28'),
(4, 'Lorem Ipsum', '10', '2024-06-28 12:11:34', '2024-12-17 07:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int NOT NULL,
  `heading` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `heading`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Wifi', 'high speed internet', 'image648925296.png', '2024-05-08 15:36:38', '2024-05-08 15:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, 'MARKET INTELLIGENCE', '<p>Capabilities that will automatically analyze big data models to forecast and predict</p>', '2024-04-06 14:06:31', '2024-04-06 14:06:31'),
(2, 'TRAVELLER INTELLIGENCE', '<p>We job gives you handcrafts options such as front admin reviews or It also gives It business.</p>', '2024-04-06 14:06:47', '2024-04-06 14:06:47'),
(3, 'BID INTELLIGENCE', '<p>We job gives you handcrafts options such as front admin reviews or It also gives It business.</p>', '2024-04-06 14:07:02', '2024-04-06 14:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `id` int NOT NULL,
  `property_id` int NOT NULL,
  `property_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `highlights`
--

CREATE TABLE `highlights` (
  `id` int NOT NULL,
  `heading` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_about`
--

CREATE TABLE `home_about` (
  `id` int NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_about`
--

INSERT INTO `home_about` (`id`, `image1`, `image2`, `heading`, `short_description`, `description`, `created_at`, `updated_at`) VALUES
(1, '1734498291_home_about1.png', '1734498291_home_about2.png', 'Empowering Sustainable Aquaculture Through Innovation', '<p>Sprint Bioscience, we\'re passionate about transforming aquaculture through innovative solutions, blending expertise with forward-thinking approaches to deliver to high quality products and services<br></p>', '<p><strong><span style=\"color: green\">Our Mission</span></strong></p><p><strong></strong>Sprint Bioscience is committed to advancing sustainable aquaculture practices through research, development, and manufacturing of pioneering products. We invest our expertise, resources, and experience in developing solutions that ensure healthy and safe aquaculture production.</p>', '2024-12-16 18:30:00', '2024-12-18 06:05:35'),
(2, 'path/to/another_image1.jpg', 'path/to/another_image2.jpg', NULL, NULL, 'Another description.', '2024-12-16 18:35:00', '2024-12-16 18:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `home_services`
--

CREATE TABLE `home_services` (
  `id` int NOT NULL,
  `tag_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `service_heading_1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `service_image_1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `service_description_1` text COLLATE utf8mb4_general_ci,
  `service_heading_2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `service_image_2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `service_description_2` text COLLATE utf8mb4_general_ci,
  `service_heading_3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `service_image_3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `service_description_3` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `section_name`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Testimonials', 'image1668899118.png', '2024-04-17 17:41:37', '2024-12-23 13:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int NOT NULL,
  `inquiryname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `inquiryemail` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `inquiryphone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `inquirymessage` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `inquirycomments` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `inquiryservice` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `status` int DEFAULT NULL,
  `created_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(170) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `resume` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `name`, `email`, `mobile`, `resume`, `created_at`, `updated_at`) VALUES
(1, 'Bijayananda Mohanat', 'bijay@gmail.com', '8274823423', '1713510205.pdf', '2024-04-19 12:33:25', '2024-04-19 12:33:25'),
(2, 'Bijayananda Mohanta', 'bijay.to.access@gmail.com', '7606938822', '1713510227.pdf', '2024-04-19 12:33:47', '2024-04-19 12:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int NOT NULL,
  `tag` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managements`
--

CREATE TABLE `managements` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_general_ci,
  `profile_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `batch` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE `milestones` (
  `id` int NOT NULL,
  `year` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ourteam`
--

CREATE TABLE `ourteam` (
  `id` int NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partnership`
--

CREATE TABLE `partnership` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `client` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `architect` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `thumbnail_image` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_image` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `view_image` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `client`, `architect`, `location`, `category`, `description`, `thumbnail_image`, `header_image`, `view_image`, `created_at`, `updated_at`, `slug`, `status`) VALUES
(3, 'My Home Bhooja', 'ARTHITECTURE COMPANY', 'ARCHITECTURE', 'HYDERABAD', 'APARTMENT', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqu a. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>a. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<ul>\r\n	<li>reprehenderit in voluptate velit esse cillum</li>\r\n	<li>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod te</li>\r\n	<li>Nisi ut aliquip ex ea commodo consequat</li>\r\n	<li>sed do eiusmod tempor incididunt ut labore</li>\r\n</ul>', '1712129511th.webp', '1712047632he.png', '1712133824ve.png', '2024-04-02 14:17:12', '2024-04-03 14:13:45', 'my-home-bhooja', 1),
(5, 'Untitlted Project 2', 'Cleta Willms', 'Praesentium reiciendis consequuntur iste.', 'Norfolk Island', 'APARTMENT', '<p>Laudantium optio nam in id consequatur quos tempora sed. Sunt quibusdam consequuntur harum voluptatibus harum accusamus similique nemo similique. Cupiditate sit voluptas hic odio ducimus.</p>', '1712129037th.webp', '1712129037he.webp', '1712133835ve.png', '2024-04-03 12:53:57', '2024-04-03 14:13:55', 'untitlted-project-2', 1),
(6, 'Untitlted Project', 'Lelah Runolfsson', 'Praesentium consectetur adipisci', 'Monaco', 'APARTMENT', '<p>Laudantium optio nam in id consequatur quos tempora sed. Sunt quibusdam consequuntur harum voluptatibus harum accusamus similique nemo similique. Cupiditate sit voluptas hic odio ducimus.</p>', '1712129107th.webp', '1712129107he.webp', NULL, '2024-04-03 12:55:07', '2024-04-03 12:55:07', 'untitlted-project', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_image`
--

CREATE TABLE `portfolio_image` (
  `id` int NOT NULL,
  `portfolio_id` int NOT NULL,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_general_ci,
  `product_short_description` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `description2` text COLLATE utf8mb4_general_ci,
  `thumbnail_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `view_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `short_description`, `product_short_description`, `description`, `description2`, `thumbnail_image`, `view_image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'SprintMin', '<div><span style=\"color: rgb(0, 0, 0)\">Effective water management is crucial for successful aquaculture operations, as it directly impacts the survival and growth of aquatic organisms.</span></div>', '<p>Effective water management is crucial for successful aquaculture operations, as it directly impacts the survival and growth of aquatic organisms. Good Aquaculture Practices (GAP) stress the importance of \'cultivating water\' in aquaculture, highlighting the need for proper water quality management.</p><p>Various physical, chemical, and biological processes influence the composition of pond water, making it challenging to maintain optimal conditions. To address this, Sprint Biosciences introduces SprintMin, a multi-mineral formulation designed to keep water properties within safe levels.</p><p>SprintMin is specifically formulated to support the health and well-being of aquatic organisms, promoting better survival and growth rates. By using SprintMin, aquaculture operations can ensure optimal water quality, leading to improved productivity and reduced costs.</p><p>Trust Sprint Biosciences\' expertise in aquaculture solutions with SprintMin, the ultimate multi-mineral supplement for a thriving aquaculture operation.</p>', '<h6>SprintMin: The Ultimate Solution for Mineral Imbalance in Aquaculture</h6><p>SprintMin is a highly advanced multi-mineral supplement designed to address mineral deficiencies in high-density stocked ponds. This innovative formulation is specifically crafted to provide a comprehensive solution for mineral imbalances in both feeds and aquaculture ponds.</p><p>With SprintMin, aquaculture operations can ensure optimal mineral levels, leading to improved growth rates, increased survival, and enhanced overall health of aquatic organisms. Trust Sprint Biosciences\' expertise in aquaculture solutions with SprintMin, the ultimate multi-mineral supplement for a thriving aquaculture operation.</p><h6>SprintMin Key Benefits:</h6><div><ul><li>Promotes plankton development during pond preparation</li><li>Enhances natural feeding habits and overall health of juvenile shrimp and fish</li><li>Optimizes dietary nutrient utilization with reduced energy expenditure</li><li>Prevents mineral ion imbalance in water</li><li>Supports regular moulting and exoskeleton formation in shrimp</li><li>Fosters uniform growth in shrimp and fish</li><li>Improves hormonal and enzymatic activities</li><li>Boosts disease resistance and defense mechanisms</li><li>Regulates osmosis, nerve impulse transmission, and muscular control</li><li>Enhances survival and growth rates</li><li>Improves digestion and feed conversion ratio (FCR)</li><li>Reduces culture period</li><li>Increases shrimp and fish production</li><li>Decreases production costs</li></ul></div>', '<h6>Indications:</h6><ul><li> Plankton development during pond preparation</li><li> Improved hormonal and enzymatic activities</li><li> Regular moulting and exoskeleton formation in shrimp</li><li> Osmoregulation and muscular control</li><li> Enhanced disease resistance and defense mechanisms</li><li> Improved survival and growth</li><li> Improved digestion and FCR</li></ul><h6>Benefits:</h6><ul><li> Sustains autotrophic systems</li><li> Develops perfect endo and exo-skeletal systems in shrimp and fish</li><li> Improves digestion, absorption, and growth rate</li><li> Supports cell wall composition, enzyme activity, phosphate transport, and nitrogen metabolism</li><li> Strengthens skeletal structures</li><li> Aids in osmoregulation and nutrient transfer</li><li> Provides essential amino acids for protein synthesis</li><li> Optimizes FCR for maximum productivity</li><li> Promotes uniform growth in shrimp and fish.</li><li><strong>SprintMin:</strong> Comprehensive Mineral Supplement</li><li><strong>Composition:</strong> Comprehensive Mineral Supplement</li></ul><p><strong>Each kg of SprintMin contains a balanced blend of essential macro and micro minerals, along with vital amino acids:</strong></p><ul><li> Calcium (25.5%)</li><li> Phosphorus (12.%)</li><li> Magnesium (10.5gm)</li><li> Potassium (150 mg)</li><li> Sodium (9.2 mg)</li><li> Sulphur (0.75%)</li><li> Chloride (22. gm)</li><li> Manganese (1600 mg)</li><li> Copper (1200 mg)</li><li> Cobalt (150 mg)</li><li> Iron (1500 mg)</li><li> Zinc (9600 mg)</li><li> Selenium (10 mg)</li><li> Aluminium (1500 mg)</li><li> Essential amino acids:</li><li> D.L. Methionine (2.0 gm)</li><li> L. Lysine Monohydrate (5.0 gm)</li></ul><h6>Dosage and Application:</h6><p><strong>For Aquaculture Ponds:</strong></p><ul><li><strong>During pond preparation:</strong> 20-30 kg/ha</li><li><strong>During culture:</strong> 10-20 kg/ha every 15 days to maintain nutrient balance</li></ul><p><strong>For Fish Feeds:</strong></p><ul><li> 10 kg/ton of feed or as advised by Aquaculture Consultant</li><li><strong>Presentation:</strong> 20 kg HDPE Bag</li></ul>', '1734416477th.png', '1735203484ve.jpeg', 'sprintmin', '2024-04-17 16:46:37', '2024-12-26 08:58:04'),
(2, 'C Source', '<p><span style=\"color: rgb(0, 0, 0)\">Vitamin C (ascorbic acid) is a crucial nutrient for fish, prawn, and shrimp. Unlike humans, these aquatic animals cannot produce Vitamin C on their own and rely on their diet to obtain it.</span></p>', '<p>Vitamin C: An Essential Dietary Ingredient for Aquaculture</p><p>Vitamin C (ascorbic acid) is a crucial nutrient for fish, prawn, and shrimp. Unlike humans, these aquatic animals cannot produce Vitamin C on their own and rely on their diet to obtain it.</p>', '<p>Why is Vitamin C important for prawn and shrimp?</p><p>Vitamin C plays a vital role in:</p><p>Additional benefits of Vitamin C also:</p><div><ul><li><strong>Disease resistance:</strong> Helps prawn and shrimp fight off diseases and infections.</li><li><strong>Rapid growth: </strong>Supports rapid growth and development in prawn and shrimp.</li><li><strong>High survival:</strong> Improves survival rates in prawn and shrimp.</li><li><strong>Moulting:</strong> Aids in the moulting process, which is essential for growth and development.</li></ul><ul><li><strong>Boosts immune response:</strong> Enhances the immune system of prawn and shrimp.</li><li><strong>Supports hormone production:</strong> Helps regulate hormone production in prawn and shrimp.</li></ul></div>', '<ul><li><strong>Enhances mineral absorption and metabolism:</strong> Improves the absorption and utilization of minerals in prawn and shrimp.</li><li><strong>Supports shell development and protein metabolism:</strong> Plays a crucial role in the development and maintenance of shells in prawn and shrimp.</li><li><strong>Detoxifies toxins:</strong> Helps remove toxins, chemicals, pesticides, and drugs from the body.</li></ul><p>Role of Vitamin C in collagen synthesis</p><ul><li>Vitamin C is essential for collagen synthesis, which is critical for muscle development in fish, prawn, and shrimp.</li><li>Influence on alkaline phosphatase activity</li><li> Vitamin C also influences alkaline phosphatase activity, which is involved in the synthesis of chitin and sclerotization of the epicuticle in prawn and shrimp.</li><li>In summary, Vitamin C is a vital nutrient for fish, prawn, and shrimp, supporting their growth, development, immune function, and overall health.</li></ul><p>A deficiency in Vitamin C (ascorbic acid) can precipitate a range of deleterious effects in fish, including:</p><ul><li><strong>Anorexia and growth retardation:</strong> Impaired appetite and reduced growth rates, compromising overall productivity.</li><li><strong> Impaired wound healing and collagen synthesis:</strong> Disrupted collagen function, leading to impaired tissue repair and increased susceptibility to disease.</li><li><strong> Skeletal deformities:</strong> Scoliosis (lateral spinal curvature) and Lordosis (vertical spinal curvature), resulting from aberrant bone growth and development.</li><li><strong> Ocular lesions:</strong> Pathological changes in the eyes, potentially leading to vision impairment.</li><li><strong> Hemorrhagic manifestations:</strong> Spontaneous bleeding in the skin, liver, kidney, intestine, and muscle, indicative of compromised vascular integrity.</li><li><strong> Immunocompromise:</strong> Increased susceptibility to pathogenic bacterial infections, highlighting the crucial role of Vitamin C in immune function.</li><li><strong>Impaired calcium absorption:</strong> Reduced absorption of calcium from the surrounding water, potentially leading to metabolic bone disease.</li></ul><p>These clinical manifestations underscore the essentiality of Vitamin C in maintaining optimal fish health and productivity. A deficiency in ascorbic acid can culminate in metabolic disorders, precipitating a range of diseases that can have far-reaching consequences for aquaculture operations.</p><h6>Ascorbic Acid Deficiency in Prawn and Shrimp: A Cascade of Detrimental Effects</h6><p>A diet deficient in ascorbic acid (Vitamin C) can have far-reaching consequences for prawn and shrimp, leading to:</p><ul><li><strong>Hypophagia and poor feed conversion:</strong> Reduced feed intake and inefficient nutrient utilization, compromising growth and productivity.</li><li><strong>Post-molt mortality: </strong>Elevated mortality rates following molting, a critical phase of growth and development.</li><li><strong> Muscular and hepatopancreatic dystrophy:</strong> Degenerative changes in muscle and hepatopancreatic tissue, impairing overall health and function.</li><li><strong>Branchial necrosis:</strong> Blackening of gills, indicative of compromised respiratory function and increased susceptibility to disease.</li><li><strong>Cutaneous lesions:</strong> Whitened or blackened lesions on the body surface, potentially leading to secondary infections and further morbidity.</li><li><strong> High mortality rates:</strong> Elevated rates of mortality, underscoring the critical importance of ascorbic acid in maintaining prawn and shrimp health.</li></ul><p>These detrimental effects highlight the essentiality of ascorbic acid in prawn and shrimp nutrition, and underscore the need for adequate dietary supplementation to prevent disease and promote optimal growth and productivity.</p><h6>Dosage and Usage:</h6><ul><li>Use 0.5 to 2.0 grams of C Source per kg of feed regularly</li><li>Consult an Aquaculture consultant for specific advice</li><li><strong>Composition:</strong>    Each gram of C Source contains 500 mg of Ascorbic Acid (Coated Vitamin C), Saccharomyces cerevisiae 100 mg, chelated minerals 200 mg</li><li><strong>Presentation:</strong>  1.0 kg HDPE containers</li></ul><p>For use in Aquaculture Industry</p><p>C Source is a concentrated and stable form of Vitamin C, Saccharomyces cerevisiae , , chelated minerals essential for the health and growth of fish, prawn, and shrimp. Its deficiency can lead to various metabolic disorders and diseases, making it a crucial supplement in aquaculture feed.</p>', '1734416138th.jpg', '1735203427ve.jpeg', 'c-source', '2024-12-17 06:15:38', '2024-12-26 08:57:07'),
(3, 'ZeoGrand+', '<p><span style=\"color: rgb(0, 0, 0)\">ZeoGrand+ is a &nbsp;is an advanced probiotic feed and powerful tool for maintaining clean and healthy water in aquaculture ponds. </span></p><p><br></p>', '<p>ZeoGrand+ is an advanced probiotic feed additive specifically designed for aquaculture ponds. This innovative formulation combines probiotics with Hydrated Sodium Allumino Silicate (HSAS), a unique carrier that enhances the delivery and efficacy of the probiotics. The HSAS in ZeoGrand+ has a three-dimensional, microporous structure that provides a stable framework for the probiotics, which are located in the pores. This design allows for optimal release and absorption of the probiotics, promoting a healthy gut and immune system in aquatic species. With its advanced formulation and synergistic blend of aluminum, silicon, oxygen, and probiotics, ZeoGrand+ offers a range of benefits for aquaculture operations, including improved water quality, enhanced growth rates, and increased survival. By incorporating ZeoGrand+ into their feeding program, aquaculture professionals can experience improved productivity and reduced maintenance, making it an essential tool for modern aquaculture operations.<br></p>', '<h6> ZeoGrand+ is a powerful tool for maintaining clean and healthy water in aquaculture ponds. It works by:</h6><p>Using ZeoGrand+ has many benefits, including:</p><div><ul><li> Breaking down toxic waste and ammonia through bacterial action</li><li> Absorbing and removing harmful substances through ion exchange</li><li> Controlling the growth of harmful bacteria and toxic gases</li><li> Supporting the natural balance of the ecosystem</li></ul><ul><li> Creating a healthy environment for shrimp, prawn, and fish to grow</li><li> Speeding up the natural process of waste decomposition</li><li> Reducing the risk of disease and infection</li><li> Maintaining optimal water quality and pH balance</li><li>Eliminating unpleasant odors and toxic gases</li><li>Being safe and non-toxic for the environment and aquatic life</li></ul></div>', '<p>By incorporating ZeoGrand+ into their aquaculture operations, farmers can enjoy improved productivity, reduced maintenance, and a healthier environment for their aquatic animals. </p><h6> Composition:</h6><ul><li> Hydrated Sodium Allumino Silicate (HSAS) granules</li><li> Concentrated probiotics:</li><li> Bacillus sp.</li><li> Nitrosomonas sp.</li><li> Nitrobacter sp.</li><li> Cellulomonas sp.</li><li> Acetobacter sp.</li></ul><h6>Application Rates:</h6><ul><li><strong>rAquaculture Feed:</strong> 5-10 gm per 1.0 kg of feed</li><li><strong>Aquaculture Pond:</strong> 5-10 kg per acre (or as advised by Aquaculture Consultant)</li><li><strong>Presentation: </strong>10 kg packaging for servicing the aquaculture industry, including:</li></ul>', '1734416988th.png', '1735203386ve.jpeg', 'zeogrand', '2024-12-17 06:29:48', '2024-12-26 08:56:26'),
(4, 'SprintPro', '<p><span style=\"color: rgb(0, 0, 0)\">Discover a powerful probiotic solution that promotes healthy digestion, improves water quality, and reduces antibiotic use in aquaculture farms.</span></p>', '<p>Boost Aquaculture Success with SprintPro</p><p>Discover a powerful probiotic solution that promotes healthy digestion, improves water quality, and reduces antibiotic use in aquaculture farms.</p>', '<h6>How SprintPro Works</h6><p>SprintPro is a concentrated probiotic blend fortified with enzymes that:</p><h6>Proven Results</h6><p><strong>Multicenter field trials showed that SprintPro:</strong></p><div><ul><li> Breaks down organic sludge and waste</li><li> Improves water quality and reduces toxins</li><li> Enhances digestion and feed utilization</li><li> Controls harmful bacteria and pathogens</li><li> Promotes healthy algae growth and ecosystem balance</li></ul><ul><li> Reduced ammonia levels and Vibrio loads</li><li> Improved survival rates and growth</li><li> Increased final biomass by 54%</li></ul></div>', '<h6>Benefits of Using SprintPro</h6><div><ul><li> Reduces ammonia and hydrogen sulfide levels</li><li> Degrades organic waste and sludge</li><li> Improves survival rates and productivity</li><li> Enhances water quality and reduces stress on animals</li><li> Supports healthy algal growth and ecosystem balance</li></ul></div><p><strong>Application Guidelines</strong></p><ul><li><strong>Shrimp Ponds:</strong> Dosage based on stocking density and days of culture (DOC)</li><li><strong>Fish Ponds:</strong> 100-200 gm/ac</li><li><strong>Shrimp and Fish Hatchery:</strong> 30-50 gm/10 ton of water (or as advised by Aquaculture Consultant)</li></ul><p><strong>Mode of Application</strong></p><ul><li> Mix SprintPro with clean water from the pond/hatchery tank.</li><li> Activate probiotics for one hour.</li><li> Broadcast the activated SprintPro throughout the pond/hatchery tank and aerate for uniform distribution.</li><li><strong>Composition</strong>SprintPro contains a potent blend of probiotic bacteria Bacillus subtilis, Bacillus megaterium, Bacillus licheniformis, Bacillus polymyxa, Bacillus pumilis, Cellulomonas carte , Paracoccus Pantotrophus, Pediococcus acidilactici , Pseudomonas denitrificans, Lactobacillus plantarum, Lactobacillus rhamnosus, Rhodococcus Rhodobacter, Thiobacillus thiooxidans, Thiobacillus ferroxidans and enzymes (Cellulase, Xylanase, and Bea Glucanase).</li><li><strong>Presentation: </strong>1.0 Kg packaging.</li></ul>', '1734417130th.png', '1735203264ve.jpeg', 'sprintpro', '2024-12-17 06:32:10', '2024-12-26 08:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_feature`
--

CREATE TABLE `product_feature` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_general_ci,
  `feature_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `feature_description` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_feature`
--

INSERT INTO `product_feature` (`id`, `name`, `heading`, `short_description`, `feature_image`, `feature_description`, `created_at`, `updated_at`) VALUES
(2, NULL, '<h2><span style=\"color: green\"><strong>How Our Products Enhance Sustainable Aquaculture:</strong></span></h2>', '<p>At Sprint Bioscience, we\'re proud to have a team of renowned experts in aquaculture, dedicated to revolutionizing the industry through innovative solutions. Our specialists offer comprehensive guidance and support for crop-to-crop shrimp and fish culture, empowering farmers to optimize their yields and improve the health of their aquatic ecosystems.<br></p>', '1734425731_products-img1.jpg', '<ul><li><strong>Improved Water Quality:</strong> Our biotechnology formulations degrade organic matter, reduce sludge, and improve water quality.</li><li><strong>Increased Efficiency: </strong>Feed supplements and premixes enhance feed conversion, reducing waste and environmental impact.</li><li><strong>Reduced Chemical Usage: </strong>Our toxin binders and control products minimize the need for chemical treatments.</li><li><strong>Enhanced Disease Resistance:</strong> Biosecurity formulations stimulate the immune system of aquatic animals, reducing disease occurrence.</li><li><strong>Sustainable Pond Management:</strong> Our solutions restore a healthy pond bottom, ensuring sustainable aquaculture development.</li><li><strong>Sprint Bioscience: </strong>Pioneering Aquaculture Expertise</li></ul>', '2024-12-17 08:40:55', '2024-12-18 08:56:33'),
(4, NULL, '<h2><span style=\"color: rgb(0, 131, 130)\">Expert Guidance for Enhanced Aquaculture</span></h2>', '<p>Our team of seasoned professionals provides personalized advice and technical support to help farmers navigate every stage of the crop cycle, from planning and preparation to harvest and post-harvest management. By leveraging our expertise, farmers can:<br></p>', '1734958490_products-img3.jpg', '<ul><li>Enhance water quality management</li><li>Optimize feed formulation and nutrition</li><li>Implement effective disease management strategies</li><li>Improve breeding and genetics programs</li><li>Increase overall productivity and profitability</li></ul>', '2024-12-17 09:11:37', '2024-12-23 12:54:50'),
(5, NULL, '<p><span style=\"color: rgb(56, 48, 137)\">​<br></span></p><h2><span style=\"color: rgb(56, 48, 137)\">Crop-to-Crop Solutions for Sustainable Aquaculture</span></h2>', '<p>At Sprint Bioscience, we\'re committed to promoting sustainable aquaculture practices that prioritize environmental stewardship and social responsibility. Our crop-to-crop approach ensures that farmers receive tailored guidance for each specific crop, taking into account factors like species, climate, and market demand.</p><p>By partnering with us, farmers can access cutting-edge technologies, research-driven insights, and expert knowledge to drive their businesses forward and contribute to a more sustainable future for aquaculture.</p><h6>By partnering with Sprint Bioscience, aquaculture operators can:</h6>', '1734426732_products-img3.jpg', '<p><br></p><div><ul><li>Improve productivity and efficiency</li><li>Reduce environmental impact</li><li>Enhance aquatic animal health and welfare</li><li>Promote sustainable aquaculture practices.</li></ul></div>', '2024-12-17 09:12:12', '2024-12-18 07:30:03'),
(6, NULL, '<h2><span style=\"color: rgb(27, 83, 27)\">Aquaculture: A Growing Industry with Challenges</span></h2>', '<p>Aquaculture, the practice of cultivating aquatic organisms under human control, has become a vital source of food and income globally. However, the industry faces significant challenges, including disease outbreaks and environmental degradation.<br></p>', NULL, '<h6>Sprint Biosciences: Revolutionizing Aquaculture Health Management</h6><p>At Sprint Bioscience, we recognize the importance of sustainable aquaculture practices and the need for innovative solutions to address disease and environmental concerns. Our mission is to provide cutting-edge biotechnology and biosecurity solutions to enhance aquatic animal health and promote eco-friendly aquaculture practices.</p><h6>The Need for New Approaches</h6><p>Conventional methods have had limited success in preventing and treating aquatic diseases. We believe that a holistic approach, considering the interplay between host, pathogen, and environment, is crucial for effective disease management.</p><h6>Systems Management Approach (SMA)</h6><p>Our SMA integrates biotechnology, efficient water quality management, and nutritional feed supplementation to prevent disease and promote sustainable aquaculture practices.</p><h6>Global Awareness and Sustainable Development</h6><p>We align with global efforts to prioritize sustainable development, environmental interactions, and long-term sustainability in aquaculture. Our solutions aim to create an \"enabling environment\" for sustainable aquaculture growth.</p><h6>Sprint Bioscience Solutions</h6><p>We offer a range of eco-friendly aquaculture formulations, including biosecurity and biotechnology products, to support profitable and sustainable operations. Our products are designed to promote aquatic animal health and wellbeing, ensuring the quality and success of your aquaculture endeavors.</p><h6>Join us in revolutionizing aquaculture health management and promoting sustainable practices for a better future.</h6>', '2024-12-17 09:13:02', '2024-12-18 07:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `title`, `image`, `youtube_link`, `created_at`, `updated_at`) VALUES
(1, 'TRAVEL RETAIL AND DUTY FREE INDUSTRY.', 'image458475025.jpg', 'https://youtu.be/FTOS6cwJNCs', NULL, '2024-04-06 15:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `side_facing` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `square_yards` decimal(10,2) DEFAULT NULL,
  `square_feet` decimal(10,2) DEFAULT NULL,
  `bedroom` int NOT NULL,
  `bathroom` int NOT NULL,
  `garages` int NOT NULL,
  `year_built` int NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thumbnail_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slide_1` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slide_2` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amenities` text COLLATE utf8mb4_general_ci,
  `iframe` text COLLATE utf8mb4_general_ci,
  `features` text COLLATE utf8mb4_general_ci,
  `completed` tinyint(1) DEFAULT NULL,
  `project_complete_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `brochure` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resort_sections`
--

CREATE TABLE `resort_sections` (
  `id` int NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `privileges` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `privileges`, `created_at`, `updated_at`) VALUES
(2, 'manager', 'service,home_about,admin,logout', '2024-11-14 18:25:41', '2024-11-15 17:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `flat_id` int NOT NULL,
  `room_number` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `view` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BHK` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sqft` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_general_ci,
  `description` text COLLATE utf8mb4_general_ci,
  `og_title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `og_description` text COLLATE utf8mb4_general_ci,
  `og_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `twitter_title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `twitter_description` text COLLATE utf8mb4_general_ci,
  `twitter_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `page_name`, `title`, `keywords`, `description`, `og_title`, `og_description`, `og_image`, `twitter_title`, `twitter_description`, `twitter_image`, `created_at`, `updated_at`) VALUES
(1, 'home', 'sprint-bioscience', 'sprint-bioscience', 'sprint-bioscience', 'sprint-bioscience', 'sprint-bioscience', 'og_image.png', 'Homepage - sprint-bioscience', 'sprint-bioscience', 'twitter_image.png', NULL, '2024-12-18 05:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `service_name` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bottom_text` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_1`
--

CREATE TABLE `services_1` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tag` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `short_description` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `logo` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thumbnail_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `view_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `book_quote` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `book_background` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `book_link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `button_redirection` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_feature`
--

CREATE TABLE `service_feature` (
  `id` int NOT NULL,
  `service_id` int NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bottom_text` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `footer_logo` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `header_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `home_page_banner` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `footer_image` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `address` text COLLATE utf8mb4_general_ci,
  `mobile` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `iframe` text COLLATE utf8mb4_general_ci,
  `iframe2` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile2` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `footer_logo`, `favicon`, `header_image`, `home_page_banner`, `footer_image`, `site_name`, `description`, `address`, `mobile`, `email`, `facebook`, `youtube`, `instagram`, `twitter`, `linkedin`, `pinterest`, `iframe`, `iframe2`, `created_at`, `updated_at`, `mobile2`, `email2`) VALUES
(1, 'logo.png', 'footer_logo.png', 'favicon.png', 'header_image.png', 'home_page_banner.png', 'footer_image.jpg', 'Sprint-bioscience(OPC)Private Limited', '<div><span style=\"color: rgb(0, 0, 0)\">Lorem Ipsum is simply dummy text of the printing It is a long established fact that a reader will be  when looking at its layout.</span></div>', '403,jayant blocks,bharath nagar,Visakhapatnam.', '+91 1234567890', 'info@sprintsciences.com', 'https://facebook.com/example', 'https://youtube.com/example', 'https://instagram.com/example', 'https://twitter.com/example', 'https://linkedin.com/example', 'https://pinterest.com/example', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d15218.82265645824!2d78.4508319005088!3d17.521558434216274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sPlot%20No%3A61%2FA%2C%20Subhash%20Nagar%2C%20Jeedimetla%2C%20Hyderabad%20500055%20Telangana!5e0!3m2!1sen!2sin!4v1721650944526!5m2!1sen!2sin\" width=\"100%\" height=\"180\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15200.86260564388!2d83.28741338530627!3d17.73447521953789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a39432ec550fd99%3A0x32dc7ad27779eef3!2sAkkayyapalem%2C%20Visakhapatnam%2C%20Andhra%20Pradesh%20530016!5e0!3m2!1sen!2sin!4v1726235933947!5m2!1sen!2sin\" width=\"100%\" height=\"500\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2023-12-01 12:00:00', '2024-12-18 05:45:01', '+91 1234567890', 'info@sprintsciences.com');

-- --------------------------------------------------------

--
-- Table structure for table `systemlogs`
--

CREATE TABLE `systemlogs` (
  `id` int NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ipaddress` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `login_time` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `systemlogs`
--

INSERT INTO `systemlogs` (`id`, `user`, `ipaddress`, `login_time`, `created_at`, `updated_at`) VALUES
(6, 'Admin', '127.0.0.1', '17 December 2024 01:15 PM', '2024-12-17 13:15:51', '2024-12-17 13:15:51'),
(7, 'Admin', '127.0.0.1', '18 December 2024 04:40 AM', '2024-12-18 04:40:21', '2024-12-18 04:40:21'),
(8, 'Admin', '127.0.0.1', '19 December 2024 05:15 AM', '2024-12-19 05:15:50', '2024-12-19 05:15:50'),
(9, 'Admin', '127.0.0.1', '19 December 2024 12:32 PM', '2024-12-19 12:32:12', '2024-12-19 12:32:12'),
(10, 'Admin', '127.0.0.1', '20 December 2024 05:48 AM', '2024-12-20 05:48:39', '2024-12-20 05:48:39'),
(11, 'Admin', '49.37.133.54', '20 December 2024 06:25 AM', '2024-12-20 06:25:19', '2024-12-20 06:25:19'),
(12, 'Admin', '49.37.133.54', '20 December 2024 06:30 AM', '2024-12-20 06:30:56', '2024-12-20 06:30:56'),
(13, 'Admin', '49.37.133.54', '23 December 2024 11:55 AM', '2024-12-23 11:55:22', '2024-12-23 11:55:22'),
(14, 'Admin', '49.37.133.54', '23 December 2024 12:38 PM', '2024-12-23 12:38:10', '2024-12-23 12:38:10'),
(15, 'Admin', '49.37.133.54', '23 December 2024 01:03 PM', '2024-12-23 13:03:35', '2024-12-23 13:03:35'),
(16, 'Admin', '106.51.5.39', '23 December 2024 01:11 PM', '2024-12-23 13:11:40', '2024-12-23 13:11:40'),
(17, 'Admin', '152.58.235.20', '26 December 2024 08:51 AM', '2024-12-26 08:51:05', '2024-12-26 08:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `profile_image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_general_ci,
  `profile_image` varchar(170) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `review`, `profile_image`, `created_at`, `updated_at`) VALUES
(4, 'Varshini', 'Management', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'profile_image230521425.png', '2024-07-17 21:09:17', '2024-12-23 12:51:19'),
(5, 'Vinay Rao', 'Management', 'LIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'profile_image579218129.png', '2024-12-09 17:47:18', '2024-12-18 07:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role_name` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role_id` bigint DEFAULT NULL,
  `admin_status` tinyint(1) DEFAULT NULL,
  `privileges` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `role_id`, `admin_status`, `privileges`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@sprintbioscience.com', NULL, 1, '$2y$10$EJ99TD1.VaJNhIXsZ0LtEuPkyBwuImr771lIxxC.hT8juXF/w7lgO', NULL, 1, 1, NULL, NULL, NULL),
(9, 'ravi', NULL, 'dev@gmail.com', NULL, 0, '$2y$10$hokuauTwpNF.dwhG.1XUtuolGr2WQjwNi0mIxkkL1uT...', NULL, 2, 0, 'service,home_about,admin,logout', '2024-11-15 17:32:12', '2024-11-15 17:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `who_we_are`
--

CREATE TABLE `who_we_are` (
  `id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `who_we_are`
--

INSERT INTO `who_we_are` (`id`, `image`, `title`, `created_at`, `updated_at`) VALUES
(3, '1734957954_who_we_are.png', 'Big Animal', '2024-12-17 05:09:56', '2024-12-23 12:45:54'),
(4, '1734412317_who_we_are.png', 'Aqua', '2024-12-17 05:11:57', '2024-12-17 05:11:57'),
(5, '1734412339_who_we_are.png', 'Poultry', '2024-12-17 05:12:19', '2024-12-17 05:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `whychooseuspage`
--

CREATE TABLE `whychooseuspage` (
  `id` int NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description1` text COLLATE utf8mb4_general_ci,
  `image2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description2` text COLLATE utf8mb4_general_ci,
  `image3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description3` text COLLATE utf8mb4_general_ci,
  `image4` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading4` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description4` text COLLATE utf8mb4_general_ci,
  `image5` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading5` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description5` text COLLATE utf8mb4_general_ci,
  `image6` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `heading6` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description6` text COLLATE utf8mb4_general_ci,
  `bottom_text` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `whychooseuspage`
--

INSERT INTO `whychooseuspage` (`id`, `image1`, `heading1`, `description1`, `image2`, `heading2`, `description2`, `image3`, `heading3`, `description3`, `image4`, `heading4`, `description4`, `image5`, `heading5`, `description5`, `image6`, `heading6`, `description6`, `bottom_text`, `created_at`, `updated_at`) VALUES
(1, 'image1_1733900816.gif', '100% Client Satisfaction', '<p>At Eagle Tax, we believe that a satisfied customer is the cornerstone of our success. We focus on building long-term relationships by understanding your unique needs, adding value, and delivering personalized service. Every inquiry is acknowledged within 24 hours, handled with care, and treated with fairnes</p>', 'image2_1733901088.gif', 'Maximum Refund', '<p>Our proactive tax planning ensures you legally minimize your tax liability and maximize your after-tax income. We thoroughly review your situation to identify opportunities for tax savings and secure the maximum legal refund possible.</p>', 'image3_1733901487.gif', 'Simple Pricing', '<p>Eagle Tax offers transparent, value-based pricing, starting as low as $10 for federal tax returns. Our pricing model ensures you only pay for the value you receive.</p>', 'image4_1733901487.gif', 'Ease', '<p>Tax professionals simplify the process, saving you time and effort.</p>', 'image5_1733901487.gif', 'Expertise ensures accuracy and compliance, reducing stress.', '<p>Expertise ensures accuracy and compliance, reducing stress.</p>', 'image6_1733901487.gif', 'Future Assurance', '<p>Having professionals on your side is invaluable if you ever face an audit.</p>', 'Choose Eagle Tax Filing for trusted, efficient, and secure tax services tailored to meet your needs.', '2024-12-11 12:17:57', '2024-12-12 17:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` int NOT NULL,
  `heading` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `short_description` text COLLATE utf8mb4_general_ci,
  `image` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image2` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `heading`, `description`, `short_description`, `image`, `image2`, `created_at`, `updated_at`) VALUES
(1, 'Empowering Sustainable Aquaculture Through Innovation', '<p><strong><span style=\"color: rgb(0, 0, 0)\">Our Approach</span></strong></p><div><ul><li>Emphasis on Research and Development</li><li>State-of-the-art manufacturing facilities</li><li>Modern R&amp;D units</li><li>Well-equipped Quality Control Laboratory</li><li>Industry-oriented technologists who understand customer needs</li></ul></div>', '<p>Sprint Bioscience, we\'re passionate about transforming aquaculture through innovative solutions, blending expertise with forward-thinking approaches to deliver to high quality products and services.<br></p>', '1734412906das.png', '1734413263_image2.png', '', '2024-12-23 12:48:17'),
(2, '100% Secure and Confidential', '<p>Your data is protected with cutting-edge encryption and privacy measures.</p>', NULL, 'record267252066.png', NULL, '2024-12-09 17:27:37', '2024-12-09 17:35:20'),
(3, 'Easy Online Process', 'File your taxes from anywhere, at any time, with just a few clicks.', NULL, 'record254597975.png', NULL, '2024-12-09 17:35:53', '2024-12-09 17:35:53'),
(4, '24/7 Customer Support', 'Our team is always available to help you with any questions or concerns.', NULL, 'record1041348545.png', NULL, '2024-12-09 17:36:16', '2024-12-09 17:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `working`
--

CREATE TABLE `working` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `working`
--

INSERT INTO `working` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Design', '<p>There are many variations of passages of Lorem Ipsum available, but the</p>', '2024-06-28 12:23:36', '2024-06-28 12:23:36'),
(2, 'Prototype', '<p>There are many variations of passages of Lorem Ipsum available, but the</p>', '2024-06-28 12:23:57', '2024-06-28 12:23:57'),
(3, 'Manufacturing Engineering', '<p>There are many variations of passages of Lorem Ipsum available, but the</p>', '2024-06-28 12:24:17', '2024-06-28 12:24:17'),
(4, 'Process Improvement', '<p>There are many variations of passages of Lorem Ipsum available, but the</p>', '2024-06-28 12:24:32', '2024-06-28 12:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_videos`
--

CREATE TABLE `youtube_videos` (
  `id` int NOT NULL,
  `youtube_link` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `youtube_videos`
--

INSERT INTO `youtube_videos` (`id`, `youtube_link`, `created_at`, `updated_at`) VALUES
(1, '<iframe width=\"403\" height=\"220\" src=\"https://www.youtube.com/embed/M3xEvIZrCjs\" title=\"How to Make Money from Grocery Delivery App? | Business Ideas | Grocery Online Business\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '2024-04-30 16:46:30', '2024-04-30 18:29:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogslider`
--
ALTER TABLE `blogslider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_of_directors`
--
ALTER TABLE `board_of_directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counts`
--
ALTER TABLE `counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_about`
--
ALTER TABLE `home_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_services`
--
ALTER TABLE `home_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managements`
--
ALTER TABLE `managements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestones`
--
ALTER TABLE `milestones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourteam`
--
ALTER TABLE `ourteam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partnership`
--
ALTER TABLE `partnership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_image`
--
ALTER TABLE `portfolio_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_feature`
--
ALTER TABLE `product_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resort_sections`
--
ALTER TABLE `resort_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_1`
--
ALTER TABLE `services_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_feature`
--
ALTER TABLE `service_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemlogs`
--
ALTER TABLE `systemlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `who_we_are`
--
ALTER TABLE `who_we_are`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whychooseuspage`
--
ALTER TABLE `whychooseuspage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working`
--
ALTER TABLE `working`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_videos`
--
ALTER TABLE `youtube_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogslider`
--
ALTER TABLE `blogslider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `board_of_directors`
--
ALTER TABLE `board_of_directors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counts`
--
ALTER TABLE `counts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flats`
--
ALTER TABLE `flats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `highlights`
--
ALTER TABLE `highlights`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_about`
--
ALTER TABLE `home_about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_services`
--
ALTER TABLE `home_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `managements`
--
ALTER TABLE `managements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `milestones`
--
ALTER TABLE `milestones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ourteam`
--
ALTER TABLE `ourteam`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partnership`
--
ALTER TABLE `partnership`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portfolio_image`
--
ALTER TABLE `portfolio_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_feature`
--
ALTER TABLE `product_feature`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resort_sections`
--
ALTER TABLE `resort_sections`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services_1`
--
ALTER TABLE `services_1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_feature`
--
ALTER TABLE `service_feature`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `systemlogs`
--
ALTER TABLE `systemlogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `who_we_are`
--
ALTER TABLE `who_we_are`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `whychooseuspage`
--
ALTER TABLE `whychooseuspage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `working`
--
ALTER TABLE `working`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `youtube_videos`
--
ALTER TABLE `youtube_videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
