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
(1, 'raffinée'),
(2, 'économe'),
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
(1, 'commander-plat', 'Commander un plat sur LoveYourCuisine :', 'C''est délicieux et préparé avec amour', ''),
(2, 'commander-plat', '', '1) Je commande un repas fait maison à proximité de chez moi.', 'Images/repasMaison.jpg'),
(3, 'commander-plat', '', '2) Je récupère mon repas chez le cuisto, mon magasin bio ou bien je me fais livrer.', 'Images/recupere.jpg'),
(4, 'commander-plat', '', '3) Je déguste un repas délicieux et fait maison.', 'Images/deguste.jpg');

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
(1, 6, 'Roselyne est passionnée de cuisine depuis toujours et a lancé son activité de traiteur Indépendant il y a 3 ans. Elle a passé son CAP de cuisine et de pâtisserie, et a notamment pu être formée dans la célèbre école de cuisine Ferrandi.  Roselyne aime avant tout cuisiner des produits de qualité. Poissons, viandes, fruits légumes… pour chaque ingrédient, elle a son producteur ou son fournisseur préféré. Un de ses plus grand plaisir : voir les sourires les gourmands quand ils goutent sa tarte à la Maracudja (fruits de la passion) venant directement de sa Guyane natale !', './Images/RoselyneSpe1.jpg', './Images/RoselyneSpe2.jpg', './Images/RoselyneSpe3.jpg', './Images/RoselyneSpe4.jpg'),
(2, 7, 'Latifa est passionnée de cuisine depuis sa tendre enfance. Après l''école, pendant que ses copains jouaient, elle restait dans sa cuisine pour tester les recettes de gâteaux qu''elle avait dessinés dans son cahier. Aujourd''hui, vous pourrez encore la voir esquisser ses créations avant de passer au fourneau...  Après avoir régalé ses amis pendant 20 ans et testé des centaines de crecettes de patisseries, elle s''est lancée dans son activité de Traiteur Indépendante il y a 7 ans pour le plaisir d''inconnus. Car dans la cuisine de Latifa, le goût est essentiel. Elle cultive elle-même une partie des légumes et aromates qu''elle travaille, et complète sa production avec des fruits et légumes qu''elle récolte chez des producteurs en agriculture bio ou raisonnée. Latifa aime revisiter les classiques, en s’inspirant de ses nombreux voyages de part et d’autre de la Méditerranée, et vous propose une cuisine qui invite au partage et à la découverte.', './Images/LatifaSpe1.jpg', './Images/LatifaSpe2.jpg', './Images/LatifaSpe3.jpg', './Images/LatifaSpe4.jpg'),
(3, 8, 'Aneliz a appris à cuisiner dans la cuisine de sa mère, dans son Sud Ouest natal. Depuis plus de 40 ans, les couleurs et saveurs ensoleillées de sa région se retrouvent dans nombre de ses plats, pour le plaisir des plus gourmands.  Passionnée de cuisine depuis toujours, Aneliz a multiplié les cours de cuisine auprès des plus grands Chefs avant de lancer, il y a 4 ans, son activité de Traiteur Indépendant. Son plus grand plaisir : aller dénicher les meilleurs fruits et légumes dans les AMAP, et les (re)travailler à sa façon, afin de faire découvrir tout son savoir-faire à travers des recettes simples et raffinées, qui s''adaptent particulièrement aux déjeuners et aux dîners entre amis.', './Images/AnelizSpe1.png', './Images/AnelizSpe2.jpg', './Images/AnelizSpe3.jpg', './Images/AnelizSpe4.jpg'),
(4, 9, 'Thomas cuisine depuis ''30 ans''... Quand vous verrez son sourire de jeune papa trentenaire, vous comprendrez qu''il cuisine depuis toujours ! Sa mamie lui a tout enseigné dans son Sud Ouest natal, et ça se devine dans sa cuisine généreuse et familiale. Titulaire d''un CAP cuisine, Thomas est devenu Traiteur Indépendant il y a 5 ans. Il aime cuisiner des produits de qualité, travaille toujours des produits de saison, et se fournit directement chez les petits producteurs. Il privilégie les circuits courts et les fournisseurs locaux.', './Images/thomasSpe1.jpg', './Images/thomasSpe2.jpg', './Images/thomasSpe3.jpg', './Images/thomasSpe4.jpg'),
(5, 10, 'Hicham a toujours été passionné de cuisine. Il doit à sa mère son goût pour les saveurs et pour l''esthétique ! Dès son plus jeune page, il lui disait d''ailleurs qu''il souhaitait en faire son métier... Hicham a bien grandi depuis et est devenu Traiteur Indépendant il y a déjà 12 ans. 12 années remplies de passion qui lui ont permis d''être aujourd''hui reconnu pour sa rigueur et son originalité.  Pour être certain de proposer des recettes soignées et de qualité, Hicham se fournit chez son maraîcher de toujours. Il y a ses habitudes et ses fournisseurs lui réservent des produits d''exception. Hicham aime la liberté et l''esthétisme en cuisine. Qu''elles soient salées ou sucrées, vous dégusterez des pièces aussi belles que goûteuses ! Alors, laissez-vous surprendre par sa créativité.', './Images/hichamSpe1.jpg', './Images/hichamSpe2.jpg', './Images/hichamSpe3.jpg', './Images/hichamSpe4.jpg');

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
(1, 'explication', 'Pourquoi choisir LoveYourCuisine ?', 'Nous avons toujours pensé que bien manger était une des choses les plus importantes dans la vie. Et pourtant, comme tout le monde, on se retrouvait chaque soir à ne pas savoir quoi faire à manger, à nous résigner à préparer toujours la même chose, et à parfois tomber dans la facilité de la malbouffe... C''est pour cela que l''on s''est dit qu''il fallait inventer une nouvelle façon de préparer à manger à la maison. Alors, nous avons créé LoveYourCuisine');

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
(3, 'faire-manger', '', '2) Je récupère mes ingrédients dans mon magasin bio préféré', 'Images/legumes.jpg'),
(4, 'faire-manger', '', '3) Je cuisine en 20 min un plat délicieux et raffiné ', 'Images/plat.jpg');

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
(1, '4 épices (mélange)'),
(2, 'Agneau (roti)'),
(3, 'Ail Crac Espagne'),
(4, 'Ail Sec (vrac)'),
(5, 'Amandes Blanche poudre (en vrac)'),
(6, 'Amandes complètes en poudre (bio)'),
(7, 'Amandes entières blanches (vrac)'),
(8, 'Arome Framboise 60ml'),
(9, 'Bacon émincé (Fleury Michon)'),
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
(21, 'Café Pérou Grains (Vrac)'),
(22, 'Café Tresor des Peuple Grains'),
(23, 'Camembert Président bio'),
(24, 'Canelle en poudre (bio)'),
(25, 'Capres bio (vinaigre)'),
(26, 'Carottes bio'),
(27, 'Carottes lavées bio'),
(28, 'Céléri branche (bio)'),
(29, 'Cêpes déshydratées (30g)'),
(30, 'Chair de tomates bio (Auchan bio)'),
(31, 'Champignon Blanc Paris'),
(32, 'Champignon Blond'),
(33, 'Chips nature bio (huile de tournesol)'),
(34, 'Chocolat noire dessert (56%)'),
(35, 'Ciboulette bio surgelé (Darégal)'),
(36, 'Cidre doux Briard bio (Seine et Marne)'),
(37, 'Citron jaune bio'),
(38, 'Citron vert'),
(39, 'Colorants alimentaires'),
(40, 'Compote de pommes'),
(41, 'Compote de pommes'),
(42, 'Compote de pommes (allégée en suc)'),
(43, 'Concombre'),
(44, 'Confiture Framboise 370g'),
(45, 'Coriandre'),
(46, 'Cornichon (vinaigre)'),
(47, 'Cote de porc (première)'),
(48, 'Coulommiers (Auchan bio)'),
(49, 'Courgette'),
(50, 'Crème fleurette (30%MG)'),
(51, 'Crème fraiche épaisse (30%MG)'),
(52, 'Crème liquide Auchan Bio (3 x 20cl)'),
(53, 'Crèmes vache légère (15% MG UHT, 3 crèmes)'),
(54, 'Cube Legume (6 cubes ; 60g)'),
(55, 'Cube légumes dégraissé (9 x 10g)'),
(56, 'Cumin moulu (poudre)'),
(57, 'Curcuma frais bio'),
(58, 'Curry Poudre (35g)'),
(59, 'Dinde (escaloppe)'),
(60, 'Echalottes'),
(61, 'Emmental rapé (100g - 29%MG)'),
(62, 'Emmental rapé (200g)'),
(63, 'Emmental rapé 29%MG (100g)'),
(64, 'Farine de blé T55 (1kg)'),
(65, 'Flans au caramel'),
(66, 'Flocons d Avoine Sans Gluten'),
(67, 'Fromage à la coupe - Cantal entre deux AOP'),
(68, 'Fromage à la coupe - Douceur du Tarn (26%MG)'),
(69, 'Fromage à la coupe - Le Grand Ribeaupierre'),
(70, 'Gingembre frais bio'),
(71, 'Gnocchi'),
(72, 'Gressin Epautre Pur (125g)'),
(73, 'Gruyere (240g)'),
(74, 'Haricots verts bio (surgelé Picard)'),
(75, 'Herbes de provence bio'),
(76, 'Huile Coco (20cl)'),
(77, 'Huile de tournesol Desodorisée'),
(78, 'Huile d Olive 3L BJP (Biovenue)'),
(79, 'Huile d Olive Vierge Extra 75'),
(80, 'Jambon blanc (4 tranches)'),
(81, 'Jus de Mandarine (1L)'),
(82, 'Jus d orange Tetra (1,5L)'),
(83, 'La Salvetat (6x1,25l)'),
(84, 'Lait (Bio Alpenmilch)'),
(85, 'Lait bio 1/2 écrémé'),
(86, 'Lait de coco (225 ml, Le Jardin bio)'),
(87, 'Lait de coco (400ml)'),
(88, 'Lardon nature bio (Bonjour Campagne)'),
(89, 'Lardons fumés (Auchan bio)'),
(90, 'Laurier (feuilles)'),
(91, 'Légumes pour soupe (carotte, sélérie, poireau)'),
(92, 'Lentilles vertes bio - Jardin bio'),
(93, 'Levure Boulagère Fraiche (cube)'),
(94, 'Liquide Vaisselle Citron (500ml)'),
(95, 'Mandarines'),
(96, 'Miel d acacia (bio)'),
(97, 'Moutarde de Dijon bio (200g)'),
(98, 'Navets'),
(99, 'Nectar de Goyave (Sirop Agave)'),
(100, 'Noilly Prat'),
(101, 'Noix de cajou bio grillés et salées (Equitable)'),
(102, 'Noix Seche'),
(103, 'Œufs (10) - Carrefour bio'),
(104, 'Œufs (10) CAL 53/63 Moyen'),
(105, 'Œufs (6) Cal 63/73 Gros'),
(106, 'Œufs fermier bio (6) - Cocorette'),
(107, 'Oignon bio Auchan (143g/oignon)'),
(108, 'Oignon jaune (bio)'),
(109, 'Oranges'),
(110, 'Pain complet (400g)'),
(111, 'Pain complet au 3 céréales ; Bjorg (500g)'),
(112, 'Pain complet seigle epeautre'),
(113, 'Panais'),
(114, 'Paprika doux (Cook)'),
(115, 'Parmesan reggiano'),
(116, 'Patate douce'),
(117, 'Pâtes Fusilli Express (Jardin Bio)'),
(118, 'Pennette bio (Barilla)'),
(119, 'Persil Plat (18g)'),
(120, 'Piment d Espelette (Puréé)'),
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
(131, 'Pommes de terre bio (non lavées)'),
(132, 'Poulet (cuisses)'),
(133, 'Poulet (filets)'),
(134, 'Poulet entier'),
(135, 'Poulet noir fermier bio (filets)'),
(136, 'Pulpe de tomates'),
(137, 'Pur jus d orange (Auchan bio)'),
(138, 'Pyramide Chêvre (Auchan bio)'),
(139, 'Raisins secs '),
(140, 'Raisins secs (Thompson bio)'),
(141, 'Raviolis aux Aubergines'),
(142, 'Riz Basmati bio (Priméal, 500g)'),
(143, 'Riz Basmati bio demi-complet (Vrac)'),
(144, 'Riz long Risotto'),
(145, 'Rostbeef'),
(146, 'Safran moulu (Cook)'),
(147, 'Salade'),
(148, 'Sauce Soja (Shoyu Classique 145ml)'),
(149, 'Saucisses pour Rougail (type Montbéliard)'),
(150, 'Saucisson Sec Pur Porc (200g)'),
(151, 'Saumon bio'),
(152, 'Sel de Gérande (0,5 kg)'),
(153, 'Semoule couscous'),
(154, 'Sesame Blond complet (250g)'),
(155, 'Spaghetti (Monoprix bio, 500g)'),
(156, 'St Hubert bio'),
(157, 'St Hubert bio'),
(158, 'Steaks hachés (pur bœuf, 100% muscle)'),
(159, 'Sticks et bretzels bio'),
(160, 'Sucre de canne blond (750g)'),
(161, 'Sucre glace bio - Jean Hervé'),
(162, 'Sucre vanillé - Alter Eco (Madagascar coop KOMEM) (bio)'),
(163, 'The noir Breakfast Ceylan 20'),
(164, 'Thym bio (50g - Herbier de France)'),
(165, 'Tomates concassées (400g)'),
(166, 'Tomates ronde bio'),
(167, 'Tortelloni Epinard Pignons'),
(168, 'Truite filet'),
(169, 'Veau (blanquette)'),
(170, 'Veau (escaloppe)'),
(171, 'Veau (pavé à griller)'),
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
(1, 'partager-ses-repas', 'Partager avec LoveYourCuisine', 'Faire découvrir nos talents culinaires \n', ''),
(2, 'block-partager-ses-repas', '', '1) Je prépare à l''aide d''une recette LoveYourCuisine plusieurs portions d''un plat. ', 'Images/share.jpg'),
(3, 'block-partager-ses-repas', '', '2) Informer via LoveYourCuisine qu''il y a possibilité de commander vos plats. ', 'Images/order.jpg'),
(4, 'block-partager-ses-repas', '', '3) Les plats commandés peuvent être à récupérer sur place dans des boxs LoveYourCuisine ou bien livrés chez vous. ', 'Images/food.jpg');

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
(2, 'Pâtes champignons - lardons', 2, '', 'images/pates_champignons_lardons.jpg', '30 min', 'Mettre 1,5 L d''eau à bouiller, pour les pâtes\nEplucher les champignon, les couper en fines lamelles (10 min)\nEplucher les gousses d''ail, les couper en fines morceaux (3 min)\nMettre les pates dans l''eau bouillante, salée et huilée\nChauffer l''huile dans une poèle (qui possède un couvercle, même s''il ne sert que plus tard) ; rajouter le bacon émincé et faire cuire pendant 5 min à feu fort\nBaisser le feu à tempérture moyenne ; rajouter les champignons, fermer le couvercle de la poelle ; faire cuire pendant 5 min à couvercle fermé, en remuant de temps en temps\nRajouter la crème, l''ail, les herbes, sel et poivre ; faire mijoter pendant 5 minutes à couvercle fermé\nPendant ce temps là, égoutter les pâtes ; rajouter un peu de beurre dans les pâtes égouttées\n\nC''est fini !\n\nServir\n\nVous pouvez servir le plat chaut, en mettant une portion d''environ 160g de pâtes et une louche de sauce sur chaque assiette, ou réserver les pates et la sauce dans un récipient au réfrigérateur (après les avoir laissé refroidir), pour les servir plus tard ; astuce : réchauffer les pâtes avec un peu d''huile dans un grande poèle et la sauce au micro-ondes, puis les servir comme indiqué ci-dessus ;\nLes pâtes en sauce sont idéales pour faire du stock : elles se gardent 2-3 jours au frigo et se congèle bien ; astuce : congélez dans des récipients d''une ou de deux portions ! Indiquez le nom du plat, le jour de la préparation et de la congélation sur le récipient\n', '', ''),
(3, 'Tortellini tomates-crème', 3, '', 'images/tortellini_tomates_creme.jpg', '', '', '', ''),
(4, 'Curry lentilles poulet', 2, '', 'images/curry_lentilles_poulet.jpg', '20 min', 'Couper, puis frire les oignons dans l''huile d''olive\nlaver les lentilles\nrajouter le curry aux oignons, laisser cuire 2 min., puis rajouter le lait de coco, la pulpe de tomates et 10 cl d''eau\nLaisser mijoter 3 min, puis rajouter les lentilles et continuer à laisser mijoter\nCouper la viande en moreaux, faire frire à la poile 5 - 10 min, puis rajouter aux lentilles\nFaire cuire le riz\n\nLaisser cuire au total 30 min, puis répartisser le curry de lentilles sur les assiettes avec une louche de riz\nMettre un peu de jus de citron vert sur le curry de lentilles\n', '', '18/06'),
(5, 'Soupe de boeuf garnie', 1, '', 'images/soupe_de_boeuf_garnie.jpg', '20 min + 180 min', 'Couper l''ognion en petits dés\nChaffer l''huile dans une grande casserolle et faire cuire l''ognion, à température forte, pendant 5 min ; il doit devenir sombre, sans bruler\nRemplir la casserolle d''eau froide\nRajouter la viande de soupe, la viande avec os et l''os ; rajouter sel, poivre, feuilles de laurier ; porter à éboulition, puis baisser le feu et laisser cuire à feu doux pendant 3 heures\nCouper les légumes en petits morceaux, puis réserver dans un plat\n\nL''essentiel est fait ! Laisser cuire la soupe pendant 3 heures, à feu doux\n\nA la fin de la cuisson, sortir la viande de la soupe ; réserver sur une planche\nFiltrer le bouillon, puis le rajouter à la rasserolle\nRajouter les légumes et les boulettes de moelle, puis porter à éboulition\nPendant ce temps là, couper la viande en petits morceaux en enlevant les parties grasses\nUne fois la soupe portée à éboulition, enlever la casserolle du feu et rajouter les morceaux de viande\n\nVotre plat est terminé !\n\n\nServir\n\nVous pouvez servir le plat chaut, ou laisser refroidir la soupe pour la servir dans les 2 - 3 jours qui suivent ; une fois refroidi, garder au réfrigérateur ! Astuce : réchauffer seulement les portions qui seront consommées, afin de pouvoir garder la soupe plus longtemps ;\nLa soupe en sauce sont idéales pour faire du stock : elle se gard 2-3 jours au frigo et se congèle bien ; astuce : congélez dans des récipients d''une ou de deux portions ! Indiquez le nom du plat, le jour de la préparation et de la congélation sur le récipient\n', '', '18/06'),
(6, 'Spaghetti bolognaise', 2, '', 'images/spaghetti_bolognese.jpg', '20 min', 'Faire buire de l''eau, puis rajouter un peu de sel, 10ml d''huile d''olive et les spaghétti\nCouper les oignons et faire frire dans l''huile d''olive\nCouper les poivrons, rajouter aux oignons, puis rajouter la viande ; mélanger le tout et faire frire 5 min, juste à ce que la viande soit cuite\nRajouter la pulpe de tomates et l''aile coupé en petits morceaux ; saler et poivrer\n\nEgoutter les spaghetti ; répartissez sur les assiettes avec la sauce, et rajouter l''emmental rapé\n', '', '18/06'),
(7, 'Blanquette de veau', 3, '', 'images/blanquette_veau.jpg', '20 + 120 min', 'Couper les ognions en petits dés\nChauffer l''huile et le beurre dans une marmite, rajouter les ognions et laisser cuire 2 min\nBaisser le feu à température moyenne, puis rajouter la viande et laisser cuire 10 min (attention à ce que la température ne soit pas trop importante, feu moyen seulement ; le veau est une viande fragile)\nPendant ce temps là, éplucher les carottes, couper tous les légumes en morceaux moyens (carottes et poireaux en rondelles, poivron en cubes)\nAprès 10 min, sortir la viande de la marmite et la réserver dans un plat à part\nAjouter les légumes coupées à la marmite, et les faire cuire à feu moyen pendant 5 min ; rajouter un peu d''huile si nécessaire\nPendant ce temps là, faire fondre le cube dans un meug d''eau bouillante\nRajouter le bouillon du cube aux légumes ; rajouter la viande ; si besoin, rajoutre de l''eau jusqu''à ce que la viande soit quasiment couverte\nFaire cuire à feu moyen\n\nEplucher les pommes de terre et les couper en grands cubes ; les réserver dans un bol ou un tupperware jusqu''à 30 min avant la fin de la cuisson\n\nC''est fini ! Le plat cuira tout seul pendant 2 heures\n30 minutes avant la fin de la cuisson, rajouter les cubes de pommes de terre\n\nServir\n\nVous pouvez servir le plat chaut, après la cuisson de 2 heures, ou le réchauffer le lendemain\nLa blanquette de veau est idéale pour faire du stock : elle se garde 2-3 jours au frigo et se congèle bien ; astuce : congélez dans des récipients d''une ou de deux portions ! Indiquez le nom du plat, le jour de la préparation et de la congélation sur le récipient\n', '', '18/06'),
(8, 'Risotto aux cêpes', 1, '', 'images/risotto_cepes.jpg', '20 min', 'Réhydrater les cêpes séchés dans de l''eau chaude\nFaire fondre les 2 cubes dans 500ml d''eau bouillante\ncouper les échalottes et faire cuire dans de l''huile, dans une casserolle\nhacher l''ail et rajouter aux échalottes, avec les cêpes ; puis le vin\nfaire chauffer la crème et mélanger 1/3 des cêpes avec la crème chaude\nrajouter le riz dans la casserolle, faire frire 3 minutes, puis rajouter le bouillons et la crème en 3 étapes ; remuer et attendre que le riz boive la liquide, entre chaque étape\nquand le riz a bu l''essentiel du liquide et qu''il est suffisamment cuit, mélanger avec le parmeson, puis servir tout de suite\n', '', '18/06'),
(9, 'Rougail saucisse', 3, '', 'images/rougaille_saucisse.jpg', '20 min', 'Réhydrater les cêpes séchés dans de l''eau chaude\nFaire fondre les 2 cubes dans 500ml d''eau bouillante\ncouper les échalottes et faire cuire dans de l''huile, dans une casserolle\nhacher l''ail et rajouter aux échalottes, avec les cêpes ; puis le vin\nfaire chauffer la crème et mélanger 1/3 des cêpes avec la crème chaude\nrajouter le riz dans la casserolle, faire frire 3 minutes, puis rajouter le bouillons et la crème en 3 étapes ; remuer et attendre que le riz boive la liquide, entre chaque étape\nquand le riz a bu l''essentiel du liquide et qu''il est suffisamment cuit, mélanger avec le parmeson, puis servir tout de suite\n', '', '25/06'),
(10, 'Gnocchi à la dinde', 2, '', 'images/gnocchi_dinde.jpg', '15 min', 'Mettre un litre d''eau à bouir pour les gnocchi\nCouper la carotte, l''ognion et les escaloppes de dinde en petits morceaux\nFaire chauffer l''huile dans une poele, puis rajouter les ognion ; faire cuire jusqu''à ce qu''ils deviennent transparents, puis rajouter les carottes ; faire cuire 4 minutes, puis rajouter les morceaux de dinde\nFaire cuire 3 - 4 minutes le mélange, puis rajouter la crème, les herbes, sel et poivre\nEgoutter les gnocchi, rajouter au mélange\n\nVotre plat est prêt !\n\nServir\n\nServir le plat directement, ou le laisser refroidir, puis rechausser dans une poelle avec un peu d''huile, ou au micro-ondes ; une fois refroidi, garder au réfrigérateur ! Astuce : réchauffer seulement les portions qui seront consommées, afin de pouvoir garder le plat plus longtemps ;\nLes gnocchi à la dinde sont idéal pour faire du stock : ils se gardent 2-3 jours au frigo et se rechauffent bien ; congélation ? A tester !!\n', '', '25/06'),
(11, 'Wok exotique', 1, '', 'images/wok_exotique.jpg', '15 min', '', '', '25/06'),
(12, 'Rostbeef à la moutarde', 3, '', 'images/rostbeef_moutarde.jpg', '', '', '', '25/06'),
(13, 'Truite aux amandes', 1, '', 'images/truite_aux_amandes.jpg', '', '', '', '25/06'),
(14, 'Blanquette de poisson', 3, '', 'images/blanquette_poisson.jpg', '25 + 20 min', '', '', '02/07'),
(15, 'Roti d''agneau', 3, '', 'images/roti_dagneau.jpg', '', '', '', '02/07'),
(16, 'Agneau curry-citron', 1, '', 'images/agneau_curry_citron.jpg', '', 'Mélanger la crème, le curry, le jus de citron, le persil, sel et poivre pour faire une marinade\nCouper la viande en morceaux, mélanger avec la marinade et mariner pendant 15-20 min.\nCouper les échalotte et le gingembre.\nFrire les morceaux de viande dans de l''huile d''olive, dans une sauteuse, pendant ca. 10 min, en les retournant régulièrement.\nRéserver la viande. Fire les échalottes et le gingembre, puis ajouter la mariade. Faire cuire ca. 3 minutes pour faire une sauce, laisser réduire un peu.\nRajouter la viande et server avec du riz.\n', '', '02/07'),
(17, 'Tajine poulet à la marocaine', 3, '', 'images/tajine_de_poulet.jpg', '20 + 90 min', 'Retirer la peau du poulet (cuisses de poulet) : 3 min\nDorer les moreaux de poulet dans une grande marmite / poelle, avec 4 cuilleres à soupe d''huile d''olive\nPendant la cuisson du poulet, mettre les tomates dans de l''eau bouillante (avec la peau légerment coupé à deux endroits); laisser les remposer dans l''eau quelques minutes ; pendant ce temps là, couper l''oignon en rondelles; puis retirer les tomates de l''eau, les peler et couper en dés\nRetirer les moreaux de poulets dès qu''ils sont bien dorés, et faire cuire les rondelles d''oignon dans la craisse du poulet\nPendant la cuisson de l''oignon, peler et hacher les gousses d''ail et les mélager avec les épices dans un bol\nCouper le citron et faire fondre le cube\nRajouter à la marmite le citron, les tomates, les morceaux de poulet, le mélange d''épice à la cocotte, le cube fondu, le miel, les raisins et les poids chiches\nRajouter sel, pouvre, puis mélanger !\n\nLaisser mijoter 90 minutes (sur le feu doux ou au four à 150°C)\n', '', '02/07'),
(18, 'Pintade au curcuma', 2, '', 'images/poulet_fermier.jpg', '20 + 30 min', 'Mettre les pommes de terre à cuire à la vapeur\nCouper le curcuma en tout petits morceaux, puis faire revenir dans la cocotte, avec du beurre et les morceaux de pintade\nrajouter le vin et le sel, puis laisser mijoter pendant 20 min\nCouper les navets en dés, et faire cuire avec du beurre dans une poelle\nPendant la cuisson, presser l''orange et le citron vert ; couper les échalottes en moreaux fins\nUne fois les navets cuits, les sortir de la poelle et réserver ; faire fondre du beurre dans la poelle, rajouter le sucre, caraméliser, puis rajouter les navets cuits et mélanger\nAprès la cuisson de la pintade, sortir les moreaux et réserver dans du papier alu ; réserver le jus de la cuisson dans un bol, puis faire cuire les échalottes dans la poelle ; verser le Noilly Prat et laisser cuire 3 min ; puis rajouter les jus de fruits et le jus de cuisson ; faire réduire de moitié, puis rajouter la crème\nServir la pintade, avec la sauce, les navets et pommes de terre\n', '', '02/07'),
(19, 'Wok exotique', 1, '', 'images/wok_exotique.jpg', '15 min', '', '', '09/07'),
(20, 'Rostbeef à la moutarde', 3, '', 'images/rostbeef_moutarde.jpg', '', '', '', '09/07'),
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
  `utilisateur_noté` varchar(40) NOT NULL,
  `note` varchar(15) NOT NULL,
  `texte` varchar(4000) NOT NULL,
  PRIMARY KEY (`idTemoignage`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `temoignage`
--

INSERT INTO `temoignage` (`idTemoignage`, `titre`, `image`, `prenom`, `nom`, `utilisateur_noté`, `note`, `texte`) VALUES
(1, 'Ils ont essayé !', '', '', '', '', '', ''),
(7, 'titre', 'image', 'Delphine', 'Lubineau', 'Gabzilla', '4/5', 'C''était parfait !');

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
(1, 'Lubineau', 'Delphine', 'Dédé', 'dede', '15 Boulevard du port', '95000', 'Cergy', '0781348662', 'ludineaude@eisti.eu', 20, 3, '', 'utilisateur simple', 'true'),
(2, 'Pham', 'Léa', 'Uquolia', 'pénélope', '21 Rue de la Boustifaille', '9212', 'Montrouge', '0616410553', 'phamlea@eisti.eu', 20, 4, '', 'utilisateur simple', 'false'),
(3, 'Cessac', 'Pénélope', 'Plop', 'motdepasse', '15 Boulevard du port', '95000', 'Cergy', '0651450971', 'cessacpene@eisti.eu', 19, 3, '', 'utilisateur simple', 'false'),
(4, 'Rembusch', 'Gabrielle', 'Gabzilla', 'password', '8 allée Georges Brassens', '78260', 'Achères', '0695530845', 'rembuschga@eisti.eu', 20, 4, '', 'utilisateur simple', 'false'),
(5, 'Meziani', 'Axel', 'Ax', 'axel', '3 rue Lebon', '95000', 'Cergy', '0651592893', 'mezianiaxe@eisti.eu', 19, 1, '', 'utilisateur simple', 'false'),
(6, '', 'Roselyne', 'rosie', 'rosie', '96 rue de Clery', '75002', 'Paris', '0174649796', 'hello@chefing.fr', 31, 3, '../Inscription/photo_profil/roselynePhoto.png', 'cuisto', 'false'),
(7, '', 'Latifa', 'Aka', 'aka', '26 Rue des Galeries', '95000', 'Cergy', '0174649796', 'hello@chefing.fr', 27, 2, '../Inscription/photo_profil/LatifaPhoto.png', 'cuisto', 'false'),
(8, '', 'Aneliz', 'Anie', 'chefing', '8 Bis Avenue De Saint Germain', '78600', 'Maisons-Laffitte', '0174649796', 'hello@chefing.fr', 24, 2, '../Inscription/photo_profil/AnelizPhoto.png', 'cuisto', 'false'),
(9, '', 'Thomas', 'TimTom', 'tommy', '2 Place de la Défense', '92800', 'Puteaux', '0174649796', 'hello@chefing.fr', 33, 5, '../Inscription/photo_profil/thomasPhoto.png', 'cuisto', 'false'),
(10, '', 'Hicham', 'Chichi', 'chocho', '10 allée Georges Brassens', '78260', 'Achères', '01 49 06 46 50', 'hello@chefing.fr', 28, 3, '../Inscription/photo_profil/hichamPhoto.png', 'cuisto', 'false');

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
