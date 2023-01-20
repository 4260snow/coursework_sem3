from aiogram import Bot, types
from aiogram.dispatcher import Dispatcher
from aiogram.utils import executor
import requests

from config import TOKEN
import keyboard as kb


bot = Bot(token=TOKEN)
dp = Dispatcher(bot)


def get_recipes(name=None):
    params = {"name": name}
    res = requests.get('http://f0767737.xsph.ru/bot/get_data.php', params)
    return res.json()


@dp.message_handler(commands=['start'])
async def start_command(msg: types.Message):
    await msg.reply("Приветствую!\n"
                    "Вы можете выполнить поиск рецепта по названию используя команду /name "
                    "\"название рецепта\"\n"
                    "Или получить что-то неожиданное используя команду /rand_food\n"
                    "Список команд /help", reply_markup=kb.markup_menu)


@dp.message_handler(commands=['help'])
async def help_command(msg: types.Message):
    await msg.reply("Список команд:\n"
                    "Запуск бота/приветственное сообщение /start"
                    "Поиск по названию /name \'название рецепта\'\n"
                    "Случайный рецепт /rand_food \n"
                    "Список команд /help")

@dp.message_handler(commands=['name'])
async def name_search(msg: types.Message):
    if msg.get_args():
        answer = get_recipes(msg.get_args().strip().lower().capitalize())
        if answer['name']:
            await msg.reply(f"*{answer['name']}*\n\n"
                            f"_{answer['description']}_\n\n"
                            f"{answer['recipe']}", parse_mode="Markdown")
        else:
            await msg.reply("На данный момент у нас нет такого рецепта")
    else:
        await msg.reply(f"Пожалуйста, добавьте название\n"
                        f"Или попробуйте случайный рецепт /rand_food")


@dp.message_handler(commands=['rand_food'])
async def rand_food_search(msg: types.Message):
    answer = get_recipes()
    await msg.reply(f"*{answer['name']}*\n\n"
                    f"_{answer['description']}_\n\n"
                    f"{answer['recipe']}", parse_mode="Markdown")


@dp.message_handler()
async def text_command(msg: types.Message):
    if msg.text.strip() == "Поиск":
        await msg.reply("Напишите /name \"название\"")
    elif msg.text.strip() == "Случайный":
        # await msg.reply("Напишите /rand_food, чтобы получить случайный рецепт\n")
        answer = get_recipes()
        await msg.reply(f"*{answer['name']}*\n\n"
                        f"_{answer['description']}_\n\n"
                        f"{answer['recipe']}", parse_mode="Markdown")
    else:
        await msg.reply("Я Вас не понимаю")


if __name__ == '__main__':
    executor.start_polling(dp)
