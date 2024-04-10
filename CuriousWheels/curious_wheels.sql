-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 05:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curious_wheels`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image_url`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Officia in minima eu', 'Harum consequatur v', 'http://127.0.0.1:8000/uploads/blog_images/7fMmnxwB5JgByHgBkEga93uhRX3HNVdnogMPi3Od.jpg', 'Deserunt iste aute r', '2024-03-10 12:04:24', '2024-03-10 12:28:28'),
(2, 'Non quos sit consequ', 'Fuga Sit dicta occa', 'http://127.0.0.1:8000/uploads/blog_images/D9JW4gkm6rpN7HJ0NwDgMoPzVe8CBNSmqAHK31IB.jpg', 'Laudantium et earum', '2024-03-10 12:07:21', '2024-03-10 12:28:40'),
(3, 'Nobis occaecat dolor', 'Ipsa laboriosam du', 'http://127.0.0.1:8000/uploads/blog_images/9g4eAb3biqBQvVeBl9gcAV5qqYqQT6K3WnsYlkBu.jpg', 'Laudantium tempor a', '2024-03-10 12:13:24', '2024-03-10 12:28:53'),
(4, 'Aliquam at odit maio', 'Ullamco dolore esse', 'http://127.0.0.1:8000/uploads/blog_images/tbQrxqPjkWwd9zBk0OlJfesVeTaG5g79imeUxqLN.jpg', 'Distinctio Aliqua', '2024-03-10 12:17:12', '2024-03-10 12:29:08'),
(5, 'Officia sunt fugiat', 'Velit eiusmod distin', 'http://127.0.0.1:8000/uploads/blog_images/vgY76lUZHM9q7DkT2kbHZP6yt0QyfXo51J9wYlAq.jpg', 'Tempore repellendus', '2024-03-10 12:19:00', '2024-03-10 12:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pickup_location` varchar(255) DEFAULT NULL,
  `is_custom_location` tinyint(1) DEFAULT NULL,
  `booking_status` varchar(20) DEFAULT 'pending',
  `total_cost` decimal(10,2) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT 'pending',
  `payment_id` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `vehicle_id`, `user_id`, `start_date`, `end_date`, `created_at`, `updated_at`, `pickup_location`, `is_custom_location`, `booking_status`, `total_cost`, `payment_status`, `payment_id`) VALUES
