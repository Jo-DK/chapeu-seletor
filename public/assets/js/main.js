import { Api } from './modules/api.js';
import { Create } from './modules/create.js';

Api.getCharacteres().then(response => {
    Create.CharacterList(response.data.data)
});

Api.getGuilds().then(response => {
    console.log(response.data)
});


const FormCharacter = document.getElementById('create-character');

FormCharacter.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(event.target);

    Api.postCharacter(formData)
        .then(response => {
            console.log(response.data);
        })
})


const distributeForm = document.getElementById('distribute');

distributeForm.addEventListener('submit', function(e){
    e.preventDefault();
    console.log('Submetendo !!')
})