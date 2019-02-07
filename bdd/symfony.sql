-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 07 fév. 2019 à 01:11
-- Version du serveur :  5.7.23
-- Version de PHP :  7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kind` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` longblob NOT NULL,
  `encrypt_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CBE5A331A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `user_id`, `title`, `author`, `kind`, `editor`, `short_description`, `encrypt_name`) VALUES
(1, 1, 'Nouveaux contes pour les enfants', 'Alexandrine-Sophie De Bawr', 'Conte', 'La bibliothèque électronique du Québec', 0x496c20c3a974616974207365707420686575726573206475206d6174696e2c206574206c65206a6f75720d0a706172616973736169742064657075697320706575203b20636172206f6e20c3a974616974206175206d6f69730d0a64e280996f63746f6272652e20556e20706574697420676172c3a76f6e2c20717569206d6172636861697420666f727420766974650d0a737572206c61206772616e646520726f7574652064e280994f726cc3a9616e7320c3a02050617269732c2073e280996176616ec3a76169740d0a76657273206c61206261727269c3a872652064e28099456e6665722c20706f7274616e742073757220736f6e20c3a97061756c6520756e0d0a62c3a2746f6e2070617373c3a92064616e7320736f6e207061717565742e20496c20c3a97461697420686162696c6cc3a92064e28099756e650d0a76657374652065742064e28099756e2070616e74616c6f6e206272756e7320666f72742070726f707265732e2053610d0a66696775726520c3a974616974207269616e74652c20657420696c20736966666c61697420676169656d656e7420756e206169720d0a6175766572676e61742e, 'a1992d5ef4f177db6c21ee5ef5cf6cdd.pdf'),
(2, 1, 'La terre qui meurt', 'René Bazin', 'Roman', 'La bibliothèque électronique du Québec', 0x4c6520636869656e2c20756e2062c3a2746172642064652076696e6774207261636573206dc3aa6cc3a965732c2061750d0a706f696c206772697320666c6f636f6e6e6575782c207175692073e28099616368657661697420656e206dc3a8636865730d0a66617576657320737572206c6520646576616e7420646573207061747465732c20636573736120617573736974c3b4740d0a64e2809961626f79657220c3a0206c61206261727269c3a872652c207375697669742c20656e2074726f7474616e742c206c610d0a626f72647572652064e28099686572626520717569206365726e616974206c65206368616d702c2065742c207361746973666169740d0a6475206465766f6972206163636f6d706c692c2073e28099617373697420c3a0206ce2809965787472c3a96d6974c3a9206465206c610d0a72616e67c3a9652064652063686f7578207175e280996566666575696c6c616974206c65206dc3a974617965722e, 'def040b6364b682bc1961a4f08319c2c.pdf'),
(3, 3, 'Baltus le Lorrain', 'René Bazin', 'Roman', 'La bibliothèque électronique du Québec', 0x456e204c6f727261696e65206465206c616e67756520616c6c656d616e64652c20746f7574207072c3a8732064650d0a6c612066726f6e7469c3a872652c20756e65206772616e6465206665726d652065737420706f73c3a96520617520626f72640d0a6465206c6120666f72c3aa742e205361206661c3a7616465207072696e636970616c652072656761726465206c610d0a4672616e63652e20436f6d6d6520656c6c65206573742062c3a27469652073757220756e6520636f6c6c696e652c206f6e0d0a766f6974206465206cc3a02c206574206269656e206c6f696e2c206c65732063616d7061676e657320706f75720d0a6c65737175656c6c6573206c657320686f6d6d657320736520736f6e742074616e7420626174747573203b2065742073690d0a6ce280996f6e20666169742c20656e2061727269c3a872652c2064752063c3b474c3a9206465206ce280996f7269656e742c2074726f69732063656e74730d0a6dc3a874726573207365756c656d656e742c20e2809320766572676572732c206772616e6473206172627265732c0d0a6368616d707320646520666f7567c3a8726573206574207175656c717565666f697320646520706f6d6d65732064650d0a74657272652c20e28093206f6e20656e7472652064616e73206c6120666f72c3aa74206475205761726e64742c20717569206573740d0a6465206c612053617272652e, '0f899c97b8bbeaf3d2b3145fe4f67142.pdf'),
(4, 3, 'Le blé qui lève', 'René Bazin', 'Roman', 'La bibliothèque électronique du Québec', 0x4c6520736f6c65696c2064c3a9636c696e6169742e204c652076656e742064e28099657374206d6f75696c6c616974206c610d0a6372c3aa746520646573206d6f747465732c206163746976616974206c61206d6f6973697373757265206465730d0a666575696c6c657320746f6d62c3a965732c20657420636f757672616974206c65732074726f6e63732064e280996172627265732c0d0a6c65732062616c6976656175782c206c6573206865726265732073616e73206a65756e65737365206574206d6f6c6c65730d0a646570756973206ce280996175746f6d6e652c2064e28099756e207665726e69732072c3a973697374616e7420636f6d6d650d0a63656c756920717565206c6573206d6172c3a9657320736f7566666c656e7420737572206c65732066616c61697365732e, '291b6e86ee27dc13e5f5017cab07d4ed.pdf'),
(6, 3, 'Le Robinson de douze ans', 'Jeanne Sylvie Mallès de Beaulieu', 'Roman', 'La bibliothèque électronique du Québec', 0x4c6f756973204672616e63c5937572206176616974207365727669207472656e746520616e7320736f6e20706179730d0a6176656320686f6e6e657572203b20736120627261766f75726520657420736120626f6e6e6520636f6e64756974650d0a6c75692061766169656e7420616371756973206ce28099657374696d6520646520736573206368656673203b2073610d0a6672616e6368697365206574207361206761696574c3a9206ce2809961766169656e742066616974206368c3a972697220646520746f75730d0a7365732063616d6172616465732e20436f757665727420646520626c6573737572657320657420c3a267c3a92064650d0a71756172616e74652d73697820616e732c20696c2073656e74616974206c65206265736f696e206465207365207265706f7365720d0a657420646520736520666169726520756e652066616d696c6c652e, 'a8462a6d5176b18d65ad280c3122f1a0.pdf'),
(7, 3, 'Les quatre cavaliers de l\'apocalypse', 'Vicente Blasco-Ilbañez', 'Roman', 'La bibliothèque électronique du Québec', 0x4c652037206a75696c6c657420313931342c204a756c6573204465736e6f796572732c206c65206a65756e650d0ac2ab207065696e7472652064e28099c3a26d657320c2bb2c20636f6d6d65206f6e206ce28099617070656c6169742064616e73206c65730d0a73616c6f6e7320636f736d6f706f6c69746573206475207175617274696572206465206ce28099c389746f696c652c20e280930d0a62656175636f757020706c75732063c3a96cc3a862726520746f757465666f697320706f7572206c61206772c3a263650d0a61766563206c617175656c6c6520696c2064616e73616974206c652074616e676f2071756520706f7572206c610d0a73c3bb726574c3a920646520736f6e2064657373696e20657420706f7572206c612072696368657373652064652073610d0a70616c657474652c20e280932073e28099656d62617271756120c3a0204275656e6f732d416972657320737572206c650d0a4bc5936e69672046726564657269632d4175677573742c207061717565626f742064652048616d626f7572672c0d0a6166696e2064652072656e7472657220c3a02050617269732e, 'c359603113c447b5b0dab7855e4c6380.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'administrateur@mail.com', 'administrateur@mail.com', 1, NULL, '$2y$13$Lfml96vuHPn5pW/Osh1BkOR4orVxHlHfv6ihEdpEd9lZpd9KQ/UFO', '2019-02-07 00:34:53', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(3, 'user', 'user', 'user@mail.com', 'user@mail.com', 1, NULL, '$2y$13$nigJlkH4qY9DMZuDU1KjgutT/5Xp/6efhNGU3zU8kL5lhKHThSYhC', '2019-02-07 01:10:34', NULL, NULL, 'a:0:{}');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_CBE5A331A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
