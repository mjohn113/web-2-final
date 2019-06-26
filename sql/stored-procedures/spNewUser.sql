DELIMITER $$
DROP PROCEDURE IF EXISTS spNewUser$$

CREATE PROCEDURE spNewUser
(
    IN email varchar(255),
    IN password varchar(255),
    IN fName varchar(255),
    IN lName varchar(255)
)
BEGIN
    INSERT INTO traveluser (UID, UserName, Pass, State, DateJoined, DateLastModified)
    VALUES (NULL, email, password, 1, CURRENT_DATE(), CURRENT_DATE());

    INSERT INTO traveluserdetails (UID, FirstName, LastName)
    VALUES (LAST_INSERT_ID(), fName, lName);
END$$
DELIMITER ;