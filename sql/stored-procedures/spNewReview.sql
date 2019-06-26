DELIMITER $$
DROP PROCEDURE IF EXISTS spNewReview$$

CREATE PROCEDURE spNewReview
(
    IN UID int(11),
    IN imageId int(11),
    IN rating tinyint(4),
    IN review text
)
BEGIN
    INSERT INTO travelimagerating (ImageID, Rating, UID, Review, ReviewTime)
    VALUES (imageId, rating, UID, review, NOW());
END$$
DELIMITER ;