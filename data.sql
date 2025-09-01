-- For Manager Account
CREATE TABLE manager_accounts (
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NOT NULL ,
	password VARCHAR(255) NOT NULL
);

CREATE TABLE list_users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE new_users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE,
	employee_code INT(7) NOT NULL ,
	password VARCHAR(255) NOT NULL
);

-- For Employee Account
CREATE TABLE employee_accounts (
	id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL
);

CREATE TABLE requests (
	id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
	date_submit DATETIME NOT NULL,
	dates_requested VARCHAR(255) NOT NULL,
	total_days INT NOT NULL,
	reason TEXT NOT NULL,
	status ENUM('approved', 'rejected', 'pending') NOT NULL
);

CREATE TABLE new_requests (
	id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
	date_from DATE NOT NULL,
	date_to DATE NOT NULL,
	reason TEXT NOT NULL
);