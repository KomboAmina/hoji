CREATE TABLE `people`(
    id INT(11) NOT NULL AUTO_INCREMENT,
    fullname VARCHAR(100) NOT NULL,
    role ENUM("client","admin") NOT NULL DEFAULT "client",
    totaltalks INT(11) NOT NULL DEFAULT 0,

    PRIMARY KEY(id)
);

CREATE TABLE `contacttypes`(
    id INT(5) NOT NULL AUTO_INCREMENT,
    contacttype VARCHAR(50) NOT NULL,
    icon VARCHAR(100) NOT NULL DEFAULT "cog",
    pattern VARCHAR(500) NOT NULL DEFAULT "https://www.{detail}",

    PRIMARY KEY(id),
    UNIQUE(contacttype)
);

INSERT INTO `contacttypes`(contacttype,icon,pattern)
VALUES("email","<i class='las la-at'></i>","mailto:{detail}"),
("phone","<i class='las la-mobile'></i>","tel:{detail}"),
("whatsapp","<i class='las la-mobile'></i>","https://wa.me/{detail}");

CREATE TABLE `contacts`(
    id INT(30) NOT NULL AUTO_INCREMENT,
    personid INT(11) NOT NULL,
    ctypeid INT(5) NOT NULL,
    contact VARCHAR(500) NOT NULL DEFAULT "https://",
    isdefault BOOLEAN NOT NULL DEFAULT true,

    PRIMARY KEY(id),
    FOREIGN KEY(personid) REFERENCES `people`(id),
    FOREIGN KEY(ctypeid) REFERENCES `contacttypes`(id)
);

CREATE TABLE `mailers`(
    id INT(3) NOT NULL AUTO_INCREMENT,
    mailhost VARCHAR(50) NOT NULL DEFAULT "smtp.localhost",
    mailaddress VARCHAR(255) NOT NULL DEFAULT "info@example.com"
    mailname VARCHAR(50) NOT NULL DEFAULT "Hoji Mailer",
    mailsecret TEXT,
    salt VARCHAR(32) NOT NULL,
    mailsecure VARCHAR(50) NOT NULL DEFAULT "tls",
    mailport VARCHAR(50) NOT NULL DEFAULT "567",

    PRIMARY KEY(id),
    UNIQUE(mailaddress),
    UNIQUE(mailsecret),
    UNIQUE(salt)
);

CREATE TABLE `projects`(
    id INT(11) NOT NULL AUTO_INCREMENT,
    projectcode VARCHAR(16) NOT NULL,
    title VARCHAR(100) NOT NULL,
    company VARCHAR(100),
    isactive BOOLEAN NOT NULL DEFAULT true,
    createdon TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    closedon TIMESTAMP,
    projectbody TEXT,

    PRIMARY KEY(id),
    UNIQUE(projectcode)
);

CREATE TABLE `projectclients`(
    id INT(30) NOT NULL AUTO_INCREMENT,
    projectid INT(11) NOT NULL,
    clientid INT(11) NOT NULL,
    ismaincontact BOOLEAN NOT NULL DEFAULT true,

    PRIMARY KEY(id),
    FOREIGN KEY(projectid) REFERENCES `projects`(id),
    FOREIGN KEY(clientid) REFERENCES `clients`(id)
);

CREATE TABLE `templates`(
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    templatefile VARCHAR(500) NOT NULL DEFAULT "public/templates/",

    PRIMARY KEY(id),
    UNIQUE(title)
);

CREATE TABLE `meetings`(
    id INT(11) NOT NULL AUTO_INCREMENT,
    meetingcode VARCHAR(16) NOT NULL,
    projectid INT(11) NOT NULL,
    templateid INT(11) NOT NULL,
    startdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    stopdate TIMESTAMP,
    title VARCHAR(100) NOT NULL,
    meetingbody TEXT,
    status ENUM('pending','completed','canceled') NOT NULL DEFAULT 'pending',

    PRIMARY KEY(id),
    UNIQUE(meetingcode),
    FOREIGN KEY(projectid) REFERENCES `projects`(id),
    FOREIGN KEY(templateid) REFERENCES `templates`(id)
);

CREATE TABLE `participants`(
    id INT(30) NOT NULL AUTO_INCREMENT,
    meetingid INT(11) NOT NULL,
    clientid INT(11) NOT NULL,
    role VARCHAR(50) NOT NULL DEFAULT "Client",

    PRIMARY KEY(id),
    FOREIGN KEY(meetingid) REFERENCES `meetings`(id),
    FOREIGN KEY(clientid) REFERENCES `people`(id)
);

CREATE TABLE `emails`(
    id INT(30) NOT NULL AUTO_INCREMENT,
    mailerid INT(3) NOT NULL,
    recipientaddress VARCHAR(255) NOT NULL,
    recipientname VARCHAR(100) NOT NULL,
    subject VARCHAR(500) NOT NULL,
    message TEXT,
    createdon TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    sendon TIMESTAMP,
    status ENUM('pending','sent','bounced') NOT NULL DEFAULT 'pending',

    PRIMARY KEY(id),
    FOREIGN KEY(mailerid) REFERENCES `mailers`(id)
);

CREATE TABLE `attachments`(
    id INT(50) NOT NULL AUTO_INCREMENT,
    emailid INT(30) NOT NULL,
    fileurl VARCHAR(500) NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(emailid) REFERENCES `emails`(id)
);
