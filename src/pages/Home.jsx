import { useNavigate } from 'react-router-dom';

const Home = () => {
    const navigate = useNavigate();
    
    const handleLogin = () => { 
        navigate('/login', { state: { data: { userId: 123} } })
    }

return (
    <div>
        <button onClick={handleLogin}>Login</button>
    </div>
)

}

export default Home;