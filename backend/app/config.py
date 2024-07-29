import secrets

class Config:
    SECRET_KEY = secrets.token_hex(16)  # Generates a random 16-byte hex string
    MONGO_URI = 'mongodb+srv://msaenzy9:msaenzy9@cluster0.lahyenk.mongodb.net/myFirstDatabase?retryWrites=true&w=majority'
