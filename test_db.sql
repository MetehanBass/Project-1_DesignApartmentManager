-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Şub 2021, 22:49:25
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `test_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'metehan'),
(2, 'kardelen', 'kardelen', 'kardelen');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `header` varchar(55) NOT NULL,
  `content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `announcement`
--

INSERT INTO `announcement` (`id`, `header`, `content`) VALUES
(2, 'Duyuru Denemesi ', 'Duyurular admin panelden yapılacaktır.'),
(11, 'Taha Hoca', 'Sunum için deneme');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `billing_date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(30) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '	0=pending,1=paid	',
  `payment_date` date DEFAULT NULL,
  `amount` double NOT NULL,
  `detail` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `billing`
--

INSERT INTO `billing` (`id`, `billing_date`, `user_id`, `status`, `payment_date`, `amount`, `detail`) VALUES
(1140, '2021-01-01', 101, 1, '2021-01-29', 250, 'Aidat'),
(1141, '2021-01-01', 110, 0, NULL, 250, 'Aidat'),
(1142, '2021-01-01', 111, 1, '2021-01-29', 250, 'Aidat'),
(1143, '2021-01-01', 115, 0, NULL, 250, 'Aidat'),
(1144, '2021-01-01', 116, 1, '2021-01-29', 250, 'Aidat'),
(1145, '2021-01-01', 117, 1, '2021-01-29', 250, 'Aidat'),
(1146, '2021-01-01', 101, 1, '2021-01-31', 200, 'Boya Masrafı'),
(1147, '2021-01-01', 110, 1, '2021-01-29', 200, 'Boya Masrafı'),
(1148, '2021-01-01', 111, 1, '2021-01-29', 200, 'Boya Masrafı'),
(1149, '2021-01-01', 115, 1, '2021-01-30', 200, 'Boya Masrafı'),
(1150, '2021-01-01', 116, 1, '2021-01-29', 200, 'Boya Masrafı'),
(1151, '2021-01-01', 117, 0, NULL, 200, 'Boya Masrafı'),
(1152, '2021-02-01', 101, 1, '2021-01-30', 250, 'Aidat'),
(1153, '2021-02-01', 110, 0, NULL, 250, 'Aidat'),
(1154, '2021-02-01', 111, 1, '2021-01-29', 250, 'Aidat'),
(1155, '2021-02-01', 115, 1, '2021-01-29', 250, 'Aidat'),
(1156, '2021-02-01', 116, 0, NULL, 250, 'Aidat'),
(1157, '2021-02-01', 117, 0, NULL, 250, 'Aidat'),
(1170, '2021-03-01', 101, 1, '2021-01-29', 250, 'Aidat'),
(1171, '2021-03-01', 110, 0, NULL, 250, 'Aidat'),
(1172, '2021-03-01', 111, 1, '2021-01-29', 250, 'Aidat'),
(1173, '2021-03-01', 115, 0, NULL, 250, 'Aidat'),
(1174, '2021-03-01', 116, 0, NULL, 250, 'Aidat'),
(1175, '2021-03-01', 117, 0, NULL, 250, 'Aidat'),
(1176, '2021-03-01', 101, 1, '2021-01-30', 1, 'deneme'),
(1177, '2021-03-01', 110, 0, NULL, 1, 'deneme'),
(1178, '2021-03-01', 111, 1, '2021-01-29', 1, 'deneme'),
(1179, '2021-03-01', 115, 0, NULL, 1, 'deneme'),
(1180, '2021-03-01', 116, 0, NULL, 1, 'deneme'),
(1181, '2021-03-01', 117, 1, '2021-01-30', 1, 'deneme'),
(1182, '2021-02-01', 101, 1, '2021-01-30', 200, 'Boya'),
(1183, '2021-02-01', 110, 1, '2021-01-29', 200, 'Boya'),
(1184, '2021-02-01', 111, 1, '2021-01-29', 200, 'Boya'),
(1185, '2021-02-01', 115, 0, NULL, 200, 'Boya'),
(1186, '2021-02-01', 116, 0, NULL, 200, 'Boya'),
(1187, '2021-02-01', 117, 0, NULL, 200, 'Boya'),
(1188, '2021-04-01', 101, 1, '2021-01-30', 500, 'Aidat'),
(1189, '2021-04-01', 110, 1, '2021-01-30', 500, 'Aidat'),
(1190, '2021-04-01', 111, 1, '2021-01-29', 500, 'Aidat'),
(1191, '2021-04-01', 115, 1, '2021-01-30', 500, 'Aidat'),
(1192, '2021-04-01', 116, 0, NULL, 500, 'Aidat'),
(1193, '2021-04-01', 117, 1, '2021-01-30', 500, 'Aidat'),
(1194, '2021-12-01', 101, 0, NULL, 250, 'Aidat'),
(1195, '2021-12-01', 110, 0, NULL, 250, 'Aidat'),
(1196, '2021-12-01', 111, 1, '2021-01-29', 250, 'Aidat'),
(1197, '2021-12-01', 115, 0, NULL, 250, 'Aidat'),
(1198, '2021-12-01', 116, 0, NULL, 250, 'Aidat'),
(1199, '2021-12-01', 117, 0, NULL, 250, 'Aidat'),
(1201, '2021-04-01', 101, 1, '2021-01-31', 600, 'Ağaçlandırma'),
(1202, '2021-04-01', 110, 0, NULL, 600, 'Ağaçlandırma'),
(1203, '2021-04-01', 111, 1, '2021-01-30', 600, 'Ağaçlandırma'),
(1204, '2021-04-01', 115, 0, NULL, 600, 'Ağaçlandırma'),
(1205, '2021-04-01', 116, 0, NULL, 600, 'Ağaçlandırma'),
(1206, '2021-04-01', 117, 0, NULL, 600, 'Ağaçlandırma'),
(1207, '2021-04-01', 119, 0, NULL, 600, 'Ağaçlandırma'),
(1208, '2020-12-01', 101, 1, '2021-01-30', 200, 'Aidat'),
(1209, '2020-12-01', 110, 0, NULL, 200, 'Aidat'),
(1210, '2020-12-01', 111, 1, '2021-01-30', 200, 'Aidat'),
(1211, '2020-12-01', 115, 0, NULL, 200, 'Aidat'),
(1212, '2020-12-01', 116, 0, NULL, 200, 'Aidat'),
(1213, '2020-12-01', 117, 0, NULL, 200, 'Aidat'),
(1214, '2020-12-01', 119, 0, NULL, 200, 'Aidat'),
(1215, '2021-09-01', 101, 0, NULL, 200, 'deneme'),
(1216, '2021-09-01', 110, 0, NULL, 200, 'deneme'),
(1217, '2021-09-01', 111, 1, '2021-01-31', 200, 'deneme'),
(1218, '2021-09-01', 115, 1, '2021-01-31', 200, 'deneme'),
(1219, '2021-09-01', 116, 0, NULL, 200, 'deneme'),
(1220, '2021-09-01', 117, 0, NULL, 200, 'deneme'),
(1221, '2021-09-01', 119, 0, NULL, 200, 'deneme'),
(1222, '2021-02-01', 101, 1, '2021-02-02', 500, 'Elektrik Tesisatı'),
(1223, '2021-02-01', 110, 0, NULL, 500, 'Elektrik Tesisatı'),
(1224, '2021-02-01', 111, 1, '2021-01-31', 500, 'Elektrik Tesisatı'),
(1225, '2021-02-01', 115, 0, NULL, 500, 'Elektrik Tesisatı'),
(1226, '2021-02-01', 116, 0, NULL, 500, 'Elektrik Tesisatı'),
(1227, '2021-02-01', 117, 0, NULL, 500, 'Elektrik Tesisatı'),
(1228, '2021-02-01', 119, 0, NULL, 500, 'Elektrik Tesisatı'),
(1229, '2021-02-01', 101, 1, '2021-02-02', 200, 'Ağaçlandırma'),
(1230, '2021-02-01', 110, 0, NULL, 200, 'Ağaçlandırma'),
(1231, '2021-02-01', 111, 1, '2021-01-31', 200, 'Ağaçlandırma'),
(1232, '2021-02-01', 115, 0, NULL, 200, 'Ağaçlandırma'),
(1233, '2021-02-01', 116, 0, NULL, 200, 'Ağaçlandırma'),
(1234, '2021-02-01', 117, 0, NULL, 200, 'Ağaçlandırma'),
(1235, '2021-02-01', 119, 0, NULL, 200, 'Ağaçlandırma'),
(1236, '2021-07-01', 101, 0, NULL, 250, 'Aidat'),
(1237, '2021-07-01', 110, 0, NULL, 250, 'Aidat'),
(1238, '2021-07-01', 111, 1, '2021-01-31', 250, 'Aidat'),
(1239, '2021-07-01', 115, 0, NULL, 250, 'Aidat'),
(1240, '2021-07-01', 116, 0, NULL, 250, 'Aidat'),
(1241, '2021-07-01', 117, 0, NULL, 250, 'Aidat'),
(1242, '2021-07-01', 119, 0, NULL, 250, 'Aidat'),
(1243, '2021-11-01', 101, 0, NULL, 200, 'alp'),
(1244, '2021-11-01', 110, 0, NULL, 200, 'alp'),
(1245, '2021-11-01', 111, 0, NULL, 200, 'alp'),
(1246, '2021-11-01', 115, 0, NULL, 200, 'alp'),
(1247, '2021-11-01', 116, 0, NULL, 200, 'alp'),
(1248, '2021-11-01', 117, 0, NULL, 200, 'alp'),
(1249, '2021-11-01', 119, 0, NULL, 200, 'alp');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `incomeannouncement`
--

CREATE TABLE `incomeannouncement` (
  `id` int(11) NOT NULL,
  `header` varchar(200) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `anounce_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `incomeannouncement`
