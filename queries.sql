CREATE TABLE users
(
  id int NOT NULL
  AUTO_INCREMENT PRIMARY KEY,
  fullname varchar
  (255) NOT NULL,
  email varchar
  (64) NOT NULL UNIQUE,
  username varchar
  (64) NOT NULL UNIQUE,
  password varchar
  (255) NOT NULL,
  role varchar
  (64) NOT NULL
);

