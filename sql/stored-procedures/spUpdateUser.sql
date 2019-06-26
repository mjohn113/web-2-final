DELIMITER $$
DROP PROCEDURE IF EXISTS spUpdateUser$$

CREATE PROCEDURE spUpdateUser
(
    IN uid int(11),
    IN fName varchar(255),
    IN lName varchar(255),
    IN address varchar(255),
    IN city varchar(255),
    IN region varchar(255),
    IN country varchar(255),
    IN postal varchar(255),
    IN phone varchar(255),
    IN email varchar(255),
    IN state int(11)
)
BEGIN
    UPDATE traveluser
    SET traveluser.State = state
    WHERE traveluser.UID = uid;
    
    UPDATE traveluserdetails
    SET FirstName = fName,
        LastName = lName,
        Address = address,
        City = city,
        Region = region,
        Country = country,
        Postal = postal,
        Phone = phone,
        Email = email
    WHERE traveluserdetails.UID = uid;
END$$
DELIMITER ;