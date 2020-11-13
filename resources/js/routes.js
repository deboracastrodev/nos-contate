import Vue from 'vue';
import VueRouter from 'vue-router';

import Contato from './Contato';


export const routes = [
        {
            path: '/',
            name: 'contato',
            component: Contato
        }
]