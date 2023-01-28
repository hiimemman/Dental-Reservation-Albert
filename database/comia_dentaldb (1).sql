-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221227.666ba48dc9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 02:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comia_dentaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `firstname`, `lastname`, `username`, `password`, `profile_image`, `role`) VALUES
(9, 'Charriz', 'Comia', 'charriz_comia', 'd27ecda529e80508ee95301092cc8cd8', 'profile.png', 'DENTIST'),
(12, 'Camille', ' Tubo', 'admin', 'b0dc5be3a5ac529022294740086a4725', 'profile.png', 'ADMIN'),
(17, 'christina', 'comia', 'christina_', '958d6dd51bb50f24ec021a8beb94e9af', '63b7f166c10a4.jpg', 'DENTIST');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `service` varchar(255) NOT NULL,
  `dentist` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `date_completed` date NOT NULL,
  `time_completed` time NOT NULL,
  `reason` varchar(255) NOT NULL,
  `reason2` varchar(55) NOT NULL,
  `request` text NOT NULL,
  `diagram` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointment_id`, `user_id`, `firstname`, `lastname`, `gender`, `age`, `contact`, `appointment_date`, `appointment_time`, `service`, `dentist`, `status`, `description`, `payment`, `date_completed`, `time_completed`, `reason`, `reason2`, `request`, `diagram`) VALUES
(122, 90, 'Camille', 'Tubo', 'Female', 22, '9758256398', '2023-01-16', '09:00:00', 'Orthodontic Treatment', '', 'CANCELLED', '', 0.00, '0000-00-00', '00:00:00', '', 'Missed Appointment/The Patient Did not show up', '', ''),
(123, 90, 'Cha', 'Myoui', 'Female', 18, '9758256398', '2023-01-15', '16:00:00', 'Tooth Extraction ', '', 'CANCELLED', '', 0.00, '0000-00-00', '00:00:00', '', 'The Dentist is in Vacation', '', ''),
(124, 90, 'kim', 'Nam', 'Male', 26, '9758256398', '2023-01-17', '10:00:00', 'Removal of Wisdom Tooth ', 'Dr. Charriz Comia', 'COMPLETED', 'Dental caries', 6500.00, '2023-01-15', '22:08:35', '', '', '', '12, 32 -            coL                    C2'),
(125, 90, 'Rebecca', 'Dee', 'Female', 26, '9758256398', '2023-01-16', '00:00:00', 'Tooth Filling ', '', 'CANCELLED', '', 0.00, '0000-00-00', '00:00:00', '', 'Family Emergency', '', ''),
(126, 91, 'jeric', 'anasco', 'Male', 21, '9506776468', '2023-01-15', '16:02:00', 'Removal of Wisdom Tooth ', 'Dr. Charriz Comia', 'COMPLETED', 'assa', 1455.00, '2023-01-15', '16:58:46', '', '', '', '1 - C                               '),
(127, 92, 'Harvey', 'Gultiano', 'Male', 25, '9075594604', '2023-01-17', '10:27:00', 'Consultation/Check up , Tooth Filling ', 'Dr. Charriz Comia', 'COMPLETED', 'Prophylaxis Cleaning', 1000.00, '2023-01-16', '11:14:04', '', '', '9:00 pm', '1, 2 - tooth extrated cleaned                              '),
(128, 92, 'Harvey', 'Gultiano', 'Male', 18, '9075594604', '2023-01-27', '09:00:00', 'Tooth Filling ', 'Dr. Charriz Comia', 'COMPLETED', 'asda', 123.00, '2023-01-23', '11:57:56', '', '', '22', '2 - Col'),
(129, 90, 'Camille', 'Tubo', 'Female', 22, '9758256398', '2023-01-17', '10:00:00', 'Orthodontic Treatment', 'Dr. Charriz Comia', 'COMPLETED', 'Bridge Abutment', 8500.00, '2023-01-16', '16:07:12', '', '', '', '32 -                                A Bt'),
(130, 90, 'Juan', 'Dela Cruz', 'Female', 25, '9758256398', '2023-01-18', '15:00:00', 'Removal of Wisdom Tooth ', 'Dr. christina comia', 'COMPLETED', 'missing one tooth', 8500.00, '2023-01-16', '16:44:15', '', '', 'Hi, Can i Request an appointment at 3:00 pm?', '18, 32 -                  M              C'),
(131, 90, 'Shani', 'Mi', 'Female', 26, '9758256398', '2023-01-17', '13:00:00', 'Removal of Wisdom Tooth ', 'Dr. Charriz Comia', 'COMPLETED', 'Tooth Decay', 1500.00, '2023-01-19', '13:49:57', '', '', '', '1, 10, 14 - C         GIC    PJC                  '),
(132, 90, 'Camille', 'Tubo', 'Female', 22, '9758256398', '2023-01-16', '09:00:00', 'Consultation/Check up ', 'Dr. Charriz Comia', 'COMPLETED', 'Dental x-ray - loss of bone', 600.00, '2023-01-16', '18:46:02', '', '', '', '29 -                             C1   '),
(133, 95, 'Jeric', 'Valderama', 'Male', 21, '9123422315', '2023-01-18', '13:02:00', 'Teeth Withening , Removal of Wisdom Tooth ', 'Dr. Charriz Comia', 'COMPLETED', 'asda', 123.00, '2023-01-23', '11:57:30', '', '', '', '4 - CA'),
(134, 90, 'Camille', 'Tubo', 'Female', 23, '9758256398', '2023-01-18', '16:00:00', 'Tooth Extraction ', 'Dr. christina comia', 'COMPLETED', 'pulling one tooth out ', 1300.00, '2023-01-18', '15:59:40', '', '', '', '13 -                                '),
(135, 98, 'Edi', 'Wow', 'Male', 16, '9959603361', '2023-01-31', '10:24:00', 'Tooth Filling ', 'Dr. Charriz Comia', 'COMPLETED', 'Hello', 250.00, '2023-01-19', '19:27:51', '', '', '', '2, 3, 4 -                                '),
(136, 90, 'Camille', 'Tubo', 'Female', 26, '9758256398', '2023-01-19', '14:00:00', 'Tooth Extraction ', 'Dr. Charriz Comia', 'COMPLETED', 'sample', 123.00, '2023-01-23', '12:39:11', '', '', '', '1 - M - Missing due to Extraction'),
(137, 97, 'Zed', 'Sanopao', 'Male', 22, '9556070854', '2023-01-20', '13:05:00', 'Consultation/Check up , Tooth Filling ', 'Dr. Charriz Comia', 'COMPLETED', 'filled with dentures', 320.00, '2023-01-20', '13:17:56', '', '', 'I dont have teeth no more', '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32 - filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled filled'),
(138, 97, 'Zed', 'Sanopao', 'Male', 22, '9556070854', '2023-01-20', '14:00:00', 'Consultation/Check up ', 'Dr. Charriz Comia', 'COMPLETED', 'asda', 1234.00, '2023-01-23', '12:40:06', '', '', '', '8 - M - Missing due to Extraction'),
(139, 90, 'Kiefer', 'Labrador', 'Male', 4, '9758256398', '2023-01-23', '09:00:00', 'Tooth Filling ', 'Dr. Charriz Comia', 'COMPLETED', 'asdaa', 123.00, '2023-01-23', '11:52:15', '', '', '', '1 - C         '),
(140, 99, 'amiya', 'gonzales', 'Male', 2, '9758256398', '2023-01-23', '13:00:00', 'Consultation/Check up ', 'Dr. Charriz Comia', 'COMPLETED', 'asda', 123.00, '2023-01-23', '11:55:37', '', '', '', '1 - Col Select Select Select Select Select Select Select Select Select'),
(141, 91, 'jeric', 'anasco', 'Male', 21, '9506776468', '2023-02-16', '10:00:00', 'Tooth Extraction , Tooth Crowns/Bridges ', '', 'CONFIRMED', '', 0.00, '0000-00-00', '00:00:00', '', '', '', ''),
(142, 91, 'jeric', 'anasco', 'Male', 7, '9506776468', '2023-01-25', '11:00:00', 'Tooth Crowns/Bridges , Removal of Wisdom Tooth ', '', 'CONFIRMED', '', 0.00, '0000-00-00', '00:00:00', '', '', '', ''),
(143, 91, 'Babyu', 'Tooth', 'Male', 6, '9506776468', '2023-01-26', '12:00:00', 'Oral Prophylaxis, Orthodontic Treatment', '', 'CONFIRMED', '', 0.00, '0000-00-00', '00:00:00', '', '', '', ''),
(144, 99, 'amiya', 'gonzales', 'Female', 2, '9758256398', '2023-01-23', '16:06:00', 'Tooth Filling ', '', 'CONFIRMED', '', 0.00, '0000-00-00', '00:00:00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_img`
--

