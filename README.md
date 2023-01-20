# Курсовая работа

## Задание
Разработать и реализовать систему для поиска рецептов. Система состоит из 2-ух частей: Интерфейс администрара и телеграм-бот для пользователей. Система хранит на сервере базу данных, только админимстратор может создавть и удалять записи

### Возможности пользователей:
* Создание и удаление записей
### Возможности пользователей:
* поиск рецептов по названию
* получение случайного рецепта

### Ссылки на курсовую работу
* http://f0767737.xsph.ru - интерфейc администратора
* https://t.me/recipes42_bot - телеграм-бот

## Используемые технологии
### Языки
Панель администратора и связь телеграм бота с базой данных - PHP, html+css, sql. Для бота используется Python

### Фреймворк
Для дизайна панели администратора - bootstrap

### Библиотеки
Для создания телеграм бота - aiogram, request

## Ход работы
### Интерфейса администратора
* Страница авторизации
 
  ![Рис. 1 - Авторизация](https://github.com/4260snow/coursework_sem3/blob/main/images/login.png)

* Панель администратора

  ![Рис. 2 - Панель адм.](https://github.com/4260snow/coursework_sem3/blob/main/images/ai.png)
  
* Запись рецепта в бд

  ![Рис. 3 - Запись](https://github.com/4260snow/coursework_sem3/blob/main/images/create.png)
  
### Пользовательских интерфейс
  чат в telegram
  
  ![Рис. 4 - UI](https://github.com/4260snow/coursework_sem3/blob/main/images/bot.png)
  
### Сценарии работы администратора
* Авторизация. При входе администратор вводит логин и пароль, если логин неверный, то появляетяся сообщение об этом над полем ввода логина. Аналогично с паролем, в случае ввода неверного пароля появляетяся сообщение об этом над полем ввода пароля

* Сценарий добавления нового рецепта. Поля названия и самого рецепта являются обязательными, пока они не будут заполены невозможно отправить запись в базу данных (название ограничено 250, а текст рецепта 2400 символами). Если администратор нажмёт на кнопку "записать" над незаполнеными полями "всплывает" надпись напоминающая об обязательном заполнении. Также есть поле краткого описания (ограниченно 250 симв).

### Сценарии пользователей
* После запуска бота (команда /start) пользователь получает сообщение с приветствием и возможностями бота (доступными командами/функциями): Поиск рецепта по названию (команда /name 'название') и запросо случайного рецепта (команда /rand_food или слово "случайный")

* Если пользователь пишет неизвестную для бота команду или текст, то бот отправляет сообщение "Я Вас не понимаю"

* Когда пользователь отправляет команду /help, бот пишет список доступных команд

* Пользователь пишет: "/name Пангалактический грызлодёр" (символы в названии могут быть в любом регистре). В этом случае бот отправляет запрос к базе данных. Пусть такой рецепт существует в базе, тогда сервер формирует json, который затем отправляет боту, а бот в свою очередь преобразует json в текст (название выделяется полужирным шрифтом, краткое описание выделяется курсивом) и отправляет пользователю

* Неудачный для пользователя сценарий, если он отправил команду /name с названием которого нет в базе, тогда бот, получив от сервера json без рецепта, пишет пользователю: "На данный момент у нас нет такого рецепта"

* Если пользователь отправил команду /name без параметров, то бот предложит ввести команду ещё раз и добавить желаемое название, также предложит попробовать команду /rand_food


## Описание client-server и хореографии
* Создание новой записи
![Рис. 5 - Adm-serv](https://github.com/4260snow/coursework_sem3/blob/main/images/admserv.svg)

* Запрос существующего рецепта по названию (/name arg)
![Рис. 6 - get1](https://github.com/4260snow/coursework_sem3/blob/main/images/get1.svg)

* Запрос случайного рецепта (/rand_food)
![Рис. 6 - get2](https://github.com/4260snow/coursework_sem3/blob/main/images/get2.svg)

### Структура базы данных MySQL
```sh
{
    "id": 3,
    "name": "Пангалактический грызлодёр",
    "description": "Фантастический коктейль ...",
    "recipe": "«Путеводитель для путешествующих автостопом по Галактике» даёт следующий рецепт ...",
}
```

## Значимые фрагменты кода
* Часть вывода списка рецептов в панели администратора

```sh
<div class="album py-5 bg-light">
	<div class="container">
		<div class="row row-cols-1 g-3">
		<?php
			$con = mysqli_connect(*,*,*,*); # hostname, username, password, table_name
			$sql = "SELECT * FROM list_of_recipes ORDER BY id DESC";
			$notes = mysqli_query($con, $sql);
			$notes_amnt = mysqli_num_rows($notes);
			$note_list = mysqli_fetch_all($notes, MYSQLI_ASSOC); // Список рецептов
			mysqli_close($con);
			for ($i = 0; $i < $notes_amnt; $i++){
				include "note.php";
			}
		?>		
		</div>
	</div>
</div>
```

* 'note.php'

```sh
<div class="col" id=<?php echo $note_list[$i]["id"] ?>>
	<div class="card">
		<svg class="bd-placeholder-img card-img-top" width="100%" height="125"><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $note_list[$i]["name"] ?></text></svg>
		<div class="card-body">
			<p class="card-text"><?php echo $note_list[$i]["description"] ?></p>
			<p class="card-text">
				<?php
					$new_rec = str_replace("\n", "<br>", $note_list[$i]["recipe"]);
					echo $new_rec;
				?>
			</p>
			<div class="d-flex justify-content-between align-items-center">
				<div class="btn-group">
					<button type="button" class="btn btn-sm btn-outline-secondary">Удалить</button>
				</div>
			</div>
		</div>
	</div>
</div>	
```


* Запись в бд

```sh
	$table = "list_of_recipes";
	$name = $_POST["name"];
	$desc = $_POST["description"];
	$rec = $_POST["recipe"];

	$con = mysqli_connect("localhost", "f0767737_recipes", "12345678", "f0767737_recipes");
	$sql = "INSERT INTO `$table` (`name`, `description`, `recipe`) VALUES ('$name', '$desc', '$rec')";
	print_r($sql);
	
	mysqli_query($con, $sql);
```

* Запрос данных из БД для телеграм-бота
```sh
<?php
    header('Content-Type: application/json; charset=utf-8');
    
    $con = mysqli_connect("localhost", "f0767737_recipes", "12345678", "f0767737_recipes");
    $name = $_GET['name'];
    
    if ($name != NULL) {
        $sql = "SELECT * FROM `list_of_recipes` WHERE `name`=\"$name\"";
        $res = mysqli_query($con, $sql);
        $res = mysqli_fetch_assoc($res);
        
        if (gettype($res["num_rows"])){
            $data = ['name' => $res["name"], 'description' => $res["description"], 'recipe' => $res["recipe"]];
        } else {
            $data = ['name' => 0];
        }
        print_r(json_encode($data));
    }else{
        $sql = "SELECT * FROM `list_of_recipes` ORDER BY RAND() LIMIT 1";
        $res = mysqli_query($con, $sql);
        $res = mysqli_fetch_assoc($res);
        $data = ['name' => $res["name"], 'description' => $res["description"], 'recipe' => $res["recipe"]];
        print_r(json_encode($data));
    }
    mysqli_close($con);
?>
```

* Запрос бота
```python
def get_recipes(name=None):
    params = {"name": name}
    res = requests.get('http://f0767737.xsph.ru/bot/get_data.php', params)
    return res.json()
```

* Дополнительная клавиатура
```python
from aiogram.types import ReplyKeyboardMarkup, KeyboardButton

btn_search = KeyboardButton('Поиск')
btn_rand_recepie = KeyboardButton('Случайный')
markup_menu = ReplyKeyboardMarkup(resize_keyboard=True).row(btn_search, btn_rand_recepie)
```
