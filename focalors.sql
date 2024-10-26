-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 12:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `focalors`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `productID` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `namaProduct` varchar(50) NOT NULL,
  `jenis` enum('Mobil','Motor') NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(3) NOT NULL,
  `detail` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`productID`, `gambar`, `namaProduct`, `jenis`, `harga`, `stok`, `detail`) VALUES
(20, 'Aerox.png', 'Yamaha Aerox', 'Motor', 150000, 3, 'Sewa Yamaha Aerox, motor skuter matic yang sporty dan modern. Didukung oleh mesin bertenaga dengan teknologi terkini, Yamaha Aerox menawarkan kenyamanan berkendara tanpa kompromi. Desain aerodinamis, lampu LED futuristik, dan panel instrumen digital menambah daya tarik visual kendaraan ini.'),
(21, 'Beat.png', 'Honda Beat', 'Motor', 75000, 4, 'Sewa Honda Beat, motor skuter matik yang ringan dan efisien. Honda Beat adalah pilihan ideal untuk perjalanan sehari-hari di dalam kota dengan gaya yang kompak dan mudah manuver. Mesinnya yang bertenaga tetap ramah lingkungan dan hemat bahan bakar, menjadikannya opsi praktis untuk mobilitas perkotaan.'),
(22, 'lexi.png', 'Yamaha Lexi', 'Motor', 120000, 2, 'Sewa Yamaha Lexi, motor skuter matik yang elegan dan nyaman. Yamaha Lexi menawarkan kenyamanan tinggi dengan desain ergonomis dan fitur canggih. Ditenagai oleh mesin bertenaga, Lexi menjadi pilihan sempurna untuk perjalanan harian maupun perjalanan jarak jauh.'),
(23, 'mio.png', 'Honda Mio', 'Motor', 50000, 3, 'Sewa Yamaha Mio, motor skuter matik yang populer dan praktis. Yamaha Mio dikenal karena desainnya yang stylish, efisiensi bahan bakar yang tinggi, dan kemudahan pengendalian. Cocok untuk keperluan harian dan penggunaan dalam kota.'),
(24, 'Nmax.png', 'Yamaha Nmax', 'Motor', 150000, 2, 'Sewa Yamaha NMAX, motor skuter matik premium dengan desain modern dan performa tinggi. Yamaha NMAX menawarkan kenyamanan berkendara dan fitur canggih, menjadikannya pilihan yang sangat baik untuk perjalanan dalam kota maupun perjalanan jarak jauh.'),
(25, 'Scoopy.png', 'Honda Scoopy', 'Motor', 80000, 5, 'Sewa Honda Scoopy, motor skuter matik yang stylish dan praktis. Honda Scoopy adalah pilihan yang sangat baik untuk gaya dan kenyamanan dalam berkendara. Dengan desain retro yang ikonik, Scoopy cocok untuk perjalanan santai di dalam kota maupun perjalanan sehari-hari.'),
(26, 'Suprax.png', 'Honda Supra', 'Motor', 60000, 5, 'Sewa Honda Supra, motor bebek legendaris yang telah teruji kualitasnya. Honda Supra dikenal dengan ketangguhan, efisiensi bahan bakar, dan kenyamanan dalam penggunaan sehari-hari. Cocok untuk mobilitas harian dan perjalanan jarak pendek.'),
(27, 'Vario.png', 'Honda Vario', 'Motor', 100000, 4, 'Sewa Honda Vario, motor skuter matik yang nyaman dan modern. Honda Vario menjadi pilihan populer untuk penggunaan sehari-hari dan perjalanan dalam kota. Dengan desain yang elegan dan teknologi terkini, Vario memberikan kenyamanan dan kepraktisan dalam berkendara.'),
(28, 'Vespa.png', 'Vespa', 'Motor', 150000, 4, 'Sewa Vespa, motor skuter klasik yang memadukan gaya Italia dengan performa yang handal. Vespa dikenal dengan desain ikoniknya dan menjadi simbol gaya hidup yang elegan. Cocok untuk perjalanan santai di dalam kota dan menjelajahi tempat-tempat unik.'),
(29, 'xride.png', 'Yamaha Xride', 'Motor', 130000, 0, 'Sewa Yamaha X-Ride, motor skuter matik yang tangguh dan serbaguna. Yamaha X-Ride dirancang untuk mengatasi berbagai kondisi jalan, baik di dalam kota maupun di luar kota. '),
(30, 'Almaz.png', 'Wuling Almaz', 'Mobil', 450000, 1, 'Sewa Wuling Almaz, SUV modern dengan desain elegan dan berbagai fitur canggih. Almaz menawarkan kenyamanan berkendara tingkat tinggi, ruang kabin luas, dan teknologi terkini untuk memberikan pengalaman mengemudi yang menyenangkan.'),
(31, 'Avanza Veloz.png', 'Avanza Veloz', 'Mobil', 550000, 2, 'Sewa Toyota Avanza Veloz, MPV yang nyaman dengan desain modern dan performa tangguh. Avanza Veloz adalah pilihan yang sangat baik untuk perjalanan keluarga atau perjalanan bersama teman-teman. Dengan ruang kabin yang luas dan fitur-fitur canggih, Avanza Veloz memberikan pengalaman berkendara yang menyenangkan.'),
(32, 'Confero.png', 'Confero', 'Mobil', 500000, 2, 'Sewa DFSK Glory 560, SUV kompak dengan desain modern dan performa handal. DFSK Glory 560 adalah kendaraan yang cocok untuk perjalanan keluarga atau perjalanan bersama teman-teman. Dengan desain eksterior yang elegan dan ruang kabin yang luas, Glory 560 memberikan kenyamanan dan gaya dalam berkendara.'),
(33, 'ertiga.png', 'Suzuki Ertiga', 'Mobil', 650000, 3, 'Sewa Suzuki Ertiga, MPV yang nyaman dan sangat cocok untuk perjalanan keluarga atau grup. Suzuki Ertiga menawarkan kombinasi antara kenyamanan, ruang kabin yang luas, dan efisiensi bahan bakar. Dengan desain yang elegan, Ertiga menjadi pilihan populer untuk perjalanan jarak jauh atau sehari-hari.'),
(34, 'fortuner.png', 'Toyota Fortuner', 'Mobil', 1400000, 2, 'Sewa Toyota Fortuner, SUV tangguh yang menggabungkan gaya dan performa. Toyota Fortuner dikenal sebagai kendaraan yang handal dan mampu mengatasi berbagai kondisi jalan. Dengan desain yang mengesankan dan ruang kabin yang luas, Fortuner menjadi pilihan populer untuk perjalanan keluarga atau petualangan di luar kota.'),
(35, 'Jazz.png', 'Honda Jazz', 'Mobil', 550000, 5, 'Sewa Honda Jazz, hatchback yang kompak namun penuh gaya dengan desain yang dinamis dan fitur-fitur inovatif. Honda Jazz merupakan pilihan yang ideal untuk penggunaan sehari-hari di dalam kota dengan kemampuan manuver yang baik dan efisiensi bahan bakar yang tinggi.'),
(36, 'Kijang Innova.png', 'Kijang Innova', 'Mobil', 1100000, 3, 'Sewa Toyota Kijang Innova, MPV populer dengan desain elegan dan kenyamanan tingkat tinggi. Kijang Innova dikenal sebagai kendaraan serbaguna yang cocok untuk perjalanan keluarga.'),
(37, 'march at.png', 'Nissan March AT', 'Mobil', 500000, 2, 'Sewa Nissan March dengan transmisi otomatis memberikan kenyamanan dan kemudahan dalam berkendara di perkotaan. Nissan March, dengan desainnya yang kompak dan bertenaga efisien.'),
(38, 'Xenia.png', 'Daihatsu Xenia', 'Mobil', 600000, 1, 'Sewa Daihatsu Xenia, MPV yang populer dengan desain praktis dan fleksibel. Daihatsu Xenia menjadi pilihan yang baik untuk perjalanan keluarga atau perjalanan bersama teman-teman. '),
(39, 'Yaris.png', 'Suzuki Yaris', 'Mobil', 500000, 3, 'Sewa Toyota Yaris, hatchback yang kompak dan efisien dengan desain modern. Toyota Yaris dikenal karena manuvernya yang lincah dan efisiensi bahan bakarnya, menjadikannya pilihan.');

