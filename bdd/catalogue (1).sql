
CREATE DATABASE IF NOT EXISTS `catalogue` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `catalogue`;

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`) VALUES
(1, 'photoshop', 'Photoshop est un logiciel de retouche, de traitement et de dessin assisté par ordinateur, lancé en 1990 sur MacOS puis en 1992 sur Windows. Édité par Adobe, il est principalement utilisé pour le traitement des photographies numériques, mais sert également', '18€'),
(2, 'gimp', 'GIMP ou anciennement « The GIMP », est un outil de édition et de retouche image, diffusé sous la licence GPLv3 comme un logiciel gratuit et libre. Il en existe des versions pour la plupart des systèmes d exploitation dont GNU/Linux, macOS et Microsoft', '10€');


ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

