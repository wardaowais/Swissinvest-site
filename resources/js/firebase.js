
import firebase from "firebase/app";
import "firebase/firestore";

const firebaseConfig = {
  apiKey: "AIzaSyBVz_bKaefVKJaS3U_-7JigOEGne0axqpo",
  authDomain: "doctor-directory-f1fdd.firebaseapp.com",
  projectId: "doctor-directory-f1fdd",
  storageBucket: "doctor-directory-f1fdd.appspot.com",
  messagingSenderId: "704281078605",
  appId: "1:704281078605:web:a61e2c02575390cdbde504"
};

firebase.initializeApp(firebaseConfig);
const db = firebase.firestore();

export { db };
