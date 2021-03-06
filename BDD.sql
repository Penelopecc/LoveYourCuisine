-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2018 at 12:25 PM
-- Server version: 5.5.59
-- PHP Version: 5.4.45-0+deb7u13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mezianiaxe`
--

-- --------------------------------------------------------

--
-- Table structure for table `accroche`
--

CREATE TABLE IF NOT EXISTS `accroche` (
  `idAccroche` int(11) NOT NULL AUTO_INCREMENT,
  `idDiv` varchar(500) DEFAULT NULL,
  `titre` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idAccroche`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accroche`
--

INSERT INTO `accroche` (`idAccroche`, `idDiv`, `titre`, `image`) VALUES
(1, 'accroche-texte', 'LoveYourCuisine', 'Images/accroche.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `caracteristiques`
--

CREATE TABLE IF NOT EXISTS `caracteristiques` (
  `idCaracteristiques` int(11) NOT NULL AUTO_INCREMENT,
  `idDiv` varchar(500) DEFAULT NULL,
  `titre` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `texte` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idCaracteristiques`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `caracteristiques`
--

INSERT INTO `caracteristiques` (`idCaracteristiques`, `idDiv`, `titre`, `image`, `texte`) VALUES
(1, 'caracteristiques', 'LoveYourCuisine c''est : ', '', ''),
(2, 'caracteristiques', 'Pratique', '', 'Texte');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idcategorie` int(10) NOT NULL,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`idcategorie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `nom`) VALUES
(1, 'raffin??e'),
(2, '??conome'),
(3, 'gourmande');

-- --------------------------------------------------------

--
-- Table structure for table `commander`
--

CREATE TABLE IF NOT EXISTS `commander` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDiv` varchar(500) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `texte` varchar(10000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `commander`
--

INSERT INTO `commander` (`id`, `idDiv`, `titre`, `texte`, `image`) VALUES
(1, 'commander-plat', 'Commander un plat sur LoveYourCuisine :', 'C''est d??licieux et pr??par?? avec amour', ''),
(2, 'commander-plat', '', '1) Je commande un repas fait maison ?? proximit?? de chez moi.', 'Images/repasMaison.jpg'),
(3, 'commander-plat', '', '2) Je r??cup??re mon repas chez le cuisto, mon magasin bio ou bien je me fais livrer.', 'Images/recupere.jpg'),
(4, 'commander-plat', '', '3) Je d??guste un repas d??licieux et fait maison.', 'Images/deguste.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cuisto`
--