(1, 2, 1, '2024-04-05', '2024-04-06', '2024-04-05 07:26:11', '2024-04-05 07:26:11', 'New City Light, Althan, Surat, India', NULL, 'pending', NULL, 'pending', '0'),
(2, 2, 1, '2024-04-05', '2024-04-12', '2024-04-05 07:56:22', '2024-04-05 07:56:22', 'New City Light, Althan, Surat, India', NULL, 'pending', NULL, 'pending', '0'),
(3, 2, 1, '2024-04-05', '2024-04-22', '2024-04-05 07:59:20', '2024-04-05 07:59:20', 'New City Light, Althan, Surat, India', NULL, 'pending', NULL, 'pending', '0'),
(4, 3, 1, '2024-04-05', '2024-04-08', '2024-04-05 08:01:33', '2024-04-05 08:01:33', 'Tirupati Plaza, Nanpura, Surat, India', NULL, 'pending', NULL, 'pending', '0'),
(5, 3, 1, '2024-04-05', '2024-04-29', '2024-04-05 08:09:05', '2024-04-05 08:09:05', 'Tirupati Plaza, Nanpura, Surat, India', NULL, 'pending', NULL, 'pending', '0'),
(6, 2, 1, '2024-04-11', '2024-04-12', '2024-04-05 08:11:10', '2024-04-05 08:11:10', 'New City Light, Althan, Surat, India', NULL, 'pending', NULL, 'pending', 'pay_Nuxdcf8sCAGmcI'),
(7, 3, 1, '2024-04-09', '2024-04-11', '2024-04-09 07:36:54', '2024-04-09 07:36:54', '\"Tirupati Plaza, Nanpura, Surat, India\"', NULL, 'pending', '60.00', 'pending', 'pay_NwXBu6ndzaaTOU'),
(8, 2, 1, '2024-04-09', '2024-04-10', '2024-04-09 07:44:33', '2024-04-09 07:44:33', 'New City Light, Althan, Surat, India', NULL, 'pending', '75.00', 'pending', 'pay_NwXJzRhVSbi9jL'),
(9, 2, 1, '2024-04-10', '2024-04-11', '2024-04-10 08:31:29', '2024-04-10 08:31:29', 'New City Light, Althan, Surat, India', NULL, 'pending', '75.00', 'pending', 'pay_NwweR517662yMw'),
(10, 5, 1, '2024-04-11', '2024-04-18', '2024-04-10 08:43:04', '2024-04-10 08:43:04', 'icon business hub, Surat, India', NULL, 'pending', '80.00', 'pending', 'pay_NwwqpjartTh8ww'),
(11, 13, 1, '2024-04-11', '2024-04-12', '2024-04-10 08:45:38', '2024-04-10 08:45:38', 'Ashutosh Nagri, Jahangir Pura, Surat, India', NULL, 'pending', '110.00', 'pending', 'pay_NwwtcqeU3mMNPM');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_21_164421_add_role_to_users_table', 2),
(6, '2024_02_21_164702_add_role_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar_url`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Dhaval Vasava', 'vasavadhaval1149@gmail.com', NULL, '$2y$12$hTnyj2Os/5RzaG6XCr7Rm.g7lSHA66ynB.PMwC5QzOE/w2JWzzlTC', 'http://127.0.0.1:8000/uploads/profile_img/g7dlt8TeBwgmuP7g7K7mNBpjCKDbg3Yxp4S750dw.png', 'puuTVjmTiPEcA6gTS7gu34k94K2ZjB9yPhbrqq1Z2k3felHTs7am4YFK7fBm', '2024-02-21 11:22:04', '2024-04-04 11:57:37', 'admin'),
(2, 'user', 'user1@mailinator.com', NULL, '$2y$12$hTnyj2Os/5RzaG6XCr7Rm.g7lSHA66ynB.PMwC5QzOE/w2JWzzlTC', NULL, 'NTnX90LbWXYWHDlB5req6fgD10JpJgVeqhf8KcRPisTQXplBa24Udy2TFSYt', '2024-03-07 14:16:29', '2024-04-05 08:45:22', 'user'),
(3, 'user 2', 'user2@gmail.com', NULL, '$2y$12$huAqMDroOiilCxySndZZMuT0KB6akZ/4JrfGab2rlh1hbFQlSrdlS', '/storage/src/users/profile_img/xij4Dxt85WGckUnujhGEP7h8B6qc5Xak2mdeznPZ.jpg', NULL, '2024-03-07 14:29:36', '2024-03-07 14:29:36', 'user'),
(4, 'user 3', 'user3@gmail.com', NULL, '$2y$12$F5zlCiQBQnK6n6P3kO7Eou0Jr8a8W/vsGNyVbdFcsfqMpS50jCQWG', '/storage/src/users/profile_img/Q7mJ5S9jKFsF8Yo2rQGG98RKwKYyWBetZd4VhXrl.jpg', NULL, '2024-03-07 14:34:11', '2024-03-07 14:34:11', 'user'),
(5, 'user 4', 'user4@gmail.com', NULL, '$2y$12$zJI/6M3NVrNJ/IHRlvfqW.VFkvtLILLq5CixMXRGQpqlTkxCJuYka', '/storage/src/users/profile_img/fDrG8ybijL5kbULGfRK8t0pjuQmZCUuTmMBBex6u.jpg', NULL, '2024-03-07 14:42:12', '2024-03-07 14:42:12', 'user'),
(6, 'user 5', 'user5@gmail.com', NULL, '$2y$12$Qd1Wsf1RAXZQZZ8y5LnTgeys3JSgZ7o29zvul/ePXL9NhBoPfz9Be', '/storage/src/users/profile_img/UrNSF6wQhIuUJlWHxs6CVRHuqcLMKKDMe5tBfCgf.jpg', NULL, '2024-03-07 14:44:01', '2024-03-07 14:44:01', 'user'),
(7, 'user 6', 'user6@gmail.com', NULL, '$2y$12$7ZHzICxsjcis3tpXmrQ9RuPL7rjVZlL1lcPB4DeILhrsl6CMZRzzW', 'http://127.0.0.1:8000/uploads/profile_img/EQl4YSXfOyzoSobHNqle2cGiL3ZZ9dOiMUydSv0z.jpg', NULL, '2024-03-07 14:45:31', '2024-03-07 15:17:26', 'user'),
(8, 'dhaval', 'dhaval@gmail.com', NULL, '$2y$12$0MqQJZf3Wvq4pzX/qL4h8eStodSgQr1ays6iXT1/mpq8qe/JV7Y5.', NULL, NULL, '2024-04-01 14:32:15', '2024-04-01 14:32:15', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `type` int(100) NOT NULL DEFAULT 2,
  `capacity` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `rental_pricing_model` varchar(255) NOT NULL DEFAULT 'Per Hour',
  `image_url` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `fuel_type` varchar(50) DEFAULT NULL,
  `transmission` varchar(50) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL,
  `plate_number` varchar(20) DEFAULT NULL,
  `insurance_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `make`, `model`, `year`, `type`, `capacity`, `availability`, `description`, `price`, `rental_pricing_model`, `image_url`, `location`, `fuel_type`, `transmission`, `mileage`, `plate_number`, `insurance_number`, `created_at`, `updated_at`) VALUES
(2, 'Ford', 'F-150', 2021, 2, 3, 1, NULL, '75.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/dfreqOpTQ7Z8PRgQNg1Kecaw57JXmAfr26QqzbhC.jpg', '1', 'Gasoline', 'Automatic', 20000, 'DEF456', 'INS456', '2024-03-03 08:30:29', '2024-04-10 08:22:46'),
(3, 'Honda', 'CR-V', 2023, 2, 5, 1, NULL, '60.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/kZGi8EJRcr20J5q2OuzIcPkfQLbJBuORiZJ32UVi.jpg', '6', 'Gasoline', 'Automatic', 15000, 'GHI789', 'INS789', '2024-03-03 08:30:29', '2024-04-10 08:22:56'),
(4, 'Chevrolet', 'Cruze', 2020, 2, 5, 1, 'An efficient and reliable sedan perfect for daily commuting, offering a smooth ride and modern amenities.', '45.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/rapl8ohcZkiNEWZ5ny9xoUlnmNPz8lEuPgFVxEHz.jpg', '4', 'Gasoline', 'Automatic', 12000, 'JKL012', 'INS012', '2024-03-03 08:30:29', '2024-03-14 09:29:42'),
(5, 'Jeep', 'Wrangler', 2022, 2, 4, 1, 'An iconic off-road vehicle known for its ruggedness and capability, perfect for outdoor enthusiasts and adventurers.', '80.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/oISzRtg7TBOGdpIg2lCwfVmFa57ZJmsCSe1oqL4C.jpg', '4', 'Gasoline', 'Manual', 18000, 'MNO345', 'INS345', '2024-03-03 08:30:29', '2024-03-14 09:29:56'),
(6, 'Tesla', 'Model 3', 2023, 2, 5, 1, 'An electric sedan offering cutting-edge technology, impressive performance, and long-range capabilities, perfect for eco-conscious drivers.', '90.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/0DnBqP9wqCNMLcD3wxZSoBs2UZiyTiqEVesgCv5y.jpg', '2', 'Electric', 'Automatic', 1000, 'PQR678', 'INS678', '2024-03-03 08:30:29', '2024-03-15 13:57:17'),
(7, 'BMW', 'X5', 2021, 2, 5, 1, 'A luxury SUV offering a blend of comfort, performance, and advanced technology features, perfect for discerning drivers seeking refinement and elegance.', '120.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/6j2G1xCiHdwcsfErRfhC530TvLP8MPVwjz3IC7H7.jpg', '2', 'Diesel', 'Automatic', 15000, 'STU901', 'INS901', '2024-03-03 08:30:29', '2024-03-15 13:57:20'),
(8, 'Toyota', 'Corolla', 2022, 2, 5, 1, 'A reliable and fuel-efficient sedan known for its longevity and value, offering a comfortable ride and spacious interior.', '55.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/b98uWI9r2MAja0jcsSKKPXzIrXmb8VVUHW9jDTQ0.jpg', '3', 'Gasoline', 'Automatic', 8000, 'VWX234', 'INS234', '2024-03-03 08:30:29', '2024-03-15 13:57:25'),
(9, 'Ford', 'Explorer', 2021, 2, 7, 1, 'A spacious and versatile SUV offering plenty of cargo space and advanced technology features, perfect for families and outdoor adventures.', '85.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/yO7WNQQ8pRWWZHwLymwjFUdPA8rnBAVbFYHQBXAH.jpg', '5', 'Gasoline', 'Automatic', 22000, 'YZA567', 'INS567', '2024-03-03 08:30:29', '2024-03-15 13:57:32'),
(10, 'Honda', 'Accord', 2023, 2, 5, 1, 'A stylish and comfortable sedan offering a refined driving experience and advanced safety features, perfect for daily commuting and long trips.', '65.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/1VcMtoCreikDWZPrKlXF7ZkPacKvW5FMXFjqLyK7.jpg', '1', 'Gasoline', 'Automatic', 13000, 'BCD890', 'INS890', '2024-03-03 08:30:29', '2024-03-15 13:57:29'),
(11, 'Chevrolet', 'Silverado', 2021, 2, 3, 1, 'A rugged and dependable pickup truck offering impressive towing capacity and capability, perfect for both work and play.', '80.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/2ed9yZoAxSvGJKduWd80wPyCxN6foUPMu8QoE4Wc.jpg', '3', 'Diesel', 'Automatic', 18000, 'EFG123', 'INS123', '2024-03-03 08:30:29', '2024-03-15 13:57:27'),
(12, 'Jeep', 'Grand Cherokee', 2022, 2, 5, 1, 'A luxurious and capable SUV known for its off-road prowess and upscale interior, perfect for adventures and daily driving alike.', '95.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/l6x0wcO9sOfnAws8CKaP10UOc6dJurlXpeVyC7iP.jpg', '2', 'Gasoline', 'Automatic', 20000, 'HIJ456', 'INS456', '2024-03-03 08:30:29', '2024-03-15 13:57:35'),
(13, 'Tesla', 'Model S', 2023, 2, 5, 1, 'A premium electric sedan offering exhilarating performance, advanced technology features, and a luxurious interior, perfect for those seeking cutting-edge automotive innovation.', '110.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/LfCWXgxTyrmI3R8Jq8Oao03xgcGu9Z3mHaxn6TZy.jpg', '5', 'Electric', 'Automatic', 5000, 'KLM789', 'INS789', '2024-03-03 08:30:29', '2024-03-14 09:37:37'),
(14, 'BMW', '3 Series', 2021, 2, 5, 1, 'A sporty and luxurious sedan offering dynamic performance, sophisticated styling, and advanced technology features, perfect for driving enthusiasts.', '70.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/FuHtVrbmGah5Tqx9I3r0cJzk4c7FYPDjWmtl5Cab.jpg', '2', 'Gasoline', 'Automatic', 14000, 'NOP012', 'INS012', '2024-03-03 08:30:29', '2024-03-15 13:57:38'),
(15, 'Toyota', 'Rav4', 2022, 2, 5, 1, 'A versatile and reliable SUV offering a blend of comfort, capability, and fuel efficiency, perfect for urban and outdoor adventures.', '75.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/EqkOjOtFfSGS9HQa0AUYOdH6slKxJcBxjpQG555b.png', '3', 'Gasoline', 'Automatic', 16000, 'QRS345', 'INS345', '2024-03-03 08:30:29', '2024-03-15 13:57:42'),
(16, 'Ford', 'Escape', 2023, 2, 5, 1, 'A compact SUV offering a blend of comfort, efficiency, and practicality, perfect for daily commuting and weekend getaways.', '60.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/sUsenrZr64Z3lAmn4UbUiiQOAofIwTiEy4MoZT9C.jpg', NULL, 'Gasoline', 'Automatic', 12000, 'TUV678', 'INS678', '2024-03-03 08:30:29', '2024-03-14 09:38:07'),
(17, 'Honda', 'Pilot', 2021, 2, 8, 1, 'A spacious and versatile SUV offering seating for up to eight passengers, advanced safety features, and ample cargo space, perfect for large families and group travel.', '90.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/nBtFcjr0EWSuZC3WHGzx39tpHgKR5CISLzABVy15.jpg', '3', 'Gasoline', 'Automatic', 20000, 'VWX901', 'INS901', '2024-03-03 08:30:29', '2024-03-15 13:57:39'),
(18, 'Chevrolet', 'Equinox', 2022, 2, 5, 1, 'A compact SUV offering a comfortable ride, modern features, and fuel-efficient performance, perfect for urban commuting and weekend adventures.', '65.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/LeBqcAtVBdRJ4gSlvK9ZyRr2ZjbtFqA6qnWhf97O.jpg', '1', 'Gasoline', 'Automatic', 14000, 'YZA234', 'INS234', '2024-03-03 08:30:29', '2024-03-15 13:57:45'),
(19, 'Jeep', 'Renegade', 2023, 2, 5, 1, NULL, '55.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/pwQXLxPmUfaHV4BqoNjtjNdqx8ZtjxZgMvNxdCrJ.jpg', '1', 'Gasoline', 'Automatic', 10000, 'BCD567', 'INS567', '2024-03-03 08:30:29', '2024-03-15 14:19:24'),
(20, 'Tesla', 'Model X', 2021, 2, 7, 1, 'A versatile electric SUV offering spacious seating, impressive performance, and long-range capability, perfect for eco-conscious families and outdoor enthusiasts.', '130.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/E8kze1uxtcOfHzwWbgI5GBPNWCdrFvopNftWdD3e.jpg', '4', 'Electric', 'Automatic', 18000, 'EFG890', 'INS890', '2024-03-03 08:30:29', '2024-03-14 09:39:19'),
(21, 'BMW', 'X3', 2022, 2, 5, 1, 'A compact luxury SUV offering dynamic performance, a luxurious interior, and advanced technology features, perfect for urban driving and weekend adventures.', '80.00', 'Per Hour', 'http://127.0.0.1:8000/uploads/vehicles_img/VqNIYPnuR51YyMfWKLEAM1ulERpvKr0X4asfMsKs.jpg', '3', 'Gasoline', 'Automatic', 15000, 'HIJ123', 'INS123', '2024-03-03 08:30:29', '2024-03-14 09:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_locations`
--

CREATE TABLE `vehicle_locations` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_locations`
--

INSERT INTO `vehicle_locations` (`id`, `address`, `created_at`, `updated_at`) VALUES
(1, 'New City Light, Althan, Surat, India', '2024-03-13 12:41:43', '2024-03-15 13:48:06'),
(2, 'Athugar Street, Nanpura, Surat, India', '2024-03-13 12:41:43', '2024-03-15 13:48:40'),
(3, 'Nanpura, makkai pool, Surat, India', '2024-03-13 12:41:43', '2024-03-15 13:48:49'),
(4, 'icon business hub, Surat, India', '2024-03-13 12:41:43', '2024-03-15 22:41:59'),
(5, 'near Chandni Chowk, Surat, India', '2024-03-13 12:41:43', '2024-03-15 13:49:21'),
(6, 'Tirupati Plaza, Nanpura, Surat, India', '2024-03-13 12:41:43', '2024-03-15 13:49:33'),
(7, 'Ashutosh Nagri, Jahangir Pura, Surat, India', '2024-03-13 12:41:43', '2024-03-15 13:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sedan', '2024-03-10 10:34:47', '2024-03-10 06:12:51'),
(2, 'SUV', '2024-03-10 10:34:47', '2024-03-10 10:34:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_locations`
--
ALTER TABLE `vehicle_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vehicle_locations`
--
ALTER TABLE `vehicle_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
