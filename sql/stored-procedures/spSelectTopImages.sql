DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectTopImages$$

CREATE PROCEDURE spSelectTopImages()

BEGIN
    SELECT travelimage.ImageID, AVG(Rating) as rating, Path FROM travelimage
    LEFT JOIN travelimagerating ON travelimage.ImageID = travelimagerating.ImageID
    LEFT JOIN travelimagedetails ON travelimage.ImageID = travelimagedetails.ImageID
    GROUP BY travelimagerating.ImageID
    ORDER BY rating DESC;

END$$
DELIMITER ;