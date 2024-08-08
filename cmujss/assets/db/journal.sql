/*
 Navicat Premium Data Transfer

 Source Server         : XAMPP
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : journal

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 30/04/2024 20:23:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for article_assigned
-- ----------------------------
DROP TABLE IF EXISTS `article_assigned`;
CREATE TABLE `article_assigned`  (
  `assigned_id` int NOT NULL AUTO_INCREMENT,
  `submission_id` int NULL DEFAULT NULL,
  `userid` int NULL DEFAULT NULL,
  PRIMARY KEY (`assigned_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of article_assigned
-- ----------------------------

-- ----------------------------
-- Table structure for article_author
-- ----------------------------
DROP TABLE IF EXISTS `article_author`;
CREATE TABLE `article_author`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `articleid` int NULL DEFAULT NULL,
  `auid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `auid`(`auid` ASC) USING BTREE,
  INDEX `articleid`(`articleid` ASC) USING BTREE,
  CONSTRAINT `articleid` FOREIGN KEY (`articleid`) REFERENCES `articles` (`articleid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auid` FOREIGN KEY (`auid`) REFERENCES `authors` (`auid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of article_author
-- ----------------------------
INSERT INTO `article_author` VALUES (1, 1, 1);

-- ----------------------------
-- Table structure for article_submission
-- ----------------------------
DROP TABLE IF EXISTS `article_submission`;
CREATE TABLE `article_submission`  (
  `submission_id` int NOT NULL AUTO_INCREMENT,
  `auid` int NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `filename` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `submission` bit(1) NULL DEFAULT NULL,
  `date_submitted` datetime NULL DEFAULT NULL,
  `payment` bit(1) NULL DEFAULT NULL,
  `date_paid` int NULL DEFAULT NULL,
  `review` bit(1) NULL DEFAULT NULL,
  `date_forwaded_review` datetime NULL DEFAULT NULL,
  `approved` bit(1) NULL DEFAULT NULL,
  `date_approved` datetime NULL DEFAULT NULL,
  `layout` bit(1) NULL DEFAULT NULL,
  `date_forwaded` datetime NULL DEFAULT NULL,
  `published` bit(1) NULL DEFAULT NULL,
  `date_published` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`submission_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of article_submission
-- ----------------------------

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `articleid` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `abstract` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `published` bit(1) NULL DEFAULT NULL,
  `filename` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `date_published` datetime NULL DEFAULT current_timestamp,
  `doi` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `volumeid` int NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`articleid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES (1, 'Communication Styles and Interpersonal Communications of Mobile Legends Bang-Bang (MLBB) Players', 'online games', 'This study explored the Mobile Legends Bang-Bang (MLBB) players’ dominant communication styles and how their participation in this online game contributed to their interpersonal communications. The researchers utilized a 5-point Likert scale questionnaire', b'1', 'Social Sciences', '2024-03-03 19:45:18', '10.52751/AYJD8223', 1, NULL);
INSERT INTO `articles` VALUES (2, 'A Proposed Conceptual Framework for the Integration of Agent-Based MIcrosimulation to Activity-Based Demand Models', 'Agent-based microsimulation', 'Traffic patterns and related problems are changing due to population growth, calamities, among others. Transportation planning is crucial in finding solutions to these problems. Travel forecasting models such as activity-based demand and agent-based micro', b'1', 'Natural Sciences', '2024-03-05 08:46:30', '10.52751/GQKL6394\r\n\r\nTraffic patterns and relat', 2, NULL);
INSERT INTO `articles` VALUES (3, 'Mining the Indigenous Fruit Trees of Mindanao for Essentials Oils with Antibacterial Activity', 'Indigenous fruit trees', 'Indigenous fruit trees are underutilized local resources but of great interest as potential sources of new chemical entities for drug discovery. In this work, the antimicrobial potential of essential oils (EOs) extracted from indigenous fruit trees of Min', b'1', 'Natural Sciences', '2024-03-05 08:47:33', '10.52751/NSBQ2179', 3, NULL);
INSERT INTO `articles` VALUES (4, 'Adaptability and Teaching Performance of Gulod and Mamatid National High School Teachers During the Pandemic', 'AdaptabilityTeachers’ Adaptability', 'Adaptability is a skill needed in the performance of teachers\' duties. This study aimed to assess teachers\' performance and adaptability at two public schools in Cabuyao, Laguna, Philippines, in 2021-2022. It attempted to determine the level of adaptabili', b'1', 'Social Sciences', '2024-03-05 08:48:28', '10.52751/ABUF7062', 4, NULL);

-- ----------------------------
-- Table structure for authors
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors`  (
  `auid` int NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `images` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `contact_num` int NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp,
  `status` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`auid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of authors
-- ----------------------------
INSERT INTO `authors` VALUES (1, 'RM Diaz', 'noimages.jpg', 'rm@gmail.com', 923123126, 'Communication Styles and Interpersonal Communications of Mobile Legends Bang-Bang (MLBB) Players', '2024-02-27 18:39:46', b'1');
INSERT INTO `authors` VALUES (2, 'Lisa Manoban', 'lisa.jpg', 'lisa@gmail.com', 984343245, 'A Proposed Conceptual Framework for the Integration of Agent-Based MIcrosimulation to Activity-Based Demand Models', '2024-02-29 04:06:34', b'1');
INSERT INTO `authors` VALUES (3, 'Kim Chaewon', 'chae.jpg', 'pupu@gmail.com', 977483647, 'Mining the Indigenous Fruit Trees of Mindanao for Essentials Oils with Antibacterial Activity', '2024-03-02 00:40:28', b'1');
INSERT INTO `authors` VALUES (4, 'Sana Minatozaki', 'Sana.jpg', 'sana@gmail.com', 980983245, 'Adaptability and Teaching Performance of Gulod and Mamatid National High School Teachers During the Pandemic', '2024-03-02 00:40:56', b'1');
INSERT INTO `authors` VALUES (5, 'Karina Yoo', 'karina.jpg', 'karina@gmail.com', 972143245, 'Competency Mapping: A Tool of Appraising Business Potentials in a Rural Community of Bukang Liwayway, Kibawe, Bukidnon', '2024-03-05 08:16:22', b'1');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comments` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `assigned_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`comment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `userid` int NOT NULL AUTO_INCREMENT,
  `auid` int NULL DEFAULT NULL,
  `profile_pic` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `complete_name` varchar(100) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `pword` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `status` bit(1) NULL DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp,
  `role` int NULL DEFAULT NULL,
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 4, 'Sana.jpg', 'Minatozaki Sana', '123', 'sana@gmail.com', b'0', '2023-02-09 09:55:14', NULL);
INSERT INTO `users` VALUES (2, NULL, 'jisoo.jpg', 'Kim Jisoo', '123', 'jichu@gmail.com', b'0', '2023-02-09 09:55:20', NULL);
INSERT INTO `users` VALUES (3, 3, 'chae1.jpg', 'Kim Chaewon', '123', 'angel@gmail.com', b'1', '2023-02-09 09:57:34', NULL);
INSERT INTO `users` VALUES (4, 2, 'lisa.jpg', 'Lalisa Manobal', '123', 'ralisa@gmail.com', b'1', '2023-02-15 22:29:58', NULL);
INSERT INTO `users` VALUES (5, NULL, 'ryujin.jpg', 'Shin Ryu Jin', '123', 'ryujin@gmail.com', b'1', '2023-02-26 20:50:40', NULL);
INSERT INTO `users` VALUES (9, NULL, 'miamore1.jpg', 'Kawai Ruka', '123', 'ruka@gmail.com', b'1', '2024-04-29 00:22:19', NULL);

-- ----------------------------
-- Table structure for volume
-- ----------------------------
DROP TABLE IF EXISTS `volume`;
CREATE TABLE `volume`  (
  `volumeid` int NOT NULL AUTO_INCREMENT,
  `vol_name` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `date_at` datetime NULL DEFAULT current_timestamp,
  PRIMARY KEY (`volumeid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of volume
-- ----------------------------
INSERT INTO `volume` VALUES (1, 'VOL1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur convallis fermentum massa ac consequat. Donec id cursus magna, ut vehicula ligula. In ut lectus nec lectus pulvinar ullamcorper. Vestibulum consectetur, nisi a auctor faucibus, enim ex pla', '2024-03-03 01:28:17');
INSERT INTO `volume` VALUES (2, 'VOL2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur convallis fermentum massa ac consequat. Donec id cursus magna, ut vehicula ligula. In ut lectus nec lectus pulvinar ullamcorper. Vestibulum consectetur, nisi a auctor faucibus, enim ex pla', '2024-04-16 01:26:54');
INSERT INTO `volume` VALUES (3, 'VOL3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur convallis fermentum massa ac consequat. Donec id cursus magna, ut vehicula ligula. In ut lectus nec lectus pulvinar ullamcorper. Vestibulum consectetur, nisi a auctor faucibus, enim ex pla', '2024-04-16 01:27:18');

SET FOREIGN_KEY_CHECKS = 1;
