-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2022 at 01:19 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

DROP TABLE IF EXISTS `admission`;
CREATE TABLE IF NOT EXISTS `admission` (
  `admission_id` int(5) NOT NULL AUTO_INCREMENT,
  `bed_id` int(5) NOT NULL,
  `patient_id` int(5) NOT NULL,
  `doctor_id` int(5) NOT NULL,
  `diagnosis` varchar(50) DEFAULT NULL,
  `complaint` varchar(80) NOT NULL,
  `admissiondate` date DEFAULT NULL,
  PRIMARY KEY (`admission_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `bed_id` (`bed_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admission_id`, `bed_id`, `patient_id`, `doctor_id`, `diagnosis`, `complaint`, `admissiondate`) VALUES
(1, 1, 1, 1, 'food poisoning', 'fever,vomiting weakness abdominal cramps.', '2021-01-04'),
(2, 1, 11, 1, 'food poisoning', 'fever,vomiting weakness abdominal cramps.', '2022-04-06'),
(3, 3, 3, 2, 'jaundice\r\n', 'fever, chills, change skin color', '2021-05-12'),
(4, 4, 3, 1, NULL, 'patches of dark skin , always feeling hungry\r\n& pain in the hands or feet.\r\n', '2021-03-11'),
(5, 5, 4, 2, 'heart failure.', 'pain in chest,neck,arms, back sleep disturbance.', '2021-01-12'),
(7, 1, 1, 1, NULL, 'Fever', '2022-03-24'),
(11, 3, 4, 4, NULL, 'headache, running noise, high fever', '2022-04-01'),
(15, 1, 11, 1, 'pneumonia', 'headache, running noise, high fever', '2022-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

DROP TABLE IF EXISTS `bed`;
CREATE TABLE IF NOT EXISTS `bed` (
  `bed_id` int(5) NOT NULL AUTO_INCREMENT,
  `bed_no` int(10) NOT NULL,
  `room_id` int(5) NOT NULL,
  PRIMARY KEY (`bed_id`),
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`bed_id`, `bed_no`, `room_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 3),
(5, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(10) NOT NULL,
  `visiting` varchar(10) NOT NULL,
  `doctorcharge` int(4) NOT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `name`, `qualification`, `address`, `gender`, `mobile_no`, `email`, `password`, `visiting`, `doctorcharge`) VALUES
(1, 'ravisharma', 'md [ medical dermatology]', 'narol', 'Male', 1234567889, 'ravi@gmail.com', 'ravi@2002', '0', 1000),
(2, 'sweta', 'ms[orthopaedic surgeon]', 'maninagar', 'Female', 1234564555, 'Sweta@gmail.com', 'Sweta@009', '1', 2000),
(3, 'saba khan', 'mbbs', 'isanpur', 'Female', 231456732, 'saba@gmail.com', '......', '0', 1000),
(4, 'uzma shaikh', 'bpt [ physiotherapy]', 'ghogasar', 'Female', 1234565632, 'uzma@gmail.com', '.....', '0', 3000),
(5, 'aazad shaikh', 'md [orthopaedics]', 'maninagar', 'Male', 341562198, 'aazad@gmail.com', '......', '1', 2000),
(8, 'sana', 'md', 'ayodhyanagar', 'Female', 1123454, 'sana@email.com', 'sana@sana', '1', 200),
(10, 'kasu', 'MD', 'vasana', 'Male', 777987125, 'kasu@email.com', 'kasu@2001', '0', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `doctorvisit`
--

DROP TABLE IF EXISTS `doctorvisit`;
CREATE TABLE IF NOT EXISTS `doctorvisit` (
  `doctorvisit_id` int(5) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(5) NOT NULL,
  `admission_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(20) NOT NULL,
  PRIMARY KEY (`doctorvisit_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `ad_id` (`admission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorvisit`
--

INSERT INTO `doctorvisit` (`doctorvisit_id`, `doctor_id`, `admission_id`, `date`, `purpose`) VALUES
(2, 3, 2, '2021-09-02', 'skin allergy'),
(3, 4, 3, '2020-05-12', 'back problems'),
(6, 1, 11, '2021-04-04', 'medicine allergy');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `medicine_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `brand` varchar(15) NOT NULL,
  `storageinstruction` varchar(20) NOT NULL,
  `medicinetype_id` int(5) NOT NULL,
  `packing` varchar(30) NOT NULL,
  `price` int(4) NOT NULL,
  PRIMARY KEY (`medicine_id`),
  KEY `medicinetype_id` (`medicinetype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `name`, `brand`, `storageinstruction`, `medicinetype_id`, `packing`, `price`) VALUES
(1, 'metacin', 'kedila', 'room tamperature', 1, '15ml[bottle]', 33),
(2, 'paraceta 500mg', 'sunfarm', 'room tamperature', 2, '10[tablet]', 75),
(3, 'cephalexin 250mg', 'cefalix', 'cool&dry place', 3, '6[capsule]', 65),
(4, 'ceftriaxone', 'delex pharm', 'room tamperature', 4, '1gm[injection]', 56),
(7, 'clotrimazole cream', 'cadila', 'room tamperature', 1, '15g[cream]', 180);

-- --------------------------------------------------------

--
-- Table structure for table `medicineallocation`
--

DROP TABLE IF EXISTS `medicineallocation`;
CREATE TABLE IF NOT EXISTS `medicineallocation` (
  `medicineallocation_id` int(5) NOT NULL AUTO_INCREMENT,
  `admission_id` int(10) NOT NULL,
  `medicine_id` int(20) NOT NULL,
  `quantity` int(40) NOT NULL,
  `allocationdate` date NOT NULL,
  PRIMARY KEY (`medicineallocation_id`),
  KEY `medicine_allocation_ibfk_1` (`medicine_id`),
  KEY `Admission_id` (`admission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicineallocation`
--

INSERT INTO `medicineallocation` (`medicineallocation_id`, `admission_id`, `medicine_id`, `quantity`, `allocationdate`) VALUES
(2, 2, 1, 10, '2021-09-02'),
(3, 3, 3, 6, '2021-05-12'),
(4, 3, 4, 5, '2021-03-11'),
(5, 11, 2, 15, '2021-01-12'),
(7, 11, 4, 15, '2021-05-05'),
(8, 1, 3, 1, '2022-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `medicinetype`
--

DROP TABLE IF EXISTS `medicinetype`;
CREATE TABLE IF NOT EXISTS `medicinetype` (
  `medicinetype_id` int(5) NOT NULL AUTO_INCREMENT,
  `medicinetype` varchar(20) NOT NULL,
  PRIMARY KEY (`medicinetype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicinetype`
--

INSERT INTO `medicinetype` (`medicinetype_id`, `medicinetype`) VALUES
(1, 'drop'),
(2, 'tablet'),
(3, 'capsule'),
(4, 'Injection'),
(5, 'drop');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `weight` int(10) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(12) DEFAULT NULL,
  `medicalhistory` varchar(30) NOT NULL,
  `dob` date DEFAULT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `otherdetails` varchar(50) DEFAULT NULL,
  `familyhistory` varchar(30) DEFAULT NULL,
  `habits` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `name`, `weight`, `gender`, `address`, `phone`, `medicalhistory`, `dob`, `bloodgroup`, `otherdetails`, `familyhistory`, `habits`) VALUES
(1, 'kasu', 35, NULL, 'naroda', 1234543234, 'pneumonia', '2001-12-02', 'A+', 'food allergy', 'BP', 'smoking'),
(2, 'karan', 40, 'Male', 'narol', 345645897, 'acidity', '1997-09-12', 'o-', 'smell of allergy', 'bp', 'drugs'),
(3, 'ami', 55, 'Female', 'vastral', 1235743885, 'bp', '2013-08-12', 'b+', 'food llergy', 'pneumonia', 'Drinking'),
(4, 'parth', 30, 'Female', 'ghodasar', 9997656, 'diabetes', '2007-06-22', 'o+', 'food allergy', 'jaundice', 'Drinking'),
(5, 'sweta', 49, 'Female', 'maninagar', 238718832, 'bp', '2021-12-30', 'ab+', 'allergy of smoking', 'bp', 'smoking'),
(8, 'kanjal', 60, NULL, '14,aaradhna duplex, ghodasar, ahmedabad.', 998765454, 'Acidity', '1990-12-12', '-o', 'smell of alleragy', 'BP', 'Drugs'),
(11, 'gaurang', 60, 'Male', '99, ayodhyanagar nr,baroda express highway  ramol road c.t.m.,ahmedabad', 898923464, 'pneumonia', '2021-09-10', 'A', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patientbilling`
--

DROP TABLE IF EXISTS `patientbilling`;
CREATE TABLE IF NOT EXISTS `patientbilling` (
  `bill_id` int(5) NOT NULL AUTO_INCREMENT,
  `admission_id` int(5) NOT NULL,
  `bill_date` date NOT NULL,
  `no_of_days` int(10) NOT NULL,
  `bedcharge` int(4) NOT NULL,
  `doctorcharge` int(4) NOT NULL,
  `nursingcharge` int(4) NOT NULL,
  `medicinecharge` int(4) NOT NULL,
  `testcharge` int(4) DEFAULT NULL,
  `doctorvisitcharge` int(4) DEFAULT NULL,
  `total` int(4) NOT NULL,
  PRIMARY KEY (`bill_id`),
  KEY `admission_id` (`admission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientbilling`
--

INSERT INTO `patientbilling` (`bill_id`, `admission_id`, `bill_date`, `no_of_days`, `bedcharge`, `doctorcharge`, `nursingcharge`, `medicinecharge`, `testcharge`, `doctorvisitcharge`, `total`) VALUES
(1, 1, '2021-01-11', 7, 1400, 3500, 2800, 400, 70, 3000, 11170),
(2, 2, '2021-09-15', 13, 1950, 5200, 3900, 300, 200, 2000, 13550),
(21, 2, '2022-04-18', 12, 59850, 159600, 119700, 2000, 500, 1000, 339150),
(25, 11, '2022-04-13', 13, 2600, 6500, 5200, 1965, 269, 1000, 17534),
(29, 15, '2022-01-04', 105, 21000, 52500, 42000, 0, 0, 0, 115500);

-- --------------------------------------------------------

--
-- Table structure for table `patientdischarge`
--

DROP TABLE IF EXISTS `patientdischarge`;
CREATE TABLE IF NOT EXISTS `patientdischarge` (
  `patientdischarge_id` int(5) NOT NULL AUTO_INCREMENT,
  `admission_id` int(5) NOT NULL,
  `dischargedate` date NOT NULL,
  `diagnosis` varchar(20) NOT NULL,
  `treatmentdescription` varchar(110) NOT NULL,
  `advicedescription` varchar(100) NOT NULL,
  PRIMARY KEY (`patientdischarge_id`),
  KEY `admission_id` (`admission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientdischarge`
--

INSERT INTO `patientdischarge` (`patientdischarge_id`, `admission_id`, `dischargedate`, `diagnosis`, `treatmentdescription`, `advicedescription`) VALUES
(1, 3, '2021-01-11', 'food poisoning', 'supportive care( improvement, oral rehydration solution(ors))', 'eat fruit and vegetable, don’t eat junk food.'),
(2, 1, '2021-09-15', 'pneumonia\r\n', 'medications(antibiotics and penicillin)supportive care (oxygen therapy,oral rehydration therapy and iv fluids)', 'eat green vegetables , fruit & fish.'),
(3, 3, '2021-05-25', 'jaundice\r\n', 'suggest Rest.', 'drink at least eight glasses of fluids per day, You have to add milk in your routine.'),
(4, 3, '2021-03-22', 'diabetes mellitus\r\n', 'diet, exercise, medication and insulin therapy.', 'healthy diet, exercising and maintaining a body weight.taking medicine if prescribed.'),
(5, 4, '2022-04-01', 'heart Attack', 'supportive cagre , medications, medical procedure, therapies, surgery(bypass surgery)', 'don’t smoke, don’t drink  alcohol.'),
(7, 11, '2022-04-13', 'food posoning', 'suggest rest.', 'don\'t drink and smoke');

-- --------------------------------------------------------

--
-- Table structure for table `patienttest`
--

DROP TABLE IF EXISTS `patienttest`;
CREATE TABLE IF NOT EXISTS `patienttest` (
  `patienttest_id` int(5) NOT NULL AUTO_INCREMENT,
  `admission_id` int(10) NOT NULL,
  `test_id` int(5) NOT NULL,
  `datetime` datetime NOT NULL,
  `reportdescription` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`patienttest_id`),
  KEY `admission_id` (`admission_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patienttest`
--

INSERT INTO `patienttest` (`patienttest_id`, `admission_id`, `test_id`, `datetime`, `reportdescription`) VALUES
(1, 1, 1, '2021-01-04 11:00:00', 'suger level is 225 high.'),
(2, 3, 2, '2021-11-02 11:30:00', 'normal'),
(3, 4, 3, '2021-11-02 12:00:00', NULL),
(4, 11, 4, '2021-11-02 11:00:00', '  normal 12.O to 15.5 '),
(5, 11, 1, '2022-03-01 18:18:00', 'naral'),
(6, 15, 1, '2022-01-04 00:07:00', 'suger level is 225 high');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(5) NOT NULL AUTO_INCREMENT,
  `room_no` int(10) NOT NULL,
  `roomtype_id` int(5) NOT NULL,
  `no_of_beds` int(10) NOT NULL,
  `ward_id` int(5) NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `ward_id` (`ward_id`),
  KEY `roomtype_id` (`roomtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_no`, `roomtype_id`, `no_of_beds`, `ward_id`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 1, 1, 2),
(3, 3, 2, 2, 2),
(4, 4, 3, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

DROP TABLE IF EXISTS `roomtype`;
CREATE TABLE IF NOT EXISTS `roomtype` (
  `roomtype` varchar(15) NOT NULL,
  `roomtype_id` int(5) NOT NULL AUTO_INCREMENT,
  `nursingcharge` int(4) NOT NULL,
  `doctorcharge` int(4) NOT NULL,
  `bedcharge` int(4) NOT NULL,
  PRIMARY KEY (`roomtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`roomtype`, `roomtype_id`, `nursingcharge`, `doctorcharge`, `bedcharge`) VALUES
('special ', 1, 400, 500, 200),
('semi-special', 2, 300, 400, 150),
('icu', 3, 800, 1000, 500),
('general', 4, 200, 300, 100),
('ICU', 7, 300, 900, 100);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `gender`, `email`, `password`, `designation`, `qualification`, `address`) VALUES
(1, 'mohit', 'Male', 'mohit@gmail.com', 'mohit@009', 'nursing', 'nursing course', 'narol'),
(2, 'gaurang', 'Male', 'gaurangvadthaliya@gmail.com', '......', 'telly course', 'accounting', 'ayodhyanagar'),
(3, 'manvi', 'Female', 'manvi@gmail.com', '......', '12 pass', 'nursing', 'narol'),
(4, 'riva', 'Female', 'riva@gmail.com', '......', 'nursing course', 'nursing', 'ghodasar'),
(8, 'kinjal', 'Female', 'kinjal@email.com', '......', '12 pass', 'telly', 'amrevadi'),
(9, 'kasu', 'Male', 'kasu@gmail.com', 'kasu@12', '12 pass', 'account', 'naroda'),
(13, 'khushbu', 'Female', 'khushbu@gmail.com', '567489', 'accounting', 'telly course', 'ramol');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(130) NOT NULL,
  `testcharge` int(4) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `name`, `description`, `testcharge`) VALUES
(1, 'diabetes test\r\n\r\n', 'this test measure your blood sugar level.\r\n', 70),
(2, 'sonography \r\ntest\r\n', 'an Sonography test is a medical test that use high-frequency sound waves to capture live images from the inside of your body.\r\n', 600),
(3, 'ecg', 'ECG test that can used to check your heart’s rhythm and electrical activity.\r\n', 255),
(4, 'tuberculosis skin test\r\n', 'this test to see if you have ever been exposed to tuberculosis. \r\n', 199),
(5, 'haemoglobin blood test\r\n', 'this test measure the amount of hemoglobin in your blood.\r\n', 500);

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

DROP TABLE IF EXISTS `treatment`;
CREATE TABLE IF NOT EXISTS `treatment` (
  `treatment_id` int(5) NOT NULL AUTO_INCREMENT,
  `admission_id` int(5) NOT NULL,
  `medicine_id` int(5) NOT NULL,
  `instructions` varchar(30) NOT NULL,
  `treatmentdate` date NOT NULL,
  PRIMARY KEY (`treatment_id`),
  KEY `medicine_id` (`medicine_id`),
  KEY `admission_id` (`admission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treatment_id`, `admission_id`, `medicine_id`, `instructions`, `treatmentdate`) VALUES
(1, 1, 1, '1-0-0', '2021-01-04'),
(2, 1, 2, '1-1-1 with milk', '2021-01-04'),
(3, 3, 3, '1-1-0', '2021-05-12'),
(4, 3, 4, '1-1-1', '2021-05-12'),
(8, 11, 3, '1-0-1', '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

DROP TABLE IF EXISTS `ward`;
CREATE TABLE IF NOT EXISTS `ward` (
  `ward_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`ward_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`ward_id`, `name`) VALUES
(1, 'male ward'),
(2, 'female ward\r\n'),
(3, 'General Ward'),
(4, 'icu'),
(7, 'New General Ward');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission`
--
ALTER TABLE `admission`
  ADD CONSTRAINT `admission_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `admission_ibfk_2` FOREIGN KEY (`bed_id`) REFERENCES `bed` (`bed_id`),
  ADD CONSTRAINT `admission_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `bed`
--
ALTER TABLE `bed`
  ADD CONSTRAINT `bed_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

--
-- Constraints for table `doctorvisit`
--
ALTER TABLE `doctorvisit`
  ADD CONSTRAINT `doctorvisit_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `doctorvisit_ibfk_2` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`admission_id`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`medicinetype_id`) REFERENCES `medicinetype` (`medicinetype_id`);

--
-- Constraints for table `medicineallocation`
--
ALTER TABLE `medicineallocation`
  ADD CONSTRAINT `medicineallocation_ibfk_1` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`),
  ADD CONSTRAINT `medicineallocation_ibfk_2` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`admission_id`);

--
-- Constraints for table `patientbilling`
--
ALTER TABLE `patientbilling`
  ADD CONSTRAINT `patientbilling_ibfk_1` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`admission_id`);

--
-- Constraints for table `patientdischarge`
--
ALTER TABLE `patientdischarge`
  ADD CONSTRAINT `patientdischarge_ibfk_1` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`admission_id`);

--
-- Constraints for table `patienttest`
--
ALTER TABLE `patienttest`
  ADD CONSTRAINT `patienttest_ibfk_1` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`admission_id`),
  ADD CONSTRAINT `patienttest_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`),
  ADD CONSTRAINT `patienttest_ibfk_3` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`),
  ADD CONSTRAINT `patienttest_ibfk_4` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`ward_id`) REFERENCES `ward` (`ward_id`),
  ADD CONSTRAINT `room_ibfk_3` FOREIGN KEY (`roomtype_id`) REFERENCES `roomtype` (`roomtype_id`);

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`),
  ADD CONSTRAINT `treatment_ibfk_2` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`admission_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
