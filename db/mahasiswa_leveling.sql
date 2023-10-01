-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Oct 01, 2023 at 10:15 AM
-- Server version: 8.1.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa_leveling`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `threshold` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`id`, `name`, `description`, `threshold`) VALUES
(1, 'Test1', 'Test001', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `quest`
--

CREATE TABLE `quest` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `threshold` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quest`
--

INSERT INTO `quest` (`id`, `name`, `description`, `threshold`) VALUES
(1, 'first quest', 'this is my first quest', 'if you find this then the threshold complete');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `total_achievement` int NOT NULL DEFAULT '0',
  `total_quest` int NOT NULL DEFAULT '0',
  `level` int NOT NULL DEFAULT '1',
  `current_experience` int NOT NULL DEFAULT '0',
  `target_experience` int NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `isAdmin`, `total_achievement`, `total_quest`, `level`, `current_experience`, `target_experience`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', 'admin', 1, 1, 0, 1, 0, 100),
(2, 'user', NULL, 'user@gmail.com', 'user', 0, 0, 1, 1, 0, 100),
(4, '222', NULL, '222', '222', 0, 0, 0, 1, 0, 100),
(5, '2', NULL, '2', '2', 0, 0, 0, 2, 30, 140),
(6, '123host', NULL, '13521015@std.stei.itb.ac.id', '1+8UUdV1ZFsTMzmd3BP1Rw==', 0, 0, 0, 1, 0, 100);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `update_level_and_experience_before_insert` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    DECLARE remaining_experience INT;
    SET remaining_experience = NEW.current_experience - NEW.target_experience;
    IF remaining_experience >= 0 THEN
        SET NEW.level = NEW.level + 1;
        SET NEW.target_experience = NEW.target_experience + (NEW.level * 20); 
        SET NEW.current_experience = remaining_experience;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_level_and_experience_before_update` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    DECLARE remaining_experience INT;
    SET remaining_experience = NEW.current_experience - NEW.target_experience;
    IF remaining_experience >= 0 THEN
        SET NEW.level = NEW.level + 1;
        SET NEW.target_experience = NEW.target_experience + (NEW.level * 20); 
        SET NEW.current_experience = remaining_experience;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_achievement`
--

CREATE TABLE `user_achievement` (
  `user_id` int NOT NULL,
  `achievement_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_achievement`
--

INSERT INTO `user_achievement` (`user_id`, `achievement_id`) VALUES
(1, 1);

--
-- Triggers `user_achievement`
--
DELIMITER $$
CREATE TRIGGER `update_jumlah_achievement` AFTER INSERT ON `user_achievement` FOR EACH ROW begin set @user_id := NEW.user_id;
set @jumlah_achievement := (SELECT count(*) from user_achievement where user_id = @user_id);
update users set total_achievement = @jumlah_achievement where id = @user_id;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_quest`
--

CREATE TABLE `user_quest` (
  `user_id` int NOT NULL,
  `quest_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_quest`
--

INSERT INTO `user_quest` (`user_id`, `quest_id`) VALUES
(2, 1);

--
-- Triggers `user_quest`
--
DELIMITER $$
CREATE TRIGGER `update_jumlah_quest` AFTER INSERT ON `user_quest` FOR EACH ROW begin set @user_id := NEW.user_id;
set @jumlah_quest := (SELECT count(*) from user_quest where user_id = @user_id);
update users set total_quest = @jumlah_quest where id = @user_id;
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `achievement_name_index` (`name`);

--
-- Indexes for table `quest`
--
ALTER TABLE `quest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quest_name_index` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_achievement`
--
ALTER TABLE `user_achievement`
  ADD PRIMARY KEY (`user_id`,`achievement_id`),
  ADD KEY `foreign_achievement_id_achievement` (`achievement_id`);

--
-- Indexes for table `user_quest`
--
ALTER TABLE `user_quest`
  ADD PRIMARY KEY (`user_id`,`quest_id`),
  ADD KEY `foreign_quest_id_quest` (`quest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quest`
--
ALTER TABLE `quest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_achievement`
--
ALTER TABLE `user_achievement`
  ADD CONSTRAINT `foreign_achievement_id_achievement` FOREIGN KEY (`achievement_id`) REFERENCES `achievement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_user_id_achievement` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_quest`
--
ALTER TABLE `user_quest`
  ADD CONSTRAINT `foreign_quest_id_quest` FOREIGN KEY (`quest_id`) REFERENCES `quest` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `foreign_user_id_quest` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
