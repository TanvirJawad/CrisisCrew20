-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 06:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_panel`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('sowadrahman', 'kikhobor'),
('admin', 'admin'),
('tanvir', '12345');

CREATE TABLE `volunteers` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `firstName` VARCHAR(255) NOT NULL,
    `lastName` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `contact` VARCHAR(255),
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `address` TEXT,
    `location` VARCHAR(255),
    `gender` ENUM('male', 'female', 'other') NOT NULL,
    `bloodGroup` VARCHAR(255),
    `DOB` DATE,
    `skills` TEXT
);

INSERT INTO `volunteers` (`firstName`, `lastName`, `email`, `contact`, `address`, `location`, `gender`, `bloodGroup`, `DOB`, `skills`, `username`, `password`) VALUES
('John', 'Doe', 'john@example.com', '1234567890', '123 Main St', 'Cityville', 'male', 'O+', '1990-01-01', 'First Aid, Fire Safety', 'john_doe', '1234'),
('Jane', 'Doe', 'jane@example.com', '9876543210', '456 Oak St', 'Townsville', 'female', 'A-', '1992-03-15', 'CPR, Disaster Management', 'volunteer', '1234');


INSERT INTO `volunteers` (`firstName`, `lastName`, `email`, `contact`, `address`, `location`, `gender`, `bloodGroup`, `DOB`, `skills`, `username`, `password`) VALUES
('Sarah', 'Smith', 'sarah@example.com', '9876543210', '789 Oak St', 'Townsville', 'female', 'B+', '1995-06-20', 'First Aid, CPR', 'sarah_smith', '5678'),
('Michael', 'Johnson', 'michael@example.com', '1234567890', '456 Elm St', 'Cityville', 'male', 'AB-', '1993-09-10', 'Disaster Management, Fire Safety', 'michael_johnson', '9012'),
('John', 'Doe', 'john@example.com', '5555555555', '123 Maple St', 'Villagetown', 'male', 'O+', '1990-03-15', 'First Aid', 'john_doe', '1234'),
('Emily', 'Williams', 'emily@example.com', '7777777777', '789 Birch St', 'Suburbia', 'female', 'A-', '1997-12-05', 'CPR, First Responder', 'emily_williams', '5678'),
('David', 'Brown', 'david@example.com', '3333333333', '101 Pine St', 'Hometown', 'male', 'B-', '1988-04-30', 'Fire Safety, Disaster Management', 'david_brown', '9012'),
('Jessica', 'Anderson', 'jessica@example.com', '9999999999', '456 Cedar St', 'Metroville', 'female', 'AB+', '1992-08-25', 'First Aid, CPR', 'jessica_anderson', '5678'),
('William', 'Jones', 'william@example.com', '1111111111', '555 Oak St', 'Villageton', 'male', 'O-', '1991-02-18', 'Disaster Management', 'william_jones', '1234'),
('Olivia', 'Davis', 'olivia@example.com', '8888888888', '789 Redwood St', 'Smalltown', 'female', 'A+', '1998-11-07', 'First Aid, CPR', 'olivia_davis', '5678'),
('Daniel', 'Miller', 'daniel@example.com', '4444444444', '987 Spruce St', 'Countryside', 'male', 'A-', '1996-05-12', 'CPR, First Responder', 'daniel_miller', '9012'),
('Sophia', 'Martinez', 'sophia@example.com', '6666666666', '321 Birch St', 'Countyville', 'female', 'B+', '1994-10-02', 'Fire Safety', 'sophia_martinez', '5678');












CREATE TABLE `event` (
  `event_id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `location` VARCHAR(255),
  `date` DATE,
  `address` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `event` (`name`, `description`, `location`, `date`, `address`) VALUES
('Annual Charity Gala', 'Fundraising event for local charities', 'City Convention Center', '2023-05-20', '123 Main Street, Cityville'),
('Tech Conference 2023', 'Conference on the latest technology trends', 'Tech Park Auditorium', '2023-06-15', '456 Tech Avenue, Techtown'),
('Community Cleanup Day', 'Volunteer event to clean up the neighborhood', 'City Park', '2023-07-10', '789 Green Lane, Greenvale'),
('Art Exhibition Opening', 'Opening of a new art exhibition', 'Art Gallery Center', '2023-08-05', '101 Art Street, Artville'),
('Community Festival', 'Annual community festival', 'Cityville', '2023-09-20', 'City Park, Cityville'),
('Food Drive', 'Food collection drive for the needy', 'Cityville', '2023-10-15', 'Community Center, Cityville');
CREATE TABLE `task_event` (
    `task_id` INT AUTO_INCREMENT PRIMARY KEY,
    `event_id` INT,
    `task_description` TEXT,
    `name` VARCHAR(255),
    FOREIGN KEY (`event_id`) REFERENCES `event`(`event_id`)
);

-- Insert 10 rows of data into the task_event table with event IDs 1, 2, and 3
INSERT INTO `task_event` (`event_id`, `task_description`, `name`)
VALUES
    (1, 'Set up event banners', 'Banner Setup'),
    (1, 'Coordinate transportation', 'Transport Coordination'),
    (1, 'Manage guest list', 'Guest List Management'),
    (1, 'Create event schedule', 'Schedule Creation'),
    (2, 'Set up stage equipment', 'Stage Setup'),
    (2, 'Prepare catering services', 'Catering Preparation'),
    (2, 'Coordinate security arrangements', 'Security Coordination'),
    (2, 'Manage event registration', 'Registration Management'),
    (3, 'Set up event signage', 'Signage Setup'),
    (3, 'Coordinate audiovisual equipment', 'Audiovisual Coordination');


CREATE TABLE `resource` (
    `resource_id` INT AUTO_INCREMENT PRIMARY KEY,
    `task_id` INT,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    FOREIGN KEY (`task_id`) REFERENCES `task_event`(`task_id`)
);

INSERT INTO `resource` (`task_id`, `name`, `description`) VALUES
(1, 'Fire extinguisher', 'Fire extinguisher for emergencies'),
(1, 'water', 'Water hose for firefighting'),
(1, 'Fire blanket', 'Fire blanket for safety'),
(1, 'First aid kit', 'First aid kit for medical emergencies'),
(2, 'Rescue Equipment', 'Rescue Equipment for evacuations'),
(2, 'Flashlights', 'Flashlights for visibility'),
(2, 'Communication Devices', 'Communication Devices for coordination');





COMMIT;

CREATE TABLE assignee (
    assignee_id INT AUTO_INCREMENT PRIMARY KEY,
    task_id INT,
    resource_id INT,
    id INT,
    message TEXT,
    FOREIGN KEY (task_id) REFERENCES task_event(task_id),
    FOREIGN KEY (resource_id) REFERENCES resource(resource_id),
    FOREIGN KEY (id) REFERENCES volunteers(id)
);

-- Assign volunteer with ID 1 to Task 1, Resource 1 with a message
INSERT INTO assignee (task_id, resource_id, id, message)
VALUES (1, 1, 1, 'Please complete this task by the end of the day.');



-- Assign volunteer with ID 2 to Task 2, Resource 2 with a message
INSERT INTO assignee (task_id, resource_id, id, message)
VALUES (2, 2, 1, 'This is an urgent task. Please prioritize.');







COMMIT;
