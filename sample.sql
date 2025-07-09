-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2025 at 12:55 AM
-- Server version: 10.11.9-MariaDB-ubu2204
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `back_backlink_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `disavow_backlink`
--

CREATE TABLE `disavow_backlink` (
  `id` bigint(20) NOT NULL,
  `backlink` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_page_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anchor_tag` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `disavow_backlink`
--

INSERT INTO `disavow_backlink` (`id`, `backlink`, `my_page_url`, `anchor_tag`, `status`) VALUES
(1, 'https://freightrainband.com/blogs/latest-news/posts/freightrain-s-tiny-desk-submission', 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'Approved'),
(2, 'http://www.reliantdrilling.com/prerequisites-academic-composing/#comment-936538', 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', ' Blouse Designs ideas to rock in 2021.', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `webinformer_all_pages`
--

CREATE TABLE `webinformer_all_pages` (
  `id` int(20) NOT NULL,
  `page_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `webinformer_all_pages`
--

INSERT INTO `webinformer_all_pages` (`id`, `page_url`, `page_title`, `page_type`) VALUES
(53, 'https://fashionaminoo.com/', 'Fashionaminoo.Com', 'Page'),
(54, 'https://fashionaminoo.com/prakash-raj-marriage-anniversary/', '56 Years Old Actor Prakash Raj GOT MARRIED AGAIN With Pony & Photos Viral On Social Media', 'Post'),
(55, 'https://fashionaminoo.com/guneet-grewal-biography/', 'Guneet Grewal biography,parmish’s wife,wiki,age,family,liberal,canada,networth', 'Post');

-- --------------------------------------------------------

--
-- Table structure for table `webinformer_backlink`
--

CREATE TABLE `webinformer_backlink` (
  `id` bigint(20) NOT NULL,
  `my_link` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `backlink` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anchor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anchor_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `backlink_category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `DA` int(20) NOT NULL,
  `PA` int(20) NOT NULL,
  `backlink_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `referring_domains` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `webinformer_backlink`
--

INSERT INTO `webinformer_backlink` (`id`, `my_link`, `backlink`, `anchor`, `anchor_type`, `link_type`, `backlink_category`, `create_date`, `DA`, `PA`, `backlink_status`, `referring_domains`, `active_status`) VALUES
(138, 'https://fashionaminoo.com/guneet-grewal-biography/', 'https://www.peoplepedia.org/share-your-life-story', 'guneet grewal age', 'Text', 'DoFollow', 'Commenting', '22/09/2021', 0, 0, 'Approved', 'www.peoplepedia.org', ''),
(139, 'https://fashionaminoo.com/guneet-grewal-biography/', 'https://www.peoplepedia.org/how-meet-friends-online-in-your-area', 'guneet grewal wikipedia', 'Text', 'DoFollow', 'Commenting', '22/09/2021', 0, 0, 'Approved', 'www.peoplepedia.org', ''),
(140, 'https://fashionaminoo.com/', 'https://bookme.name/riyaranavat', ' Fashionaminoo.com', 'Text', 'DoFollow', 'Profile', '23/09/2021', 56, 31, 'Approved', 'bookme.name', ''),
(141, 'https://fashionaminoo.com/guneet-grewal-biography/', 'https://bookme.name/riyaranavat', 'biographies ', 'Text', 'DoFollow', 'Profile', '23/09/2021', 56, 31, 'Approved', 'bookme.name', ''),
(142, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'https://bookme.name/riyaranavat', 'here', 'Text', 'DoFollow', 'Profile', '23/09/2021', 56, 31, 'Approved', 'bookme.name', ''),
(143, 'https://fashionaminoo.com/guneet-grewal-biography/', 'https://englishbaby.com/findfriends/gallery/detail/2377890', 'guneet-grewal', 'Text', 'DoFollow', 'Profile', '24/09/2021', 55, 53, 'Approved', 'englishbaby.com', ''),
(144, 'https://fashionaminoo.com/', 'https://englishbaby.com/findfriends/gallery/detail/2377890', 'Fashionaminoo.com', 'Text', 'NoFollow', 'Profile', '24/09/2021', 55, 53, 'Approved', 'englishbaby.com', ''),
(145, 'https://fashionaminoo.com/', 'https://www.themesindep.com/support/forums/users/riya/', ' fashion & lifestyle', 'Text', 'DoFollow', 'Profile', '24/09/2021', 34, 25, 'Approved', 'www.themesindep.com', ''),
(146, 'https://fashionaminoo.com/', 'http://wiznotes.com/UserProfile/tabid/84/userId/1131094/Default.aspx', 'fashion & lifestyle,celebrity', 'Text', 'DoFollow', 'Profile', '24/09/2021', 45, 36, 'Approved', 'wiznotes.com', ''),
(147, 'https://fashionaminoo.com/guneet-grewal-biography/', 'http://wiznotes.com/UserProfile/tabid/84/userId/1131094/Default.aspx', 'more', 'Text', 'DoFollow', 'Profile', '24/09/2021', 45, 31, 'Approved', 'wiznotes.com', ''),
(148, 'https://fashionaminoo.com/open-hairstyles-for-saree/', 'https://members2.boardhost.com/businessbooks6/index.html?1632491619', '21+ hair styling ideas ', 'Text', 'DoFollow', 'Commenting', '24/09/2021', 43, 28, 'Approved', 'members2.boardhost.com', ''),
(149, 'https://redirect.viglink.com/?format=go&jsonp=vglnk_163249222959310&key=95548d06b1f9b524a1f5ab6f4eac193f&libId=ktyfpmu401000d5p000DLjmpoe06h&loc=https%3A%2F%2Fmembers2.boardhost.com%2Fbusinessbooks6%2', 'https://members2.boardhost.com/businessbooks6/msg/1632490809.html', ' visit here', 'Text', 'DoFollow', 'Commenting', '24/09/2021', 43, 28, 'Approved', 'members2.boardhost.com', ''),
(150, ' https://fashionaminoo.com/', 'https://www.wpgmaps.com/forums/users/riya/', ' https://fashionaminoo.com/', 'Text', 'NoFollow', 'Profile', '24/09/2021', 41, 28, 'Approved', 'www.wpgmaps.com', ''),
(151, 'https://fashionaminoo.com/', 'https://regenbox.org/en/forums/users/riya/', 'https://fashionaminoo.com/', 'Text', 'NoFollow', 'Profile', '24/09/2021', 42, 29, 'Approved', 'regenbox.org', ''),
(152, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'https://regenbox.org/en/forums/users/riya/', 'Blouse Designs ideas', 'Text', 'NoFollow', 'Profile', '24/09/2021', 42, 29, 'Approved', 'regenbox.org', ''),
(153, 'https://fashionaminoo.com/', 'https://www.checkli.com/riyaranavat123', 'visit my website', 'Text', 'DoFollow', 'Profile', '24/09/2021', 43, 28, 'Approved', 'www.checkli.com', ''),
(154, 'https://fashionaminoo.com/', 'https://www.muttsworldmine.com/forums/user/400241-riya/', 'https://fashionaminoo.com/', 'Text', 'DoFollow', 'Profile', '24/09/2021', 40, 26, 'Approved', 'www.muttsworldmine.com', ''),
(155, 'https://fashionaminoo.com/', 'https://pastebin.com/u/riya4550', 'https://fashionaminoo.com/', 'Text', 'NoFollow', 'Profile', '24/09/2021', 90, 40, 'Approved', 'pastebin.com', ''),
(156, 'https://fashionaminoo.com/', 'https://os.mbed.com/users/riyaranavat/', 'https://fashionaminoo.com/', 'Text', 'NoFollow', 'Profile', '24/09/2021', 66, 33, 'Approved', 'os.mbed.com', ''),
(157, 'https://fashionaminoo.com/sharara-suit-design-for-girls/', 'http://vuyhair.com/Blog/78_How-to-Style-Long-Hair-Beach-Waves-Messy-Bun.html', ' hairstyle for sharara', 'Text', 'DoFollow', 'Commenting', '25/09/2021', 11, 18, 'Approved', 'vuyhair.com', ''),
(158, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'https://poneys-france.fr/drapeau/#comment-2244242', ' designer blouses 2021 ', 'Text', 'NoFollow', 'Commenting', '25/09/2021', 18, 25, 'Approved', 'poneys-france.fr', ''),
(159, 'https://fashionaminoo.com/', 'https://poneys-france.fr/drapeau/#comment-2244242', 'POOJA RANAVAT', 'Text', 'NoFollow', 'Commenting', '25/09/2021', 18, 25, 'Approved', 'poneys-france.fr', ''),
(160, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'http://www.intosomerset.co.uk/news/multimillion-pound-funding-bridgwater-fabric-maker-announced', 'Trendy Blouses ', 'Text', 'DoFollow', 'Commenting', '25/09/2021', 30, 19, 'Approved', 'www.intosomerset.co.uk', ''),
(161, 'https://fashionaminoo.com/', 'http://www.intosomerset.co.uk/news/free-business-support-somerset-social-enterprises', ' fashionaminoo ', 'Text', 'DoFollow', 'Commenting', '25/09/2021', 30, 19, 'Approved', 'www.intosomerset.co.uk', ''),
(162, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'http://www.intosomerset.co.uk/news/cider-company-secures-export-contracts', ' boat neck blouse designs', 'Text', 'DoFollow', 'Commenting', '25/09/2021', 30, 19, 'Approved', 'www.intosomerset.co.uk', ''),
(163, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'https://cinecrowd.com/en/we-hebben-het-gehaald-12?page=15#comment-459357', '/https://fashionaminoo.com/boat-neck-blouse-designs-2021/\">', 'Text', 'DoFollow', 'Commenting', '25/09/2021', 50, 27, 'Approved', 'cinecrowd.com', ''),
(164, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'https://cinecrowd.com/en/news-update-times-0?page=1#comment-459360', 'trendy designer blouses  ', 'Text', 'DoFollow', 'Commenting', '25/09/2021', 50, 27, 'Approved', 'cinecrowd.com', ''),
(165, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'https://my.talladega.edu/ICS/_portletview_/Academics/BUS/BUS__368/2016_FA-BUS__368-FT/Coursework.jnz?portlet=Coursework&screen=StudentAssignmentFacultyView&screenType=change&id=a90a6172-b795-4733-85c3', ' boat neck with keyhole blouse  ', 'Text', 'DoFollow', 'Commenting', '25/09/2021', 48, 29, 'Approved', 'my.talladega.edu', ''),
(166, 'https://fashionaminoo.com/', 'https://richardadamslaw.com/caption/#comment-19783', 'Riya', 'Text', 'NoFollow', 'Commenting', '25/09/2021', 22, 21, 'Approved', 'richardadamslaw.com', ''),
(167, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'https://richardadamslaw.com/caption/#comment-19783', 'silk saree modern boat neck blouse designs', 'Text', 'NoFollow', 'Commenting', '25/09/2021', 22, 21, 'Approved', 'richardadamslaw.com', ''),
(168, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'http://loveiswhoweare.com/2018/another-publication-this-time-more-straight-to-the-point-should', ' golden boat neck blouse', 'Text', 'DoFollow', 'Commenting', '26/09/2021', 12, 26, 'Approved', 'loveiswhoweare.com', ''),
(169, 'https://fashionaminoo.com/', 'http://loveiswhoweare.com/2018/another-publication-this-time-more-straight-to-the-point-should', 'riya', 'Text', 'DoFollow', 'Commenting', '26/09/2021', 12, 24, 'Approved', 'loveiswhoweare.com', ''),
(170, 'https://fashionaminoo.com/', 'https://www.seanrayford.com/blog/2018/11/photos-central-american-refugee-camp-in-tijuana', 'riya', 'Text', 'DoFollow', 'Commenting', '21/11/2021', 29, 25, 'Approved', 'www.seanrayford.com', ''),
(171, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'https://www.reliantdrilling.com/a-background-in-major-details-of-mail-order-brides/#comment-934127', 'my latest post', 'Text', 'NoFollow', 'Commenting', '21/11/2021', 0, 0, 'Approved', 'www.reliantdrilling.com', ''),
(172, 'https://fashionaminoo.com/', 'https://play.eslgaming.com/player/myinfos/17395378/', 'nothing', 'Text', 'DoFollow', 'Profile', '23/11/2021', 80, 34, 'Approved', 'play.eslgaming.com', ''),
(173, 'https://fashionaminoo.com/guneet-grewal-biography', 'https://play.eslgaming.com/player/myinfos/17395378/', 'nothing', 'Text', 'DoFollow', 'Profile', '23/11/2021', 80, 34, 'Approved', 'play.eslgaming.com', ''),
(174, 'https://fashionaminoo.com/boat-neck-blouse-designs', 'https://play.eslgaming.com/player/myinfos/17395378/', 'nothing(koi anchor h nai)', 'Text', 'DoFollow', 'Profile', '23/11/2021', 80, 43, 'Approved', 'play.eslgaming.com', ''),
(175, ' https://fashionaminoo.com/', 'https://www.noteflight.com/profile/e61ee3cc43c96feea8ca2fc315715e1b8581afce', ' https://fashionaminoo.com/', 'Text', 'NoFollow', 'Profile', '23/11/2021', 60, 33, 'Approved', 'www.noteflight.com', ''),
(177, 'https://fashionaminoo.com/guneet-grewal-biography/', 'https://freightrainband.com/blogs/latest-news/posts/freightrain-live-nominated-for-a-ima', 'https://fashionaminoo.com/guneet-grewal-biography/', 'Text', 'DoFollow', 'Commenting', '23/11/2021', 12, 18, 'Approved', 'freightrainband.com', ''),
(179, 'http://www.reliantdrilling.com/prerequisites-academic-composing/#comment-936538', 'http://www.reliantdrilling.com/prerequisites-academic-composing/#comment-936538', 'Blouse Designs ideas to rock in 2021.', 'Text', 'DoFollow', 'Commenting', '06/07/2025', 12, 52, 'Approved', 'www.reliantdrilling.com', ''),
(180, 'https://fashionaminoo.com/boat-neck-blouse-designs-2021/', 'https://richardadamslaw.com/caption/#comment-19783', 'silk saree modern boat neck blouse designs', 'Text', 'DoFollow', 'Commenting', '07/07/2025', 20, 35, 'Approved', 'richardadamslaw.com', ''),
(181, 'https://fashionaminoo.com/guneet-grewal-biography/', 'https://freightrainband.com/blogs/latest-news/posts/freightrain-live-nominated-for-a-ima', 'https://fashionaminoo.com/guneet-grewal-biography/', 'Text', 'DoFollow', 'Commenting', '07/07/2025', 52, 51, 'Approved', 'freightrainband.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disavow_backlink`
--
ALTER TABLE `disavow_backlink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webinformer_all_pages`
--
ALTER TABLE `webinformer_all_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webinformer_backlink`
--
ALTER TABLE `webinformer_backlink`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disavow_backlink`
--
ALTER TABLE `disavow_backlink`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `webinformer_all_pages`
--
ALTER TABLE `webinformer_all_pages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `webinformer_backlink`
--
ALTER TABLE `webinformer_backlink`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
