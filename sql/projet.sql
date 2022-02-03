-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 12:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `completer`
--

CREATE TABLE `completer` (
  `id_game` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `temps_completer` varchar(50) DEFAULT NULL,
  `note_completer` varchar(10) DEFAULT NULL,
  `achievement_completer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `editeur`
--

CREATE TABLE `editeur` (
  `id_editeur` int(11) NOT NULL,
  `nom_editeur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `editeur`
--

INSERT INTO `editeur` (`id_editeur`, `nom_editeur`) VALUES
(1, 'Nintendo'),
(4, 'Ubisoft'),
(7, 'Riot'),
(14, 'Ankama'),
(15, 'From Software');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `nom_game` varchar(50) NOT NULL,
  `date_game` date NOT NULL,
  `description_game` text NOT NULL,
  `img_game` varchar(100) NOT NULL,
  `id_editeur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id_game`, `nom_game`, `date_game`, `description_game`, `img_game`, `id_editeur`) VALUES
(1, 'Super mario bros', '1991-12-11', 'lorem', '', 1),
(7, 'Dark souls', '2011-03-06', '...', '', 15);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `titre_news` varchar(50) NOT NULL,
  `contenu_news` text NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `titre_news`, `contenu_news`, `id_user`) VALUES
(3, 'Titre news 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt explicabo saepe earum optio rem, laudantium ea architecto. Odit corrupti, veniam, voluptate distinctio, repudiandae quibusdam atque sed in ipsa asperiores labore error. Labore necessitatibus, magnam ab perspiciatis voluptas fugit rem, delectus harum voluptates facilis quasi et repellendus enim nesciunt vel rerum! Magnam fugit optio recusandae voluptates sit consectetur atque blanditiis dignissimos! Architecto, harum quod nemo dolorum expedita, necessitatibus delectus doloribus placeat, odio minus ea blanditiis cum enim itaque aliquid. Voluptatibus aliquam a dolorum esse minima nesciunt ipsam libero ipsa eveniet. Culpa sapiente hic maiores impedit assumenda. Tempora exercitationem commodi numquam repellendus eaque, laboriosam sunt sint, possimus beatae voluptate vel a quod, sed dicta est sit. Totam, fugit distinctio eaque dolorum autem harum aperiam facere nam sunt quasi nobis rem aspernatur! Nobis, ab sint! Repellendus obcaecati tempore distinctio esse porro cum aliquid quaerat nulla nemo, repudiandae repellat. Velit laudantium nobis reprehenderit sequi accusantium assumenda eum laboriosam praesentium deserunt atque incidunt accusamus, voluptatibus distinctio dolor dicta deleniti ad impedit iure dolore odio facilis hic odit, esse aspernatur? Nemo id accusantium optio. Porro, quisquam tempora laboriosam aperiam illo sequi quas est dicta accusantium facere ea hic eius? Vitae placeat incidunt omnis, in deleniti numquam!', 30),
(4, 'Titre news 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt explicabo saepe earum optio rem, laudantium ea architecto. Odit corrupti, veniam, voluptate distinctio, repudiandae quibusdam atque sed in ipsa asperiores labore error. Labore necessitatibus, magnam ab perspiciatis voluptas fugit rem, delectus harum voluptates facilis quasi et repellendus enim nesciunt vel rerum! Magnam fugit optio recusandae voluptates sit consectetur atque blanditiis dignissimos! Architecto, harum quod nemo dolorum expedita, necessitatibus delectus doloribus placeat, odio minus ea blanditiis cum enim itaque aliquid. Voluptatibus aliquam a dolorum esse minima nesciunt ipsam libero ipsa eveniet. Culpa sapiente hic maiores impedit assumenda. Tempora exercitationem commodi numquam repellendus eaque, laboriosam sunt sint, possimus beatae voluptate vel a quod, sed dicta est sit. Totam, fugit distinctio eaque dolorum autem harum aperiam facere nam sunt quasi nobis rem aspernatur! Nobis, ab sint! Repellendus obcaecati tempore distinctio esse porro cum aliquid quaerat nulla nemo, repudiandae repellat. Velit laudantium nobis reprehenderit sequi accusantium assumenda eum laboriosam praesentium deserunt atque incidunt accusamus, voluptatibus distinctio dolor dicta deleniti ad impedit iure dolore odio facilis hic odit, esse aspernatur? Nemo id accusantium optio. Porro, quisquam tempora laboriosam aperiam illo sequi quas est dicta accusantium facere ea hic eius? Vitae placeat incidunt omnis, in deleniti numquam!', 30),
(5, 'Titre news 3', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto corrupti saepe, sunt quidem quo pariatur? Vero, quia. Suscipit non obcaecati laboriosam ipsum eius voluptas voluptatibus quo, nam ex error dolore nostrum facere, sit totam praesentium ea mollitia sunt! Saepe voluptates reprehenderit minima nulla assumenda magnam optio officia laborum iure soluta. Deleniti aliquid officiis debitis exercitationem aliquam quibusdam fugit assumenda. Autem harum veritatis doloremque, cumque repudiandae magnam, eum quia, sunt fuga ea rem aspernatur? Sapiente, quae veritatis suscipit odit neque vitae. Eius laboriosam impedit exercitationem dignissimos dolor assumenda corporis maxime eligendi odit amet animi provident, tempora facilis! Nemo eum totam amet nulla corporis rerum harum vitae fugit unde maxime consequuntur assumenda quae aut nesciunt, eveniet voluptatibus, a, expedita quas vel doloremque officia. Quod sequi veniam voluptas, itaque sit beatae nulla at dicta nobis provident cum accusantium eius! Alias consequuntur asperiores assumenda corrupti sed ut nemo tempore eaque similique. Autem unde praesentium debitis pariatur reprehenderit quod nostrum aliquid voluptates rem fugit, enim officia quae voluptas minima saepe, doloribus eum laboriosam mollitia, illo dolorum placeat libero? Temporibus eos quasi numquam laudantium facilis quas ducimus laboriosam velit! Iste aliquam fuga cupiditate velit praesentium laborum molestiae odio at porro magnam provident eius ullam debitis ratione illum ad quo dolore sequi, dolor quae tempora! Aperiam, ullam necessitatibus? Voluptates modi in ad libero rem amet officiis laborum ipsum qui est! Eos magnam doloremque laboriosam, magni ut commodi non officia quas optio animi quod voluptates maxime facilis enim deserunt voluptas! Aliquid eveniet fugiat maxime quidem tempora impedit numquam rem totam, quod consequuntur maiores ducimus voluptatum, quo, explicabo aut odio dignissimos possimus nostrum quis? Totam voluptatibus voluptates labore dolores ipsa harum laborum! Minima, iure vitae totam reprehenderit quaerat quis consequuntur ratione minus, harum cum voluptatibus eum laborum veniam debitis. Provident nam animi enim nihil mollitia repudiandae? Ullam temporibus ea debitis fuga repellat distinctio, repellendus eius? Tenetur porro nesciunt ea mollitia beatae possimus nisi quos quae, blanditiis libero magni facere quasi ipsam odio earum quaerat consequatur neque suscipit, doloremque accusantium quia animi modi! Ut adipisci neque, nulla ea dignissimos iusto qui voluptates accusamus corporis dolor voluptatem? Itaque provident ipsum enim esse suscipit cupiditate, debitis numquam, excepturi sunt earum temporibus illo veritatis, rerum asperiores. Possimus asperiores, beatae rerum modi esse, quod, delectus sequi totam voluptatem praesentium in tenetur. Voluptate consequuntur quo voluptates fugiat praesentium, adipisci recusandae, fugit inventore odio cumque eveniet! Necessitatibus nemo ipsum minima deserunt corrupti. Dolor nobis officiis natus ipsam sunt odit blanditiis quia voluptatibus, qui optio dolore reiciendis possimus exercitationem impedit. Repellat modi fuga rem temporibus ratione corrupti itaque beatae esse voluptates reprehenderit nesciunt saepe et quas harum odit, soluta, dolores officiis, optio impedit sint obcaecati. Expedita repellendus repudiandae earum hic labore ipsa, mollitia harum voluptatem iste, fuga ex incidunt aliquid totam debitis at. Mollitia obcaecati alias minima sit animi dolores consequatur praesentium, nesciunt temporibus nam eligendi assumenda fugiat quasi dignissimos laudantium neque labore excepturi dolorem qui sequi aperiam? Quo eum atque natus quidem incidunt doloremque est ratione facere, doloribus molestias labore nemo accusantium consectetur provident. Maiores, quidem!', 30);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `type_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `type_role`) VALUES
(1, 'Utilisateur'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo_user` varchar(50) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `mdp_user` varchar(100) NOT NULL,
  `img_user` varchar(100) NOT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `pseudo_user`, `email_user`, `mdp_user`, `img_user`, `id_role`) VALUES
(30, 'Dimensio', 'walther.maxime@gmail.com', '$2y$10$wRbI0eEIaDZicfytYKRp0u4sN9StOKliX8KL45fAN49ctGk2kuMQ2', 'img_dimensio.jpg', 2),
(31, 'test', 'test@test', '$2y$10$kOvKcPTDatJ5n4n0LNUtOej5HnCVkul7ef6B5H.Wdb5dNp.0E8zGO', 'default_user.png', 1),
(32, 'solo', 'solo@t', '$2y$10$toTBQ43.3mf2bJiNhqxm3uXqv64U3hemUyZYzK/eHghFgsFdlXk4W', 'default_user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `completer`
--
ALTER TABLE `completer`
  ADD PRIMARY KEY (`id_game`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`id_editeur`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`),
  ADD KEY `id_editeur` (`id_editeur`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `id_editeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `completer`
--
ALTER TABLE `completer`
  ADD CONSTRAINT `completer_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `game` (`id_game`),
  ADD CONSTRAINT `completer_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`id_editeur`) REFERENCES `editeur` (`id_editeur`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
