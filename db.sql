CREATE DATABASE main;

USE main;

CREATE TABLE hist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Artifact_Name VARCHAR(100) NOT NULL,
    Maintenance_Date VARCHAR(100) NOT NULL,
    Maintenance_Type VARCHAR(100) NOT NULL,
    Status_ VARCHAR(100) NOT NULL,
    Maintenance_Details VARCHAR(100) NOT NULL
);




CREATE DATABASE login_db;
USE login_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('admin', '123');



CREATE TABLE advisitors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    contact VARCHAR(10) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE artifacts2 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    object_code VARCHAR(50) NOT NULL UNIQUE,
    first_name VARCHAR(100) NOT NULL,
    date_of_object DATE NOT NULL,
    technical_description TEXT NOT NULL,
    object_size VARCHAR(50) NOT NULL,
    label_description TEXT NOT NULL,
    image_size VARCHAR(50) NOT NULL,
    image VARCHAR(255) NOT NULL,
    container_type ENUM('Frame', 'Glass Tool', 'Wooden Box', 'Metal Box', 'Paper or Docs', 'Plastic Folder') NOT NULL,
    
);



CREATE TABLE IF NOT EXISTS appraisals (
    appraisal_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    object_id VARCHAR(50) NOT NULL UNIQUE,
    appraiser_name VARCHAR(255) NOT NULL,
    appraisal_date DATE NOT NULL,
    reason VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    FOREIGN KEY (object_id) REFERENCES artifacts1(object_id)
);

CREATE TABLE bookings ( 
    id INT AUTO_INCREMENT PRIMARY KEY, visitor_type VARCHAR(50) NOT NULL, num_members INT NOT NULL, slot VARCHAR(20) NOT NULL, date DATE NOT NULL );



