/*
 Navicat Premium Data Transfer

 Source Server         : kominfo
 Source Server Type    : MySQL
 Source Server Version : 50733 (5.7.33)
 Source Host           : localhost:3306
 Source Schema         : db_sispak_cf_ds

 Target Server Type    : MySQL
 Target Server Version : 50733 (5.7.33)
 File Encoding         : 65001

 Date: 31/05/2023 10:44:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for m_identi
-- ----------------------------
DROP TABLE IF EXISTS `m_identi`;
CREATE TABLE `m_identi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kd_identi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `identi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_identi
-- ----------------------------
INSERT INTO `m_identi` VALUES (1, 'B01', 'Menyerang satu buah host target dalam sebuah jaringan', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (2, 'B02', 'Memantau dan menangkap semua paket data yang melewati jaringan tertentu yang kemudian informasi di dalamnya akan diambil tanpa izin, atau dicuri', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (3, 'B03', 'Memalsukan alamat IP attacker sehingga sasaran menganggap alamat IP attacker adalah alamat IP dari host di dalam network bukan dari luar network', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (4, 'B04', 'Memaksa masuk dengan cara menebak username dan password yang dituju', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (5, 'B05', 'Mengubah kekuasaan system dengan cara mengcrack password file', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (6, 'B06', 'Mereplikasi diri sendiri dan menyebar melalui jaringan', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (7, 'B07', 'Menyalahgunakan celah keamanan yang ada di lapisan SQL berbasis data suatu aplikasi.', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (8, 'B08', 'Menyerang bagian tampilan, dengan cara mengganti atau menyisipkan file pada server.', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (9, 'B09', 'Membanjiri jaringan melalui request terhadap sebuah layanan yang disediakan oleh server.', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (10, 'B10', 'Serangan teknis yang rumit yangterdiri dari beberapa komponen.Ini adalah eksploitasi keamananyangbekerja dengan menipukomputer dalam hubungankepercayaan bahwa anda adalahSerangan teknis yang rumit yangterdiri dari beberapa komponen.', NULL, '2023-05-18 08:41:14', NULL, NULL);
INSERT INTO `m_identi` VALUES (11, 'B11', 'Mengambil nama DNS dari\nsistem lain dengan\nmembahayakan domain name\nserver suatu domain yang sah.', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (12, 'B12', 'Membanjiri lalu lintas host target\nsehingga mencegah klien yang\nvalid untuk mengakses layanan\njaringan pada server yang\ndijadikan target serangan.', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (13, 'B13', 'Server atau keseluruhan segmen\njaringan menjadi “tidak berguna\nsama sekali” bagi client', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (14, 'B14', 'Melambatkan dan memadatkan\ntrafik di jaringan.', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (15, 'B15', 'Meng-install software secara\notomatis.', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (16, 'B16', 'Menghentikan layanan yang\ndiberikan oleh server sehingga\nterjadi gangguan terhadap\nlayanan atau jaringan komputer.', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (17, 'B17', 'Server akan mengalami down.', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (18, 'B18', 'Tindakan penyusupan dengan\nmenggunakan identitas resmi\nsecara ilegal.', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (19, 'B19', 'Serangan di dilancarkan dengan\nmenggunakan utility ping pada\nsebuah sistem operasi.', NULL, NULL, NULL, NULL);
INSERT INTO `m_identi` VALUES (20, 'B20', 'Alamat IP penyerang biasanya\ntelah disembunyikan atau\nspoofed sehingga alamat yang\ndicatat oleh target adalah alamat\nyang salah.', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for m_jenis
-- ----------------------------
DROP TABLE IF EXISTS `m_jenis`;
CREATE TABLE `m_jenis`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kd_jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `penanganan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_jenis
-- ----------------------------
INSERT INTO `m_jenis` VALUES (2, 'S01', 'Sniffing', 'Pastikan data yang dikirimkan melalui jaringan dienkripsi. Penggunaan protokol enkripsi seperti HTTPS untuk komunikasi web dan VPN (Virtual Private Network) untuk komunikasi jaringan yang lebih luas dapat membantu melindungi data dari serangan sniffing.', '2023-04-28 09:01:31', '2023-05-18 08:08:18', NULL, NULL);
INSERT INTO `m_jenis` VALUES (3, 'S02', 'Spoofing', 'Pastikan konfigurasi DNS (Domain Name System) Anda aman. Gunakan teknologi seperti DNSSEC (Domain Name System Security Extensions) untuk memastikan integritas data DNS dan mencegah serangan spoofing DNS.', '2023-05-05 04:20:35', '2023-05-18 08:09:59', NULL, NULL);
INSERT INTO `m_jenis` VALUES (4, 'S03', 'Finger Exploit', 'Implementasikan IDS untuk mendeteksi serangan Finger Exploit atau aktivitas mencurigakan lainnya pada jaringan Anda.', '2023-05-08 10:16:09', '2023-05-18 08:12:33', NULL, NULL);
INSERT INTO `m_jenis` VALUES (5, 'S04', 'Brute Force', 'Implementasikan metode otentikasi multi-faktor, seperti penggunaan token OTP (One-Time Password) atau aplikasi otentikator, untuk memberikan lapisan keamanan tambahan.', '2023-05-08 10:16:30', '2023-05-18 08:13:57', NULL, NULL);
INSERT INTO `m_jenis` VALUES (6, 'S05', 'Password Cracking', 'Batasi jumlah percobaan login yang diizinkan sebelum akun terkunci sementara waktu. Ini akan memperlambat serangan password cracking dan memberikan perlindungan terhadap upaya mencoba semua kombinasi kata sandi secara berurutan.', '2023-05-08 10:16:58', '2023-05-18 08:15:16', NULL, NULL);
INSERT INTO `m_jenis` VALUES (7, 'S06', 'Worm', 'Pastikan perangkat lunak anti-malware Anda terbaru dan memiliki definisi virus yang mutakhir. Ini membantu mendeteksi dan mencegah worm yang dikenal dan baru.', '2023-05-08 10:17:15', '2023-05-18 08:16:21', NULL, NULL);
INSERT INTO `m_jenis` VALUES (8, 'S07', 'SQL Injection', 'Periksa dan validasi semua input yang diterima oleh aplikasi web Anda. Gunakan teknik sanitasi input seperti escape karakter khusus atau filterisasi input untuk mencegah karakter khusus atau perintah SQL yang tidak sah.', '2023-05-08 10:18:46', '2023-05-18 08:17:55', NULL, NULL);
INSERT INTO `m_jenis` VALUES (9, 'S08', 'Deface', 'Periksa konfigurasi situs web Anda dan pastikan pengaturan keamanan yang tepat diaktifkan. Batasi akses file yang tidak perlu, nonaktifkan opsi yang tidak digunakan, dan terapkan konfigurasi yang disarankan oleh pengembang atau produsen perangkat lunak.', '2023-05-08 10:19:07', '2023-05-18 08:18:46', NULL, NULL);
INSERT INTO `m_jenis` VALUES (10, 'S09', 'Request Flooding', 'Pastikan server Anda dikonfigurasi dengan benar untuk menangani jumlah permintaan yang besar. Setel batasan dan parameter yang sesuai untuk mencegah penyalahgunaan dan melindungi sumber daya server.', '2023-05-08 10:19:28', '2023-05-18 08:20:20', NULL, NULL);
INSERT INTO `m_jenis` VALUES (11, 'S10', 'DoS Attack (Denial of Service Attack)', 'Gunakan alat deteksi DDoS dan sistem pemantauan jaringan yang canggih untuk mendeteksi serangan DDoS dengan cepat. Ini memungkinkan Anda untuk merespons dengan cepat dan mengambil langkah-langkah pencegahan yang sesuai.', '2023-05-08 10:19:48', '2023-05-18 08:21:21', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for t_diagnosis
-- ----------------------------
DROP TABLE IF EXISTS `t_diagnosis`;
CREATE TABLE `t_diagnosis`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_diagnosis` date NULL DEFAULT NULL,
  `data_identi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `m_jenis_id` int(11) NULL DEFAULT NULL,
  `hasil_cf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hasil_ds` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_diagnosis
-- ----------------------------
INSERT INTO `t_diagnosis` VALUES (1, 'luthfi', '2023-05-31', '[\"1\",\"2\",\"11\",\"16\"]', 2, '0.79', '0.17', '2023-05-31 02:38:49', '2023-05-31 02:38:49', NULL, NULL);
INSERT INTO `t_diagnosis` VALUES (2, 'farid', '2023-05-31', '[\"1\",\"2\",\"3\"]', 4, '0.52', '0.15', '2023-05-31 03:36:46', '2023-05-31 03:36:46', NULL, NULL);

-- ----------------------------
-- Table structure for t_rule
-- ----------------------------
DROP TABLE IF EXISTS `t_rule`;
CREATE TABLE `t_rule`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `m_jenis_id` int(11) NULL DEFAULT NULL,
  `m_identi_id` int(11) NULL DEFAULT NULL,
  `bobot_sds` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bobot_scf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bobot_alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_rule
-- ----------------------------
INSERT INTO `t_rule` VALUES (1, 2, 1, '0.4', '0.16', '0.4', '2023-05-18 22:56:50', '2023-05-18 22:56:50', NULL, NULL);
INSERT INTO `t_rule` VALUES (2, 2, 11, '0.5', '0.36', '0.5', '2023-05-18 23:00:37', '2023-05-18 23:00:37', NULL, NULL);
INSERT INTO `t_rule` VALUES (3, 2, 16, '0.3', '0.08', '0.3', '2023-05-18 23:01:52', '2023-05-18 23:01:52', NULL, NULL);
INSERT INTO `t_rule` VALUES (4, 3, 2, '0.2', '0.08', '0.2', '2023-05-18 23:06:35', '2023-05-18 23:06:35', NULL, NULL);
INSERT INTO `t_rule` VALUES (5, 3, 18, '0.5', '0.24', '0.5', '2023-05-18 23:09:34', '2023-05-18 23:09:34', NULL, NULL);
INSERT INTO `t_rule` VALUES (6, 3, 20, '0.2', '0.08', '0.2', '2023-05-18 23:17:40', '2023-05-18 23:17:40', NULL, NULL);
INSERT INTO `t_rule` VALUES (7, 4, 1, '0.4', '0.16', '0.4', '2023-05-18 23:19:32', '2023-05-18 23:19:32', NULL, NULL);
INSERT INTO `t_rule` VALUES (8, 4, 2, '0.2', '0.08', '0.2', '2023-05-18 23:20:18', '2023-05-18 23:20:18', NULL, NULL);
INSERT INTO `t_rule` VALUES (9, 5, 3, '0.4', '0.12', '0.4', '2023-05-18 23:22:08', '2023-05-18 23:22:08', NULL, NULL);
INSERT INTO `t_rule` VALUES (10, 5, 20, '0.2', '0.08', '0.2', '2023-05-18 23:23:15', '2023-05-18 23:23:15', NULL, NULL);
INSERT INTO `t_rule` VALUES (11, 6, 4, '0.3', '0.32', '0.32', '2023-05-18 23:25:47', '2023-05-18 23:25:47', NULL, NULL);
INSERT INTO `t_rule` VALUES (12, 6, 5, '0.5', '0.25', '0.5', '2023-05-18 23:26:49', '2023-05-18 23:26:49', NULL, NULL);
INSERT INTO `t_rule` VALUES (13, 7, 6, '0.2', '0.16', '0.2', '2023-05-18 23:27:43', '2023-05-18 23:27:43', NULL, NULL);
INSERT INTO `t_rule` VALUES (14, 7, 11, '0.5', '0.36', '0.5', '2023-05-18 23:28:55', '2023-05-18 23:28:55', NULL, NULL);
INSERT INTO `t_rule` VALUES (15, 7, 13, '0.3', '0.08', '0.3', '2023-05-18 23:31:07', '2023-05-18 23:31:07', NULL, NULL);
INSERT INTO `t_rule` VALUES (16, 7, 15, '0.4', '0.32', '0.4', '2023-05-18 23:32:25', '2023-05-18 23:32:25', NULL, NULL);
INSERT INTO `t_rule` VALUES (17, 8, 7, '0.4', '0.48', '0.48', '2023-05-18 23:33:47', '2023-05-18 23:33:47', NULL, NULL);
INSERT INTO `t_rule` VALUES (18, 8, 17, '0.5', '0.08', '0.5', '2023-05-18 23:34:53', '2023-05-18 23:34:53', NULL, NULL);
INSERT INTO `t_rule` VALUES (19, 9, 7, '0.4', '0.8', '0.8', '2023-05-18 23:36:00', '2023-05-18 23:36:00', NULL, NULL);
INSERT INTO `t_rule` VALUES (20, 9, 8, '0.7', '0.32', '0.7', '2023-05-18 23:37:11', '2023-05-18 23:37:11', NULL, NULL);
INSERT INTO `t_rule` VALUES (21, 10, 9, '0.5', '0.32', '0.5', '2023-05-18 23:37:57', '2023-05-18 23:37:57', NULL, NULL);
INSERT INTO `t_rule` VALUES (22, 10, 12, '0.4', '0.24', '0.4', '2023-05-18 23:40:17', '2023-05-18 23:40:17', NULL, NULL);
INSERT INTO `t_rule` VALUES (23, 11, 10, '0.4', '0.64', '0.64', '2023-05-18 23:42:10', '2023-05-18 23:42:10', NULL, NULL);
INSERT INTO `t_rule` VALUES (24, 11, 14, '0.5', '0.36', '0.5', '2023-05-18 23:43:25', '2023-05-18 23:43:25', NULL, NULL);
INSERT INTO `t_rule` VALUES (25, 11, 17, '0.5', '0.08', '0.5', '2023-05-18 23:44:12', '2023-05-18 23:44:12', NULL, NULL);
INSERT INTO `t_rule` VALUES (26, 11, 19, '0.2', '0.12', '0.2', '2023-05-18 23:45:04', '2023-05-18 23:45:04', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `verify_key` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `active` int(11) NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'luthfi', '$2y$10$Kv/PyU6dp9liQQLylo1xj.kG6jhnENUpdF29ttYtNzmpPJtv5Hs1C', 'admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (7, 'deni', '$2y$10$cQpH5EdpF8MN.YZ5PQexCeHU6jeYJG1Sm4JiqD7uj/igjwImZWp9i', 'admin', 'deni123@gmail.com', NULL, NULL, NULL, NULL, '2023-03-14 09:31:17', '2023-04-11 12:35:44');
INSERT INTO `users` VALUES (8, 'zenal', '$2y$10$LKfT8741lz442Y/JlBCcm.sslkla4YzvHhx5ydx7f7NIaP87AZfLm', 'admin', 'zenal@gmail.com', NULL, NULL, NULL, NULL, '2023-04-05 10:18:02', '2023-04-05 10:18:02');
INSERT INTO `users` VALUES (10, 'farid', '$2y$10$Kv/PyU6dp9liQQLylo1xj.kG6jhnENUpdF29ttYtNzmpPJtv5Hs1C', 'guest', 'farid123@gmail.com', NULL, NULL, NULL, NULL, '2023-05-03 07:20:54', '2023-05-03 07:20:54');
INSERT INTO `users` VALUES (11, 'seno', '$2y$10$Kv/PyU6dp9liQQLylo1xj.kG6jhnENUpdF29ttYtNzmpPJtv5Hs1C', 'pakar', 'seno123@gmail.com', NULL, NULL, NULL, NULL, '2023-05-16 11:47:01', '2023-05-16 11:47:01');

SET FOREIGN_KEY_CHECKS = 1;
