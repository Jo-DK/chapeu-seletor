const HOST = '/api';

export const Api = {

    getCharacteres: () => {
        return axios(HOST + '/character?withoutguild=1');
    },

    postCharacter: (data) => {
        return axios.post(HOST + '/character', data, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });
    },

    getGuilds: () => {
        return axios(HOST + '/guild');
    },

    putGuildCharater: (vincule_id, guild_id) =>{
        return axios.put(HOST + '/guild-character/' + vincule_id, {guild_id})
    }
};
