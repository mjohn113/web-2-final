DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectCountriesWithImages$$

CREATE PROCEDURE spSelectCountriesWithImages()

BEGIN

    SELECT CountryName, ISO FROM geocountries
    RIGHT JOIN travelimagedetails ON geocountries.ISO = travelimagedetails.CountryCodeISO
    GROUP BY ISO;

END$$
DELIMITER ;