USE blog;
CREATE DATABASE IF NOT EXISTS blog;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


CREATE TABLE `Person` (
                          `id` int(11) NOT NULL,
                          `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `Person` (`id`, `name`) VALUES
                                        (1, 'William'),
                                        (2, 'Marc'),
                                        (3, 'John');