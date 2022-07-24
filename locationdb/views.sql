-- DROP VIEW IF EXISTS VW_ALL_SHAPES;

CREATE VIEW VW_ALL_SHAPES AS
    SELECT linestrings.linestring, 
    polygons.polygon,
    points.point
FROM 
linestrings,polygons,points
WHERE linestrings.linestring IS NOT NULL AND polygons.polygon IS NOT NULL AND points.point IS NOT NULL;
