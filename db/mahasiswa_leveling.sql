-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Oct 08, 2023 at 08:58 AM
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
  `threshold` text NOT NULL,
  `difficulty` enum('Beginner','Intermediate','Advanced') NOT NULL DEFAULT 'Beginner',
  `group_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`id`, `name`, `description`, `threshold`, `difficulty`, `group_id`) VALUES
(3, 'First Step', 'You\'ve taken the first step on your fitness journey by completing your initial workout session.', 'Complete your first workout session.', 'Beginner', 6),
(4, 'Steady Start', 'Keep the momentum going! Workout for 7 consecutive days to establish a steady workout routine.', 'Workout for 7 consecutive days.', 'Beginner', 6),
(5, 'Weekly Warrior', 'Consistency is key. Achieve this by completing a workout every day for a week.', 'Complete a workout every day for a week.', 'Beginner', 1),
(6, 'Fitness Fanatic', 'You\'re on fire! Complete 30 workouts in a single month, demonstrating your dedication to fitness.', 'Complete 30 workouts in a month.', 'Intermediate', 4),
(7, 'Pushing Limits', 'Feel the burn as you perform 50 push-ups in a single workout, pushing your strength to new heights.', 'Perform 50 push-ups in a single session.', 'Intermediate', 2),
(8, 'Squats Galore', 'Your legs are getting stronger. Do 100 squats in one workout and feel the burn.', 'Do 100 squats in one workout.', 'Intermediate', 2),
(9, 'Jumping Jack Pro', 'Jump, jump, jump! Complete 200 jumping jacks in one session to boost your cardio endurance.', 'Complete 200 jumping jacks in one session.', 'Intermediate', 1),
(10, 'Marathon Runner', 'Celebrate your running achievement by covering the distance of a marathon, which is 26.2 miles in total.', 'Run 26.2 miles (a marathon) in total.', 'Intermediate', 1),
(11, 'Couch to 5K', 'Prove your endurance by running a 5K distance without stopping, starting from scratch.', 'Run a 5K distance without stopping.', 'Beginner', 1),
(12, 'Bike Enthusiast', 'You\'ve covered 50 miles on your bike. Keep pedaling toward your fitness goals.', 'Cycle 50 miles in total.', 'Intermediate', 4),
(13, 'Swim Champ', 'Dive in and swim a total of 1 mile, showcasing your aquatic prowess.', 'Swim 1 mile in total.', 'Intermediate', 3),
(14, 'Plank Master', 'Test your core strength by holding a plank position for a challenging 3 minutes.', 'Hold a plank position for 3 minutes.', 'Beginner', 2),
(15, 'Yoga Guru', 'Find your inner zen as you complete 20 yoga sessions, improving flexibility and mindfulness.', 'Complete 20 yoga sessions.', 'Advanced', 3),
(16, 'Flexibility Pro', 'Touch your toes without bending your knees, showcasing your improved flexibility.', 'Touch your toes without bending your knees.', 'Beginner', 3),
(17, 'Cardio King/Queen', 'Maintain your heart rate in the cardio zone for 30 minutes, boosting cardiovascular fitness.', 'Maintain your heart rate in the cardio zone for 30 minutes.', 'Beginner', 1),
(18, 'Weightlifter', 'Lift your own body weight in the deadlift, demonstrating your strength and power.', 'Lift your body weight in the deadlift.', 'Intermediate', 2),
(19, 'Push-up Prodigy', 'Push yourself to complete 100 push-ups in a single day, building upper body strength.', 'Do 100 push-ups in one day.', 'Advanced', 2),
(20, 'Pull-up Pro', 'Conquer gravity by performing 20 pull-ups in one session, showing off your upper body strength.', 'Perform 20 pull-ups in one session.', 'Advanced', 2),
(21, 'Burpee Boss', 'Crush your workout with 50 burpees in one session, testing your stamina and power.', 'Complete 50 burpees in one workout.', 'Intermediate', 2),
(22, 'HIIT Hero', 'Finish a High-Intensity Interval Training (HIIT) workout, mastering both strength and endurance.', 'Finish a High-Intensity Interval Training (HIIT) workout.', 'Intermediate', 4),
(23, 'Gym Rat', 'You\'re a regular! Visit the gym 50 times in total, making fitness a part of your lifestyle.', 'Visit the gym 50 times in total.', 'Advanced', 6),
(24, 'Home Workout Hero', 'Opt for home workouts and complete 100 of them, showcasing your versatility.', 'Complete 100 home workouts.', 'Advanced', 4),
(25, 'Hiking Hiker', 'Hike 50 miles in total.', 'Explore nature and hike a total of 50 miles, enjoying the great outdoors.', 'Advanced', 4),
(26, 'Climbing Champ', 'Scale new heights by climbing a 30-foot wall, testing your courage and strength.', 'Climb a 30-foot wall.', 'Advanced', 3),
(27, 'Water Warrior', 'Paddleboard your way to victory, covering 10 miles in total on the water.', 'Paddleboard for 10 miles in total.', 'Advanced', 4),
(28, 'Long-Distance Runner', 'Show off your endurance by running a half marathon (13.1 miles).', 'Run a half marathon (13.1 miles).', 'Advanced', 1),
(29, 'Iron Man/Woman', 'You\'re unstoppable! Complete a triathlon, including swimming, biking, and running.', 'Complete a triathlon (swim, bike, run).', 'Advanced', 1),
(30, 'Mindful Mover', 'Meditate for 20 minutes after each workout, promoting mental and physical balance.', 'Meditate for 20 minutes after each workout.', 'Beginner', 5),
(31, 'Nutrition Ninja', 'Log your meals for 30 consecutive days.', 'Keep track of your meals for 30 consecutive days, highlighting the importance of balanced nutrition.', 'Beginner', 5),
(32, 'Healthy Hydrator', 'Stay hydrated and drink 8 glasses of water daily for a month, supporting overall well-being.', 'Drink 8 glasses of water daily for a month.', 'Beginner', 5),
(33, 'a', 'a', 'a', 'Beginner', 1),
(35, 'b', 'b', 'b', 'Beginner', 1),
(36, 'z', 'z', 'z', 'Beginner', 1),
(38, 'zz', 'z', 'z', 'Beginner', 1);

-- --------------------------------------------------------

--
-- Table structure for table `achievement_group`
--

CREATE TABLE `achievement_group` (
  `group_id` int NOT NULL,
  `group_name` varchar(255) NOT NULL DEFAULT '-',
  `description` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `achievement_group`
--

INSERT INTO `achievement_group` (`group_id`, `group_name`, `description`) VALUES
(1, 'Cardio Achievements', 'Achievements related to cardio workouts.'),
(2, 'Strength Achievements', 'Achievements related to strength training.'),
(3, 'Flexibility and Balance Achievements', 'Achievements related to flexibility and balance.'),
(4, 'Variety and Endurance Achievements', 'Achievements related to various workouts and endurance.'),
(5, 'Mindfulness and Wellness Achievements', 'Achievements related to mental well-being and nutrition.'),
(6, 'General Fitness Achievements', 'General fitness achievements.');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `name`, `description`, `link`, `user_id`) VALUES
(13, 'test5.mp3', 'description', '123host/test5.mp3', 6),
(14, 'test4.mp3', 'description', '123host/test4.mp3', 6),
(15, 'test2.mp3', 'description', '123host/test2.mp3', 6),
(16, 'test3.mp3', 'description', '456host/test3.mp3', 7);

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
(1, 'first quest', 'this is my first quest', 'if you find this then the threshold complete'),
(2, 'Push Up 1', 'Push Up 10x in one day', 'Push Up 10 times in one day'),
(3, 'Push Up 2', 'Push Up 20 times in one day', 'Push Up 20 times in one day'),
(4, 'Push Up 3', 'Push Up 30 times in one day', 'Push Up 30 times in one day'),
(5, 'Sit Up 1', 'Sit Up 10 times in one day', 'Sit Up 10 times in one day'),
(6, 'Sit Up 2', 'Sit Up 20 times in one day', 'Sit Up 20 times in one day'),
(7, 'Pull Up 1', 'Pull Up 3 times in one day', 'Pull Up 3 times in one day'),
(8, 'Pull Up 2', 'Pull Up 3 times in a row', 'Pull Up 3 times in a row'),
(9, 'Runner 1', 'Run 1.000 meters in one day', 'Run 1.000 meters in one day'),
(10, 'Runner 2', 'Run 10.000 meters in one day', 'Run 10.000 meters in one day'),
(11, 'Runner 3', 'Run 100.000 meters in one day', 'Run 100.000 meters in one day');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'MyName',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '../../../public/img/dummy/dummy.jpg',
  `total_achievement` int NOT NULL DEFAULT '0',
  `total_quest` int NOT NULL DEFAULT '0',
  `level` int NOT NULL DEFAULT '1',
  `current_experience` int NOT NULL DEFAULT '0',
  `target_experience` int NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `isAdmin`, `image_path`, `total_achievement`, `total_quest`, `level`, `current_experience`, `target_experience`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', 'admin', 1, '../../../public/img/logo.jpg', 1, 0, 1, 0, 100),
(2, 'user', NULL, 'user@gmail.com', 'user', 0, '../../../public/img/logo.jpg', 0, 1, 1, 0, 100),
(4, '222', NULL, '222', '222', 0, '../../../public/img/logo.jpg', 0, 0, 1, 0, 100),
(5, '2', NULL, '2', '2', 0, '../../../public/img/logo.jpg', 0, 0, 2, 30, 140),
(6, '123host', 'Wildan Ghaly', '13521015@std.stei.itb.ac.id', '1+8UUdV1ZFsTMzmd3BP1Rw==', 0, '../../../public/img/profile/123host.jpg', 21, 3, 1, 58, 100),
(7, '456host', 'Hellooo', '13521015@std.stei.itb.ac.id', '1+8UUdV1ZFsTMzmd3BP1Rw==', 1, '../../../public/img/logo.jpg', 0, 1, 1, 0, 100),
(8, '789host', 'Wildan Ghalyss', '13521015@std.stei.itb.ac.id', '1+8UUdV1ZFsTMzmd3BP1Rw==', 0, '../../../views/img/profile/789host.jpg', 0, 0, 1, 0, 100),
(9, '12345', NULL, '123@gmail.com', '1+8UUdV1ZFsTMzmd3BP1Rw==', 0, '../../../public/img/dummy/dummy.jpg', 0, 0, 1, 0, 100),
(10, 'aaaaa', NULL, 'aaa@aaa.aaa', 'hN235tX1kddl8k5iJtn48A==', 0, '../../../public/img/dummy/dummy.jpg', 0, 0, 1, 0, 100);

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
  `achievement_id` int NOT NULL,
  `time_get` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_achievement`
