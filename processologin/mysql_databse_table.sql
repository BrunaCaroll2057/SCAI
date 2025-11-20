CREATE SCHEMA IF NOT EXISTS `scai` DEFAULT CHARACTER SET utf8 ;
USE `scai` ;

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

alter table `user_form`
add column tipo varchar(250);
ALTER TABLE user_form ADD COLUMN aprovado TINYINT(1) DEFAULT 0;

INSERT INTO user_form (name, email, password, image, tipo, aprovado)
VALUES ('Administrador', 'admin@scai.com', '$2y$10$vZl9Wxx27COLtSIMfWWxiOjadZ0BpwiIs4.dfBEzk5a.3i7qmDfJ.', 'default-avatar.png', 'admin', 1);

SET SQL_SAFE_UPDATES = 0;
DELETE FROM user_form WHERE email = 'brunacaroll2057@gmail.com';

UPDATE user_form 
SET password = '$2y$10$ajcFx34WcVpOD3kOhSW71u2vdUmWYTqHPh9TDt9byeRa8gtTBypL2' 
WHERE email = 'admin@scai.com';

UPDATE user_form
SET password = '$2b$12$DbPHSg2UtKxgwvo1Ht/JCOPEbu2QG3iCF51YzWl/TRTC70G6KAYB.'
WHERE id = 1;

SELECT id, name, email, tipo, aprovado FROM user_form;

select * from user_form;

alter table `user_form`
add column tipo varchar(250);
ALTER TABLE user_form ADD COLUMN aprovado TINYINT(1) DEFAULT 0;

UPDATE user_form 
SET password = '$2y$10$tmqaCwNI3wCanVvTOwywouz4JK.ZuuByDvJihOJEB0VrV9xHKsO1y'
WHERE email = 'admin@scai.com';

SET SQL_SAFE_UPDATES = 0;