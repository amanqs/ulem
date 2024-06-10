from flask import Flask, request
import requests

app = Flask(__name__)

# Ganti dengan token bot Telegram Anda
TELEGRAM_BOT_TOKEN = '6125694353:AAExCaUI1xy0-_rX2Qbo5MGWM5hJp3u9M2M'

# Ganti dengan ID chat Anda
YOUR_TELEGRAM_CHAT_ID = '5587950881'


def send_telegram_message(message):
    url = f'https://api.telegram.org/bot{TELEGRAM_BOT_TOKEN}/sendMessage'
    data = {'chat_id': YOUR_TELEGRAM_CHAT_ID, 'text': message}
    response = requests.post(url, json=data)
    return response.json()


@app.route('/submit', methods=['POST'])
def submit_form():
    nama = request.form['nama']
    ucapan = request.form['ucapan']
    konfirmasi = request.form['konfirmasi']
    message = f'Nama: {nama}\nUcapan: {ucapan}\nKonfirmasi Kehadiran: {konfirmasi}'
    send_telegram_message(message)
    return 'Pesan terkirim ke bot Telegram dan diteruskan ke akun Anda!'


if __name__ == '__main__':
    app.run(debug=True)
