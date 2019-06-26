DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectPostsOnSearch$$

CREATE PROCEDURE spSelectPostsOnSearch
(
    IN title VARCHAR(255)
)
BEGIN
    SET title = CONCAT("%", title, "%");

    SELECT travelpost.PostID,
        travelpost.Title,
        travelpost.Message,
        travelpost.PostTime
    FROM travelpost
    WHERE travelpost.Title LIKE title;
END $$
DELIMITER ;