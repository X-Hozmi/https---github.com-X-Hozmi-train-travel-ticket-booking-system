SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;
-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_number` int NULL DEFAULT NULL,
  `name` varchar(255) NULL DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin', 'staff', 'client') NULL DEFAULT 'client',
  `is_deleted` tinyint NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `refresh_token` text NULL,
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
    1234567890,
    'New Admin',
    'admin',
    'newAdmin.email@email.com',
    '$2y$10$PoMHXX4wUlIjZET/KAP1ROcsScCoUc.nS2veEtO2FnGVLNfkl9AOW',
    'admin',
    0,
    '2024-11-09 20:22:04',
    '2024-11-17 19:03:22',
    NULL
  );
INSERT INTO `users`
VALUES (
    4,
    123456789,
    'Jane Doe',
    'janedoe',
    'jane.doe@email.com',
    '$2y$10$aCONcckUNysw1.yxWRmPcu1wsqu93Jzq2IHylrCFDmA3KPPJSXhxS',
    'client',
    0,
    '2024-11-17 16:52:12',
    '2024-11-17 18:27:22',
    'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjo0LCJpYXQiOjE3MzE4NDI4NDIsImV4cCI6MTczNDQzNDg0MiwidHlwZSI6InJlZnJlc2gifQ.txDdJy_9W4GS1OTQgP1uiNUkROEJr9AO6z5bHLSlpQg'
  );
-- ----------------------------
-- Table structure for routes
-- ----------------------------
DROP TABLE IF EXISTS `routes`;
CREATE TABLE `routes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `source` varchar(255) NULL DEFAULT NULL,
  `destination` varchar(255) NULL DEFAULT NULL,
  `is_deleted` tinyint NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;
