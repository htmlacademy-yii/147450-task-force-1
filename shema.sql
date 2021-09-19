DROP TABLE IF EXISTS users;
CREATE TABLE users
(
  user_id         INT PRIMARY KEY AUTO_INCREMENT,
  user_name       VARCHAR(256) NOT NULL UNIQUE,
  user_email      VARCHAR(256) NOT NULL UNIQUE,
  user_created_at DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS profiles;
CREATE TABLE profiles
(
  profile_id       INT PRIMARY KEY AUTO_INCREMENT,
  user_avatar      VARCHAR(256),
  user_address     VARCHAR(256),
  user_description VARCHAR(256),
  user_birthdate   DATE,
  user_works_photo VARCHAR(256),
  user_phone       VARCHAR(256) UNIQUE,
  user_skype       VARCHAR(256) UNIQUE,
  user_telegram    VARCHAR(256) UNIQUE,
  notification_new_message BOOL,
  notification_user_action BOOL,
  notification_new_review BOOL,
  notification_show_contact BOOL,
  notification_show_profile BOOL,
  FOREIGN KEY (profile_id) REFERENCES users (user_id)
);

DROP TABLE IF EXISTS orders_categories;
CREATE TABLE orders_categories
(
  category_id    INT AUTO_INCREMENT PRIMARY KEY,
  category_icon  VARCHAR(128),
  category_name  VARCHAR(128) UNIQUE,
  category_alias VARCHAR(128) UNIQUE
);

DROP TABLE IF EXISTS cities;
CREATE TABLE cities
(
  city_id        INT AUTO_INCREMENT PRIMARY KEY,
  city_name      VARCHAR(128) UNIQUE,
  city_latitude  decimal(10, 8),
  city_longitude decimal(10, 8)
);
