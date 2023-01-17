from aiogram import Bot, types
from aiogram.dispatcher import Dispatcher
from aiogram.utils import executor


from config import TOKEN
import keyboard as kb
import json
import requests

bot = Bot(token=TOKEN)
dp = Dispatcher(bot)


async def get_recipes(ingr=None, name=None):
    return ""


@dp.message_handler(commands=['start'])
async def start_command(msg: types.Message):
    await msg.reply("Приветствие!", reply_markup=kb.markup_menu)


@dp.message_handler(commands=['help'])
async def help_command(msg: types.Message):
    await msg.reply("Список команд /")

@dp.message_handler(commands=['ingridient'])
async def ingridient_search(msg: types.Message):
    if msg.get_args():
        answer = get_recipes()
        await msg.reply(f"{answer}")
    else:
        await msg.reply(f"No args")  # Добавить просьбу добавить аргументы


@dp.message_handler(commands=['name'])
async def name_search(msg: types.Message):
    if msg.get_args():
        answer = get_recipes()
        await msg.reply(f"{answer}")
    else:
        await msg.reply(f"No args")


@dp.message_handler(commands=['rand_food'])
async def rand_food_search(msg: types.Message):
    answer = get_recipes()
    await msg.reply(f"{answer}")


@dp.message_handler(commands=['rand_drink'])
async def rand_drink_search(msg: types.Message):
    answer = get_recipes()
    await msg.reply(f"{answer}")


@dp.message_handler()
async def text_command(msg: types.Message):
    if msg.text.strip() == "Поиск":
        await msg.reply("Напишите /ingridient \"ингридиент\" для поиска по ингридиету\n"
                        "Напишите /name \"название\" для поиска по названию")
    elif msg.text.strip() == "Случайный":
        await msg.reply("Напишите /rand_food или /rand_drink, чтобы получить случайный рецепт\n")


if __name__ == '__main__':
    executor.start_polling(dp)
