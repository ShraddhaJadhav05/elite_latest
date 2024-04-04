-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2024 at 01:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capital_mortgage`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_pages`
--

CREATE TABLE `agent_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time_slot` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `time_slot`, `name`, `email`, `phone`, `company`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2024-03-05', '09:00AM - 10:00AM', 'fsdf', 'fs@gmail.com', '534534', 'gdf', 'sgsg', '2024-03-05 07:50:01', '2024-03-05 07:50:01', NULL),
(2, '2024-03-05', '10:00AM - 11:00AM', 'dfg', 'fdgd@gmail.com', '5345', 'gf', 'ter', '2024-03-05 07:50:26', '2024-03-05 07:50:32', '2024-03-05 07:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `emirate` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `logo`, `description`, `created_at`, `updated_at`, `deleted_at`, `branch_name`, `address`, `city`, `emirate`, `country`, `contact`) VALUES
(1, 'karan', '1709644316_4a7e46f1c1d4333fd01980710b6922c8.jpg', 'sdsadsad', '2024-03-01 03:24:07', '2024-03-05 07:42:18', NULL, 'wqeq', 'asdsad', 'Ajman', 'Abu_Dhabi', 'United Arab Emirates', '21212');

-- --------------------------------------------------------

--
-- Table structure for table `bank_applications`
--

CREATE TABLE `bank_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `application_date` varchar(255) DEFAULT NULL,
  `application_status` varchar(255) DEFAULT NULL,
  `bank_feedback` varchar(255) DEFAULT NULL,
  `loan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_products_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_documents_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `loan_number` varchar(255) DEFAULT NULL,
  `applicant_name` varchar(255) DEFAULT NULL,
  `applicant_mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `residence_country` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `property` varchar(255) DEFAULT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `document_id` varchar(255) DEFAULT NULL,
  `bank_applied` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `bank_product` varchar(255) DEFAULT NULL,
  `tenure` varchar(255) DEFAULT NULL,
  `interest_rate` varchar(255) DEFAULT NULL,
  `upfront_down_payment` varchar(255) DEFAULT NULL,
  `monthly_instalment` varchar(255) DEFAULT NULL,
  `application_status1` enum('Pending','In_Progress','On_Hold','Rejected','Approved') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_applications`
--

INSERT INTO `bank_applications` (`id`, `application_number`, `application_date`, `application_status`, `bank_feedback`, `loan_id`, `client_id`, `staff_id`, `bank_id`, `bank_products_id`, `client_documents_id`, `created_at`, `updated_at`, `loan_number`, `applicant_name`, `applicant_mobile`, `email`, `address`, `city`, `residence_country`, `nationality`, `property`, `staff_name`, `document_id`, `bank_applied`, `bank_branch`, `bank_product`, `tenure`, `interest_rate`, `upfront_down_payment`, `monthly_instalment`, `application_status1`) VALUES
(1, 'EL00001', NULL, 'Pending', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2024-03-22 06:09:20', '2024-03-22 06:09:21', 'LN-12323413', '3', '4645654', 'makedreams0048@gmail.com', 'tert', 'Mumbai', 'United Arab Emirates', 'USA', 'resident_mortgages', '1', NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_products`
--

CREATE TABLE `bank_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `plan` varchar(255) NOT NULL,
  `interest_rate` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `available_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_products`
--

INSERT INTO `bank_products` (`id`, `name`, `bank_id`, `plan`, `interest_rate`, `created_at`, `updated_at`, `available_date`) VALUES
(1, 'ghjgjh', 1, '687', 'jghjj', '2024-03-01 03:52:02', '2024-03-01 03:52:02', '2024-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_text` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_pages`
--

CREATE TABLE `blog_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brokers`
--

CREATE TABLE `brokers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brokers`
--

INSERT INTO `brokers` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `status`, `deleted_at`, `created_at`, `updated_at`, `company`, `nationality`) VALUES
(1, 'Admin1', 'admin1', '8806721951', 'karn@gmail.com', '$2y$12$ptVfdAGjGVszMe2eoPSz9egcQxI8SYbrnVbgVE26tlZ8RiZfk.Wr.', 'active', NULL, '2024-03-01 03:22:13', '2024-03-01 03:22:13', 'sdasd', NULL),
(3, 'ccv', 'vbc', '5645645', 'gdf@gmail.com', '$2y$12$ZmCKTUCRkHbWY3WNRk9n6uVZsPBdk/4JnubtiKnjrErxLPx8RT3i.', 'active', NULL, '2024-03-05 07:11:24', '2024-03-05 07:11:24', 'fsd', 'Noida'),
(5, 'g', 'fgh', '64645', 'gsdgsdg@gmail.com', '$2y$12$GSHTsBj9s0GNv2qfMo.wlOb5M/lCSySDsLDLqlNjLVWyMNFVDETbi', 'active', '2024-03-05 07:19:53', '2024-03-05 07:12:30', '2024-03-05 07:19:53', 'gdfg', 'USA'),
(6, 'dfgd', 'gdf@gmail.com', '34534', 'ffsdfsd@gmail.com', '$2y$12$nnI0rCxPsFjBbadT5eo25ObCc6n2Sq27FHkT01XX8okkfZFxONKi2', 'active', NULL, '2024-03-05 07:19:01', '2024-03-05 07:19:01', 'fsdf', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `broker_notifications`
--

CREATE TABLE `broker_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `broker_id` bigint(20) UNSIGNED NOT NULL,
  `broker_notification` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `broker_notifications`
--

INSERT INTO `broker_notifications` (`id`, `broker_id`, `broker_notification`, `created_at`, `updated_at`) VALUES
(1, 1, 'dfgd', '2024-03-05 07:10:51', '2024-03-05 07:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `call_backs`
--

CREATE TABLE `call_backs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_types`
--

CREATE TABLE `category_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address_line1` text DEFAULT NULL,
  `address_line2` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `security_number` varchar(255) DEFAULT NULL,
  `employment` varchar(255) DEFAULT NULL,
  `loan_amount_offered` varchar(255) DEFAULT NULL,
  `annual_gross_income` varchar(255) DEFAULT NULL,
  `reason_for_loan` varchar(255) DEFAULT NULL,
  `rent_homeowner` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `residence_country` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `monthly_salary` varchar(255) DEFAULT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `office_phone_number` varchar(255) DEFAULT NULL,
  `loan_looking_for` varchar(255) DEFAULT NULL,
  `loan_amount_required` varchar(255) DEFAULT NULL,
  `property_price` varchar(255) DEFAULT NULL,
  `down_payment` varchar(255) DEFAULT NULL,
  `years` varchar(255) DEFAULT NULL,
  `interest_rate` varchar(255) DEFAULT NULL,
  `emirates` varchar(255) DEFAULT NULL,
  `lead_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `enable_email_notification` tinyint(1) NOT NULL DEFAULT 0,
  `url` varchar(255) DEFAULT NULL,
  `enable_sms_notification` tinyint(1) NOT NULL DEFAULT 0,
  `when_to_mail_notification` tinyint(1) NOT NULL DEFAULT 0,
  `when_to_mail_direct_message` tinyint(1) NOT NULL DEFAULT 0,
  `when_to_mail_connection` tinyint(1) NOT NULL DEFAULT 0,
  `when_to_escalate_order` tinyint(1) NOT NULL DEFAULT 0,
  `when_to_escalate_membership_approval` tinyint(1) NOT NULL DEFAULT 0,
  `when_to_escalate_member_registration` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`deleted_at`, `id`, `lead_id`, `first_name`, `last_name`, `email`, `birth_date`, `gender`, `phone_number`, `address_line1`, `address_line2`, `city`, `region`, `zip_code`, `country`, `reference_id`, `security_number`, `employment`, `loan_amount_offered`, `annual_gross_income`, `reason_for_loan`, `rent_homeowner`, `password`, `nationality`, `residence_country`, `company`, `monthly_salary`, `office_address`, `office_phone_number`, `loan_looking_for`, `loan_amount_required`, `property_price`, `down_payment`, `years`, `interest_rate`, `emirates`, `lead_type`, `created_at`, `updated_at`, `profile_image`, `marital_status`, `user_name`, `age`, `enable_email_notification`, `url`, `enable_sms_notification`, `when_to_mail_notification`, `when_to_mail_direct_message`, `when_to_mail_connection`, `when_to_escalate_order`, `when_to_escalate_membership_approval`, `when_to_escalate_member_registration`) VALUES
(NULL, 1, NULL, 'dsf', NULL, 'gdf@gmail.com', NULL, NULL, '6456', 'fds', NULL, NULL, NULL, NULL, NULL, '4234', '423', NULL, '324', '342', 'non_resident_mortgages', NULL, '$2y$12$FG0Yg.ctOKLkfrc19RabQeecaHBX7UviltiwcA77WRxnfOY3sQFjK', 'USA', 'United Arab Emirates', 'fsdf', NULL, 're', '42432', NULL, NULL, NULL, NULL, NULL, NULL, 'Dubai', NULL, '2024-03-05 07:39:53', '2024-03-05 07:39:53', NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(NULL, 2, NULL, 'gdf', NULL, 'makedreams.shraddha@gmail.com', NULL, NULL, '6646', 'fsd', NULL, 'Nashik', NULL, NULL, NULL, '5345', '4543', 'salaried', '534', '534', 'non_resident_mortgages', NULL, '$2y$12$YHlhLLqs3tJVLzt6a0ldxeXSjBKeggbheKYnoj5hIxrpOm6CzGX0y', 'USA', 'United Arab Emirates', 'ffsd', NULL, 'gdf', '6464', NULL, NULL, NULL, NULL, NULL, NULL, 'Dubai', NULL, '2024-03-05 07:40:41', '2024-03-05 07:40:41', NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(NULL, 3, NULL, 'nikhil', NULL, 'makedreams0048@gmail.com', NULL, NULL, '4645654', 'tert', NULL, 'Mumbai', NULL, NULL, NULL, '654645', '456', 'self-employed', '5646', '6456', 'resident_mortgages', NULL, '$2y$12$eN24vP5SvkprboGxGJdlEek/pQTp6tf4qBpyWjX.fU9FN.QZMacM6', 'USA', 'United Arab Emirates', 'ert', NULL, 'gdfgdf', '6546456', NULL, NULL, NULL, NULL, NULL, NULL, 'Abu_Dhabi', NULL, '2024-03-11 04:35:00', '2024-03-11 04:35:00', NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_documents`
--

CREATE TABLE `client_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `encrypt_file_path` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `shown_to_agent` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `encrypted_file_path` varchar(255) DEFAULT NULL,
  `document_type` varchar(255) DEFAULT NULL,
  `document_status` enum('pending','rejected','varified') NOT NULL DEFAULT 'pending',
  `status` varchar(255) DEFAULT 'Pending',
  `is_loan_document` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_documents`
--

INSERT INTO `client_documents` (`id`, `client_id`, `document_name`, `filename`, `encrypt_file_path`, `file_path`, `shown_to_agent`, `created_at`, `updated_at`, `encrypted_file_path`, `document_type`, `document_status`, `status`, `is_loan_document`) VALUES
(31, 3, 'PAN Card', '1710504963_pdf.jpeg', NULL, 'cleint_documents/1710504963_pdf.jpeg', 0, '2024-03-15 06:46:03', '2024-03-15 06:46:03', 'eyJpdiI6IlZLek9pQm5ITmRzKy9Pb1VrUkN3UEE9PSIsInZhbHVlIjoiZGk0YjE2OHJOR1BwdGU3VVd6VG54UVNjamdFc09SUzlVcm9yT3dnRGJ4ZW9SWktUSC9EMStGdWh1bnUzTzUrWSIsIm1hYyI6ImQxYjAxZjA5YTQ5YTViMWE2OWQxZmNmNjRhNjhmZTgwODVjZmNhNzgwMDA1YjYxYTZhNTE1ODc2NTU0NTNiNzMiLCJ0YWciOiIifQ=', NULL, 'pending', 'Pending', 0),
(33, 3, 'fsdf', '1710583459_pdf.jpeg', NULL, 'cleint_documents/1710583459_pdf.jpeg', 0, '2024-03-16 04:34:19', '2024-03-22 06:28:30', 'eyJpdiI6ImNVNlVuNW1ONWdGSVl0d0hacjhPRkE9PSIsInZhbHVlIjoidXVDenY4UVBTQThZOFplWmMvVndHS3YzT0xEZ1dZRUcvWWhqT0RoMitsS255cFNycnUzRFhQNmtjVkpVT2tPSSIsIm1hYyI6ImU4OTI0NWZkN2M2MDkyZGUyNGM3ZmQyZWU5YzFkOWM1NjA0ZTk2NDFjZDE0YzY2MGQ0MTE5MzAwNjQ0NzU5YjMiLCJ0YWciOiIifQ=', NULL, 'varified', 'Pending', 0),
(36, 3, 'asd', NULL, NULL, NULL, 0, '2024-03-16 05:12:03', '2024-03-16 05:12:03', NULL, NULL, 'pending', 'Pending', 0),
(38, 2, 'PAN', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'pending', 'Pending', 0),
(39, 2, 'PAN Card', '1711108203_email_profile.png', NULL, 'cleint_documents/1711108203_email_profile.png', 0, '2024-03-22 06:20:03', '2024-03-22 06:24:14', 'eyJpdiI6Ik9ub250aGp3TkRRRlZqdnIvVWRROGc9PSIsInZhbHVlIjoieDljSXlrc1NDQUtRMFdSSDQrUzRTelJzV0Z2RHZPQk00MDVLdlB6R1QvdnE3QTlzVm1GSFEyWCtYVWNLeGE1ZURxdEwrSlZoL1VaTE1ieFcrM2FwNEE9PSIsIm1hYyI6IjQ2Mjg3MDE2MWRiMDA1YjcyZmVlZGY1YzdlYmIwNWE3ZDcxMjlmODMwN2VjZTBlZTRlNWN', NULL, 'varified', 'Pending', 0),
(40, 2, 'card', '1711108509_pdf.jpeg', NULL, 'cleint_documents/1711108509_pdf.jpeg', 0, '2024-03-22 06:25:09', '2024-03-22 06:25:50', 'eyJpdiI6IllBN0VheCtkcGFUTVNqdXdXKzhBaEE9PSIsInZhbHVlIjoiWWI5VG5yaytkTHNYZEJvY1VXbWxveHo3SUZxTlBlQiswMmVONThBQVZ5ckZScGVQeDNwN0VyOWNrMlA0R1NqcSIsIm1hYyI6IjM4YWM2NWViZDM3M2M2NjkxYjNhZDI0ZDM4NzQzMjNkZDM4ZmQ5NjM4NTM2MzA1NWY5NGQ0MmI5ZDk0MzMyYzQiLCJ0YWciOiIifQ=', NULL, 'rejected', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_educational_resources`
--

CREATE TABLE `client_educational_resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resource_type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_notifications`
--

CREATE TABLE `client_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `client_notification` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_notifications`
--

INSERT INTO `client_notifications` (`id`, `client_id`, `client_notification`, `created_at`, `updated_at`) VALUES
(1, 1, 'hello', '2024-03-05 07:40:57', '2024-03-05 07:40:57'),
(2, 2, 'hello', '2024-03-05 07:40:57', '2024-03-05 07:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `client_notifications_data`
--

CREATE TABLE `client_notifications_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_notification` varchar(255) NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_staffs`
--

CREATE TABLE `client_staffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_support_tickets`
--

CREATE TABLE `client_support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_for` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `opening_time` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `opening_days` varchar(255) DEFAULT NULL,
  `location` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `looking_for` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `f_a_q_page_data`
--

CREATE TABLE `f_a_q_page_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `headers`
--

CREATE TABLE `headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_financings`
--

CREATE TABLE `home_financings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address_line1` text DEFAULT NULL,
  `address_line2` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `security_number` varchar(255) DEFAULT NULL,
  `employment` varchar(255) DEFAULT NULL,
  `loan_amount_offered` varchar(255) DEFAULT NULL,
  `annual_gross_income` varchar(255) DEFAULT NULL,
  `reason_for_loan` varchar(255) DEFAULT NULL,
  `rent_homeowner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_flag` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `residence_country` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `monthly_salary` varchar(255) DEFAULT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `office_phone_number` varchar(255) DEFAULT NULL,
  `loan_looking_for` varchar(255) DEFAULT NULL,
  `loan_amount_required` varchar(255) DEFAULT NULL,
  `property_price` varchar(255) DEFAULT NULL,
  `down_payment` varchar(255) DEFAULT NULL,
  `years` varchar(255) DEFAULT NULL,
  `interest_rate` varchar(255) DEFAULT NULL,
  `emirates` varchar(255) DEFAULT NULL,
  `lead_type` varchar(255) DEFAULT NULL,
  `application_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `first_name`, `last_name`, `email`, `birth_date`, `gender`, `phone_number`, `address_line1`, `address_line2`, `city`, `region`, `zip_code`, `country`, `reference_id`, `security_number`, `employment`, `loan_amount_offered`, `annual_gross_income`, `reason_for_loan`, `rent_homeowner`, `created_at`, `updated_at`, `deleted_at`, `category_flag`, `password`, `nationality`, `residence_country`, `company`, `monthly_salary`, `office_address`, `office_phone_number`, `loan_looking_for`, `loan_amount_required`, `property_price`, `down_payment`, `years`, `interest_rate`, `emirates`, `lead_type`, `application_status`) VALUES
(17, 'Shraddha', NULL, 'shr@gmail.com', NULL, NULL, '767857688', 'gdg', NULL, NULL, NULL, NULL, NULL, '436346', '6456456', 'self-employed', '534', '3453', 'resident_mortgages', NULL, '2024-03-11 01:13:52', '2024-03-11 01:13:52', NULL, 0, NULL, 'India', 'United Arab Emirates', 'gfh', NULL, 'tert', '35435', NULL, NULL, NULL, NULL, NULL, NULL, 'Sharjah', 'Primary', 'In Progress'),
(27, 'Payal', NULL, 'payal@gmail.com', NULL, NULL, '6778657878', 'ds', NULL, NULL, NULL, NULL, NULL, '534534', '654645', 'salaried', '565', '545435', 'resident_mortgages', NULL, '2024-03-11 03:05:10', '2024-03-11 03:05:10', NULL, 0, NULL, 'Noida', 'United Arab Emirates', 'asd', NULL, 'gdgd', '675675675', NULL, NULL, NULL, NULL, NULL, NULL, 'Dubai', 'Primary', 'Completed'),
(28, 'Atul', NULL, 'atul@gmail.com', NULL, NULL, '7876787656', 'dsadas', NULL, NULL, NULL, NULL, NULL, '6546456', '36564', 'self-employed', '546456', '645645', 'non_resident_mortgages', NULL, '2024-03-19 03:48:02', '2024-03-19 03:48:02', NULL, 0, NULL, 'Noida', 'United Arab Emirates', 'gdfgd', NULL, 'yrt', '75675756', NULL, NULL, NULL, NULL, NULL, NULL, 'Ajman', 'Primary', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lead_staffs`
--

CREATE TABLE `lead_staffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `application_priority` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_staffs`
--

INSERT INTO `lead_staffs` (`id`, `lead_id`, `staff_id`, `application_priority`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 17, 5, 'High Priority', '2024-03-11 01:14:02', '2024-03-11 01:14:02', NULL),
(14, 27, 5, 'High Priority', '2024-03-11 03:21:32', '2024-03-11 03:21:32', NULL),
(15, 28, 5, 'High Priority', '2024-03-19 03:48:30', '2024-03-19 03:48:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_number` varchar(255) NOT NULL,
  `loan_praposals_id` varchar(255) NOT NULL,
  `loan_plan_name` varchar(255) NOT NULL,
  `bank_applied` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `bank_product` varchar(255) NOT NULL,
  `tenure` varchar(255) NOT NULL,
  `interest_rate` varchar(255) NOT NULL,
  `upfront_down_payment` varchar(255) NOT NULL,
  `monthly_instalment` varchar(255) NOT NULL,
  `application_date` varchar(255) NOT NULL,
  `application_status` varchar(255) NOT NULL,
  `bank_feedback` varchar(255) NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `bank_products_id` bigint(20) UNSIGNED NOT NULL,
  `client_documents_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_applications_id` bigint(20) UNSIGNED NOT NULL
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
(5, '2024_01_31_103654_create_leads_table', 1),
(6, '2024_02_02_053611_create_permission_tables', 1),
(7, '2024_02_04_132127_create_about_us_table', 1),
(8, '2024_02_04_132545_create_privacy_policies_table', 1),
(9, '2024_02_04_133718_create_terms_and_conditions_table', 1),
(10, '2024_02_04_140135_create_home_financings_table', 1),
(11, '2024_02_04_140732_create_contact_us_table', 1),
(12, '2024_02_04_141044_create_why_us_table', 1),
(13, '2024_02_04_142049_create_homes_table', 1),
(14, '2024_02_05_164337_create_blogs_table', 1),
(15, '2024_02_06_111526_create_staff_table', 1),
(16, '2024_02_06_152844_create_category_types_table', 1),
(17, '2024_02_06_155315_create_categories_table', 1),
(18, '2024_02_06_173618_create_f_a_q_s_table', 1),
(19, '2024_02_07_121708_add_deleted_at_to_leads_table', 1),
(20, '2024_02_07_122411_add_deleted_at_to_permissions_table', 1),
(21, '2024_02_07_122636_add_deleted_at_to_staff_table', 1),
(22, '2024_02_08_060754_create_lead_staffs_table', 1),
(23, '2024_02_08_110340_add_category_flag_to_leads_table', 1),
(24, '2024_02_09_053435_add_deleted_at_to_lead_staffs_table', 1),
(25, '2024_02_09_090929_add_password_to_leads_table', 1),
(26, '2024_02_13_190940_create_supportive_partners_table', 1),
(27, '2024_02_13_193631_create_missions_table', 1),
(28, '2024_02_13_194849_create_visions_table', 1),
(29, '2024_02_13_195856_create_features_table', 1),
(30, '2024_02_14_182017_create_appointments_table', 1),
(31, '2024_02_14_194247_add_new_fields_to_leads_table', 1),
(32, '2024_02_15_183114_create_enquiries_table', 1),
(33, '2024_02_16_044315_add_deleted_at_to_appointments_table', 1),
(34, '2024_02_16_091836_create_partners_table', 1),
(35, '2024_02_19_110805_create_banks_table', 1),
(36, '2024_02_19_121939_add_deleted_at_to_banks_table', 1),
(37, '2024_02_19_122527_create_bank_products_table', 1),
(38, '2024_02_19_123148_add_available_date_to_bank_products_table', 1),
(39, '2024_02_19_123749_modify_bank_products_table', 1),
(40, '2024_02_20_114424_modify_users_table', 1),
(41, '2024_02_21_094910_add_emirates_to_leads_table', 1),
(42, '2024_02_21_105810_add_feilds_to_banks_table', 1),
(43, '2024_02_21_155640_create_f_a_q_page_data_table', 1),
(44, '2024_02_21_160329_create_call_backs_table', 1),
(45, '2024_02_22_134729_add_lead_type_to_leads_table', 1),
(46, '2024_02_22_163341_create_service_categories_table', 1),
(47, '2024_02_22_184614_create_services_table', 1),
(48, '2024_02_23_052315_create_clients_table', 1),
(49, '2024_02_23_084146_modify_clients_table', 1),
(50, '2024_02_23_093536_create_brokers_table', 1),
(51, '2024_02_26_094853_add_company_to_brokers_table', 1),
(52, '2024_02_28_092312_create_slots_table', 1),
(53, '2024_03_01_070309_add_logo_to_users_table', 2),
(54, '2024_03_02_103404_add_deleted_at_to_users_table', 3),
(55, '2024_02_24_110205_create_blog_pages_table', 4),
(56, '2024_02_24_111522_create_partners_pages_table', 4),
(57, '2024_02_24_112354_create_agent_pages_table', 4),
(58, '2024_02_25_111642_create_s_e_o_and_s_m_o_s_table', 4),
(59, '2024_02_25_120551_create_headers_table', 4),
(60, '2024_02_25_120602_create_footers_table', 4),
(61, '2024_02_25_133107_add_new_fields_to_contact_us_table', 4),
(62, '2024_02_25_140128_add_new_fields_to_contact_us_table', 4),
(63, '2024_03_01_050446_create_broker_notifications_table', 4),
(64, '2024_03_01_132218_create_client_notifications_table', 5),
(65, '2024_03_02_112219_add_role_type_to_roles_table', 5),
(66, '2024_03_05_123114_add_nationality_to_brokers_table', 6),
(67, '2024_03_05_123340_add_nationality_to_staff_table', 7),
(68, '2024_03_08_121907_add_application_priority_to_lead_staffs', 8),
(69, '2024_03_08_124744_modify_lead_staffs', 9),
(70, '2024_03_08_124908_modify_lead_staffs', 10),
(71, '2024_03_08_132649_add_image_field_to_clients_table', 11),
(72, '2024_03_08_140037_add_new_field_to_clients_table', 11),
(73, '2024_03_09_135238_add_new_field_to_clients_table', 11),
(74, '2024_03_10_104623_create_client_documents_table', 11),
(75, '2024_03_10_111426_add_new_field_to_client_documents_table', 11),
(76, '2024_03_11_055623_add_application_status_to_leads_table', 12),
(77, '2024_03_11_055954_drop_application_status_to_leads_table', 13),
(78, '2024_03_11_060206_add_application_status_to_leads_table', 14),
(79, '2024_03_11_092545_modify_client_documents', 15),
(80, '2024_03_11_103955_modify_client_documents', 16),
(81, '2024_03_18_061115_create_outbox_messages_table', 17),
(82, '2024_03_18_062520_add_attached_file_to_outbox_messages_table', 18),
(83, '2024_03_18_091018_modify_foreign_key_in_outbox_messages_table', 19),
(84, '2024_03_18_111450_modify_client_id_outbox_messages_table', 20),
(85, '2024_03_18_112500_add_client_id_to_outbox_messages_table', 21),
(86, '2024_03_18_122200_create_outbox_message_cliens_table', 22),
(87, '2024_03_21_053000_add_reply_flag_to_outbox_messages_table', 23),
(88, '2024_03_21_071057_add_reply_message_to_outbox_messages_table', 24),
(89, '2024_03_21_075843_add_archive_status_to_outbox_messages_table', 25),
(90, '2024_03_21_075855_add_starred_status_to_outbox_messages_table', 25),
(91, '2024_03_21_080320_add_archive_status_to_outbox_messages_table', 26),
(92, '2024_03_21_091224_create_notification_messages_table', 27),
(93, '2024_03_21_091442_create_notification_message_clients_table', 27),
(94, '2024_03_21_095240_modiy_notification_messages_table', 28),
(95, '2024_03_21_095526_add_staff_id_notification_messages_table', 29),
(96, '2024_03_21_124141_add_reply_flag_to_notification_messages_table', 30),
(97, '2024_03_19_105433_create_client_staffs_table', 31),
(98, '2024_03_20_111645_create_loans_table', 31),
(99, '2024_03_20_114506_create_bank_applications_table', 31),
(100, '2024_03_20_115221_add_foreign_key_to_loans_table', 31),
(101, '2024_03_21_050702_add_additional_fields_to_bank_applications_table', 31),
(102, '2024_03_22_100647_add_document_type_to_client_documents_table', 32),
(103, '2024_03_22_113225_modify_bank_applications', 33),
(104, '2024_03_22_114341_add_document_status_to_client_documents_table', 34),
(105, '2024_03_18_162725_create_client_notifications_table', 35),
(106, '2024_03_18_170319_add_new_fields_to_client_documents_table', 35),
(107, '2024_03_19_174301_create_mortgage_applications_table', 35),
(108, '2024_03_20_180240_create_client_support_tickets_table', 35),
(109, '2024_03_20_180858_add_new_field_to_client_support_tickets_table', 35),
(110, '2024_03_21_143220_create_client_educational_resources_table', 35),
(111, '2024_03_21_144415_add_new_field_to_client_educational_resources_table', 35),
(112, '2024_03_21_161145_add_new_field_to_client_notifications_data_table', 35),
(113, '2024_03_21_163610_add_new_field_to_mortgage_applications_table', 35);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `feature1` varchar(255) DEFAULT NULL,
  `feature2` varchar(255) DEFAULT NULL,
  `feature3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mortgage_applications`
--

CREATE TABLE `mortgage_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `applicant_name` varchar(255) DEFAULT NULL,
  `property_price` varchar(255) DEFAULT NULL,
  `down_payment` varchar(255) DEFAULT NULL,
  `years` varchar(255) DEFAULT NULL,
  `interest_rate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `application_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_messages`
--

CREATE TABLE `notification_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text DEFAULT NULL,
  `attached_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reply_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_messages`
--

INSERT INTO `notification_messages` (`id`, `client_id`, `message`, `attached_file`, `created_at`, `updated_at`, `staff_id`, `reply_flag`) VALUES
(6, NULL, 'hello All please come all here', '1711022930_index.html', '2024-03-21 06:38:50', '2024-03-21 06:38:50', 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification_message_clients`
--

CREATE TABLE `notification_message_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_message_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_message_clients`
--

INSERT INTO `notification_message_clients` (`id`, `notification_message_id`, `client_id`, `created_at`, `updated_at`) VALUES
(2, 6, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `outbox_messages`
--

CREATE TABLE `outbox_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attached_file` varchar(255) DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reply_flag` tinyint(1) NOT NULL DEFAULT 0,
  `replyMessage` text DEFAULT NULL,
  `starred_status` tinyint(1) NOT NULL DEFAULT 0,
  `archive_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outbox_messages`
--

INSERT INTO `outbox_messages` (`id`, `staff_id`, `subject`, `message`, `created_at`, `updated_at`, `attached_file`, `client_id`, `reply_flag`, `replyMessage`, `starred_status`, `archive_status`) VALUES
(63, 34, 'hello', 'dsfsdfsd', '2024-03-21 01:57:35', '2024-03-21 01:57:35', NULL, NULL, 1, NULL, 0, 0),
(64, 34, 'hello', 'shraddha', '2024-03-21 01:58:17', '2024-03-21 01:58:17', NULL, NULL, 0, NULL, 0, 0),
(65, 34, 'nikhil', 'sdfsdfsd', '2024-03-21 02:04:57', '2024-03-21 02:04:57', NULL, NULL, 1, NULL, 0, 0),
(66, 34, 'nikhil', 'kaushik', '2024-03-21 02:06:29', '2024-03-21 02:06:29', NULL, NULL, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `outbox_message_cliens`
--

CREATE TABLE `outbox_message_cliens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `outbox_message_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outbox_message_cliens`
--

INSERT INTO `outbox_message_cliens` (`id`, `outbox_message_id`, `client_id`, `created_at`, `updated_at`) VALUES
(53, 63, 1, NULL, NULL),
(54, 64, 1, NULL, NULL),
(55, 65, 3, NULL, NULL),
(56, 66, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners_pages`
--

CREATE TABLE `partners_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `path`
--

CREATE TABLE `path` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `shown_to_agent` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'loans.menu', 'web', 'loans', '2024-03-02 21:21:25', '2024-03-02 21:24:01', NULL),
(6, 'loans.view', 'web', 'loans', '2024-03-02 21:24:20', '2024-03-02 21:26:35', NULL),
(11, 'leads.menu', 'web', 'leads', '2024-03-02 22:51:30', '2024-03-02 22:51:30', NULL),
(12, 'leads.view', 'web', 'leads', '2024-03-02 22:51:53', '2024-03-02 22:52:03', NULL),
(13, 'leads.add', 'web', 'leads', '2024-03-02 22:52:33', '2024-03-02 22:52:33', NULL),
(14, 'leads.edit', 'web', 'leads', '2024-03-02 22:52:55', '2024-03-02 22:52:55', NULL),
(15, 'leads.update', 'web', 'leads', '2024-03-02 22:53:21', '2024-03-02 22:53:21', NULL),
(16, 'leads.delete', 'web', 'leads', '2024-03-02 22:54:29', '2024-03-02 22:54:29', NULL);

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
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
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
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `role_type`) VALUES
(1, 'Admin', 'web', '2024-03-02 06:11:30', '2024-03-02 07:40:46', NULL),
(4, 'Staff', 'web', '2024-03-02 07:41:10', '2024-03-05 04:47:44', NULL),
(5, 'User', 'web', '2024-03-02 07:41:24', '2024-03-02 07:41:24', NULL),
(15, 'Managing Director', '', NULL, NULL, 'sales'),
(16, 'Sales Manager', '', NULL, NULL, 'sales'),
(17, 'Mortgage Consultant', '', NULL, NULL, 'sales'),
(18, 'Sales Executive', '', NULL, NULL, 'sales'),
(19, 'Content Editor', '', NULL, NULL, 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(5, 1),
(5, 4),
(6, 1),
(6, 4),
(6, 5),
(11, 1),
(11, 4),
(11, 5),
(12, 1),
(12, 4),
(12, 5),
(13, 1),
(13, 4),
(13, 5),
(14, 1),
(14, 4),
(14, 5),
(15, 1),
(15, 4),
(15, 5),
(16, 1),
(16, 4),
(16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) NOT NULL,
  `time_slot` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `date`, `time_slot`, `status`, `created_at`, `updated_at`) VALUES
(1, '2024-03-05', '09:00AM - 10:00AM', '1', NULL, NULL),
(2, '2024-03-05', '10:00AM - 11:00AM', '1', NULL, NULL),
(3, '2024-03-05', '11:00AM - 12:00AM', '0', NULL, NULL),
(4, '2024-03-05', '12:00PM - 01:00PM', '0', NULL, NULL),
(5, '2024-03-05', '01:00PM - 02:00PM', '0', NULL, NULL),
(6, '2024-03-05', '02:00PM - 03:00PM', '0', NULL, NULL),
(7, '2024-03-05', '03:00PM - 04:00PM', '0', NULL, NULL),
(8, '2024-03-05', '04:00PM - 05:00PM', '0', NULL, NULL),
(9, '2024-03-05', '05:00PM - 06:00PM', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address_line1` text DEFAULT NULL,
  `address_line2` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `last_name`, `email`, `birth_date`, `gender`, `phone_number`, `address_line1`, `address_line2`, `city`, `region`, `zip_code`, `country`, `department`, `role_id`, `password`, `created_at`, `updated_at`, `deleted_at`, `nationality`) VALUES
(1, 'ASDASD', NULL, 'karnwe333343w@gmail.com', '2024-03-06', 'Abu_Dhabi', NULL, 'asdsad', NULL, 'Ajman', 'sadasd', 'asdasd', 'United Arab Emirates', NULL, 15, NULL, '2024-03-01 05:21:23', '2024-03-05 07:37:24', NULL, 'Canada'),
(2, 'ASDSAD', NULL, 'karnwe343333w@gmail.com', '2024-02-28', NULL, NULL, 'asdsad', NULL, 'Ajman', 'sadas333d', 'asdasd', 'United Arab Emirates', NULL, 0, '$2y$12$sC61hfNTodrkvW0JAuzKYevbStm9XKtUU.BB6gQKXviy9kzUKP0z.', '2024-03-01 05:22:26', '2024-03-05 07:37:36', '2024-03-05 07:37:36', NULL),
(3, 'xzc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'United Arab Emirates', NULL, 0, '$2y$12$4EOr6xSM0IeNDJ768NzGKeYlR9VnbU3vlMWxZRYhQHGYpEI/Kbgba', '2024-03-02 04:41:52', '2024-03-02 04:41:52', NULL, NULL),
(4, 'xzc', NULL, 'karn@gmail.com', NULL, NULL, NULL, 'asdsad', NULL, 'Ajman', 'sadasd', 'asdasd', 'United Arab Emirates', NULL, 0, '$2y$12$MzHqspUxfMquQDKUorJH6ucRCBp89lklzoLR5IWr8la4BNqgvmY0G', '2024-03-02 04:42:01', '2024-03-02 04:42:01', NULL, NULL),
(5, 'Shraddha', NULL, 'makedreams.shraddha@gmail.com', '2024-03-12', 'Sharjah', NULL, 'tert', NULL, 'Umm_AlQuwain', 'fsd', 'dg', NULL, 'dfg', 16, '$2y$12$3GAPiGJqiITzlJbwrGZu9.tN3NMI.UrN/8/myDG5LmzlYvqZ91pHe', '2024-03-08 01:03:26', '2024-03-08 01:03:26', NULL, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `supportive_partners`
--

CREATE TABLE `supportive_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_e_o_and_s_m_o_s`
--

CREATE TABLE `s_e_o_and_s_m_o_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `google_analytics` text DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `tiktok_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','staff','broker','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `marital` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `email_verified_at`, `password`, `role`, `status`, `city`, `gender`, `dob`, `marital`, `age`, `country`, `state`, `address`, `remember_token`, `created_at`, `updated_at`, `logo`, `deleted_at`) VALUES
(1, 'Admin1', 'admin1', NULL, 'admin@gmail.com', NULL, '$2y$12$neqJ0PuZI9tNQCp9Gxy4LuVXo3t6uTra3dr4xkf8OAx5qIxZjyz7W', 'admin', 'active', 'nashik1', 'female', '2024-03-15', NULL, '63 >', 'United Arab Emirates', 'Dubai', 'panchavati11111', NULL, NULL, '2024-03-05 07:51:34', '1709618565_download.jpg', NULL),
(2, 'Elite Staff', 'staff', NULL, 'staff@gmail.com', NULL, '$2y$12$bwMwOAOZxpjC37XzfzVM5uStkKTK/U9Cf/OKDFHtAqVVZr3tjIr9W', 'staff', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Elite Broker', 'broker', NULL, 'broker@gmail.com', NULL, '$2y$12$4cAhA179rJIf1KpnhA.i5.9C9TdkqB0M8g2PUwO2T/9OoUw/9HKL.', 'broker', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Shraddha', NULL, NULL, 'makedreams.shraddha@gmail.com', NULL, '$2y$12$3GAPiGJqiITzlJbwrGZu9.tN3NMI.UrN/8/myDG5LmzlYvqZ91pHe', 'staff', 'inactive', NULL, NULL, NULL, NULL, NULL, 'United Arab Emirates', NULL, NULL, NULL, '2024-03-08 01:03:26', '2024-03-22 00:46:43', '1711088203_girl.jpeg', NULL),
(42, 'Varsha Chaudhary', NULL, NULL, 'varsha@gmail.com', NULL, NULL, 'user', 'inactive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-08 05:49:37', '2024-03-08 05:49:48', NULL, NULL),
(43, 'Shraddha', NULL, NULL, 'jds@gmail.com', NULL, NULL, 'user', 'inactive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 00:38:06', '2024-03-11 00:38:06', NULL, NULL),
(44, 'Shraddha', NULL, NULL, 'shr@gmail.com', NULL, NULL, 'user', 'inactive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 01:13:52', '2024-03-11 01:13:52', NULL, NULL),
(45, 'rrr', NULL, NULL, NULL, NULL, NULL, 'user', 'inactive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 01:15:35', '2024-03-11 01:49:46', NULL, NULL),
(46, 'Payal', NULL, NULL, 'payal@gmail.com', NULL, NULL, 'user', 'inactive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:05:10', '2024-03-11 03:05:10', NULL, NULL),
(47, 'nikhil', NULL, NULL, 'makedreams0048@gmail.com', NULL, '$2y$12$eN24vP5SvkprboGxGJdlEek/pQTp6tf4qBpyWjX.fU9FN.QZMacM6', 'user', 'inactive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 04:35:00', '2024-03-11 04:35:00', NULL, NULL),
(48, 'Atul', NULL, NULL, 'atul@gmail.com', NULL, NULL, 'user', 'inactive', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-19 03:48:02', '2024-03-19 03:48:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visions`
--

CREATE TABLE `visions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `feature1` varchar(255) DEFAULT NULL,
  `feature2` varchar(255) DEFAULT NULL,
  `feature3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `why_us`
--

CREATE TABLE `why_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_key` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_pages`
--
ALTER TABLE `agent_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_applications`
--
ALTER TABLE `bank_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_applications_loan_id_foreign` (`loan_id`),
  ADD KEY `bank_applications_client_id_foreign` (`client_id`),
  ADD KEY `bank_applications_staff_id_foreign` (`staff_id`),
  ADD KEY `bank_applications_bank_id_foreign` (`bank_id`),
  ADD KEY `bank_applications_bank_products_id_foreign` (`bank_products_id`),
  ADD KEY `bank_applications_client_documents_id_foreign` (`client_documents_id`);

--
-- Indexes for table `bank_products`
--
ALTER TABLE `bank_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_products_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_pages`
--
ALTER TABLE `blog_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brokers`
--
ALTER TABLE `brokers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brokers_email_unique` (`email`);

--
-- Indexes for table `broker_notifications`
--
ALTER TABLE `broker_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `broker_notifications_broker_id_foreign` (`broker_id`);

--
-- Indexes for table `call_backs`
--
ALTER TABLE `call_backs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_category_type_id_foreign` (`category_type_id`);

--
-- Indexes for table `category_types`
--
ALTER TABLE `category_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_lead_id_foreign` (`lead_id`);

--
-- Indexes for table `client_documents`
--
ALTER TABLE `client_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_educational_resources`
--
ALTER TABLE `client_educational_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_notifications`
--
ALTER TABLE `client_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_notifications_client_id_foreign` (`client_id`);

--
-- Indexes for table `client_notifications_data`
--
ALTER TABLE `client_notifications_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_notifications_data_client_id_foreign` (`client_id`);

--
-- Indexes for table `client_staffs`
--
ALTER TABLE `client_staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_staffs_client_id_foreign` (`client_id`),
  ADD KEY `client_staffs_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `client_support_tickets`
--
ALTER TABLE `client_support_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_support_tickets_client_id_foreign` (`client_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_a_q_page_data`
--
ALTER TABLE `f_a_q_page_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_a_q_s_category_id_foreign` (`category_id`);

--
-- Indexes for table `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_financings`
--
ALTER TABLE `home_financings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_staffs`
--
ALTER TABLE `lead_staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_staffs_lead_id_foreign` (`lead_id`),
  ADD KEY `lead_staffs_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_client_id_foreign` (`client_id`),
  ADD KEY `loans_staff_id_foreign` (`staff_id`),
  ADD KEY `loans_bank_id_foreign` (`bank_id`),
  ADD KEY `loans_bank_products_id_foreign` (`bank_products_id`),
  ADD KEY `loans_client_documents_id_foreign` (`client_documents_id`),
  ADD KEY `loans_bank_applications_id_foreign` (`bank_applications_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mortgage_applications`
--
ALTER TABLE `mortgage_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mortgage_applications_client_id_foreign` (`client_id`);

--
-- Indexes for table `notification_messages`
--
ALTER TABLE `notification_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_messages_client_id_foreign` (`client_id`),
  ADD KEY `notification_messages_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `notification_message_clients`
--
ALTER TABLE `notification_message_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_message_clients_notification_message_id_foreign` (`notification_message_id`),
  ADD KEY `notification_message_clients_client_id_foreign` (`client_id`);

--
-- Indexes for table `outbox_messages`
--
ALTER TABLE `outbox_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outbox_messages_staff_id_foreign` (`staff_id`),
  ADD KEY `outbox_messages_client_id_foreign` (`client_id`);

--
-- Indexes for table `outbox_message_cliens`
--
ALTER TABLE `outbox_message_cliens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outbox_message_cliens_outbox_message_id_foreign` (`outbox_message_id`),
  ADD KEY `outbox_message_cliens_client_id_foreign` (`client_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners_pages`
--
ALTER TABLE `partners_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `path`
--
ALTER TABLE `path`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_documents_client_id_foreign` (`client_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supportive_partners`
--
ALTER TABLE `supportive_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_e_o_and_s_m_o_s`
--
ALTER TABLE `s_e_o_and_s_m_o_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visions`
--
ALTER TABLE `visions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_us`
--
ALTER TABLE `why_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_pages`
--
ALTER TABLE `agent_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_applications`
--
ALTER TABLE `bank_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_products`
--
ALTER TABLE `bank_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_pages`
--
ALTER TABLE `blog_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brokers`
--
ALTER TABLE `brokers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `broker_notifications`
--
ALTER TABLE `broker_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `call_backs`
--
ALTER TABLE `call_backs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_types`
--
ALTER TABLE `category_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_documents`
--
ALTER TABLE `client_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `client_educational_resources`
--
ALTER TABLE `client_educational_resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_notifications`
--
ALTER TABLE `client_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_notifications_data`
--
ALTER TABLE `client_notifications_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_staffs`
--
ALTER TABLE `client_staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_support_tickets`
--
ALTER TABLE `client_support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_a_q_page_data`
--
ALTER TABLE `f_a_q_page_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `headers`
--
ALTER TABLE `headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_financings`
--
ALTER TABLE `home_financings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `lead_staffs`
--
ALTER TABLE `lead_staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mortgage_applications`
--
ALTER TABLE `mortgage_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_messages`
--
ALTER TABLE `notification_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification_message_clients`
--
ALTER TABLE `notification_message_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `outbox_messages`
--
ALTER TABLE `outbox_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `outbox_message_cliens`
--
ALTER TABLE `outbox_message_cliens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners_pages`
--
ALTER TABLE `partners_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `path`
--
ALTER TABLE `path`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supportive_partners`
--
ALTER TABLE `supportive_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_e_o_and_s_m_o_s`
--
ALTER TABLE `s_e_o_and_s_m_o_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `visions`
--
ALTER TABLE `visions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `why_us`
--
ALTER TABLE `why_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_applications`
--
ALTER TABLE `bank_applications`
  ADD CONSTRAINT `bank_applications_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `bank_applications_bank_products_id_foreign` FOREIGN KEY (`bank_products_id`) REFERENCES `bank_products` (`id`),
  ADD CONSTRAINT `bank_applications_client_documents_id_foreign` FOREIGN KEY (`client_documents_id`) REFERENCES `client_documents` (`id`),
  ADD CONSTRAINT `bank_applications_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `bank_applications_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`),
  ADD CONSTRAINT `bank_applications_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `bank_products`
--
ALTER TABLE `bank_products`
  ADD CONSTRAINT `bank_products_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`);

--
-- Constraints for table `broker_notifications`
--
ALTER TABLE `broker_notifications`
  ADD CONSTRAINT `broker_notifications_broker_id_foreign` FOREIGN KEY (`broker_id`) REFERENCES `brokers` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_category_type_id_foreign` FOREIGN KEY (`category_type_id`) REFERENCES `category_types` (`id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_notifications`
--
ALTER TABLE `client_notifications`
  ADD CONSTRAINT `client_notifications_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `client_notifications_data`
--
ALTER TABLE `client_notifications_data`
  ADD CONSTRAINT `client_notifications_data_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `client_staffs`
--
ALTER TABLE `client_staffs`
  ADD CONSTRAINT `client_staffs_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `client_staffs_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `client_support_tickets`
--
ALTER TABLE `client_support_tickets`
  ADD CONSTRAINT `client_support_tickets_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD CONSTRAINT `f_a_q_s_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `lead_staffs`
--
ALTER TABLE `lead_staffs`
  ADD CONSTRAINT `lead_staffs_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lead_staffs_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_bank_applications_id_foreign` FOREIGN KEY (`bank_applications_id`) REFERENCES `bank_applications` (`id`),
  ADD CONSTRAINT `loans_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`),
  ADD CONSTRAINT `loans_bank_products_id_foreign` FOREIGN KEY (`bank_products_id`) REFERENCES `bank_products` (`id`),
  ADD CONSTRAINT `loans_client_documents_id_foreign` FOREIGN KEY (`client_documents_id`) REFERENCES `client_documents` (`id`),
  ADD CONSTRAINT `loans_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `loans_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mortgage_applications`
--
ALTER TABLE `mortgage_applications`
  ADD CONSTRAINT `mortgage_applications_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `notification_messages`
--
ALTER TABLE `notification_messages`
  ADD CONSTRAINT `notification_messages_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `notification_messages_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notification_message_clients`
--
ALTER TABLE `notification_message_clients`
  ADD CONSTRAINT `notification_message_clients_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `notification_message_clients_notification_message_id_foreign` FOREIGN KEY (`notification_message_id`) REFERENCES `notification_messages` (`id`);

--
-- Constraints for table `outbox_messages`
--
ALTER TABLE `outbox_messages`
  ADD CONSTRAINT `outbox_messages_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `outbox_messages_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `outbox_message_cliens`
--
ALTER TABLE `outbox_message_cliens`
  ADD CONSTRAINT `outbox_message_cliens_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `outbox_message_cliens_outbox_message_id_foreign` FOREIGN KEY (`outbox_message_id`) REFERENCES `outbox_messages` (`id`);

--
-- Constraints for table `path`
--
ALTER TABLE `path`
  ADD CONSTRAINT `client_documents_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
