-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Apr 2020 pada 02.50
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `Cart`
--

CREATE TABLE `Cart` (
  `id_item` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah_obat` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Cart`
--

INSERT INTO `Cart` (`id_item`, `id_obat`, `jumlah_obat`) VALUES
(47, 1, 3),
(48, 2, 1),
(49, 7, 2),
(50, 1, 2),
(51, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Obat`
--

CREATE TABLE `Obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jenis_obat` varchar(10) NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `Harga` double NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kuantitas` int(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Obat`
--

INSERT INTO `Obat` (`id_obat`, `nama_obat`, `jenis_obat`, `tgl_pembuatan`, `tgl_kadaluarsa`, `Harga`, `deskripsi`, `kuantitas`, `image`, `date_created`) VALUES
(1, 'Mixagrip', 'tablet', '2020-01-18', '2021-01-19', 5000, 'Kandungan paracetamol, phenylephrine HCl, dextromethorphan HBr, serta chlorpheniramine maleate di dalam Mixagrip berfungsi untuk meredakan gejala flu, seperti demam, sakit kepala, bersin-bersin, dan hidung tersumbat.', 98, 'tablet.png', 1),
(2, 'OBH', 'syrup', '2020-01-19', '2021-01-20', 20000, 'OBH sirup adalah obat yang digunakan untuk mengatasi batuk berdahak. OBH sirup merupakan obat bebas', 150, 'syrup.png', 1),
(3, 'Panadol', 'tablet', '2020-01-20', '2021-01-21', 3000, 'Panadol adalah produk obat pereda nyeri (analgetik) dan penurun demam (antipiretik) yang mengandung paracetamol sebagai bahan aktif utama. Merek obat ini tersedia dalam beberapa kemasan yang dijual secara bebas di pasaran untuk berbagai keperluan.', 100, 'tablet.png', 1),
(4, 'Fludexin', 'syrup', '2020-01-21', '2021-01-22', 15000, 'FLUDEXIN SIRUP 60 ML merupakan obat yang digunakan untuk mengatasi gejala flu seperti demam, sakit kepala, hidung tersumbat, bersin-bersin yang disertai batuk tidak berdahak.', 75, 'syrup.png', 1),
(5, 'Adem sari', 'external', '2020-01-22', '2021-01-23', 4000, 'Adem Sari bermanfaat untuk meredakan gejala panas dalam. Sebagai minuman untuk panas dalam, Adem Sari mengandung bahan aktif berupa ekstrak jeruk nipis, pulosari, dan kayu manis.', 100, 'medicine.png', 1),
(6, 'Bodrex', 'tablet', '2020-01-23', '2021-01-24', 5000, 'mengatasi sakit kepala, Bodrex mengandung bahan utama paracetamol dan kafein. Terdapat varian lain Bodrex yang bermanfaat untuk mengatasi migrain dan sakit kepala tegang.', 75, 'tablet.png', 1),
(7, 'Diapet', 'capsule', '2020-01-24', '2021-01-25', 10000, 'Diapet adalah obat herba untuk mengatasi diare atau mencret. Obat yang tersedia dalam bentuk kapsul dan sirup ini dijual bebas dan dapat dibeli tanpa resep dokter.', 80, 'capsule.png', 1),
(8, 'Entrostop', 'tablet', '2020-01-25', '2021-01-26', 7000, 'Entrostop mengandung 650 mg attapulgite dan 50 mg pectin yang berfungsi untuk menyerap racun dan bakteri penyebab diare dalam usus. Selain itu, obat ini juga dapat mengurangi volume cairan yang dikeluarkan.', 100, 'tablet.png', 1),
(9, 'Gliserol', 'external', '2020-01-26', '2021-01-27', 100000, 'Gliserol adalah obat yang digunakan untuk mengatasi konstipasi atau kesulitan buang air besar secara sementara. Obat ini diberikan melalui anus dan bekerja dengan menarik air ke dalam usus besar, sehingga menimbulkan rangsangan buang air besar', 20, 'medicine.png', 1),
(10, 'Imboost', 'syrup', '2020-01-27', '2021-01-28', 20000, 'obat ini adalah ekstrak tumbuhan echinacea, yang termasuk dalam keluarga bunga aster. Ekstrak tumbuhan ini diduga efektif untuk mengurangi gejala batuk pilek.', 100, 'syrup.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Transaksi`
--

CREATE TABLE `Transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `total` double NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Transaksi`
--

INSERT INTO `Transaksi` (`id_transaksi`, `id_item`, `id_user`, `tanggal`, `status`, `total`, `bukti_pembayaran`) VALUES
(39, 47, 13, '2020-04-20', 2, 15000, 'Screenshot_from_2020-04-20_18_19_33.png'),
(40, 48, 13, '2020-04-20', 2, 20000, 'Screenshot_from_2020-04-19_18_50_37.png'),
(41, 49, 13, '2020-04-21', 2, 20000, 'Screenshot_from_2020-04-19_18_50_37.png'),
(42, 50, 13, '2020-04-21', 1, 10000, 'Screenshot_from_2020-04-19_18_50_37.png'),
(43, 51, 13, '2020-04-21', 0, 60000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Users`
--

CREATE TABLE `Users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `alamat_user` varchar(30) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Users`
--

INSERT INTO `Users` (`id_user`, `nama_user`, `password_user`, `email_user`, `alamat_user`, `no_telp`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'ILMY_TELU', '$2y$10$3XAIBe7zpkWnokr74DM0c.ggaY4f6o/TiTD0u9RoRgazg/313Wd3K', 'ilmy@gmail.com', 'Telkom_University', '+62897654321', 'ILMY_1.png', 1, 1, 1586181241),
(13, 'Alexander', '$2y$10$LnvWNKB8GvBdnHkumQjvX.78ftFtG.9DAHUfa2EZv6Z4vbKnTq7l6', 'alex@gmail.com', '', '', 'default.jpg', 2, 1, 1587393763);

-- --------------------------------------------------------

--
-- Struktur dari tabel `Users_role`
--

CREATE TABLE `Users_role` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `Users_role`
--

INSERT INTO `Users_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `Obat`
--
ALTER TABLE `Obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `Transaksi`
--
ALTER TABLE `Transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_item` (`id_item`);

--
-- Indeks untuk tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `Users_role`
--
ALTER TABLE `Users_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `Cart`
--
ALTER TABLE `Cart`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `Obat`
--
ALTER TABLE `Obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `Transaksi`
--
ALTER TABLE `Transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `Users_role`
--
ALTER TABLE `Users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `Cart_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `Obat` (`id_obat`);

--
-- Ketidakleluasaan untuk tabel `Transaksi`
--
ALTER TABLE `Transaksi`
  ADD CONSTRAINT `Transaksi_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `Cart` (`id_item`),
  ADD CONSTRAINT `Transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `Users` (`id_user`),
  ADD CONSTRAINT `Transaksi_ibfk_3` FOREIGN KEY (`id_item`) REFERENCES `Cart` (`id_item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
