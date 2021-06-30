import Home from './components/Home';
import Register from './components/Register';
import Login from './components/Login';
// import Dashboard from './components/Dashboard';
// import NotFound from './components/NotFound';


export default [
    {
        path: '/',
        component: Home,
        name: 'home'
    },

    {
        path: '/register',
        component: Register,
        name: 'register'
    },

    {
        path: '/login',
        component: Login,
        name: 'login'
    }
]
