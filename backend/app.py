from flask import Flask, jsonify
from app.config import Config
from app.routes import api_bp

def create_app():
    app = Flask(__name__)
    app.config.from_object(Config)
    
    @app.route('/')
    def index():
        return jsonify({"message": "Welcome to the API!"})
    
    app.register_blueprint(api_bp, url_prefix='/api')
    
    return app

if __name__ == '__main__':
    app = create_app()
    app.run(debug=True)
