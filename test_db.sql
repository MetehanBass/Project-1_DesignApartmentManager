-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Oca 2021, 17:50:08
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
  `dept` varchar(255) NOT NULL,
  `extradept` varchar(255) NOT NULL,
  `flat` int(2) NOT NULL,
  `regdate` date DEFAULT NULL,
  `exitdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`, `email`, `phonenum`, `phonenum1`, `block`, `dept`, `extradept`, `flat`, `regdate`, `exitdate`) VALUES
(99, 'metehan', '4265e2f7647f6e994836e895d2defe67', 'Metehan Baş', 'adodm87@hotmail.com', '2147483647', '2147483647', 'B', '200', '85', 12, NULL, NULL),
(101, 'MetehanB', 'Metehan999', 'Metehan Baş', 'metehancse@gmail.com', '05383485870', '05543485807', 'A', '10', '50', 2, NULL, NULL),
(108, 'ahmet123', '13737616d1b42a103e7913fb3fc7c92c', 'fatma', 'adodm87@hotmail.com', '2147483647', '', 'C', '0', '65', 1, '2020-12-31', NULL),
(109, 'Sunless', '13737616d1b42a103e7913fb3fc7c92c', 'Emre Çeliker', 'Emre@gmail.com', '2147483647', '', 'A', '160', '50', 13, '2020-12-31', NULL),
(110, 'Cagri', 'Metehan999', 'Cagri Taner', 'tnrcgr@gmail.com', '05383485870', '', 'A', '0', '0', 7, '2021-01-01', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
