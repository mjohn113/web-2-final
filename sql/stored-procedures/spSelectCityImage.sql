DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectCityImage$$
CREATE PROCEDURE spSelectCityImage
(
    IN id varchar(255)
)
BEGIN
    SELECT *
    FROM travelimage
    WHERE (id IS NULL OR travelimage.ImageID = id);


END$$
DELIMITER ;