export const Create = {

    CharacterList: (data) => {
        console.log(data)
        const section = document.getElementById('section-character');
        data.map((char) => {
            Create.CharacterBox(char, section)
        })
    },

    CharacterBox: (data, target) => {
        const newDiv = document.createElement('div');
        const nameDiv = document.createElement('div');
        const classDiv = document.createElement('div');
        const xpDiv = document.createElement('div');
    
        newDiv.classList.add('character-box');
        nameDiv.classList.add('character-name');
        classDiv.classList.add('character-class');
        xpDiv.classList.add('character-xp');
    
        nameDiv.textContent = data.name;
        classDiv.textContent = data.class;
        xpDiv.textContent = 'XP: ' + data.xp;
    
        newDiv.appendChild(nameDiv);
        newDiv.appendChild(classDiv);
        newDiv.appendChild(xpDiv);
    
        target.appendChild(newDiv)
    }
}