--

INSERT INTO `incomeannouncement` (`id`, `header`, `contact`, `amount`, `anounce_date`) VALUES
(4000, 'Elektrik tesisatı yenilenmesi', '5383485870', '2500', '2021-01-01'),
(4003, 'Otopark restorasyonu', '5543789531', '13800', '2021-01-26'),
(4006, 'Daha Çok Duyuru Denemesi', '5316382154', '2500', '2021-01-27'),
(4011, 'Duyuru Denemesi ', '5515458964', '9999', '2021-01-27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `request` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `request`
--

INSERT INTO `request` (`id`, `email`, `name`, `request`) VALUES
(2021, 'metehanb26@gmail.com', 'Deneme', 'İstek şikayet formu denemesi :( :)'),
(2023, 'metehanb26@gmail.com', 'Metehan Baş', 'İstek Şikayet denemesi 06.01.2021'),
(2024, 'metehanb26@gmail.com', 'Metehan Baş', 'Taha hocaya sunum'),
(2025, 'metehanb26@gmail.com', 'Beytullah', 'selam selam selam'),
(2026, 'kardelen@kardelen.com', 'Kardelen', 'dino uyuyo'),
(2027, 'alp@artun.com', 'Alp', 'selam');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phonenum` varchar(11) NOT NULL,
  `phonenum1` varchar(11) NOT NULL,
  `block` varchar(255) NOT NULL,
  `flat` int(2) NOT NULL,
  `regdate` date DEFAULT NULL,
  `exitdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `email`, `phonenum`, `phonenum1`, `block`, `flat`, `regdate`, `exitdate`) VALUES
