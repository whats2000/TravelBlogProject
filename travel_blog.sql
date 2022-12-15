-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-12-15 06:36:22
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `travel_blog`
--

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `id` int(32) NOT NULL,
  `for_post` int(32) NOT NULL,
  `position` tinyint(2) NOT NULL,
  `title` text NOT NULL,
  `picture` text NOT NULL,
  `description` text NOT NULL,
  `display` enum('normal','no_pic_normal','card') NOT NULL,
  `edit_time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `article`
--

INSERT INTO `article` (`id`, `for_post`, `position`, `title`, `picture`, `description`, `display`, `edit_time`) VALUES
(1, 1, 1, 'Overview', '', '<p>Hsinchu City, located in the northwest of Taiwan, is the central city of the Hsinchu Metropolitan Area. The whole city is divided into 3 districts,Xiangshan District, North District, and East District. Hsinchu City is an important center of the global high-tech foundry industry. In the early 1980s, the Hsinchu Science and Technology Industrial Park was established here, attracting investment from a large number of domestic and international manufacturers and emigrating much high-tech manpower, which accelerated the development of Taiwan&#39;s high-tech industry.&nbsp;Hsinchu City is an ancient city in northern Taiwan, also known as &quot;Wind City&quot;. The food is mainly Taiwanese cuisine (representatives around the Temple of Hsinchu City Deity), which is a fusion of provincial cuisine and Hakka cuisine. Famous local snacks include Hsinchu tribute balls, rice noodles, meatballs, oyster omelets, rice noodles, beef noodles, and steamed buns. Most of the snacks are concentrated in the Chenghuang Temple and the Beimen Street business district in the urban area. Both &quot;National Tsing Hua University&quot; and &quot;National Yang Ming Chiao Tung University&quot; are located in Hsinchu City.</p>\r\n', 'normal', '2022-12-11 03:04:27.000000'),
(2, 1, 2, 'Hsinchu Moat Park', 'article_1_1.png', '<p>That is an arrangement made for the arrival of Christmas near the Hsinchu Moat Park. When the festival came in 2020, festive decorations were around the East Gate in the center of Hsinchu City, and even several art installations appeared in the buildings near the roundabout. The scenery in the photo is the bridge on the moat at night.</p>  <p>On a quiet night, I strolled along the moat. A light wind blew through the ends of my hair, and the lights hit the road along the way. I could not hear the motor and locomotive whizzing past me. The annoyance in my heart left like the ebb tide of the sea under my feet.</p>', 'normal', '2022-12-08 19:56:50.000000'),
(3, 1, 3, 'The Flying Bird is Dancing on the Bridge', 'article_1_2.png', '<p>The white plastic leaves are like flying birds embellished by the night color in the rainbow light, dancing in the air, forming a rare city scene.</p>', 'card', '2022-12-11 01:35:14.000000'),
(4, 1, 4, 'Big City Department Store', 'article_1_3.png', '<p>Near the Hsinchu Moat Park are the famous Hsinchu Railway Station with Japanese architectural features and the business district. Many trendy shops and food are waiting for people to enjoy. Of course, McDonald&#39;s and KFC also opened in the crowd in front of the train station. From the train station, walk 20 minutes to see the Big City Department Store. In Taiwan, the number of check-ins at the Big City is second only to that at Taiwan Taoyuan International Airport. It is where people in Hsinchu will check in during holidays or dinners with friends and colleagues.</p>', 'normal', '2022-12-11 02:13:06.000000'),
(5, 2, 1, 'Overview', '', '<p>Kaohsiung City is a municipality directly under the Central Government of the Republic of China and one of the six capitals of Taiwan. Because Kaohsiung Port in the city center is the largest port in Taiwan, it is often referred to as &quot;Port City&quot; in Taiwanese colloquialisms. The city has a registered population of about 2.72 million, making it the third-largest city in Taiwan and the largest city in southern Taiwan. Since the era of Japanese rule, Kaohsiung has become a port city and military center with many heavy industries. It is listed as the development center of southern Taiwan along with Tainan City.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(6, 2, 2, 'Transportation', '', '<p>The main components of public transportation in Kaohsiung City include railway trains, buses, passenger transportation, taxis, ferries, and cruise ships for sightseeing around the harbor. Among them, rail transportation is the main public transportation tools in Kaohsiung City, including trains, high-speed railways, and MRT. In terms of international transportation, Kaohsiung Port and Kaohsiung International Airport are the main bases for sea and air transportation.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(7, 2, 3, 'Culture', '', '<p>The culture of Kaohsiung City is a product of the gradual compatibility of Western culture and Japanese culture on the basis of traditional culture. The introduction of modern industrial and commercial civilization and western culture has enabled Kaohsiung to embody unique phenomena in terms of food, music, art, and folk customs.</p>\r\n\r\n<p>In terms of art, the Kaohsiung City Government organizes activities such as the Kaohsiung Film Festival,Megaport Festival, and the Youth Innovative Design Festival, attracting outstanding cultural creatives and designers from across the country to participate in the grand event.</p>\r\n\r\n<p>In terms of folk customs, the painted oil-paper umbrellas in Meinong District and the shadow play troupes in various districts of Kaohsiung, combined with education and sightseeing, form an intangible cultural asset.</p>\r\n\r\n<p>In terms of festivals and festivals, Kaohsiung City&#39;s activities include Kaohsiung Lantern Festival, Megaport Festival, Neimen Song Jiang Battle Ritual, and other cultural and developmental activities, inviting people from home and abroad to participate in the grand event.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(8, 2, 4, 'KW2 in Kaohsiung', 'article_2_1.png', '<p>If travelers arrive at the Love River, they can take the light rail transit to visit KW2, Banana Pier, Pier 2 Art Zone, Kaohsiung Music Center, and other tourist attractions. Each attraction is only 5 minutes away at most from the others.The lights of Zhan Roku are sprinkled on the riverside from evening to night.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(9, 2, 5, 'Bar with Music', 'article_2_2.png', '<p>Passengers passing by enjoy the custom of the harbor city. At night, people with slightly drunk breaths dance to the music in the outdoor bar. Watching the children play with the merry-go-round and Ferris wheel, the passengers take the boats on the Love River to feel the night in a gentle atmosphere.</p>\r\n', 'card', '2022-12-11 15:34:45.000000'),
(10, 2, 6, 'Qieding Wetlands', 'article_2_3.png', '<p>Qieding Wetlands is located in Kaohsiung city. Every autumn, there will be a lot of migratory birds migrating from other places like east asia. Besides, almost half of the migratory birds will come to Taiwan, and Qieding wetlands is one of the places where migratory birds will stay. If you want to watch those migratory birds, you will need to stay at the Watching Pavilion.</p>\r\n\r\n<p>My sister is a graduate student from National&nbsp;hosted an event in Qieding wetlands, I decided to help them as a volunteer.</p>\r\n\r\n<p>Because I was the leader of a team, I can go inside the wetland. In the wetland, I see some special plants in the wetland,and some bird nests. Besides, I can enjoy some of the events like weaving using Kandelia obovata leaves and bird watching using a telescope.</p>\r\n', 'normal', '2022-12-11 15:34:45.000000'),
(11, 2, 7, 'Making milk fish balls', 'article_2_4.png', '<p>during the event, the visitors can make milk fish balls by their own, and I was there helping them.</p>', 'card', '2022-12-11 15:34:45.000000'),
(12, 3, 1, 'Overview', '', '<p>Kinmen County is a county in Fujian Province of the Republic of China, located at the mouth of the Jiulong River in Xiamen Bay. Kinmen County has 3 cities and 3 townships under its jurisdiction. Old name Wuzhou, also known as Xianzhou, Wujiang, Wudao. Kinmen has been under the jurisdiction of Tongan, Fujian since ancient times and was established as a county in the fourth year of the Republic of China (1915). The Kinmen dialect is widely spoken in the county (the Wuqiu dialect is spoken in Wuqiu), and both the Kinmen dialect and Taiwanese are Hokkien dialects and can communicate with each other. In the history of Tong&#39;an County, there is a saying in Kinmen that &quot;No gold, no silver&quot; and &quot;No gold, no bronze&quot;.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(13, 3, 2, 'Lieyu', 'article_3_1.png', '<p>Lieyu, also known as Little Kinmen, has beautiful sandy beaches, and biodiverse intertidal zones. Also, the famous Blue Tears can be seen here. In addition to the unique ecological aspects, we can see some wartime cultural reservations here. You can visit the memorial hall and bunker to learn about it. In addition, the specialty here is taro, which is quite suitable for purchase as a souvenir.</p>\r\n\r\n<p>During the summer vacation, my family and I traveled to Kinmen, and one of the trips was to take a boat to Leiyu. Unfortunately, it was noon at the time, so there was no chance to appreciate the Blue Tears due to the scorching sun. However, the bunkers there are quite interesting. There are even mine experience tunnels in one of those bunkers, which can make people feel the tension of the battlefield at that time. In addition, the coast there is quite beautiful, and the clear water sparkling in the sun is so beautiful and refreshing.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(14, 4, 1, 'Overview', '', '<p>Nantou County is a county in Taiwan in the Republic of China. It is located in the central part of Taiwan and lies in the middle of the island. It is the only landlocked county in Taiwan. The county seat, the largest city, the city with the highest population density and the transportation center is Nantou City. The indigenous people of the county include the Atayal, Seediq, Bunun, Tsou and Thao, who live at Sun Moon Lake. The highest mountain in Taiwan, Yushan Mountain, the largest natural lake, Sun Moon Lake, the source of the longest river, the Zhuoshui River, and the geographical center of Taiwan are all located in this county. Specialties include green plums, bananas, sugar cane,&nbsp;pottery and flowers.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(15, 4, 2, 'SongLong Rock Waterfall', 'article_4_1.png', '<p>SongLong Rock Waterfall is a waterfall near Sun Link Sea. The beautiful scenery makes it known as the first scene of Sun Link Sea. The cave next to the waterfall, which is caused by thermal expansion and contraction, is quite amazing. You can really see the amazing workmanship of nature, all the landscapes here are the result of continuous changes over thousands of years. In addition to the beautiful scenery, the air here is also quite good, in which the content of negative ions is quite high, which is quite good for the body.</p>\r\n\r\n<p>One day during the summer vacation, my family decided to visit Sun Link Sea. After arriving at the destination, you can feel the fresh local air with a little moisture and a little cold as soon as you get out of the car, which instantly makes us sane, and the drive for a few hours doesn&#39;t seem to exist and does not bring any fatigue.</p>\r\n\r\n<p>Unfortunately, this trip is planned for only two days and one night, so we can&#39;t visit all the attractions nearby, we can only choose a few of them, and Matsutakiyan Waterfall is one of our choices. In order to arrive at the waterfall more quickly and effortlessly, we took the tour bus in the park. After entering the trail, although we didn&#39;t enjoy the coldness and the slippery ground, the moment we saw the waterfall, we knew it was worth it. The unique and beautiful scenery here soothed our tired hearts, and the air here is even fresher than the place we park, which makes us much more energetic!</p>', 'normal', '2022-12-11 15:34:45.000000'),
(16, 4, 3, 'In the Hole by the Waterfall', 'article_4_2.png', '<p>The mighty force of nature has created such a spectacle, surrounded by lush greenery and clear water, forming a scene full of vitality.</p>', 'card', '2022-12-11 15:34:45.000000'),
(17, 5, 1, 'Overview', '', '<p>Pingtung is the southernmost county in Taiwan. Because it&#39;s located in a tropical area, the weather there is like spring all year. Pingtung has many beautiful scenery,like the first national park of Taiwan - Kenting national park and Dapeng Bay National Scenic Area. Besides, there are many delicious food in Pingtung, like braised pork knuckle in Wanluan and bluefin tuna in Donggang.</p>\r\n', 'normal', '2022-12-11 15:34:45.000000'),
(18, 5, 2, 'Longkeng', 'article_5_1.png', '<p>Longkeng is located in Cape Eluanbi and next to the Eluanbi Park. The terrain in Longkeng is composed of coral reefs, and with the erosion of the sea, there are cliff landslides, canyons and fringing reefs everywhere. Not only does Longkeng have special terrain, Longkeng also has many kinds of birds and reptiles.</p>\r\n\r\n<p>I went to Longkeng once, it&#39;s relaxing, and we followed the guide and listen to him introducing Longkeng. During the trip, I saw the special terrain in Longkeng and saw some special plants and animals. If you want to go there, remember that the place require reservation.</p>\r\n', 'normal', '2022-12-11 15:34:45.000000'),
(19, 6, 1, 'Overview', '', '<p>Taitung is located in the east of Taiwan. Because of its special terrain, we can see the beautiful nature landscape there. Besides, Taitung is famous for its agricultural products, like rice, tea leaves, sugarapple and orange daylily. What&#39;s more, because Taitung is where aboriginal peoples live, you can enjoy different cultures.</p>\r\n', 'normal', '2022-12-11 15:34:45.000000'),
(20, 6, 2, 'Alanyi Historic Trail', 'article_6_1.png', '<p>Alanyi Historic Trail is located between Daren Township in Taichung and Mudan Township in Pingtung. The Directorate General of Highways was planning to build Provincial Highway 26 on it, but they received protests from Environment groups, so they decided to give up. Alanyi Historic Trail is now a part of Xuhai-Guanyinbi Nature Reserve and will be protected by the law.</p>\r\n\r\n<p>I have been to Alanyi once during the field trip in senior high school. We had a two-day trip. On our first day, we went to Alanyi. We started at Taichung end and needed to go to Pingtung to finish the Historic Trail. The first part is a very steep slope, and we need to wear gloves to climb up using the rope. We decided to rest and eat lunch after we walked for a long time. After that, we continue the journey and walk through the beach. After several hours, we completed the historic trail.</p>\r\n', 'normal', '2022-12-11 15:34:45.000000'),
(41, 7, 1, 'Overview', '', '<p>Academia Sinica is located in Taipei, and it&rsquo;s the national academy of Taiwan. It&rsquo;s main mission is doing research of Humanities and Science, conduct and reward academic research and train academic researchers.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(42, 7, 2, 'A unique experience', 'article_7_1.png', '<p>I have been to Academia Sinica once, it was opened to everyone because there was a exhibition about the black hole. I watched many things in Academia Sinica, like a chat bot called&rdquo;Xiao-Yen&rdquo;, different health check equipments and other thing about machine learning. The most unique thing about the visit is the black hole exhibition. Even though I can&rsquo;t understand the commentary, it was still a unique experience.</p>\n', 'normal', '2022-12-11 15:34:45.000000'),
(43, 8, 1, 'Overview', '', '<p>National Tsing Hua University is located in Hsinchu. It was established as the Tsing Hua Academy at Tsing Hua Garden in Beijing in 1911, and was moved to Kunming because of the second sino-japanese war. In 1956, National Tsing Hua University was reinstalled on its current campus in Hsinchu, Taiwan.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(44, 8, 2, 'A visit of the historical University', 'article_8_1.png', '<p>I have been to National Tsing Hua University once because ofthe field trip in my senior high school. First, we went to the Life Science Building II and listen to their speech, after that, we visited the campus, and i saw a lot of building like the Delta Building. Besides,the campus is so big that I feel like I was in a park most of the time.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(45, 9, 1, 'Overview', '', '<p>National Taiwan University is located in Taipei, and there are different campus located in other county. National Taiwan University was called &rdquo;Taihoku Imperial University&rdquo; before 1945. Besides, National Taiwan University was the only university which has more than 30000 students.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(46, 9, 2, 'A trip with guide', 'article_9_1.png', '<p>In National Taiwan University, there was a guide tells me about the feature in National Taiwan University, like every department has its own badge, there is a bell called &rdquo;Fu bell&rdquo; and is the symbol of National Taiwan University.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(47, 10, 1, 'Overview', '', '<p>Jong Shyn Shipbuilding is located in Cijin, Kaohsiung. Its main product is steel and ship building. Besides, they decided to make yacht by their own. What&rsquo;s more, because our government decided to make our battleship on our own, and Jong Shyn Shipbuilding is building those ships.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(50, 10, 2, 'An introduction of the ship makers', 'article_10_1.png', '<p>I was there because the course I chose this semester, and Jong Shyn Shipbuilding was one of the destinations we visited. Because the course was about Corporate Social Responsibility, Jong Shyn Shipbuilding introduced about their policy of it. After that, I had a chance to visit the inside of Jong Shyn. Inside, I saw many workers building a ship. What&rsquo;s more, there was a pretty old ship require repair, and the guide told us about the ship: the ship is used to smuggling oil from other country.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(51, 11, 1, 'Overview', '', '<p>The hardware street was located in Yancheng, Kaohsiung. The street has a lot of history behind it: Yancheng was famous for its salt, because of the increase of the population and the build of Takao port, Yancheng became a salt settlement.</p>\r\n\r\n<p>During World War II, the US army want to paralyze Japan and break those ships. After the war, the government decided to reuse those ship parts, they announce a law about those ship parts. Because of the law, there was a lot of hardware shop, and was called the hardware street.</p>', 'normal', '2022-12-11 15:34:45.000000'),
(52, 11, 2, 'The quiet street', 'article_11_1.png', '<p>I decided to visit the hardware street to make the Chinese project. The project has an article connected to the hardware street, and the article is about the past of the street and the busy life in there. Because I went to there on Sunday, almost all of the shop was closed. The view was completely about those described in the article, and makes me think about those traditional industry, will they disappear after a few years?</p>\r\n', 'normal', '2022-12-11 15:34:45.000000'),
(57, 14, 2, 'Overview', 'article_14_57_1671082403.png', '<p><strong>Farglory Ocean Park was located in Hualien. It&rsquo;s an amusement park with many amusement facilities, like the Ferris wheel, Pirate of El Dorado and Fly across the Ocean. The park is split into eight parts with different theme, like Discovery Island, Ocean Theater and Pirate&rsquo;s Bay.</strong></p>\r\n', 'normal', '2022-12-15 13:33:23.000000'),
(58, 14, 1, 'A refreshing experience', '', '<p><strong>I went to Farglory Ocean Park with my family because they wanted to go to Hualien, and the park is one of the destinations. Inside the park, I was amazed by the aquarium with different kinds of sea creatures. After that, my family decided to take a photo with the seal, and we enjoyed different amusement facilities there.</strong></p>\r\n', 'normal', '2022-12-15 13:33:39.000000');

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `id` int(32) NOT NULL,
  `post_id` int(32) NOT NULL,
  `email` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `email`, `content`) VALUES
(1, 2, 'hello@gmail.com', 'nice one\r\n'),
(2, 2, 'hello@gmail.com', 'sdfsdfeee'),
(3, 2, 'whats2000mc@gmail.com', 'nice\r\n'),
(4, 2, 'whats2000mc@gmail.com', 'very nice\r\n'),
(5, 2, 'whats2000mc@gmail.com', 'SHOTO\r\n'),
(6, 2, 'whats2000mc@gmail.com', 'huihsdufh'),
(7, 2, 'whats2000mc@gmail.com', 'Pretty Good post'),
(9, 2, 'whats2000mc@gmail.com', 'not bad\r\n'),
(10, 2, 'eddie20030808@yahoo.com.tw', 'Good picture'),
(16, 3, 'kh0109092@gmail.com', 'I love this');

-- --------------------------------------------------------

--
-- 資料表結構 `post`
--

CREATE TABLE `post` (
  `id` int(32) NOT NULL,
  `email` text NOT NULL,
  `picture` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `create_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `post`
