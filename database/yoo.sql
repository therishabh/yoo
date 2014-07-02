-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2014 at 10:31 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `status`) VALUES
(1, 'Admin', 'admin', '202cb962ac59075b964b07152d234b70', '1');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE IF NOT EXISTS `campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `about` text NOT NULL,
  `updates` text NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `amount` varchar(20) NOT NULL DEFAULT '0',
  `complete_amount` varchar(255) NOT NULL DEFAULT '0',
  `running_status` varchar(20) NOT NULL,
  `num_of_product` varchar(20) NOT NULL DEFAULT '0',
  `sell` varchar(20) NOT NULL DEFAULT '0',
  `active` varchar(20) NOT NULL DEFAULT 'true',
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `name`, `code`, `image`, `description`, `about`, `updates`, `start_date`, `end_date`, `amount`, `complete_amount`, `running_status`, `num_of_product`, `sell`, `active`, `status`) VALUES
(1, 'Campaign Name 1', 'age5', 'age51.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br><br> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath', 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. ', '15/04/2014', '24/05/2014', '2500', '0', 'yes', '1', '0', 'true', '1'),
(2, 'Campaign Name 2', 'sad8', 'sad8.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.', 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections. The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. ', 'Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack!" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock jury box. Quick brown dogs jump over the lazy fox.', '10/04/2014', '23/05/2014', '2685', '0', 'yes', '2', '0', 'true', '1'),
(3, 'Campaign name 3', 'as75', 'as75.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam;', 'What''s happened to me?" he thought. It wasn''t a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat ', 'The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch "Jeopardy!", Alex Trebek''s fun TV quiz game. Woven silk pyjamas exchanged for blue quartz. Brawny gods just', '15/04/2014', '10/05/2014', '5000', '0', 'yes', '5', '0', 'true', '1'),
(4, 'Campaign Name 4', 'ts28', 'ts281.jpg', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself', '12/04/2014', '20/06/2014', '2555', '0', 'yes', '3', '0', 'false', '1'),
(5, 'Testing Campaign', 'v4u8', 'v4u81.jpg', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '16/04/2014', '23/05/2014', '392', '0', 'no', '0', '0', 'true', '1'),
(6, 'Testing Campaign', '3wh4', '3wh4.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'',', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'',', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'',', '16/04/2014', '22/04/2014', '3922', '0', 'yes', '0', '0', 'true', '1'),
(7, 'Hello Campaign', 'm3s3', 'm3s31.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum', '16/04/2014', '24/05/2014', '500', '0', 'no', '1', '0', 'false', '1'),
(8, 'Check 1234', 'e7w1', 'e7w11.jpg', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar p', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar p', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar p', '17/04/2014', '31/05/2014', '90', '0', 'no', '0', '0', 'true', '1'),
(9, 'Campaign Anonymous', 'nkf8', 'nkf81.jpg', 'Lorem ipsum dolor sit amet, pri invenire aliquando ne, ne vis sint illum copiosae. Mei ei regione admodum, sit nostrum vulputate cu. Ne quot affert fabulas sea, ei posse solet iudicabit sed. Euismod vivendum adolescens nam id, ad everti electram sea. Tollit legimus mea id, quod postea reprehendunt id per. Vitae altera fabulas mel ei, no vidit scribentur sea, inani quidam vix at.', 'the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Yypesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '17/04/2014', '23/05/2014', '934', '0', 'yes', '1', '0', 'false', '1'),
(10, 'Campaign Title', 'du57', 'du574.jpg', 'At Odyssey, we explore the world we live in through the eyes of our children, and together, learning is enriched through their inquisitiveness and our unrelenting focus on the world as our classroom. Our commitment to nurturing children extends beyond our research-based curriculum, state-of-the-art learning spaces and best-in-class educators. Our curriculum approach revolves around experimentation, exploration and experiential learning.', 'Allen has written numerous books and articles on this era in Churches of Christ history. These writings are often used as resources for churches, faculty, students and schools of theology.', 'Leonard Allen brings to Lipscomb strong academic experience in teaching and writing. One of the nation’s leading experts on the history and thought of the Restoration Movement, Allen has written numerous books and articles on this era in Churches of Christ history. These writings are often used as resources for churches, faculty, students and schools of theology.', '17/04/2014', '16/05/2014', '525', '0', 'yes', '1', '0', 'true', '1'),
(11, 'Campaign Testing', 'du52', 'du524.jpg', 'National Restoration Movement expert Leonard Allen has been named dean of Lipscomb University''s College of Bible and Ministry, which includes undergraduate Bible studies as well as the Hazelip School of Theology, accredited by the Association of Theological Schools. Holly Allen, nationally known intergenerational specialist and children’s ministry expert, has been appointed to a dual professorship in the university’s College of Arts and Sciences, in the university’s family life programs, and in the College of Bible and Ministry.', 'I eagerly anticipate the way Leonard and Holly will serve this university and how their expertise will help us connect our program to the Churches of Christ and our community as well as to strengthen family studies in this region,” said L. Randolph Lowry, president of Lipscomb Uni', 'Leonard Allen brings to Lipscomb strong academic experience in teaching and writing. One of the nation’s leading experts on the history and thought of the Restoration Movement, Allen has written numerous books and articles on this era in Churches of Christ history. These writings are often used as resources for churches, faculty, students and schools of theology.', '17/04/2014', '13/06/2014', '225', '0', 'no', '3', '0', 'true', '1'),
(12, 'Campaign Going', '2ip7', '2ip7.jpg', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\r\n<br><br>\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.', '05/05/2014', '22/05/2014', '5000', '0', 'yes', '1', '0', 'false', '1'),
(13, 'Testing 123 Campaign', 'xlb5', 'xlb5.jpg', '<div class="row">\r\n<div class="col-lg-4">But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain </div>\r\n<div class="col-lg-4">But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain </div>\r\n<div class="col-lg-4">But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain But I must explain </div>\r\n\r\n</div>', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat', '17/05/2014', '29/05/2014', '500', '0', 'no', '0', '0', 'true', '1'),
(14, 'Hello Campaign 33', 'eu51', 'eu51.jpg', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat', '23/05/2014', '30/05/2014', '334', '0', 'no', '0', '0', 'false', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `code_2` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `about_the_offer` text NOT NULL,
  `amount` varchar(20) NOT NULL DEFAULT '0',
  `campaign` varchar(20) NOT NULL,
  `sell` varchar(20) NOT NULL DEFAULT '0',
  `date` varchar(20) NOT NULL,
  `delivery` varchar(200) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `quantity_amount` varchar(255) NOT NULL,
  `active` varchar(20) NOT NULL DEFAULT 'true',
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `code`, `code_2`, `type`, `image`, `description`, `about_the_offer`, `amount`, `campaign`, `sell`, `date`, `delivery`, `quantity`, `quantity_amount`, `active`, `status`) VALUES
(1, 'Product name 1', '15s5', 'zn0x8uu4rsc08s07', 'Product', '15s51.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. ', '', '100', '3', '0', '2014/04/15', '3 Days', 'Limited', '20', 'true', '1'),
(2, 'Product Name 2', 'sdf1', '1vza42f2trzy2je3', 'Product', 'sdf1.jpg', 'Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci.', '', '90', '2', '0', '2014/04/13', '3 Days', 'Limited', '11', 'true', '1'),
(3, 'Product Name 3', 'als3', 'cjwymb79dzi2j4k6', 'Service', 'als3.jpg', 'The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove', '', '50', '1', '0', '2014/04/15', '2 Days', 'Unlimited', '', 'true', '1'),
(4, 'Product Name 4', 'sls2', '5kntxvhi0c8klsy6', 'Product', 'sls2.jpg', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly\r\n', '', '60', '2', '0', '2014/04/15', '1 Days', 'Limited', '20', 'true', '1'),
(5, 'Product Name 5', 'sld2', 'fqnokevy1g6npv45', 'Service', 'sld2.jpg', 'The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages', '', '45', '3', '0', '2014/04/15', '3 Days', 'Unlimited', '', 'true', '1'),
(6, 'Product Name 6', 'slr3', 'mtkzlo7bwtrihsx9', 'Product', 'slr3.jpg', 'The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is.The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses', '', '55', '3', '0', '2014/04/15', '3 Days', 'Limited', '15', 'true', '1'),
(7, 'Product Name 7', 'sao9', 'fk2qpjkh50w0zu19', 'Product', 'sao9.jpg', 'the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators', '', '84', '3', '0', '2014/04/16', '5 Days', 'Unlimited', '', 'true', '1'),
(8, 'Product Name 8', 'ifk3', 'xqsvky6iba48x321', 'Product', 'ifk31.jpg', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform', '', '85', '4', '0', '2014/04/15', '3 Days', 'Limited', '25', 'true', '1'),
(9, 'Product Name 9', 'kdi9', '3uqglgienbaelw86', 'Service', 'kdi9.jpg', 'Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es.Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in', '', '48', '4', '0', '2014/04/15', '3 Days', 'Limited', '3', 'true', '1'),
(10, 'Product Name 10', 'kas8', 'weg86i4khii229k2', 'Product', 'kas8.jpg', 'Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.', '', '68', '4', '0', '2014/04/16', '2 Days', 'Unlimited', '', 'true', '1'),
(12, 'Product Name 11', 'p3q4', '0137w78vne42x089', 'Product', 'p3q4.jpg', 'hello testing', '', '55', '3', '0', '2014/04/17', '12 Days', 'Limited', '20', 'true', '1'),
(13, 'Product Testing', '2ww9', '9b5qjq23wrcfrg65', 'Product', '2ww91.jpg', 'For search marketers, knowing the dates of these Google updates can help explain changes in rankings and organic website traffic and ultimately improve search engine optimization. Below, we’ve listed the major algorithmic changes that have had the biggest impact on search.', '', '225', '7', '0', '2014/04/17', '2 Days', 'Limited', '5', 'true', '1'),
(15, 'Product 1262', '5p89', 'zgt60yda27fykp53', 'Service', '5p891.jpg', 'You may be an adult who started a degree—or maybe never started—because life got in the way. Here’s where you get back to it! We understand that you probably can’t attend classes during work hours and that you may have family priorities now. And when we say we understand, we mean it. Our adult degree students are supported with a full-time educational advisor throughout their program, and most classes meet one night per week with many available online.', '', '25', '10', '0', '2014/04/17', '20 Hours', 'Limited', '5', 'true', '1'),
(16, 'Paining', '9d22', 'kobvamhwsnnkwqf5', 'Service', '9d221.jpg', 'Join a cause you care about. Volunteer in the community. Check out a panel of the world’s foremost thinkers. Network with current peers and future colleagues. With hundreds of campus organizations and events for the UChicago community, there’s bound to be one—or a dozen—that suits your interests.', '', '55', '11', '0', '2014/04/17', '2 Days', 'Limited', '3', 'true', '1'),
(17, 'Resume Creating 1', '1op4', 'mvobn3v90buzzzo7', 'Service', '1op45.jpg', 'In collaboration with the San Antonio Museum of Art, a Trinity chemistry research team examines a marble sculpture for traces of ancient surface pigments and other decorations.', '', '20', '11', '0', '2014/04/17', '2 Hours', 'Limited', '5', 'true', '1'),
(18, 'Creating Toys', 'db62', 'h583r7qiplzdavm9', 'Product', 'db621.jpg', 'For search marketers, knowing the dates of these Google updates can help explain changes in rankings and organic website traffic and ultimately improve search engine optimization. Below, we’ve listed the major algorithmic changes that have had the biggest impact on search.', '', '22', '9', '0', '2014/04/18', '20 Hours', 'Limited', '5', 'true', '1'),
(21, 'testing rishabh product', '80x9', '367ndpaqrym8gr87', 'Service', '80x91.jpg', 'hello testing.. :)', '', '15', '11', '0', '2014/04/18', '2 Hours', 'Unlimited', '', 'true', '1'),
(23, 'hello 1112233', 'tem2', '9dd8t1fopap5neq7', 'Service', 'tem2.jpg', 'hello testing....', '', '15', '9', '0', '2014/04/18', '2 Hours', 'Limited', '2', 'false', '0'),
(24, 'Product 1234', 'gzg0', 'kviqp70xjeepc9o6', 'Product', 'gzg0.jpg', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.', '', '20000', '12', '0', '2014/05/05', '3 Days', 'Limited', '10', 'true', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE IF NOT EXISTS `user_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `product` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_product`
--

INSERT INTO `user_product` (`id`, `name`, `phone`, `product`, `email`, `address`, `status`) VALUES
(1, 'Rishabh', '8010979311', '367ndpaqrym8gr87', 'rishabh_agr@yahoo.com', '0', '1'),
(3, 'Mohan', '8787879898', '9dd8t1fopap5neq7', 'therishabhagrawal@gmail.com', '', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;