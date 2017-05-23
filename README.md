# Blogs

@author: Sofiya Antonyuk
Database Creating Query

CREATE TABLE users
(
	id			INT 			NOT NULL 	AUTO_INCREMENT PRIMARY KEY,
	username	VARCHAR(40)		NOT NULL,
	email		VARCHAR(255)	NOT NULL,
	password	VARCHAR(255)	NOT NULL
);

CREATE TABLE blogger
(
	id			INT				NOT NULL	PRIMARY KEY,
	username	VARCHAR(40)		NOT NULL,
	mostRecent	DATETIME,
	bio			VARCHAR(800),
	portrait	VARCHAR(255),
	blogCounter	INT,
	
	FOREIGN KEY (id) REFERENCES users(id)
	
);

CREATE TABLE blogpost
(
  postId	      INT   			NOT NULL 	AUTO_INCREMENT PRIMARY KEY,
  title       VARCHAR(255)		NOT NULL,
  content	  VARCHAR(800),
  dateCreated DATETIME,
  wordCounter   INT
);

CREATE TABLE blogger_to_blogpost_junct
(
	id INT NOT NULL,
	postId INT NOT NULL,
	
	FOREIGN KEY (id) REFERENCES blogger(id),
	FOREIGN KEY (postId) REFERENCES blogpost(postId)
);