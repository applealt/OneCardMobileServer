CREATE DATABASE ONECardDb;

USE ONECardDb;

CREATE TABLE AccountTypes(
    accountTypeId INT PRIMARY KEY AUTO_INCREMENT,
    accountType VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE Users(
    userId INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    photoDirectory VARCHAR(500)
); 

CREATE TABLE PendingPhotos(
    pendingPhotoId INT PRIMARY KEY AUTO_INCREMENT,
    pendingPhotoDirectory VARCHAR(500),
    userId INT UNIQUE,
    FOREIGN KEY (userId) REFERENCES Users(userId)
);

CREATE TABLE Accounts(
    networkId VARCHAR(50) PRIMARY KEY,
    accountPassword VARCHAR(50) NOT NULL,
    birthdate DATE NOT NULL,
	tokenString TEXT,
	tokenTime DATETIME,
    accountTypeId INT,
    FOREIGN KEY (accountTypeId) REFERENCES AccountTypes(accountTypeId),
    userId INT UNIQUE,
    FOREIGN KEY (userId) REFERENCES Users(userId)
);

CREATE TABLE TransactionTypes(
    transactionTypeId INT PRIMARY KEY AUTO_INCREMENT,
    transactionType VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE Transactions(
    transactionId INT PRIMARY KEY AUTO_INCREMENT,
    amount DOUBLE DEFAULT 0,
	description TEXT NOT NULL,
    transactionTime DATETIME DEFAULT NOW(),
    transactionTypeId INT,
    FOREIGN KEY (transactionTypeId) REFERENCES TransactionTypes(transactionTypeId),
    userId INT,
    FOREIGN KEY (userId) REFERENCES Users(userId)
);

CREATE TABLE Balances(
    balanceId INT PRIMARY KEY AUTO_INCREMENT,
    condorBalance DOUBLE DEFAULT 0,
    printCredit DOUBLE DEFAULT 0,
    userId INT UNIQUE,
    FOREIGN KEY (userId) REFERENCES Users(userId)
);

CREATE TABLE Cards(
    cardId INT PRIMARY KEY AUTO_INCREMENT,
    cardStatus BIT DEFAULT 0,
    userId INT UNIQUE,
    FOREIGN KEY (userId) REFERENCES Users(userId)
);

CREATE TABLE NotificationTypes(
    notificationTypeId INT PRIMARY KEY AUTO_INCREMENT,
    notificationType VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE Notifications(
    notificationId INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(500) NOT NULL,
    description TEXT NOT NULL,
    notificationTime DATETIME DEFAULT NOW(),
    notificationTypeId INT,
    FOREIGN KEY (notificationTypeId) REFERENCES NotificationTypes(notificationTypeId)
);

CREATE TABLE Subscriptions(
    subscriptionId INT PRIMARY KEY AUTO_INCREMENT,
    userId INT,
    FOREIGN KEY (userId) REFERENCES Users(userId),
    notificationTypeId INT,
    FOREIGN KEY (notificationTypeId) REFERENCES NotificationTypes(notificationTypeId),
    subscriptionStatus BIT DEFAULT 1
)