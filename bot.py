from bardapi import Bard
import os
import streamlit as st 
from streamlit_chat import message


os.environ["_BARD_API_KEY"]="awjMBiBXfQvOq_5NZ6evqpdY4NlVDSo0-8pHJHU1g63XahWjG1h3BmRQFIXPSusmWpqf1g."



st.title("Clean Divorce Chatbot")
def response_api(prompt):
    message=Bard().get_answer(str(prompt))['content']
    return message

def user_input():
    input_text=st.text_input("Enter Your Prompt:")
    return input_text

if'generate' not in st.session_state:
    st.session_state['generate']=[]


if'past' not in st.session_state:
    st.session_state['past']=[]    



user_text=user_input()

if user_text:
    output= response_api(user_text)
    st.session_state.generate.append(output)
    st.session_state.past.append(user_text)


if st.session_state['generate']:
    for i in range (len(st.session_state['generate']) -1, -1, -1):
        message(st.session_state["past"][i], is_user=True, key=str(i)+ '_user')
        message(st.session_state["generate"][i], key=str(i))

