/*
 Navicat Premium Data Transfer
 
 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 80039 (8.0.39)
 Source Host           : localhost:3306
 Source Schema         : train_travel_db
 
 Target Server Type    : MySQL
 Target Server Version : 80039 (8.0.39)
 File Encoding         : 65001
 
 Date: 10/11/2024 20:35:55
 */
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin', 'staff', 'client') NULL DEFAULT 'client',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email` ASC) USING BTREE,
  UNIQUE INDEX `idx_email`(`email` ASC) USING BTREE
);
-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users`
VALUES (
    1,
    'admin',
    'admin@train.com',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'admin',
    '2024-11-09 20:22:04',
    '2024-11-09 20:22:04'
  );
-- ----------------------------
-- Table structure for stations
-- ----------------------------
DROP TABLE IF EXISTS `stations`;
CREATE TABLE `stations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(512) NULL DEFAULT NULL,
  `name` varchar(512) NULL DEFAULT NULL,
  `city` varchar(512) NULL DEFAULT NULL,
  `cityname` varchar(512) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
);
-- ----------------------------
-- Records of stations
-- ----------------------------
INSERT INTO `stations`
VALUES (
    1,
    'TNK',
    'TANJUNG KARANG',
    'TANJUNG KARANG',
    'KOTA BANDAR LAMPUNG'
  );
INSERT INTO `stations`
VALUES (
    2,
    'LAR',
    'LABUAN RATU',
    'LABUAN RATU',
    'KOTA BANDAR LAMPUNG'
  );
INSERT INTO `stations`
VALUES (
    3,
    'RJS',
    'REJOSARI',
    'REJOSARI',
    'KABUPATEN LAMPUNG SELATAN'
  );
INSERT INTO `stations`
VALUES (
    4,
    'TGI',
    'TEGINENENG',
    'TEGINENENG',
    'KABUPATEN LAMPUNG UTARA'
  );
INSERT INTO `stations`
VALUES (
    5,
    'BKI',
    'BEKRI',
    'BEKRI',
    'KABUPATEN LAMPUNG TENGAH'
  );
INSERT INTO `stations`
VALUES (
    6,
    'HJP',
    'HAJI PEMANGGILAN',
    'HAJI PEMANGGILAN',
    'KABUPATEN LAMPUNG TENGAH'
  );
INSERT INTO `stations`
VALUES (
    7,
    'SLS',
    'SULUSUBAN',
    'SULUSUBAN',
    'KABUPATEN LAMPUNG TENGAH'
  );
INSERT INTO `stations`
VALUES (8, 'KB', 'KOTABUMI', 'KOTABUMI', 'KOTABUMI');
INSERT INTO `stations`
VALUES (
    9,
    'CEP',
    'CEMPAKA',
    'CEMPAKA',
    'KABUPATEN LAMPUNG UTARA'
  );
INSERT INTO `stations`
VALUES (
    10,
    'KTP',
    'KETAPANG',
    'KETAPANG',
    'KABUPATEN LAMPUNG UTARA'
  );
INSERT INTO `stations`
VALUES (
    11,
    'NRR',
    'NEGARA RATU',
    'NEGARA RATU',
    'KABUPATEN LAMPUNG UTARA'
  );
INSERT INTO `stations`
VALUES (
    12,
    'TLY',
    'TULUNG BUYUT',
    'TULUNG BUYUT',
    'KABUPATEN LAMPUNG UTARA'
  );
INSERT INTO `stations`
VALUES (
    13,
    'NGN',
    'NEGERIAGUNG',
    'NEGERIAGUNG',
    'KABUPATEN WAY KANAN'
  );
INSERT INTO `stations`
VALUES (
    14,
    'BBU',
    'BLAMBANGAN UMPU',
    'BLAMBANGAN UMPU',
    'KABUPATEN WAY KANAN'
  );
INSERT INTO `stations`
VALUES (
    15,
    'GHM',
    'GIHAM',
    'GIHAM',
    'KABUPATEN WAY KANAN'
  );
INSERT INTO `stations`
VALUES (
    16,
    'WAY',
    'WAYTUBA',
    'WAYTUBA',
    'KABUPATEN WAY KANAN'
  );
INSERT INTO `stations`
VALUES (17, 'MP', 'MARTAPURA', 'MARTAPURA', 'MARTAPURA');
INSERT INTO `stations`
VALUES (
    18,
    'PNW',
    'PENINJAWAN',
    'PENINJAWAN',
    'PENINJAWAN'
  );
INSERT INTO `stations`
VALUES (
    19,
    'KOP',
    'KOTA PADANG',
    'KOTA PADANG',
    'KABUPATEN MUARA ENIM'
  );
INSERT INTO `stations`
VALUES (
    20,
    'TI',
    'TEBING TINGGI',
    'TEBING TINGGI',
    'KABUPATEN EMPAT LAWANG'
  );
INSERT INTO `stations`
VALUES (21, 'LT', 'LAHAT', 'LAHAT', 'KABUPATEN LAHAT');
INSERT INTO `stations`
VALUES (
    22,
    'SCT',
    'SUKACINTA',
    'SUKACINTA',
    'KABUPATEN LAHAT'
  );
