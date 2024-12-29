importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object
firebase.initializeApp({
    apiKey: "AIzaSyBVz_bKaefVKJaS3U_-7JigOEGne0axqpo",
    authDomain: "doctor-directory-f1fdd.firebaseapp.com",
    projectId: "doctor-directory-f1fdd",
    storageBucket: "doctor-directory-f1fdd.appspot.com",
    messagingSenderId: "704281078605",
    appId: "1:704281078605:web:a61e2c02575390cdbde504"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();