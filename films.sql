-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Чрв 13 2022 р., 21:13
-- Версія сервера: 10.4.21-MariaDB
-- Версія PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `films`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(1, 'Сімейний'),
(2, 'Історичний'),
(3, 'Фентезі'),
(4, 'Детектив'),
(5, 'Комедія'),
(8, 'Романтичний'),
(9, 'Екшн'),
(10, 'Мультфільм'),
(11, 'Жахи');

-- --------------------------------------------------------

--
-- Структура таблиці `characteristic`
--

CREATE TABLE `characteristic` (
  `characterId` int(11) NOT NULL,
  `characterName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `characteristic`
--

INSERT INTO `characteristic` (`characterId`, `characterName`) VALUES
(1, 'Легкий'),
(2, 'Цікавий'),
(3, 'Напружений'),
(4, 'Драма');

-- --------------------------------------------------------

--
-- Структура таблиці `movies`
--

CREATE TABLE `movies` (
  `movieId` int(11) NOT NULL,
  `movieName` varchar(100) NOT NULL,
  `description` longtext DEFAULT NULL,
  `movieImg` varchar(200) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `characterId` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `trailer` varchar(200) NOT NULL,
  `frame` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `movies`
--

INSERT INTO `movies` (`movieId`, `movieName`, `description`, `movieImg`, `categoryId`, `characterId`, `year`, `trailer`, `frame`) VALUES
(1, 'Обі-Ван Кенобі / Obi-Wan Kenobi', ' Спін-офф із франшизи «Зоряних війн», присвяченої майстру-джедаю Обі-Вану Кенобі. Події розгорнуться через десять років після того, що сталося в «Помсті сітхів», коли Обі-Ван Кенобі доставив немовля Люка Скайуокера на Татуїн.', 'image/poster.jpg', 3, 2, 2022, 'https://www.youtube.com/watch?v=ycvTGepXzpU', '/image/films/Obi-Wan_Kenobi'),
(2, 'Порятунок Рубі / Rescued by Ruby', 'Поліцейський прагне служити в елітному підрозділі К-9 і бере в напарниці собаку з притулку - розмуну, але дуже норовливу Рубі. Засновано на реальних подіях.', 'image/films/rescueRubi.jpg', 1, 1, 2022, 'https://www.youtube.com/watch?v=YDMHVnXnP38', '/image/films/Rescued_by_Ruby'),
(5, 'Фантастичні звірі: Злочини Ґріндельвальда / Fantastic Beasts: The Crimes of Grindelwald', 'Продовження пригод у магічному потерріани. Ньют Скамандер разом із МАКОСША (Магічний Конгрес США) зумів полонити неймовірно небезпечного темного чарівника Гелерта Гріндельвальда. Не дивлячись на всі запобіжні заходи, маг усе-таки зміг утекти. Цей ув\'язнення ще більше запалило в ньому бажання правити світом. Гріндевальд зібрав навколо себе тих, хто як і він жадає влади, хто хоче правити маглами. Проти такого розвитку подій ще один могутній чарівник – Альбус Дамблдор. Разом зі своїм колишнім студентом Ньютом Скамандером, він готовий ризикнути всім, щоб зупинити Гріндевальда. Магічний світ усе більше під загрозою. Навіть найстійкіші відносини пройдуть величезні випробування', 'image/films/fantasticBeasts.jpg', 1, 2, 2018, 'https://www.youtube.com/watch?v=0lR38rWHCvo', '/image/films/Fantastic_Beasts'),
(6, 'Післязавтра / The Day After Tomorrow', 'Земля знаходиться на порозі глобальної катастрофи - починається новий Льодовиковий Період. Землетруси, цунамі, урагани загрожують існуванню людства. Основна дія відбувається в Нью-Йорку, який потрапляє в блокаду льодовиків, що насуваються. Близкість катастрофи вимушує ученого-кліматолога, що намагається знайти спосіб зупинити глобальне потеплення, відправитися на пошуки зниклого сина до Нью-Йорку.', 'image/films/afterTomorrow.jpg', 1, 3, 2004, 'https://www.youtube.com/watch?v=HUBDFoMNXzA', '/image/films/The_Day_After_Tomorrow'),
(7, 'Усе гаразд / Everybody\'s Fine', 'Овдовілий пенсіонер усвідомлює, що довгі роки саме його дружина зв\'язувала воєдино їхнє велике сімейство. Щоб самому ближче дізнатися, як живуть його діти, він відправляється відвідати їх - і під час імпровізованої подорожі по домівках своїх нащадків відкриває для себе багато несподіваного...', 'image/films/everyfine.jpg', 1, 4, 2009, 'https://www.youtube.com/watch?v=PrHctNO_p0s', '/image/films/Everybody\'s_Fine'),
(8, 'Чемпіон / Secretariat', 'Неймовірна історія про коня по кличці Секретаріат, який в 1973 році зміг зробити те, що нікому не вдавалося протягом 25 років - виграти підряд три найпрестижніших кінні перегони з серії \"Потрійна Корона\".\r\n', 'image/films/chempion.jpg', 2, 1, 2010, 'https://www.youtube.com/watch?v=UKmuvjL2cVw', '/image/films/Secretariat'),
(9, 'Порятунок містера Бенкса / Saving Mr. Banks', 'Історія екранізації класичного художнього фільму «Мері Поппінс». Коли Волт Дісней пообіцяв своїм донькам зняти фільм за їхньою улюбленою книгою, казкою Памели Треверс «Мері Поппінс», він навіть не підозрював, що на виконання цієї обіцянки йому знадобиться більше двадцяти років. У спробі отримати права на екранізацію книги, Волт зіткнувся зі норовливою британською письменницею, яка ніяк не хотіла, щоб її улюблена героїня була «зіпсована» голлівудським підходом до створення фільмів. Лише на початку шістдесятих вона погодилася особисто приїхати в Лос -Анджелес і почати переговори щодо екранізації. Поки тривали переговори з письменницею Дісней перепробував всі хитрощі: він презентував ідеї та ескізи до фільму, намагався вразити письменницю чудовою музикою і влаштовував екскурсії до Діснейленду. Проте Треверс не погоджувалась ні на які вмовляння і знаменитий кінематографіст мало не відмовився від свого задуму.', 'image/films/saveBanks.jpg', 2, 2, 2013, 'https://www.youtube.com/watch?v=pzI-nC5KjlI', '/image/films/Saving_Mr.Banks'),
(10, 'Ворог біля воріт / Enemy at the Gates', '1942 рік, розпал Сталінградської битви. Німецьке командування направляє на передову свого кращого стрільця, майора Кеніга, з особливим завданням. Він єдиний, хто може спробувати впоратися з російським «ангелом смерті» - невловимим снайпером Василем Зайцевим. Зайцев - легенда і ікона для захисників Сталінграду. Між двома унікальними снайперами починається смертельна сутичка, переможцем з якої вийти лише одному.', 'image/films/enemy.jpg', 2, 3, 2001, 'https://www.youtube.com/watch?v=4O-sMh_DO6I', '/image/films/Enemy_at_the_Gates'),
(11, 'Спогади про майбутнє / Testament of Youth', 'Нерозлучні друзі Роланд, Віктор, Едвард і його сестра Віра будують плани на майбутнє. Віра, всупереч волі батьків, нарівні з юнаками вступає до Оксфорду та хоче стати письменницею. Між Вірою і Роландом виникають почуття, більші за дружбу. Але всі мрії доведеться відкласти на потім через початок війни. Тепер місце хлопців на фронті, а Віра, прагнучи зробити свій внесок у перемогу, вирушає працювати медсестрою у військовий шпиталь.', 'image/films/testament.jpg', 2, 4, 2014, 'https://www.youtube.com/watch?v=VLiLInoOod0', '/image/films/Testament_of_Youth'),
(12, 'Людина-павук / Spider-Man', 'Пітер Паркер, якого не поважали однолітки і полюбляли знущатись над ним, його кращий друг Гарі Осборн, син директора компанії \"Оскорп\", та таємне кохання Пітера і його сусідка Мері-Джейн Уотсон відвідували з групою учнів лабораторію генетиків. Там Пітера вкусив генетично модифікований павук. Вранці ж Пітер виявляє, що у нього покращився зір (до того він був короткозорим) та сильні м\'язи. У школі він знаходить ще декілька нових можливостей: продукування павутиння та надшвидкі реакції, які допомагають йому перемогти у бійці. Після втечі зі школи, він починає повзати по стінам та перестрибувати з даху на дах. Незабаром грабіжник застрелює його дядька Бена. Незадовго до своєї смерті він сказав Пітеру фразу, яка, хоч і не зразу, назавжди змінила його життя: \"Велика сила вимагає великої відповідальності\". Пітер вирішує боротися зі злочинністю і стати справжнім супергероєм — Людиною-павуком. Для цього він створює собі костюм і починає діяти. Разом з появою Людини-павука у місті з\'являється супер лиходій — Зелений Гоблін, під маскою якого ховається Норман Осборн, батько найкращого друга Пітера. Чи вдасться Пітеру здолати свого ворога?..', 'image/films/spider-man.jpg', 3, 1, 2002, 'https://www.youtube.com/watch?v=62-AuUoFlHA', '/image/films/Spider-Man'),
(13, 'Зоряний пил / Stardust', 'Маленьке англійське селище відокремлене стародавньою стіною від надприродного паралельного всесвіту, де панують магія і чаклунство. Молодий Тристан Торн необачно обіцяє найкрасивішій дівчині селища, що принесе їй зірку, що злетіла з неба і впала по той бік стіни. На своїй дорозі слідами прадавніх легенд Тристан зустріне всесильного короля і його змовника-сина, могутню відьму, капітана піратського корабля і хитромудрого торговця, а також знайде свою дійсну любов, ключ до розуміння своєї суті і долі, про яку він міг лише мріяти.', 'image/films/stardust.jpg', 3, 2, 2007, 'https://www.youtube.com/watch?v=8fsi_QqU5j8', '/image/films/Stardust'),
(14, 'Мумія / The Mummy', 'Головний герой фільму – елітний боєць ВМС США Тайлер Нік Мортон. Виконуючи бойове завдання в Іраку, він знаходить таємний бункер, захований в пісках. Але замість очікуваного ворога – бойовиків – Мортон зустрічає там мумію. Її життя було відняте не справедливо і передчасно. Тепер вона готова помститися людству за століття жахів, які їй довелося пережити.', 'image/films/mummy.jpg', 3, 3, 2017, 'https://www.youtube.com/watch?v=GnaQw62n26A', '/image/films/The_Mummy'),
(15, 'Дружина мандрівника в часі / The Time Traveler\'s Wife', 'Вони познайомились, коли їй було шість, а йому — тридцять шість. Вони одружилися, коли їй було двадцять три, а йому тридцять один. Тому що Генрі страждає рідкісним генетичним захворюванням — синдромом переміщення у часі; його зникнення із життя Клер непередбачувані, появи — комічні, травматичні і трагічні одночасно.', 'image/films/timetravelWife.jpg', 3, 4, 2009, 'https://www.youtube.com/watch?v=aoYXtKF_g1Y', '/image/films/The_Time_Traveler\'s_Wife'),
(16, 'Круті чуваки / The Nice Guys', 'Що буває, коли напарником брутального чувака стає субтильний лопух? Найманий охоронець Джексон Гілі і приватний детектив Голланд Марч змушені працювати в парі, щоб розплутати нікчемну справу про зниклу дівчину, яка обертається злочином століття. Чи зможуть хлопці розгадати складний ребус, якщо у кожного з них — свої, дуже індивідуальні, методи...', 'image/films/niceGuys.jpg', 4, 1, 2016, 'https://www.youtube.com/watch?v=vAGsBn3pZ7A', '/image/films/The_Nice_Guys'),
(17, 'Престиж / The Prestige', 'Роберт Енжер і Альфред Борден - фокусники-ілюзіоністи, які на межі XIX і XX століть змагалися один з одним в Лондоні. З роками їх дружня конкуренція на професійному ґрунті переростає в справжню війну. Вони готові на все, щоб вивідати один у одного секрети фантастичних трюків і зірвати їх виконання. Непримиренна ворожнеча, що спалахнула між ними, починає загрожувати життю людей, що їх оточують…', 'image/films/thePrestige.jpg', 4, 2, 2006, 'https://www.youtube.com/watch?v=RLtaA9fFNXU', '/image/films/The_Prestige'),
(18, 'Незбагненне / Unthinkable', 'Психологічна дуель поміж захопленим терористом, який погрожував підірвати три ядерні заряди в різних кінцях країни, та слідчим ФБР, котрому тепер терміново потрібно дізнатись, де саме заховані бомби, доки ті не вибухнули. Чи справді терорист каже правду? Чи сам він знає, де ті бомби? І чи не варто заради життя багатьох людей переступити моральні правила та норми закону, аби жорстокістю переламати впертість злочинця?', 'image/films/unthinkable.jpg', 4, 3, 2010, 'https://www.youtube.com/watch?v=eSwOzbO9WIo', '/image/films/Unthinkable'),
(19, 'Живий товар / Human Trafficking', '16-річна українка Надя тікає з дому, спокусившись роботою у модельному агентстві на Заході, і її сліди губляться. У Південно-Східній Азії викрадають 12-річну американку Ені, що приїхала з сім\'єю на відпочинок. У Празі зникає мати-одиначка Хелена, спокушена багатим бізнесменом. У Румунії після зустрічі з нареченим, з яким познайомилася по Інтернету, зникає 17-річна Катерина. Ці дівчата розділяють долю тисяч подруг по нещастю. Їх відвезли до Європи або Америки, але всі вони стають секс-рабинями. Детектив Кейт Морозов і співробітник імміграційної служби Біл Міхена намагаються врятувати беззахисних жертв і покарати їхніх бездушних поневолювачів...', 'image/films/human.jpg', 4, 4, 2005, 'https://www.youtube.com/watch?v=Ym8QJUxqU9Y', '/image/films/Human_Trafficking');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `userName` varchar(15) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Індекси таблиці `characteristic`
--
ALTER TABLE `characteristic`
  ADD PRIMARY KEY (`characterId`);

--
-- Індекси таблиці `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieId`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблиці `characteristic`
--
ALTER TABLE `characteristic`
  MODIFY `characterId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `movies`
--
ALTER TABLE `movies`
  MODIFY `movieId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
