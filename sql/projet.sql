-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 04 fév. 2022 à 22:53
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `completer`
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
-- Structure de la table `editeur`
--

CREATE TABLE `editeur` (
  `id_editeur` int(11) NOT NULL,
  `nom_editeur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id_editeur`, `nom_editeur`) VALUES
(1, 'Nintendo'),
(4, 'Ubisoft'),
(7, 'Riot'),
(15, 'From Software'),
(16, 'Valve'),
(17, 'Re-Logic'),
(18, 'IO Interactive'),
(19, 'Extremely OK Games'),
(20, 'Bethesda');

-- --------------------------------------------------------

--
-- Structure de la table `game`
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
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id_game`, `nom_game`, `date_game`, `description_game`, `img_game`, `id_editeur`) VALUES
(7, 'DARK SOULS', '2011-03-06', 'Vint alors l\'avènement du Feu... Redécouvrez le jeu de référence salué par la critique. Dans cette splendide version remastérisée, retrouvez Lordran et ses décors époustouflants en haute définition et en 60 fps.', 'images/img_jeux/dark_souls.jpg', 15),
(8, 'Counter-Strike: Global Offensive', '2012-08-21', 'Counter-Strike: Global Offensive (CS:GO) étend le genre du jeu d\'action en équipe dont Counter-Strike fut le pionnier lors de sa sortie, en 1999. CS:GO offre de nouvelles cartes et armes ainsi que de nouveaux personnages et modes de jeu, et renouvelle les cartes classiques telles que de_dust2.', 'images/img_jeux/counter_strike.jpg', 16),
(9, 'Dota 2', '2013-07-09', 'Chaque jour dans le monde, des millions de personnes incarnent un personnage parmi plus de cent et s\'affrontent dans Dota 2. Il y a toujours quelque chose à découvrir, car le gameplay, les fonctionnalités et les personnages évoluent sans cesse au fil des mises à jour.', 'images/img_jeux/dota2.jpg', 16),
(10, 'DARK SOULS II', '2014-04-25', 'Développé par FROM SOFTWARE, DARK SOULS™ II est la suite tant attendue du redoutable Dark Souls™, qui a connu un succès fracassant en 2011. Les terribles défis et les émotions intenses de cet action-rpg au caractère unique et old school ont enflammé l\'imagination de nombreux joueurs à travers le monde.\r\n\r\nDans DARK SOULS™ II, la difficulté et les innovations désormais marque de fabrique de la franchise sont de retour, à la fois en solo et en multijoueur.\r\nPrenez part à ce sombre périple, affrontez de redoutables ennemis, bravez tous les dangers, et relevez les innombrables défis dont FROM SOFTWARE a le secret.', 'images/img_jeux/dark_souls2.jpg', 15),
(11, 'DARK SOULS III', '2016-04-11', 'Dark Souls repousse une fois de plus ses limites avec un nouveau chapitre ambitieux de la série légendaire et encensée par la critique. Préparez-vous à embrasser les ténèbres !', 'images/img_jeux/dark_souls3.jpg', 15),
(12, 'Terraria', '2011-05-16', 'Creuser, survivre, explorer, construire ! Tout est possible dans ce jeu d\'aventure bourré d\'action. Le monde est votre toile et le sol votre peinture.\r\nPrenez vos outils, et c\'est parti ! Fabriquez des armes pour lutter contre toutes sortes d\'ennemis. Creusez en profondeur pour trouver des accessoires, de l\'argent et plein d\'autres objets qui pourront vous être utiles. Partez à la recherche de matériaux pour fabriquer tout ce qu\'il vous faut pour créer votre propre monde. Construisez une maison, un fort ou pourquoi pas un château. Des gens s\'installeront et vendront peut-être même leurs services pour vous aider dans votre voyage.', 'images/img_jeux/terraria.jpg', 17),
(13, 'HITMAN 2', '2018-11-13', 'Parcourez le monde et traquez vos cibles dans les lieux exotiques du jeu HITMAN™ 2. Des rues baignées de soleil aux sombres et dangereuses forêts tropicales, dans cette histoire d\'espionnage exceptionnelle, aucun endroit n\'échappe à l\'assassin le plus créatif du monde : l\'Agent 47.', 'images/img_jeux/hitman2.jpg', 18),
(14, 'Celeste', '2018-01-25', 'Aidez Madeline à survivre à ses démons intérieurs au mont Celeste, dans ce jeu de plateformes ultra relevé, réalisé par les créateurs du classique TowerFall. Relevez des centaines de défis faits à la main, découvrez tous les secrets et dévoilez le mystère de la montagne.', 'images/img_jeux/celeste.jpg', 19),
(16, 'The Elder Scrolls V: Skyrim', '2011-11-11', 'Le nouveau chapitre très attendu de la saga Elder Scrolls nous arrive des créateurs du jeu de l\'année 2006 et 2008, Bethesda Game Studios. Skyrim réinvente et révolutionne le monde ouvert, ramenant à la vie un monde complet que vous pourrez librement explorer.', 'images/img_jeux/df69ee8d4242da32ed61b4fe14e5fe0a.jpg', 20);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `titre_news` varchar(50) NOT NULL,
  `contenu_news` text NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id_news`, `titre_news`, `contenu_news`, `id_user`) VALUES
