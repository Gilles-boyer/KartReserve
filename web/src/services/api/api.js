import axios from "axios";

export default axios.create({
  //baseURL: `${location.origin}/api`,
  baseURL: `http://127.0.0.1:8000/api`,
  headers: {
    //'Authorization': 'Bearer ' + localStorage.getItem('token'),
    "Content-Type": "application/json",
    Accept: "application/json",
  },
});