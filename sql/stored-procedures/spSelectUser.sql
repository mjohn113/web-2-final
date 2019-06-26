DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectUser$$

CREATE PROCEDURE spSelectUser
(
    IN uid INT(11)
)

BEGIN
    SELECT *
    FROM traveluser
    LEFT JOIN traveluserdetails
        ON traveluserdetails.UID = traveluser.UID
    WHERE (uid IS NULL OR traveluser.UID = uid);

END$$
DELIMITER ;