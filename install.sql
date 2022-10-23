CREATE DATABASE spring_code_challenge CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE TABLE companies
(
    `id`   INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(128) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE employees
(
    `id`         INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `company_id` INT          NOT NULL,
    `name`       VARCHAR(128) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`company_id`) references `companies` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
);