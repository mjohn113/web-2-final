DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectReviews$$

CREATE PROCEDURE spSelectReviews
(
    IN imageId INT(11)
)

BEGIN
    SELECT *
    FROM travelimagerating
    LEFT JOIN traveluserdetails ON travelimagerating.UID = traveluserdetails.UID
    WHERE travelimagerating.ImageID = imageId
    ORDER BY travelimagerating.ReviewTime DESC;

END$$
DELIMITER ;