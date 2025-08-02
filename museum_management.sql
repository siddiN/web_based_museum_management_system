CREATE DATABASE m1;

USE m1;

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    visitor_type VARCHAR(50) NOT NULL,
    members INT NOT NULL,
    date DATE NOT NULL,
    time_slot VARCHAR(50) NOT NULL,
    payment_status VARCHAR(20) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
