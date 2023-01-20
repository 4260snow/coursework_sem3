from aiogram.types import ReplyKeyboardMarkup, KeyboardButton

btn_search = KeyboardButton('Поиск')
btn_rand_recepie = KeyboardButton('Случайный')
markup_menu = ReplyKeyboardMarkup(resize_keyboard=True).row(btn_search, btn_rand_recepie)





