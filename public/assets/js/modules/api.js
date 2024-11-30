const HOST = 'http://localhost:8000/api';

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
    }
};
