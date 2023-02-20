-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pet2stay_system
CREATE DATABASE IF NOT EXISTS `pet2stay_system` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pet2stay_system`;

-- Dumping structure for table pet2stay_system.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.admins: ~1 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `username`, `password`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, '2023-02-14 01:15:58', NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `banner_src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.banners: ~2 rows (approximately)
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`id`, `banner_src`, `alt_text`, `publish_status`, `created_at`, `updated_at`) VALUES
	(2, 'public/imgs/Jfza7jT650n1LhEnepDMnjcRgMGiZ1xlgIxrp63f.jpg', '1', 'on', '2021-11-12 20:51:28', '2023-02-13 06:50:10'),
	(3, 'public/imgs/YlIL4KTW4iQkyKcJx2tTZRPGhXGX8SkXGbeB8R3f.jpg', '2', 'on', '2021-11-12 20:51:39', '2023-02-13 06:50:23');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.bookings
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkin_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pets` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.bookings: ~2 rows (approximately)
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` (`id`, `customer_id`, `room_id`, `checkin_date`, `checkout_date`, `total_pets`, `ref`, `created_at`, `updated_at`) VALUES
	(1, 4, 1, '2021-10-29', '2021-10-30', '2', 'admin', '2021-10-28 21:02:01', '2021-10-28 21:02:01'),
	(2, 1, 2, '2023-02-13', '2023-02-14', '2', 'admin', '2023-02-13 01:33:52', '2023-02-13 01:33:52');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.customers: ~3 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `full_name`, `email`, `password`, `mobile`, `address`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 'John Doe', 'john@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1234567890', NULL, NULL, '2021-09-01 21:48:32', '2021-09-01 21:48:32'),
	(4, 'Alex Lee', 'alex@gmail.com', 'd54b76b2bad9d9946011ebc62a1d272f4122c7b5', '789456123', 'test', NULL, '2021-09-28 21:43:42', '2021-09-28 21:43:42'),
	(5, 'Syazwani', 'waniesyaz00@gmail.com', '90d15ea5047f752e1191ea647db148ca7a602fbd', '0182585261', 'Kampung sungai Serai', NULL, '2023-02-13 01:41:02', '2023-02-13 01:41:02');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.departments: ~2 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `title`, `detail`, `created_at`, `updated_at`) VALUES
	(1, 'HouseKeeping', 'HouseKeeping Detail', '2021-08-15 12:29:31', '2021-08-15 12:29:31'),
	(2, 'Shift Managers', 'Shift Managers Detail', '2021-08-15 12:30:02', '2021-08-15 12:30:02');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.migrations: ~18 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_07_22_181853_create_room_types_table', 1),
	(5, '2021_07_22_182302_create_rooms_table', 2),
	(6, '2021_07_22_182755_add_room_type_id_to_rooms_table', 3),
	(7, '2021_07_29_154439_create_customers_table', 4),
	(8, '2021_07_29_165100_add_price_to_room_types_table', 5),
	(9, '2021_08_01_163509_create_admins_table', 6),
	(10, '2021_08_05_031451_create_roomtypeimages_table', 7),
	(11, '2021_08_05_033838_create_roomtypeimages_table', 8),
	(12, '2021_08_15_090054_create_departments_table', 9),
	(13, '2021_08_15_094608_create_staff_table', 10),
	(14, '2021_08_19_034453_create_staff_payments_table', 11),
	(15, '2021_08_30_192906_create_bookings_table', 12),
	(16, '2021_10_29_033215_create_services_table', 13),
	(17, '2021_10_31_083320_create_testimonials_table', 14),
	(18, '2021_11_12_180726_create_banners_table', 15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.rooms
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.rooms: ~3 rows (approximately)
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` (`id`, `title`, `created_at`, `updated_at`, `room_type_id`) VALUES
	(1, 'Room 1', '2021-09-02 20:02:22', '2021-09-02 20:02:22', 1),
	(2, 'Room 2', '2021-09-02 20:02:40', '2021-09-02 20:02:40', 2),
	(3, 'Room 3', '2021-09-13 20:21:02', '2021-09-13 20:21:02', 1);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.roomtypeimages
CREATE TABLE IF NOT EXISTS `roomtypeimages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `room_type_id` int(11) NOT NULL,
  `img_src` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_alt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.roomtypeimages: ~3 rows (approximately)
/*!40000 ALTER TABLE `roomtypeimages` DISABLE KEYS */;
INSERT INTO `roomtypeimages` (`id`, `room_type_id`, `img_src`, `img_alt`, `created_at`, `updated_at`) VALUES
	(23, 21, 'public/imgs/vD5L0IlIU4sztSucrQIEq0FmEY8yeJQsJEjurKPn.jpg', 'Sweet Room', '2021-08-09 20:08:37', '2021-08-09 20:08:37'),
	(30, 1, 'public/imgs/YLanRsUms68uLvtuKxzkDdeFx9gpq94sSXxs1fmZ.jpg', 'Deluxe Rooms', '2023-02-13 06:48:54', '2023-02-13 06:48:54'),
	(31, 2, 'public/imgs/kjst8x0HakwLFIs7u7jPeyDSQv0tcTC4v9xhHFQy.jpg', 'Premium Rooms', '2023-02-13 06:49:10', '2023-02-13 06:49:10');
/*!40000 ALTER TABLE `roomtypeimages` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.room_types
CREATE TABLE IF NOT EXISTS `room_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.room_types: ~2 rows (approximately)
/*!40000 ALTER TABLE `room_types` DISABLE KEYS */;
INSERT INTO `room_types` (`id`, `title`, `detail`, `created_at`, `updated_at`, `price`) VALUES
	(1, 'Deluxe Rooms', 'Deluxe Rooms', '2021-07-28 19:37:11', '2023-02-13 06:51:55', '98'),
	(2, 'Premium Rooms', 'Premium Rooms', '2021-07-28 19:37:20', '2023-02-13 06:52:09', '60');
/*!40000 ALTER TABLE `room_types` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.services: ~2 rows (approximately)
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`id`, `title`, `small_desc`, `detail_desc`, `photo`, `created_at`, `updated_at`) VALUES
	(2, 'Service 1', 'Small Description', 'Detail Description', 'public/imgs/g3Xd0e0x6rlobSj4Y0QsqAnHg0OntBoCGxpK0f30.jpg', '2021-10-29 20:08:45', '2023-02-13 06:51:22'),
	(3, 'Service 2', 'THis is small desc', 'This is detail desc', 'public/imgs/zHGoPIAjR4gV0xFV8HwVjMXPkjYEl8pUp0KVpyr8.jpg', '2021-10-30 21:21:37', '2023-02-13 06:51:35');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_amt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.staff: ~0 rows (approximately)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `full_name`, `department_id`, `photo`, `bio`, `salary_type`, `salary_amt`, `created_at`, `updated_at`) VALUES
	(1, 'Alex Lee', 1, 'public/imgs/zIgkPJneI4uz5q4B0iKqrUByUciq4123dBTRrDev.jpg', 'This is some bio detail', 'monthly', '5000', '2021-08-15 12:34:28', '2021-08-29 10:02:24');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.staff_payments
CREATE TABLE IF NOT EXISTS `staff_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.staff_payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `staff_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff_payments` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.testimonials
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `testi_cont` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.testimonials: ~0 rows (approximately)
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` (`id`, `customer_id`, `testi_cont`, `created_at`, `updated_at`) VALUES
	(1, 4, 'adfasdfsdfsdfsdf', '2021-10-31 11:09:57', '2021-10-31 11:09:57');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;

-- Dumping structure for table pet2stay_system.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pet2stay_system.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
