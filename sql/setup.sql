CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(64),
    last_name VARCHAR(64),
    phone VARCHAR(14),
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(32) NOT NULL UNIQUE,
    locked BOOLEAN DEFAULT false,
    moderator BOOLEAN DEFAULT false,
    PRIMARY KEY(id)
);

CREATE TABLE user_session(
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    session_id VARCHAR(32) NOT NULL,
    expire_time INT NOT NULL
    PRIMARY KEY(id)
);