CREATE TABLE `tbl_img` (
  `id` int(11) NOT NULL,
  `title` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_img`
--

INSERT INTO `tbl_img` (`id`, `title`, `img`) VALUES
(1, 'logo', ''),
(2, 'about', '../assets/img/comia2.jpg'),
(3, 'about', '../assets/img/dentist_2.png'),
(4, 'about', '../assets/img/Dentist_3.jpg'),
(5, 'protocols', '../assets/img/protocol_1.png'),
(6, 'protocols', '../assets/img/protocal_2.png'),
(10, 'tooth', '../assets/img/babytooth.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inq`
--

CREATE TABLE `tbl_inq` (
  `id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_inq`
--

INSERT INTO `tbl_inq` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Paul', 'ggwp@gmail.com', 'Inquires', 'Sample text'),
(2, 'dfsaf', 'jessicapoquiancodillo09@gmail.com', 'inquire', 'hahaha'),
(3, 'sample', 'sample@gmail.com', 'Sample', 'Sample'),
(4, 'jeric', 'jericvalderama5@gmail.com', 'Sample', 'Good to have an appointment online.'),
(5, 'Jeric', 'jericvalderama5@gmail.com', 'Sample', 'Good to have an appointment online.'),
(6, 'WilliamBeent', 'no.reply.Dib@gmail.com', 'A new method of email distribution.', 'Hi!  comia-dental-clinic.online \r\n \r\nDid yоu knоw thаt it is pоssiblе tо sеnd lеttеr uttеrly lаwfully? \r\nWе оffеr а nеw lеgitimаtе mеthоd оf sеnding rеquеst thrоugh fееdbасk fоrms. Suсh fоrms аrе lосаtеd оn mаny sitеs. \r\nWhеn suсh businеss оffеrs аrе sеnt, nо pеrsоnаl dаtа is usеd, аnd mеssаgеs аrе sеnt tо fоrms spесifiсаlly dеsignеd tо rесеivе mеssаgеs аnd аppеаls. \r\nаlsо, mеssаgеs sеnt thrоugh соmmuniсаtiоn Fоrms dо nоt gеt intо spаm bесаusе suсh mеssаgеs аrе соnsidеrеd impоrtаnt. \r\nWе оffеr yоu tо tеst оur sеrviсе fоr frее. Wе will sеnd up tо 50,000 mеssаgеs fоr yоu. \r\nThе соst оf sеnding оnе milliоn mеssаgеs is 59 USD. \r\n \r\nThis оffеr is сrеаtеd аutоmаtiсаlly. Plеаsе usе thе соntасt dеtаils bеlоw tо соntасt us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWe only use chat.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_legend`
--

CREATE TABLE `tbl_legend` (
  `id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_legend`
--

INSERT INTO `tbl_legend` (`id`, `name`) VALUES
(1, 'C - Dental Caries'),
(2, 'C1 - Dental Caries With Vital Pulp Expose'),
(3, 'C2 - Dental Caries With Non-Vital Pulp Exposee'),
(4, 'R.F - Indicated for Extraction'),
(5, 'AM - Amalgam Filling'),
(6, 'Col - Composite Inlay'),
(7, 'GIC - Glass Ionomer Cerment'),
(8, 'Co - Composite Resin'),
(9, 'GC - Gold Crown'),
(10, 'A Bt - Bridge Abutment'),
(11, 'P - Pontic'),
(12, 'PorJC -Porcelein Jacket Crowa'),
(13, 'PJC - Plastic Jacket Crown'),
(14, 'MI - Mental Inlays'),
(15, 'M - Missing due to Extraction'),
(16, 'Un - Unerupted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `service` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `service`) VALUES
(1, 'Consultation/Check up '),
(2, 'Tooth Filling '),
(3, 'Tooth Extraction '),
(4, 'Tooth Crowns/Bridges '),
(5, 'Teeth Withening '),
(6, 'Removal of Wisdom Tooth '),
(9, 'Oral Prophylaxis'),
(10, 'Orthodontic Treatment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_text`
--

CREATE TABLE `tbl_text` (
  `id` int(11) NOT NULL,
  `title` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texts` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_text`
--

INSERT INTO `tbl_text` (`id`, `title`, `texts`) VALUES
(1, 'General Dentistry', 'General dentistry covers a range of treatment options and procedures fundamental to protecting and maintaining a good standard of oral health. Treatments are in place to keep your mouth, gums, and teeth healthy and free of pain'),
(2, 'Oral Surgery', 'Oral surgery refers to any surgical procedure performed on your teeth, gums, jaws or other oral structures. This includes extractions, implants, gum grafts and jaw surgeries. Oral surgery is usually performed by an oral and maxillofacial surgeon or a periodontist.'),
(3, 'Orthodontics', 'The treatment of irregularities in the teeth (especially of alignment and occlusion) and jaws, including the use of braces.'),
(4, 'Endodontics', 'Endodontics is the branch of dentistry concerning dental pulp and tissues surrounding the roots of a tooth. “Endo” is the Greek word for “inside” and “odont” is Greek for “tooth.” Endodontic treatment, or root canal treatment, treats the soft pulp tissue inside the tooth.'),
(5, 'Periodontics', 'Periodontics is the dental specialty focusing exclusively in the inflammatory disease that destroys the gums and other supporting structures around the teeth. A periodontist is a dentist who specializes in the prevention, diagnosis, and treatment of periodontal, or disease, and in the placement of dental implants.'),
(6, 'Cosmetic Dentistry', 'Cosmetic dentistry is dentistry aimed at creating a positive change to your teeth and to your smile. The American Academy of Cosmetic Dentistry (AACD) is the primary dental resource for patients as they strive to maintain their health, function, and appearance for their\r\nlifetime.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tooth`
--

CREATE TABLE `tbl_tooth` (
  `id` int(11) NOT NULL,
  `title` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tooth`
--

INSERT INTO `tbl_tooth` (`id`, `title`, `age`, `image`) VALUES
(1, 'Baby Tooth', '8months to 7 years old', '../assets/img/babytooth.png'),
(2, 'Adult Tooth', '7  to 60+ years old', '../assets/img/adult.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verified` varchar(255) DEFAULT NULL,
  `vkey` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `firstname`, `lastname`, `contact`, `email`, `password`, `verified`, `vkey`, `profile_image`, `birthdate`) VALUES
(90, 'Camille', 'Tubo', '9758256398', 'tubocamillerae@gmail.com', '85529623f2db48916ccc72279673abfa', '1', NULL, 'profile.png', '2000-08-20'),
(91, 'jeric', 'anasco', '9506776468', 'jeric.valderama@cvsu.edu.ph', '9ddf1ef175cb648cc2941a51ebb9775f', '1', NULL, 'profile.png', '2022-12-10'),
(92, 'Harvey', 'Gultiano', '9075594604', 'gultianoharvey7@gmail.com', 'e4cebfbc0d6d6aca91f54e55f5be6377', '1', NULL, '63c4bf66bd2bb.jpg', '2022-12-31'),
(93, 'Unknown', 'Unknown', '9464646536', 'sleepshaco@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', NULL, '230835', 'profile.png', '2022-12-30'),
(94, 'Jeric', 'Valderama', '9506776468', 'jericvalderama5@gmail.com', '9ddf1ef175cb648cc2941a51ebb9775f', '1', NULL, 'profile.png', '2022-12-09'),
(95, 'Jeric', 'Valderama', '9123422315', 'jericrvalderama@gmail.com', '9ddf1ef175cb648cc2941a51ebb9775f', '1', NULL, 'profile.png', '2022-01-11'),
(96, 'Juan', 'Tamad', '9123422315', 'jericvalderama044@gmail.com', '9ddf1ef175cb648cc2941a51ebb9775f', '1', NULL, 'profile.png', '2022-06-01'),
(97, 'Zed', 'Sanopao', '9556070854', 'zedrickblackwater@gmail.com', 'a1f20967cad6a7ebc65af6bbed100091', '1', NULL, 'profile.png', '2000-08-28'),
(98, 'Edi', 'Wow', '9959603361', 'mnlolrv@gmail.com', '7969c5d84f0ecbfc79a7a35b54aaf082', '1', NULL, 'profile.png', '2022-12-31'),
(99, 'amiya', 'gonzales', '9758256398', 'camille.tubo@cvsu.edu.ph', 'f81ac622df3687c107fa98cb470cce70', '1', NULL, 'profile.png', '2020-12-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_img`
--
ALTER TABLE `tbl_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inq`
--
ALTER TABLE `tbl_inq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_legend`
--
ALTER TABLE `tbl_legend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_text`
--
ALTER TABLE `tbl_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tooth`
--
ALTER TABLE `tbl_tooth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `tbl_img`
--
ALTER TABLE `tbl_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_inq`
--
ALTER TABLE `tbl_inq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_legend`
--
ALTER TABLE `tbl_legend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_text`
--
ALTER TABLE `tbl_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_tooth`
--
ALTER TABLE `tbl_tooth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD CONSTRAINT `tbl_appointment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