INSERT INTO `stations`
VALUES (
    23,
    'ME',
    'MUARA ENIM',
    'MUARA ENIM',
    'KABUPATEN MUARA ENIM'
  );
INSERT INTO `stations`
VALUES (
    24,
    'PBM',
    'PRABUMULIH',
    'PRABUMULIH',
    'KOTA PRABUMULIH'
  );
INSERT INTO `stations`
VALUES (
    25,
    'GB',
    'GOMBONG',
    'GOMBONG',
    'KABUPATEN KEBUMEN'
  );
INSERT INTO `stations`
VALUES (
    26,
    'KPT',
    'KERTAPATI',
    'KERTAPATI',
    'KOTA PALEMBANG'
  );
INSERT INTO `stations`
VALUES (
    27,
    'LLG',
    'LUBUK LINGGAU',
    'LUBUK LINGGAU',
    'KOTA LUBUKLINGGAU'
  );
INSERT INTO `stations`
VALUES (28, 'BTA', 'BATURAJA', 'BATURAJA', 'BATURAJA');
INSERT INTO `stations`
VALUES (
    29,
    'MRI',
    'MANGGARAI',
    'MANGGARAI',
    'KOTA JAKARTA PUSAT'
  );
INSERT INTO `stations`
VALUES (30, 'GMR', 'GAMBIR', 'GAMBIR', 'JAKARTA');
INSERT INTO `stations`
VALUES (
    31,
    'JUA',
    'JUANDA',
    'JUANDA',
    'KOTA JAKARTA PUSAT'
  );
INSERT INTO `stations`
VALUES (
    32,
    'JAKK',
    'JAKARTA KOTA',
    'JAKARTA KOTA',
    'JAKARTA'
  );
INSERT INTO `stations`
VALUES (
    33,
    'TGS',
    'TIGARAKSA',
    'TIGARAKSA',
    'KABUPATEN TANGERANG'
  );
INSERT INTO `stations`
VALUES (34, 'CLG', 'CILEGON', 'CILEGON', 'KOTA CILEGON');
INSERT INTO `stations`
VALUES (
    35,
    'KNN',
    'KRADENAN',
    'KRADENAN',
    'KABUPATEN GROBOGAN'
  );
INSERT INTO `stations`
VALUES (
    36,
    'JBN',
    'JAMBON',
    'JAMBON',
    'KABUPATEN GROBOGAN'
  );
INSERT INTO `stations`
VALUES (37, 'LW', 'LAWANG', 'LAWANG', 'KOTA MALANG');
INSERT INTO `stations`
VALUES (38, 'ML', 'MALANG', 'MALANG', 'KOTA MALANG');
INSERT INTO `stations`
VALUES (
    39,
    'MLK',
    'MALANG KOTA LAMA',
    'MALANG KOTA LAMA',
    'KOTA MALANG'
  );
INSERT INTO `stations`
VALUES (40, 'KPN', 'KEPANJEN', 'KEPANJEN', 'KOTA MALANG');
INSERT INTO `stations`
VALUES (
    41,
    'SBP',
    'SUMBERPUCUNG',
    'SUMBERPUCUNG',
    'KOTA MALANG'
  );
INSERT INTO `stations`
VALUES (42, 'KSB', 'KESAMBEN', 'KESAMBEN', 'KOTA BLITAR');
INSERT INTO `stations`
VALUES (43, 'WG', 'WLINGI', 'WLINGI', 'KOTA BLITAR');
INSERT INTO `stations`
VALUES (44, 'BL', 'BLITAR', 'BLITAR', 'KOTA BLITAR');
INSERT INTO `stations`
VALUES (
    45,
    'NT',
    'NGUNUT',
    'NGUNUT',
    'KABUPATEN TULUNGAGUNG'
  );
INSERT INTO `stations`
VALUES (
    46,
    'TA',
    'TULUNGAGUNG',
    'TULUNGAGUNG',
    'KABUPATEN TULUNGAGUNG'
  );
INSERT INTO `stations`
VALUES (
    47,
    'NJG',
    'NGUJANG',
    'NGUJANG',
    'KABUPATEN TULUNGAGUNG'
  );
INSERT INTO `stations`
VALUES (48, 'KD', 'KEDIRI', 'KEDIRI', 'KOTA KEDIRI');
INSERT INTO `stations`
VALUES (
    49,
    'SI',
    'SUKABUMI',
    'SUKABUMI',
    'KOTA SUKABUMI'
  );
INSERT INTO `stations`
VALUES (50, 'PSE', 'PASARSENEN', 'PASARSENEN', 'JAKARTA');
INSERT INTO `stations`
VALUES (51, 'JNG', 'JATINEGARA', 'JATINEGARA', 'JAKARTA');
INSERT INTO `stations`
VALUES (
    52,
    'GM',
    'GUMILIR',
    'GUMILIR',
    'KABUPATEN CILACAP'
  );
INSERT INTO `stations`
VALUES (
    53,
    'CP',
    'CILACAP',
    'CILACAP',
    'KABUPATEN CILACAP'
  );
