-- CodeIgniter 4 CRUD Examination Project
-- Sample database dump for instructor setup
-- Default login: admin@example.com / password123

CREATE DATABASE IF NOT EXISTS `ci4_crud_exam`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE `ci4_crud_exam`;

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
START TRANSACTION;
SET time_zone = '+00:00';

DROP TABLE IF EXISTS `records`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Administrator', 'admin@example.com', '$2y$12$6OuNGPdrjm7H7VBrGDGyGe9U7xTBXdhqUlW65K9ZDICfO5gxVSx1.', '2026-03-06 12:00:00');

CREATE TABLE `records` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `records` (`id`, `title`, `description`, `category`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Admissions Queue Review', 'Review all pending admissions documents for the first semester intake and validate missing attachments before endorsement.', 'Administration', 'Priority review', '2026-03-06 12:10:00', '2026-03-06 12:10:00'),
(2, 'Campus Network Maintenance', 'Track the scheduled maintenance window for the campus network core switches and document the downtime communication plan.', 'IT Support', 'Maintenance window approved', '2026-03-06 12:15:00', '2026-03-06 12:20:00'),
(3, 'Quarterly Budget Proposal', 'Prepare the quarterly budget proposal summary with supporting notes for department heads and management review.', 'Finance', 'Awaiting signatures', '2026-03-06 12:25:00', '2026-03-06 12:30:00');

ALTER TABLE `users` AUTO_INCREMENT = 2;
ALTER TABLE `records` AUTO_INCREMENT = 4;

COMMIT;
