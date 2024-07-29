# Proyecto-Software-V1/backend/app/config.py
import os
from dotenv import load_dotenv

load_dotenv()

class Config:
    MONGO_URI = os.getenv("MONGO_CONNECTION_STRING")
    MONGO_DB_NAME = os.getenv("MONGO_DB_NAME")
