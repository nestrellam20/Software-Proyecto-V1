from flask import Blueprint, request, jsonify, current_app
from flask_pymongo import PyMongo
from bson.objectid import ObjectId

api_bp = Blueprint('api', __name__)
mongo = PyMongo()

@api_bp.before_app_request
def init_db():
    mongo.init_app(current_app)

@api_bp.route('/users', methods=['POST'])
def create_user():
    data = request.json
    if not data or not 'name' in data or not 'email' in data:
        return jsonify({'error': 'Bad request'}), 400

    user_id = mongo.db.users.insert_one(data).inserted_id
    new_user = mongo.db.users.find_one({'_id': user_id})
    new_user['_id'] = str(new_user['_id'])
    
    return jsonify(new_user), 201

@api_bp.route('/appointments', methods=['POST'])
def create_appointment():
    data = request.json
    if not data or not 'user_id' in data or not 'date_time' in data or not 'description' in data:
        return jsonify({'error': 'Bad request'}), 400

    appointment_id = mongo.db.appointments.insert_one(data).inserted_id
    new_appointment = mongo.db.appointments.find_one({'_id': appointment_id})
    new_appointment['_id'] = str(new_appointment['_id'])
    
    return jsonify(new_appointment), 201

@api_bp.route('/appointments', methods=['GET'])
def get_appointments():
    appointments = mongo.db.appointments.find()
    result = []
    for appointment in appointments:
        appointment['_id'] = str(appointment['_id'])
        result.append(appointment)
    
    return jsonify(result), 200
