-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2025 at 08:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elr_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `email`, `password`) VALUES
(1, 'administrator@gmail.com', 'Admin1213@');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyid` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_enabled` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyid`, `lastname`, `firstname`, `middlename`, `email`, `password`, `is_enabled`) VALUES
(1, 'Faculty', 'Faculty', 'Faculty', 'faculty@gmail.com', 'Faculty1213@', 'enabled'),
(2, 'hehe', 'huhuhu', 'haha', 'melvincorpuz.basc@gmail.com', 'P@ssword!123', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizid` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `subject_name` varchar(500) NOT NULL,
  `checkQuestion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizid`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `course`, `subject_name`, `checkQuestion`) VALUES
(1, '1 + 1?', '1', '2', '3', '4', 'option2', 'bsge', 'Math', 'selected'),
(2, '2 + 2?', '1', '2', '3', '4', 'option4', 'bsaben', 'Area 2: Hydrology', 'selected'),
(3, 'It is a polyhedron with two faces parallel\r\nand congruent and whose remaining faces are\r\nparallelograms.', 'Prism', 'Cube', 'Sphere', 'Ellipsoid', 'option1', 'bsge', 'Mathematics', 'selected'),
(4, 'The point of intersection of the angle\r\nbisector of a triangle.', 'Ex-Center', 'Circumcenter', 'Incenter', 'Orthocenter', 'option3', 'bsge', 'Mathematics', 'selected'),
(5, 'A statement used in the premises of arguments\r\nand assumed to be true without proof is\r\ncalled?', 'Theorem', 'Principle', 'Proposition', 'Axiom', 'option4', 'bsge', 'Mathematics', 'selected'),
(6, 'It is bounded by two radii and an included\r\narc.', 'Circumference', 'Chord', 'Segment', 'Sector', 'option4', 'bsge', 'Mathematics', 'selected'),
(7, 'The locus of points for which the difference\r\nof their distances from two fixed points,\r\nthe foci, is constant.', 'Conic Section', 'Ellipse', 'Parabola', 'Hyperbola', 'option4', 'bsge', 'Mathematics', 'selected'),
(8, 'In the ratio a:b, a is called:', 'precedent', 'antecedent', 'subsequent', 'consequent', 'option2', 'bsge', 'Mathematics', 'selected'),
(9, 'It is a polygon having one interior angle\r\ngreater than 180 degrees.', 'Convex Polygon', 'Concave Polygon', 'Regular Polygon', 'Diagonal Polygon', 'option2', 'bsge', 'Mathematics', 'selected'),
(10, 'The term annulus refers to:', 'The area bounded by a circle', 'Any period of time corresponding to\r\n12 months', 'The area bounded by two concentric\r\ncircles in a p', 'None of the above', 'option3', 'bsge', 'Mathematics', 'selected'),
(11, 'The term annulus refers to:', 'The area bounded by a circle', 'Any period of time corresponding to\r\n12 months', 'The area bounded by two concentric\r\ncircles in a p', 'None of the above', 'option3', 'bsge', 'Mathematics', 'selected'),
(12, 'In a circle, the region bounded by an arc of\r\nthe circle and the sides of central angle is\r\ncalled:', 'Chord', 'Sector', 'Segment', 'Lune', 'option2', 'bsge', 'Mathematics', 'selected'),
(13, 'These are angles formed by two intersecting\r\nlines.', 'Supplementary Angle', 'Adjacent Angle', 'Vertical Angle', 'Complementary Angle', 'option3', 'bsge', 'Mathematics', 'selected'),
(14, 'The quantity from which another quantity is\r\nsubtracted.', 'Difference', 'Subtrahend', 'Minuend', 'Subtraction', 'option3', 'bsge', 'Mathematics', 'selected'),
(15, 'The quantity from which another quantity is\r\nsubtracted.', 'Difference', 'Subtrahend', 'Minuend', 'Subtraction', 'option3', 'bsge', 'Mathematics', 'selected'),
(16, 'A number that divides another number is\r\ncalled:', 'Divisor', 'Ratio', 'Quotient', 'Dividend', 'option1', 'bsge', 'Mathematics', 'selected'),
(17, 'It is a parallelogram whose adjacent side\r\nare not equal.', 'Rhombus', 'Rhomboid', 'Trapezoid', 'Trapezium', 'option2', 'bsge', 'Mathematics', 'selected'),
(18, 'The set of all points in a plane equidistant\r\nfrom a fixed point is called:', 'Center', 'Circle', 'Radius', 'Focus', 'option2', 'bsge', 'Mathematics', 'selected'),
(19, 'A unit of angle equal to 1/60 of a degree is\r\ncalled:', 'Second', 'Mil', 'Minute', 'Grad', 'option3', 'bsge', 'Mathematics', 'selected'),
(20, 'It is a polyhedron having for a bases two\r\npolygons in parallel planes and for lateral\r\nfaces triangles or trapezoids with one side\r\nlying in one base, and the opposite vertex\r\nor side lying in the other side of the\r\npolyhedron.', 'Pyramid', 'Frustum', 'Prismatoid', 'Cone', 'option3', 'bsge', 'Mathematics', 'selected'),
(21, 'It is a portion of a sphere bounded by two\r\nhalf great circle and an included arc.', 'Spherical Zone', 'Spherical Sector', 'Spherical Segment', 'Spherical Wedge', 'option4', 'bsge', 'Mathematics', 'selected'),
(22, 'It is a solid formed by revolving a circle\r\nabout a line not intersecting it.', 'Torus', 'Zone', 'Polyhedron', 'Prolate Spheroid', 'option1', 'bsge', 'Mathematics', 'selected'),
(23, 'What is the eccentricity of the parabola?', '0', '1', 'Greater than 1', 'Less than 1', 'option2', 'bsge', 'Mathematics', 'selected'),
(24, 'In the expression √a\r\nn\r\n,the number a is\r\n\r\ncalled:', 'radicand', 'radical', 'index', 'root', 'option1', 'bsge', 'Mathematics', 'selected'),
(25, 'It is a portion of a prism contained between\r\nthe base and a plane that is not parallel to\r\nthe base.', 'Truncated Prism', 'Oblique Prism', 'Right Prism', 'Lateral Prism', 'option1', 'bsge', 'Mathematics', 'selected'),
(26, 'A ship on a certain day is at latitude 20°N\r\nand longitude 140°E. After sailing for 150\r\nhours at a uniform speed along a great circle\r\nroute, it reaches a point at latitude 10°S\r\nand longitude 170°E. If the radius of the\r\nearth is 3959 miles, find the speed in miles\r\nper hour.', '17.56', '15.56', '16.56', '19.56', 'option3', 'bsge', 'Mathematics', 'selected'),
(27, 'Find each interior angle of a hexagon.', '90o', '120o', '150o', '180o', 'option2', 'bsge', 'Mathematics', 'selected'),
(28, 'A circular piece of cardboard with a diameter\r\nof 1 m will be made into a conical hat 40 cm\r\nhigh by cutting a sector off and joining the\r\nedges to form a cone. Determine the angle\r\nsubtended by a sector removed.', '144o', '148o', '152o', '154o', 'option1', 'bsge', 'Mathematics', 'selected'),
(29, 'Points A and B are 100 m apart and are of\r\nthe same elevation as the foot of a building.\r\nThe angles of elevation of the top of the\r\nbuilding from points A and B are 21° and 32°\r\nrespectively. How far is A from the building\r\nin meters.', '259.28', '265.42', '272.64', '277.29', 'option1', 'bsge', 'Mathematics', 'selected'),
(30, 'A regular hexagon is inscribed in a circle\r\nwhose diameter is 20 m. Find the area of the\r\n6 segments of the circle formed by the sides\r\nof the hexagons.', '36.45 sq. m.', '63.54 sq. m.', '45.63 sq. m.', '54.36 sq. m.', 'option4', 'bsge', 'Mathematics', 'selected'),
(31, 'If a man borrowed money from his girlfriend\r\nwith simple interest rate of 7.5%, determine\r\nthe present worth of ₱ 67,350, which due at\r\nthe end of 9 months?', '₱ 63,763.1336', '₱ 63,763.3136', '₱ 63,673.1336', '₱ 63,673.3136', 'option2', 'bsge', 'Mathematics', 'selected'),
(32, 'It is a market situation that has many\r\nsellers but only one buyer.', 'Bilateral Monopoly', 'Monopoly', 'Monopsony', 'Bilateral Monopsony', 'option3', 'bsge', 'Mathematics', 'selected'),
(33, 'If the longitude of Tokyo is 139°E and that\r\nof Manila is 121°E, what is the time\r\ndifference between Tokyo and Manila?', '1 hour and 12 minutes', '1 hour and 5 minutes', '1 hour and 8 minutes', '1 hour and 10 minutes', 'option1', 'bsge', 'Mathematics', 'selected'),
(34, 'Determine the accumulated amount using exact\r\nsimple interest on Php. 1,000 for the period\r\nfrom January 20, 1990 to November 28 of the\r\nsame year at 15% interest rate.', 'Php.1,125.2192', 'Php.1,126.2192', 'Php.1,127.2192', 'Php.1,128.2192', 'option4', 'bsge', 'Mathematics', 'selected'),
(35, 'It is referring to the satisfaction or\r\npleasure derived from the consumer goods and\r\nservices.', 'Market', 'Competition', 'Luxury Products', 'Utility', 'option4', 'bsge', 'Mathematics', 'selected'),
(36, 'A rhombus has diagonals of 32 and 20 inches.\r\nDetermine its area.', '360 sq. in.', '280 sq. in.', '320 sq. in.', '400 sq. in.', 'option3', 'bsge', 'Mathematics', 'selected'),
(37, 'A rhombus has diagonals of 32 and 20 inches.\r\nDetermine its area.', '360 sq. in.', '280 sq. in.', '320 sq. in.', '400 sq. in.', 'option3', 'bsge', 'Mathematics', 'selected'),
(38, 'A rhombus has diagonals of 32 and 20 inches.\r\nDetermine its area.', '360 sq. in.', '280 sq. in.', '320 sq. in.', '400 sq. in.', 'option3', 'bsge', 'Mathematics', 'selected'),
(39, 'Angles are measured from the positive\r\nhorizontal axis, and the positive direction\r\nis counter clockwise. What are the values of\r\nsin B and cos B in the 4th quadrant.', 'sin B > 0 and cos B < 0', 'sin B < 0 and cos B < 0', 'sin B > 0 and cos B > 0s', 'sin B < 0 and cos B > 0', 'option4', 'bsge', 'Mathematics', 'selected'),
(40, 'It is a type of annuity where the payments\r\nare made at the beginning of each period\r\nstarting from the first period.', 'Deferred Annuity', 'Annuity Due', 'Ordinary Annuity', 'Perpetuity', 'option2', 'bsge', 'Mathematics', 'selected'),
(41, 'What annual interest rate compounded\r\nquarterly would be needed for a Php 10,000\r\nto accumulate an amount of Php. 12,000 after\r\n3 years?', '5.132%', '4.501%', '1.532%', '6.124%', 'option4', 'bsge', 'Mathematics', 'selected'),
(42, 'If Tan A = 1/3 and Cot B = 4, then Tan (A+B)\r\nis equal to?', '11/7', '7/11', '7/12', '12/7', 'option4', 'bsge', 'Mathematics', 'selected'),
(43, 'It is a long term note or a financial\r\nsecurity issued by the businesses and\r\ncorporation and guaranteed on certain assets\r\nof the corporation or its subsidiaries.', 'Annuity', 'Rate', 'Bond', 'Value', 'option3', 'bsge', 'Mathematics', 'selected'),
(44, 'It is a long term note or a financial\r\nsecurity issued by the businesses and\r\ncorporation and guaranteed on certain assets\r\nof the corporation or its subsidiaries.', 'Annuity', 'Rate', 'Bond', 'Value', 'option3', 'bsge', 'Mathematics', 'selected'),
(45, 'It is a long term note or a financial\r\nsecurity issued by the businesses and\r\ncorporation and guaranteed on certain assets\r\nof the corporation or its subsidiaries.', 'Annuity', 'Rate', 'Bond', 'Value', 'option3', 'bsge', 'Mathematics', 'selected'),
(46, 'How many sides has a polygon if the sum of\r\nthe interior angles is 1080o?', '5', '6', '7', '8', 'option4', 'bsge', 'Mathematics', 'selected'),
(47, 'When supporting a pole is fastened to it 20\r\nfeet from the ground 15 feet from the pole.\r\nDetermine the length of the wire and the\r\nangle it makes with the pole.', '24 ft, 53.13°', '24 ft, 36.87°', '24 ft, 53.13°', '25 ft, 36.87°', 'option4', 'bsge', 'Mathematics', 'selected'),
(48, 'It is the worth of property determined by a\r\ndisinterested person in order to establish\r\nan amount which is fair to both of the buyer\r\nand the seller.', 'Book Value', 'Fair Value', 'Salvage Value', 'Use Value', 'option2', 'bsge', 'Mathematics', 'selected'),
(49, 'It is the worth of property determined by a\r\ndisinterested person in order to establish\r\nan amount which is fair to both of the buyer\r\nand the seller.', 'Book Value', 'Fair Value', 'Salvage Value', 'Use Value', 'option2', 'bsge', 'Mathematics', 'selected'),
(50, 'What is the height of a right circular cone\r\nhaving a slant height of √10x and a base\r\ndiameter of 2x?', '2x', '3x', '3.317x', '3.162x', 'option2', 'bsge', 'Mathematics', 'selected'),
(51, 'What is the height of a right circular cone\r\nhaving a slant height of √10x and a base\r\ndiameter of 2x?', '2x', '3x', '3.317x', '3.162x', 'option2', 'bsge', 'Mathematics', 'selected'),
(52, 'One degree on the equator of the earth is\r\nequivalent to.', '1 minute', '4 minutes', '30 minutes', '1 hour', 'option2', 'bsge', 'Mathematics', 'selected'),
(53, 'It refers to the situation where the sales\r\ngenerated is just enough to cover the fixed\r\nand variable cost.', 'Break Even', 'Return of Investment', 'Sinking Fund', 'Sum of Years Digital', 'option1', 'bsge', 'Mathematics', 'selected'),
(54, 'Evaluate:\r\n\r\n2sinθcosθ−cosθ\r\n1−sinθ+sin2θ−cos2θ', 'Sin θ', 'cos θ', 'tan θ', 'cot θ', 'option4', 'bsge', 'Mathematics', 'selected'),
(55, 'A loan of ₱2,000 is made for a period of 13\r\nmonths from January 1 to January 31 the\r\nfollowing year, at a simple interest rate of\r\n20%. What future amount is due at the end of\r\nthe loan period?', '₱ 2,233.33', '₱ 2,333.33', '₱ 2,433.33', '₱ 2,533.33', 'option3', 'bsge', 'Mathematics', 'selected'),
(56, 'It is a market structure where the number of\r\nsuppliers is used to determined the type of\r\nthe market.', 'Producer Goods and Services', 'Perfect Competition', 'Competition', 'Law of Supply and Demand', 'option3', 'bsge', 'Mathematics', 'selected'),
(57, 'A regular octahedron has an edge of 2 m. Find\r\nits volume.', '3.77', '1.88', '3.22', '2.44', 'option1', 'bsge', 'Mathematics', 'selected'),
(58, 'A pole cast a shadow 15 m long when the angle\r\nof elevation of the sun is 61°. If the pole\r\nis leaned 15° from the vertical directly\r\ntowards the sun, determine the length of the\r\npole.', '54.23 m', '48.23 m', '42.44 m', '46.21 m', 'option1', 'bsge', 'Mathematics', 'selected'),
(59, 'The point of intersection of the\r\nperpendicular bisectors of the side of\r\ntriangle.', 'Ex-Center', 'Circumcenter', 'Incenter', 'Orthocenter', 'option2', 'bsge', 'Mathematics', 'selected'),
(60, 'Each side of the cube is increased by 1%. By\r\nwhat percent is the volume of the cube\r\nincreased?', '1.21%', '2.80%', '3.03%', '3.50%', 'option3', 'bsge', 'Mathematics', 'selected'),
(61, 'Compute the effective annual interest rate\r\nwhich is equivalent to 5% nominal annal\r\ninterest compounded continuously.', '5.13%', '4.94%', '5.36%', '4.90%', 'option1', 'bsge', 'Mathematics', 'selected'),
(62, 'It is the term used to describe sets that\r\nhave no common members.', 'Divergent', 'Disjoint', 'Unrelated', 'Contrast', 'option2', 'bsge', 'Mathematics', 'selected'),
(63, 'A circular cylinder is circumscribed about a\r\nright prism having a square base one meter\r\non an edge. The volume of the cylinder is\r\n6.283 cu. m. Find its altitude in meter.', '4.00', '3.75', '3.50', '3.25', 'option1', 'bsge', 'Mathematics', 'selected'),
(64, 'How many times does the volume of a sphere\r\nincreases if the radius is doubled?', '2 times', '4 times', '6 times', '8 times', 'option4', 'bsge', 'Mathematics', 'selected'),
(65, 'A chain of reasoning using rules of\r\ninference, ultimately based on axioms, that\r\nleads to conclusion.', 'Logic', 'Postulate', 'Theorem', 'Proof', 'option4', 'bsge', 'Mathematics', 'selected'),
(66, 'A man finds the angle of elevation of the\r\ntop of a tower to be 30°. He walks 85 m\r\nnearer the tower and finds its angle of\r\nelevation to be 60°. What is the height of\r\nthe tower?', '76.31 m', '73.31 m', '73.16 m', '73.61 m', 'option4', 'bsge', 'Mathematics', 'selected'),
(67, 'A trapezoid has an area of 36 sq. m. and an\r\naltitude of 2 m. Its two bases have a ratio\r\nof 4:5. What are the lengths of the bases?', '12, 15', '7, 11', '8, 10', '16, 20', 'option4', 'bsge', 'Mathematics', 'selected'),
(68, 'An angle between 180 and 360 is called:', 'Obtuse Angle', 'Reflex Angle', 'Excess Angle', 'None of the Above', 'option2', 'bsge', 'Mathematics', 'selected'),
(69, 'What is the volume of a frustum of a cone\r\nwhose upper base is 15 cm in diameter and\r\nlower base 10 cm in diameter with an altitude\r\nof 25 cm?', '3018.87 cu.m.', '3180.87 cu.m.', '3108.87 cu.m.', '3081.87 cu.m.', 'option3', 'bsge', 'Mathematics', 'selected'),
(70, 'What is the volume of a frustum of a cone\r\nwhose upper base is 15 cm in diameter and\r\nlower base 10 cm in diameter with an altitude\r\nof 25 cm?', '3018.87 cu.m.', '3180.87 cu.m.', '3108.87 cu.m.', '3081.87 cu.m.', 'option3', 'bsge', 'Mathematics', 'selected'),
(71, 'At an annual rate of return of 8%, what is\r\nthe future worth of Php. 1000 at the end of\r\n4 years?', '1,260.4890', '1,360.4890', '1,460.4890', '1,560.4890', 'option2', 'bsge', 'Mathematics', 'selected'),
(72, 'A number that is a product of a given number\r\nand an integer.', 'Multiple', 'Power', 'Factor', 'Exponent', 'option1', 'bsge', 'Mathematics', 'selected'),
(73, 'The central angle of spherical wedge is 1\r\nradian. Find its volume if its radius is 1\r\nunit.', '2/3', '1/2', '3/4', '2/5', 'option1', 'bsge', 'Mathematics', 'selected'),
(74, 'The sides of a triangular lot are 130 m.,\r\n180 m and 190 m. the lot is to be divided by\r\na line bisecting the longest side and drawn\r\nfrom the opposite vertex. Find the length of\r\nthe line.', '120 m', '130 m', '125 m', '128 m', 'option3', 'bsge', 'Mathematics', 'selected'),
(75, 'The sides of a triangular lot are 130 m.,\r\n180 m and 190 m. the lot is to be divided by\r\na line bisecting the longest side and drawn\r\nfrom the opposite vertex. Find the length of\r\nthe line.', '120 m', '130 m', '125 m', '128 m', 'option3', 'bsge', 'Mathematics', 'selected'),
(76, 'It is the ratio of the length of\r\ncircumference of the circle to its diameter.', 'Segment', 'Secant', 'Chord', 'Pi', 'option4', 'bsge', 'Mathematics', 'selected'),
(77, 'Determine the value of the angle B of an\r\nisosceles spherical triangle ABC whose given\r\nparts are b = c = 54o 28’ and a = 92o 30’.', '89o 45’', '55o 45’', '84o 25’', '41o 45’', 'option4', 'bsge', 'Mathematics', 'selected'),
(78, 'Determine the value of the angle B of an\r\nisosceles spherical triangle ABC whose given\r\nparts are b = c = 54o 28’ and a = 92o 30’.', '89o 45’', '55o 45’', '84o 25’', '41o 45’', 'option4', 'bsge', 'Mathematics', 'selected'),
(79, 'The captain of a ship views the top of a\r\nlighthouse at an angle of 60° with the\r\nhorizontal at an elevation of 6 meters above\r\nsea level. Five minutes later, the same\r\ncaptain of the ship views the top of the same\r\nlighthouse at an angle of 30° with the\r\nhorizontal. Determine the speed of the ship\r\nif the lighthouse is known to be 50 meters\r\nabove sea level.', '0.265 m/sec', '0.155 m/sec', '0.169 m/sec', '0.210 m/sec', 'option3', 'bsge', 'Mathematics', 'selected'),
(80, 'The captain of a ship views the top of a\r\nlighthouse at an angle of 60° with the\r\nhorizontal at an elevation of 6 meters above\r\nsea level. Five minutes later, the same\r\ncaptain of the ship views the top of the same\r\nlighthouse at an angle of 30° with the\r\nhorizontal. Determine the speed of the ship\r\nif the lighthouse is known to be 50 meters\r\nabove sea level.', '0.265 m/sec', '0.155 m/sec', '0.169 m/sec', '0.210 m/sec', 'option3', 'bsge', 'Mathematics', 'selected'),
(81, 'It is one of the five platonic solid and is\r\nbounded by 20 equilateral triangles.', 'Dodecahedron', 'Icosahedron', 'Hexahedron', 'Tetrahedron', 'option2', 'bsge', 'Mathematics', 'selected'),
(82, 'It is one of the five platonic solid and is\r\nbounded by 20 equilateral triangles.', 'Dodecahedron', 'Icosahedron', 'Hexahedron', 'Tetrahedron', 'option2', 'bsge', 'Mathematics', 'selected'),
(83, 'A regular triangular pyramid has an altitude\r\nof 9 m and a volume of 187.06 cu. m. What is\r\nthe base edge in meters?', '12', '13', '14', '15', 'option1', 'bsge', 'Mathematics', 'selected'),
(84, 'A regular triangular pyramid has an altitude\r\nof 9 m and a volume of 187.06 cu. m. What is\r\nthe base edge in meters?', '12', '13', '14', '15', 'option1', 'bsge', 'Mathematics', 'selected'),
(85, 'An observer wishes to determine the height\r\nof a tower. He takes sights at the top of\r\nthe tower from A and B, which are 50 feet\r\napart, at the same elevation on a direct line\r\nwith the tower. The vertical angle at point\r\nA is 30° and at point B is 40°. What is the\r\nheight of the tower.', '85.60 feet', '92.54 feet', '110.29 feet', '143.97 feet', 'option2', 'bsge', 'Mathematics', 'selected'),
(86, 'It is a point on a curve in which the curve\r\nchanges its concavity.', 'Point of imperfection', 'Point of curvature', 'Relative maxima', 'Point of inflection', 'option4', 'bsge', 'Mathematics', 'selected'),
(87, 'Advance survey shall be made only after a\r\nwritten authority is secured, upon\r\nrecommendation of the?', 'Chief of Cadastral', 'Reginal Technical Director of Lands', 'Chief Survey Division', 'Regional Executive Director', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(88, 'DENR DAO 2007-29 provides standard accuracy\r\nfor secondary traverse using conventional\r\ninstrument, linear error of closure is?', '20 cm/km', '5 cm/km', '10 cm/km', '2.5 cm/km', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(89, 'What is the main reason why our planet is\r\nhotter, which cause s another weather\r\ndisaster, drought and flood?', 'Too much water pollution', 'Uncontrolled temperature', 'Carbon Pollution', 'Noise Pollution', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(90, 'In primary control measurement by\r\nrepetition, subtract the observed angle from\r\nthe back azimuth of the proceeding line. If\r\nthe difference is negative, add 360 degrees.\r\nThe positive sum is?', 'Forward Solution', 'Forward Azimuth', 'Back Azimuth', 'Back Solution', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(91, 'Field notes containing erausre of field data\r\nshall not be accepted. If erroneous data have\r\nbeen entered, shall be crossed out with a\r\npencil line and the correct data be written.', 'Above it', 'Below it', 'After it', 'Before it', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(92, 'The constellation Cassiopeia, is used as\r\nreference to easily locate Polaris, the\r\nstars are formed like letter?', 'W', 'X', 'Y', 'Z', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(93, 'In primary control line measurement, the\r\nsteel tape shall be supported to minimize\r\nthe sagging, throughout its entire length at\r\nevery?', '25 meters', '50 meters', '20 meters', '10 meters', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(94, 'A photograph taken with the camera axis\r\ndirected intentionally between horizontal\r\nand vertical.', 'Displacement Photograph', 'Vertical Photograph', 'Oblique Photograph', 'Tilted Photograph', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(95, 'The base meridian to which all azimuth of\r\nlines of the project shall be referred is\r\ncalled?', 'Grid', 'Central', 'Primary', 'Geodetic', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(96, 'In mine surveying, the vertical angle\r\nbetween the plane of the vein and a\r\nhorizontal plane measured perpendicular to\r\nthe strike.', 'Heading', 'Drift', 'Shaft', 'Dip', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(97, 'In mine surveying, the vertical angle\r\nbetween the plane of the vein and a\r\nhorizontal plane measured perpendicular to\r\nthe strike.', 'Heading', 'Drift', 'Shaft', 'Dip', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(98, 'In declination of reservation, parks and\r\nother protected areas, the unsurvey claims\r\nshall be sketched and reflected in the plan\r\nin?', 'Broken Lines', 'Dotted Lines', 'Light full lines', 'Heavy lines', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(99, 'The uniform size of cadastral map is?', '65 x 60 m', '54 x 54 m', '45 x 45 m', '64 x 64 m', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(100, 'In the manual for land surveys procedure\r\nestablishment of geodetic control points by\r\nconnecting to existing control, the\r\nconnection shall be made to control on the\r\nsame higher order of accuracy, to achieve 3rd\r\norder, the minimum number of observations\r\nis?', '2', '3', '4', '5', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(101, 'In mineral land survey, the distance between\r\nlocation posts should not exceed of how many\r\nmeters?', '400', '500', '300', '600', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(102, 'It is the angular distance north or soth of\r\nthe celstial equator.', 'Declination of the Sun', 'Latitude of the observer', 'Hour angle of the sun', 'Altitude of the sun', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(103, 'Photoscale is also determined form the photo\r\ndistance dividing to its?', 'Ground Distance', 'Flight Altitude', 'Camera Focal Length', 'Flight height', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(104, 'The most farer able time to conduct solar\r\nobservation is?', 'Before 8am, after 2pm', 'Before 8am, before 2pm', 'After 8am, before 2pm', 'After 8am, after 2pm', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(105, 'The most farer able time to conduct solar\r\nobservation is?', 'Before 8am, after 2pm', 'Before 8am, before 2pm', 'After 8am, before 2pm', 'After 8am, after 2pm', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(106, 'It refers to all original surveys covering\r\nAlienable and Disposable lands which has not\r\nbeen subject to private rights nor devoted\r\nto public use pursuant to the provisions of\r\npublic land laws, as provided in DENR DAO\r\n2007-29.', 'Public Land Survey', 'Government Land Survey', 'Public Land Subdivision', 'Private Land Survey', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(107, 'It refers to all original surveys covering\r\nAlienable and Disposable lands which has not\r\nbeen subject to private rights nor devoted\r\nto public use pursuant to the provisions of\r\npublic land laws, as provided in DENR DAO\r\n2007-29.', 'Public Land Survey', 'Government Land Survey', 'Public Land Subdivision', 'Private Land Survey', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(108, 'It refers to all original surveys covering\r\nAlienable and Disposable lands which has not\r\nbeen subject to private rights nor devoted\r\nto public use pursuant to the provisions of\r\npublic land laws, as provided in DENR DAO\r\n2007-29.', 'Public Land Survey', 'Government Land Survey', 'Public Land Subdivision', 'Private Land Survey', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(109, 'How wide would the river be if a man 1.8 m\r\nhigh stands on the other bank of the river\r\nand still he could see a tower on the\r\nopposite bank of the river which is 30.50 m\r\nhigh considering the effect of curvature and\r\nrefraction.', '38.41 km', '29.15 km', '26.42 km', '34.56 km', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(110, 'The central angle of a simple curve is 38o,\r\nif the midpoint of the curve is 13m nearer\r\nthan the vertex what is the degree of curve?', '5.1o', '4.8o', '3.6o', '4.2o', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(111, 'The central angle of a simple curve is 38o,\r\nif the midpoint of the curve is 13m nearer\r\nthan the vertex what is the degree of curve?', '5.1o', '4.8o', '3.6o', '4.2o', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(112, 'In tertiary control triangulation, the check\r\non base must not exceed?', '1/10000', '1/50000', '1/15000', '1/20000', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(113, 'The bearing of the line was N 35-45 E when\r\nthe declination was 2-10 W. What is the\r\npresent magnetic bearing of the line if the\r\ndeclination today is 3-20 E.', 'N 25-00 E', 'N 40-10 E', 'N 30-05 E', 'N 35-05 E', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(114, 'A vein has a dip of 47o. A drift is driven N\r\n37-00 W in the plane of the vein. If the\r\nstrike is N 40-00 W. Determine the grade of\r\nthe drift.', '2.4%', '3.7%', '4.1%', '5.6%', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(115, 'What kind of watershed area the needs\r\nimmediate protection and rehabilitation is\r\nsupport to existing and future hydrostatic\r\npower irrigation and domestic water needs', 'Virgin Forest', 'Private Reforestation Project', 'Agro-forestry', 'Critical Watershed', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(116, 'A civil engineer recorded 50.8, 52.3, 51.6\r\nand 53.2 paces in walking along a 47.5 m\r\ncourse to determine his pace factor. He then\r\ntook 660,658,671 and 670 paces in walking an\r\nunknown distance. Compute the distance AB\r\nbased on his pace factor', '607.58 meters', '553.25 meters', '649.39 meters', '618.36 meters', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(117, 'A civil engineer recorded 50.8, 52.3, 51.6\r\nand 53.2 paces in walking along a 47.5 m\r\ncourse to determine his pace factor. He then\r\ntook 660,658,671 and 670 paces in walking an\r\nunknown distance. Compute the distance AB\r\nbased on his pace factor', '607.58 meters', '553.25 meters', '649.39 meters', '618.36 meters', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(118, 'Which agency of the government can bring\r\naction in court in order to revert a private\r\nland back to the government?', 'LMB', 'PARO', 'LRA', 'Office of the Solicitor General', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(119, 'Which agency of the government can bring\r\naction in court in order to revert a private\r\nland back to the government?', 'LMB', 'PARO', 'LRA', 'Office of the Solicitor General', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(120, 'It is the point in celestial body’s orbit\r\nwhere it is furthest from the sun.', 'Aphelion', 'Perihelion', 'Apgelion', 'Perigelion', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(121, 'A subtense bar is mounted at a certain\r\ndistance from the instrument and the angle\r\nsubtended by the bar is 0-04. Compute the\r\nhorizontal distance from the instrument to\r\nthe location of the subtense bar.', '1814.26 m', '2101.27 m', '1718.87 m', '2017.87 m', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(122, 'The vertical accuracy for the primary\r\ncontrol project is ___ mm times the square\r\nroot of the distance.', '15', '10', '12', '20', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(123, 'Provincial base maps shall be drawn in the\r\nPhilippine plane coordinate system on\r\ndrafting film of uniform size 54x54 cm to a\r\nstandard scale of?', '1:500000', '1:300000', '1:400000', '1:250000', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(124, 'The angle between two lines is 1600 mils.\r\nExpress the angle in radians.', '1.57', '1.86', '2.18', '2.62', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(125, 'The bottom cross section of a geodetic\r\ncontrol monument of a third order accuracy\r\nis __ cm.', '35 x 35', '30 x 30', '40 x 45', '25 x 25', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(126, 'Mapping surveys are made to determine the\r\nlocations of __________ and ___________\r\nfeatures on the Earth’s surface and to define\r\nthe configuration of that surface. Once\r\nlocated, these features can be represented\r\non map.', 'Natural; Cultural', 'Photogrammetric; Field', 'Geodetic; Plane', 'Relief; Surface', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(127, 'Mapping surveys are made to determine the\r\nlocations of __________ and ___________\r\nfeatures on the Earth’s surface and to define\r\nthe configuration of that surface. Once\r\nlocated, these features can be represented\r\non map.', 'Natural; Cultural', 'Photogrammetric; Field', 'Geodetic; Plane', 'Relief; Surface', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(128, 'Pick up the method of surveying in which\r\nfield observations and plotting proceed\r\nsimultaneously from the following:', 'chain surveying', 'compass surveying', 'plane table surveying', 'tacheometric surveying', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(129, 'If good field work is to be done with a\r\ncompass, the surveyor should:', 'Keep the declinator set at zero', 'Not carry a watch or pen knife', 'Keep the needle swinging freely at all\r\ntimes', 'Keep the point of the pivot sharp', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(130, 'If good field work is to be done with a\r\ncompass, the surveyor should:', 'Keep the declinator set at zero', 'Not carry a watch or pen knife', 'Keep the needle swinging freely at all\r\ntimes', 'Keep the point of the pivot sharp', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(131, 'Stations that are common to two or more\r\nsessions.', 'Curve sites', 'Open sites', 'Pivot sites', 'Common sites', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(132, 'Two concave lenses of 60 cm focal length are\r\ncemented on either side of a convex lens of\r\n15 cm focal length. The focal length of the\r\ncombination is?', '10 cm', '20 cm', '30 cm', '40 cm', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(133, 'A correct relationship is:', '1 grad = Π radians', '1 degree = 0.90 grads', '100 grads = 1200 mils', 'None of these', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(134, 'What is the baseline length of the dual\r\nfrequency receiver with a minimum\r\nobservation time of 4 hours for static mode?', '10 – 20 km', '20 – 30 km', '30 – 50 km', '50 – 150 km', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(135, 'The angle between two lines is 200 grads.\r\nExpress the angle in mils.', '3200', '1800', '2400', '1200', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(136, 'The strongest route in triangulation net\r\nhas:', 'Minimum value of R', 'Maximum value of R', 'Moderate value of R', 'None of the above', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(137, 'The azimuth from triangulation BALANACAN to\r\ntriangulation BALTAZAR is?', '09o12’37”', '121o52’03”', '09o22’37”', '121o32’03”', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(138, 'The mean error of a measurement obtain is\r\n0.01 and the standard deviation of that mean\r\nis equal to 0.02, what is the number of the\r\nobservation.', '0.26', '0.04', '0.25', '0.30', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(139, 'The method of least squares is used in\r\nsurveying to aid in:', 'Reducing corrections to observe\r\nvalues', 'Finding average values', 'Setting slope stakes', 'Adjusting triangulation nets', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(140, 'In markings of reference points, all letters\r\nand numbers shall be in Arial Bold font type,\r\nall capital and shall be _____ in height,\r\n_____ in width and _______ in thickness with\r\nmargins not less than 2 cm long the edge of\r\nthe monuments to give allowance for\r\nchipping.', '2.5cm; 0.4cm; 2cm', '2.5cm; 2 cm; 0.4cm', '2cm; 2.5cm; 0.4cm', '0.4cm; 2cm; 2.5cm', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(141, 'Three level lines established on three\r\ndifferent routes to established bench marks,\r\nthe result of which is as follows:\r\nRoute 1: Elevation of BM1 is 30.162m. BM2\r\nhas an elevation which is68.258m above BM1\r\nand BM3 is 75.442m above BM2. Distance of\r\nroute from BM1 to BM2 is 3km and from BM2 to\r\nBM3 is 7km.\r\nRoute 2: BM3 is 143.62m above BM1. Distance\r\nof route from BM1 to BM3 is 6 km long.\r\nRoute 3: BM3 is 143.58m above BM1. Distance\r\nof route from BM1 to Bm3 is 15 km long.\r\nCompute the elevat', '173.789', '173.798', '173.759', '173.795', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(142, 'Profile leveling differs from differential\r\nleveling generally in the number of:', 'Back sights', 'Instrument Set ups', 'Foresights', 'Turning points', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(143, 'What receiver has no limitation in baseline\r\nlengt?', 'Single Frequency', 'Dual Frequency', 'Third Frequency', 'Fourth Frequency', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(144, 'What receiver has no limitation in baseline\r\nlengt?', 'Single Frequency', 'Dual Frequency', 'Third Frequency', 'Fourth Frequency', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(145, 'If an employee notices a chemical spill but\r\nno one is injured, how should the situation\r\nbe classified.', 'Accident', 'Incident', 'Hazard', 'Imminent danger', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(146, 'The clockwise angle which a line makes with\r\nany reference-line is called:', 'Bearing', 'Declination', 'Deflection', 'Azimuth', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(147, 'Only Steel Tapes (graduated in metric\r\nsystem) which are at standard length at\r\ntemperatures between _____________ shall be\r\nused in the conduct of land surveys?', '27 and 37-degree Celsius', '21 and 36-degree Celsius', '25 and 34-degree Celsius', '23 and 39-degree Celsius', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(148, 'A rectangular lot is to be laid out by a 50m\r\ntape. During laying out the actual length is\r\n49.96m. if the dimensions of lot are 390.70m\r\nby 265.3m, what distances should be\r\nestablished in order to locate the corners\r\ncorrectly.', 'L’=390.39m; W’=265.09m', 'L’=391.01m; W’=265.51m', 'L’=390.74m; W’265.34m', 'L’=390.66m; W’=265.26m', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(149, 'The best way to remove grease spots on the\r\nobjective lens of a transit is to use:', 'A clean linen cloth', 'A silk handkerchief', 'Soap and water', 'A clean chamois skin lightly\r\nmoistened in alcohol', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(150, 'In trigonometric levelling, the slope\r\ndistance is s=120m with PEs= ±0.10m and\r\nβ=30°00’ with PEβ=±00°0’45”. Compute the\r\nprobable error in the vertical distance of\r\nthe slope.', '0.0679', '0.0674', '0.0680', '0.0675', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(151, 'The following survey symbols shall be used\r\nto designate private land subdivision of\r\ntitled property by Land Management Geodetic\r\nEngineer.', 'Bsd', 'Pst', 'Pcn', 'Pcs', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(152, 'The following survey symbols shall be used\r\nto designate private land subdivision of\r\ntitled property by Land Management Geodetic\r\nEngineer.', 'Bsd', 'Pst', 'Pcn', 'Pcs', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(153, 'An angle subtended by an arc of a circle\r\nhaving a length equal to the radius of the\r\ncircle.', 'Radian', 'Grads', 'Mils', 'Degrees', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(154, 'Assume that any distance of 1000m can be\r\ntaped with an error of ±0.04 ft if certain\r\ntechniques are employed. Determine the error\r\nin taping 5000m.', '±0.0089', '±0.0080', '±0.0890', '±0.0980', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(155, 'Lc is the Public Land Survey symbol used for?', 'Lease Application, Corporation', 'Lease Agricultural, Corporation', 'Land Agricultural, Corporation', 'Land Application, Corporation', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(156, 'Regular Stadia rods differ from leveling rod\r\nchiefly in:', 'Readability at longer distance', 'Length', 'Design and markings', 'Width and thickness', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(157, 'If S is the length of a sub chord and R is\r\nthe radius of simple curve, the angle of\r\n\r\ndeflection between its tangent and sub-\r\nchord, in minutes, is equal to:', '573 R/S', '171.9 S/R', '1718.9 R/S', '1718.9 S/R', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(158, 'In control point observation, it is\r\nprocedural condition that if the base point\r\nin static mode, other receiver during the\r\nobservation must be in:', 'Real-time kinematic', 'Rapid Static mode', 'Static mode', 'Kinematic mode', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(159, 'Determine the most probable elevation of\r\npoint B.', '709.79', '709.48', '709.74', '709.78', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(160, 'The sum of all measured values in a survey\r\nis 6002.7 m, and the average value per\r\nmeasurement is 1000.45 m. What is the number\r\nof measurements taken', '6', '7', '8', '9', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(161, 'Contour lines cross ridge lines:', 'Skewly', 'Vertically', 'Perpendicularly', 'Diagonally', 'option3', 'bsge', 'Theory and practice of surveying', 'selected'),
(162, 'The actual length of parcel of land is\r\n25436.41 m^2. If the combined factor is\r\n0.9997756 and the sea level reduction factor\r\nis 0.9998756, determine the grid area of\r\nland.', '25242', '25452', '25424', '25425', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(163, 'Offsets are measured with an accuracy of 1\r\nin 40. If the point on the paper from both\r\nsources of error (due to angular and\r\nmeasurement errors) is not to exceed 0.05 cm\r\non a scale of 1 cm = 20 m, the maximum length\r\nof offset should be limited to.', '14.14 m', '28.28 m', '200 m', 'd. none of these', 'option2', 'bsge', 'Theory and practice of surveying', 'selected'),
(164, 'An unintentional fault of conduct arising\r\nfrom poor judgement or confusion of mind of\r\nthe observer is?', 'Personal Error', 'Discrepancy', 'Error', 'Mistake', 'option1', 'bsge', 'Theory and practice of surveying', 'selected'),
(165, 'The period within which the water surface\r\nsubsides and flows back to the sea.', 'Flood Tide', 'Ebb Tide', 'Low Tide', 'High Tide', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(166, 'A block of coal or rock that hasn’t been\r\nmined.', 'Pillar', 'Heave', 'Crest', 'Collar', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(167, 'Camera lenses with an angular field of view\r\nless than 75o is classified as:', 'Normal Angle Lens', 'Ordinary Angle Lens', 'Wide Angle Lens', 'Super wide-Angle Lens', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(168, 'It is a piece of wire or rope attached to\r\nthe poles at the riverbanks and used to hold\r\nthe boat in place.', 'Stay Line', 'Tag Line', 'Slack Line', 'Set Line', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(169, 'A natural opening mode factures in coal beds.', 'Bulkhead', 'Brattice', 'Cleat', 'Batter', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(170, 'The metal process which fuse the images of\r\nthe two eyes into a three dimensional\r\nimpression.', 'Binocular', '3D Vision', 'Stereo Vision', 'Stereo Plotting', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(171, 'These are unsurveyed portion of bodies of\r\nwater.', 'Smooth Sheet', 'Tide', 'Holiday', 'Slack Water', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(172, 'A tunnel driven at right angles to the main\r\nheadings.', 'Crown Pillar', 'Box Cut', 'Face', 'Bord', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(173, 'Mapping of tunnel can be done by\r\nphotogrammetric method with the aid of:', 'Terrestrial Photography', 'Vertical Photography', 'Oblique Photography', 'Horizon Photography', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(174, 'It is used to locate the wrecks pinnacle\r\nrocks and other navigation hazard.', 'Set', 'Drift', 'Gaging Station', 'Wire Drag', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(175, 'The expansion of shot ground after a blast.', 'Heave', 'Collar', 'Arches', 'Crest', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(176, 'The angular space that can be seen through\r\nthe telescope is:', 'Horizontal Angle', 'Field of View', 'Rod reading', 'Parallax', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(177, 'The instant at which the tidal current is\r\nchanging its direction and flows either in\r\nor out.', 'Slack Water', 'Drift', 'Stream Gaging', 'Sounding', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(178, 'An open space left in an underground mine as\r\nresult of using the stoping method to remove\r\nwanted ore.', 'Toe', 'Portal', 'Stope', 'Cage', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(179, 'A part of a camera which enables the\r\nphotographer to have a continuous view of\r\nthe terrain below the aircraft and to see\r\nthe ground coverage of each photograph.', 'Viewfinder', 'Magazine', 'Filter', 'Diaphragm', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(180, 'It refers to the current flow direction.', 'Sounding', 'Drift', 'Set', 'Gaging Station', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(181, 'A steel structure built around a mine shaft\r\nfor supporting winding system, cages and\r\nskips.', 'Shaft', 'Headframe', 'Heading', 'Cage', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(182, 'The distance between the rear nodal point of\r\nthe lens and the focal plane.', 'Focal Length', 'Short Focal length', 'Complex Focal Length', 'Nodal point', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(183, 'These are office plots of all field data\r\ngathered during hydrographic survey.', 'Hydrographic chart', 'Holidays', 'Smooth Sheet', 'Sounding', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(184, 'A wall or structure used for blocking off an\r\nunderground opening.', 'Bractice', 'Bulkhead', 'Bund Wall', 'Charge', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(185, 'A point in the focal plane intersected by\r\nthe optical axis of the lens. This point is\r\nimportant in reconstructing the geometry of\r\nthe photograph.', 'Nodal Point', 'Fiducial Point', 'Principal Point', 'None of the above', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(186, 'Determine the adjusted value of angle A using\r\nleast squares method.', '20°10’13.09’’', '20°13’13.15’’', '20°10’14.45’’', '20°13’11.17’’', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(187, 'Determine the adjusted value of angle C using\r\nleast squares method.', '234°16’41.21’’', '234°19’40.73”', '20°10’14.45’’', '234°16’45.21’’', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(188, 'Pantograph is used for:', 'Measuring Distances', 'Measuring areas', 'Enlarging or reducing plans', 'Setting out right angles', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(189, 'Determine the most probable value of angle A\r\nusing least squares method.', '13.2328', '13.3282', '13.2823', '13.8232', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(190, 'Determine the most probable value of angle C\r\nusing least squares method.', '28.1438', '28.1482', '28.1483', '28.1481', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(191, 'Determine the most probable value of angle B\r\nusing least squares method.', '22.4651', '22.4650', '22.4550', '22.4560', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(192, 'If the elapsed times is 0.17 seconds,\r\ndetermine the depth of water, in meters.', '120', '130', '125.7', '127.5', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(193, 'If the elapsed times is 0.255 seconds,\r\ndetermine the depth of water, in meters.', '190.00', '191.52', '191.25', '195.15', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(194, 'If the elapsed times is 0.013 minute,\r\ndetermine the depth of water, in meters.', '585', '580', '590', '858', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(195, 'If the rate of gain of radial acceleration\r\nis 0.3 m per sec3 and full centrifugal ratio\r\nis developed. On the curve the ratio of the\r\nlength of the transition curve of same radius\r\non road and railway, is?', '2.828', '3.828', '1.828', '0.828', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(196, 'Calculate the maximum photographic scale.', '1:8100', '1:8200', '1:7500', '1:7600', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(197, 'Calculate the minimum photographic scale.', '1:8600', '1:8500', '1:7500', '1:7600', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(198, 'Calculate the minimum photographic scale.', '1:8600', '1:8500', '1:8400', '1:8300', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(199, 'Calculate the average photgraphic scale.', '1:8100', '1:8200', '1:8300', '1:8400', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(200, 'For a curve of radius 100 m and the normal\r\nchord of 10 m, the Rankine’s deflection angle\r\nis:', '0o25’.95', '2o51’.53', '1o25’.53', '1o35’.95', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(201, 'Determine the volume of excavation using\r\nend-area method.', '4093 m3', '4094 m3', '4095 m3', '4096 m3', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(202, 'Determine the volume of excavation using\r\nPrismoidal formula.', '4050.43 m3', '4050.44 m3', '5040.43 m3', '5040.34 m3', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(203, 'Compute for the volume of the earthworks.', '45.57 m3', '45.56 m3', '-45.57 m3', '-45.56 m3', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(204, 'The desired sensitivity of a bubble tube with\r\n2 mm divisions is 30\". The radius of the\r\nbubble tube should be:', '13.75 m', '3.44 m', '1375 m', 'none of these', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(205, 'Compute the mean velocity in m/sec.', '0.244 m/sec', '0.424 m/sec', '0.2465 m/sec', '0.4256 m/sec', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(206, 'What is the total discharge?', '26.4413 cu.m/sec', '26.3700 cu.m/sec', '26.4400 cu.m/sec', '26.3726 cu.m/sec', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(207, 'Compute the total cross-sectional area in\r\nsquare meters.', '107.00 sq. m', '108.25 sq. m', '107.25 sq. m', '108.00 sq. m', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(208, 'A map is drawn to scale of 1 to 31680. What\r\ndistance on the ground would be represented\r\nby 6.84 in on the map?', '18057.6 ft', '21669.12 ft', '24631.50 ft', '31432.60 ft.', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(209, 'The Diaphragm of a stadia theodolite is\r\nfitted with two additional:', 'Horizontal Hairs', 'Vertical Hairs', 'Horizontal and two vertical hairs', 'None of these', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(210, 'The size of the map lettering in a certain\r\ncartographic map is 15 points, give the\r\nequivalent height of the map lettering in\r\nmm.', '4.63 mm', '6.32 mm', '5.29 mm', '5.86 mm', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(211, 'Determine the maximum scale to be used for a\r\nsketch plan whose size of paper is 50x50 cm\r\nif the ground distance to be plotted is 5000\r\nm.', '1/20000', '1/50000', '1/5000', '1/2000', 'option1', 'bsge', 'CARTOGRAPHY', 'selected');
INSERT INTO `quiz` (`quizid`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `course`, `subject_name`, `checkQuestion`) VALUES
(212, 'Two hill tops A and B 20 km apart are\r\nintervened by a third top C. If the top most\r\ncontour of the three hill tops are of the\r\nsame value, state whether the line of\r\nsight AB.', 'passes clear of hill top C', 'passes below the hill top C', 'grazes the hill top C', 'none of these', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(213, 'It calls for the measurement of two or more\r\ndistances which are derived from the\r\naccurate measurement of times required for a subaqueous sound to reach two or more\r\nestablished receiving stations.', 'Electronic Position Indicator', 'Long Range Navigation', 'Short Range Navigation', 'Radio Acoustic Ranging', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(214, 'The operation of making the algebraic sum of\r\nlatitudes and departures of a closed\r\ntraverse, each equal to zero, is known?', 'balancing the sights', 'balancing the departures', 'balancing the latitudes', 'balancing the traverse', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(215, 'It is equipped with a component propeller\r\nwhich automatically registers only the\r\nvelocity component of current flow in the\r\ndirection parallel to the axis of the meter.', 'Haskel Meter', 'Hoff Meter', 'Ott Meter', 'Vane Meter', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(216, 'Those characterized by two high and two low\r\nwaters each tidal day.', 'Diurnal Tide', 'Mixed Tide', 'Semidiurnal Tide', 'Semi-mixed tide', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(217, 'Pursuant to DA0 2007-29 section 37, the\r\nsurvey control map shall be prepared on\r\nreproducible materials of stable base such\r\nas drafting film 0.03 mm with _____________\r\nbase?', 'Instrument', 'Appropriate', 'Polyester', 'Matte', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(218, 'If the corresponding photo distance of the\r\ntwo points is 3.87 yd, determine the\r\nphotographic scale at the elevation of the\r\nground line.', '1:700', '1:800', '1:600', '1:500', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(219, 'The sum of the interior angles of a\r\ngeometrical figure laid on the surface of\r\nthe earth differs from that of the\r\ncorresponding plane figure only to the\r\nextent of one second for every.', '100 sq. km of are', '150 sq. km of area', '200 sq. km of area', '300 sq.km of area', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(220, 'The best method of interpolation of\r\ncontours, is by:', 'estimation', 'graphical means', 'computation', 'all of these', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(221, 'Determine the angular field of view.', '93.4o', '94.4o', '95.4o', '96.4o', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(222, 'Determine the classification of this type of\r\ncamera lens according to angular field.', 'Normal Angle Lens', 'Ordinary Angle Lens', 'Wide Angle Lens', 'Super wide-Angle Lens', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(223, 'If the exposure station is at anelevation of\r\n3250 m. above mean sea level and the\r\nelevation of point A is 250 m. above mean\r\nsea level. Compute the photoscale at A.', '1/20000', '1/30000', '1/40000', '1/50000', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(224, 'Deviation of the actual road gradient from\r\nthe proposed contour gradient uphill side,\r\ninvolves?', 'embankment on the center line', 'excavation on the center line', 'earth work on the center line', 'none of these', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(225, 'Compute for the angular field of view.', '90.37o', '91.37o', '92.37o', '93.37o', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(226, 'Find the ground length cover by a single\r\nphotograph.', '2070', '2080', '2090', '2110', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(227, 'Compute the base-height ratio of the aerial\r\nphotograph.', '0.00', '0.30', '0.60', '0.90', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(228, 'A dumpy level is set up with its eyepiece\r\nvertically over a peg A. The height from the\r\ntop of peg A to the center of the eye-piece\r\nis 1.540 m and th reading on peg B is 0.705\r\nm. The level is then set up over peg B. the\r\nheight of the eye-piece above peg B is 1.490\r\nm and the reading on A is 2.195 m. the\r\ndifference in level between A and B is?', '2.90 m', '3.03 m', '0.77 m', '0.79 m', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(229, 'Geographical features on the map should be\r\nrepresented in their true shapes. This\r\nparticular characteristic is referred to as:', 'Conformality', 'Equal-Area', 'Equidistant', 'Aphylactic', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(230, 'It is short lines perpendicular to the neat\r\nline marking grid systems.', 'Registration', 'Tick', 'Color Registration', 'Fiducial Mark', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(231, 'It is the person who is responsible for\r\nsteering the boat on selected compass\r\nbearings or ranges.', 'Coxswain', 'Leadsman', 'Lookout', 'Fathometer Attendant', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(232, 'Any bed or channel thru which stagnant, dirty\r\nor slat water flows under the influence of\r\nthe tides is:', 'Estero', 'Arroyo', 'River', 'River', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(233, 'Any wide natural bed or channel thru which\r\nthe water flows continuously or\r\nintermittently throughout the year is\r\ncalled:', 'Estero', 'Arroyo', 'River', 'Ditch', 'option3', 'bsge', 'CARTOGRAPHY', 'selected'),
(234, 'Lands bordering on the seas, gulfs, bays or\r\nports are burdened with easements of coast\r\nof police to leave a right of way of:', '6 m', '5 m', '3 m', '20 m', 'option1', 'bsge', 'CARTOGRAPHY', 'selected'),
(235, 'Which of the following is not a typical\r\ncomponent of an aerial camera?', 'Cone', 'Diaphragm', 'Magazine', 'Collimator', 'option4', 'bsge', 'CARTOGRAPHY', 'selected'),
(236, 'JV, owner of a parcel of land, sold it to\r\nPP. But the deed of sale was not registered.\r\nOne year later, JV sold the parcel again to\r\nRR, who succeeded to register the deed and\r\nto obtain a transfer of certificate of title\r\nover the property in his own name.Who is the\r\nrightful owner?', 'JV', 'RR', 'PP', 'It Depends', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(237, 'It is a natural mineral formation or deposit\r\noccurring in a cave or lava tube including\r\nbut not limited to any stalactite,\r\nstalagmite, helictite, cave flower,\r\nflowstone concretion, drapery, rimstone or\r\nformation of clay or mud.', 'Speleothem', 'Significant Cave', 'Speleogem', 'Cave', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(238, 'A parcel of mineral land containing vein\r\nlode, lodge or mass or ore in place which\r\nhas been located in', 'Placer Claim', 'Stalagmite', 'Lode Mineral Claim', 'Dolomite', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(239, 'Who has the direct executive control on the\r\nsale, disposition and management of lands of\r\npublic domain?', 'Municipal Court', 'District Land Officer', 'Bureau of Lands', 'Regional Trial Court', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(240, 'How long is the term of office for PRC\r\nCommisioners after the first set of\r\nappointees has completed their service?', '3 years', '4 years', '6 years', '9 years', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(241, 'Fruits that produce by land of any kind\r\nthrough cultivation and labor.', 'Industrial Fruits', 'Natural Fruits', 'Civil Fruits', 'Commercial Fruits', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(242, 'The power of the government to protect\r\nprivate property for public use upon payment\r\nof just compensation.', 'Eminent Domain', 'Police Power', 'Power of Taxation', 'Escheat', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(243, 'Which of the following is considered\r\nimmovable property?', 'Fertilizer actually used on a piece\r\nof land', 'Forces of nature which are brought\r\nunder control ', 'Share of stocks of agriculture\r\nentities', 'Obligations and actions which have\r\nfor their obje', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(244, 'The maximum area of public agricultural land\r\nallowed for lease for corporation or\r\nassociation of which 60% of the capital\r\nbelongs to Filipinos.', '500 hectares', '1000 hectares', '2000 hectares', '48 hectares', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(245, 'A type of servitude, which used at intervals\r\nand depend upon the act of man.', 'Discontinuous', 'Continuous', 'Apparent', 'Non-Apparent', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(246, 'According to RA 7942, this is the permit\r\nrequired in order to extract materials\r\nneeded in construction of building or\r\ninfrastructure for public use or other\r\npurposes.', 'Industrial Sand and Gravel Permit', 'Government Gratuitous Permit', 'Mineral Processing Permit', 'Commercial Sand and Gravel Permit', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(247, 'What is the rationale for the payment of\r\nnominal damage?', 'For moral and physical anguish', 'When the exact amount of damages\r\ncannot be determ', 'In order to set an example', 'In order to vindicate a right when no\r\nother kind ', 'option4', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(248, 'A mortgage actions prescribes after how many\r\nyears?', '5 years', '10 years', '20 years', '30 years', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(249, 'All of these laws deal with land reform\r\nexcept:', 'RA 6389', 'RA 6552', 'PD 1517', 'RA 1400', 'option4', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(250, 'Which of the following does not define as\r\nchattel mortgage?', 'Condition sale of personal property', 'Mortgagor is divested of title if\r\ncondition is pe', 'Security for payment of debt or\r\nperformance of so', 'Conditional Sale is void if condition\r\nis performe', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(251, 'In this kind of contractual obligation where\r\ndemandability or extinguishment is subject\r\nto the expiration of term.', 'Pure', 'One with a Period', 'Reciprocal', 'Indivisible', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(252, 'Land adjacent to the sea which is being\r\nalternately covered and uncovered by the\r\nordinary flow of tide.', 'Marshy Land', 'Reclaimed Land', 'Foreshore Land', 'Swamps Land', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(253, 'Adverse claim over a title property can be\r\nsubjected to verified petition only after:', '30 days', '45 days', '60 days', '90 days', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(254, 'An act authorizing the Director of Lands to\r\nsubdivide the lands within military\r\nreservations belonging the Philippines which\r\nare no longer needed for military purposes\r\nand to dispose of the same by sale subject\r\nto certain conditions and for other\r\npurposes.', 'Act No. 274', 'Act No. 477', 'Act No. 456', 'Act No. 926', 'option4', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(255, 'In homestead, no certificate shall be given\r\nor patent issued for the land applied for\r\nuntil at least _______ of the land has been\r\nimproved and cultivated within the period of\r\n_________.', '1/5, not less than one or more than\r\nfive years', '1/3, not less than one or more than\r\nfive years', '1/5, not less than one or more than\r\nthree years', '1/3, not less than one or more than\r\nthree years', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(256, 'A written instrument executed in accordance\r\nwith law, wherein a person grants or conveys\r\nto another a certain land, tenements is\r\ncalled:', 'Title', 'Certificate of Ownership', 'Deeds', 'Registration', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(257, 'May a real property be classified validly as\r\npersonal property?', 'Yes, by special provision of our laws', 'Yes, by agreement between the parties', 'A real property is always a real\r\nproperty', 'A and B are correct', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(258, 'The debtor shall lose every right to make\r\nuse of the period when?', 'The debtors do furnish guaranties or\r\nsecurities p', 'The debtor did not violate an\r\nundertaking', 'The debtor becomes insolvent', 'The debtor did not attempt to abscond', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(259, 'It is the water, sea bottom and subsurface\r\nmeasured from the baseline of the Philippine\r\nArchipelago up to two hundred nautical miles\r\noffshore.', 'Territorial Sea', 'Exclusive Economic Zone', 'High Seas', 'Contiguous Zone', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(260, 'The right pertaining to the owner of a thing\r\nover everything which is produced thereby,\r\nor which is incorporated or attached\r\nthereto, either naturally or artificially is\r\nknown as:', 'Accession', 'Avulsion', 'Alluvion', 'Accretion', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(261, 'A foreigner marries an indigenous person and\r\nclaims ownership of their ancestral land.\r\nWhat does RA 8371 say about this?', 'Ancestral lands cannot be transferred\r\nto non-indi', 'The foreigner automatically gains\r\nland rights thr', 'The foreigner may lease but not own\r\nthe land', 'The land must be converted to private\r\nproperty fi', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(262, 'What section of RA 6657 provides that:\r\nIncentives for Voluntary Offers for Sales –\r\nLandowners, other than banks and other\r\nfinancial institutions, who voluntarily offer their lands for sale shall be entitled\r\nto an additional 5% cash payment.', 'Section 13', 'Section 24', 'Section 19', 'Section 28', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(263, 'An execution commanding the sheriff to enter\r\nthe land and give position thereto to the\r\nperson entitle under judgement.', 'Writ of Possession', 'Writ of Lid Pendens', 'Writ of Sheriff', 'Write of Decision', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(264, 'In a joint obligation with Uno, Dos, Tres,\r\nQuatro and Cinco as debtors and B1 and B2 as\r\ncreditors in the amount of Php 900,000. How\r\nmuch can B1 validly demand from Tres?', 'Php 90,000', 'Php 180,000', 'Php 450,000', 'Php. 900,000', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(265, 'What law governs CARPER?', 'RA 6657', 'RA 8532', 'RA 9700', 'RA 10010', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(266, 'The maximum area obtainable under sale of\r\npublic land under the 1987 Constitution.', '12 hectares', '1000 hectares', '24 hectares', '500 hectares', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(267, 'Public Agricultural Land may be sold not\r\nlocated within ____ kilometers from the\r\nboundaries of the city and not within ___\r\nkilometers from the municipal hall or town?', '15, 10', '10, 15', '5, 10', '10, 5', 'option4', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(268, 'The maximum area of public agricultural land\r\nallowed for lease for an individual who is a\r\nFilipino citizen of lawful age.', '48 hectares', '12 hectares', '500 hectares', '1000 hectares', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(269, 'The following are considered unethical,\r\nEXCEPT:', 'Refuse or neglect to report to the\r\nauthorities co', 'Criticize publicly a geodetic\r\nengineer in connect', 'Always be enthusiastic and devoted in\r\nimbuing Esp', 'Advertise in self-laudatory language\r\nor in other ', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(270, 'It is a side of a lot which abuts a street.', 'Lot', 'Frontage', 'Dwelling Unit', 'Open Space', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(271, 'The maximum period of lease of public\r\nagricultural land to qualified persons.', '5 years renewable for another 5 years', '25 years renewable for another 25\r\nyears', 'Indefinite period of time', 'Yearly', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(272, 'A cultural research team documents\r\nindigenous ritual without the permission and\r\npublishes them internationally. What right\r\nis violated?', 'Intellectual property rights of\r\nindigenous knowle', 'The right to privacy of indigenous\r\ngroup', 'The national heritage protection law', 'None, since research is a public\r\ndomain', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(273, 'It refers to the delay of oblige or creditor\r\nto accept the delivery of thing.', 'Compensation Morae', 'Mora Solvendi', 'Mora Accipiendi', 'Dolo Incidente', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(274, 'Hector is filing his income tax return to\r\nthe Bureau of Internal Revenue (BIR) for the\r\nyear 2016. In this case.', 'The active subject is the BIR, the\r\npassive subjec', 'The active subject is Hector, the\r\npassive subject', 'The active subject is the BIR, the\r\npassive subjec', 'The active subject is the BIR, the\r\npassive subjec', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(275, 'A street or a road that services\r\npedestrian/vehicular traffic from minor\r\nroads leading to major roads.', 'Collector Road', 'Motor Court', 'Minor Road', 'Service Road', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(276, 'Who is the direct executive control on the\r\nsale, disposition and management of the\r\nlands of public domain?', 'Municipal Court', 'District Land Officer', 'Bureau of Lands', 'Regional Trial Court', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(277, 'The Director of Lands shall announce the sale\r\nthereof by publishing the proper notice once\r\na week for __________ consecutive weeks in\r\nthe Official Gazette.', 'Four', 'Five', 'Six', 'Seven', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(278, 'Convergence correction is a function of:', 'Difference in longitude', 'Mean of Latitude', 'Both A and B', 'None of the above', 'option3', 'bsge', 'GEODESY', 'selected'),
(279, 'Rents of buildings, price of leases of lands\r\nand other property and the amount of\r\nperpetuity or life annuities or other\r\nsimilar income is so called:', 'Civil Fruits', 'Industrial Fruits', 'Natural Fruits', 'Natural Accession', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(280, 'Jose, Larry and Mario owe Mr. Lim Php 60,000.\r\nWhen Mr. Lim demanded the return of the loan\r\nfrom Larry, Larry only paid Php 20,000. What\r\nkind of obligation does it contemplate?', 'Alternative Obligation', 'Joint Obligation', 'Solidary Obligation', 'Divisible Obligation', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(281, 'Lolo Mark promised his grandson that he will\r\ngive him a condo unit when he graduates from\r\ncollege. The obligation contains?', 'Positive Condition', 'Suspensive Condition', 'Resolutory Condition', 'None of the Above', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(282, 'What is the Geodetic Azimuth from Station\r\n\r\nBHL-1 t station CBU-1 assuming that the arc-\r\nto-chord correction is negligible?', '183o38’32.0”', '183o38’33.0”', '183o38’34.0”', '183o38’35.0”', 'option1', 'bsge', 'GEODESY', 'selected'),
(283, 'An exclusive property of the wife while she\r\nwas still unmarried is called:', 'Conjugal Property', 'Capital Property', 'Paraphernal Property', 'Movable Property', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(284, 'A local company starts logging operations on\r\nindigenous land without consent. Under RA\r\n8371, what legal action can the indigenous\r\ncommunity take?', 'File a case for environmental\r\ndestruction and vio', 'Demand a share of the profits from the\r\nlogging co', 'Request local government intervention', 'Allow logging if the company agrees\r\nto replant tr', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(285, 'This is to alienate property.', 'Jus Utendi', 'Jus Disponendi', 'Jus Abutendi', 'Jus Vindicandi', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(286, 'Essential requisites of contracts.', 'Consent of the contracting parties', 'Object certain which is the subject\r\nmatter of the', 'Cause of obligation which is\r\nestablished', 'All of the above', 'option4', 'bsge', 'Theory and practice of surveying', 'selected'),
(287, 'According to Republic Act 4374, the\r\ncomposition of the Board of GE will be\r\nappointed by the President of the\r\nPhilippines with the consent of\r\n_____________, upon the recommendation of\r\nthe ________________:', 'Professional Regulation Commission,\r\nCommissioner ', 'Commissioner of the Civil Service,\r\nCommission on ', 'Commissioner of Civil Service,\r\nProfessional Regul', 'Commission on Appointments,\r\nCommissioner of the C', 'option4', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(288, 'The retention limit for land owners under PD\r\n27 is:', '7 hectares', '5 hectares', '3 hectares', '15 hectares', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(289, 'The decree proclaiming the Urban Land Reform\r\nin the Philippines.', 'PD No. 1216', 'PD No. 1517', 'PD No. 1967', 'PD No. 471', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(290, 'Juan fraudulently acquires a duplicate land\r\ntitle and sells the land to an unsuspecting\r\nbuyer. What is the buyer’s legal recourse?', 'The buyer can claim the land since\r\nthey hold a To', 'The buyer must request the Register\r\nof Deeds to v', 'The buyer must sue Juan for fraud and\r\nreversion', 'The buyer automatically forfeits and\r\nland due to ', 'option3', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(291, 'Which characteristics does not refer to an\r\nalluvion?', 'Accretion is gradual', 'Accretion can be identified', 'There are only attachments', 'Accretion cannot be identified', 'option4', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(292, 'An act to govern the relations between\r\nlandholders and tenants of agricultural\r\nlands.', 'RA 1199', 'RA 2348', 'RA 1395', 'RA 1889', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(293, 'Buko, Fermin and Toti bound themselves\r\nsolidarily to pay Ayee the amount of Php\r\n5,000. Suppose Buko paid the obligation,\r\nwhat is his right against his co-debtors.', 'Buko can ask for reimbursement from\r\nFermin and To', 'Buko can use Fermin and Toti for the\r\ndamages', 'Buko can sue for rescission', 'Buko can claim a refund from Ayee', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(294, 'In order to be considered small scale mining,\r\nwhat should be the maximum annual production\r\nof ore?', '50,000 metric tons', '10,000 metric tons', '25,000 metric tons', '100,000 metric tons', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(295, 'A type of condition where the fulfillment of\r\nwhich will extinguish an obligation or right\r\nalready existing.', 'Resolutory Condition', 'Suspensive Condition', 'Extinguish Condition', 'Demandable Condition', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(296, 'It is the agency who primarily responsible\r\nfor administering the public domain and\r\nproviding services related to land\r\nmanagement, surveys, and mapping.', 'LRA', 'LMB', 'DENR', 'LGU', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(297, 'This is extension of the right to that which\r\nis incorporated or attached to a thing which\r\nbelongs to such person.', 'Accession Discreta', 'Accession Continua', 'Accession Natural', 'Changing of river beds', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(298, 'It is the conduct that may consist of giving,\r\ndoing, or not doing something.', 'Obligation', 'Prestation', 'Contracts', 'Juridical Necessity', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(299, 'A and B are solidary debtor of C and D, both\r\ncreditors, to the amount of Php 1,000. C can\r\ndemand.', 'Php 1,000 from A or Php 1,000 from B', 'Php 1,000 from A and Php 1,000 from B', 'Php 500 from A or Php 500 from B', 'Php 500 from A and Php 500 from', 'option1', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(300, 'When the Philippine Fisheries Commission was\r\ncreated, the functions and duties of certain\r\nagencies over fishing vessels and fishery\r\nmatters were transferred to and vested in\r\nthe Commission. The following except one are\r\nsuch agencies:', 'Bureau of Customs', 'Philippine Navy', 'Philippine Constabulary', 'Philippine Coastguard', 'option4', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(301, 'Why are alluvial deposits given to the owner\r\nof lands adjoining the banks of rivers?', 'The owner is still considered\r\nlandless', 'Because the adjoining owner is a\r\ntenant', 'To make every square inch of the land\r\nproductive', 'To offset his loss for possible\r\nerosion', 'option4', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(302, 'What is the Meridian Convergence in arc\r\nseconds?', '44.9”', '54.9”', '59.4”', '44.4”', 'option3', 'bsge', 'GEODESY', 'selected'),
(303, 'The number of rowhouses shall not exceed 20\r\nunits per block/cluster but in no case shall\r\nthis be beyond how many meters in length?', '200 meters', '100 meters', '150 meters', '50 meters', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(304, 'Maria has to pay for the hospital bills and\r\nother damages when she accidentally hit\r\nNonoy. The source of this obligation is:', 'Contracts', 'Quasi-Delict', 'Law', 'Delict', 'option2', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(305, 'Roma is obliged to give Althea either objects\r\nNo.1, No.2 or No.3 at Althea’s option. Before\r\nAlthea communicated her choice to Roma,\r\nobject No.1 had been destroyed, thru Roma’s\r\nfault and object No.2 had been destroyed by\r\na fortuitous event. Althea may:', 'Demand object No.3 only as it is still\r\navailable', 'Demand the price of object No.1 only\r\nplus the dam', 'Demand the value of object No.2 as the\r\nright choi', 'Demand either object No.3 or the price\r\nof object ', 'option4', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(306, 'What is the minimum lot area of Duplex/Single\r\nAttached for medium cost housing?', '120 sq. m.', '96 sq. m.', '100 sq. m.', '80 sq. m.', 'option4', 'bsge', 'LAWS, RULES AND REGULATIONS', 'selected'),
(307, 'The high interviewing transmittance regions\r\nare often known as?', 'Atmospheric Bands', 'Atmospheric Windows', 'Scattering', 'Reflectance', 'option2', 'bsge', 'GEODESY', 'selected'),
(308, 'The leaf area index (LAI) is:', 'One sided leaf area per unit area of\r\nthe ground', 'Two-sided leaf area per unit area of\r\nthe ground', 'The average of the two-sided area per\r\nunit area o', 'None of these', 'option1', 'bsge', 'GEODESY', 'selected'),
(309, 'Which of the following statement is FALSE?', 'At the equator, the Prime Vertical\r\nRadius is equa', 'Meridian Radius of Curvature is\r\nalways greater th', 'At the poles, the Meridian Radius of\r\nCurvature is', 'None of the above', 'option2', 'bsge', 'GEODESY', 'selected'),
(310, 'A second of latitude near the equator bears\r\nwhat relationship to a second of arc near\r\nthe pole.', 'A second of latitude near the poles\r\nis approximat', 'A second of latitude has the same\r\nlength regardle', 'A second of latitude near the poles\r\nis approximat', 'Each second of latitude north of the\r\nequator grow', 'option1', 'bsge', 'GEODESY', 'selected'),
(311, 'Which planet’s orbit around the sun is most\r\nnearly circular?', 'Venus', 'Earth', 'Neptune', 'Pluto', 'option1', 'bsge', 'GEODESY', 'selected'),
(312, 'The forward and back azimuths of a geodetic\r\nline do NOT differ by exactly 180 degrees due\r\nto the?', 'Location of the observer', 'Length of observation', 'Convergence of the meridians', 'Difference in instruments', 'option3', 'bsge', 'GEODESY', 'selected'),
(313, 'It is the rate of transfer of radiant energy.', 'Radiance', 'Radiant Flux', 'Irradiance', 'Radiant Exitance', 'option2', 'bsge', 'GEODESY', 'selected'),
(314, 'Scattering depends on several factors\r\nincluding:', 'The wavelength of the radiation', 'The abundance of particles or gases', 'The distance the radiation travels\r\nthrough the at', 'All of the above', 'option4', 'bsge', 'GEODESY', 'selected'),
(315, 'The one who observed that pendulum clocks\r\nthat kept good time in Paris lose 2 1⁄2 minutes\r\nper day when brought to Cayene, Guiana, near\r\nthe equator in South America. This indicates\r\nthat the earth is flattened at the poles.', 'Richer', 'Snellius', 'Picard', 'Cassini', 'option1', 'bsge', 'GEODESY', 'selected'),
(316, 'It is the variant of map projection wherein\r\nthe projection lines are from the infinity.', 'Orthographic', 'Gnomonic', 'Aphylactic', 'Stereographic', 'option1', 'bsge', 'GEODESY', 'selected'),
(317, 'Remote sensing image is:', 'Irregularly spaced sample points', 'A raster of rectangular cells', 'A raster of regularly spaced sample\r\npoints', 'Irregularly shaped polygons', 'option3', 'bsge', 'GEODESY', 'selected'),
(318, 'Which of the following statement is FALSE?', 'The Radius of Curvature of Normal\r\nSections at 600', 'The Radius of Curvature of Normal\r\nSections is equ', 'The values of Radius of Curvature of\r\nNormal Secti', 'none of the above', 'option3', 'bsge', 'GEODESY', 'selected'),
(319, 'The maximum absorption of solar radiation\r\ndue to ozone occurs at wave lengths.', 'shorter than 0.3 μm', 'shorter than 0.2 μm', 'greater than 0.3 μm', 'None of these', 'option1', 'bsge', 'GEODESY', 'selected'),
(320, 'Determine the angular field of view of a\r\ncamera having a 200 mm square format and a\r\nfocal length of 150 mm.', '94.63o', '84.23o', '72.46o', '62.84o', 'option1', 'bsge', 'GEODESY', 'selected'),
(321, 'The scale factor at the origin of any PTM\r\nZone is _____ than the scale factor of any\r\nUTM Zone by _____.', 'Lesser, 0.00035', 'Lesser, 0.00010', 'Greater, 0.00035', 'Greater, 0.00010', 'option3', 'bsge', 'GEODESY', 'selected'),
(322, 'In map projections, areas of low distortion\r\nare usually located?', 'near the equator', 'at the center of the map', 'near the point or line of intersection\r\nof the glo', 'all of the above', 'option3', 'bsge', 'GEODESY', 'selected'),
(323, 'Find the length of a second of an arc at the\r\nequator of a spheroid whose semi axis are\r\n6378301 m. and 6356584 m.', '30.9229', '29.9229', '28.9229', '27.9229', 'option1', 'bsge', 'GEODESY', 'selected'),
(324, 'It is derived from cylinder cutting the\r\nsphere at the 45oN and 45oS parallels or the\r\nstandard parallels of the projection.', 'Azimuthal Projection', 'Mercator Projection', 'Gall projection', 'Polyconic Projection', 'option3', 'bsge', 'GEODESY', 'selected'),
(325, 'What is the wavelength range for blue?', '0.466–0.500 μm', '0.578–0.592 μm', '0.400–0.446 μm', '0.620–0.700 μm', 'option1', 'bsge', 'GEODESY', 'selected'),
(326, 'The geocentric latitude of point is 60o20’ N\r\nin a sphere having a radius of 6387043 m.\r\nCompute the geodetic latitude.', '60o20’ N', '62o30’ N', '63o30’ N', '61o36’ N', 'option1', 'bsge', 'GEODESY', 'selected'),
(327, 'It is a curve cutting the meridians of\r\na sphere at a constant non-right angle.', 'Conical', 'Mercator', 'Loxodromes', 'Orthodromes', 'option3', 'bsge', 'GEODESY', 'selected'),
(328, 'Second eccentricity (e) is defined as:', '√\r\na2−b\r\n2\r\na2', '√\r\na2−b', '√\r\na−b\r\nb', 'None of the above', 'option2', 'bsge', 'GEODESY', 'selected'),
(329, 'A spheroid has a first eccentricity of\r\n0.81427. Compute the value of its\r\nflattening.', '0.4195', '0.1459', '0.9415', '0.5419', 'option1', 'bsge', 'GEODESY', 'selected'),
(330, 'The following projections produce conformal\r\nmaps EXCEPT:', 'Lagrange Projection', 'Miller Oblated Stereographic\r\nProjection', 'Mercator Projections', 'Winkle Tripel Projection', 'option4', 'bsge', 'GEODESY', 'selected'),
(331, 'It is the law stating that thermal energy\r\nradiated by a blackbody radiator per second\r\nper unit area is proportional to the fourth\r\npower of the absolute temperature.', 'Planck’s Law', 'Wien’s Displacement Law', 'Stefan-Boltzmann Law', 'Blackbody Law', 'option3', 'bsge', 'GEODESY', 'selected'),
(332, 'Determine the gravity if a 40 cm pendulum\r\noscillates at 0.634 sec. Express the units\r\nin gals.', '982.16', '981.46', '982.49', '981.02', 'option1', 'bsge', 'GEODESY', 'selected'),
(333, 'The shortest distance between on the earth’s\r\nsurface which crosses successive meridian at\r\ndifferent angle; thus, its azimuth varies\r\nfrom point to point.', 'Loxodromes', 'Orthodromes', 'Mercator', 'Conical', 'option2', 'bsge', 'GEODESY', 'selected'),
(334, 'It is a method to visualize and characterize\r\nthe local distortions after applying a\r\nspecific map projection.', 'Convergence', 'Error propagation', 'Scaling', 'Tissot’s indicatrix', 'option4', 'bsge', 'GEODESY', 'selected'),
(335, 'If the semi-major and semi minor axes of a\r\nspheroid are a = 6378300 m and b = 6356580 m\r\nrespectively, compute the second\r\neccentricity of the spheroid?', '0.082456', '0.081942', '0.076172', '0.078942', 'option1', 'bsge', 'GEODESY', 'selected'),
(336, 'What is the angular deflection of the\r\nvertical for a spherical model of the earth?', 'Arc Sin e', '90o', '90o', '0o', 'option4', 'bsge', 'GEODESY', 'selected'),
(337, 'In sunlight, water poor in phytoplankton\r\nappears:', 'Red', 'Deep Blue', 'Green', 'Yellow', 'option2', 'bsge', 'GEODESY', 'selected'),
(338, 'The resultant obtained by combining the\r\nforce of the earth’s attraction due to\r\ngravitation and the centrifugal force due to\r\nthe rotation of earth.', 'gravity', 'centripetal force', 'curvilinear force', 'momentum', 'option1', 'bsge', 'GEODESY', 'selected'),
(339, 'The coordinates of a given point on the earth\r\nis expressed as (1/3, 2/3, 2/3). Find the\r\nlongitude of the point assuming the earth to\r\nbe sphere.', '63o26’06” E', '74o12’44” E', '88o10’36” E', '52o10’36” E', 'option1', 'bsge', 'GEODESY', 'selected'),
(340, 'The Technical Bulletin No. 26 published by\r\nthe Bureau of Lands in 1975 is also known\r\nas?', 'Revised Manual of Land Surveying', 'Philippine Plane Coordinate System-\r\nTransverse Me', 'Conversion Tables of Grid to\r\nGeographic and Geogr', 'Philippine Transverse Mercator Grid\r\nTables', 'option4', 'bsge', 'GEODESY', 'selected'),
(341, 'Find the z coordinate of a point having a\r\nreduced latitude = 40o N and longitude = 120o\r\nE, if a = 6378000 m, e = 0.08123 for a\r\ngeocentric rectangular coordinate system.', '4086151.44 m', '4725161.22 m', '4526776.11 m', '5424356.44 m', 'option1', 'bsge', 'GEODESY', 'selected'),
(342, 'A tall boy standing on the shore looks\r\ntowards the sea. If his eyes are 1.70 m above\r\nmean sea level, find the distance out to the\r\nsea is his visible horizon neglecting the\r\neffects of waves.', '6.019 km', '4.017 km', '5.018 km', 'None of the Above', 'option3', 'bsge', 'GEODESY', 'selected'),
(343, 'In which part of the reflective optical\r\ninfrared region, the effect of multiple\r\nleaves in vegetation canopy is maximum.', 'The near-IR (0.7 - 1.3 μm) region', 'The visible (0.4 - 0.7 μm) region', 'The short-wave IR (1.3 - 2.7 μm)\r\nregion', 'In all the above regions', 'option1', 'bsge', 'GEODESY', 'selected'),
(344, 'If the longitude of Davao City is 123o45’30”\r\nE, what is its local time when the standard\r\ntime is 3:16:20 P.M.?', '3:31:22 PM', '3:15:10 PM', '3:18:20 PM', '3:20:12 PM', 'option1', 'bsge', 'GEODESY', 'selected'),
(345, 'If a and b are the semi-major and minor axes\r\nof the ellipsoid respectively, then the\r\nradius of curvature of the prime vertical at\r\nthe poles is:', 'b', '√ab', 'b\r\n2', 'a', 'option4', 'bsge', 'GEODESY', 'selected'),
(346, 'It is the first datum established in the\r\nPhilippines.', 'Luzon Datum', 'Vigan Datum', 'World Polyconic Grid', 'Local Datum', 'option2', 'bsge', 'GEODESY', 'selected'),
(347, 'Manila is at longitude 120oE. if Moscow is\r\nat longitude 15o E. What time is it in Moscow\r\nif it is 7:00 PM in Manila?', '12:00 NN', '2:00 AM', '6:00 PM', '8:00 AM', 'option1', 'bsge', 'GEODESY', 'selected'),
(348, 'The angle between the direction of plumb line\r\nand the plane of celestial equator.', 'Astronomical Latitude', 'Declination', 'Astronomical position', 'Astronomical grid', 'option1', 'bsge', 'GEODESY', 'selected'),
(349, 'The main functional blocks of a\r\nmultispectral scanner (MSS) are given below.\r\nWhich one of the following sequences is\r\ncorrect?\r\n1. Video processor\r\n2. Dispersive system\r\n3. Detector\r\n4. Signal conditioner\r\n5. Collecting optics', 'a. 1, 4, 5, 3, 2', 'b. 5, 3, 2, 4, 1', 'c. 5, 2, 3, 1, 4', 'd. 1, 3, 2, 4, 5', 'option3', 'bsge', 'GEODESY', 'selected'),
(350, 'The local time at Davo City whose longitde\r\nis 120o45’ E is 4;30 PM. Determine the\r\nstandard time.', '4:25 PM', '4:33 PM', '4:30 PM', '4:27 PM', 'option4', 'bsge', 'GEODESY', 'selected'),
(351, 'Convergence correction is added to the\r\ngeodetic azimuth to determine the correct\r\ngrid azimuth of a line if the line is ___ of\r\nthe central meridian.', 'East', 'North', 'West', 'South', 'option3', 'bsge', 'GEODESY', 'selected'),
(352, 'What is the extent of PTM Zone 2?', '116° to 118°30’', '117° to 120°30’', '117°30’ to 120°30’', '119°30’ to 122°30’', 'option3', 'bsge', 'GEODESY', 'selected'),
(353, 'In the observation of the star for the\r\ndetermination of the direction of a line the\r\nposition coordinate needed at a point of\r\nobservation is:', 'Hour Angle', 'Longitude', 'Latitude', 'Polar Distance', 'option3', 'bsge', 'GEODESY', 'selected'),
(354, 'What is the value of q?', '0.024937241', '0.037241024', '0.049302724', '0.024931427', 'option1', 'bsge', 'GEODESY', 'selected'),
(355, 'What is the geographic coordinate of\r\nlatitude?', '12o41’42.6378”', '12o41’42.7863”', '12o51’42.6378”', '12o51’42.7863”', 'option3', 'bsge', 'GEODESY', 'selected'),
(356, 'What is the geographic coordinate of the\r\nlongitude?', '123o12’47.1”', '123o13’47.1”', '123o14’47.4”', '123o15’47.4”', 'option2', 'bsge', 'GEODESY', 'selected'),
(357, 'It is the ratio of the total solar radiant\r\nenergy returned by a planetary body to the\r\ntotal radiant energy incident on the body.', 'Reflectance', 'Reflectance factor', 'Albedo', 'None of the above', 'option3', 'bsge', 'GEODESY', 'selected'),
(358, 'In the global positioning system, how many\r\nsatellites must be observed to get an\r\ninstantaneous point position?', '5', '4', '3', '2', 'option2', 'bsge', 'GEODESY', 'selected'),
(359, 'GNSS observation time depends on the\r\nfollowing factors:\r\nI. Type of GNSS receiver\r\nII. Qualification of observer\r\nIII. Distance between receivers\r\nIV. Number of satellites', 'I, II and III', 'I, II, III, and IV', 'II, III and IV', 'I, III and IV', 'option4', 'bsge', 'GEODESY', 'selected'),
(360, 'A point on a spheroid has a reduced latitude\r\n= 38o N and longitude = 120o E. if the length\r\nof semi axis a = 6378000 m and the first\r\n\r\neccentricity = 0.081316. Find the x-\r\ncoordinate of a point for a geocentric\r\n\r\nrectangular coordinate system.', '-2512966.29 m.', '2512966.29 m.', '-2569126.29 m.', '2569126.29 m.', 'option1', 'bsge', 'GEODESY', 'selected'),
(361, 'A point on a spheroid has a reduced latitude\r\n= 38o N and longitude = 120o E. if the length\r\nof semi axis a = 6378000 m and the first\r\n\r\neccentricity = 0.081316. Find the y-\r\ncoordinate of a point for a geocentric\r\n\r\nrectangular coordinate system:', '-4352585.30 m', '4352585.30 m', '-4358525.30 m', '4358525.30 m', 'option2', 'bsge', 'GEODESY', 'selected'),
(362, 'A point on a spheroid has a reduced latitude\r\n= 38o N and longitude = 120o E. if the length\r\nof semi axis a = 6378000 m and the first\r\n\r\neccentricity = 0.081316. Find the z-\r\ncoordinate of a point for a geocentric\r\n\r\nrectangular coordinate system?', '3913586.15 m.', '-3913586.15 m.', '3913685.15 m.', '-3913685.15 m.', 'option3', 'bsge', 'GEODESY', 'selected'),
(363, 'With the increase of turbidity, the muddy\r\nwater appears brown due to the shift of the\r\nupward radiance peak towards.', 'Yellow', 'Green', 'Red', 'Blue', 'option3', 'bsge', 'GEODESY', 'selected'),
(364, 'Polar flattening (f) is defined as:', 'a\r\n2−b\r\n2\r\na2', '1 −\r\nb\r\na', '2−b\r\n2\r\nb\r\n2', '√\r\na−b\r\nb', 'option2', 'bsge', 'GEODESY', 'selected'),
(365, 'The present projection used in cadastral\r\nprojects and topographic projects in the\r\nPhilippines is:', 'Transverse Mercator', 'Polyconic', 'Lambert', 'Mercator', 'option4', 'bsge', 'GEODESY', 'selected'),
(366, 'Polyconic Projection was devised in 1820 by\r\n__________. In which the curvature of the\r\ncircular arc of each of the parallel on the\r\nmap is the same as it would be following the\r\nunrolling of a cone which had wrapped around\r\nthe globe tangent to the particular parallel\r\nof latitude, with the parallel traced onto\r\nthe cone.', 'Ferdinand Hassler', 'O.M. Miller', 'Rigobert Bonne', 'J.H. Lambert', 'option1', 'bsge', 'GEODESY', 'selected'),
(367, '\"All bodies at temperatures above absolute\r\nzero degree emit electromagnetic radiation\r\nat different wavelength\", is known as?', 'Plank\'s law', 'Stefan Boltzmann law', 'Blackbody law', 'None of the above', 'option1', 'bsge', 'GEODESY', 'selected'),
(368, 'Lambert Conformal Projection was commonly\r\nused in portraying area predominantly in an\r\neast-west direction, EXCEPT.', 'Iran', 'Turkey', 'China', 'Japan', 'option4', 'bsge', 'GEODESY', 'selected'),
(369, 'Energy of EM is _______________ proportional\r\nto v, and _______________ proportional to λ.', 'directly; inversely', 'directly; directly', 'inversely; directly', 'inversely; inversely', 'option1', 'bsge', 'GEODESY', 'selected'),
(370, 'In the equation h = H + N, what does H stand\r\nfor?', 'Geoidal height', 'Ellipsoid-geoid separation', 'Ellipsoidal height', 'Hourly height', 'option1', 'bsge', 'GEODESY', 'selected'),
(371, 'He suggested that the earth is a spherical\r\nshape on the basis that the sphere was\r\nconsidered a perfect shape and not from\r\nobservations.', 'Homer', 'Pythagoras', 'Aristotle', 'Eratosthenes', 'option2', 'bsge', 'GEODESY', 'selected'),
(372, '_______, in considering his attraction\r\ntheory, postulated that the rotating earth\r\nshould be flattened in the_______. This\r\nwould imply that as one travels towards the\r\nequator we go farther from the center of the\r\nearth.', 'Bouguer, equator', 'Bouguer, poles', 'Newton, equator', 'Newton, poles', 'option4', 'bsge', 'GEODESY', 'selected'),
(373, 'Identification of crops is affected by:', 'The spectral characteristics of the\r\nsensor', 'The spatial characteristics of the\r\nsensor', 'The radiometric characteristics of\r\nthe sensor', 'All of the above', 'option4', 'bsge', 'GEODESY', 'selected'),
(374, 'fdgdfgd', 'gdgfdfg', 'dfgfdg', 'dfgdfg', 'dfgdfrrg', 'option1', 'bsaben', 'Area 1: Laws, Professionals Standards & Ethics', 'selected'),
(375, ';\'l;;\'', 'l;\'l;\'', 'hjfgh', 'fghdfghd', 'hghdgfh', 'option1', 'bsaben', 'Area 1: Agricultural and Biosystems Machinery Specifications, Testing and Evaluation', NULL),
(376, 'fhggfhfgh', 'fghfghfhgfg', 'hfghfghfg', 'hfghf', 'hfghf', 'option1', 'bsaben', 'Area 1: Laws, Professionals Standards & Ethics', 'selected'),
(377, 'FGDGDFRGFDG', 'DFGFDG', 'DFGDFG', 'DFGDFG', 'DFGDFG', 'option1', 'bsaben', 'Area 1: Agricultural and Biosystems Mechanization, Planning, Operation, Maintenance, Management and Manufacturing', 'selected'),
(378, 'afdasf', 'sdfsdf', 'sdf', 'dsfdsf', 'sdfsd', 'option2', 'bsaben', 'Area 1: Agricultural and Biosystems Power Engineering', 'selected'),
(379, 'dsfsdf', 'dfsdf', 'dsfs', 'asngfhgns', 'dfghgaaf', 'option1', 'bsaben', 'Area 1: Agricultural and Biosystems Power Engineering', 'selected'),
(380, 'fdgdfg', 'fdgdfg', 'dfgfdg', 'fdgdfg', 'fdgdfg', 'option2', 'bsge', 'CARTOGRAPHY', 'selected'),
(381, 'fgdfg', 'fdgdfgdfg', 'fgfdg', 'fdgdfg', 'fdgdfg', 'option1', 'bsge', 'sample', 'selected'),
(382, 'hgffjhhj', 'hgfjmhvg', 'nmfghjgfhdfgh', 'hfghgfdh', 'fdghgfd', 'option2', 'bsge', 'sample', 'selected'),
(383, 'hjgfhfgh', 'ghfgh', 'fghfghfgh', 'hfghgfh', 'gfhfg', 'option1', 'bsge', 'sample', 'selected'),
(384, 'fdhgd', 'hfdghgfh', 'fghfgh', 'gfhgfhf', 'ghfghfgh', 'option1', 'bsaben', 'Area 3: Environment Engineering', 'selected'),
(385, 'ghfghfg', 'hfghfg', 'hfghfghfgh', 'fghfghfg', 'hgfhgfh', 'option2', 'bsaben', 'Area 3: Environment Engineering', 'selected'),
(386, 'fghfgjfgxhtedhdgh', 'fgjfhgjhg', 'jkhfgjfhgjfgj', 'fghjhgj', 'fhgjgfjfgdj', 'option3', 'bsaben', 'Area 3: Environment Engineering', 'selected');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `quizresultid` int(11) NOT NULL,
  `subject_name` varchar(500) NOT NULL,
  `student_number` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `question` varchar(500) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `answered` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`quizresultid`, `subject_name`, `student_number`, `course`, `date`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `answered`) VALUES
(1, 'Mathematics', '2022002870', 'bsge', '2025-11-10 05:42:22', 'It is one of the five platonic solid and is\r\nbounded by 20 equilateral triangles.', 'Dodecahedron', 'Icosahedron', 'Hexahedron', 'Tetrahedron', 'option2', 'option2'),
(2, 'Mathematics', '2022002870', 'bsge', '2025-11-10 05:43:07', 'A circular piece of cardboard with a diameter\r\nof 1 m will be made into a conical hat 40 cm\r\nhigh by cutting a sector off and joining the\r\nedges to form a cone. Determine the angle\r\nsubtended by a sector removed.', '144o', '148o', '152o', '154o', 'option1', 'option1'),
(3, 'Mathematics', '2022002870', 'bsge', '2025-11-10 05:44:44', 'A regular octahedron has an edge of 2 m. Find\r\nits volume.', '3.77', '1.88', '3.22', '2.44', 'option1', 'option1'),
(4, 'LAWS, RULES AND REGULATIONS', '2022002870', 'bsge', '2025-11-11 18:38:51', 'May a real property be classified validly as\r\npersonal property?', 'Yes, by special provision of our laws', 'Yes, by agreement between the parties', 'A real property is always a real\r\nproperty', 'A and B are correct', 'option2', 'option2'),
(5, 'LAWS, RULES AND REGULATIONS', '2022002870', 'bsge', '2025-11-11 18:38:53', 'According to RA 7942, this is the permit\r\nrequired in order to extract materials\r\nneeded in construction of building or\r\ninfrastructure for public use or other\r\npurposes.', 'Industrial Sand and Gravel Permit', 'Government Gratuitous Permit', 'Mineral Processing Permit', 'Commercial Sand and Gravel Permit', 'option2', 'option3'),
(6, 'Theory and practice of surveying', '2022002870', 'bsge', '2025-11-11 18:39:08', 'The best way to remove grease spots on the\r\nobjective lens of a transit is to use:', 'A clean linen cloth', 'A silk handkerchief', 'Soap and water', 'A clean chamois skin lightly\r\nmoistened in alcohol', 'option4', 'option2');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `reviewerid` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `file_path` varchar(50) DEFAULT NULL,
  `file_size` int(50) DEFAULT NULL,
  `course` varchar(50) NOT NULL,
  `link` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(11) NOT NULL,
  `student_number` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `student_number`, `firstname`, `middlename`, `lastname`, `email`, `password`, `course`, `status`) VALUES
(1, '2022002870', 'hikaru', 'baguio', 'samaniego', 'mjsamaniego515@gmail.com', 'P@ssword!123', 'bsge', 'approved'),
(2, '2022002815', 'jaylyn', 'A', 'Dela vega', 'jaylyndelavega@gmail.com', 'P@ssword!123', 'bsge', 'approved'),
(3, '2019101698', 'alberto', 'C', 'SOCO', 'Albertosoco@gmail.com', 'P@ssword!123', 'bsge', 'approved'),
(4, '2022002734', 'Jeremiah', 'M', 'Perez', 'perezjeremiah110@gmail.com', 'Pass_123', 'bsge', 'approved'),
(5, '20230000091', 'mark', 'joseph', 'samaniego', 'mjsamaniego515@gmail.com', 'P@ssword!123', 'bsaben', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `student_score`
--

CREATE TABLE `student_score` (
  `scoreid` int(11) NOT NULL,
  `subject_name` varchar(500) NOT NULL,
  `student_number` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `score` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_score`
--

INSERT INTO `student_score` (`scoreid`, `subject_name`, `student_number`, `course`, `score`) VALUES
(1, 'Mathematics', '2022002870', 'bsge', '5/5'),
(2, 'Theory and practice of surveying', '2022002870', 'bsge', '19/79'),
(3, 'Mathematics', '2019101698', 'bsge', '5/5'),
(4, 'Theory and practice of surveying', '2019101698', 'bsge', '5/5'),
(5, 'Mathematics', '2022002815', 'bsge', '1/5'),
(6, 'Theory and practice of surveying', '2022002815', 'bsge', '1/5'),
(7, 'Mathematics', '2022002734', 'bsge', '4/5'),
(8, 'Theory and practice of surveying', '2022002734', 'bsge', '5/5'),
(9, 'Area 2: Hydrology', '20230000091', 'bsaben', '0/1'),
(10, 'LAWS, RULES AND REGULATIONS', '2022002870', 'bsge', '6/7'),
(11, 'GEODESY', '2022002870', 'bsge', '4/5'),
(12, 'CARTOGRAPHY', '2022002870', 'bsge', '2/5'),
(13, 'LAWS, RULES AND REGULATIONS', '2022002815', 'bsge', '3/7'),
(14, 'GEODESY', '2022002815', 'bsge', '1/5'),
(15, 'CARTOGRAPHY', '2022002815', 'bsge', '2/5'),
(16, 'LAWS, RULES AND REGULATIONS', '2019101698', 'bsge', '6/7'),
(17, 'GEODESY', '2019101698', 'bsge', '5/5'),
(18, 'CARTOGRAPHY', '2019101698', 'bsge', '5/5');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectid` int(11) NOT NULL,
  `subject_name` varchar(500) NOT NULL,
  `course` varchar(50) NOT NULL,
  `is_archived` varchar(50) DEFAULT NULL,
  `timer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectid`, `subject_name`, `course`, `is_archived`, `timer`) VALUES
(1, 'Mathematics', 'bsge', NULL, 3),
(2, 'Theory and practice of surveying', 'bsge', NULL, 4),
(3, 'LAWS, RULES AND REGULATIONS', 'bsge', NULL, 2),
(4, 'GEODESY', 'bsge', NULL, 4),
(5, 'CARTOGRAPHY', 'bsge', NULL, 4),
(6, 'SAMPLE', 'bsge', 'archived', 3),
(7, 'Area 1: Laws, Professionals Standards & Ethics', 'bsaben', 'archived', 1),
(8, 'Area 2: Hydrology', 'bsaben', 'archived', 3),
(9, 'Area 3: Farm Electrification', 'bsaben', 'archived', 1),
(10, 'Area 1: Agricultural and Biosystems Mechanization, Planning, Operation, Maintenance, Management and Manufacturing', 'bsaben', 'archived', 1),
(11, 'Area 1: Agricultural and Biosystems Machinery Specifications, Testing and Evaluation', 'bsaben', 'archived', 1),
(12, 'Area 1: Laws, Professionals Standards & Ethics', 'bsaben', 'archived', 1),
(13, 'sample', 'bsge', NULL, 1),
(14, 'Area 1: Agricultural and Biosystems Power Engineering', 'bsaben', NULL, 1),
(15, 'Area 1: Agricultural and Biosystems Mechanization, Planning, Operation, Maintenance, Management and Manufacturing', 'bsaben', NULL, 1),
(16, 'Area 1: Agricultural and Biosystems Automation, Instrumentation and Control System', 'bsaben', NULL, 1),
(17, 'Area 1: Agricultural and Biosystems Machinery Specifications, Testing and Evaluation', 'bsaben', NULL, 1),
(18, 'Area 1: Agricultural and Biosystems Automation, Instrumentation and Control System', 'bsaben', NULL, 1),
(19, 'Area 1: Project Management, Feasibility Study Preparation/Evaluation, Research, Development and Extension, and Information System on Agricultural & Biosystems Engineering', 'bsaben', NULL, 1),
(20, 'Area 1: Laws, Professionals Standards & Ethics', 'bsaben', NULL, 1),
(21, 'Area 2: Hydrology', 'bsaben', NULL, 1),
(22, 'Area 2: Irrigation and Drainage Engineering', 'bsaben', NULL, 1),
(23, 'Area 2: Soil and Water Conversation Engineering', 'bsaben', NULL, 1),
(24, 'Area 2: Aquaculture Engineering', 'bsaben', NULL, 1),
(25, 'Area 2: Fundamentals of Agricultural, Fishery, Ecological and Environmental Sciences', 'bsaben', NULL, 1),
(26, 'Area 2: Mathematics and Basic Engineering', 'bsaben', NULL, 1),
(27, 'Area 3: Agricultural Buildings and Structures', 'bsaben', NULL, 1),
(28, 'Area 3: Farm Electrification', 'bsaben', NULL, 1),
(29, 'Area 3: Environment Engineering', 'bsaben', NULL, 1),
(30, 'Area 3: Agricultural and Bioprocess Engineering', 'bsaben', NULL, 1),
(31, 'Area 3: Agricultural and Bioprocess Engineering', 'bsaben', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyid`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizid`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`quizresultid`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`reviewerid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `student_score`
--
ALTER TABLE `student_score`
  ADD PRIMARY KEY (`scoreid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `facultyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `quizresultid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `reviewerid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_score`
--
ALTER TABLE `student_score`
  MODIFY `scoreid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
