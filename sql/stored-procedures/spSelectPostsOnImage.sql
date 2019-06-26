DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectPostsOnImage$$

CREATE PROCEDURE spSelectPostsOnImage
(
    IN imageID int(11)
)
BEGIN
    SELECT travelpost.Title,
        travelpost.PostID
    FROM travelpostimages
        LEFT OUTER JOIN travelpost ON travelpostimages.PostID = travelpost.PostID
    WHERE travelpostimages.ImageID = imageID;
END $$
DELIMITER ;