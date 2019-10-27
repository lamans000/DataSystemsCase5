Create database ocfr;
USE ocfr;

CREATE TABLE Member (
    memberID INTEGER AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(64) NOT NULL,
    lastName VARCHAR(64) NOT NULL,
    dob DATE DEFAULT NULL,
    gender ENUM('Male','Female'),
    startDate DATE NOT NULL,
    street VARCHAR(64),
    city VARCHAR(64),
    state VARCHAR(64),
    zip VARCHAR(64),
    email VARCHAR(64),
    workPhoneNumber VARCHAR(25),
    mobilePhoneNumber VARCHAR(25),
    jobTitle VARCHAR(64),
    radioNumber VARCHAR(64) NOT NULL,
    stationNumber VARCHAR(64) DEFAULT 'all',
    isActive ENUM("Active","Inactive")
);

INSERT INTO Member (firstName, lastName, dob, gender, startDate, street, city, state, zip, email, workPhoneNumber, mobilePhoneNumber, jobTitle, radioNumber, stationNumber, isActive) VALUES
("Kathyrn","Pryde",'',"Female",'',"1123 Xavier School Drive","Watkinsville", "GA", "30677",'', "707-555-1234", "707-555-2345", "Chief", "A-1",'',""),
("Piotr","Rasputin",'',"Male",'',"A31 Mother Russia Road","Seattle", "WA", "98133",'','', "206-555-9876",'', "841","8",''),
("Warren","Worthington III",'',"Male",'',"1140 Experiment Station Rd","Watkinsville", "GA",'','', "706-555-3945",'','', "122","1",'')
;

CREATE TABLE Certifications (
certificationID INTEGER AUTO_INCREMENT PRIMARY KEY,
certificationName VARCHAR(64),
certifyingAgency VARCHAR(64),
expirationPeriod INTEGER
);

INSERT INTO Certifications (certificationName, certifyingAgency, expirationPeriod) VALUES
("CPR","CPR for Healthcare Providers/American Heart Association","2"),
("CPR","CPR for the Professional Rescuer/American Red Cross","2"),
("Firefighter I","Athens Technical College","3"),
("Firefighter I","Ivy Technical College","3"),
("Firefighter II","Ivy Technical College","3"),
("POST","Georgia POST Academy","5"),
("HAZMAT","Athens Technical College","3"),
("Extrication","Georgia Fire College",""),
("EMT-Adv","Georgia Department of Homeland Security","3"),
("Due Regard","Athens Technical College","2"),
("Paramedic","Albany Technical College","2")
;

CREATE TABLE MemberCertifications(
memberCertification INTEGER AUTO_INCREMENT PRIMARY KEY,
memberID INTEGER,
certificationID INTEGER,
certificationRecieved DATE,
FOREIGN KEY (memberID) references Member(memberID),
FOREIGN KEY (certificationID) references Certifications(certificationID)
ON DELETE CASCADE
);

INSERT INTO MemberCertifications (memberID, certificationID,certificationRecieved) VALUES
("1","5","1990-11-20"),
("1","1","1990-11-20"),
("1","7","1990-11-20"),
("1","8","1990-11-20"),
("2","9","2000-11-30"),
("2","1","2000-11-30"),
("2","10","2000-11-30"),
("3","11", "2000-02-02"),
("3","2","2000-02-02"),
("3","10","2000-02-02"),
("3","11","2000-02-02"),
("3","3","2000-02-02");

-- Give a member a new certification
INSERT INTO MemberCertifications (memberID, certificationID, certificationRecieved) VALUES ("6","13","2019-10-25");

-- Show all members' certifications
SELECT m.memberID, m.firstName, m.lastName, c.certificationID, x.certificationName
FROM Member as m, MemberCertifications as c, Certifications as x
WHERE m.memberID = c.memberID AND c.certificationID = x.certificationID;

-- SHow expired certifications
SELECT m.firstName as firstName, m.lastName as lastName, c.certificationName as cName, DATE_ADD(mc.certificationRecieved, INTERVAL c.expirationPeriod year) as dateExpired FROM ocfr.Member as m, ocfr.Certifications as c, ocfr.MemberCertifications as mc WHERE m.memberID = mc.memberID AND c.certificationID = mc.certificationID AND DATE_ADD(mc.certificationRecieved, INTERVAL c.expirationPeriod year) < CURDATE();
