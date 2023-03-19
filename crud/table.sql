CREATE TABLE `items` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `item_name` varchar(20) NOT NULL,
 `joined` timestamp(5) NOT NULL DEFAULT current_timestamp(5) ON UPDATE current_timestamp(5),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4
