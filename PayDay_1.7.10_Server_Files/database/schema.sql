REATE DATABASE payday_server;
USE payday_server;

-- Users Table: Stores player information
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    rank VARCHAR(20) DEFAULT 'Player', -- Default rank for new players
    total_donations DECIMAL(10,2) DEFAULT 0.00,  -- Track total donations per user
    last_seen TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Last time player logged in
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Donations Table: Tracks all donation transactions
CREATE TABLE donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    rank_given VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    payment_status ENUM('Pending', 'Completed', 'Failed') DEFAULT 'Pending', -- Track donation status
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Payments Table: Handles different payment methods & logs transactions
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donation_id INT NOT NULL,
    payment_method ENUM('PayPal', 'Bank Transfer', 'Credit Card') NOT NULL, -- PayPal was most used at this time
    transaction_id VARCHAR(255) UNIQUE NOT NULL, -- Store the payment transaction ID
    payment_status ENUM('Pending', 'Completed', 'Refunded', 'Failed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (donation_id) REFERENCES donations(id) ON DELETE CASCADE
);

-- Player Sessions Table: Track logins & last seen timestamps
CREATE TABLE player_sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    ip_address VARCHAR(45), -- Supports both IPv4 and IPv6
    last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Ranks Table: Stores all possible donation ranks for the server
CREATE TABLE ranks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rank_name VARCHAR(20) UNIQUE NOT NULL,
    price DECIMAL(10,2) NOT NULL, -- Fixed price for the rank
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Donations Log Table: Keeps track of all donations for admin purposes
CREATE TABLE donations_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    admin VARCHAR(50) NOT NULL, -- Admin who processed or reviewed the donation
    rank_awarded VARCHAR(20) NOT NULL,
    reason TEXT, -- Any custom notes about the donation
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
