/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.13-MariaDB : Database - db_rsdjamil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `table_account` */

DROP TABLE IF EXISTS `table_account`;

CREATE TABLE `table_account` (
  `id` char(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL COMMENT '0 = Admin Radiologi | 1 = Dokter Pengantar | 2 = Dokter Radiologi',
  `status` char(11) DEFAULT '1' COMMENT '0 = Blokir | 1 = Aktif',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_account` */

insert  into `table_account`(`id`,`email`,`password`,`role`,`status`,`create_at`) values 
('R0002','indra@gmail.com','21232f297a57a5a743894a0e4a801fc3',2,'1','2021-07-26 15:01:26'),
('R0001','ratih@gmail.com','21232f297a57a5a743894a0e4a801fc3',2,'1','2021-07-26 15:04:12'),
('D0001','ikhsan@gmail.com','21232f297a57a5a743894a0e4a801fc3',1,'1','2021-07-26 15:12:29'),
('D0002','dani_ramadhan@gmail.com','21232f297a57a5a743894a0e4a801fc3',1,'1','2021-07-26 15:14:10'),
('A0001','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3',0,'1','2021-07-18 21:01:32'),
('A0002','balmond@gmail.com','21232f297a57a5a743894a0e4a801fc3',0,'1','2021-07-26 12:22:02');

/*Table structure for table `table_admin` */

DROP TABLE IF EXISTS `table_admin`;

CREATE TABLE `table_admin` (
  `id` char(10) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_admin` */

insert  into `table_admin`(`id`,`name`,`phone`,`address`) values 
('A0001','Tonny Mulyadi','081388946311','Jl. Perumnas Belimbing No 109'),
('A0002','Balmond Ali Amran','081399028833','Jl. Sisingamaharaja X No 2');

/*Table structure for table `table_doctor` */

DROP TABLE IF EXISTS `table_doctor`;

CREATE TABLE `table_doctor` (
  `id` char(10) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_doctor` */

insert  into `table_doctor`(`id`,`name`,`phone`,`address`) values 
('D0001','dr. Muhammad Ikhsan','083188993375','Komp. Parupuk Tabing Blok H 9 Padang'),
('D0002','dr. Trihamdani Ramadhan','087768920022','Jl. Balimbing Utara No 11 C');

/*Table structure for table `table_doctor_radiology` */

DROP TABLE IF EXISTS `table_doctor_radiology`;

CREATE TABLE `table_doctor_radiology` (
  `id` char(10) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_doctor_radiology` */

insert  into `table_doctor_radiology`(`id`,`name`,`phone`,`address`) values 
('R0001','dr. Ratih Suciana, Sp. Rad','085277864328','Jl. Jendral Sudirman No 188'),
('R0002','dr. Indra Kuncoro, Sp. Rad','081388009311','Komp. Mega Permai Indah 9 Padang');

/*Table structure for table `table_film` */

DROP TABLE IF EXISTS `table_film`;

CREATE TABLE `table_film` (
  `id` char(10) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_film` */

insert  into `table_film`(`id`,`size`) values 
('F0001','8x10'),
('F0002','11x14'),
('F0003','14x17');

/*Table structure for table `table_handling` */

DROP TABLE IF EXISTS `table_handling`;

CREATE TABLE `table_handling` (
  `id` char(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `film` char(10) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_handling` */

insert  into `table_handling`(`id`,`name`,`film`,`amount`) values 
('T0001','CT Scan','F0001','50000'),
('T0002','Rontgen','F0003','190000');

/*Table structure for table `table_patient` */

DROP TABLE IF EXISTS `table_patient`;

CREATE TABLE `table_patient` (
  `mr_number` char(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `place_of_birth` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` char(10) DEFAULT NULL,
  `room` char(10) DEFAULT NULL,
  `doctor` char(10) DEFAULT NULL,
  `radiology_doctor` char(10) DEFAULT NULL,
  PRIMARY KEY (`mr_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_patient` */

insert  into `table_patient`(`mr_number`,`name`,`place_of_birth`,`date_of_birth`,`gender`,`room`,`doctor`,`radiology_doctor`) values 
('MR0001','Anita Hara','Jakarta','1991-01-06','Wanita','R0002','D0001','R0002'),
('MR0002','Muhammad Faizin','Alahan Panjang','1997-06-30','Pria','R0001','D0001','R0001');

/*Table structure for table `table_radiological_image` */

DROP TABLE IF EXISTS `table_radiological_image`;

CREATE TABLE `table_radiological_image` (
  `id` char(10) NOT NULL,
  `mr_number` char(10) DEFAULT NULL,
  `handling` char(10) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0 = Belum baca',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_radiological_image` */

insert  into `table_radiological_image`(`id`,`mr_number`,`handling`,`file`,`status`) values 
('RAD0002','MR0001','T0001','b3aaa7cce3e7c2f5e9da5bf6fb977d15.jpeg',0),
('RAD0003','MR0002','T0002','4b86f435cbdb83698f004369c9411594.jpeg',0);

/*Table structure for table `table_radiology_reading` */

DROP TABLE IF EXISTS `table_radiology_reading`;

CREATE TABLE `table_radiology_reading` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radiology` char(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_radiology_reading` */

/*Table structure for table `table_room` */

DROP TABLE IF EXISTS `table_room`;

CREATE TABLE `table_room` (
  `id` char(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_room` */

insert  into `table_room`(`id`,`name`,`create_at`) values 
('R0001','IGD','2021-07-25 18:47:03'),
('R0002','Bangsal','2021-07-27 18:19:36');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
