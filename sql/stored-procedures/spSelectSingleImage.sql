DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectSingleImage$$

CREATE PROCEDURE spSelectSingleImage
(
    IN imageID int(11)
)
BEGIN
    CREATE TEMPORARY TABLE tmpTable
    SELECT AVG(travelimagerating.Rating) As Rating,
        COUNT(travelimagerating.Rating) AS TotalRatings,
        travelimagerating.ImageID
    FROM travelimagerating
    WHERE travelimagerating.ImageID = imageID;

    SELECT travelimage.Path,
        traveluserdetails.UID,
        traveluserdetails.FirstName,
        traveluserdetails.LastName,
        travelimagedetails.Title,
        travelimagedetails.Latitude,
        travelimagedetails.Longitude,
        tmpTable.Rating,
        tmpTable.TotalRatings,
        geocountries.CountryName,
        travelimagedetails.CountryCodeISO,
        geocities.AsciiName,
        travelimagedetails.CityCode
    FROM travelimage
    LEFT OUTER JOIN traveluserdetails ON traveluserdetails.UID = travelimage.UID
    LEFT OUTER JOIN travelimagedetails ON travelimagedetails.ImageID = travelimage.ImageID
    LEFT OUTER JOIN tmpTable ON tmpTable.ImageID = travelimage.ImageID
    LEFT OUTER JOIN geocountries ON geocountries.ISO = travelimagedetails.CountryCodeISO
    LEFT OUTER JOIN geocities ON geocities.GeoNameID = travelimagedetails.CityCode
    WHERE travelimage.ImageID = imageID;
END $$
DELIMITER ;