CREATE TABLE IF NOT EXISTS `cuisto` (
  `idCuisto` int(11) NOT NULL AUTO_INCREMENT,
  `idutilisateur` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `specialite0` varchar(40) DEFAULT NULL,
  `specialite1` varchar(40) DEFAULT NULL,
  `specialite2` varchar(40) DEFAULT NULL,
  `specialite3` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idCuisto`),
  KEY `idutilisateur` (`idutilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cuisto`
--

INSERT INTO `cuisto` (`idCuisto`, `idutilisateur`, `description`, `specialite0`, `specialite1`, `specialite2`, `specialite3`) VALUES
(1, 6, 'Roselyne est passionn??e de cuisine depuis toujours et a lanc?? son activit?? de traiteur Ind??pendant il y a 3 ans. Elle a pass?? son CAP de cuisine et de p??tisserie, et a notamment pu ??tre form??e dans la c??l??bre ??cole de cuisine Ferrandi.  Roselyne aime avant tout cuisiner des produits de qualit??. Poissons, viandes, fruits l??gumes??? pour chaque ingr??dient, elle a son producteur ou son fournisseur pr??f??r??. Un de ses plus grand plaisir : voir les sourires les gourmands quand ils goutent sa tarte ?? la Maracudja (fruits de la passion) venant directement de sa Guyane natale !', './Images/RoselyneSpe1.jpg', './Images/RoselyneSpe2.jpg', './Images/RoselyneSpe3.jpg', './Images/RoselyneSpe4.jpg'),
(2, 7, 'Latifa est passionn??e de cuisine depuis sa tendre enfance. Apr??s l''??cole, pendant que ses copains jouaient, elle restait dans sa cuisine pour tester les recettes de g??teaux qu''elle avait dessin??s dans son cahier. Aujourd''hui, vous pourrez encore la voir esquisser ses cr??ations avant de passer au fourneau...  Apr??s avoir r??gal?? ses amis pendant 20 ans et test?? des centaines de crecettes de patisseries, elle s''est lanc??e dans son activit?? de Traiteur Ind??pendante il y a 7 ans pour le plaisir d''inconnus. Car dans la cuisine de Latifa, le go??t est essentiel. Elle cultive elle-m??me une partie des l??gumes et aromates qu''elle travaille, et compl??te sa production avec des fruits et l??gumes qu''elle r??colte chez des producteurs en agriculture bio ou raisonn??e. Latifa aime revisiter les classiques, en s???inspirant de ses nombreux voyages de part et d???autre de la M??diterran??e, et vous propose une cuisine qui invite au partage et ?? la d??couverte.', './Images/LatifaSpe1.jpg', './Images/LatifaSpe2.jpg', './Images/LatifaSpe3.jpg', './Images/LatifaSpe4.jpg'),
(3, 8, 'Aneliz a appris ?? cuisiner dans la cuisine de sa m??re, dans son Sud Ouest natal. Depuis plus de 40 ans, les couleurs et saveurs ensoleill??es de sa r??gion se retrouvent dans nombre de ses plats, pour le plaisir des plus gourmands.  Passionn??e de cuisine depuis toujours, Aneliz a multipli?? les cours de cuisine aupr??s des plus grands Chefs avant de lancer, il y a 4 ans, son activit?? de Traiteur Ind??pendant. Son plus grand plaisir : aller d??nicher les meilleurs fruits et l??gumes dans les AMAP, et les (re)travailler ?? sa fa??on, afin de faire d??couvrir tout son savoir-faire ?? travers des recettes simples et raffin??es, qui s''adaptent particuli??rement aux d??jeuners et aux d??ners entre amis.', './Images/AnelizSpe1.png', './Images/AnelizSpe2.jpg', './Images/AnelizSpe3.jpg', './Images/AnelizSpe4.jpg'),
(4, 9, 'Thomas cuisine depuis ''30 ans''... Quand vous verrez son sourire de jeune papa trentenaire, vous comprendrez qu''il cuisine depuis toujours ! Sa mamie lui a tout enseign?? dans son Sud Ouest natal, et ??a se devine dans sa cuisine g??n??reuse et familiale. Titulaire d''un CAP cuisine, Thomas est devenu Traiteur Ind??pendant il y a 5 ans. Il aime cuisiner des produits de qualit??, travaille toujours des produits de saison, et se fournit directement chez les petits producteurs. Il privil??gie les circuits courts et les fournisseurs locaux.', './Images/thomasSpe1.jpg', './Images/thomasSpe2.jpg', './Images/thomasSpe3.jpg', './Images/thomasSpe4.jpg'),
(5, 10, 'Hicham a toujours ??t?? passionn?? de cuisine. Il doit ?? sa m??re son go??t pour les saveurs et pour l''esth??tique ! D??s son plus jeune page, il lui disait d''ailleurs qu''il souhaitait en faire son m??tier... Hicham a bien grandi depuis et est devenu Traiteur Ind??pendant il y a d??j?? 12 ans. 12 ann??es remplies de passion qui lui ont permis d''??tre aujourd''hui reconnu pour sa rigueur et son originalit??.  Pour ??tre certain de proposer des recettes soign??es et de qualit??, Hicham se fournit chez son mara??cher de toujours. Il y a ses habitudes et ses fournisseurs lui r??servent des produits d''exception. Hicham aime la libert?? et l''esth??tisme en cuisine. Qu''elles soient sal??es ou sucr??es, vous d??gusterez des pi??ces aussi belles que go??teuses ! Alors, laissez-vous surprendre par sa cr??ativit??.', './Images/hichamSpe1.jpg', './Images/hichamSpe2.jpg', './Images/hichamSpe3.jpg', './Images/hichamSpe4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `explication`
--

CREATE TABLE IF NOT EXISTS `explication` (
  `idExplication` int(11) NOT NULL AUTO_INCREMENT,
  `idDiv` varchar(500) DEFAULT NULL,
  `titre` varchar(500) DEFAULT NULL,
  `texte` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idExplication`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `explication`
--

INSERT INTO `explication` (`idExplication`, `idDiv`, `titre`, `texte`) VALUES
(1, 'explication', 'Pourquoi choisir LoveYourCuisine ?', 'Nous avons toujours pens?? que bien manger ??tait une des choses les plus importantes dans la vie. Et pourtant, comme tout le monde, on se retrouvait chaque soir ?? ne pas savoir quoi faire ?? manger, ?? nous r??signer ?? pr??parer toujours la m??me chose, et ?? parfois tomber dans la facilit?? de la malbouffe... C''est pour cela que l''on s''est dit qu''il fallait inventer une nouvelle fa??on de pr??parer ?? manger ?? la maison. Alors, nous avons cr???? LoveYourCuisine');

-- --------------------------------------------------------

--
-- Table structure for table `fairemanger`
--

CREATE TABLE IF NOT EXISTS `fairemanger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDiv` varchar(500) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `texte` varchar(500) NOT NULL,
  `image` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fairemanger`
--

INSERT INTO `fairemanger` (`id`, `idDiv`, `titre`, `texte`, `image`) VALUES
(1, 'faire-manger', 'Je mange avec LoveYourCuisine', 'C''est simple et sympa ', ''),
(2, 'faire-manger', '', '1) Je choisis une recette LoveYourCuisine', 'Images/commande.jpg'),
(3, 'faire-manger', '', '2) Je r??cup??re mes ingr??dients dans mon magasin bio pr??f??r??', 'Images/legumes.jpg'),
(4, 'faire-manger', '', '3) Je cuisine en 20 min un plat d??licieux et raffin?? ', 'Images/plat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `idingredient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`idingredient`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=181 ;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`idingredient`, `nom`) VALUES
(1, '4 ??pices (m??lange)'),
(2, 'Agneau (roti)'),
(3, 'Ail Crac Espagne'),
(4, 'Ail Sec (vrac)'),
(5, 'Amandes Blanche poudre (en vrac)'),
(6, 'Amandes compl??tes en poudre (bio)'),
(7, 'Amandes enti??res blanches (vrac)'),
(8, 'Arome Framboise 60ml'),
(9, 'Bacon ??minc?? (Fleury Michon)'),
(10, 'Bananes bio'),
(11, 'Basilic feuille bio (35g)'),
(12, 'Beurre Doux (250g)'),
(13, 'Beurre Doux de Barrate (250g)'),
(14, 'Boeuf : morceau avec os pour bouillon '),
(15, 'Boeuf : morceau pour bouillon '),
(16, 'Boeuf : os pour bouillon'),
(17, 'Boulettes de moelle'),
(18, 'Brocoli'),
(19, 'Butternut (courge)'),
(20, 'Cabillaud (filets)'),
(21, 'Caf?? P??rou Grains (Vrac)'),
(22, 'Caf?? Tresor des Peuple Grains'),
(23, 'Camembert Pr??sident bio'),
(24, 'Canelle en poudre (bio)'),
(25, 'Capres bio (vinaigre)'),
(26, 'Carottes bio'),
(27, 'Carottes lav??es bio'),
(28, 'C??l??ri branche (bio)'),
(29, 'C??pes d??shydrat??es (30g)'),
(30, 'Chair de tomates bio (Auchan bio)'),
(31, 'Champignon Blanc Paris'),
(32, 'Champignon Blond'),
(33, 'Chips nature bio (huile de tournesol)'),
(34, 'Chocolat noire dessert (56%)'),
(35, 'Ciboulette bio surgel?? (Dar??gal)'),
(36, 'Cidre doux Briard bio (Seine et Marne)'),
(37, 'Citron jaune bio'),
(38, 'Citron vert'),
(39, 'Colorants alimentaires'),
(40, 'Compote de pommes'),
(41, 'Compote de pommes'),
(42, 'Compote de pommes (all??g??e en suc)'),
(43, 'Concombre'),
(44, 'Confiture Framboise 370g'),
(45, 'Coriandre'),
(46, 'Cornichon (vinaigre)'),
(47, 'Cote de porc (premi??re)'),
(48, 'Coulommiers (Auchan bio)'),
(49, 'Courgette'),
(50, 'Cr??me fleurette (30%MG)'),
(51, 'Cr??me fraiche ??paisse (30%MG)'),
(52, 'Cr??me liquide Auchan Bio (3 x 20cl)'),
(53, 'Cr??mes vache l??g??re (15% MG UHT, 3 cr??mes)'),
(54, 'Cube Legume (6 cubes ; 60g)'),
(55, 'Cube l??gumes d??graiss?? (9 x 10g)'),
(56, 'Cumin moulu (poudre)'),
(57, 'Curcuma frais bio'),
(58, 'Curry Poudre (35g)'),
(59, 'Dinde (escaloppe)'),
(60, 'Echalottes'),
(61, 'Emmental rap?? (100g - 29%MG)'),
(62, 'Emmental rap?? (200g)'),
(63, 'Emmental rap?? 29%MG (100g)'),
(64, 'Farine de bl?? T55 (1kg)'),
(65, 'Flans au caramel'),
(66, 'Flocons d Avoine Sans Gluten'),
(67, 'Fromage ?? la coupe - Cantal entre deux AOP'),
(68, 'Fromage ?? la coupe - Douceur du Tarn (26%MG)'),
(69, 'Fromage ?? la coupe - Le Grand Ribeaupierre'),
(70, 'Gingembre frais bio'),
(71, 'Gnocchi'),
(72, 'Gressin Epautre Pur (125g)'),
(73, 'Gruyere (240g)'),
(74, 'Haricots verts bio (surgel?? Picard)'),
(75, 'Herbes de provence bio'),
(76, 'Huile Coco (20cl)'),
(77, 'Huile de tournesol Desodoris??e'),
(78, 'Huile d Olive 3L BJP (Biovenue)'),
(79, 'Huile d Olive Vierge Extra 75'),
(80, 'Jambon blanc (4 tranches)'),
(81, 'Jus de Mandarine (1L)'),
(82, 'Jus d orange Tetra (1,5L)'),
(83, 'La Salvetat (6x1,25l)'),
(84, 'Lait (Bio Alpenmilch)'),
(85, 'Lait bio 1/2 ??cr??m??'),
(86, 'Lait de coco (225 ml, Le Jardin bio)'),
(87, 'Lait de coco (400ml)'),
(88, 'Lardon nature bio (Bonjour Campagne)'),
(89, 'Lardons fum??s (Auchan bio)'),
(90, 'Laurier (feuilles)'),
(91, 'L??gumes pour soupe (carotte, s??l??rie, poireau)'),
(92, 'Lentilles vertes bio - Jardin bio'),
(93, 'Levure Boulag??re Fraiche (cube)'),
(94, 'Liquide Vaisselle Citron (500ml)'),
(95, 'Mandarines'),
(96, 'Miel d acacia (bio)'),
(97, 'Moutarde de Dijon bio (200g)'),
(98, 'Navets'),
(99, 'Nectar de Goyave (Sirop Agave)'),
(100, 'Noilly Prat'),
(101, 'Noix de cajou bio grill??s et sal??es (Equitable)'),
(102, 'Noix Seche'),
(103, '??ufs (10) - Carrefour bio'),
(104, '??ufs (10) CAL 53/63 Moyen'),
(105, '??ufs (6) Cal 63/73 Gros'),
(106, '??ufs fermier bio (6) - Cocorette'),
(107, 'Oignon bio Auchan (143g/oignon)'),
(108, 'Oignon jaune (bio)'),
(109, 'Oranges'),
(110, 'Pain complet (400g)'),
(111, 'Pain complet au 3 c??r??ales ; Bjorg (500g)'),
(112, 'Pain complet seigle epeautre'),
(113, 'Panais'),
(114, 'Paprika doux (Cook)'),
(115, 'Parmesan reggiano'),
(116, 'Patate douce'),
(117, 'P??tes Fusilli Express (Jardin Bio)'),
(118, 'Pennette bio (Barilla)'),
(119, 'Persil Plat (18g)'),
(120, 'Piment d Espelette (Pur????)'),
(121, 'Pintage (roti)'),
(122, 'Poireau'),
(123, 'Pois chiches'),
(124, 'Poivre moulin noir (50g)'),
(125, 'Poivron orange'),
(126, 'Poivrons jaunes (x2)'),
(127, 'Poivrons jaunes et rouge'),
(128, 'Pommes bio'),
(129, 'Pommes bio rouge'),
(130, 'Pommes de terre bio'),
(131, 'Pommes de terre bio (non lav??es)'),
(132, 'Poulet (cuisses)'),
(133, 'Poulet (filets)'),
(134, 'Poulet entier'),
(135, 'Poulet noir fermier bio (filets)'),
(136, 'Pulpe de tomates'),
(137, 'Pur jus d orange (Auchan bio)'),
(138, 'Pyramide Ch??vre (Auchan bio)'),
(139, 'Raisins secs '),
(140, 'Raisins secs (Thompson bio)'),
(141, 'Raviolis aux Aubergines'),
(142, 'Riz Basmati bio (Prim??al, 500g)'),
(143, 'Riz Basmati bio demi-complet (Vrac)'),
(144, 'Riz long Risotto'),
(145, 'Rostbeef'),
(146, 'Safran moulu (Cook)'),
(147, 'Salade'),
(148, 'Sauce Soja (Shoyu Classique 145ml)'),
(149, 'Saucisses pour Rougail (type Montb??liard)'),
(150, 'Saucisson Sec Pur Porc (200g)'),
(151, 'Saumon bio'),
(152, 'Sel de G??rande (0,5 kg)'),
(153, 'Semoule couscous'),
(154, 'Sesame Blond complet (250g)'),
(155, 'Spaghetti (Monoprix bio, 500g)'),
(156, 'St Hubert bio'),
(157, 'St Hubert bio'),
(158, 'Steaks hach??s (pur b??uf, 100% muscle)'),
(159, 'Sticks et bretzels bio'),
(160, 'Sucre de canne blond (750g)'),
(161, 'Sucre glace bio - Jean Herv??'),
(162, 'Sucre vanill?? - Alter Eco (Madagascar coop KOMEM) (bio)'),
(163, 'The noir Breakfast Ceylan 20'),
(164, 'Thym bio (50g - Herbier de France)'),
(165, 'Tomates concass??es (400g)'),
(166, 'Tomates ronde bio'),
(167, 'Tortelloni Epinard Pignons'),
(168, 'Truite filet'),
(169, 'Veau (blanquette)'),
(170, 'Veau (escaloppe)'),
(171, 'Veau (pav?? ?? griller)'),
(172, 'Vin blanc Soleiller (25cl)'),
(173, 'Vin blanc Sylvaner (75cl)'),
(174, 'Vin rouge Farigoulette'),
(175, 'Vin rouge Vaucluse Show Vin'),
(176, 'Vinaigre de Vin blanc'),
(177, 'Yahourt Bifidus Citron (4x125g)'),
(178, 'Yahourt Les 2 vaches citron bio'),
(179, 'Yahourt Les 2 vaches framboise'),
(180, 'Yahourt Les 2 vaches myrtille bio');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_recette`
--

CREATE TABLE IF NOT EXISTS `ingredient_recette` (
  `idrecette` int(11) NOT NULL,
  `idingredient` int(11) NOT NULL,
  PRIMARY KEY (`idrecette`,`idingredient`),
  KEY `idingredient` (`idingredient`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredient_recette`
