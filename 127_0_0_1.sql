-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 04:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax`
--
CREATE DATABASE IF NOT EXISTS `ajax` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ajax`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `message`) VALUES
(1, 'Quadri', 'I will be among the best programmer in the World'),
(2, 'Fuhad', ' I love this'),
(3, 'Akin', 'This is Awesome'),
(4, 'Tunde', 'Am a super star'),
(5, 'Akanbi', 'I love Allah'),
(6, 'Ashake', 'I love this'),
(7, 'Ayinke', 'I love PHP'),
(8, 'Ajayi', 'I love Ajax'),
(9, 'OLA', 'I code with PHP'),
(10, 'QUdus', 'I code Ajax'),
(11, 'Qadr', 'I love it so much');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Database: `blog_website`
--
CREATE DATABASE IF NOT EXISTS `blog_website` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blog_website`;

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `about_name` varchar(200) NOT NULL,
  `about_title` varchar(100) NOT NULL,
  `about_description` text NOT NULL,
  `about_meta_description` text NOT NULL,
  `about_meta_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `about_name`, `about_title`, `about_description`, `about_meta_description`, `about_meta_keyword`) VALUES
(1, 'About Us', 'About Quadri-BlogWebsite ', 'Quadri-BlogWebsite is a techie website. is a website created to help programmer and naive programmer. in this website they are a lots of article with step by step tutorials.', 'Quadri-BlogWebsite is a techie blogging website. is a website created to help programmer and naive programmer. in this website they are a lots of article with step by step tutorials.', 'Quadri-blogwebsite'),
(2, 'Mission and Vission', 'Mission and Vission', 'Our mission as a techie blogwebite is to give you the best tutorial content. ', 'Our mission as a techie blogwebite is to give you the best tutorial content. ', 'mission, vission');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `category_slug` varchar(200) NOT NULL,
  `category_description` text NOT NULL,
  `category_meta_keyword` varchar(200) NOT NULL,
  `category_meta_description` text NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_created_by` varchar(100) NOT NULL,
  `category_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `category_slug`, `category_description`, `category_meta_keyword`, `category_meta_description`, `category_name`, `category_created_by`, `category_date`) VALUES
(14, 'html-tutorial', '&lt;p&gt;html tutorial&lt;/p&gt;', 'Html tutorial, Html crash course', 'html tutorial', 'HTML', 'Quadri', '2022-06-03 11:41:31'),
(15, 'php-crash-course-for-beginners', 'PHP is a hypertext preproccesor language', 'Php tutorial, Php crash course', 'PHP is a hypertext preproccesor language', 'PHP', 'Quadri', '2022-06-03 11:42:52'),
(16, 'javascript-tutorial', 'Javascript is a powerful language', 'javascript tutorial, javascript crash course', 'PHP is a hypertext preproccesor language', 'JAVASCRIPT', 'Quadri', '2022-06-03 11:44:12'),
(17, 'phython-tutorial', 'Phython is wonderful', 'phython tutorial, phython for beginners', 'Phython is wonderful', 'PHYTHON', 'Quadri', '2022-06-03 11:46:23'),
(18, 'ajax-tutorial-for-beginners', 'Ajax is good for php. ASYNC JAVASCRIPT', 'ajax tutorial, ajax for beginners', 'Ajax is good for php. ASYNC JAVASCRIPT', 'AJAX', 'Quadri', '2022-06-03 11:47:39'),
(19, 'jquery-crash-courses', '&lt;p&gt;Jquery is async javascript&lt;/p&gt;', 'jquery tutorial, jquery crash courses', '<p>Jquery is async javascript</p>', 'JQUERY', 'Quadri', '2022-06-03 11:48:47'),
(21, 'programming', '&lt;p&gt;programming&lt;/p&gt;', 'programming', 'programming', 'Programming', 'Quadri', '2022-06-13 09:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_slug` varchar(200) NOT NULL,
  `post_meta_keyword` mediumtext NOT NULL,
  `post_meta_description` text NOT NULL,
  `post_created_by` varchar(100) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_image` varchar(200) NOT NULL,
  `post_description` text NOT NULL,
  `post_published` tinyint(4) NOT NULL,
  `post_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `category_id`, `user_id`, `post_slug`, `post_meta_keyword`, `post_meta_description`, `post_created_by`, `post_title`, `post_image`, `post_description`, `post_published`, `post_created_at`) VALUES