--

INSERT INTO `user_achievement` (`user_id`, `achievement_id`, `time_get`) VALUES
(6, 3, '2023-06-03 22:38:42'),
(6, 4, '2023-07-05 22:38:42'),
(6, 5, '2023-07-06 22:38:42'),
(6, 6, '2023-08-07 22:38:42'),
(6, 7, '2023-08-08 22:38:42'),
(6, 8, '2023-08-09 22:38:42'),
(6, 9, '2023-08-10 22:38:42'),
(6, 10, '2023-08-11 22:38:42'),
(6, 11, '2023-09-05 22:38:42'),
(6, 12, '2023-09-06 22:38:42'),
(6, 13, '2023-09-06 22:38:42'),
(6, 14, '2023-09-07 22:38:42'),
(6, 15, '2023-10-05 22:38:42'),
(6, 16, '2023-10-05 22:38:42'),
(6, 17, '2023-10-05 22:38:42'),
(6, 18, '2023-10-01 22:38:42'),
(6, 19, '2023-10-05 22:38:42'),
(6, 20, '2023-10-05 22:38:42'),
(6, 21, '2023-10-05 22:38:42'),
(6, 22, '2023-10-05 22:38:42');

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
(2, 1),
(7, 1),
(6, 2),
(6, 3),
(6, 7);

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
  ADD UNIQUE KEY `achievement_name_index` (`name`),
  ADD KEY `achievement_group_classification` (`group_id`);

--
-- Indexes for table `achievement_group`
--
ALTER TABLE `achievement_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_collection_foreign_key` (`user_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `achievement_group`
--
ALTER TABLE `achievement_group`
  MODIFY `group_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `quest`
--
ALTER TABLE `quest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievement`
--
ALTER TABLE `achievement`
  ADD CONSTRAINT `achievement_group_classification` FOREIGN KEY (`group_id`) REFERENCES `achievement_group` (`group_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `user_collection_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
