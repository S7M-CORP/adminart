/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : db_pos

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 10/10/2021 15:44:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_barang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_barang`;
CREATE TABLE `tbl_barang`  (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_barang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL,
  `stok` double NOT NULL,
  `satuan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_barang
-- ----------------------------
INSERT INTO `tbl_barang` VALUES (6, 'KBL122', 'Rokok Dji Sam Soe', 3, 19500, 20000, 97, 'Bungkus');
INSERT INTO `tbl_barang` VALUES (7, 'KBL122', 'Sampoerna Mild', 1, 23000, 25000, 92, 'Bungkus');
INSERT INTO `tbl_barang` VALUES (8, 'RK023', 'Garpit', 3, 19000, 20000, 95, 'Bungkus');
INSERT INTO `tbl_barang` VALUES (9, 'mnm43', 'Seruput', 3, 5000, 6000, 95, 'cup');

-- ----------------------------
-- Table structure for tbl_pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pelanggan`;
CREATE TABLE `tbl_pelanggan`  (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pelanggan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pelanggan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pelanggan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pelanggan
-- ----------------------------
INSERT INTO `tbl_pelanggan` VALUES (1, 'PLG01', 'Jeffry', 'Kp. Tegalwaru City', '081908190819');

-- ----------------------------
-- Table structure for tbl_supplier
-- ----------------------------
DROP TABLE IF EXISTS `tbl_supplier`;
CREATE TABLE `tbl_supplier`  (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_supplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_supplier
-- ----------------------------
INSERT INTO `tbl_supplier` VALUES (1, 'Jajang Kusuma', '+6281284XXXXXX', 'Jl.Kebon Jeruk No.53 , Jakarta Selatan ', 'Supplier Roko');
INSERT INTO `tbl_supplier` VALUES (2, 'Dadan', '0811345XXXXX', 'Jl. Martadinata No.75 , Karawang', 'Supplier Makanan');
INSERT INTO `tbl_supplier` VALUES (3, 'Elton Jhon', '08980980', 'Jl. Ipik Gandamanah No.1, Ciseureuh, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41117', 'Sembako');

-- ----------------------------
-- Table structure for tbl_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE `tbl_transaksi`  (
  `kd_transaksi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `kasir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pelanggan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total_bayar` double NOT NULL,
  `bayar` double NOT NULL,
  `kembalian` double NULL DEFAULT NULL,
  PRIMARY KEY (`kd_transaksi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transaksi
-- ----------------------------
INSERT INTO `tbl_transaksi` VALUES ('TRX1010210821', '2021-10-10 15:21:56', 'user', 'M ramdan', 96000, 100000, 4000);
INSERT INTO `tbl_transaksi` VALUES ('TRX1010210837', '2021-10-10 15:38:04', 'user', 'grinjow', 102000, 120000, 18000);

-- ----------------------------
-- Table structure for tbl_transaksi_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi_detail`;
CREATE TABLE `tbl_transaksi_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_transaksi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` double NOT NULL,
  `qty` double NOT NULL,
  `total_harga` double NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transaksi_detail
-- ----------------------------
INSERT INTO `tbl_transaksi_detail` VALUES (43, 'TRX1010210821', 6, 20000, 1, 20000);
INSERT INTO `tbl_transaksi_detail` VALUES (44, 'TRX1010210821', 7, 25000, 2, 50000);
INSERT INTO `tbl_transaksi_detail` VALUES (45, 'TRX1010210821', 9, 6000, 1, 6000);
INSERT INTO `tbl_transaksi_detail` VALUES (46, 'TRX1010210821', 8, 20000, 1, 20000);
INSERT INTO `tbl_transaksi_detail` VALUES (47, 'TRX1010210837', 6, 20000, 1, 20000);
INSERT INTO `tbl_transaksi_detail` VALUES (48, 'TRX1010210837', 7, 25000, 2, 50000);
INSERT INTO `tbl_transaksi_detail` VALUES (49, 'TRX1010210837', 9, 6000, 2, 12000);
INSERT INTO `tbl_transaksi_detail` VALUES (50, 'TRX1010210837', 8, 20000, 1, 20000);

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (2, 'user', 'user@gmail.com', 'user');
INSERT INTO `tbl_user` VALUES (8, 'admin', 'admin@gmail.com', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
