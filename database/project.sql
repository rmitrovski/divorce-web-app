CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL,
    `registration_date` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `bookings` (
    `booking_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NOT NULL,
    `phone` int NOT NULL,
    `email` varchar(100) NOT NULL,
    `type` varchar(100) NOT NULL,
    `date` DATE NOT NULL,
    `time` varchar(100) NOT NULL,
    `reason` varchar(200) NOT NULL,
    `user_id` int(11) NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 
