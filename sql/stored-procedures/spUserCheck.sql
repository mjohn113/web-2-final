DELIMITER $$

DROP PROCEDURE IF EXISTS spUserCheck$$

CREATE PROCEDURE spUserCheck
(
    IN email varchar(255)
)

BEGIN
    SELECT traveluser.UserName
    FROM traveluser
    WHERE traveluser.Username = email;

END$$
DELIMITER ;