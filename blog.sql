-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 06:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `img`, `approve`, `created_at`, `updated_at`, `user_id`, `category_id`) VALUES
(1, 'Eric Clapton', '<p><span class=\"artistName\">Eric Patrick Clapton </span>was born on 30 March 1945 in his grandparents&rsquo; home at 1 The Green, Ripley, Surrey, England. He was the son of 16-year-old Patricia Molly Clapton (b. 7 January 1929, d. March 1999) and Edward Walter Fryer (b. 21 March 1920, d. 1985), a 24-year-old Canadian soldier stationed in England during World War II. Before Eric was born, Fryer returned to his wife in Canada.</p>\r\n<p>It was extraordinarily difficult for an unmarried 16-year-old to raise a child on her own in the mid-1940s. Pat&rsquo;s parents, Rose and Jack Clapp, stepped in as surrogate parents and raised Eric as their own. Thus, he grew up believing his mother was his sister. His grandparents never legally adopted him, but remained his legal guardians until 1963. Eric&rsquo;s last name comes from Rose&rsquo;s first husband and Pat&rsquo;s father, Reginald Cecil Clapton (d. 1933).</p>', 'eric-big.jpg', 1, '2020-01-24 13:15:28', '2020-01-27 12:59:56', 1, 1),
(2, 'carlos santana', '<p>Born on July 20, 1947, in Autl&aacute;n de Navarro, Mexico, Carlos Santana moved to San Francisco in the early 1960s, where he formed the Santana Blues Band in 1966. The band, later simply known as Santana, signed a contract with Columbia Records, with Carlos becoming the consistent front man. Throughout the 1970s and early \'80s, Santana released a string of successful albums such as <em>Abraxas</em>, <em>Lotus</em> and&nbsp;<em>Amigos</em>, making a big comeback in 1999 with the Grammy-winning&nbsp;<em>Supernatural</em>. In 2009, he received a Billboard Lifetime Achievement Award and several years later became a Kennedy Center Honors recipient. More recent albums have included&nbsp;<em>Coraz&oacute;n&nbsp;</em>and <em>Santana IV</em>.</p>', 'santana-big.jpg', 1, '2020-01-24 13:15:28', '2020-01-27 13:01:30', 1, 1),
(3, 'Jimi hendrix', '<p>Jimi Hendrix learned to play guitar as a teenager and grew up to become a rock legend who excited audiences in the 1960s with his innovative electric guitar playing. One of his most memorable performances was at Woodstock in 1969, where he performed \"The Star-Spangled Banner.\" Hendrix died in 1970 from drug-related complications, leaving his mark on the world of rock music and remaining popular to this day.</p>', 'jimi_hendrix.jpg', 1, '2020-01-24 13:15:28', '2020-01-27 13:03:09', 1, 1),
(4, 'Vida Marković', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere quasi blanditiis commodi quo numquam deserunt obcaecati perferendis sint, illum veritatis optio omnis minima facilis vitae tenetur dolorum veniam sapiente. Facilis ad itaque necessitatibus ullam, voluptatibus possimus suscipit atque voluptate rem?', 'vida.jpg', 1, '2020-01-24 13:15:28', '2020-01-24 13:37:23', 1, 2),
(5, 'Vera Marković', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum officiis ratione architecto tempore nam aliquid maxime debitis illo! Suscipit, quae doloremque. Error eaque ipsum illum voluptatem mollitia? Sapiente, aut quo debitis unde, quisquam neque iure obcaecati, alias dicta molestiae maxime!', 'vera.jpg', 1, '2020-01-24 13:15:28', '2020-01-24 13:37:25', 1, 3),
(6, 'Pavle Vujisić', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sit amet interdum tellus. Sed et bibendum massa. Proin pellentesque ligula et magna sagittis, non ultrices turpis aliquam. Duis ut ante eu tortor iaculis sagittis. Nam aliquet hendrerit elit id suscipit. Maecenas eget augue non sapien consectetur ullamcorper quis vitae mauris. Suspendisse blandit a lacus ac lacinia. In aliquet, felis ac rutrum commodo, enim mauris venenatis metus, eget ultrices eros quam ut sapien. Mauris nibh justo, tincidunt quis dui eu, condimentum condimentum turpis. Vestibulum congue consectetur eros, id consequat risus varius quis. Aenean vehicula ligula eget elit sagittis, ut hendrerit mi aliquam. Maecenas nec venenatis mauris. Suspendisse accumsan ligula tristique, porta mauris ac, egestas purus. Sed molestie finibus fermentum.', 'Bogdan.jpg', 1, '2020-01-25 08:31:50', '2020-01-25 08:31:54', 1, 2),
(9, 'Jim Jarmusch', '<p>Renowned as an independent filmmaker, director and actor, Jim Jarmusch has evolved as cult figure in cinema of the 20th and the 21st century. All his life he has made films with the sole purpose of seeking pure artistic satisfaction, rather than commercial benefits and is one of very few film personalities who have been successful in independent cinema. During his career spanning over more than three decades, he has come up with a number of award-winning films which have helped him carve a niche in the present day film industry and have also gained him an international audience. His films enjoy a special status in the European nations and also in Japan and have made a permanent impression on the filmgoers there. Breaking away from conventional filmmaking, Jarmusch intends to create a world of cinema which is a pure work of art, free of any commercial interests. Like many budding filmmakers and actors, this filmmaker had a rough beginning and had to face the acidic reviews from critics and disapproval of the audience for his debut movie. Undeterred by any such obstacles, he went on to produce his next film, which was a huge success and earned him favorable reviews. Since then, his career has been on a rise and he has been hailed as one of the finest independent filmmakers all across the globe.</p>', 'Jim-Jarmusch.png', 1, '2020-01-27 13:11:47', '2020-01-27 13:11:51', 1, 2),
(10, 'Steven Spielberg', '<p>Academy Award-winning director, screenwriter and producer Steven Spielberg is known for films such as \'Jaws,\' \'E.T.,\' \'The Color Purple\' and \'Schindler\'s List,\' among many others.</p>\r\n<p>Steven Spielberg was an amateur filmmaker as a child. He went on to become the enormously successful and Academy Award-winning director of such films as <em>Schindler\'s List</em>, <em>The Color Purple</em>, <em>E.T.: The Extra-Terrestrial,&nbsp;</em><em>Saving Private Ryan</em>,&nbsp;<em>Catch Me If You Can</em>,&nbsp;<em>Lincoln&nbsp;</em>and <em>Bridge of Spies</em>. In 1994, he co-founded the studio Dreamworks SKG, which was purchased by Paramount Pictures in 2005.</p>', 'steven_spelberg.jpg', 1, '2020-01-27 13:15:31', '2020-01-27 13:15:40', 1, 2),
(11, 'Michael Jordan', '<p>Michael Jordan is a former American basketball player who led the Chicago Bulls to six NBA championships and won the Most Valuable Player Award five times.</p>\r\n<p>Michael Jeffrey Jordan is a professional American basketball player, Olympic athlete, businessperson and actor. Considered one of the best basketball players ever, he dominated the sport from the mid-1980s to the late 1990s. </p>\r\n<p>Jordan led the Chicago Bulls to six National Basketball Association championships and earned the NBA\'s Most Valuable Player Award five times. With five regular-season MVPs and three All-Star MVPs, Jordan became the most decorated player in the NBA.</p>', 'michal_jordan.jpg', 1, '2020-01-27 13:22:13', '2020-01-27 13:30:57', 1, 3),
(12, 'Kobe Bryant', '<p>Former pro basketball player Kobe Bryant won five NBA titles with the Los Angeles Lakers while establishing himself as one of the game\'s all-time greats. He died tragically in a helicopter crash on January 26, 2020.</p>\r\n<p>Kobe Bryant spent his early years in Italy and joined the NBA straight out of high school. A dominant scorer, Bryant won five NBA championships and the 2008 MVP Award with the Los Angeles Lakers. Although later seasons were marred by injuries, he surpassed <a href=\"https://www.biography.com/people/michael-jordan-9358066\">Michael Jordan</a> for third place on the NBA all-time scoring list in December 2014 and retired in 2016 after scoring 60 points in his final game. In 2018, Bryant earned an Academy Award for Best Animated Short Film for <em>Dear Basketball</em>.</p>', 'cobe_brayant.jpg', 1, '2020-01-27 13:32:22', '2020-01-27 13:50:11', 1, 3),
(13, 'Diego Maradona', '<p>Soccer great Diego Maradona led Argentina to victory in the 1986 World Cup, though his accomplishments were later overshadowed by his battles with drug abuse.</p>\r\n<p>Diego Maradona is an Argentinean soccer legend who is widely regarded as one of the best players of all time. Maradona led club teams to championships in Argentina, Italy and Spain, and famously starred for the Argentinean team that won the 1986 World Cup. However, the soccer legend\'s career was marred by a pair of high-profile suspensions for drug use, and he has often battled health problems in retirement.</p>', 'maradona.jpg', 1, '2020-01-27 13:43:01', '2020-01-27 13:50:10', 1, 3),
(14, 'Lionel Messi', '<p>Lionel Messi is a soccer player with FC Barcelona and the Argentina national team. He has established records for goals scored and won individual awards en route to worldwide recognition as one of the best players in soccer.</p>\r\n<p>Luis Lionel Andres (&ldquo;Leo&rdquo;) Messi is an Argentinian soccer player who plays forward for the <a href=\"https://www.fcbarcelona.com/en/club\" target=\"_blank\" rel=\"noopener\">FC Barcelona club</a> and the Argentina national team. At the age of 13, Messi moved from Argentina to Spain after FC Barcelona agreed to pay for his medical treatments. </p>\r\n<p>There he earned renown as one of the greatest players in history, helping his club win more than two dozen league titles and tournaments. In 2012, he set a record for most goals in a calendar year, and in 2019, he was named Europe\'s Ballon d\'Or winner for the sixth time.</p>', 'mesi.jpg', 1, '2020-01-27 16:25:04', '2020-01-27 16:25:07', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Music', '2020-01-24 13:15:28', '2020-01-24 13:15:28'),
(2, 'Film', '2020-01-24 13:15:28', '2020-01-24 13:15:28'),
(3, 'Sport', '2020-01-24 13:15:28', '2020-01-24 13:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_13_104943_create_categories_table', 1),
(5, '2020_01_13_105611_create_articles_table', 1),
(6, '2020_01_13_110434_create_comments_table', 1),
(7, '2020_01_21_191206_create_comment_replies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `img`, `remember_token`, `created_at`, `updated_at`, `usertype`) VALUES
(1, 'Miloš Marković', 'milos@gmail.com', NULL, '$2y$10$ivpshT62wMLHDAOcxaxgZ.5wlq3Dx3EFuYKJWc3hszyT6vOMjCEJK', 'Milos.jpg', NULL, '2020-01-24 13:15:27', '2020-01-24 13:15:27', 1),
(2, 'Đorđe Marković', 'djoka@gmail.com', NULL, '$2y$10$/J6dvLd4.QrNIUPIceLpQ.y20KkTJbg1NMc9n8MbkFv/yzx2XsQGG', 'Djordje.jpg', NULL, '2020-01-24 13:15:28', '2020-01-24 13:15:28', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_article_id_foreign` (`article_id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replies_user_id_foreign` (`user_id`),
  ADD KEY `comment_replies_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD CONSTRAINT `comment_replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
