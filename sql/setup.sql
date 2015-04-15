DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `user_session`;
DROP TABLE IF EXISTS `posts`;
DROP TABLE IF EXISTS `tags`;
DROP TABLE IF EXISTS `replies`;
DROP TABLE IF EXISTS `post_tags`;
DROP TABLE IF EXISTS `images`;
DROP TABLE IF EXISTS `user_detail`;
DROP TABLE IF EXISTS `user_csrf`;


CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(32) NOT NULL,
  `flagged` INT,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `user_session` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT,
  `session_id` VARCHAR(32),
  `expire_time` INT,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `posts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `users_id` INT,
  `post_head` TINYTEXT,
  `post_content` TEXT,
  `post_time` INT,
  `post_update` INT,
  `flagged` INT,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `tags` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tag_name` VARCHAR(32),
  `creator_id` INT,
  `tag_time` INT,
  `flagged` INT,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `replies` (
  `posts_id` INT,
  `reply_time` INT,
  `reply_update` INT,
  `id` INT NOT NULL AUTO_INCREMENT,
  `reply_content` TEXT,
  `users_id` INT,
  `flagged` INT,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `post_tags` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `posts_id` INT,
  `tags_id` INT,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `images` (
  `replies_id` INT,
  `id` INT NOT NULL AUTO_INCREMENT,
  `posts_id` INT,
  `image_name` TINYTEXT,
  `flagged` INT,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `user_detail` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(64),
  `last_name` VARCHAR(64),
  `phone` VARCHAR(14),
  `disabled` TINYINT,
  `moderator` TINYINT,
  PRIMARY KEY  (`user_id`)
);

CREATE TABLE `user_csrf` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT,
  `csrf` VARCHAR(128),
  `page` VARCHAR(32),
  `expire_time` INT,
  PRIMARY KEY  (`id`)
);