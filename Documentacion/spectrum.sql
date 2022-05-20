/*
 Navicat Premium Data Transfer

 Source Server         : localhost 2
 Source Server Type    : MySQL
 Source Server Version : 100309
 Source Host           : localhost:3338
 Source Schema         : spectrum

 Target Server Type    : MySQL
 Target Server Version : 100309
 File Encoding         : 65001

 Date: 20/05/2022 21:29:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for spectrum
-- ----------------------------
DROP TABLE IF EXISTS `spectrum`;
CREATE TABLE `spectrum`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SpectrumKey` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ClientKey` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Network` int(11) NULL DEFAULT NULL,
  `Site` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `IP` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Port` int(11) NULL DEFAULT NULL,
  `BlockPolonia` int(11) NOT NULL DEFAULT 1,
  `BlockPanama` int(11) NOT NULL DEFAULT 1,
  `Transit` int(11) NULL DEFAULT NULL,
  `Destroy` int(11) NOT NULL DEFAULT 0,
  `Registry` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TodayFloods` int(11) NULL DEFAULT 0,
  `TodayAttacks` int(11) NULL DEFAULT 0,
  `TodayRequests` int(11) NULL DEFAULT 0,
  `TotalFloods` int(11) NULL DEFAULT 0,
  `TotalAttacks` int(11) NULL DEFAULT 0,
  `TopRequests` int(11) NULL DEFAULT 0,
  `TopAttacks` int(11) NULL DEFAULT 0,
  `TopFloods` int(11) NULL DEFAULT 0,
  `Day` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for spectrum_asn
-- ----------------------------
DROP TABLE IF EXISTS `spectrum_asn`;
CREATE TABLE `spectrum_asn`  (
  `ASN` int(11) NOT NULL,
  `Company` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Network` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for spectrum_balancer
-- ----------------------------
DROP TABLE IF EXISTS `spectrum_balancer`;
CREATE TABLE `spectrum_balancer`  (
  `SpectrumKey` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `SlavePort` int(11) NULL DEFAULT NULL,
  `Connections` int(11) NOT NULL DEFAULT 0,
  `LimitConnections` int(11) NOT NULL DEFAULT 0,
  `BlockingUSA` int(11) NOT NULL DEFAULT 0,
  `BalancingUSA` int(11) NOT NULL DEFAULT 0,
  `InAttack` int(11) NOT NULL DEFAULT 0,
  `ProcessingMigration` int(11) NOT NULL DEFAULT 0,
  `ChangingPort` int(11) NOT NULL DEFAULT 0,
  `ProcessingAction` int(11) NOT NULL DEFAULT 0,
  `NeedChangePort` int(11) NOT NULL DEFAULT 0,
  `Requests` int(11) NOT NULL DEFAULT 0
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for spectrum_global
-- ----------------------------
DROP TABLE IF EXISTS `spectrum_global`;
CREATE TABLE `spectrum_global`  (
  `ip` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `spectrum` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `reason` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desban` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0'
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for spectrum_network
-- ----------------------------
DROP TABLE IF EXISTS `spectrum_network`;
CREATE TABLE `spectrum_network`  (
  `Id` int(11) NOT NULL,
  `Network` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for spectrum_notification
-- ----------------------------
DROP TABLE IF EXISTS `spectrum_notification`;
CREATE TABLE `spectrum_notification`  (
  `spectrum` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for spectrum_pending_blocks
-- ----------------------------
DROP TABLE IF EXISTS `spectrum_pending_blocks`;
CREATE TABLE `spectrum_pending_blocks`  (
  `ip` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `spectrum` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for spectrum_whitelist
-- ----------------------------
DROP TABLE IF EXISTS `spectrum_whitelist`;
CREATE TABLE `spectrum_whitelist`  (
  `SpectrumKey` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `IP` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `spectrum_client` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