(3, 'Titre news 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt explicabo saepe earum optio rem, laudantium ea architecto. Odit corrupti, veniam, voluptate distinctio, repudiandae quibusdam atque sed in ipsa asperiores labore error. Labore necessitatibus, magnam ab perspiciatis voluptas fugit rem, delectus harum voluptates facilis quasi et repellendus enim nesciunt vel rerum! Magnam fugit optio recusandae voluptates sit consectetur atque blanditiis dignissimos! Architecto, harum quod nemo dolorum expedita, necessitatibus delectus doloribus placeat, odio minus ea blanditiis cum enim itaque aliquid. Voluptatibus aliquam a dolorum esse minima nesciunt ipsam libero ipsa eveniet. Culpa sapiente hic maiores impedit assumenda. Tempora exercitationem commodi numquam repellendus eaque, laboriosam sunt sint, possimus beatae voluptate vel a quod, sed dicta est sit. Totam, fugit distinctio eaque dolorum autem harum aperiam facere nam sunt quasi nobis rem aspernatur! Nobis, ab sint! Repellendus obcaecati tempore distinctio esse porro cum aliquid quaerat nulla nemo, repudiandae repellat. Velit laudantium nobis reprehenderit sequi accusantium assumenda eum laboriosam praesentium deserunt atque incidunt accusamus, voluptatibus distinctio dolor dicta deleniti ad impedit iure dolore odio facilis hic odit, esse aspernatur? Nemo id accusantium optio. Porro, quisquam tempora laboriosam aperiam illo sequi quas est dicta accusantium facere ea hic eius? Vitae placeat incidunt omnis, in deleniti numquam!', 30),
(4, 'Titre news 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt explicabo saepe earum optio rem, laudantium ea architecto. Odit corrupti, veniam, voluptate distinctio, repudiandae quibusdam atque sed in ipsa asperiores labore error. Labore necessitatibus, magnam ab perspiciatis voluptas fugit rem, delectus harum voluptates facilis quasi et repellendus enim nesciunt vel rerum! Magnam fugit optio recusandae voluptates sit consectetur atque blanditiis dignissimos! Architecto, harum quod nemo dolorum expedita, necessitatibus delectus doloribus placeat, odio minus ea blanditiis cum enim itaque aliquid. Voluptatibus aliquam a dolorum esse minima nesciunt ipsam libero ipsa eveniet. Culpa sapiente hic maiores impedit assumenda. Tempora exercitationem commodi numquam repellendus eaque, laboriosam sunt sint, possimus beatae voluptate vel a quod, sed dicta est sit. Totam, fugit distinctio eaque dolorum autem harum aperiam facere nam sunt quasi nobis rem aspernatur! Nobis, ab sint! Repellendus obcaecati tempore distinctio esse porro cum aliquid quaerat nulla nemo, repudiandae repellat. Velit laudantium nobis reprehenderit sequi accusantium assumenda eum laboriosam praesentium deserunt atque incidunt accusamus, voluptatibus distinctio dolor dicta deleniti ad impedit iure dolore odio facilis hic odit, esse aspernatur? Nemo id accusantium optio. Porro, quisquam tempora laboriosam aperiam illo sequi quas est dicta accusantium facere ea hic eius? Vitae placeat incidunt omnis, in deleniti numquam!', 30),
(5, 'Titre news 3', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto corrupti saepe, sunt quidem quo pariatur? Vero, quia. Suscipit non obcaecati laboriosam ipsum eius voluptas voluptatibus quo, nam ex error dolore nostrum facere, sit totam praesentium ea mollitia sunt! Saepe voluptates reprehenderit minima nulla assumenda magnam optio officia laborum iure soluta. Deleniti aliquid officiis debitis exercitationem aliquam quibusdam fugit assumenda. Autem harum veritatis doloremque, cumque repudiandae magnam, eum quia, sunt fuga ea rem aspernatur? Sapiente, quae veritatis suscipit odit neque vitae. Eius laboriosam impedit exercitationem dignissimos dolor assumenda corporis maxime eligendi odit amet animi provident, tempora facilis! Nemo eum totam amet nulla corporis rerum harum vitae fugit unde maxime consequuntur assumenda quae aut nesciunt, eveniet voluptatibus, a, expedita quas vel doloremque officia. Quod sequi veniam voluptas, itaque sit beatae nulla at dicta nobis provident cum accusantium eius! Alias consequuntur asperiores assumenda corrupti sed ut nemo tempore eaque similique. Autem unde praesentium debitis pariatur reprehenderit quod nostrum aliquid voluptates rem fugit, enim officia quae voluptas minima saepe, doloribus eum laboriosam mollitia, illo dolorum placeat libero? Temporibus eos quasi numquam laudantium facilis quas ducimus laboriosam velit! Iste aliquam fuga cupiditate velit praesentium laborum molestiae odio at porro magnam provident eius ullam debitis ratione illum ad quo dolore sequi, dolor quae tempora! Aperiam, ullam necessitatibus? Voluptates modi in ad libero rem amet officiis laborum ipsum qui est! Eos magnam doloremque laboriosam, magni ut commodi non officia quas optio animi quod voluptates maxime facilis enim deserunt voluptas! Aliquid eveniet fugiat maxime quidem tempora impedit numquam rem totam, quod consequuntur maiores ducimus voluptatum, quo, explicabo aut odio dignissimos possimus nostrum quis? Totam voluptatibus voluptates labore dolores ipsa harum laborum! Minima, iure vitae totam reprehenderit quaerat quis consequuntur ratione minus, harum cum voluptatibus eum laborum veniam debitis. Provident nam animi enim nihil mollitia repudiandae? Ullam temporibus ea debitis fuga repellat distinctio, repellendus eius? Tenetur porro nesciunt ea mollitia beatae possimus nisi quos quae, blanditiis libero magni facere quasi ipsam odio earum quaerat consequatur neque suscipit, doloremque accusantium quia animi modi! Ut adipisci neque, nulla ea dignissimos iusto qui voluptates accusamus corporis dolor voluptatem? Itaque provident ipsum enim esse suscipit cupiditate, debitis numquam, excepturi sunt earum temporibus illo veritatis, rerum asperiores. Possimus asperiores, beatae rerum modi esse, quod, delectus sequi totam voluptatem praesentium in tenetur. Voluptate consequuntur quo voluptates fugiat praesentium, adipisci recusandae, fugit inventore odio cumque eveniet! Necessitatibus nemo ipsum minima deserunt corrupti. Dolor nobis officiis natus ipsam sunt odit blanditiis quia voluptatibus, qui optio dolore reiciendis possimus exercitationem impedit. Repellat modi fuga rem temporibus ratione corrupti itaque beatae esse voluptates reprehenderit nesciunt saepe et quas harum odit, soluta, dolores officiis, optio impedit sint obcaecati. Expedita repellendus repudiandae earum hic labore ipsa, mollitia harum voluptatem iste, fuga ex incidunt aliquid totam debitis at. Mollitia obcaecati alias minima sit animi dolores consequatur praesentium, nesciunt temporibus nam eligendi assumenda fugiat quasi dignissimos laudantium neque labore excepturi dolorem qui sequi aperiam? Quo eum atque natus quidem incidunt doloremque est ratione facere, doloribus molestias labore nemo accusantium consectetur provident. Maiores, quidem!', 30);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `type_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `type_role`) VALUES
(1, 'Utilisateur'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `user`
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
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo_user`, `email_user`, `mdp_user`, `img_user`, `id_role`) VALUES
(30, 'Dimensio', 'walther.maxime@gmail.com', '$2y$10$wRbI0eEIaDZicfytYKRp0u4sN9StOKliX8KL45fAN49ctGk2kuMQ2', 'dimensio.jpg', 2),
(31, 'test', 'test@test', '$2y$10$kOvKcPTDatJ5n4n0LNUtOej5HnCVkul7ef6B5H.Wdb5dNp.0E8zGO', 'default_user.png', 1),
(32, 'solo', 'solo@t', '$2y$10$toTBQ43.3mf2bJiNhqxm3uXqv64U3hemUyZYzK/eHghFgsFdlXk4W', 'default_user.png', 1),
(33, 'Admin', 'admin@admin', '$2y$10$NHvqMykypMPAANIhvEz6aepudOVCbLJIsK8ob4miBuoWP72u8d3ni', 'images/img_users/cf1d5b1664e5e427ea86c41e628c3e4c.jpg', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `completer`
--
ALTER TABLE `completer`
  ADD PRIMARY KEY (`id_game`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`id_editeur`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`),
  ADD KEY `id_editeur` (`id_editeur`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `id_editeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `completer`
--
ALTER TABLE `completer`
  ADD CONSTRAINT `completer_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `game` (`id_game`),
  ADD CONSTRAINT `completer_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`id_editeur`) REFERENCES `editeur` (`id_editeur`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
