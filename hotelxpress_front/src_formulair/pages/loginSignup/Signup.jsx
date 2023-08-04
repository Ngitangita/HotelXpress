import React, { useState } from 'react'
import './login.css'
import { Link } from "react-router-dom";

const Signup = (onSignup) => {
    const [firstName, setFerstName] = useState('');
    const [lastName, setLastName] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const handleSignup = () =>{
        if (firstName && email && password) {
            onSignup(firstName);
        }
    }

  return (
    <div className="Signup template d-flex justify-content-center align-items-center vh-100 bg-primary">
        <div className='form_container p-5 rounded bg-white'>
            <form>
                <h3 className='text-center'>Sign Up</h3>
                <div className='mb-2'>
                    <label htmlFor="fname">First name</label>
                    <input type="text" placeholder='Enter first name' className='form-control'
                    value={firstName}
                    onChange={(e)=> setFerstName(e.target.value)}/>
                </div>
                <div className='mb-2'>
                    <label htmlFor="lname">Last name</label>
                    <input type="text" placeholder='Enter last name' className='form-control'
                     value={lastName}
                     onChange={(e)=> setLastName(e.target.value)}/>
                </div>
                <div className='mb-2'>
                    <label htmlFor="email">Email</label>
                    <input type="email" placeholder='Enter Email' className='form-control'
                    value={email}
                    onChange={(e)=> setEmail(e.target.value)}
                    />
                </div>
                <div className='mb-2'>
                    <label htmlFor="password">Password</label>
                    <input type="password" placeholder='Enter Password' className='form-control'
                     value={password}
                     onChange={(e)=> setPassword(e.target.value)}/>
                </div>
                <div className='d-grid mt-2'>
                    <button className='btn btn-primary' onClick={handleSignup}>Sign Up</button>
                </div>
                <p className='text-end mt-2'>
                    Already Registerd <Link to="/" className='ms-2'>Sign in</Link>
                </p>
            </form>
        </div>
    </div>
  )
}

export default Signup