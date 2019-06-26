DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectAllImages$$

CREATE PROCEDURE spSelectAllImages()

BEGIN
    SELECT travelimage.ImageID,
        travelimage.Path,
        travelimagedetails.Title,
        geocountries.CountryName,
        geocontinents.ContinentName
    FROM travelimage
    LEFT OUTER JOIN travelimagedetails ON travelimage.ImageID = travelimagedetails.ImageID
    LEFT OUTER JOIN geocountries ON travelimagedetails.CountryCodeISO = geocountries.ISO
    LEFT OUTER JOIN geocontinents ON geocountries.Continent = geocontinents.ContinentCode;
END$$
DELIMITER ;