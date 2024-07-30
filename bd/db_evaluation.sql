-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 07:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `affectation`
--

CREATE TABLE `affectation` (
  `id` int(11) NOT NULL,
  `etudiant` int(11) NOT NULL,
  `cours` int(11) NOT NULL,
  `date_affec` date NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affectation`
--

INSERT INTO `affectation` (`id`, `etudiant`, `cours`, `date_affec`, `supprimer`) VALUES
(1, 2, 3, '2024-07-11', 0),
(2, 3, 1, '2024-07-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `assertion`
--

CREATE TABLE `assertion` (
  `id` int(11) NOT NULL,
  `enonce` text NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assertion`
--

INSERT INTO `assertion` (`id`, `enonce`, `supprimer`) VALUES
(1, 'Très satisfait', 0),
(2, 'Satisfait', 0),
(3, 'Peu satisfait', 0),
(4, 'Pas du tout satisfait', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attribution`
--

CREATE TABLE `attribution` (
  `id` int(11) NOT NULL,
  `cours` int(11) NOT NULL,
  `enseignant` int(11) NOT NULL,
  `date_affectation` date NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attribution`
--

INSERT INTO `attribution` (`id`, `cours`, `enseignant`, `date_affectation`, `supprimer`) VALUES
(1, 3, 1, '2024-07-10', 0),
(2, 1, 1, '2024-07-10', 0),
(3, 2, 3, '2024-07-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `barème_conversion`
--

CREATE TABLE `barème_conversion` (
  `id` int(11) NOT NULL,
  `reponse` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `cours` int(11) NOT NULL,
  `enseignant` int(11) NOT NULL,
  `departement` int(11) NOT NULL,
  `promotion` int(11) NOT NULL,
  `date_message` date NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id`, `commentaire`, `cours`, `enseignant`, `departement`, `promotion`, `date_message`, `supprimer`) VALUES
(1, 'yuqzeohi', 1, 3, 0, 0, '2024-07-17', 0),
(2, 'menteur', 2, 2, 0, 0, '2024-07-17', 0),
(3, 'sawa tuu', 3, 3, 0, 0, '2024-07-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `nomcours` text NOT NULL,
  `credit` int(11) NOT NULL,
  `nbreheure` int(11) NOT NULL,
  `objectif` text NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `nomcours`, `credit`, `nbreheure`, `objectif`, `supprimer`) VALUES
(1, 'IRS', 2, 40, 'iodfqhkqefjlmef', 0),
(2, 'comptabilite', 4, 120, 'uisfhzidjjkdjhk', 0),
(3, 'deontologie', 3, 45, 'guiefuhfshiogiq', 0);

-- --------------------------------------------------------

--
-- Table structure for table `criteres`
--

CREATE TABLE `criteres` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `type` text NOT NULL,
  `domaine` text NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `criteres`
--

INSERT INTO `criteres` (`id`, `description`, `type`, `domaine`, `supprimer`) VALUES
(1, '                                                                                                           expression oralen de l&#039;enseignant                                                                                              ', 'Fermée', 'pédagogique', 0),
(2, '               uqsfju                                                     ', 'Choix Multiples', 'Scientifique', 1),
(3, '                                        clarté de l&#039;enseignant                            ', 'Ouverte', 'Social', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `nomdep` text NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id`, `nomdep`, `supprimer`) VALUES
(1, 'GAF ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL,
  `ensmatricule` text NOT NULL,
  `nom` text NOT NULL,
  `postnom` text NOT NULL,
  `prenom` text NOT NULL,
  `genre` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `adresse` text NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id`, `ensmatricule`, `nom`, `postnom`, `prenom`, `genre`, `telephone`, `email`, `adresse`, `supprimer`) VALUES
(1, 'CriGi/2024', 'Chris', 'kbg', 'kite', 'Masculin', '0987654', '', 'bbo', 0),
(2, 'sraYIa/2024', 'sera', 'muyisa', 'phine', 'Feminin', '657677687863', '', 'vusehi', 0),
(3, 'alaMAa/2024', 'abla', 'kamala', 'al', 'Masculin', '7626892892', '', 'bbo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `etmatricule` text NOT NULL,
  `nom` text NOT NULL,
  `postnom` text NOT NULL,
  `prenom` text NOT NULL,
  `genre` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `adresse` text NOT NULL,
  `lieunaissance` text NOT NULL,
  `datenaissance` date NOT NULL,
  `nationalite` text NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `etmatricule`, `nom`, `postnom`, `prenom`, `genre`, `telephone`, `email`, `adresse`, `lieunaissance`, `datenaissance`, `nationalite`, `supprimer`) VALUES
(1, '', 'Chris ', 'dfsf  ', 'kite', 'Feminin', '254463  ', '', 'zsd  ', 'ded  ', '2024-07-16', 'cfsqsd  ', 0),
(2, 'ere', 'xdgsgrg', 'efztzt&#039;', 'zrztz', 'Feminin', '2243656', '', 'sezerzr', 'fgdrg', '0000-00-00', 'sgdrg', 1),
(3, 'erz&quot;zt', 'SEFEZ', 'FEERZ', 'SGf', 'Feminin', '3243442', '', 'zrzr&#039;', 'sdfsef', '2024-06-18', 'serzt&#039;zt&#039;', 0),
(4, 'ufe/2024SVe', 'uifejhea', 'hcsvjkhd', 'hsfdhehcsh', 'Masculin', '45655654', '', 'uodgsfuuuuuo', 'gyuhjhh', '2024-06-13', 'congol', 0);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `commentaire`) VALUES
(1, 'tttttttyyyyyyy');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_details`
--

CREATE TABLE `evaluation_details` (
  `id` int(11) NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `critere_id` int(11) NOT NULL,
  `assertion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluation_details`
--

INSERT INTO `evaluation_details` (`id`, `evaluation_id`, `critere_id`, `assertion_id`) VALUES
(1, 1, 1, 0),
(2, 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `nompromotion` text NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `nompromotion`, `supprimer`) VALUES
(1, 'L1 SCI  2022-2023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(11) NOT NULL,
  `id_evaluation` int(11) NOT NULL,
  `id_critere` int(11) NOT NULL,
  `reponse` text NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reponses_etudiants`
--

CREATE TABLE `reponses_etudiants` (
  `id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `assersion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `postnom` text NOT NULL,
  `prenom` text NOT NULL,
  `genre` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `adresse` text NOT NULL,
  `pwd` text NOT NULL,
  `fonction` text NOT NULL,
  `photo` text NOT NULL,
  `supprimer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `postnom`, `prenom`, `genre`, `telephone`, `email`, `adresse`, `pwd`, `fonction`, `photo`, `supprimer`) VALUES
(1, 'Chris    ', 'kite  ', 'kbg   ', 'Feminin', '0987654    ', '', 'bbo    ', 'cnch,chj    ', 'Chef de departement', 'Capture2.PNG', 0),
(2, 'jsfje ', 'sddq ', 'xwdffdss ', 'Feminin', '232333 ', '', 'csdzf ', 'dddd ', 'Chef de departement', 'lockscreen.png', 1),
(3, 'dshq', 'giuedgfe', 'hioqscjk', 'Masculin', '34453567676', '', 'uosdofe', '1234', 'Academique', 'Capture3.PNG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assertion`
--
ALTER TABLE `assertion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribution`
--
ALTER TABLE `attribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barème_conversion`
--
ALTER TABLE `barème_conversion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteres`
--
ALTER TABLE `criteres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_details`
--
ALTER TABLE `evaluation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reponses_etudiants`
--
ALTER TABLE `reponses_etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assertion`
--
ALTER TABLE `assertion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attribution`
--
ALTER TABLE `attribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barème_conversion`
--
ALTER TABLE `barème_conversion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `criteres`
--
ALTER TABLE `criteres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evaluation_details`
--
ALTER TABLE `evaluation_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reponses_etudiants`
--
ALTER TABLE `reponses_etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