--

INSERT INTO `post` (`id`, `email`, `picture`, `title`, `description`, `create_at`) VALUES
(1, 'hsiangm6@gmail.com', 'post_1_topic.png', 'Hsinchu', 'Let\'s Travel to Windy City in Taiwan !', '2022-12-08 18:40:02.000000'),
(2, 'hsiangm6@gmail.com', 'post_2_topic.png', 'Kaohsiung', 'Let\'s Travel to Port City in Taiwan !', '2022-12-11 15:29:55.000000'),
(3, 'youngatisis@gmail.com', 'post_3_topic.png', 'Kinmen', 'Let\'s Travel to Marine Park in Taiwan !', '2022-12-11 15:29:55.000000'),
(4, 'youngatisis@gmail.com', 'post_4_topic.png', 'Nantou', 'Let\'s Travel to Inland in Taiwan !', '2022-12-11 15:29:55.000000'),
(5, 'kh0109092@gmail.com', 'post_5_topic.png', 'Pingtung', 'Let\'s Travel to the South of the Taiwan !', '2022-12-11 15:29:55.000000'),
(6, 'kh0109092@gmail.com', 'post_6_topic.png', 'Taitung', 'Let\'s Travel to the east in Taiwan !', '2022-12-11 15:29:55.000000'),
(7, 'kh0109092@gmail.com', 'post_7_topic.png', 'Academia Sinica', 'The research center of Taiwan.', '2022-12-13 15:29:55.000000'),
(8, 'kh0109092@gmail.com', 'post_8_topic.png', 'NTHU', 'Into a university with a long history.', '2022-12-13 15:29:55.000000'),
(9, 'kh0109092@gmail.com', 'post_9_topic.png', 'NTU', 'The most popular university among all students.', '2022-12-13 15:29:55.000000'),
(10, 'kh0109092@gmail.com', 'post_10_topic.png', 'Jong Shyn', 'A visit to the ship maker .', '2022-12-13 15:29:55.000000'),
(11, 'kh0109092@gmail.com', 'post_11_topic.png', 'Hardware street', 'The track of history.', '2022-12-13 15:29:55.000000'),
(14, 'eddie20030808@yahoo.com.tw', 'post_14_pic_1671082381.png', 'Fish park', 'I like the great sun on beach', '2022-12-15 13:33:01.000000');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(32) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `icon` text NOT NULL,
  `about` text NOT NULL,
  `permission` enum('admin','user') NOT NULL DEFAULT 'user',
  `create_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `icon`, `about`, `permission`, `create_at`) VALUES
(23, 'whats2000mc@gmail.com', '<?php A1?>', 'whats2000', 'user_23_icon_1670938201.png', '<p>I am the main developer of the website, thank you for visiting my profile. Nice to see you.</p>\r\n', 'user', '2022-12-13 09:27:05.000000'),
(24, 'youngatisis@gmail.com', '123456789W@', 'Young', 'user_24_icon_1670938713.png', '<p>Hi, I&#39;m a student from NSYSU.</p>\r\n', 'user', '2022-12-13 09:33:43.000000'),
(25, 'hsiangm6@gmail.com', 'EL\'12345', 'EL', 'user_25_icon_1671076822.png', '<p>A coder is running the code.</p>\r\n', 'user', '2022-12-15 11:56:15.000000'),
(26, 'kh0109092@gmail.com', '<?php A1?>', 'kh010909', 'user_26_icon_1671078629.png', '<p>Hello everyone&nbsp;o/</p>\r\n\r\n<p>I&#39;m kyle,and my contribution about this project is rendering and deleting article.</p>\r\n\r\n<p>Thank you so much for visiting my page!</p>', 'user', '2022-12-15 12:11:10.000000'),
(29, 'eddie20030808@yahoo.com.tw', 'A!123456', 'web', '', '', 'user', '2022-12-15 01:32:26.000000');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`(32));

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `article`
--
ALTER TABLE `article`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `post`
--
ALTER TABLE `post`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
