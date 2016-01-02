/*
Navicat MySQL Data Transfer

Source Server         : mda
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : huda

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-01-02 17:02:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `barang`
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(512) NOT NULL,
  `tipe` enum('banner','film','desain','barang') NOT NULL,
  `harga` decimal(16,0) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES ('1', 'Desain Biasa', 'desain', '10000', 'paket');
INSERT INTO `barang` VALUES ('2', 'Desain Medium', 'desain', '20000', 'paket');
INSERT INTO `barang` VALUES ('3', 'Desain Advance', 'desain', '30000', 'paket');
INSERT INTO `barang` VALUES ('4', 'Banner', 'banner', '18000', 'm2s');
INSERT INTO `barang` VALUES ('5', 'Film', 'film', '160', 'cm');
INSERT INTO `barang` VALUES ('6', 'aqua', 'barang', '10000', 'gelas');
INSERT INTO `barang` VALUES ('9', 'Alexis', 'barang', '123', '123');

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'Alex Prima', 'miji', '08113609160');
INSERT INTO `customer` VALUES ('2', 'Muzak', 'Miji', '080000000');
INSERT INTO `customer` VALUES ('3', 'Madi', '123', '123');
INSERT INTO `customer` VALUES ('4', 'Alexx', '456', '456');
INSERT INTO `customer` VALUES ('5', 'alexxs', '456', '123');
INSERT INTO `customer` VALUES ('6', 'Wiwik', '', '');

-- ----------------------------
-- Table structure for `detil`
-- ----------------------------
DROP TABLE IF EXISTS `detil`;
CREATE TABLE `detil` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `uraian` varchar(512) NOT NULL,
  `harga` decimal(16,2) NOT NULL,
  `total` decimal(16,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_id` (`jml`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detil
-- ----------------------------
INSERT INTO `detil` VALUES ('1', '1', '2', '3', 'Desain Medium Kota', '20000.00', null);
INSERT INTO `detil` VALUES ('2', '2', '3', '4', 'Desain Advance dgfdgdf', '30000.00', null);
INSERT INTO `detil` VALUES ('3', '3', '9', '4', 'Alexis 4444', '123.00', null);
INSERT INTO `detil` VALUES ('4', '4', '9', '4', 'Alexis 4444', '123.00', null);
INSERT INTO `detil` VALUES ('5', '5', '9', '4', 'Alexis 4444', '123.00', null);
INSERT INTO `detil` VALUES ('6', '6', '9', '4', 'Alexis 4444', '123.00', null);
INSERT INTO `detil` VALUES ('7', '7', '9', '4', 'Alexis 4444', '123.00', null);
INSERT INTO `detil` VALUES ('8', '8', '1', '5', 'Desain Biasa ghj', '10000.00', null);
INSERT INTO `detil` VALUES ('9', '9', '3', '5', 'Desain Advance Pemkot', '30000.00', null);
INSERT INTO `detil` VALUES ('10', '10', '6', '4', 'aqua 2', '10000.00', null);
INSERT INTO `detil` VALUES ('11', '10', '4', '2', 'Banner 2', '18000.00', null);
INSERT INTO `detil` VALUES ('12', '11', '2', '5', 'Desain Medium 1', '20000.00', null);
INSERT INTO `detil` VALUES ('13', '12', '2', '3', 'Desain Medium 3', '20000.00', null);
INSERT INTO `detil` VALUES ('14', '13', '2', '2', 'Desain Medium 222', '20000.00', null);
INSERT INTO `detil` VALUES ('15', '15', '2', '3', 'Desain Medium cvx', '20000.00', null);
INSERT INTO `detil` VALUES ('16', '16', '3', '4', 'Desain Advance 444', '30000.00', null);
INSERT INTO `detil` VALUES ('17', '17', '4', '2', 'Banner 2 P = 2.00m2s L = 2.00m2s', '18000.00', null);
INSERT INTO `detil` VALUES ('18', '18', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('19', '19', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('20', '20', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('21', '21', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('22', '22', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('23', '23', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('24', '24', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('25', '25', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('26', '26', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('27', '27', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('28', '28', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('29', '29', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('30', '30', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('31', '31', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('32', '32', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('33', '33', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('34', '34', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('35', '35', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('36', '36', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('37', '37', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('38', '38', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('39', '39', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('40', '40', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('41', '41', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('42', '42', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('43', '43', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('44', '44', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('45', '45', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('46', '46', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('47', '47', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('48', '48', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('49', '49', '3', '3', 'Desain Advance 33', '30000.00', null);
INSERT INTO `detil` VALUES ('50', '54', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('51', '54', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('52', '55', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('53', '55', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('54', '56', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('55', '56', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('56', '57', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('57', '57', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('58', '58', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('59', '58', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('60', '59', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('61', '59', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('62', '60', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('63', '60', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('64', '61', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('65', '61', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('66', '62', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('67', '62', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('68', '63', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('69', '63', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('70', '64', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('71', '64', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('72', '65', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('73', '65', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('74', '66', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('75', '66', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('76', '67', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('77', '67', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('78', '68', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('79', '68', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('80', '69', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('81', '69', '3', '3', 'Desain Advance 6', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('82', '70', '3', '2', 'Desain Advance 222', '30000.00', '60000.00');
INSERT INTO `detil` VALUES ('83', '71', '2', '3', 'Desain Medium 33', '20000.00', '60000.00');
INSERT INTO `detil` VALUES ('84', '73', '3', '3', 'Desain Advance 33', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('85', '75', '2', '3', 'Desain Medium 33', '20000.00', '60000.00');
INSERT INTO `detil` VALUES ('86', '76', '1', '3', 'Desain Biasa 33', '10000.00', '30000.00');
INSERT INTO `detil` VALUES ('87', '77', '1', '3', 'Desain Biasa 33', '10000.00', '30000.00');
INSERT INTO `detil` VALUES ('88', '78', '2', '4', 'Desain Medium 4', '20000.00', '80000.00');
INSERT INTO `detil` VALUES ('89', '79', '3', '3', 'Desain Advance rt', '30000.00', '90000.00');
INSERT INTO `detil` VALUES ('90', '80', '2', '3', 'Desain Medium 3', '20000.00', '60000.00');
INSERT INTO `detil` VALUES ('91', '81', '2', '3', 'Desain Medium 33', '20000.00', '60000.00');
INSERT INTO `detil` VALUES ('92', '82', '2', '3', 'Desain Medium 3', '20000.00', '60000.00');
INSERT INTO `detil` VALUES ('93', '83', '1', '1', 'Desain Biasa 1', '10000.00', '10000.00');
INSERT INTO `detil` VALUES ('94', '84', '3', '4', 'Desain Advance 3', '30000.00', '120000.00');

-- ----------------------------
-- Table structure for `sales`
-- ----------------------------
DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kasir` varchar(255) NOT NULL,
  `subtotal` decimal(20,2) DEFAULT NULL,
  `diskon` int(3) DEFAULT NULL,
  `Ndiskon` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL,
  `bayar` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sales
-- ----------------------------
INSERT INTO `sales` VALUES ('1', '2', '2015-11-23', 'nama kasir', '60000.00', '0', '0.00', '60000.00', '0.00');
INSERT INTO `sales` VALUES ('2', '5', '2015-11-23', 'nama kasir', '120000.00', '0', '0.00', '120000.00', '0.00');
INSERT INTO `sales` VALUES ('3', '2', '2015-11-23', 'nama kasir', '492.00', '0', '0.00', '492.00', '4.00');
INSERT INTO `sales` VALUES ('4', '2', '2015-11-23', 'nama kasir', '492.00', '0', '0.00', '492.00', '4.00');
INSERT INTO `sales` VALUES ('5', '2', '2015-11-23', 'nama kasir', '492.00', '0', '0.00', '492.00', '4.00');
INSERT INTO `sales` VALUES ('6', '2', '2015-11-23', 'nama kasir', '492.00', '0', '0.00', '492.00', '4.00');
INSERT INTO `sales` VALUES ('7', '2', '2015-11-23', 'nama kasir', '492.00', '0', '0.00', '492.00', '4.00');
INSERT INTO `sales` VALUES ('8', '4', '2015-11-23', 'nama kasir', '50000.00', '0', '0.00', '50000.00', '55.00');
INSERT INTO `sales` VALUES ('9', '2', '2015-11-23', 'nama kasir', '150000.00', '0', '0.00', '150000.00', '200000.00');
INSERT INTO `sales` VALUES ('10', '2', '2015-11-23', 'nama kasir', '76000.00', '0', '0.00', '76000.00', '100000.00');
INSERT INTO `sales` VALUES ('11', '1', '2015-11-23', 'nama kasir', '100000.00', '0', '0.00', '100000.00', '100000.00');
INSERT INTO `sales` VALUES ('12', '1', '2015-11-23', 'nama kasir', '60000.00', '0', '0.00', '60000.00', '100000.00');
INSERT INTO `sales` VALUES ('13', '2', '2015-11-23', 'nama kasir', '40000.00', '0', '0.00', '40000.00', '100000.00');
INSERT INTO `sales` VALUES ('15', '2', '2015-11-23', 'nama kasir', '60000.00', '0', '0.00', '60000.00', '43432324.00');
INSERT INTO `sales` VALUES ('16', '3', '2015-11-23', 'nama kasir', '120000.00', '0', '0.00', '120000.00', '4444.00');
INSERT INTO `sales` VALUES ('17', '5', '2015-11-23', 'nama kasir', '144000.00', '0', '0.00', '144000.00', '0.00');
INSERT INTO `sales` VALUES ('18', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('19', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('20', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('21', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('22', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('23', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('24', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('25', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('26', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('27', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('28', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('29', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('30', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('31', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('32', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('33', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('34', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('35', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('36', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('37', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('38', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('39', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('40', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('41', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('42', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('43', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('44', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('45', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('46', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('47', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('48', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('49', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '444444.00');
INSERT INTO `sales` VALUES ('53', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('54', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('55', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('56', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('57', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('58', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('59', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('60', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('61', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('62', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('63', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('64', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('65', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('66', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('67', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('68', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('69', '2', '2015-11-23', 'nama kasir', '180000.00', '0', '0.00', '180000.00', '644444.00');
INSERT INTO `sales` VALUES ('70', '2', '2015-11-23', 'nama kasir', '60000.00', '0', '0.00', '60000.00', '4444.00');
INSERT INTO `sales` VALUES ('71', '4', '2015-11-23', 'nama kasir', '60000.00', '0', '0.00', '60000.00', '33432423.00');
INSERT INTO `sales` VALUES ('73', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '3333.00');
INSERT INTO `sales` VALUES ('75', '2', '2015-11-23', 'nama kasir', '60000.00', '0', '0.00', '60000.00', '444444.00');
INSERT INTO `sales` VALUES ('76', '6', '2015-11-23', 'nama kasir', '30000.00', '0', '0.00', '30000.00', '0.00');
INSERT INTO `sales` VALUES ('77', '4', '2015-11-23', 'nama kasir', '30000.00', '0', '0.00', '30000.00', '3.00');
INSERT INTO `sales` VALUES ('78', '4', '2015-11-23', 'nama kasir', '80000.00', '0', '0.00', '80000.00', '444.00');
INSERT INTO `sales` VALUES ('79', '2', '2015-11-23', 'nama kasir', '90000.00', '0', '0.00', '90000.00', '4543.00');
INSERT INTO `sales` VALUES ('80', '1', '2015-11-23', 'nama kasir', '60000.00', '0', '0.00', '60000.00', '33333.00');
INSERT INTO `sales` VALUES ('81', '2', '2015-11-23', 'nama kasir', '60000.00', '0', '0.00', '60000.00', '3333.00');
INSERT INTO `sales` VALUES ('82', '2', '2015-11-23', 'nama kasir', '60000.00', '0', '0.00', '60000.00', '3333.00');
INSERT INTO `sales` VALUES ('83', '2', '2015-11-23', 'nama kasir', '10000.00', '0', '0.00', '10000.00', '0.00');
INSERT INTO `sales` VALUES ('84', '3', '2015-11-23', 'nama kasir', '120000.00', '0', '0.00', '120000.00', '0.00');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
