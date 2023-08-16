-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 09:58 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcccidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresscontactinfotable`
--

CREATE TABLE `addresscontactinfotable` (
  `addressContactID` int(11) NOT NULL,
  `studentRefNo` varchar(50) NOT NULL,
  `permAddress` varchar(100) NOT NULL,
  `currentAddress` varchar(100) NOT NULL,
  `homeContactNo` varchar(50) NOT NULL,
  `personaContactNo` varchar(50) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `boardingHouseAdd` varchar(50) NOT NULL,
  `nameOfLandlord` varchar(50) NOT NULL,
  `contactLandlord` varchar(50) NOT NULL,
  `emergencyName` varchar(50) NOT NULL,
  `emergencyContact` varchar(50) NOT NULL,
  `emergencyAddress` varchar(50) NOT NULL,
  `emergencyRelation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `announcementform`
--

CREATE TABLE `announcementform` (
  `announceID` int(11) NOT NULL,
  `announcementDesc` varchar(255) NOT NULL,
  `announcementStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classassignmentform`
--

CREATE TABLE `classassignmentform` (
  `classAssignID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `facultyId` varchar(50) NOT NULL,
  `classFormStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classformtable`
--

CREATE TABLE `classformtable` (
  `classID` int(11) NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `yearLevel` varchar(50) NOT NULL,
  `classStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classinfotable`
--

CREATE TABLE `classinfotable` (
  `classFormID` int(11) NOT NULL,
  `facultyId` varchar(50) NOT NULL,
  `departmentCode` varchar(50) NOT NULL,
  `subjectID` varchar(50) NOT NULL,
  `correspondingYear` varchar(50) NOT NULL,
  `correspondingSection` varchar(50) NOT NULL,
  `classStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commenttableform`
--

CREATE TABLE `commenttableform` (
  `commentID` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `facultyId` varchar(50) NOT NULL,
  `teachersBehavior` varchar(255) NOT NULL,
  `teachingProcedure` varchar(255) NOT NULL,
  `onlineClassManagement` varchar(255) NOT NULL,
  `commentStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departmenttableform`
--

CREATE TABLE `departmenttableform` (
  `departmentCode` varchar(50) NOT NULL,
  `departmentDesc` varchar(50) NOT NULL,
  `departmentStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `educationalbackground`
--

CREATE TABLE `educationalbackground` (
  `schoolInfoID` int(11) NOT NULL,
  `studentRefNo` varchar(50) DEFAULT NULL,
  `preSchoolName` varchar(255) DEFAULT NULL,
  `preSchoolAddress` varchar(255) DEFAULT NULL,
  `preSchoolyearGraduated` varchar(50) DEFAULT NULL,
  `preSchoolAwards` varchar(255) DEFAULT NULL,
  `elemSchoolName` varchar(255) DEFAULT NULL,
  `elemSchoolAddress` varchar(255) DEFAULT NULL,
  `elemSchoolyearGraduated` varchar(50) DEFAULT NULL,
  `elemSchoolAwards` varchar(255) DEFAULT NULL,
  `AlsElemName` varchar(255) DEFAULT NULL,
  `AlsElemAddress` varchar(255) DEFAULT NULL,
  `AlsElemyearGraduated` varchar(50) DEFAULT NULL,
  `AlsElemAwards` varchar(255) DEFAULT NULL,
  `highSchoolName` varchar(255) DEFAULT NULL,
  `highSchoolAddress` varchar(255) DEFAULT NULL,
  `highSchoolYearGrad` varchar(50) DEFAULT NULL,
  `highSchoolAwards` varchar(255) DEFAULT NULL,
  `alsHighName` varchar(255) DEFAULT NULL,
  `alsHighAddress` varchar(255) DEFAULT NULL,
  `alsHighYearGrad` varchar(50) DEFAULT NULL,
  `alsHighAwards` varchar(255) DEFAULT NULL,
  `seniorHighName` varchar(255) DEFAULT NULL,
  `seniorHighAddress` varchar(255) DEFAULT NULL,
  `seniorHighYearGrad` varchar(50) DEFAULT NULL,
  `seniorHighAwards` varchar(255) DEFAULT NULL,
  `alsSeniorName` varchar(255) DEFAULT NULL,
  `alsSeniorAddress` varchar(255) DEFAULT NULL,
  `alsSeniorYearGrad` varchar(50) DEFAULT NULL,
  `alsSeniorAwards` varchar(255) DEFAULT NULL,
  `prevSchoolName` varchar(255) DEFAULT NULL,
  `prevSchoolAddress` varchar(255) DEFAULT NULL,
  `prevSchoolYearGrad` varchar(50) DEFAULT NULL,
  `prevSchoolAwards` varchar(255) DEFAULT NULL,
  `statusSchoolYear` varchar(50) DEFAULT NULL,
  `schoolStatus` varchar(50) DEFAULT NULL,
  `work` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `payeeName` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `sponsor` varchar(255) DEFAULT NULL,
  `scholarship` varchar(255) DEFAULT NULL,
  `firstChoice` varchar(255) DEFAULT NULL,
  `firstReason` varchar(255) DEFAULT NULL,
  `secondChoice` varchar(255) DEFAULT NULL,
  `secondReason` varchar(255) DEFAULT NULL,
  `thirdChoice` varchar(255) DEFAULT NULL,
  `thirdReason` varchar(255) DEFAULT NULL,
  `enrolledStrand` varchar(255) DEFAULT NULL,
  `enrolledStrandReason` varchar(255) DEFAULT NULL,
  `interviewersComment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facultyformtable`
--

CREATE TABLE `facultyformtable` (
  `facultyId` varchar(50) NOT NULL,
  `facultyFname` varchar(100) NOT NULL,
  `facultyMname` varchar(100) NOT NULL,
  `facultyLname` varchar(100) NOT NULL,
  `facultyAddress` varchar(100) NOT NULL,
  `facultyContact` bigint(100) NOT NULL,
  `facultyDOB` date NOT NULL,
  `facultyDateEntry` date NOT NULL,
  `facultyStatus` varchar(100) NOT NULL,
  `facultyAddedBy` varchar(100) NOT NULL,
  `facultyPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `familybackground`
--

CREATE TABLE `familybackground` (
  `id` int(11) NOT NULL,
  `studentRefNo` varchar(60) DEFAULT NULL,
  `fatherFname` varchar(255) DEFAULT NULL,
  `fatherMname` varchar(255) DEFAULT NULL,
  `fatherLname` varchar(255) DEFAULT NULL,
  `fatherAge` int(11) DEFAULT NULL,
  `fatherDOB` date DEFAULT NULL,
  `fatherContact` varchar(255) DEFAULT NULL,
  `fatherOccu` varchar(255) DEFAULT NULL,
  `fatherEduc` varchar(255) DEFAULT NULL,
  `fatherReligion` varchar(255) DEFAULT NULL,
  `motherFname` varchar(255) DEFAULT NULL,
  `motherMname` varchar(255) DEFAULT NULL,
  `motherLname` varchar(255) DEFAULT NULL,
  `motherAge` int(11) DEFAULT NULL,
  `motherDOB` date DEFAULT NULL,
  `motherContact` varchar(255) DEFAULT NULL,
  `motherOccu` varchar(255) DEFAULT NULL,
  `motherEduc` varchar(255) DEFAULT NULL,
  `motherReligion` varchar(255) DEFAULT NULL,
  `parentRelation` varchar(255) DEFAULT NULL,
  `siblingName1` varchar(255) DEFAULT NULL,
  `siblingSchoolWork1` varchar(255) DEFAULT NULL,
  `siblingAge1` int(11) DEFAULT NULL,
  `siblingAdditional1` varchar(255) DEFAULT NULL,
  `siblingName2` varchar(255) DEFAULT NULL,
  `siblingSchoolWork2` varchar(255) DEFAULT NULL,
  `siblingAge2` int(11) DEFAULT NULL,
  `siblingAdditional2` varchar(255) DEFAULT NULL,
  `siblingName3` varchar(255) DEFAULT NULL,
  `siblingSchoolWork3` varchar(255) DEFAULT NULL,
  `siblingAge3` int(11) DEFAULT NULL,
  `siblingAdditional3` varchar(255) DEFAULT NULL,
  `siblingName4` varchar(255) DEFAULT NULL,
  `siblingSchoolWork4` varchar(255) DEFAULT NULL,
  `siblingAge4` int(11) DEFAULT NULL,
  `siblingAdditional4` varchar(255) DEFAULT NULL,
  `siblingName5` varchar(255) DEFAULT NULL,
  `siblingSchoolWork5` varchar(255) DEFAULT NULL,
  `siblingAge5` int(11) DEFAULT NULL,
  `siblingAdditional5` varchar(255) DEFAULT NULL,
  `siblingName6` varchar(255) DEFAULT NULL,
  `siblingSchoolWork6` varchar(255) DEFAULT NULL,
  `siblingAge6` int(11) DEFAULT NULL,
  `siblingAdditional6` varchar(255) DEFAULT NULL,
  `question1` varchar(255) DEFAULT NULL,
  `question2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guidanceformtable`
--

CREATE TABLE `guidanceformtable` (
  `guidanceID` varchar(50) NOT NULL,
  `guidanceFname` varchar(100) NOT NULL,
  `guidanceMname` varchar(100) NOT NULL,
  `guidanceLname` varchar(100) NOT NULL,
  `guidanceAddress` varchar(100) NOT NULL,
  `guidanceContact` bigint(100) NOT NULL,
  `guidanceDOB` date NOT NULL,
  `guidanceDateEntry` date NOT NULL,
  `guidanceStatus` varchar(100) NOT NULL,
  `guidancePassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guidanceformtable`
--

INSERT INTO `guidanceformtable` (`guidanceID`, `guidanceFname`, `guidanceMname`, `guidanceLname`, `guidanceAddress`, `guidanceContact`, `guidanceDOB`, `guidanceDateEntry`, `guidanceStatus`, `guidancePassword`) VALUES
('ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 1111111111111, '2000-01-01', '2023-08-06', 'ACTIVE', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `marriedtable`
--

CREATE TABLE `marriedtable` (
  `id` int(11) NOT NULL,
  `marriedFname` varchar(50) NOT NULL,
  `marriedMname` varchar(50) NOT NULL,
  `marriedLname` varchar(50) NOT NULL,
  `marriedOcc` varchar(50) NOT NULL,
  `marriedAge` varchar(50) NOT NULL,
  `marriedReligion` varchar(50) NOT NULL,
  `marriedContact` varchar(50) NOT NULL,
  `queation3` varchar(50) NOT NULL,
  `mariedChildname1` varchar(50) NOT NULL,
  `mariedChildage1` varchar(50) NOT NULL,
  `mariedChildsex1` varchar(50) NOT NULL,
  `mariedChildname2` varchar(50) NOT NULL,
  `mariedChildage2` varchar(50) NOT NULL,
  `mariedChildsex2` varchar(50) NOT NULL,
  `mariedChildname3` varchar(50) NOT NULL,
  `mariedChildage3` varchar(50) NOT NULL,
  `mariedChildsex3` varchar(50) NOT NULL,
  `mariedChildname4` varchar(50) NOT NULL,
  `mariedChildage4` varchar(50) NOT NULL,
  `mariedChildsex4` varchar(50) NOT NULL,
  `mariedChildname5` varchar(50) NOT NULL,
  `mariedChildage5` varchar(50) NOT NULL,
  `mariedChildsex5` varchar(50) NOT NULL,
  `mariedChildname6` varchar(50) NOT NULL,
  `mariedChildage6` varchar(50) NOT NULL,
  `mariedChildsex6` varchar(50) NOT NULL,
  `studentRefNo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `otherinformationtable`
--

CREATE TABLE `otherinformationtable` (
  `id` int(11) NOT NULL,
  `studenRefNo` varchar(50) DEFAULT NULL,
  `disabilities` varchar(255) DEFAULT NULL,
  `chronicIllness` varchar(255) DEFAULT NULL,
  `accidentExperience` varchar(255) DEFAULT NULL,
  `operationsExperience` varchar(255) DEFAULT NULL,
  `phsycologicalDisorder` varchar(255) DEFAULT NULL,
  `diagnosedBy` varchar(255) DEFAULT NULL,
  `diagnosisDate` varchar(255) DEFAULT NULL,
  `clinicAddress` varchar(255) DEFAULT NULL,
  `goals` varchar(255) DEFAULT NULL,
  `presentConcerns` varchar(255) DEFAULT NULL,
  `collegeAdjustment` tinyint(1) DEFAULT NULL,
  `selfAwareness` tinyint(1) DEFAULT NULL,
  `boostingSelfEsteem` tinyint(1) DEFAULT NULL,
  `improvingTimeManagement` tinyint(1) DEFAULT NULL,
  `noteTaking` tinyint(1) DEFAULT NULL,
  `workValues` tinyint(1) DEFAULT NULL,
  `stressManagement` tinyint(1) DEFAULT NULL,
  `conflictManagement` tinyint(1) DEFAULT NULL,
  `strengtheningFamily` tinyint(1) DEFAULT NULL,
  `handlingRelationship` tinyint(1) DEFAULT NULL,
  `financialManagement` tinyint(1) DEFAULT NULL,
  `improvingSocial` tinyint(1) DEFAULT NULL,
  `knowledgeAboutPossible` tinyint(1) DEFAULT NULL,
  `dealingWithPersonal` tinyint(1) DEFAULT NULL,
  `otherConcerns` tinyint(1) DEFAULT NULL,
  `interviewerComment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pippersonalinfo`
--

CREATE TABLE `pippersonalinfo` (
  `studentRefNo` varchar(50) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `pipFname` varchar(100) NOT NULL,
  `pipMname` varchar(100) NOT NULL,
  `pipLname` varchar(100) NOT NULL,
  `pipYear` varchar(100) NOT NULL,
  `courseCode` varchar(100) NOT NULL,
  `pipAge` int(11) NOT NULL,
  `pipSex` varchar(100) NOT NULL,
  `pipGender` varchar(100) NOT NULL,
  `pipDob` date NOT NULL,
  `pippob` varchar(100) NOT NULL,
  `pipCitizenship` varchar(100) NOT NULL,
  `pipReligion` varchar(100) NOT NULL,
  `pipBirthOrder` varchar(100) NOT NULL,
  `pipCiv` varchar(100) NOT NULL,
  `pipPersonalStatement` varchar(100) NOT NULL,
  `pipHobbiesSpecialties` varchar(100) NOT NULL,
  `pipRegistrationStatus` varchar(100) NOT NULL,
  `pipPassword` varchar(100) NOT NULL,
  `pipSection` varchar(10) NOT NULL,
  `pipImage` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questionformtable`
--

CREATE TABLE `questionformtable` (
  `questionID` int(11) NOT NULL,
  `questionDescrirption` varchar(255) NOT NULL,
  `questionType` varchar(255) NOT NULL,
  `questionEntryDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resulttable`
--

CREATE TABLE `resulttable` (
  `resultID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `facultyId` varchar(50) NOT NULL,
  `subjectID` varchar(50) NOT NULL,
  `rates` int(11) NOT NULL,
  `resultStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentformtable`
--

CREATE TABLE `studentformtable` (
  `studentID` varchar(100) NOT NULL,
  `studentFirstname` varchar(100) NOT NULL,
  `studentMiddleName` varchar(100) NOT NULL,
  `studentLastName` varchar(100) NOT NULL,
  `studentCourseCode` varchar(100) NOT NULL,
  `studentyearLevel` varchar(100) NOT NULL,
  `studentAddress` varchar(100) NOT NULL,
  `studentContactNumber` bigint(100) NOT NULL,
  `studentDateEntry` date NOT NULL,
  `studentStatus` varchar(100) NOT NULL,
  `studentAddedBy` varchar(100) NOT NULL,
  `studentDOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentupdatesettings`
--

CREATE TABLE `studentupdatesettings` (
  `settingsID` int(11) NOT NULL,
  `enableUpdate` tinyint(1) NOT NULL,
  `enableEvaluation` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentupdatesettings`
--

INSERT INTO `studentupdatesettings` (`settingsID`, `enableUpdate`, `enableEvaluation`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjecttableform`
--

CREATE TABLE `subjecttableform` (
  `subjectID` int(11) NOT NULL,
  `subjectCode` varchar(100) NOT NULL,
  `subjectDesc` varchar(100) NOT NULL,
  `subjectStatus` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresscontactinfotable`
--
ALTER TABLE `addresscontactinfotable`
  ADD PRIMARY KEY (`addressContactID`);

--
-- Indexes for table `announcementform`
--
ALTER TABLE `announcementform`
  ADD PRIMARY KEY (`announceID`);

--
-- Indexes for table `classassignmentform`
--
ALTER TABLE `classassignmentform`
  ADD PRIMARY KEY (`classAssignID`);

--
-- Indexes for table `classformtable`
--
ALTER TABLE `classformtable`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `classinfotable`
--
ALTER TABLE `classinfotable`
  ADD PRIMARY KEY (`classFormID`);

--
-- Indexes for table `commenttableform`
--
ALTER TABLE `commenttableform`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `educationalbackground`
--
ALTER TABLE `educationalbackground`
  ADD PRIMARY KEY (`schoolInfoID`);

--
-- Indexes for table `facultyformtable`
--
ALTER TABLE `facultyformtable`
  ADD PRIMARY KEY (`facultyId`);

--
-- Indexes for table `familybackground`
--
ALTER TABLE `familybackground`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guidanceformtable`
--
ALTER TABLE `guidanceformtable`
  ADD PRIMARY KEY (`guidanceID`);

--
-- Indexes for table `marriedtable`
--
ALTER TABLE `marriedtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otherinformationtable`
--
ALTER TABLE `otherinformationtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pippersonalinfo`
--
ALTER TABLE `pippersonalinfo`
  ADD PRIMARY KEY (`studentRefNo`);

--
-- Indexes for table `questionformtable`
--
ALTER TABLE `questionformtable`
  ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `resulttable`
--
ALTER TABLE `resulttable`
  ADD PRIMARY KEY (`resultID`);

--
-- Indexes for table `studentformtable`
--
ALTER TABLE `studentformtable`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `studentupdatesettings`
--
ALTER TABLE `studentupdatesettings`
  ADD PRIMARY KEY (`settingsID`);

--
-- Indexes for table `subjecttableform`
--
ALTER TABLE `subjecttableform`
  ADD PRIMARY KEY (`subjectID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresscontactinfotable`
--
ALTER TABLE `addresscontactinfotable`
  MODIFY `addressContactID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcementform`
--
ALTER TABLE `announcementform`
  MODIFY `announceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classassignmentform`
--
ALTER TABLE `classassignmentform`
  MODIFY `classAssignID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classformtable`
--
ALTER TABLE `classformtable`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classinfotable`
--
ALTER TABLE `classinfotable`
  MODIFY `classFormID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commenttableform`
--
ALTER TABLE `commenttableform`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educationalbackground`
--
ALTER TABLE `educationalbackground`
  MODIFY `schoolInfoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `familybackground`
--
ALTER TABLE `familybackground`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marriedtable`
--
ALTER TABLE `marriedtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otherinformationtable`
--
ALTER TABLE `otherinformationtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionformtable`
--
ALTER TABLE `questionformtable`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resulttable`
--
ALTER TABLE `resulttable`
  MODIFY `resultID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentupdatesettings`
--
ALTER TABLE `studentupdatesettings`
  MODIFY `settingsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjecttableform`
--
ALTER TABLE `subjecttableform`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
