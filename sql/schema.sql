-- Create the database
CREATE DATABASE todo_list;

-- Use the created database
USE todo_list;

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tasks Table
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    due_date DATETIME,
    priority VARCHAR(50),
    status VARCHAR(50) DEFAULT 'To Do',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Categories Table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Task Categories Table (Many-to-Many relationship)
CREATE TABLE task_categories (
    task_id INT,
    category_id INT,
    PRIMARY KEY (task_id, category_id),
    FOREIGN KEY (task_id) REFERENCES tasks(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
-- Create the database
CREATE DATABASE todo_list;

-- Use the created database
USE todo_list;

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tasks Table
CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    due_date DATETIME,
    priority VARCHAR(50),
    status VARCHAR(50) DEFAULT 'To Do',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Categories Table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Task Categories Table (Many-to-Many relationship)
CREATE TABLE task_categories (
    task_id INT,
    category_id INT,
    PRIMARY KEY (task_id, category_id),
    FOREIGN KEY (task_id) REFERENCES tasks(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
