import React from 'react';
import Reservation from './pages/resevation/Reservation';
import Login from './pages/loginSignup/Login';
import Signup from './pages/loginSignup/Signup';
import "bootstrap/dist/css/bootstrap.min.css"
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Payment from './pages/payment/Payment';
import Reserver from './pages/datereservation/Reserver';
import Navbar from './navbar/Navbar'

const App = () => {
  return (
    <BrowserRouter>
       <Navbar/>
      <Routes>
        <Route path="/" element={<Login/>}/>
        <Route path="/signup" element={<Signup/>}/>
      </Routes>
      <Reservation/>
      <Reserver/>
      <Payment/>
    </BrowserRouter>
  );
}

export default App;