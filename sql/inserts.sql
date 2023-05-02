INSERT INTO
    usuarios (usuario, pass)
VALUES ('Carla', '123456'), ('Alberto', '9999'), ('Pepe', '4444');

INSERT INTO equipos(equipo)
VALUES ('Lions'), ('Tigers'), ('Cocodriles'), ('Cats');

INSERT INTO
    categorias(categoria, edad, anoNacimiento)
VALUES ('Senior', '18', '2004'), ('Juvenil', '16', '2006'), ('Infantil', '14', '2008');

INSERT INTO
    jugadores(
        dni,
        nombre,
        apellidos,
        equipoId,
        categoriaId
    )
VALUES (
        '11111111A',
        ' Carla',
        'Delgado',
        1,
        1
    ), (
        '11111222S',
        ' Fabio',
        'Van',
        1,
        2
    ), (
        '33331111A',
        ' Elsa',
        'Gomez',
        2,
        2
    );