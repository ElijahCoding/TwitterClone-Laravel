
require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex'
Vue.use(Vuex)

import VueObserveVisibility from 'vue-observe-visibility'
Vue.use(VueObserveVisibility)

import VModal from 'vue-js-modal'

Vue.use(VModal, {
    dynamic: true,
    injectModalContainer: true,
    dynamicDefaults: {
        pivotY: 0.1,
        height: 'auto',
        classes: 'bg-gray-900 rounded-lg p-4'
    }
})

Vue.prototype.$user = User

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import timeline from "./store/timeline";
import likes from './store/likes';
import retweets from './store/retweets';

const store = new Vuex.Store({
    modules: {
        timeline,
        likes,
        retweets
    }
})

const app = new Vue({
    el: '#app',
    store
})

Echo.channel('tweets')
    .listen('.TweetLikesWereUpdated', (e) => {
        if (e.user_id === User.id) {
            store.dispatch('likes/syncLike', e.id)
        }

        store.commit('timeline/SET_LIKES', {
            id: e.id,
            count: e.count
        })
    })
    .listen('.TweetRetweetsWereUpdated', (e) => {
        if (e.user_id === User.id) {
            store.dispatch('retweets/syncRetweet', e.id)
        }

        store.commit('timeline/SET_RETWEETS', {
            id: e.id,
            count: e.count
        })
    })
    .listen('.TweetWasDeleted', (e) => {
        store.commit('timeline/POP_TWEET', e.id)
    })