INSERT INTO `stations`
VALUES (
    54,
    'DMR',
    'DOLOKMERANGIR',
    'DOLOKMERANGIR',
    'KABUPATEN SIMALUNGUN'
  );
INSERT INTO `stations`
VALUES (
    55,
    'LTD',
    'LAUT TADOR',
    'LAUT TADOR',
    'KABUPATEN BATU BARA'
  );
INSERT INTO `stations`
VALUES (
    56,
    'PRA',
    'PERLANAAN',
    'PERLANAAN',
    'KABUPATEN SIMALUNGUN'
  );
INSERT INTO `stations`
VALUES (
    57,
    'LMP',
    'LIMAPULUH',
    'LIMAPULUH',
    'KABUPATEN SIMALUNGUN'
  );
INSERT INTO `stations`
VALUES (
    58,
    'SBJ',
    'SEI BEJANGKAR',
    'SEI BEJANGKAR',
    'KABUPATEN BATU BARA'
  );
INSERT INTO `stations`
VALUES (
    59,
    'KIS',
    'KISARAN',
    'KISARAN',
    'KABUPATEN ASAHAN'
  );
INSERT INTO `stations`
VALUES (
    60,
    'PUR',
    'PULURAJA',
    'PULURAJA',
    'KABUPATEN ASAHAN'
  );
INSERT INTO `stations`
VALUES (
    61,
    'AKB',
    'AEKLOBA',
    'AEKLOBA',
    'KABUPATEN ASAHAN'
  );
INSERT INTO `stations`
VALUES (
    62,
    'MBM',
    'MAMBANGMUDA',
    'MAMBANGMUDA',
    'KABUPATEN LABUHAN BATU'
  );
INSERT INTO `stations`
VALUES (
    63,
    'PME',
    'PAMINGKE',
    'PAMINGKE',
    'KABUPATEN LABUHANBATU UTARA'
  );
INSERT INTO `stations`
VALUES (
    64,
    'PHA',
    'PADANGHALABAN',
    'PADANGHALABAN',
    'KABUPATEN LABUHAN BATU'
  );
INSERT INTO `stations`
VALUES (
    65,
    'MBU',
    'MARBAU',
    'MARBAU',
    'KABUPATEN LABUHAN BATU'
  );
INSERT INTO `stations`
VALUES (
    66,
    'TNB',
    'TANJUNGBALAI',
    'TANJUNGBALAI',
    'KOTA TANJUNG BALAI'
  );
INSERT INTO `stations`
VALUES (
    67,
    'TBI',
    'TEBING TINGGI',
    'TEBING TINGGI',
    'KOTA TEBING TINGGI'
  );
INSERT INTO `stations`
VALUES (
    68,
    'RPH',
    'RAMPAH',
    'RAMPAH',
    'KOTA TEBING TINGGI'
  );
INSERT INTO `stations`
VALUES (
    69,
    'PBA',
    'PERBAUNGAN',
    'PERBAUNGAN',
    'KABUPATEN SERDANG BEDAGAI'
  );
INSERT INTO `stations`
VALUES (
    70,
    'LBP',
    'LUBUKPAKAM',
    'LUBUKPAKAM',
    'KABUPATEN DELI SERDANG'
  );
INSERT INTO `stations`
VALUES (
    71,
    'ARB',
    'ARASKABU',
    'ARASKABU',
    'KABUPATEN DELI SERDANG'
  );
INSERT INTO `stations`
VALUES (
    72,
    'BTK',
    'BATANGKUIS',
    'BATANGKUIS',
    'KABUPATEN DELI SERDANG'
  );
INSERT INTO `stations`
VALUES (
    73,
    'BAP',
    'BANDARHALIPAH',
    'BANDARHALIPAH',
    'KABUPATEN DELI SERDANG'
  );
INSERT INTO `stations`
VALUES (74, 'MDN', 'MEDAN', 'MEDAN', 'KOTA MEDAN');
INSERT INTO `stations`
VALUES (
    75,
    'RAP',
    'RANTAUPRAPAT',
    'RANTAUPRAPAT',
    'KABUPATEN LABUHAN BATU'
  );
INSERT INTO `stations`
VALUES (
    76,
    'SIR',
    'SIANTAR',
    'SIANTAR',
    'KOTA PEMATANG SIANTAR'
  );
INSERT INTO `stations`
VALUES (
    77,
    'KAC',
    'KIARACONDONG',
    'KIARACONDONG',
    'KOTA BANDUNG'
  );
INSERT INTO `stations`
VALUES (78, 'BD', 'BANDUNG', 'BANDUNG', 'KOTA BANDUNG');
INSERT INTO `stations`
VALUES (79, 'CMI', 'CIMAHI', 'CIMAHI', 'KOTA CIMAHI');
INSERT INTO `stations`
VALUES (
    80,
    'PLD',
    'PLERED',
    'PLERED',
    'KABUPATEN PURWAKARTA'
  );
INSERT INTO `stations`
VALUES (
    81,
    'PWK',
    'PURWAKARTA',
    'PURWAKARTA',
    'KABUPATEN PURWAKARTA'
  );
