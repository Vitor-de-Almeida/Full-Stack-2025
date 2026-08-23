const addItem = window.document.getElementById('addItem')
const button = window.document.getElementById('button')
const boxes = document.querySelector('.boxes');
const errorBox = document.querySelector('.error');

button.addEventListener('click', (e) => {
    e.preventDefault()
    const itemValue = addItem.value.trim()
    
    const id =`${Date.now()}-item`
    if (itemValue) {
    const itemHTML = `
        <div class="item">
          <label for="${id}">
            <input type="checkbox" id="${id}" />
            <p>${itemValue}</p>
          </label>
          <svg class="delete" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f">
            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
          </svg>
        </div>
    `;

    boxes.insertAdjacentHTML('beforeend', itemHTML)
    addItem.value = '';
    }
   
})


boxes.addEventListener('click', (e) => {
    if (e.target.closest('.delete')) {
        e.target.closest('.item').remove();
    if (errorBox) {
        errorBox.style.display ='grid';
        setTimeout(() => {
            errorBox.style.display = 'none';
        }, 2000);
    }
    }

  
});


function removerSelecionados() {
  const checkboxes = document.querySelectorAll('.item input[type="checkbox"]:checked');

  checkboxes.forEach((checkbox) => {
    const item = checkbox.closest('.item');
    if (item) {
      item.remove();
    }
  });
}

const buttonDeleteSelecionados = document.getElementById('removerSelecionados')

buttonDeleteSelecionados.addEventListener('click', removerSelecionados)