--

INSERT INTO `ingredient_recette` (`idrecette`, `idingredient`) VALUES
(1, 12),
(1, 62),
(1, 64),
(1, 75),
(1, 89),
(1, 97),
(1, 105),
(1, 124),
(1, 152),
(2, 3),
(2, 9),
(2, 31),
(2, 52),
(2, 75),
(2, 79),
(2, 117),
(2, 124),
(3, 3),
(3, 11),
(3, 30),
(3, 52),
(3, 79),
(3, 124),
(3, 152),
(3, 167),
(4, 38),
(4, 45),
(4, 58),
(4, 79),
(4, 87),
(4, 92),
(4, 107),
(4, 124),
(4, 133),
(4, 152),
(5, 14),
(5, 15),
(5, 16),
(5, 17),
(5, 27),
(5, 79),
(5, 90),
(5, 91),
(5, 108),
(5, 124),
(5, 152);

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `adresse` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lon` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `nom`, `adresse`, `lat`, `lon`, `type`) VALUES
(1, 'McDo', 'Rue de la Croix des Maheux, Centre Commercial 3 Fontaines, 95000 Cergy', 49.038628, 2.082510, 'fastfood'),
(2, 'Hippopotamus', '8 Avenue Jean Bart, 95000 Cergy', 49.031635, 2.061235, 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `partager`
--

CREATE TABLE IF NOT EXISTS `partager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDiv` varchar(500) NOT NULL,
  `titre` varchar(500) NOT NULL,
  `texte` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `partager`
--

INSERT INTO `partager` (`id`, `idDiv`, `titre`, `texte`, `image`) VALUES
(1, 'partager-ses-repas', 'Partager avec LoveYourCuisine', 'Faire d??couvrir nos talents culinaires \n', ''),
(2, 'block-partager-ses-repas', '', '1) Je pr??pare ?? l''aide d''une recette LoveYourCuisine plusieurs portions d''un plat. ', 'Images/share.jpg'),
(3, 'block-partager-ses-repas', '', '2) Informer via LoveYourCuisine qu''il y a possibilit?? de commander vos plats. ', 'Images/order.jpg'),
(4, 'block-partager-ses-repas', '', '3) Les plats command??s peuvent ??tre ?? r??cup??rer sur place dans des boxs LoveYourCuisine ou bien livr??s chez vous. ', 'Images/food.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profil_public`
--

