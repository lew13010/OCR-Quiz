-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.6.17 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.3.0.5104
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour quizz
CREATE DATABASE IF NOT EXISTS `quizz` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `quizz`;

-- Export de la structure de la table quizz. enregistrements
CREATE TABLE IF NOT EXISTS `enregistrements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse_ip` varchar(50) NOT NULL DEFAULT '0',
  `id_quiz` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_id_quiz` (`id_quiz`),
  CONSTRAINT `FK_id_quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- Export de données de la table quizz.enregistrements : ~1 rows (environ)
/*!40000 ALTER TABLE `enregistrements` DISABLE KEYS */;
/*!40000 ALTER TABLE `enregistrements` ENABLE KEYS */;

-- Export de la structure de la table quizz. propositions
CREATE TABLE IF NOT EXISTS `propositions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reponses` varchar(255) NOT NULL DEFAULT '0',
  `id_question` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_id_questions` (`id_question`),
  FULLTEXT KEY `reponses` (`reponses`),
  CONSTRAINT `FK_id_questions` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Export de données de la table quizz.propositions : ~24 rows (environ)
/*!40000 ALTER TABLE `propositions` DISABLE KEYS */;
INSERT INTO `propositions` (`id`, `reponses`, `id_question`) VALUES
	(11, '1974', 3),
	(12, '1976', 3),
	(15, '1981', 3),
	(16, '1986', 3),
	(17, 'Le 8 Mai 1945', 4),
	(18, 'Le 14 Juillet 1940', 4),
	(19, 'Le 11 Novembre 1945', 4),
	(20, 'Le 18 Juin 1940', 4),
	(21, 'Coué', 5),
	(22, 'Cauet', 5),
	(23, 'Couderc', 5),
	(24, 'Courbet', 5),
	(25, 'Un synonyme', 6),
	(26, 'Un lapsus', 6),
	(27, 'Une anagramme', 6),
	(28, 'Un antonyme', 6),
	(29, 'Les Alpes-de-Haute-Provence', 7),
	(30, 'Les Hautes-Alpes', 7),
	(31, 'La Haute-Savoie', 7),
	(32, 'Le Vaucluse', 7),
	(33, 'Un merle', 8),
	(34, 'Un rossignol', 8),
	(35, 'Un pigeon', 8),
	(36, 'Une clé', 8);
/*!40000 ALTER TABLE `propositions` ENABLE KEYS */;

-- Export de la structure de la table quizz. questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) NOT NULL DEFAULT '0',
  `qcm` enum('Y','N') NOT NULL DEFAULT 'N',
  `id_quiz` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_id_quizz` (`id_quiz`),
  CONSTRAINT `FK_id_quizz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Export de données de la table quizz.questions : ~6 rows (environ)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `intitule`, `qcm`, `id_quiz`) VALUES
	(3, 'En quelle année François Mitterrand a-t-il été élu président de la République française ?', 'N', 2),
	(4, 'Quand l\'armistice de la seconde guerre mondiale a-t-elle été signée ?', 'N', 2),
	(5, 'Quelle est la méthode basée sur la persuasion par la répétition ?', 'N', 2),
	(6, 'Comment appelle-t-on un mot construit sur la base des lettres d\'un autre mot ?', 'N', 3),
	(7, 'Quel département n\'est pas frontalier avec l\'Italie ?', 'N', 3),
	(8, 'Avec quel instrument peut-on ouvrir une porte ?', 'Y', 3);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Export de la structure de la table quizz. quiz
CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Export de données de la table quizz.quiz : ~2 rows (environ)
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` (`id`, `titre`) VALUES
	(2, 'Culture Générale 1'),
	(3, 'Culture Générale 2');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;

-- Export de la structure de la table quizz. solutions
CREATE TABLE IF NOT EXISTS `solutions` (
  `id` int(11) NOT NULL,
  `reponses` varchar(50) NOT NULL,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_solutions_questions` (`id_question`),
  CONSTRAINT `FK_id_propositions` FOREIGN KEY (`id`) REFERENCES `propositions` (`id`),
  CONSTRAINT `FK_solutions_questions` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table quizz.solutions : ~6 rows (environ)
/*!40000 ALTER TABLE `solutions` DISABLE KEYS */;
INSERT INTO `solutions` (`id`, `reponses`, `id_question`) VALUES
	(15, '1981', 3),
	(17, 'Le 8 Mai 1945', 4),
	(21, 'Coué', 5),
	(27, 'Une anagramme', 6),
	(32, 'Le Vaucluse', 7),
	(34, 'Un rossignol, Une clé', 8);
/*!40000 ALTER TABLE `solutions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
