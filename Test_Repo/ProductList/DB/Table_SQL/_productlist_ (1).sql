-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2018 at 12:14 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ProductList`
--

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `id` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'book.jpg',
  `name` varchar(100) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `weight` float NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`id`, `sku`, `img`, `name`, `author`, `description`, `weight`, `price`) VALUES
(39, 'Zusak001', 'book.jpg', 'The Book Thief', 'by Markus Zusak', 'After the death of Liesel\'s young brother, Liesel arrives at the home of her new foster parents, Hans and Rosa Hubermann, distraught and withdrawn. During her time there, she is exposed to the horrors of the Nazi regime, caught between the innocence of childhood and the maturity demanded by her destructive surroundings. As the political situation in Germany deteriorates, her foster parents harbor a Jewish boxer named Max. Hans, who has developed a close relationship with Liesel, teaches her to read in secret. ', 1.2, 5.4),
(40, 'Bradbury001', 'book.jpg', 'Fahrenheit 451', 'Ray Bradbury', '&quot;Fahrenheit 451 â€“ the temperature at which book paper catches fire, and burns...&quot; The lead character is a fireman named Montag who becomes disillusioned with the role of censoring works and destroying knowledge, eventually quitting his job and joining a resistance group who memorize and share the world\'s greatest literary and cultural works.', 5.9, 15.9),
(41, 'Murakami_001', 'book.jpg', 'Norwegian Wood', 'by Haruki Murakami', 'Everyone should read at least one Murakami (several, really), and this is up there with the best. Hearing The Beatles song that this novel takes its title from, protagonist Toru dwells upon his student days in the sixties protesting against the status quo. His relationship with the beautiful but damaged Naoko is a lesson that emotional dependence is not love.', 3.01, 7.4),
(42, 'Coupland001', 'book.jpg', 'Generation X', 'Douglas Coupland', 'Three friends reach trapped in dead-end \"McJobs\" reach adulthood in early eighties California. The ultimate post-graduation book about intellectualising not knowing what the hell to do with yourself.', 2.7, 9.35),
(45, 'Orwell001', 'book.jpg', '1984', 'George Orwell', 'Along with Animal Farm, 1984 is George Orwells gift to anyone experiencing their moment of political awakening, a book that drags you from the self-involvement of adolescence to the harrowing realisation that politics and the wider world can and will impact your life. Every important reason to be watchful, sceptical and demanding of your government is in there.', 4.12, 5.9);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `path`) VALUES
(1, 'Books', '<a href=\"books.php\">'),
(2, 'DVD-discs', '<a href=\"dvd.php\">'),
(3, 'Furniture', '<a href=\"furniture.php\">');

-- --------------------------------------------------------

--
-- Table structure for table `ContactUs`
--

CREATE TABLE `ContactUs` (
  `id` int(11) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dvd`
--

CREATE TABLE `dvd` (
  `id` int(11) NOT NULL,
  `sku` varchar(60) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'dvd.jpg',
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `capacity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dvd`
--

INSERT INTO `dvd` (`id`, `sku`, `img`, `name`, `description`, `price`, `capacity`) VALUES
(2, 'dvd002', 'dvd.jpg', 'Inception (2010)', 'A thief, who steals corporate secrets through use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO.', 3.44, '1471'),
(13, 'Drama001', 'dvd.jpg', 'The Shawshank Redemption', 'The Shawshank Redemption is a 1994 American drama film written and directed by Frank Darabont, based on the 1982 Stephen King novella Rita Hayworth and Shawshank Redemption. It tells the story of banker Andy Dufresne (Tim Robbins), who is sentenced to life in Shawshank State Penitentiary for the murder of his wife and her lover, despite his claims of innocence.', 15.9, '3700'),
(14, 'Star Wars001', 'dvd.jpg', 'The Empire Strikes Back', 'Three years after the destruction of the Death Star, the Rebel Alliance has been driven from their former base on Yavin IV by the Galactic Empire. The rebels, led by Princess Leia, have set up a new base on the ice planet Hoth. The Imperial fleet, led by Darth Vader, continues to hunt for the Rebels\' new base by dispatching probe droids across the galaxy. Luke Skywalker is captured by a wampa while investigating one such probe, but he manages to escape from the wampa\'s cave with his lightsaber. Before Luke succumbs to the freezing temperatures, the spirit of his late mentor, Obi-Wan Kenobi, instructs him to go to the Dagobah system to train under Jedi Master Yoda. Luke is found by Han Solo, and the duo are eventually rescued by a search party.', 12.12, '4340'),
(15, 'FightClub01', 'dvd.jpg', 'Fight Club cc', 'Fight Club is a 1999 film based on the 1996 novel of the same name by Chuck Palahniuk. The film was directed by David Fincher, and stars Brad Pitt, Edward Norton and Helena Bonham Carter. Norton plays the unnamed protagonist, an &quot;everyman&quot; who is discontented with his white-collar job. He forms a &quot;fight club&quot; with soap maker Tyler Durden, played by Pitt, and they are joined by men who also want to fight recreationally.', 6.4, '4321'),
(16, 'PulpFiction01', 'dvd.jpg', 'Pulp Fiction', 'Pulp Fiction is a 1994 American black comedy crime film written and directed by Quentin Tarantino, from a story by Tarantino and Roger Avary. The film is known for its eclectic dialogue, ironic mix of humor and violence, nonlinear storyline, and a host of cinematic allusions and pop culture references. The film was nominated for seven Oscars, including Best Picture; Tarantino and Avary won for Best Original Screenplay. ', 6.27, '4319');

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `id` int(11) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'furniture.jpg',
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(20) NOT NULL,
  `height` float NOT NULL,
  `width` float NOT NULL,
  `length` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`id`, `sku`, `img`, `name`, `description`, `price`, `height`, `width`, `length`) VALUES
(1, 'furni001', 'furniture.jpg', 'HEMNES', 'Glass-door cabinet, black-brown. Sliding doors do not take up any space when opened. Solid wood has a natural feel.', '299.00', 137, 37, 120),
(2, 'furni002', 'furniture.jpg', 'VIMLE', 'Fabric sofa. Sectional, 6 seat, with open end, Orrsta golden-yellow. ', '768.00', 80, 327, 249),
(4, 'BedFrame002', 'furniture.jpg', 'HEMNES', 'Made of solid wood, which is a hardwearing and warm natural material. Adjustable bed sides allow you to use mattresses of different thicknesses. 16 slats of layer-glued birch adjust to your body weight and increase the suppleness of the mattress.', '199', 66, 149, 201),
(7, 'Wardrobe001', 'furniture.jpg', 'PAX/Wardrobe', '10 year guarantee. Read about the terms in the guarantee brochure. You can easily adapt this ready-made PAX/KOMPLEMENT combination to suit your needs and taste using the PAX planning tool. Sliding doors allow more room for furniture because they donâ€™t take any space to open. The soft-closing device catches the running doors so that they close slowly, silently and softly.', '827', 201.2, 200, 66);

-- --------------------------------------------------------

--
-- Table structure for table `Subscribe`
--

CREATE TABLE `Subscribe` (
  `id` int(11) NOT NULL,
  `submail` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ContactUs`
--
ALTER TABLE `ContactUs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Subscribe`
--
ALTER TABLE `Subscribe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ContactUs`
--
ALTER TABLE `ContactUs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dvd`
--
ALTER TABLE `dvd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Subscribe`
--
ALTER TABLE `Subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
