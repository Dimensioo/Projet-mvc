-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 04:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
  `temps_completer` int(11) DEFAULT NULL,
  `note_completer` int(11) DEFAULT NULL,
  `achievement_completer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `completer`
--

INSERT INTO `completer` (`id_game`, `id_user`, `temps_completer`, `note_completer`, `achievement_completer`) VALUES
(7, 30, 210, 10, 50),
(8, 30, 400, 5, 174),
(10, 30, 147, 8, 50),
(11, 30, 254, 10, 50),
(12, 30, 398, 9, 96),
(12, 33, 314, 2, 78),
(13, 30, 156, 10, 146),
(14, 30, 90, 10, 25),
(17, 30, 95, 0, 50),
(20, 30, 90, 5, 14),
(21, 30, 47, 8, 19),
(22, 30, 2, 6, 0),
(23, 33, 97, 7, 14),
(29, 30, 20, 5, 25);

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
(15, 'From Software'),
(16, 'Valve'),
(17, 'Re-Logic'),
(18, 'IO Interactive'),
(19, 'Extremely OK Games'),
(20, 'Bethesda'),
(21, 'Team Cherry'),
(22, 'Square Enix'),
(23, 'Electronic Arts'),
(24, 'CAPCOM'),
(25, 'ZA/UM'),
(27, 'Amazon Games'),
(28, 'Hello Games'),
(29, 'Digital Extremes'),
(30, 'CD PROJEKT RED');

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
(7, 'DARK SOULS', '2011-03-06', 'Vint alors l\'avènement du Feu... Redécouvrez le jeu de référence salué par la critique. Dans cette splendide version remastérisée, retrouvez Lordran et ses décors époustouflants en haute définition et en 60 fps.', 'images/img_jeux/dark_souls.jpg', 15),
(8, 'Counter-Strike: Global Offensive', '2012-08-21', 'Counter-Strike: Global Offensive (CS:GO) étend le genre du jeu d\'action en équipe dont Counter-Strike fut le pionnier lors de sa sortie, en 1999. CS:GO offre de nouvelles cartes et armes ainsi que de nouveaux personnages et modes de jeu, et renouvelle les cartes classiques telles que de_dust2.', 'images/img_jeux/counter_strike.jpg', 16),
(9, 'Dota 2', '2013-07-09', 'Chaque jour dans le monde, des millions de personnes incarnent un personnage parmi plus de cent et s\'affrontent dans Dota 2. Il y a toujours quelque chose à découvrir, car le gameplay, les fonctionnalités et les personnages évoluent sans cesse au fil des mises à jour.', 'images/img_jeux/dota2.jpg', 16),
(10, 'DARK SOULS II', '2014-04-25', 'Développé par FROM SOFTWARE, DARK SOULS™ II est la suite tant attendue du redoutable Dark Souls™, qui a connu un succès fracassant en 2011. Les terribles défis et les émotions intenses de cet action-rpg au caractère unique et old school ont enflammé l\'imagination de nombreux joueurs à travers le monde.\r\n\r\nDans DARK SOULS™ II, la difficulté et les innovations désormais marque de fabrique de la franchise sont de retour, à la fois en solo et en multijoueur.\r\nPrenez part à ce sombre périple, affrontez de redoutables ennemis, bravez tous les dangers, et relevez les innombrables défis dont FROM SOFTWARE a le secret.', 'images/img_jeux/dark_souls2.jpg', 15),
(11, 'DARK SOULS III', '2016-04-11', 'Dark Souls repousse une fois de plus ses limites avec un nouveau chapitre ambitieux de la série légendaire et encensée par la critique. Préparez-vous à embrasser les ténèbres !', 'images/img_jeux/dark_souls3.jpg', 15),
(12, 'Terraria', '2011-05-16', 'Creuser, survivre, explorer, construire ! Tout est possible dans ce jeu d\'aventure bourré d\'action. Le monde est votre toile et le sol votre peinture.\r\nPrenez vos outils, et c\'est parti ! Fabriquez des armes pour lutter contre toutes sortes d\'ennemis. Creusez en profondeur pour trouver des accessoires, de l\'argent et plein d\'autres objets qui pourront vous être utiles. Partez à la recherche de matériaux pour fabriquer tout ce qu\'il vous faut pour créer votre propre monde. Construisez une maison, un fort ou pourquoi pas un château. Des gens s\'installeront et vendront peut-être même leurs services pour vous aider dans votre voyage.', 'images/img_jeux/terraria.jpg', 17),
(13, 'HITMAN 2', '2018-11-13', 'Parcourez le monde et traquez vos cibles dans les lieux exotiques du jeu HITMAN™ 2. Des rues baignées de soleil aux sombres et dangereuses forêts tropicales, dans cette histoire d\'espionnage exceptionnelle, aucun endroit n\'échappe à l\'assassin le plus créatif du monde : l\'Agent 47.', 'images/img_jeux/hitman2.jpg', 18),
(14, 'Celeste', '2018-01-25', 'Aidez Madeline à survivre à ses démons intérieurs au mont Celeste, dans ce jeu de plateformes ultra relevé, réalisé par les créateurs du classique TowerFall. Relevez des centaines de défis faits à la main, découvrez tous les secrets et dévoilez le mystère de la montagne.', 'images/img_jeux/celeste.jpg', 19),
(16, 'The Elder Scrolls V: Skyrim', '2011-11-11', 'Le nouveau chapitre très attendu de la saga Elder Scrolls nous arrive des créateurs du jeu de l\'année 2006 et 2008, Bethesda Game Studios. Skyrim réinvente et révolutionne le monde ouvert, ramenant à la vie un monde complet que vous pourrez librement explorer.', 'images/img_jeux/df69ee8d4242da32ed61b4fe14e5fe0a.jpg', 20),
(17, 'Hollow Knight', '2017-02-24', 'Choisissez votre destin dans Hollow Knight ! Une aventure épique et pleine d’action, qui vous plongera dans un vaste royaume en ruine peuplé d’insectes et de héros. Dans un monde en 2D classique, dessiné à la main.', 'images/img_jeux/40f96cc798dc9fa26e1054e5cdeeadd5.jpg', 21),
(18, 'NieR:Automata', '2017-03-17', 'NieR: Automata raconte l’histoire des androïdes 2B, 9S et A2 et leur combat féroce contre une dystopie régie par de puissantes machines.', 'images/img_jeux/6374768de3242004e859b7c169725165.jpg', 22),
(19, 'Portal 2', '2011-04-19', 'Portal 2 nous vient tout droit du jeu original culte Portal primé à plus de 70 reprises pour sa jouabilité, son scénario et sa musique.  La partie solo de Portal 2 présente un ensemble de nouveaux personnages, de nouveaux éléments et de nouvelles chambres de test plus vastes. Les joueurs vont pouvoir parcourir des parties inconnues des laboratoires d\'Aperture Science et retrouver GLaDOS, l\'ordinateur maléfique du jeu original.  Le mode de coopération du jeu comprend une campagne autonome avec une histoire spécifique, des chambres de test et deux nouveaux personnages. Ce nouveau mode va remettre en question vos connaissances des portals. Il va falloir non seulement agir mais également penser en mode coopératif.', 'images/img_jeux/7578c3f0d6ce1ff81039e351c26b8a9c.jpg', 16),
(20, 'Portal', '2007-10-10', 'Portal est un nouveau jeu solo signé Valve. Avec pour décor les mystérieux laboratoires Aperture Science, Portal s\'impose par son côté innovant et garantit aux joueurs un gameplay et une longévité à toute épreuve.', 'images/img_jeux/31cc7bce0fbda59724d417f38f8b2802.jpg', 16),
(21, 'Dishonored', '2012-10-09', 'Dishonored est un jeu d\'action / infiltration immersif, dans lequel vous incarnez un assassin aux pouvoirs surnaturels poussé par un désir de vengeance. Éliminez vos cibles grâce à un système de combat dynamique permettant de combiner les innombrables pouvoirs surnaturels, armes et gadgets à votre disposition. Traquez vos ennemis à la faveur de l\'obscurité ou foncez tête baissée, l\'arme au poing. Définissez votre style de jeu et élaborez votre vengeance. Vos choix façonneront votre expérience.', 'images/img_jeux/e492e050b44031d2ec2aef322bf318b6.jpg', 20),
(22, 'Apex Legends', '2019-02-04', 'Apex Legends est le célèbre jeu de tir gratuit avec des héros créé par Respawn Entertainment. Maîtrisez une équipe de personnages légendaires dotés de capacités surpuissantes, et découvrez une jouabilité novatrice d\'une grande profondeur tactique dans cette nouvelle évolution du genre.', 'images/img_jeux/10a28d6f772aa3607be27b838b5e7bfe.jpg', 23),
(23, 'Monster Hunter: World', '2018-08-09', 'Bienvenue dans le Nouveau Monde ! &quot;Monster Hunter: World&quot; offre une dimension de jeu et une liberté sans commune mesure avec les précédents épisodes. Les chasseurs pourront utiliser un arsenal varié pour chasser un bestiaire unique dans un monde fabuleux !', 'images/img_jeux/2e9ca234a8620d962595b2173f6d8e79.jpg', 24),
(24, 'The Witcher 3: Wild Hunt', '2015-05-18', 'Porté par son scénario, The Witcher 3: Wild Hunt est un jeu de rôles en monde ouvert, dévoilant un univers fantastique visuellement bluffant et plein de choix déterminants. Dans The Witcher, vous incarnez Geralt de Riv, un chasseur de monstres professionnel chargé de retrouver l\'enfant de la prophétie dans un vaste monde ouvert, rempli de villes marchandes, d\'îles pirates, de cols montagneux dangereux et de cavernes oubliées à explorer.', 'images/img_jeux/6fc396c342f2fd125c4b5675ac614447.jpg', 30),
(29, 'Lost Ark', '2022-02-11', 'Embarquez-vous dans une odyssée en quête de l\'Arche perdue dans un monde vaste et dynamique : explorez de nouvelles terres, cherchez des trésors perdus et relevez le défi de combats trépidants dans ce RPG free-to-play bourré d\'action.', 'images/img_jeux/d184b7ba4d4e64d6788b3ed77f067471.jpg', 27),
(30, 'Dishonored: Death of the Outsider', '2017-09-15', 'Les développeurs maintes fois récompensés d\'Arkane® Studios reviennent avec Dishonored® : La mort de l\'Outsider, un jeu à part entière qui ne requiert pas Dishonored 2. Devenez un assassin surnaturel en incarnant la célèbre Billie Lurk. Retrouvez votre mentor Daud et préparez ensemble le plus grand assassinat de tous les temps. Dishonored® : La mort de l\'Outsider reprend tous les codes de la série Dishonored, notamment le système de combat fluide, une conception de niveaux exceptionnelle et un scénario évoluant suivant vos choix. La mort de l\'Outsider offre une parfaite entrée en matière pour les joueurs découvrant la série Dishonored et une extension originale du gameplay et de l\'univers pour les fans inconditionnels.', 'images/img_jeux/926702be2d9a9b8ce6798158f9dbed6e.jpg', 20),
(33, 'No Man\'s Sky', '2016-08-12', 'Inspiré par l\'aventure et l\'imagination qui nous fascinent dans les films de science-fiction classique, No Man\'s Sky vous présente une galaxie à explorer, remplie de planètes et de formes de vie uniques, dans un environnement bourré de danger et d\'action.  Dans No Man\'s Sky, chaque étoile est la lumière d\'un soleil lointain, en orbite duquel se trouvent des planètes pleines de vie. Et vous pouvez aller où vous voulez. Volez sans interruption de l\'espace à la surface des planètes, sans écran de chargement ni limite. Dans cet univers infini généré de manière dynamique, vous découvrirez des lieux et des créatures qu\'aucun autre joueur n\'a jamais vus... et qui n\'existeront peut-être jamais ailleurs.', 'images/img_jeux/9c9e90daefddd3a46d14c6e8110f389b.jpg', 28),
(34, 'Dishonored 2', '2016-11-11', 'Trouvez votre place dans un monde où mysticisme et industrie s\'affrontent. Choisirez-vous d\'incarner l\'Impératrice Emily Kaldwin ou le Protecteur royal, Corvo Attano ? Allez-vous progresser dans le jeu sans être vu ou mettre à profit son système de combat dévastateur ? Peut-être opterez-vous pour une combinaison des deux ? Comment utiliserez-vous les pouvoirs, les armes et les gadgets spécifiques à votre personnage pour éliminer vos ennemis ? L\'histoire évolue avec vos choix et vous mènera d\'intrigue en intrigue au fil de missions soignées.', 'images/img_jeux/601b2ad5427a0a4d76ce83f60a9ed499.jpg', 20),
(36, 'Warframe', '2013-03-25', 'Réveillez-vous en tant que guerrier implacable et combattez aux côtés de vos amis dans ce jeu d\'action en ligne gratuit basé sur un scénario original. Affrontez des factions belligérantes à travers un système interplanétaire tentaculaire en suivant les conseils de la mystérieuse Lotus. Améliorez votre Warframe, construisez un Arsenal destructeur et réalisez votre véritable potentiel à travers des mondes ouverts immenses dans ce jeu de tir passionnant à la troisième personne.', 'images/img_jeux/f2185e7e210e5113d0c77a9521d53bcb.jpg', 29),
(37, 'Cyberpunk 2077', '2020-12-10', 'Cyberpunk 2077 est un RPG d\'action-aventure en monde ouvert qui se déroule dans la mégalopole de Night City, où vous incarnez un cyber-mercenaire qui livre un combat sans merci pour sa survie. Avec des améliorations et du contenu additionnel gratuit, personnalisez entièrement votre personnage et votre style de jeu en accomplissant des boulots, améliorez votre réputation et déverrouillez des améliorations. Les relations que vous nouerez et les choix que vous ferez auront un impact sur l\'histoire et le monde qui vous entoure. C\'est ici que se forgent les légendes. Quelle sera la vôtre ?', 'images/img_jeux/40f71d8b5a8d0ac3261cb79d4a3f7a24.jpg', 30),
(38, 'Disco Elysium', '2019-10-15', 'Disco Elysium est un jeu de rôle révolutionnaire dans un monde ouvert. Vous êtes un enquêteur, avec un système de talents unique en son genre et tout un pan urbain à arpenter. Interrogez des personnages inoubliables, résolvez des crimes ou acceptez des pots-de-vin. Libre à vous d’incarner un héros ou une épave humaine irrécupérable.', 'images/img_jeux/7def333b88e617fc0a80d38fa93956dc.jpg', 25);

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
(4, 'Titre news 2', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam adipisci quod facilis consectetur beatae eos ducimus! Expedita repudiandae ut, quisquam laborum quae vero ex deserunt rerum praesentium harum, natus beatae recusandae qui reprehenderit ad rem amet, quis repellat neque excepturi accusamus consequatur assumenda! Voluptatum tempore corrupti nemo voluptates vel corporis eveniet eius accusamus quae officia, voluptate quo ipsam nobis est consequuntur odio nesciunt vitae commodi hic, eaque accusantium! Voluptas culpa, laboriosam esse, a, assumenda labore quam nobis veniam sequi reiciendis vero laborum aliquid nisi mollitia! At optio, quia reprehenderit pariatur, dolor laudantium tempora blanditiis nesciunt ex eum voluptatibus fugit facere eaque inventore a enim, perspiciatis praesentium alias in accusamus voluptatem. Expedita, mollitia quae? Quaerat dolores eos praesentium magnam maxime cum est soluta omnis id sint cupiditate at ab esse numquam inventore cumque, autem, sequi ullam veritatis dicta aperiam, ducimus qui enim atque? Eveniet vel repudiandae illum at. Rem vitae repellat facilis voluptate tempore debitis illo quaerat mollitia maxime perferendis quas, optio hic voluptatum natus recusandae, pariatur vel incidunt cum eaque porro praesentium ad nobis. Quasi eveniet odit ullam nulla quod. Nesciunt est, eos sequi voluptate corrupti reiciendis ipsa. Labore, magni veniam quasi eius numquam molestias rem minima? Cum, odio nam?', 30),
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
  `date_user` date DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `pseudo_user`, `email_user`, `mdp_user`, `img_user`, `date_user`, `id_role`) VALUES
(30, 'Dimensio', 'walther.maxime@gmail.com', '$2y$10$wRbI0eEIaDZicfytYKRp0u4sN9StOKliX8KL45fAN49ctGk2kuMQ2', 'images/img_users/ef304f439a5c5ddf96e64faca8c5929d.jpg', '2021-11-25', 2),
(31, 'test', 'test@test', '$2y$10$kOvKcPTDatJ5n4n0LNUtOej5HnCVkul7ef6B5H.Wdb5dNp.0E8zGO', 'images/img_users/dd9dcae3c6865b53f38736b721eaf607.jpg', '2022-01-01', 1),
(32, 'solo', 'solo@solo', '$2y$10$toTBQ43.3mf2bJiNhqxm3uXqv64U3hemUyZYzK/eHghFgsFdlXk4W', 'images/img_users/default_user.png', '2022-01-01', 1),
(33, 'Admin', 'admin@admin', '$2y$10$NHvqMykypMPAANIhvEz6aepudOVCbLJIsK8ob4miBuoWP72u8d3ni', 'images/img_users/9656c3018f0b1cbd688eec5ec82db006.jpg', '2022-02-01', 2),
(37, 'date', 'date@date', '$2y$10$YUQ72zdWqGgx/8BnUQTabOwrliokSaMYBfUlZ7UhkyaYTVKptp9OO', 'images/img_users/default_user.png', '2022-02-10', 1);

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
  MODIFY `id_editeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
