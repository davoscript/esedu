UPDATE est_busqueda

JOIN (
	SELECT subt.rbd, GROUP_CONCAT( subt.nivel_ensenanza_agregado SEPARATOR  ', ' ) as nivel_concat
	FROM (
		SELECT rbd, nivel_ensenanza_agregado
		FROM nivel_matricula
		GROUP BY rbd, nivel_ensenanza_agregado
	) AS subt
	GROUP BY rbd
) as resum ON resum.rbd = est_busqueda.rdb

SET est_busqueda.nivel_ensenanza = resum.nivel_concat