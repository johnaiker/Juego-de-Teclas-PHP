
<style>
    body {
        background-color: #f1f1f1;
        font-family:Arial, Helvetica, sans-serif;
        margin: 0 3rem;
        color: #007f5f;
        /* background-color: #e5e5f7; */
    }
    /* main::after {
        height: 100%;
        top: 0;
        content: "";
        bottom: 0;
        width: 100%;
        position: absolute;
        opacity: 0.8;
        background: linear-gradient(135deg, #444cf755 25%, transparent 25%) -10px 0/ 40px 40px, linear-gradient(225deg, #444cf7 25%, transparent 25%) -10px 0/ 40px 40px, linear-gradient(315deg, #444cf755 25%, transparent 25%) 0px 0/ 40px 40px, linear-gradient(45deg, #444cf7 25%, #e5e5f7 25%) 0px 0/ 40px 40px;
    } */
    
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
    button {        
        font-family:Arial, Helvetica, sans-serif;
        border: none;
        box-shadow: 1px 2px 10px 0.02px rgba(0,0,0,0.75);

    }
    .button_accept {
        background-image: linear-gradient(to top, #09203f 0%, #537895 100%);
        color: white;
        text-align: center;
        margin: 0 auto;
        border-radius: 20px;
        padding: 10px;
        /* background-color: ; */
    }
    .button_decline {
        background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
        font-weight: bold;
        color: black;
        text-align: center;
        margin: 0 auto;
        border-radius: 20px;
        padding: 10px;
        /* background-color: ; */
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
    
    .mr-3 {
        margin-right: 2rem;
    }

    #box { 
        display: none;
        margin: 5px;
        border-radius: 8px;
        /* background-color: #9e2a2b; */
        border: 1px solid #540b0e;
        height: 20px;
        width: 60px;
        top: 0px;
        bottom: 0px;
        right: 0px;
        left: 0px;
        position: absolute;
        /* background-image: linear-gradient(to left, #f83600 0%, #f9d423 100%); */
        /* background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%); */
    }
    /* #box::after {
    transform: rotate(180deg);
    position: absolute;
    padding-left: .3rem;
    font-weight: bold;
    color: black;
    content: '.';
    width: 10px;
    height: 23px;
    border: 0 1px 1px 1px solid black;
    border-radius: 12px 0  0 12px;
    background-image: linear-gradient(to left, #f83600 0%, #f9d423 100%);
    right: -.3rem;
    top: -1;
    bottom: 0;
    } */
    #box::before {
        border: 1px solid black;
        transform: rotate(180deg);
        position: absolute;
        padding-left: .3rem;
        font-weight: bold;
        color: black;
        content: '';
        width: 2px;
        height: 4px;
        /* border: 1px solid black; */
        border-radius: 12px 0  0 12px;
        background-color: red;
        right: -.57rem;
        top: 7px;
    }

    #gameBoard {

        /* background-image: url("image.png"); */
        margin: 0 auto;
        width: 400px;
        height: 400px;
        /* border: 1px solid black; */
        position: relative;
        background-color: #a0d396;
        /* background-image: linear-gradient(to top, #96fbc4 0%, #f9f586 100%); */
    }

    .snake {
        width: 10px;
        height: 10px;
        background-color: #ffff3f;
        position: absolute;
    }
    .snake:first-child {
        border-radius: 3px;
        background-image: linear-gradient(to top, #ffff3f 0%, #25751d 100%);
    }

    .food {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        /* background-color: red; */
        background-image: linear-gradient(-20deg, red 0%, #ff9a44 100%);
        position: absolute;
        box-shadow: 1px 2px 1px 0px rgba(0,0,0,0.75);

    }
    .food::after {
        position: absolute;
        content: "";
        top: -3px;
        right: 3px;
        /* left: auto; */
        width: 3px;
        height: 5px;
        /* box-shadow: -.4px -1px 0px 1px rgba(0,0,0,0.75); */
        border-radius: 30%;
        background-color: green;
    }
    #finished {
        font-size: 2rem;
        color: red;
        font-weight: bold;
    }
    .box_container {
        margin: 1rem auto;
        width: 400px;
        height: 400px;
        border: 8px solid #55a630;
        background-color: #bfd200;
        padding: 3px;
    }
</style>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Snake Game</title>
    <script src="https://kit.fontawesome.com/04ee9f79db.js" crossorigin="anonymous"></script>
</head>
<body>
<main>
    <div class="body">
        <h4 class="text-center text-h4">Mover "serpiente" desde el teclado</h4>

        <p class="text-center mt-2">
            <button onclick="startGame()" class="button_accept mr-3">Comenzar</button>
            <button onclick="resetGame()" class="button_decline">Reiniciar</button>
        </p>
        <p class="text-center mt-2"></p>
        <p class="text-center mt-3">Para mover la "serpiente" utilice las flechas direccionales del teclado <i class="fa-regular fa-keyboard"></i>: 
            <div class="text-center" style="margin: 0 auto;">
                <span style="position: relative; height: 40px; width: 40px">
                    <i class="fa-solid fa-up-long " ></i>
                </span>

                <span style="position: absolute; bottom: 0; top: 14.3rem; left: 0; right: 0;">    
                    <i class="fa-solid fa-left-long"></i>
                    <i class="fa-solid fa-down-long" style="margin-top: 1rem!important;"></i>
                    <i class="fa-solid fa-right-long"></i>
                </span>
            </div>

        </p>
        <div class="text-center mt-3"> <span class="">Puntuacion: <span id="puntuacion">0</span></span></div>
        <div class="text-center" > <span id="finished"></span></div>
        <div class="box_container">
            <div id="gameBoard"> </div>
        </div>

        <!-- <div class="gameBoard"> -->
            <!-- <div id="box" class="div" >
                
            </div> -->
        <!-- </div> -->

    </div>
</main>


    <script>
        var gameLoop;

        // HTML 
        const gameBoard = document.getElementById("gameBoard");
        const puntuacion = document.getElementById("puntuacion");
        const finished = document.getElementById("finished");

        var puntaje = 0; // Puntaje
        const boardSize = 40; //Tamano del Tablero
        var snakeSpeed = 100; //Velocidad de la serpiente, (es el intervalo de tiempo con el que se actualiza, menor intervalo mas Velocidad)

        let snake = [{ x: 10, y: 10 }];
        let direction = { x: 1, y: 0 };
        let food = { x: 20, y: 20 };

        // Actualiza el estado y posicion de la serpiente, tambien activa la funcion para crear comida y verifica que el juego aun no termina (Esta funcion se ejecuta en un intervalo de tiempo de 100ms, siendo una velocidad de 10px por cada 100ms )
        function updateSnake() {
            const head = { x: snake[0].x + direction.x, y: snake[0].y + direction.y };
            snake.unshift(head);

            if (head.x === food.x && head.y === food.y) {
                puntaje += 10;
                puntuacion.textContent = puntaje;
                createFood();
            } else {
                snake.pop();
            }

            if (head.x < 0 || head.x >= boardSize || head.y < 0 || head.y >= boardSize || isSnakeCollided()) {
                clearInterval(gameLoop);// Acaba el juego eliminando el intervalo de movimiento de la serpiente
                finished.textContent = "Juego terminado";
                
                gameBoard.appendChild(snakeElement);
                // alert("Game Over!");
            }

            renderSnake();
        }

        function startGame()  {
            gameLoop = setInterval(updateSnake, 100);
        }
        function resetGame() {
            snake = [{ x: 10, y: 10 }];
            direction = { x: 1, y: 0 };
            food = { x: 20, y: 20 };
            
            puntaje = 0;
            puntuacion.textContent = "0";
            finished.textContent = "";
            clearInterval(gameLoop);
            gameLoop = setInterval(updateSnake, 100);
        }

        function renderSnake() {
            gameBoard.innerHTML = "";
            
            snake.forEach(segment => {
                let snakeElement = document.createElement("div");
                snakeElement.classList.add("snake");
                snakeElement.style.left = segment.x * 10 + "px";
                snakeElement.style.top = segment.y * 10 + "px";
                gameBoard.appendChild(snakeElement);
            });

            const foodElement = document.createElement("div");
            foodElement.classList.add("food");
            foodElement.style.left = food.x * 10 + "px";
            foodElement.style.top = food.y * 10 + "px";
            gameBoard.appendChild(foodElement);
        }

        function createFood() {
            food.x = Math.floor(Math.random() * boardSize);
            food.y = Math.floor(Math.random() * boardSize);
        }

        function isSnakeCollided() {
            return snake.slice(1).some(segment => segment.x === snake[0].x && segment.y === snake[0].y);
        }

        document.addEventListener("keydown", event => {
            if(event.key == "Enter") {
                
                clearInterval(gameLoop);
                startGame();
            }
            // snakeSpeed = 70;
            // setInterval(updateSnake, snakeSpeed);
            if (event.key === "ArrowUp" && direction.y !== 1) {
                direction = { x: 0, y: -1 };
            } else if (event.key === "ArrowDown" && direction.y !== -1) {
                direction = { x: 0, y: 1 };
            } else if (event.key === "ArrowLeft" && direction.x !== 1) {
                direction = { x: -1, y: 0 };
            } else if (event.key === "ArrowRight" && direction.x !== -1) {
                direction = { x: 1, y: 0 };
            }
        });

        
        createFood();
        renderSnake();
        // document.addEventListener("keyup", event => {
        //     snakeSpeed = 1000;
        //     setInterval(updateSnake, snakeSpeed);
        // });

    </script>
</body>
</html>