INSERT INTO `stations`
VALUES (
    82,
    'CKP',
    'CIKAMPEK',
    'CIKAMPEK',
    'KABUPATEN KARAWANG'
  );
INSERT INTO `stations`
VALUES (
    83,
    'KW',
    'KARAWANG',
    'KARAWANG',
    'KABUPATEN KARAWANG'
  );
INSERT INTO `stations`
VALUES (
    84,
    'CKR',
    'CIKARANG',
    'CIKARANG',
    'KABUPATEN BEKASI'
  );
INSERT INTO `stations`
VALUES (85, 'BKS', 'BEKASI', 'BEKASI', 'KOTA BEKASI');
INSERT INTO `stations`
VALUES (86, 'BJR', 'BANJAR', 'BANJAR', 'KOTA BANJAR');
INSERT INTO `stations`
VALUES (87, 'CI', 'CIAMIS', 'CIAMIS', 'KABUPATEN CIAMIS');
INSERT INTO `stations`
VALUES (
    88,
    'TSM',
    'TASIKMALAYA',
    'TASIKMALAYA',
    'KOTA TASIKMALAYA'
  );
INSERT INTO `stations`
VALUES (
    89,
    'CPD',
    'CIPEUNDEUY',
    'CIPEUNDEUY',
    'KABUPATEN GARUT'
  );
INSERT INTO `stations`
VALUES (90, 'CB', 'CIBATU', 'CIBATU', 'KABUPATEN GARUT');
INSERT INTO `stations`
VALUES (91, 'LL', 'LELES', 'LELES', 'KABUPATEN GARUT');
INSERT INTO `stations`
VALUES (
    92,
    'CCL',
    'CICALENGKA',
    'CICALENGKA',
    'KABUPATEN BANDUNG'
  );
INSERT INTO `stations`
VALUES (
    93,
    'KTA',
    'KUTOARJO',
    'KUTOARJO',
    'KABUPATEN PURWOREJO'
  );
INSERT INTO `stations`
VALUES (
    94,
    'JN',
    'JENAR',
    'JENAR',
    'KABUPATEN PURWOREJO'
  );
INSERT INTO `stations`
VALUES (95, 'WJ', 'WOJO', 'WOJO', 'KABUPATEN PURWOREJO');
INSERT INTO `stations`
VALUES (
    96,
    'KDG',
    'KEDUNDANG',
    'KEDUNDANG',
    'KABUPATEN KULON PROGO'
  );
INSERT INTO `stations`
VALUES (97, 'WT', 'WATES', 'WATES', 'KOTA YOGYAKARTA');
INSERT INTO `stations`
VALUES (
    98,
    'YK',
    'YOGYAKARTA',
    'YOGYAKARTA',
    'KOTA YOGYAKARTA'
  );
INSERT INTO `stations`
VALUES (
    99,
    'LPN',
    'LEMPUYANGAN',
    'LEMPUYANGAN',
    'KOTA YOGYAKARTA'
  );
INSERT INTO `stations`
VALUES (
    100,
    'KT',
    'KLATEN',
    'KLATEN',
    'KABUPATEN KLATEN'
  );
INSERT INTO `stations`
VALUES (
    101,
    'PWS',
    'PURWOSARI',
    'PURWOSARI',
    'KOTA SOLO'
  );
INSERT INTO `stations`
VALUES (
    102,
    'SLO',
    'SOLO BALAPAN',
    'SOLO BALAPAN',
    'KOTA SOLO'
  );
INSERT INTO `stations`
VALUES (103, 'SLM', 'SALEM', 'SALEM', 'KABUPATEN SRAGEN');
INSERT INTO `stations`
VALUES (
    104,
    'GD',
    'GUNDIH',
    'GUNDIH',
    'KABUPATEN GROBOGAN'
  );
INSERT INTO `stations`
VALUES (
    105,
    'TW',
    'TELAWA',
    'TELAWA',
    'KABUPATEN BOYOLALI'
  );
INSERT INTO `stations`
VALUES (
    106,
    'KEJ',
    'KEDUNGJATI',
    'KEDUNGJATI',
    'KABUPATEN GROBOGAN'
  );
INSERT INTO `stations`
VALUES (
    107,
    'ATA',
    'ALASTUA',
    'ALASTUA',
    'KOTA SEMARANG'
  );
INSERT INTO `stations`
VALUES (
    108,
    'SMT',
    'SEMARANG TAWANG BANK JATENG',
    'SEMARANG TAWANG BANK JATENG',
    'KOTA SEMARANG'
  );
INSERT INTO `stations`
VALUES (
    109,
    'SMC',
    'SEMARANG PONCOL',
    'SEMARANG PONCOL',
    'KOTA SEMARANG'
  );
INSERT INTO `stations`
VALUES (
    110,
    'WLR',
    'WELERI',
    'WELERI',
    'KABUPATEN KENDAL'
  );
INSERT INTO `stations`
VALUES (
    111,
    'BTG',
    'BATANG',
    'BATANG',
    'KOTA PEKALONGAN'
  );
INSERT INTO `stations`
VALUES (
    112,
    'PK',
    'PEKALONGAN',
    'PEKALONGAN',
    'KOTA PEKALONGAN'
  );
