<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Моя тестовая страница</title>
</head>
<body>
    <div class="wrapper">
        <div class="tabl">
            <table>
                <tr class="top">
                    <td>N</td>
                    <td>
                        <p class = "double">Опросы</p>
                        <input type="search" class = "double" placeholder="Поиск....""></input>
                    </td>
                    <td class="scales">
                        <p class = "double">Статус</p>
                        <select class="doubleS">
                            <option value="1">Все</option>
                            <option value=”2”>Опубликован</option>
                            <option value=”3”>Завершился</option>
                            <option value=”3”>Не опубликован</option>
                        </select>
                    </td>
                    <td class="scales">
                        <p class = "double">Создатель</p>
                        <select class="doubleS">
                            <option value="1">Все</option>
                            <option value=”2”>Вася</option>
                            <option value=”3”>Петя</option>
                        </select>
                    </td>
                    <td class="scales">
                        <p class = "double">Кол-во завершенных</p>
                        <select class="doubleS">
                            <option value="1">Все</option>
                            <option value=”2”>500+</option>
                            <option value=”3”>1000+</option>
                            <option value=”3”>5000+</option>
                        </select>
                    </td>
                    <td class="scales">
                        <p class = "double">Срд. оценка</p>
                        <select class="doubleS">
                            <option value="1">Все</option>
                            <option value=”2”>1+</option>
                            <option value=”3”>2+</option>
                            <option value=”3”>3+</option>
                            <option value=”3”>4+</option>
                            <option value=”3”>5</option>
                        </select>
                    </td>
                    <td class="scales">
                        <p>Действие</p>
                    </td>
                </tr>
                <tr>
                    <td><b>1</b></td><td><a class="linkSurvey" href="#">Качество обслуживания</a></td><td class="scales"><span class="statusG">Опубликован</span></td><td class="scales">Ваня</td><td class="scales"><span class="marksNum">9177</span></td><td class="scales">4.2</td><td class="scales"><input type="checkbox" name="scales"/></td>
                </tr>
                <tr>
                    <td><b>2</b></td><td><a class="linkSurvey" href="#">Качество питания</a></td><td class="scales"><span class="statusR">Завершился</span></td><td class="scales">Ира</td><td class="scales"><span class="marksNum">3064</span></td><td class="scales">2.7</td><td class="scales"><input type="checkbox" name="scales"/></td>
                </tr>
                <tr>
                    <td><b>3</b></td><td><a class="linkSurvey" href="#">Рабочие условия</a></td><td class="scales"><span class="statusR">Завершился</span></td><td class="scales">Коля</td><td class="scales"><span class="marksNum">9195</span></td><td class="scales">5</td><td class="scales"><input type="checkbox" name="scales"/></td>
                </tr>
                <tr>
                    <td><b>4</b></td><td><a class="linkSurvey" href="#">Руководство</a></td><td class="scales"><span class="statusR">Завершился</span></td><td class="scales">Петя</td><td class="scales"><span class="marksNum">3128</span></td><td class="scales">4.6</td><td class="scales"><input type="checkbox" name="scales"/></td>
                </tr>
                <tr>
                    <td><b>5</b></td><td><a class="linkSurvey" href="#">Программа поощрений</a></td><td class="scales"><span class="statusR">Завершился</span></td><td class="scales">Саша</td><td class="scales"><span class="marksNum">9892</span></td><td class="scales">1.2</td><td class="scales"><input type="checkbox" name="scales"/></td>
                </tr>
                <tr>
                    <td><b>6</b></td><td><a class="linkSurvey" href="#">Расположение офиса</a></td><td class="scales"><span class="statusR">Завершился</span></td><td class="scales">Маша</td><td class="scales"><span class="marksNum">9011</span></td><td class="scales">4.9</td><td class="scales"><input type="checkbox" name="scales"/></td>
                </tr>
                <tr>
                    <td><b>7</b></td><td><a class="linkSurvey" href="#">Спорт программа</a></td><td class="scales"><span class="statusB">Не опубликован</span></td><td class="scales">Егор</td><td class="scales"><span class="marksNum">0</span></td><td class="scales">0</td><td class="scales"><input type="checkbox" name="scales"/></td>
                </tr>
            </table>
        </div>
        <div class="action">
            <button id="action" class="statusO">Изменить</button>
            <button id="action" class="statusR">Удалить</button>
            <button id="action" class="statusG">Опубликовать</button>
        </div>
        <div class="botAction">
            <div class="pagination">
                <div class="visualArrow"><a href="#"><</a></div>
                <div class="visualNum"><a style="color: #304FFE" href="#">1</a></div>
                <p style="color: #B0BAC9">/</p>
                <div class="visualNum"><a style="color: #00072B" href="#">16</a></div>
                <div class="visualArrow"><a href="#">></a></div>
            </div>
            <div class="countStr">
                <div class="text"><p>Количество строк:</p></div>
                <select class="selectID">
                    <option value="1">1</option>
                    <option value=”2”>2</option>
                    <option value=”3”>3</option>
                    <option value=”4”>4</option>
                    <option value=”5”>5</option>
                    <option value=”6”>6</option>
                    <option value=”7” selected >7</option>
                    <option value=”8”>8</option>
                    <option value=”9”>9</option>
                    <option value=”10”>10</option>
                </select>
            </div>
            <div id="survey"><button class="survey">Добавить опрос</button></div>
        </div>
    </div>
</body>
</html>