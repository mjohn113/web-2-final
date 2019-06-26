DELIMITER $$

DROP PROCEDURE IF EXISTS spDeleteReview$$

CREATE PROCEDURE spDeleteReview
(
    IN imageId INT(11)
)

BEGIN
    DELETE
    FROM travelimagerating
    WHERE ImageRatingID = imageId;


END$$
DELIMITER ;