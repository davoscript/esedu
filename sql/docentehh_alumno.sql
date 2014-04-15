SELECT dotacion_docente.rbd, 
	dotacion_docente.nombre_establecimiento, 
	dotacion_docente.total_docentes_hh / alumnos.nalumnos
from dotacion_docente
join (SELECT rbd, SUM( numero_alumnos ) as nalumnos 
		FROM nivel_matricula GROUP BY rbd) as alumnos 
	on dotacion_docente.rbd = alumnos.rbd