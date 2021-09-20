DROP TABLE IF EXISTS users;
CREATE TABLE users
(
  user_id                    INT PRIMARY KEY AUTO_INCREMENT,
  user_created_at            DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  user_name                  VARCHAR(256) NOT NULL UNIQUE,
  user_email                 VARCHAR(256) NOT NULL UNIQUE,
  user_avatar                VARCHAR(256),
  user_address               VARCHAR(256),
  user_description           VARCHAR(256),
  user_birthdate             DATE,
  user_categories_id         INT,
  user_works_photo           VARCHAR(256),
  user_phone                 VARCHAR(256) UNIQUE,
  user_skype                 VARCHAR(256) UNIQUE,
  user_telegram              VARCHAR(256) UNIQUE,
  notification_new_message   BOOL,
  notification_user_action   BOOL,
  notification_new_review    BOOL,
  customization_show_contact BOOL,
  customization_show_profile BOOL
);


DROP TABLE IF EXISTS orders_categories;
CREATE TABLE orders_categories
(
  category_id    INT AUTO_INCREMENT PRIMARY KEY,
  category_icon  VARCHAR(256),
  category_name  VARCHAR(256) UNIQUE,
  category_alias VARCHAR(256) UNIQUE
);

DROP TABLE IF EXISTS cities;
CREATE TABLE cities
(
  city_id        INT AUTO_INCREMENT PRIMARY KEY,
  city_name      VARCHAR(256) UNIQUE,
  city_latitude  DECIMAL(10, 8),
  city_longitude DECIMAL(10, 8)
);


DROP TABLE IF EXISTS tasks cascade;
CREATE TABLE tasks
(
  task_id           INT AUTO_INCREMENT PRIMARY KEY,
  task_created_at   DATETIME,
  task_name         VARCHAR(256),
  task_description  VARCHAR(256),
  task_category_id  INT,
  task_files        VARCHAR(256),
  task_city_id      INT,
  task_budget       DECIMAL(10, 2),
  task_deadline     DATETIME,
  task_address      VARCHAR(256),
  task_review       VARCHAR(256),
  task_status       VARCHAR(256),
  task_performer_id INT,
  task_author_id    INT,
  task_message_id   INT,
  task_feedback_id  INT,
  FOREIGN KEY (task_category_id) REFERENCES orders_categories (category_id),
  FOREIGN KEY (task_city_id) REFERENCES cities (city_id),
  FOREIGN KEY (task_performer_id) REFERENCES users (user_id),
  FOREIGN KEY (task_author_id) REFERENCES users (user_id)
);

DROP TABLE IF EXISTS messages cascade;
CREATE TABLE messages
(
  message_id         INT AUTO_INCREMENT PRIMARY KEY,
  message_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  message_notice     VARCHAR(512),
  message_task_id    INT,
  FOREIGN KEY (message_task_id) REFERENCES tasks (task_id)
);

DROP TABLE IF EXISTS feedbacks cascade;
CREATE TABLE feedbacks
(
  feedback_id         INT AUTO_INCREMENT PRIMARY KEY,
  feedback_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  feedback_notice     VARCHAR(512),
  feedback_task_id    INT,
  FOREIGN KEY (feedback_task_id) REFERENCES tasks (task_id)
);

ALTER TABLE tasks
  ADD FOREIGN KEY (task_message_id) REFERENCES messages (message_id);
ALTER TABLE tasks
  ADD FOREIGN KEY (task_feedback_id) REFERENCES feedbacks (feedback_id);
