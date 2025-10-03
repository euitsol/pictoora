import axios from 'axios';
import { createIcons, Calendar,Home, User, Settings, Menu, X, Clock, ShieldUser, Star, Heart, Users, Shield, Truck, MapPin, ShieldCheck, Eye, Award, ChevronUp, ChevronDown, Gift, CheckCircle, Mail, Funnel, FunnelX, BookOpen, Languages, Share2, ArrowRight, ArrowLeft, Check, Printer, BadgeCheck, Bookmark, RotateCcw, BookOpenCheck, RectangleHorizontal, Layers, CreditCard, ShoppingCart, PlusCircle, Receipt, Tag, PencilLine, Info, Search, Palette, Download,MapPinHouse,MailCheck,Phone,  } from 'lucide';
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
        ChevronUp,
        ChevronDown,
        Gift,
        CheckCircle,
        Mail,
        Funnel,
        FunnelX,
        BookOpen,
        Languages,
        Calendar,
        Share2,
        ArrowRight,
        ArrowLeft,
        Check,
        Printer,
        BadgeCheck,
        Bookmark,
        RotateCcw,
        RectangleHorizontal,
        BookOpenCheck,
        Layers,
        CreditCard,
        ShoppingCart,
        PlusCircle,
        Receipt,
        Tag,
        PencilLine,
        Info,
        Search,
        Palette,
        Download,
        MapPinHouse,
        MailCheck,
        Phone,
    
        
    } // List all imported icons
});
