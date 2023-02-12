
from flask import Flask, request
import json
import numpy as np
import nltk
from nltk.stem import WordNetLemmatizer
from tensorflow.keras.models import load_model
import pickle
import random
from flask_cors import CORS

app = Flask(__name__)
#CORS(app)
CORS(app, resources={r"/predict": {"origins": "*"}})

# Load the intents, words, classes and model
intents = json.loads(open('intents.json').read())
words = pickle.load(open('words.pkl','rb'))
classes = pickle.load(open('labels.pkl','rb'))
# model = load_model("aichatmodel.h5")
model = load_model("chatbot_model.h5")

# Initialize the lemmatizer
lemmatizer = WordNetLemmatizer()

def clean_up_sentence(sentence):
    # Cleaning up the sentences
    sentence_words = nltk.word_tokenize(sentence)
    sentence_words = [lemmatizer.lemmatize(word) for word in sentence_words]
    return sentence_words

def bag_of_words(sentence):
    # Convert sentences into a bag of words (in a list of 0 and 1) that indicate if word exist or not
    sentence_words = clean_up_sentence(sentence)
    bag = [0] * len(words)
    for w in sentence_words:
        for i, word in enumerate(words):
            if word == w:
                bag[i] = 1
    return np.array(bag)

def predict_class(sentence):
    # Predicting class base on the sentences
    bow = bag_of_words(sentence)
    res = model.predict(np.array([bow]))[0]
    ERROR_THRESHOLD = 0.25
    results = [[i, r] for i, r in enumerate(res) if r > ERROR_THRESHOLD]
    results.sort(key=lambda x: x[1], reverse=True)
    return_list = []
    for r in results:
        return_list.append({'intent': classes[r[0]], 'probability': str(r[1])})
    return return_list

def get_response(intents_list, intents_json):
    if len(intents_list)==0:
        print('Sorry, I am unable to understand your input.') 
    else:
        try:
            tag = intents_list[0]["intent"]
            if tag not in classes:
                print("Error: User input is out of range.") 
            list_of_intents = intents_json["intents"]
            for i in list_of_intents:
                if i["tag"] == tag:
                    result = random.choice(i["responses"])
                    return result
        except IndexError:
            print("I'm sorry, I'm not sure what you mean.") 


@app.route('/predict', methods=['POST'])

def chatbot():
    try:
        user_input = request.form['user_input']
        ints = predict_class(user_input)
        response = get_response(ints, intents)
        return response
    except TypeError as e:
        print(e)
        return "Sorry, I am unable to understand your input."

# def chatbot():
#     user_input = request.form['user_input']
#     ints = predict_class(user_input)
#     response = get_response(ints, intents)
#     return response

if __name__ == '__main__':
    app.run(debug=True)