INSERT INTO `stations`
VALUES (
    113,
    'PML',
    'PEMALANG',
    'PEMALANG',
    'KOTA PEMALANG'
  );
INSERT INTO `stations`
VALUES (
    114,
    'PML',
    'PEMALANG',
    'PEMALANG',
    'KOTA PEMALANG'
  );
INSERT INTO `stations`
VALUES (115, 'SLW', 'SLAWI', 'SLAWI', 'KOTA TEGAL');
INSERT INTO `stations`
VALUES (116, 'TG', 'TEGAL', 'TEGAL', 'KOTA TEGAL');
INSERT INTO `stations`
VALUES (
    117,
    'BB',
    'BREBES',
    'BREBES',
    'KABUPATEN BREBES'
  );
INSERT INTO `stations`
VALUES (
    118,
    'TGN',
    'TANJUNG',
    'TANJUNG',
    'KABUPATEN BREBES'
  );
INSERT INTO `stations`
VALUES (
    119,
    'LOS',
    'LOSARI',
    'LOSARI',
    'KABUPATEN CIREBON'
  );
INSERT INTO `stations`
VALUES (
    120,
    'BBK',
    'BABAKAN',
    'BABAKAN',
    'KABUPATEN CIREBON'
  );
INSERT INTO `stations`
VALUES (
    121,
    'CLD',
    'CILEDUG',
    'CILEDUG',
    'KABUPATEN CIREBON'
  );
INSERT INTO `stations`
VALUES (
    122,
    'PGB',
    'PEGADENBARU',
    'PEGADENBARU',
    'KABUPATEN SUBANG'
  );
INSERT INTO `stations`
VALUES (
    123,
    'HGL',
    'HAURGEULIS',
    'HAURGEULIS',
    'KABUPATEN INDRAMAYU'
  );
INSERT INTO `stations`
VALUES (
    124,
    'TIS',
    'TERISI',
    'TERISI',
    'KABUPATEN INDRAMAYU'
  );
INSERT INTO `stations`
VALUES (
    125,
    'JTB',
    'JATIBARANG',
    'JATIBARANG',
    'KABUPATEN INDRAMAYU'
  );
INSERT INTO `stations`
VALUES (
    126,
    'AWN',
    'ARJAWINANGUN',
    'ARJAWINANGUN',
    'KABUPATEN CIREBON'
  );
INSERT INTO `stations`
VALUES (127, 'CN', 'CIREBON', 'CIREBON', 'KOTA CIREBON');
INSERT INTO `stations`
VALUES (
    128,
    'CNP',
    'CIREBON PRUJAKAN',
    'CIREBON PRUJAKAN',
    'KOTA CIREBON'
  );
INSERT INTO `stations`
VALUES (
    129,
    'KGG',
    'KETANGGUNGAN',
    'KETANGGUNGAN',
    'KABUPATEN BREBES'
  );
INSERT INTO `stations`
VALUES (130, 'PPK', 'PRUPUK', 'PRUPUK', 'KOTA TEGAL');
INSERT INTO `stations`
VALUES (
    131,
    'BMA',
    'BUMIAYU',
    'BUMIAYU',
    'KABUPATEN BREBES'
  );
INSERT INTO `stations`
VALUES (
    132,
    'PWT',
    'PURWOKERTO',
    'PURWOKERTO',
    'PURWOKERTO'
  );
INSERT INTO `stations`
VALUES (133, 'MA', 'MAOS', 'MAOS', 'KABUPATEN CILACAP');
INSERT INTO `stations`
VALUES (
    134,
    'JRL',
    'JERUKLEGI',
    'JERUKLEGI',
    'KABUPATEN CILACAP'
  );
INSERT INTO `stations`
VALUES (
    135,
    'SDR',
    'SIDAREJA',
    'SIDAREJA',
    'KABUPATEN CILACAP'
  );
INSERT INTO `stations`
VALUES (
    136,
    'GDM',
    'GANDRUNGMANGUN',
    'GANDRUNGMANGUN',
    'KABUPATEN CILACAP'
  );
INSERT INTO `stations`
VALUES (137, 'CSA', 'CISAAT', 'CISAAT', 'KOTA SUKABUMI');
INSERT INTO `stations`
VALUES (
    138,
    'KE',
    'KARANGTENGAH',
    'KARANGTENGAH',
    'KOTA SUKABUMI'
  );
INSERT INTO `stations`
VALUES (
    139,
    'CBD',
    'CIBADAK',
    'CIBADAK',
    'KOTA SUKABUMI'
  );
INSERT INTO `stations`
VALUES (
    140,
    'PRK',
    'PARUNG KUDA',
    'PARUNG KUDA',
    'KOTA SUKABUMI'
  );
INSERT INTO `stations`
VALUES (
    141,
    'CCR',
    'CICURUG',
    'CICURUG',
    'KOTA SUKABUMI'
  );
INSERT INTO `stations`
VALUES (
    142,
    'CGB',
    'CIGOMBONG',
    'CIGOMBONG',
    'KABUPATEN BOGOR'
  );
