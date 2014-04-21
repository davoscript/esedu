UPDATE est_busqueda
SET geopunto = GeomFromText( CONCAT ('POINT(', est_busqueda.longitud, ' ', est_busqueda.latitud, ')'), 4326 )