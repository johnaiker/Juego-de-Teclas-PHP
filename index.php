
<style>
    body {
        background-color: #fff3b0;
        font-family:Arial, Helvetica, sans-serif;
        margin: 0 3rem;
        color: #335c67;
    }
    
    .text-center {
        text-align: center;        
        margin: 0 auto;
    }
    .text-h4 {
        color: #335c67;
        font-size: 3rem;
    }
    .body {
        margin: 4rem auto;
    }

    .box_container {
        
        position: relative;
        width: 600px;
        height: 400px;
        margin: 3rem auto;
        border: 4px solid #e09f3e;
    }
    .mt-4 {
        margin-top: 3rem;
    }
    .mt-3 {
        margin-top: 2rem;
    }
    .mt-2 {
        margin-top: 1rem;
    }

    #box { 
        margin: 5px;
        border-radius: 8px;
        background-color: #9e2a2b;
        border: 1px solid #540b0e;
        height: 60px;
        width: 60px;
        top: 0px;
        /* bottom: 0px; */
        /* right: 0px; */
        left: 0px;
        position: absolute;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/04ee9f79db.js" crossorigin="anonymous"></script>
    <title>Tarea Lab. Leng. Programacion</title>
</head>
<body>

    <div class="body">
        <h4 class="text-center text-h4">Mover caja desde el teclado</h4>

        <p class="text-center mt-3">Para mover la caja utilice las flechas direccionales del teclado <i class="fa-regular fa-keyboard"></i>: 
            <div class="text-center" style="margin: 0 auto;">
                <span style="position: relative; height: 40px; width: 40px">
                    <i class="fa-solid fa-up-long " ></i>
                </span>

                <span style="position: absolute; bottom: 0; top: 11rem; left: 0; right: 0;">    
                    <i class="fa-solid fa-left-long"></i>
                    <i class="fa-solid fa-down-long" style="margin-top: 1rem!important;"></i>
                    <i class="fa-solid fa-right-long"></i>
                </span>
            </div>

        </p>

        <div class="box_container">
           <div id="box" class="div" ></div>
        </div>

    </div>



    <script>
        // Objeto "game" usado para poder setear la posicion del elemento, y tambien para tener referencia del mismo elemento
        const game = { 
            x: 0,
            y: 0,
            vel: 10,
            elem: document.getElementById("box")
        };

        console.log(document.getElementById("box"))
        
        
        // Listener del evento keydown para saber si se han usado las flechas y asi actualizar el objeto "game"
        document.addEventListener('keydown', (e) => {

            if( e.key == 'ArrowRight' || e.key == 'ArrowLeft' || e.key == 'ArrowDown' || e.key == 'ArrowUp') {
                if(e.key == 'ArrowRight') {
                    game.x += game.vel; // Aumenta la posicion en X(va hacia la derecha) aumenta en game.vel + game.x(posicion X de la caja)
                } 
                if (e.key == 'ArrowLeft') {
                    game.x -= game.vel;
                } 
                if (e.key == 'ArrowDown') {
                    game.y -= game.vel;
                } 
                if(e.key == 'ArrowUp') {
                    game.y += game.vel;
                }
                //  else {
                //     console.log("Tecla incorrecta");
                // }
                moveSquare();
            
                // document.addEventListener('keyup', ( e ) => {
                //     console.log("Tecla tocada: ", e.key)
                // });
            }
        });


        // Funcion para mover el cuadrado
        function moveSquare() {
            console.log("GAME X: ", game.x, " GAME Y: ", game.y);
            console.log("GAME STYLE: ", game.elem.style.right);

            game.elem.style.left = game.x + "px";
            game.elem.style.top = -game.y + "px";
        }

    </script>    
</body>
</html>
