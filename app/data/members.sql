Create database msis_ocfrcase;
USE msis_ocfrcase;

CREATE TABLE Member (
    memberId INTEGER AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(64) NOT NULL,
    lastName VARCHAR(64) NOT NULL,
    dob DATE DEFAULT NULL,
    gender ENUM('Male','Female'),
    startDate DATE DEFAULT CURRENT_TIMESTAMP NOT NULL,
    street VARCHAR(64),
    city VARCHAR(64),
    state VARCHAR(64),
    zip VARCHAR(64),
    email VARCHAR(64),
    workPhoneNumber VARCHAR(25),
    mobilePhoneNumber VARCHAR(25),
    radioNumber VARCHAR(64),
    stationNumber INTEGER,
    isActive boolean,
    jobTitle VARCHAR(64)
);

CREATE TABLE Certifications (
certificateID INTEGER AUTO_INCREMENT PRIMARY KEY,
certifyingAgency VARCHAR(64),
certificationName VARCHAR(64),
expirationPeriod DATE NOT NULL
);
 CREATE TABLE MemberCert(

 );
