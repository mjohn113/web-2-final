DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectImagesOnPost$$

CREATE PROCEDURE spSelectImagesOnPost
(
    IN PostID int(11)
)
BEGIN
    SELECT travelimage.Path,
        travelimage.ImageID
    FROM travelpostimages
    LEFT OUTER JOIN travelimage ON travelpostimages.ImageID = travelimage.ImageID
    WHERE travelpostimages.PostID = PostID;
END$$
DELIMITER ;