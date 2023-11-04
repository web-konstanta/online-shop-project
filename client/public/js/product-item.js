const descriptionButton = document.querySelector('#descriptionItem')
const charactersButton = document.querySelector('#charactersItem')
const description = document.querySelector('#description')
const characters = document.querySelector('#characters')

descriptionButton.onclick = () => {
    description.style.display = 'block'
    characters.style.display = 'none'
    charactersButton.classList.remove('cs-tab-control__item_state_active')
    descriptionButton.classList.add('cs-tab-control__item_state_active')
}

charactersButton.onclick = () => {
    description.style.display = 'none'
    characters.style.display = 'block'
    charactersButton.classList.add('cs-tab-control__item_state_active')
    descriptionButton.classList.remove('cs-tab-control__item_state_active')
}
