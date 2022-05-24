function play_game()
{
    var level = 160; // Уровень игры, при уменьшении ускорится
    var rect_w = 45; // Ширина
    var rect_h = 30; // Высота
    var inc_score = 50; // Счет
    var snake_color = "#0520A5"; // Цвет змейки
    var ctx; // Атрибуты холста
    var tn = []; // хранение временных маршрутов
    var x_dir = [-1, 0, 1, 0]; // корректировка положения
    var y_dir = [0, -1, 0, 1];
    var queue = [];
    var frog = 1; // еда
    var map = [];
    var MR = Math.random;
    var X = 5 + (MR() * (rect_w - 10))|0; // Рассчет позиции
    var Y = 5 + (MR() * (rect_h - 10))|0;
    var direction = MR() * 3 | 0;
    var interval = 0;
    var score = 0;
    var sum = 0, easy = 0;
    var i, dir;
    var my_score = 0;
// Игровое поле
    var c = document.getElementById('playArea');
    ctx = c.getContext('2d');
// Позиция на поле
    for (i = 0; i < rect_w; i++)
    {
        map[i] = [];
    }
// Случайное размещение еды
    function random_snake()
    {
        var x, y;
        do
        {
            x = MR() * rect_w|0;
            y = MR() * rect_h|0;
        }
        while (map[x][y]);
        map[x][y] = 1;
        ctx.fillStyle = snake_color;
        ctx.strokeRect(x * 10+1, y * 10+1, 8, 8);
    }

    random_snake();
    function set_game_speed()
    {
        if (easy)
        {
            X = (X+rect_w)%rect_w;
            Y = (Y+rect_h)%rect_h;
        }
        --inc_score;
        if (tn.length)
        {
            dir = tn.pop();
            if ((dir % 2) !== (direction % 2))
            {
                direction = dir;
            }
        }
        if ((easy || (0 <= X && 0 <= Y && X < rect_w && Y < rect_h)) && 2 !== map[X][Y])
        {
            if (1 === map[X][Y])
            {
              //  score+= Math.max(5, inc_score);
                score++;
                inc_score = 50;
                random_snake();
                frog++;
            }

            ctx.fillRect(X * 10, Y * 10, 9, 9);
            map[X][Y] = 2;
            queue.unshift([X, Y]);
            X+= x_dir[direction];
            Y+= y_dir[direction];
            if (frog < queue.length)
            {
                dir = queue.pop()
                map[dir[0]][dir[1]] = 0;
                ctx.clearRect(dir[0] * 10, dir[1] * 10, 10, 10);
            }
        }
        else if (!tn.length)
        {
            var show_score = document.getElementById("show");
            alert(" Вы проиграли! Ваш счет: "+score+" Не сдавайся, попробуйту еще раз!" );
            window.clearInterval(interval);


           document.location.href = "../core/score.php?score=" + score;
           score = 0;
        }
    }
    interval = window.setInterval(set_game_speed, level);
    document.onkeydown = function(e) {
        var code = e.keyCode - 37;
        if (0 <= code && code < 4 && code !== tn[0])
        {
            tn.unshift(code);
        }
        else if (-5 == code)
        {
            if (interval)
            {
                window.clearInterval(interval);
                interval = 0;
            }
            else
            {
                interval = window.setInterval(set_game_speed, 60);
            }
        }
        else
        {
            dir = sum + code;
            if (dir == 44||dir==94||dir==126||dir==171) {
                sum+= code
            } else if (dir === 218) easy = 1;
        }
    }
}