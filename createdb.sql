CREATE TABLE User(
  user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_account VARCHAR(50) NOT NULL,
  user_type CHAR(1) NOT NULL,
  user_Fname VARCHAR(50) NOT NULL,
  user_Lname VARCHAR(50) NOT NULL,
  user_email VARCHAR(100) NOT NULL,
  user_phone VARCHAR(20) NOT NULL,
  user_ext INT,
  user_password VARCHAR(50) NOT NULL,
  UNIQUE(user_account)
);

CREATE TABLE Restaurant(
  rest_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  rest_name VARCHAR(50),
  rest_comment TEXT
);

CREATE TABLE Menu(
  menu_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  meal_name VARCHAR(50) NOT NULL,
  rest_id INT NOT NULL,
  meal_price INT NOT NULL,
  FOREIGN KEY(rest_id) REFERENCES Restaurant(rest_id)
);

CREATE TABLE Request(
  req_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  req_date DATE NOT NULL,
  req_by INT NOT NULL,
  req_restaurant INT NOT NULL,
  req_comment TEXT,
  INDEX req_index(req_date),
  FOREIGN KEY(req_by) REFERENCES User(user_id),
  FOREIGN KEY(req_restaurant) REFERENCES Restaurant(rest_id)
);

CREATE TABLE Reservation(
  resv_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  resv_timestamp DATE NOT NULL,
  resv_by INT NOT NULL,
  resv_request INT NOT NULL,
  resv_menu INT NOT NULL,
  INDEX resv_index(resv_timestamp),
  FOREIGN KEY(resv_by) REFERENCES User(user_id),
  FOREIGN KEY(resv_request) REFERENCES Request(req_id),
  FOREIGN KEY(resv_menu) REFERENCES Menu(Menu_id)
);
