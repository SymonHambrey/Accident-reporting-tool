-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2018 at 12:48 AM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `report`
--

-- --------------------------------------------------------

--
-- Table structure for table `accReport`
--

CREATE TABLE `accReport` (
  `report_ID` int(11) NOT NULL,
  `type` text NOT NULL,
  `inc_date` date DEFAULT NULL,
  `inc_name` text,
  `inc_hsnm` text,
  `inc_strt` text,
  `inc_town` text,
  `inc_pscd` text,
  `inc_hsno` varchar(11) DEFAULT NULL,
  `inc_mono` varchar(11) DEFAULT NULL,
  `rep_name` text,
  `rep_hsmn` text,
  `rep_strt` text,
  `rep_town` text,
  `rep_pscd` text,
  `rep_hsno` varchar(11) DEFAULT NULL,
  `rep_mono` varchar(11) DEFAULT NULL,
  `location` text,
  `injury` text,
  `cause` text,
  `description` text,
  `riddor` text NOT NULL,
  `follow_up` text,
  `archive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accReport`
--

INSERT INTO `accReport` (`report_ID`, `type`, `inc_date`, `inc_name`, `inc_hsnm`, `inc_strt`, `inc_town`, `inc_pscd`, `inc_hsno`, `inc_mono`, `rep_name`, `rep_hsmn`, `rep_strt`, `rep_town`, `rep_pscd`, `rep_hsno`, `rep_mono`, `location`, `injury`, `cause`, `description`, `riddor`, `follow_up`, `archive`) VALUES
(13, 'Accident', '2018-08-01', 'Alice Cooper', '17', 'Bellars Street', 'Powick', 'WR13 1DD', '01905568987', '', 'Symon Hambrey', '64', 'Zoo Lane', 'Zootown', 'ZX1 6GH', '07841574567', '', 'On-site car park', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel metus quis ipsum pulvinar porta. Cras et metus vitae dolor pretium faucibus. Duis turpis turpis, vulputate sed massa quis, gravida lobortis lorem. Sed faucibus, ligula vel aliquam malesuada, lorem tortor venenatis metus, vel tincidunt justo sapien sit amet justo. Fusce tristique erat purus, ac tristique quam iaculis in. Nam auctor ac lacus sit amet ornare. Integer a elit nulla. Sed aliquam ultricies tellus ut scelerisque. Curabitur ultricies elementum gravida. Phasellus finibus massa diam, nec laoreet enim semper id. Etiam et sagittis magna. In tristique neque sit amet tristique condimentum. Ut id condimentum metus. Ut ullamcorper, ante sit amet tincidunt sollicitudin, dui arcu volutpat felis, ut ornare nunc nisl nec nisl.', 'Makin\' your way in the world today takes everything you\'ve got. Takin\' a break from all your worries sure would help a lot. Now were up in the big leagues getting\' our turn at bat. Love exciting and new. Come aboard were expecting you. Love life\'s sweetest reward Let it flow it floats back to you. That this group would somehow form a family that\'s the way we all became the Brady Bunch., Goodbye gray sky hello blue. There\'s nothing can hold me when I hold you. Feels so right it cant be wrong. Rockin\' and rollin\' all week long? Texas tea. No phone no lights no motor car not a single luxury. Like Robinson Crusoe it\'s primitive as can be. Love exciting and new. Come aboard were expecting you. Love life\'s sweetest reward Let it flow it floats back to you. So this is the tale of our castaways they\'re here for a long long time. They\'ll have to make the best of things its an uphill climb. The first mate and his Skipper too will do their very best to make the others comfortable in their tropic island nest.\r\n\r\n', 'They were four men living all together yet they were all alone. They were four men living all together yet they were all alone. Now were up in the big leagues getting\' our turn at bat. Come and play. Everything\'s A-OK. Friendly neighbors there that\'s where we meet. Can you tell me how to get how to get to Sesame Street.\r\n\r\n', 'Yes', 'Report by admin, 16/09/2018 0:17:22 : In neque nulla, rutrum eget ullamcorper at, tempor non ligula. Cras ut ante urna. Praesent eget nunc eleifend, iaculis felis non, condimentum massa. Phasellus sit amet maximus ipsum, ut consequat velit. Mauris dapibus eros aliquet metus ultricies egestas. Sed pretium malesuada mauris, in tincidunt elit aliquam lobortis. Aliquam interdum enim eu lectus consequat lacinia. Pellentesque laoreet, orci congue molestie efficitur, diam nulla pretium tortor, auctor porttitor arcu mi vitae sem. Maecenas mattis lacus sit amet mauris ultrices tempus. Suspendisse elit ante, suscipit sit amet lobortis sed, aliquet nec purus. Quisque id tincidunt nulla. Donec accumsan, dolor sed posuere dictum, nunc nisi commodo lacus, aliquam imperdiet eros metus et felis.\r\n\r\n</br>', 1),
(14, 'Accident', '2018-08-25', 'leigh blah', '44', 'tiddle street', 'tiddle town', 'ts11 123', '01905568956', '', 'Haroon Mahmood', '45', 'cheese avenue', 'Redditch', 'AB12 3CD', '07841574777', '07841574777', 'In warehouse, next to fire exit', 'Goodbye gray sky hello blue. There\'s nothing can hold me when I hold you. Feels so right it cant be wrong. Rockin\' and rollin\' all week long. The Love Boat soon will be making another run. The Love Boat promises something for everyone. Believe it or not I\'m walking on air. I never thought I could feel so free. Goodbye gray sky hello blue. There\'s nothing can hold me when I hold you. Feels so right it cant be wrong. Rockin\' and rollin\' all week long. On the most sensational inspirational celebrational Muppetational… This is what we call the Muppet Show. Now the world don\'t move to the beat of just one drum. What might be right for you may not be right for some. Makin\' your way in the world today takes everything you\'ve got. Takin\' a break from all your worries sure would help a lot. Here\'s the story of a lovely lady who was bringing up three very lovely girls.\r\n\r\n', 'Quisque tempor suscipit dolor nec volutpat. Quisque pulvinar, mi eu mattis euismod, tellus felis finibus eros, eget placerat massa nisi sed massa. Duis non tortor scelerisque, suscipit nulla a, mattis ante. In condimentum nibh vel egestas interdum. Etiam ac congue lacus. Quisque mollis augue in nulla dictum, in auctor leo mollis. Suspendisse lacinia nisi ut lectus vulputate interdum. Sed et venenatis dui. Phasellus et ultricies erat. Donec enim velit, ornare pharetra velit vitae, congue tincidunt mauris.\r\n\r\n', 'Now the world don\'t move to the beat of just one drum. What might be right for you may not be right for some. I have always wanted to have a neighbor just like you. I\'ve always wanted to live in a neighborhood with you? One two three four five six seven eight Sclemeel schlemazel hasenfeffer incorporated. Love exciting and new. Come aboard were expecting you. Love life\'s sweetest reward Let it flow it floats back to you.\"\r\n\r\n', 'No', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `concern`
--

CREATE TABLE `concern` (
  `report_ID` int(11) NOT NULL,
  `type` text NOT NULL,
  `inc_date` date NOT NULL,
  `rep_name` text NOT NULL,
  `rep_hsmn` text NOT NULL,
  `rep_strt` text NOT NULL,
  `rep_town` text NOT NULL,
  `rep_pscd` text NOT NULL,
  `rep_hsno` text NOT NULL,
  `rep_mono` text NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `follow_up` text,
  `archive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concern`
--

INSERT INTO `concern` (`report_ID`, `type`, `inc_date`, `rep_name`, `rep_hsmn`, `rep_strt`, `rep_town`, `rep_pscd`, `rep_hsno`, `rep_mono`, `location`, `description`, `follow_up`, `archive`) VALUES
(7, 'Concern', '2018-09-10', 'Admin', '17', 'Happy Bottom', 'Schifferton', 'SC157TN', '01225985632', '07448854721', 'On street parking bay', 'The ship set ground on the shore of this uncharted desert isle with Gilligan the Skipper too the millionaire and his wife. Makin\' your way in the world today takes everything you\'ve got. Takin\' a break from all your worries sure would help a lot. Go Speed Racer. Go Speed Racer. Go Speed Racer go! Fish don\'t fry in the kitchen and beans don\'t burn on the grill. Took a whole lotta tryin\' just to get up that hill. It\'s time to play the music. It\'s time to light the lights. It\'s time to meet the Muppets on the Muppet Show tonight! Why do we always come here? I guess well never know. Its like a kind of torture to have to watch the show? The weather started getting rough - the tiny ship was tossed. If not for the courage of the fearless crew the Minnow would be lost. the Minnow would be lost.\r\n\r\n', NULL, NULL),
(8, 'Concern', '2018-09-04', 'Captain Morgan', '17', 'Cherry Tree Lane', 'London', 'SW16EY', '01478965412', '07474747474', 'In Public Female Toilet', 'Just two good ol\' boys Wouldn\'t change if they could. Fightin\' the system like a true modern day Robin Hood. In 1972 a crack commando unit was sent to prison by a military court for a crime they didn\'t commit. These men promptly escaped from a maximum security stockade to the Los Angeles underground. And we\'ll do it our way yes our way. Make all our dreams come true for me and you., All of them had hair of gold like their mother the youngest one in curls? Its mission - to explore strange new worlds to seek out new life and new civilizations to boldly go where no man has gone before. The weather started getting rough - the tiny ship was tossed. If not for the courage of the fearless crew the Minnow would be lost. the Minnow would be lost.\r\n\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mail_ID` int(11) NOT NULL,
  `email` text NOT NULL,
  `query` text NOT NULL,
  `archive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mail_ID`, `email`, `query`, `archive`) VALUES
(12, 'battlestar.galactica@caprica.com', 'Fleeing from the Cylon tyranny the last Battlestar – Galactica - leads a rag-tag fugitive fleet on a lonely quest - a shining planet known as Earth. Makin\' your way in the world today takes everything you\'ve got. Takin\' a break from all your worries sure would help a lot. Come and play. Everything\'s A-OK. Friendly neighbors there that\'s where we meet. Can you tell me how to get how to get to Sesame Street. Space. The final frontier. These are the voyages of the Starship Enterprise.\"', 1),
(13, 'the.fonz@happydays.com', 'Go Speed Racer. Go Speed Racer. Go Speed Racer go. Here\'s the story of a man named Brady who was busy with three boys of his own.; Baby if you\'ve ever wondered - wondered whatever became of me. I\'m living on the air in Cincinnati. Cincinnati WKRP. These Happy Days are yours and mine Happy Days. we might as well say... Would you be mine? Could you be mine? Won\'t you be my neighbor. Michael Knight a young loner on a crusade to champion the cause of the innocent. The helpless. The powerless in a world of criminals who operate above the law. We\'re gonna do it. On your mark get set and go now. Got a dream and we just know now we\'re gonna make our dream come true! That this group would somehow form a family that\'s the way we all became the Brady Bunch. Come and dance on our floor. Take a step that is new. We\'ve a loveable space that needs your face threes company too.', NULL),
(14, 'somevegarehorid@ihateturnips.co.uk', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel metus quis ipsum pulvinar porta. Cras et metus vitae dolor pretium faucibus. Duis turpis turpis, vulputate sed massa quis, gravida lobortis lorem. Sed faucibus, ligula vel aliquam malesuada, lorem tortor venenatis metus, vel tincidunt justo sapien sit amet justo. Fusce tristique erat purus, ac tristique quam iaculis in. Nam auctor ac lacus sit amet ornare. Integer a elit nulla. Sed aliquam ultricies tellus ut scelerisque. Curabitur ultricies elementum gravida. Phasellus finibus massa diam, nec laoreet enim semper id. Etiam et sagittis magna. In tristique neque sit amet tristique condimentum. Ut id condimentum metus. Ut ullamcorper, ante sit amet tincidunt sollicitudin, dui arcu volutpat felis, ut ornare nunc nisl nec nisl.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nearMiss`
--

CREATE TABLE `nearMiss` (
  `report_ID` int(11) NOT NULL,
  `type` text NOT NULL,
  `inc_date` date NOT NULL,
  `rep_name` text NOT NULL,
  `rep_hsmn` text NOT NULL,
  `rep_strt` text NOT NULL,
  `rep_town` text NOT NULL,
  `rep_pscd` text NOT NULL,
  `rep_hsno` varchar(11) NOT NULL,
  `rep_mono` varchar(11) NOT NULL,
  `location` text NOT NULL,
  `cause` text NOT NULL,
  `description` text NOT NULL,
  `follow_up` text,
  `archive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nearMiss`
--

INSERT INTO `nearMiss` (`report_ID`, `type`, `inc_date`, `rep_name`, `rep_hsmn`, `rep_strt`, `rep_town`, `rep_pscd`, `rep_hsno`, `rep_mono`, `location`, `cause`, `description`, `follow_up`, `archive`) VALUES
(10, 'Near Miss', '2018-09-01', 'Jonothan Archer', 'Flat 2', 'Engerston Street', 'Alveston Shepard', 'AV1 2ER', '01558695428', '07444568987', 'In kitchen', 'The weather started getting rough - the tiny ship was tossed. If not for the courage of the fearless crew the Minnow would be lost. the Minnow would be lost. And when the odds are against him and their dangers work to do. You bet your life Speed Racer he will see it through. Boy the way Glen Miller played. Songs that made the hit parade. Guys like us we had it made. Those were the days. These days are all Happy and Free. These days are all share them with me oh baby. And when the odds are against him and their dangers work to do. You bet your life Speed Racer he will see it through. It\'s a beautiful day in this neighborhood a beautiful day for a neighbor. Would you be mine? Could you be mine? Its a neighborly day in this beautywood a neighborly day for a beauty. Would you be mine? Could you be mine?\r\n\r\n', 'Sed lobortis tellus pulvinar massa finibus luctus. Nullam ultrices eleifend diam, a venenatis metus iaculis eu. Etiam euismod accumsan lacus, id condimentum tortor pellentesque id. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean vitae nulla a odio cursus tincidunt. Integer aliquet at eros at venenatis. In hac habitasse platea dictumst. Nam at nisi ut turpis tincidunt cursus feugiat a lacus. Vestibulum augue mauris, sodales vitae ante vitae, dapibus luctus nisi. Duis porttitor erat eu lacus cursus ultricies. Ut consequat placerat quam, quis gravida est fringilla at. Aliquam nulla augue, dictum et augue et, condimentum varius dui. In et risus convallis, viverra ex sed, suscipit ante. Nam sit amet eros eu lacus fermentum sodales. Ut dictum at dui rutrum porttitor.\r\n\r\n', NULL, NULL),
(11, 'Near Miss', '2018-09-02', 'Patrick Stewart', 'Hill View', 'Fleet Street', 'Pemberton', 'PB17TN', '01234567890', '07777987654', 'On stairs in back room', 'One two three four five six seven eight Sclemeel schlemazel hasenfeffer incorporated. Michael Knight a young loner on a crusade to champion the cause of the innocent. The helpless. The powerless in a world of criminals who operate above the law. Movin\' on up to the east side. We finally got a piece of the pie? As long as we live its you and me baby. There ain\'t nothin\' wrong with that. Come and dance on our floor. Take a step that is new. We\'ve a loveable space that needs your face threes company too! Sunny Days sweepin\' the clouds away. On my way to where the air is sweet. Can you tell me how to get how to get to Sesame Street. A man is born he\'s a man of means. Then along come two they got nothin\' but their jeans. The ship set ground on the shore of this uncharted desert isle with Gilligan the Skipper too the millionaire and his wife. Their house is a museum where people come to see ‘em. They really are a scream the Addams Family. Well the first thing you know ol\' Jeds a millionaire. Kinfolk said Jed move away from there. Doin\' it our way. There\'s nothing we wont try. Never heard the word impossible. This time there\'s no stopping us.\r\n\r\n', 'One two three four five six seven eight Sclemeel schlemazel hasenfeffer incorporated. Michael Knight a young loner on a crusade to champion the cause of the innocent. The helpless. The powerless in a world of criminals who operate above the law. Movin\' on up to the east side. We finally got a piece of the pie? As long as we live its you and me baby. There ain\'t nothin\' wrong with that. Come and dance on our floor. Take a step that is new. We\'ve a loveable space that needs your face threes company too! Sunny Days sweepin\' the clouds away. On my way to where the air is sweet. Can you tell me how to get how to get to Sesame Street. A man is born he\'s a man of means. Then along come two they got nothin\' but their jeans. The ship set ground on the shore of this uncharted desert isle with Gilligan the Skipper too the millionaire and his wife. Their house is a museum where people come to see ‘em. They really are a scream the Addams Family. Well the first thing you know ol\' Jeds a millionaire. Kinfolk said Jed move away from there. Doin\' it our way. There\'s nothing we wont try. Never heard the word impossible. This time there\'s no stopping us.\r\n\r\n', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accReport`
--
ALTER TABLE `accReport`
  ADD PRIMARY KEY (`report_ID`);

--
-- Indexes for table `concern`
--
ALTER TABLE `concern`
  ADD PRIMARY KEY (`report_ID`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_ID`);

--
-- Indexes for table `nearMiss`
--
ALTER TABLE `nearMiss`
  ADD PRIMARY KEY (`report_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accReport`
--
ALTER TABLE `accReport`
  MODIFY `report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `concern`
--
ALTER TABLE `concern`
  MODIFY `report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `nearMiss`
--
ALTER TABLE `nearMiss`
  MODIFY `report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
