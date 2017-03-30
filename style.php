<?php
    header('Content-type: text/css; charset:UTF-8');
?>
body {
    background-color: #ddd;
}

* {
    margin: 0px;
    padding: 0px;
    text-decoration: none;
}

.panel-heading {
    border-style: none;
    font-size: 20px;
    text-align: center;
}

.feedback {
    font-size: 16px;
    font-family: Arial;
    color: red;
}

.taskList {
    text-align: center;
    width: 50%;
    float: left;
}

.tasks-heading {
    border-style: none;
    font-size: 20px;
    text-align: center;
}

.allUsers {
    text-align: center;
    width: 25%;
    float: left;
}

.allUsers-heading {
    border-style: none;
    font-size: 20px;
    text-align: center;
}

.profile {
    text-align: center;
    width: 25%;
    float: left;
}

.profile-heading {
    border-style: none;
    font-size: 20px;
    text-align: center;
}

.panel-block {
    font-size: 16px;
    font-family: Arial;
}

.delete-p {
    font-size: 25px;
    font-family: Arial;
}

.poista {
    color: red;
}

.title {
    text-align: center;
}

.notification {
    text-align: center;
    font-family: Arial;
}

.set-comment {
    width: 30%;
    height: 100px;
}

.all-comments {
    float: right;
}

.comment-box {
    width: 815px;
    padding: 20px;
    margin-bottom: 4px;
    background-color: #fff;
    border-radius: 4px;
    position: relative;
}

.comment-box p {
    font-family: Arial;
    font-size: 14px;
    line-height: 16px;
    color: #282828;
    font-weight: 100px;
}

header {
    width: 100%;
    height: 60px;
    background-color: #222222;
}

nav ul {
    float: right;
    margin-top: 20px;
    margin-right: 60px;
}

nav ul li {
    list-style: none;
    float: left;
    margin-right: 20px;
}

nav ul li a {
    color: white;
    font-family: Arial;
    font-size: 16px;
}

nav ul form {
    float: left;
}

nav ul form input {
    float: left;
    border: none;
    margin-right: 6px;
}

nav ul form button {
    float: left;
    border: none;
    margin-right: 20px;
    background-color: #fff;
    color: #222;
    font-size: 16px;
    cursor: pointer;
    width: 150px;
    height: 20px;
}

textarea {
    width: 400px;
    height: 80px;
    background-color: #fff;
    resize: none;
    margin-left: 20px;
}

button {
    width: 100px;
    height: 30px;
    background-color: #282828;
    border: none;
    color: #fff;
    font-family: Arial;
    font-weight: 400;
    cursor: pointer;
    margin-left: 20px;
    margin-bottom: 60px;
}

.edit-form {
    position: absolute;
    top: 0px;
    right: 0px;
}

.edit-form button {
    width: 60px;
    height: 20px;
    color: #282828;
    background-color: #fff;
    opacity: 0.7;
}

.edit-form button:hover {
    opacity: 1;
}

.delete-form {
    position: absolute;
    top: 0px;
    right: 70px;
}

.delete-form button {
    width: 60px;
    height: 20px;
    color: #282828;
    background-color: #fff;
    opacity: 0.7;
}

.delete-form button:hover {
    opacity: 1;
}

.delete-div {
    float: left;
    width: 300px;
    height: 100px;
    margin-top: 100px;
    margin-left: 100px;
    position: relative;
}

.delete-comment-page button {
    text-align: center;
    font-family: Arial;
}