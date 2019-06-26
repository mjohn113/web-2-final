DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectCountry$$
CREATE PROCEDURE spSelectCountry
(
    IN countrycode varchar(255)
)
BEGIN
    SELECT *
    FROM geocountries
    WHERE (countrycode IS NULL OR geocountries.ISO = countrycode);


END$$
DELIMITER ;