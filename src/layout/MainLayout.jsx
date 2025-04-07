import { Outlet, Link } from 'react-router-dom';

const MainLayout = () => {
    return(
        <>
    <header>
        <nav>
            <ul>
                <li>    
                    <Link to="/">Task</Link>
                </li>
                <li>
                <Link to="/About">On Going</Link>
                </li>
                <li>
                <Link to="/NotFound">Completed</Link>
                </li>
            </ul>
        </nav>
    </header>

        <main>
            <Outlet />
        </main>

        <footer>
            <p>All Rights Reserved</p>
        </footer>
    </>
    )
}

export default MainLayout;