(101, 'MetehanB', 'Metehan999', 'Metehan Baş', 'metehancse@gmail.com', '05383485870', '05543485906', 'A', 4, '2020-12-30', NULL),
(110, 'Cagri', '13737616d1b42a103e7913fb3fc7c92c', 'Cagri Taner', 'tnrcgr@gmail.com', '05383485870', '', 'A', 8, '2021-01-01', NULL),
(111, 'Hasan', '123', 'Hasan Yılmazz', 'hasan12@gmail.com', '05346857315', '05548596325', 'B', 3, '2021-01-06', NULL),
(113, 'Sunless', '13737616d1b42a103e7913fb3fc7c92c', 'Emre Çeliker', 'Emre@gmail.com', '5546895871', '5542568745', 'A', 1, '2021-01-27', '2021-01-27'),
(115, 'hades6132', '13737616d1b42a103e7913fb3fc7c92c', 'Alper Uçann', 'hades6132@gmail.com', '5548567597', '5383485870', 'A', 16, '2021-01-27', NULL),
(116, 'Mustafa41', '9bab364e433b570de1e8e01e2b5b623a', 'Mustafa Çapa', 'mustafa@mustafa.com', '5356898512', '5548653269', 'B', 1, '2021-01-29', NULL),
(117, 'ahmett', '21cdb8d28fc14589431c0ce479e26d59', 'Ahmet Taner', 'ahmetTaner@gmail.com', '5546326954', '5546326953', 'A', 7, '2021-01-29', NULL),
(118, 'Fatma', '21cdb8d28fc14589431c0ce479e26d59', 'Fatma Baş', 'fatmab@gmail.com', '5383485870', '5548565791', 'C', 14, '2021-01-30', '2021-01-30'),
(119, 'Selami', '1dbc6d991456871bcce5645e759f9e0a', 'Selami Kılınç', 'Selami@gmail.com', '5548567597', '', 'B', 16, '2021-01-30', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `incomeannouncement`
--
ALTER TABLE `incomeannouncement`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1250;

--
-- Tablo için AUTO_INCREMENT değeri `incomeannouncement`
--
ALTER TABLE `incomeannouncement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4012;

--
-- Tablo için AUTO_INCREMENT değeri `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2028;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
