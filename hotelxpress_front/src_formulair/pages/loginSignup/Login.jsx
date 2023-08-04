import React, { useState } from 'react'
import './login.css'
import { Link } from "react-router-dom";

const Login = (login) => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const handleLogin = () => {
        if (email && password) {
            login(email);
        }
    }

  return (
    <div className="login template d-flex justify-content-center align-items-center vh-100 bg-primary">
        <div className='form_container p-5 rounded bg-white'>
            <form>
                <h3 className='text-center'>Sign In</h3>
                <div className='mb-2'>
                    <label htmlFor="email">Email</label>
                    <input type="email" placeholder='Enter Email' className='form-control'
                     onChange={(e) => setEmail(e.target.value)}/>
                </div>
                <div className='mb-2'>
                    <label htmlFor="password">Password</label>
                    <input type="password" placeholder='Enter Password' className='form-control'
                    value={password}
                    onChange={(e) => setPassword(e.target.value)}/>
                </div>
                <div className='mb-2'>
                    <input type="checkbox" className='custom-control custom-checkbox' id='check' />
                    <label htmlFor="check" className='custom-input-label ms-2'>
                        Remember me
                    </label>
                </div>
                <div className='d-grid'>
                    <button onClick={handleLogin} className='btn btn-primary'>Sign In</button>
                </div>
                <p className='text-end mt-2'>
                    Forgot <a href="/Signup">Password?</a><Link to="/signup" className='ms-2'>Sign Up</Link>
                </p>
            </form>
        </div>
    </div>
  )
}

export default Login