-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: hackovo
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `almazena`
--

DROP TABLE IF EXISTS `almazena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `almazena` (
  `ErregistroID` int DEFAULT NULL,
  `prd_mota_id` int DEFAULT NULL,
  `izena` varchar(255) DEFAULT NULL,
  `kantitatea` int DEFAULT NULL,
  `modeloa` varchar(255) DEFAULT NULL,
  `marka` varchar(255) DEFAULT NULL,
  `prezioaE` decimal(7,2) DEFAULT NULL,
  `prezioaS` decimal(7,2) DEFAULT NULL,
  `berria` tinyint DEFAULT NULL,
  `Irudia` varchar(255) DEFAULT NULL,
  `balorazioa` int DEFAULT NULL,
  KEY `ErregistroID` (`ErregistroID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `almazena`
--

LOCK TABLES `almazena` WRITE;
/*!40000 ALTER TABLE `almazena` DISABLE KEYS */;
INSERT INTO `almazena` VALUES (1,1,'Prozesadorea',2,'i5','Intel',30.00,40.00,1,'ProzeIntI5.png',5),(2,1,'Prozesadorea',10,'i7','Intel',50.00,60.00,1,'ProzeIntI7.png',5),(3,1,'Prozesadorea',20,'i9','Intel',100.00,110.00,1,'ProzeIntI9.png',5),(4,1,'Prozesadorea',10,'75800X','AMD Ryzen',150.00,170.00,0,'Rayzen75800.png',5),(5,1,'Prozesadorea',10,'55600X','AMD Ryzen',20.00,22.00,0,'AMD-Ryzen-55600.png',5),(6,1,'Prozesadorea',5,'57600X','AMD Ryzen',30.00,35.00,0,'Rayzen57600.png',5),(7,2,'Txartel Grafikoa',2,'4090RTX','Nvidia',700.00,800.00,0,'Nvidia4090.png',4),(8,2,'Txartel Grafikoa',2,'4080RTX','Nvidia',600.00,700.00,0,'Nvidia4080.jpg',4),(9,2,'Txartel Grafikoa',5,'4070RTX','Nvidia',500.00,600.00,0,'nvidia4070x.png',4),(10,2,'Txartel Grafikoa',4,'RX6700XT','AMD',300.00,310.00,1,'AMDRX.png',4),(11,3,'Plaka Basea',8,'RX6700XT','MSI',300.00,310.00,1,'AMDRX.png',3),(12,3,'Plaka Basea',5,'Z7P90-P','MSI',250.00,260.00,1,'MSIz790.png',3),(13,3,'Plaka Basea',8,'Z790','ASUS',280.00,300.00,1,'ASUSz790.png',3),(14,4,'Disko Gogorra',2,'M371 SSD','MSI',20.00,30.00,0,'msiM371.png',2),(16,4,'Disko Gogorra',5,'870 EVO SSD','Samsung',50.00,60.00,1,'Samsung870.png',2),(15,4,'Disko Gogorra',10,'NV2 SSD','Kingston',30.00,35.00,0,'KingstonNV2.png',2),(17,5,'Ram Memoria',20,'DDR4 3200MHz','Kingston',40.00,42.00,1,'KingstonDDR4.png',1),(18,5,'Ram Memoria',25,'DDR5 5200MHz','Kingston',100.00,105.00,1,'KingstonDDR5.png',1),(19,5,'Ram Memoria',10,'DDR5 6200MHz','Kingston',130.00,135.00,1,'KingstonDDR64.png',1),(20,5,'Ram Memoria',25,'DDR5 5600MHz','Corsair Vengeance',100.00,105.00,1,'KingstonDDR556.png',1),(21,6,'Sagua',20,'Basilisk V3','Razer',50.00,55.00,1,'sagua.png',5),(22,7,'Aurikularrak',22,'GHS400 Caesar','Tempest',51.00,55.00,1,'Aurikularrak.png',4),(23,8,'Teklatua',25,'Pyros Ivory','Newskill',70.00,75.00,1,'teklatua.png',5),(24,9,'Pantaila',15,'G27CQ4 E2','MSI',220.00,230.00,1,'pantaila.png',NULL),(25,10,'Portatila',2,'Aspire 3 A315-58-77EL','Acer',550.00,565.00,1,'portatil1.png',3),(26,10,'Portatila',1,'IdeaPad 3 15ITL6','Lenovo',480.00,490.00,1,'portatil2.png',3),(27,10,'Portatila',1,'Modern 15 B7M-243XES','MSI',600.00,610.00,1,'portatil3.png',3),(28,10,'Portatila',2,'15-fc0025ns','HP',460.00,470.00,1,'portatil4.png',3);
/*!40000 ALTER TABLE `almazena` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berriak`
--

DROP TABLE IF EXISTS `berriak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berriak` (
  `Izenburu_eus` varchar(255) DEFAULT NULL,
  `Notizia_eus` varchar(255) DEFAULT NULL,
  `Izenburu_es` varchar(255) DEFAULT NULL,
  `Notizia_es` varchar(255) DEFAULT NULL,
  `Izenburu_en` varchar(255) DEFAULT NULL,
  `Notizia_en` varchar(255) DEFAULT NULL,
  `ArgitaratzeData` date DEFAULT NULL,
  `Argazkiak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berriak`
--

LOCK TABLES `berriak` WRITE;
/*!40000 ALTER TABLE `berriak` DISABLE KEYS */;
INSERT INTO `berriak` VALUES ('Azken smartphonearen eredua aurkeztu','X enpresa duen smartphone berria aurkezten da ezaugarri berritzaileekin.','Presentación del nuevo modelo de smartphone','Se presenta el nuevo smartphone de la empresa X con características innovadoras.','Introduction of the Latest Smartphone Model','The new smartphone from X company is introduced with innovative features.','2023-11-02','2.png'),('Ziber-segurtasuna: Zein duzu zure informazioa baimenik gabe?','Zure datuak zaindu ahal izateko aholkuak mundu digitalian.','Ciberseguridad: ¿Cómo proteger tu información sin permisos?','Consejos para proteger tus datos en el mundo digital.','Cybersecurity: Managing Your Information Without Permission','Tips for safeguarding your data in the digital world without compromising your privacy.','2023-11-01','3.png'),('Software garapena: Metodologia agileak','Metodologia agilak nola garatu den aldatzen ari da softwarea.','Desarrollo de software: Metodologías ágiles','Cómo ha evolucionado la metodología ágil en el desarrollo de software.','Software Development: Agile Methodologies','How Agile methodologies are changing the landscape of software development.','2023-10-31','4.png'),('Hodei konputazioaren onurak','Nubean datuak gordetzeko modua nola aldatzen ari den azterketa.','Beneficios de la computación en la nube','Un análisis de cómo está cambiando la forma en que se almacenan los datos en la nube.','Benefits of Cloud Computing','Analyzing how the method of storing data in the cloud is evolving.','2023-10-30','5.png'),('Sistema eragileetan aurkitutako hankamen berria','Ikerlariok oso hankamena aurkitu dute sistema eragile ohikoetan.','Nuevo descubrimiento en sistemas ágiles','Los investigadores han encontrado una nueva vulnerabilidad en los sistemas ágiles comunes.','New Discovery in Agile Systems','Researchers have discovered a breakthrough in agile systems.','2023-10-29','6.png'),('Teknologikoari begirako tendentziak hurrengo urtean','2024. urtea markatuko duten teknologia tendentziak ikusteko erlojua.','Tendencias tecnológicas a tener en cuenta el próximo año','Observa el reloj para ver las tendencias tecnológicas que marcarán el año 2024.','Technological Trends to Watch in the Coming Year','A glimpse into the technology trends that will shape 2024.','2023-10-28','7.png'),('Python programazioa: Modako lengoaia','Python proiektatzen dutenaren hainbat proiektu arautzaileetan aldatu izan da.','\nPython programación: Lenguaje de moda\n','\nCambios en cómo se usa Python en varios proyectos reguladores.\n','\nPython Programming: The Language of Moda\n','\nPython is role in various regulatory projects has evolved.\n','2023-10-27','8.png'),('Softwarearen bertsio berriaren aurkezpena','Y enpresak bere software bikainaren bertsio berri bat aurkeztu du.','\nPresentación de la nueva versión de software\n','\nLa empresa Y ha presentado una nueva versión de su excelente software.\n','\nIntroduction of the New Version of Excellent Software\n','\n\nY company has unveiled a new version of its excellent software.\n','2023-10-26','9.png'),('Robotika: Industri automatizazioaren aurrerapenak','Nola eraldatzen ari dira robotek fabrikazioa eta industriaren alorrean.','\nRobótica: Avances en automatización industrial\n','\nCómo los robots están transformando la fabricación y la industria.\n','\nAdvancements in Robotics: Industrial Automation\n','\nExploring how robots are transforming manufacturing and industrial sectors.\n','2023-10-25','10.png'),('Ziber-eraso masiboa enpresa globalak eragiten ditu','Ziber-eraso handia enpresa batzuei eragin die, ondorio larriekin.','\nAtaque cibernético masivo afecta a empresas globales\n','\nUn gran ataque cibernético ha afectado a algunas empresas con graves consecuencias.\n','\nGlobal Companies Affected by Massive Cyber Attacks\n','\nSome companies have fallen victim to a major cyberattack, with serious consequences.\n','2023-10-24','11.png'),('Kripto-monetak beherakoa','Kripto-monetak inbertsio moduko gisa popularitatea lortzen jarraitzen dute.','\nCaída de las criptomonedas\n','\nLas criptomonedas siguen siendo populares como una forma de inversión.\n','\nDecline in Cryptocurrencies\n','\nCryptocurrencies continue to gain popularity as an investment.\n','2023-10-23','12.png'),('Mugikorretarako aplikazioen garapena','Aplikazio mugikorrak egiten nola arrakasta izan dezakeen merkatuan.','\nDesarrollo de aplicaciones para dispositivos móviles\n','\nCómo las aplicaciones móviles pueden tener éxito en el mercado.\n','\nDevelopment of Mobile Applications\n','\nHow mobile applications can succeed in the market.\n','2023-10-22','13.png'),('Prozesagailuak: Aurreko bertsioak','Merkatuko prozesagailu sendotzen diren bertsioak iragarriak izan dira.','\nPresentación de nuevas versiones de procesadores\n','\nSe han anunciado nuevas versiones de procesadores que fortalecerán el mercado.\n','\nIntroduction of Upgraded Versions of Processing Units\n','\nUpcoming versions of processing units that are strengthening the market.\n','2023-10-21','14.png'),('Online segurtasuna: Zein da zure kontuak babestu behar dituzun?','Zure online kontuak babesteko eta zaindu beharreko aholkuak.','\nSeguridad en línea: Cómo proteger tus cuentas\n','\nConsejos para proteger y cuidar de tus cuentas en línea.\n','\nOnline Security: How to Protect Your Accounts\n','\nAdvice on securing and monitoring your online accounts.\n','2023-10-20','15.png'),('Osasun arloko Adimen Artifiziala','Adimen Artifiziala nola erabiltzen ari den osasun arloan azaltzen da.','\nInteligencia Artificial en el ámbito de la salud\n','\nCómo se está utilizando la Inteligencia Artificial en el campo de la salud para mejorar el diagnóstico.\n','\nArtificial Intelligence in the Health Sector\n','\nHow Artificial Intelligence is being utilized in healthcare for improvement and diagnostics.\n','2023-10-19','16.png'),('Videojokoen bertsio berriaren aurkezpena','Espero den Videojoko X jokalarientzako azkenik eskuragarri da.','\nPresentación de la nueva versión de videojuegos\n','\nFinalmente disponible el esperado Videojuego X para los jugadores.\n','\nUnveiling of the Latest Version of Video Games\n','\nThe highly anticipated Video Game X is finally available to players.\n','2023-10-18','17.png'),('5G teknologia: Komunikazioen etorkizuna','Nola 5G teknologia eta harremanen eremua aldatzen ari den aztertzen da.','\nTecnología 5G: El futuro de las comunicaciones\n','\nCómo la tecnología 5G está cambiando la forma en que nos comunicamos.\n','\n5G Technology: The Future of Communication\n','\nExamining how 5G technology and the realm of communication are evolving.\n','2023-10-17','18.png'),('Ziber-erasoa gobernu sareetan','Gobernu sareetan eragingo duen ziber-erasoa jakinarazi da eta ondorio larriekin.','\nAtaque cibernético en redes gubernamentales\n','\nSe ha anunciado un ciberataque que afectará a las redes gubernamentales con graves consecuencias.\n','\nCyber Attacks Impacting Government Networks\n','\nA major cyber attack has been reported on government networks, causing serious consequences.\n','2023-10-16','19.png'),('Zabal-kodeko softwarearen garapena','Zabal-kodeko softwarea zenbaki handiko garrantzia dauka industriaren alorrean.','\nDesarrollo de software de código abierto\n','\nLa importancia del software de código abierto en la industria.\n','\nDevelopment of Open-Source Software\n','\nThe significant importance of open-source software in the industrial sector.\n','2023-10-15','20.png'),('3D inprimaketa teknologikoaren bertsio berrienak','3D inprimaketan lortutako aurrerapenek eraikuntzan aukera berriak irekitzen dituzte.','\nLas últimas novedades en tecnología de impresión 3D\n','\nLos avances recientes en la impresión 3D abren nuevas oportunidades en la construcción.\n','\nLatest Advancements in 3D Printing Technology\n','\nRecent advancements in 3D printing are opening new possibilities in construction.\n','2023-10-14','21.png'),('Mugikorretarako sistema eragileen bertsio berriak','Fabrikatzaileek beren mugikorretarako sistema eragileen bertsioak berritu dituzte.','\nNuevas versiones de sistemas operativos móviles\n','\nLos fabricantes han actualizado las versiones de sus sistemas operativos móviles.\n','\nNew Versions of Operating Systems for Mobile Devices\n','\nManufacturers have updated the operating systems for their mobile devices.\n','2023-10-13','22.png'),('Sare sozialen eragina gizartean','Sare sozialak gizartearekin duen eragina kontu handia dute eta harremanean jarduten dute.','\nEl impacto de las redes sociales en la sociedad\n','\nLas redes sociales tienen un gran impacto en la sociedad y desempeñan un papel importante en las relaciones.\n','\nSocial Medias Impact on Society\n','\nSocial networks play a significant role in society and engage in relationships.\n','2023-10-12','23.png'),('Ziber-hezkuntzaren garrantzia','Hezkuntza digitalean mantentzeko eta teknologia berriak ikasteko, ziber-hezkuntza oso garrantzitsua bihurtu da.','\nImportancia de la educación digital\n','\nLa cibereducación se ha vuelto crucial para mantenerse al día con la tecnología y aprender nuevas habilidades.\n','\nThe Importance of Cyber Education\n','\nCyber education has become crucial for maintaining digital education and learning\n','2023-10-11','24.png'),('IoT dispositivo berri bat aurkezpena','IoT (Interneteko gauzaen Interneteko gauzaen) dispositivo berri bat dator martxan.','\nPresentación de un nuevo dispositivo IoT\n','\nUn nuevo dispositivo IoT (Internet of Things) ha salido al mercado.\n','\nIntroduction of a New IoT Device\n','\nA new IoT (Internet of Things) device is now in operation.\n','2023-10-10','25.png'),('Online bideo-jokoen bilaketa','Azken urteetan bideo-jokoak iraunkorrak izan dira eta hazkuntza etengabea izan dute.','\nBúsqueda de videojuegos en línea\n','\nLos videojuegos han sido duraderos en los últimos años y han experimentado un crecimiento continuo.\n','\nSearch for Online Video Games\n','\nIn recent years, video games have become sustainable and continue to grow.\n','2023-10-09','26.png'),('Blockchain eta bloke-kateen aukerak','Bloke-kate teknologia sektore ezberdinetan aztertzen ari den bloke-kate teknologiaren aukerak.','\nBlockchain y las posibilidades de las cadenas de bloques\n','\nExploración de las posibilidades de la tecnología de cadenas de bloques en diferentes sectores.\n','\nBlockchain and the Potential of Blockchains\n','\nExploring the potential of blockchain technology being studied in various sectors.\n','2023-10-08','27.png'),('Sistema eragileen bertsio berri bat aurkezpena','Bertsio berri bat zaila dakar eta hobekuntza handiak izango ditu.','\nPresentación de una nueva versión de sistemas operativos\n','\nLa introducción de una nueva versión suele ser complicada y con grandes mejoras.\n','\nIntroduction of a New Version of Operating Systems\n','\nThe release of a new version comes with challenges and significant improvements.\n','2023-10-07','28.png'),('Adimen Artifiziala osasun alorrean','Nola erabilten den Adimen Artifiziala osasun arloan hobekuntza eta diagnostikoa bideratzeko azaltzen da.','\nUso de la Inteligencia Artificial en el campo de la salud\n','\nCómo se está utilizando la Inteligencia Artificial para mejorar la atención y el diagnóstico en el campo de la salud.\n','\nArtificial Intelligence in the Healthcare Sector\n','\nHow Artificial Intelligence is used to enhance and diagnose in the healthcare field.\n','2023-10-06','29.png'),('Errealitate birtuala eta areagatik etorkizuna','Errealitate birtuala eta areagako teknologiak etorkizun emozionagarria hurbiltzen duten teknologiak promesatzen dute.','\nRealidad virtual y aumentada: el futuro emocionante\n','\nLas tecnologías de realidad virtual y aumentada prometen un futuro emocionante y cercano.\n','\nVirtual Reality and Augmented Realitys Future\n','\nTechnologies like virtual reality and augmented reality promise an exciting future.\n','2023-10-05','30.png'),('Ikerketak Aranzelako Adimen Artifizialean','Adimen Artifizialearen alorrean egindako aurrerapen handiak lortu dira.','Investigaciones en Inteligencia Artificial aplicada a la Aduana','Se han logrado avances significativos en el campo de la Inteligencia Artificial aplicada.','Advancements in Artificial Intelligence Research','Significant advancements have been made in the field of Artificial Intelligence.','2023-11-03','1.png');
/*!40000 ALTER TABLE `berriak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berritrans`
--

DROP TABLE IF EXISTS `berritrans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berritrans` (
  `idBerri` int NOT NULL,
  `trans_key` varchar(255) DEFAULT NULL,
  `idNotiz` int DEFAULT NULL,
  `trans_keyNotiz` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idBerri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berritrans`
--

LOCK TABLES `berritrans` WRITE;
/*!40000 ALTER TABLE `berritrans` DISABLE KEYS */;
INSERT INTO `berritrans` VALUES (1,'notizi1',1,'notizi1desk'),(2,'notizi2',2,'notizi2desk'),(3,'notizi3',3,'notizi3desk'),(4,'notizi4',4,'notizi4desk'),(5,'notizi5',5,'notizi5desk'),(6,'notizi6',6,'notizi6desk'),(7,'notizi7',7,'notizi7desk'),(8,'notizi8',8,'notizi8desk'),(9,'notizi9',9,'notizi9desk'),(10,'notizi10',10,'notizi10desk'),(11,'notizi11',11,'notizi11desk'),(12,'notizi12',12,'notizi12desk'),(13,'notizi13',13,'notizi13desk'),(14,'notizi14',14,'notizi14desk'),(15,'notizi15',15,'notizi15desk'),(16,'notizi16',16,'notizi16desk'),(17,'notizi17',17,'notizi17desk'),(18,'notizi18',18,'notizi18desk'),(19,'notizi19',19,'notizi19desk'),(20,'notizi20',20,'notizi20desk'),(21,'notizi21',21,'notizi21desk'),(22,'notizi22',22,'notizi22desk'),(23,'notizi23',23,'notizi23desk'),(24,'notizi24',24,'notizi24desk'),(25,'notizi25',25,'notizi25desk'),(26,'notizi26',26,'notizi26desk'),(27,'notizi27',27,'notizi27desk'),(28,'notizi28',28,'notizi28desk'),(29,'notizi29',29,'notizi29desk'),(30,'notizi30',30,'notizi30desk');
/*!40000 ALTER TABLE `berritrans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bezeroak`
--

DROP TABLE IF EXISTS `bezeroak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bezeroak` (
  `NAN` char(9) DEFAULT NULL,
  `izena` varchar(255) DEFAULT NULL,
  `abizena` varchar(255) DEFAULT NULL,
  `telefonoa` char(9) DEFAULT NULL,
  `korreoa` varchar(255) DEFAULT NULL,
  `helbidea` varchar(255) DEFAULT NULL,
  `herria` varchar(255) DEFAULT NULL,
  `probintzia` varchar(255) DEFAULT NULL,
  `PK` char(5) DEFAULT NULL,
  `KK` char(20) DEFAULT NULL,
  `enpresa` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bezeroak`
--

LOCK TABLES `bezeroak` WRITE;
/*!40000 ALTER TABLE `bezeroak` DISABLE KEYS */;
INSERT INTO `bezeroak` VALUES ('67876576H','Juan','Muñoz','984847754','juanmunoz@gmail.com','Arana Kalea 2','Ordizia','Gipuzkoa','20240','ES459876543216789878',0),('67976576H','Ian','Moran','984837754','imoran@gmail.com','Isidoro Melero 12','Altsasu','Nafarroa','31800','ES459873143216789878',0),('95418743F','Miguel','Franco','688534082','miguel005@gmail.com','Urdaneta kalea 40','Ordizia','Gipuzkoa','20240','ES120976527865140985',0),('123456780','Goierri',NULL,'943650872','goierri@gmail.org','Arranomendia,2','Ordizia','Gipuzkoa','20240','ES459876543210689878',1),('123916780','Pottoka',NULL,'396445908','pottokataberna@gmail.eus','Kale Nagusia,1','Ordizia','Gipuzkoa','20240','ES450634981623987456',1),('73985427P','Beñat','Portillo','877123789','portillo@gmail.org','Iurramendi,28','Tolosa','Gipuzkoa','20400','ES459801782390689878',0),('73216943P','Garazi','Portillo','628690223','gportillo@gmail.org','Iurramendi,28','Tolosa','Gipuzkoa','20400','ES129876543210689843',0),('78393432J','Iraitz','Murillo','663912320','iraitzito@gmail.eus','Isidoro Melero 11','Altsasu','Nafarroa','31800','ES129871234560689843',0),('34098162K','Ander','Murua','634435242','muruaander@gmail.com','Lizarbe etxea','Altzo','Gipuzkoa','20268','ES12987654321072961',0),('73216989P','Jon','Milo','646690223','jmilo@gmail.org','Urdaneta Kalea 46','Ordizi','Gipuzkoa','20240','ES129876543120689843',0),('63216943P','Asier','Saizar','628692046','asiersa@gmail.org','Iurramendi,24','Tolosa','Gipuzkoa','20400','ES129877543210689843',0),('153916780','Fagor',NULL,'396473908','fagor@gmail.org','isasi kalea 1','Mondragon','Gipuzkoa','20730','ES450634981623987450',1),('109916780','CAF',NULL,'396438908','CAF@gmail.com','Urdanet Kalea','Ordizia','Gipuzkoa','20240','ES450634981623987405',1),('153916870','Urdanet',NULL,'396734908','urdanet@gmail.org','Urdaneta Kalea 8','Ordizia','Gipuzkoa','20240','ES405634981623987450',1),('63216953H','Amets','Amunarriz','628690286','aamunarriz@gmail.org','Iurramendi,1','Tolosa','Gipuzkoa','20400','ES909877543210689843',0),('155016870','Chealse',NULL,'096734908','chealse@gmail.com','London bridge','Londres','Inglaterra','85309','ES405634981623949750',1),('73979427P','Ander','Ramos','877128739','aramos@gmail.net','Porru Kalea 4','Beasain','Gipuzkoa','20220','ES459801782390689878',0),('73458761N','Beñat','Iturrioz','877182739','biturrioz@gmail.net','Porru Kalea 2','Beasain','Gipuzkoa','20220','ES459801782390698878',0),('73458921N','Igor','Viyuela','877232739','viyuelai@gmail.net','Legazpi Kalea 3','Zumarraga','Gipuzkoa','20800','ES459081782390698878',0),('73458921N','Enara','Garcia','688232739','anegarcia@gmail.net','Zelaia kalea 5','Altsasu','Nafarroa','31800','ES959081782390698878',0);
/*!40000 ALTER TABLE `bezeroak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eskariak`
--

DROP TABLE IF EXISTS `eskariak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eskariak` (
  `id_eskaria` int NOT NULL AUTO_INCREMENT,
  `NAN` varchar(50) NOT NULL,
  `egoera` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_eskaria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eskariak`
--

LOCK TABLES `eskariak` WRITE;
/*!40000 ALTER TABLE `eskariak` DISABLE KEYS */;
INSERT INTO `eskariak` VALUES (1,'',NULL),(2,'',NULL),(3,'',NULL),(4,'73265735V',NULL);
/*!40000 ALTER TABLE `eskariak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faktura`
--

DROP TABLE IF EXISTS `faktura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faktura` (
  `id_eskaria` int NOT NULL,
  `ErregistroID` int NOT NULL,
  `kantitatea` int DEFAULT NULL,
  PRIMARY KEY (`id_eskaria`,`ErregistroID`),
  KEY `ErregistroID` (`ErregistroID`),
  CONSTRAINT `faktura_ibfk_1` FOREIGN KEY (`id_eskaria`) REFERENCES `eskariak` (`id_eskaria`),
  CONSTRAINT `faktura_ibfk_2` FOREIGN KEY (`ErregistroID`) REFERENCES `almazena` (`ErregistroID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faktura`
--

LOCK TABLES `faktura` WRITE;
/*!40000 ALTER TABLE `faktura` DISABLE KEYS */;
/*!40000 ALTER TABLE `faktura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hornitzaileformulario`
--

DROP TABLE IF EXISTS `hornitzaileformulario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hornitzaileformulario` (
  `TelZenbakia` int DEFAULT NULL,
  `Izena` varchar(255) DEFAULT NULL,
  `NAN` char(9) DEFAULT NULL,
  `HornitzaileMota` varchar(255) DEFAULT NULL,
  `Helbidea` varchar(255) DEFAULT NULL,
  `Zerbitzua` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hornitzaileformulario`
--

LOCK TABLES `hornitzaileformulario` WRITE;
/*!40000 ALTER TABLE `hornitzaileformulario` DISABLE KEYS */;
INSERT INTO `hornitzaileformulario` VALUES (687983456,'Urko','72556732U','pertsona','Ordizi, ken zazpi kalea','Ordenagailuen salmenta');
/*!40000 ALTER TABLE `hornitzaileformulario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `langileak`
--

DROP TABLE IF EXISTS `langileak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `langileak` (
  `NAN` char(9) DEFAULT NULL,
  `izena` varchar(255) DEFAULT NULL,
  `abizena` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefonoa` char(20) DEFAULT NULL,
  `helbidea` varchar(255) DEFAULT NULL,
  `PK` char(5) DEFAULT NULL,
  `postua` varchar(255) DEFAULT NULL,
  `jaiotzeData` date DEFAULT NULL,
  `KK` char(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `langileak`
--

LOCK TABLES `langileak` WRITE;
/*!40000 ALTER TABLE `langileak` DISABLE KEYS */;
INSERT INTO `langileak` VALUES ('45987512V','Alberto','Diaz','adiaz@gmail.com','943632372','Antzalde Kalea ,12','20210','Programadorea','1983-07-08','ES459876543216789878'),('45923512N','Maria','Alvarez','aalvarez@gmail.com','943630372','Antzalde Kalea ,2','20210','Konpontzailea','1990-07-09','ES459876544316789878'),('73987512G','Arturo','Vidal','avidal@gmail.org','943632183','Araba Kalea ,22','20800','Programadorea','1994-01-10','ES499876543216789878'),('72987512L','Ian','Murillo','imurillo@gmail.eus','688632372','San Gregorio ,10','20700','Jefea','2003-01-08','ES459876543246789878'),('45987512V','Alberto','Diaz','adiaz@gmail.com','943632372','Antzalde Kalea ,12','20210','Programadorea','1983-07-08','ES459876543216789878'),('45987512V','Alberto','Diaz','adiaz@gmail.com','943632372','Antzalde Kalea ,12','20210','Programadorea','1983-07-08','ES459876543216789878'),('45923512N','Maria','Alvarez','aalvarez@gmail.com','943630372','Antzalde Kalea ,2','20210','Konpontzailea','1990-07-09','ES459876544316789878'),('73987512G','Arturo','Vidal','avidal@gmail.org','943632183','Araba Kalea ,22','20800','Programadorea','1994-01-10','ES499876543216789878'),('72987512L','Ian','Murillo','imurillo@gmail.eus','688632372','San Gregorio ,10','20700','Jefea','2003-01-08','ES459876543246789878'),('45987512V','Alberto','Diaz','adiaz@gmail.com','943632372','Antzalde Kalea ,12','20210','Programadorea','1983-07-08','ES459876543216789878'),('45923512N','Maria','Alvarez','aalvarez@gmail.com','943630372','Antzalde Kalea ,2','20210','Konpontzailea','1990-07-09','ES459876544316789878'),('73987512G','Arturo','Vidal','avidal@gmail.org','943632183','Araba Kalea ,22','20800','Programadorea','1994-01-10','ES499876543216789878'),('72987512L','Ian','Murillo','imurillo@gmail.eus','688632372','San Gregorio ,10','20700','Jefea','2003-01-08','ES459876543246789878'),('45987512V','Alberto','Diaz','adiaz@gmail.com','943632372','Antzalde Kalea ,12','20210','Programadorea','1983-07-08','ES459876543216789878'),('45923512N','Maria','Alvarez','aalvarez@gmail.com','943630372','Antzalde Kalea ,2','20210','Konpontzailea','1990-07-09','ES459876544316789878'),('73987512G','Arturo','Vidal','avidal@gmail.org','943632183','Araba Kalea ,22','20800','Programadorea','1994-01-10','ES499876543216789878'),('72987512L','Ian','Murillo','imurillo@gmail.eus','688632372','San Gregorio ,10','20700','Jefea','2003-01-08','ES459876543246789878'),('72998512P','Iraitz','Moran','imoran@gmail.org','943638972','Antzalde Kalea ,14','20210','Jefea','2003-11-17','ES459876543016789878'),('73458761G','Urko','Lozano','urkolozano@gmail.com','677632372','Urdaneta Kalea ,42','20240','Jefea','2005-10-23','ES452876543216789878'),('45980912K','Joseba','Imaz','jimaz@gmail.com','688923409','San Gregorio ,2','20800','Marketing','1993-04-02','ES459876543216789278'),('73487512K','Ander','Murua','muruaA@gmail.com','091632372','Porru Kalea ,22','20200','Programadorea','1980-10-08','ES459786543216789878'),('89787512S','Beñat','Portillo','bporti@gmail.com','943690272','Tren bide Kalea ,19','20200','Enkargatua','1986-12-18','ES459876543212379878'),('34987123H','Iker','Ramos','iramos@gmail.org','945132372','Arana Kalea ,1','20240','Laguntzailea','1979-08-10','ES459876143216789878'),('45909512K','Gorka','Pérez','gperez@gmail.com','943630872','San Gregorio Kalea ,21','20700','Konpontzailea','2001-11-27','ES459876813216789878'),('78340971F','Igor','Viyuela','iviyuela@gmail.eus','688634512','Iurramendi Kalea, 9','20820','Laguntzailea','1999-08-17','ES459870943216789878'),('34560123V','Beñat','Alvarez','balvarez@gmail.com','677451234','Urdaneta Kalea ,23','20240','Marketing','1989-02-06','ES459876543216789800'),('45387512K','Unai','Murillo','umurillo@gmail.com','943002372','Urdaneta Kalea ,45','20240','Logistika','1995-07-08','ES459876543216789871'),('45921012K','Ander','Diaz','adiaz2@gmail.com','943642372','Urdaneta Kalea ,32','20240','Enkargatua','1998-01-08','ES459876543216789872'),('73458709K','Estibalitz','Lasa','elasa@gmail.com','940932372','Trenbide Kalea ,2','20200','Laguntzailea','1990-10-17','ES459876543216789873'),('56982316B','Gorka','Baliarrain','gorkB@gmail.com','688721309','Antzalde Kalea ,23','20210','Saltzailea','1994-03-03','ES459876543216789874'),('89349812L','Beñat','Gerique','bgerique@gmail.com','943632372','Porru Kalea ,12','20210','Laguntzailea','2003-07-08','ES459876543216789875'),('74587612J','Eneko','Sebastian','esanse@gmail.com','943630272','Antzalde Kalea ,2','20210','Marketing','1983-09-24','ES459876543216789876'),('13459824N','Jose','Moran','jmoran@gmail.com','943461372','Arana Kalea ,12','20240','Saltzailea','2000-12-11','ES459876543216789877');
/*!40000 ALTER TABLE `langileak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordaindu`
--

DROP TABLE IF EXISTS `ordaindu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordaindu` (
  `nan` char(9) NOT NULL,
  `herria` varchar(255) DEFAULT NULL,
  `helbidea` varchar(255) DEFAULT NULL,
  `herrialdea` varchar(255) DEFAULT NULL,
  `postaKodea` char(5) DEFAULT NULL,
  `txartelekoIzena` varchar(255) DEFAULT NULL,
  `txartelZenbakia` char(20) DEFAULT NULL,
  `epemuga` date DEFAULT NULL,
  `cvv` int DEFAULT NULL,
  PRIMARY KEY (`nan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordaindu`
--

LOCK TABLES `ordaindu` WRITE;
/*!40000 ALTER TABLE `ordaindu` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordaindu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodmota`
--

DROP TABLE IF EXISTS `prodmota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodmota` (
  `idProdukt` int NOT NULL,
  `trans_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProdukt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodmota`
--

LOCK TABLES `prodmota` WRITE;
/*!40000 ALTER TABLE `prodmota` DISABLE KEYS */;
INSERT INTO `prodmota` VALUES (1,'Procesador'),(2,'TxartGrafik'),(3,'plaka'),(4,'disko'),(5,'ram'),(6,'Raton'),(7,'Kasko'),(8,'Teklatu'),(9,'pantaia'),(10,'Portatil');
/*!40000 ALTER TABLE `prodmota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `Id` int NOT NULL,
  `Usuario` varchar(255) DEFAULT NULL,
  `Contraseña` varchar(255) DEFAULT NULL,
  `Permiso` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'laura_garcia','1111',1),(1,'laura_garcia','1111',0),(1,'laura_garcia','1111',0),(2,'maria_sanchez','2222',1),(3,'carlos_rodriguez','3333',0),(4,'laura_martinez','4444',1),(5,'david_perez','5555',0),(6,'elena_gonzalez','6666',0),(7,'miguel_ruiz','7777',0),(8,'marta_lopez','8888',1),(9,'javier_sanchez','9999',1),(10,'laura_gonzalez','1112',0),(11,'sergio_perez','1113',1),(12,'ana_martinez','1114',0),(13,'daniel_gonzalez','1115',1),(14,'elena_sanchez','1116',0),(15,'francisco_martinez','1117',0),(16,'daniel_martinez','1118',0),(17,'francisco_gimenez','1119',0),(18,'alba_blanco','2221',1),(19,'esther_hermoso','2223',1),(20,'juan_perez','2224',0),(21,'maria_gonzalez','2225',1),(22,'carlos_martinez','2226',0),(23,'laura_lopez','2227',0),(24,'pedro_sanchez','2228',0),(25,'elena_fernandez','2229',1),(26,'miguel_rodriguez','3331',0),(27,'marta_gomez','3332',1),(28,'david_ruiz','4441',1),(29,'ana_perez','3334',1),(30,'laura_garcia','3335',1),(1,'laura_garcia','1111',0),(2,'maria_sanchez','2222',1),(3,'carlos_rodriguez','3333',0),(4,'laura_martinez','4444',1),(5,'david_perez','5555',0),(6,'elena_gonzalez','6666',0),(7,'miguel_ruiz','7777',0),(8,'marta_lopez','8888',1),(9,'javier_sanchez','9999',1),(10,'laura_gonzalez','1112',0),(11,'sergio_perez','1113',1),(12,'ana_martinez','1114',0),(13,'daniel_gonzalez','1115',1),(14,'elena_sanchez','1116',0),(15,'francisco_martinez','1117',0),(16,'daniel_martinez','1118',0),(17,'francisco_gimenez','1119',0),(18,'alba_blanco','2221',1),(19,'esther_hermoso','2223',1),(20,'juan_perez','2224',0),(21,'maria_gonzalez','2225',1),(22,'carlos_martinez','2226',0),(23,'laura_lopez','2227',0),(24,'pedro_sanchez','2228',0),(25,'elena_fernandez','2229',1),(26,'miguel_rodriguez','3331',0),(27,'marta_gomez','3332',1),(28,'david_ruiz','4441',1),(29,'ana_perez','3334',1),(30,'laura_garcia','3335',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-07 14:59:38
