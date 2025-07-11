import axios from 'axios';
import { createIcons, Home, User, Settings, Menu, X, Clock, ShieldUser, Star, Heart } from 'lucide';
import $ from 'jquery';

window.$ = window.jQuery = $;

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

createIcons({
    icons: {
        Home,
        User,
        Settings,
        Menu,
        X,
        Clock,
        ShieldUser,
        Star,
        Heart,
    } // List all imported icons
});

$(function () {
    console.log("jQuery is working!");
});