-- ----------------------------
-- Records of routes
-- ----------------------------
INSERT INTO `routes`
VALUES (1, 'PASARSENEN', 'JATINEGARA', 0, NULL, NULL);
INSERT INTO `routes`
VALUES (2, 'JATINEGARA', 'PASARSENEN', 0, NULL, NULL);
-- ----------------------------
-- Table structure for stations
-- ----------------------------
DROP TABLE IF EXISTS `stations`;
CREATE TABLE `stations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(512) NULL DEFAULT NULL,
  `name` varchar(512) NULL DEFAULT NULL,
  `city` varchar(512) NULL DEFAULT NULL,
  `city_name` varchar(512) NULL DEFAULT NULL,
  `is_deleted` tinyint NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 209 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;
-- ----------------------------
-- Records of stations
-- ----------------------------
INSERT INTO `stations`
VALUES (
    1,
    'TNK',
    'TANJUNG KARANG',
    'TANJUNG KARANG',
    'KOTA BANDAR LAMPUNG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    2,
    'LAR',
    'LABUAN RATU',
    'LABUAN RATU',
    'KOTA BANDAR LAMPUNG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    3,
    'RJS',
    'REJOSARI',
    'REJOSARI',
    'KABUPATEN LAMPUNG SELATAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    4,
    'TGI',
    'TEGINENENG',
    'TEGINENENG',
    'KABUPATEN LAMPUNG UTARA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    5,
    'BKI',
    'BEKRI',
    'BEKRI',
    'KABUPATEN LAMPUNG TENGAH',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    6,
    'HJP',
    'HAJI PEMANGGILAN',
    'HAJI PEMANGGILAN',
    'KABUPATEN LAMPUNG TENGAH',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    7,
    'SLS',
    'SULUSUBAN',
    'SULUSUBAN',
    'KABUPATEN LAMPUNG TENGAH',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    8,
    'KB',
    'KOTABUMI',
    'KOTABUMI',
    'KOTABUMI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    9,
    'CEP',
    'CEMPAKA',
    'CEMPAKA',
    'KABUPATEN LAMPUNG UTARA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    10,
    'KTP',
    'KETAPANG',
    'KETAPANG',
    'KABUPATEN LAMPUNG UTARA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    11,
    'NRR',
    'NEGARA RATU',
    'NEGARA RATU',
    'KABUPATEN LAMPUNG UTARA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    12,
    'TLY',
    'TULUNG BUYUT',
    'TULUNG BUYUT',
    'KABUPATEN LAMPUNG UTARA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    13,
    'NGN',
    'NEGERIAGUNG',
    'NEGERIAGUNG',
    'KABUPATEN WAY KANAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    14,
    'BBU',
    'BLAMBANGAN UMPU',
    'BLAMBANGAN UMPU',
    'KABUPATEN WAY KANAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    15,
    'GHM',
    'GIHAM',
    'GIHAM',
    'KABUPATEN WAY KANAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    16,
    'WAY',
    'WAYTUBA',
    'WAYTUBA',
    'KABUPATEN WAY KANAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    17,
    'MP',
    'MARTAPURA',
    'MARTAPURA',
    'MARTAPURA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    18,
    'PNW',
    'PENINJAWAN',
    'PENINJAWAN',
    'PENINJAWAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    19,
    'KOP',
    'KOTA PADANG',
    'KOTA PADANG',
    'KABUPATEN MUARA ENIM',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    20,
    'TI',
    'TEBING TINGGI',
    'TEBING TINGGI',
    'KABUPATEN EMPAT LAWANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    21,
    'LT',
    'LAHAT',
    'LAHAT',
    'KABUPATEN LAHAT',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    22,
    'SCT',
    'SUKACINTA',
    'SUKACINTA',
    'KABUPATEN LAHAT',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    23,
    'ME',
    'MUARA ENIM',
    'MUARA ENIM',
    'KABUPATEN MUARA ENIM',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    24,
    'PBM',
    'PRABUMULIH',
    'PRABUMULIH',
    'KOTA PRABUMULIH',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    25,
    'GB',
    'GOMBONG',
    'GOMBONG',
    'KABUPATEN KEBUMEN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    26,
    'KPT',
    'KERTAPATI',
    'KERTAPATI',
    'KOTA PALEMBANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    27,
    'LLG',
    'LUBUK LINGGAU',
    'LUBUK LINGGAU',
    'KOTA LUBUKLINGGAU',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    28,
    'BTA',
    'BATURAJA',
    'BATURAJA',
    'BATURAJA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    29,
    'MRI',
    'MANGGARAI',
    'MANGGARAI',
    'KOTA JAKARTA PUSAT',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    30,
    'GMR',
    'GAMBIR',
    'GAMBIR',
    'JAKARTA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    31,
    'JUA',
    'JUANDA',
    'JUANDA',
    'KOTA JAKARTA PUSAT',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    32,
    'JAKK',
    'JAKARTA KOTA',
    'JAKARTA KOTA',
    'JAKARTA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    33,
    'TGS',
    'TIGARAKSA',
    'TIGARAKSA',
    'KABUPATEN TANGERANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    34,
    'CLG',
    'CILEGON',
    'CILEGON',
    'KOTA CILEGON',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    35,
    'KNN',
    'KRADENAN',
    'KRADENAN',
    'KABUPATEN GROBOGAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    36,
    'JBN',
    'JAMBON',
    'JAMBON',
    'KABUPATEN GROBOGAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    37,
    'LW',
    'LAWANG',
    'LAWANG',
    'KOTA MALANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    38,
    'ML',
    'MALANG',
    'MALANG',
    'KOTA MALANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    39,
    'MLK',
    'MALANG KOTA LAMA',
    'MALANG KOTA LAMA',
    'KOTA MALANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    40,
    'KPN',
    'KEPANJEN',
    'KEPANJEN',
    'KOTA MALANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    41,
    'SBP',
    'SUMBERPUCUNG',
    'SUMBERPUCUNG',
    'KOTA MALANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    42,
    'KSB',
    'KESAMBEN',
    'KESAMBEN',
    'KOTA BLITAR',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    43,
    'WG',
    'WLINGI',
    'WLINGI',
    'KOTA BLITAR',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    44,
    'BL',
    'BLITAR',
    'BLITAR',
    'KOTA BLITAR',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    45,
    'NT',
    'NGUNUT',
    'NGUNUT',
    'KABUPATEN TULUNGAGUNG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    46,
    'TA',
    'TULUNGAGUNG',
    'TULUNGAGUNG',
    'KABUPATEN TULUNGAGUNG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    47,
    'NJG',
    'NGUJANG',
    'NGUJANG',
    'KABUPATEN TULUNGAGUNG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    48,
    'KD',
    'KEDIRI',
    'KEDIRI',
    'KOTA KEDIRI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    49,
    'SI',
    'SUKABUMI',
    'SUKABUMI',
    'KOTA SUKABUMI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    50,
    'PSE',
    'PASARSENEN',
    'PASARSENEN',
    'JAKARTA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    51,
    'JNG',
    'JATINEGARA',
    'JATINEGARA',
    'JAKARTA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    52,
    'GM',
    'GUMILIR',
    'GUMILIR',
    'KABUPATEN CILACAP',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    53,
    'CP',
    'CILACAP',
    'CILACAP',
    'KABUPATEN CILACAP',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    54,
    'DMR',
    'DOLOKMERANGIR',
    'DOLOKMERANGIR',
    'KABUPATEN SIMALUNGUN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    55,
    'LTD',
    'LAUT TADOR',
    'LAUT TADOR',
    'KABUPATEN BATU BARA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    56,
    'PRA',
    'PERLANAAN',
    'PERLANAAN',
    'KABUPATEN SIMALUNGUN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    57,
    'LMP',
    'LIMAPULUH',
    'LIMAPULUH',
    'KABUPATEN SIMALUNGUN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    58,
    'SBJ',
    'SEI BEJANGKAR',
    'SEI BEJANGKAR',
    'KABUPATEN BATU BARA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    59,
    'KIS',
    'KISARAN',
    'KISARAN',
    'KABUPATEN ASAHAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    60,
    'PUR',
    'PULURAJA',
    'PULURAJA',
    'KABUPATEN ASAHAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    61,
    'AKB',
    'AEKLOBA',
    'AEKLOBA',
    'KABUPATEN ASAHAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    62,
    'MBM',
    'MAMBANGMUDA',
    'MAMBANGMUDA',
    'KABUPATEN LABUHAN BATU',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    63,
    'PME',
    'PAMINGKE',
    'PAMINGKE',
    'KABUPATEN LABUHANBATU UTARA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    64,
    'PHA',
    'PADANGHALABAN',
    'PADANGHALABAN',
    'KABUPATEN LABUHAN BATU',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    65,
    'MBU',
    'MARBAU',
    'MARBAU',
    'KABUPATEN LABUHAN BATU',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    66,
    'TNB',
    'TANJUNGBALAI',
    'TANJUNGBALAI',
    'KOTA TANJUNG BALAI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    67,
    'TBI',
    'TEBING TINGGI',
    'TEBING TINGGI',
    'KOTA TEBING TINGGI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    68,
    'RPH',
    'RAMPAH',
    'RAMPAH',
    'KOTA TEBING TINGGI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    69,
    'PBA',
    'PERBAUNGAN',
    'PERBAUNGAN',
    'KABUPATEN SERDANG BEDAGAI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    70,
    'LBP',
    'LUBUKPAKAM',
    'LUBUKPAKAM',
    'KABUPATEN DELI SERDANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    71,
    'ARB',
    'ARASKABU',
    'ARASKABU',
    'KABUPATEN DELI SERDANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    72,
    'BTK',
    'BATANGKUIS',
    'BATANGKUIS',
    'KABUPATEN DELI SERDANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    73,
    'BAP',
    'BANDARHALIPAH',
    'BANDARHALIPAH',
    'KABUPATEN DELI SERDANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    74,
    'MDN',
    'MEDAN',
    'MEDAN',
    'KOTA MEDAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    75,
    'RAP',
    'RANTAUPRAPAT',
    'RANTAUPRAPAT',
    'KABUPATEN LABUHAN BATU',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    76,
    'SIR',
    'SIANTAR',
    'SIANTAR',
    'KOTA PEMATANG SIANTAR',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    77,
    'KAC',
    'KIARACONDONG',
    'KIARACONDONG',
    'KOTA BANDUNG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    78,
    'BD',
    'BANDUNG',
    'BANDUNG',
    'KOTA BANDUNG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    79,
    'CMI',
    'CIMAHI',
    'CIMAHI',
    'KOTA CIMAHI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    80,
    'PLD',
    'PLERED',
    'PLERED',
    'KABUPATEN PURWAKARTA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    81,
    'PWK',
    'PURWAKARTA',
    'PURWAKARTA',
    'KABUPATEN PURWAKARTA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    82,
    'CKP',
    'CIKAMPEK',
    'CIKAMPEK',
    'KABUPATEN KARAWANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    83,
    'KW',
    'KARAWANG',
    'KARAWANG',
    'KABUPATEN KARAWANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    84,
    'CKR',
    'CIKARANG',
    'CIKARANG',
    'KABUPATEN BEKASI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    85,
    'BKS',
    'BEKASI',
    'BEKASI',
    'KOTA BEKASI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    86,
    'BJR',
    'BANJAR',
    'BANJAR',
    'KOTA BANJAR',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    87,
    'CI',
    'CIAMIS',
    'CIAMIS',
    'KABUPATEN CIAMIS',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    88,
    'TSM',
    'TASIKMALAYA',
    'TASIKMALAYA',
    'KOTA TASIKMALAYA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    89,
    'CPD',
    'CIPEUNDEUY',
    'CIPEUNDEUY',
    'KABUPATEN GARUT',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    90,
    'CB',
    'CIBATU',
    'CIBATU',
    'KABUPATEN GARUT',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    91,
    'LL',
    'LELES',
    'LELES',
    'KABUPATEN GARUT',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    92,
    'CCL',
    'CICALENGKA',
    'CICALENGKA',
    'KABUPATEN BANDUNG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    93,
    'KTA',
    'KUTOARJO',
    'KUTOARJO',
    'KABUPATEN PURWOREJO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    94,
    'JN',
    'JENAR',
    'JENAR',
    'KABUPATEN PURWOREJO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    95,
    'WJ',
    'WOJO',
    'WOJO',
    'KABUPATEN PURWOREJO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    96,
    'KDG',
    'KEDUNDANG',
    'KEDUNDANG',
    'KABUPATEN KULON PROGO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    97,
    'WT',
    'WATES',
    'WATES',
    'KOTA YOGYAKARTA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    98,
    'YK',
    'YOGYAKARTA',
    'YOGYAKARTA',
    'KOTA YOGYAKARTA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    99,
    'LPN',
    'LEMPUYANGAN',
    'LEMPUYANGAN',
    'KOTA YOGYAKARTA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    100,
    'KT',
    'KLATEN',
    'KLATEN',
    'KABUPATEN KLATEN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    101,
    'PWS',
    'PURWOSARI',
    'PURWOSARI',
    'KOTA SOLO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    102,
    'SLO',
    'SOLO BALAPAN',
    'SOLO BALAPAN',
    'KOTA SOLO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    103,
    'SLM',
    'SALEM',
    'SALEM',
    'KABUPATEN SRAGEN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    104,
    'GD',
    'GUNDIH',
    'GUNDIH',
    'KABUPATEN GROBOGAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    105,
    'TW',
    'TELAWA',
    'TELAWA',
    'KABUPATEN BOYOLALI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    106,
    'KEJ',
    'KEDUNGJATI',
    'KEDUNGJATI',
    'KABUPATEN GROBOGAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    107,
    'ATA',
    'ALASTUA',
    'ALASTUA',
    'KOTA SEMARANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    108,
    'SMT',
    'SEMARANG TAWANG BANK JATENG',
    'SEMARANG TAWANG BANK JATENG',
    'KOTA SEMARANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    109,
    'SMC',
    'SEMARANG PONCOL',
    'SEMARANG PONCOL',
    'KOTA SEMARANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    110,
    'WLR',
    'WELERI',
    'WELERI',
    'KABUPATEN KENDAL',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    111,
    'BTG',
    'BATANG',
    'BATANG',
    'KOTA PEKALONGAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    112,
    'PK',
    'PEKALONGAN',
    'PEKALONGAN',
    'KOTA PEKALONGAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    113,
    'PML',
    'PEMALANG',
    'PEMALANG',
    'KOTA PEMALANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    114,
    'PML',
    'PEMALANG',
    'PEMALANG',
    'KOTA PEMALANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    115,
    'SLW',
    'SLAWI',
    'SLAWI',
    'KOTA TEGAL',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    116,
    'TG',
    'TEGAL',
    'TEGAL',
    'KOTA TEGAL',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    117,
    'BB',
    'BREBES',
    'BREBES',
    'KABUPATEN BREBES',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    118,
    'TGN',
    'TANJUNG',
    'TANJUNG',
    'KABUPATEN BREBES',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    119,
    'LOS',
    'LOSARI',
    'LOSARI',
    'KABUPATEN CIREBON',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    120,
    'BBK',
    'BABAKAN',
    'BABAKAN',
    'KABUPATEN CIREBON',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    121,
    'CLD',
    'CILEDUG',
    'CILEDUG',
    'KABUPATEN CIREBON',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    122,
    'PGB',
    'PEGADENBARU',
    'PEGADENBARU',
    'KABUPATEN SUBANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    123,
    'HGL',
    'HAURGEULIS',
    'HAURGEULIS',
    'KABUPATEN INDRAMAYU',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    124,
    'TIS',
    'TERISI',
    'TERISI',
    'KABUPATEN INDRAMAYU',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    125,
    'JTB',
    'JATIBARANG',
    'JATIBARANG',
    'KABUPATEN INDRAMAYU',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    126,
    'AWN',
    'ARJAWINANGUN',
    'ARJAWINANGUN',
    'KABUPATEN CIREBON',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    127,
    'CN',
    'CIREBON',
    'CIREBON',
    'KOTA CIREBON',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    128,
    'CNP',
    'CIREBON PRUJAKAN',
    'CIREBON PRUJAKAN',
    'KOTA CIREBON',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    129,
    'KGG',
    'KETANGGUNGAN',
    'KETANGGUNGAN',
    'KABUPATEN BREBES',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    130,
    'PPK',
    'PRUPUK',
    'PRUPUK',
    'KOTA TEGAL',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    131,
    'BMA',
    'BUMIAYU',
    'BUMIAYU',
    'KABUPATEN BREBES',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    132,
    'PWT',
    'PURWOKERTO',
    'PURWOKERTO',
    'PURWOKERTO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    133,
    'MA',
    'MAOS',
    'MAOS',
    'KABUPATEN CILACAP',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    134,
    'JRL',
    'JERUKLEGI',
    'JERUKLEGI',
    'KABUPATEN CILACAP',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    135,
    'SDR',
    'SIDAREJA',
    'SIDAREJA',
    'KABUPATEN CILACAP',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    136,
    'GDM',
    'GANDRUNGMANGUN',
    'GANDRUNGMANGUN',
    'KABUPATEN CILACAP',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    137,
    'CSA',
    'CISAAT',
    'CISAAT',
    'KOTA SUKABUMI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    138,
    'KE',
    'KARANGTENGAH',
    'KARANGTENGAH',
    'KOTA SUKABUMI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    139,
    'CBD',
    'CIBADAK',
    'CIBADAK',
    'KOTA SUKABUMI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    140,
    'PRK',
    'PARUNG KUDA',
    'PARUNG KUDA',
    'KOTA SUKABUMI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    141,
    'CCR',
    'CICURUG',
    'CICURUG',
    'KOTA SUKABUMI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    142,
    'CGB',
    'CIGOMBONG',
    'CIGOMBONG',
    'KABUPATEN BOGOR',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    143,
    'MSG',
    'MASENG',
    'MASENG',
    'KABUPATEN BOGOR',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    144,
    'BTT',
    'BATUTULIS',
    'BATUTULIS',
    'KABUPATEN BOGOR',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    145,
    'BOO',
    'BOGOR',
    'BOGOR',
    'KOTA BOGOR',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    146,
    'KYA',
    'KROYA',
    'KROYA',
    'KABUPATEN CILACAP',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    147,
    'SPH',
    'SUMPIUH',
    'SUMPIUH',
    'KABUPATEN BANYUMAS',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    148,
    'GB',
    'GOMBONG',
    'GOMBONG',
    'KABUPATEN KEBUMEN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    149,
    'KA',
    'KARANGANYAR',
    'KARANGANYAR',
    'KABUPATEN KEBUMEN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    150,
    'KM',
    'KEBUMEN',
    'KEBUMEN',
    'KABUPATEN KEBUMEN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    151,
    'KWN',
    'KUTOWINANGUN',
    'KUTOWINANGUN',
    'KABUPATEN KEBUMEN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    152,
    'GBN',
    'GAMBRINGAN',
    'GAMBRINGAN',
    'KABUPATEN GROBOGAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    153,
    'NBO',
    'NGROMBO',
    'NGROMBO',
    'KABUPATEN GROBOGAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    154,
    'WR',
    'WARU',
    'WARU',
    'SIDOARJO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    155,
    'KRN',
    'KRIAN',
    'KRIAN',
    'SIDOARJO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    156,
    'MR',
    'MOJOKERTO',
    'MOJOKERTO',
    'KOTA MOJOKERTO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    157,
    'CRM',
    'CURAHMALANG',
    'CURAHMALANG',
    'KABUPATEN JOMBANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    158,
    'JG',
    'JOMBANG',
    'JOMBANG',
    'KABUPATEN JOMBANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    159,
    'SMB',
    'SEMBUNG',
    'SEMBUNG',
    'KABUPATEN JOMBANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    160,
    'KTS',
    'KERTOSONO',
    'KERTOSONO',
    'KABUPATEN NGANJUK',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    161,
    'NJ',
    'NGANJUK',
    'NGANJUK',
    'KABUPATEN NGANJUK',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    162,
    'CRB',
    'CARUBAN',
    'CARUBAN',
    'KOTA MADIUN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    163,
    'MN',
    'MADIUN',
    'MADIUN',
    'KOTA MADIUN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    164,
    'GG',
    'GENENG',
    'GENENG',
    'KABUPATEN NGAWI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    165,
    'PA',
    'PARON',
    'PARON',
    'KABUPATEN NGAWI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    166,
    'KG',
    'KEDUNGGALAR',
    'KEDUNGGALAR',
    'KABUPATEN NGAWI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    167,
    'WK',
    'WALIKUKUN',
    'WALIKUKUN',
    'KABUPATEN NGAWI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    168,
    'SR',
    'SRAGEN',
    'SRAGEN',
    'KABUPATEN SRAGEN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    169,
    'SK',
    'SOLOJEBRES',
    'SOLOJEBRES',
    'KOTA SOLO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    170,
    'RGP',
    'ROGOJAMPI',
    'ROGOJAMPI',
    'KABUPATEN BANYUWANGI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    171,
    'TGR',
    'TEMUGURUH',
    'TEMUGURUH',
    'KABUPATEN BANYUWANGI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    172,
    'KSL',
    'KALISETAIL',
    'KALISETAIL',
    'KABUPATEN BANYUWANGI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    173,
    'SWD',
    'SUMBER WADUNG',
    'SUMBER WADUNG',
    'KABUPATEN BANYUWANGI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    174,
    'GLM',
    'GLENMORE',
    'GLENMORE',
    'KABUPATEN BANYUWANGI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    175,
    'KBR',
    'KALIBARU',
    'KALIBARU',
    'KABUPATEN BANYUWANGI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    176,
    'KLT',
    'KALISAT',
    'KALISAT',
    'KABUPATEN JEMBER',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    177,
    'AJ',
    'ARJASA',
    'ARJASA',
    'KABUPATEN JEMBER',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    178,
    'JR',
    'JEMBER',
    'JEMBER',
    'KABUPATEN JEMBER',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    179,
    'RBP',
    'RAMBIPUJI',
    'RAMBIPUJI',
    'KABUPATEN JEMBER',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    180,
    'TGL',
    'TANGGUL',
    'TANGGUL',
    'KABUPATEN JEMBER',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    181,
    'JTR',
    'JATIROTO',
    'JATIROTO',
    'KABUPATEN LUMAJANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    182,
    'KK',
    'KLAKAH',
    'KLAKAH',
    'KABUPATEN LUMAJANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    183,
    'RN',
    'RANUYOSO',
    'RANUYOSO',
    'KABUPATEN LUMAJANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    184,
    'PB',
    'PROBOLINGGO',
    'PROBOLINGGO',
    'KABUPATEN PROBOLINGGO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    185,
    'PS',
    'PASURUAN',
    'PASURUAN',
    'KOTA PASURUAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    186,
    'BG',
    'BANGIL',
    'BANGIL',
    'KOTA PASURUAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    187,
    'SDA',
    'SIDOARJO',
    'SIDOARJO',
    'SIDOARJO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    188,
    'WO',
    'WONOKROMO',
    'WONOKROMO',
    'KOTA SURABAYA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    189,
    'SGU',
    'SURABAYA GUBENG',
    'SURABAYA GUBENG',
    'KOTA SURABAYA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    190,
    'SBI',
    'SURABAYA PASAR TURI',
    'SURABAYA PASAR TURI',
    'KOTA SURABAYA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    191,
    'LMG',
    'LAMONGAN',
    'LAMONGAN',
    'KABUPATEN LAMONGAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    192,
    'BJ',
    'BOJONEGORO',
    'BOJONEGORO',
    'KABUPATEN BOJONEGORO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    193,
    'CU',
    'CEPU',
    'CEPU',
    'KABUPATEN BLORA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    194,
    'WDU',
    'WADU',
    'WADU',
    'KABUPATEN BLORA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    195,
    'RBG',
    'RANDUBLATUNG',
    'RANDUBLATUNG',
    'KABUPATEN BLORA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    196,
    'DPL',
    'DOPLANG',
    'DOPLANG',
    'KABUPATEN BLORA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    197,
    'MAG',
    'MAGETAN',
    'MAGETAN',
    'MAGETAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    198,
    'KTG',
    'KETAPANG',
    'KETAPANG',
    'KABUPATEN BANYUWANGI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    199,
    'BBT',
    'BABAT',
    'BABAT',
    'KABUPATEN LAMONGAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    200,
    'LEC',
    'LECES',
    'LECES',
    'KABUPATEN PROBOLINGGO',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    201,
    'PDX',
    'PADANGX',
    'PADANGX',
    'KOTA PADANG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    202,
    'NJG',
    'NGUJANG',
    'NGUJANG',
    'KABUPATEN TULUNGAGUNG',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    203,
    'BOP',
    'BOGOR PALEDANG',
    'BOGOR PALEDANG',
    'KOTA BOGOR',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    204,
    'SGT',
    'SUNGAI TUHA',
    'SUNGAI TUHA',
    'MARTAPURA',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    205,
    'WAP',
    'WAY PISANG',
    'WAY PISANG',
    'KABUPATEN WAY KANAN',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    206,
    'NGW',
    'NGAWI',
    'NGAWI',
    'KABUPATEN NGAWI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    207,
    'BWI',
    'BANYUWANGI KOTA',
    'BANYUWANGI KOTA',
    'KABUPATEN BANYUWANGI',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
INSERT INTO `stations`
VALUES (
    208,
    'GRT',
    'GARUT',
    'GARUT',
    'KABUPATEN GARUT',
    0,
    '2024-11-11 20:37:22',
    '2024-11-11 20:37:22'
  );
-- ----------------------------
-- Table structure for times
-- ----------------------------
DROP TABLE IF EXISTS `times`;
CREATE TABLE `times` (
  `id` int NOT NULL AUTO_INCREMENT,
  `arrival` time NULL DEFAULT NULL,
  `departure` time NULL DEFAULT NULL,
  `is_deleted` tinyint NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;
-- ----------------------------
-- Records of times
-- ----------------------------
INSERT INTO `times`
VALUES (1, '04:00:00', '06:00:00', 0, NULL, NULL);
INSERT INTO `times`
VALUES (2, '06:00:00', '08:00:00', 0, NULL, NULL);
INSERT INTO `times`
VALUES (3, '08:00:00', '10:00:00', 0, NULL, NULL);
INSERT INTO `times`
VALUES (4, '10:00:00', '12:00:00', 0, NULL, NULL);
INSERT INTO `times`
VALUES (5, '12:00:00', '14:00:00', 0, NULL, NULL);
INSERT INTO `times`
VALUES (6, '14:00:00', '16:00:00', 0, NULL, NULL);
INSERT INTO `times`
VALUES (7, '16:00:00', '18:00:00', 0, NULL, NULL);
INSERT INTO `times`
VALUES (8, '18:00:00', '20:00:00', 0, NULL, NULL);
INSERT INTO `times`
VALUES (9, '20:00:00', '22:00:00', 0, NULL, NULL);
INSERT INTO `times`
VALUES (10, '22:00:00', '00:00:00', 0, NULL, NULL);
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
  `is_deleted` tinyint NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `trains_ibfk_1`(`route_id` ASC) USING BTREE,
  INDEX `trains_ibfk_2`(`time_id` ASC) USING BTREE,
  CONSTRAINT `trains_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `trains_ibfk_2` FOREIGN KEY (`time_id`) REFERENCES `times` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;
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
  `is_deleted` tinyint NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `unique_seat`(
    `train_id` ASC,
    `carriage_number` ASC,
    `seat_number` ASC
  ) USING BTREE,
  CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;
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
  `adult_passenger` int NOT NULL,
  `child_passenger` int NULL DEFAULT NULL,
  `status` enum('pending', 'paid', 'cancelled') NULL DEFAULT 'pending',
  `total_amount` decimal(10, 2) NOT NULL,
  `is_deleted` tinyint NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `orders_ibfk_1`(`user_id` ASC) USING BTREE,
  INDEX `orders_ibfk_2`(`train_id` ASC) USING BTREE,
  INDEX `orders_ibfk_3`(`seat_id` ASC) USING BTREE,
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`train_id`) REFERENCES `trains` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;
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
  `is_deleted` tinyint NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `payments_ibfk_1`(`order_id` ASC) USING BTREE,
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);
-- ----------------------------
-- Records of payments
-- ----------------------------
SET FOREIGN_KEY_CHECKS = 1;