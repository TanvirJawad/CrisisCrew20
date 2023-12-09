# CrisisCrew

CrisisCrew is a comprehensive disaster management and volunteer coordination platform. It streamlines disaster response efforts by empowering volunteers and administrators with effective crisis management tools.

## Directory Structure
The project is organized into the following directories:

```sql
-- /CrisisCrew30
│
├── css/ # Stylesheets
│ ├── style.css
│ └── bootstrap.css
│
├── js/ # JavaScript files
│ ├── script.js
│ └── bootstrap.js
│
├── img/ # Images
│ ├── logo.png
│ └── ...
│
├── includes/ # PHP includes
│ ├── header.php
│ ├── footer.php
│ └── ...
│
├── pages/ # PHP pages
│ ├── admin.php
│ ├── volunteer.php
│ └── ...
│
├── process/ # PHP files for handling processes
│ ├── user_management.php
│ ├── event_management.php
│ ├── task_management.php
│ ├── resource_management.php
│ └── notification_system.php
│
├── vendor/ # Composer dependencies
│ └── ...
│
├── .gitignore # Git ignore file
├── README.md # Project documentation
├── index.php # Main entry point
└── database.sql # MySQL schema file
```
## Features

### Admin Features
- User Management
- Event Management
- Task Management
- Resource Management
- Notification System

### Volunteer Features
- User Dashboard
- Profile Management
- Task and Resource Interaction
- Event Interaction

### Global Volunteer Features
- Signup and Portfolio
- Invitation Handling

## Technologies Used
- HTML
- CSS
- Bootstrap
- PHP
- MySQL

## Getting Started

### Prerequisites
- Web server (e.g., Apache)
- PHP
- MySQL
- Composer (for PHP dependencies)

### Installation
1. Clone the repository to your localhost folder.
2. Launch XAMPP (or any other similar service) and start Apache, MySQL.
3. Go to phpMyAdmin and create a database named `crisiscrew20`. Import the file named `crisiscrew20.sql`.
4. Launch the site from your localhost.

## Project Database Schema

```sql
-- -- Create User Table
CREATE TABLE User (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Role ENUM('Admin', 'Volunteer', 'Global Volunteer') NOT NULL
);

CREATE TABLE Volunteer (
     id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contact VARCHAR(255),
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    address TEXT,
    location VARCHAR(255),
    gender ENUM('male', 'female', 'other') NOT NULL,
    bloodGroup VARCHAR(255),
    DOB DATE,
    Achievements TEXT,
    ProfilePhoto VARCHAR(255),
    FOREIGN KEY (UserID) REFERENCES User(UserID) ON DELETE CASCADE
);

-- Create Event Table
CREATE TABLE Event (
    EventID INT PRIMARY KEY AUTO_INCREMENT,
    EventName VARCHAR(100) NOT NULL,
    Date DATE NOT NULL,
    Location VARCHAR(255) NOT NULL,
    Description TEXT,
    SkillsNeeded TEXT
);

-- Create Task Table
CREATE TABLE Task (
    TaskID INT PRIMARY KEY AUTO_INCREMENT,
    EventID INT,
    VolunteerID INT,
    TaskName VARCHAR(100) NOT NULL,
    Status ENUM('Not Started', 'In Progress', 'Completed') NOT NULL,
    FOREIGN KEY (EventID) REFERENCES Event(EventID) ON DELETE CASCADE,
    FOREIGN KEY (VolunteerID) REFERENCES Volunteer(VolunteerID) ON DELETE CASCADE
);

-- Create Resource Table
CREATE TABLE Resource (
    ResourceID INT PRIMARY KEY AUTO_INCREMENT,
    TaskID INT,
    VolunteerID INT,
    ResourceName VARCHAR(100) NOT NULL,
    FOREIGN KEY (TaskID) REFERENCES Task(TaskID) ON DELETE CASCADE,
    FOREIGN KEY (VolunteerID) REFERENCES Volunteer(VolunteerID) ON DELETE CASCADE
);

-- Create Invitation Table
CREATE TABLE Invitation (
    InvitationID INT PRIMARY KEY AUTO_INCREMENT,
    EventID INT,
    VolunteerID INT,
    Status ENUM('Accepted', 'Declined') NOT NULL,
    FOREIGN KEY (EventID) REFERENCES Event(EventID) ON DELETE CASCADE,
    FOREIGN KEY (VolunteerID) REFERENCES Volunteer(VolunteerID) ON DELETE CASCADE
);

-- Create Notification Table
CREATE TABLE Notification (
    NotificationID INT PRIMARY KEY AUTO_INCREMENT,
    UserID INT,
    Content TEXT NOT NULL,
    Status ENUM('Read', 'Unread') NOT NULL,
    FOREIGN KEY (UserID) REFERENCES User(UserID) ON DELETE CASCADE
);

-- Insert Sample Data (for demonstration purposes)
INSERT INTO User (Username, Password, Role) VALUES
('admin', 'admin_password', 'Admin');

INSERT INTO Volunteer (UserID, FirstName, LastName, Email, Contact, Address, Location, Gender, BloodGroup, DateOfBirth, Achievements, ProfilePhoto) VALUES
(1, 'John', 'Doe', 'john@example.com', '123456789', '123 Main St', 'City', 'Male', 'A+', '1990-01-01', 'Volunteer of the Year', 'john.jpg');

INSERT INTO Event (EventName, Date, Location, Description, SkillsNeeded) VALUES
('Community Cleanup', '2023-01-15', 'Park', 'Join us for a community cleanup event!', 'Cleaning, Teamwork');

INSERT INTO Task (EventID, VolunteerID, TaskName, Status) VALUES
(1, 1, 'Collect Trash', 'Not Started');

INSERT INTO Resource (TaskID, VolunteerID, ResourceName) VALUES
(1, 1, 'Trash Bags');

INSERT INTO Invitation (EventID, VolunteerID, Status) VALUES
(1, 1, 'Accepted');

INSERT INTO Notification (UserID, Content, Status) VALUES
(1, 'You have a new task assigned.', 'Unread');
