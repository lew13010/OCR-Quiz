-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.6.17 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la base pour quizz
CREATE DATABASE IF NOT EXISTS `quizz` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `quizz`;


-- Export de la structure de table quizz. propositions
CREATE TABLE IF NOT EXISTS `propositions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reponses` varchar(255) NOT NULL DEFAULT '0',
  `correct` enum('Y','N') NOT NULL DEFAULT 'N',
  `id_question` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_id_questions` (`id_question`),
  CONSTRAINT `FK_id_questions` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Export de données de la table quizz.propositions : ~24 rows (environ)
/*!40000 ALTER TABLE `propositions` DISABLE KEYS */;
INSERT INTO `propositions` (`id`, `reponses`, `correct`, `id_question`) VALUES
	(11, '1974', 'N', 3),
	(12, '1976', 'N', 3),
	(15, '1981', 'Y', 3),
	(16, '1986', 'N', 3),
	(17, 'Le 8 Mai 1945', 'Y', 4),
	(18, 'Le 14 Juillet 1940', 'N', 4),
	(19, 'Le 11 Novembre 1945', 'N', 4),
	(20, 'Le 18 Juin 1940', 'N', 4),
	(21, 'Coué', 'Y', 5),
	(22, 'Cauet', 'N', 5),
	(23, 'Couderc', 'N', 5),
	(24, 'Courbet', 'N', 5),
	(25, 'Un synonyme', 'N', 6),
	(26, 'Un lapsus', 'N', 6),
	(27, 'Une anagramme', 'Y', 6),
	(28, 'Un antonyme', 'N', 6),
	(29, 'Les Alpes-de-Haute-Provence', 'N', 7),
	(30, 'Les Hautes-Alpes', 'N', 7),
	(31, 'La Haute-Savoie', 'N', 7),
	(32, 'Le Vaucluse', 'Y', 7),
	(33, 'Un merle', 'N', 8),
	(34, 'Un rossignol', 'Y', 8),
	(35, 'Un pigeon', 'N', 8),
	(36, ' Un pinson', 'N', 8);
/*!40000 ALTER TABLE `propositions` ENABLE KEYS */;


-- Export de la structure de table quizz. questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) NOT NULL DEFAULT '0',
  `id_quiz` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_id_quizz` (`id_quiz`),
  CONSTRAINT `FK_id_quizz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Export de données de la table quizz.questions : ~6 rows (environ)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `intitule`, `id_quiz`) VALUES
	(3, 'En quelle année François Mitterrand a-t-il été élu président de la République française ?', 2),
	(4, 'Quand l\'armistice de la seconde guerre mondiale a-t-elle été signée ?', 2),
	(5, 'Quelle est la méthode basée sur la persuasion par la répétition ?', 2),
	(6, 'Comment appelle-t-on un mot construit sur la base des lettres d\'un autre mot ?', 3),
	(7, 'Quel département n\'est pas frontalier avec l\'Italie ?', 3),
	(8, 'Avec quel instrument peut-on ouvrir une porte ?', 3);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;


-- Export de la structure de table quizz. quiz
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
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