CREATE TABLE IF NOT EXISTS `profil_public` (
  `idbloc` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `display` varchar(40) NOT NULL,
  PRIMARY KEY (`idbloc`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `profil_public`
--

INSERT INTO `profil_public` (`idbloc`, `nom`, `display`) VALUES
(1, 'perimetre_action', 'block'),
(2, 'panier', 'block'),
(3, 'plats', 'block'),
(4, 'repas', 'block'),
(5, 'temoignages', 'block');

-- --------------------------------------------------------

--
-- Table structure for table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `idrecette` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(60) NOT NULL,
  `idcategorie` int(10) NOT NULL,
  `presentation` varchar(100) NOT NULL,
  `photo` varchar(40) NOT NULL,
  `duree` varchar(40) NOT NULL,
  `preparation` varchar(4000) NOT NULL,
  `video` varchar(40) NOT NULL,
  `date_parution` varchar(5) NOT NULL,
  PRIMARY KEY (`idrecette`),
  KEY `idcategorie` (`idcategorie`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `recette`
--

INSERT INTO `recette` (`idrecette`, `titre`, `idcategorie`, `presentation`, `photo`, `duree`, `preparation`, `video`, `date_parution`) VALUES
(1, 'Tarte tomates-moutarde', 2, '', 'images/tarte_tomates.jpg', '', '', '', ''),
(2, 'P??tes champignons - lardons', 2, '', 'images/pates_champignons_lardons.jpg', '30 min', 'Mettre 1,5 L d''eau ?? bouiller, pour les p??tes\nEplucher les champignon, les couper en fines lamelles (10 min)\nEplucher les gousses d''ail, les couper en fines morceaux (3 min)\nMettre les pates dans l''eau bouillante, sal??e et huil??e\nChauffer l''huile dans une po??le (qui poss??de un couvercle, m??me s''il ne sert que plus tard) ; rajouter le bacon ??minc?? et faire cuire pendant 5 min ?? feu fort\nBaisser le feu ?? temp??rture moyenne ; rajouter les champignons, fermer le couvercle de la poelle ; faire cuire pendant 5 min ?? couvercle ferm??, en remuant de temps en temps\nRajouter la cr??me, l''ail, les herbes, sel et poivre ; faire mijoter pendant 5 minutes ?? couvercle ferm??\nPendant ce temps l??, ??goutter les p??tes ; rajouter un peu de beurre dans les p??tes ??goutt??es\n\nC''est fini !\n\nServir\n\nVous pouvez servir le plat chaut, en mettant une portion d''environ 160g de p??tes et une louche de sauce sur chaque assiette, ou r??server les pates et la sauce dans un r??cipient au r??frig??rateur (apr??s les avoir laiss?? refroidir), pour les servir plus tard ; astuce : r??chauffer les p??tes avec un peu d''huile dans un grande po??le et la sauce au micro-ondes, puis les servir comme indiqu?? ci-dessus ;\nLes p??tes en sauce sont id??ales pour faire du stock : elles se gardent 2-3 jours au frigo et se cong??le bien ; astuce : cong??lez dans des r??cipients d''une ou de deux portions ! Indiquez le nom du plat, le jour de la pr??paration et de la cong??lation sur le r??cipient\n', '', ''),
(3, 'Tortellini tomates-cr??me', 3, '', 'images/tortellini_tomates_creme.jpg', '', '', '', ''),
(4, 'Curry lentilles poulet', 2, '', 'images/curry_lentilles_poulet.jpg', '20 min', 'Couper, puis frire les oignons dans l''huile d''olive\nlaver les lentilles\nrajouter le curry aux oignons, laisser cuire 2 min., puis rajouter le lait de coco, la pulpe de tomates et 10 cl d''eau\nLaisser mijoter 3 min, puis rajouter les lentilles et continuer ?? laisser mijoter\nCouper la viande en moreaux, faire frire ?? la poile 5 - 10 min, puis rajouter aux lentilles\nFaire cuire le riz\n\nLaisser cuire au total 30 min, puis r??partisser le curry de lentilles sur les assiettes avec une louche de riz\nMettre un peu de jus de citron vert sur le curry de lentilles\n', '', '18/06'),
(5, 'Soupe de boeuf garnie', 1, '', 'images/soupe_de_boeuf_garnie.jpg', '20 min + 180 min', 'Couper l''ognion en petits d??s\nChaffer l''huile dans une grande casserolle et faire cuire l''ognion, ?? temp??rature forte, pendant 5 min ; il doit devenir sombre, sans bruler\nRemplir la casserolle d''eau froide\nRajouter la viande de soupe, la viande avec os et l''os ; rajouter sel, poivre, feuilles de laurier ; porter ?? ??boulition, puis baisser le feu et laisser cuire ?? feu doux pendant 3 heures\nCouper les l??gumes en petits morceaux, puis r??server dans un plat\n\nL''essentiel est fait ! Laisser cuire la soupe pendant 3 heures, ?? feu doux\n\nA la fin de la cuisson, sortir la viande de la soupe ; r??server sur une planche\nFiltrer le bouillon, puis le rajouter ?? la rasserolle\nRajouter les l??gumes et les boulettes de moelle, puis porter ?? ??boulition\nPendant ce temps l??, couper la viande en petits morceaux en enlevant les parties grasses\nUne fois la soupe port??e ?? ??boulition, enlever la casserolle du feu et rajouter les morceaux de viande\n\nVotre plat est termin?? !\n\n\nServir\n\nVous pouvez servir le plat chaut, ou laisser refroidir la soupe pour la servir dans les 2 - 3 jours qui suivent ; une fois refroidi, garder au r??frig??rateur ! Astuce : r??chauffer seulement les portions qui seront consomm??es, afin de pouvoir garder la soupe plus longtemps ;\nLa soupe en sauce sont id??ales pour faire du stock : elle se gard 2-3 jours au frigo et se cong??le bien ; astuce : cong??lez dans des r??cipients d''une ou de deux portions ! Indiquez le nom du plat, le jour de la pr??paration et de la cong??lation sur le r??cipient\n', '', '18/06'),
(6, 'Spaghetti bolognaise', 2, '', 'images/spaghetti_bolognese.jpg', '20 min', 'Faire buire de l''eau, puis rajouter un peu de sel, 10ml d''huile d''olive et les spagh??tti\nCouper les oignons et faire frire dans l''huile d''olive\nCouper les poivrons, rajouter aux oignons, puis rajouter la viande ; m??langer le tout et faire frire 5 min, juste ?? ce que la viande soit cuite\nRajouter la pulpe de tomates et l''aile coup?? en petits morceaux ; saler et poivrer\n\nEgoutter les spaghetti ; r??partissez sur les assiettes avec la sauce, et rajouter l''emmental rap??\n', '', '18/06'),
(7, 'Blanquette de veau', 3, '', 'images/blanquette_veau.jpg', '20 + 120 min', 'Couper les ognions en petits d??s\nChauffer l''huile et le beurre dans une marmite, rajouter les ognions et laisser cuire 2 min\nBaisser le feu ?? temp??rature moyenne, puis rajouter la viande et laisser cuire 10 min (attention ?? ce que la temp??rature ne soit pas trop importante, feu moyen seulement ; le veau est une viande fragile)\nPendant ce temps l??, ??plucher les carottes, couper tous les l??gumes en morceaux moyens (carottes et poireaux en rondelles, poivron en cubes)\nApr??s 10 min, sortir la viande de la marmite et la r??server dans un plat ?? part\nAjouter les l??gumes coup??es ?? la marmite, et les faire cuire ?? feu moyen pendant 5 min ; rajouter un peu d''huile si n??cessaire\nPendant ce temps l??, faire fondre le cube dans un meug d''eau bouillante\nRajouter le bouillon du cube aux l??gumes ; rajouter la viande ; si besoin, rajoutre de l''eau jusqu''?? ce que la viande soit quasiment couverte\nFaire cuire ?? feu moyen\n\nEplucher les pommes de terre et les couper en grands cubes ; les r??server dans un bol ou un tupperware jusqu''?? 30 min avant la fin de la cuisson\n\nC''est fini ! Le plat cuira tout seul pendant 2 heures\n30 minutes avant la fin de la cuisson, rajouter les cubes de pommes de terre\n\nServir\n\nVous pouvez servir le plat chaut, apr??s la cuisson de 2 heures, ou le r??chauffer le lendemain\nLa blanquette de veau est id??ale pour faire du stock : elle se garde 2-3 jours au frigo et se cong??le bien ; astuce : cong??lez dans des r??cipients d''une ou de deux portions ! Indiquez le nom du plat, le jour de la pr??paration et de la cong??lation sur le r??cipient\n', '', '18/06'),
(8, 'Risotto aux c??pes', 1, '', 'images/risotto_cepes.jpg', '20 min', 'R??hydrater les c??pes s??ch??s dans de l''eau chaude\nFaire fondre les 2 cubes dans 500ml d''eau bouillante\ncouper les ??chalottes et faire cuire dans de l''huile, dans une casserolle\nhacher l''ail et rajouter aux ??chalottes, avec les c??pes ; puis le vin\nfaire chauffer la cr??me et m??langer 1/3 des c??pes avec la cr??me chaude\nrajouter le riz dans la casserolle, faire frire 3 minutes, puis rajouter le bouillons et la cr??me en 3 ??tapes ; remuer et attendre que le riz boive la liquide, entre chaque ??tape\nquand le riz a bu l''essentiel du liquide et qu''il est suffisamment cuit, m??langer avec le parmeson, puis servir tout de suite\n', '', '18/06'),
(9, 'Rougail saucisse', 3, '', 'images/rougaille_saucisse.jpg', '20 min', 'R??hydrater les c??pes s??ch??s dans de l''eau chaude\nFaire fondre les 2 cubes dans 500ml d''eau bouillante\ncouper les ??chalottes et faire cuire dans de l''huile, dans une casserolle\nhacher l''ail et rajouter aux ??chalottes, avec les c??pes ; puis le vin\nfaire chauffer la cr??me et m??langer 1/3 des c??pes avec la cr??me chaude\nrajouter le riz dans la casserolle, faire frire 3 minutes, puis rajouter le bouillons et la cr??me en 3 ??tapes ; remuer et attendre que le riz boive la liquide, entre chaque ??tape\nquand le riz a bu l''essentiel du liquide et qu''il est suffisamment cuit, m??langer avec le parmeson, puis servir tout de suite\n', '', '25/06'),
(10, 'Gnocchi ?? la dinde', 2, '', 'images/gnocchi_dinde.jpg', '15 min', 'Mettre un litre d''eau ?? bouir pour les gnocchi\nCouper la carotte, l''ognion et les escaloppes de dinde en petits morceaux\nFaire chauffer l''huile dans une poele, puis rajouter les ognion ; faire cuire jusqu''?? ce qu''ils deviennent transparents, puis rajouter les carottes ; faire cuire 4 minutes, puis rajouter les morceaux de dinde\nFaire cuire 3 - 4 minutes le m??lange, puis rajouter la cr??me, les herbes, sel et poivre\nEgoutter les gnocchi, rajouter au m??lange\n\nVotre plat est pr??t !\n\nServir\n\nServir le plat directement, ou le laisser refroidir, puis rechausser dans une poelle avec un peu d''huile, ou au micro-ondes ; une fois refroidi, garder au r??frig??rateur ! Astuce : r??chauffer seulement les portions qui seront consomm??es, afin de pouvoir garder le plat plus longtemps ;\nLes gnocchi ?? la dinde sont id??al pour faire du stock : ils se gardent 2-3 jours au frigo et se rechauffent bien ; cong??lation ? A tester !!\n', '', '25/06'),
(11, 'Wok exotique', 1, '', 'images/wok_exotique.jpg', '15 min', '', '', '25/06'),
(12, 'Rostbeef ?? la moutarde', 3, '', 'images/rostbeef_moutarde.jpg', '', '', '', '25/06'),
(13, 'Truite aux amandes', 1, '', 'images/truite_aux_amandes.jpg', '', '', '', '25/06'),
(14, 'Blanquette de poisson', 3, '', 'images/blanquette_poisson.jpg', '25 + 20 min', '', '', '02/07'),
(15, 'Roti d''agneau', 3, '', 'images/roti_dagneau.jpg', '', '', '', '02/07'),
(16, 'Agneau curry-citron', 1, '', 'images/agneau_curry_citron.jpg', '', 'M??langer la cr??me, le curry, le jus de citron, le persil, sel et poivre pour faire une marinade\nCouper la viande en morceaux, m??langer avec la marinade et mariner pendant 15-20 min.\nCouper les ??chalotte et le gingembre.\nFrire les morceaux de viande dans de l''huile d''olive, dans une sauteuse, pendant ca. 10 min, en les retournant r??guli??rement.\nR??server la viande. Fire les ??chalottes et le gingembre, puis ajouter la mariade. Faire cuire ca. 3 minutes pour faire une sauce, laisser r??duire un peu.\nRajouter la viande et server avec du riz.\n', '', '02/07'),
(17, 'Tajine poulet ?? la marocaine', 3, '', 'images/tajine_de_poulet.jpg', '20 + 90 min', 'Retirer la peau du poulet (cuisses de poulet) : 3 min\nDorer les moreaux de poulet dans une grande marmite / poelle, avec 4 cuilleres ?? soupe d''huile d''olive\nPendant la cuisson du poulet, mettre les tomates dans de l''eau bouillante (avec la peau l??germent coup?? ?? deux endroits); laisser les remposer dans l''eau quelques minutes ; pendant ce temps l??, couper l''oignon en rondelles; puis retirer les tomates de l''eau, les peler et couper en d??s\nRetirer les moreaux de poulets d??s qu''ils sont bien dor??s, et faire cuire les rondelles d''oignon dans la craisse du poulet\nPendant la cuisson de l''oignon, peler et hacher les gousses d''ail et les m??lager avec les ??pices dans un bol\nCouper le citron et faire fondre le cube\nRajouter ?? la marmite le citron, les tomates, les morceaux de poulet, le m??lange d''??pice ?? la cocotte, le cube fondu, le miel, les raisins et les poids chiches\nRajouter sel, pouvre, puis m??langer !\n\nLaisser mijoter 90 minutes (sur le feu doux ou au four ?? 150??C)\n', '', '02/07'),
(18, 'Pintade au curcuma', 2, '', 'images/poulet_fermier.jpg', '20 + 30 min', 'Mettre les pommes de terre ?? cuire ?? la vapeur\nCouper le curcuma en tout petits morceaux, puis faire revenir dans la cocotte, avec du beurre et les morceaux de pintade\nrajouter le vin et le sel, puis laisser mijoter pendant 20 min\nCouper les navets en d??s, et faire cuire avec du beurre dans une poelle\nPendant la cuisson, presser l''orange et le citron vert ; couper les ??chalottes en moreaux fins\nUne fois les navets cuits, les sortir de la poelle et r??server ; faire fondre du beurre dans la poelle, rajouter le sucre, caram??liser, puis rajouter les navets cuits et m??langer\nApr??s la cuisson de la pintade, sortir les moreaux et r??server dans du papier alu ; r??server le jus de la cuisson dans un bol, puis faire cuire les ??chalottes dans la poelle ; verser le Noilly Prat et laisser cuire 3 min ; puis rajouter les jus de fruits et le jus de cuisson ; faire r??duire de moiti??, puis rajouter la cr??me\nServir la pintade, avec la sauce, les navets et pommes de terre\n', '', '02/07'),
(19, 'Wok exotique', 1, '', 'images/wok_exotique.jpg', '15 min', '', '', '09/07'),
(20, 'Rostbeef ?? la moutarde', 3, '', 'images/rostbeef_moutarde.jpg', '', '', '', '09/07'),
(21, 'Truite aux amandes', 1, '', 'images/truite_aux_amandes.jpg', '', '', '', '09/07'),
(22, 'Blanquette de poisson', 3, '', 'images/blanquette_poisson.jpg', '25 + 20 min', '', '', '09/07'),
(23, 'Roti d''agneau', 3, '', 'images/roti_dagneau.jpg', '', '', '', '09/07');

-- --------------------------------------------------------

--
-- Table structure for table `recette_a_vendre`
--

CREATE TABLE IF NOT EXISTS `recette_a_vendre` (
  `idavendre` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `prix` int(10) NOT NULL,
  `portions` int(10) NOT NULL,
  `lieu` varchar(40) NOT NULL,
  `date` varchar(40) NOT NULL,
  `horaire` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  PRIMARY KEY (`idavendre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temoignage`
--

CREATE TABLE IF NOT EXISTS `temoignage` (
  `idTemoignage` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `utilisateur_not??` varchar(40) NOT NULL,
  `note` varchar(15) NOT NULL,
  `texte` varchar(4000) NOT NULL,
  PRIMARY KEY (`idTemoignage`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `temoignage`
--

INSERT INTO `temoignage` (`idTemoignage`, `titre`, `image`, `prenom`, `nom`, `utilisateur_not??`, `note`, `texte`) VALUES
(1, 'Ils ont essay?? !', '', '', '', '', '', ''),
(7, 'titre', 'image', 'Delphine', 'Lubineau', 'Gabzilla', '4/5', 'C''??tait parfait !');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `identifiant` varchar(40) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `code` varchar(40) NOT NULL,
  `ville` varchar(40) NOT NULL,
  `tel` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `age` int(11) NOT NULL,
  `nbpersonne` int(11) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `typeUtilisateur` varchar(18) NOT NULL,
  `admin` varchar(5) NOT NULL,
  PRIMARY KEY (`idutilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `nom`, `prenom`, `identifiant`, `mdp`, `adresse`, `code`, `ville`, `tel`, `mail`, `age`, `nbpersonne`, `photo`, `typeUtilisateur`, `admin`) VALUES
(1, 'Lubineau', 'Delphine', 'D??d??', 'dede', '15 Boulevard du port', '95000', 'Cergy', '0781348662', 'ludineaude@eisti.eu', 20, 3, '', 'utilisateur simple', 'true'),
(2, 'Pham', 'L??a', 'Uquolia', 'p??n??lope', '21 Rue de la Boustifaille', '9212', 'Montrouge', '0616410553', 'phamlea@eisti.eu', 20, 4, '', 'utilisateur simple', 'false'),
(3, 'Cessac', 'P??n??lope', 'Plop', 'motdepasse', '15 Boulevard du port', '95000', 'Cergy', '0651450971', 'cessacpene@eisti.eu', 19, 3, '', 'utilisateur simple', 'false'),
(4, 'Rembusch', 'Gabrielle', 'Gabzilla', 'password', '8 all??e Georges Brassens', '78260', 'Ach??res', '0695530845', 'rembuschga@eisti.eu', 20, 4, '', 'utilisateur simple', 'false'),
(5, 'Meziani', 'Axel', 'Ax', 'axel', '3 rue Lebon', '95000', 'Cergy', '0651592893', 'mezianiaxe@eisti.eu', 19, 1, '', 'utilisateur simple', 'false'),
(6, '', 'Roselyne', 'rosie', 'rosie', '96 rue de Clery', '75002', 'Paris', '0174649796', 'hello@chefing.fr', 31, 3, '../Inscription/photo_profil/roselynePhoto.png', 'cuisto', 'false'),
(7, '', 'Latifa', 'Aka', 'aka', '26 Rue des Galeries', '95000', 'Cergy', '0174649796', 'hello@chefing.fr', 27, 2, '../Inscription/photo_profil/LatifaPhoto.png', 'cuisto', 'false'),
(8, '', 'Aneliz', 'Anie', 'chefing', '8 Bis Avenue De Saint Germain', '78600', 'Maisons-Laffitte', '0174649796', 'hello@chefing.fr', 24, 2, '../Inscription/photo_profil/AnelizPhoto.png', 'cuisto', 'false'),
(9, '', 'Thomas', 'TimTom', 'tommy', '2 Place de la D??fense', '92800', 'Puteaux', '0174649796', 'hello@chefing.fr', 33, 5, '../Inscription/photo_profil/thomasPhoto.png', 'cuisto', 'false'),
(10, '', 'Hicham', 'Chichi', 'chocho', '10 all??e Georges Brassens', '78260', 'Ach??res', '01 49 06 46 50', 'hello@chefing.fr', 28, 3, '../Inscription/photo_profil/hichamPhoto.png', 'cuisto', 'false');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuisto`
--
ALTER TABLE `cuisto`
  ADD CONSTRAINT `Cuisto_ibfk_1` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
