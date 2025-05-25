-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 09:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` varchar(50) NOT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `patient_email` varchar(50) DEFAULT NULL,
  `patient_phone` varchar(15) DEFAULT NULL,
  `patient_age` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `doctor_name` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_name`, `patient_email`, `patient_phone`, `patient_age`, `doctor_id`, `doctor_name`, `department_id`, `department_name`, `appointment_date`, `appointment_time`, `status`, `created_at`, `updated_at`) VALUES
('APT-0001', 'Mohib', NULL, NULL, 12, 1, NULL, 1, 'Dentists', '2024-11-01', '12:48:00', 'Active', '2024-10-22 14:48:45', '2024-10-22 14:48:45'),
('APT-0002', 'Ibrahim', NULL, NULL, 23, 1, NULL, 1, 'Dentists', '2024-10-29', '12:49:00', 'Active', '2024-10-22 14:49:31', '2024-10-22 14:49:31'),
('APT-0003', 'Mohib', 'jasj@gmail.com', '03424343545', 23, 1, NULL, 2, NULL, '2024-11-06', '02:02:00', 'Active', '2024-10-22 16:02:48', '2024-10-22 16:02:48'),
('APT-0004', 'Ibrahim', 'mohib@gmail.com', '03355767882', 12, 1, NULL, 1, NULL, '2024-11-06', '22:09:00', 'Active', '2024-10-23 12:09:43', '2024-10-23 12:09:43'),
('APT-0005', 'Zhara', 'zhara@gmail.com', '03457826907', 10, 12, NULL, 1, NULL, '2024-11-08', '17:00:00', 'Active', '2024-10-23 12:18:22', '2024-10-23 12:18:22'),
('APT-0006', 'Ibrahim', 'zhara@gmail.com', '03355767882', 34, 12, NULL, 1, NULL, '2024-10-30', '22:36:00', 'Active', '2024-10-23 12:36:29', '2024-10-23 12:36:29'),
('APT-0007', 'Mohib', 'mohib@gmail.com', '03355767882', 20, 1, NULL, 3, NULL, '2024-11-01', '22:37:00', 'Active', '2024-10-23 12:37:44', '2024-10-23 12:37:44'),
('APT-0008', 'Samreen', 'mohib@gmail.com', '03355767882', 25, 12, NULL, 1, NULL, '2024-11-06', '23:05:00', 'Active', '2024-10-23 13:05:13', '2024-10-23 13:05:13'),
('APT-0009', 'Ibrahim', 'mohib@gmail.com', '03355767882', 25, 12, NULL, 1, NULL, '2024-10-24', '23:30:00', 'Active', '2024-10-23 13:30:50', '2024-10-23 13:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dentists', 'Active', '2024-10-08 13:20:39', '2024-10-08 13:20:39'),
(2, 'Neurology', 'Inactive', '2024-10-08 13:23:06', '2024-10-08 13:23:06'),
(3, 'Opthalmology', 'Active', '2024-10-08 13:23:43', '2024-10-08 13:23:43'),
(4, 'Orthopedics', 'Inactive', '2024-10-08 13:24:00', '2024-10-08 13:24:00'),
(5, 'Cancer Department', 'Active', '2024-10-08 13:24:46', '2024-10-08 13:24:46'),
(6, 'ENT Department', 'Active', '2024-10-08 13:25:04', '2024-10-08 13:25:04'),
(7, 'Cardiology', 'Active', '2024-10-16 13:00:26', '2024-10-16 13:00:26'),
(9, 'Biological', 'Inactive', '2024-10-18 18:18:14', '2024-10-18 18:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state_province` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `short_biography` text DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `department_name`, `date_of_birth`, `gender`, `address`, `country`, `city`, `state_province`, `postal_code`, `phone`, `avatar`, `short_biography`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mohib', 'Malik', 'Mohib', 'mmohibmalik4@gmail.com', '$2y$12$.sep15JWRDBoOzntatU5h.XqmlwQBiSveDjrv/k33Uc7QTC.7.0wW', 'Neurology', '2002-10-01', 'Male', 'FS/100 Malir Ext Colony Karachi', 'Pakistan', 'Karachi', 'Sindh', '75050', '03332690446', 'images/adN7YIDapg0dNUVvEWejQZR09j6sQoFUTErcvcrO.jpg', 'Short Biography of Dr. Mohib\n\nDr. Mohib is a dedicated and passionate medical professional committed to improving the health and well-being of his patients. Born and raised in a small town, Mohib was always drawn to the sciences and had a keen interest in how the human body functions. From a young age, he dreamed of becoming a doctor, inspired by the stories of physicians who made a significant difference in the lives of their patients.\n\nAfter completing his high school education with outstanding grades, Mohib was accepted into a prestigious medical school. Throughout his years of study, he exhibited exceptional diligence and a relentless pursuit of knowledge. He earned a reputation among his peers and professors for his inquisitive nature and commitment to excellence. Mohib completed his medical degree with flying colors, demonstrating not only academic prowess but also a strong ethical foundation and a compassionate approach to patient care.\n\nDuring his medical training, Mohib gained valuable experience through various internships and clinical rotations in different medical specialties. He worked in busy urban hospitals as well as smaller community clinics, which exposed him to a diverse patient population and a range of medical conditions. These experiences shaped his understanding of healthcare challenges and the importance of addressing social determinants of health. Mohib developed a particular interest in family medicine, appreciating the holistic approach it takes in treating patients and the emphasis on preventive care.\n\nUpon graduating from medical school, Dr. Mohib pursued residency training in family medicine. This rigorous program further honed his clinical skills and deepened his understanding of primary care. He worked alongside experienced physicians, learning from their expertise while also contributing to patient care. Mohib\'s dedication and compassion stood out, and he quickly earned the respect of his colleagues and mentors. He was known for his ability to communicate effectively with patients, ensuring they felt heard and valued during their visits.\n\nAfter completing his residency, Dr. Mohib began his practice in a community health center, where he focused on serving underprivileged populations. He was determined to make a positive impact on the lives of individuals who faced barriers to accessing healthcare. Mohib implemented programs that promoted health education and preventive care, empowering his patients to take charge of their health. He also actively participated in outreach initiatives, collaborating with local organizations to provide free health screenings and educational workshops.\n\nOne of the core beliefs that guide Dr. Mohib\'s practice is the importance of building strong relationships with his patients. He takes the time to listen to their concerns, understand their backgrounds, and tailor treatment plans to their unique needs. This patient-centered approach has not only improved health outcomes but also fostered trust and loyalty among his patients. Many individuals who have visited him over the years appreciate his genuine care and commitment to their well-being.\n\nIn addition to his clinical work, Dr. Mohib is an avid advocate for public health. He believes that healthcare extends beyond the walls of a clinic and recognizes the need for systemic change to address health disparities. He has participated in various health campaigns, focusing on topics such as nutrition, mental health awareness, and chronic disease prevention. Through these initiatives, Mohib aims to raise awareness about the importance of healthy lifestyles and preventive measures, ultimately reducing the burden of disease in the community.\n\nDr. Mohib is also committed to lifelong learning and professional development. He regularly attends medical conferences and workshops to stay updated on the latest advancements in medicine and evidence-based practices. He values collaboration and often engages with other healthcare professionals to share knowledge and enhance patient care. His dedication to continuous improvement is evident in the way he integrates new research findings into his practice, ensuring that his patients receive the highest quality of care.\n\nBeyond his professional endeavors, Dr. Mohib enjoys spending time with his family and friends. He believes that maintaining a work-life balance is essential for personal well-being and effective patient care. In his free time, Mohib enjoys outdoor activities, such as hiking and cycling, which help him stay physically active and connected to nature. He also engages in community service, volunteering his time for local charities and health fairs.\n\nLooking to the future, Dr. Mohib aspires to expand his impact on healthcare. He is considering opportunities to mentor young medical students and residents, sharing his experiences and insights to inspire the next generation of physicians. His ultimate goal is to create a healthcare environment where patients feel empowered, informed, and valued, regardless of their circumstances.\n\nIn summary, Dr. Mohib is a compassionate and dedicated physician who embodies the principles of patient-centered care, advocacy, and lifelong learning. His journey in medicine reflects his commitment to improving health outcomes and making a difference in the lives of individuals within his community. Through his unwavering dedication, Dr. Mohib continues to inspire both his patients and colleagues, leaving a lasting legacy in the field of medicine.\n\nFeel free to adjust any part of this biography to better suit your needs! Let me know if you need anything else.', 'Active', '2024-10-07 20:45:44', '2024-10-23 04:43:57'),
(11, 'Ibrahim', 'Javed', 'Ibrash', 'ibrahim@gmail.com', '$2y$12$MaWqmblXO7XEgut7qp.Kt.T9ZAkzlO1z0RthsJFXBFKfsGvHh57JS', 'Neurology', '2002-10-07', 'Female', 'Malir 15', 'Pakistan', 'Karachi', 'Sindh', '75050', '03426452334', 'images/xhje0yRjCtpS84L2ALWW67Wbjl3zZ1ocfDJ2CCCT.jpg', 'hgyadyus', 'Active', '2024-10-22 12:22:35', '2024-10-22 12:22:35'),
(12, 'Ali', 'usman', 'Ali', 'ali@gmail.com', '$2y$12$l9s5ObKesmJXiInCIfCKmeL74NscqtipOZ5zIyBkbprnIC74nVoFe', 'Cancer Department', '2002-08-29', 'Female', 'North Karachi', 'Pakistan', 'Karachi', 'Sindh', '7245', '03332690446', 'images/73axI4KVJygsdv4HyblOqZiNP0A7dUOwdRmB7sKk.jpg', 'I am specliast in Cancer', 'Active', '2024-10-23 11:42:13', '2024-10-23 11:42:13'),
(13, 'Khalid', 'walid', 'Khalid', 'khalid2@gmail.com', '$2y$12$ZbtfVvUqIXXaHs/DeDaNV.tTcWRHh1I.2bHbE9haOSnhO8XHYxFcW', 'Neurology', '2000-12-28', 'Female', 'Aptech Metro Star GAte', 'Pakistan', 'Karachi', 'Sindh', '7550', '03172690565', 'images/9T94Yev3Wu3xy2fOpOfbuOsDZTpx2ycNWiQT1I4j.jpg', 'Hello', 'Active', '2024-10-23 13:34:07', '2024-10-23 13:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctorschedule`
--

CREATE TABLE `doctorschedule` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `available_days` varchar(255) NOT NULL,
  `available_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctorschedule`
--

INSERT INTO `doctorschedule` (`id`, `doctor_name`, `department_name`, `available_days`, `available_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Mohib Malik', 'Dentists', '[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\",\"Sunday\"]', '05:00:00', '08:00:00', 'Active', '2024-10-18 19:29:04', '2024-10-23 04:51:09'),
(3, 'Ibrahim', 'Neurology', '[\"Tuesday\",\"Thursday\"]', '11:00:00', '17:00:00', 'Active', '2024-10-18 19:32:07', '2024-10-23 04:52:21'),
(4, 'Ali', 'Dentists', '[\"Monday\",\"Wednesday\",\"Friday\"]', '09:00:00', '11:30:00', 'Inactive', '2024-10-18 19:33:25', '2024-10-23 04:53:00'),
(10, 'Sara', 'Orthopedics', '\"[\\\"Tuesday\\\",\\\"Thursday\\\"]\"', '12:00:00', '21:00:00', 'Active', '2024-10-23 11:55:00', '2024-10-23 04:55:26');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(6, '0001_01_01_000000_create_users_table', 1),
(7, '0001_01_01_000001_create_cache_table', 1),
(8, '0001_01_01_000002_create_jobs_table', 1),
(9, '2024_10_03_035027_add_two_factor_columns_to_users_table', 1),
(10, '2024_10_03_035140_create_personal_access_tokens_table', 1),
(13, '2024_10_20_084630_create_roles_table', 2),
(14, '2024_10_20_084936_add_role_id_to_users_table', 2),
(15, '2024_10_20_140334_add_role_to_users_table', 3),
(16, '2024_10_20_100038_modify_appointments_table', 4);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state_province` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `date_of_birth`, `Age`, `gender`, `address`, `country`, `city`, `state_province`, `postal_code`, `phone`, `avatar`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Mohib', 'malik', 'Mohibb', 'mohib@gmail.com', '$2y$12$guMP0ukdgmjWztv1QpZcdenJqvS/olRC6ecdDbgzFvTcVDvsYFQ5e', '2024-09-30', 22, 'Male', 'Malir', 'Pakistan', 'Karachi', 'Sindh', '75050', '03426452334', 'images/ycogsreRvvBakxcv6EDxSBa3ldgK1kPVdzZ1GYow.jpg', 'Active', '2024-10-16 14:15:09', '2024-10-16 14:15:09'),
(10, 'Maroof', 'Malik', 'Maroof', 'maroof@gmail.com', '$2y$12$tJNIrlD4wLn931adaYQmae.IPFW003lRSso5Mpe4xnXJGnh6gjudq', '2024-09-30', 23, 'Male', 'Bharia town karachi', 'Pakistan', 'Karachi', 'Sindh', '8000', '03325356834', 'images/XooyOcWcjTgoNhQkQiz4KteubwgBJ8b9bmPh5xNg.jpg', 'Active', '2024-10-23 11:57:38', '2024-10-23 11:57:38');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(2, 'doctor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FqfUzDo6uaye2tFSzQE3VHJIdeiMwgVxkLLbj0kk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieTFsREliYUhkNmZlQWh1Z1FXVkVHWVpmMDF2bnFBVHBMTTd3Nk1GcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91YXBwb2ludG1lbnQiO31zOjE5OiJsYXN0X2FwcG9pbnRtZW50X2lkIjtzOjg6IkFQVC0wMDA5IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiR6eEhPS0x2RzhiSi5oLkkwYjd2eHhlMjhSQ1o1emNWMzNSM1oxZ2szY0RXMGFka0p4cGdzMiI7fQ==', 1729665324),
('swB4oy6yrnMKnCtFlFwiqsoGUwCp8xUpw8wBKbzO', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNnhoR1ZtVE5LdW8zUFpKYmMxdUpPcVREbnU2SFpqYXRBbUQxenJKUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbmRleDIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1729666915);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype` varchar(50) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `usertype`) VALUES
(1, 'user', 'user@gmail.com', NULL, '$2y$12$4jycWrhsFmk/DMeEsLKDTeeDB6m6yU4.WMTi4VzPpZ/62urmcmfGC', NULL, NULL, NULL, 'NJMC8Cjn0Z9hmPACBkdMyqRNOCCObAvzYipM0dGtzdi9sqVJ9fVJW8Ab6U7Q', NULL, NULL, '2024-10-21 13:41:33', '2024-10-21 13:41:33', 'user'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$12$x6zLrv7jAkfb5GlA27NmZuqdd2JlZs4S9.I8L0UJB2Qzrk4fOCYze', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21 13:42:24', '2024-10-21 13:42:24', 'admin'),
(3, 'Mohib', 'multiworld245@gmail.com', NULL, '$2y$12$zxHOKLvG8bJ.h.I0b7vxxe28RCZ5zcV33R3Z1gk3cDW0adkJxpgs2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-22 13:21:53', '2024-10-22 13:21:53', 'user'),
(4, 'Ibrahim', 'ibrahim@gmail.com', NULL, '$2y$12$8EW1tNT9wrrTck/751j9ru0.eRVPpMCGoysTRP7MfI3vhyWWe0NDC', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-22 13:53:35', '2024-10-22 13:53:35', 'user'),
(5, 'Ali', 'ali@gmail.com', NULL, '$2y$12$9y.swEXXOv.kUm3JzxWAeeX9fSdsNKXkpKHl.O0T.cu4AEZH3aj7S', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-22 13:54:20', '2024-10-22 13:54:20', 'user'),
(6, 'NurrUdeen', 'nurudeen@gmail.com', NULL, '$2y$12$uyctxnlHQw3fOb.4AZvtY.SNAh56cOS2ZXWyDfKIghBxqKw/eE9rO', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-23 11:37:16', '2024-10-23 11:37:16', 'user'),
(7, 'Mohib', 'mohibmalik@gmail.com', NULL, '$2y$12$L32AejeaMs8be2ANT2F75ei1oHfS7Fyja1pPQdt6tpREtjzijM2qa', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-23 13:29:43', '2024-10-23 13:29:43', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_doctor` (`doctor_id`),
  ADD KEY `fk_department` (`department_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `fk_doctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
