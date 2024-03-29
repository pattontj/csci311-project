
CREATE TABLE UserProfile (
ID int(9) NOT NULL AUTO_INCREMENT,
Email varchar(255) NOT NULL,
Username varchar(255) NOT NULL,
PasswordHash varchar(64) NOT NULL,
ProfilePicture int(9) NOT NULL DEFAULT 1,
Status int,
Description varchar(500) NOT NULL DEFAULT 'Hello, world!',
PRIMARY KEY (ID),
FOREIGN KEY (ProfilePicture) REFERENCES Image(ID) 
);

CREATE TABLE Post (
ID int(12) NOT NULL AUTO_INCREMENT,
UserID int(9) NOT NULL,
PostContent varchar(900) NOT NULL,
Date Timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (ID),
FOREIGN KEY (UserID) REFERENCES UserProfile(ID)
);

CREATE TABLE Dislike (
UserID int(9) NOT NULL,
PostID int(12) NOT NULL,
FOREIGN KEY (UserID) REFERENCES UserProfile(ID),
FOREIGN KEY (PostID) REFERENCES Post(ID)
);

CREATE TABLE Subpost (
ParentPostID int(12) NOT NULL AUTO_INCREMENT,
UserID int(9) NOT NULL,
PostContent varchar(255) NOT NULL,
Date Timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (ParentPostID) REFERENCES Post(ID),
FOREIGN KEY (UserID) REFERENCES UserProfile(ID)
);

CREATE TABLE Image (
ID int(9) NOT NULL AUTO_INCREMENT,
Filename varchar(100) NOT NULL,
PRIMARY KEY (ID)
);
