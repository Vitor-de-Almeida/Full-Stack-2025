import dayjs from "dayjs"

const form = document.querySelector('form');
const selectedDate = document.getElementById('date');

// Date atual para o input de data
const inputToday = dayjs(new Date()).format('YYYY-MM-DD');

// Define a data atual como valor padrão do campo de data
selectedDate.value = inputToday

// Define a data mínima como a data atual
selectedDate.min = inputToday

form.onsubmit = (event) => {
    event.preventDefault();
    alert('Formulário enviado!');
};