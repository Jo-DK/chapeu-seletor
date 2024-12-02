import { Api } from './modules/api.js';
import { Create } from './modules/create.js';


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

const btnReset = document.getElementById('reset');

btnReset.addEventListener('click', function(){
    Api.reset().then( (response) => {
        console.log(response.data);
        location.reload()
    })

})



Api.getCharacteres().then(response => {
    Create.CharacterList(response.data.data)
});

Api.getGuilds().then(response => {
    if(response.data?.data.length){
        FormCharacter.style.display = 'none';
        distributeForm.style.display = 'none';
        Create.GuildList(response.data.data)
    }
});