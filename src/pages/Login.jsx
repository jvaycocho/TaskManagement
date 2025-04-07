import React from 'react';
import { useLocation } from 'react-router-dom';

const Login = () => {
    const location = useLocation();
    const data = location.state.data?.userId || 'No current user'

    return (
        <div>
            {userId}
            <form>
                <input type="text" placeholder='Enter Email address'/>               
                <input type="text" placeholder='Enter Password'/>
                <button>LOGIN</button>
            </form>
        </div>
    )
}


export default Login;
