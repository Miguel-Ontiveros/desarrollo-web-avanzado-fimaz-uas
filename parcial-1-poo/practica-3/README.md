El sistema son varias partes que interactuan entre si para que funcione correctamente

Las clases se comunican entre si para que todo funcione de manera ordenada

No se que poner aqui asi que solo pondre el codigo

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("El correo electrónico no tiene un formato válido.");
        }