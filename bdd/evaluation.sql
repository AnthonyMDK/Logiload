
CREATE DATABASE IF NOT EXISTS `evaluation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `evaluation`;

CREATE TABLE `note` (
  `id` int(255) NOT NULL,
  `ref_produit` varchar(255) DEFAULT NULL,
  `evaluateur` varchar(255) DEFAULT NULL,
  `bon` varchar(255) DEFAULT NULL,
  `mauvais` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `note` (`id`, `ref_produit`, `evaluateur`, `bon`, `mauvais`) VALUES
(60, 'Gimp', 'user', NULL, '1'),
(61, 'Photoshop', 'user', '1', NULL),
(69, 'Gimp', 'admin', '1', NULL),
(70, 'Photoshop', 'admin', NULL, '1'),
(71, 'Photoshop', 'a', '1', NULL),
(72, 'Gimp', 'a', NULL, '1');

ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `note`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;
