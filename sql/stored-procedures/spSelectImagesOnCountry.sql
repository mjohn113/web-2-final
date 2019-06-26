DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectImagesOnCountry$$

CREATE PROCEDURE spSelectImagesOnCountry
(
    IN CountryCodeISO VARCHAR(2)
)
BEGIN
    SELECT travelimage.Path,
        travelimage.ImageID
    FROM travelimagedetails
    LEFT OUTER JOIN travelimage ON travelimagedetails.ImageID = travelimage.ImageID
    WHERE travelimagedetails.CountryCodeISO = CountryCodeISO;
END$$
DELIMITER ;