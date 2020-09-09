import cookies from 'js-cookie'

const cookieparser = process.server ? require('cookieparser') : undefined

export const state = () => ({
    token: null
})

export const mutations = {
    SET_TOKEN(state, token) {
        state.token = token
    },
    REMOVE_TOKEN(state) {
        state.token = null
    }
}

export const actions = {
    nuxtServerInit({commit}, {req}) {
        if (req.headers.cookie) {
            const parsed = cookieparser.parse(req.headers.cookie)
            commit('SET_TOKEN', parsed.Authorization)
        }
    },
    setToken({commit}, token) {
        this.$axios.setToken(token, 'Bearer')
        cookies.set('Authorization', token)
        commit('SET_TOKEN', token)
    },
    logout({commit}) {
        this.$axios.setToken(false)
        cookies.remove('Authorization')
        commit('REMOVE_TOKEN')
    }
}
