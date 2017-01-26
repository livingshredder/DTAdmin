CREATE DATABASE IF NOT EXISTS `dtadmin`;
CREATE TABLE IF NOT EXISTS `dtadmin`.`members` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `userid` VARCHAR(30) NOT NULL,
    `password` CHAR(128) NOT NULL,
    `permissionlevel` VARCHAR(30) NOT NULL,
    `firstname` VARCHAR(30) NOT NULL,
    `lastname` VARCHAR(30) NOT NULL,
    `email` VARCHAR(40) NOT NULL,
    `disabled` BOOLEAN NOT NULL
);
CREATE TABLE IF NOT EXISTS `dtadmin`.`login_attempts` (
    `user_id` INT(11) NOT NULL,
    `time` VARCHAR(30) NOT NULL,
    `clientip` VARCHAR(70) NOT NULL
);
CREATE TABLE IF NOT EXISTS `dtadmin`.`syslog` (
    `event` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT(11) NOT NULL,
    `time` VARCHAR(30) NOT NULL,
    `reason` VARCHAR(30) NOT NULL,
    `clientip` VARCHAR(70) NOT NULL
);
CREATE TABLE IF NOT EXISTS `dtadmin`.`servers` (
    `serverid` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `servername` VARCHAR(30) NOT NULL,
    `currentstatus` VARCHAR(30) NOT NULL,
    `currentplayercount` INT(30) NOT NULL,
    `timesincelastsd` TIME NOT NULL,
    `gamemode` VARCHAR(30) NOT NULL,
    `gameserver` VARCHAR(30) NOT NULL,
    `operator` INT(10) NOT NULL,
    `maxraminmb` INT(30) NOT NULL,
    `freeraminmb` INT(30) NOT NULL,
    `cpuusagepercent` INT(3) NOT NULL,
    `ipaddress` VARCHAR(30) NOT NULL,
    `hostname` VARCHAR(30) NOT NULL,
    `queryportdefault` INT(10) NOT NULL,
    `queryportdtadmin` INT(10) NOT NULL,
    `rconpassword` VARCHAR(30) NOT NULL,
    `dtqueryseckey` VARCHAR(50) NOT NULL
);
CREATE TABLE IF NOT EXISTS `dtadmin`.`bans` (
    `banid` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `serverid` INT(10) NOT NULL,
    `playerbanned` VARCHAR(30) NOT NULL,
    `timebanned` INT(30) NOT NULL,
    `unbanned` BOOLEAN NOT NULL,
    `bannedby` VARCHAR(30) NOT NULL,
    `bannedon` VARCHAR(30) NOT NULL
);
CREATE TABLE IF NOT EXISTS `dtadmin`.`staffranks` (
    `banid` INT(10) NOT NULL,
    `serverid` INT(10) NOT NULL,
    `userranked` VARCHAR(30) NOT NULL,
    `timeranked` INT(30) NOT NULL,
    `unranked` BOOLEAN NOT NULL,
    `rankedby` VARCHAR(30) NOT NULL,
    `rankedon` VARCHAR(30) NOT NULL,
    `serverrank` VARCHAR(30) NOT NULL
);
CREATE TABLE IF NOT EXISTS `dtadmin`.`alerts` (
    `alertid` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `userid` INT(10) NOT NULL,
    `priority` VARCHAR(30) NOT NULL,
    `message` VARCHAR(50) NOT NULL,
    `read` BOOLEAN NOT NULL,
    `link` VARCHAR(70) NOT NULL,
    `icon` VARCHAR(30) NOT NULL,
    `timeadded` DATETIME NOT NULL
);
CREATE TABLE IF NOT EXISTS `dtadmin`.`tasks` (
    `taskid` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `userid` INT(10) NOT NULL,
    `percentcomplete` INT(3) NOT NULL,
    `colour` VARCHAR(30) NOT NULL,
    `completed` BOOLEAN NOT NULL,
    `message` VARCHAR(50) NOT NULL,
    `link` VARCHAR(70) NOT NULL
);
CREATE TABLE IF NOT EXISTS `dtadmin`.`messages` (
    `messageid` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `useridto` INT(10) NOT NULL,
    `useridfrom` INT(10) NOT NULL,
    `message` TEXT NOT NULL,
    `timesent` DATETIME NOT NULL
);
CREATE TABLE IF NOT EXISTS `dtadmin`.`usersecrets` (
    `secretid` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `userid` INT(10) NOT NULL,
    `secretkey` CHAR(50) NOT NULL,
    `note` TEXT NOT NULL,
    `timecreated` DATETIME NOT NULL
);
INSERT INTO `dtadmin`.`members` VALUES(1, 'josephmarsden', '$2y$10$zl19UVkCZusIH3aFt4ZvA.3QF30utdgbJyt0m52oMkCNrSWXUOD.e', 'root', 'Joseph', 'Marsden', 'josephmarsden@towerdevs.xyz', '0');
INSERT INTO `dtadmin`.`usersecrets` VALUES(1, 1, 'jH8jdh27j83k5p2ha', 'TestNote', '0000-00-00');

--INSERT INTO `dtadmin`.`servers` VALUES(1, 'Test Server', 'Online', '12', '00:01:41', 'Vanilla', 'Team Fortress 2', '1', '2048', '2048', '75', '127.0.0.1', 'test.towerdevs.xyz', '27015', '43105', 'insecure', 'insecure');
--INSERT INTO `dtadmin`.`servers` VALUES(2, 'Development Server', 'Offline', '0', '00:00:00', 'Vanilla', 'Garrys Mod', '1', '2048', '2048', '0', '127.0.0.1', 'locahost', '27015', '43105', 'devtest8642', 'none');


CREATE USER IF NOT EXISTS 'dtadmin'@'localhost' IDENTIFIED BY 'tjYjuUQEZr';
GRANT ALL ON `dtadmin`.* TO 'dtadmin'@'localhost';