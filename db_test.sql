-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 07 Jun 2023 pada 00.24
-- Versi server: 8.0.33-0ubuntu0.23.04.2
-- Versi PHP: 8.1.12-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_products`
--

CREATE TABLE `m_products` (
  `id` int NOT NULL,
  `product_id` int DEFAULT '0',
  `title` varchar(250) DEFAULT NULL,
  `description` text,
  `price` int NOT NULL DEFAULT '0',
  `discount_percentage` float DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `brand` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(250) DEFAULT NULL,
  `produk_image_1` varchar(250) DEFAULT NULL,
  `produk_image_2` varchar(250) DEFAULT NULL,
  `produk_image_3` varchar(250) DEFAULT NULL,
  `produk_image_4` varchar(250) DEFAULT NULL,
  `produk_image_5` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `m_products`
--

INSERT INTO `m_products` (`id`, `product_id`, `title`, `description`, `price`, `discount_percentage`, `rating`, `stock`, `brand`, `category`, `thumbnail`, `produk_image_1`, `produk_image_2`, `produk_image_3`, `produk_image_4`, `produk_image_5`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 'iPhone 9', 'An apple mobile which is nothing like apple', 549000, 12.96, 4.69, 94, 'Apple', NULL, 'https://i.dummyjson.com/data/products/1/thumbnail.jpg', 'https://i.dummyjson.com/data/products/1/1.jpg', 'https://i.dummyjson.com/data/products/1/2.jpg', 'https://i.dummyjson.com/data/products/1/3.jpg', 'https://i.dummyjson.com/data/products/1/4.jpg', 'https://i.dummyjson.com/data/products/1/thumbnail.jpg', '2023-06-06 16:36:00', '2023-06-06 17:22:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_users`
--

CREATE TABLE `m_users` (
  `id` int NOT NULL,
  `name_user` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `profile_picture` varchar(250) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `m_users`
--

INSERT INTO `m_users` (`id`, `name_user`, `username`, `password`, `profile_picture`, `last_login`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, '2023-06-06 16:21:23', '2023-06-06 22:10:16', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_products`
--
ALTER TABLE `m_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_users`
--
ALTER TABLE `m_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_products`
--
ALTER TABLE `m_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `m_users`
--
ALTER TABLE `m_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