INSERT INTO `stations`
VALUES (
    143,
    'MSG',
    'MASENG',
    'MASENG',
    'KABUPATEN BOGOR'
  );
INSERT INTO `stations`
VALUES (
    144,
    'BTT',
    'BATUTULIS',
    'BATUTULIS',
    'KABUPATEN BOGOR'
  );
INSERT INTO `stations`
VALUES (145, 'BOO', 'BOGOR', 'BOGOR', 'KOTA BOGOR');
INSERT INTO `stations`
VALUES (
    146,
    'KYA',
    'KROYA',
    'KROYA',
    'KABUPATEN CILACAP'
  );
INSERT INTO `stations`
VALUES (
    147,
    'SPH',
    'SUMPIUH',
    'SUMPIUH',
    'KABUPATEN BANYUMAS'
  );
INSERT INTO `stations`
VALUES (
    148,
    'GB',
    'GOMBONG',
    'GOMBONG',
    'KABUPATEN KEBUMEN'
  );
INSERT INTO `stations`
VALUES (
    149,
    'KA',
    'KARANGANYAR',
    'KARANGANYAR',
    'KABUPATEN KEBUMEN'
  );
INSERT INTO `stations`
VALUES (
    150,
    'KM',
    'KEBUMEN',
    'KEBUMEN',
    'KABUPATEN KEBUMEN'
  );
INSERT INTO `stations`
VALUES (
    151,
    'KWN',
    'KUTOWINANGUN',
    'KUTOWINANGUN',
    'KABUPATEN KEBUMEN'
  );
INSERT INTO `stations`
VALUES (
    152,
    'GBN',
    'GAMBRINGAN',
    'GAMBRINGAN',
    'KABUPATEN GROBOGAN'
  );
INSERT INTO `stations`
VALUES (
    153,
    'NBO',
    'NGROMBO',
    'NGROMBO',
    'KABUPATEN GROBOGAN'
  );
INSERT INTO `stations`
VALUES (154, 'WR', 'WARU', 'WARU', 'SIDOARJO');
INSERT INTO `stations`
VALUES (155, 'KRN', 'KRIAN', 'KRIAN', 'SIDOARJO');
INSERT INTO `stations`
VALUES (
    156,
    'MR',
    'MOJOKERTO',
    'MOJOKERTO',
    'KOTA MOJOKERTO'
  );
INSERT INTO `stations`
VALUES (
    157,
    'CRM',
    'CURAHMALANG',
    'CURAHMALANG',
    'KABUPATEN JOMBANG'
  );
INSERT INTO `stations`
VALUES (
    158,
    'JG',
    'JOMBANG',
    'JOMBANG',
    'KABUPATEN JOMBANG'
  );
INSERT INTO `stations`
VALUES (
    159,
    'SMB',
    'SEMBUNG',
    'SEMBUNG',
    'KABUPATEN JOMBANG'
  );
INSERT INTO `stations`
VALUES (
    160,
    'KTS',
    'KERTOSONO',
    'KERTOSONO',
    'KABUPATEN NGANJUK'
  );
INSERT INTO `stations`
VALUES (
    161,
    'NJ',
    'NGANJUK',
    'NGANJUK',
    'KABUPATEN NGANJUK'
  );
INSERT INTO `stations`
VALUES (162, 'CRB', 'CARUBAN', 'CARUBAN', 'KOTA MADIUN');
INSERT INTO `stations`
VALUES (163, 'MN', 'MADIUN', 'MADIUN', 'KOTA MADIUN');
INSERT INTO `stations`
VALUES (164, 'GG', 'GENENG', 'GENENG', 'KABUPATEN NGAWI');
INSERT INTO `stations`
VALUES (165, 'PA', 'PARON', 'PARON', 'KABUPATEN NGAWI');
INSERT INTO `stations`
VALUES (
    166,
    'KG',
    'KEDUNGGALAR',
    'KEDUNGGALAR',
    'KABUPATEN NGAWI'
  );
INSERT INTO `stations`
VALUES (
    167,
    'WK',
    'WALIKUKUN',
    'WALIKUKUN',
    'KABUPATEN NGAWI'
  );
INSERT INTO `stations`
VALUES (
    168,
    'SR',
    'SRAGEN',
    'SRAGEN',
    'KABUPATEN SRAGEN'
  );
INSERT INTO `stations`
VALUES (
    169,
    'SK',
    'SOLOJEBRES',
    'SOLOJEBRES',
    'KOTA SOLO'
  );
INSERT INTO `stations`
VALUES (
    170,
    'RGP',
    'ROGOJAMPI',
    'ROGOJAMPI',
    'KABUPATEN BANYUWANGI'
  );
INSERT INTO `stations`
VALUES (
    171,
    'TGR',
    'TEMUGURUH',
    'TEMUGURUH',
    'KABUPATEN BANYUWANGI'
  );
INSERT INTO `stations`
VALUES (
    172,
    'KSL',
    'KALISETAIL',
    'KALISETAIL',
    'KABUPATEN BANYUWANGI'
  );
