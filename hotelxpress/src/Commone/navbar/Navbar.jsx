import "./navbar.css"

import React, { useState } from 'react'
import { Link } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {faBed } from "@fortawesome/free-solid-svg-icons";
const Navbar = () => {
  const [click, setClick] = useState(false)

  const handleClick = () => setClick(!click)
  const closeMobileMenu = () => setClick(false)

  return (

    <nav className="navbar">
          <div className="container flex_space">
          <li className="Logo">
                <Link to='/'>
                <FontAwesomeIcon icon={faBed} />
                  Hôtel<span>Xpress</span>
                </Link>
            </li>
            <div className="menu_icon" onClick={handleClick}>
              <i className= {click? "fas fa-times":"fas fa-bars"}></i>
            </div>
          <ul id="nav-menu" className={click? "nav-menu active" : "nav-menu"}>
            <li><Link to="/" onClick={closeMobileMenu}>Accueil</Link></li>
            <li id="List">Réservations
            <ul className="sousList">
            <li><Link to="/promotions" onClick={closeMobileMenu}>Promotions</Link></li>
            <li><Link to="/commentaires" onClick={closeMobileMenu}>Commentaires</Link></li>
            <li><Link to="/partenariats" onClick={closeMobileMenu}>Partenariats</Link></li>
            <li><Link to="/signets" onClick={closeMobileMenu}>Signets</Link></li>
            <li><Link to="/medias" onClick={closeMobileMenu}>Médias</Link></li>
            </ul>
            </li>
            <li><Link to="/chambres" onClick={closeMobileMenu}>Chambres</Link></li>
            <li><Link to="/hotels" onClick={closeMobileMenu}>Hôtels </Link></li>
          </ul>
          <div className="login-area flex">
              <li>
                  <Link to='/sign-in'>
                  <button className="primary-btn ">Connexion / Inscription</button>
                </Link>
              </li>
            </div>
      </div>
    </nav>
  )
}

export default Navbar