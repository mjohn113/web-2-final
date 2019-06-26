DELIMITER $$

DROP PROCEDURE IF EXISTS spSelectAllContinents$$

CREATE PROCEDURE spSelectAllContinents()

BEGIN

    SELECT * FROM geocontinents;

END$$
DELIMITER ;