UPDATE est_busqueda
JOIN dotacion_docente ON est_busqueda.rdb = dotacion_docente.rbd

SET est_busqueda.docentehh_alumno = dotacion_docente.total_docentes_hh / est_busqueda.numero_alumnos

---------------------------------

SELECT dotacion_docente.rbd, 
	dotacion_docente.nombre_establecimiento, 
	dotacion_docente.total_docentes_hh / alumnos.nalumnos
from dotacion_docente
join (SELECT rbd, SUM( numero_alumnos ) as nalumnos 
		FROM nivel_matricula GROUP BY rbd) as alumnos 
	on dotacion_docente.rbd = alumnos.rbd