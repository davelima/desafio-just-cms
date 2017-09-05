CREATE TABLE administrators (
  name VARCHAR(64) NOT NULL,
  login VARCHAR(24) NOT NULL,
  password VARCHAR(255) NOT NULL,
  id INT AUTO_INCREMENT,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE posts (
  title VARCHAR(128) NOT NULL,
  body TEXT NOT NULL,
  slug VARCHAR(255) NOT NULL,
  id INT AUTO_INCREMENT,
  PRIMARY KEY(id)
) ENGINE=InnoDB;
