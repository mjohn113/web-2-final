DELIMITER $$

DROP PROCEDURE IF EXISTS spUserLogin$$

CREATE PROCEDURE spUserLogin
(
    IN email varchar(255),
	IN password varchar(255)
)

BEGIN
    SELECT *
    FROM traveluser
    WHERE traveluser.Username = email
    AND traveluser.Pass = password;

END$$
DELIMITER ;