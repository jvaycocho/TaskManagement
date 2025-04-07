import React from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";

import MainLayout from "./layout/MainLayout";


import Home from './pages/Home';
import About from './pages/About';
import NotFound from './pages/NotFound';
import Login from './pages/Login';



const App = () => {
    return (
        <Router>
          <Routes>
            <Route path="/" element={<MainLayout />}>
            <Route index element={<Home />} />
            <Route path='/about' element={<About />} />
            <Route path='/login' element={<Login />} />
            </Route>
            <Route path='*' element={<NotFound />} />
          </Routes>
        </Router>
    )

}

export default App;