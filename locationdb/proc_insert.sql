-- DROP PROCEDURE UDP_INSERT_wkt;
CREATE PROCEDURE UDP_INSERT_wkt
(
@shape AS VARCHAR(10),
@wkt AS GEOMETRY,
@label AS VARCHAR(50)
)
AS
BEGIN
   IF @shape='point'
   BEGIN
        INSERT INTO points(point, label) VALUES (@wkt,@label);
    END
    IF @shape='linestring'
    BEGIN
        INSERT INTO linestrings(linestring, label) VALUES (@wkt,@label);
    END
    IF @shape='polygon'
    BEGIN
        INSERT INTO polygons(polygon, label) VALUES (@wkt,@label);
    END
END
