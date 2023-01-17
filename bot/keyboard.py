from aiogram.types import ReplyKeyboardRemove, ReplyKeyboardMarkup, KeyboardButton, \
    InlineKeyboardMarkup, InlineKeyboardButton
from aiogram.utils.helper import Helper, HelperMode, ListItem

btn_search = KeyboardButton('Поиск')
btn_rand_recepie = KeyboardButton('Случайный')
markup_menu = ReplyKeyboardMarkup(resize_keyboard=True).row(btn_search, btn_rand_recepie)

"""
btn_ingredient = KeyboardButton('По ингирдиенту')
btn_name = KeyboardButton('По названию')
btn_menu = KeyboardButton('Назад')
markup_search = ReplyKeyboardMarkup(resize_keyboard=True).row(btn_ingredient, btn_name)
markup_search.add(btn_menu)


btn_food = KeyboardButton('Еда')
# btn_drink = KeyboardButton('Напиток')
btn_menu = KeyboardButton('Назад')
markup_rand = ReplyKeyboardMarkup(resize_keyboard=True).row(btn_food)  # , btn_drink)
markup_rand.add(btn_menu)

#в функцию text_command в файле main.py
if msg.text == "Назад":
    await msg.reply(["Поищем что-нибудь вкусное?", "Может быть случайный рецепт?"][randint(0, 1)],\
                    reply_markup=kb.markup_menu)
"""