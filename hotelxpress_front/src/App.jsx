import "./App.css"
import React from 'react'

import {
  BrowserRouter,
  Routes,
  Route,
} from "react-router-dom";
import Accueil from "./pages/accueil/Accueil";
import Hotel from "./pages/hotel/Hotel";
import Chambres from "./pages/chambres/Chambres";
import MyLogin from "./pages/login/MyLogin";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Accueil/>}/>
        <Route path="/sign-in" element={<MyLogin/>}/>
        <Route path="/hotels" element={<Hotel/>}/>
        <Route path="/chambres" element={<Chambres/>}/>
      </Routes>
    </BrowserRouter>
  );
}

export default App;


