import axios from 'axios';
import { createIcons, Home, User, Settings, Menu, X, Clock, ShieldUser, Star, Heart, Users, Shield, Truck, MapPin, ShieldCheck, Eye, Award, ChevronDown } from 'lucide';
import $ from 'jquery';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

window.Swiper = Swiper;

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
        Users,
        Shield,
        Truck,
        MapPin,
        ShieldCheck,
        Eye,
        Award,
        ChevronDown,
    } // List all imported icons
});

$(function () {
    console.log("jQuery is working!");
});
