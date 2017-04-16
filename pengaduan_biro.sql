/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.16-MariaDB : Database - pengaduan_biro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pengaduan_biro` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pengaduan_biro`;

/*Table structure for table `bagian` */

DROP TABLE IF EXISTS `bagian`;

CREATE TABLE `bagian` (
  `kd_bagian` varchar(10) NOT NULL,
  `nama_bagian` varchar(50) DEFAULT NULL,
  `kd_pic` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kd_bagian`),
  KEY `bagian_ibfk_1` (`kd_pic`),
  CONSTRAINT `bagian_ibfk_1` FOREIGN KEY (`kd_pic`) REFERENCES `pic` (`kd_pic`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bagian` */

insert  into `bagian`(`kd_bagian`,`nama_bagian`,`kd_pic`) values ('1','IT','1'),('10','HRD','1'),('11','LEGAL/CORSEK',NULL),('12','FINANCE',NULL),('123','CS/SC',NULL),('13','GE',NULL),('14','SALES/MARKETING',NULL),('15','RX',NULL),('17','MX',NULL),('2','ME/FASTEK',NULL),('3','TRANSMISI',NULL),('4','LOGISTIK/INVENTORY',NULL),('5','CONTENT',NULL),('6','OAB/MCR',NULL),('7','PROGRAMMING',NULL),('8','SSJ',NULL),('9','PRODUKSI',NULL);

/*Table structure for table `biro` */

DROP TABLE IF EXISTS `biro`;

CREATE TABLE `biro` (
  `kd_biro` varchar(10) NOT NULL,
  `biro` varchar(500) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_biro`),
  KEY `username` (`username`),
  CONSTRAINT `biro_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `biro` */

insert  into `biro`(`kd_biro`,`biro`,`alamat`,`username`) values ('11','Kendari','Jl. Jend. Ahmad Yani No. 80, Gdg Kreasi Lt-2, Kecamatan Mandonga, Kendari, Sulawesi Tenggara 93117',NULL),('12','Kupang','Jl. Wolter Monginsidi , Ruko Lontar Permai, Blok C No 33, Oebobo, Kupang - NTT 85112',NULL),('13','Lampung','Jl. Basuki Rahmat Kel. Sumur Putri Kec Teluk betung Utara',NULL),('14','Magelang','Kampus Akindo, Jl. Laksda Adisucipto No. 279 KM 6,5, Yogyakarta',NULL),('15','Makassar','Jl. Topaz Raya No 4 Panakukang Mas Makasar',NULL),('16','Mamuju','Jl. Musa Karim, Kel. Karema, Kec. Mamuju, Kota Mamuju Provinsi Sulawesi Barat',NULL),('17','Manado','Radio Memora, Jl. Arie Lasut No 125 Manado',NULL),('18','Manokwari','Jl. Palapa Reremi, Manokwari - Papua Barat',NULL),('19','Mataram','JL Nursiwan No 3 Cakranegara Mataram Lombok NTB 83238',NULL),('20','Medan','Jl. Intertip No.1 Simpang, Komplek Wartawan Medan 20329',NULL),('21','Merauke','Jl. Nowari Merauke, Kel. Karang Indah Kec.Merauke Kab. Merauke Prov. Papua',NULL),('22','P Pinang','Jl. Girimaya, Kel. Bukit Besar, Kec. Girimaya. Pangkal Pinang - Bangka Belitung',NULL),('23','P Siantar','Jl. Raya Seribudolok, Kel. Panei Tongah Kec. Panei Tongah-Pematang Siantar',NULL),('24','Padang','Jl. Aur Duri No 60A Padang',NULL),('25','Palangkaraya','JL. Diponegoro No.22A Ruko No. 4 Kel.Kec.Kab. Palangkaraya Prov Kalimantan Tengah',NULL),('26','Palembang','Jl. Hang Jebat No 11 Palembang',NULL),('27','Palu','Jl. Untad 1 Kelurahan Tondo, Kec. Palu Timur. Palu-Prov Sulteng',NULL),('28','Pontianak','Jl. A. Yani, Komplek Ruko A. Yani Megamall Blok E25, Pontianak',NULL),('29','Semarang','Setia Budi Square No 14 & 15, Jl. Setiabudi, Srondol',NULL),('30','Surabaya','Ruko Rich Palace Blok I - 17, Jl Mayjend Sungkono 149 - 151 Surabaya 60225',NULL),('31','Tanah Datar','Jorong Tanjuang Nagari Pandai Sikek Kec. X Koto Kab. Tanah Datar Prov. Sumatera Barat',NULL),('32','Tarakan','Jl. Sei Batu Mapan Rt 003/-- Mamburungan Tarakan Timur, Tarakan - Kaltim',NULL),('33','Tasik Malaya','Jl. Siliwangi No. 105, Tasikmalaya 46115',NULL),('34','Ternate','Jl. Batu Angus Rt. 003/02 Kel. Tafure Kec.Kota Ternate Utara, Kota Ternate Provinsi Maluku Utara',NULL),('4','Bandung','Jl. Terusan Prof DR Ir Sutami Komplek Setra Sari Mall Blok C3 No 9/35',NULL),('6','Batam','Ruko Puri Legenda Blok D3 No. 8 Batam Kota',NULL),('7','Bengkulu','Jl. Raya Bentiring, Simpang Empat Tugu Hiu, Kel. Bentiring, Kec. Muara Bangka Hulu, Kodya Bengkulu.',NULL),('8','Gorontalo','Jl. Raya Limboto No 58 Desa Tuladenggi, Telaga Biru Gorontalo 96181',NULL),('9','Indramayu','Jl. Veteran No. 10, Kel. Lemahabang, Kec. Indramayu, Kab. Indramayu, Provinsi Jawa Barat 45212',NULL);

/*Table structure for table `pengaduan` */

DROP TABLE IF EXISTS `pengaduan`;

CREATE TABLE `pengaduan` (
  `kd_pengaduan` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `judul_permasalahan` varchar(500) DEFAULT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `status` enum('Solved','UnSolved') DEFAULT NULL,
  `kd_bagian` varchar(10) DEFAULT NULL,
  `acc_pic` enum('accept','reject') DEFAULT NULL,
  `note_pic` varchar(500) DEFAULT NULL,
  `tanggapan` varchar(1000) DEFAULT NULL,
  `tanggal_solved` date DEFAULT NULL,
  `time_solving` int(11) DEFAULT NULL,
  `acc_kabiro` enum('accept','reject') DEFAULT NULL,
  `note_kabiro` varchar(500) DEFAULT NULL,
  `solved_by` enum('teknisi','pic') DEFAULT NULL,
  PRIMARY KEY (`kd_pengaduan`),
  KEY `username` (`username`),
  KEY `kd_bagian` (`kd_bagian`),
  CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`kd_bagian`) REFERENCES `bagian` (`kd_bagian`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pengaduan` */

insert  into `pengaduan`(`kd_pengaduan`,`username`,`judul_permasalahan`,`deskripsi`,`tanggal_pengajuan`,`status`,`kd_bagian`,`acc_pic`,`note_pic`,`tanggapan`,`tanggal_solved`,`time_solving`,`acc_kabiro`,`note_kabiro`,`solved_by`) values (2,'user1','Komputer Hangg','Sulit untuk dijelaskan bung','2016-09-13','Solved','1','accept','saya lebih bingung menjelaskan','kalem tuh','2016-09-15',2,'accept','duh mul','teknisi'),(3,'user6','Komputer Hilang','Tidak Luput Dari Dosa','2016-09-14','Solved','1','accept','Duh yah kamu ini','sing sabar atuh jang kalem yeuh','2016-09-15',1,'accept','Sing sabar Bung','teknisi'),(4,'user6','Komputer Rusak','Galau euy','2016-09-13','UnSolved','1',NULL,NULL,NULL,NULL,NULL,'reject','Sing bener blog',NULL),(5,'user6','Komputer meledak','gimana nih kebakaran','2016-09-15','Solved','1','accept','Sing baleg tuh blog keluhan teh','aing bisa ieu mah',NULL,NULL,'accept','sok pic kumaha','pic');

/*Table structure for table `pic` */

DROP TABLE IF EXISTS `pic`;

CREATE TABLE `pic` (
  `kd_pic` varchar(10) NOT NULL,
  `nama_pic` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_pic`),
  KEY `username` (`username`),
  CONSTRAINT `pic_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pic` */

insert  into `pic`(`kd_pic`,`nama_pic`,`username`) values ('1','teknik_1','pic1'),('2','teknik_2',NULL),('3','teknik_3',NULL),('4','teknik_4',NULL),('5','teknik_5',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` enum('administrator','teknisi','user','pic','kabiro') DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `status_akun` enum('Approved','Pending') DEFAULT NULL,
  `kd_biro` varchar(10) DEFAULT NULL,
  `tanggal_register` date DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `kd_bagian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `kd_biro` (`kd_biro`),
  KEY `kd_bagian` (`kd_bagian`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`kd_biro`) REFERENCES `biro` (`kd_biro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`username`,`password`,`level`,`nama`,`email`,`no_telp`,`status_akun`,`kd_biro`,`tanggal_register`,`foto`,`kd_bagian`) values ('admin','21232f297a57a5a743894a0e4a801fc3','administrator','Rian Ganteng','admin@gmail.com','085722180055','Approved','15','2016-08-27',NULL,'1'),('kabiro1','827ccb0eea8a706c4c34a16891f84e7b','kabiro','kabiro1','kabiro1@gmail.com','085722180055','Approved','20','2016-09-13',NULL,'1'),('kabiro2','827ccb0eea8a706c4c34a16891f84e7b','kabiro','kabiro2','kabiro2@gmail.com','085722180055','Approved','22','2016-09-13',NULL,NULL),('kabiro3','827ccb0eea8a706c4c34a16891f84e7b','kabiro','kabiro3','kabiro3@gmail.com','085722180055','Approved','4','2016-09-13',NULL,NULL),('kabiro4','827ccb0eea8a706c4c34a16891f84e7b','kabiro','kabiro4','kabiro4@gmail.com','085722180055','Approved','6','2016-09-13',NULL,NULL),('kabiro5','827ccb0eea8a706c4c34a16891f84e7b','kabiro','kabiro5','kabiro5@gmail.com','085722180055','Approved','8','2016-09-13',NULL,NULL),('pic1','827ccb0eea8a706c4c34a16891f84e7b','pic','pic1','pic1@gmail.com','085722180055','Approved','20','2016-09-13',NULL,'1'),('pic2','827ccb0eea8a706c4c34a16891f84e7b','pic','pic2','pic2@gmail.com','085722180055','Approved','13','2016-09-13',NULL,NULL),('pic3','827ccb0eea8a706c4c34a16891f84e7b','pic','pic3','pic3@gmail.com','085722180055','Approved','21','2016-09-13',NULL,NULL),('pic4','827ccb0eea8a706c4c34a16891f84e7b','pic','pic4','pic4@gmail.com','085722180055','Approved','24','2016-09-13',NULL,NULL),('pic5','827ccb0eea8a706c4c34a16891f84e7b','pic','pic5','pic5@gmail.com','085722180055','Approved','20','2016-09-13',NULL,NULL),('teknisi1','827ccb0eea8a706c4c34a16891f84e7b','teknisi','teknisi1','teknisi1@gmail.com','085722180055','Approved','34','2016-09-13',NULL,'1'),('teknisi2','827ccb0eea8a706c4c34a16891f84e7b','teknisi','teknisi2','teknisi2@gmail.com','085722180055','Approved','4','2016-09-13',NULL,NULL),('teknisi3','827ccb0eea8a706c4c34a16891f84e7b','teknisi','teknisi3','teknisi3@gmail.com','085722180055','Approved','11','2016-09-13',NULL,NULL),('teknisi4','827ccb0eea8a706c4c34a16891f84e7b','teknisi','teknisi4','teknisi4@gmail.com','085722180055','Approved','12','2016-09-13',NULL,NULL),('teknisi5','827ccb0eea8a706c4c34a16891f84e7b','teknisi','teknisi5','teknisi5@gmail.com','085722180055','Approved','15','2016-09-13',NULL,NULL),('user1','827ccb0eea8a706c4c34a16891f84e7b','user','user1','user1@gmail.com','085722180055','Approved','4','2016-09-13',NULL,NULL),('user2','827ccb0eea8a706c4c34a16891f84e7b','user','user2','user2@gmail.com','085722180055','Approved','4','2016-09-13',NULL,NULL),('user3','827ccb0eea8a706c4c34a16891f84e7b','user','user3','user3@gmail.com','085722180055','Approved','6','2016-09-13',NULL,NULL),('user4','827ccb0eea8a706c4c34a16891f84e7b','user','user4','user4@gmail.com','085722180055','Approved','6','2016-09-13',NULL,NULL),('user5','827ccb0eea8a706c4c34a16891f84e7b','user','user5','user5@gmail.com','085722180055','Approved','7','2016-09-13',NULL,NULL),('user6','827ccb0eea8a706c4c34a16891f84e7b','user','user6','user6@gmail.com','085722180055','Approved','20','2016-09-14',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
