DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectNewImages$$

CREATE PROCEDURE spSelectNewImages()

BEGIN
    SELECT travelimage.ImageID, Path FROM travelimage
    LEFT JOIN travelimagedetails ON travelimage.ImageID = travelimagedetails.ImageID;

END$$
DELIMITER ;