DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectImages$$

CREATE PROCEDURE spSelectImages
(
    IN uid INT(11)
)

BEGIN
    SELECT * FROM travelimagedetails
    LEFT JOIN travelimage ON travelimagedetails.ImageID = travelimage.ImageID
    WHERE travelimage.UID = uid;

END$$
DELIMITER ;