import React from 'react'
import "./reservation.css"
import { useState } from "react";
import "react-date-range/dist/styles.css"; // main css file
import "react-date-range/dist/theme/default.css"; // theme css file



const Reservation = () => {
  const [firstName, setFerstName] = useState('');
  const [lastName, setLastName] = useState('');

  const [email, setEmail] = useState('');
  const [phonNumber, setPhonNumber] = useState('');
  // const [nationality, setNationality] = useState('');
  const [birthday, setBirthday] = useState('');
  const [password, setPassword] = useState('');

  const handlereservation = () =>{
      if (firstName && email && password) {
        handlereservation (firstName);
      }
  }


  return (
      <form id='form'>
      <div className='form'>
      <label id='label'>Enter your first name:
        <input type="text" placeholder="your first name"
        value={firstName}
        onChange={(e)=> setFerstName(e.target.value)}
        />
      </label>
      <label id='label'>Enter your last name:
        <input type="text" placeholder="your last name"
        value={lastName}
        onChange={(e)=> setLastName(e.target.value)}
        />
      </label>
       <div className='select'>
       Enter your gender:
          <div className='input'>
            <input type="checkbox" id='homme'/> <label htmlFor="homme">Homme</label>
            <input type="checkbox" id='femme'/> <label htmlFor="femme">Famme</label>
            <input type="checkbox" id='autre'/> <label htmlFor="autre">Autre</label>
          </div>
       </div>
      <label id='label'>Enter your email:
        <input type="email" placeholder="your email"
        value={email}
        onChange={(e)=> setEmail(e.target.value)}
        />
      </label>
      <label id='label'>Enter your phone number:
        <input type="number" placeholder="your phone number"
        value={phonNumber}
        onChange={(e)=> setPhonNumber(e.target.value)}
        />
      </label>
      <div className='select'>Enter your nationality:
        <select name="" id="">
        <option value="Madagascar">Malagasy</option>
        <option value="États-Unis">Américain / Américaine</option>
        <option value="Canada">Canadien / Canadienne</option>
        <option value="France">Français / Française</option>
        <option value="Allemagne">Allemand / Allemande</option>
        <option value="Japon">Japonais / Japonaise</option>
        <option value="Chine">Chinois / Chinoise</option>
        <option value="Inde"> Indien / Indienne</option>
        <option value="Australie">Australien / Australienne</option>
        <option value="Royaume-Uni">Britannique</option>
        <option value="Brésil">Brésilien / Brésilienne</option>
        <option value="Russie">Russe</option>
        <option value="Mexique">Mexicain / Mexicaine</option>
        <option value="Italie">Italien / Italienne</option>
        <option value="Espagne">Espagnol / Espagnole</option>
        <option value="Afrique du Sud">Sud-africain / Sud-africaine</option>
        <option value="Nigéria">Nigérian / Nigériane</option>
        </select>
      </div>
      <label id='label'>Enter your birthday:
        <input type="date" 
        value={birthday}
        onChange={(e)=> setBirthday(e.target.value)}
        />
      </label>
      <label id='label'>Enter your password:
        <input type="password" placeholder="your password" 
        value={password}
        onChange={(e)=> setPassword(e.target.value)}
        />
      </label>
      <div className='button'>
      <button value='button' onClick={handlereservation }>Annulle</button>
      <button onClick={handlereservation } value='button'>Next</button>
      </div>
      </div>
    </form>
  )
}

export default Reservation