-- --------------------------------------------------------

--
-- Table structure for table `klaim`
--

CREATE TABLE `klaim` (
  `id` int(11) NOT NULL,
  `promo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Sudah Digunakan','Belum Digunakan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klaim`
--

INSERT INTO `klaim` (`id`, `promo_id`, `user_id`, `status`) VALUES
(53, 6, 13, 'Belum Digunakan');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `confirm_id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `gambar_product` varchar(255) NOT NULL,
  `nama_product` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hari` int(2) NOT NULL,
  `no_hp` int(20) NOT NULL,
  `nik` int(30) NOT NULL,
  `sim` varchar(255) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `promo_id` int(11) NOT NULL,
  `total_harga` varchar(200) NOT NULL,
  `persetujuan` enum('Disetujui','Belum Disetujui','Tolak') NOT NULL DEFAULT 'Belum Disetujui',
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `aksi` enum('Start','Stop') NOT NULL DEFAULT 'Stop'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`confirm_id`, `user_id`, `productID`, `gambar_product`, `nama_product`, `nama`, `alamat`, `hari`, `no_hp`, `nik`, `sim`, `harga`, `promo_id`, `total_harga`, `persetujuan`, `waktu`, `aksi`) VALUES
(126, 13, 29, 'xride.png', 'Yamaha Xride', 'Shafiq', 'Perum. Purna Yudha Indah Blok S No. 15', 5, 2147483647, 2147483647, 'uploads/WhatsApp Image 2023-12-23 at 23.56.09_1fd1384e.jpg', '130000', 6, '487.500', 'Disetujui', '2023-12-23 17:22:49', 'Start');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promoID` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `diskon` int(2) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`promoID`, `nama`, `gambar`, `kode`, `diskon`, `deskripsi`, `stok`) VALUES
(6, 'Promo Pengguna Baru', 'Proyek Baru 21 [969E5DE].png', 'NEWUSER', 25, 'Hemat lebih dengan diskon eksklusif \r\n25% untuk pemesanan kendaraan pertama \r\nAnda.', 50),
(7, 'Promo Lebaran', 'promo1.jpg', 'EID', 20, 'Dapatkan diskon menarik untuk setiap \r\npemesanan kendaraan selama periode \r\npromo lebaran. Manfaatkan kesempatan \r\nini untuk penghematan yang lebih besar!', 10),
(8, 'Promo Spesial', 'Proyek Baru 25 [308950E].png', 'SPECIAL', 25, 'Hemat lebih dengan diskon \r\nbesar-besaran hingga 25% untuk setiap \r\npemesanan kendaraan selama periode \r\npromo. Kesempatan emas untuk merasakan \r\nkemewahan perjalanan dengan harga \r\nyang sangat terjangkau.', 30),
(9, 'Promo Hari Pahlawan', 'promo2.jpg', 'HERODAYS', 50, 'Sebagai bentuk penghargaan kepada \r\npara pahlawan yang telah berjuang demi \r\nkemerdekaan, kami hadirkan Promo \r\nSpesial Hari Pahlawan!', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `gambarProfile` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` char(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` char(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Buyer','Seller') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `gambarProfile`, `nama`, `no_hp`, `tanggal`, `nik`, `email`, `password`, `role`) VALUES
(11, 'icons8-user-48.png', 'Admin', '0', '2023-12-23', '0', 'admin@gmail.com', '$2y$10$A1pWJBCjgmTnUiG1xR/tI.eBRrffTjGC6omzRfNLybnlQtS45QUiK', 'Seller'),
(13, 'icons8-user-48.png', 'Shafiq', '085974212462', '2005-06-29', '2172022906050003', 'vexonordark@gmail.com', '$2y$10$SAhZib24JrvI4ZRXcQK4xedkpAzw82tolSpzbi6Pe.KjQftyBRsDy', 'Buyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `klaim`
--
ALTER TABLE `klaim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promo_id` (`promo_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`confirm_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`productID`),
  ADD KEY `konfirmasi_ibfk_2` (`promo_id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promoID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `klaim`
--
ALTER TABLE `klaim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `confirm_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `promoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `klaim`
--
ALTER TABLE `klaim`
  ADD CONSTRAINT `klaim_ibfk_1` FOREIGN KEY (`promo_id`) REFERENCES `promo` (`promoID`),
  ADD CONSTRAINT `klaim_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `konfirmasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `konfirmasi_ibfk_3` FOREIGN KEY (`productID`) REFERENCES `kendaraan` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