INSERT INTO `stations`
VALUES (
    173,
    'SWD',
    'SUMBER WADUNG',
    'SUMBER WADUNG',
    'KABUPATEN BANYUWANGI'
  );
INSERT INTO `stations`
VALUES (
    174,
    'GLM',
    'GLENMORE',
    'GLENMORE',
    'KABUPATEN BANYUWANGI'
  );
INSERT INTO `stations`
VALUES (
    175,
    'KBR',
    'KALIBARU',
    'KALIBARU',
    'KABUPATEN BANYUWANGI'
  );
INSERT INTO `stations`
VALUES (
    176,
    'KLT',
    'KALISAT',
    'KALISAT',
    'KABUPATEN JEMBER'
  );
INSERT INTO `stations`
VALUES (
    177,
    'AJ',
    'ARJASA',
    'ARJASA',
    'KABUPATEN JEMBER'
  );
INSERT INTO `stations`
VALUES (
    178,
    'JR',
    'JEMBER',
    'JEMBER',
    'KABUPATEN JEMBER'
  );
INSERT INTO `stations`
VALUES (
    179,
    'RBP',
    'RAMBIPUJI',
    'RAMBIPUJI',
    'KABUPATEN JEMBER'
  );
INSERT INTO `stations`
VALUES (
    180,
    'TGL',
    'TANGGUL',
    'TANGGUL',
    'KABUPATEN JEMBER'
  );
INSERT INTO `stations`
VALUES (
    181,
    'JTR',
    'JATIROTO',
    'JATIROTO',
    'KABUPATEN LUMAJANG'
  );
INSERT INTO `stations`
VALUES (
    182,
    'KK',
    'KLAKAH',
    'KLAKAH',
    'KABUPATEN LUMAJANG'
  );
INSERT INTO `stations`
VALUES (
    183,
    'RN',
    'RANUYOSO',
    'RANUYOSO',
    'KABUPATEN LUMAJANG'
  );
INSERT INTO `stations`
VALUES (
    184,
    'PB',
    'PROBOLINGGO',
    'PROBOLINGGO',
    'KABUPATEN PROBOLINGGO'
  );
INSERT INTO `stations`
VALUES (
    185,
    'PS',
    'PASURUAN',
    'PASURUAN',
    'KOTA PASURUAN'
  );
INSERT INTO `stations`
VALUES (186, 'BG', 'BANGIL', 'BANGIL', 'KOTA PASURUAN');
INSERT INTO `stations`
VALUES (187, 'SDA', 'SIDOARJO', 'SIDOARJO', 'SIDOARJO');
INSERT INTO `stations`
VALUES (
    188,
    'WO',
    'WONOKROMO',
    'WONOKROMO',
    'KOTA SURABAYA'
  );
INSERT INTO `stations`
VALUES (
    189,
    'SGU',
    'SURABAYA GUBENG',
    'SURABAYA GUBENG',
    'KOTA SURABAYA'
  );
INSERT INTO `stations`
VALUES (
    190,
    'SBI',
    'SURABAYA PASAR TURI',
    'SURABAYA PASAR TURI',
    'KOTA SURABAYA'
  );
INSERT INTO `stations`
VALUES (
    191,
    'LMG',
    'LAMONGAN',
    'LAMONGAN',
    'KABUPATEN LAMONGAN'
  );
INSERT INTO `stations`
VALUES (
    192,
    'BJ',
    'BOJONEGORO',
    'BOJONEGORO',
    'KABUPATEN BOJONEGORO'
  );
INSERT INTO `stations`
VALUES (193, 'CU', 'CEPU', 'CEPU', 'KABUPATEN BLORA');
INSERT INTO `stations`
VALUES (194, 'WDU', 'WADU', 'WADU', 'KABUPATEN BLORA');
INSERT INTO `stations`
VALUES (
    195,
    'RBG',
    'RANDUBLATUNG',
    'RANDUBLATUNG',
    'KABUPATEN BLORA'
  );
INSERT INTO `stations`
VALUES (
    196,
    'DPL',
    'DOPLANG',
    'DOPLANG',
    'KABUPATEN BLORA'
  );
INSERT INTO `stations`
VALUES (197, 'MAG', 'MAGETAN', 'MAGETAN', 'MAGETAN');
INSERT INTO `stations`
VALUES (
    198,
    'KTG',
    'KETAPANG',
    'KETAPANG',
    'KABUPATEN BANYUWANGI'
  );
INSERT INTO `stations`
VALUES (
    199,
    'BBT',
    'BABAT',
    'BABAT',
    'KABUPATEN LAMONGAN'
  );
INSERT INTO `stations`
VALUES (
    200,
    'LEC',
    'LECES',
    'LECES',
    'KABUPATEN PROBOLINGGO'
  );
INSERT INTO `stations`
VALUES (201, 'PDX', 'PADANGX', 'PADANGX', 'KOTA PADANG');
INSERT INTO `stations`
VALUES (
    202,
    'NJG',
    'NGUJANG',
    'NGUJANG',
    'KABUPATEN TULUNGAGUNG'
  );
INSERT INTO `stations`
VALUES (
    203,
    'BOP',
    'BOGOR PALEDANG',
    'BOGOR PALEDANG',
    'KOTA BOGOR'
  );
