
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
    button {        
        font-family:Arial, Helvetica, sans-serif;
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
        background-image: linear-gradient(to left, #f83600 0%, #f9d423 100%);
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
        margin: 2rem  auto;
        width: 400px;
        height: 400px;
        border: 1px solid black;
        position: relative;
    }

    .snake {
        width: 10px;
        height: 10px;
        background-color: green;
        position: absolute;
    }

    .food {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: red;
        position: absolute;
    }
    .food::after {
        position: absolute;
        content: "";
        top: -3px;
        right: 3px;
        /* left: auto; */
        width: 3px;
        height: 5px;
        border-radius: 30%;
        background-color: green;
    }
</style>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Snake Game</title>
    <script src="https://kit.fontawesome.com/04ee9f79db.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="body">
        <h4 class="text-center text-h4">Mover "caja" desde el teclado</h4>

        <p class="text-center mt-2">
            <button onclick="startGame()" class="button_accept mr-3">Comenzar</button>
            <button onclick="resetGame()" class="button_decline">Reiniciar</button>
        </p>
        <p class="text-center mt-2"></p>
        <p class="text-center mt-3">Para mover la "caja" utilice las flechas direccionales del teclado <i class="fa-regular fa-keyboard"></i>: 
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
        <div class="text-center mt-3"> <span class="">Puntuacion: <span id="puntuacion"></span></span></div>
        <div> <span class="marcador"></span></div>
        <div id="gameBoard"> </div>
        <!-- <div class="gameBoard"> -->
            <!-- <div id="box" class="div" >
                
            </div> -->
        <!-- </div> -->

    </div>

    <script>
        const gameBoard = document.getElementById("gameBoard");
        const puntuacion = document.getElementById("puntuacion");
        const boardSize = 40;
        var snakeSpeed = 100;

        let snake = [{ x: 10, y: 10 }];
        let direction = { x: 1, y: 0 };
        let food = { x: 20, y: 20 };

        function updateSnake() {
            const head = { x: snake[0].x + direction.x, y: snake[0].y + direction.y };
            snake.unshift(head);

            if (head.x === food.x && head.y === food.y) {
                createFood();
            } else {
                snake.pop();
            }

            if (head.x < 0 || head.x >= boardSize || head.y < 0 || head.y >= boardSize || isSnakeCollided()) {
                clearInterval(gameLoop);
                
                gameBoard.appendChild(snakeElement);
                alert("Game Over!");
            }

            renderSnake();
        }

        function renderSnake() {
            gameBoard.innerHTML = "";
            
            snake.forEach(segment => {
                const snakeElement = document.createElement("div");
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

        // document.addEventListener("keyup", event => {
        //     snakeSpeed = 1000;
        //     setInterval(updateSnake, snakeSpeed);
        // });

        createFood();
        renderSnake();
        var gameLoop = setInterval(updateSnake, snakeSpeed);
    </script>
</body>
</html>