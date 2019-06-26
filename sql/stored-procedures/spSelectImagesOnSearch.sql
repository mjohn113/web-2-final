DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectImagesOnSearch$$

CREATE PROCEDURE spSelectImagesOnSearch
(
    IN title VARCHAR(255),
    IN country VARCHAR(255),
    IN city VARCHAR(255),
    IN continent VARCHAR(255)
)
BEGIN
    SET title = CONCAT("%", title, "%");
    IF country IS NULL || country = "" THEN
        SET country = "%";
    END IF;
    IF city IS NULL || city = "" THEN
        SET city = "%";
    END IF;
    IF continent IS NULL || continent = "" THEN
        SET continent = "%";
    END IF;

    SELECT travelimagedetails.ImageID,
        travelimagedetails.Title,
        travelimage.Path
    FROM travelimagedetails
    LEFT OUTER JOIN travelimage ON travelimagedetails.ImageID = travelimage.ImageID
    LEFT OUTER JOIN geocountries ON travelimagedetails.CountryCodeISO = geocountries.ISO
    LEFT OUTER JOIN geocontinents ON geocountries.Continent = geocontinents.ContinentCode
    WHERE travelimagedetails.Title LIKE title
        AND travelimagedetails.CityCode LIKE city
        AND travelimagedetails.CountryCodeISO LIKE country
        AND geocontinents.ContinentCode LIKE continent;
END $$
DELIMITER ;