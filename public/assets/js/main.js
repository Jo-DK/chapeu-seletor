import { Api } from './modules/api.js';
import { Create } from './modules/create.js';

Api.getCharacteres().then(response => {
    Create.CharacterList(response.data.data)
});

Api.getGuilds().then(response => {
    Create.GuildList(response.data.data)
});


const FormCharacter = document.getElementById('create-character');

FormCharacter.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(e.target);

    Api.postCharacter(formData)
        .then( response => {
            const section = document.getElementById('characters');
            Create.CharacterBox(response.data.data, section);
        })
})


const distributeForm = document.getElementById('distribute');

distributeForm.addEventListener('submit', function(e){
    e.preventDefault();
    const formData = new FormData(e.target);
    Api.distribute(formData)
        .then( response => {
            if(response.data.data)
                location.reload()
        })
})
