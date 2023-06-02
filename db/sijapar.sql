/*
 Navicat Premium Data Transfer

 Source Server         : localllllllllllll
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : sijapar

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 02/06/2023 20:35:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nm_admin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin1', '$2y$10$gubtFsr6w5ERiwIKgiFvA.25Tsi.Kkv8DvMKvndcrJ/FqoGo0cbJu', 'Admin 1');

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking`  (
  `id_booking` int NOT NULL AUTO_INCREMENT,
  `id_engineer` int NOT NULL,
  `id_customer` int NOT NULL,
  `id_paket` int NULL DEFAULT NULL,
  `tipe` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nomor_po` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_booking` date NULL DEFAULT NULL,
  `jenis` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `perusahaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `keluhan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_read` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `progress` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_booking`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES (9, 1, 7, NULL, NULL, 'CBA2006050001', '2020-06-06', 'maintenance', 'PT. LL', NULL, 'Karawang', 'Kotor', 'selesai', '1', '40', 62010000);
INSERT INTO `booking` VALUES (10, 1, 7, NULL, NULL, 'CBA2006080001', '2020-06-10', 'repair', 'PT ABC', NULL, 'Karawang', 'Macet', NULL, '1', NULL, 400000);

-- ----------------------------
-- Table structure for booking_barang
-- ----------------------------
DROP TABLE IF EXISTS `booking_barang`;
CREATE TABLE `booking_barang`  (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `id_booking` int NOT NULL,
  `nama_barang` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 172 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of booking_barang
-- ----------------------------
INSERT INTO `booking_barang` VALUES (31, 9, 'Barang 1');
INSERT INTO `booking_barang` VALUES (32, 9, 'Barang 2');
INSERT INTO `booking_barang` VALUES (168, 11, 'Barang 5');
INSERT INTO `booking_barang` VALUES (169, 11, 'Barang 6');
INSERT INTO `booking_barang` VALUES (170, 11, 'Barang 5');
INSERT INTO `booking_barang` VALUES (171, 11, 'Barang 6');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `id_customer` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nm_customer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tlp_customer` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `almt_customer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `perusahaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_customer`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (1, 'customer1', '$2y$10$q.kLg7sPISoK0dknwfKVKuvvtidbSqcvu1EH8L3GbKsEMgbchn22i', 'customer@gmail.com', 'Customer', NULL, '087812345688', 'Karawang', 'PT ABC');
INSERT INTO `customer` VALUES (6, 'arman', '$2y$10$q.kLg7sPISoK0dknwfKVKuvvtidbSqcvu1EH8L3GbKsEMgbchn22i', 'arman@gmail.com', 'Arman Herfian', NULL, '098989898999', 'Karawang', 'PT ABC');
INSERT INTO `customer` VALUES (7, 'sutardihardiansyah', '$2y$10$KbJIZKMhnnKGZpo59/GSeuh28VnsEL.qYDktSa2L56smJqQghS2uS', 'sutardihardiansyah@gmail.com', 'Sutardi Hardiansyah', 'staf', '087878448471', 'Karawang', 'PT. LL');
INSERT INTO `customer` VALUES (8, 'ikur', '$2y$10$UPimFOm4ufs2bzDJ2.E0E.Wyr/AERnSI/2qMsXD2biVmRrJWq.bhm', 'ikur@gmail.com', 'Indra Kurnaiwan', NULL, '098989898999', '', '');
INSERT INTO `customer` VALUES (9, 'baban', '$2y$10$c8Gq478.WZNzHJOzhjnMROKHYCS0Jb.pNhRsIhCKaenwp9YTuqQDO', 'baban@gmail.com', 'Baban Syahbana', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for detail_booking
-- ----------------------------
DROP TABLE IF EXISTS `detail_booking`;
CREATE TABLE `detail_booking`  (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `id_booking` int NULL DEFAULT NULL,
  `id_barang` int NULL DEFAULT NULL,
  `jenis_pekerjaan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` int NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `satuan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'pc',
  `subtotal` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 189 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_booking
-- ----------------------------
INSERT INTO `detail_booking` VALUES (48, 9, 31, 'a', 10000, 1, 'pc', 10000);
INSERT INTO `detail_booking` VALUES (49, 9, 31, 'b', 20000, 2, 'pc', 40000);
INSERT INTO `detail_booking` VALUES (50, 9, 31, 'c', 30000, 3, 'pc', 90000);
INSERT INTO `detail_booking` VALUES (51, 9, 31, 'd', 40000, 4, 'pc', 160000);
INSERT INTO `detail_booking` VALUES (52, 9, 31, 'e', 50000, 5, 'pc', 250000);
INSERT INTO `detail_booking` VALUES (53, 9, 32, 'f', 60000, 6, 'pc', 360000);
INSERT INTO `detail_booking` VALUES (54, 9, 32, 'g', 70000, 7, 'pc', 490000);
INSERT INTO `detail_booking` VALUES (55, 9, 32, 'h', 80000, 8, 'pc', 640000);
INSERT INTO `detail_booking` VALUES (56, 9, 32, 'i', 90000, 9, 'pc', 810000);
INSERT INTO `detail_booking` VALUES (57, 9, 32, 'j', 100000, 10, 'pc', 1000000);
INSERT INTO `detail_booking` VALUES (58, 9, 5, 'k', 110000, 11, 'pc', 1210000);
INSERT INTO `detail_booking` VALUES (59, 9, 5, 'l', 120000, 12, 'pc', 1440000);
INSERT INTO `detail_booking` VALUES (60, 9, 5, 'm', 130000, 13, 'pc', 1690000);
INSERT INTO `detail_booking` VALUES (61, 9, 5, 'n', 140000, 14, 'pc', 1960000);
INSERT INTO `detail_booking` VALUES (62, 9, 5, 'o', 150000, 15, 'pc', 2250000);
INSERT INTO `detail_booking` VALUES (73, 9, 5, 'z', 260000, 26, 'pc', 6760000);
INSERT INTO `detail_booking` VALUES (183, 11, 169, 'A', 40000, 3, 'LO', 120000);
INSERT INTO `detail_booking` VALUES (184, 11, 169, 'B', 80000, 8, 'PC', 640000);
INSERT INTO `detail_booking` VALUES (185, 11, 169, 'c', 20000, 3, 'PC', 60000);
INSERT INTO `detail_booking` VALUES (186, 11, 171, 'A', 40000, 3, 'LO', 120000);
INSERT INTO `detail_booking` VALUES (187, 11, 171, 'B', 80000, 8, 'PC', 640000);
INSERT INTO `detail_booking` VALUES (188, 11, 171, 'c', 20000, 3, 'PC', 60000);

-- ----------------------------
-- Table structure for engineer
-- ----------------------------
DROP TABLE IF EXISTS `engineer`;
CREATE TABLE `engineer`  (
  `id_engineer` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nm_engineer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tlp_engineer` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jk_engineer` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'p = perempuan\r\nl = laki-laki',
  `almt_engineer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id_engineer`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of engineer
-- ----------------------------
INSERT INTO `engineer` VALUES (1, 'budi', '$2y$10$gubtFsr6w5ERiwIKgiFvA.25Tsi.Kkv8DvMKvndcrJ/FqoGo0cbJu', 'Budi', 'budi@gmail.com', '087812345678', 'l', 'Karawang');
INSERT INTO `engineer` VALUES (2, 'jono', '$2y$10$gubtFsr6w5ERiwIKgiFvA.25Tsi.Kkv8DvMKvndcrJ/FqoGo0cbJu', 'Jono', 'jono@gmail.com', '085612345678', 'l', 'Karawang');
INSERT INTO `engineer` VALUES (6, NULL, NULL, 'Faiz Kho', 'faiz@gmail.com', '085612345678', 'l', 'Karawang');

-- ----------------------------
-- Table structure for paket
-- ----------------------------
DROP TABLE IF EXISTS `paket`;
CREATE TABLE `paket`  (
  `id_paket` int NOT NULL AUTO_INCREMENT,
  `nm_paket` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_paket`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of paket
-- ----------------------------
INSERT INTO `paket` VALUES (1, '1 Bulan', 'Paket Maintenance 1 Bulan');
INSERT INTO `paket` VALUES (2, '3 Bulan', 'Paket Maintenance 3 Bulan');
INSERT INTO `paket` VALUES (3, '6 Bulan', 'Paket Maintenance 6 Bulan');
INSERT INTO `paket` VALUES (4, '12 Bulan', 'Paket Maintenance 12 Bulan');

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `id_booking` int NULL DEFAULT NULL,
  `id_customer` int NULL DEFAULT NULL,
  `nm_bank` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nm_rekening` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_pembayaran` date NULL DEFAULT NULL,
  `gambar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES (1, 9, 7, 'bni', 'siti', '2020-06-13', '20190617212655_00002-min.jpg');

SET FOREIGN_KEY_CHECKS = 1;
