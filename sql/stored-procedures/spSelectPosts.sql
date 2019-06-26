DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectPosts$$

CREATE PROCEDURE spSelectPosts
(
    IN uid INT(11),
    IN pid INT(11)
)

BEGIN
    SELECT *
    FROM travelpost
    WHERE (uid IS NULL OR travelpost.UID = uid)
    AND (pid IS NULL OR travelpost.PostID = pid);


END$$
DELIMITER ;