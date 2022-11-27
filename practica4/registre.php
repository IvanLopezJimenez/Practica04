<!DOCTYPE html>
<html>
    <head>
        <title>Práctica 4 - Formulario de registro en POO</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css" type="text/css"> 
    </head>
    <body>
        <content>
            <?php
            //formulario donde introducimos los datos del usuario y su contraseña 
            echo'<a href="index.php"><button class = "atras" style=" width: 75px; padding: 10px; margin: 25px;">Back</button></a>';
            echo '<form action="altaPOO.php" method="POST" role="form" class="container">
                    <h1>Registrarse</h1>
                    <div class="alert">';
                        if (isset($_GET['error'])){
                            if ($_GET['error']=='faltan_cosas'){
                                echo "Rellene todos los campos, por favor";
                            } 
                            else if ($_GET['error']=='ya_en_uso'){
                                echo "Usuario o Correo ya registrado.";
                            } 
                            else if ($_GET['error']=='correo_incorrecto'){
                                echo 'Introduce un correo válido, por favor';
                                echo '<p style="color:#f1f1f1;">Ejemplo: example@gmail.com</p>';
                            } 
                            
                        }
                    echo '</div>
                    <input type="text" placeholder="Name" name = "nombre">
                    <input type="text" placeholder="Surname" name = "apellido">
                    <input type="text" placeholder="Email" name = "correo">
                    <input type="text" placeholder="User" name = "user">
                    <input type="password" placeholder="Password" name = "passwd">
                    <button type="submit" value="Registrarse">Registrarse</button>
                </form>';

            
            ?>
        </content>
        
    </body>
</html>