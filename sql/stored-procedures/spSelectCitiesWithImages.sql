DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectCitiesWithImages$$

CREATE PROCEDURE spSelectCitiesWithImages()

BEGIN

    SELECT AsciiName as name, GeoNameID as ID FROM geocities
    RIGHT JOIN travelimagedetails ON geocities.GeoNameID = travelimagedetails.CityCode
    WHERE AsciiName > ""
    GROUP BY GeoNameID;

END$$
DELIMITER ;