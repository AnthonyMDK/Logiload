
CREATE DATABASE IF NOT EXISTS `commentaire` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `commentaire`;


CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `produit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `description` (`id`, `auteur`, `contenu`, `produit`) VALUES
(35, 'admin', 'premier', 'gimp'),
(36, 'admin', 'milieu', 'gimp'),
(71, 'admin', 'photoshop est un bon logiciel', 'photoshop'),
(90, 'admin', 'last', 'photoshop'),
(114, 'user', 'Gimp est tres bien', 'gimp'),
(116, 'user', 'je suis d accord', 'gimp'),
(122, 'admin', 'abc', 'photoshop'),
(123, 'admin', 'je suis d&#039;accord', 'photoshop'),
(124, '', 'test', 'Photoshop'),
(125, 'admin', 'test du contenue du commentare', 'Photoshop'),
(127, 'admin', 'a', 'Gimp');


ALTER TABLE `description`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;


