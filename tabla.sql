CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `año` varchar(10) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `potencia` varchar(50) NOT NULL,
  `cilindrada` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,,
  PRIMARY KEY (`id`)
);


UPDATE motos
SET modelo = TRIM(modelo);


INSERT INTO motos (año, modelo, potencia, cilindrada, tipo, precio, imagen) VALUES
('2024', 'C 400 GT', '34 cv', '350 cc', 'Scooter', '8290', 'img/c400x/cover-400x.webp'),
('2024', 'C 400 X', '34 cv', '350 cc', 'Scooter', '7250', 'img/c400gt/cover-gt.webp'),
('2023', 'CE 04', '42 cv', 'N.D', 'Scooter', '12930', 'img/ce04/cover_ce04.webp'),
('2024', 'F 800 GS', '85 cv', '852 cc', 'Adventure', '11250', 'img/f800gs/cover-800-gs.webp'),
('2023', 'F 850 GS Adventure', '95 cv', '853 cc', 'Adventure', '14130', 'img/f850gs_Adventure/cover-850-adv.webp'),
('2024', 'F900 XR', '105 cv', '895 cc', 'Sport', '12920', 'img/f900xr_2024/cover-900xr.webp'),
('2024', 'F 900 R', '105 cv', '895 cc', 'Roadster', '9720', 'img/f900r_2024/cover900r.webp'),
('2024', 'G 310 GS', '34 cv', '313 cc', 'Adventure', '6900', 'img/g310gs_2024/cover-310gs.webp'),
('2024', 'G 310 R', '34 cv', '313 cc', 'Roadster', '6050', 'img/g310r_2024/cover-rs.webp'),
('2024', 'K 1600 B Bagger', '160 cv', '1649 cc', 'Touring', '30920', 'img/k1600b/cover-b.webp'),
('2024', 'K 1600 GT', '158 cv', '1649 cc', 'Touring', '30620', 'img/k1600gt_2024/cover-gt.webp'),
('2024', 'K 1600 GTL', '160 cv', '1649 cc', 'Touring', '31530', 'img/k1600gtl_2024/cover-gtl.webp'),
('2023', 'M 1000 R', '210 cv', '999 cc', 'M', '25100', 'img/m1000r/cover-1000r.webp'),
('2023', 'M 1000 RR', '210 cv', '999 cc', 'M', '25100', 'img/m1000rr/cover_m1000rr.webp'),
('2023', 'R nineT', '109 cv', '1170 cc', 'Heritage', '13890', 'img/r-nine-t/cover-ninet.webp'),
('2023', 'R nineT Scrambler', '109 cv', '1170 cc', 'Heritage', '15230', 'img/r-nine-t-scramber/cover-scramber.webp'),
('2023', 'R NineT Urban G/S', '111 cv', '1170 cc', 'Heritage', '14640', 'img/r-nine-t_urban_gs/cover-urban.webp'),
('2024', 'R 18 Classic', '95 cv', '1170 cc', 'Heritage', '21350', 'img/r18classic/cover-classic.webp'),
('2024', 'R 18 B', '95 cv', '1170 cc', 'Heritage', '27300', 'img/r18b/cover-b_2.webp'),
('2024', 'R 18 Transcontinental', '95 cv', '1170 cc', 'Heritage', '29595', 'img/r18transcontinent/cover-trans.webp'),
('2024', 'R 18 Roctane', '95 cv', '1170 cc', 'Heritage', '27300', 'img/r18roctane/cover-roctane.webp'),
('2023', 'R 1250 GS', '136 cv', '1254 cc', 'Adventure', '19880', 'img/r1250gs/cover-1250-gs.webp'),
('2024', 'R 1250 GS Adventure', '136 cv', '1254 cc', 'Adventure', '22560', 'img/r1250gs-adventure/cover-adventure.webp'),
('2023', 'R 1250 R', '136 cv', '1254 cc', 'Roadster', '16270', 'img/r1250r/cover-r1250r.webp'),
('2024', 'R 1250 RT', '136 cv', '1254 cc', 'Touring', '23800', 'img/r1250rt/cover-r1250rt.webp'),
('2023', 'R 1250 RS', '136 cv', '1254 cc', 'Sport', '16990', 'img/r1250rs/cover_r1250rs.webp'),
('2023', 'R 1300 GS', '145 cv', '1300 cc', 'Adventure', '21290', 'img/r1300gs/cover_r1300gs.webp'),
('2023', 'S 1000 R', '165 cv', '999 cc', 'Roadster', '17420', 'img/s1000r/cover_s1000r.webp'),
('2023', 'S 1000 RR', '210 cv', '999 cc', 'Sport', '23700', 'img/s1000rr/cover_s1000rr.webp'),
('2024', 'S 1000 XR', '170 cv', '999 cc', 'Sport', '22249', 'img/s1000xr/cover_s1000xr.webp');