(1, 14, 1, 'html-tutorial', 'html', 'html is a scripting language', 'Quadri', 'Html crash course for beginner', '1655126154_post-sq-5.jpg', 'Quis molestiae, dolorem consequuntur labore perferendis enim accusantium commodi optio, sequi magnam ad consectetur iste omnis! Voluptatibus, quia officia esse necessitatibus magnam tempore reprehenderit quo aspernatur! Assumenda, minus dolorem repellendus corporis corrupti quia temporibus repudiandae in. Sit rem aut, consectetur repudiandae perferendis nemo alias, iure ipsam omnis quam soluta, nobis animi quis aliquam blanditiis at. Dicta nemo vero sequi exercitationem.  Architecto ex id at illum aperiam corporis, quidem magnam doloribus non eligendi delectus laborum porro molestiae beatae eveniet dolor odit optio soluta dolores! Eaque odit a nihil recusandae, error repellendus debitis ex autem ab commodi, maiores officiis doloribus provident optio, architecto assumenda! Nihil cum laboriosam eos dolore aliquid perferendis amet doloremque quibusdam odio soluta vero odit, ipsa, quisquam quod nulla Consequuntur corrupti fugiat quod! Ducimus sequi nemo illo ad necessitatibus amet nobis corporis et quasi. Optio cum neque fuga. Ad excepturi magnam quisquam ex voluptatibus vitae aut nam quidem doloribus, architecto perspiciatis sit consequatur pariatur alias animi expedita quas? Et doloribus voluptatibus perferendis qui fugiat voluptatum autem facere aspernatur quidem quae assumenda iste, sit similique, necessitatibus laborum magni. Ea, dolores!. Possimus temporibus rerum illo quia repudiandae provident sed quas atque. Ipsam adipisci accusamus iste optio illo aliquam molestias? Voluptatibus, veniam recusandae facilis nobis perspiciatis rem similique, nisi ad explicabo ipsa voluptatum, inventore molestiae natus adipisci? Fuga delectus quia assumenda totam aspernatur. Nobis hic ea rem, quaerat voluptate vero illum laboriosam omnis aspernatur labore, natus ex iusto ducimus exercitationem a officia. ', 1, '2022-06-03 22:54:12'),
(2, 15, 2, 'select-from-database-in-php', 'php', 'select from database in php', 'Quadri', 'Select from database in php', '1654605369_post-landscape-2.jpg', 'So far you have learnt how to create database and table as well as inserting data. Now it\'s time to retrieve data what have inserted in the preceding tutorial. The SQL SELECT statement is used to select the records from database tables. Its basic syntax is as follows:', 1, '2022-06-03 23:32:48'),
(3, 16, 2, 'javascript-tutorial', 'javascript', 'javascript tutorial', 'Quadri', 'Javascript Tutorial', '1654605421_post-portrait-6.jpg', 'Can I teach myself JavaScript?\r\nYou can learn JavaScript without a Computer Science degree.\r\n\r\nYou can even have a successful career in software without a Comupter Scrience degree. JavaScript is simply one step in the entire process of becoming a good developer. Have faith in yourself — even if you tried many things but failed — because you can do it.', 1, '2022-06-03 23:34:40'),
(4, 17, 2, 'python-tutorial-for-beginners', 'python', 'Python is a powerful general-purpose programming language.', 'Quadri', 'Python Tutorial for Beginners', '1654605463_post-landscape-7.jpg', 'Python is a powerful general-purpose programming language. It is used in web development, data science, creating software prototypes, and so on. Fortunately for beginners, Python has simple easy-to-use syntax. This makes Python an excellent language to learn to program for beginners.\r\n\r\nOur Python tutorial will guide you to learn Python one step at a time.\r\n\r\nDon\'t know how to learn Python, the right way? Enroll in our Interactive Python Course for FREE.', 1, '2022-06-03 23:36:47'),
(8, 18, 2, 'form-validation-using-ajax', 'ajax, form validation', 'AJAX (Asynchronous JavaScript and XML) is the art of exchanging data with a server, and updating parts of a web page – without reloading the whole page. ', 'Quadri', ' Form Validation Using Ajax', '1654605502_post-sq-1.jpg', 'AJAX (Asynchronous JavaScript and XML) is the art of exchanging data with a server, and updating parts of a web page – without reloading the whole page. Therefore, Ajax makes web page quick responsive.\r\n\r\nWe have already explained about form validation using different technologies. Now, the same can be done by using Ajax, In this blog post we will tell you how it can be done.\r\n\r\nWe have created an HTML form with four input fields and validation of each field is done by using combine logic of Ajax, PHP and Javascript.\r\n\r\nWe have used The onreadystatechange Event of Ajax in our javascript file. All you have to do is just follow our codes or download it to use.\r\n\r\n\r\n ', 1, '2022-06-07 09:53:47'),
(11, 21, 2, 'http-protocol', 'HTTP Protocol', 'HTTP Protocol', 'Ibrahim', 'HTTP Protocol', '1655118587_post-landscape-2.jpg', '&lt;p&gt;HTTP Protocol&lt;br&gt;&lt;/p&gt;', 1, '2022-06-13 12:09:47'),
(12, 15, 1, 'why-php', 'why,php', 'PHP is a general purpose language. it stands for PHP Hypertext Preprocessor', 'Quadri', 'Why PHP', '1664398930_post-portrait-3.jpg', 'PHP is a general purpose language. it stands for PHP Hypertext Preprocessor', 1, '2022-09-28 22:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `blog_users`
--

CREATE TABLE `blog_users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin,2=superadmin\r\n',
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_users`
--

INSERT INTO `blog_users` (`id`, `admin`, `username`, `email`, `password`, `date`) VALUES
(1, 1, 'Quadri', 'abdulquadri.aq@gmail.com', '$2y$10$xiODIreDLizDvbC8xFS0Z.cocaIvER9XAomYYpEME2u4dG4cLxTb6', '2022-06-12 15:00:34'),
(2, 1, 'Ibrahim', 'ibrahim@gmail.com', '$2y$10$Sox7WAkPBtD8zVjvoHGg7uA3pPg0328wwiao4cuQV9ZaZ5wbo2bjC', '2022-06-13 10:47:24'),
(6, 1, 'Shakiru', 'shakiru@gmail.com', '$2y$10$jzqoTbrg8JvtIQkPz8T8ZO.JvGwF2OjNsqVVJpriOo1LJoKVA9RUq', '2022-06-13 11:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `post_slug` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_slug`, `name`, `message`, `date`) VALUES
(1, 'python-tutorial-for-beginners', 'oluwadamilare quadri', 'Good Content! ', '2022-06-12 14:17:07'),
(2, 'select-from-database-in-php', 'shakiru sulayman', 'Wow !! thanks.', '2022-06-12 14:17:52'),
(3, 'javascript-tutorial', 'gafar', 'Fantastic content!', '2022-06-12 14:18:30'),
(4, 'form-validation-using-ajax', 'quadri', 'Keep it up', '2022-06-12 14:18:51'),
(5, 'jquery-tutorial', 'shakiru', 'I love this content', '2022-06-12 14:19:25'),
(6, 'html-tutorial', 'Afeez', 'A good html content for beginners. Keep ot up.\r\n', '2022-06-12 14:23:36'),
(7, 'select-from-database-in-php', 'oluwadamilare quadri', 'Fantastic', '2022-07-11 23:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `home` varchar(60) NOT NULL,
  `blog` varchar(50) NOT NULL,
  `single_post` varchar(50) NOT NULL,
  `categories` varchar(50) NOT NULL,
  `about` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `home`, `blog`, `single_post`, `categories`, `about`, `contact`) VALUES
(1, 'Home', 'Blog', 'Single Post', 'Categories', 'About Us', 'Contact');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`category_name`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `blog_users`
--
ALTER TABLE `blog_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blog_users`
--
ALTER TABLE `blog_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `blog_post_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `blog_category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
--
-- Database: `chatbot`
--
CREATE DATABASE IF NOT EXISTS `chatbot` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chatbot`;

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `keywords` varchar(1000) NOT NULL,
  `programming_language` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `keywords`, `programming_language`) VALUES
(1, 'global,Keyword,abstract,and,break,callable,case,catch,class,const,continue,declare,default,echo,else,elseif,empty,endfor,endforeach,endif,endswitch,endwhile,extends,fn,for,foreach,function,goto,if,implements,include,include_once,isset,list,namespace,new,print,private,protected,public,require,require_once,return,static,switch,throw,trait,unset,while,PHP', 'PHP'),
(2, 'auto,break,case,char,const,continue,default,do,double,else,enum,extern,float,for,goto,if,int,long,register,return,short,signed,sizeof,static,struct,switch,typedef,union,unsigned,void,volatile,while,C', 'C'),
(3, 'False,await,else,import,pass,None,break,except,in,raise,True,class,finally,is,return,and,continue,for,lambda,try,def,from,nonlocal,while,assert,del,global,not,with,async,elif,if,or,PYTHON', 'PYTHON'),
(4, 'goto,In,instanceof,Static,finally,arguments,public,Do,else,Const,Function,class,return,let,Catch,Eval,For,if,This,try,Break,debugger,,extends,enum,Continue,export,null,switch,private,New,throw,while,Case,await,Delete,super,default,Void,Var,protected,Package,Interface,False,typeof,implements,With,import,True,JAVASCRIPT', 'JAVASCRIPT'),
(5, 'break,default,func,interface,select,case,defer,go,map,struct,chan,else,goto,package,switch,const,fallthrough,if,range,type,continue,for,import,return,var,GO', 'GO'),
(6, 'abstract,continue,for,package,this,assert,default,if,private,throw,boolean,double,implements,protected,throws,break,else,import,public,try,byte,enum,instanceof,return,void,case,extends,int,short,while,catch,final,interface,static,char,finally,long,super,class,float,new,switch,JAVA', 'JAVA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `chatroom`
--
CREATE DATABASE IF NOT EXISTS `chatroom` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chatroom`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_fullname` varchar(1000) NOT NULL,
  `user_email` varchar(1000) NOT NULL,
  `user_uid` varchar(1000) NOT NULL,
  `user_pwd` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_fullname`, `user_email`, `user_uid`, `user_pwd`) VALUES
(1, 'oluwadamilare quadri', 'quadri@gmail.com', 'quadri', '$2y$10$NRGyJXhJpmfOuzQHHtOxPe7jt9jrq4jRtBjZJ7DupHLDbsn9IiT/a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `crud_app`
--
CREATE DATABASE IF NOT EXISTS `crud_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crud_app`;

-- --------------------------------------------------------

--
-- Table structure for table `crud_app`
--

CREATE TABLE `crud_app` (
  `id` int(11) NOT NULL,
  `firstname` varchar(228) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `age` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud_app`
--

INSERT INTO `crud_app` (`id`, `firstname`, `lastname`, `age`) VALUES
(1, 'Peter', 'Parker', 12),
(2, 'oluwadamilare', 'Quadri', 0),
(3, 'oluwadamilare', 'Quadri', 32),
(4, 'Quadri', 'peter', 24),
(5, 'Quadri', 'peter', 24),
(6, 'ola', 'quadri', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_app`
--
ALTER TABLE `crud_app`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud_app`
--
ALTER TABLE `crud_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `db_ecormmerce`
--
CREATE DATABASE IF NOT EXISTS `db_ecormmerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_ecormmerce`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(70) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `email` varchar(75) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `gender`, `password`, `rank`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Quadri', 'Damilare', 'quadri@gmail.gom', 'male', '1234', NULL, NULL, '2022-10-21 14:09:03', '2022-10-21 14:09:03'),
(2, '', '', '', '', '', NULL, NULL, '2022-10-22 10:07:57', '2022-10-22 10:07:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`),
  ADD KEY `gender` (`gender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `dsite`
--
CREATE DATABASE IF NOT EXISTS `dsite` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dsite`;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `st_fname` varchar(128) NOT NULL,
  `st_matricno` varchar(128) NOT NULL,
  `st_falc` varchar(128) NOT NULL,
  `st_dpart` varchar(128) NOT NULL,
  `st_level` varchar(128) NOT NULL,
  `st_course` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `st_fname`, `st_matricno`, `st_falc`, `st_dpart`, `st_level`, `st_course`) VALUES
(3, 'oluwadamilare quadri', '190591232', 'science', 'COMPUTER SCIENCE', '100', 'PHY 120: OPTICS AND WAVES'),
(4, 'OLUWADAMILARE QUADRI', '190591231', 'science', 'COMPUTER SCIENCE', '200', 'CSC 104: SOFTWARE WORKSHOP 1'),
(6, 'gafar', '190591233', 'science', 'COMPUTER SCIENCE', '100', 'MATH 112: CALCULUS'),
(8, 'SHAKIRU SULAYMAN', '190591234', 'ART', 'POLITICAL SCIENCE', '100', 'CSC 112: COMPUTER ORGANIZATION'),
(10, 'SULAIMAN SEKINAT', '190591235', 'SCIENCE', 'COMPUTER SCIENCE', '200', 'MATH 112: CALCULUS'),
(11, 'SHAKIRU SULAYMAN', '195012326', 'ART', 'ACCOUNTING', '200', 'PHY 120: OPTICS AND WAVES'),
(12, 'QUADRI OLA', '190591238', 'SCIENCE', 'COMPUTER SCIENCE', '100', 'CSC 112: COMPUTER ORGANIZATION');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Database: `ecommerce`
--
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keyword` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `user_id`, `status`, `created_at`) VALUES
(1, 'Amazons', 'amazon', 'Amazon', 'Amazon', 'Amazon', 'Amazon', 1, 0, '2022-06-25 12:36:16'),
(2, 'Zomato', 'zomato', 'Zomato', 'Zomato', 'Zomato', 'Zomato', 1, 0, '2022-06-28 01:25:06'),
(3, 'Samsung', '-samsung', 'Samsung', 'Samsung', 'Samsung', 'Samsung', 1, 0, '2022-06-28 01:26:52'),
(4, 'Nike', 'nike', 'Nike', 'Nike', 'Nike', 'Nike', 1, 0, '2022-06-28 01:27:41'),
(5, 'Pepsi', 'pepsi', 'Pepsi', 'Pepsi', 'Pepsi', 'Pepsi', 1, 0, '2022-06-28 01:29:15'),
(6, 'Poetry', 'poetry', 'Poetry', 'Poetry', 'Poetry', 'Poetry', 1, 0, '2022-06-28 01:32:16'),
(7, 'Spotify', 'spotify', 'spotify', 'spotify', 'spotify', 'spotify', 3, 0, '2022-07-20 15:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_slug` varchar(100) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` varchar(200) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `user_id`, `name`, `slug`, `description`, `status`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`) VALUES
(6, '1', 'cloths', 'cloth', 'cloth', 0, 'cloth', 'cloth', 'cloth', '2022-06-25 17:19:00'),
(7, '1', 'Fruits', 'fruit', 'Fresh fruits', 0, 'Fruits', 'Fresh fruits', 'fruits', '2022-06-28 01:17:02'),
(8, '1', 'Juices', 'juices', 'sweet Juices', 0, 'Juices', 'sweet Juices', 'sweet,Juices', '2022-06-28 01:22:01'),
(9, '1', 'Vegetables', 'vegetables', 'Vegetables', 0, 'Vegetables', 'Vegetables', 'Vegetables', '2022-06-28 01:22:38'),
(10, '1', 'Books', 'books', 'Books', 0, 'Books', 'Books', 'Books', '2022-06-28 01:23:31'),
(11, '1', 'Television', 'television', 'Television', 0, 'Television', 'Television', 'Television', '2022-06-28 01:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_ip_address` varchar(120) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `gender` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_ip_address`, `firstname`, `lastname`, `email`, `admin`, `gender`, `password`) VALUES
(1, '::1', 'oluwadamilare', 'quadri', 'abdulquadri.aq@gmail.com', 1, 'male', '$2y$10$Bc911lpQihSpjgFhzgtHOuOTaNjQZa5vCztjg.K8uI40tnly0cgVC'),
(2, '::1', 'Damilare', 'Quadri', 'damilare@gmail.com', 0, 'male', '$2y$10$NemYf6KwQVmIk2RhlBAZ..aRYI1tGmSO31xJQtnffA5x2OJ8VGpWC');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(200) NOT NULL,
  `invoice_number` int(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_products` int(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `amount_due`, `invoice_number`, `date`, `total_products`, `status`) VALUES
(1, 1, 68, 1544319578, '2022-07-22 21:51:14', 2, 'complete'),
(2, 1, 68, 475766461, '2022-08-25 16:55:50', 2, 'complete'),
(3, 1, 136, 616851577, '2022-08-31 02:58:02', 2, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 1544319578, '68', 'netbanking', '2022-07-22 21:56:12'),
(2, 2, 475766461, '68', 'cashapp', '2022-08-31 02:59:12'),
(3, 3, 616851577, '136', 'paypal', '2022-08-31 03:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(200) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` int(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `status`) VALUES
(1, 1, 1544319578, 2, 1, 'pending'),
(2, 1, 475766461, 2, 1, 'pending'),
(3, 1, 616851577, 2, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `slug` mediumtext NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` mediumtext NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keyword` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `user_id`, `slug`, `price`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `image`, `created_at`) VALUES
(1, 7, 2, 'Orange', '1', 'orange', '23.00', 'orange', 'orange', 'orange', 'orange', 0, 'uploads/1vArDxkK/orange.jpg', '2022-07-22 21:00:13'),
(2, 6, 4, 'Cloth', '1', 'cloth', '45.00', 'cloth', 'cloth', 'cloth', 'cloth', 0, 'uploads/oqxT8TbD/polo1.jpg', '2022-07-22 21:01:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_slug`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `examdocket`
--
CREATE DATABASE IF NOT EXISTS `examdocket` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `examdocket`;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `user_first` varchar(128) NOT NULL,
  `user_last` varchar(128) NOT NULL,
  `user_dpart` varchar(128) NOT NULL,
  `user_level` varchar(128) NOT NULL,
  `user_matricno` varchar(128) NOT NULL,
  `user_course` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `user_first`, `user_last`, `user_dpart`, `user_level`, `user_matricno`, `user_course`) VALUES
(1, 'QUADRI', 'OLUWADAMILARE', 'COMPUTER SCIENCE', '200', '190591232', 'csc132'),
(2, 'OLUWADAMILARE', 'QUADRI', 'COMPUTER SCIENCE', '100', '190591232', 'course');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Database: `hotels`
--
CREATE DATABASE IF NOT EXISTS `hotels` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hotels`;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `available` varchar(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `per_room_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `available`, `floor`, `room_no`, `per_room_price`) VALUES
(1, 'Hotel A', 'false', '1', '1', 25.8),
(2, 'Hotel A', 'false', '1', '2', 25.8),
(3, 'Hotel A', 'true', '1', '3', 25.8),
(4, 'Hotel A', 'true', '1', '4', 25.8),
(5, 'Hotel A', 'false', '1', '5', 25.8),
(6, 'Hotel A', 'false', '2', '6', 30.1),
(7, 'Hotel  A', 'true', '2', '7', 35),
(8, 'Hotel B', 'true', '1', '1', 45.8),
(9, 'Hotel B', 'false', '1', '2', 45.8),
(10, 'Hotel B', 'true', '1', '3', 45.8),
(11, 'Hotel B', 'true', '1', '4', 45.8),
(12, 'Hotel B', 'false', '1', '5', 45.8),
(13, 'Hotel B', 'false', '2', '6', 49),
(14, 'Hotel B', 'false', '2', '7', 49);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Database: `image_upload`
--
CREATE DATABASE IF NOT EXISTS `image_upload` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `image_upload`;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `user_url` varchar(60) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `views` int(11) NOT NULL,
  `url_address` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `user_url`, `image`, `date`, `views`, `url_address`) VALUES
(1, 'Sun Flower', 'GnXbQ9jsX2bXyKHwNw0cw4irNMCP96sXHoSM5FxSzPqQyhhCYAka0nkjfriM', 'uploads/oexYxt41/img-10.jpg', '2022-08-14 13:08:50', 2, 'odckm6A3dIR96yxnwrUHy6D1SiByfSbolrXVxCO8vGfGB0y4iUXaoAzkRRAY'),
(2, 'Pinky', 'GnXbQ9jsX2bXyKHwNw0cw4irNMCP96sXHoSM5FxSzPqQyhhCYAka0nkjfriM', 'uploads/pagK0Mve/img-01-big.jpg', '2022-08-14 13:19:00', 1, 'SEraFn7a1roldA2Z1d1mG64VkkFLGAoIVOkUf5JCpVAeiPahtS0zJLVo2tqG'),
(3, 'lasu', 'GnXbQ9jsX2bXyKHwNw0cw4irNMCP96sXHoSM5FxSzPqQyhhCYAka0nkjfriM', 'uploads/WepRlinx/lasu.JPG.jpg', '2022-08-31 04:39:39', 0, '2m9EzjVYUT');

-- --------------------------------------------------------

--
-- Table structure for table `image_users`
--

CREATE TABLE `image_users` (
  `id` bigint(20) NOT NULL,
  `url_address` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_users`
--

INSERT INTO `image_users` (`id`, `url_address`, `email`, `password`, `date`, `image`) VALUES
(1, 'GnXbQ9jsX2bXyKHwNw0cw4irNMCP96sXHoSM5FxSzPqQyhhCYAka0nkjfriM', 'damilare@gmail.com', '12345678', '2022-08-13 18:25:11', '');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) NOT NULL,
  `title` varchar(60) NOT NULL,
  `user_url` varchar(60) NOT NULL,
  `video` varchar(90) NOT NULL,
  `views` int(11) NOT NULL,
  `url_address` varchar(60) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `user_url`, `video`, `views`, `url_address`, `date`) VALUES
(1, 'Hero', 'GnXbQ9jsX2bXyKHwNw0cw4irNMCP96sXHoSM5FxSzPqQyhhCYAka0nkjfriM', 'uploads_videos/pC0xoAA2/hero.mp4', 14, 'NZK8c1pDXq', '2022-08-14 15:55:46'),
(2, 'Clock', 'GnXbQ9jsX2bXyKHwNw0cw4irNMCP96sXHoSM5FxSzPqQyhhCYAka0nkjfriM', 'uploads_videos/mxImbsJg/2021-09-25 at 17-50-46.mp4', 5, 'E9y1kxftTW', '2022-08-14 16:51:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_url`),
  ADD KEY `image` (`image`),
  ADD KEY `date` (`date`),
  ADD KEY `views` (`views`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `image_users`
--
ALTER TABLE `image_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `password_2` (`password`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `title` (`title`),
  ADD KEY `user_url` (`user_url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image_users`
--
ALTER TABLE `image_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `imgupload`
--
CREATE DATABASE IF NOT EXISTS `imgupload` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `imgupload`;

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`id`, `userid`, `active`) VALUES
(21, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userfirst` varchar(128) NOT NULL,
  `userlast` varchar(128) NOT NULL,
  `userpwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userfirst`, `userlast`, `userpwd`) VALUES
(21, 'Abdul', 'quadri', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Database: `loginsystem`
--
CREATE DATABASE IF NOT EXISTS `loginsystem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `loginsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `useremail` varchar(128) NOT NULL,
  `useruid` varchar(128) NOT NULL,
  `userpwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `useremail`, `useruid`, `userpwd`) VALUES
(54, 'hassanat damilare', 'hassanat@gmail.com', 'hassanat', '$2y$10$tOmmWQH4NzR.09owzA2FP.mzi4qibya.Yxu2GWIO7iDVRWty6prLW'),
(55, 'oluwadamilare quadri', 'damilare@gmail.com', 'quadri', '$2y$10$4eb1XYAsWQ7dYAweViReOuRANGSk3eDoOm7ze5txkkQmcap0VV5H.'),
(56, 'yusuf ahmad', 'quadri@gmail.com', 'ahmad', '$2y$10$8.VvuRYAqatR/vEkS.gtreHpk58OvQyii5ODLgje8Uk03YUCS7xMK'),
(57, 'abdul', 'hafeez@gmail.com', 'hafeez', '$2y$10$oF/mcOktMF2sDKIIh70Mk.S/5Er9k6AxeWSIm1Y.PJ6ZhA4KEWpU.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- Database: `magazine_db`
--
CREATE DATABASE IF NOT EXISTS `magazine_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `magazine_db`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Hip Hop', '2022-09-10 11:05:44', '2022-09-11 09:59:10'),
(2, 'Religion', '2022-09-10 11:05:57', '2022-09-10 11:05:57'),
(3, 'Politics', '2022-09-10 11:06:15', '2022-09-10 11:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2022_09_04_115405_create_posts_table', 2),
(6, '2022_09_04_120025_create_categories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category_id`, `image`, `content`, `published`, `created_at`, `updated_at`, `slag`) VALUES
(1, 'Test for slug', 1, 'images/Yj6q7UXWOm4HHJlUSKghVX8GM7scR1RUrptm9XBc.jpg', 'Test for slug', 0, '2022-09-28 06:53:26', '2022-09-28 08:02:04', 'Test-for-slug'),
(2, 'Test for slug 1', 2, 'images/G3C6DY5BPI5y2Tfq6xgWYRRH6we6GS9ehlx3pF8n.jpg', '<p>Test for slug 1</p>', 0, '2022-09-28 06:55:11', '2022-09-28 08:03:23', 'Test-for-slug-1'),
(3, 'Test for slug 2', 2, 'images/XY0eTcLzO8471VnyBHJW2le58hE1hh4Hwu5x5mdO.jpg', '<p>Test for slug 2<br></p>', 0, '2022-09-28 06:57:47', '2022-09-28 08:03:53', 'test-for-slug-2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'oluwadamilare', 'quadri', 'abdulquadri.aq@gmail.com', NULL, '$2y$10$kRzQwnaeEcU8hmhmnlDXyuYjuClRsVVaK3t0lmQXa2tNJh3AdYKnG', 'JgZgbRPgTsAFBeDH7pZGU4aduFUWYlQDapiaEHnIogBFTRvS4oDN2YL7LYq0', '2022-09-03 13:25:20', '2022-09-27 19:16:01'),
(4, 'oluwadamilare', 'quadri', 'damilare005@gmail.com', NULL, '$2y$10$va6qVUMMq9QUSPhtHuejje/Zn8IpbmimRzTSda8zXreSXAjMiCilW', NULL, '2022-09-27 00:48:10', '2022-09-27 00:48:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_category_index` (`category`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_title_index` (`title`),
  ADD KEY `posts_category_id_index` (`category_id`),
  ADD KEY `slug` (`slag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `firstname` (`firstname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `mvc`
--
CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mvc`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `email` varchar(90) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `password` varchar(90) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_id`, `password`, `date`) VALUES
(1, 'Quadri', 'abdulquadri.aq@gmail.com', 'TmizRuQpQrmt5X98svjLZL4bytPzbPLkyLl4EToduvZCDO4dHqKJZDOEPEYX', '$2y$10$DLpe2tjjwPcB/41TpkwJ/eFFg/0e.f8iuPjoruis/v394vq77FFbW', '2022-07-31 03:55:16'),
(2, 'Ibrahim', 'ibrahim@gmail.com', 'fMqCX0BbnrFLhsqRbtHhxT2wly5JCoCqYfw5jXX4LhqWx2kSafMRkpAWA3ea', '$2y$10$uQO.5JTCUCZw8vHjbOYxVerFHKoWqRahhkrGV96nc/hbv/YytkQ1S', '2022-07-31 14:55:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `myblog`
--
CREATE DATABASE IF NOT EXISTS `myblog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `myblog`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `age`, `created_at`, `updated_at`) VALUES
(1, 'quadri', 'quadri@gmail.com', '23', NULL, NULL),
(2, 'ayinke', 'ayinke@gmail.com', '17', NULL, NULL),
(4, 'admin', 'admin@gmail.com', '18', '2022-09-02 02:16:30', '2022-09-02 02:16:30'),
(5, 'Ajani', 'ajani@gmail.com', '13', '2022-09-02 02:17:15', '2022-09-02 02:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2022_09_02_020256_create_posts_table', 1),
(6, '2022_09_02_024419_create_customers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasImage` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userid`, `title`, `description`, `hasImage`, `created_at`, `updated_at`) VALUES
(1, 85696525393213, 'chGiXIMAWP', 'SduXXb8Kab6cc1BY71ATcpSLhSaKerQ5zbgGQl6WTMTpDkyTocsIT6NM6Jo12ysKSj6CK1zrb9wQf9P46dD9UNgaMh5eiTFn8F1n', 1, '2022-09-02 01:34:12', '2022-09-02 01:34:12'),
(2, 84096324500597, 'zHFLxjHTH0', 'gC1kKjlZQNOCYvfZTOkDxmLaXYz6mRO4mMFzU0KVnzjwK9y66hXAvUb61rOi1UamiWM79igvaA5VjTC8EZ0t8abZcei4SCud6P8q', 1, '2022-09-02 01:34:12', '2022-09-02 01:34:12'),
(3, 3488321992975, 'YjWtFdfkKL', 'db0WfM6MgPCs5g75yct8PMNDNbQZTUS84REfPlHBkPh3fhq7UrnlLXNHVqBm1TjbCE51yzo0TaobzCH7TiaoDrlKI35s6x1pwl4O', 0, '2022-09-02 01:34:12', '2022-09-02 01:34:12'),
(4, 95617108862702, 'L4DR8idLQ1', '6q1xeswTBXnxwYMclmU2teuA0oMvdl8mHy8J8X4kXeyseNDBcOI8UwfEjZAsvXShBX1kTr7DWR8ECH04TZBxYgnfZHFHa6fH0hP2', 0, '2022-09-02 01:34:12', '2022-09-02 01:34:12'),
(5, 82709441014660, 'Zz3gyOhDga', '2iXlHgVRbM8RUu3v6YJsAiGelNEz8plYHzYFnb2wUCQ1wKgvxa3yq46PnTCs7H3bzKd24jfZ9yjEGR9Rh2Z8WDcmAaJIwNEaW3Zb', 1, '2022-09-02 01:34:12', '2022-09-02 01:34:12'),
(6, 72631707807916, '8677iXXqNo', 'ThH3DWOW2U6OmCiXFZM7OMO5dhQotysEg5QVdOBfopOv1mCJ61C7f9uB1Eq7dofjfGoWEYAiGwsx6KyrosLE3T9ZfqoeccVSlX8r', 1, '2022-09-02 01:34:12', '2022-09-02 01:34:12'),
(7, 43368022797888, 'qldMandOl8', '1PSAvIj4eGTNpcUnei2MPLZt5nUJVrvkOFTq0sWXBLeKNPPxo8InGvWf9EBfoSayoCMouxTMqvDzdxxDIQK7J4gbng2RU7aFmxX3', 0, '2022-09-02 01:34:12', '2022-09-02 01:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Quadri', 'quadri@gmail.com', NULL, '$2y$10$68Le82r9pbQidR6Nx8SgSOKZaLKDa1k00TodQY.t/eYeBPfR033PK', NULL, '2022-09-02 20:09:52', '2022-09-02 20:09:52'),
(2, 'Ibrahim', 'ibrahim@gmail.com', NULL, '$2y$10$xagG6.lGzUbnPO8QdFKxmuqcLwa8nIDyCUiaWMLvhBPsoA5kE9ove', NULL, '2022-09-02 20:11:38', '2022-09-02 20:11:38'),
(3, 'odunayo', 'odunayo@gmail.com', NULL, '$2y$10$VN1TMiYgpPVRYLw1poWtlOo5ON73FdLczpXKvuj92yf3txNklEfU.', NULL, '2022-09-02 21:12:10', '2022-09-02 21:12:10'),
(4, 'afeez', 'afeez@gmail.com', NULL, '$2y$10$t3xWJJwHrRdsEvja5GW9Ce3pG//9RvYGmdngfjBw1ONLCt9lLg7fC', NULL, '2022-09-02 21:12:31', '2022-09-02 21:12:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `oop`
--
CREATE DATABASE IF NOT EXISTS `oop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `oop`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(90) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`) VALUES
(1, 'Quadri', 'abdulquadri.aq@gmail.com', '12345', '2022-07-28 14:28:35'),
(2, 'Shakiru', 'shakiru@gmail.com', '$2y$10$BK7mXj/WAjRChYRUqo0yPOPQnDeSkv.gL6/DdgZAzZJvPCJFO.EuO', '0000-00-00 00:00:00'),
(3, 'Shakiru', 'shakiru@gmail.com', '$2y$10$FUgqa2w/1v1XO9KKY9GpyOPsDmiwwjnYB0Doeb87vpcryx5Q3I0ES', '0000-00-00 00:00:00'),
(4, 'Shakiru', 'shakiru@gmail.com', '$2y$10$KznDoi4gWty58Qf.vVtA7Oq38vwCmsb.WmXfkdNW6LUNQp67v2qiG', '0000-00-00 00:00:00'),
(5, 'admin', 'admin@gmail.com', '$2y$10$BAf1sw3/2NEMBjcFV3tFIeWhpCaj5DhsmlA2Zo40DDQYjtwpDQfd.', '0000-00-00 00:00:00'),
(6, 'admin', 'admin@gmail.com', '$2y$10$WelTFaSNcb/ZYgFBop5fAenvyCGYRXmkGBPykZ7MhXpEVTGpjMVUK', '0000-00-00 00:00:00'),
(7, 'Quadri', 'admin@gmail.com', '$2y$10$Ly9MVcu53o/MHQFIvZjprun/LP/Spb8nN8pcZX2PfcQG/KDGFYeTW', '0000-00-00 00:00:00'),
(8, 'Quadri', 'admin@gmail.com', '$2y$10$w/TmvKW84ciIiBgOos2PaupwbGOy8ZzSlGIZSkIOPkQ.x9WqIW706', '0000-00-00 00:00:00'),
(9, 'Quadri', 'abdulquadri.aq@gmail.com', '$2y$10$2LHaoaad6ArlVhj56vc7quREVutodQbqtp1EQIYiIm.icwAE/nay6', '0000-00-00 00:00:00'),
(10, 'Quadri', 'damilare@gmail.com', '$2y$10$Q4j13SExRQiRDEFGvVJqseRDOo2R6LZE8b4LcSAmALSR2U.KZ/SeC', '0000-00-00 00:00:00'),
(11, 'Quadri', 'ibrahim@gmail.com', '$2y$10$Oe2av3CemIUhItomrqcQGO6NfI98YtgxVSSgP.6vuq9MiovgZyFk.', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Database: `payment`
--
CREATE DATABASE IF NOT EXISTS `payment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `payment`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(20) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin\r\n',
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `admin`, `firstname`, `lastname`, `email`, `gender`, `password`, `created_at`) VALUES
(1, 1, 'oluwadamilare', 'quadri', 'abdulquadri.aq@gmail.com', 'male', '$2y$10$X9evNfVzS4PTWNjjQD11rOq.pQAPUwUoj8BWIAhjEbnSgvkg/Q9Uu', '2022-06-18 08:10:53'),
(2, 0, 'oluwadamilare', 'quadri', 'shakiru@gmail.com', 'male', '$2y$10$gq38NqdSZwKkFEKx3udB/.bqFnF19fiVxxqE7G1u8AV7lMOf/wC7K', '2022-06-18 08:58:53'),
(3, 0, 'oluwadamilare', 'quadri', 'abdulquadri@gmail.com', 'male', '$2y$10$Yg2Owv6/ek1lWXDJoPk2uOAxqnzAtVqk277.vcB6nEzM7zCkn5y4C', '2022-06-19 11:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `customerId` varchar(20) NOT NULL,
  `reference` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `paytime` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customerId`, `reference`, `amount`, `fullname`, `email`, `status`, `paytime`, `created_at`) VALUES
(1895034567, '1', 'PW314062338', '1000000', 'Quadri Oluwadamilare', 'abdulquadri.aq@gmail.com', 'success', '22-06-18 10:40:48 am', '2022-06-18 09:40:55'),
(1895034579, '2', 'PW517209250', '1000000', 'Shakiru Damilare', 'shakiru@gmail.com', 'success', '22-06-18 10:40:47 am', '2022-06-18 09:40:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

--
-- Dumping data for table `pma__navigationhiding`
--

INSERT INTO `pma__navigationhiding` (`username`, `item_name`, `item_type`, `db_name`, `table_name`) VALUES
('root', 'migrations', 'table', 'myblog', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"ecommerce\",\"table\":\"customers\"},{\"db\":\"hotels\",\"table\":\"hotels\"},{\"db\":\"chatbot\",\"table\":\"chatbot\"},{\"db\":\"school_db\",\"table\":\"users\"},{\"db\":\"school_db\",\"table\":\"class_students\"},{\"db\":\"rest_php_api\",\"table\":\"tbl_students\"},{\"db\":\"zuriphp\",\"table\":\"students\"},{\"db\":\"school_db\",\"table\":\"class_lecturers\"},{\"db\":\"school_db\",\"table\":\"class_tests\"},{\"db\":\"school_db\",\"table\":\"schools\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'chatbot', 'chatbot', '{\"CREATE_TIME\":\"2022-08-27 23:27:30\",\"sorted_col\":\"`chatbot`.`programming_language`  DESC\"}', '2022-09-02 23:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-11-03 15:05:04', '{\"Console\\/Mode\":\"show\",\"Console\\/Height\":-242.01362}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `practice`
--
CREATE DATABASE IF NOT EXISTS `practice` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `practice`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `text` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `text`) VALUES
(1, 'HI'),
(2, 'DANIEL'),
(3, 'YOU'),
(4, 'ARE'),
(5, 'HANDSOME');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Database: `products_crud`
--
CREATE DATABASE IF NOT EXISTS `products_crud` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `products_crud`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(248) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `created_at`) VALUES
(1, 'Spark 10', 'Good!', 'images/BPSRjVEA/post-sq-3.jpg', '12000.00', '2022-06-20 14:31:37'),
(2, 'Spark 21', 'Description for spark 21', 'images/WGAnRcEH/post-portrait-2.jpg', '14000.00', '2022-06-20 14:32:49'),
(4, 'Iphone 11', 'description of iphone', 'images/eD7x7R8d/post-sq-1.jpg', '123000.00', '2022-06-20 17:41:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `product_crud_oop`
--
CREATE DATABASE IF NOT EXISTS `product_crud_oop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `product_crud_oop`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(90) NOT NULL,
  `description` longtext NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `image`, `date`) VALUES
(5, 'Teddy Bear', 'Teddy Bear', '4500.00', 'images/f3auownv/Picture2.jpg', '2022-08-26 02:53:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Database: `register`
--
CREATE DATABASE IF NOT EXISTS `register` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `register`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(25) NOT NULL,
  `user_first` varchar(200) NOT NULL,
  `user_last` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_uid` varchar(200) NOT NULL,
  `user_pwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(5, 'oluwadamilare', 'quadri', 'damilare@gmail.com', 'damilare', '$2y$10$05fIct3SJyvROwahgiTWleec.4vBik8DjnZH.M8kBoLiFSsHQdtUG'),
(9, 'oluwadamilare', 'quadri', 'quadri@gmail.com', 'quadri', '$2y$10$OWcFfs.peryLFFPlKkEBg.qvWzd.akMz4GqTDTrntZOLf8okEtsB.'),
(10, 'abdullah', 'quadri', 'ayinke@gmail.com', 'abdullah', '$2y$10$U7dycsx53nwrs/6wXnf8QeVIkoYblxd568N95WdYChQ.dGlJpAjWS'),
(11, 'khalid', 'ajayi', 'damilare@gmail.com', 'khalid', '$2y$10$9WOqSAEGdEHHOPd/A6nNYuUV.M70WOVDaHiXIQ00KX0HLb5OYk2Uu'),
(12, 'ola', 'abu', 'a@gmail.com', 'bash', '$2y$10$ykylm5753GDiwWpE7QWuYOb0LeSPxBmYocsWSjYl4deHzcK9U1Nbe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Database: `rest_php_api`
--
CREATE DATABASE IF NOT EXISTS `rest_php_api` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rest_php_api`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `name`, `email`, `mobile`, `status`, `created_at`) VALUES
(1, '', '', '0', 1, '2022-10-30 02:42:32'),
(2, 'ABC', 'ABC@gmail.com', '12345', 1, '2022-10-30 02:44:41'),
(3, 'ABC', 'ABC@gmail.com', '12345', 1, '2022-10-30 03:34:05'),
(4, 'ABC', 'ABC@gmail.com', '12345', 1, '2022-11-03 15:03:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `scandiweb`
--
CREATE DATABASE IF NOT EXISTS `scandiweb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `scandiweb`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `attribute` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `type`, `attribute`) VALUES
(1, 'JVC200123', 'Acme DISC', '1.00', 'DVD', '700 MB'),
(2, 'JVC200124', 'Acme DISC', '1.00', 'DVD', '700 MB'),
(3, 'JVC200125', 'Acme DISC', '1.00', 'DVD', '700 MB'),
(4, 'JVC200126', 'Acme DISC', '1.00', 'DVD', '700 MB'),
(5, 'GGWP0007', 'War and Peace', '20.00', 'Book', '2KG'),
(8, 'GGWP0008', 'War and Peace', '20.00', 'Book', '2KG'),
(9, 'GGWP0009', 'War and Peace', '20.00', 'Book', '2KG'),
(10, 'GGWP0010', 'War and Peace', '20.00', 'Book', '2KG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_id_uindex` (`id`),
  ADD UNIQUE KEY `products_sku_uindex` (`sku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Database: `school_db`
--
CREATE DATABASE IF NOT EXISTS `school_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `school_db`;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `user_id`, `school_id`, `class_id`, `date`) VALUES
(1, 'First Class', 'ayinke.hassanat', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', '9TkEkiflI81f5QM9I9kNhqUE1Y4h3UHIkqTmFjhWPJttlPUWazwU5PlAJuEV', '2022-03-24 00:01:39'),
(3, 'Second Class', 'ayinke.hassanat', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 'VPvEkHDzf7NrVfLIaXA6F3KHGMRnoGxkJxtVlYleTLAti711lwQihUBsJbOF', '2022-03-24 00:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `class_lecturers`
--

CREATE TABLE `class_lecturers` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_lecturers`
--

INSERT INTO `class_lecturers` (`id`, `user_id`, `class_id`, `school_id`, `disabled`, `date`) VALUES
(1, 'quadri.damilare', 'VPvEkHDzf7NrVfLIaXA6F3KHGMRnoGxkJxtVlYleTLAti711lwQihUBsJbOF', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 1, '2022-10-29 14:50:15'),
(2, 'quadri.damilare', 'VPvEkHDzf7NrVfLIaXA6F3KHGMRnoGxkJxtVlYleTLAti711lwQihUBsJbOF', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 1, '2022-10-29 14:50:32'),
(3, 'quadri.damilare', 'VPvEkHDzf7NrVfLIaXA6F3KHGMRnoGxkJxtVlYleTLAti711lwQihUBsJbOF', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 0, '2022-10-29 15:38:44'),
(4, 'Shakiru.Damilare', 'VPvEkHDzf7NrVfLIaXA6F3KHGMRnoGxkJxtVlYleTLAti711lwQihUBsJbOF', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 0, '2022-10-30 11:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE `class_students` (
  `id` int(11) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_students`
--

INSERT INTO `class_students` (`id`, `user_id`, `class_id`, `school_id`, `disabled`, `date`) VALUES
(1, 'bob.marley', 'VPvEkHDzf7NrVfLIaXA6F3KHGMRnoGxkJxtVlYleTLAti711lwQihUBsJbOF', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 1, '2022-10-30 12:30:45'),
(2, 'lukman.savage', 'VPvEkHDzf7NrVfLIaXA6F3KHGMRnoGxkJxtVlYleTLAti711lwQihUBsJbOF', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 0, '2022-10-30 12:40:15'),
(3, 'bob.marley', 'VPvEkHDzf7NrVfLIaXA6F3KHGMRnoGxkJxtVlYleTLAti711lwQihUBsJbOF', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 0, '2022-10-30 12:40:25'),
(4, 'akinola.ibrahim', 'VPvEkHDzf7NrVfLIaXA6F3KHGMRnoGxkJxtVlYleTLAti711lwQihUBsJbOF', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 0, '2022-10-30 12:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `class_tests`
--

CREATE TABLE `class_tests` (
  `id` int(11) NOT NULL,
  `test` varchar(100) NOT NULL,
  `test_id` varchar(60) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `class_id` varchar(60) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `school` varchar(30) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school`, `school_id`, `date`, `user_id`) VALUES
(1, 'Lasu', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', '2022-02-25 18:03:54', 'ayinke.hassanat'),
(3, 'Bamfem', 'ppwzKmYLNOZFAEfNYSTwwcEh5mD4ZQ415pO93uzxzYorgcAWrXJUHc31i8Cs', '2022-02-26 12:01:44', 'ayinke.hassanat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `school_id` varchar(60) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `password` varchar(90) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `date`, `user_id`, `gender`, `school_id`, `rank`, `password`, `image`) VALUES
(1, 'oluwadamilare', 'quadri', 'quadri@gmail.com', '2022-02-22 10:48:25', 'oluwadamilare.quadri', 'male', '', 'reception', '$2y$10$cfcZMZi9U2BdJkFJigwF0Ocu/7gmyyWD9sGatKltk15k/Y8ED06Qy', ''),
(2, 'AKINOLA', 'IBRAHIM', 'akinolaibrahimabidemi@gmail.com', '2022-02-22 17:07:03', 'akinola.ibrahim', 'male', '', 'student', '$2y$10$oCHXcB4VZBMOU6MLKtGH5uDA1hb1fsJJG2d2ASgN2S6ufRgCIhIbC', ''),
(3, 'Ayinke', 'Hassanat', 'ayinke@gmail.com', '2022-02-23 11:04:10', 'Ayinke.Hassanat', 'female', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 'super_admin', '$2y$10$Svnx69NAYYwkUiMf1Y9TK.z4A6g1E3.zyTnr/6zLJ54ncOq7Kk3HS', ''),
(4, 'Junior', 'Hameed', 'hameed@gmail.com', '2022-02-26 18:01:41', 'junior.hameed', 'male', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 'admin', '$2y$10$U0rckc4YgJKfJy8QIFpocuicVjgZ8O1Kdj6kDIkujUbF.BAu2haSq', ''),
(5, 'Afeez', 'Accountant', 'afeez@gmail.com', '2022-02-26 18:22:56', 'afeez.accountant', 'male', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 'reception', '$2y$10$3T1f5/5fzMV8PGyIlEKFMu/09FU8PJSPLua39ybdN1dDzipuk7TVC', ''),
(6, 'Quadri', 'Damilare', 'damilare@gmail.com', '2022-02-26 18:23:48', 'quadri.damilare', 'male', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 'lecturer', '$2y$10$IGpooITxdrdSSCDjxQaYY.uI77/LBWG51QiEYbJWCzmxiD77wW9dW', ''),
(7, 'Bob', 'Marley', 'bob@gmail.com', '2022-02-27 17:45:20', 'bob.marley', 'male', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 'student', '$2y$10$DYsNY7xPorZwNMJFFKGrXudLIJMW3Svqoq7UeudAekR2ztiW0l.qS', ''),
(8, 'Lukman', 'Savage', 'lukman@yahoo.com', '2022-03-25 10:14:57', 'lukman.savage', 'male', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 'student', '$2y$10$ipQOCxTDLyTO4.PV5Ng5S.oVxakaam9OG7RdmALijuMDRpJwzDzVK', ''),
(9, 'Ibrahim', 'Jorginho', 'ibrahim@gmail.com', '2022-03-25 10:19:10', 'Ibrahim.Jorginho', 'male', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 'student', '$2y$10$FSFfOM4DzwoMF1g4H1DVvunbEIQnUx45Jxcv8EbP3w9IUCgkybV4y', ''),
(10, 'abdul', 'quadri', 'quadri1@gmail.com', '2022-07-31 03:44:03', 'abdul.quadri', 'male', '', 'student', '$2y$10$rB46CJvj5fsc5lWg/E6tW.II9UNwjsDGRAf8YE2zigxZWN6Rwseb.', ''),
(11, 'Shakiru', 'Damilare', 'shakiru@gmail.com', '2022-10-30 11:50:36', 'Shakiru.Damilare', 'male', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 'lecturer', '$2y$10$kOjbSIXYa1HWPkRT0zZeyeVI4RChN4iWej5l8X03f9G1H3SAaWNyu', ''),
(12, 'Quadri', 'Damilare', 'quadri.q@gmail.com', '2022-10-30 13:04:49', 'Quadri.Damilare7062', 'male', '2SmYOVEoWAHrPjs2YLjk4cFOPmGU30xVgkNGE4m7qbI9iUrgtF1zh7gd0NlF', 'student', '$2y$10$yQn72k4RrBChIT6w4qENjOj5aWdj8GwcUYtO8wQk5qTDYInL7/niG', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class` (`class`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `class_lecturers`
--
ALTER TABLE `class_lecturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `class_students`
--
ALTER TABLE `class_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `class_tests`
--
ALTER TABLE `class_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `test` (`test`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school` (`school`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_url` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `gender` (`gender`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `rank` (`rank`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_lecturers`
--
ALTER TABLE `class_lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_students`
--
ALTER TABLE `class_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `class_tests`
--
ALTER TABLE `class_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Database: `security`
--
CREATE DATABASE IF NOT EXISTS `security` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `security`;

-- --------------------------------------------------------

--
-- Table structure for table `police_detail`
--

CREATE TABLE `police_detail` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police_detail`
--

INSERT INTO `police_detail` (`id`, `staff_id`, `name`, `address`, `sex`, `dob`, `age`, `status`, `height`, `position`) VALUES
(1, 'p001', 'Kasali Ayomide', 'No 10, Ayomide Bustop', 'Male', '24/01/2000', '27', 'Single', '23', 'Higher Rank Officer'),
(2, 'p001', 'Kasali Ayomide', 'No 10, Ayomide Bustop', 'Male', '24/01/2000', '27', 'Single', '23', 'Higher Rank Officer');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `signal_report` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `staff_id`, `date`, `signal_report`, `location`, `description`) VALUES
(1, 'P002', '23', '10 criminal ', 'ojo road', 'The criminal get to the location very early this morning');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `position`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `police_detail`
--
ALTER TABLE `police_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `police_detail`
--
ALTER TABLE `police_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `signup`
--
CREATE DATABASE IF NOT EXISTS `signup` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `signup`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `useremail` varchar(128) NOT NULL,
  `useruid` varchar(128) NOT NULL,
  `userpwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `useremail`, `useruid`, `userpwd`) VALUES
(4, 'shakiru', 'quadri@gmail.com', 'shakiru', '$2y$10$ywdVN85Wl446T5920Ppu6uDUB0trjrI5hrjoTjIem1RLZy764.Ska'),
(5, 'ayinke', 'ayinke@gmail.com', 'ayinke', '$2y$10$ucz6iLWgdBHdOAD/O7qVw.bjivJNkm.K72xfQ9KAk6xjA2gH6uVl2'),
(6, 'quadri', 'hassanat@gmail.com', 'ade', '$2y$10$j0KalBY3n4SBvExfoVjlf.acvJppU3bNNwG9zIDYO6PQTqcGnydVe'),
(7, 'odun', 'odun@gmail.com', 'odun', '$2y$10$jRuVUwIViZDlQzKU3h86S.aQfsMVEdhmvkhFyPAkGKQ/C19BIMX9a'),
(8, 'quadri', 'damilare@gmail.com', 'bolaji', '$2y$10$lemToHvHIeurMflCUkVLNOqdeab.7g8Ue7WK0k0tT0QyfhpttueGC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Database: `staff_db`
--
CREATE DATABASE IF NOT EXISTS `staff_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `staff_db`;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Sirname` varchar(30) NOT NULL,
  `Mtitle` varchar(30) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `Firstname`, `Sirname`, `Mtitle`, `Phone`, `Password`, `Email`) VALUES
(1, 'Patrick', 'Mvuma', 'Mr', '265999107724', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Size` decimal(10,0) DEFAULT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `Title`, `Name`, `Type`, `Size`, `content`) VALUES
(1, 'Staff', 'staff.csv', 'application/vnd.ms-excel', '76', '');

-- --------------------------------------------------------

--
-- Table structure for table `inorg`
--

CREATE TABLE `inorg` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `Phone` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(300) NOT NULL,
  `year` varchar(10) NOT NULL,
  `pname` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` decimal(10,0) NOT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profilepictures`
--

CREATE TABLE `profilepictures` (
  `id` int(11) NOT NULL,
  `ids` varchar(30) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `Size` decimal(10,0) NOT NULL,
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(300) NOT NULL,
  `Sirname` varchar(300) NOT NULL,
  `Mtitle` varchar(30) NOT NULL,
  `Rank` varchar(30) NOT NULL,
  `Department` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Staffid` varchar(300) NOT NULL,
  `Online` varchar(300) NOT NULL,
  `Picname` varchar(1000) NOT NULL,
  `Time` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inorg`
--
ALTER TABLE `inorg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilepictures`
--
ALTER TABLE `profilepictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inorg`
--
ALTER TABLE `inorg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilepictures`
--
ALTER TABLE `profilepictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Database: `stream`
--
CREATE DATABASE IF NOT EXISTS `stream` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `stream`;

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `login_details_id` int(11) NOT NULL,
  `login_user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`login_details_id`, `login_user_id`, `last_activity`) VALUES
(102, 1, '2021-09-20 15:41:18'),
(103, 2, '2021-09-20 16:07:46'),
(104, 1, '2021-09-20 16:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `user_id` int(11) NOT NULL,
  `uname` varchar(225) NOT NULL,
  `pwd` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`user_id`, `uname`, `pwd`) VALUES
(1, 'Quadri', '123'),
(2, 'Tunde', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logindetails`
--
ALTER TABLE `logindetails`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `system`
--
CREATE DATABASE IF NOT EXISTS `system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `system`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'sunnygkp10@gmail.com', '123456'),
(2, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('55892169bf6a7', '55892169d2efc'),
('5589216a3646e', '5589216a48722'),
('558922117fcef', '5589221195248'),
('55892211e44d5', '55892211f1fa7'),
('558922894c453', '558922895ea0a'),
('558922899ccaa', '55892289aa7cf'),
('558923538f48d', '558923539a46c'),
('55892353f05c4', '55892354051be'),
('558973f4389ac', '558973f462e61'),
('558973f4c46f2', '558973f4d4abe'),
('558973f51600d', '558973f526fc5'),
('558973f55d269', '558973f57af07'),
('558973f5abb1a', '558973f5e764a'),
('5589751a63091', '5589751a81bf4'),
('5589751ad32b8', '5589751adbdbd'),
('5589751b304ef', '5589751b3b04d'),
('5589751b749c9', '5589751b9a98c');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
('55846be776610', 'testing', 'sunnygkp10@gmail.com', 'testing', 'testing stART', '2015-06-19', '09:22:15pm'),
('5584ddd0da0ab', 'netcamp', 'sunnygkp10@gmail.com', 'feedback', ';mLBLB', '2015-06-20', '05:28:16am'),
('558510a8a1234', 'sunnygkp10', 'sunnygkp10@gmail.com', 'dl;dsnklfn', 'fmdsfld fdj', '2015-06-20', '09:05:12am'),
('5585509097ae2', 'sunny', 'sunnygkp10@gmail.com', 'kcsncsk', 'l.mdsavn', '2015-06-20', '01:37:52pm'),
('5586ee27af2c9', 'vikas', 'vikas@gmail.com', 'trial feedback', 'triaal feedbak', '2015-06-21', '07:02:31pm'),
('5589858b6c43b', 'nik', 'nik1@gmail.com', 'good', 'good site', '2015-06-23', '06:12:59pm');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('sunnygkp10@gmail.com', '558921841f1ec', 4, 2, 2, 0, '2015-06-23 09:31:26'),
('sunnygkp10@gmail.com', '558920ff906b8', 4, 2, 2, 0, '2015-06-23 13:32:09'),
('avantika420@gmail.com', '558921841f1ec', 4, 2, 2, 0, '2015-06-23 14:33:04'),
('avantika420@gmail.com', '5589222f16b93', 4, 2, 2, 0, '2015-06-23 14:49:39'),
('sunnygkp10@gmail.com', '5589741f9ed52', 4, 5, 3, 2, '2015-06-23 15:07:16'),
('mi5@hollywood.com', '5589222f16b93', 4, 2, 2, 0, '2015-06-23 15:12:56'),
('nik1@gmail.com', '558921841f1ec', 1, 2, 1, 1, '2015-06-23 16:11:50'),
('sunnygkp10@gmail.com', '5589222f16b93', 1, 2, 1, 1, '2015-06-24 03:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('55892169bf6a7', 'usermod', '55892169d2efc'),
('55892169bf6a7', 'useradd', '55892169d2f05'),
('55892169bf6a7', 'useralter', '55892169d2f09'),
('55892169bf6a7', 'groupmod', '55892169d2f0c'),
('5589216a3646e', '751', '5589216a48713'),
('5589216a3646e', '752', '5589216a4871a'),
('5589216a3646e', '754', '5589216a4871f'),
('5589216a3646e', '755', '5589216a48722'),
('558922117fcef', 'echo', '5589221195248'),
('558922117fcef', 'print', '558922119525a'),
('558922117fcef', 'printf', '5589221195265'),
('558922117fcef', 'cout', '5589221195270'),
('55892211e44d5', 'int a', '55892211f1f97'),
('55892211e44d5', '$a', '55892211f1fa7'),
('55892211e44d5', 'long int a', '55892211f1fb4'),
('55892211e44d5', 'int a$', '55892211f1fbd'),
('558922894c453', 'cin>>a;', '558922895ea0a'),
('558922894c453', 'cin<<a;', '558922895ea26'),
('558922894c453', 'cout>>a;', '558922895ea34'),
('558922894c453', 'cout<a;', '558922895ea41'),
('558922899ccaa', 'cout', '55892289aa7cf'),
('558922899ccaa', 'cin', '55892289aa7df'),
('558922899ccaa', 'print', '55892289aa7eb'),
('558922899ccaa', 'printf', '55892289aa7f5'),
('558923538f48d', '255.0.0.0', '558923539a46c'),
('558923538f48d', '255.255.255.0', '558923539a480'),
('558923538f48d', '255.255.0.0', '558923539a48b'),
('558923538f48d', 'none of these', '558923539a495'),
('55892353f05c4', '192.168.1.100', '5589235405192'),
('55892353f05c4', '172.168.16.2', '55892354051a3'),
('55892353f05c4', '10.0.0.0.1', '55892354051b4'),
('55892353f05c4', '11.11.11.11', '55892354051be'),
('558973f4389ac', 'containing root file-system required during bootup', '558973f462e44'),
('558973f4389ac', ' Contains only scripts to be executed during bootup', '558973f462e56'),
('558973f4389ac', ' Contains root-file system and drivers required to be preloaded during bootup', '558973f462e61'),
('558973f4389ac', 'None of the above', '558973f462e6b'),
('558973f4c46f2', 'Kernel', '558973f4d4abe'),
('558973f4c46f2', 'Shell', '558973f4d4acf'),
('558973f4c46f2', 'Commands', '558973f4d4ad9'),
('558973f4c46f2', 'Script', '558973f4d4ae3'),
('558973f51600d', 'Boot Loading', '558973f526f9d'),
('558973f51600d', ' Boot Record', '558973f526fb9'),
('558973f51600d', ' Boot Strapping', '558973f526fc5'),
('558973f51600d', ' Booting', '558973f526fce'),
('558973f55d269', ' Quick boot', '558973f57aef1'),
('558973f55d269', 'Cold boot', '558973f57af07'),
('558973f55d269', ' Hot boot', '558973f57af17'),
('558973f55d269', ' Fast boot', '558973f57af27'),
('558973f5abb1a', 'bash', '558973f5e7623'),
('558973f5abb1a', ' Csh', '558973f5e7636'),
('558973f5abb1a', ' ksh', '558973f5e7640'),
('558973f5abb1a', ' sh', '558973f5e764a'),
('5589751a63091', 'q', '5589751a81bd6'),
('5589751a63091', 'wq', '5589751a81be8'),
('5589751a63091', ' both (a) and (b)', '5589751a81bf4'),
('5589751a63091', ' none of the mentioned', '5589751a81bfd'),
('5589751ad32b8', ' moves screen down one page', '5589751adbdbd'),
('5589751ad32b8', 'moves screen up one page', '5589751adbdce'),
('5589751ad32b8', 'moves screen up one line', '5589751adbdd8'),
('5589751ad32b8', ' moves screen down one line', '5589751adbde2'),
('5589751b304ef', ' yy', '5589751b3b04d'),
('5589751b304ef', 'yw', '5589751b3b05e'),
('5589751b304ef', 'yc', '5589751b3b069'),
('5589751b304ef', ' none of the mentioned', '5589751b3b073'),
('5589751b749c9', 'X', '5589751b9a98c'),
('5589751b749c9', 'x', '5589751b9a9a5'),
('5589751b749c9', 'D', '5589751b9a9b7'),
('5589751b749c9', 'd', '5589751b9a9c9'),
('5589751bd02ec', 'autoindentation is not possible in vi editor', '5589751bdadaa');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('558920ff906b8', '55892169bf6a7', 'what is command for changing user information??', 4, 1),
('558920ff906b8', '5589216a3646e', 'what is permission for view only for other??', 4, 2),
('558921841f1ec', '558922117fcef', 'what is command for print in php??', 4, 1),
('558921841f1ec', '55892211e44d5', 'which is a variable of php??', 4, 2),
('5589222f16b93', '558922894c453', 'what is correct statement in c++??', 4, 1),
('5589222f16b93', '558922899ccaa', 'which command is use for print the output in c++?', 4, 2),
('558922ec03021', '558923538f48d', 'what is correct mask for A class IP???', 4, 1),
('558922ec03021', '55892353f05c4', 'which is not a private IP??', 4, 2),
('55897338a6659', '558973f4389ac', 'On Linux, initrd is a file', 4, 1),
('55897338a6659', '558973f4c46f2', 'Which is loaded into memory when system is booted?', 4, 2),
('55897338a6659', '558973f51600d', ' The process of starting up a computer is known as', 4, 3),
('55897338a6659', '558973f55d269', ' Bootstrapping is also known as', 4, 4),
('55897338a6659', '558973f5abb1a', 'The shell used for Single user mode shell is:', 4, 5),
('5589741f9ed52', '5589751a63091', ' Which command is used to close the vi editor?', 4, 1),
('5589741f9ed52', '5589751ad32b8', ' In vi editor, the key combination CTRL+f', 4, 2),
('5589741f9ed52', '5589751b304ef', ' Which vi editor command copies the current line of the file?', 4, 3),
('5589741f9ed52', '5589751b749c9', ' Which command is used to delete the character before the cursor location in vi editor?', 4, 4),
('5589741f9ed52', '5589751bd02ec', ' Which one of the following statement is true?', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
('558920ff906b8', 'Linux : File Managment', 2, 1, 2, 5, '', 'linux', '2015-06-23 09:03:59'),
('558921841f1ec', 'Php Coding', 2, 1, 2, 5, '', 'PHP', '2015-06-23 09:06:12'),
('5589222f16b93', 'C++ Coding', 2, 1, 2, 5, '', 'c++', '2015-06-23 09:09:03'),
('558922ec03021', 'Networking', 2, 1, 2, 5, '', 'networking', '2015-06-23 09:12:12'),
('55897338a6659', 'Linux:startup', 2, 1, 5, 10, '', 'linux', '2015-06-23 14:54:48'),
('5589741f9ed52', 'Linux :vi Editor', 2, 1, 5, 10, '', 'linux', '2015-06-23 14:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('sunnygkp10@gmail.com', 9, '2015-06-24 03:22:38'),
('avantika420@gmail.com', 8, '2015-06-23 14:49:39'),
('mi5@hollywood.com', 4, '2015-06-23 15:12:56'),
('nik1@gmail.com', 1, '2015-06-23 16:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `gender`, `college`, `email`, `mob`, `password`) VALUES
('Abdul', 'M', 'lasu', 'abdulquadri.aq@gmail.com', 9076189518, '827ccb0eea8a706c4c34a16891f84e7b'),
('Avantika', 'F', 'KNIT sultanpur', 'avantika420@gmail.com', 7785068889, 'e10adc3949ba59abbe56e057f20f883e'),
('Mark Zukarburg', 'M', 'Stanford', 'ceo@facebook.com', 987654321, 'e10adc3949ba59abbe56e057f20f883e'),
('Komal', 'F', 'KNIT sultanpur', 'komalpd2011@gmail.com', 7785068889, 'e10adc3949ba59abbe56e057f20f883e'),
('Tom Cruze', 'M', 'Hollywood', 'mi5@hollywood.com', 7785068889, 'e10adc3949ba59abbe56e057f20f883e'),
('Netcamp', 'M', 'KNIT sultanpur', 'netcamp@gmail.com', 987654321, 'e10adc3949ba59abbe56e057f20f883e'),
('Nikunj', 'M', 'XYZ', 'nik1@gmail.com', 987, '202cb962ac59075b964b07152d234b70'),
('Sunny', 'M', 'KNIT sultanpur', 'sunnygkp10@gmail.com', 7785068889, 'e10adc3949ba59abbe56e057f20f883e'),
('User', 'M', 'cimt', 'user@user.com', 11, 'e10adc3949ba59abbe56e057f20f883e'),
('Vikash', 'M', 'KNIT sultanpur@gmail.com', 'vikash@gmail.com', 7785068889, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `travel`
--
CREATE DATABASE IF NOT EXISTS `travel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `travel`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(228) NOT NULL,
  `password` varchar(228) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `place` varchar(228) NOT NULL,
  `price` varchar(228) NOT NULL,
  `guest` varchar(228) NOT NULL,
  `bdate` varchar(228) NOT NULL DEFAULT '',
  `tdate` varchar(228) NOT NULL,
  `name` varchar(228) NOT NULL,
  `email` varchar(228) NOT NULL,
  `number` varchar(228) NOT NULL,
  `country` varchar(228) NOT NULL,
  `address` varchar(228) NOT NULL,
  `pending` tinyint(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `Rapproved` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `place`, `price`, `guest`, `bdate`, `tdate`, `name`, `email`, `number`, `country`, `address`, `pending`, `active`, `Rapproved`) VALUES
(10, 0, 'Tokyo', '$45 000', '3', '2022-01-12', '2022-01-13', 'oluwadamilare quadri', 'shakiru@gmail.com', '23213', 'Nigeria', 'pipeline bustop, badagry expressway, lagos.', 1, 1, 1),
(11, 0, 'Egypt', '$90', '3', '2022-01-12', '2022-01-22', 'oluwadamilare quadri', 'quadri@gmail.com', '56789', 'Nigeria', 'pipeline bustop, badagry expressway, lagos.', 1, 1, 1),
(12, 0, 'Mumbai', '$45 000', '2', '2022-08-18', '2022-08-27', 'abdul quadri', 'abdulquadri.aq@gmail.com', '6667', 'Nigeria', 'No, 10 Oluwadamilare Street Badagry Express Way Lagos', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(228) NOT NULL,
  `email` varchar(228) NOT NULL,
  `password` varchar(228) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `request` tinyint(4) NOT NULL,
  `approved` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `request`, `approved`) VALUES
(7, 'Quadri', 'quadri@gmail.com', '$2y$10$vADvamMIOTdDc.YJ2YYwbOPv3M6fNZd9pX2cE5PmV7VfQqxbZKaEa', '2022-01-02 11:09:04', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Database: `zuriphp`
--
CREATE DATABASE IF NOT EXISTS `zuriphp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `zuriphp`;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_names` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_names`, `country`, `email`, `gender`, `password`) VALUES
(1, 'abdul quadri', 'Nigeria', 'abdulquadri.aq@gmail.com', 'Male', '1234'),
(2, 'abdul quadri', 'Nigeria', 'abdulquadri.aq@gmail.com', 'Male', '1234'),
(3, 'abdul quadri', 'Nigeria', 'abdulquadri@gmail.com', 'Male', '1'),
(4, 'abdul quadri', 'Nigeria', 'abdulquadri.aq@gmail.com', 'Male', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
