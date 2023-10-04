from bardapi import Bard
import os
import streamlit as st 
from streamlit_chat import message



import requests
from bardapi import Bard, SESSION_HEADERS
from bardapi import BardCookies

# Start session
session = requests.Session()
token = os.environ.get("_BARD_API_KEY")
# Token goes here
token = "awjMBrhiuQVpsByRiqhOTZl1toqRaiUbcjj04yzOIkO2xL5u2JnsgEFsmgwxnEHhb6kjpw."
# Set cookies
session.cookies.set("__Secure-1PSID", "awjMBrhiuQVpsByRiqhOTZl1toqRaiUbcjj04yzOIkO2xL5u2JnsgEFsmgwxnEHhb6kjpw.")
session.cookies.set( "__Secure-1PSIDCC", "APoG2W_hFvAOp3woJfExtiwcWCVUoepUtFFYDBM9Ggaxf4gFypcEYJmeEsbzMG-s_D4dUBWxPw")
session.cookies.set("__Secure-1PSIDTS", "sidts-CjEBSAxbGRlRs_fEY9HQS6mQlh4qpmdegkYqcq5sr4feSe7RDjXh-jsUG6ArK7yaslrKEAA")
session.headers = SESSION_HEADERS
# Create Bard session
bard = Bard(token=token, session=session)

# Set title
st.title("Clean Divorce Chatbot")

# Function for getting response from API
def response_api(prompt):
    try:
        message = bard.get_answer(str(prompt))['content']
        return message
    except Exception as e:
        st.warning(f"Error fetching response: {e}")
        return "Sorry, I couldn't fetch a response."


# Function for user input
def user_input():
    input_text=st.text_input("Enter Your Prompt:")
    return input_text

if'generate' not in st.session_state:
    st.session_state['generate']=[]


if'past' not in st.session_state:
    st.session_state['past']=[]    


# Using the user_input() function and assigning it to a variable
user_text=user_input()

# Using the response_api() function and assigning it to a variable
if user_text:
    output= response_api(user_text)
    st.session_state.generate.append(output)
    st.session_state.past.append(user_text)

# Displaying the output
if st.session_state['generate']:
    for i in range (len(st.session_state['generate']) -1, -1, -1):
        message(st.session_state["past"][i], is_user=True, key=str(i)+ '_user')
        message(st.session_state["generate"][i], key=str(i))