INSERT INTO `stations`
VALUES (
    204,
    'SGT',
    'SUNGAI TUHA',
    'SUNGAI TUHA',
    'MARTAPURA'
  );
INSERT INTO `stations`
VALUES (
    205,
    'WAP',
    'WAY PISANG',
    'WAY PISANG',
    'KABUPATEN WAY KANAN'
  );
INSERT INTO `stations`
VALUES (206, 'NGW', 'NGAWI', 'NGAWI', 'KABUPATEN NGAWI');
INSERT INTO `stations`
VALUES (
    207,
    'BWI',
    'BANYUWANGI KOTA',
    'BANYUWANGI KOTA',
    'KABUPATEN BANYUWANGI'
  );
INSERT INTO `stations`
VALUES (208, 'GRT', 'GARUT', 'GARUT', 'KABUPATEN GARUT');
-- ----------------------------
-- Table structure for routes
-- ----------------------------
DROP TABLE IF EXISTS `routes`;
CREATE TABLE `routes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `source` varchar(255) NULL DEFAULT NULL,
  `destination` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
);
-- ----------------------------
-- Records of routes
-- ----------------------------
INSERT INTO `routes`
VALUES (1, 'PASARSENEN', 'JATINEGARA');
INSERT INTO `routes`
VALUES (2, 'JATINEGARA', 'PASARSENEN');
-- ----------------------------
-- Table structure for times
-- ----------------------------
DROP TABLE IF EXISTS `times`;
CREATE TABLE `times` (
  `id` int NOT NULL AUTO_INCREMENT,
  `arrival` time NULL DEFAULT NULL,
  `departure` time NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
);
-- ----------------------------
-- Records of times
-- ----------------------------
INSERT INTO `times`
VALUES (1, '04:00:00', '06:00:00');
INSERT INTO `times`
VALUES (2, '06:00:00', '08:00:00');
INSERT INTO `times`
VALUES (3, '08:00:00', '10:00:00');
INSERT INTO `times`
VALUES (4, '10:00:00', '12:00:00');
INSERT INTO `times`
VALUES (5, '12:00:00', '14:00:00');
INSERT INTO `times`
VALUES (6, '14:00:00', '16:00:00');
INSERT INTO `times`
VALUES (7, '16:00:00', '18:00:00');
INSERT INTO `times`
VALUES (8, '18:00:00', '20:00:00');
INSERT INTO `times`
VALUES (9, '20:00:00', '22:00:00');
INSERT INTO `times`
VALUES (10, '22:00:00', '00:00:00');
-- ----------------------------
-- Table structure for trains
-- ----------------------------
DROP TABLE IF EXISTS `trains`;
CREATE TABLE `trains` (
  `id` int NOT NULL AUTO_INCREMENT,
  `route_id` int NOT NULL,
  `time_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` varchar(100) NULL DEFAULT NULL,
  `capacity` int NOT NULL DEFAULT 100,
  `carriages` int NOT NULL DEFAULT 2,
  `price` decimal(10, 2) NOT NULL,
  `status` enum('active', 'cancelled', 'completed') NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `trains_ibfk_1`(`route_id` ASC) USING BTREE,
  INDEX `trains_ibfk_2`(`time_id` ASC) USING BTREE,
  CONSTRAINT `trains_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `trains_ibfk_2` FOREIGN KEY (`time_id`) REFERENCES `times` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);
-- ----------------------------
-- Records of trains
-- ----------------------------
-- ----------------------------
-- Table structure for seats
-- ----------------------------
DROP TABLE IF EXISTS `seats`;
CREATE TABLE `seats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `train_id` int NOT NULL,
  `carriage_number` int NOT NULL,
  `seat_number` varchar(10) NOT NULL,
  `seat_type` enum('window', 'aisle', 'middle') NOT NULL,
  `is_available` tinyint(1) NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `unique_seat`(
    `train_id` ASC,
    `carriage_number` ASC,
    `seat_number` ASC
  ) USING BTREE,
  CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);
-- ----------------------------
-- Records of seats
-- ----------------------------
-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `train_id` int NOT NULL,
  `seat_id` int NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `passenger_id_number` varchar(50) NOT NULL,
  `status` enum('pending', 'paid', 'cancelled') NULL DEFAULT 'pending',
  `total_amount` decimal(10, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `orders_ibfk_1`(`user_id` ASC) USING BTREE,
  INDEX `orders_ibfk_2`(`train_id` ASC) USING BTREE,
  INDEX `orders_ibfk_3`(`seat_id` ASC) USING BTREE,
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`train_id`) REFERENCES `trains` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);
-- ----------------------------
-- Records of orders
-- ----------------------------
-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `amount` decimal(10, 2) NOT NULL,
  `payment_method` enum('credit_card', 'bank_transfer', 'e_wallet') NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `status` enum('pending', 'success', 'failed') NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `payments_ibfk_1`(`order_id` ASC) USING BTREE,
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);
-- ----------------------------
-- Records of payments
-- ----------------------------
SET FOREIGN_KEY_CHECKS = 1;